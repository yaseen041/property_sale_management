<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('admin/user_model');
		$this->load->model('admin/listing_model');
		$admins = $this->session->userdata('admins');
		if(!$admins['is_user_login'])
		{
			redirect(base_url().'admin/login');
		}
	}

	public function index(){
		$data['users'] = count($this->user_model->getUsers());
		$data['listings'] = count($this->listing_model->getActiveListings());
		$data['articles'] = count(getAll('articles'));
		$data['topics'] = count(getAll('topics'));
		$this->load->view('admin/dashboard',$data);
	}	

	public function topics(){
		if ($this->input->post('add_topic')) {
			$data = $this->input->post();
			$check = $this->admin_model->checkTopicExists($data);
			if ($check) {
				$this->session->set_flashdata('error_msg','This category is already in the system.');
				redirect(base_url().'admin/topics');
			}
			$this->admin_model->insertTopic($data);
			$this->session->set_flashdata('success_msg','Category has been added successfully.');
			redirect(base_url().'admin/topics');
		}
		if ($this->input->post('edit_topic')) {
			$data = $this->input->post();
			$this->admin_model->updateTopic($data);
			$this->session->set_flashdata('success_msg','Category has been updated successfully.');
			redirect(base_url().'admin/topics');
		}
		// $data['topics'] = getAll('topics');
		$data['topics'] = $this->admin_model->getTopics();
		// show($data['topics']);
		$this->load->view('admin/topics', $data);
	}

	public function deleteTopic(){
		$data = $this->input->post();
		$this->admin_model->deleteTopic($data);
		$finalResult = array('msg' => 'success', 'response'=> 'Category has been deleted successfully!');
		echo json_encode($finalResult);
		exit;
	}

	public function editTopic(){
		$data = $this->input->post();
		$data['topic'] = singleRow('topics','*', 'id = '.$data['id']);
		$html = $this->load->view('admin/ajaxEditTopic', $data, true);
		echo json_encode($html);
	}

}

