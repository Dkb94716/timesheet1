<?php

class Team_model extends CI_Model {
    /*
      Developed In: Clavis Technologies Pvt Ltd.
      Modification History
      Create Date   Author			Description
      __________  _______________  ________________________________________
      04-03-2015     Dablu                   Model for Team
     */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function insertTeam($data) {
        if ($this->checkTeam($data)) {
            $this->db->insert('team', $data);
            $insert_id = $this->db->insert_id();
             
            return $insert_id;
            
            
        } else {
            return false;
        }
    }

    /** function to update records */
    function updateTeam($data) {
        if ($this->checkTeam($data)) {
            $this->db->where('team_id', $data['team_id']);
            $this->db->update('team', $data);
            
            return $data['team_id'];
        } else {
            
            return false;
        }
    }

    function deleteTeam($team_id) {

        $this->db->where('team_id', $team_id);
        $this->db->delete('team');
         
        return true;
        
    }

    function checkTeam($data) {
        $this->db->select('*');
        $this->db->from('team');
        if (!empty($data['team_id'])) {
            
            $this->db->where_not_in('team_id', $data['team_id']);
        }
        $this->db->where('team_name', $data['team_name']);
        $query = $this->db->get();
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            return false;
        } else {
            return true;
        }
    }
    
    function listTeam($team_id=NULL){
        $this->db->select('*');
        $this->db->from('team');
        $this->db->join('employee', 'employee.id = team.employee_id','left');
        $this->db->order_by('team_name', 'asc');
        if(!empty($team_id))
        {
           $this->db->where('team_id', $team_id); 
        }
        $query = $this->db->get();
        $result = $query->result();
            if ($query->num_rows() == 0) {
                return false;
            } else {
                return $result;
            }
    }
    function detailTeam(){
        $this->db->select('*');
        $this->db->from('team');
        $this->db->order_by('team_name', 'asc');
        $query = $this->db->get();
        $result = $query->result();
      // echo $this->db->last_query(); die;
            if ($query->num_rows() == 0) {
                return false;
            } else {
                return $result;
            }
    }

}
