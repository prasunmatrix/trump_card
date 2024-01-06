<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category_Model extends CI_Model
{
	public function add_category($add_category){
		$save_category=$this->db->insert('category',$add_category);
		 return $save_category;
	}
	public function all_category_data()
  {
  	$sql="SELECT * FROM category";
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
  	$sql="select status from category where categoryid='$id'";
  	$query=$this->db->query($sql);
  	$data=$query->row();
  	//pr($data); die();
  	$status=$data->status;
  	if($status==1)
  	{
  		$this->db->where('categoryid',$id);
			$save=$this->db->update('category',array('status'=>0));
			//echo $save; die();
			return $save;
  	}
  	else
  	{
  	 	$this->db->where('categoryid',$id);
			$save=$this->db->update('category',array('status'=>1));
			//echo $save; die();
			return $save;
  	} 
  }
  public function editcategory_data($id){
  	$sql="select * from category where categoryid='$id'";
  	$query=$this->db->query($sql);
  	$data=$query->row();
  	//pr($data); die();
  	return $data;
  }
  public function update_category($edit_category_data,$edit_id){
  	$this->db->where('categoryid',$edit_id);
		$save=$this->db->update('category',$edit_category_data);
		return $save;
  }		
}