<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Model extends CI_Model
{
	public function loginchk($emailId,$password)
	{
		$data = $this->db->query("SELECT * FROM admin WHERE email_id='$emailId' AND password='$password'")->row();
		return $data;		
	}

	public function change_pass($session_userid,$pass_change){
  	$this->db->where('id',$session_userid);
		$save=$this->db->update('admin',$pass_change);
		return $save;
  }
  public function profile_details($session_userid)
  {
  	$sql="select * from admin WHERE id='$session_userid'";
  	$query=$this->db->query($sql);
  	$data=$query->row();
  	//pr($data); die();
  	return $data;
  }
  public function update_profile($session_userid,$profile){
  	$this->db->where('id',$session_userid);
		$save=$this->db->update('admin',$profile);
		return $save;
  }	
}

?>