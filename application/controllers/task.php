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
        $this->load->model('client_model');
        $this->load->model('project_model');
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
            'project_id'=> 0,
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
        $project_id = $this->input->post('project_id');
        $actual_hours = $this->input->post('actual_hours');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'task_id' => $task_id,
            'task_name' => trim($task_name),
            'team_name'=>$team_name,
            'expense'=>trim($expense),
            'activity_name'=>$activity_name,
            'subactivity_name'=>$subactivity_name,
            'project_id'=>$project_id,
            'actual_hours'=> $actual_hours,
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
        $project_id = $this->input->post('project_id');
        $subactivity_name = $this->input->post('subactivity_name');
        $msg = '';
        if(!empty($subactivity_name)){ 
            $task_detail = $this->task_model->listTaskByProject($project_id,$subactivity_name);
            if(!empty($task_detail)){
                $msg .='<option value="">Select</option>';
                foreach($task_detail as $task){
                    $msg .='<option value="'.$task->task_name.'">'.$task->task_name.'</option>';  
                }
            } else{
                $msg .='<option value="'.$subactivity_name.'">'.$subactivity_name.'</option>';
            }
            echo $msg;
        }
        else{
            echo $msg;
        }
    }

    function get_task_detail() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $project_name = $this->input->post('project_name');
        $task_data['project_id'] = trim($this->input->post('project_id'));
        $task_data['task_name'] = trim($this->input->post('task_name'));
        // $task_data['activity_name'] = trim($this->input->post('activity_name'));
        // $task_data['subactivity_name'] = trim($this->input->post('subactivity_name'));
        $this->db->select('*');
        $this->db->from('task');
        $this->db->where($task_data);
        $task_query = $this->db->get();
        $task_result = $task_query->result();
        // echo $this->db->last_query();
        // echo '<pre>';
        // print_r($task_result); die;
        $task_detail = '';
        if(!empty($task_result)){ 
            $all_userdata = $this->session->userdata('logged_in');
            $req_data['emp_id'] = $all_userdata['userPrimeryId'];
            $req_data['activity_name'] = $task_result[0]->activity_name;
            $req_data['subactivity_name'] = $task_result[0]->subactivity_name;
            $req_data['task_name'] = $task_result[0]->task_name;
            if($req_data){
                $this->db->select('time_units,time_minutes');
                $this->db->from('timesheet');
                $this->db->where($req_data);
                $timesheet_query = $this->db->get();
                $timesheet_result = $timesheet_query->result();
                $consume_hours = 0;
                $consume_min = 0;
                foreach($timesheet_result as $data){
                    $consume_hours += $data->time_units;
                    $consume_min += $data->time_minutes;
                }
                if($consume_min > 59){
                    $hours  = floor($consume_min/60);
                    $consume_min_in_hours = ($consume_min % 60);
                } else{
                    $hours = 0.00;
                    $consume_min_in_hours = $consume_min;
                }
                $total_hrs_from_min = $hours.'.'.$consume_min_in_hours;
                $total_consume_hours = $consume_hours+$total_hrs_from_min;
            }
            $res_data['actual_hours'] = $task_result[0]->actual_hours;
            $res_data['consume_hours'] = $total_consume_hours;
            print_r(json_encode($res_data));
            die;
        }else{
            echo $task_result;
        }
    }

    ////////////////////////////////////////////////////////////////////////

    function upload_task() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $user_name=$all_userdata['userUname'];
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        if($all_userdata['usrRoleld'] == 1 ){
            $data['clent_details'] = $this->client_model->listClient();
        } else{
            if(!empty($all_userdata['userTmId'])){
                $data['clent_details'] = $this->client_model->listClientNew($all_userdata['userUname']);
            }
            else{
                $data['clent_details'] = false;   
            }
        }
        // if(!empty($all_userdata['userTmId'])){
        //     $data['clent_details'] = $this->client_model->listClientNew($user_name);
        // }
        // else{
        //     $data['clent_details'] = false;   
        // }
        $data['page_url'] = 'upload_task';
        $this->load->view('dashboard_page', $data);
    }
    function add_task_list(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $user_name=$all_userdata['userUname'];
        $project_id = $this->input->post('project_name');
        $this->db->select('*');
        $this->db->from('project');
        $this->db->where('project_id',$project_id);
        $query = $this->db->get();
        $result = $query->result();
        if($result){
            if(!empty($_FILES["user_image"]['name'])){
                $upload_file = $this->do_upload('user_image',$all_userdata['userPrimeryId']);
                if (@$upload_file['error']) {
                    $user_message1 = array(
                        'error_msg' => $upload_file['error']
                    );
                    $this->session->set_userdata($user_message1); 
                    redirect(site_url("task/upload_task"), 'refresh');
                } else {
                    $inputFileName = $upload_file['upload_data']['full_path'];
                    $this->load->library('excel');
                    include '/third_party/PHPExcel/Classes/PHPExcel/IOFactory.php';
                    //  Read your Excel workbook
                    try {
                        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                        $objPHPExcel = $objReader->load($inputFileName);
                    } catch(Exception $e) {
                        die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
                    }
                    //  Get worksheet dimensions
                    $sheet = $objPHPExcel->getSheet(0); 
                    $highestRow = $sheet->getHighestRow(); 
                    $highestColumn = $sheet->getHighestColumn();
                    //  Loop through each row of the worksheet in turn
                    $excel_data = [];
                    for ($row = 1; $row <= $highestRow; $row++){ 
                        //  Read a row of data into an array
                        $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
                        $excel_data[] = $rowData[0];
                    }
                    $task_data_excel = [];
                    foreach ($excel_data as $key => $value) {
                        if($key == 0){
                            continue;
                        } else{
                            foreach ($value as $datakey => $data) {
                                if($datakey == 0){
                                    $task_data_excel['activity'][] = $data;
                                }   
                                if($datakey == 1){
                                    $task_data_excel['sub_activity'][] = $data;
                                }   
                                if($datakey == 2){
                                    $task_data_excel['task'][] = $data;
                                }   
                                if($datakey == 3){
                                    $task_data_excel['actual_hour'][] = $data;
                                }   
                            }
                        }
                    }
                    $activity_data = array_unique($task_data_excel['activity']);
                    foreach ($activity_data as $key => $activity) {
                        $activity_data = array(
                            'activity_name' => trim($activity),
                            'project_id' =>$project_id,
                            'created_by' => $all_userdata['userPrimeryId'],
                            'created' => date('Y-m-d h:i:s')
                        );
                        if($this->activity_model->insertActivity($activity_data)){
                            $history = array(
                                'emp_id' => $all_userdata['userPrimeryId'] ,
                                'title' => 'Added Activity',
                                'message' => trim($activity). ' has been added.',
                                'created' => date('Y-m-d h:i:s')
                             );
                            $this->common_model->addToHistory($history);
                        }
                    }
                    $sub_activity_data = array_unique($task_data_excel['sub_activity']);
                    foreach ($sub_activity_data as $key => $sub_activity) {
                        $subactivity_data = array(
                            'activity_name' => trim($task_data_excel['activity'][$key]),
                            'subactivity_name' => trim($sub_activity),
                            'project_id' =>$project_id,
                            'created_by' => $all_userdata['userPrimeryId'],
                            'created' => date('Y-m-d h:i:s')
                        );
                        if($this->subactivity_model->insertSubactivity($subactivity_data)){
                            $history = array(
                                'emp_id' => $all_userdata['userPrimeryId'] ,
                                'title' => 'Added Sub Activity',
                                'message' => trim($sub_activity). ' has been added.',
                                'created' => date('Y-m-d h:i:s')
                             );
                            $this->common_model->addToHistory($history);
                        }
                    }
                    foreach ($task_data_excel['task'] as $key => $task) {
                        $task_data = array(
                            'task_name' => trim($task),
                            'activity_name' => trim($task_data_excel['activity'][$key]),
                            'subactivity_name' => trim($task_data_excel['sub_activity'][$key]),
                            'project_id' =>$project_id,
                            'actual_hours' => trim($task_data_excel['actual_hour'][$key]),
                            'created_by' => $all_userdata['userPrimeryId'],
                            'created' => date('Y-m-d h:i:s')
                        );
                        if($this->task_model->insertTask($task_data)){
                            $history = array(
                                'emp_id' => $all_userdata['userPrimeryId'] ,
                                'title' => 'Added Task',
                                'message' => trim($task_name). ' has been added.',
                                'created' => date('Y-m-d h:i:s')
                             );
                            $this->common_model->addToHistory($history);
                        }
                    }
                    $user_message1 = array(
                        'success_msg' => 'Task Added successfully'
                    );
                    $this->session->set_userdata($user_message1); 
                    redirect(site_url("task/upload_task"), 'refresh');
                }
            } else{
                $user_message1 = array(
                    'error_msg' => 'File not exists'
                );
                $this->session->set_userdata($user_message1); 
                redirect(site_url("task/upload_task"), 'refresh');
            }
        } else{
            $user_message1 = array(
                'error_msg' => 'Project not exists'
            );
            $this->session->set_userdata($user_message1); 
            redirect(site_url("task/upload_task"), 'refresh');
        }
    }
    function do_upload($file_name,$emp_id) {
        $new_name = $_FILES["user_image"]['name'];
        $info = new SplFileInfo($new_name);
        $new_name = rand().'_task_file'.$emp_id.'.'.$info->getExtension();
        $config['file_name'] = $new_name;
        $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]) . '/uploads/task/';
        $config['allowed_types'] = 'xlsx|xls';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($file_name)) {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        } else {
            $data = array('upload_data' => $this->upload->data());
            return $data;
        }
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
          $msg .='<option value="'.$project->project_id.'">'.$project->project_name.'</option>';  
        }
        }
        echo $msg;
        }
        else{
          echo $msg;  
        }
    }

    ///////////////////////////////////////////////////////////////////////
	

}
