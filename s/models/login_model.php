<?php

class Login_model extends CI_Model {
    /* 

      Date		Version		Author			Description
      __________	___________	_______________ ________________________________________
      16-02-2015	 1.0             Ajay              User Login
     */

    function __construct() {
        parent::__construct();
    }

    function getLogin($emailId, $password) {

        $this->db->select('id,empId,empPassword,empName,profilepic,designation,deptId,currentTeamId,emailId,managerId,usrRoleld');
        $this->db->from('employee');
        $this->db->where('emailId', $emailId);

        $query = $this->db->get();

        $result = $query->result();
        $this->load->library('encrypt');
        $emp_password = $this->encrypt->decode($result[0]->empPassword);

        if ($emp_password == $password) {
            return $result;
        } else {
            return false;
        }
    }

    function checkEmailAddressExist($info) {
        $saltPassword = $info['saltPassword'];
        $email = $info['email'];

        $this->db->select('empId');
        $this->db->from('employee');
        $this->db->where('emailId', $email);

        $query = $this->db->get();

        $result = $query->result();
        
        if ($query->num_rows() == 1) {
            $this->load->library('encrypt');
            $saltPassword = $this->encrypt->encode($saltPassword);

            $data = array(
                'empPassword' => $saltPassword
            );

            $this->db->where('emailId', $email);
            $this->db->update('employee', $data);

            return $result;
        } else {

            return false;
        }
    }

    function getEmployeeRecord($info) {
        $userPrimeryId = $info['userPrimeryId'];
        $sqlQuery = "SELECT * FROM employee WHERE id='" . $userPrimeryId . "'";

        //$sqlQuery = "SELECT id, empId, empName, accessLevel, profilepic, designation, deptId, currentTeamId, emailId,userPrivileges FROM employee WHERE emailId = 'dileepdileep45@gmail.com' ";

        $query = $this->db->query($sqlQuery);

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {

            return false;
        }
    }

    function checkEmployeeByOldPassword($info) {
        $userPrimeryId = $info['userPrimeryId'];
        $oldPassword = $info['oldPassword'];
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('id', $userPrimeryId);

        $query = $this->db->get();

        $result = $query->result();
        $this->load->library('encrypt');
        $emp_password = $this->encrypt->decode($result[0]->empPassword);

        if ($emp_password == $oldPassword) {
            return $result;
        } else {
            return false;
        }
    }

    function updatePassword($info) {
        $userPrimeryId = $info['userPrimeryId'];
        $this->load->library('encrypt');
        $newPassword = $this->encrypt->encode($info['newPassword']);
        $data = array(
            'empPassword' => $newPassword
        );

        $this->db->where('id', $userPrimeryId);
        $this->db->update('employee', $data);


        return true;
    }

}

?>
