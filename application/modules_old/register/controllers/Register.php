<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('register_model');
	}

	public function index()
	{
		$this->load->view('register');
	}

	public function google_captcha(){
		$verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Le1qmYUAAAAAD5S_mCK-kAm4ag0d6Wfcm9y7-XH&response=".$this->input->post('g-recaptcha-response'));
		$captcha_success = json_decode($verify);
		if ($captcha_success->success == false) {
			$this->form_validation->set_message('google_captcha', 'Google reCaptcha is required.');
			return false;
		}else if ($captcha_success->success == true) {
			return true;
		}
	}

	public function submit_user()
	{
		$data = $_POST;
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|is_unique[users.email]', array('is_unique' => 'Email already associated with another account.'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('g-recaptcha-response', 'Google Captcha', 'callback_google_captcha');
		$this->form_validation->set_rules('c_password', 'Confirm Password', 'required|matches[password]');
		if ($this->form_validation->run($this) == FALSE)
		{
			$finalResult = array('msg' => 'error', 'response'=>validation_errors());
			echo json_encode($finalResult);
			exit;
		}else{
			$data['activation_key'] = md5(uniqid());
			$user_id = $this->register_model->insert_user($data);

			if($user_id > 0){

				$this->send_confirmation_email($data);
				$finalResult = array('msg' => 'success');
				echo json_encode($finalResult);
				exit;

			}else{
				$finalResult = array('msg' => 'error', 'response'=>'<p>Something went wrong!</p>');
				echo json_encode($finalResult);
				exit;
			}
		}
	}


	public function check_email()
	{
		$email = $_POST['email'];
		$status = $this->register_model->check_email($email);
		if($status > 0){
			echo json_encode(FALSE);
		}else {
			echo json_encode(TRUE);
		}
	}

	public function send_confirmation_email($data)
	{
		$email_body = $this->load->view('activate_account_email' , $data,TRUE);

		$to = $data['email'];
		$subject = 'Account Activation';
		$body = $email_body;
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= 'From: <noreply.explorelogics@gmail.com>' . "\r\n";
		// @mail($to,$subject,$body,$headers);
		send_mail_func($to, $subject, $body);
		return true;
	}
}