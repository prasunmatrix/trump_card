<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Managecms extends MY_Controller 
{
	function __construct() 
    {
      parent::__construct();
      $this->load->model('Managecms_Model');
      $this->admin_session_checked($is_active_session = 1);
    }

    public function index()
    {
    	$this->load->view('common/header');
  		$this->load->view('common/sidebar');
  		$this->load->view('managecms/aboutus');
  		$this->load->view('common/footer');
    }

    public function gamerules()
    {
    	$this->load->view('common/header');
  		$this->load->view('common/sidebar');
  		$this->load->view('managecms/gamerules');
  		$this->load->view('common/footer');
    }
    public function privacypolicy()
    {
      $this->load->view('common/header');
      $this->load->view('common/sidebar');
      $this->load->view('managecms/privacypolicy');
      $this->load->view('common/footer');
    }
    public function termsandconditions()
    {
      $this->load->view('common/header');
      $this->load->view('common/sidebar');
      $this->load->view('managecms/termsandconditions');
      $this->load->view('common/footer');
    }
}

?>