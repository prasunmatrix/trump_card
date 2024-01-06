<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Model extends CI_Model
{
	public function loginchk($username,$password)
	{
		$data = $this->db->query("SELECT * FROM admin WHERE username='$username' AND password='$password'")->row();

		return $data;		
	}
	public function change_pass($session_userid,$pass_change){
  	$this->db->where('id',$session_userid);
		$save=$this->db->update('admin',$pass_change);
		return $save;
  }	
}

?>