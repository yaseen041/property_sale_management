<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        // echo "<pre>";
        // print_r($this->session->all_userdata());exit;
        if(!empty($this->session->userdata('user_logged_in')))
        {
            redirect(base_url());
        }
        $this->load->model('login_model');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function user_authentication(){
        $userData = array();

        // Check if user is logged in
        if($this->facebook->is_authenticated()){
            // Get user facebook profile details
            $userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,locale,picture');

            if(empty($userProfile['id'])){
                // redirect('login');
                redirect(base_url());
            }

            $url    = $userProfile['picture']['data']['url'];
            $image    = $userProfile['first_name'].'.png';
            $file   = file($url);
            $result = file_put_contents(FCPATH.'assets/profile_pictures/'.$image, $file);


            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];
            $userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userData['profile_dp'] = $image;
            $userData['activation_key'] = NULL;


            // Insert or update user data
            $userID = $this->login_model->checkUser($userData);

            // Check user data insert or update status
            if(!empty($userID)){
                $array=array(
                    'oauth_provider' => 'facebook',
                    'oauth_uid' => $userProfile['id'],
                    'username' => $userProfile['first_name']." ".$userProfile['last_name'],
                    'email' => $userProfile['email'],
                    'locale' => $userProfile['locale'],
                    'profile_url' => 'https://www.facebook.com/'.$userProfile['id'],
                    'picture_url' => $userProfile['picture']['data']['url'],
                    'user_id'=>$userID,
                    'profile_pic'=>$image,
                    'user_type'=>'',
                    'user_logged_in'=>true
                );
                $this->session->set_userdata($array);
            }else{
               $data['userData'] = array();
           }

            // Get logout URL
           $data['logoutUrl'] = $this->facebook->logout_url();
           redirect(base_url());
       }else{
        $fbuser = '';
        redirect('login');
    }
}

public function login_verify()
{
    if($_POST){
        $email=$this->input->post('login_email');
        $password=$this->input->post('login_password');
        $result = $this->login_model->get_login($email, $password);

        $result2 =  (array)$result;
        if(count($result2) > 0)
        {
            if (empty($result->activation_key) && $result->status == '1') {

                $array = array(
                    'user_id' => $result->id,
                    'username' => $result->first_name . " " . $result->last_name,
                    'email' => $result->email,
                    'user_status' => $result->status,
                    'profile_pic' => $result->profile_dp,
                    'user_logged_in' => true
                );

                $this->session->set_userdata($array);

                $finalResult = array('msg' => 'success');
                echo json_encode($finalResult);
                exit; 

            } else {
                $finalResult = array('msg' => 'error', 'response'=>"Your acount is not verified yet. If you don't have verification email <a id='resend' data-id='".$email."' style='cursor: pointer;'> click here </a> to resend verification email.");
                echo json_encode($finalResult);
                exit;
            }
        }
        else
        {
            $finalResult = array('msg' => 'error', 'response'=>'Incorrect Email or Password');
            echo json_encode($finalResult);
            exit;
        }
    }else{
        $finalResult = array('msg' => 'error', 'response'=>'Incorrect Email or Password');
        echo json_encode($finalResult);
        exit;
    }
}

}