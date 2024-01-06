<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Point_Model extends CI_Model
{
	public function get_tournament($subcategory){
		$sql="select * from tournament WHERE 	subcategory_id='$subcategory' and status='1' and is_deleted='0'";
		$query=$this->db->query($sql);
		$tournament=$query->result_array();
		return $tournament;
	}
	public function add_point($add_point)
 	{
	  $save=$this->db->insert('special_point',$add_point);
	  return $save;
 	}
 	public function all_point_data(){
 		$sql="select c.category_name,s.subcategory_name,t.tournament_name,sp.* from special_point as sp INNER JOIN category as c ON sp.category_id=c.categoryid INNER JOIN subcategory as s ON sp.subcategory_id=s.subcategoryid INNER JOIN tournament as t ON sp.tournament_id=t.tournamentid";
 		$query=$this->db->query($sql);
 		if($query->num_rows()>0)
		{
			$data=$query->result_array();			
			//pr($data); die();
			return $data;
		}
 	}
 	public function status_change($id){
  	$sql="select status from special_point where specialpointid='$id'";
  	$query=$this->db->query($sql);
  	$data=$query->row();
  	//pr($data); die();
  	$status=$data->status;
  	if($status==1)
  	{
  		$this->db->where('specialpointid',$id);
			$save=$this->db->update('special_point',array('status'=>0));
			//echo $save; die();
			return $save;
  	}
  	else
  	{
  	 	$this->db->where('specialpointid',$id);
			$save=$this->db->update('special_point',array('status'=>1));
			//echo $save; die();
			return $save;
  	} 
  }
  public function editpoint_data($id){
  	$sql="select * from special_point WHERE specialpointid='$id'";
  	$query=$this->db->query($sql);
  	$data=$query->row();
  	return $data;
  }
  public function all_tournament_name($category_id,$subcategory_id){
  	$sql="SELECT 	tournamentid,tournament_name FROM tournament WHERE category_id='$category_id' and subcategory_id='$subcategory_id' and status='1' and is_deleted='0'";
		$query=$this->db->query($sql);
		if($query->num_rows()>0)
		{
			$data=$query->result_array();			
			//pr($data); die();
			return $data;
		}
  }
  public function update_point($edit_point,$edit_id){
  	$this->db->where('specialpointid',$edit_id);
		$save=$this->db->update('special_point',$edit_point);
		return $save;
  }
}