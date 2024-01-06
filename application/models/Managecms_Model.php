<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Managecms_Model extends CI_Model
{
	public function insertPage($add_page)
 	{
	  $save=$this->db->insert('managecms',$add_page);
	  return $save;
 	}
 	public function managecms_all_data()
 	{
 		$sql="select * from managecms";
 		$query=$this->db->query($sql);
 		$data=$query->result_array();
 		//pr($data); die();
 		return $data;
 	}
 	public function status_change($id){
  	$sql="select status from managecms where cmsid='$id'";
  	$query=$this->db->query($sql);
  	$data=$query->row();
  	//pr($data); die();
  	$status=$data->status;
  	if($status==1)
  	{
  		$this->db->where('cmsid',$id);
			$save=$this->db->update('managecms',array('status'=>0));
			//echo $save; die();
			return $save;
  	}
  	else
  	{
  	 	$this->db->where('cmsid',$id);
			$save=$this->db->update('managecms',array('status'=>1));
			//echo $save; die();
			return $save;
  	} 
  }
  public function editpage_data($id){
  	$sql="select * from managecms where cmsid='$id'";
  	$query=$this->db->query($sql);
  	$data=$query->row();
  	//pr($data); die();
  	return $data;
  }
  public function update_page($edit_page_data,$edit_id){
  	$this->db->where('cmsid',$edit_id);
		$save=$this->db->update('managecms',$edit_page_data);
		return $save;
  }
	
}