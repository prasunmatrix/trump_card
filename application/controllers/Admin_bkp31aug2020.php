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
		if($this->login()==true)
		{
			// $this->load->view('common/header');
			// $this->load->view('common/sidebar');
			// $this->load->view('admin/dashboard');
			// $this->load->view('common/footer');
			$this->dashboard();
		}
		// else
		// {
		// 	redirect('/Admin/login');
		// }
	}
	public function dashboard(){
		if($this->login()==true)
		{
			$this->load->view('common/header');
			$this->load->view('common/sidebar');
			$this->load->view('admin/dashboard');
			$this->load->view('common/footer');
		}		
	}


}

?>
