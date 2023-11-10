<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  Project Name : Timesheet
  Developed In: Clavis Technologies Pvt Ltd.
  Modification History
  Create Date           Version         Author			Description                                Last modified
  __________	___________	_______________   ________________________________________  ________________________________________
  25-02-2015            1.0             Ajay                 Controller for Employee Leave                       25-02-2015
 */

class Employee_leave extends CI_Controller {

    function __construct() {
        // Construct our parent class
        
        parent::__construct();
        $this->load->model('employee_leave_model');
        $this->load->model('leave_model');
        $this->load->helper(array('form', 'url', 'common'));
        $this->load->library('form_validation');
        die();
    }

    function apply_leave() {

        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $this->form_validation->set_rules('leave_type_id', 'Leave Type', 'trim|required|xss_clean|callback_leave_type_check');
        $this->form_validation->set_rules('from_date', 'Start', 'trim|required|xss_clean');
        $this->form_validation->set_rules('to_date', 'End', 'trim|required|xss_clean|callback_start_end_check');
        $this->form_validation->set_rules('from_session', 'From Session', 'trim|xss_clean');
        $this->form_validation->set_rules('to_session', 'To Session', 'trim|xss_clean');
        $this->form_validation->set_rules('number_of_days', 'No. of Days', 'trim|xss_clean');
        $this->form_validation->set_rules('balance_leave', 'Balance Leave', 'trim|xss_clean');
        $this->form_validation->set_rules('manager_id', 'Apply to', 'trim|xss_clean');
        $this->form_validation->set_rules('cc_to', 'CC to', 'trim|xss_clean');
        $this->form_validation->set_rules('reason', 'Reason', 'trim|xss_clean');
        $this->form_validation->set_rules('contact_details', 'Contact details', 'trim|xss_clean');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);

        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $year = date('Y');
        $data['leave_type_detail'] = $this->leave_model->listLeaveType(NULL, $data['userPrimeryId'], $year);

