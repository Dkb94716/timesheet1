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
        $manager_name = $this->input->post('manager_name');
        $start_date = strtotime($this->input->post('start_date'));
        $start_date = date('Y-m-d', $start_date);
        $dead_line_date = strtotime($this->input->post('dead_line_date'));
        $dead_line_date = date('Y-m-d', $dead_line_date);
        $est_cost = $this->input->post('est_cost');

        $data = array(
            'project_name' => trim($project_name) ,
            'client_name'=>$client_name,
            'manager_name'=>$manager_name,
            'currency_code'=>$currency_code,
            'start_date'=>$start_date,
            'dead_line_date'=>$dead_line_date,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s'),
            'project_total_estimate_amount' => (int)$est_cost
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

    function edit_project_com(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $project_id = $this->input->post('project_id');
        if($single_project_detail = $this->project_model->listProject_com($project_id)){
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
        $project_status = $this->input->post('project_status');
        $est_cost = $this->input->post('est_cost');
        if($project_status == "Completed"){
            $completed_date = date('Y-m-d');
        }
        $manager_name = $this->input->post('manager_name');

        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'project_id' => $project_id ,
            'project_name' => trim($project_name) ,
            'client_name'=>$client_name,
            'manager_name'=>$manager_name,
            'currency_code'=>$currency_code,
            'project_status'=>$project_status,
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s'),
            'project_total_estimate_amount' => (int)$est_cost
         );
        if($project_status == "Completed"){
            $data['completed_date'] = $completed_date;
        }    
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
        $data['manager_list'] = $this->project_model->listManager();
        $data['all_manager_list'] = $this->project_model->allManagerList();
        // echo "<pre>";print_r($data['manager_list']); die;

        // echo "<pre>"; print_r($data['project_detail']); die;
        $data['clent_details']  = $this->client_model->listClient(NULL,$group_by=1);
        $data['currency']       = $this->client_model->listCurrency();
        $data['page_url'] = 'project_content';
        $this->load->view('dashboard_page', $data);
    }

    function project_list_com() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        
        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);

        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['project_detail'] = $this->project_model->listProject_com();
        $data['manager_list'] = $this->project_model->listManager();
        // echo "<pre>"; print_r($data['manager_list']); die;
        
        $data['clent_details']  = $this->client_model->listClient(NULL,$group_by=1);
        $data['currency']       = $this->client_model->listCurrency();
        $data['page_url'] = 'project_content_com';

        
        $this->load->view('dashboard_page', $data);
    }
    
    function get_project() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_name = $this->input->post('client_name');
        $msg = '';
        if(!empty($client_name)){
        $project_detail = $this->project_model->listProject_new(NULL,$client_name);
        
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

    
     // Start Here 
     
    function project_assign_user_list() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        // $data['project_detail'] = $this->project_model->listProject();
        $data['assigned_project_list'] = $this->project_model->listProject_assigned_to_user();        
        $data['users_list'] = $this->project_model->listUsers();        
        $data['clent_details']  = $this->client_model->listClient(NULL,$group_by=1);
        $data['currency']       = $this->client_model->listCurrency();
        $data['page_url'] = 'project_content_assign_to_users';
        $this->load->view('dashboard_page', $data);
    }

    function get_project_assign() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_name = $this->input->post('client_name');
        $msg = '';
        if(!empty($client_name)){
        $project_detail = $this->project_model->listProject_new(NULL,$client_name);
        
        if(!empty($project_detail)){
            $msg ='<option value="">Select</option>';
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

    function get_project_assign_time() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $user_data = $this->session->userdata('logged_in');
        $client_name = $this->input->post('client_name');
        $msg = '';
        if(!empty($client_name)){
            if($user_data['usrRoleld'] == 1 ){
                $project_detail = $this->project_model->listProjectByClient(NULL,$client_name);
            } else{       
                $project_detail = $this->project_model->listProject_new_assign(NULL,$client_name,$user_data['userUname']);
            }    
            if(!empty($project_detail)){
                $msg ='<option value="">Select</option>';
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

    function add_project_assign_to_user() {
                if (!$this->session->userdata('logged_in')) {
                    redirect(site_url("login"), 'refresh');
                }
                $project_name = $this->input->post('project_name');
                $client_name = $this->input->post('client_name');
                $user_name = $this->input->post('user_name');
                $all_userdata = $this->session->userdata('logged_in');
                $data = array(
                    'project_name' => trim($project_name) ,
                    'client_name'=>$client_name,
                    'user_name'=>$user_name,
                    'created_by' => $all_userdata['userPrimeryId'],
                    'created' => date('Y-m-d h:i:s')
                );


                $this->db->select('*');
                $this->db->from('project_assign_to_users');
                $this->db->where('project_name', $project_name);
                $this->db->where('user_name', $user_name);
                $query = $this->db->get();
                $num_rows = $query->num_rows();
                if ($num_rows > 0) {
                    echo '{ "status" : "FAILED" , "message" : "This Project is already assigned to selected user." }';
                } else {
                    $this->project_model->insertProject_assign_user($data);
                    echo '{ "status" : "SUCCESS" , "message" : "Project assigned successfully. "}';
                }    
    }

    function delete_project_assigned(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $project_id = $this->input->post('project_id');

        if($this->project_model->deleteProjectAssigned($project_id)){
             $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Deleted assigned Project',
                'message' => 'assigned Project  deleted.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Remove Project user successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "You can not delete a Remove." }';
        }
    }

    function edit_project_assigned(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $project_id = $this->input->post('project_id');
        if($single_project_detail = $this->project_model->listProjectAssignedEdit($project_id)){
            echo json_encode($single_project_detail);
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "No record found." }';
        }
    }

    function submit_edit_project_assigned(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $project_id = $this->input->post('project_id');
        $project_name = $this->input->post('project_name');
		$client_name = $this->input->post('client_name');
        $user_name = $this->input->post('user_name');

        $all_userdata = $this->session->userdata('logged_in');

        $data = array(
            'project_id' => $project_id ,
            'project_name' => trim($project_name) ,
            'client_name'=>$client_name,
            'user_name'=>$user_name,
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
         );

         

        $this->db->select('*');
        $this->db->from('project_assign_to_users');
        $this->db->where('project_name', $project_name);
        $this->db->where('user_name', $user_name);
        $this->db->where('project_id !=', $project_id);
        $query = $this->db->get();
        $num_rows = $query->num_rows();
        if ($num_rows > 0) {
            echo '{ "status" : "FAILED" , "message" : "This Project is already assigned to selected user." }';
        } else {
            $this->db->where('project_id', $data['project_id']);
            $this->db->update('project_assign_to_users', $data);
            echo '{ "status" : "SUCCESS" , "message" : "Project updated successfully. "}';
        }

    }

    function add_manager() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $manager_name = $this->input->post('manager_name');
        $status = $this->input->post('manager_status');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'name'=>trim($manager_name),
            'status'=>$status,
            'created' => date('Y-m-d h:i:s')
         );

        if($this->project_model->insertManager($data)){
            $history = array(
                'message' => trim($manager_name). ' has been added.',
                'created_by' => $all_userdata['userPrimeryId'],
                'created' => date('Y-m-d h:i:s')
             );

            $this->common_model->addToHistory($history);

            echo '{ "status" : "SUCCESS" , "message" : "Manager added successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "Manager with the specified name already exists." }';
        }
        
    }

    function edit_manager(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $manager_id = $this->input->post('manager_id');
        $manager_name = $this->input->post('manager_name');
        $manager_status = $this->input->post('manager_status');
        $all_userdata = $this->session->userdata('logged_in');
        
        $data = array(
            'id' => $manager_id ,
            'name'=>trim($manager_name),
            'status'=>$manager_status,
            'updated' => date('Y-m-d h:i:s')
         );
        if($this->project_model->updateManager($data)){
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Updated Manager',
                'message' => trim($manager_name). ' has been updated.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Manager updated successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "Manager not found" }';
        }
    }
    
    // end Here
    function get_project_assign_client() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_name = $this->input->post('client_name');
        $msg = '';
        if(!empty($client_name)){
        $project_detail = $this->project_model->listProjectByClient(NULL,$client_name);
        
        if(!empty($project_detail)){
            $msg ='<option value="">Select</option>';
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
