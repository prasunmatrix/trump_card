<?php 

if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

class Custommail
{ 
    public function __construct()
    {
        $this->CI =& get_instance();
    }    

    private function _send_mail($receiver, $from, $subject, $body)
    {
        $config['smtp_host'] = '';
        $config['smtp_port'] = '';
        $config['smtp_user'] = '';
        $config['smtp_pass'] = '';
        $config['mailtype']  = 'html'; 
        $config['charset']   = 'utf-8'; 

        $this->CI->load->library('email', $config);
        $this->CI->email->initialize($config);
        
        $this->CI->email->from($from);
        $this->CI->email->to($receiver);
        $this->CI->email->subject($subject);
        $this->CI->email->message($body);
        $this->CI->email->send();
    }  

    public function enquery_reply($mail_data)
    {
        $body         = $this->CI->load->view('', $mail_data, TRUE);
        $receiver     = $mail_data['email'];
        $from         = '';
        $subject      = $mail_data['subject'];

        $this->_send_mail($receiver, $from, $subject, $body);
    } 
}

