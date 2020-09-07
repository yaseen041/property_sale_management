<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public $profileImage;
	public $agencyImage;

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('user_logged_in'))
		{
			redirect(base_url());
		}
		$this->load->model('dashboard_model');
	}
	public function index()
	{	
		$data['user_detail'] = $this->dashboard_model->get_user_detail();
		$this->load->view('dashboard' , $data);
	}
	public function dashboard()
	{	
            is_user_loggedin();
            $data['user_detail'] = $this->dashboard_model->get_user_detail();
            $this->load->view('dashboard' , $data);
	}
	public function my_bookings()
	{	
		$data['user_detail'] = $this->dashboard_model->get_user_detail();
		$this->load->view('my_bookings' , $data);
	}
	public function profile()
	{	
		$data['user_detail'] = $this->dashboard_model->get_user_detail();
		$this->load->view('profile' , $data);
	}

	public function edit_profile()
	{	
		$data['user_detail'] = $this->dashboard_model->get_user_detail();
		$this->load->view('edit_profile' , $data);
	}

	public function settings()
	{	
		$data['user_detail'] = $this->dashboard_model->get_user_detail();
		$this->load->view('settings' , $data);
	}

	public function inbox()
	{	
		$data['user_detail'] = $this->dashboard_model->get_user_detail();
		$this->load->view('inbox' , $data);
	}

	public function listings()
	{	
                is_user_loggedin();
		$data['sales'] = $this->dashboard_model->getUserListings('sale');
		$data['rents'] = $this->dashboard_model->getUserListings('rent');
		$data['students'] = $this->dashboard_model->getUserListings('student');
		$this->load->view('my_listings' , $data);
	}

	public function listing_detail($unique_id){
		if (empty($unique_id)) {
			redirect(base_url().'user/listings');
		}
		$data['listing'] = $this->dashboard_model->getUserListingsByUniqueID($unique_id);
		if (empty($data['listing'])) {
			redirect(base_url().'user/listings');
		}
		$this->load->view('user/listing_detail', $data);
	}

	public function uploadImage($name){
		$config['upload_path'] = './uploads/images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name']  = true;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload($name)){
			// $arr = array(
			// 	'status' => 'error',
			// 	'response' => $this->upload->display_errors()
			// );
			$arr = "";
		}else{
			// $arr = array(
			// 	'status' => 'success',
			// 	'response' => $this->upload->data()
			// );
			$data = $this->upload->data();
			$arr = $data['file_name'];
		}
		return $arr;
	}

	public function update_user()
	{
		$data = $_POST;
		// echo "<pre>";
		// print_r($_FILES);
		$this->form_validation->set_rules('first_name', 'First name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('last_name', 'Last name', 'trim|required|xss_clean');
		// $this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
		// $this->form_validation->set_rules('dob', 'Date of birth', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'Phone number', 'trim|required|xss_clean');
		// $this->form_validation->set_rules('language', 'Preferred language', 'trim|required|xss_clean');
		// $this->form_validation->set_rules('currency', 'Preferred currency', 'trim|required|xss_clean');
		// $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('about', 'Describe yourself', 'trim|required|xss_clean');
//		$this->form_validation->set_rules('agency_name', 'Agency name', 'trim|required|xss_clean');
//		$this->form_validation->set_rules('agency_website', 'Agency website', 'trim|required|xss_clean');

		if ($this->form_validation->run($this) == FALSE)
		{
			$finalResult = array('msg' => 'error', 'response'=>validation_errors());
			echo json_encode($finalResult);
			exit;
		}else{
			$data['profile_image'] = $this->uploadImage('profile_image');
			$data['agency_image'] = $this->uploadImage('agency_image');
			// echo "<pre>";
			// print_r($data);exit;
			// if ($data['profile_image']['status'] == "error") {
			// 	$finalResult = array('msg' => 'error', 'response' => $data['profile_image']['response']);
			// 	// $finalResult = array('msg' => 'error', 'response' => "There was an error uploading profile image, Upload again.");
			// 	echo json_encode($finalResult);
			// 	exit;
			// }
			// if ($data['agency_image']['status'] == "error") {
			// 	$finalResult = array('msg' => 'error', 'response' => $data['agency_image']['response']);
			// 	echo json_encode($finalResult);
			// 	exit;
			// }
			$status = $this->dashboard_model->update_details($data);
			if($status){
				$finalResult = array('msg' => 'success', 'response'=>'<p>Your details successfully updated!</p>');
				echo json_encode($finalResult);
				exit;
			}else{
				$finalResult = array('msg' => 'error', 'response'=>'<p>Something went wrong!</p>');
				echo json_encode($finalResult);
				exit;
			}
			
		}
	}


	public function update_password()
	{
		$data = $_POST;
		$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|xss_clean|callback_check_old_password');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('c_password', 'Confirm Password', 'trim|required|matches[password]|xss_clean');
		if ($this->form_validation->run($this) == FALSE)
		{
			$finalResult = array('msg' => 'error', 'response'=>validation_errors());
			echo json_encode($finalResult);
			exit;
		}else{
			$status = $this->dashboard_model->update_password($data);
			if($status){

				$this->send_password_email();

				$finalResult = array('msg' => 'success', 'response'=>'<p>Your Password Successfully Changed!</p>');
				echo json_encode($finalResult);
				exit;
			}else{
				$finalResult = array('msg' => 'error', 'response'=>'<p>You cannot use your old password.</p>');
				echo json_encode($finalResult);
				exit;
			}
		}
	}
	public function check_old_password()
	{
		$data = $_POST;
		$status = $this->dashboard_model->check_old_password($data);
		if ($status > 0)
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_old_password', 'Old Password is Wrong.');
			return FALSE;
		}	
	}

	public function update_dp()
	{

		$data['profile_dp'] = '';

		if(!empty($_FILES['profile_dp']['name'])){

			$config['upload_path']          = FCPATH.'assets/profile_pictures/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 5000;
			$config['max_width']            = 600;
			$config['max_height']           = 600;
			$config['encrypt_name'] 		= TRUE;

			$this->load->library('upload', $config);

			if($this->upload->do_upload('profile_dp'))
			{
				$upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
				$data['profile_dp'] = $upload_data['file_name'];

				$status = $this->dashboard_model->update_profile_dp($data);
				if ($status) {

					$array=array(
						'profile_pic'=>$data['profile_dp'],
					);

					$this->session->set_userdata($array);

					$response_arr = array(
						'msg'=> 'success',
						'response'=> 'Your Profile picture successfully updated.',
					);
					echo json_encode($response_arr);
					exit;

				}else{
					$finalResult = array('msg' => 'error', 'response'=>"Something went wrong.");
					echo json_encode($finalResult);
					exit;
				}

			}else{
				$finalResult = array('msg' => 'error', 'response'=> $this->upload->display_errors());
				echo json_encode($finalResult);
				exit;
			} 

		} else {
			$finalResult = array('msg' => 'error', 'response'=>"Please select a picture.");
			echo json_encode($finalResult);
			exit;
		}
		
	}

	public function set_price_publish()
	{
		$data = $_POST;

		$status = $this->dashboard_model->set_price_publish($data);

		if($status > 0){

			$this->send_email_price_set($data);

			$finalResult = array('msg' => 'success', 'response'=>"Price successfully set and storage published.");
			echo json_encode($finalResult);
			exit;

		} else {
			$finalResult = array('msg' => 'error', 'response'=>"Something went wrong please try again.");
			echo json_encode($finalResult);
			exit;
		}
	}

	public function send_password_email()
	{
		$data = array();
		$to = get_session('email');
		$subject = "Password Changed";

		$body = $this->load->view('change_pass_email.php' , $data,TRUE);
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= 'From: <no-reply@explorelogics.com>' . "\r\n";
		
         //Send mail 
		// @mail($to,$subject,$body,$headers);
		send_mail_func($to,$subject,$body);
	}

	public function favourites(){
		$data['listing'] = $this->dashboard_model->getFavouriteListings();
		$this->load->view('user/favourite-properties', $data);
	}

	public function deleteAccount(){
		$listing_images = $this->dashboard_model->deleteAllListings();

		//.. deleting listing images
		foreach ($listing_images as $key => $list) {
			if(file_exists(FCPATH.'assets/listing_images/'.$list['image_name'])){
				@unlink(FCPATH.'assets/listing_images/'.$list['image_name']);
			}
		}
		
		$this->dashboard_model->deleteAccount();
		$this->session->unset_userdata('user_logged_in');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('profile_pic');
		$this->session->unset_userdata('user_status');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('user_id');
		$finalResult = array('msg' => 'success', 'response'=> "Account has been deleted successfully.");
		echo json_encode($finalResult);
		exit;
	}

	public function updateEmailAlert(){
		$data = $this->input->post();
		$this->dashboard_model->updateEmailAlert($data['value']);
		$finalResult = array('msg' => 'success', 'response'=> "Email alert preference has been updated successfully.");
		echo json_encode($finalResult);
		exit;
	}

	public function deleteProperty(){
		$data = $this->input->post();
		$this->dashboard_model->deleteProperty($data['id']);
		$finalResult = array('msg' => 'success', 'response'=> "Propery has been deleted successfully.");
		echo json_encode($finalResult);
		exit;

	}

}