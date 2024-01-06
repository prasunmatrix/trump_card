<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Masterdata_Model extends CI_Model
{
	public function get_category(){
    $sql="select * from category where status='1' and is_deleted='0'";
    $query=$this->db->query($sql);
    $data=$query->result();
    return $data;
  }
  public function get_subcategory(){
    $sql="SELECT c.category_name,s.* FROM category as c INNER JOIN subcategory as s ON c.categoryid=s.category_id WHERE s.status='1' and s.is_deleted='0'";
    $query=$this->db->query($sql);
    $data=$query->result();
    return $data;
  }
  public function get_tournament(){
    $sql="SELECT c.category_name,s.subcategory_name,t.* FROM category as c INNER JOIN tournament as t ON c.categoryid=t.category_id  INNER JOIN subcategory as s ON s.subcategoryid=t.subcategory_id WHERE t.status='1' and t.is_deleted='0'";
    $query=$this->db->query($sql);
    $data=$query->result();
    return $data;
  }
  
}