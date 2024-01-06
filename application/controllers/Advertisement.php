<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Advertisement extends MY_Controller 
{
	function __construct() 
    {
        parent::__construct();

        $this->load->model('Advertisement_Model');
    }

    public function index()
    {
      if($this->login()==true)
      {
      	$this->load->view('common/header');
    		$this->load->view('common/sidebar');
    		$this->load->view('advertisement/advertisement_lists');
    		$this->load->view('common/footer');
      }  
    }

    public function add_advertisement()
    {
      if($this->login()==true)
      {
      	$this->load->view('common/header');
    		$this->load->view('common/sidebar');
    		$this->load->view('advertisement/add_advertisement');
    		$this->load->view('common/footer');
      }
    }
}

?>