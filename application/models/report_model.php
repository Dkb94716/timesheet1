<?php

class Report_model extends CI_Model
{
    /*
      Developed In: Clavis Technologies Pvt Ltd.
      Modification History
      Create Date   Author			Description
      __________  _______________  ________________________________________
      03-03-2015     Dablu                   Model for Userdetails
     */

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->helper('common');
    }
    function get_team_name($emp_id = NULL)
    {
        $this->db->select('t.*,ur.role_name');
        $this->db->from('team as t');
        $this->db->join('employee as e', 'e.id=t.employee_id', 'inner');
        $this->db->join('user_role as ur', 'ur.role_id=e.usrRoleld', 'inner');
        $this->db->where('t.employee_id', $emp_id);

        $query = $this->db->get();
        //			echo $this->db->last_query();die;
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }

    /** function to update records */


    function listTimesheetReport($info)
    {
        $company_id = $info['companyId'];
        $employee_id = $info['employeeId'];
        $client_id = $info['clientId'];
        $projectId = $info['projectId'];
        $teamId = $info['teamId'];
        $taskId = $info['taskId'];
        $activityId = $info['activityId'];
        $startDate = $info['startDate'];
        $endDate = $info['endDate'];
        $billable = $info['billable'];
        $viewBy = $info['viewBy'];
        $team_array = @$this->get_team_name($info['userPrimeryId']);
        $team_name = @$team_array[0]->team_id;
        $role_name = @$team_array[0]->role_name;

        $this->db->select('timesheet.*,employee.id,employee.empName,employee.surname,company.company_name,team.team_name');
        $this->db->from('timesheet');
        $this->db->join('employee', 'employee.id = timesheet.emp_id', 'left');
        $this->db->join('company', 'company.company_id = employee.company_id', 'left');
        $this->db->join('team', 'team.team_id = employee.currentTeamId', 'left');

        if ($viewBy == 'company') {
            // $this->db->order_by('company.company_name','asc');
        } else if ($viewBy == 'client') {
            //$this->db->order_by('timesheet.client_name','asc'); 
        } else if ($viewBy == 'project') {

            // $this->db->order_by('timesheet.project_name','asc'); 
        } else if ($viewBy == 'team') {

            // $this->db->order_by('team.team_id','asc'); 
        } else if ($viewBy == 'user') {
            //$this->db->order_by('employee.id','desc'); 
        } else if ($viewBy == 'activity') {

            // $this->db->order_by('timesheet.activity_name','asc'); 
        } else if ($viewBy == 'sub_activity') {
            //$this->db->order_by('timesheet.subactivity_name','asc'); 
        } else if ($viewBy == 'task_name') {
            // $this->db->order_by('timesheet.task_name','asc'); 
        }
        $this->db->order_by('employee.empName', 'asc');

        if (!empty($company_id)) {
            $this->db->order_by('company.company_name', 'asc');
            $this->db->where('employee.company_id', $company_id);
        }
        if (!empty($employee_id)) {
            $this->db->where('timesheet.emp_id', $employee_id);
        }
        if (!empty($client_id)) {
            $this->db->where('timesheet.client_name', $client_id);
        }
        if (!empty($projectId)) {
            $this->db->where('timesheet.project_name', $projectId);
        }
        if (!empty($teamId)) {
            $this->db->where('employee.currentTeamId', $teamId);
        }

        if (!empty($activityId)) {
            $this->db->where('timesheet.activity_name', $activityId);
        }
        if (!empty($taskId)) {
            $this->db->where('timesheet.task_name', $taskId);
        }
        if (!empty($startDate) &&  !empty($endDate)) {

            $this->db->where("(timesheet.timesheet_date BETWEEN '" . $startDate . "' and  '" . $endDate . "')");
        }
        if (!empty($billable)) {
            $this->db->where('timesheet.billable', $billable);
        }
        if ($team_name) {
            if (trim($role_name) != "Admin") {
                $this->db->where('team.team_id', $team_name);
            }
        }
        $query = $this->db->get();
        $result = $query->result();
        //       echo $this->db->last_query();  
        // die;
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }



    function logoDetail($userId)
    {
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->join('company', 'company.company_id  = employee.company_id', 'left');
        if (!empty($userId)) {
            $this->db->where('employee.id', $userId);
        }
        $query = $this->db->get();
        $result = $query->result();
        $this->db->last_query();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }

    function listProjectWiseReport($info)
    {
        $client_id = $info['clientId'];
        $projectId = $info['projectId'];
        $startDate = $info['startDate'];
        $endDate = $info['endDate'];

        $this->db->select('T.timesheet_id,T.emp_id,T.project_name,T.client_name,T.activity_name,T.subactivity_name,T.task_name,SUM(T.time_units) as totalTaskHors,SUM(T.time_minutes) as totalTaskMins,T.timesheet_date,T.created,T.start_time,T.end_time,T.reason_to_exceed_time, employee.id, employee.empName, employee.surname');
        $this->db->from('timesheet T');
        $this->db->join('employee', 'employee.id = T.emp_id', 'left');

        $this->db->order_by('employee.empName', 'asc');

        if (!empty($client_id)) {
            $this->db->where('T.client_name', $client_id);
        }
        if (!empty($projectId)) {
            $this->db->where('T.project_name', $projectId);
        }
        // $group_by_data = array("T.task_name", "T.emp_id")
        $this->db->where('T.task_name !=', '0');
        $this->db->group_by(array("T.task_name", "T.emp_id"));
        if (!empty($startDate) &&  !empty($endDate)) {
            $this->db->where("(T.timesheet_date BETWEEN '" . $startDate . "' and  '" . $endDate . "')");
        }
        $query = $this->db->get();
        $result = $query->result_array();
        // echo $this->db->last_query();  
        // die;
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }

    function getTaskWisedata($info)
    {
        $this->db->select('timesheet_id,time_units,time_minutes,timesheet_date,created,reason_to_exceed_time');
        $this->db->from('timesheet');
        $this->db->where($info);
        $query = $this->db->get();
        $result = $query->result_array();
        // echo $this->db->last_query();  
        // die;
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }

    function pending_report()
    {
        $this->db->select('timesheet_pending.*,employee.id,employee.empName,employee.surname,company.company_name,team.team_name');
        $this->db->from('timesheet_pending')->where('timesheet_pending.status', '1');
        $this->db->join('employee', 'employee.id = timesheet_pending.emp_id', 'left');
        $this->db->join('company', 'company.company_id = employee.company_id', 'left');
        $this->db->join('team', 'team.team_id = employee.currentTeamId', 'left');
        return $this->db->get()->result();
        // echo $this->db->last_query();  
        // die;
    }

    function list_hour_rate($data)
    {
        $data['startDate'] = substr_replace($data['startDate'], '01', 8);
        $data['endDate'] = substr_replace($data['endDate'], '01', 8);

        // $sdate=date('Y-m-01', strtotime($data['startDate']));
        // $edate=date('Y-m-t', strtotime($data['endDate']));
        // $cdate = date('Y-m-t');
        $this->db->select('user_id, date, end_date, hourly_rate')->from('emp_hourly_rate');
        $this->db->where("(date>='" . $data['startDate'] . "' and  date<='" . $data['endDate'] . "')");
        if ($data['employeeId']) {
            $this->db->where('user_id', $data['employeeId']);
        }
        return $this->db->get()->result();
    }

    function insertProjectWiseExpense($data)
    {
        $this->db->insert('project_wise_expense', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    function insertExpense($data)
    {
        $this->db->select('id,expense_name')->from('expense');
        $this->db->where("expense_name",$data['expense_name']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return false;
        } else {
            $this->db->insert('expense', $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;    
        }
    }

    function listTimesheetProjectReport($info)
    {
        $client_id = $info['clientId'];
        $projectId = $info['projectId'];

        $this->db->select('T.timesheet_date,T.time_units,T.time_minutes,employee.id,employee.empId,employee.empName');
        $this->db->from('timesheet T');
        $this->db->join('employee', 'employee.id = T.emp_id', 'left');
        $this->db->order_by('T.timesheet_date', 'asc');

        if (!empty($client_id)) {
            $this->db->where('T.client_name', $client_id);
        }
        if (!empty($projectId)) {
            $this->db->where('T.project_name', $projectId);
        }
        $query = $this->db->get();
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }

    function hour_rate_by_month($data)
    {
        $this->db->select('user_id, date, end_date, hourly_rate')->from('emp_hourly_rate');
        if ($data['user_id']) {
            $this->db->where('user_id', $data['user_id']);
        }
        $this->db->where("month",$data['month']);
        $this->db->where("year",$data['year']);
        return $this->db->get()->result();
    }

    function listExpense()
    {
        $this->db->select('*');
        $this->db->from('expense');
        $this->db->order_by('expense_name', 'asc');
        $query = $this->db->get();
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
}
