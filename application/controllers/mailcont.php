<?php 

class Mailcont extends CI_Controller{

public function mail(){
 
    $config =array(

        'protocol'=>'smtp',
        'smtp_host'=>'tls://smtp.googlemal.com',
        'smtp_port'=>465,
        'smtp_user'=>'asclavistech@gmail.com',
        'smtp_password'=>'rzeueyqxdkehlzlo',
        'mail_type'    =>'html',
         'charset'     =>'utf-8',
         'wordwrap'    =>TRUE

    );

    $this->load->library('email',$config);
    $this->email->from('asclavistech@gmail.com');
    $this->email->to('jbbanilsharma@gmail.com');
    $this->email->subject('Send Mail');
    $this->email->message('Tihs is your first mail');
    $this->email->set_newline("\r\n");


    if($this->email->send())
    {
        echo "mail has been sent";
    }
    else{
        echo "error in your mail";
        echo "<br>";
        print_r($this->email->print_debugger());
    }


}



}


?>