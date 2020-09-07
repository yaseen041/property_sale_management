<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	public function index()
	{

		$this->session->unset_userdata('user_logged_in');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('profile_pic');
		$this->session->unset_userdata('user_status');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('user_id');
                
                $this->session->set_flashdata('success_msg','Logout successfully!');
                
        redirect(base_url());
	}
}
