<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Point extends MY_Controller 
{
	function __construct() 
  {
    parent::__construct();
    $this->load->model('Point_Model');
    $this->load->model('Cardtype_Model');
    $this->admin_session_checked($is_active_session = 1);
  }
  public function index()
  {
    $data['all_point_data']=$this->Point_Model->all_point_data();
    common_viewloader('point/point_lists',$data);
  }
  public function add_point()
  {
    $data['all_category_name']=$this->Cardtype_Model->all_category_name();
    //$data['all_subcategory_name']=$this->Attribute_Model->all_subcategory_name();
    common_viewloader('point/add_point',$data);
  }
  public function get_tournament(){
    $subcategory=$this->input->post('subcategory');
    $tournament=$this->Point_Model->get_tournament($subcategory);
    if(count($tournament)>0)
    {
      header('Content-Type:application/json');
      die(json_encode(array("status"=>"1","message"=>"Success","tournament"=>$tournament)));
    }
    else
    {
      header('Content-Type:application/json');
      die(json_encode(array("status"=>"0","message"=>"Failed")));
    }
  }
  public function addpoint(){
    if($this->input->post('addpoint'))
    {
      $category_id=trim($this->input->post('category_id'));
      $subcategory_id=trim($this->input->post('subcategory_id'));
      $tournament_id=$this->input->post('tournament_id');
      $points_on_win=$this->input->post('points_on_win');
      $formDate=$this->input->post('formDate');
      $toDate=$this->input->post('toDate');
      $add_point=array('category_id'=>$category_id,'subcategory_id'=>$subcategory_id,'tournament_id'=>$tournament_id,'points_on_win'=>$points_on_win,'tenure_from_date'=>$formDate,'tenure_to_date'=>$toDate);
      $save=$this->Point_Model->add_point($add_point);
      $this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>You have successfully inserted your point!</strong></span>');
      redirect('Point/add_point');
    }
  }
  public function statuschange($id){
    $save=$this->Point_Model->status_change($id);
    redirect('Point');
  }
  public function editpoint($id){
    $data['all_category_name']=$this->Cardtype_Model->all_category_name();
    //pr($data['all_category_name']);die();
    $data['editpoint_data']=$this->Point_Model->editpoint_data($id);
    //pr($data['editpoint_data']); die();
    $category_id=$data['editpoint_data']->category_id;
    $subcategory_id=$data['editpoint_data']->subcategory_id; 
    $data['all_subcategory_name']=$this->Cardtype_Model->all_subcategory_name($category_id);
    $data['all_tournament_name']=$this->Point_Model->all_tournament_name($category_id,$subcategory_id); 
    //pr($data['all_tournament_name']); die();
    common_viewloader('point/edit_point',$data);

    if($this->input->post('editpoint'))
    {
      $category_id=trim($this->input->post('category_id'));
      $subcategory_id=trim($this->input->post('subcategory_id'));
      $tournament_id=$this->input->post('tournament_id');
      $points_on_win=$this->input->post('points_on_win');
      $formDate=$this->input->post('formDate');
      $toDate=$this->input->post('toDate'); 
      $edit_id=trim($this->input->post('edit_id')); 

      $edit_point=array('category_id'=>$category_id,'subcategory_id'=>$subcategory_id,'tournament_id'=>$tournament_id,'points_on_win'=>$points_on_win,'tenure_from_date'=>$formDate,'tenure_to_date'=>$toDate);
      $save_point=$this->Point_Model->update_point($edit_point,$edit_id);
      $this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>You have successfully update your point!</strong></span>');
      redirect('Point');
    }
  }
}

?>