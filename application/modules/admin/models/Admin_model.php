<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function login_credential($email, $pass) {
        $hash_pass = "password('" . $pass . "')";
        $email = "'" . $email . "'";
        $query = $this->db->query("SELECT * FROM admin_users WHERE email= $email AND password = $hash_pass");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function forget($email) {
        $this->db->select('*');
        $this->db->where('email', $email);
        $query = $this->db->get('admins');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function insertTopic($data) {
        $this->db->set('topic', $data['topic']);
        $this->db->set('slug', slugify($data['topic']));
        $this->db->set('is_active', (isset($data['is_active'])) ? "Y" : "N");
        $this->db->insert('topics');
    }

    public function updateTopic($data) {
        $this->db->set('topic', $data['topic']);
        $this->db->set('slug', slugify($data['topic']));
        $this->db->set('is_active', (isset($data['is_active'])) ? "Y" : "N");
        $this->db->where('id', $data['topicID']);
        $this->db->update('topics');
    }

    public function deleteTopic($data) {
        $this->db->where('id', $data['id']);
        $this->db->delete('topics');
    }

    public function insertArticle($data) {
        $this->db->set('topic_id', $data['topic']);
        $this->db->set('title', $data['title']);
        $this->db->set('slug', slugify($data['title']));
        $this->db->set('banner', $data['banner']);
        $this->db->set('description', $data['description']);
        $this->db->set('is_active', (isset($data['is_active'])) ? "Y" : "N");
        $this->db->set('date_added', date('Y-m-d H:i:s'));
        $this->db->insert('articles');
    }

    public function updateArticle($data) {
        $this->db->set('topic_id', $data['topic']);
        $this->db->set('title', $data['title']);
        $this->db->set('slug', slugify($data['title']));
        $this->db->set('banner', $data['banner']);
        $this->db->set('description', $data['description']);
        $this->db->set('is_active', (isset($data['is_active'])) ? "Y" : "N");
        $this->db->where('id', $data['id']);
        $this->db->update('articles');
    }

    public function getArticles() {
        $this->db->select('a.*, t.topic');
        $this->db->from('articles a');
        $this->db->join('topics t', 't.id = a.topic_id', 'left');
        $this->db->order_by('date_added', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getArticleByID($id) {
        $this->db->select('*');
        $this->db->from('articles');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function deleteArticle($id) {
        $this->db->where('id', $id);
        $this->db->delete('articles');
    }

    public function checkTopicExists($data) {
        $this->db->select('*');
        $this->db->from('topics');
        $this->db->where('topic', $data['topic']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function getTopics(){
        $this->db->select('*, (select count(id) from articles where topic_id = topics.id) as total_articles');
        $this->db->from('topics');
        $query = $this->db->get();
        return $query->result_array();
    }

}
