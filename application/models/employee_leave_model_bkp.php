<?php

class Employee_leave_model extends CI_Model {
    /*
      Developed In: Clavis Technologies Pvt Ltd.
      Modification History
      Create Date   Author			Description
      __________  _______________  ________________________________________
      16-02-2015     Ajay                   Model for Employee Leave
     */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function insertEmployeeLeave($data) {
        if($this->checkEmployeeLeave($data)){
        $this->db->insert('employee_leaves', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
        }
        else{
           return false; 
        }
    }

    function updateEmployeeLeave($data) {
        if ($this->checkEmployeeLeave($data)) {
			 if($data['status']=='Approved')
       {
            $employee_leave_detail = $this->getEmployeeLeave(NULL, NULL, NULL, $data['employee_leave_id']);
            $this->db->set('balance_leave', 'balance_leave+'.$employee_leave_detail[0]->number_of_days, FALSE);
            $this->db->where('emp_id', $data['emp_id']);
            $this->db->where('leave_type_id', $data['leave_type_id']);
            $this->db->where('year', date('Y',  strtotime($data['from_date'])));
            $this->db->update('leave_employee_details');
            $this->db->set('balance_leave', 'balance_leave-'.$data['number_of_days'], FALSE);
            $this->db->where('emp_id', $data['emp_id']);
            $this->db->where('leave_type_id', $data['leave_type_id']);
            $this->db->where('year', date('Y',  strtotime($data['from_date'])));
            $this->db->update('leave_employee_details');
            
       }
            $this->db->where('employee_leave_id', $data['employee_leave_id']);
            $this->db->update('employee_leaves', $data);
            
            return $data['employee_leave_id'];
        } else {

            return false;
        }
    }
    function deleteEmployeeLeave($employee_leave_id) {
        $this->db->select('*');
        $this->db->from('employee_leaves');
        $this->db->where('employee_leave_id', $employee_leave_id);
        $query = $this->db->get();
	$result = $query->result();
	
            
            if($result[0]->status == 'Pending')
            {
            
		
                $this->db->where('employee_leave_id', $employee_leave_id);
                $this->db->delete('employee_leaves');

                return 'Leave withdraw successfully.';
            }
            else{
                return 'Already the leave has been '.$result[0]->status.'.';
            }
        
        
    }

    function checkEmployeeLeave($data) {
//        if (!empty($data['employee_leave_id'])) {
//            
//           $query = $this->db->query("SELECT * FROM (`employee_leaves`) 
//WHERE (`emp_id` = '".$data['emp_id']."' AND ( (from_date BETWEEN '" . $data['from_date'] . "' and '" . $data['to_date'] . "') OR (to_date BETWEEN '" . $data['from_date'] . "' and '" . $data['to_date'] . "')) AND (`status`='Pending' or status= 'Approved')) and employee_leave_id != '".$data['employee_leave_id']."'"); 
//        }
//        else{
//        $query = $this->db->query("SELECT * FROM (`employee_leaves`) 
//WHERE `emp_id` = '".$data['emp_id']."' AND ((from_date BETWEEN '" . $data['from_date'] . "' and '" . $data['to_date'] . "') OR (to_date BETWEEN '" . $data['from_date'] . "' and '" . $data['to_date'] . "')) AND (`status`='Pending' or status= 'Approved') ");
//        }
      
        if (!empty($data['employee_leave_id'])) {
            
           $query = $this->db->query("SELECT * FROM (`employee_leaves`) 
WHERE (`emp_id` = '".$data['emp_id']."' AND ((from_date < '" . $data['from_date'] . "' and to_date >'" . $data['to_date'] . "') OR (from_date BETWEEN '" . $data['from_date'] . "' and '" . $data['to_date'] . "') OR (to_date BETWEEN '" . $data['from_date'] . "' and '" . $data['to_date'] . "')) AND (`status`='Pending' or status= 'Approved')) and employee_leave_id != '".$data['employee_leave_id']."'"); 
        }
        else{
        $query = $this->db->query("SELECT * FROM (`employee_leaves`) 
WHERE `emp_id` = '".$data['emp_id']."' AND ((from_date < '" . $data['from_date'] . "' and to_date >'" . $data['to_date'] . "') OR (from_date BETWEEN '" . $data['from_date'] . "' and '" . $data['to_date'] . "') OR (to_date BETWEEN '" . $data['from_date'] . "' and '" . $data['to_date'] . "')) AND (`status`='Pending' or status= 'Approved') ");
        }
        //echo $this->db->last_query();die;
        $result = $query->result();
        
        //$this->db->select('*');
        //$this->db->from('employee_leaves');
        //$this->db->where('emp_id', $data['emp_id']);
        //$this->db->where("(from_date <= '" . $data['from_date'] . "' and  to_date>='" . $data['to_date'] . "') OR status NOT IN ('Rejected')");
        //$this->db->where("(from_date BETWEEN '" . $data['from_date'] . "' and  '" . $data['to_date'] . "')");
       // $this->db->or_where("(to_date BETWEEN '" . $data['from_date'] . "' and  '" . $data['to_date'] . "')");
        //$this->db->where_not_in('status', 'Rejected');
        //$this->db->where_in('status', array('Pending','Approved'));
        //$this->db->where('YEAR(from_date)', date('Y',  strtotime($data['from_date'])));
        //$query = $this->db->get();
        //echo $this->db->last_query();die;
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            return false;
        } else {
            return true;
        }
    }

    function listEmployeeLeave($data) {

        $this->db->select('*,(leave_employee_details.no_of_leaves-leave_employee_details.balance_leave) as approve_leave');
        $this->db->from('employee');
        $this->db->join('leave_employee_details', 'employee.id = leave_employee_details.emp_id', 'left');
        $this->db->join('leave_category', 'leave_employee_details.leave_type_id = leave_category.leave_type_id', 'left');
        $this->db->where_not_in('employee.usrRoleld',1);
        if(!empty($data['ei'])){
        $this->db->where_in('employee.id', $data['ei']);
        }
        if(!empty($data['emp_id'])){
        $this->db->where('leave_employee_details.emp_id', $data['emp_id']);
        }
        if(!empty($data['leave_type_id'])){
        $this->db->where('leave_employee_details.leave_type_id', $data['leave_type_id']);
        }
        if(!empty($data['year'])){
        $this->db->where('leave_employee_details.year', $data['year']);
        }
        if(!empty($data['managerId'])){
        $this->db->where_in('employee.managerId', $data['managerId']);
        }
        //$this->db->where('leave_type_id', $data['leave_type_id']);
        $this->db->where('leave_employee_details.year', $data['year']);
        $this->db->order_by('employee.id');
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    
    function listManageEmployeeLeave($data) {
        $this->db->select('*,(leave_employee_details.no_of_leaves-leave_employee_details.balance_leave) as approve_leave');
        $this->db->from('employee');
        $this->db->join('employee_leaves', 'employee_leaves.emp_id = employee.id');
        $this->db->join('leave_employee_details', 'leave_employee_details.leave_type_id = employee_leaves.leave_type_id');
        $this->db->join('leave_category', 'leave_category.leave_type_id = leave_employee_details.leave_type_id');
        $this->db->where_not_in('employee.usrRoleld',1);
        if(!empty($data['emp_id'])){
        $this->db->where('employee_leaves.emp_id', $data['emp_id']);
        $this->db->where('leave_employee_details.emp_id', $data['emp_id']);
       }
     
       if(!empty($data['ei'])){
        $this->db->where_in('employee_leaves.emp_id', $data['ei']);
        $this->db->where('employee_leaves.status', 'Pending');
        }
        //$this->db->where('leave_type_id', $data['leave_type_id']);
        if(!empty($data['year'])){
        $this->db->where('YEAR(employee_leaves.from_date)', $data['year']);
            
        }
        
        if(!empty($data['year'])){
        $this->db->where('leave_employee_details.year', $data['year']);
            
        }
        $this->db->group_by('employee_leaves.employee_leave_id');
        
        $query = $this->db->get();
       //echo $this->db->last_query();die;
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    
    function updateEmployeeLeaveStatus($data) {
        $this->db->select('*');
        $this->db->from('employee_leaves');
        $this->db->where('employee_leave_id', $data['employee_leave_id']);
        $query = $this->db->get();
	$result = $query->result();
	if($query->num_rows() == 0)
	{
		
		return "Already the leave has been withdraw.";	
	}
        else{
            
            if($result[0]->status != 'Pending')
            {
            
		return 'Already the leave has been '.$result[0]->status.'.';	
            }
        }
        $employee_leaves = array(
                'status' => $data['status'],
                'reason' => $data['reason'],
            );
        $this->db->where('employee_leave_id', $data['employee_leave_id']);
        $this->db->update('employee_leaves', $employee_leaves);
        if($data['status']=='Approved')
       {
            
           $this->db->set('balance_leave', 'balance_leave-'.$data['number_of_days'], FALSE);
            $this->db->where('leave_id', $data['leave_id']);
            $this->db->update('leave_employee_details');
             //echo $this->db->last_query();die;
       }
        return 'Leave ' . $data['status'] . ' successfully.';
    }
    
    function getBalanceLeave($emp_id,$year) {
        $this->db->select('*,(leave_employee_details.no_of_leaves-leave_employee_details.balance_leave) as approve_leave');
        $this->db->from('leave_employee_details');
        $this->db->join('leave_category', 'leave_category.leave_type_id = leave_employee_details.leave_type_id');
        if(!empty($emp_id)){
        $this->db->where('leave_employee_details.emp_id', $emp_id);
       }
       if(!empty($year)){
        $this->db->where('leave_employee_details.year', $year);
       }
        
        $query = $this->db->get();
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    
    function getEmployeeLeave($emp_id=NULL,$status=NULL,$manager_id=NULL,$employee_leave_id=NULL,$year=NULL) {
        $this->db->select('*');
        $this->db->from('employee_leaves');
        $this->db->join('leave_category', 'leave_category.leave_type_id = employee_leaves.leave_type_id');
        if(!empty($emp_id)){
        $this->db->where('employee_leaves.emp_id', $emp_id);
       }
       
       if(!empty($status)){
        $this->db->where('employee_leaves.status', $status);
       }
       if(!empty($manager_id)){
        $this->db->where('employee_leaves.manager_id', $manager_id);
       }
       if(!empty($employee_leave_id)){
        $this->db->join('leave_employee_details', 'leave_category.leave_type_id = leave_employee_details.leave_type_id');
        $this->db->where('employee_leaves.employee_leave_id', $employee_leave_id);
       }
       if(!empty($year)){
       $this->db->where('YEAR(to_date)', $year);
       }
        $query = $this->db->get();
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    
    function checkleaveTypeYear($data) {
        $this->db->select('leave_id');
        $this->db->from('leave_employee_details');
       
        if(!empty($data['emp_id'])){
        $this->db->where('emp_id', $data['emp_id']);
       }
       if(!empty($data['leave_type_id'])){
        $this->db->where('leave_type_id', $data['leave_type_id']);
       }
       if(!empty($data['year'])){
        $this->db->where('year', $data['year']);
       }
        
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            return true;
            
        } else {
            return false;
        }
    }
    
    
    function getEmployeeApproveLeave($emp_id=NULL,$year,$leave_type_id=NULL) {
        $this->db->select('sum(number_of_days) as approve_leave');
        $this->db->from('employee_leaves');
       
        $this->db->where('emp_id', $emp_id);
      
       $this->db->where('YEAR(to_date)', $year);
     
        $this->db->where('status', 'Approved');
        if(!empty($leave_type_id)){
         $this->db->where('leave_type_id', $leave_type_id);   
        }
       
        $query = $this->db->get();
       // echo $this->db->last_query();die;
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    
    
    

}
