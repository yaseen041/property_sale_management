<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model {

	public function getArticlesByTopic($id){
		$this->db->select('a.*, t.topic');
		$this->db->from('articles a');
		$this->db->join('topics t', 't.id = a.topic_id', 'left');
		$this->db->where('topic_id', $id);
		$this->db->where('a.is_active', 'Y');
		$this->db->order_by('date_added', 'desc');
		
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getArticlesBySearch($keyword){
		$this->db->select('a.*, t.topic');
		$this->db->from('articles a');
		$this->db->join('topics t', 't.id = a.topic_id', 'left');
		$this->db->like('t.topic', $keyword, 'BOTH');
		$this->db->or_like('a.title', $keyword, 'BOTH');
		$this->db->order_by('date_added', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}	

	public function getLatestArticles(){
		$this->db->select('a.*, t.topic');
		$this->db->from('articles a');
		$this->db->join('topics t', 't.id = a.topic_id', 'left');
		$this->db->where('a.is_active', 'Y');
		$this->db->order_by('a.date_added','desc');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getRecentArticles(){
		$this->db->select('a.*, t.topic');
		$this->db->from('articles a');
		$this->db->join('topics t', 't.id = a.topic_id', 'left');
		$this->db->where('a.is_active', 'Y');
		$this->db->order_by('a.date_added','desc');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getArticleBySlug($slug){
		$this->db->select('a.*, t.topic');
		$this->db->from('articles a');
		$this->db->join('topics t', 't.id = a.topic_id', 'left');
		$this->db->where('a.is_active', 'Y');
		$this->db->where('a.slug', $slug);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getNextArticle($id){
		$this->db->select('a.*, t.topic');
		$this->db->from('articles a');
		$this->db->join('topics t', 't.id = a.topic_id', 'left');
		$this->db->where('a.is_active', 'Y');
		$where = "a.id = (select min(id) from articles where id > ".$id." limit 1)";
		$this->db->where($where);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getPreviousArticle($id){
		$this->db->select('a.*, t.topic');
		$this->db->from('articles a');
		$this->db->join('topics t', 't.id = a.topic_id', 'left');
		$this->db->where('a.is_active', 'Y');
		$where = "a.id = (select max(id) from articles where id < ".$id." limit 1)";
		$this->db->where($where);
		$query = $this->db->get();
		return $query->row_array();
	}

}

/* End of file News_model.php */
/* Location: ./application/modules/news/models/News_model.php */