<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Policies extends CI_Controller {

	public function index(){
		$this->load->view('policies/index');
	}

}

/* End of file Policies.php */
/* Location: ./application/modules/policies/controllers/Policies.php */