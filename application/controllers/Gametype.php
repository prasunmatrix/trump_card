<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Gametype extends MY_Controller 
{
	function __construct() 
  {
    parent::__construct();
    $this->load->model('Gametype_Model');
    $this->load->model('Cardtype_Model');
    $this->admin_session_checked($is_active_session = 1);
  }
  public function index()
  {
    $data['all_gametype_data']=$this->Gametype_Model->all_gametype_data();
    common_viewloader('gametype/gametype_lists',$data);
  }
  public function add_gametype()
  {
    $data['all_category_name']=$this->Cardtype_Model->all_category_name();
    $data['all_game_category']=$this->Gametype_Model->all_game_category();
    common_viewloader('gametype/add_gametype',$data);
  }
  public function addgametype(){
    if($this->input->post('addgametype'))
    {
      $category_id=$this->input->post('category_id');
      $subcategory_id=$this->input->post('subcategory_id');
      $gamecategoryid=$this->input->post('gamecategoryid');
      //pr($gamecategoryid); 
      $cards_to_be_played=$this->input->post('cards_to_be_played');
      //pr($cards_to_be_played); die();
      // $cards_played=array_filter($cards_to_be_played);
      // //pr($cards_played); die(); 
      // $keys = array('0','1', '2', '3');
      // foreach ($cards_played as $key => $value) {
      //   // echo $value;
      //   // echo "<br>";
      //   $new_cards = array_fill_keys($keys, $value);
      //   //pr($new_cards);
      // }
      $count=count($this->input->post('gamecategoryid'));
      for($i=0;$i<$count;$i++)
      {
        $gametype_data=array(
        'category_id'=>$category_id,
        'subcategory_id'=>$subcategory_id,
        'gamecategory_id'=>$gamecategoryid[$i],
        'cards_to_be_played'=>$cards_to_be_played[$i]
        );  
        $save=$this->Gametype_Model->add_gametype_data($gametype_data);
      }
      $this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>You have successfully inserted your gametype!</strong></span>');
      redirect('Gametype/add_gametype');
    }
  }
  public function statuschange($id){
    $save=$this->Gametype_Model->status_change($id);
    redirect('Gametype');
  }
  public function editgametype($id){
    $data['all_category_name']=$this->Cardtype_Model->all_category_name();
    $data['editgametype_data']=$this->Gametype_Model->editgametype_data($id);
    //pr($data['editgametype_data']); die();
    $category_id=$data['editgametype_data']->category_id;
    //$subcategory_id=$data['editgametype_data']->subcategory_id; 
    $gamecategory_id=$data['editgametype_data']->gamecategory_id;
    $data['all_subcategory_name']=$this->Cardtype_Model->all_subcategory_name($category_id);
    $data['game_category']=$this->Gametype_Model->game_category($gamecategory_id); 
    //pr($data['game_category']); die();
    common_viewloader('gametype/edit_gametype',$data);

    if($this->input->post('editgametype'))
    {
      $categoryId=trim($this->input->post('category_id'));
      $subcategoryId=trim($this->input->post('subcategory_id'));
      $gamecategoryid=trim($this->input->post('gamecategoryid'));
      $cards_to_be_played=trim($this->input->post('cards_to_be_played')); 
      $edit_id=trim($this->input->post('edit_id')); 

      $edit_gametype_data=array('category_id'=>$categoryId,'subcategory_id'=>$subcategoryId,'gamecategory_id'=>$gamecategoryid,'cards_to_be_played'=>$cards_to_be_played);
      $save_gametype=$this->Gametype_Model->update_gametype($edit_gametype_data,$edit_id);
      $this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>You have successfully update your gametype!</strong></span>');
      redirect('Gametype');
    }
  } 
}

?>