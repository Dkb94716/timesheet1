<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  Project Name : Timesheet
  Developed In: Clavis Technologies Pvt Ltd.
  Modification History
  Create Date           Version         Author			Description                                Last modified
  __________	___________	_______________   ________________________________________  ________________________________________
  16-02-2015            1.0             Ajay                 Controller for Activity                        16-02-2015
 */

class Activity extends CI_Controller {

    function __construct() {
        // Construct our parent class
        parent::__construct();
        $this->load->model('activity_model');
    }
    
    function add_activity() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        
        $activity_name = $this->input->post('activity_name');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'activity_name' => trim($activity_name) ,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
         );
        if($this->activity_model->insertActivity($data)){
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Added Activity',
                'message' => trim($activity_name). ' has been added.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Activity added successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "An Activity with the specified name already exists." }';
        }
        
    }
    
    function edit_activity(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $activity_id = $this->input->post('activity_id');
        if($single_activity_detail = $this->activity_model->listActivity($activity_id)){
            echo json_encode($single_activity_detail);
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "No record found." }';
        }
    }
    
    function submit_edit_activity(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $activity_id = $this->input->post('activity_id');
        $activity_name = $this->input->post('activity_name');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'activity_id' => $activity_id ,
            'activity_name' => trim($activity_name) ,
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
         );
        if($this->activity_model->updateActivity($data)){
             $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Updated Activity',
                'message' => trim($activity_name). ' has been updated.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Activity updated successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "An Activity with the specified name already exists." }';
        }
    }
    
    function delete_activity(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $activity_id = $this->input->post('activity_id');
        
        if($this->activity_model->deleteActivity($activity_id)){
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Deleted Activity',
                'message' => 'Activity deleted.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Activity deleted successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "You can not delete a activity." }';
        }
    }

    function activity_list() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        
        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);

        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['activity_detail'] = $this->activity_model->listActivity();
        
        $data['page_url'] = 'activity_content';
        $this->load->view('dashboard_page', $data);
    }

}
