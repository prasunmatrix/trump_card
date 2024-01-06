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
			$sql="SELECT * FROM `registration` WHERE `member_since`>= DATE_ADD(CURDATE(), INTERVAL -7 DAY)";

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
			$sql="SELECT * FROM `registration` WHERE `member_since`>= DATE_ADD(CURDATE(), INTERVAL -15 DAY)";

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
			$sql="SELECT * FROM `registration` WHERE `member_since`>= DATE_ADD(CURDATE(), INTERVAL -30 DAY)";

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
	
}

?>