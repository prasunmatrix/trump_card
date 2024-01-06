<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Criteria extends CI_Controller 
{
	function __construct() 
    {
        parent::__construct();

        $this->load->model('Criteria_Model');
    }

    public function index()
    {
    	$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->load->view('criteria/criteria_lists');
		$this->load->view('common/footer');
    }

    public function add_criteria()
    {
    	$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->load->view('criteria/add_criteria');
		$this->load->view('common/footer');
    }
}

?>