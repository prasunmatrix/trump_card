<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Managecms extends MY_Controller 
{
	function __construct() 
  {
    parent::__construct();
    $this->load->model('Managecms_Model');
    $this->admin_session_checked($is_active_session = 1);
  }

  public function index()
  {
    $data['managecms_all_data']=$this->Managecms_Model->managecms_all_data();
    common_viewloader('managecms/managecms_lists',$data);
  }

  // public function gamerules()
  // {
  // 	$this->load->view('common/header');
		// $this->load->view('common/sidebar');
		// $this->load->view('managecms/gamerules');
		// $this->load->view('common/footer');
  // }
  // public function privacypolicy()
  // {
  //   $this->load->view('common/header');
  //   $this->load->view('common/sidebar');
  //   $this->load->view('managecms/privacypolicy');
  //   $this->load->view('common/footer');
  // }
  // public function termsandconditions()
  // {
  //   $this->load->view('common/header');
  //   $this->load->view('common/sidebar');
  //   $this->load->view('managecms/termsandconditions');
  //   $this->load->view('common/footer');
  // }
  public function create_page()
  {
    common_viewloader('managecms/createpage');
  }
  public function createpage()
  {
    if($this->input->post('createpage'))
    {
      $page_title=trim($this->input->post('page_title'));
      $page_slug=trim($this->input->post('page_slug'));
      $content=trim($this->input->post('content'));
      if((isset($_FILES['page_image']['name'])) && ($_FILES['page_image']['name']!='')){
        $actual_image_name=$_FILES['page_image']['name'];
        //echo $actual_image_name;die();
        $ext = pathinfo($actual_image_name, PATHINFO_EXTENSION);
        $file = basename($actual_image_name, ".".$ext); 
        $actual_image=time($file).".".$ext;
        $config['upload_path'] = './assets/uploads/cms';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        //$config['max_size'] = '1000';
        //$config['max_width']  = '2048';
        //$config['max_height']  = '1536';
        $config['max_size']      = '0';
        $config['overwrite']     = FALSE;
        $config['file_name']  = $actual_image;

        $this->load->library('upload', $config);
        //pr($config); die();
        if ( ! $this->upload->do_upload('page_image'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('msg', '<span style="color:#ff0000;"><strong>Your image not been uploaded,please submit form again!</strong></span>');
          redirect('Managecms/create_page');
        }
      }
      if(!empty($actual_image)!="")
      {
        $page_image=$actual_image;
      }
      else
      {
        $page_image='';
      }  
      $add_page=array('page_title'=>$page_title,'page_slug'=>$page_slug,'image'=>$page_image,'content'=>$content);
      $save_page=$this->Managecms_Model->insertPage($add_page);
      $this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>You have successfully create your page!</strong></span>');
      redirect('Managecms/create_page');  
    }
  }
  public function statuschange($id){
    $save=$this->Managecms_Model->status_change($id);
    redirect('Managecms');
  }
  public function editpage($id)
  {
    $data['editpage_data']=$this->Managecms_Model->editpage_data($id);
    common_viewloader('managecms/edit_page',$data);

    if($this->input->post('editpage'))
    {
      $page_title=trim($this->input->post('page_title'));
      $page_slug=trim($this->input->post('page_slug'));
      $content=trim($this->input->post('content'));
      $page_old_image=trim($this->input->post('page_old_image')); 
      $edit_id=trim($this->input->post('edit_id'));

      if((isset($_FILES['page_image']['name'])) && ($_FILES['page_image']['name']!='')){
        $actual_image_name=$_FILES['page_image']['name'];
        //echo $actual_image_name;die();
        $ext = pathinfo($actual_image_name, PATHINFO_EXTENSION);
        $file = basename($actual_image_name, ".".$ext); 
        $actual_image=time($file).".".$ext;
        $config['upload_path'] = './assets/uploads/cms';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        //$config['max_size'] = '1000';
        //$config['max_width']  = '2048';
        //$config['max_height']  = '1536';
        $config['max_size']      = '0';
        $config['overwrite']     = FALSE;
        $config['file_name']  = $actual_image;

        $this->load->library('upload', $config);
        //pr($config); die();
        if ( ! $this->upload->do_upload('page_image'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('msg', '<span style="color:#ff0000;"><strong>Your image not been uploaded,please submit form again!</strong></span>');
          redirect('Managecms/create_page');
        } 
      }
      if(!empty($actual_image)!="")
      {
        unlink(FCPATH.'assets/uploads/cms/'.$page_old_image);
      }
      if(!empty($actual_image)!="")
      {
        $page_image=$actual_image;
      }
      else
      {
        $page_image=$page_old_image;
      } 
      $edit_page_data=array('page_title'=>$page_title,'page_slug'=>$page_slug,'image'=>$page_image,'content'=>$content);
      $save=$this->Managecms_Model->update_page($edit_page_data,$edit_id);
      $this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>You have successfully update your page!</strong></span>');
      redirect('Managecms');
    }
  }
  public function uploadSummernoteImage()
  {
    if((isset($_FILES['file']['name'])) && ($_FILES['file']['name']!='')){
      $actual_image_name=$_FILES['file']['name'];
      //echo $actual_image_name;die();
      $ext = pathinfo($actual_image_name, PATHINFO_EXTENSION);
      $file = basename($actual_image_name, ".".$ext); 
      $actual_image=time($file).".".$ext;
      $config['upload_path'] = 'assets/uploads/cms/summernote';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      //$config['max_size'] = '1000';
      //$config['max_width']  = '2048';
      //$config['max_height']  = '1536';
      $config['max_size']      = '0';
      $config['overwrite']     = FALSE;
      $config['file_name']  = $actual_image;

      $this->load->library('upload', $config);
      //pr($config); die();
      echo base_url().$config['upload_path'].'/'.$actual_image;
      if ( ! $this->upload->do_upload('file'))
      {
        $error = array('error' => $this->upload->display_errors());
        $this->session->set_flashdata('msg', '<span style="color:#ff0000;"><strong>Your image not been uploaded,please submit form again!</strong></span>');
        redirect('Managecms/create_page');
      }
    }
  }


}

?>