<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  Project Name : Timesheet
  Developed In: Clavis Technologies Pvt Ltd.
  Modification History
  Create Date           Version         Author			Description                                Last modified
  __________	___________	_______________   ________________________________________  ________________________________________
  25-02-2015            1.0             Ajay                 Controller for Holiday list                       25-02-2015
 */

class Holiday extends CI_Controller {

    function __construct() {
    	
        // Construct our parent class
        parent::__construct();
        $this->load->model('holiday_model');
        die();
    }

    function add_holiday() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $holiday_date = $this->input->post('holiday_date');
        $holiday_name = $this->input->post('holiday_name');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'holiday_date' => date('Y-m-d', strtotime($holiday_date)),
            'holiday_name' => trim($holiday_name),
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
        );
        if($this->holiday_model->insertHoliday($data)) {
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Added Holiday',
                'message' => trim($holiday_name). ' has been added.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Holiday added successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "A Holiday with the specified name already exists. Please enter another value for the Holiday." }';
        }
    }

    function edit_holiday() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $holiday_id = $this->input->post('holiday_id');
        if ($single_holiday_detail = $this->holiday_model->listHoliday($holiday_id)) {
            echo json_encode($single_holiday_detail);
        } else {
            echo '{ "status" : "FAILED" , "message" : "No record found." }';
        }
    }

    function submit_edit_holiday() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $holiday_id = $this->input->post('edit_holiday_id');
        $holiday_date = $this->input->post('edit_holiday_date');
        $holiday_name = $this->input->post('edit_holiday_name');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'holiday_id' => $holiday_id,
            'holiday_date' => date('Y-m-d', strtotime($holiday_date)),
            'holiday_name' => trim($holiday_name),
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
        );
        if ($this->holiday_model->updateHoliday($data)) {
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Updated Holiday',
                'message' => trim($holiday_name). ' has been updated.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Holiday updated successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "A Holiday with the specified name already exists. Please enter another value for the Holiday." }';
        }
    }

    function delete_holiday() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $holiday_id = $this->input->post('holiday_id');
        if ($this->holiday_model->deleteHoliday($holiday_id)) {
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Deleted Holiday',
                'message' => 'Holiday deleted.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Holiday deleted successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "You can not delete a Holiday." }';
        }
    }

    function holiday_list($holiday_date=NULL) {
        
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
       if(empty($holiday_date)){
          $holiday_date = date('Y');  
        }
        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['holiday_detail'] = $this->holiday_model->listHoliday(NULL,$holiday_date);
        $data['holiday_date'] = $holiday_date;
        $data['page_url'] = 'holiday_list_content';
        $this->load->view('dashboard_page', $data);
    }
    
    

}
