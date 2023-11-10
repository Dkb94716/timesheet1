<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  Task Name : Timesheet
  Developed In: Clavis Technologies Pvt Ltd.
  Modification History
  Create Date           Version         Author			Description                                Last modified
  __________	___________	_______________   ________________________________________  ________________________________________
  04-03-2015            1.0             Dablu	          Controller for task                             04-03-2015
 */

class Task extends CI_Controller {

    function __construct() {
        // Construct our parent class
        parent::__construct();
        $this->load->model('task_model');
	$this->load->model('team_model');
        $this->load->model('activity_model');
        $this->load->model('subactivity_model');
    }
    
    function add_task() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        
        $task_name = $this->input->post('task_name');
        $team_name = $this->input->post('team_name');
        $expense = $this->input->post('expense');
        $activity_name = $this->input->post('activity_name');
        $subactivity_name = $this->input->post('subactivity_name');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'task_name' => trim($task_name) ,
            'team_name'=>$team_name,
            'expense'=>trim($expense),
            'activity_name'=>$activity_name,
            'subactivity_name'=>$subactivity_name,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
         );
        if($this->task_model->insertTask($data)){
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Added Task',
                'message' => trim($task_name). ' has been added.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Task added successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "A Task with the specified name already exists." }';
        }
        
    }
    
    function edit_task(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $task_id = $this->input->post('task_id');
        if($single_task_detail = $this->task_model->listTask($task_id)){
            echo json_encode($single_task_detail);
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "No record found." }';
        }
    }

    
    function submit_edit_task(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $task_id = $this->input->post('task_id');
        $task_name = $this->input->post('task_name');
        $team_name = $this->input->post('team_name');
        $expense = $this->input->post('expense');
        $activity_name = $this->input->post('activity_name');
        $subactivity_name = $this->input->post('subactivity_name');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'task_id' => $task_id,
            'task_name' => trim($task_name) ,
            'team_name'=>$team_name,
            'expense'=>trim($expense),
            'activity_name'=>$activity_name,
            'subactivity_name'=>$subactivity_name,
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
         );
        if($this->task_model->updateTask($data)){
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Updated Task',
                'message' => trim($task_name). ' has been updated.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Task updated successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "A Task with the specified name already exists." }';
        }
    } 
    
    function delete_task(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $task_id = $this->input->post('task_id');
        if($this->task_model->deleteTask($task_id)){
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Deleted Task',
                'message' => 'Task deleted.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Task deleted successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "You can not delete a task." }';
        }
    }

    function task_list() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        
        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['task_detail'] = $this->task_model->listTask();
        $data['team_detail'] = $this->team_model->listTeam();
        $data['activity_detail'] = $this->activity_model->listActivity();
        $data['subactivity_detail'] = $this->subactivity_model->listSubactivity();
        $data['page_url'] = 'task_content';
        $this->load->view('dashboard_page', $data);
    }
    
    function get_task() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $subactivity_name = $this->input->post('subactivity_name');
         $msg = '';
         if(!empty($subactivity_name)){
        $task_detail = $this->task_model->listTask(NULL,$subactivity_name);
       
        if(!empty($task_detail)){
        foreach($task_detail as $task){
          $msg .='<option value="'.$task->task_name.'">'.$task->task_name.'</option>';  
        }
        }
        echo $msg;
         }
         else{
             echo $msg;
         }
    }
	

}