        $data['manager_detail'] = $this->userdetails_model->listUser(NULL, $all_userdata['managerId']);
        $data['user_detail'] = $this->userdetails_model->listUser();
        if ($this->form_validation->run() == FALSE) {
            $data['page_url'] = 'apply_leave_content';
            $this->load->view('dashboard_page', $data);
        } else {
            $this->submit_apply_leave();
        }
    }

    function submit_apply_leave() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $leave_type_id_str = $this->input->post('leave_type_id');
        $leave_type_id_arr = explode('|', $leave_type_id_str);
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $number_of_days = $this->input->post('number_of_days');
        $manager_id_str = $this->input->post('manager_id');
        $manager_id_arr = explode('|', $manager_id_str);
        $reason = $this->input->post('reason');
        $from_session = $this->input->post('from_session');
        $to_session = $this->input->post('to_session');
        $cc_to = $this->input->post('cc_to');
        $contact_details = $this->input->post('contact_details');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'leave_type_id' => $leave_type_id_arr[0],
            'emp_id' => $all_userdata['userPrimeryId'],
            'from_date' => date('Y-m-d', strtotime($from_date)),
            'to_date' => date('Y-m-d', strtotime($to_date)),
            'number_of_days' => $number_of_days,
            'manager_id' => $manager_id_arr[0],
            'reason' => $reason,
            'from_session' => $from_session,
            'to_session' => $to_session,
            'cc_to' => $cc_to,
            'contact_details' => $contact_details,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
        );
        $empId = $all_userdata['userUId'];
        $empname = $all_userdata['userUname'];
        $base_url = base_url();
        $leave_type = $leave_type_id_arr[1];
        if ($this->employee_leave_model->insertEmployeeLeave($data)) {
            $this->session->set_userdata('success_msg', 'Leave applied successfully.');

            $search_data = array('[empname]', '[empId]', '[base_url]', '[leave_type]', '[from_date]', '[to_date]', '[number_of_days]', '[reason]', '[contact_details]');
            $replace_data = array(ucfirst($empname), $empId, $base_url, $leave_type, $from_date, $to_date, $number_of_days, $reason, $contact_details);
            $MailSubject = str_replace($search_data, $replace_data, APPLY_LEAVE_EMAIL_SUBJECT);
            $email_message = APPLY_LEAVE_EMAIL_MESSAGE;

            $MailTemplateContents = str_replace($search_data, $replace_data, $email_message);
            $Sendto = $manager_id_arr[1];
            $common = new Common();
            $Status = $common->emailsend($Sendto, $MailSubject, $MailTemplateContents);
        


            if (!empty($cc_to)) {
                
                $cc_to = $cc_to.','.ADDITIONAL_MAIL_FOR_LEAVE;

                $common->emailsend($cc_to, $MailSubject, $MailTemplateContents);
            }
			else{
				$cc_to = ADDITIONAL_MAIL_FOR_LEAVE;

                $common->emailsend($cc_to, $MailSubject, $MailTemplateContents);
			}
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'],
                'title' => 'Leave apply',
                'message' => $empname . ' leave apply.',
                'created' => date('Y-m-d h:i:s')
            );
            $this->common_model->addToHistory($history);
            redirect(site_url("employee_leave/apply_leave"), 'refresh');
        } else {
            $this->session->set_userdata('error_msg', 'Leave date range is overlapping with leave that is already availed or applied.');
            redirect(site_url("employee_leave/apply_leave"), 'refresh');
        }
    }

    function edit_apply_leave($employee_leave_id) {

        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $this->form_validation->set_rules('leave_type_id', 'Leave Type', 'trim|required|xss_clean');
        $this->form_validation->set_rules('from_date', 'Start', 'trim|required|xss_clean');
        $this->form_validation->set_rules('to_date', 'End', 'trim|required|xss_clean|callback_start_end_check');
        $this->form_validation->set_rules('from_session', 'From Session', 'trim|xss_clean');
        $this->form_validation->set_rules('to_session', 'To Session', 'trim|xss_clean');
        $this->form_validation->set_rules('number_of_days', 'No. of Days', 'trim|xss_clean');
        $this->form_validation->set_rules('balance_leave', 'Balance Leave', 'trim|xss_clean');
        $this->form_validation->set_rules('manager_id', 'Apply to', 'trim|xss_clean');
        $this->form_validation->set_rules('cc_to', 'CC to', 'trim|xss_clean');
        $this->form_validation->set_rules('reason', 'Reason', 'trim|xss_clean');
        $this->form_validation->set_rules('contact_details', 'Contact details', 'trim|xss_clean');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);

        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $year = date('Y');
        $data['year'] = $year;
        $data['leave_type_detail'] = $this->leave_model->listLeaveType(NULL, $data['userPrimeryId'], $year);

        $data['manager_detail'] = $this->userdetails_model->listUser(NULL, $all_userdata['managerId']);
        $data['user_detail'] = $this->userdetails_model->listUser();
        $data['employee_leave_detail'] = $this->employee_leave_model->getEmployeeLeave(NULL, NULL, NULL, $employee_leave_id);
        $data['employee_leave_id'] = $employee_leave_id;
        if ($this->form_validation->run() == FALSE) {
            $data['page_url'] = 'edit_apply_leave_content';
            $this->load->view('dashboard_page', $data);
        } else {
            $this->submit_edit_apply_leave();
        }
    }

    function submit_edit_apply_leave() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $employee_leave_id = $this->input->post('employee_leave_id');
        $leave_type_id_str = $this->input->post('leave_type_id');
        $leave_type_id_arr = explode('|', $leave_type_id_str);
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $number_of_days = $this->input->post('number_of_days');
        $manager_id_str = $this->input->post('manager_id');
        $manager_id_arr = explode('|', $manager_id_str);
        $reason = $this->input->post('reason');
        $from_session = $this->input->post('from_session');
        $to_session = $this->input->post('to_session');
        $cc_to = $this->input->post('cc_to');
        $leave_status = $this->input->post('status');
        
        $contact_details = $this->input->post('contact_details');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'employee_leave_id' => $employee_leave_id,
            'leave_type_id' => $leave_type_id_arr[0],
            'emp_id' => $all_userdata['userPrimeryId'],
            'from_date' => date('Y-m-d', strtotime($from_date)),
            'to_date' => date('Y-m-d', strtotime($to_date)),
            'number_of_days' => $number_of_days,
            'manager_id' => $manager_id_arr[0],
            'reason' => $reason,
            'from_session' => $from_session,
            'to_session' => $to_session,
            'cc_to' => $cc_to,
            'contact_details' => $contact_details,
            'status' => $leave_status,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s'),
            'updated' => date('Y-m-d h:i:s')
            
        );
        $empId = $all_userdata['userUId'];
        $empname = $all_userdata['userUname'];
        $base_url = base_url();
        $leave_type = $leave_type_id_arr[1];
        $year = date('Y');
        if ($this->employee_leave_model->updateEmployeeLeave($data)) {
            $this->session->set_userdata('success_msg', 'Leave updated successfully.');

            $search_data = array('[empname]', '[empId]', '[base_url]', '[leave_type]', '[from_date]', '[to_date]', '[number_of_days]', '[reason]', '[contact_details]');
            $replace_data = array(ucfirst($empname), $empId, $base_url, $leave_type, $from_date, $to_date, $number_of_days, $reason, $contact_details);
            $MailSubject = str_replace($search_data, $replace_data, APPLY_LEAVE_EMAIL_SUBJECT);
            $email_message = APPLY_LEAVE_EMAIL_MESSAGE;

            $MailTemplateContents = str_replace($search_data, $replace_data, $email_message);
            $Sendto = $manager_id_arr[1];
            $common = new Common();
            $Status = $common->emailsend($Sendto, $MailSubject, $MailTemplateContents);
            if (!empty($cc_to)) {

                $common->emailsend($cc_to, $MailSubject, $MailTemplateContents);
            }
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'],
                'title' => 'Leave apply edited',
                'message' => $empname . ' leave apply edited.',
                'created' => date('Y-m-d h:i:s')
            );
            $this->common_model->addToHistory($history);
           // redirect(site_url("employee_leave/manage_employee_leave/" . $all_userdata['userPrimeryId'] . "/" . $year . "?m=1"), 'refresh');
        } else {
            $this->session->set_userdata('error_msg', 'Leave date range is overlapping with leave that is already availed or applied.');
            //redirect(site_url("employee_leave/edit_apply_leave/" . $employee_leave_id), 'refresh');
        }
    }

    function start_end_check($str) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $employee_leave_id = $this->input->post('employee_leave_id');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'emp_id' => $all_userdata['userPrimeryId'],
            'from_date' => date('Y-m-d', strtotime($from_date)),
            'to_date' => date('Y-m-d', strtotime($to_date)),
            'employee_leave_id' => $employee_leave_id
        );
        if ($this->employee_leave_model->checkEmployeeLeave($data)) {
            return true;
        } else {

            $this->form_validation->set_message('start_end_check', 'Leave date range is overlapping with leave that is already availed or applied.');
            return false;
        }
    }

    function leave_type_check() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $leave_type_id_str = $this->input->post('leave_type_id');
        $leave_type_id_arr = explode('|', $leave_type_id_str);
        $from_date = $this->input->post('to_date');
        $to_date = $this->input->post('to_date');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'emp_id' => $all_userdata['userPrimeryId'],
            'leave_type_id' => $leave_type_id_arr[0],
            'year' => date('Y', strtotime($to_date))
        );
        if ($this->employee_leave_model->checkleaveTypeYear($data)) {
            return true;
        } else {

            $this->form_validation->set_message('leave_type_check', 'The leave type is not granted for the selected year.');
            return false;
        }
    }

    function get_balance_leave() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $leave_type_id = $this->input->post('leave_type_id');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'emp_id' => $all_userdata['userPrimeryId'],
            'leave_type_id' => $leave_type_id,
            'year' => date('Y')
        );
        if ($result = $this->employee_leave_model->listEmployeeLeave($data)) {
            echo json_encode($result);
        }
    }

    function view_employee_leave($year = NULL) {

        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);

        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);

        $ei = '';
        if (!empty($_GET['ei'])) {
            $ei = $_GET['ei'];
            $ei_str = base64_decode($ei);
            $data['ei'] = explode('#', $ei_str);
            $data['emp_id_str'] = $ei;
        }
        if (!empty($year)) {
            $data['year'] = $year;
        } else {
            $data['year'] = date('Y');
        }
        if ($data['userPrivileges']->leave_management->allemployee->View == 1) {
            $data['managerId'] = '';
        } else {
            $data['managerId'] = $data['userPrimeryId'];
        }
        $data['employee_leave_detail'] = $this->employee_leave_model->listEmployeeLeave($data);
