<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_Model extends CI_Model
{
	public function loginchk($username,$password){
		 $sql="select * from  admin where username='".$username."' AND password='".$password."' AND status=1";
		
		$query=$this->db->query($sql);
		if($query->num_rows()>0)
		{
			foreach($query->result_array() as $row)
			{
				$data[]=$row;
			}
			// echo "<pre>";
			// print_r($data);die();
			return $data;
		}
		
	}
	
}

?>