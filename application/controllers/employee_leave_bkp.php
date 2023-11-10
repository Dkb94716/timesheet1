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
            $Status = $common->sendmail($Sendto, $MailSubject, $MailTemplateContents);
            if (!empty($cc_to)) {

                $common->sendmail($cc_to, $MailSubject, $MailTemplateContents);
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
			'status' => $leave_status,
            'contact_details' => $contact_details,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
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
            $Status = $common->sendmail($Sendto, $MailSubject, $MailTemplateContents);
            if (!empty($cc_to)) {

                $common->sendmail($cc_to, $MailSubject, $MailTemplateContents);
            }
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'],
                'title' => 'Leave apply edited',
                'message' => $empname . ' leave apply edited.',
                'created' => date('Y-m-d h:i:s')
            );
            $this->common_model->addToHistory($history);
            redirect(site_url("employee_leave/manage_employee_leave/" . $all_userdata['userPrimeryId'] . "/" . $year . "?m=1"), 'refresh');
        } else {
            $this->session->set_userdata('error_msg', 'Leave date range is overlapping with leave that is already availed or applied.');
            redirect(site_url("employee_leave/edit_apply_leave/" . $employee_leave_id), 'refresh');
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
        //echo '<pre>';
        //print_r($data['employee_leave_detail']);die;

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
            'reason' => $reason,
            'leave_id' => $leave_id,
            'number_of_days' => $number_of_days,
            'emailId' => $emailId
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
                    $Status = $common->sendmail($Sendto1, $MailSubject1, $MailTemplateContents1);
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
            $Status = $common->sendmail($Sendto, $MailSubject, $MailTemplateContents);
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
        $data['leave_detail'] = $this->employee_leave_model->getEmployeeLeave($emp_id, 'Approved', NULL, NULL, $year);

        $this->load->library('pdf');
        $this->pdf->load_view('leave_pdf_content', $data);
        $this->pdf->render();
        $this->pdf->stream("leave.pdf");
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
