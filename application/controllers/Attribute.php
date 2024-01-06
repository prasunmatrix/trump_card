<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Attribute extends MY_Controller 
{
	function __construct() 
  {
    parent::__construct();
    $this->load->model('Attribute_Model');
    $this->load->model('Cardtype_Model');
    $this->admin_session_checked($is_active_session = 1);
  }

  public function index()
  {
    $data['all_attribute_data']=$this->Attribute_Model->all_attribute_data();
    common_viewloader('attribute/attribute_lists',$data);
  }

  public function add_attribute()
  {
    $data['all_category_name']=$this->Cardtype_Model->all_category_name();
    //$data['all_subcategory_name']=$this->Attribute_Model->all_subcategory_name();
    common_viewloader('attribute/add_attribute',$data);
  }
  public function get_cardtype()
  {
    $subcategory = $this->input->post('subcategory');      
    $cardtype = $this->Attribute_Model->get_cardtype($subcategory);
    if(count($cardtype)>0)
    {
      header('Content-Type:application/json');
      die(json_encode(array("status"=>"1","message"=>"Success","cardtype"=>$cardtype)));
    }
    else
    {
      header('Content-Type:application/json');
      die(json_encode(array("status"=>"0","message"=>"Failed")));
    }      
  }
  public function addattribute(){
    if($this->input->post('addattribute')){
      $category_id=trim($this->input->post('category_id'));
      $subcategory_id=trim($this->input->post('subcategory_id'));
      $cardtype_id=$this->input->post('cardtype_id');
      $attribute_name=$this->input->post('attribute_name');
      //$attribute_value=$this->input->post('attribute_value');
      $attribute_win=$this->input->post('attribute_win');
      $point_assigned=$this->input->post('point_assigned');
      $count=count($this->input->post('attribute_name'));
      for($j=0;$j<$count;$j++)
      {
        $add_attribute=array(
        'category_id'=>$category_id,
        'subcategory_id'=>$subcategory_id,
        'card_type_id'=>$cardtype_id,
        'attribute_name'=>$attribute_name[$j],
        //'attribute_value'=>$attribute_value[$j],
        'attribute_win'=>$attribute_win[$j],
        'point_assigned'=>$point_assigned[$j]
        );
        $save=$this->Attribute_Model->add_attribute($add_attribute);
      }
      $this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>You have successfully inserted your attribute!</strong></span>');
      redirect('Attribute/add_attribute');
    }
  }
  public function statuschange($id){
    $save=$this->Attribute_Model->status_change($id);
    redirect('Attribute');
  }
  public function editattribute($id){
    $data['all_category_name']=$this->Cardtype_Model->all_category_name();
    $data['editattribute_data']=$this->Attribute_Model->editattribute_data($id);
    //pr($data['editattribute_data']); die();
    $category_id=$data['editattribute_data']->category_id;
    $subcategory_id=$data['editattribute_data']->subcategory_id; 
    $data['all_subcategory_name']=$this->Cardtype_Model->all_subcategory_name($category_id);
    $data['all_cardtype_name']=$this->Attribute_Model->all_cardtype_name($category_id,$subcategory_id); 
    //pr($data['all_cardtype_name']); die();
    common_viewloader('attribute/edit_attribute',$data);

    if($this->input->post('editattribute'))
    {
      $categoryId=trim($this->input->post('category_id'));
      $subcategoryId=trim($this->input->post('subcategory_id'));
      $cardtype_id=trim($this->input->post('cardtype_id'));
      $attribute_name=trim($this->input->post('attribute_name'));
      //$attribute_value=trim($this->input->post('attribute_value'));
      $attribute_win=trim($this->input->post('attribute_win'));
      $point_assigned=trim($this->input->post('point_assigned')); 
      $edit_id=trim($this->input->post('edit_id')); 

      $edit_attribute_data=array('category_id'=>$categoryId,'subcategory_id'=>$subcategoryId,'card_type_id'=>$cardtype_id,'attribute_name'=>$attribute_name,'attribute_win'=>$attribute_win,'point_assigned'=>$point_assigned);
      $save_attribute=$this->Attribute_Model->update_attribute($edit_attribute_data,$edit_id);
      $this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>You have successfully update your attribute!</strong></span>');
      redirect('Attribute');
    }
  }
}

?>