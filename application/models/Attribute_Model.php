<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Attribute_Model extends CI_Model
{
	public function all_subcategory_name()
  {
  	$sql="SELECT subcategoryid,subcategory_name FROM subcategory";
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
  public function get_cardtype($subcategory)
  {
  	$subcategory = $this->db->query("select * from card_type where subcategory_id='$subcategory' and status=1 and is_deleted=0")->result_array();
  	//pr($subcategory); die();
  	return $subcategory;	
  }
  public function add_attribute($add_attribute)
 	{
	  $save=$this->db->insert('attributes_points',$add_attribute);
	  return $save;
 	}
 	public function all_attribute_data(){
 		$sql="select c.category_name,s.subcategory_name,ct.card_type,at.* from attributes_points as at INNER JOIN category as c ON at.category_id=c.categoryid INNER JOIN subcategory as s ON at.subcategory_id=s.subcategoryid INNER JOIN card_type as ct ON at.card_type_id=ct.cardtypeid";
 		$query=$this->db->query($sql);
 		if($query->num_rows()>0)
		{
			$data=$query->result_array();			
			//pr($data); die();
			return $data;
		}
 	}
 	public function status_change($id){
  	$sql="select status from attributes_points where attributeid='$id'";
  	$query=$this->db->query($sql);
  	$data=$query->row();
  	//pr($data); die();
  	$status=$data->status;
  	if($status==1)
  	{
  		$this->db->where('attributeid',$id);
			$save=$this->db->update('attributes_points',array('status'=>0));
			//echo $save; die();
			return $save;
  	}
  	else
  	{
  	 	$this->db->where('attributeid',$id);
			$save=$this->db->update('attributes_points',array('status'=>1));
			//echo $save; die();
			return $save;
  	} 
  }
  public function editattribute_data($id){
  	$sql="select * from attributes_points where attributeid='$id'";
  	$query=$this->db->query($sql);
  	$data=$query->row();
  	//pr($data); die();
  	return $data;
  }
  public function all_cardtype_name($categoryId,$subcategory_id)
  {
  	$sql="SELECT cardtypeid,card_type FROM card_type WHERE category_id='$categoryId' and 	subcategory_id='$subcategory_id' and status=1 and is_deleted=0";
		$query=$this->db->query($sql);

		if($query->num_rows()>0)
		{
			$data=$query->result_array();			
			//pr($data); die();
			return $data;
		}
  }
  public function update_attribute($edit_attribute_data,$edit_id){
  	$this->db->where('attributeid',$edit_id);
		$save=$this->db->update('attributes_points',$edit_attribute_data);
		return $save;
  } 	
}