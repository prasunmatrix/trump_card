<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cardtype_Model extends CI_Model
{
	public function all_category_name()
  {
  	$sql="SELECT categoryid,category_name FROM category";
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
	public function all_subcategory_name($categoryId)
  {
  	$sql="SELECT subcategoryid,subcategory_name FROM subcategory WHERE category_id='$categoryId'";
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
 	public function add_cardtype($add_cardtype)
 	{
	  $save=$this->db->insert('card_type',$add_cardtype);
	  return $save;
 	}
 	public function all_cardtype_data()
  {
  	$sql="SELECT c.category_name,s.subcategory_name,ct.* FROM category as c INNER JOIN card_type as ct ON c.categoryid=ct.category_id  INNER JOIN subcategory as s ON s.subcategoryid=ct.subcategory_id";
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
  	$sql="select status from card_type where cardtypeid='$id'";
  	$query=$this->db->query($sql);
  	$data=$query->row();
  	//pr($data); die();
  	$status=$data->status;
  	if($status==1)
  	{
  		$this->db->where('cardtypeid',$id);
			$save=$this->db->update('card_type',array('status'=>0));
			//echo $save; die();
			return $save;
  	}
  	else
  	{
  	 	$this->db->where('cardtypeid',$id);
			$save=$this->db->update('card_type',array('status'=>1));
			//echo $save; die();
			return $save;
  	} 
  }
  public function editcardtype_data($id){
  	$sql="select * from card_type where cardtypeid='$id'";
  	$query=$this->db->query($sql);
  	$data=$query->row();
  	//pr($data); die();
  	return $data;
  }
  public function update_cardtype($edit_cardtype_data,$edit_id){
  	$this->db->where('cardtypeid',$edit_id);
		$save=$this->db->update('card_type',$edit_cardtype_data);
		return $save;
  }
	
}