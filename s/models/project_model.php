<?php

class Project_model extends CI_Model {
    /*
      Developed In: Clavis Technologies Pvt Ltd.
      Modification History
      Create Date   Author			Description
      __________  _______________  ________________________________________
      16-02-2015     Ajay                   Model for Project
     */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function insertProject($data) {
        if ($this->checkProject($data)) {
            $this->db->insert('project', $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        } else {
            return false;
        }
    }

    /** function to update records */
    function updateProject($data) {
        if ($this->checkProject($data)) {
            $this->db->where('project_id', $data['project_id']);
            $this->db->update('project', $data);
            
            return $data['project_id'];
        } else {
            
            return false;
        }
    }

    function deleteProject($project_id) {

        $this->db->where('project_id', $project_id);
        $this->db->delete('project');
         
        return true;
        
    }

    function checkProject($data) {
        $this->db->select('*');
        $this->db->from('project');
        if (!empty($data['project_id'])) {
            
            $this->db->where_not_in('project_id', $data['project_id']);
        }
        $this->db->where('project_name', $data['project_name']);
        $query = $this->db->get();
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            return false;
        } else {
            return true;
        }
    }
    
    function listProject($project_id=NULL,$client_name=NULL){
        $this->db->select('*');
        $this->db->from('project');
	//$this->db->join('client', 'client.client_id = project.client_id','left');
        //$this->db->join('currency', 'currency.currency_id = project.currency_id','left');
        $this->db->order_by('project_name', 'asc');
        if(!empty($project_id))
        {
           $this->db->where('project_id', $project_id); 
        }
        if(!empty($client_name))
        {
           $this->db->where('client_name', $client_name); 
        }
        $query = $this->db->get();
        $result = $query->result();
    // echo     $sql = $this->db->last_query();
            if ($query->num_rows() == 0) {
                return false;
            } else {
                return $result;
            }
    }

}
