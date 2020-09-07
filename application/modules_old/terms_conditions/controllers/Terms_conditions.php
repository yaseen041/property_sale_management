<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms_conditions extends CI_Controller {

	public function index(){
	$data['title'] = "Terms and conditions of EMC2 Property";
		$this->load->view('terms_conditions/index', $data);
	}

}

/* End of file Terms.php */
/* Location: ./application/modules/terms/controllers/Terms.php */