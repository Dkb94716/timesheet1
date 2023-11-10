<?php

class Common{
    
function sendmail($to=NULL,$subject=NULL,$message=NULL) {
    $ci = & get_instance();
    $config = array(
        'protocol' => 'smtp',
        'smtp_host' => SMTP_HOST,
        'smtp_port' => SMTP_PORT,
        'smtp_user' => SMTP_USER,
        'smtp_pass' => SMTP_PASSWORD,
        'mailtype' => 'html',
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
    );
    
      
    
    $ci->load->library('email', $config);
    $ci->email->set_newline("\r\n");
    $ci->email->from(EMAIL_FROM, EMAIL_FROM_NAME); // change it to yours
    $ci->email->to($to); // change it to yours
    $ci->email->subject($subject);
    $ci->email->message($message);
    if ($ci->email->send()) {
        return true;
    } else {
        return false;
    }
}

function generate_password( $length = 8 ) {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$";
            $password = substr( str_shuffle( $chars ), 0, $length );
            return $password;
    }  
    
   
    
}