//        echo '<pre>';
//        print_r($data['employee_leave_detail']);die;

        $data['page_url'] = 'view_employee_leave_content';
        $this->load->view('dashboard_page', $data);
    }

    function manage_employee_leave($emp_id = NULL, $year = NULL) {

        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        
        $data['m'] = '';
        if (!empty($_GET['m'])) {
            $data['m'] = 1;
        }
        $ei = NULL;
        if (!empty($_GET['ei'])) {
            $ei = $_GET['ei'];
            $ei_str = base64_decode($ei);
            $data['ei'] = explode('#', $ei_str);
        }
        if (!empty($year)) {
            $data['year'] = $year;
        } else {
            $data['year'] = date('Y');
        }
        $data['manager'] = $getUserPrivileges->role_name;
        $data['emp_id'] = $emp_id;
        $data['employee_leave_detail'] = $this->employee_leave_model->listManageEmployeeLeave($data);
        $data['balance_leave_detail'] = $this->employee_leave_model->getBalanceLeave($emp_id, $year);
        $data['user_detail'] = $this->userdetails_model->listUser($emp_id);
        $data['page_url'] = 'manage_employee_leave_content';
        $this->load->view('dashboard_page', $data);
    }

    function change_employee_leave_status() {

        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $employee_leave_id = $this->input->post('employee_leave_id');
        $status = $this->input->post('status');
        $reason = '';
        if ($this->input->post('reason')) {
            $reason = $this->input->post('reason');
        }
        $leave_id = '';
        if ($this->input->post('leave_id')) {
            $leave_id = $this->input->post('leave_id');
        }
        $number_of_days = '';
        if ($this->input->post('number_of_days')) {
            $number_of_days = $this->input->post('number_of_days');
        }
        if ($this->input->post('emp_id')) {
           $leave_type_id =$this->input->post('leave_type_id');
            $emp_id=$this->input->post('emp_id');
        }
        
        $emailId = $this->input->post('emailId');
        $empname = $this->input->post('empName');
        $empId = $this->input->post('empId');
        $leave_type = $this->input->post('leave_type');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $base_url = base_url();
        $data = array(
            'employee_leave_id' => $employee_leave_id,
            'status' => $status,
            'manage_comment' => $reason,
            'leave_id' => $leave_id,
            'number_of_days' => $number_of_days,
            'emailId' => $emailId,
            'updated' =>date('Y-m-d h:i:s')
        );
        if ($result = $this->employee_leave_model->updateEmployeeLeaveStatus($data)) {
            $search_data = array('[empname]', '[empId]', '[base_url]', '[leave_type]', '[from_date]', '[to_date]', '[number_of_days]', '[reason]');
            $replace_data = array(ucfirst($empname), $empId, $base_url, $leave_type, $from_date, $to_date, $number_of_days, $reason);
            if ($status == 'Approved') {
                $data = array(
                    'emp_id' => $emp_id,
                    'leave_type_id' => $leave_type_id,
                    'year' => date('Y')
                );
                $balance_leave = $this->employee_leave_model->listEmployeeLeave($data);
                //print_r($balance_leave);die;
                if ($balance_leave[0]->balance_leave <= 0) {
                    $b_leave = $balance_leave[0]->balance_leave;
                    $search_data1 = array('[empname]', '[empId]', '[leave_type]','[balance_leave]');
                    $replace_data1 = array(ucfirst($empname), $empId, $leave_type,$b_leave);
                    $MailSubject1 = str_replace($search_data1, $replace_data1, LEAVE_NOTIFICATION_EMAIL_SUBJECT);
                    $email_message1 = LEAVE_NOTIFICATION_EMAIL_MESSAGE;

                    $MailTemplateContents1 = str_replace($search_data1, $replace_data1, $email_message1);
                    $Sendto1 = LEAVE_NOTIFICATION_ADMIN_EMAIL;
                    $common = new Common();
                    $Status = $common->emailsend($Sendto1, $MailSubject1, $MailTemplateContents1);
                }
                $MailSubject = str_replace($search_data, $replace_data, APPROVED_LEAVE_EMAIL_SUBJECT);
                $email_message = APPROVED_LEAVE_EMAIL_MESSAGE;

                $MailTemplateContents = str_replace($search_data, $replace_data, $email_message);
                $Sendto = $emailId;
            } else {
                $MailSubject = str_replace($search_data, $replace_data, REJECTION_LEAVE_EMAIL_SUBJECT);
                $email_message = REJECTION_LEAVE_EMAIL_MESSAGE;

                $MailTemplateContents = str_replace($search_data, $replace_data, $email_message);
                $Sendto = $emailId;
            }
            $common = new Common();
           
            if(ADDITIONAL_MAIL_FOR_LEAVE){
             $Sendto = $Sendto.','.ADDITIONAL_MAIL_FOR_LEAVE;   
            }
            $Status = $common->emailsend($Sendto, $MailSubject, $MailTemplateContents);
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'],
                'title' => 'Leave status',
                'message' => $result,
                'created' => date('Y-m-d h:i:s')
            );
            $this->common_model->addToHistory($history);
            echo '{"status" : "SUCCESS" , "message" : "' . $result . '" }';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Leave can not be' . $status . ' ." }';
        }
    }

    function delete_employee_leave() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $employee_leave_id = $this->input->post('employee_leave_id');
        if ($result = $this->employee_leave_model->deleteEmployeeLeave($employee_leave_id)) {
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'],
                'title' => 'Deleted leave',
                'message' => $result,
                'created' => date('Y-m-d h:i:s')
            );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "' . $result . ' "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "You can not withdraw." }';
        }
    }

    function download_leave_pdf($emp_id, $year) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $data = array();
        $data['year'] = $year;
        $data['emp_id'] = $emp_id;
        $data['user_detail'] = $this->userdetails_model->listUser($emp_id);
        $data['employee_leave_detail'] = $this->employee_leave_model->getBalanceLeave($emp_id, $year);
        $data['leave_detail'] = $this->employee_leave_model->getEmployeeLeave($emp_id, '', NULL, NULL, $year);
        $data['balance_leave_detail'] = $this->employee_leave_model->getBalanceLeave($emp_id, $year);
        $this->load->library('pdf');
        $this->pdf->load_view('leave_pdf_content', $data);
        $customPaper = array(0,0,670,700);
        $this->pdf->set_paper($customPaper);
        $this->pdf->render();
        $this->pdf->stream("Leave report.pdf");
    }
    
    function download_consolidated_leave_pdf($emp_data_str) {
         //$emp_data_arr = explode("@",$emp_data_str);
        $emp_data_arr = array();
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);

        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);

        $ei = '';
        if (!empty($_GET['ei'])) {
            $ei = $_GET['ei'];
            $ei_str = base64_decode($ei);
            $data['ei'] = explode('#', $ei_str);
            $data['emp_id_str'] = $ei;
        }
        if (!empty($year)) {
            $data['year'] = $year;
        } else {
            $data['year'] = date('Y');
        }
        if ($data['userPrivileges']->leave_management->allemployee->View == 1) {
            $data['managerId'] = '';
        } else {
            $data['managerId'] = $data['userPrimeryId'];
        }
        $data['emp_data_arr'] = $emp_data_arr;
        $data['distinct_leave_type_from_emp'] = $this->employee_leave_model->distinctLeaveTypeFromEmp($data);
        $employee_leave_detail = $this->employee_leave_model->listEmployeeLeaveforAsset($data);
