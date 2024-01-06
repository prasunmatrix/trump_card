<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cardtype extends MY_Controller 
{
	function __construct() 
  {
      parent::__construct();
      $this->load->model('Cardtype_Model');
      $this->admin_session_checked($is_active_session = 1);
  }

  public function index()
  {
    $data['all_cardtype_data']=$this->Cardtype_Model->all_cardtype_data();
    common_viewloader('cardtype/cardtype_lists',$data);
  }

  public function add_cardtype()
  {
    //$data['all_subcategory_name']=$this->Cardtype_Model->all_subcategory_name();
    $data['all_category_name']=$this->Cardtype_Model->all_category_name();
    common_viewloader('cardtype/add_cardtype',$data);
  }
  public function addcardtype(){
    if($this->input->post('addcardtype')){
      $category_id=trim($this->input->post('category_id'));
      $subcategory_id=trim($this->input->post('subcategory_id'));
      $card_type=$this->input->post('card_type');
      //pr($card_type);die();
      $count=count($this->input->post('card_type'));
      for($j=0;$j<$count;$j++)
      {
        $add_cardtype=array(
        'category_id'=>$category_id,
        'subcategory_id'=>$subcategory_id,
        'card_type'=>$card_type[$j]
        );
        $save=$this->Cardtype_Model->add_cardtype($add_cardtype);
      }
      $this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>You have successfully inserted your card type!</strong></span>');
      redirect('Cardtype/add_cardtype');
    }
  }
  public function statuschange($id){
    $save=$this->Cardtype_Model->status_change($id);
    redirect('Cardtype');
  }
  public function editcardtype($id){
    $data['all_category_name']=$this->Cardtype_Model->all_category_name();
    $data['editcardtype_data']=$this->Cardtype_Model->editcardtype_data($id);
    //pr($data['editcardtype_data']); die();
    $category_id=$data['editcardtype_data']->category_id;
    $data['all_subcategory_name']=$this->Cardtype_Model->all_subcategory_name($category_id); 
    common_viewloader('cardtype/edit_cardtype',$data);

    if($this->input->post('editcardtype'))
    {
      $categoryId=trim($this->input->post('category_id'));
      $subcategory_id=trim($this->input->post('subcategory_id'));
      $card_type=trim($this->input->post('card_type')); 
      $edit_id=trim($this->input->post('edit_id')); 

      $edit_cardtype_data=array('category_id'=>$categoryId,'subcategory_id'=>$subcategory_id,'card_type'=>$card_type);
      $save_cardtype=$this->Cardtype_Model->update_cardtype($edit_cardtype_data,$edit_id);
      $this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>You have successfully update your card type!</strong></span>');
      redirect('Cardtype');
    }
  }
  // public function ajaxSubcategoryData(){
  //   $categoryId=$this->input->post('categoryId');
  //   $all_subcategory_name=$this->Cardtype_Model->all_subcategory_name($categoryId);
  //   //pr($all_subcategory_name);
  //   $msg="";
  //   $msg.="<option value=''>Select Category</option>";
  //   if(!empty($all_subcategory_name))
  //   {  
  //     foreach($all_subcategory_name as $key=>$value)
  //     {
  //       $msg.="<option value='".$value['subcategoryid']."'>".$value['subcategory_name']."</option>"; 
  //     }
  //   }  
  //   echo $msg; 
  // }
  public function get_subcategory()
  {
    $category = $this->input->post('category');      
    $subcategory = $this->Cardtype_Model->get_subcategory($category);
    if(count($subcategory)>0)
    {
      header('Content-Type:application/json');
      die(json_encode(array("status"=>"1","message"=>"Success","subcategory"=>$subcategory)));
    }
    else
    {
      header('Content-Type:application/json');
      die(json_encode(array("status"=>"0","message"=>"Failed")));
    }      
  }
}

?>