<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

  ##########################################################################
  #                                                                        # 
  #    Developed In: Clavis Technologies Pvt Ltd.                          #
  #    Modification History                                                #
  #    Create Date   Author			Description                # 
  #    __________  _______________  _______________________________________#_
  #    17-02-2015     Dablu                   Controllers for User role    #  
  #                                                                        # 
  ##########################################################################
class User_role extends CI_Controller {

    function __construct() {
        // Construct our parent class
        parent::__construct();
        $this->load->model('user_role_model');
    }
    
    function add_role() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        
        $role_name = $this->input->post('role_name');
        $all_userdata = $this->session->userdata('logged_in');
        $user_privileges='{"administration_control":{"company":{"View":"0","Add":"0","Edit":"0","Delete":"0"},"clients":{"View":"0","Add":"0","Edit":"0","Delete":"0"},"projects":{"View":"0","Add":"0","Edit":"0","Delete":"0"},"activity":{"View":"0","Add":"0","Edit":"0","Delete":"0"},"task":{"View":"0","Add":"0","Edit":"0","Delete":"0"},"team":{"View":"0","Add":"0","Edit":"0","Delete":"0"},"department":{"View":"0","Add":"0","Edit":"0","Delete":"0"},"user":{"View":"0","Add":"0","Edit":"0","Delete":"0","user_pdf":"0"},"report":{"View":"0","PrintReport":"0","ExportExcel":"0"},"user_role":{"View":"0","Add":"0","Edit":"0","Delete":"0"}},"client_database":{"database":{"download_pdf":"0","excel_export":"0","view_edit_details":"0"},"client":{"View":"0","Add":"0","Edit":"0","Delete":"0"},"client_report":{"Print":"0","ExportExcel":"0","View":"0"},"accounts":{"View":"0","Add":"0","Edit":"0","Delete":"0"},"director":{"View":"0","Add":"0","Edit":"0","Delete":"0"},"shareholder":{"View":"0","Add":"0","Edit":"0","Delete":"0"},"beneficial":{"View":"0","Add":"0","Edit":"0","Delete":"0"},"bank":{"View":"0","Add":"0","Edit":"0","Delete":"0"},"compliance":{"View":"0","Add":"0","Edit":"0","Delete":"0"},"substance":{"View":"0","Add":"0","Edit":"0","Delete":"0"},"occupation":{"View":"0","Add":"0","Edit":"0","Delete":"0"},"trust":{"View":"0","Add":"0","Edit":"0","Delete":"0"},"licence":{"View":"0","Add":"0","Edit":"0","Delete":"0"},"agm":{"View":"0","Add":"0","Edit":"0","Delete":"0"}},"leave_management":{"setholidaylist":{"View":"0","Add":"0","Edit":"0","Delete":"0"},"setleaves":{"View":"0","Add":"0","Edit":"0","Delete":"0","Forward":"0","Grant":"0"},"manageleave":{"View":"0","Add":"0","Edit":"0","Delete":"0","Leave_PDF":"0"},"applyleave":{"View":"0"},"pendingleave":{"View":"0"},"allemployee":{"View":"0"}},"timesheet":{"managetimesheet":{"View":"0","approve_reject":"0","submit_approval":"0","weekend_submission":"0"},"timesheet_status":{"View":"0","Add":"0","Edit":"0","Delete":"0"},"pendingtimesheet":{"View":"0"},"alltimesheet":{"View":"0"}},"dms":{"dms":{"View":"0"}}}';
        $data = array(
            'role_name' => $role_name ,
            'user_privileges'=> $user_privileges,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y:m:d h:i:s')
         );
        if($this->user_role_model->insertUserRole($data)){
            echo '{ "status" : "SUCCESS" , "message" : "User role added successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "A User role with the specified name already exists." }';
        }
        
    }
    
    function edit_user_role(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $user_role_id = $this->input->post('role_id');
        if($single_user_role_detail = $this->user_role_model->listUserRole($user_role_id)){
            echo json_encode($single_user_role_detail);
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "No record found." }';
        }
    }
    
    function submit_edit_user_role(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $user_role_id = $this->input->post('role_id');
        $user_role_name = $this->input->post('role_name');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'role_id' => $user_role_id ,
            'role_name' => $user_role_name,
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y:m:d h:i:s')
         );
        if($this->user_role_model->updateUserRole($data)){
            echo '{ "status" : "SUCCESS" , "message" : "User role updated successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "A User role with the specified name already exists." }';
        }
    }
    
    function delete_user_role(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $role_id = $this->input->post('role_id');
        if($this->user_role_model->deleteUserRole($role_id)){
            echo '{ "status" : "SUCCESS" , "message" : "User role deleted successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "You can not delete a User role." }';
        }
    }
    
    function chkRoleAllotedToEmploye(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $role_id = $this->input->post('role_id');
        if($this->user_role_model->chkRoleAllotedToEmploye($role_id)){
            echo '{ "status" : "SUCCESS" , "message" : "This role is already used."}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "User role not Exists." }';
        }
    }

    function list_user_role() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        
        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);

        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['user_role_detail'] =  $this->user_role_model->listUserRole();
        $data['page_url'] = 'user_role_content';
        $this->load->view('dashboard_page', $data);
   
    }  
    
    function list_user_privileges($role_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
         
        if($role_id==''){
          redirect(site_url("user_role/list_user_role"), 'refresh');
        }
        
        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
            
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['user_role_detail'] = $this->user_role_model->listUserPrivileges($role_id);
        
        $data['role_id'] = $role_id;
        
        $data['page_url'] = 'user_privileges_content';
        $this->load->view('dashboard_page', $data);
    }
    
        
    
     function submit_edit_user_privilages(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $user_role_id = $this->input->post('role_id');
        $user_priviliges = $this->input->post('user_privileges');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'role_id' => $user_role_id ,
            'user_privileges' => $user_priviliges,
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y:m:d h:i:s')
         );
        if($this->user_role_model->updateUserPrivileges($data)){
            echo  'User Privileges updated successfully.';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "Somthing Else :(." }';
        }
    }
    
   
}
