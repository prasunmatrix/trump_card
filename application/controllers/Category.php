<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller 
{
	function __construct() 
  {
    parent::__construct();
    $this->load->model('Category_Model');
    $this->admin_session_checked($is_active_session = 1);
  }

  public function index()
  {
    $data['all_category_data']=$this->Category_Model->all_category_data();
    common_viewloader('category/category_lists',$data);
  }

  public function add_category()
  {
    common_viewloader('category/add_category');
  }
  public function addcategory(){
    if($this->input->post('addcategory'))
    {
      $category_name=trim($this->input->post('category_name'));
      $meta_keyword=trim($this->input->post('meta_keyword'));
      $meta_description=trim($this->input->post('meta_description'));

      if((isset($_FILES['category_banner_image']['name'])) && ($_FILES['category_banner_image']['name']!='')){
        $actual_image_name=$_FILES['category_banner_image']['name'];
        //echo $actual_image_name;die();
        $ext = pathinfo($actual_image_name, PATHINFO_EXTENSION);
        $file = basename($actual_image_name, ".".$ext); 
        //$actual_image=time($file).".".$ext;
        $actual_image=time().".".$ext;
        $config['upload_path'] = './assets/uploads/category';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        //$config['max_size'] = '1000';
        //$config['max_width']  = '2048';
        //$config['max_height']  = '1536';
        $config['max_size']      = '0';
        $config['overwrite']     = FALSE;
        $config['file_name']  = $actual_image;

        $this->load->library('upload', $config);
        //pr($config); die();
        if ( ! $this->upload->do_upload('category_banner_image'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('msg', '<span style="color:#ff0000;"><strong>Your image not been uploaded,please submit form again!</strong></span>');
          redirect('Category/add_category');
        }  
      }
      $add_category=array('category_name'=>$category_name,'category_banner_image'=>$actual_image,'meta_keyword'=>$meta_keyword,'meta_description'=>$meta_description);
      $save_category=$this->Category_Model->add_category($add_category);
      $this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>You have successfully inserted your category!</strong></span>');
      redirect('Category/add_category');
    }
  }
  public function statuschange($id){
    $save=$this->Category_Model->status_change($id);
    redirect('Category');
  }
  public function editcategory($id){
    $data['editcategory_data']=$this->Category_Model->editcategory_data($id);
    //pr($data); die();
    common_viewloader('category/edit_category',$data);

    if($this->input->post('editcategory'))
    {
      $category_name=trim($this->input->post('category_name')); 
      $meta_keyword=trim($this->input->post('meta_keyword'));
      $meta_description=trim($this->input->post('meta_description'));
      $category_old_image=trim($this->input->post('category_old_image'));
      $edit_id=trim($this->input->post('edit_id')); 

      if((isset($_FILES['category_banner_image']['name'])) && ($_FILES['category_banner_image']['name']!='')){
        $actual_image_name=$_FILES['category_banner_image']['name'];
        //echo $actual_image_name;die();
        $ext = pathinfo($actual_image_name, PATHINFO_EXTENSION);
        $file = basename($actual_image_name, ".".$ext); 
        //echo time(); die;
        $actual_image=time().".".$ext;
        $config['upload_path'] = './assets/uploads/category';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        //$config['max_size'] = '1000';
        //$config['max_width']  = '2048';
        //$config['max_height']  = '1536';
        $config['max_size']      = '0';
        $config['overwrite']     = FALSE;
        $config['file_name']  = $actual_image;

        $this->load->library('upload', $config);
        //pr($config); die();
        if ( ! $this->upload->do_upload('category_banner_image'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('msg', '<span style="color:#ff0000;"><strong>Your image not been uploaded,please submit form again!</strong></span>');
          redirect('Category/editcategory/'.$id);
        }  
      }
      if(!empty($actual_image)!="")
      {
        unlink(FCPATH.'assets/uploads/category/'.$category_old_image);
      }
      if(!empty($actual_image)!="")
      {
        $category_banner_image=$actual_image;
      }
      else
      {
        $category_banner_image=$category_old_image;
      }
      $edit_category_data=array('category_name'=>$category_name,'category_banner_image'=>$category_banner_image,'meta_keyword'=>$meta_keyword,'meta_description'=>$meta_description);
      $save_category=$this->Category_Model->update_category($edit_category_data,$edit_id);
      $this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>You have successfully update your category!</strong></span>');
      redirect('Category');
    }
  }

}

?>