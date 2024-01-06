<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Managerequests extends MY_Controller 
{
	function __construct() 
  {
    parent::__construct();
    $this->load->model('Managerequests_Model');
    $this->admin_session_checked($is_active_session = 1);
  }

  public function index()
  {
    $data['all_enquiry_data']=$this->Managerequests_Model->all_enquiry_data();
    //pr($data['all_enquiry_data']);die();
    common_viewloader('managerequests/enquiry',$data);
  }
  public function viewenquiry($id)
  {
    $data['particular_enquiry_data']=$this->Managerequests_Model->particular_enquiry_data($id);
    //pr($data['particular_enquiry_data']); die();
    common_viewloader('managerequests/viewenquiry',$data);
  }
  public function emailreply(){
    if($this->input->post('sendemail'))
    {
      $email_id=$this->input->post('email_id');
      $message_subject=$this->input->post('message_subject');
      $reply_meeage=$this->input->post('reply_meeage'); 
      $enquiryid=$this->input->post('enquiryid');

      //$mail_data['email_to'] = $email_id;
      $mail_data['email'] = $email_id;
      $mail_data['subject']  = $message_subject;
      $mail_data['message']  = $reply_meeage;
      $mail_data['base_url'] = base_url();

      $this->custommail->enquery_reply($mail_data);
      $current_date=date('Y-m-d');
      $reply_data=array('is_reply'=>'1','reply_date'=>$current_date,'reply_meeage'=>$reply_meeage);
      $save=$this->Managerequests_Model->update_reply($reply_data,$enquiryid);
      $this->session->set_flashdata('msg', '<span style="color:#00b300;"><strong>You have successfully replied!</strong></span>');
      redirect('Managerequests');
    }
  }

  public function redeem()
  {
    common_viewloader('managerequests/redeem');
  }
    
}

?>