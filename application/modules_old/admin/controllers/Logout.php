<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	

	class Logout extends CI_Controller {

		

		public function __construct()

		{

			parent::__construct();

			$this->load->model('admin_model');	

		}

		public function index(){

			$admins = $this->session->userdata('admins');

			if($admins['is_user_login'])

			{

				$this->session->sess_destroy();

				redirect(base_url()."admin/login");

			}

			else {

				redirect(base_url()."admin/login");

			}

		}
	}

