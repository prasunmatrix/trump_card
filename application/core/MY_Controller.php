<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{
	function __construct() 
    {
      parent::__construct();
    }

	public function set_admin_session($admindata = array()) 
    {
      if(!empty($admindata)) 
      {
        $this->session->set_userdata('admin', $admindata);
      }
    }

    public function destroy_admin_session() 
    {
      if($this->session->has_userdata('admin')) 
      {
        $this->session->unset_userdata('admin');
      }
    }

    public function admin_session_checked($is_active_session = 1) 
    {
  	if($is_active_session) 
      {
        if(!$this->session->has_userdata('admin')) 
        {
          redirect('Admin/login');
        }
      } 
      else 
      {
        if($this->session->has_userdata('admin')) 
        {
          redirect('Admin');
        }
      }
    }

}		