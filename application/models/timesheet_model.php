<?php

class Timesheet_model extends CI_Model {
    /*
      Developed In: Clavis Technologies Pvt Ltd.
      Modification History
      Create Date   Author			Description
      __________  _______________  ________________________________________
      13-03-2015     Ajay                   Model for Time
     */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function insertTime($data) {
        if ($this->checkTime($data)) {
            $this->db->insert('timesheet', $data);
            $insert_id = $this->db->insert_id();
            
            return $insert_id;
            } else {

           return false;
       }
        
    }

    function insertPendingTime($data) {
        if ($this->checkTime($data)) {
            $this->db->insert('timesheet_pending', $data);
            $insert_id = $this->db->insert_id();
            
            return $insert_id;
            } else {

           return false;
       }
        
    }

    /** function to update records */
    function updateTime($data) {
        if ($this->checkTime($data)) {
            $this->db->where('timesheet_id', $data['timesheet_id']);
            $this->db->update('timesheet', $data);
//            if($reject_flag){
//            $timesheet_date=$data['timesheet_date'];
//        $timesheet_date_week=date("W",strtotime($timesheet_date));
//        $year=date("Y",strtotime($timesheet_date));
//        $currentweek = date("W");
//        $week_arr = $this->getWeek($timesheet_date_week,$year);
//        $start_date = $week_arr['start'];
//        $end_date = $week_arr['end'];
//        $status = array('time_status' => 'Pending');
//             $this->db->where("(timesheet_date BETWEEN '" . $start_date. "' and  '" . $end_date . "')");   
//             $this->db->where('emp_id', $data['emp_id']);
//             $this->db->update('timesheet', $status);
//            }
            return $data['timesheet_id'];
        } else {

            return false;
        }
    }
      /** function to update records */
    function updateTimeStatus($timesheet_id=NULL,$data,$start_date=NULL,$end_date=NULL,$emp_id=NULL,$managerId=NULL,$empId=NULL) {
       // if ($this->checkTime($data)) {
        if($this->checkTime2($start_date,$end_date,$emp_id,$data['time_status'])){
            return false;
        }
            if(!empty($timesheet_id)){
            $this->db->where_in('timesheet_id', $timesheet_id);
            }
            else{
             $this->db->where("(timesheet_date BETWEEN '" . $start_date. "' and  '" . $end_date . "')");   
             $this->db->where('emp_id', $emp_id);
            }
            $this->db->update('timesheet', $data);
            if($data['time_status']=='Submitted'){
            $notification = array();
            $notification = array(
            'emp_id' => $managerId,
            'title' => 'Timesheet Submitted',
            'message' => $empId.' has Submitted the Timesheet for the week of '.$start_date,
            'time_of_update' => date('Y-m-d h:i:s')
            );
            $this->db->insert('notification', $notification);
            }
            if($data['time_status']=='Approved'){
            
            $notification = array(
            'emp_id' => $empId,
            'title' => 'Timesheet Submitted',
            'message' => ' The timesheet submitted by you for the week of '.$start_date.' has been approved by your manager. ',
            'time_of_update' => date('Y-m-d h:i:s')
            );
            $this->db->insert('notification', $notification);
            }
            if($data['time_status']=='Rejected'){
            
            $notification = array(
            'emp_id' => $empId,
            'title' => 'Timesheet Rejected',
            'message' => ' The timesheet submitted by you for the week of '.$start_date.' has been rejected by your manager. ',
            'time_of_update' => date('Y-m-d h:i:s')
            );
            $this->db->insert('notification', $notification);
            }
            //echo $this->db->last_query();die;
            return true;
        //} else {

          //  return false;
       // }
    }

    function deleteTime($timesheet_id) {

        $this->db->where('timesheet_id', $timesheet_id);
        $this->db->delete('timesheet');

        return true;
    }
    
//    function getWeek($week, $year) {
//  $dto = new DateTime();
//  $result['start'] = $dto->setISODate($year, $week, 1)->format('Y-m-d');
//  $result['end'] = $dto->setISODate($year, $week, 7)->format('Y-m-d');
//  return $result;
//}

