<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  Project Name : Timesheet
  Developed In: Clavis Technologies Pvt Ltd.
  Modification History
  Create Date           Version         Author			Description                                Last modified
  __________	___________	_______________   ________________________________________  ________________________________________
  16-02-2015            1.0             Ajay                 Controller for Company                        16-02-2015
 */

class Company extends CI_Controller {

    function __construct() {
        // Construct our parent class
        parent::__construct();
        $this->load->model('company_model');
    }
    
    function add_company() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        
        $company_name = $this->input->post('company_name');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'company_name' => trim($company_name) ,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
         );
        if($company_id = $this->company_model->insertCompany($data)){
            if(isset($_FILES["company_logo"]['name'])){
            $upload_file = $this->do_upload('company_logo',$company_id);
        if (@$upload_file['error']) {
            echo '{ "status" : "SUCCESS" , "message" : "'.$upload_file['error'].'"}';
           
        } else {
            $logo['company_logo'] = $upload_file['upload_data']['file_name'];
            $logo['company_id'] = $company_id;
            $this->company_model->updateCompanyLogo($logo);
        }
           
            }
             $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Added Company',
                'message' => trim($company_name). ' has been added.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Company added successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "A Company with the specified name already exists." }';
        }
        
    }
    
    function edit_company(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $company_id = $this->input->post('company_id');
        if($single_company_detail = $this->company_model->listCompany($company_id)){
            echo json_encode($single_company_detail);
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "No record found." }';
        }
    }
    
    function submit_edit_company(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $company_id = $this->input->post('company_id');
        $company_name = $this->input->post('company_name');
        $prev_company_logo = $this->input->post('prev_company_logo');
        $logo_delete_flag = $this->input->post('logo_delete_flag');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'company_id' => $company_id ,
            'company_name' => trim($company_name) ,
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
         );
        if($this->company_model->updateCompany($data)){
            if(isset($_FILES["company_logo"]['name'])){
                if(file_exists(realpath("uploads/company").'/'.$prev_company_logo)){
                unlink(realpath("uploads/company").'/'.$prev_company_logo);
                }
            $upload_file = $this->do_upload('company_logo',$company_id);
        if (@$upload_file['error']) {
            echo '{ "status" : "SUCCESS" , "message" : "'.$upload_file['error'].'"}';
           
        } else {
            $logo['company_logo'] = $upload_file['upload_data']['file_name'];
            $logo['company_id'] = $company_id;
            $this->company_model->updateCompanyLogo($logo);
        }
            }
            elseif($logo_delete_flag==1){
            $logo['company_logo'] = '';
            $logo['company_id'] = $company_id;
            $this->company_model->updateCompanyLogo($logo);
            }
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Updated Company',
                'message' => trim($company_name). ' has been updated.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Company updated successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "A Company with the specified name already exists." }';
        }
    }
    
    function delete_company(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $company_id = $this->input->post('company_id');
        $company_logo = $this->input->post('company_logo');
        if($this->company_model->deleteCompany($company_id)){
            if(file_exists(realpath("uploads/company").'/'.$company_logo)){
                unlink(realpath("uploads/company").'/'.$company_logo);
                }
                $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Deleted Company',
                'message' => 'Company deleted.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Company deleted successfully. "}';
        }
        else{
            echo '{ "status" : "FAILED" , "message" : "You can not delete a company." }';
        }
    }
    
     
    

    function company_list() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        
        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);

        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['company_detail'] = $this->company_model->listCompany();
        
        $data['page_url'] = 'company_content';
        $this->load->view('dashboard_page', $data);
    }
    
       function do_upload($file_name,$company_id) {

        $new_name = $_FILES["company_logo"]['name'];
        $info = new SplFileInfo($new_name);
        $new_name = 'logo_'.$company_id.'.'.$info->getExtension();
        $config['file_name'] = $new_name;
        $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]) . '/uploads/company/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '10';
        /* $config['max_width']  = '1024';
          $config['max_height']  = '768'; */

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($file_name)) {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        } else {
            $data = array('upload_data' => $this->upload->data());
            return $data;
        }
    }

}