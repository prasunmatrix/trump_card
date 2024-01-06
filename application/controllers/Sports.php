<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sports extends CI_Controller 
{
	function __construct() 
    {
        parent::__construct();

        $this->load->model('Sports_Model');
    }

	public function index()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->load->view('sports/sport_lists');
		$this->load->view('common/footer');
	}

	public function add_sports()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->load->view('sports/add_sports');
		$this->load->view('common/footer');
	}
}

?>
