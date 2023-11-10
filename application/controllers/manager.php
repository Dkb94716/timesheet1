<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  Project Name : Timesheet
  Developed In: Clavis Technologies Pvt Ltd.
  Modification History
  Create Date           Version         Author			Description                                Last modified
  __________	___________	_______________   ________________________________________  ________________________________________
  12-10-2023            1.0             	          Controller for manager                        28-02-2015
 */

class Manager extends CI_Controller {

    function __construct() {
        // Construct our parent class
        parent::__construct();
        $this->load->model('manager_model');
		//$this->load->model('company_model');
    }
    
    function add_manager() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $manager_name = $this->input->post('manager_name');
        $status = $this->input->post('manager_status');

        $data = array(
            'name'=>$manager_name,
            'status'=>$status,
            'created' => date('Y-m-d h:i:s')
         );

        if($this->manager_model->insertManager($data)){
            $history = array(
                'message' => trim($manager_name). ' has been added.',
                'created' => date('Y-m-d h:i:s')
             );

            $this->common_model->addToHistory($history);

            echo '{ "status" : "SUCCESS" , "message" : "Manager added successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "Manager with the specified name already exists." }';
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

}