<?php

class Leave_model extends CI_Model {
    /*
      Developed In: Clavis Technologies Pvt Ltd.
      Modification History
      Create Date   Author			Description
      __________  _______________  ________________________________________
      25-02-2015     Ajay                   Model for Leave
     */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function insertLeaveType($data) {
        if ($this->checkLeaveType($data)) {
            $this->db->insert('leave_category', $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        } else {
            return false;
        }
    }

    /** function to update records */
    function updateLeaveType($data) {
        if ($this->checkLeaveType($data)) {
            $this->db->where('leave_type_id', $data['leave_type_id']);
            $this->db->update('leave_category', $data);

            return $data['leave_type_id'];
        } else {

            return false;
        }
    }

    function deleteLeaveType($leave_type_id) {

        $this->db->where('leave_type_id', $leave_type_id);
        $this->db->delete('leave_category');

        return true;
    }

    function checkLeaveType($data) {
        $this->db->select('*');
        $this->db->from('leave_category');
        if (!empty($data['leave_type_id'])) {

            $this->db->where_not_in('leave_type_id', $data['leave_type_id']);
        }
        $this->db->where("(leave_type = '" . $data['leave_type'] . "' || legend = '" . $data['legend'] . "')");
        $query = $this->db->get();
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            return false;
        } else {
            return true;
        }
    }

    function listLeaveType($leave_type_id = NULL,$emp_id=NULL,$year=NULL) {
       
        
        $this->db->select('*,leave_category.leave_type_id');
        $this->db->from('leave_category');
        
        if(empty($emp_id)){
          $this->db->join('leave_employee_details', 'leave_employee_details.leave_type_id = leave_category.leave_type_id','left');
        }
        else{
          $this->db->join('leave_employee_details', 'leave_employee_details.leave_type_id = leave_category.leave_type_id');  
        }
        $this->db->order_by('leave_type', 'asc');
        if (!empty($leave_type_id)) {
            $this->db->where('leave_category.leave_type_id', $leave_type_id);
        }
        if (!empty($emp_id)) {
            $this->db->where('leave_employee_details.emp_id', $emp_id);
        }
         if (!empty($year)) {
            $this->db->where('leave_employee_details.year', $year);
        }
        $this->db->group_by('leave_category.leave_type_id');
        $query = $this->db->get();
        $result = $query->result();
        //print_r($result);die;
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }

    function insertGrantLeave($data) {
        foreach ($data['emp_id'] as $empId) {
            $arr_data = array();
            $log_data = array();
            $leave_employee_details = array();
            $this->db->select('*');
            $this->db->from('leave_employee_details');
            $this->db->where('leave_type_id', $data['leave_type_id']);
            $this->db->where('year', $data['year']);
            $this->db->where('emp_id', $empId);
            $query = $this->db->get();
            $result = $query->result();
            if ($query->num_rows() !== 0) {
                $leave_id = $result[0]->leave_id;
                $leaves_prev = $result[0]->no_of_leaves;
                $balance_leave = $result[0]->balance_leave;
                $log_data = $result[0]->log_data;
				$log_prev_data = json_decode($log_data);
				array_push($arr_data, $log_prev_data);
                
                $log_data_text = "The No of Days Added on " . date('Y-m-d h:i:s') . " by user( EMPID ) " . $data['created_by'] . " is " . $data['no_of_leaves'];
                array_push($arr_data, $log_data_text);

                $leave_employee_details['log_data'] = json_encode($arr_data);
                $leave_employee_details['balance_leave'] = $balance_leave + $data['no_of_leaves'];
                $leave_employee_details['no_of_leaves'] = $leaves_prev + $data['no_of_leaves'];
                $this->db->where('leave_id', $leave_id);
                $this->db->update('leave_employee_details', $leave_employee_details);
            } else {
                $log_data_text = "The No of Days Added on " . date('Y-m-d h:i:s') . " by user( EMPID ) " . $data['created_by'] . " is " . $data['no_of_leaves'];
                array_push($log_data, $log_data_text);
                $leave_employee_details['log_data'] = json_encode($log_data);
                $leave_employee_details['emp_id'] = $empId;
                $leave_employee_details['no_of_leaves'] = $data['no_of_leaves'];
                $leave_employee_details['leave_type_id'] = $data['leave_type_id'];
                $leave_employee_details['year'] = $data['year'];
                $leave_employee_details['balance_leave'] = $data['no_of_leaves'];
                $this->db->insert('leave_employee_details', $leave_employee_details);

                $insert_id = $this->db->insert_id();
            }


            
        }
        return true;
    }

