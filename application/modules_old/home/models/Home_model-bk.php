<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    public function getFeaturedListing() {
        $this->db->select('u.*, l.*, pt.name as property_type');
        $this->db->from('listings l');
        $this->db->join('users u', 'u.id = l.users_id', 'left');
        $this->db->join('property_types pt', 'pt.id = l.property_type', 'left');
        $this->db->where('l.is_completed', 'Y');
        $this->db->where('l.is_featured', 'Y');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllPropertyTypes() {
        $this->db->select('*');
        $this->db->from('property_types');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getUserListings($id){
        $this->db->select('l.*,li.image_name, pt.name as property_type');
        $this->db->from('listings l');
        $this->db->join('property_types pt', 'pt.id = l.property_type', 'left');
        $this->db->join('listing_images li', 'li.listing_id = l.id', 'left');
        $this->db->where('l.users_id', $id);
        $this->db->where('l.is_active','Y');
        $this->db->where('l.is_approved','Y');
        $this->db->where('l.is_completed', 'Y');
        $this->db->group_by('l.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function updateUserPasswordKey($email, $key){
        $this->db->set('forgot_pass_key', $key);
        $this->db->where('email', $email);
        $this->db->update('users');
    }

    public function updatePassword($data){
        $hash = "password('".$data['password']."')";
        $this->db->set('forgot_pass_key', null);
        $this->db->set('password', $hash, false);
        $this->db->where('forgot_pass_key', $data['secret_key']);
        $this->db->update('users');
        if ($this->db->affected_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }

    public function checkOwner($listing_unique_id){
        $this->db->select('*');
        $this->db->from('listings');
        $this->db->where('unique_id', $listing_unique_id);
        $this->db->where('users_id', get_session('user_id'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }

    public function addToFavourite($listing_unique_id){
        $record = singleRow('listings', '*', 'unique_id = "'.$listing_unique_id.'"');
        $this->db->set('listing_id', $record['id']);
        $this->db->set('user_id', get_session('user_id'));
        $this->db->insert('favourite_listings');
    }

    public function removeFromFavourite($listing_unique_id){
        $record = singleRow('listings', '*', 'unique_id = "'.$listing_unique_id.'"');
        $this->db->where('listing_id', $record['id']);
        $this->db->where('user_id', get_session('user_id'));
        $this->db->delete('favourite_listings');
    }

}

/* End of file Home_model.php */
/* Location: ./application/modules/home/models/Home_model.php */