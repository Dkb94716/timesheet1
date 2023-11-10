<?php

class User_model extends CI_Model {
    /*
      Developed In: Clavis Technologies Pvt Ltd.
      Modification History
      Create Date   Author			Description
      __________  _______________  ________________________________________
      16-02-2015     Ajay                   Model for User
     */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function insertUser($data) {
        if ($this->checkUser($data)) {
            $this->db->insert('company', $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        } else {
            return false;
        }
    }

    /** function to update records */
    function updateUser($data) {
        if ($this->checkUser($data)) {
            $this->db->where('company_id', $data['company_id']);
            $this->db->update('company', $data);
            
            return $data['company_id'];
        } else {
            
            return false;
        }
    }

    function deleteUser($company_id) {

        $this->db->where('company_id', $company_id);
        $this->db->delete('company');
         
        return true;
        
    }

    function checkUser($data) {
        $this->db->select('*');
        $this->db->from('company');
        if (!empty($data['company_id'])) {
            
            $this->db->where_not_in('company_id', $data['company_id']);
        }
        $this->db->where('company_name', $data['company_name']);
        $query = $this->db->get();
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            return false;
        } else {
            return true;
        }
    }
    
    function listUser($emp_id=NULL){
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->order_by('empName', 'asc');
        if(!empty($emp_id))
        {
           $this->db->where('id', $emp_id); 
        }
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        $result = $query->result();
            if ($query->num_rows() == 0) {
                return false;
            } else {
                return $result;
            }
    }

}
