<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller 
{
	function __construct() 
    {
        parent::__construct();
        $this->load->model('Admin_Model');
    }

	public function index()
	{
		$this->admin_session_checked($is_active_session = 1);	

		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('common/footer');
	}

	public function login()
	{
		$this->admin_session_checked($is_active_session = 0);

		$this->load->view('admin/login');
	}

	public function loginchk()
	{
	    if($this->input->post('login'))
		{
			$emailId=trim($this->input->post('emailId')); 
      $userpassword=md5(trim($this->input->post('userpassword')));

			$data=$this->Admin_Model->loginchk($emailId,$userpassword);
			
			//$id = $data->id; 

			if($data!="")
			{
				$this->set_admin_session($data);
        redirect('Admin');
			}
	    else
	    {
				$this->session->set_flashdata('error', '<span style="color:#ff0000;"><strong>Oops! wrong User Name Or Password</strong></span>');
				redirect('Admin/login');
			}
		}
		else
		{
			redirect('Admin/login');
		}
	}

	public function logout() 
  {
    $this->destroy_admin_session(); 
    $this->session->set_flashdata('success', '<span style="color:#00b300;"><strong>Logout successfully done!</strong></span>');
    redirect('Admin/login');
  }
  public function profile()
  {
    $this->admin_session_checked($is_active_session = 1);
  	$admin=$this->session->userdata('admin'); 
  	$session_userid=$admin->id;
  	$data['profile_details']=$this->Admin_Model->profile_details($session_userid);
  	common_viewloader('admin/profile',$data);	
  }
  public function password_change()
  {
    $this->admin_session_checked($is_active_session = 1);
  	$admin=$this->session->userdata('admin'); 
  	$session_userid=$admin->id;
  	$admin_pass=$admin->password;
  	if($this->input->post('passwordChange'))
  	{
  		$old_password=md5(trim($this->input->post('old_password')));
  		$new_password=trim($this->input->post('new_password'));
  		$confirm_password=trim($this->input->post('confirm_password')); 
  		if($admin_pass!=$old_password)
  		{
  			$this->session->set_flashdata('error', '<span style="color:#ff0000;"><strong>Your password was incorrect.</strong></span>');
  			redirect('Admin/profile');
  		}
  		if($new_password!=$confirm_password)
  		{
  			$this->session->set_flashdata('error', '<span style="color:#ff0000;"><strong>Your new password does not match confirmation.</strong></span>');
  			redirect('Admin/profile');
  		}
  		$newPassword=md5($new_password);
  		$pass_change=array('password'=>$newPassword);
  		$this->Admin_Model->change_pass($session_userid,$pass_change);
  		$this->session->set_flashdata('success', '<span style="color:#00b300;"><strong>Password change successfully!</strong></span>');
  		redirect('Admin/profile');
  	}
  }
  public function editProfile()
  {
    $this->admin_session_checked($is_active_session = 1);
  	$admin=$this->session->userdata('admin'); 
  	$session_userid=$admin->id;
  	if($this->input->post('edit_profile'))
  	{
  		$profile_name=trim($this->input->post('profile_name'));
  		$username=trim($this->input->post('username'));
  		$contact_no=trim($this->input->post('contact_no'));
  		$address=trim($this->input->post('address'));
  		$profile=array('name'=>$profile_name,'username'=>$username,'contact_no'=>$contact_no,'address'=>$address);
  		$this->Admin_Model->update_profile($session_userid,$profile);
  		$this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>Your profile updated successfully!</strong></span>');
  		redirect('Admin/profile');
  	}

  }
}

?>
