<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Listing extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('listing_model');
        $this->load->model('home/home_model');
        $this->load->model('user/dashboard_model');
        $this->load->library("pagination");
    }

    public function step1($unique_id = '') {
        is_user_loggedin();
        $data['unique_id'] = $unique_id;
        if (get_session('listing_id')) {
            $data['list'] = singleRow('listings', '*', 'id = '.get_session('listing_id'));
        }
        /*
        if ($unique_id != NULL) {
            $has_detail = $this->listing_model->check_detail($unique_id);
            if ($has_detail == 0) {
                show_404();
            }
            $data['stp_detail'] = $this->listing_model->get_detail($unique_id);
            $s_size_type = get_meta_value('storage_size_type', $data['stp_detail']['id']);
            $data['storage_types'] = $this->listing_model->get_storage_types($s_size_type);
        } else {
            $data['stp_detail'] = array();
        }
        */
        $this->load->view('step1', $data);
    }

    public function step2($unique_id = '') {
        $data['unique_id'] = $unique_id;    
        if (get_session('listing_id')) {
            $data['list'] = singleRow('listings', '*', 'id = '.get_session('listing_id'));
        }
        /*
        if (!empty($unique_id)) {
            $data['unique_id'] = $unique_id;
            $has_detail = $this->add_listing_model->check_detail($unique_id);
            if ($has_detail == 0) {
                show_404();
            }
        } else {
            redirect('listing/storage/step1');
        }
        $data['stp_detail'] = $this->add_listing_model->get_detail($unique_id);
        $data['images'] = $this->add_listing_model->get_storage_images($data['stp_detail']['id']);
         * 
         */
        $this->load->view('step2', $data);
    }

    public function step3($unique_id = '') {
        $data['unique_id'] = $unique_id;
        if (get_session('listing_id')) {
            $data['list'] = singleRow('listings', '*', 'id = '.get_session('listing_id'));
        }
        $data['user_detail'] = $this->dashboard_model->get_user_detail();

        /*
        if (!empty($unique_id)) {
            $data['unique_id'] = $unique_id;
            $has_detail = $this->add_listing_model->check_detail($unique_id);
            if ($has_detail == 0) {
                show_404();
            }
        } else {
            redirect('listing/storage/step1');
        }
        $data['stp_detail'] = $this->add_listing_model->get_detail($unique_id);
        $data['images'] = $this->add_listing_model->get_storage_images($data['stp_detail']['id']);
         * 
         */
        $this->load->view('step3', $data);
    }

    public function step4($unique_id = '') {
        $data['unique_id'] = $unique_id;
        // show($this->input->post());exit;
        if (get_session('listing_id')) {
            $data['list'] = singleRow('listings', '*', 'id = '.get_session('listing_id'));
        }
        /*
        if (!empty($unique_id)) {
            $data['unique_id'] = $unique_id;
            $has_detail = $this->add_listing_model->check_detail($unique_id);
            if ($has_detail == 0) {
                show_404();
            }
        } else {
            redirect('listing/storage/step1');
        }
        $data['stp_detail'] = $this->add_listing_model->get_detail($unique_id);
        $data['images'] = $this->add_listing_model->get_storage_images($data['stp_detail']['id']);
         * 
         */
        $this->load->view('step4', $data);
    }

    public function edit_listing($unique_id) {
        if (!empty($unique_id)) {
            $data['unique_id'] = $unique_id;
            $has_detail = $this->listing_model->get_detail($unique_id);
            if ($has_detail == 0) {
                show_404();
            }
        } else {
            redirect('listing/listings');
        }
        $data['listing_detail'] = $has_detail;
        $data['images'] = $this->listing_model->get_list_images($data['listing_detail']['id']);        
        
        $this->load->view('edit_listing', $data);
    }

    public function submit_updated_data() {
        $data = (@$_POST['form_id']);
        parse_str($this->input->post('form_id'), $data);
        $data['property_desc'] = $this->input->post('property_desc');
        $_POST = $data;
      
        // show($data);
        if ($data) {
            if (!get_session('user_logged_in')) {
                $finalResult = array('msg' => 'not_login', 'response' => 'Please login to proceed.');
                echo json_encode($finalResult);
                exit;
            } else {

                // $this->form_validation->set_rules('build_year', 'Build Year', 'trim|required');
                $this->form_validation->set_rules('purpose', 'Purpose', 'trim|required');
                $this->form_validation->set_rules('property_type', 'Property Type', 'trim|required');
                $this->form_validation->set_rules('location', 'Location', 'trim|required');
                $this->form_validation->set_rules('property_title', 'Property Title', 'trim|required');
                $this->form_validation->set_rules('property_price', 'Price', 'trim|required');
                $this->form_validation->set_rules('no_of_bedrooms', 'Number Of Bedrooms', 'trim|required');
                // $this->form_validation->set_rules('no_of_living_rooms', 'Number Of Living Rooms', 'trim|required');
                $this->form_validation->set_rules('no_of_bathrooms', 'Number Of Bathrooms', 'trim|required');
                $this->form_validation->set_rules('property_desc', 'Description', 'trim|required');
                $this->form_validation->set_rules('contact_person', 'Contact Person', 'trim|required');
                $this->form_validation->set_rules('contact_phone', 'Contact Phone', 'trim|required');
                $this->form_validation->set_rules('contact_email', 'Contact Email', 'trim|required');
                if ($this->form_validation->run() == FALSE)
                {
                    $finalResult = array('msg' => 'error', 'response'=>validation_errors());
                    echo json_encode($finalResult);
                    exit;
                }
                if (empty($data['lat_long'])) {
                    $finalResult = array('msg' => 'error', 'response' => 'Invalid Location.');
                    echo json_encode($finalResult);
                    exit;
                }
                if(!empty($data['lat_long'])){
                    $location = explode(', ', $data['lat_long']);
                    $data['latitude'] = $location[0];
                    $data['longitude'] = $location[1];
                }
                
                /*
                if(is_array($_FILES) && $_FILES['file']['name'][0] == 'blob'){
                    $finalResult = array('msg' => 'error', 'response' => 'Images are required.');
                    echo json_encode($finalResult);
                    exit;
                }*/
                $fileList = array(); //!empty($_FILES['file']
                $uploadedFileData=array();
                if (is_array($_FILES['file']) && $_FILES['file']['name'][0] != 'blob') {
                //if (is_array($_FILES['file']) && !empty($_FILES['file'])) {
                    $listing_detail_file = $_FILES['file'];
                    foreach ($listing_detail_file['name'] as $key => $image) {
                        $_FILES['listing_file[]']['name'] = $listing_detail_file['name'][$key];
                        $_FILES['listing_file[]']['type'] = $listing_detail_file['type'][$key];
                        $_FILES['listing_file[]']['tmp_name'] = $listing_detail_file['tmp_name'][$key];
                        $_FILES['listing_file[]']['error'] = $listing_detail_file['error'][$key];
                        $_FILES['listing_file[]']['size'] = $listing_detail_file['size'][$key];
                        $fileList[] = $listing_detail_file['name'][$key];
                        $uploadedFileData[] = fileUpload('listing_file[]',"listing_images",'*');
                    }
                }
                
                $uploadedFileNames = array_column($uploadedFileData,'file_name');
                $data['allfiles'] = $uploadedFileNames;    
                foreach ($data['allfiles'] as $file) {
                    $filename = './assets/listing_images/'.$file;
                    $this->correctImageOrientation($filename);
                }            
                //$data['allfiles'] = $fileList;
                $list_id = $this->listing_model->update_listing($data);
                
                $finalResult = array('msg' => 'success', 'response' => 'Your listing has been updated successfully!');
                echo json_encode($finalResult);
                exit;
            }
        }
    }
    function rotate_image() {
        $filename = './assets/listing_images/75deb4e2f7fe74826dcc5bfdddb53e0d.JPG';
        $this->correctImageOrientation($filename);
    }   
    function correctImageOrientation($filename) {
      if (function_exists('exif_read_data')) {
        $exif = @exif_read_data($filename);
        if($exif && isset($exif['Orientation'])) {
          $orientation = $exif['Orientation'];
          if($orientation != 1){
            $img = imagecreatefromjpeg($filename);
            $deg = 0;
            switch ($orientation) {
              case 3:
              $deg = 180;
              break;
              case 6:
              $deg = 270;
              break;
              case 8:
              $deg = 90;
              break;
          }
          if ($deg) {
              $img = imagerotate($img, $deg, 0);       
          }
            // then rewrite the rotated image back to the disk as $filename
          imagejpeg($img, $filename, 95);
          } // if there is some rotation necessary
        } // if have the exif orientation info
      } // if function exists     
  }
  public function deleteImg(){
     $data = $_POST;
     $this->listing_model->deleteImg($data);
 }

 public function submit_data() {
    $data = $_POST;
  
    if ($data) {
        if (!get_session('user_logged_in')) {
            $finalResult = array('msg' => 'not_login', 'response' => 'Please login to proceed.');
            echo json_encode($finalResult);
            exit;
        } else {
                /*
                if (!empty($_POST['unique_id'])) {
                    $record_exist = $this->add_listing_model->check_detail($_POST['unique_id']);
                    //echo $has_detail; exit;
                    if (!$record_exist) {
                        $finalResult = array('msg' => 'error', 'response' => "Something went wrong please reload page and try again.");
                        echo json_encode($finalResult);
                        exit;
                    }
                }
                */
                switch ($data['form_id']) {
                    case 'step1':

                    // $this->form_validation->set_rules('build_year', 'Build Year', 'trim|required');
                    $this->form_validation->set_rules('purpose', 'Purpose', 'trim|required');
                    $this->form_validation->set_rules('property_type', 'Property Type', 'trim|required');
                    $this->form_validation->set_rules('location', 'Location', 'trim|required');
                    if ($this->form_validation->run() == FALSE)
                    {
                        $finalResult = array('msg' => 'error', 'response'=>validation_errors());
                        echo json_encode($finalResult);
                        exit;
                    }
                    if (empty($data['lat_long'])) {
                        $finalResult = array('msg' => 'error', 'response' => 'Invalid Location.');
                        echo json_encode($finalResult);
                        exit;
                    }
//                        if (isset($_POST['unique_id']) && $_POST['unique_id'] != '') {
//                            $data['unique_id'] = $_POST['unique_id'];
//                            $list_id = $this->listing_model->update_stp1($data);
//                            $data['stp_detail'] = $this->listing_model->get_detail($data['unique_id']);
//
//                        } else {
                            //$data['unique_id'] = $_POST['unique_id'];
                    if(!empty($data['lat_long'])){
                        $location = explode(', ', $data['lat_long']);
                        $data['latitude'] = $location[0];
                        $data['longitude'] = $location[1];
                    }
                    $list_id = $this->listing_model->insert_stp1($data);
                    $data['stp_detail'] = array();

                    set_session('listing_id', $list_id);
                    $finalResult = array('msg' => 'success', 'response' => 'Step1 Information Saved! Redirecting to step 2.', 'new_url' => base_url() . "listing/step2");
                    echo json_encode($finalResult);
                    exit;

//                        }
                    break;
                    case 'step2':
//                        if (isset($_POST['unique_id']) && $_POST['unique_id'] != '') {
//                            $data['unique_id'] = $_POST['unique_id'];
//                            $list_id = $this->listing_model->update_stp1($data);
//                            $data['stp_detail'] = $this->listing_model->get_detail($data['unique_id']);
//                        } else {

                    $this->form_validation->set_rules('property_title', 'Property Title', 'trim|required');
                    $this->form_validation->set_rules('property_price', 'Price', 'trim|required');
                    $this->form_validation->set_rules('no_of_bedrooms', 'Number Of Bedrooms', 'trim|required');
                    // $this->form_validation->set_rules('no_of_living_rooms', 'Number Of Living Rooms', 'trim|required');
                    $this->form_validation->set_rules('no_of_bathrooms', 'Number Of Bathrooms', 'trim|required');
                    $this->form_validation->set_rules('property_desc', 'Description', 'required');
                    if ($this->form_validation->run() == FALSE)
                    {
                        $finalResult = array('msg' => 'error', 'response'=>validation_errors());
                        echo json_encode($finalResult);
                        exit;
                    }
                    $list_id = $this->listing_model->insert_stp2($data);
                    $data['stp_detail'] = array();

                    $finalResult = array('msg' => 'success', 'response' => 'Step2 Information Saved! Redirecting to step 3.', 'new_url' => base_url() . "listing/step3");
                    echo json_encode($finalResult);
                    exit;
//                        }
                    break;
                    case 'step3':
//                        if (isset($_POST['unique_id']) && $_POST['unique_id'] != '') {
//                            $data['unique_id'] = $_POST['unique_id'];
//                            $list_id = $this->listing_model->update_stp1($data);
//                            $data['stp_detail'] = $this->listing_model->get_detail($data['unique_id']);
//                        } else {

                    $this->form_validation->set_rules('contact_person', 'Contact Person', 'trim|required');
                    $this->form_validation->set_rules('contact_phone', 'Contact Phone', 'trim|required');
                    $this->form_validation->set_rules('contact_email', 'Contact Email', 'trim|required');
                    if ($this->form_validation->run() == FALSE)
                    {
                        $finalResult = array('msg' => 'error', 'response'=>validation_errors());
                        echo json_encode($finalResult);
                        exit;
                    }
                    $list_id = $this->listing_model->insert_stp3($data);
                    $data['stp_detail'] = array();

                    $finalResult = array('msg' => 'success', 'response' => 'Step3 Information Saved! Redirecting to step 4.', 'new_url' => base_url() . "listing/step4");
                    echo json_encode($finalResult);
                    exit;
//                        }
                    break;
                    case 'step4':
//                        if (isset($_POST['unique_id']) && $_POST['unique_id'] != '') {
//                            $data['unique_id'] = $_POST['unique_id'];
//                            $list_id = $this->listing_model->update_stp1($data);
//                            $data['stp_detail'] = $this->listing_model->get_detail($data['unique_id']);
//                        } else {
                    // echo "<pre>";
                    // print_r($_FILES);
                    // print_r($this->input->post());
                    // print_r(explode(',',$this->input->post('image_order')));exit;
                    $data['image_order'] = explode(',',$this->input->post('image_order'));
                    if(is_array($_FILES) && $_FILES['file']['name'][0] == 'blob'){
                        $finalResult = array('msg' => 'error', 'response' => 'Images are required.');
                        echo json_encode($finalResult);
                        exit;
                    }
                    
                    $fileList = array();
                    $uploadedFileData=array();
                    if (is_array($_FILES['file']) && !empty($_FILES['file'])) {
                        $listing_detail_file = $_FILES['file'];
                        foreach ($listing_detail_file['name'] as $key => $image) {
                            $_FILES['listing_file[]']['name'] = $listing_detail_file['name'][$key];
                            $_FILES['listing_file[]']['type'] = $listing_detail_file['type'][$key];
                            $_FILES['listing_file[]']['tmp_name'] = $listing_detail_file['tmp_name'][$key];
                            $_FILES['listing_file[]']['error'] = $listing_detail_file['error'][$key];
                            $_FILES['listing_file[]']['size'] = $listing_detail_file['size'][$key];
                            $fileList[] = $listing_detail_file['name'][$key];
                            $uploadedFileData[] = fileUpload('listing_file[]',"listing_images",'*');
                        }
                    }
                    
                    $uploadedFileNames = array_column($uploadedFileData,'file_name');
                    $data['allfiles'] = $uploadedFileNames;
                    foreach ($data['allfiles'] as $file) {
                        $filename = './assets/listing_images/'.$file;
                        $this->correctImageOrientation($filename);
                    }
                    //$data['allfiles'] = $fileList;
                    
                    $listRecord = singleRow('listings','*', 'id = '.$this->session->userdata('listing_id'));
                    $list_id = $this->listing_model->insert_stp4($data);
                    if (isset($data['previewBtn'])) {
                        $finalResult = array('msg' => 'success', 'response' => 'Your listing has been saved successfully!', 'url' => base_url().'listing/preview/'.$listRecord['unique_id']);
                    }else{
                        $finalResult = array('msg' => 'success', 'response' => 'Your listing has been saved successfully!', 'url' => base_url().'user/listings');
                    }
                    
                    $this->session->unset_userdata('listing_id');                    
                    echo json_encode($finalResult);
                    exit;
                    break;
                }
            }
        }
    }
    
    public function searchCriteria(){
        $data = $_POST;
        $arr = explode(", ", $data['lat_long']);
        $lat = @trim($arr[0]);
        $long = @trim($arr[1]);
        
        /*
        if ($data['lat_long'] == '') {
            $finalResult = array('msg' => 'error', 'response' => 'Please Select a Valid Location!');
            echo json_encode($finalResult);
            exit;
            
        } else {
         * 
         */                    
            $lat_long = !empty($data['lat_long']) ? '&lat='.$lat.'&long='.$long : "";
            $within_miles = !empty($data['within_miles']) ? '&within_miles='.$data['within_miles'] : "";
            $property_type = !empty($data['property_type']) ? "&property_type=". str_replace(" ","-",strtolower($data['property_type'])) : "";
            $bedrooms = !empty($data['no_of_bedrooms']) ? "&bedrooms=".$data['no_of_bedrooms'] : "";
            $bathrooms = !empty($data['no_of_bathrooms']) ? "&bathrooms=".$data['no_of_bathrooms'] : "";
            $living_rooms = !empty($data['no_of_living_rooms']) ? "&living_rooms=".$data['no_of_living_rooms'] : "";
            $keywords = !empty($data['keywords']) ? "&keywords=".$data['keywords'] : "";
            $price_range = !empty($data['price_range']) ? "&price_range=".$data['price_range'] : "";

            $url = base_url().'listing/search_listing?purpose='.$data['purpose'].$lat_long.$within_miles.$property_type.$bedrooms.
            $bathrooms.$living_rooms.$living_rooms.$keywords.$price_range;


            set_session('property_location', $data['property_location']);

            $finalResult = array('msg' => 'success', 'new_url' => $url);
            echo json_encode($finalResult);
            exit;
//        }
        }

        public function search_listing($page = '0'){
            $data = $_GET;
            $per_page=10;
            if(!empty($data)){
                $data['listings'] = array();
                $data['property_types'] = $this->home_model->getAllPropertyTypes();
                $listing_result = $this->listing_model->search_listing($data,$per_page,$page);
                //...if within x miles condition is on
                if(!empty($data['lat']) && !empty($data['long']) && !empty($data['within_miles']) && urlencode($data['within_miles']) != '25+'){
                    foreach ($listing_result as $list) {
                        if($list['measured_distance'] <= $data['within_miles']){
                            $data['listings'][] = $list;
                        }
                    }
                }else{
                    $data['listings'] = $listing_result;
                }
                
                //... listings for map records
                $data['map_listings'] = array();
                foreach ($data['listings'] as $key => $value) {
                    $data['map_listings'][$key]['unique_id'] = $value['unique_id'];
                    $data['map_listings'][$key]['title'] = str_replace("'" , "" , $value['title']);
                    $data['map_listings'][$key]['latitude'] = $value['latitude'];
                    $data['map_listings'][$key]['longitude'] = $value['longitude'];
                    $data['map_listings'][$key]['property_type'] = $value['property_type'];
                    $data['map_listings'][$key]['location'] = $value['location'];
                    $data['map_listings'][$key]['image_name'] = $value['image_name'];
                    $data['map_listings'][$key]['price'] = $value['price'];
                    $data['map_listings'][$key]['purpose'] = $value['purpose'];
                }
                
                //... pagination start
                $config = array();
                $config["base_url"] = base_url('listing/search_listing');
                $data['total_rows'] = count($this->listing_model->count_search_listing($data));
                $config['total_rows'] = $data['total_rows'];
                $config['prefix'] = '/';
                $config["per_page"] = $per_page;
                $config['suffix'] = '/?'.$_SERVER['QUERY_STRING'];
                $config['uri_segment'] = 3;
                $config['first_url'] = site_url('listing/search_listing/?'.$_SERVER['QUERY_STRING'].'');
                //$config['use_page_numbers'] = TRUE;
                $config['num_links'] = 5;
                $config['prev_link'] = '&laquo';
                $config['prev_tag_open'] = '<a class="">';
                $config['prev_tag_close'] = '</a>';
                $config['next_link'] = '&raquo';
                $config['next_tag_open'] = '<a class="">';
                $config['next_tag_close'] = '</a>';
                $config['cur_tag_open'] = '<span class="current">';
                $config['cur_tag_close'] = '</span>';

                $this->pagination->initialize($config);
                //show($listing_result);exit;
                $start_page = $this->uri->segment(3);
                if(isset($start_page)){
                    $page = $start_page;
                }else{
                    $page = 0;
                }
                //$page = 2;
                $data['links'] = $this->pagination->create_links();
                //... pagination end
                
                $this->load->view('search_property',$data);
            }
        }


        public function sort_listing($page = '0'){
            $per_page=10;

            $post_data = $this->input->post();
            if(!empty($post_data)){
                parse_str($_POST['search_url'], $parameters_data);

                $data = array_merge($post_data,$parameters_data);

                $data['listings'] = array();
                $data['property_types'] = $this->home_model->getAllPropertyTypes();

                switch ($data['sort_on']) {
                    case 'price':
                    $order_by = "price ".$data['order'];
                    break;
                    case 'time':
                    $order_by = "listings.created_at ".$data['order'];
                    break;
                }


                $listing_result = $this->listing_model->search_listing($data,$per_page,$data['page_number'],$order_by);
                //...if within x miles condition is on
                if(!empty($data['lat']) && !empty($data['long']) && !empty($data['within_miles']) && urlencode($data['within_miles']) != '25+'){
                    foreach ($listing_result as $list) {
                        if($list['measured_distance'] <= $data['within_miles']){
                            $data['listings'][] = $list;
                        }
                    }
                }else{
                    $data['listings'] = $listing_result;
                }

                //... pagination start
                $config = array();
                $config["base_url"] = base_url('listing/search_listing');
                $data['total_rows'] = count($this->listing_model->count_search_listing($data));
                $config['total_rows'] = $data['total_rows'];
                $config['prefix'] = '/';
                $config["per_page"] = $per_page;
                $config['suffix'] = '/?'.$_SERVER['QUERY_STRING'];
                $config['uri_segment'] = 3;
                $config['first_url'] = site_url('listing/search_listing/?'.$_SERVER['QUERY_STRING'].'');
                        //$config['use_page_numbers'] = TRUE;
                $config['num_links'] = 5;
                $config['prev_link'] = '&laquo';
                $config['prev_tag_open'] = '<a class="">';
                $config['prev_tag_close'] = '</a>';
                $config['next_link'] = '&raquo';
                $config['next_tag_open'] = '<a class="">';
                $config['next_tag_close'] = '</a>';
                $config['cur_tag_open'] = '<span class="current">';
                $config['cur_tag_close'] = '</span>';

                $this->pagination->initialize($config);
                //show($listing_result);exit;
                $start_page = $this->uri->segment(3);
                if(isset($start_page)){
                    $page = $start_page;
                }else{
                    $page = 0;
                }
                //$page = 2;
                $data['links'] = $this->pagination->create_links();
                //... pagination end
                $htmlresponse = $this->load->view('sorted_listings',$data, true);
                $response_arr = array(
                    'msg' => 'success',
                    'response' => $htmlresponse,
                );
                echo json_encode($response_arr);
            }
        }

    // --------------   Code not used yet -----------------------------
        public function review_list($unique_id = '') {
            if (!empty($unique_id)) {
                $data['unique_id'] = $unique_id;
                $has_detail = $this->add_listing_model->check_detail($unique_id);
                if ($has_detail == 0) {
                    show_404();
                }
            }
            $data['list_detail'] = $this->add_listing_model->get_complete_detail($unique_id);
            $data['list_images'] = $this->add_listing_model->get_list_images($data['list_detail']['id']);
            $data['basic_amenities'] = $this->add_listing_model->get_storage_amenities($data['list_detail']['id'], '0');
            $data['safety_amenities'] = $this->add_listing_model->get_storage_amenities($data['list_detail']['id'], '1');
            $data['basic_space_rules'] = $this->add_listing_model->get_space_rules(0);
            $data['rules'] = $this->add_listing_model->get_list_rules($data['list_detail']['id']);
            $data['extra_space_rules'] = $this->add_listing_model->get_storage_space_rules($data['list_detail']['id'], '1');
            $data['additional_rules'] = $this->add_listing_model->get_storage_additional_rules($data['list_detail']['id']);
            $this->load->view('review_list', $data);
        }

        public function storage_publish() {
            $unique_id = $_POST['unique_id'];
            $status = $this->add_listing_model->storage_publish($unique_id);
            if ($status > 0) {
                $finalResult = array('msg' => 'success', 'response' => "Successfully published");
                echo json_encode($finalResult);
                exit;
            } else {
                $finalResult = array('msg' => 'error', 'response' => "Something went wrong please try again.");
                echo json_encode($finalResult);
                exit;
            }
        }

        public function storage_unpublish() {
            $unique_id = $_POST['unique_id'];
            $status = $this->add_listing_model->storage_unpublish($unique_id);
            if ($status > 0) {
                $finalResult = array('msg' => 'success', 'response' => "Successfully unpublished");
                echo json_encode($finalResult);
                exit;
            } else {
                $finalResult = array('msg' => 'error', 'response' => "Something went wrong please try again.");
                echo json_encode($finalResult);
                exit;
            }
        }

        public function send_email($data) {
            $to = admin_email();
            $subject = "New Storage Space Added";
            $data['list_detail'] = $this->add_listing_model->get_detail($data['unique_id']);
            $body = $this->load->view('new_storage_email.php', $data, TRUE);
        // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // More headers
            $headers .= 'From: <no-reply@explorelogics.com>' . "\r\n";
        //Send mail 
            @mail($to, $subject, $body, $headers);
        }

        public function detail($unique_id){
            if (empty($unique_id)) {
                redirect(base_url());
            }
            $data['listing'] = $this->listing_model->getListingByUniqueID($unique_id);
            if (empty($data['listing'])) {
                redirect(base_url());
            }
            $this->load->view('listing/listing_detail', $data);
        }

        public function leaveMessage(){
            $data = $this->input->post();
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('message', 'Message', 'required');
            if ($this->form_validation->run() == false) {
                $finalResult = array('msg' => 'error', 'response' => validation_errors());
                echo json_encode($finalResult);
                exit;
            } else {
                $listing = $this->listing_model->getListingByUniqueID($data['listing_id']);
                $data['subject'] = "Message against your property!";
                $data['admin'] = false;
                $data['body'] = "<br>
                Someone has left a message against your property \"<b>".ucfirst($listing['title'])."\"</b>, Details are given below:
                <br><br>
                <strong>Name: </strong>".$data['name']."<br>
                <strong>Email: </strong>".$data['email']."<br>
                <strong>Message: </strong>".$data['message']."
                <br><br>";
                $body = $this->load->view('common/email_template', $data, true);
                send_mail_func($listing['contact_email'],$data['subject'], $body);

                $finalResult = array('msg' => 'success', 'response' => "Your message has been sent to the agency / individual.");
                echo json_encode($finalResult);
                exit;
            }
        }

        public function preview($unique_id){
            if (empty($unique_id)) {
                redirect(base_url());
            }
            $data['listing'] = $this->listing_model->getListingByUniqueID($unique_id);
            if (empty($data['listing'])) {
                redirect(base_url());
            }
            $this->load->view('listing/listing_preview', $data);
        }

        public function updateImg(){
            $data = $this->input->post();
            $this->listing_model->updateImg($data);
        }

    }
