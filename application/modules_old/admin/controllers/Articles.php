<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index(){
		$data['articles'] = $this->admin_model->getArticles();
		$this->load->view('admin/article/manage', $data);
	}

	public function add(){
		if ($this->input->post()) {
			$data = $this->input->post();
			$data['banner'] = $this->uploadBanner();
			// show($data);
			if (empty($data['banner'])){
				$this->form_validation->set_rules('banner', 'Banner', 'required', array('required' => 'An error occurred while uploading the banner'));
			}
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('error_msg', validation_errors());
				redirect(base_url().'admin/articles/add');
			} else {
				$this->admin_model->insertArticle($data);
				$this->session->set_flashdata('success_msg', 'Article added successfully');
				redirect(base_url().'admin/articles');
			}
		}
		$data['topics'] = getAll('topics', 'is_active', 'Y');
		$this->load->view('admin/article/add', $data);
	}

	public function edit($id){
		if ($this->input->post()) {
			$data = $this->input->post();
			$data['id'] = $id;
			// show($data);
			if(!empty($_FILES['banner']['name'])){
				$data['banner'] = $this->uploadBanner();
			}else{
				$data['banner'] = $data['old_banner'];
			}
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('error_msg', validation_errors());
				redirect(base_url().'admin/articles/add');
			} else {
				$this->admin_model->updateArticle($data);
				$this->session->set_flashdata('success_msg', 'Article updated successfully');
				redirect(base_url().'admin/articles');
			}
		}
		if (empty($id)) {
			$this->session->set_flashdata('error_msg', 'The URL you are trying to access is not valid.');
			redirect(base_url().'admin/articles');
		}
		$data['article'] = $this->admin_model->getArticleByID($id);
		if (empty($data['article'])) {
			$this->session->set_flashdata('error_msg', 'The URL you are trying to access is not valid.');
			redirect(base_url().'admin/articles');	
		}
		$data['topics'] = getAll('topics', 'is_active', 'Y');
		$this->load->view('admin/article/edit', $data);
	}

	public function uploadBanner(){
		$config['upload_path'] = './uploads/banners';
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['encrypt_name']  = true;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('banner')){
			return "";
		}
		else{
			$data = $this->upload->data();
			return $data['file_name'];
		}
	}

	public function deleteArticle(){
		$data = $this->input->post();
		$this->admin_model->deleteArticle($data['id']);
		$finalResult = array('msg' => 'success', 'response'=> 'Article deleted successfully!');
		echo json_encode($finalResult);
		exit;
	}

}

/* End of file Articles.php */
/* Location: ./application/modules/admin/controllers/Articles.php */