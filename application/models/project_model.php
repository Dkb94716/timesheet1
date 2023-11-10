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
        $data['status'] = 0;
        $this->db->where('project_id', $project_id);
        $this->db->update('project', $data);
        // $this->db->delete('project');
         
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
        $this->db->where('project_status !=',"Completed"); 
        $this->db->where('status !=',0); 
        $query = $this->db->get();
        $result = $query->result();
        //  echo  $sql = $this->db->last_query(); die;
            if ($query->num_rows() == 0) {
                return false;
            } else {
                return $result;
            }
    }

    function listProject_report($project_id=NULL,$client_name=NULL){
        $this->db->select('*');
        $this->db->from('project');
        $this->db->order_by('project_name', 'asc');
        if(!empty($project_id))
        {
           $this->db->where('project_id', $project_id); 
        }
        if(!empty($client_name))
        {
           $this->db->where('client_name', $client_name); 
        }
        // $this->db->where('project_status !=',"Completed"); 
        $query = $this->db->get();
        $result = $query->result();
        
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }


    function listManager(){
        $this->db->select('*');
        $this->db->from('manager');
        $this->db->order_by('name', 'asc');
        $this->db->where('status !=',"Inactive"); 
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
       

    function listProject_new($project_id=NULL,$client_name=NULL){
        $this->db->select('*');
        $this->db->from('project');
	   
        $this->db->order_by('project_name', 'asc');
        if(!empty($project_id))
        {
           $this->db->where('project_id', $project_id); 
        }
        if(!empty($client_name))
        {
           $this->db->where('client_name', $client_name); 
        }
        $this->db->where_in('project_status',['Active','In-Progress']);
        
        $query = $this->db->get();
        $result = $query->result();
        // echo  $sql = $this->db->last_query(); die;
            if ($query->num_rows() == 0) {
                return false;
            } else {
                return $result;
            }
    }

    //  Completed Project
    function listProject_com($project_id=NULL,$client_name=NULL){
        $this->db->select('*');
        $this->db->from('project');
        $this->db->order_by('project_name', 'asc');
        if(!empty($project_id))
        {
           $this->db->where('project_id', $project_id); 
        }
        if(!empty($client_name))
        {
           $this->db->where('client_name', $client_name); 
        }
        $this->db->where('project_status =',"Completed"); 
        
        $query = $this->db->get();
        $result = $query->result();
        // echo     $sql = $this->db->last_query();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }

    
    /*  Start Here  */
    function listUsers(){
        $this->db->select('id,empId,empName,surname');
        $this->db->from('employee');
        $this->db->order_by('empName', 'asc');
        // $this->db->where('status !=',"Inactive"); 
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function insertProject_assign_user($data) {
            $this->db->insert('project_assign_to_users', $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
    }

    function listProject_assigned_to_user($project_id=NULL,$client_name=NULL){
        $this->db->select('project_assign_to_users.*,project.project_status');
        $this->db->from('project_assign_to_users');
        $this->db->join('project', 'project_assign_to_users.project_name = project.project_name','left');
        $this->db->order_by('created', 'DESC');
        $query = $this->db->get();
        $result = $query->result();
            if ($query->num_rows() == 0) {
                return false;
            } else {
                return $result;
            }
    }

    function deleteProjectAssigned($project_id) {
        $this->db->where('project_id', $project_id);
        $this->db->delete('project_assign_to_users');
        return true;
    }

    function listProjectAssignedEdit($project_id=NULL){
        $this->db->select('*');
        $this->db->from('project_assign_to_users');
        if(!empty($project_id))
        {
           $this->db->where('project_id', $project_id); 
        }
        $query = $this->db->get();
        $result = $query->result();
        
            if ($query->num_rows() == 0) {
                return false;
            } else {
                return $result;
            }
    }

    function listProject_new_assign($project_id=NULL,$client_name=NULL,$user_name=NULL){
       
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('project_assign_to_users', 'project.project_name = project_assign_to_users.project_name');
        $this->db->order_by('project.project_name', 'asc');
        if(!empty($project_id))
        {
           $this->db->where('project.project_id', $project_id); 
        }
        if(!empty($client_name))
        {
           $this->db->where('project.client_name', $client_name); 
        }
        $this->db->where_in('project.project_status',['Active','In-Progress']);
        $this->db->where('project_assign_to_users.user_name',$user_name); 
        $query = $this->db->get();
        $result = $query->result();
        if($query->num_rows()==0) {
            return false;
        } else {
            return $result;
        }
    }

    function allManagerList(){
        $this->db->select('*');
        $this->db->from('manager');
        $this->db->order_by('name', 'asc');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function insertManager($data) {
        $this->db->select('*');
        $this->db->from('manager');
        $this->db->where('name', $data['name']);
        $query = $this->db->get();
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            return false;
        } else {
            $this->db->insert('manager', $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }
    }

    function updateManager($data) {
        $this->db->select('*');
        $this->db->from('manager');
        $this->db->where('id', $data['id']);
        $query = $this->db->get();
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            $this->db->where('id', $data['id']);
            $this->db->update('manager', $data);
            return $data['id'];
        } else {
            return false;
        }
    }
    /* End Here */

    function listProjectByClient($project_id=NULL,$client_name=NULL){
        $this->db->select('*');
        $this->db->from('project');
	   
        $this->db->order_by('project_name', 'asc');
        if(!empty($project_id))
        {
           $this->db->where('project_id', $project_id); 
        }
        if(!empty($client_name))
        {
           $this->db->where('client_name', $client_name); 
        }
        $this->db->where_in('project_status',['Active','In-Progress','Completed']);
        
        $query = $this->db->get();
        $result = $query->result();
        // echo  $sql = $this->db->last_query(); die;
            if ($query->num_rows() == 0) {
                return false;
            } else {
                return $result;
            }
    }

}
