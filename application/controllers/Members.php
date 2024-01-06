<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends MY_Controller 
{
	function __construct() 
    {
        parent::__construct();
        $this->load->model('Members_Model');
        $this->admin_session_checked($is_active_session = 1);
    }

	public function all_members()
	{
		$value = $this->input->get('members');
		$fromDate = $this->input->get('fromDate');
		$toDate = $this->input->get('toDate');
		if($value !='' && ($fromDate=='' &&  $toDate==''))
		{
			$data['all_members_data']=$this->Members_Model->get_members_by_filter($value);
		}
		else if($value =='' && ($fromDate!='' &&  $toDate!=''))
		{
			$data['all_members_data']=$this->Members_Model->get_members_by_filter_by_date($fromDate,$toDate);
		}	
		else
		{
			$data['all_members_data']=$this->Members_Model->all_members_data();
		}
		
		common_viewloader('members/all_members',$data);
	}

	public function since_seven_days()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->load->view('members/since_seven_days');
		$this->load->view('common/footer');
	}

	public function since_thirty_days()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->load->view('members/since_thirty_days');
		$this->load->view('common/footer');
	}
	public function view_statistics()
	{
		$data['all_statistics_data']=$this->Members_Model->all_statistics_data();
		//pr($data);die();
		common_viewloader('members/view_statistics',$data);
	}
	public function ajaxSearchData()
	{
			$value=$this->input->get('value');

			$data['all_members_data']=$this->Members_Model->get_members_by_filter($value);

			$this->load->view('members/ajax_view', $data);
	}

	public function ajaxSearchDataByDate()
	{
		$fromDate=$this->input->get('from_date');
		$toDate=$this->input->get('to_date');
		$data['all_members_data']=$this->Members_Model->get_members_by_filter_by_date($fromDate,$toDate);
    //pr($data);die(); 
		$this->load->view('members/ajax_view', $data);
	}
	public function statuschange($id){
    $save=$this->Members_Model->status_change($id);
    redirect('Members/all_members');
  }		
  public function viewparticularmember($id){
  	$data['view_particularmember']=$this->Members_Model->view_particularmember($id);
   	common_viewloader('members/viewparticularmember',$data);
  }
  public function viewparticularstatistics($id){
  	$data['view_particularstatistics']=$this->Members_Model->view_particularstatistics($id);
   	common_viewloader('members/viewparticularstatistics',$data);
  }
}
?>
