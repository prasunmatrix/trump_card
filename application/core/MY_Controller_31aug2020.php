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
	  if((!isset($_COOKIE['id'])) || ($_COOKIE['id']=='')){
			$this->load->view('admin/login');
			return false;			
		}
		else
		{
			// echo "test";
			//redirect('/Admin/dashboard','refresh');
			return true;
			//exit();
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
					$expireDate = time() + (2 * 365 * 24 * 60 * 60);
					$path = '/';
					$domain = '';
					$secure = false; //only transmit the cookie if a HTTPS connection is established
					$httponly = true; //make cookie available only for the HTTP protocol (and not for JavaScript)
					setcookie( "id",$id, $expireDate, $path, $domain, $secure, $httponly);
					setcookie( "trump_card","trump_card", $expireDate, $path, $domain, $secure, $httponly);
					setcookie( "username",$username, $expireDate, $path, $domain, $secure, $httponly);
					$user_id=$this->session->userdata('user_id');		
					$user_id=array($id,$username);
					// echo "<pre>";
					// print_r($user_id);die();	
					$this->session->set_userdata('user_id',$user_id);      
					redirect('/Admin/dashboard');
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
		$expireDate=time() - (2 * 365 * 24 * 60 * 60);
		$path = '/';
		$domain = '';
		$secure = false; //only transmit the cookie if a HTTPS connection is established
		$httponly = true; //make cookie available only for the HTTP protocol (and not for JavaScript)
		setcookie( "id",'', $expireDate, $path, $domain, $secure, $httponly);
		setcookie( "trump_card",'', $expireDate, $path, $domain, $secure, $httponly);
		setcookie( "username",'', $expireDate, $path, $domain, $secure, $httponly);
		$this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>You have successfully logout!</strong></span>');
		// $user_id=$this->session->userdata('user_id');
		// unset($user_id);
		// $this->session->sess_destroy();
		redirect('/Admin/login');
	}

}		