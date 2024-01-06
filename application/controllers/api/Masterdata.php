<?php if (!defined('BASEPATH')) EXIT("No direct script access allowed");
require (APPPATH . '/libraries/REST_Controller.php');
class Masterdata extends REST_Controller 
{
	function __construct() 
  {
    parent::__construct();
    $this->load->model('api/Masterdata_Model');
  }
  public function all_category_data_post(){
  	$category_data=$this->Masterdata_Model->get_category();
  	if(!empty($category_data))
  	{
  		foreach ($category_data as $value) {
  			$category_image = base_url().'assets/uploads/category/'.$value->category_banner_image;
  			$categorydata[] = array(
                  'category_name'     	 => $value->category_name,
                  'category_banner_image'=> $category_image,
                  'meta_keyword'         => $value->meta_keyword,
                  'meta_description'     => $value->meta_description
                );
  		}
      $data['status']      = 1;
      $data['message']     = 'Success';
      $data['response']    = $categorydata;
      $this->response($data, REST_Controller::HTTP_OK);
  	}
  	else
  	{
  		$data['status']    = 0;
      $data['message']   = 'No category found';
      $this->response($data, REST_Controller::HTTP_OK);
  	}
  }
  public function all_subcategory_data_post(){
  	$subcategory_data=$this->Masterdata_Model->get_subcategory();
  	if(!empty($subcategory_data))
  	{
  		foreach ($subcategory_data as $value) {
  			$subcategory_image = base_url().'assets/uploads/subcategory/'.$value->subcategory_banner_image;
  			$subcategorydata[] = array(
                  'category_name'     	 => $value->category_name,
                  'subcategory_name'     => $value->subcategory_name,
                  'subcategory_banner_image'=> $subcategory_image,
                  'meta_keyword'         => $value->meta_keyword,
                  'meta_description'     => $value->meta_description
                );
  		}
      $data['status']      = 1;
      $data['message']     = 'Success';
      $data['response']    = $subcategorydata;
      $this->response($data, REST_Controller::HTTP_OK);
  	}
  	else
  	{
  		$data['status']    = 0;
      $data['message']   = 'No subcategory found';
      $this->response($data, REST_Controller::HTTP_OK);
  	}
  }
  public function all_tournament_data_post(){
  	$tournament_data=$this->Masterdata_Model->get_tournament();
  	if(!empty($tournament_data))
  	{
  		foreach ($tournament_data as $value) {
  			$tournament_image = base_url().'assets/uploads/tournament/'.$value->tournament_banner_image;
  			$tournamentdata[] = array(
                  'category_name'     	 => $value->category_name,
                  'subcategory_name'     => $value->subcategory_name,
                  'tournament_name'			 => $value->tournament_name,
                  'tournament_banner_image'=> $tournament_image,
                );
  		}
      $data['status']      = 1;
      $data['message']     = 'Success';
      $data['response']    = $tournamentdata;
      $this->response($data, REST_Controller::HTTP_OK);
  	}
  	else
  	{
  		$data['status']    = 0;
      $data['message']   = 'No tournament found';
      $this->response($data, REST_Controller::HTTP_OK);
  	}
  }

}