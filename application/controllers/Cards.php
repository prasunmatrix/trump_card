<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Cards extends MY_Controller 
{
  function __construct() 
  {
    parent::__construct();
    $this->load->model('Cards_Model');
    $this->load->model('Cardtype_Model');
    $this->load->model('Attribute_Model');
    $this->admin_session_checked($is_active_session = 1);
  }

  public function index()
  {
    $data['all_cards_data']=$this->Cards_Model->all_cards_data();
    common_viewloader('cards/cards_lists',$data);
  }

  public function add_cards()
  {
    $data['all_category_name']=$this->Cardtype_Model->all_category_name();
    common_viewloader('cards/add_cards',$data);
  }
  public function get_carddetails()
  {
    $cardtypeId = $this->input->post('cardtypeId'); 
    $carddetails=$this->Cards_Model->get_carddetails($cardtypeId);
    if(count($carddetails)>0)
    {
      header('Content-Type:application/json');
      die(json_encode(array("status"=>"1","message"=>"Success","carddetails"=>$carddetails)));
    }
    else
    {
      header('Content-Type:application/json');
      die(json_encode(array("status"=>"0","message"=>"Failed")));
    }
  }
  public function get_attribute()
  {
    $cardtypeId = $this->input->post('cardtypeId');      
    $data['attribute'] = $this->Cards_Model->get_attribute_data($cardtypeId);
    if(count($data['attribute'])>0)
    {
      $this->load->view('cards/ajax_view_attribute', $data); 
    }         
  }
  public function addcards(){
    if($this->input->post('addcards'))
    {
      $category_id=trim($this->input->post('category_id'));
      $subcategory_id=trim($this->input->post('subcategory_id'));
      $cardtype_id=trim($this->input->post('cardtype_id'));
      $carddetails_id=trim($this->input->post('carddetails_id'));
      $attributeid=$this->input->post('attributeid');
      $attribute_value=$this->input->post('attribute_value');
      $count=count($this->input->post('attributeid'));

      $cards_data=array('category_id'=>$category_id,'subcategory_id'=>$subcategory_id,'card_type_id'=>$cardtype_id,'carddetails_id'=>$carddetails_id);
      $last_insert_id=$this->Cards_Model->add_cards_data($cards_data);
      for($i=0;$i<$count;$i++)
      {
        $cards_attribute_data=array(
          'cards_id'=>$last_insert_id,
          'attribute_id'=>$attributeid[$i],
          'attribute_value'=>$attribute_value[$i]  
        );
        $save=$this->Cards_Model->add_cards_attribute($cards_attribute_data);
      }
      $this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>You have successfully inserted your cards!</strong></span>');
      redirect('Cards/add_cards');
    }
  }
  public function statuschange($id){
    $save=$this->Cards_Model->status_change($id);
    redirect('Cards');
  }
  public function viewcards($id){
    $data['all_category_name']=$this->Cardtype_Model->all_category_name();
    $data['cards_details']=$this->Cards_Model->cards_details_data($id);
    $data['cards_attribute_details']=$this->Cards_Model->cards_attribute_details_data($id);
    common_viewloader('cards/view_cards',$data);
  }
  public function editcards($id){
    $data['all_category_name']=$this->Cardtype_Model->all_category_name();
    $data['editcardsdetails_data']=$this->Cards_Model->cards_details_data($id);
    //pr($data['cards_details']); die();
    $category_id=$data['editcardsdetails_data']->category_id;
    $subcategory_id=$data['editcardsdetails_data']->subcategory_id;
    $card_type_id=$data['editcardsdetails_data']->card_type_id;
    $carddetails_id=$data['editcardsdetails_data']->carddetails_id;
    $data['all_subcategory_name']=$this->Cardtype_Model->all_subcategory_name($category_id);
    //pr($data['all_subcategory_name']); die();
    $data['all_cardtype_name']=$this->Attribute_Model->all_cardtype_name($category_id,$subcategory_id);
    //pr($data['all_cardtype_name']); die();
    $data['all_carddetails_name']=$this->Cards_Model->all_carddetails_name($category_id,$subcategory_id,$card_type_id);
    //pr($data['all_carddetails_name']); die();
    $data['editcardsattributedetails_data']=$this->Cards_Model->cards_attribute_details_data($id);
    //pr($data['editcardsattributedetails_data']); die();
    common_viewloader('cards/edit_cards',$data);
    if($this->input->post('editcards'))
    {
      $category_id=trim($this->input->post('category_id'));
      $subcategory_id=trim($this->input->post('subcategory_id'));
      $cardtype_id=trim($this->input->post('cardtype_id'));
      $carddetails_id=trim($this->input->post('carddetails_id'));
      $attributeid=$this->input->post('attributeid');
      $attribute_value=$this->input->post('attribute_value');
      $edit_id=$this->input->post('edit_id'); 
      $count=count($this->input->post('attributeid'));
      $editcards_data=array('category_id'=>$category_id,'subcategory_id'=>$subcategory_id,'card_type_id'=>$cardtype_id,'carddetails_id'=>$carddetails_id);
      $save_cardsdata=$this->Cards_Model->update_cards($editcards_data,$edit_id);
      for($i=0;$i<$count;$i++)
      {
        $cards_attribute_editdata=array(
          //'cards_id'=>$last_insert_id,
          'attribute_id'=>$attributeid[$i],
          'attribute_value'=>$attribute_value[$i]  
        );
       // pr($cards_attribute_editdata); die();
        $save=$this->Cards_Model->update_cards_attribute($cards_attribute_editdata,$attributeid[$i]);
      }
      $this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>You have successfully update your cards!</strong></span>');
      redirect('Cards');
    }
  }
}

?>