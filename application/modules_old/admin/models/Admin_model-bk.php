<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	public function login_credential($email,$pass){
		$hash_pass="password('".$pass."')"; 
		$email="'".$email."'";
		$query=$this->db->query("SELECT * FROM admin_users WHERE email= $email AND password = $hash_pass");
		if($query->num_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	public function forget($email){
		$this->db->select('*');
		$this->db->where('email',$email);
		$query=$this->db->get('admins');
		if($query->num_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	public function getApplications(){
		$this->db->select('*');
		$this->db->from('buyer_application');
		$where = "is_delete = 'N' and (is_complete = 'Y' or is_approved = 'Y')";
		$this->db->where($where);

		$query = $this->db->get();
		return $query->result_array();
	}

	function getSellers(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_roll','seller');
		$this->db->where('is_delete','N');

		$query = $this->db->get();
		return $query->result_array();
	}

	function getBuyers(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_roll','buyer');
		$this->db->where('is_delete','N');

		$query = $this->db->get();
		return $query->result_array();
	}

	function getProperties(){
		$this->db->select('*');
		$this->db->from('sell_basic');
		$this->db->where('is_delete','N');

		$query = $this->db->get();
		return $query->result_array();
	}

}	