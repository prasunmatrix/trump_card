<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Managerequests_Model extends CI_Model
{
	public function all_enquiry_data(){
		$sql="select * from enquiry";
		$query=$this->db->query($sql);
		if($query->num_rows()>0)
		{
			$data=$query->result_array();
			return $data;
		}
	}
	public function particular_enquiry_data($id){
		$sql="select * from enquiry WHERE enquiryid='$id'";
		$query=$this->db->query($sql);
		$data=$query->row();
		return $data;
	}
	public function update_reply($reply_data,$enquiryid){
		$this->db->where('enquiryid',$enquiryid);
		$save=$this->db->update('enquiry',$reply_data);
		return $save;
	}	
}