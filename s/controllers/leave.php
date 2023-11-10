<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  Project Name : Timesheet
  Developed In: Clavis Technologies Pvt Ltd.
  Modification History
  Create Date           Version         Author			Description                                Last modified
  __________	___________	_______________   ________________________________________  ________________________________________
  25-02-2015            1.0             Ajay                 Controller for Leave list                       25-02-2015
 */

class Leave extends CI_Controller {

    function __construct() {
        // Construct our parent class
        parent::__construct();
        $this->load->model('leave_model');
    }

    function add_leave_type() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $leave_type = $this->input->post('leave_type');
        $legend = $this->input->post('legend');
        $weekend_check = $this->input->post('weekend_check');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'leave_type' => trim($leave_type),
            'legend' => trim($legend),
            'weekend_check' => $weekend_check,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
        );
        if($this->leave_model->insertLeaveType($data)) {
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Added Leave type',
                'message' => trim($leave_type). ' has been added.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Leave type added successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "A Leave type or Legend with the specified name already exists." }';
        }
    }

    function edit_leave_type() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $leave_type_id = $this->input->post('leave_type_id');
        if ($single_leave_type_detail = $this->leave_model->listLeaveType($leave_type_id)) {
            echo json_encode($single_leave_type_detail);
        } else {
            echo '{ "status" : "FAILED" , "message" : "No record found." }';
        }
    }

    function submit_edit_leave_type() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $leave_type_id = $this->input->post('edit_leave_type_id');
        $leave_type = $this->input->post('edit_leave_type');
        $legend = $this->input->post('edit_legend');
        $weekend_check = $this->input->post('edit_weekend_check');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'leave_type_id' => $leave_type_id,
            'leave_type' => trim($leave_type),
            'legend' => trim($legend),
            'weekend_check' => $weekend_check,
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
        );
        if ($this->leave_model->updateLeaveType($data)) {
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Updated Leave type',
                'message' => trim($leave_type). ' has been updated.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Leave type updated successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "A Leave type with the specified name already exists. Please enter another value for the Leave type." }';
        }
    }

    function delete_leave_type() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $leave_type_id = $this->input->post('leave_type_id');
        if ($this->leave_model->deleteLeaveType($leave_type_id)) {
             $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Deleted Leave type',
                'message' => 'Leave type deleted.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Leave type deleted successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "You can not delete a Leave type." }';
        }
    }

    function leave_type_list() {
        
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
       
        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['leave_type_detail'] = $this->leave_model->listLeaveType();
        $data['user_detail'] = $this->userdetails_model->listUser();
        $data['page_url'] = 'leave_list_content';
        $this->load->view('dashboard_page', $data);
    }
    
    function grant_leave() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $leave_type_id = $this->input->post('leaveTypeCategory');
        $year = $this->input->post('LeaveYear');
        $no_of_leaves = $this->input->post('noOfLeaves');
        $emp_id = $this->input->post('EmployeeList');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'leave_type_id' => $leave_type_id,
            'year' => $year,
            'no_of_leaves' => $no_of_leaves,
            'emp_id' => $emp_id,
            'created_by' => $all_userdata['userPrimeryId']
        );
        if($this->leave_model->insertGrantLeave($data)) {
            echo '{ "status" : "SUCCESS" , "message" : "Leave granted successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Leave can not be grant ." }';
        }
    }
    
    function forward_leave() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $leave_type_id = $this->input->post('leaveTypeCategory');
        $year = $this->input->post('LeaveYear');
        $no_of_leaves = $this->input->post('noOfLeaves');
        $select_all = $this->input->post('selectAll');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'leave_type_id' => $leave_type_id,
            'year' => $year,
            'no_of_leaves' => $no_of_leaves,
            'select_all' => $select_all,
            'created_by' => $all_userdata['userPrimeryId']
        );
        if($this->leave_model->insertForwardLeave($data)) {
            echo '{ "status" : "SUCCESS" , "message" : "Leave forward successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Leave can not be forward. " }';
        }
    }

}
