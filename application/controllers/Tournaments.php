<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Tournaments extends MY_Controller 
{
	function __construct() 
  {
    parent::__construct();
    $this->load->model('Tournaments_Model');
    $this->load->model('Cardtype_Model');
    $this->admin_session_checked($is_active_session = 1);
  }

  public function index()
  {
    $data['all_tournament_data']=$this->Tournaments_Model->all_tournament_data();
    common_viewloader('tournaments/tournaments_lists',$data);
  }
  public function add_tournament()
  {
    $data['all_category_name']=$this->Cardtype_Model->all_category_name();
    common_viewloader('tournaments/add_tournament',$data);
  }
  public function addtournament(){
    if($this->input->post('addtournament')){
      $category_id=trim($this->input->post('category_id'));
      $subcategory_id=trim($this->input->post('subcategory_id'));
      $tournament_name=$this->input->post('tournament_name');
      //pr($card_type);die();
      $count=count($this->input->post('tournament_name'));

      $this->load->library('upload');
      $files = $_FILES;
      //pr($files); die();
      $cpt = count($_FILES['tournament_banner_image']['name']);
      //echo $cpt;die();
      for($i=0; $i<$cpt; $i++)
      {           
        $_FILES['tournament_banner_image']['name']= time().$files['tournament_banner_image']['name'][$i];
        $_FILES['tournament_banner_image']['type']= $files['tournament_banner_image']['type'][$i];
        $_FILES['tournament_banner_image']['tmp_name']= $files['tournament_banner_image']['tmp_name'][$i];
        $_FILES['tournament_banner_image']['error']= $files['tournament_banner_image']['error'][$i];
        $_FILES['tournament_banner_image']['size']= $files['tournament_banner_image']['size'][$i];    

        $this->upload->initialize($this->set_upload_options());
        $this->upload->do_upload('tournament_banner_image');
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
        $add_tournament=array(
        'category_id'=>$category_id,
        'subcategory_id'=>$subcategory_id,
        'tournament_name'=>$tournament_name[$j],
        'tournament_banner_image'=>$images[$j]
        );
        $save=$this->Tournaments_Model->add_tournament($add_tournament);
      }
      $this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>You have successfully inserted your tournament!</strong></span>');
      redirect('Tournaments/add_tournament');
    }
  }

  private function set_upload_options()
  {   
    //upload an image options
    $actual_image_name=time().$_FILES['tournament_banner_image']['name'];
    $ext= pathinfo($actual_image_name, PATHINFO_EXTENSION);
    $file = basename($actual_image_name, ".".$ext); 
    $actual_image=time($file).".".$ext;
    $config = array();
    $config['upload_path'] = './assets/uploads/tournament';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size']      = '0';
    $config['overwrite']     = FALSE;
    $config['file_name'] = $actual_image;
    return $config;
  }
  public function statuschange($id){
    $save=$this->Tournaments_Model->status_change($id);
    redirect('Tournaments');
  }
  public function edittournaments($id){
    $data['all_category_name']=$this->Cardtype_Model->all_category_name();
    $data['edittournaments_data']=$this->Tournaments_Model->edittournaments_data($id);
    //pr($data['editcardtype_data']); die();
    $category_id=$data['edittournaments_data']->category_id;
    $data['all_subcategory_name']=$this->Tournaments_Model->all_subcategory_name($category_id); 
    common_viewloader('tournaments/edit_tournament',$data);

    if($this->input->post('edittournament'))
    {
      $categoryId=trim($this->input->post('category_id'));
      $subcategoryId=trim($this->input->post('subcategory_id'));
      $tournament_name=trim($this->input->post('tournament_name'));
      $old_tournament_banner_image=trim($this->input->post('old_tournament_banner_image')); 
      $edit_id=trim($this->input->post('edit_id'));

      if((isset($_FILES['tournament_banner_image']['name'])) && ($_FILES['tournament_banner_image']['name']!='')){
        $actual_image_name=$_FILES['tournament_banner_image']['name'];
        //echo $actual_image_name;die();
        $ext = pathinfo($actual_image_name, PATHINFO_EXTENSION);
        $file = basename($actual_image_name, ".".$ext); 
        $actual_image=time($file).".".$ext;
        $config['upload_path'] = 'assets/uploads/tournament';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        //$config['max_size'] = '1000';
        //$config['max_width']  = '2048';
        //$config['max_height']  = '1536';
        $config['max_size']      = '0';
        $config['overwrite']     = FALSE;
        $config['file_name']  = $actual_image;

        $this->load->library('upload', $config);
        //pr($config); die();
        if ( ! $this->upload->do_upload('tournament_banner_image'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('msg', '<span style="color:#ff0000;"><strong>Your image not been uploaded,please submit form again!</strong></span>');
          redirect('Tournaments/edittournaments/'.$id);
        }  
      }
      if(!empty($actual_image)!="")
      {
        unlink(FCPATH.'assets/uploads/tournament/'.$old_tournament_banner_image);
      }
      if(!empty($actual_image)!="")
      {
        $tournament_banner_image=$actual_image;
      }
      else
      {
        $tournament_banner_image=$old_tournament_banner_image;
      } 

      $edit_tournament_data=array('category_id'=>$categoryId,'subcategory_id'=>$subcategoryId,'tournament_name'=>$tournament_name,'tournament_banner_image'=>$tournament_banner_image);
      $save_tournament=$this->Tournaments_Model->update_tournament($edit_tournament_data,$edit_id);
      $this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>You have successfully update your tournament!</strong></span>');
      redirect('Tournaments');
    }
  }

}

?>