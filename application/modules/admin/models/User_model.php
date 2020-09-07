<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	
	public function getSellers(){
		$this->db->select("*");
		$this->db->from('users');
		$this->db->where('user_roll','seller');
		$this->db->where('is_delete','N');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getUser($user_id){
		$this->db->select('*');
		$this->db->from('users u');
		$this->db->where('id',$user_id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getUserListings($user_id){
		$this->db->select('l.*, pt.name as property_type');
		$this->db->from('listings l');
		$this->db->join('property_types pt', 'pt.id = l.property_type', 'left');
		$this->db->where('users_id',$user_id);
		$this->db->where('is_completed','Y');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getUsers(){
		$this->db->select('*');
		$this->db->from('users u');
		$this->db->where('status', 1);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function uploadDocuments($user_id, $adminid, $file_data){
		$this->db->set('user_id', $user_id);
		$this->db->set('admin_id', $adminid);
		$this->db->set('file_type', $file_data['file_ext']);
		$this->db->set('file_name', $file_data['file_name']);
		$this->db->set('file_size', $file_data['file_size']);
		$this->db->set('custom_name', $file_data['custom_name']);
		$this->db->set('uploaded_by','admin');
		$this->db->set('uploaded_date',date('Y-m-d H:i:s'));
		$this->db->insert('user_document');
	}

	public function getUserDocument($user_id){
		$this->db->select('*');
		$this->db->from('user_document ud');
		$this->db->where('is_delete','N');
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		return $query->result_array();
	}	

	public function getBuyers(){
		$this->db->select("*");
		$this->db->from('users');
		$this->db->where('user_roll','buyer');
		$this->db->where('is_delete','N');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function updateUser($data){
		$this->db->set('fullname',$data['username']);
		$this->db->set('email',$data['email']);
		if(!empty($data['password'])){
			$this->db->set('password',"password('".$data['password']."')", false);
		}
		$this->db->where('id',$data['id']);
		$this->db->update('users');
	}

	public function deleteUser($id){
		$this->db->where('id', $id);
		$this->db->delete('users');
	}
}
?>