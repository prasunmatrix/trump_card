<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory extends MY_Controller 
{
	function __construct() 
    {
        parent::__construct();
        $this->load->model('Subcategory_Model');
        $this->admin_session_checked($is_active_session = 1);
    }

    public function index()
    {
      $data['all_subcategory_data']=$this->Subcategory_Model->all_subcategory_data();
      common_viewloader('subcategory/subcategory_lists',$data);
    }

  public function add_subcategory()
  {
    $data['all_category_name']=$this->Subcategory_Model->all_category_name();
    common_viewloader('subcategory/add_subcategory',$data);
  }

  public function addsubcategory(){
    if($this->input->post('addsubcategory')){
      $category_id=trim($this->input->post('category_id'));
      $subcategory_name=$this->input->post('subcategory_name');
      $meta_keyword=$this->input->post('meta_keyword');
      $meta_description=$this->input->post('meta_description');
      $count=count($this->input->post('subcategory_name'));
      $this->load->library('upload');
      $files = $_FILES;
      //pr($files); die();
      $cpt = count($_FILES['sub_category_banner_image']['name']);
      //echo $cpt;die();
      for($i=0; $i<$cpt; $i++)
      {           
        $_FILES['sub_category_banner_image']['name']= time().$files['sub_category_banner_image']['name'][$i];
        $_FILES['sub_category_banner_image']['type']= $files['sub_category_banner_image']['type'][$i];
        $_FILES['sub_category_banner_image']['tmp_name']= $files['sub_category_banner_image']['tmp_name'][$i];
        $_FILES['sub_category_banner_image']['error']= $files['sub_category_banner_image']['error'][$i];
        $_FILES['sub_category_banner_image']['size']= $files['sub_category_banner_image']['size'][$i];    

        $this->upload->initialize($this->set_upload_options());
        $this->upload->do_upload('sub_category_banner_image');
        // if ( ! $this->upload->do_upload('sub_category_banner_image'))
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
        // $fileName = $images;
        // pr($images); die();
      for($j=0;$j<$count;$j++)
      {
        $add_subcategory=array(
        'category_id'=>$category_id,
        'subcategory_name'=>$subcategory_name[$j],
        'subcategory_banner_image'=>$images[$j],
        'meta_keyword'=>$meta_keyword[$j],
        'meta_description'=>$meta_description[$j]
        );
        $savedocument=$this->Subcategory_Model->add_subcategory($add_subcategory);
      }
      $this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>You have successfully inserted your Subcategory!</strong></span>');
      redirect('Subcategory/add_subcategory');
    }
  }

  private function set_upload_options()
  {   
    //upload an image options
    $actual_image_name=time().$_FILES['sub_category_banner_image']['name'];
    $ext= pathinfo($actual_image_name, PATHINFO_EXTENSION);
    $file = basename($actual_image_name, ".".$ext); 
    $actual_image=time($file).".".$ext;
    $config = array();
    $config['upload_path'] = './assets/uploads/subcategory';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size']      = '0';
    $config['overwrite']     = FALSE;
    $config['file_name'] = $actual_image;
    return $config;
  }
  public function statuschange($id){
    $save=$this->Subcategory_Model->status_change($id);
    redirect('Subcategory');
  }
  public function editsubcategory($id){
    $data['all_category_name']=$this->Subcategory_Model->all_category_name();
    $data['editsubcategory_data']=$this->Subcategory_Model->editsubcategory_data($id);
    //pr($data); die();
    common_viewloader('subcategory/edit_subcategory',$data);

    if($this->input->post('editsubcategory'))
    {
      $category_id=trim($this->input->post('category_id'));
      $subcategory_name=trim($this->input->post('subcategory_name')); 
      $meta_keyword=trim($this->input->post('meta_keyword'));
      $meta_description=trim($this->input->post('meta_description'));
      $subcategory_old_image=trim($this->input->post('subcategory_old_image'));
      $edit_id=trim($this->input->post('edit_id')); 

      if((isset($_FILES['sub_category_banner_image']['name'])) && ($_FILES['sub_category_banner_image']['name']!='')){
        $actual_image_name=$_FILES['sub_category_banner_image']['name'];
        //echo $actual_image_name;die();
        $ext = pathinfo($actual_image_name, PATHINFO_EXTENSION);
        $file = basename($actual_image_name, ".".$ext); 
        $actual_image=time($file).".".$ext;
        $config['upload_path'] = './assets/uploads/subcategory';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        //$config['max_size'] = '1000';
        //$config['max_width']  = '2048';
        //$config['max_height']  = '1536';
        $config['max_size']      = '0';
        $config['overwrite']     = FALSE;
        $config['file_name']  = $actual_image;

        $this->load->library('upload', $config);
        //pr($config); die();
        if ( ! $this->upload->do_upload('sub_category_banner_image'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('msg', '<span style="color:#ff0000;"><strong>Your image not been uploaded,please submit form again!</strong></span>');
          redirect('Subcategory/editsubcategory/'.$id);
        }  
      }
      if(!empty($actual_image)!="")
      {
        unlink(FCPATH.'assets/uploads/subcategory/'.$subcategory_old_image);
      }
      if(!empty($actual_image)!="")
      {
        $subcategory_banner_image=$actual_image;
      }
      else
      {
        $subcategory_banner_image=$subcategory_old_image;
      }
      $edit_subcategory_data=array('category_id'=>$category_id,'subcategory_name'=>$subcategory_name,'subcategory_banner_image'=>$subcategory_banner_image,'meta_keyword'=>$meta_keyword,'meta_description'=>$meta_description);
      $save_subcategory=$this->Subcategory_Model->update_subcategory($edit_subcategory_data,$edit_id);
      $this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>You have successfully update your Subcategory!</strong></span>');
      redirect('Subcategory');
    }
  }
}

?>