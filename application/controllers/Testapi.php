<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Testapi extends MY_Controller 
{
  function __construct() 
    {
        parent::__construct();
        $this->load->model('Members_Model');
        $this->admin_session_checked($is_active_session = 1);
    }

  public function testdata()
  {
    
    $data['all_members_data']=$this->Members_Model->all_members_data();
    header('Content-Type:application/json');
    echo json_encode($data['all_members_data']);
  }
}

//echo APPPATH . '/libraries/REST_Controller.php';
// require (APPPATH . '/libraries/REST_Controller.php'); 

// class Testapi extends REST_Controller 
// {
//   function __construct() 
//   {
//     parent::__construct();
//   }  
  
//   public function index(){
//     echo "test"; die();
//   }
    
// }
?>
