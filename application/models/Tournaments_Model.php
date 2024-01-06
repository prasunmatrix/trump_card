<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tournaments_Model extends CI_Model
{
	public function add_tournament($add_tournament)
 	{
	  $save=$this->db->insert('tournament',$add_tournament);
	  return $save;
 	}
 	public function all_tournament_data()
  {
  	$sql="SELECT c.category_name,s.subcategory_name,t.* FROM category as c INNER JOIN tournament as t ON c.categoryid=t.category_id  INNER JOIN subcategory as s ON s.subcategoryid=t.subcategory_id";
		$query=$this->db->query($sql);

		if($query->num_rows()>0)
		{
			$data=$query->result_array();
			//pr($data); die();
			return $data;
		}
  }
  public function status_change($id){
  	$sql="select status from tournament where tournamentid='$id'";
  	$query=$this->db->query($sql);
  	$data=$query->row();
  	//pr($data); die();
  	$status=$data->status;
  	if($status==1)
  	{
  		$this->db->where('tournamentid',$id);
			$save=$this->db->update('tournament',array('status'=>0));
			//echo $save; die();
			return $save;
  	}
  	else
  	{
  	 	$this->db->where('tournamentid',$id);
			$save=$this->db->update('tournament',array('status'=>1));
			//echo $save; die();
			return $save;
  	} 
  }
  public function edittournaments_data($id){
  	$sql="select * from tournament where tournamentid='$id'";
  	$query=$this->db->query($sql);
  	$data=$query->row();
  	//pr($data); die();
  	return $data;
  }
  public function all_subcategory_name($categoryId)
  {
  	$sql="SELECT subcategoryid,subcategory_name FROM subcategory WHERE category_id='$categoryId' and status=1 and is_deleted=0";
		$query=$this->db->query($sql);

		if($query->num_rows()>0)
		{
			$data=$query->result_array();
			//pr($data); die();
			return $data;
		}
  }
  public function update_tournament($edit_tournament_data,$edit_id){
  	$this->db->where('tournamentid',$edit_id);
		$save=$this->db->update('tournament',$edit_tournament_data);
		return $save;
  }
}

?>