<?php


class User_role_model extends CI_Model {
  ##########################################################################
  #                                                                        # 
  #    Developed In: Clavis Technologies Pvt Ltd.                          #
  #    Modification History                                                #
  #    Create Date   Author			Description                # 
  #    __________  _______________  _______________________________________#_
  #    17-02-2015     Dablu                   Model for Usedr Role         #  
  #                                                                        # 
  ##########################################################################
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function insertUserRole($data) {
        if ($this->checkUserRole($data)) {
            $this->db->insert('user_role', $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        } else {
            return false;
        }
    }

    /** function to update records */
    function updateUserRole($data) {
        if ($this->checkUserRole($data)) {
            $this->db->where('role_id', $data['role_id']);
            $this->db->update('user_role', $data);
            return $data['role_id'];
        } else {
            
            return false;
        }
    }

    function deleteUserRole($role_id) {

        $this->db->where('role_id', $role_id);
        $this->db->delete('user_role');
         
        return true;
        
    }

    function checkUserRole($data) {
        $this->db->select('*');
        $this->db->from('user_role');
//        if (!empty($data['role_id'])) {
//            
//            $this->db->where_not_in('role_id', $data['role_id']);
//        }
        $this->db->where('role_name', $data['role_name']);
         $query = $this->db->get();
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            return false;
        } else {
            return true;
        }
    }
    
    function chkRoleAllotedToEmploye($data){
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('usrRoleld', $data);
        $query = $this->db->get();
        $num_rows = $query->num_rows();
        if ($num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    function listUserRole($role_id=NULL){
        $this->db->select('*');
        $this->db->from('user_role');
         $this->db->where_not_in('role_id',1);
        $this->db->order_by('role_name', 'asc');
        if(!empty($role_id))
        {
           $this->db->where('role_id', $role_id); 
        }
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query(); 
            if ($query->num_rows() == 0) {
                return false;
            } else {
                return $result;
            }
        }
     
    
    function listUserPrivileges($role_id){
        
        $this->db->select('*');
        $this->db->from('user_role');
        if(!empty($role_id))
        {
           $this->db->where('role_id',$role_id); 
        }
        $query = $this->db->get();
        $result = $query->result();
         //$this->db->last_query();   
        if ($query->num_rows() == 0) {
                return false;
            } else {
                return $result;
            }
        }

        function updateUserPrivileges($data) {
       
            $this->db->where('role_id', $data['role_id']);
            $this->db->update('user_role', $data);
           /// $this->db->last_query();
            return $data['role_id'];
        
         }
         
      
        
}