//        echo "<pre>"; print_r($employee_leave_detail); return;
        $data['employee_leave_detail'] = $employee_leave_detail;
        $this->load->library('pdf');
        $this->pdf->load_view('download_consolidated_leave_pdf', $data);
        $pdf_factorial = '15';
        $pdf_factorial_relation_series_arr = array('0','1','3','5','7','9','11','13','15','17','19','21','23','25','27','29','31','33','35','37','39','41','43','45');
        $leave_type_count = count($data['distinct_leave_type_from_emp']);
        $multyply_relational_fact = $pdf_factorial_relation_series_arr[$leave_type_count];
        $total_html_page_width = 300+$leave_type_count*150;
        $total_pdf_page_width = 300+$leave_type_count*150-$multyply_relational_fact*$pdf_factorial;
        $customPaper = array(0,0,$total_pdf_page_width,700);
        $this->pdf->set_paper($customPaper);
        $this->pdf->render();
        $this->pdf->stream("Consolidated leave report.pdf");
    }
    
    function download_consolidated_descriptive_leave_xls($year){
        $emp_id = "";
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $data = array();
        $user_detail = $this->userdetails_model->listUser($emp_id);
        $employee_leave_detail = $this->employee_leave_model->getBalanceLeave($emp_id, $year);
        $leave_detail = $this->employee_leave_model->getEmployeeLeave($emp_id, '', NULL, NULL, $year);
        $balance_leave_detail = $this->employee_leave_model->getBalanceLeave($emp_id, $year);
//        echo "<pre>"; print_r($leave_detail);return;
        
        //load our new PHPExcel library
        $this->load->library('excel');
        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Client Report');
        //set cell A1 content with some text
        // for style and fonts
        $styleArray = array(
            'font' => array(
                'bold' => true, 'color' => array('rgb' => '000000'),
                'size' => 11,
                'name' => 'Verdana'
            )
        );
//        $col = 0;
//        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1,$user_detail[0]->empName);
//        $this->excel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
//
//        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2,'');
//        $row = 3;
//        foreach ($balance_leave_detail as $_balance_leave_detail) {
//            $col = 0;
//            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row,$_balance_leave_detail->leave_type);
//            $col++;
//            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row,$_balance_leave_detail->balance_leave);
//            $row++;
//        }
//        
//        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2,'');
//        $row++;
        $row = 1;
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, $row,'Employee');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, $row,'Leave Type');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, $row,'Status');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, $row,'From Date');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, $row,'From Session');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(5, $row,'To Date');        
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(6, $row,'To Session');        
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(7, $row,'No. of days');
        // make bold first row.
        $letters = range('A','H');
        foreach($letters as $_letters) {
            $this->excel->getActiveSheet()->getStyle($_letters.$row)->applyFromArray($styleArray);
            $this->excel->getActiveSheet()->getColumnDimension($_letters)->setWidth(12);

        }
        
        $row++;
        
        foreach ($leave_detail as $leave) {
            $from_date = date('d F Y',  strtotime($leave->from_date));
            $to_date = date('d F Y',  strtotime($leave->to_date));
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, $row,$leave->empName);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, $row,$leave->leave_type);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, $row,$leave->status);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, $row,$from_date);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, $row,($leave->from_session==1)?'First Half':'Second Half');
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(5, $row,$to_date);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(6, $row,($leave->to_session==1)?'First Half':'Second Half');
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(7, $row,$leave->number_of_days);
            $row++;
        }
        
        
        // default color and size for each rows.
        $styleArray1 = array(
            'font' => array(
                'color' => array('rgb' => '000000'),
                'size' => 11,
                'name' => 'Verdana'
            )
        );

        $this->excel->getActiveSheet()->getDefaultStyle()->applyFromArray($styleArray1);
        $filename = 'Leave report.xls'; //save our workbook as this file name    
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
    }
    
    function download_leave_xls($emp_id, $year) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $data = array();
        $user_detail = $this->userdetails_model->listUser($emp_id);
        $employee_leave_detail = $this->employee_leave_model->getBalanceLeave($emp_id, $year);
        $leave_detail = $this->employee_leave_model->getEmployeeLeave($emp_id, '', NULL, NULL, $year);
        $balance_leave_detail = $this->employee_leave_model->getBalanceLeave($emp_id, $year);
