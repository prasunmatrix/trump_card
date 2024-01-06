<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cards_Model extends CI_Model
{
	public function get_carddetails($cardtypeId)
	{
		$carddetails = $this->db->query("select * from carddetails where 	card_type_id='$cardtypeId' and status=1 and is_deleted=0")->result_array();
  	//pr($attribute); die();
  	return $carddetails;
	}
	public function get_attribute_data($cardtypeId)
  {
  	$attribute = $this->db->query("select * from attributes_points where 	card_type_id='$cardtypeId' and status=1 and is_deleted=0")->result_array();
  	//pr($attribute); die();
  	return $attribute;	
  }
  public function add_cards_data($add_cards_data)
 	{
	  $this->db->insert('cards',$add_cards_data);
	  $insert_id = $this->db->insert_id();
	  return $insert_id;
 	}
 	public function  add_cards_attribute($cards_attribute_data)
 	{
 		$save=$this->db->insert('cards_attribute',$cards_attribute_data);
	  return $save;
 	}
 	public function all_cards_data(){
 		$sql="select c.category_name,s.subcategory_name,ct.card_type,cd.card_name,cr.* from cards as cr INNER JOIN category as c ON cr.category_id=c.categoryid INNER JOIN subcategory as s ON cr.subcategory_id=s.subcategoryid INNER JOIN card_type as ct ON cr.card_type_id=ct.cardtypeid INNER JOIN carddetails as cd ON cr.carddetails_id=cd.carddetailsid";
 		$query=$this->db->query($sql);
 		if($query->num_rows()>0)
		{
			$data=$query->result_array();			
			//pr($data); die();
			return $data;
		}
 	}
 	public function status_change($id){
  	$sql="select status from cards where cardsid='$id'";
  	$query=$this->db->query($sql);
  	$data=$query->row();
  	//pr($data); die();
  	$status=$data->status;
  	if($status==1)
  	{
  		$this->db->where('cardsid',$id);
			$save=$this->db->update('cards',array('status'=>0));
			//echo $save; die();
			return $save;
  	}
  	else
  	{
  	 	$this->db->where('cardsid',$id);
			$save=$this->db->update('cards',array('status'=>1));
			//echo $save; die();
			return $save;
  	} 
  }
  public function cards_details_data($id){
  	//$sql="select c.category_name,s.subcategory_name,ct.card_type,cd.card_name,cr.*,ca.*,ap.attribute_name from cards as cr INNER JOIN category as c ON cr.category_id=c.categoryid INNER JOIN subcategory as s ON cr.subcategory_id=s.subcategoryid INNER JOIN card_type as ct ON cr.card_type_id=ct.cardtypeid INNER JOIN carddetails as cd ON cr.carddetails_id=cd.carddetailsid INNER JOIN cards_attribute as ca ON cr.cardsid=ca.cards_id INNER JOIN attributes_points as ap ON ca.attribute_id=ap.attributeid WHERE cr.cardsid='$id'";
  	$sql="select c.category_name,s.subcategory_name,ct.card_type,cd.card_name,cr.* from cards as cr INNER JOIN category as c ON cr.category_id=c.categoryid INNER JOIN subcategory as s ON cr.subcategory_id=s.subcategoryid INNER JOIN card_type as ct ON cr.card_type_id=ct.cardtypeid INNER JOIN carddetails as cd ON cr.carddetails_id=cd.carddetailsid WHERE cr.cardsid='$id'";
 		$query=$this->db->query($sql);
		$data=$query->row();			
		//pr($data); 
		//die();
		return $data;		
  }
  public function cards_attribute_details_data($id){
  	$sql="select ca.*,ap.attribute_name from cards_attribute as ca INNER JOIN attributes_points as ap ON ca.attribute_id=ap.attributeid WHERE ca.	cards_id='$id'";
 		$query=$this->db->query($sql);
		$data=$query->result_array();
		//pr($data); die();
		return $data;
  }
  public function all_carddetails_name($category_id,$subcategory_id,$card_type_id){
  	$sql="SELECT carddetailsid,card_name FROM carddetails WHERE category_id='$category_id' and subcategory_id='$subcategory_id' and card_type_id='$card_type_id' and status=1 and is_deleted=0";
  	$query=$this->db->query($sql);
  	if($query->num_rows()>0)
		{
			$data=$query->result_array();			
			//pr($data); die();
			return $data;
		}
  }
  public function update_cards($editcards_data,$edit_id){
    $this->db->where('cardsid',$edit_id);
    $save=$this->db->update('cards',$editcards_data);
    return $save;
  }
  public function update_cards_attribute($cards_attribute_editdata,$attributeid){
    $this->db->where('cards_attribute_id',$attributeid);
    $save=$this->db->update('cards_attribute',$cards_attribute_editdata);
    return $save;
  }

}

?>