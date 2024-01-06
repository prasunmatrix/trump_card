<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Carddetails extends MY_Controller 
{
	function __construct() 
  {
    parent::__construct();
    $this->load->model('Carddetails_Model');
    $this->load->model('Cardtype_Model');
    $this->load->model('Attribute_Model');
    $this->admin_session_checked($is_active_session = 1);
  }

  public function index()
  {
    $data['all_carddetails_data']=$this->Carddetails_Model->all_carddetails_data();
    common_viewloader('carddetails/carddetails_lists',$data);
  }

  public function add_carddetails()
  {
    $data['all_category_name']=$this->Cardtype_Model->all_category_name();
    //$data['all_subcategory_name']=$this->Attribute_Model->all_subcategory_name();
    common_viewloader('carddetails/add_carddetails',$data);
  }
  // public function get_cardtype()
  // {
  //   $subcategory = $this->input->post('subcategory');      
  //   $cardtype = $this->Carddetails_Model->get_cardtype($subcategory);
  //   if(count($cardtype)>0)
  //   {
  //     header('Content-Type:application/json');
  //     die(json_encode(array("status"=>"1","message"=>"Success","cardtype"=>$cardtype)));
  //   }
  //   else
  //   {
  //     header('Content-Type:application/json');
  //     die(json_encode(array("status"=>"0","message"=>"Failed")));
  //   }      
  // }
  public function addcarddetails(){
    if($this->input->post('addcarddetails')){
      $category_id=trim($this->input->post('category_id'));
      $subcategory_id=trim($this->input->post('subcategory_id'));
      $cardtype_id=$this->input->post('cardtype_id');
      $card_name=$this->input->post('card_name');
      
      $count=count($this->input->post('card_name'));

      $this->load->library('upload');
      $files = $_FILES;
      //pr($files); die();
      $cpt = count($_FILES['card_image']['name']);
      //echo $cpt;die();
      for($i=0; $i<$cpt; $i++)
      {           
        $_FILES['card_image']['name']= time().$files['card_image']['name'][$i];
        $_FILES['card_image']['type']= $files['card_image']['type'][$i];
        $_FILES['card_image']['tmp_name']= $files['card_image']['tmp_name'][$i];
        $_FILES['card_image']['error']= $files['card_image']['error'][$i];
        $_FILES['card_image']['size']= $files['card_image']['size'][$i];    

        $this->upload->initialize($this->set_upload_options());
        $this->upload->do_upload('card_image');
        // if ( ! $this->upload->do_upload('card_image'))
        // {
        // $error = array('error' => $this->upload->display_errors());
        // $this->session->set_flashdata('msg', '<span style="color:#ff0000;"><strong>Your image not been uploaded,please submit form again!</strong></span>');
        // redirect('Subcategory/add_subcategory');
        // }
        $upload_data = $this->upload->data();
        $name_array[] = $upload_data['file_name'];
        $fileName = $upload_data['file_name'];
        $images[] = $fileName;
      }
      for($j=0;$j<$count;$j++)
      {
        $add_carddetails=array(
        'category_id'=>$category_id,
        'subcategory_id'=>$subcategory_id,
        'card_type_id'=>$cardtype_id,
        'card_name'=>$card_name[$j],
        'card_image'=>$images[$j]
        );
        $save=$this->Carddetails_Model->add_carddetails($add_carddetails);
      }
      $this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>You have successfully inserted your carddetails!</strong></span>');
      redirect('Carddetails/add_carddetails');
    }
  }
  private function set_upload_options()
  {   
    //upload an image options
    $actual_image_name=time().$_FILES['card_image']['name'];
    $ext= pathinfo($actual_image_name, PATHINFO_EXTENSION);
    $file = basename($actual_image_name, ".".$ext); 
    $actual_image=time($file).".".$ext;
    $config = array();
    $config['upload_path'] = './assets/uploads/carddetails';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size']      = '0';
    $config['overwrite']     = FALSE;
    $config['file_name'] = $actual_image;
    return $config;
  }

  public function statuschange($id){
    $save=$this->Carddetails_Model->status_change($id);
    redirect('Carddetails');
  }
  public function editcarddetails($id){
    $data['all_category_name']=$this->Cardtype_Model->all_category_name();
    $data['editcarddetails_data']=$this->Carddetails_Model->editcarddetails_data($id);
    //pr($data['editattribute_data']); die();
    $category_id=$data['editcarddetails_data']->category_id;
    $subcategory_id=$data['editcarddetails_data']->subcategory_id; 
    $data['all_subcategory_name']=$this->Cardtype_Model->all_subcategory_name($category_id);
    $data['all_cardtype_name']=$this->Carddetails_Model->all_cardtype_name($category_id,$subcategory_id); 
    //pr($data['all_cardtype_name']); die();
    common_viewloader('carddetails/edit_carddetails',$data);

    if($this->input->post('editcarddetails'))
    {
      $categoryId=trim($this->input->post('category_id'));
      $subcategoryId=trim($this->input->post('subcategory_id'));
      $cardtype_id=trim($this->input->post('cardtype_id'));
      $card_name=trim($this->input->post('card_name'));
      $old_card_image=trim($this->input->post('old_card_image')); 
      $edit_id=trim($this->input->post('edit_id'));

      if((isset($_FILES['card_image']['name'])) && ($_FILES['card_image']['name']!='')){
        $actual_image_name=$_FILES['card_image']['name'];
        //echo $actual_image_name;die();
        $ext = pathinfo($actual_image_name, PATHINFO_EXTENSION);
        $file = basename($actual_image_name, ".".$ext); 
        $actual_image=time($file).".".$ext;
        $config['upload_path'] = 'assets/uploads/carddetails';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        //$config['max_size'] = '1000';
        //$config['max_width']  = '2048';
        //$config['max_height']  = '1536';
        $config['max_size']      = '0';
        $config['overwrite']     = FALSE;
        $config['file_name']  = $actual_image;

        $this->load->library('upload', $config);
        //pr($config); die();
        if ( ! $this->upload->do_upload('card_image'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('msg', '<span style="color:#ff0000;"><strong>Your image not been uploaded,please submit form again!</strong></span>');
          redirect('Carddetails/editcarddetails/'.$id);
        }  
      }
      if(!empty($actual_image)!="")
      {
        unlink(FCPATH.'assets/uploads/carddetails/'.$old_card_image);
      }
      if(!empty($actual_image)!="")
      {
        $card_image=$actual_image;
      }
      else
      {
        $card_image=$old_card_image;
      } 

      $edit_carddetails_data=array('category_id'=>$categoryId,'subcategory_id'=>$subcategoryId,'card_type_id'=>$cardtype_id,'card_name'=>$card_name,'card_image'=>$card_image);
      $save_carddetails=$this->Carddetails_Model->update_carddetails($edit_carddetails_data,$edit_id);
      $this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>You have successfully update your carddetails!</strong></span>');
      redirect('Carddetails');
    }
  }
}

?>