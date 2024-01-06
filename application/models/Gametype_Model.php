<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gametype_Model extends CI_Model
{
	public function all_game_category(){
		$sql="select * from game_category WHERE status='1' and is_deleted='0'";
		$query=$this->db->query($sql);
		if($query->num_rows()>0)
		{
			$data=$query->result_array();
			//pr($data); die();
			return $data;
		}
	}
	public function add_gametype_data($gametype_data){
		$save=$this->db->insert('gametype',$gametype_data);
	  return $save;
	}
	public function all_gametype_data(){
 		$sql="select c.category_name,s.subcategory_name,gc.gametype_name,gt.* from gametype as gt INNER JOIN category as c ON gt.category_id=c.categoryid INNER JOIN subcategory as s ON gt.subcategory_id=s.subcategoryid INNER JOIN game_category as gc ON gt.gamecategory_id=gc.gamecategoryid";
 		$query=$this->db->query($sql);
 		if($query->num_rows()>0)
		{
			$data=$query->result_array();			
			//pr($data); die();
			return $data;
		}
 	}
 	public function status_change($id){
  	$sql="select status from gametype where gametypeid='$id'";
  	$query=$this->db->query($sql);
  	$data=$query->row();
  	//pr($data); die();
  	$status=$data->status;
  	if($status==1)
  	{
  		$this->db->where('gametypeid',$id);
			$save=$this->db->update('gametype',array('status'=>0));
			//echo $save; die();
			return $save;
  	}
  	else
  	{
  	 	$this->db->where('gametypeid',$id);
			$save=$this->db->update('gametype',array('status'=>1));
			//echo $save; die();
			return $save;
  	} 
  }
  public function editgametype_data($id){
  	$sql="select * from gametype where gametypeid='$id'";
  	$query=$this->db->query($sql);
  	$data=$query->row();
  	//pr($data); die();
  	return $data;
  }
  public function game_category($gamecategory_id){
  	$sql="select * from game_category where gamecategoryid='$gamecategory_id'";
  	$query=$this->db->query($sql);
  	$data=$query->row();
  	//pr($data); die();
  	return $data;
  }
  public function update_gametype($edit_gametype_data,$edit_id){
  	$this->db->where('gametypeid',$edit_id);
		$save=$this->db->update('gametype',$edit_gametype_data);
		return $save;
  }
}