//        echo "<pre>"; print_r($leave_detail);return;
        
        //load our new PHPExcel library
        $this->load->library('excel');
        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Client Report');
        //set cell A1 content with some text
        // for style and fonts
        $styleArray = array(
            'font' => array(
                'bold' => true, 'color' => array('rgb' => '000000'),
                'size' => 11,
                'name' => 'Verdana'
            )
        );
        $col = 0;
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1,$user_detail[0]->empName);
        $this->excel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);

        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2,'');
        $row = 3;
        foreach ($balance_leave_detail as $_balance_leave_detail) {
            $col = 0;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row,$_balance_leave_detail->leave_type);
            $col++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row,$_balance_leave_detail->balance_leave);
            $row++;
        }
        
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2,'');
        $row++;
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, $row,'Leave Type');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, $row,'Status');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, $row,'From Date');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, $row,'From Session');
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, $row,'To Date');        
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(5, $row,'To Session');        
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(6, $row,'No. of days');
        // make bold first row.
        $letters = range('A','G');
        foreach($letters as $_letters) {
            $this->excel->getActiveSheet()->getStyle($_letters.$row)->applyFromArray($styleArray);
            $this->excel->getActiveSheet()->getColumnDimension($_letters)->setWidth(12);

        }
        
        $row++;
        
        foreach ($leave_detail as $leave) {
            $from_date = date('d F Y',  strtotime($leave->from_date));
            $to_date = date('d F Y',  strtotime($leave->to_date));
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, $row,$leave->leave_type);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, $row,$leave->status);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, $row,$from_date);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, $row,($leave->from_session==1)?'First Half':'Second Half');
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, $row,$to_date);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(5, $row,($leave->to_session==1)?'First Half':'Second Half');
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(6, $row,$leave->number_of_days);
            $row++;
        }
        
        // default color and size for each rows.
        $styleArray1 = array(
            'font' => array(
                'color' => array('rgb' => '000000'),
                'size' => 11,
                'name' => 'Verdana'
            )
        );

        $this->excel->getActiveSheet()->getDefaultStyle()->applyFromArray($styleArray1);
        $filename = 'Leave report.xls'; //save our workbook as this file name    
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
        
    }
    
    function download_consolidated_leave_xls($emp_data_str) {

        //$emp_data_arr = explode("@",$emp_data_str);
        $emp_data_arr = array();
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);

        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);

        $ei = '';
        if (!empty($_GET['ei'])) {
            $ei = $_GET['ei'];
            $ei_str = base64_decode($ei);
            $data['ei'] = explode('#', $ei_str);
            $data['emp_id_str'] = $ei;
        }
        if (!empty($year)) {
            $data['year'] = $year;
        } else {
            $data['year'] = date('Y');
        }
        if ($data['userPrivileges']->leave_management->allemployee->View == 1) {
            $data['managerId'] = '';
        } else {
            $data['managerId'] = $data['userPrimeryId'];
        }
        $data['emp_data_arr'] = $emp_data_arr;
        $distinct_leave_type_from_emp = $this->employee_leave_model->distinctLeaveTypeFromEmp($data);
        $employee_leave_detail = $this->employee_leave_model->listEmployeeLeaveforAsset($data);
        
        // for style and fonts
        $styleArray = array(
            'font' => array(
                'bold' => true, 'color' => array('rgb' => '000000'),
                'size' => 11,
                'name' => 'Verdana'
            )
        );
        //load our new PHPExcel library
        $this->load->library('excel');
        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Client Report');
        
        $col = 0;
        $row = 1;
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row,'Name');
        $col++;
