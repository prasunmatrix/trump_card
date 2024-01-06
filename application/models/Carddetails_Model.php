<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Carddetails_Model extends CI_Model
{
	// public function all_subcategory_name()
 //  {
 //  	$sql="SELECT subcategoryid,subcategory_name FROM subcategory";
	// 	$query=$this->db->query($sql);

	// 	if($query->num_rows()>0)
	// 	{
	// 		foreach($query->result_array() as $rows)
	// 		{
	// 			$data[]=$rows;
	// 		}
	// 		//pr($data); die();
	// 		return $data;
	// 	}
 //  }
  // public function get_cardtype($subcategory)
  // {
  // 	$cardtype = $this->db->query("select * from card_type where subcategory_id='$subcategory' and status=1 and is_deleted=0")->result_array();
  // 	//pr($cardtype); die();
  // 	return $cardtype;	
  // }
  public function add_carddetails($add_carddetails)
 	{
	  $save=$this->db->insert('carddetails',$add_carddetails);
	  return $save;
 	}
 	public function all_carddetails_data(){
 		$sql="select c.category_name,s.subcategory_name,ct.card_type,cd.* from carddetails as cd INNER JOIN category as c ON cd.category_id=c.categoryid INNER JOIN subcategory as s ON cd.subcategory_id=s.subcategoryid INNER JOIN card_type as ct ON cd.card_type_id=ct.cardtypeid";
 		$query=$this->db->query($sql);
 		if($query->num_rows()>0)
		{
			$data=$query->result_array();			
			//pr($data); die();
			return $data;
		}
 	}
 	public function status_change($id){
  	$sql="select status from carddetails where carddetailsid='$id'";
  	$query=$this->db->query($sql);
  	$data=$query->row();
  	//pr($data); die();
  	$status=$data->status;
  	if($status==1)
  	{
  		$this->db->where('carddetailsid',$id);
			$save=$this->db->update('carddetails',array('status'=>0));
			//echo $save; die();
			return $save;
  	}
  	else
  	{
  	 	$this->db->where('carddetailsid',$id);
			$save=$this->db->update('carddetails',array('status'=>1));
			//echo $save; die();
			return $save;
  	} 
  }
  public function editcarddetails_data($id){
  	$sql="select * from carddetails where carddetailsid='$id'";
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
  public function update_carddetails($edit_carddetails_data,$edit_id){
  	$this->db->where('carddetailsid',$edit_id);
		$save=$this->db->update('carddetails',$edit_carddetails_data);
		return $save;
  } 	
}