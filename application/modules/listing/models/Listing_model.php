<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listing_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	   		//Do your magic here
	}

	public function get_detail($unique_id)
	{
		$this->db->where('unique_id' ,$unique_id);
		$query = $this->db->get('listings')->row_array();
		return $query;
	}

	public function update_stp1($data)
	{
		
		$this->db->set('list_type' ,0);		
		$this->db->where('unique_id', $data['unique_id']);		
		$query = $this->db->update('listings');

		$this->db->select('id');
		$this->db->where('unique_id', $data['unique_id']);
		$query = $this->db->get('listings')->row_array();
		$list_id = $query['id'];


		$this->db->where('group_id',$data['form_id']);
		$this->db->where('listings_id',$list_id);
		$query = $this->db->delete('listings_meta');

		foreach ($_POST['posted_data'] as $key => $value) { 
			$this->db->set('meta_key' , $key);
			$this->db->set('meta_value' , $value);
			$this->db->set('group_id',$data['form_id']);
			$this->db->set('listings_id' ,$list_id);
			$query = $this->db->insert('listings_meta');
		}

		return true;
	}

	public function insert_stp1($data)
	{
        if(get_session('listing_id')){
            // $this->db->set('build_year' , $data['build_year']);
            $this->db->set('purpose' , $data['purpose']);
            $this->db->set('property_type' , $data['property_type']);
                //$this->db->set('city' , $data['city']);
            $this->db->set('location' , $data['location']);
            $this->db->set('latitude' , $data['latitude']);
            $this->db->set('longitude' , $data['longitude']);
            $this->db->where('id' , get_session('listing_id'));
            $query = $this->db->update('listings');
            $list_id = get_session('listing_id');
            return $list_id;
        }else{
            $data['unique_id'] = md5(uniqid());
            $this->db->set('unique_id' , $data['unique_id']);
            $this->db->set('users_id' , get_session('user_id'));
            // $this->db->set('build_year' , $data['build_year']);
            $this->db->set('purpose' , $data['purpose']);
            $this->db->set('property_type' , $data['property_type']);
                //$this->db->set('city' , $data['city']);
            $this->db->set('location' , $data['location']);
            $this->db->set('latitude' , $data['latitude']);
            $this->db->set('longitude' , $data['longitude']);
            $query = $this->db->insert('listings');
            $list_id = $this->db->insert_id();
            return $list_id;
        }
    }

    public function insert_stp2($data)
    {
        $this->db->trans_start();
        $this->db->set('title' , $data['property_title']);
        $this->db->set('price' , $data['property_price']);
        $this->db->set('no_of_bedrooms' , $data['no_of_bedrooms']);
            // $this->db->set('no_of_living_rooms' , $data['no_of_living_rooms']);
        $this->db->set('no_of_bathrooms' , $data['no_of_bathrooms']);
        $this->db->set('land_area' , $data['land_area']);
        $this->db->set('unit' , $data['unit_area']);
        $this->db->set('description' ,$data['property_desc']);
        $this->db->where('id' , get_session('listing_id'));            
        $query = $this->db->update('listings');
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function insert_stp3($data)
    {
        $this->db->trans_start();
        $this->db->set('contact_person' , $data['contact_person']);
        $this->db->set('contact_phone' , $data['contact_phone']);
        $this->db->set('contact_email' , $data['contact_email']);
        $this->db->where('id' , get_session('listing_id'));
        $query = $this->db->update('listings');
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function insert_stp4($data)
    {
        $this->db->trans_start();

            //... adding files details
        if(!empty($data['allfiles'])){
                //.. delete all
            $this->db->where('listing_id', get_session('listing_id'));
            $this->db->delete('listing_images');
                //.. delete all                
                //$this->db->delete('listing_images', array('listing_id' => get_session('listing_id')));
            foreach ($data['allfiles'] as $key => $file) {
                $this->db->set('listing_id', get_session('listing_id'));
                $this->db->set('image_name', $file);
                $this->db->set('sort_order', $data['image_order'][$key]);
                $query = $this->db->insert('listing_images');
            }
        }
        $this->db->set('is_completed', 'Y');
        $this->db->where('id', get_session('listing_id'));
        $this->db->update('listings');
            $this->db->trans_complete(); # Completing transaction
            //... end files details
            if ($this->db->trans_status() === FALSE)
            {
                return FALSE;
            } else {
                return TRUE;
            }
        }
        
        public function search_listing($data,$limit='',$start='',$order_by='') {
            //,MIN(listing_images.image_name) as image_name
            $this->db->select('users.agency_image, listings.*,(select image_name from listing_images where listings.id = listing_id order by sort_order asc limit 1 ) as image_name, pt.name as property_type, users.unique_id as agent_unique_id');
            if(!empty($data['lat']) && !empty($data['long'])){
                $this->db->select('(3959 * acos( cos( radians('.$data["lat"].') ) * cos( radians( listings.latitude ) ) * cos( radians( listings.longitude ) - radians('.$data["long"].') ) + sin( radians('.$data["lat"].') ) * sin( radians( listings.latitude ) ) ) ) AS measured_distance');
            }
            $this->db->from('listings');
            $this->db->join('listing_images','listings.id = listing_images.listing_id','left');
            $this->db->join('users','users.id = listings.users_id','left');
            $this->db->join('property_types pt', 'pt.id = listings.property_type', 'left');
            $this->db->where('purpose' , $data['purpose']);
            if(!empty($data['property_type'])){
                $this->db->where('pt.name' , $data['property_type']);
            }
            if(!empty($data['bedrooms'])){
                if($data['bedrooms'] == '5+'){
                    $this->db->where('no_of_bedrooms >' , 5);
                } else {
                    $this->db->where('no_of_bedrooms' , $data['bedrooms']);
                }
            }
            if(!empty($data['bathrooms'])){
                if($data['bathrooms'] == '5+'){
                    $this->db->where('no_of_bathrooms >' , 5);
                } else {
                    $this->db->where('no_of_bathrooms' , $data['bathrooms']);                    
                }
            }
            if(!empty($data['living_rooms'])){
                $this->db->where('no_of_living_rooms' , $data['living_rooms']);
            }
            if(!empty($data['price_range'])){
                $range = explode(";", $data['price_range']);
                
                if($range[1] == '1000000' && $data['purpose'] == 'sale' || 
                    $range[1] == '100000' && $data['purpose'] == 'rent' || 
                    $range[1] == '100000' && $data['purpose'] == 'student')
                {

                    $this->db->where('price >=', $range[0]);
                }else{
                    $this->db->where('price >=', $range[0]);
                    $this->db->where('price <=', $range[1]);
                }
            }
            if(!empty($data['keywords'])){
                $where = "(listings.title like '%".$data['keywords']."%' or listings.description like '%".$data['keywords']."%')";
                // $this->db->like('title' , $data['keywords'], 'both');
                // $this->db->or_like('description' , $data['keywords'], 'both');
                $this->db->where($where);
            }
            $this->db->where('listings.is_active', 'Y');
            $this->db->where('listings.is_approved', 'Y');
            $this->db->where('listings.is_completed', 'Y');
            if(!empty($limit)){
                $this->db->limit($limit,$start);
            }
            $this->db->group_by('listings.id');
            if(!empty($order_by)){
                $this->db->order_by($order_by);
            }else{
                $this->db->order_by("listings.created_at DESC");
            }
            $query = $this->db->get();
            $result = $query->result_array();
            // rlq();
            return $result;
        }
        
        public function count_search_listing($data) {
            //,MIN(listing_images.image_name) as image_name
            $this->db->select('users.agency_image, listings.*,listing_images.image_name, pt.name as property_type, users.unique_id as agent_unique_id');
            if(!empty($data['lat']) && !empty($data['long'])){
                $this->db->select('(3959 * acos( cos( radians('.$data["lat"].') ) * cos( radians( listings.latitude ) ) * cos( radians( listings.longitude ) - radians('.$data["long"].') ) + sin( radians('.$data["lat"].') ) * sin( radians( listings.latitude ) ) ) ) AS measured_distance');
            }
            $this->db->from('listings');
            $this->db->join('listing_images','listings.id = listing_images.listing_id','left');
            $this->db->join('users','users.id = listings.users_id','left');
            $this->db->join('property_types pt', 'pt.id = listings.property_type', 'left');
            $this->db->where('purpose' , $data['purpose']);
            if(!empty($data['property_type'])){
                $this->db->where('pt.name' , $data['property_type']);
            }
            if(!empty($data['bedrooms'])){
                if($data['bedrooms'] == '5+'){
                    $this->db->where('no_of_bedrooms >' , 5);
                } else {
                    $this->db->where('no_of_bedrooms' , $data['bedrooms']);
                }
            }
            if(!empty($data['bathrooms'])){
                if($data['bathrooms'] == '5+'){
                    $this->db->where('no_of_bathrooms >' , 5);
                } else {
                    $this->db->where('no_of_bathrooms' , $data['bathrooms']);                    
                }
            }
            if(!empty($data['living_rooms'])){
                $this->db->where('no_of_living_rooms' , $data['living_rooms']);
            }
            if(!empty($data['price_range'])){
                $range = explode(";", $data['price_range']);
                if($range[1] == '1000000' && $data['purpose'] == 'sale' || 
                    $range[1] == '100000' && $data['purpose'] == 'rent' || 
                    $range[1] == '100000' && $data['purpose'] == 'student'){

                    $this->db->where('price >=', $range[0]);
            }else{
                $this->db->where('price >=', $range[0]);
                $this->db->where('price <=', $range[1]);
            }
        }
        if(!empty($data['keywords'])){
            $where = "(listings.title like '%".$data['keywords']."%' or listings.description like '%".$data['keywords']."%')";
                // $this->db->like('title' , $data['keywords'], 'both');
                // $this->db->or_like('description' , $data['keywords'], 'both');
            $this->db->where($where);
        }
        $this->db->where('listings.is_active', 'Y');
        $this->db->where('listings.is_approved', 'Y');
        $this->db->where('listings.is_completed', 'Y');
        $this->db->group_by('listings.id');
        $query = $this->db->get();
        $result = $query->result_array();
            // rlq();
        return $result;
    }

    public function get_list_images($listings_id)
    {
        $this->db->select('*');
        $this->db->where('listing_id' , $listings_id);
        $this->db->order_by('sort_order', 'asc');
        $query = $this->db->get('listing_images')->result_array();
        return $query;
    }

    public function deleteImg($data){
        $this->db->where('id',$data['listing_img_id']);
        $this->db->delete('listing_images');
    }

    public function update_listing($data){

        // print_r($data); exit;
            // Step1
        // $this->db->set('build_year' , $data['build_year']);
        $this->db->set('purpose' , $data['purpose']);
        $this->db->set('property_type' , $data['property_type']);
        $this->db->set('location' , $data['location']);
        $this->db->set('latitude' , $data['latitude']);
        $this->db->set('longitude' , $data['longitude']);
            // Step2
        $this->db->set('title' , $data['property_title']);
        $this->db->set('price' , $data['property_price']);
        $this->db->set('no_of_bedrooms' , $data['no_of_bedrooms']);
        $this->db->set('no_of_bathrooms' , $data['no_of_bathrooms']);
        $this->db->set('land_area' , $data['land_area']);
        $this->db->set('unit' , $data['unit_area']);
        $this->db->set('description' , $data['property_desc']);
            // Step3
        $this->db->set('contact_person' , $data['contact_person']);
        $this->db->set('contact_phone' , $data['contact_phone']);
        $this->db->set('contact_email' , $data['contact_email']);
        $this->db->where('unique_id' , $data['listing_id']);
        $this->db->update('listings');

        foreach ($data['image_sort'] as $key => $img) {
            $this->db->set('sort_order', $img);
            $this->db->where('id', $key);
            $this->db->update('listing_images');
        }

        $where = "unique_id = '".$data['listing_id']."'";
        $record = singleRow('listings','*', $where);

        if(!empty($data['allfiles'])){
            foreach ($data['allfiles'] as $key => $file) {
                $this->db->set('listing_id', $record['id']);
                $this->db->set('image_name', $file);
                $this->db->set('sort_order', $data['img_order'][$key]);
                $query = $this->db->insert('listing_images');
            }
        }
    }


        //............. code not used yet................ 
    public function storage_publish($unique_id)
    {
      $this->db->set('publish',1);
      $this->db->where('users_id' , get_session('user_id'));
      $this->db->where('unique_id', $unique_id);
      $query = $this->db->update('listings');

      return $this->db->affected_rows();
  }

  public function storage_unpublish($unique_id)
  {
      $this->db->set('publish',0);
      $this->db->where('users_id' , get_session('user_id'));
      $this->db->where('unique_id', $unique_id);
      $query = $this->db->update('listings');

      return $this->db->affected_rows();
  }

  public function getListingByUniqueID($unique_id){
    $this->db->select('u.*, l.*, pt.name as property_type, u.unique_id as user_unique_id');
    $this->db->from('listings l');
    $this->db->join('users u', 'u.id = l.users_id', 'left');
    $this->db->join('property_types pt', 'pt.id = l.property_type', 'left');
    $this->db->where('l.unique_id', $unique_id);
    $query = $this->db->get();
    return $query->row_array();
}

public function updateImg($data){
    $this->db->set('sort_order', $data['sort_order']);
    $this->db->where('id', $data['listing_img_id']);
    $this->db->update('listing_images');
}

}

/* End of file Home_model.php */
   /* Location: ./application/modules/admin/models/Add_listing_model.php */