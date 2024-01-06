<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gifts_Model extends CI_Model
{
	public function add_gifts_data($gifts_data)
  {
    $save=$this->db->insert('gifts',$gifts_data);
    return $save;
  }
  public function all_gifts_data(){
 		$sql="select c.category_name,s.subcategory_name,gf.* from gifts as gf INNER JOIN category as c ON gf.category_id=c.categoryid INNER JOIN subcategory as s ON gf.subcategory_id=s.subcategoryid";
 		$query=$this->db->query($sql);
 		if($query->num_rows()>0)
		{
			$data=$query->result_array();			
			//pr($data); die();
			return $data;
		}
 	}

 	public function status_change($id){
  	$sql="select status from gifts where giftsid='$id'";
  	$query=$this->db->query($sql);
  	$data=$query->row();
  	//pr($data); die();
  	$status=$data->status;
  	if($status==1)
  	{
  		$this->db->where('giftsid',$id);
			$save=$this->db->update('gifts',array('status'=>0));
			//echo $save; die();
			return $save;
  	}
  	else
  	{
  	 	$this->db->where('giftsid',$id);
			$save=$this->db->update('gifts',array('status'=>1));
			//echo $save; die();
			return $save;
  	} 
  }
  public function editgifts_data($id){
  	$sql="select * from gifts where giftsid='$id'";
  	$query=$this->db->query($sql);
  	$data=$query->row();
  	//pr($data); die();
  	return $data;
  }
  public function update_gifts($edit_gifts_data,$edit_id){
  	$this->db->where('giftsid',$edit_id);
		$save=$this->db->update('gifts',$edit_gifts_data);
		return $save;
  }
	
}

?>