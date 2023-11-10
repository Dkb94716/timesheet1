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
        $data['project_detail'] = $this->project_model->listProject();
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
            'description' => $data['description']
            
           
               );
         $data['startDate']=$start_date;
         $data['endDate']=$end_date;
        $this->session->set_userdata($newdata);
      $data['employee_detail'] = $this->report_model->listTimesheetReport($data);  
       
        
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
        $data['startDate']=$this->session->userdata('startDate');
        $data['endDate']=$this->session->userdata('endDate');
        $data['billable']=$this->session->userdata('billable');
        $data['description']=$this->session->userdata('description');
        $start_date=(!empty($startDate))? date('Y-m-d', strtotime($startDate)):'';
        $end_date=(!empty($endDate))? date('Y-m-d', strtotime($endDate)):'';
        $data['startDate']=$start_date;
        $data['endDate']=$end_date;
        $description = $data['description'];
        $employee_detail = $this->report_model->listTimesheetReport($data);  
       
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
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Time/Units');
        $col ++;
         $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Billable');
        $col ++;
       $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Date');
        $col ++; 		
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Start Date');
        $col ++; 
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'End Date');
        $col ++; 
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Hours');
        $col ++;
        $row = 2;
        $counter = 0;
        $companyName = '';
        $oldVal = '';
        $to = 0;           
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

                } else {

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
                         $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
                         $col++;
                        if ($description == 1) {
                            $col++;
                        }
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, @$total_units);
                        $col++;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
                        $col++;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
                        $col++;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
                        $col++;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, @$total_hours_data);
                        $col++;

                        $row++; // next Rows 
                        $col = 0;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $tempVal);
                        //$col++;
                        $row++;
                    }
                    $total_units = 0;
                    $to = 0;
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
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $emp_detail->time_units);
        $col ++;
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $emp_detail->billable);
         $col ++;
		 $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, date('d F Y',  strtotime($emp_detail->timesheet_date)));
        $col ++;
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $emp_detail->start_time);
         $col ++;
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $emp_detail->end_time);
         $col ++;
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $total_hours1);
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
                         $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
                         $col++;
                        
                        if ($description == 1) {
                            $col++;
                        }
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, @$total_units);
                        $col++;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
                        $col++;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
                        $col++;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
                        $col++;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, @$total_hours_data);
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
    
  
}
