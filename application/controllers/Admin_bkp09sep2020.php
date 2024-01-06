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
			$username=trim($this->input->post('username')); 
      $userpassword=md5(trim($this->input->post('userpassword')));

			$data=$this->Admin_Model->loginchk($username,$userpassword);
				
			$id = $data->id;

			if($id!="")
			{
				$this->set_admin_session($data);

                redirect('Admin/index');
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
  	common_viewloader('admin/profile');	
  }
  public function password_change()
  {
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
}

?>
