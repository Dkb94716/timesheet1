<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  Project Name : Timesheet
  Developed In: Clavis Technologies Pvt Ltd.
  Modification History
  Create Date           Version         Author			Description                                Last modified
  __________	___________	_______________   ________________________________________  ________________________________________
  13-03-2015            1.0             Ajay                 Controller for Timesheet                        17-02-2015
 */

class Timesheet extends CI_Controller {

    function __construct() {
        // Construct our parent class
        parent::__construct();
        $this->load->model('timesheet_model');
        $this->load->model('client_model');
        $this->load->model('project_model');
        $this->load->model('task_model');
        $this->load->model('activity_model');
        $this->load->model('subactivity_model');
         $this->load->model('team_model');
        $this->load->helper(array( 'common'));
    }

    function add_time() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $timesheet_date = $this->input->post('timesheet_date');
        $disbursement = $this->input->post('disbursement');
        $start_time = $this->input->post('start_time');
        $end_time = $this->input->post('end_time');
        $time_units = $this->input->post('time_units');
        $time_minutes = $this->input->post('minutes');


        $client_name = $this->input->post('client_name');
        $project_name = $this->input->post('project_name');
        $task_name = $this->input->post('task_name');
        $activity_name = $this->input->post('activity_name');
        $subactivity_name = $this->input->post('subactivity_name');
        $billable = $this->input->post('billable');
        $reason_to_exceed_time = $this->input->post('reasion_box');
        $comments = $this->input->post('comments');
        $time_date = date('Y-m-d', strtotime($timesheet_date));
        $time_status = $this->timesheet_model->getStatusOfWeek($all_userdata['userPrimeryId'],$time_date);
        $time_status_str = 'Pending';
        if($time_status){
        $time_status_str = $time_status[0]->time_status;  
        }
        
