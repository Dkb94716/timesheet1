<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        // Construct our parent class
        parent::__construct();
        $this->load->helper('common');
    }

    public function index() {
        $this->load->view('login_page_content');
    }

    public function verify_login() {
        $this->load->model('login_model');
        $emailId = $this->input->post('emailId');
        $password = $this->input->post('password');
        $loginCondition = $this->login_model->getLogin($emailId, $password);
        $sess_array = array();
        if ($loginCondition) {
            $sess_array = array(
                'userPrimeryId' => $loginCondition[0]->id,
                'userUId' => $loginCondition[0]->empId,
                'userUname' => $loginCondition[0]->empName,
                'userDesignation' => $loginCondition[0]->designation,
                'userTmId' => @$loginCondition[0]->currentTeamId,
                'managerId' => @$loginCondition[0]->managerId,
                'usrRoleld' => @$loginCondition[0]->usrRoleld
                
                    //'userPrivileges' => json_decode($loginCondition->userPrivileges),
            );
            $this->session->set_userdata('logged_in', $sess_array);
            $status_array = array(
                'status' => '',
                'smgDisplay' => ''
            );

            $this->session->set_userdata('status_msg', $status_array);
            $data['userPrimeryId'] = $loginCondition[0]->id;
            $getUserPrivileges = $this->common_model->getUserPrivileges($data);
            $userPrivileges = json_decode($getUserPrivileges->user_privileges);
            $rtnValue = $userPrivileges->timesheet->managetimesheet->View;
            if($rtnValue == 1)
                echo 1;
            else
                echo 2;
        } else {
            $status_array = array(
                'status' => 'danger',
                'smgDisplay' => 'Either username or password is invalid.',
            );

            $this->session->set_userdata('status_msg', $status_array);
            echo 0;
        }
    }

    public function reset_password() {
        $this->load->view('reset_password');
    }

    public function reset_submit() {
        $this->load->model('login_model');
        $email = $this->input->post('emailId');
        $common = new Common();
        $password = $common->generate_password();
        if (empty($email)) {

            echo '{ "status" : "danger" , "smgDisplay" : "Please enter valid e-mail address." }';
            return;
        }
        $data = array();
        $data['saltPassword'] = $password;
        $data['email'] = $email;
        if ($this->login_model->checkEmailAddressExist($data)) {
			$this->load->model('dms_model');
            $okm = array('USR_PASSWORD'=>md5($password));
           
            $this->dms_model->resetDMSUserPassword($okm,$email);
            $email_message = RESET_PASSWORD_EMAIL_MESSAGE;
            $search_data = array('[email]', '[password]');
            $replace_data = array($email, $password);
            $MailTemplateContents = str_replace($search_data, $replace_data, $email_message);
            $MailSubject = RESET_PASSWORD_EMAIL_SUBJECT;
            $Sendto = $email;

            $Status = $common->sendmail($Sendto, $MailSubject, $MailTemplateContents);

            if ($Status) {

                echo '{ "status" : "success" , "smgDisplay" : "Password updated successfully. The new password has been sent to your email Id. " }';
                return;
            } else {

                echo '{ "status" : "fail" , "smgDisplay" : "Password updated but there was some error sending your login details via e-mail." }';
                return;
            }
        } else {

            echo '{ "status" : "fail" , "smgDisplay" : "No such user exists." }';
            return;
        }
    }

    public function logout() {

        $this->session->sess_destroy();
        redirect("/login/index", 'refresh');
    }

    public function change_password() {
        $this->load->model('login_model');
        $data = array();
        $all_userdata = $this->session->userdata('logged_in');
        $userPrimeryId = $all_userdata['userPrimeryId'];
        $oldPassword = $this->input->post('oldpassword');
        $newPassword = $this->input->post('newpassword');

        // ********** Stored value into array variable ************************//
        $data['userPrimeryId'] = $userPrimeryId;
        $data['oldPassword'] = $oldPassword;
        $data['newPassword'] = $newPassword;
        if ($oldPassword == null) {
            return;
        }
        if ($oldPassword == "") {
            return;
        }
        if (!$this->login_model->getEmployeeRecord($data)) {
            echo '{ "status" : "FAILED" , "message" : "User does not exist" }';
            return;
        }
        $checkEmployeeByOldPassword = $this->login_model->checkEmployeeByOldPassword($data);
        if ($checkEmployeeByOldPassword) {
			
            $email = $checkEmployeeByOldPassword[0]->emailId;
            $empname = $checkEmployeeByOldPassword[0]->empName;
            $updatePassword = $this->login_model->updatePassword($data);
            if ($updatePassword) {
				$this->load->model('dms_model');
            $okm = array('USR_PASSWORD'=>md5($newPassword));
           
            $this->dms_model->updateDMSUserPassword($okm,$all_userdata['userUId']);
                $search_data = array('[empname]');
                $replace_data = array(ucfirst($empname));
                $MailSubject = str_replace($search_data, $replace_data, CHANGE_PASSWORD_EMAIL_SUBJECT);
                $email_message = CHANGE_PASSWORD_EMAIL_MESSAGE;

                $MailTemplateContents = str_replace($search_data, $replace_data, $email_message);
                //$Sendto = $email;
                //$common = new Common();
                //$Status = $common->sendmail($Sendto, $MailSubject, $MailTemplateContents);
				$Status=true;
                if ($Status) {
                    echo '{ "status" : "SUCCESS" , "message" : "Password changed successfully. " }';
                } else {
                    echo '{ "status" : "SUCCESS" , "message" : "Password changed successfully but there was some error sending you a confirmation mail." }';
                }
                return;
            } else {
                echo '{ "status" : "FAILED" , "message" : "There was some error . Please retry after sometime. " }';
                return;
            }
        } else {
            echo '{ "status" : "FAILED" , "message" : "Old Password incorrect" }';
            return;
        }
    }
	

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */