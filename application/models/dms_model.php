<?php

class DMS_model extends CI_Model {
    /*
      Developed In: Clavis Technologies Pvt Ltd.
      Modification History
      Create Date   Author			Description
      __________  _______________  ________________________________________
      17-02-2015     Ajay                   Model for Client
     */
private $secound_db;
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->secound_db = $this->load->database('database_two', TRUE);
    }

   function addDMSUser($user_info,$okm_role){
        $this->secound_db->insert('okm_user', $user_info);
        $insert_id = $this->secound_db->insert_id();
        $this->secound_db->insert('okm_user_role', $okm_role);
        $insert_id = $this->secound_db->insert_id();
        return $insert_id;
    }
	function updateDMSUserPassword($user_info,$USR_ID){
        $this->db->where('USR_ID', $USR_ID);
        $this->db->update('okm_user', $user_info);
        return $USR_ID;
    }
	function resetDMSUserPassword($user_info,$USR_EMAIL){
        $this->db->where('USR_EMAIL', $USR_EMAIL);
        $this->db->update('okm_user', $user_info);
        return $USR_EMAIL;
    }
	function deleteDMSUser($USR_ID) {

        $this->db->where('UR_USER', $USR_ID);
        $this->db->delete('okm_user_role');
		$this->db->where('USR_ID', $USR_ID);
        $this->db->delete('okm_user');

        return true;
    }

}