    function insertForwardLeave($data) {
            
            $arrYears = explode("_", $data['year']);
            $prevYear = trim($arrYears[0]);
            $nxtYear = trim($arrYears[1]);
            $this->db->select('*');
            $this->db->from('leave_employee_details');
            $this->db->where('leave_type_id', $data['leave_type_id']);
            $this->db->where('year', $prevYear);
            //$this->db->where_not_in('balance_leave', 0);
            $query = $this->db->get();
            $leave_employee_result = $query->result();
            
            if ($query->num_rows() !== 0) {
                foreach($leave_employee_result as $leave_employee){
                $leave_employee_details = array();
                $leave_employee_details_update = array();
                $leave_employee_details_prev = array();
                $arr_data = array();
                $leave_id = $leave_employee->leave_id;
                $emp_id = $leave_employee->emp_id;
                $leaves_prev = $leave_employee->no_of_leaves;
                $leave_type_id = $leave_employee->leave_type_id;
                $total_leave_left = $leave_employee->balance_leave;
                $log_data = $leave_employee->log_data;
                if ($data['select_all'] == "ALL") {
                    $balance_leave = $total_leave_left;
                } else {
                    if ($data['no_of_leaves'] > $total_leave_left)
                        $balance_leave = $total_leave_left;
                    else
                        $balance_leave = $data['no_of_leaves'];
                }
                if ($balance_leave >= 90)
                    $balance_leave = 90;
                $log_data_text = "The No of Days Forward from Year $prevYear ($total_leave_left days) to $nxtYear ($balance_leave days) on " . date('Y-m-d h:i:s') . " by user(EMPID) " . $data['created_by'];
                
                $this->db->select('*');
                $this->db->from('leave_employee_details');
                $this->db->where('leave_type_id', $data['leave_type_id']);
                $this->db->where('year', $nxtYear);
                $this->db->where('emp_id', $emp_id);
                $query = $this->db->get();
                $single_result = $query->result();
                if ($query->num_rows() !== 0) {
                    $leaveId1 = $single_result[0]->leave_id;
                    $LeavesPrev1 = $single_result[0]->no_of_leaves;
                    $balanceLeave1 = $single_result[0]->balance_leave;
                    $logData1 = $single_result[0]->log_data;
                    $forLeave1 = $single_result[0]->last_year_forward_leaves;
                    $arr_data[] = json_decode($logData1);                    
                    array_push($arr_data, $log_data_text);
                    $jsonData1 = json_encode($arr_data);
                    $total_balance_leave = $balanceLeave1 + $balance_leave;
                    $forwardLeave = $balance_leave + $forLeave1;   
                    $leave_employee_details_update['log_data'] = $jsonData1;
                    $leave_employee_details_update['balance_leave'] = $total_balance_leave;
                    $leave_employee_details_update['last_year_forward_leaves'] = $forLeave1;
                    $this->db->where('leave_id', $leaveId1);
                    $this->db->update('leave_employee_details', $leave_employee_details_update);
                    $IsUpdated = 1;
                }
                else{
                    
                array_push($arr_data, $log_data_text);
                $leave_employee_details['log_data'] = json_encode($arr_data);
                $leave_employee_details['emp_id'] = $emp_id;
                $leave_employee_details['no_of_leaves'] = 0;
                $leave_employee_details['leave_type_id'] = $leave_type_id;
                $leave_employee_details['year'] = $nxtYear;
                $leave_employee_details['balance_leave'] = $balance_leave;
                $leave_employee_details['last_year_forward_leaves'] = $balance_leave;
                $this->db->insert('leave_employee_details', $leave_employee_details);
                
                $insert_id = $this->db->insert_id();
                $IsUpdated = 1;
                }
                if($IsUpdated == 1) {
                $arrLogData = array();
                $arrLogData = json_decode($log_data);
                array_push($arrLogData, $log_data_text);
                $leave_employee_details_prev['log_data'] = json_encode($arrLogData);
                $leave_employee_details_prev['balance_leave'] = 0;
                $this->db->where('leave_id', $leave_id);
                $this->db->update('leave_employee_details', $leave_employee_details_prev);
                
            }
                }
            } 

            return true;
        
    }

}
