<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('admin/user_model');
		$this->load->model('admin/listing_model');
		$admins = $this->session->userdata('admins');
		if(!$admins['is_user_login'])
		{
			redirect(base_url().'admin/login');
		}
	}

	public function index(){
		$data['users'] = count($this->user_model->getUsers());
		$data['listings'] = count($this->listing_model->getActiveListings());
		$this->load->view('admin/dashboard',$data);
	}	

}