        $data = array(
            'emp_id' => $all_userdata['userPrimeryId'],
            'timesheet_date' => date('Y-m-d', strtotime($timesheet_date)),
            'disbursement' => $disbursement,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'time_units' => $time_units,
            'time_minutes' => $time_minutes,
            
            'client_name' => $client_name,
            'project_name' => $project_name,
            'task_name' => $task_name,
            'time_status' => $time_status_str,
            'activity_name' => $activity_name,
            'subactivity_name' => $subactivity_name,
            'billable' => $billable,
            'reason_to_exceed_time' => $reason_to_exceed_time,
            'comments' => $comments,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
        );
        if ($this->timesheet_model->insertTime($data)) {
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Added Timesheet',
                'message' => 'Added Timesheet of '.$all_userdata['userUname'].'.',
                'created' => date('Y-m-d h:i:s')
            );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Timesheet added successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "This week of timesheet has been already approved." }';
        }
    }

    function edit_time() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $timesheet_id = $this->input->post('timesheet_id');
        if ($single_time_detail = $this->timesheet_model->getTime($timesheet_id)) {
            $this->db->select('project_id');
            $this->db->from('project');
            $this->db->where('project_name', $single_time_detail[0]->project_name);
            $this->db->where('client_name', $single_time_detail[0]->client_name);
            $pro_query = $this->db->get();
            $pro_result = $pro_query->result();
            $project_id = $pro_result[0]->project_id;
            
            $task_data['task_name'] = $single_time_detail[0]->task_name;
            $task_data['activity_name'] = $single_time_detail[0]->activity_name;
            $task_data['subactivity_name'] = $single_time_detail[0]->subactivity_name;
            $task_data['project_id'] = $project_id;
            $this->db->select('*');
            $this->db->from('task');
            $this->db->where($task_data);
            $task_query = $this->db->get();
            $task_result = $task_query->result();
            if($task_result){
                $single_time_detail[0]->project_id = $project_id;
                $single_time_detail[0]->actual_hours = $task_result[0]->actual_hours;
                $single_time_detail[0]->consume_hours = $single_time_detail[0]->time_units.'.'.$single_time_detail[0]->time_minutes;
                echo json_encode($single_time_detail);
            } else{
                // $task_data['project_id'] = '0';
                // $this->db->select('*');
                // $this->db->from('task');
                // $this->db->where($task_data);
                // $task_query = $this->db->get();
                // $task_result = $task_query->result();
                // $single_time_detail[0]->project_id = $project_id;
                // $single_time_detail[0]->actual_hours = $task_result[0]->actual_hours;
                // $single_time_detail[0]->consume_hours = $single_time_detail[0]->time_units.'.'.$single_time_detail[0]->time_minutes;
                echo json_encode($single_time_detail);
            }
        } else {
            echo '{ "status" : "FAILED" , "message" : "No record found." }';
        }
    }

    function submit_edit_time() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $emp_id=$this->input->post('edit_emp_id');
        $timesheet_id = $this->input->post('edit_timesheet_id');
        $timesheet_date = $this->input->post('edit_timesheet_date');
        $disbursement = $this->input->post('edit_disbursement');
        $start_time = $this->input->post('edit_start_time');
        $end_time = $this->input->post('edit_end_time');
        $time_units = $this->input->post('edit_time_units');
        $time_minutes = $this->input->post('edit_minutes');

        $client_name = $this->input->post('edit_client_name');
        $project_name = $this->input->post('edit_project_name');
        $task_name = $this->input->post('edit_task_name');
        $activity_name = $this->input->post('edit_activity_name');
        $subactivity_name = $this->input->post('edit_subactivity_name');
        $reason_to_exceed_time = $this->input->post('edit_reasion_box');
        $billable = $this->input->post('edit_billable');
        $comments = $this->input->post('edit_comments');
        $all_userdata = $this->session->userdata('logged_in');
        $time_date = date('Y-m-d', strtotime($timesheet_date));
        $time_status = $this->timesheet_model->getStatusOfWeek($emp_id,$time_date);
        $time_status_str = 'Pending';
        if($time_status){
        $time_status_str = $time_status[0]->time_status;
        }
        
        $data = array(
            'timesheet_id' => $timesheet_id,
            'emp_id'=>$emp_id,
            'timesheet_date' => date('Y-m-d', strtotime($timesheet_date)),
            'disbursement' => $disbursement,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'time_units' => $time_units,
            'time_minutes' => $time_minutes,
            
            'client_name' => $client_name,
            'project_name' => $project_name,
            'task_name' => $task_name,
            'time_status' => $time_status_str,
            'activity_name' => $activity_name,
            'subactivity_name' => $subactivity_name,
            'billable' => $billable,
            'reason_to_exceed_time' => $reason_to_exceed_time,
            'comments' => $comments,
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
        );
        if ($this->timesheet_model->updateTime($data)) {
             $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Updated Timesheet',
                'message' => 'Updated Timesheet of '.$all_userdata['userUname'].'.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Timesheet updated successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "This week of timesheet has been already approved." }';
        }
    }

    function delete_time(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $timesheet_id = $this->input->post('timesheet_id');
        if ($this->timesheet_model->deleteTime($timesheet_id)) {
             $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Deleted Timesheet',
                'message' => 'Deleted Timesheet of '.$all_userdata['userUname'].'.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Timesheet deleted successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "You can not delete a time." }';
        }
    }

    function time_list() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);

        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $display_all=false;
        if($data['userPrivileges']->timesheet->alltimesheet->View==1){
        $display_all = true;
        }
        
        $week = false;
       // $week_arr = NULL;
        $overdue = false;
        if (isset($_GET['w'])) {
            $week = true;
            //$week_str = base64_decode($week);
            //$week_arr = str_replace("#","','", $week_str);
        }
        if(isset($_GET['f'])){
           $overdue = true; 
        }
        

        $team_name=NULL;
        if(!empty($all_userdata['userTmId'])){
        $team_detail = $this->team_model->listTeam($all_userdata['userTmId']);
        if(isset($team_detail[0]->show_client)){
           $team_name =  ($team_detail[0]->show_client==1) ? NULL : $team_detail[0]->team_name;
        }
        }
        $data['time_detail'] = $this->timesheet_model->listTime($week,$all_userdata['userPrimeryId'],$display_all,$overdue);
        if(!empty($all_userdata['userTmId'])){
        $data['client_detail'] = $this->client_model->listClient(NULL,NULL,$team_name);
        }
        else{
         $data['client_detail'] = false;   
        }
        $data['project_detail'] = $this->project_model->listProject();
        $data['task_detail'] = $this->task_model->listTask();
        $data['activity_detail'] = $this->activity_model->listActivity();
        $data['subactivity_detail'] = $this->subactivity_model->listSubactivity();
        $data['userUId'] = $all_userdata['userUId'];
        $data['userUname'] = $all_userdata['userUname'];
        $data['managerId'] = $all_userdata['managerId'];
        $data['emp_id'] = $all_userdata['userPrimeryId'];

        $data['page_url'] = 'timesheet_content';
        $this->load->view('dashboard_page', $data);
    }

    function time_detail_data_upadte() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $data['time_detail_data'] = $this->timesheet_model->viewListTimeData();

        // echo "<pre>"; print_r($data['time_detail_data']); die;

        foreach($data['time_detail_data'] as $all_data){
            if($all_data->time_minutes!=''){
                // echo $all_data->time_units.', minutes='.$all_data->time_minutes;
            }else{
                $hrs= floor($all_data->time_units/4);
                $timesheet_id=$all_data->timesheet_id;
                $minutes=($all_data->time_units%4)*15;

                $data = array(
                    'timesheet_id' => $timesheet_id,
                    'time_units' => $hrs,
                    'time_minutes' => $minutes
                );

                if ($this->timesheet_model->updateTimeData($data)) {
                    echo '{ "status" : "SUCCESS" , "message" : "Timesheet updated successfully. "}';
                } else {
                    echo '{ "status" : "FAILED" , "message" : "This week of timesheet has been already approved." }';
                }
            }
            // echo "<br>";
        }
    }
    
    function view_time_list($emp_id=NULL,$start_date=NULL,$end_date=NULL) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $user_name=$all_userdata['userUname'];
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $today = date("N");
        if($today == 1){
            $sheet_edit_date = date("Y-m-d",strtotime( "previous thursday" ));
        } elseif($today == 2){
            $sheet_edit_date = date("Y-m-d",strtotime( "previous friday" ));
        } else{
            $date = date('Y-m-d');
            $sheet_edit_date = date('Y-m-d', strtotime($date .' -2 day'));
        }
        if(empty($start_date)){ 
            $today = date("N");
            if($today==1){
                $start_date = date('Y-m-d'); 
            }
            else{
                $start_date = date("Y-m-d",strtotime( "previous monday" ));
            }
            if($today==7){
                $end_date = date('Y-m-d'); 
            }
            else{
                $end_date = date("Y-m-d",strtotime( "next sunday" ));
            
            }
        }
        $team_name=NULL;
        if(!empty($all_userdata['userTmId'])){
        $team_detail = $this->team_model->listTeam($all_userdata['userTmId']);
        if(isset($team_detail[0]->show_client)){
           $team_name =  ($team_detail[0]->show_client==1) ? NULL : $team_detail[0]->team_name;
        }
        }
        $data['time_detail'] = $this->timesheet_model->viewListTime($emp_id,$start_date,$end_date);
        

        $data['time_by_day_detail'] = $this->timesheet_model->ListTimeByDay($emp_id,$start_date,$end_date);
        //echo "<pre>";print_r($data['time_by_day_detail']); die;
        if(!empty($all_userdata['userTmId'])){
             // $data['client_detail'] = $this->client_model->listClient(NULL,NULL,$team_name);
             $data['client_detail'] = $this->client_model->listClientNew($user_name);
        }
        else{
         $data['client_detail'] = false;   
        }
        $data['project_detail'] = $this->project_model->listProject();
        $data['task_detail'] = $this->task_model->listTask();
        $data['activity_detail'] = $this->activity_model->listActivity();
        $data['subactivity_detail'] = $this->subactivity_model->listSubactivity();
        $data['user_detail'] = $this->userdetails_model->listUser($emp_id);
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $data['sheet_edit_date'] = $sheet_edit_date;
        $data['userUId'] = $all_userdata['userUId'];
        $data['userUname'] = $all_userdata['userUname'];
        
        $data['emp_id'] = $all_userdata['userPrimeryId'];            
        $data['timesheet_emp_id'] = $emp_id;            

        $data['page_url'] = 'view_timesheet_content';
        $this->load->view('dashboard_page', $data);
    }
    
    function change_time_status() {

        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        
        $time_status = $this->input->post('time_status');
        
        $emp_id = '';
        if ($this->input->post('emp_id')) {
            $emp_id = $this->input->post('emp_id');
        }
        $empId = $this->input->post('empId');
        $empname = $this->input->post('empName');
        $emailId = $this->input->post('emailId');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $start_date_db = date('Y-m-d',  strtotime($start_date));
        $end_date_db = date('Y-m-d',  strtotime($end_date));
        $managerId_email = '';
        if ($this->input->post('managerId')) {
            $managerId_email = $this->input->post('managerId');
            $user_detail = $this->userdetails_model->listUser($managerId_email);
            $manger_email = @$user_detail[0]->emailId;
        }
        $reason_to_reject = '';
        if ($this->input->post('reason_to_reject')) {
            $reason_to_reject = $this->input->post('reason_to_reject');
        }
        $timesheet_id = '';
        if ($this->input->post('timesheet_id')) {
            $timesheet_id = $this->input->post('timesheet_id');
            $timesheet_id = explode(',',$timesheet_id);
        }
        $managerId = $all_userdata['managerId'];
        $data = array(
           
            'time_status' => $time_status,
            'reason_to_reject' => $reason_to_reject,
            'created' =>date('Y-m-d h:i:s'),
            'updated' =>date('Y-m-d h:i:s')
        );
        
        $base_url = base_url();
        if ($this->timesheet_model->updateTimeStatus($timesheet_id,$data,$start_date_db,$end_date_db,$emp_id,$managerId,$empId)) {
             $search_data = array('[empname]', '[empId]', '[base_url]', '[start_date]', '[end_date]', '[reason_to_reject]');
            $replace_data = array(ucfirst($empname), $empId, $base_url, $start_date, $end_date, $reason_to_reject);
            if ($time_status == 'Approved') {
                $MailSubject = str_replace($search_data, $replace_data, APPROVED_TIMESHEET_EMAIL_SUBJECT);
                $email_message = APPROVED_TIMESHEET_EMAIL_MESSAGE;

                $MailTemplateContents = str_replace($search_data, $replace_data, $email_message);
                $Sendto = @$emailId;
            } elseif ($time_status == 'Submitted') {
                $MailSubject = str_replace($search_data, $replace_data, SUBMITTED_TIMESHEET_EMAIL_SUBJECT);
                $email_message = SUBMITTED_TIMESHEET_EMAIL_MESSAGE;

                $MailTemplateContents = str_replace($search_data, $replace_data, $email_message);
                $Sendto = @$manger_email;
            } 
            else {
                $MailSubject = str_replace($search_data, $replace_data, REJECTION_TIMESHEET_EMAIL_SUBJECT);
                $email_message = REJECTION_TIMESHEET_EMAIL_MESSAGE;

                $MailTemplateContents = str_replace($search_data, $replace_data, $email_message);
                $Sendto = @$emailId;
            }
            if(!empty($Sendto)){
            $common = new Common();
            $Status = $common->sendmail($Sendto, $MailSubject, $MailTemplateContents);
            }
           $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Timesheet Status',
                'message' => $time_status.' Timesheet of '.$all_userdata['userUname'].'.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{"status" : "SUCCESS" , "message" : "Timesheet ' . strtolower($time_status) . ' successfully." }';
        } else {
            echo '{ "status" : "FAILED" , "message" : "This timesheet is already approved or rejected." }';
        }
    }
    
        function pending_time() {
        $all_userdata = $this->session->userdata('logged_in');
        $emp_id = $all_userdata['userPrimeryId'];
        
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);

        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $display_all=false;
        if($data['userPrivileges']->timesheet->alltimesheet->View==1){
        $display_all = true;
        }
        $pending_time_detail = $this->timesheet_model->pendingTime($emp_id,$display_all);
        
