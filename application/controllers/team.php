<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  Team Name : Timesheet
  Developed In: Clavis Technologies Pvt Ltd.
  Modification History
  Create Date           Version         Author			Description                                Last modified
  __________	___________	_______________   ________________________________________  ________________________________________
  03-03-2015            1.0             Dablu	          Controller for team                        03-03-2015
 */

class Team extends CI_Controller {

    function __construct() {
        // Construct our parent class
        parent::__construct();
        $this->load->model('team_model');
        //$this->load->model('company_model');
    }
    
    function add_team() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        
        $team_name =    $this->input->post('team_name');
	$employee_id = $this->input->post('employee_id');
        $check =      $this->input->post('show_client');
	$all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'team_name' => trim($team_name) ,
	    'employee_id'=>$employee_id,
            'show_client'=> $check,    
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
         );
       
        if($this->team_model->insertTeam($data)){
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Added Team',
                'message' => trim($team_name). ' has been added.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Team added successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "A Team with the specified name already exists." }';
        }
        
    }
    
    function edit_team(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $team_id = $this->input->post('team_id');
        if($single_team_detail = $this->team_model->listTeam($team_id)){
            echo json_encode($single_team_detail);
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "No record found." }';
        }
    }
    
    function submit_edit_team(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $team_id = $this->input->post('team_id');
        $team_name = $this->input->post('team_name');
        $employee_id = $this->input->post('employee_id');
       $check =      $this->input->post('show_client');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'team_id' => $team_id ,
            'team_name' => trim($team_name) ,
            'employee_id' => $employee_id ,
             'show_client'=> $check, 
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
         );
        if($this->team_model->updateTeam($data)){
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Updated Team',
                'message' => trim($team_name). ' has been updated.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Team updated successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "A Team with the specified name already exists." }';
        }
    }
    
    function delete_team(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $team_id = $this->input->post('team_id');
        if($this->team_model->deleteTeam($team_id)){
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Deleted Team',
                'message' => 'Team deleted.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Team deleted successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "You can not delete a team." }';
        }
    }

    function team_list() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        
        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);

        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['team_detail'] = $this->team_model->listTeam();
        $data['user_details']  = $this->userdetails_model->listUser();
	$data['page_url'] = 'team_content';
        $this->load->view('dashboard_page', $data);
    }
	

}
