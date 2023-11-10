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
        $client_name = $this->input->post('client_name');
        $project_name = $this->input->post('project_name');
        $task_name = $this->input->post('task_name');
        $activity_name = $this->input->post('activity_name');
        $subactivity_name = $this->input->post('subactivity_name');
        $billable = $this->input->post('billable');
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
            'client_name' => $client_name,
            'project_name' => $project_name,
            'task_name' => $task_name,
            'time_status' => $time_status_str,
            'activity_name' => $activity_name,
            'subactivity_name' => $subactivity_name,
            'billable' => $billable,
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
            echo json_encode($single_time_detail);
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
        $client_name = $this->input->post('edit_client_name');
        $project_name = $this->input->post('edit_project_name');
        $task_name = $this->input->post('edit_task_name');
        $activity_name = $this->input->post('edit_activity_name');
        $subactivity_name = $this->input->post('edit_subactivity_name');
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
            'client_name' => $client_name,
            'project_name' => $project_name,
            'task_name' => $task_name,
            'time_status' => $time_status_str,
            'activity_name' => $activity_name,
            'subactivity_name' => $subactivity_name,
            'billable' => $billable,
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
    
    function view_time_list($emp_id=NULL,$start_date=NULL,$end_date=NULL) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);

        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        
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
        $data['user_detail'] = $this->userdetails_model->listUser($emp_id);
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
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


}
