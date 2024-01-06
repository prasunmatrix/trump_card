<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Members_Model extends CI_Model
{
	public function all_members_data(){
		  $sql = "select * from registration";
			$query=$this->db->query($sql);

			if($query->num_rows()>0)
			{
				foreach($query->result_array() as $rows)
				{
					$data[]=$rows;
				}

				return $data;
			}
	}
	public function get_members_by_filter($value)
	{
		if($value == 0)
		{
			$sql = "select * from registration";
			$query=$this->db->query($sql);

			if($query->num_rows()>0)
			{
				foreach($query->result_array() as $rows)
				{
					$data[]=$rows;
				}

				return $data;
			}
		}
		else if($value == 1)
		{
			$sql="SELECT * FROM `registration` WHERE `created_at`>= DATE_ADD(CURDATE(), INTERVAL -7 DAY)";

			$query=$this->db->query($sql);

			if($query->num_rows()>0)
			{
				foreach($query->result_array() as $rows)
				{
					$data[]=$rows;
				}

				return $data;
			}
		}
		else if($value == 2)
		{
			$sql="SELECT * FROM `registration` WHERE `created_at`>= DATE_ADD(CURDATE(), INTERVAL -15 DAY)";

			$query=$this->db->query($sql);

			if($query->num_rows()>0)
			{
				foreach($query->result_array() as $rows)
				{
					$data[]=$rows;
				}

				return $data;
			}
		}
		else if($value == 3)
		{
			$sql="SELECT * FROM `registration` WHERE `created_at`>= DATE_ADD(CURDATE(), INTERVAL -30 DAY)";

			$query=$this->db->query($sql);

			if($query->num_rows()>0)
			{
				foreach($query->result_array() as $rows)
				{
					$data[]=$rows;
				}

				return $data;
			}
		}
	}
  
  public function get_members_by_filter_by_date($fromDate,$toDate)
  {
  	$from_date=date('Y-m-d',strtotime($fromDate)); 
  	$to_date=date('Y-m-d',strtotime($toDate));
  	$sql="SELECT * FROM `registration` WHERE `created_at` BETWEEN '$from_date' AND '$to_date'";
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
  public function all_statistics_data()
  {
  	$sql="SELECT r.*,s.* FROM registration as r INNER JOIN statistics as s ON r.id=s.registration_id";
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
  	$sql="select status from registration where id='$id'";
  	$query=$this->db->query($sql);
  	$data=$query->row();
  	//pr($data); die();
  	$status=$data->status;
  	if($status==1)
  	{
  		$this->db->where('id',$id);
			$save=$this->db->update('registration',array('status'=>0));
			//echo $save; die();
			return $save;
  	}
  	else
  	{
  	 	$this->db->where('id',$id);
			$save=$this->db->update('registration',array('status'=>1));
			//echo $save; die();
			return $save;
  	} 
  }
	public function view_particularmember($id){
  	$sql="select * from registration where id='$id'";
  	$query=$this->db->query($sql);
  	$data=$query->row();
  	//pr($data); die();
  	return $data;
  }
  public function view_particularstatistics($id){
  	$sql="SELECT r.*,s.* FROM registration as r INNER JOIN statistics as s ON r.id=s.registration_id WHERE statisticsid='$id'";
  	$query=$this->db->query($sql);
  	$data=$query->row();
  	//pr($data); die();
  	return $data;
  }
}

?>