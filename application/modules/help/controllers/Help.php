<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller {

	public function index(){
$data['title'] = "Help from EMC2 Property";
		$this->load->view('help/index');
	}

}

/* End of file Terms.php */
/* Location: ./application/modules/terms/controllers/Terms.php */