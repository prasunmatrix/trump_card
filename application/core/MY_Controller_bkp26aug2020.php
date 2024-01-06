<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
function __construct() 
    {
      parent::__construct();

      $this->load->library('form_validation');
			$this->load->library('session');
			$this->load->helper(array('cookie','form', 'url', 'captcha','file'));
      $this->load->model('Admin_Model');
    }

    public function login()
	{ 
	  /* if(((!isset($_COOKIE["userid"]))|| ($_COOKIE["userid"]=='')) || ((!isset($_COOKIE["tabyyat_ci"]))|| ($_COOKIE["tabyyat_ci"]==''))){
			*/
		$user_id=$this->session->userdata('user_id');
		$user=$user_id['0'];
		if($user=="")
		{	
			$this->load->view('admin/login');
			return false;			
		}
		else
		{
			//redirect('/Admin/index');
			return true;
		}
	}

	public function loginchk(){
	  if($this->input->post('login'))
		{
			$username=trim($this->input->post('username')); 
	    $userpassword=md5(trim($this->input->post('userpassword')));
			$data=$this->Admin_Model->loginchk($username,$userpassword);
				
				$id=$data[0]['id'];
				$username=$data[0]['username'];
				if($id!=""){
					$user_id=$this->session->userdata('user_id');		
					$user_id=array($id,$username);
					// echo "<pre>";
					// print_r($user_id);die();	
					$this->session->set_userdata('user_id',$user_id);      
					redirect('/Admin','refresh');
				}
			  else{
					$this->session->set_flashdata('msg', '<span style="color:#ff0000;"><strong>Oops! wrong User Name Or Password</strong></span>');
					redirect('/Admin/login');
				}
		}
		else
		{
			redirect('/Admin/login');

		}
	}

	function logout(){
		$this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>You have successfully logout!</strong></span>');
		$user_id=$this->session->userdata('user_id');
		//print_r($user_id);
		//exit;
		unset($user_id);
		$this->session->sess_destroy();
		redirect('/Admin/login');
	}

}		