<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  Project Name : Timesheet
  Developed In: Clavis Technologies Pvt Ltd.
  Modification History
  Create Date           Version         Author			Description                                Last modified
  __________	___________	_______________   ________________________________________  ________________________________________
  03-03-2015            1.0             Dablu                 Controller for Department                        03-03-2015
 */

class Department extends CI_Controller {

    function __construct() {
        // Construct our parent class
        parent::__construct();
        $this->load->model('department_model');
    }
    
    function add_department() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        
        $department_name = $this->input->post('department_name');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'department_name' => trim($department_name) ,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
         );
        if($this->department_model->insertDepartment($data)){
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Added Department',
                'message' => trim($department_name). ' has been added.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Department added successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "A Department with the specified name already exists." }';
        }
        
    }
    
    function edit_department(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $department_id = $this->input->post('department_id');
        if($single_department_detail = $this->department_model->listDepartment($department_id)){
            echo json_encode($single_department_detail);
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "No record found." }';
        }
    }
    
    function submit_edit_department(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $department_id = $this->input->post('department_id');
        $department_name = $this->input->post('department_name');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'department_id' => $department_id ,
            'department_name' => trim($department_name) ,
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
         );
        if($this->department_model->updateDepartment($data)){
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Updated Department',
                'message' => trim($department_name). ' has been updated.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Department updated successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "A Department with the specified name already exists." }';
        }
    }
    
    function delete_department(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $department_id = $this->input->post('department_id');
        if($this->department_model->deleteDepartment($department_id)){
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Deleted Department',
                'message' => 'Department deleted.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Department deleted successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "You can not delete a department." }';
        }
    }

    function department_list() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        
        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);

        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['department_detail'] = $this->department_model->listDepartment();
        
        $data['page_url'] = 'department_content';
        $this->load->view('dashboard_page', $data);
    }

}
