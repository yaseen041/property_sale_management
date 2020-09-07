<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('news/news_model');
	}

	public function index(){
		$data['recent_articles'] = $this->news_model->getRecentArticles();
		$data['topics'] = getAll('topics', 'is_active', 'Y');
		if ($this->input->get('s')) {
			$search = $this->input->get('s');
			$data['search_result'] = $search;
			$data['articles'] = $this->news_model->getArticlesBySearch($search);
			$this->load->view('news/search_result', $data);
		}else{
			foreach ($data['topics'] as $key => $topic) {
				$data['topics'][$key]['articles'] = $this->news_model->getArticlesByTopic($topic['id']);
			}
			$data['latest_article'] = $this->news_model->getLatestArticles();
			$this->load->view('news/index', $data);
		}
	}

	public function article($slug){
		$data['topics'] = getAll('topics', 'is_active', 'Y');
		$data['recent_articles'] = $this->news_model->getRecentArticles();
		$data['article'] = $this->news_model->getArticleBySlug($slug);
		if (empty($data['article'])) {
			redirect(base_url().'news');
		}
		$data['next_article'] = $this->news_model->getNextArticle($data['article']['id']);
		$data['previous_article'] = $this->news_model->getPreviousArticle($data['article']['id']);
		$this->load->view('news/article', $data);
	}

	public function category($cat_slug){
		$data['topics'] = getAll('topics', 'is_active', 'Y');
		$data['recent_articles'] = $this->news_model->getRecentArticles();
		
		$category = singleRow('topics', 'id,topic', 'slug = "'.$cat_slug.'"');
		$data['cat_name'] = $category['topic'];
		$data['articles'] = $this->news_model->getArticlesByTopic($category['id']);
		$this->load->view('news/category', $data);
	}

}

/* End of file Content.php */
/* Location: ./application/modules/content/controllers/Content.php */