<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Subcategory_Model extends CI_Model
{
	public function all_category_name()
  {
  	$sql="SELECT categoryid,category_name FROM category WHERE status='1' and is_deleted='0'";
		$query=$this->db->query($sql);

		if($query->num_rows()>0)
		{
			foreach($query->result_array() as $rows)
			{
				$data[]=$rows;
			}
			//pr($data); die();
			return $data;
		}
  }
  public function add_subcategory($add_subcategory)
   {
	  $save=$this->db->insert('subcategory',$add_subcategory);
	  return $save;
   }
  public function all_subcategory_data()
  {
  	$sql="SELECT c.category_name,s.* FROM category as c INNER JOIN subcategory as s ON c.categoryid=s.category_id";
		$query=$this->db->query($sql);

		if($query->num_rows()>0)
		{
			foreach($query->result_array() as $rows)
			{
				$data[]=$rows;
			}
			//pr($data); die();
			return $data;
		}
  }
  public function status_change($id){
  	$sql="select status from subcategory where subcategoryid='$id'";
  	$query=$this->db->query($sql);
  	$data=$query->row();
  	//pr($data); die();
  	$status=$data->status;
  	if($status==1)
  	{
  		$this->db->where('subcategoryid',$id);
			$save=$this->db->update('subcategory',array('status'=>0));
			//echo $save; die();
			return $save;
  	}
  	else
  	{
  	 	$this->db->where('subcategoryid',$id);
			$save=$this->db->update('subcategory',array('status'=>1));
			//echo $save; die();
			return $save;
  	} 
  }
  public function editsubcategory_data($id){
  	$sql="select * from subcategory where subcategoryid='$id'";
  	$query=$this->db->query($sql);
  	$data=$query->row();
  	//pr($data); die();
  	return $data;
  }
  public function update_subcategory($edit_subcategory_data,$edit_id){
  	$this->db->where('subcategoryid',$edit_id);
		$save=$this->db->update('subcategory',$edit_subcategory_data);
		return $save;
  }
	
}