<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Common_Controller extends CI_Controller { 

    function __construct(){
        parent::__construct();
        $this->output->enable_profiler(FALSE);
        //echo 'Test';
    }
   
  function SendEmailToUser($to,$MailSubject,$MailContent){
            $html_mail=true;
            $save_log=true;
            $mail_event='';
            $this->load->helper("mail");
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->Host       = SMTPHOST;
            $mail->SMTPDebug  = 2;
            $mail->SMTPAuth   = true;
            $mail->Username   = SMTP_USER_NAME;
            $mail->Password   = SMTP_PASSWORD;
            $mail->From = DEFAULT_FROM_ADDRESS;
            $mail->FromName = DEFAULT_FROM_NAME;
            
            $recipient = explode(',',$to); 
                foreach($recipient as $to){
                $mail->AddAddress($to);
             }
    
            //$mail->AddAddress($to);            
            $mail->Body = $MailContent;
            $mail->IsHTML($html_mail);
            $mail->Subject = $MailSubject;
            $status = $mail->Send();
            unset ($mail);
            if($status==true){
                $flag = 'success';
            }else{
                $flag = 'fail';
            }
            return $flag;
            
    }
   function generate_password( $length = 8 ) {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$";
            $password = substr( str_shuffle( $chars ), 0, $length );
            return $password;
    }
    
    
 }
    ?>
