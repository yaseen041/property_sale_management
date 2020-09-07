<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('home/home_model');
    }

    public function index() {
        $data['property_types'] = $this->home_model->getAllPropertyTypes();
        // $data['featured_listings'] = $this->home_model->getFeaturedListing();
        $this->load->view('home/index', $data);
    }

    public function agent($id){
    	$where = "unique_id = '".$id."'";
    	$data['agent'] = singleRow('users', '*', $where);
    	$data['agent_listings'] = $this->home_model->getUserListings($data['agent']['id']);
    	if (empty($data['agent'])) {
    		redirect(base_url());
    	}
    	$this->load->view('home/agent_detail', $data);
    }

    public function recover($id){
        $where = "forgot_pass_key = '".$id."'";
        $data['user'] = singleRow('users', '*', $where);
        if (empty($data['user'])) {
            redirect(base_url());
        }
        $this->load->view('home/password_recovery', $data);
    }

    public function recoverAccount(){
        $data = $this->input->post();
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == false) {
            $finalResult = array('msg' => 'error', 'response' => validation_errors());
            echo json_encode($finalResult);
            exit;
        } else {
            $key = md5(uniqid());
            $record = singleRow('users','*','email = "'. $data['email'].'"');
            if (empty($record)) {
                $finalResult = array('msg' => 'error', 'response' => 'Account does not exist in the system');
                echo json_encode($finalResult);
                exit;
            }
            $this->home_model->updateUserPasswordKey($data['email'], $key);
            $data['subject'] = "Password Reset";
            $data['admin'] = false;
            $data['body'] = "<br>
            Click the link below to reset your password.
            <br>
            <a href=".base_url()."recover/".$key."><b>Reset Your Password</b></a>
            <br>";
            $message = $this->load->view('common/email_template', $data, true);
            send_mail_func($record['email'],$data['subject'], $message);
            $finalResult = array('msg' => 'success', 'response' => 'Password reset link has been sent to your email!');
            echo json_encode($finalResult);
            exit;
        }
    }

    public function resetPassword(){
        $data = $this->input->post();
        $this->form_validation->set_rules('password', 'Password','required|min_length[6]');
        $this->form_validation->set_rules('c_password', 'Confirm Password','matches[password]');
        if ($this->form_validation->run() == false) {
            $finalResult = array('msg' => 'error', 'response' => validation_errors());
            echo json_encode($finalResult);
            exit;
        } else {
            $status = $this->home_model->updatePassword($data);
            if (!$status) {
                $finalResult = array('msg' => 'error', 'response' => 'Password recovery link has been used already.');
                echo json_encode($finalResult);
                exit;
            }
            $finalResult = array('msg' => 'success', 'response' => 'Password has been updated successfully.');
            echo json_encode($finalResult);
            exit;
        }
    }

    public function addFavourite(){
        $data = $this->input->post();
        if (!get_session('user_logged_in')) {
            $finalResult = array('msg' => 'error', 'response' => 'You must be logged in to use this feature.');
            echo json_encode($finalResult);
            exit;
        }else{
            $is_owner = $this->home_model->checkOwner($data['listing_id']);
            if ($is_owner) {
                $finalResult = array('msg' => 'error', 'response' => 'You cannot add your listing to favourites.');
                echo json_encode($finalResult);
                exit;  
            }
            $this->home_model->addToFavourite($data['listing_id']);
            $finalResult = array('msg' => 'success', 'response' => 'Listing has been added into your favourites.');
            echo json_encode($finalResult);
            exit;
        }
    }

    public function removeFavourite(){
        $data = $this->input->post();
        $this->home_model->removeFromFavourite($data['listing_id']);
        $finalResult = array('msg' => 'success', 'response' => 'Listing has been removed from your favourites.');
            echo json_encode($finalResult);
            exit;
    }

}

/* End of file Home.php */
/* Location: ./application/modules/home/controllers/Home.php */