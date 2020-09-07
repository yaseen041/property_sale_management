<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Listing extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/listing_model');
		if (!checkAdminLogin()) {
			redirect(base_url().'admin/login');
		}
	}

	function index() {
            $data['title'] = 'Active Listings';
		$data['listing'] = $this->listing_model->getActiveListings();
		$this->load->view('admin/listing/manage',$data);
	}


	function inactive() {
            $data['title'] = 'Inactive Listings';
		$data['listing'] = $this->listing_model->getInActiveListings();
		$this->load->view('admin/listing/manage',$data);
	}

	function pending() {
            $data['title'] = 'Awaiting Approval Listings';
		$data['listing'] = $this->listing_model->getPendingListings();
		$this->load->view('admin/listing/manage',$data);
	}

	public function view($unique_id){
		if (empty($unique_id)) {
			$this->session->set_flashdata('error_msg','The URL you are trying to access is not valid!');
			redirect(base_url().'admin/listing');
		}
		$data['list'] = $this->listing_model->getListDetail($unique_id);
		$this->load->view('admin/listing/view', $data);
	}

	public function approveListing(){
		$data = $this->input->post();
		$this->listing_model->approveListing($data['listing_id']);
		$this->session->set_flashdata('success_msg','Property has been approved successfully.');
		$finalResult = array('msg' => 'success', 'response'=>'Property has been approved successfully.');
		echo json_encode($finalResult);
		exit;
	}

	public function activeListing(){
		$data = $this->input->post();
		$this->listing_model->activeListing($data['listing_id']);
		$this->session->set_flashdata('success_msg','Property has been active successfully.');
		$finalResult = array('msg' => 'success', 'response'=> 'Property has been active successfully.');
		echo json_encode($finalResult);
		exit;
	}

	public function inActiveListing(){
		$data = $this->input->post();
		$this->listing_model->inActiveListing($data['listing_id']);
		$this->session->set_flashdata('success_msg','Property has been in-active successfully.');
		$finalResult = array('msg' => 'success', 'response'=> 'Property has been in-active successfully.');
		echo json_encode($finalResult);
		exit;
	}

	public function deleteListing(){
		$data = $this->input->post();
		$this->listing_model->deleteListing($data['listing_id']);
		$this->session->set_flashdata('success_msg','Property has been deleted successfully');
		$finalResult = array('msg' => 'success', 'response'=> 'Property has been deleted successfully.');
		echo json_encode($finalResult);
		exit;
	}

}

?>