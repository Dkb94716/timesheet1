<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

  ##########################################################################
  #                                                                        # 
  #    Developed In: Clavis Technologies Pvt Ltd.                          #
  #    Modification History                                                #
  #    Create Date   Author			Description                # 
  #    __________  _______________  _______________________________________#_
  #    17-02-2015     Dablu                   Controllers for User Role    #  
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
        $data = array(
            'role_name' => $role_name ,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y:m:d h:i:s')
         );
        if($this->user_role_model->insertUserRole($data)){
            echo '{ "status" : "SUCCESS" , "message" : "User Role added successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "A User Role with the specified name already exists. Please enter another value for the company name." }';
        }
        
    }
    
    function edit_user_role(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $user_role_id = $this->input->post('user_role_id');
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
            echo '{ "status" : "SUCCESS" , "message" : "User Role updated successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "A User Role with the specified name already exists. Please enter another value for the company name." }';
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
            echo '{ "status" : "FAILED" , "message" : "You can not delete a User Role." }';
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
        $data['user_role_detail'] = $this->user_role_model->listUserRole();
        
        $data['page_url'] = 'user_role_content';
        $this->load->view('dashboard_page', $data);
    }
    
    function list_user_privileges($role_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
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
    
        
    
    
    
    
    
    

}
