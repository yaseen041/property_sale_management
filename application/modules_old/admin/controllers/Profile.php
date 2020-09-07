<?php 
/**
 * 
 */
class Profile extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/profile_model');
		if (!checkAdminLogin()) {
			redirect(base_url().'admin/login');
		}
	}

	public function index(){
		if ($_POST) {
			$data = $_POST;
			$this->profile_model->updateProfile($data);
			$this->session->set_flashdata('success_msg','Profile updated successfuly!');
			redirect(base_url().'admin/profile');
		}
		$admins = $this->session->userdata('admins');
		$data['admin_details'] = singleRow('admin_users','*','userid = '.$admins['admin_id']);
		$this->load->view('admin/profile/profile_view', $data);
	}

	public function ajax_modal(){
		$data = $_POST;
		$html = $this->load->view('admin/profile/ajax_modal',$data,true);
		echo json_encode($html);
	}

	public function upload_avatar(){			
		$config['upload_path']   = './uploads/admin/';			
		$config['allowed_types'] = 'gif|png|jpg|jpeg';			
		$config['encrypt_name'] = TRUE;		
		$this->load->library('upload', $config);
		if(isset($_FILES['avatar']) && !empty($_FILES['avatar']['name']))			
		{	
			if($this->upload->do_upload('avatar'))				
			{					
				$upload_data = $this->upload->data();
				$this->profile_model->uploadAvatar($_POST['admin_id'],$upload_data['file_name']);
				$this->avatar = $upload_data['file_name'];
				$this->session->set_flashdata('success_msg','Picture Uploaded Successfuly!');
				redirect(base_url().'admin/profile');							
			}				
			else				
			{					
				$this->session->set_flashdata('error_msg','Picture Uploading failed!');
				redirect(base_url().'admin/profile');
			}				
		}			
		else			
		{				
			$this->avatar = NULL;				
		}
	}
} 
?>