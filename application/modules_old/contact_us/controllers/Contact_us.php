<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends CI_Controller {

	public function index()	{
                $data['title'] = "Contact EMC2 Property";
		$this->load->view('contact_us/index', $data);
	}

	public function sendMail(){
		$data = $this->input->post();
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('subject', 'Subject', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('message', 'Message', 'required|min_length[10]');
		if ($this->form_validation->run() == false) {
			$finalResult = array('msg' => 'error', 'response'=> validation_errors());
			echo json_encode($finalResult);
			exit;
		} else {
			$data['subject2'] = "Contact email by user";
			$data['subject'] = $data['subject'];
			$data['admin'] = true;
			$data['body'] = "<br>
			<b>Name: </b>".$data['name']."<br>
			<b>Email: </b>".$data['email']."<br>
			<b>Detail: </b>".$data['message']."<br>
			<br>";
			$message = $this->load->view('common/email_template', $data, true);
			send_mail_func(admin_email(),$data['subject2'], $message);
			$finalResult = array('msg' => 'success', 'response'=>'Email has been sent successfully.');
			echo json_encode($finalResult);
			exit;
		}
	}

}

/* End of file Home.php */
/* Location: ./application/modules/home/controllers/Home.php */