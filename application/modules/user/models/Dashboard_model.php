<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	   		//Do your magic here
	}
	public function get_user_detail()
	{
		$this->db->where('id', get_session('user_id'));
		return $this->db->get('users')->row_array();
	}

	public function get_detail($unique_id)
	{
		$this->db->select("listings.storage_title");
		$this->db->select("users.first_name , users.last_name, users.email");
		$this->db->from("listings");
		$this->db->join('users', 'listings.users_id = users.id', 'left');
		$this->db->where('listings.unique_id' ,$unique_id);
		$query = $this->db->get()->row_array();
		return $query;
	}

	public function deleteAllListings(){
		$this->db->select("li.id as listing_image_id, li.image_name");
		$this->db->from("listings l");
		$this->db->join('listing_images li', 'li.listing_id = l.id', 'left');
		$this->db->where('l.users_id',get_session('user_id'));
		$results = $this->db->get();
		$listing_images = $results->result_array();

		//... delete image listing images record
		foreach ($listing_images as $key => $list) {
			$this->db->where('id', $list['listing_image_id']);
			$this->db->delete('listing_images');
		}

		//... delete listings
		$this->db->where('users_id', get_session('user_id'));
		$this->db->delete('listings');

		return $listing_images;
	}

	public function deleteAccount(){
		$this->db->where('id', get_session('user_id'));
		$this->db->delete('users');
	}

	public function updateEmailAlert($value){
		$this->db->set('email_alert', $value);
		$this->db->where('id', get_session('user_id'));
		$this->db->update('users');
	}


	public function update_details($data)
	{

		$this->db->set('first_name', $data['first_name']);
		$this->db->set('last_name', $data['last_name']);
		if (!empty($data['profile_image'])) {
			$this->db->set('profile_dp', $data['profile_image']);
		}
		if (!empty($data['agency_image'])) {
			$this->db->set('agency_image', $data['agency_image']);
		}
		// $this->db->set('gender', $data['gender']);
		// $this->db->set('dob', $data['dob']);
		$this->db->set('phone', $data['phone']);
		$this->db->set('agency_name', $data['agency_name']);
		$this->db->set('agency_website', addHttp($data['agency_website']));
		// $this->db->set('prefer_language', $data['language']);
		// $this->db->set('prefer_currency', $data['currency']);
		// $this->db->set('address', $data['address']);
		$this->db->set('about', $data['about']);
		$this->db->set('profile_updated', 1);
		$this->db->where('id', get_session('user_id'));
		$query = $this->db->update('users');
		// if ($this->db->affected_rows() > 0) {
			return true;
		// } else {
		// 	return false;
		// }
	}

	public function update_profile_dp($data)
	{
		$this->db->set('profile_dp', $data['profile_dp']);
		$this->db->where('id',get_session('user_id'));
		$query = $this->db->update('users');
		if($this->db->affected_rows() > 0){
			return true;	
		}
		else{
			return false;	
		}
	}

	public function check_old_password($data)
	{
		$hash_pass="password('".$data['old_password']."')";
		$this->db->select('*');
		$this->db->where('password',$hash_pass,FALSE);
		$this->db->where('id', $this->session->userdata('user_id'));
		$query = $this->db->get('users');
		return $query->num_rows();
	}

	public function update_password($data)
	{
		$hash_pass="password('".$data['password']."')";
		$this->db->set('password',$hash_pass, FALSE);
		$this->db->where('id', $this->session->userdata('user_id'));
		$result = $this->db->update('users');
		return $this->db->affected_rows();
	}

	public function get_storage_listings()
	{
		$this->db->select("*");
		$this->db->from("listings");
		$this->db->where('list_type',0);
		$this->db->where('users_id',get_session('user_id'));
		$this->db->order_by('id', 'desc');
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function get_mover_listings()
	{
		$this->db->where('list_type',1);
		$this->db->where('users_id',get_session('user_id'));
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('listings')->result_array();
		return $query;
	}

	public function set_price_publish($data)
	{
		$this->db->set('publish',1);
		$this->db->set('price',$data['price']);
		$this->db->where('users_id' , get_session('user_id'));
		$this->db->where('unique_id', $data['unique_id']);
		$query = $this->db->update('listings');

		return $this->db->affected_rows();
	}

	public function getUserListings($type = ''){
		$this->db->select('u.*, l.*, pt.name as property_type');
		$this->db->from('listings l');
		$this->db->join('users u', 'u.id = l.users_id', 'left');
		$this->db->join('property_types pt', 'pt.id = l.property_type', 'left');
		$this->db->where('users_id', get_session('user_id'));
		$this->db->where('purpose', $type);
		$this->db->where('is_completed', 'Y');
		$this->db->order_by('l.created_at DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getUserListingsByUniqueID($unique_id){
		$this->db->select('u.*, l.*, pt.name as property_type');
		$this->db->from('listings l');
		$this->db->join('users u', 'u.id = l.users_id', 'left');
		$this->db->join('property_types pt', 'pt.id = l.property_type', 'left');
		$this->db->where('l.users_id', get_session('user_id'));
		$this->db->where('l.unique_id', $unique_id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function deleteProperty($id){
		$this->db->where('unique_id', $id);
		$this->db->delete('listings');
	}

	public function getFavouriteListings(){
		$this->db->select('u.*, l.*, pt.name as property_type, li.image_name, u.unique_id as agent_unique_id');
		$this->db->from('favourite_listings fl');
		$this->db->join('listings l', 'l.id = fl.listing_id', 'left');
		$this->db->join('listing_images li', 'li.listing_id = l.id', 'left');
		$this->db->join('users u', 'u.id = l.users_id', 'left');
		$this->db->join('property_types pt', 'pt.id = l.property_type', 'left');
		$this->db->where('fl.user_id', get_session('user_id'));
		$this->db->where('l.is_completed', 'Y');
		$this->db->group_by('fl.listing_id');
		$query = $this->db->get();
		return $query->result_array();
	}

}