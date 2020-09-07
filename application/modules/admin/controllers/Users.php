<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin/user_model');
		if (!checkAdminLogin()) {
			redirect(base_url().'admin/login');
		}
	}

	public function index(){
		$data['details'] = $this->user_model->getUsers();
		// show($data);
		$this->load->view('admin/user/manage',$data);
	}

	public function delete($id){
		if (empty($id)) {
			$this->session->set_flashdata('error_msg','The URL you are trying to access is not valid!');
			redirect(base_url().'admin/users');
		}
		$this->user_model->deleteUser($id);
		$this->session->set_flashdata('success_msg','User deleted successfuly!');
		redirect(base_url().'admin/users');
	}

	public function view($id) {
		if (empty($id)) {
			$this->session->set_flashdata('error_msg','The URL you are trying to access is not valid!');
			redirect(base_url().'admin/users');
		}
		$data['user'] = $this->user_model->getUser($id);
		$data['listings'] = $this->user_model->getUserListings($id);
		// show($data);
		$this->load->view('admin/user/view',$data);
	}

}

/* End of file Users.php */
/* Location: ./application/modules/admin/controllers/Users.php */