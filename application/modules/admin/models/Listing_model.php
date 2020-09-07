<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listing_model extends CI_Model {

	public function getActiveListings(){
		$this->db->select('listings.*, pt.name as property_type');
		$this->db->from('listings');
		$this->db->join('property_types pt', 'pt.id = listings.property_type', 'left');
		$this->db->where('listings.is_completed', 'Y');
		$this->db->where('listings.is_approved', 'Y');
		$this->db->where('listings.is_active', 'Y');
		$this->db->order_by('listings.created_at', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}	

	public function getInActiveListings(){
		$this->db->select('listings.*, pt.name as property_type');
		$this->db->from('listings');
		$this->db->join('property_types pt', 'pt.id = listings.property_type', 'left');
		$this->db->where('listings.is_completed', 'Y');
		$this->db->where('listings.is_approved', 'Y');
		$this->db->where('listings.is_active', 'N');
		$this->db->order_by('listings.created_at', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getPendingListings(){
		$this->db->select('listings.*, pt.name as property_type');
		$this->db->from('listings');
		$this->db->join('property_types pt', 'pt.id = listings.property_type', 'left');
		$this->db->where('listings.is_completed', 'Y');
		$this->db->where('listings.is_approved', 'N');
		$this->db->order_by('listings.created_at', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}	


	public function getListDetail($unique_id){
		$this->db->select('u.*, l.*, pt.name as property_type');
		$this->db->from('listings l');
		$this->db->join('users u', 'u.id = l.users_id', 'left');
		$this->db->join('property_types pt', 'pt.id = l.property_type', 'left');
		$this->db->where('l.unique_id', $unique_id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function approveListing($id){
		$this->db->set('is_approved', 'Y');
		$this->db->set('is_active', 'Y');
		$this->db->where('id', $id);
		$this->db->update('listings');
	}

	public function activeListing($id){
		$this->db->set('is_active', 'Y');
		$this->db->where('id', $id);
		$this->db->update('listings');
	}

	public function inActiveListing($id){
		$this->db->set('is_active', 'N');
		$this->db->where('id', $id);
		$this->db->update('listings');
	}

	public function deleteListing($id){
		$this->db->where('id', $id);
		$this->db->delete('listings');

		$this->db->where('listing_id', $id);
		$this->db->delete('listing_images');

	}

}

/* End of file Listing_model.php */
/* Location: ./application/modules/admin/models/Listing_model.php */