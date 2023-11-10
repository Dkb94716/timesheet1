<?php

class Activity_model extends CI_Model {
    /*
      Developed In: Clavis Technologies Pvt Ltd.
      Modification History
      Create Date   Author			Description
      __________  _______________  ________________________________________
      16-02-2015     Ajay                   Model for Activity
     */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function insertActivity($data) {
        if ($this->checkActivity($data)) {
            $this->db->insert('activity', $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        } else {	
            return false;
        }
    }

    /** function to update records */
    function updateActivity($data) {
        if ($this->checkActivity($data)) {
            $this->db->where('activity_id', $data['activity_id']);
            $this->db->update('activity', $data);
            
            return $data['activity_id'];
        } else {
            
            return false;
        }
    }

    function deleteActivity($activity_id) {

        $this->db->where('activity_id', $activity_id);
        $this->db->delete('activity');
         
        return true;
        
    }

    function checkActivity($data) {
        $this->db->select('*');
        $this->db->from('activity');
        if (!empty($data['activity_id'])) {
            
            $this->db->where_not_in('activity_id', $data['activity_id']);
        }
        $this->db->where('activity_name', $data['activity_name']);
        $query = $this->db->get();
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            return false;
        } else {
            return true;
        }
    }
    
    function listActivity($activity_id=NULL){
        $this->db->select('*');
        $this->db->from('activity');
        $this->db->order_by('activity_name', 'asc');
        if(!empty($activity_id))
        {
           $this->db->where('activity_id', $activity_id); 
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
