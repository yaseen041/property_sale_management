<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');class Login extends CI_Controller {		public function __construct()	{		parent::__construct();		$this->load->model('admin_model');		}		public function index()	{		$admins = $this->session->userdata('admins');		if($admins['is_user_login'])		{			redirect(base_url()."admin/admin");		}		else {			$this->load->view('admin/login');		}	}	public function login_credential(){		$data=$_POST;		$admins = $this->session->userdata('admins');		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');		$this->form_validation->set_rules('password', 'Password', 'required|trim');		if ($this->form_validation->run() == FALSE)		{			$this->load->view('admin/login');		}		else{						if($this->admin_model->login_credential($data['email'],$data['password']))			{				$where_arr = array('email' => $data['email']);				$id = singleRow('admin_users','*',$where_arr );				$admin_data = array(					'username' => $id['username'],					'email' => $id['email'],					'is_user_login' => TRUE,					'is_admin' => true,					'admin_id' => $id['userid']				);				$this->session->set_userdata(array("admins" => $admin_data));									redirect(base_url().'admin');			}			else{					//data['msg'] = 'Wrong username or password provided.';				$this->session->set_flashdata('credential_error','Wrong email or password provided'); 				redirect(base_url().'admin/login');			}					}			}	public function logout(){		$admins = $this->session->userdata('admins');		if($admins['is_user_login'])		{			$this->session->sess_destroy();			redirect(base_url()."admin/login");		}		else {			redirect(base_url()."admin/login");		}	}	public function forget(){						if($this->admin_model->forget($this->input->post('email'))){				// write code here for send mail to reset password			echo 'mail Send';		}		else{			$this->session->set_flashdata('forget','Your are not Register'); 			redirect(base_url().'admin/login');		}			}}