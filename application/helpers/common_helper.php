<?php

class Common{
    /*
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

*/

function sendmail($to=NULL,$subject=NULL,$message=NULL) {
    $ci = & get_instance();

	$config['protocol']    = 'smtp';
	$config['smtp_host']    = 'ssl://smtp.googlemail.com';
	$config['smtp_port']    = 465;
	$config['smtp_timeout'] = '7';
	$config['smtp_user']    = 'wasimclavistech@gmail.com';
	$config['smtp_pass']    = 'bpmsarwoakxngmey';
	$config['charset']    = 'iso-8859-1';
	$config['newline']    = "\r\n";
	$config['mailtype'] = 'html'; // or html
	$config['validation'] = TRUE; // bool whether to validate email or not      


	$ci->load->library('email',$config);

	   
	    $ci->email->from('Clavis Tech');
	    $ci->email->to($to);
	   //$ci->email->cc('asclavistech@gmail.com');

	    $ci->email->subject($subject);
	    $ci->email->message($message);
	    
	//print_r($ci->email->subject($subject));

	//print_r($ci->email->print_debugger());



	    if($ci->email->send())
	    {
		return true;
	    }
	    else{
		return false;
		print_r($ci->email->print_debugger());
	    }
}

function emailsend($to=NULL,$subject=NULL,$message=NULL){
    $ci = & get_instance();




$config['protocol']    = 'smtp';
$config['smtp_host']    = 'ssl://smtp.googlemail.com';
$config['smtp_port']    = 465;
$config['smtp_timeout'] = '7';
$config['smtp_user']    = 'wasimclavistech@gmail.com';
$config['smtp_pass']    = 'bpmsarwoakxngmey';
$config['charset']    = 'iso-8859-1';
$config['newline']    = "\r\n";
$config['mailtype'] = 'html'; // or html
$config['validation'] = TRUE; // bool whether to validate email or not      


$ci->load->library('email',$config);

   
    $ci->email->from('Clavis Tech');
    $ci->email->to($to);
    //$ci->email->cc('asclavistech@gmail.com');

    $ci->email->subject($subject);
    $ci->email->message($message);
    
//print_r($ci->email->subject($subject));

//print_r($ci->email->print_debugger());



    if($ci->email->send())
    {
        return true;
    }
    else{
        return false;
        print_r($ci->email->print_debugger());
    }


}



function generate_password( $length = 8 ) {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$";
            $password = substr( str_shuffle( $chars ), 0, $length );
            return $password;
    }  
    
   


function message()
{
    echo "hi how are you";
}

    //list of user cost details date according 
    function userRoleRateMur($userID, $date){ 
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->from('user_cost_details');        
        $ci->db->where('user_id',$userID);        
        $ci->db->where('added_date <=', $date);    
        $ci->db->order_by("cost_id", "desc");    
        $ci->db->limit(1);
        $query = $ci->db->get();
        $result = $query->row();
        if ($query->num_rows() == 0) {
            //echo $ci->db->last_query(); die();
            return 0;
        } else {
            //echo $ci->db->last_query(); die();
            return $result;
        }     
    }


    
}

