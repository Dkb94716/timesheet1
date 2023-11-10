<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  Project Name : Timesheet
  Developed In: Clavis Technologies Pvt Ltd.
  Modification History
  Create Date           Version         Author			Description                                Last modified
  __________	___________	_______________   ________________________________________  ________________________________________
 24-03 -2015            1.0             Dablu                 Controller for Report                        24-03-2015
 */

class Report extends CI_Controller {

    function __construct() {
        // Construct our parent class
        parent::__construct();
       // $this->load->library('pdf');
        $this->load->model('company_model');
        $this->load->model('client_model');
        $this->load->model('project_model');
        $this->load->model('activity_model'); 
        $this->load->model('subactivity_model');
        $this->load->model('team_model');
        $this->load->model('userdetails_model');
        $this->load->model('task_model');
        $this->load->model('report_model');
        $this->load->helper('string');
        $this->load->helper('common');
        $this->load->library('session');
    
        
    }


        function timesheet_report() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['company_detail'] = $this->company_model->listCompany();
        $data['client_detail'] = $this->client_model->listClient();

        // $data['project_detail'] = $this->project_model->listProject();
        $data['project_detail'] = $this->project_model->listProject_report();

        $data['activity_detail'] = $this->activity_model->listActivity();
        $data['subactivity_detail'] = $this->subactivity_model->listSubactivity();
        $data['user_detail'] = $this->userdetails_model->listUserdetails();
        $data['team_details'] = $this->team_model->detailTeam();
        $data['task_detail'] = $this->task_model->taskDetail();
        $data['user_logo'] = $this->report_model->logoDetail($data['userPrimeryId']);
        $data['page_url'] = 'report_content';
        $this->load->view('dashboard_page', $data);
    }
    
    
    
    function submit_report() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        // echo "ddd"; die;
        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['user_logo'] = $this->report_model->logoDetail($data['userPrimeryId']);
        $data['isBillable'] = $this->input->post('isBillable');
        $data['companyId'] = $this->input->post('companyId');
        $data['clientId'] = $this->input->post('clientId');
        $data['projectId'] = $this->input->post('projectId');
        $data['employeeId'] = $this->input->post('employeeId');
        $data['teamId'] = $this->input->post('teamId');
        $data['activityId'] = $this->input->post('activityId');
        $data['taskId'] = $this->input->post('taskId');
        $data['teamId'] = $this->input->post('teamId');
        $data['viewBy'] = $this->input->post('viewBy');
        $data['startDate']=$this->input->post('startDate');
        $data['endDate']=$this->input->post('endDate');
        $data['billable']=$this->input->post('billable');
        $data['description']=$this->input->post('description');
        $start_date=(!empty($data['startDate']))? date('Y-m-d', strtotime($data['startDate'])):'';
        $end_date=(!empty($data['endDate']))? date('Y-m-d', strtotime($data['endDate'])):'';
        $newdata = array(
                   'viewBy'  => $data['viewBy'],
                   'companyId' => $data['companyId'],
                   'clientId' => $data['clientId'],
                   'projectId' => $data['projectId'],
            'teamId' => $data['teamId'],
            'startDate' => $start_date,
            'endDate' => $end_date,
            'billable' => $data['billable'],
            'description' => $data['description'],
             'employeeId'=> $data['employeeId']
        );
        $data['startDate']=$start_date;
        $data['endDate']=$end_date;
        $data1=$data;
        $this->session->set_userdata($newdata);
        $data['employee_detail'] = $this->report_model->listTimesheetReport($data);
        $data['employee_hour_rate'] = $this->report_model->list_hour_rate($data1); 
        $this->load->view('report_data_content', $data); 
    }
    
    // Added by Satish - add this method to common helper
    function convertToHoursMins($time, $format = "%'.02d:%'.02d") {
        settype($time, 'integer');
        if ($time < 1) {
            return;
        }
        $hours = floor($time / 60);
        $minutes = ($time % 60);
        return sprintf($format, $hours, $minutes);
    }

    // end of method
    function download_report_excel() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        // $viewBy = $this->session->userdata('viewBy');
        $viewBy = $this->session->userdata('viewBy');   
        //$viewBy='company';
        $data['viewBy'] = $this->session->userdata('viewBy');
        $data['isBillable']= $this->session->userdata('isBillable');
        $data['companyId'] = $this->session->userdata('companyId');
        $data['clientId'] = $this->session->userdata('clientId');
        $data['projectId'] = $this->session->userdata('projectId');
        $data['employeeId'] = $this->session->userdata('employeeId');
        $data['teamId'] = $this->session->userdata('teamId');
        $data['activityId']=$this->session->userdata('activityId');
        $data['taskId']= $this->session->userdata('taskId');
        $data['teamId'] = $this->session->userdata('teamId');
        $startDate=$this->session->userdata('startDate');
        $endDate=$this->session->userdata('endDate');
        $data['billable']=$this->session->userdata('billable');
        $data['description']=$this->session->userdata('description');
        $start_date=(!empty($startDate))? date('Y-m-d', strtotime($startDate)):'';
        $end_date=(!empty($endDate))? date('Y-m-d', strtotime($endDate)):'';
        $data['startDate']=$start_date;
        $data['endDate']=$end_date;
        $description = $data['description'];
        $employee_detail = $this->report_model->listTimesheetReport($data);  

        $common = new Common();
        //load our new PHPExcel library
        $this->load->library('excel');
        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Timesheet Report');
        //set cell A1 content with some text
        $col = 0;
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Company');
        $col ++;
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Client');
        $col ++;
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Project');
        $col ++;
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Team');
        $col ++;
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'User');
        $col ++;
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Activity');
        $col ++;
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Disbursement');
        $col ++; 
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Descriptions');
        $col ++; 
        // $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Time/Units');
        // $col ++;
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Billable');
        $col ++;
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Date');
        $col ++; 		
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Start Date');
        $col ++; 
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'End Date');
        $col ++; 
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Time (HH:mm)');
        $col ++;
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Amount');
        $col ++;
        $row = 2;
        $counter = 0;
        $companyName = '';
        $oldVal = '';
        $to = 0;
        $toMinute = 0;     
        $totalFinaMurVal = 0;            
        if(!empty($employee_detail)){
            foreach($employee_detail as $emp_detail){                                        
                $tempVal = getViewByVal($viewBy, $emp_detail);
                if ($oldVal == "" && $counter ==1) {
                    $oldVal = $tempVal;
                    // $row++;
                    $col = 0;
                    $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $tempVal);
                    $row++;
                }else if($oldVal == $tempVal){

                } 
                else {
                    if ($tempVal != '') {
                        // $row++;
                        $oldVal = $tempVal;
                        $col = 0;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, 'Total');
                        $col++;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
                        $col++;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
                        $col++;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
                        $col++;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
                        $col++;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
                        $col++;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
                        $col++;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
                        $col++;
                        if ($description == 1) {
                            $col++;
                        }
                        // $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, @$total_units);
                        // $col++;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
                        $col++;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
                        $col++;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
                        $col++;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
                        $col++;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, @$total_hours_data);
                        $col++;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, number_format($totalFinaMurVal, 2));
                        $row++; // next Rows 
                        $col = 0;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $tempVal);
                        //$col++;
                        $row++;
                    }
                    $total_units = 0;
                    $to = 0;
                    $toMinute = 0;
                    $totalFinaMurVal = 0;
                }
                $t2 = $emp_detail->end_time;
                $t1 = $emp_detail->start_time;
                $e_seconds = strtotime($t2);
                $s_seconds = strtotime($t1);
                $end_time = $t2;
                $seconds = strtotime($end_time);
                $st_time = $t1;
                $seconds = strtotime($st_time);
                $total = $e_seconds - $s_seconds;
                $minut = $total / 60;
                $total_hours1 = $this->convertToHoursMins($minut);//gmdate("H:i", ($minut * 60));
                // echo 'to'.$to; 
                @$to = $to + $total;
                $minut = $to / 60;
                $total_hours_data = $this->convertToHoursMins($minut);//gmdate("H:i", ($minut * 60));

                //----------- GET MUR RATE FROM HELPER ACCORDING TO DATE START --------
                $getMurRateHelper = $common->userRoleRateMur($emp_detail->id, $emp_detail->timesheet_date);

                if($getMurRateHelper){
                    $rate_mur = $getMurRateHelper->hourly_rate;
                } else{
                    $rate_mur = 0;
                }
        
                //----------- GET MUR RATE FROM HELPER ACCORDING TO DATE END --------
                $forMinuteMurVal = explode(':',$total_hours1);
                $forMinuteMurValCalculate = $forMinuteMurVal[1]*0.0167;
                $HourMurVal = $forMinuteMurVal[0]+$forMinuteMurValCalculate;
                $FinalMurVal = $HourMurVal*$rate_mur;
                $totalFinaMurVal = $totalFinaMurVal + $FinalMurVal;

                if($emp_detail->billable == 0){
                    $billable = "No";
                }else{
                    $billable = "Yes";
                }

                $col = 0;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $emp_detail->company_name);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $emp_detail->client_name);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $emp_detail->project_name);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $emp_detail->team_name);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $emp_detail->empName .$emp_detail->surname);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $emp_detail-> activity_name);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $emp_detail->disbursement);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $emp_detail->comments);
                $col ++;
                // $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $emp_detail->time_units);
                // $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $emp_detail->billable);
                $col ++;
	            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, date('d F Y',  strtotime($emp_detail->timesheet_date)));
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $emp_detail->start_time);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $emp_detail->end_time);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $total_hours1);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, number_format($FinalMurVal, 2));
                $row++;
                $total_units=@$total_units+$emp_detail->time_units;
            }
            //$oldVal = $tempVal;
            //  $row++;
            $col = 0;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, 'Total');
            $col++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
            $col++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
            $col++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
            $col++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
            $col++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
            $col++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
            $col++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
            $col++;  
            if ($description == 1) {
                $col++;
            }
            // $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, @$total_units);
            // $col++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
            $col++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
            $col++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
            $col++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
            $col++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, @$total_hours_data);
            $col++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, number_format($totalFinaMurVal, 2));
            $col++;
        }
        $filename='Timesheet Report.xls'; //save our workbook as this file name    
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
    }

    function project_wise_report() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        if($all_userdata['usrRoleld'] == 1 ){
            $data['client_detail'] = $this->client_model->listClient();
        } else{
            if(!empty($all_userdata['userTmId'])){
                $data['client_detail'] = $this->client_model->listClientNew($all_userdata['userUname']);
            }
            else{
                $data['client_detail'] = false;   
            }
        }    
        $data['user_logo'] = $this->report_model->logoDetail($data['userPrimeryId']);
        $data['page_url'] = 'project_wise_report_content';
        $this->load->view('dashboard_page', $data);
    }
    
    function submit_project_wise_report() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['user_logo'] = $this->report_model->logoDetail($data['userPrimeryId']);
        $data['clientId'] = $this->input->post('clientId');
        $data['projectId'] = $this->input->post('projectId');
        $data['startDate']=$this->input->post('startDate');
        $data['endDate']=$this->input->post('endDate');

        $start_date=(!empty($data['startDate']))? date('Y-m-d', strtotime($data['startDate'])):'';
        $end_date=(!empty($data['endDate']))? date('Y-m-d', strtotime($data['endDate'])):'';
        
        $this->db->select('project_id,project_name,client_name');
        $this->db->from('project');
        $this->db->where('project_name', $data['projectId']);
        $this->db->where('client_name',$data['clientId']);
        $pro_query = $this->db->get();
        $pro_result = $pro_query->result();

        $project_id = $pro_result[0]->project_id;
        if($project_id){
            $this->db->select('*');
            $this->db->from('task');
            $this->db->where('project_id', $project_id);
            $task_query = $this->db->get();
            $task_result = $task_query->result_array();
            $task_detail = [];
            foreach ($task_result as $key => $value) {
                $task_detail[$value['task_name']] = $value;
            } 
        }
        if(!empty($data)){
            $requet_data['clientId'] = $data['clientId'];
            $requet_data['projectId'] = $data['projectId'];
            $requet_data['startDate'] = $start_date;
            $requet_data['endDate'] = $end_date;
            $data['report_detail'] = $this->report_model->listProjectWiseReport($requet_data);
            // echo $this->db->last_query();
            // echo '<pre>';
            // print_r($data['report_detail']); die;
            $final_report_data = [];
            if(!empty($data['report_detail'])){
                foreach ($task_detail as $key => $value) {
                foreach ($data['report_detail'] as $key1 => $value1) {
                    if(in_array($key,$value1)){
                        if(array_key_exists($key,$final_report_data)){
                            $final_report_data[$key]['project_name'] = $value1['project_name'];   
                            $final_report_data[$key]['task_name'] = $value1['task_name'];   
                            $final_report_data[$key]['empName'] = $final_report_data[$key]['empName'].', '.'<a href="#show-report" onclick="show_report(event, '.$value1['emp_id'].', '.$value['task_id'].')" data-toggle="modal" class="td-btn-marg-right">'.$value1['empName'].'</a>';   
                            $final_report_data[$key]['totalTaskHors'] = ($final_report_data[$key]['totalTaskHors']+$value1['totalTaskHors']);   
                            $final_report_data[$key]['totalTaskMins'] = ($final_report_data[$key]['totalTaskMins']+$value1['totalTaskMins']);   
                        } else{
                            $final_report_data[$key]['project_id'] = $value['project_id'];   
                            $final_report_data[$key]['project_name'] = $value1['project_name'];   
                            $final_report_data[$key]['task_name'] = $value1['task_name'];
                            $final_report_data[$key]['activity_name'] = $value1['activity_name'];
                            $final_report_data[$key]['subactivity_name'] = $value1['subactivity_name'];
                            $final_report_data[$key]['empName'] = '<a href="#show-report" onclick="show_report(event, '.$value1['emp_id'].', '.$value['task_id'].')" data-toggle="modal" class="td-btn-marg-right">'.$value1['empName'].'</a>';
                            $final_report_data[$key]['totalTaskHors'] = $value1['totalTaskHors'];
                            $final_report_data[$key]['totalTaskMins'] = $value1['totalTaskMins'];
                            $final_report_data[$key]['actual_hours'] = $value['actual_hours'];
                            $final_report_data[$key]['timesheet_date'] = $value1['timesheet_date'];
                        }
                    }
                }
                }
                $data['final_report_detail'] = $final_report_data;
                $this->load->view('project_wise_report_data_content', $data);
            }    
        }
    }

    function task_wise_report() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['user_logo'] = $this->report_model->logoDetail($data['userPrimeryId']);

        // $project_id = $this->input->post('project_id');
        $emp_id = $this->input->post('emp_id');
        $task_id = $this->input->post('task_id');
        

        if($task_id){
            $this->db->select('*');
            $this->db->from('task');
            $this->db->where('task_id', $task_id);
            $task_query = $this->db->get();
            $task_result = $task_query->result_array();
        }
        if($task_result){
            $this->db->select('project_name,client_name');
            $this->db->from('project');
            $this->db->where('project_id', $task_result[0]['project_id']);
            $pro_query = $this->db->get();
            $pro_result = $pro_query->result();
            $project_name = $pro_result[0]->project_name;
            $client_name = $pro_result[0]->client_name;


            $req_data['emp_id'] = $emp_id;
            $req_data['client_name'] = $client_name;
            $req_data['project_name'] = $project_name;
            $req_data['task_name'] = $task_result[0]['task_name'];
            // $req_data['activity_name'] = $task_result[0]['activity_name'];
            // $req_data['subactivity_name'] = $task_result[0]['subactivity_name'];
            $report_detail = $this->report_model->getTaskWisedata($req_data);

            // echo $this->db->last_query();
            // print_r($report_detail); die;
            if (!empty($report_detail)) { 
                $msg ='';
                $counter = 1;
                foreach ($report_detail as $value) {
                    $msg .= '<tr>';
                    $hours = $value['time_units'];
                    $time_minutes = $value['time_minutes'];
                    $total_minutes = ( ($hours*60)+$time_minutes );
                    $total_hours_data = $this->convertToHoursMins($total_minutes);
                    $msg .='<td>'. $counter .'</td>';
                    $msg .='<td>'. date('d F Y',  strtotime($value['timesheet_date'])) .'</td>';
                    $msg .='<td>'. $task_result[0]['actual_hours'] .'</td>';
                    $msg .='<td>'. $total_hours_data .'</td>';
                    if($value['reason_to_exceed_time'] !=""){
                        $msg .='<td>'. $value['reason_to_exceed_time'] .'</td>';
                    } else{
                        $msg .='<td>N/A</td>';
                    }
                    $msg .= '</tr>';
                    $counter++;
                }
                echo $msg;
            }
            
            
        }
    }

    public function timesheet_report_pending() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
            $all_userdata = $this->session->userdata('logged_in'); 
            $data = array();
            $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
            $getUserPrivileges = $this->common_model->getUserPrivileges($data);
            $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
            $data['pending_report'] = $this->report_model->pending_report();
            $data['page_url'] = 'pending_report';
            $this->load->view('dashboard_page', $data);
    }
    function approve_pending_report(){ 
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $remarks = $this->input->post('remarks');
        $this->db->set('approver_remarks', $remarks)->set('action_by', $this->session->userdata('logged_in')['userUname'])
                ->set('status', $status)->set('action_date', date('Y-m-d H:i:s'))
                ->where('timesheet_id', $id)->update('timesheet_pending');
        if($status=='2'){
        $this->db->select('timesheet_id, emp_id, timesheet_date, start_time, end_time, client_name, activity_name, subactivity_name, task_name, billable, time_units, time_minutes, comments, time_status, reason_to_reject, reason_to_exceed_time, project_name, created_by, updated_by, created, updated, disbursement')->from('timesheet_pending')->where('timesheet_id', $id);
        $data = $this->db->get()->result_array();  //echo "<pre>";print_r($claims); echo "</pre>"; die;
        $this->db->insert_batch('timesheet', $data);
        $this->session->set_flashdata('flash_message', "Selected TimeSheet has been approved successfully.");
        }else{
        $this->db->select('emp_id, timesheet_date')->from('timesheet_pending')->where('timesheet_id', $id);
        $data1 = $this->db->get()->result_array();
        $this->db->select('empName, emailId')->from('employee')->where('id', $data1[0]['emp_id']);
        $data2 = $this->db->get()->result_array();
        $MailSubject = 'Timesheet Rejection for '.$data1[0]['timesheet_date'];
        $email_message = PENDING_TIMESHEET_REJECTED;
        $MailTemplateContents = str_replace('EMP_NAME', $data2[0]['empName'], $email_message);
        $MailTemplateContents = str_replace('DATE', $data1[0]['timesheet_date'], $MailTemplateContents);
        $common = new Common();
        $Status = $common->sendmail($data2[0]['emailId'], $MailSubject, $MailTemplateContents);
        $this->session->set_flashdata('fail_flash_message', "Selected TimeSheet has been rejected successfully.");
        }
    }

    function project_expense() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        
        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['client_detail']  = $this->client_model->listClient(NULL,$group_by=1);
        $data['project_detail'] = $this->project_model->listProject();
        $data['user_logo'] = $this->report_model->logoDetail($data['userPrimeryId']);
        // echo "<pre>";print_r($data['client_detail']); die;
        // echo "<pre>"; print_r($data['project_detail']); die;
        
        $data['page_url'] = 'project_expense';
        $this->load->view('dashboard_page', $data);
    }

    function submit_project_expense_report() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['user_logo'] = $this->report_model->logoDetail($data['userPrimeryId']);
        $data['clientId'] = $this->input->post('clientId');
        $data['projectId'] = $this->input->post('projectId');
        
        $this->db->select('project_id,project_name,client_name,project_total_estimate_amount');
        $this->db->from('project');
        $this->db->where('project_name', $data['projectId']);
        $this->db->where('client_name',$data['clientId']);
        $pro_query = $this->db->get();
        $pro_result = $pro_query->result();
        $project_id = $pro_result[0]->project_id;
        if(!empty($data)){
            $data['employee_detail'] = $this->report_model->listTimesheetProjectReport($data);
            if(!empty($data['employee_detail'])){
                foreach ($data['employee_detail'] as $key => $value) {
                    $monthDate[] = $value->timesheet_date;
                }
                $getMonthYear = [];
                foreach ($monthDate as $key => $value) {
                    $d = date_parse_from_format("Y-m-d", $value);
                    $year = $d["year"]; 
                    $month = $d["month"]; 
                    if(in_array($month,$getMonthYear)){
                        continue;
                    } else{
                        $getMonthYear[$month] = $year;
                    }
                }
                $monthYearWiseData = [];
                foreach($getMonthYear as $key => $value){
                    foreach ($data['employee_detail'] as $key1 => $value1) {
                        $d = date_parse_from_format("Y-m-d", $value1->timesheet_date);
                        $year = $d["year"]; 
                        $month = $d["month"];
                        if($key == $month && $value == $year){
                            $monthYearWiseData[$value][$key][] = $value1;
                        } else{
                            continue;
                        }
                    } 
                }
                $projectExpenseData = [];
                foreach ($monthYearWiseData as $key => $data) {
                    $total_expense = 0;
                    $total_time_units = 0;
                    $total_time_minutes = 0;
                    foreach ($data as $key1 => $value1) {
                        foreach ($value1 as $value2) {
                            $req_data['year'] = $key;
                            $req_data['month'] = $key1;
                            $req_data['user_id'] = $value2->empId;
                            $hour_rate_data = $this->report_model->hour_rate_by_month($req_data);
                            if(empty($hour_rate_data)){ 
                                continue;
                            } else{
                                $total_time = $value2->time_units.'.'.$value2->time_minutes;
                                $expense = ($hour_rate_data[0]->hourly_rate * $total_time);
                                $total_expense = ($total_expense+$expense);
                            }
                            $total_time_units = ($total_time_units+$value2->time_units);
                            $total_time_minutes = ($total_time_minutes+$value2->time_minutes);
                        } 
                        if($total_expense > 0){
                            $projectExpenseData[$key][$key1]['year'] = $key;
                            $projectExpenseData[$key][$key1]['month'] = $key1;
                            $projectExpenseData[$key][$key1]['total_time_units'] = $total_time_units;
                            $projectExpenseData[$key][$key1]['total_time_minutes'] = $total_time_minutes;
                            $projectExpenseData[$key][$key1]['total_expense'] = $total_expense;
                        }    
                    }
                }
                $projectDevelopmentExpense = [];
                foreach ($projectExpenseData as $key => $value) {
                    $monthWiseDevelopmentCost = 0;
                    foreach ($value as $data) {
                        // print_r($data['total_expense']);
                        $projectDevelopmentExpense[] = $data;
                        $monthWiseDevelopmentCost = ($monthWiseDevelopmentCost+$data['total_expense']);
                    }
                }
                $data['projectDevelopmentExpense'] = $projectDevelopmentExpense;
                $data['monthWiseDevelopmentCost'] = $monthWiseDevelopmentCost;
                $data['project_total_estimate_amount'] = $pro_result[0]->project_total_estimate_amount;
                $this->db->select('*');
                $this->db->from('project_wise_expense');
                $this->db->where('project_id', $project_id);
                $expense_query = $this->db->get();
                $expense_result = $expense_query->result();
                $data['project_expense'] = $expense_result;
                $data['expense_list_detail'] = $this->report_model->listExpense();
                $this->load->view('project_expense_data_content', $data);
            }    
        }
    }

    function add_project_wise_expense() {

        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        
        $project_name = $this->input->post('project_id');
        $expense_type = $this->input->post('expense_type');
        $expense_amount = $this->input->post('expense_amount');
        $expense_date = strtotime($this->input->post('expense_date'));
        $expense_date = date('Y-m-d', $expense_date);
        $remark = $this->input->post('remark');
        
        $this->db->select('project_id');
        $this->db->from('project');
        $this->db->where('project_name', $project_name);
        $pro_query = $this->db->get();
        $pro_result = $pro_query->result();
        $project_id = $pro_result[0]->project_id;
        $data = array(
            'project_id' => trim($project_id),
            'expense_type'=>$expense_type,
            'expense_amount'=>$expense_amount,
            'expense_date'=>$expense_date,
            'remark'=> $remark,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d')
         );

        if($this->report_model->insertProjectWiseExpense($data)){
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Added Project Wise Expense',
                'message' => 'Project Wise Expense has been added.',
                'created' => date('Y-m-d h:i:s')
             );

            $this->common_model->addToHistory($history);

            echo '{ "status" : "SUCCESS" , "message" : "Project Wise Expense added successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "Some error occurred. Please try after some time." }';
        }
        
    }

    function add_expense() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        
        $expense_name = $this->input->post('expense_name');
        $data = array(
            'expense_name' => trim($expense_name),
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d')
        );
        if($this->report_model->insertExpense($data)){
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Added Project Wise Expense',
                'message' => 'Project Wise Expense has been added.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Expense added successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "Expense name already exist. Please try with diffrent name." }';
        }
    }
    
    function get_expense_list() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $expense_list = $this->report_model->listExpense();
        if (count($expense_list) > 0) {
            $msg = '';
            foreach ($expense_list as $key => $value) {
                $msg .= '<option value="'.$value->expense_name.'"/>';
            }
            echo $msg; die;
        }
        
    }
}