//        $this->excel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row,'');
        $col++;
        foreach ($distinct_leave_type_from_emp as $_distinct_leave_type_from_emp) {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row,$_distinct_leave_type_from_emp->leave_type);
            $col++;
        }
        $row++;
        
        $next_id = '';
        foreach ($employee_leave_detail as $_employee_leave_detail) {
            $current_id = $_employee_leave_detail['id'];
            if ($next_id != $current_id) {
                // feed first and second column.
                $first_second_column_row = $row;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, $first_second_column_row,$_employee_leave_detail['empName']);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, $first_second_column_row,'Opening balance');
                $first_second_column_row++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, $first_second_column_row,'');
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, $first_second_column_row,'Leaves taken');
                $first_second_column_row++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, $first_second_column_row,'');
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, $first_second_column_row,'Closing balance');
                $first_second_column_row++;
                
                // feed leave type value 
                $leave_type_col = 2;
                foreach ($distinct_leave_type_from_emp as $key => $_distinct_leave_type_from_emp) {
                    $leave_type_row = $row;
                    $opening_balance = '';
                    $leaves_taken = '';
                    $closing_balance = '';
                    $searched_arr = $this->employee_leave_model->multiSearch($employee_leave_detail, array('empId' => $_employee_leave_detail['empId'], 'id' => $_employee_leave_detail['id'], 'legend' => $_distinct_leave_type_from_emp->legend));
                    if (!empty($searched_arr)) {
                        $opening_balance = $searched_arr['no_of_leaves'];
                        $leaves_taken = $searched_arr['approve_leave'];
                        $closing_balance = $searched_arr['balance_leave'];
                    }
                    $this->excel->getActiveSheet()->setCellValueByColumnAndRow($leave_type_col, $leave_type_row,$opening_balance);
                    $leave_type_row++;
                    $this->excel->getActiveSheet()->setCellValueByColumnAndRow($leave_type_col, $leave_type_row,$leaves_taken);
                    $leave_type_row++;
                    $this->excel->getActiveSheet()->setCellValueByColumnAndRow($leave_type_col, $leave_type_row,$closing_balance);
                    $leave_type_row++;
                    $leave_type_col++;
                    
                    
                }
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, $first_second_column_row,'');
                $first_second_column_row++;
                $row = $first_second_column_row;
            } 
            $next_id = $current_id;
        }
        
        // make bold first row.
        $letters = range('A','Z');
        foreach($letters as $_letters) {
            $this->excel->getActiveSheet()->getStyle($_letters."1")->applyFromArray($styleArray);
            $this->excel->getActiveSheet()->getColumnDimension($_letters)->setWidth(15);

        }
        
        $styleArray1 = array(
            'font' => array(
                'color' => array('rgb' => '#000000'),
                'size' => 11,
                'name' => 'Verdana'
            )
        );

        $this->excel->getActiveSheet()->getDefaultStyle()->applyFromArray($styleArray1);
        
        $filename = 'Consolidated leave report.xls'; //save our workbook as this file name    
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');

    }
    
    function pending_leave() {
        $all_userdata = $this->session->userdata('logged_in');
        $emp_id = $all_userdata['userPrimeryId'];
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);

        $userPrivileges = json_decode($getUserPrivileges->user_privileges);
        if ($userPrivileges->leave_management->allemployee->View == 1) {
            $emp_id = NULL;
        }
        $pending_leave_detail = $this->employee_leave_model->getEmployeeLeave(NULL, 'Pending', $emp_id);
        $emp_id_arr = '';
        $emp_id_str = '';
        $i = 0;
        if (!empty($pending_leave_detail)) {
            foreach ($pending_leave_detail as $pending_leave) {
                $i++;
                if (count($pending_leave_detail) == $i) {
                    $emp_id_arr .= $pending_leave->emp_id;
                } else {
                    $emp_id_arr .= $pending_leave->emp_id . '#';
                }
            }

            $emp_id_str = base64_encode($emp_id_arr);
        }
        $data = array();
        $data['leave_count'] = $i;
        $data['emp_id_str'] = $emp_id_str;
        echo json_encode($data);
    }

}