//        $week_arr = '';
//        $week_str = '';
//        $i = 0;
//        if (!empty($pending_time_detail)) {
//            foreach ($pending_time_detail as $pending_time) {
//                $i++;
//                if (count($pending_time_detail) == $i) {
//                    $week_arr .= $pending_time->week;
//                } else {
//                    $week_arr .= $pending_time->week . '#';
//                }
//            }
//
//            $week_str = base64_encode($week_arr);
//        }
        
        //$data = array();
        //$data['time_count'] = $i;
        //$data['week_str'] = $week_str;
        //echo json_encode($data);
        echo $pending_time_detail;
    }
    
    function overdue_timesheet() {
        $all_userdata = $this->session->userdata('logged_in');
        $emp_id = $all_userdata['userPrimeryId'];
        $pending_time_detail = $this->timesheet_model->overdueTimesheet($emp_id);
//        $week_arr = '';
//        $week_str = '';
       // $i = 0;
//        if (!empty($pending_time_detail)) {
//            foreach ($pending_time_detail as $pending_time) {
//                $i++;
//                if (count($pending_time_detail) == $i) {
//                    $week_arr .= $pending_time->week;
//                } else {
//                    $week_arr .= $pending_time->week . '#';
//                }
//            }
//
//            $week_str = base64_encode($week_arr);
//        }
//        $data = array();
//        $data['time_count'] = $i;
//        $data['week_str'] = $week_str;
//        echo json_encode($data);
        if($pending_time_detail==null){
            echo '';
        }
        else{
           echo $pending_time_detail; 
        }
        
    }

    function pending_add_time() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $timesheet_date = $this->input->post('timesheet_date');
        $disbursement = $this->input->post('disbursement');
        $start_time = $this->input->post('start_time');
        $end_time = $this->input->post('end_time');
        $time_units = $this->input->post('time_units');
        $time_minutes = $this->input->post('minutes');


        $client_name = $this->input->post('client_name');
        $project_name = $this->input->post('project_name');
        $task_name = $this->input->post('task_name');
        $activity_name = $this->input->post('activity_name');
        $subactivity_name = $this->input->post('subactivity_name');
        $billable = $this->input->post('billable');
        $reason_to_exceed_time = $this->input->post('reasion_box');
        $comments = $this->input->post('comments');
        $time_date = date('Y-m-d', strtotime($timesheet_date));
        $time_status = $this->timesheet_model->getStatusOfWeek($all_userdata['userPrimeryId'],$time_date);
        $time_status_str = 'Pending';
        if($time_status){
        $time_status_str = $time_status[0]->time_status;  
        }
        
        $data = array(
            'emp_id' => $all_userdata['userPrimeryId'],
            'timesheet_date' => date('Y-m-d', strtotime($timesheet_date)),
            'disbursement' => $disbursement,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'time_units' => $time_units,
            'time_minutes' => $time_minutes,
            
            'client_name' => $client_name,
            'project_name' => $project_name,
            'task_name' => $task_name,
            'time_status' => $time_status_str,
            'activity_name' => $activity_name,
            'subactivity_name' => $subactivity_name,
            'billable' => $billable,
            'reason_to_exceed_time' => $reason_to_exceed_time,
            'comments' => $comments,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
        );
        if ($this->timesheet_model->insertPendingTime($data)) {
            $empname = $all_userdata['userUname'];
            $empId = $all_userdata['userUId'];
            $search_data = array('[empname]', '[empId]', '[timesheet_date]', '[start_time]', '[end_time]', '[time_units]', '[minutes]', '[client_name]', '[project_name]', '[activity_name]', '[subactivity_name]');
            $replace_data = array(ucfirst($empname), $empId, $timesheet_date, $start_time, $end_time, $time_units, $time_minutes, $client_name, $project_name, $activity_name, $subactivity_name);
            $MailSubject = str_replace($search_data, $replace_data, DAILY_TIMESHEET_REPORT_EMAIL_SUBJECT);
            $email_message = DAILY_TIMESHEET_REPORT_EMAIL_MESSAGE;

            $MailTemplateContents = str_replace($search_data, $replace_data, $email_message);
            
            $Sendto = DAILY_TIMESHEET_REPORT_ADMIN_EMAIL;
            $common = new Common();
            $Status = $common->sendmail($Sendto, $MailSubject, $MailTemplateContents);

            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Added Timesheet',
                'message' => 'Added Timesheet of '.$all_userdata['userUname'].'.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Timesheet added successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "This week of timesheet has been already approved." }';
        }
    }

    function upload_user_hourly_rate() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $user_name=$all_userdata['userUname'];
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        if(!empty($all_userdata['userTmId'])){
            $data['clent_details'] = $this->client_model->listClientNew($user_name);
        }
        else{
            $data['clent_details'] = false;   
        }
        $data['page_url'] = 'upload_user_hourly_rate';
        $this->load->view('dashboard_page', $data);
    }
    function add_user_hourly_rate_list(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        
        if(!empty($_FILES["user_image"]['name'])){
            $upload_file = $this->do_upload('user_image',$all_userdata['userPrimeryId']);
            if (@$upload_file['error']) {
                $user_message1 = array(
                    'error_msg' => $upload_file['error']
                );
                $this->session->set_userdata($user_message1); 
                redirect(site_url("timesheet/upload_user_hourly_rate"), 'refresh');
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
                $month = date('m', strtotime('-1 month'));
                $year = date('Y');
                $date = new DateTime('01-'.$month.'-'.$year);
                $add_date = $date->format('Y-m-d');
                foreach ($excel_data as $key => $value) {
                    if($key == 0){
                        continue;
                    } else{
                        --$key;
                        foreach ($value as $datakey => $data) {
                            if($datakey == 1){
                                $task_data_excel[$key]['user_id'] = $data;
                            }   
                            if($datakey == 2){
                                $task_data_excel[$key]['email_id'] = $data;
                            }   
                            if($datakey == 4){
                                $task_data_excel[$key]['hourly_rate'] = $data;
                            } 
                            $task_data_excel[$key]['month'] = $month;  
                            $task_data_excel[$key]['year'] = $year;  
                            $task_data_excel[$key]['date'] = $add_date;  
                            $task_data_excel[$key]['status'] = 1;  
                            $task_data_excel[$key]['created_by'] = $all_userdata['userPrimeryId'];  
                            $task_data_excel[$key]['created'] = date('Y-m-d');  
                        }
                    }
                }
                
                $d = new DateTime( $add_date );
                $d->modify( 'last day of previous month' );
                $updated_data['end_date'] = $d->format( 'Y-m-d' );
                if($this->timesheet_model->updateUserHourlyRate($updated_data)){
                    if($this->timesheet_model->insertUserHourlyRate($task_data_excel)){
                            $history = array(
                                'emp_id' => $all_userdata['userPrimeryId'] ,
                                'title' => 'Added Users Hourly Rate',
                                'message' => trim($activity). ' has been added.',
                                'created' => date('Y-m-d h:i:s')
                                );
                            $this->common_model->addToHistory($history);
                    }
                    $user_message1 = array(
                        'success_msg' => 'User Hourly Rate Added successfully'
                    );
                    $this->session->set_userdata($user_message1); 
                    redirect(site_url("timesheet/upload_user_hourly_rate"), 'refresh');
                }    
            }
        } else{
            $user_message1 = array(
                'error_msg' => 'File not exists'
            );
            $this->session->set_userdata($user_message1); 
            redirect(site_url("timesheet/upload_user_hourly_rate"), 'refresh');
        }
    }

    function do_upload($file_name,$emp_id) {
        $new_name = $_FILES["user_image"]['name'];
        $info = new SplFileInfo($new_name);
        $new_name = rand().'_user_hourly_rate'.$emp_id.'.'.$info->getExtension();
        $config['file_name'] = $new_name;
        // $upload_path = $_SERVER["SCRIPT_FILENAME"].'/uploads/UserHourlyRate';
        // if(!is_dir($upload_path)){
        //     mkdir($upload_path,0777,true);
        // }
        $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]) . '/uploads/UserHourlyRate/';
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

}