    function checkTime($data) {
        $timesheet_date=$data['timesheet_date'];
//        $timesheet_date_week=date("W",strtotime($timesheet_date));
//        $year=date("Y",strtotime($timesheet_date));
//        $currentweek = date("W");
//        $week_arr = $this->getWeek($timesheet_date_week,$year);
//        $start_date = $week_arr['start'];
//        $end_date = $week_arr['end'];
        $emp_id=$data['emp_id'];
        $query = $this->db->query("SELECT time_status FROM timesheet where (timesheet_date between DATE_ADD('".$timesheet_date."', INTERVAL(1-DAYOFWEEK('".$timesheet_date."')) DAY) and DATE_ADD('".$timesheet_date."', INTERVAL(7-DAYOFWEEK('".$timesheet_date."')) DAY) ) and emp_id=$emp_id");
        //echo $this->db->last_query();die;
        $result = $query->result();   

        if (@$result[0]->time_status=='Approved'){
            return false;
        } else {
            return true;
        }
    }
    
    function checkTime2($start_date,$end_date,$emp_id,$action) {
        
        $query = $this->db->query("SELECT time_status FROM timesheet where (timesheet_date between '".$start_date."' and '".$end_date."') and emp_id=$emp_id");
        //echo $this->db->last_query();die;
        $result = $query->result();   
        if($action=='Submitted' ){
            if (($result[0]->time_status=='Pending') || ($result[0]->time_status=='Rejected') ){
            return false;
        } else {
            return true;
        }
            
        }
        elseif(($action=='Approved') || ($action=='Rejected')){
            if ($result[0]->time_status=='Submitted'){
            return false;
        } else {
            return true;
        }
        }
        
    }
     function listTime($week_arr = NULL,$emp_id=NULL,$display_all=NULL,$overdue=NULL) {
        
         if($week_arr){
         
          if($display_all){
            $query = $this->db->query("SELECT employee.managerId,employee.empId,employee.empName,employee.emailId,timesheet_id,timesheet.emp_id, timesheet_date, timesheet.emp_id, employee.empName, sum( if( timesheet.billable =1, time_units, 0 ) ) AS billable_time, sum( if( timesheet.billable =0, time_units, 0 ) ) AS unbillable_time, time_status, CONCAT(DATE_ADD(timesheet_date, INTERVAL(1-DAYOFWEEK(timesheet_date)) DAY),'/',DATE_ADD(timesheet_date, INTERVAL(7-DAYOFWEEK(timesheet_date)) DAY)) AS week,timesheet.created,timesheet.updated
FROM timesheet join employee on employee.id = timesheet.emp_id where (timesheet.time_status IN ('Submitted')) and timesheet_date between DATE_ADD(timesheet_date, INTERVAL(1-DAYOFWEEK(timesheet_date)) DAY) and DATE_ADD(timesheet_date, INTERVAL(7-DAYOFWEEK(timesheet_date)) DAY) 
GROUP BY timesheet.emp_id, WEEK(DATE_ADD(timesheet_date, INTERVAL(1-DAYOFWEEK(timesheet_date)) DAY))"); 
         }
         else{
            $query = $this->db->query("SELECT employee.managerId,employee.empId,employee.empName,employee.emailId,timesheet_id,timesheet.emp_id, timesheet_date, timesheet.emp_id, employee.empName, sum( if( timesheet.billable =1, time_units, 0 ) ) AS billable_time, sum( if( timesheet.billable =0, time_units, 0 ) ) AS unbillable_time, time_status, CONCAT(DATE_ADD(timesheet_date, INTERVAL(1-DAYOFWEEK(timesheet_date)) DAY),'/',DATE_ADD(timesheet_date, INTERVAL(7-DAYOFWEEK(timesheet_date)) DAY)) AS week,timesheet.created,timesheet.updated
FROM timesheet join employee on employee.id = timesheet.emp_id where ((employee.managerId=$emp_id and timesheet.time_status IN ('Submitted'))) and timesheet_date between DATE_ADD(timesheet_date, INTERVAL(1-DAYOFWEEK(timesheet_date)) DAY) and DATE_ADD(timesheet_date, INTERVAL(7-DAYOFWEEK(timesheet_date)) DAY) 
GROUP BY timesheet.emp_id, WEEK(DATE_ADD(timesheet_date, INTERVAL(1-DAYOFWEEK(timesheet_date)) DAY))");  
         }
         }
         elseif($overdue){
            $query = $this->db->query("SELECT employee.managerId,employee.empId,employee.empName,employee.emailId,timesheet_id,timesheet.emp_id, timesheet_date, timesheet.emp_id, employee.empName, sum( if( timesheet.billable =1, time_units, 0 ) ) AS billable_time, sum( if( timesheet.billable =0, time_units, 0 ) ) AS unbillable_time, time_status, CONCAT(DATE_ADD(timesheet_date, INTERVAL(1-DAYOFWEEK(timesheet_date)) DAY),'/',DATE_ADD(timesheet_date, INTERVAL(7-DAYOFWEEK(timesheet_date)) DAY)) AS week,timesheet.created,timesheet.updated
FROM timesheet join employee on employee.id = timesheet.emp_id where DATE_ADD(timesheet_date, INTERVAL(7-DAYOFWEEK(timesheet_date)) DAY)<DATE_ADD(now(), INTERVAL(1-DAYOFWEEK(now())) DAY) and ((employee.id=$emp_id and timesheet.time_status IN ('Pending','Rejected'))) and timesheet_date between DATE_ADD(timesheet_date, INTERVAL(1-DAYOFWEEK(timesheet_date)) DAY) and DATE_ADD(timesheet_date, INTERVAL(7-DAYOFWEEK(timesheet_date)) DAY) 
GROUP BY timesheet.emp_id, WEEK(DATE_ADD(timesheet_date, INTERVAL(1-DAYOFWEEK(timesheet_date)) DAY))");
         }
         elseif($display_all){
            $query = $this->db->query("SELECT employee.managerId,employee.empId,employee.empName,employee.emailId,timesheet_id,timesheet.emp_id, timesheet_date, timesheet.emp_id, employee.empName, sum( if( timesheet.billable =1, time_units, 0 ) ) AS billable_time, sum( if( timesheet.billable =0, time_units, 0 ) ) AS unbillable_time, time_status, CONCAT(DATE_ADD(timesheet_date, INTERVAL(1-DAYOFWEEK(timesheet_date)) DAY),'/',DATE_ADD(timesheet_date, INTERVAL(7-DAYOFWEEK(timesheet_date)) DAY)) AS week,timesheet.created,timesheet.updated
FROM timesheet join employee on employee.id = timesheet.emp_id where (timesheet.time_status IN ('Submitted','Approved') OR employee.id=$emp_id) and timesheet_date between DATE_ADD(timesheet_date, INTERVAL(1-DAYOFWEEK(timesheet_date)) DAY) and DATE_ADD(timesheet_date, INTERVAL(7-DAYOFWEEK(timesheet_date)) DAY) 
GROUP BY timesheet.emp_id, WEEK(DATE_ADD(timesheet_date, INTERVAL(1-DAYOFWEEK(timesheet_date)) DAY))"); 
         }
         else{
        
             $query = $this->db->query("SELECT employee.managerId,employee.empId,employee.empName,employee.emailId,timesheet_id,timesheet.emp_id, timesheet_date, timesheet.emp_id, employee.empName, sum( if( timesheet.billable =1, time_units, 0 ) ) AS billable_time, sum( if( timesheet.billable =0, time_units, 0 ) ) AS unbillable_time, time_status, CONCAT(DATE_ADD(timesheet_date, INTERVAL(1-DAYOFWEEK(timesheet_date)) DAY),'/',DATE_ADD(timesheet_date, INTERVAL(7-DAYOFWEEK(timesheet_date)) DAY)) AS week,timesheet.created,timesheet.updated
FROM timesheet join employee on employee.id = timesheet.emp_id where ((employee.managerId=$emp_id and timesheet.time_status IN ('Submitted','Approved')) OR employee.id=$emp_id) 
GROUP BY timesheet.emp_id, WEEK(DATE_ADD(timesheet_date, INTERVAL(1-DAYOFWEEK(timesheet_date)) DAY)) ,YEAR(timesheet_date) ");

// echo $this->db->last_query();die;
         }
             
       //echo $this->db->last_query();die;
        $result = $query->result();   
           
        
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }

    function viewListTime($emp_id = NULL,$start_date,$end_date) {
        $this->db->select('*');
        $this->db->from('timesheet');
        $this->db->join('employee', 'employee.id = timesheet.emp_id','left');
        //$this->db->join('client', 'client.client_id = timesheet.client_id','left');
        //$this->db->join('activity', 'activity.activity_id = timesheet.activity_id','left');
        //$this->db->join('sub_activity', 'sub_activity.subactivity_id = timesheet.subactivity_id','left');
        $this->db->where("(timesheet_date BETWEEN '" . $start_date. "' and  '" . $end_date . "')");
        if (!empty($emp_id)) {
            $this->db->where('timesheet.emp_id', $emp_id);
        }
        $this->db->order_by('timesheet.timesheet_date','Asc');
       // $this->db->group_by('employee.id');
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    
     function ListTimeByDay($emp_id = NULL,$start_date,$end_date) {
        $this->db->select('*,employee.empId,employee.empName,employee.emailId,timesheet_id,client_name,activity_name,project_name,timesheet.billable,DAYNAME(timesheet_date) as day_name,time_units');
        $this->db->from('timesheet');
        $this->db->join('employee', 'employee.id = timesheet.emp_id');
        //$this->db->join('client', 'client.client_id = timesheet.client_id','left');
        //$this->db->join('project', 'project.project_id = timesheet.project_id','left');
        //$this->db->join('activity', 'activity.activity_id = timesheet.activity_id','left');
        //$this->db->join('sub_activity', 'sub_activity.subactivity_id = timesheet.subactivity_id','left');
        $this->db->where("(timesheet_date BETWEEN '" . $start_date. "' and  '" . $end_date . "')");
        if (!empty($emp_id)) {
            $this->db->where('timesheet.emp_id', $emp_id);
        }
        $this->db->order_by('timesheet.timesheet_date','Asc');
        // $this->db->order_by('timesheet.activity_name','Asc');
        //$this->db->group_by('timesheet.project_id');
        $query = $this->db->get();
        // echo $this->db->last_query();die;
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    
    function getTime($timesheet_id) {
        
        $query = $this->db->query('select timesheet_id,emp_id,disbursement,'
                . 'DATE_FORMAT(timesheet_date,\'%d %M %Y\') as timesheet_date,start_time,end_time,client_name,activity_name,subactivity_name,task_name,billable,time_units,time_minutes,comments,time_status,reason_to_reject,reason_to_exceed_time,project_name'
                . ' from timesheet where timesheet_id='.$timesheet_id);
        
        $result = $query->result();
        
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    
     function pendingTime($emp_id,$display_all) {
        if($display_all){
            $query = $this->db->query("SELECT employee.empId,employee.empName,employee.emailId,timesheet_id,timesheet.emp_id, timesheet_date, timesheet.emp_id, employee.empName, sum( if( timesheet.billable =1, time_units, 0 ) ) AS billable_time, sum( if( timesheet.billable =0, time_units, 0 ) ) AS unbillable_time, time_status, CONCAT(DATE_ADD(timesheet_date, INTERVAL(1-DAYOFWEEK(timesheet_date)) DAY),'/',DATE_ADD(timesheet_date, INTERVAL(7-DAYOFWEEK(timesheet_date)) DAY)) AS week
FROM timesheet join employee on employee.id = timesheet.emp_id where (timesheet.time_status IN ('Submitted')) and timesheet_date between DATE_ADD(timesheet_date, INTERVAL(1-DAYOFWEEK(timesheet_date)) DAY) and DATE_ADD(timesheet_date, INTERVAL(7-DAYOFWEEK(timesheet_date)) DAY) 
GROUP BY timesheet.emp_id, WEEK(DATE_ADD(timesheet_date, INTERVAL(1-DAYOFWEEK(timesheet_date)) DAY))"); 
         }
         else{
             $query = $this->db->query("SELECT employee.empId,employee.empName,employee.emailId,timesheet_id,timesheet.emp_id, timesheet_date, timesheet.emp_id, employee.empName, sum( if( timesheet.billable =1, time_units, 0 ) ) AS billable_time, sum( if( timesheet.billable =0, time_units, 0 ) ) AS unbillable_time, time_status, CONCAT(DATE_ADD(timesheet_date, INTERVAL(1-DAYOFWEEK(timesheet_date)) DAY),'/',DATE_ADD(timesheet_date, INTERVAL(7-DAYOFWEEK(timesheet_date)) DAY)) AS week
FROM timesheet join employee on employee.id = timesheet.emp_id where ((employee.managerId=$emp_id and timesheet.time_status IN ('Submitted'))) and timesheet_date between DATE_ADD(timesheet_date, INTERVAL(1-DAYOFWEEK(timesheet_date)) DAY) and DATE_ADD(timesheet_date, INTERVAL(7-DAYOFWEEK(timesheet_date)) DAY) 
GROUP BY timesheet.emp_id, WEEK(DATE_ADD(timesheet_date, INTERVAL(1-DAYOFWEEK(timesheet_date)) DAY))");
         }
       
          //echo $this->db->last_query();die; 
        $result = $query->result();   
           
        
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->num_rows();
        }
    }
    
    function overdueTimesheet($emp_id) {
        
             $query = $this->db->query("SELECT * FROM timesheet where (timesheet.emp_id=$emp_id and timesheet.time_status IN ('Pending','Rejected'))  and DATE_ADD(timesheet_date, INTERVAL(7-DAYOFWEEK(timesheet_date)) DAY)<DATE_ADD(now(), INTERVAL(1-DAYOFWEEK(now())) DAY)
GROUP BY timesheet.emp_id, WEEK(DATE_ADD(timesheet_date, INTERVAL(1-DAYOFWEEK(timesheet_date)) DAY))");
       
        //echo $this->db->last_query();die;   
        $result = $query->result();   
           
        
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->num_rows();
        }
    }
    
    function getStatusOfWeek($emp_id,$timesheet_date){
        $query = $this->db->query("SELECT time_status FROM timesheet where WEEK(timesheet_date)= WEEK('".$timesheet_date."') and emp_id=$emp_id  and YEAR(timesheet_date) = YEAR(CURDATE())");
        //echo $this->db->last_query();die; 
        $result = $query->result();   
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
        
    }
    
    function overdueTimesheetNotification() {
        
             $query = $this->db->query("SELECT timesheet.emp_id,empId,empName,emailId,count(*) as pending_count FROM timesheet left join employee ON employee.id=timesheet.emp_id  where (timesheet.time_status IN ('Pending','Rejected'))  and DATE_ADD(timesheet_date, INTERVAL(7-DAYOFWEEK(timesheet_date)) DAY)<DATE_ADD(now(), INTERVAL(1-DAYOFWEEK(now())) DAY) and employee.usrRoleld!=1
GROUP BY timesheet.emp_id");
       
        //echo $this->db->last_query();die;   
        $result = $query->result();   
           
        
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }

      /*  getting all timesheet data for convert */
      function viewListTimeData() {
        $this->db->select('timesheet_id,time_units,time_minutes');
        $this->db->from('timesheet');
        $this->db->order_by('timesheet.timesheet_date','Asc');
        $query = $this->db->get();
        // echo $this->db->last_query();die;
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
}

/** covert units to hrs and minutes */
function updateTimeData($data) {
    $this->db->where('timesheet_id', $data['timesheet_id']);
    $this->db->update('timesheet', $data);
    return $data['timesheet_id'];
}
    
    function insertUserHourlyRate($data) {
        // $this->db->insert('emp_hourly_rate', $data);
        $res = $this->db->insert_batch('emp_hourly_rate', $data);
        return $res;
        // $insert_id = $this->db->insert_id();
        
    }

    function updateUserHourlyRate($data) {
        $this->db->where('end_date', NULL);
        $res = $this->db->update('emp_hourly_rate', $data);
        return $res;
    }
 
    

}
