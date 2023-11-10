<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  Project Name : Timesheet
  Developed In: Clavis Technologies Pvt Ltd.
  Modification History
  Create Date           Version         Author			Description                                Last modified
  __________	___________	_______________   ________________________________________  ________________________________________
  28-02-2015            1.0             Dablu	          Controller for project                        28-02-2015
 */

class Project extends CI_Controller {

    function __construct() {
        // Construct our parent class
        parent::__construct();
        $this->load->model('project_model');
		 $this->load->model('client_model');
        //$this->load->model('company_model');
    }
    
    function add_project() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        
    $project_name = $this->input->post('project_name');
       $client_name = $this->input->post('client_name');
        $currency_code = $this->input->post('currency_code');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'project_name' => trim($project_name) ,
            'client_name'=>$client_name,
            'currency_code'=>$currency_code,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
         );
        if($this->project_model->insertProject($data)){
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Added Project',
                'message' => trim($project_name). ' has been added.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Project added successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "A Project with the specified name already exists." }';
        }
        
    }
    
    function edit_project(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $project_id = $this->input->post('project_id');
        if($single_project_detail = $this->project_model->listProject($project_id)){
            echo json_encode($single_project_detail);
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "No record found." }';
        }
    }
    
    function submit_edit_project(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $project_id = $this->input->post('project_id');
        $project_name = $this->input->post('project_name');
		 $client_name = $this->input->post('client_name');
        $currency_code = $this->input->post('currency_code');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'project_id' => $project_id ,
            'project_name' => trim($project_name) ,
            'client_name'=>$client_name,
            'currency_code'=>$currency_code,
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
         );
        if($this->project_model->updateProject($data)){
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Updated Project',
                'message' => trim($project_name). ' has been updated.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Project updated successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "A Project with the specified name already exists." }';
        }
    }
    
    function delete_project(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $project_id = $this->input->post('project_id');
        if($this->project_model->deleteProject($project_id)){
             $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Deleted Project',
                'message' => 'Project deleted.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Project deleted successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "You can not delete a project." }';
        }
    }

    function project_list() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        
        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);

        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['project_detail'] = $this->project_model->listProject();
        $data['clent_details']  = $this->client_model->listClient(NULL,$group_by=1);
        $data['currency']       = $this->client_model->listCurrency();
        $data['page_url'] = 'project_content';
        $this->load->view('dashboard_page', $data);
    }
    
    function get_project() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_name = $this->input->post('client_name');
        $msg = '';
        if(!empty($client_name)){
        $project_detail = $this->project_model->listProject(NULL,$client_name);
        
        if(!empty($project_detail)){
        foreach($project_detail as $project){
          $msg .='<option value="'.$project->project_name.'">'.$project->project_name.'</option>';  
        }
        }
        echo $msg;
        }
        else{
          echo $msg;  
        }
    }
	

}
