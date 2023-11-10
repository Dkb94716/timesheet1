<?php

class Company_model extends CI_Model {
    /*
      Developed In: Clavis Technologies Pvt Ltd.
      Modification History
      Create Date   Author			Description
      __________  _______________  ________________________________________
      16-02-2015     Ajay                   Model for Company
     */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function insertCompany($data) {
        if ($this->checkCompany($data)) {
            $this->db->insert('company', $data);
            $insert_id = $this->db->insert_id();
            
            return $insert_id;
        } else {
            return false;
        }
    }

    /** function to update records */
    function updateCompany($data)
    {
      if ($this->checkCompany($data)) {
            $this->db->where('company_id', $data['company_id']);
            $this->db->update('company', $data);
            
            return $data['company_id'];
            } else {
            return false;
        }
        
    }
    function updateCompanyLogo($data)
    {
     
            $this->db->where('company_id', $data['company_id']);
            $this->db->update('company', $data);
            
            return $data['company_id'];
            
        
    }

    function deleteCompany($company_id) {

        $this->db->where('company_id', $company_id);
        $this->db->delete('company');
         
        return true;
        
    }

    function checkCompany($data) {
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
    
    function listCompany($company_id=NULL){
        $this->db->select('*');
        $this->db->from('company');
        $this->db->order_by('company_name', 'asc');
        if(!empty($company_id))
        {
           $this->db->where('company_id', $company_id); 
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
