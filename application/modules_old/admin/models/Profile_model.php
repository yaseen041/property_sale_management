<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model {

	public function updateProfile($data)	{
		if(!empty($data['password'])){
			$this->db->set('password',"password('".$data['password']."')", false);
			$this->db->where('userid',$data['id']);
			$this->db->update('admin_users');
		}
	}

	public function uploadAvatar($id,$avatar)	{
		$this->db->set('avatar',$avatar);
		$this->db->where('id',$id);
		$this->db->update('admin_users');
	}
}
?>