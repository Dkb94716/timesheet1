<?php

class Task_model extends CI_Model {
    /*
      Developed In: Clavis Technologies Pvt Ltd.
      Modification History
      Create Date   Author			Description
      __________  _______________  ________________________________________
      04-03-2015     Ajay                   Model for Task
     */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function insertTask($data) {
        if ($this->checkTask($data)) {
            $this->db->insert('task', $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        } else {
            return false;
        }
    }

    /** function to update records */
    function updateTask($data) {
        if ($this->checkTask($data)) {
            $this->db->where('task_id', $data['task_id']);
            $this->db->update('task', $data);

            return $data['task_id'];
        } else {

            return false;
        }
    }

    function deleteTask($task_id) {

        $this->db->where('task_id', $task_id);
        $this->db->delete('task');

        return true;
    }

    function checkTask($data) {
        $this->db->select('*');
        $this->db->from('task');
        if (!empty($data['task_id'])) {

            $this->db->where_not_in('task_id', $data['task_id']);
        }
        $this->db->where('task_name', $data['task_name']);
        $query = $this->db->get();
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            return false;
        } else {
            return true;
        }
    }

    function listTask($task_id = NULL, $subactivity_name = NULL) {
        $this->db->select('*');
        $this->db->from('task');
        //$this->db->join('team', 'team.team_id = task.team_id');
        //$this->db->join('activity', 'activity.activity_id = task.activity_id');
        //$this->db->join('sub_activity', 'sub_activity.subactivity_id = task.subactivity_id');
        $this->db->order_by('task_name', 'asc');
        if (!empty($task_id)) {
            $this->db->where('task_id', $task_id);
        }
        if (!empty($subactivity_name)) {
            $this->db->where('subactivity_name', $subactivity_name);
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

    function taskDetail($task_id = NULL) {
        $this->db->select('*');
        $this->db->from('task');
        $this->db->order_by('task_name', 'asc');
        if (!empty($task_id)) {
            $this->db->where('task_id', $task_id);
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
