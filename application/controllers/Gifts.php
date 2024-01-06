<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Gifts extends MY_Controller 
{
  function __construct() 
  {
    parent::__construct();
    $this->load->model('Gifts_Model');
    $this->load->model('Cardtype_Model');
    $this->admin_session_checked($is_active_session = 1);
  }

  public function index()
  {
    $data['all_gifts_data']=$this->Gifts_Model->all_gifts_data();
    common_viewloader('gifts/gifts_lists',$data);
  }

  public function add_gifts()
  {
    $data['all_category_name']=$this->Cardtype_Model->all_category_name();
    common_viewloader('gifts/add_gifts',$data);
  }
  public function addgifts(){
    if($this->input->post('addgifts'))
    {
      $category_id=trim($this->input->post('category_id'));
      $subcategory_id=trim($this->input->post('subcategory_id'));
      $gift_name=$this->input->post('gift_name');
      $gift_value=$this->input->post('gift_value');
      $coins_redeem_value=$this->input->post('coins_redeem_value');
      $count=count($this->input->post('gift_name'));

      for($i=0;$i<$count;$i++)
      {
        $gifts_data=array(
          'category_id'=>$category_id,
          'subcategory_id'=>$subcategory_id,
          'gift_voucher_name'=>$gift_name[$i],
          'gift_voucher_value'=>$gift_value[$i],
          'coin_reedem_value'=>$coins_redeem_value[$i]  
        );
        $save=$this->Gifts_Model->add_gifts_data($gifts_data);
      }
      $this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>You have successfully inserted your gifts!</strong></span>');
      redirect('Gifts/add_gifts');
    }
  }
  public function statuschange($id){
    $save=$this->Gifts_Model->status_change($id);
    redirect('Gifts');
  }
  public function editgifts($id){
    $data['all_category_name']=$this->Cardtype_Model->all_category_name();
    $data['editgifts_data']=$this->Gifts_Model->editgifts_data($id);
    //pr($data['editattribute_data']); die();
    $category_id=$data['editgifts_data']->category_id;
    //$subcategory_id=$data['editgifts_data']->subcategory_id; 
    $data['all_subcategory_name']=$this->Cardtype_Model->all_subcategory_name($category_id);
    //pr($data['all_subcategory_name']); die();
    common_viewloader('gifts/edit_gifts',$data);

    if($this->input->post('editgifts'))
    {
      $categoryId=trim($this->input->post('category_id'));
      $subcategoryId=trim($this->input->post('subcategory_id'));
      $gift_name=trim($this->input->post('gift_name'));
      $gift_value=trim($this->input->post('gift_value')); 
      $coins_redeem_value=trim($this->input->post('coins_redeem_value'));
      $edit_id=trim($this->input->post('edit_id'));

      $edit_gifts_data=array('category_id'=>$categoryId,'subcategory_id'=>$subcategoryId,'gift_voucher_name'=>$gift_name,'gift_voucher_value'=>$gift_value,'coin_reedem_value'=>$coins_redeem_value);
      $save_gifts=$this->Gifts_Model->update_gifts($edit_gifts_data,$edit_id);
      $this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>You have successfully update your gifts!</strong></span>');
      redirect('Gifts');
    }
  }
}

?>

