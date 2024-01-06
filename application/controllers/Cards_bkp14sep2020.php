<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Cards extends MY_Controller 
{
  function __construct() 
  {
    parent::__construct();
    $this->load->model('Cards_Model');
    $this->load->model('Cardtype_Model');
    $this->admin_session_checked($is_active_session = 1);
  }

  public function index()
  {
    $this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->load->view('cards/cards_lists');
		$this->load->view('common/footer');
  }

  public function add_cards()
  {
    $data['all_category_name']=$this->Cardtype_Model->all_category_name();
    common_viewloader('cards/add_cards',$data);
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
}

?>