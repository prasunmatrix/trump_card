<?php 

if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

class Globalfunction
{ 
    public function __construct()
    {
        $this->CI =& get_instance();
    } 

    public function convert_custom_date($date)
    {
    	$data = date('Y-m-d', strtotime($date));
    	return $data;
    }

    public function convert_custom_date_time($date_time)
    {
    	$data = date('Y-m-d H:i:s', strtotime($date_time));
    	return $data;
    }

    public function convert_custom_time($time)
    {
    	$data = date('H:i:s', strtotime($time));
    	return $data;
    }    

    public function create_custom_date_time()
    {
        $data = date('Y-m-d H:i:s');
        return $data;
    }

    public function create_custom_date()
    {
        $data = date('Y-m-d');
        return $data;
    }

    public function create_custom_time()
    {
        $data = date('H:i:s');
        return $data;
    }

    public function unique_id($table_name)
    {
        $text = mt_rand();

        $query = $this->CI->db->select('MAX(id) AS id')->get($table_name)->row();

        $last_max_id = $query->id;
        $max_id      = ($last_max_id+1);
        $uni_id      = str_pad($max_id, 6, '0', STR_PAD_LEFT);

        $text = $text.'-'.$uni_id;

        if (empty($text)) 
        {
            return 'n-a';
        }
        else
        {
            return $text;
        }       
    }

    public function upload_file($types, $max_width, $max_height, $field_name, $return_path)
    {
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = $types;
        $config['max_size']      = 2048;
        $config['max_width']     = $max_width;
        $config['max_height']    = $max_height;

        $this->CI->load->library('upload', $config);
        $this->CI->upload->initialize($config);

        if($this->CI->upload->do_upload($field_name))
        {
            $data     = $this->CI->upload->data();
            $filename = $data['file_name'];

            return $filename;
        }
        else
        {
            if($this->CI->upload->display_errors())
            {
                $this->CI->session->set_flashdata("error", "You are not allowed to upload file more than 2 MB of size or file type doesn't match"); 
                redirect($return_path);
            }
        }
    }
}