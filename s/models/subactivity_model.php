<?php

class Subactivity_model extends CI_Model {
    /*
      Developed In: Clavis Technologies Pvt Ltd.
      Modification History
      Create Date   Author			Description
      __________  _______________  ________________________________________
      16-02-2015     Dablu                   Model for Subactivity
     */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function insertSubactivity($data) {
        if ($this->checkSubactivity($data)) {
            $this->db->insert('sub_activity', $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        } else {
            return false;
        }
    }

    /** function to update records */
    function updateSubactivity($data) {
        if ($this->checkSubactivity($data)) {
            $this->db->where('subactivity_id', $data['subactivity_id']);
            $this->db->update('sub_activity', $data);

            return $data['subactivity_id'];
        } else {

            return false;
        }
    }

    function deleteSubactivity($subactivity_id) {

        $this->db->where('subactivity_id', $subactivity_id);
        $this->db->delete('sub_activity');

        return true;
    }

    function checkSubactivity($data) {
        $this->db->select('*');
        $this->db->from('sub_activity');
        if (!empty($data['subactivity_id'])) {

            $this->db->where_not_in('subactivity_id', $data['subactivity_id']);
        }
        $this->db->where('subactivity_name', $data['subactivity_name']);
        $query = $this->db->get();
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            return false;
        } else {
            return true;
        }
    }

    function listSubactivity($subactivity_id = NULL, $activity_name = NULL) {
        $this->db->select('*');
        $this->db->from('sub_activity');
        //$this->db->join('activity', 'activity.activity_id = sub_activity.activity_id');
        $this->db->order_by('subactivity_name', 'asc');
        if (!empty($subactivity_id)) {
            $this->db->where('subactivity_id', $subactivity_id);
        }
        if (!empty($activity_name)) {
            $this->db->where('sub_activity.activity_name', $activity_name);
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
