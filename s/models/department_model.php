<?php

class Department_model extends CI_Model {
    /*
      Developed In: Clavis Technologies Pvt Ltd.
      Modification History
      Create Date   Author			Description
      __________  _______________  ________________________________________
      03-03-2015     Dablu                   Model for Department
     */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function insertDepartment($data) {
        if ($this->checkDepartment($data)) {
            $this->db->insert('department', $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        } else {	
            return false;
        }
    }

    /** function to update records */
    function updateDepartment($data) {
        if ($this->checkDepartment($data)) {
            $this->db->where('department_id', $data['department_id']);
            $this->db->update('department', $data);
            return $data['department_id'];
        } else {
            
            return false;
        }
    }

    function deleteDepartment($department_id) {

        $this->db->where('department_id', $department_id);
        $this->db->delete('department');
         
        return true;
        
    }

    function checkDepartment($data) {
        $this->db->select('*');
        $this->db->from('department');
        if (!empty($data['department_id'])) {
            
            $this->db->where_not_in('department_id', $data['department_id']);
        }
        $this->db->where('department_name', $data['department_name']);
        $query = $this->db->get();
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            return false;
        } else {
            return true;
        }
    }
    
    function listDepartment($department_id=NULL){
        $this->db->select('*');
        $this->db->from('department');
        $this->db->order_by('department_name', 'asc');
        if(!empty($department_id))
        {
           $this->db->where('department_id', $department_id); 
        }
        $query = $this->db->get();
        $result = $query->result();
            if ($query->num_rows() == 0) {
                return false;
            } else {
                return $result;
            }
    }

}
