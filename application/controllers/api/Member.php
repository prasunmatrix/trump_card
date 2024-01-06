<?php if (!defined('BASEPATH')) EXIT("No direct script access allowed");
require (APPPATH . '/libraries/REST_Controller.php');

class Member extends REST_Controller 
{
  function __construct() 
  {
    parent::__construct();
    $this->load->model('api/Member_Model');
  } 

  public function get_details_post()
  {
    $details = $this->db->get('registration')->result();

    pr($details);
  }

  public function user_register_post()
  {
    $fullname=$this->input->post('fullname');
    $displayname = $this->input->post('displayname');
    $age=$this->input->post('age');
    $email_id=$this->input->post('email_id');
    $mobile_number=$this->input->post('mobile_number');
    $password = $this->input->post('password');
    $location = $this->input->post('location');
    $photo=$this->input->post('photo');

    if($fullname !='' && $displayname !='' &&  $age !='' &&  $email_id !='' && $mobile_number !='' && $password !='' && $location !='')
    {
      $check_email=$this->Member_Model->check_email($email_id);
      $check_mobile=$this->Member_Model->check_mobile($mobile_number);
        if(!empty($check_email))
        {
          $data['status']    = 0;
          $data['message']   = 'Email address already registered';                

          $this->response($data, REST_Controller::HTTP_OK);
        }
        else if(!empty($check_mobile))
        {
          $data['status']    = 0;
          $data['message']   = 'Mobile number already registered';

          $this->response($data, REST_Controller::HTTP_OK);
        }
        else
        {

          $photo = base64_decode($this->input->post('photo'));
          $image_name = md5(uniqid(rand(), true));
          $filename = $image_name . '.' . 'png';
          //rename file name with random number
          $path = "assets/uploads/registration/".$filename;
          //image uploading folder path
          file_put_contents($path . $filename, $photo);
          // image is bind and upload to respective folde

          //$otp = rand(111111,999999);
          if($photo!="")
          {
            $imagename=$filename;
          }
          else
          {
            $imagename='';
          }  

          $saved_data['fullname']     = $fullname;
          $saved_data['displayname']  = $displayname;
          $saved_data['age']          = $age;
          $saved_data['email_id']     = $email_id;
          $saved_data['mobile_number']= $mobile_number;
          $saved_data['memberid']     = $this->globalfunction->unique_id('registration');
          $saved_data['password']     = base64_encode($password);
          $saved_data['location']     = $location;
          $saved_data['photo']         = $imagename;

          //$insert_data = $this->db->insert("users", $saved_data);
            $insert_data=$this->Member_Model->insert_member($saved_data);

            if($insert_data)
            {
              $mail_data['name']     = $name;
              $mail_data['email']    = $email;
              $mail_data['password'] = $password;
              $mail_data['baseurl']  = base_url();

              $this->custommailapi->customer_registration($mail_data);

              $data['status']    = 1;
              $data['message']   = 'Registration successfully done';

              $this->response($data, REST_Controller::HTTP_OK);
            }
            else
            {
                $data['status']    = 0;
                $data['message']   = 'Failed';

                $this->response($data, REST_Controller::HTTP_OK);
            }
        }
    }
    else
    {
        $data['status']    = 0;
        $data['message']   = 'Please check your parameters';

        $this->response($data, REST_Controller::HTTP_OK);
    }
  }  
}