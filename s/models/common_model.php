<?php

class Common_model extends CI_Model {
    /* This source is part of the Print Media Software System and is
      copyrighted by Clavis Technologies Pvt Ltd.

      All rights reserved.  No part of this work may be reproduced, stored in a
      retrieval system, adopted or transmitted in any form or by any means,
      electronic, mechanical, photographic, graphic, optic recording or otherwise,
      translated in any language or computer language, without the prior written
      permission of Clavis Technologies Pvt Ltd.

      Clavis Technologies Pvt Ltd
      Copyright © 2006 Clavis Technologies Pvt Ltd.


      Modification History

      Date		Version		Author			Description
      __________	___________	_______________ ________________________________________
      28-03-2013	 1.0             Hilal/Neeraj
     */

   public function __construct() {
        parent::__construct();
        $this->load->database();
    }
        function getUserPrivileges($info){
       // $saltPassword = $info['saltPassword'];
        $userPrimeryId = $info['userPrimeryId'];
        //$sqlQuery = "SELECT userPrivileges  FROM employee WHERE id='" . $userPrimeryId . "'";
        
        //$sqlQuery = "SELECT id, empId, empName, accessLevel, profilepic, designation, deptId, currentTeamId, emailId,userPrivileges FROM employee WHERE emailId = 'dileepdileep45@gmail.com' ";
    $sqlQuery = "SELECT UR.role_name,UR.user_privileges
FROM employee AS EM
LEFT JOIN user_role AS UR ON EM.usrRoleld = UR.role_id
WHERE EM.id ='" . $userPrimeryId . "'";
        $query = $this->db->query($sqlQuery);
        
       return  $query->row();

    }
    
     function addToHistory($data){
       
        $this->db->insert('history', $data);
        return true;
    }
    function listHistory($emp_id=NULL){
       
         $this->db->select('*');
        $this->db->from('history');
       if (!empty($emp_id)) {
            $this->db->where('emp_id', $emp_id);
        }
        $this->db->order_by('created', 'asc');
        
        $query = $this->db->get();
      
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    
    function listDateofConf($emp_id){
        $query = $this->db->query("SELECT dateOfConfirmation,probation_period,DATEDIFF(CURDATE(),dateJoining) as no_of_days,apply_leave,dateJoining FROM employee where id='".$emp_id."'");
       
              
        //echo $this->db->last_query();die;   
       // $query = $this->db->get();
      
        $result = $query->result();
           if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    
}