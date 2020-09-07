<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy_policy extends CI_Controller {

	public function index(){
$data['title'] = "Privacy Policy of EMC2 Property";
		$this->load->view('privacy_policy/index', $data);
	}

}

/* End of file Privacy_policy.php */
/* Location: ./application/modules/privacy_policy/controllers/Privacy_policy.php */