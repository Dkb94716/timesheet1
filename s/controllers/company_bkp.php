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
        
         $newfilename ='';
        $company_name = $this->input->post('company_name');
       if($_FILES['company_logo']['name']!= "")
        {
        $product_image=$_FILES['company_logo']['name'];
        //$filename=$_FILES["file"]["tmp_name"];
        $prod='logo_'.$company_name;
        $extension=end(explode(".", $product_image));
        $newfilename=$prod .".".$extension;
        move_uploaded_file($_FILES['company_logo']['tmp_name'], "uploads/company/$newfilename");
      
        }

       
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'company_name' => $company_name ,
            'company_logo'=> $newfilename,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
         );
        if($this->company_model->insertCompany($data)){
           $success_msg1='Company added successfully.';
          $company_message1 = array(
			'success_company1' => $success_msg1
                );
	 $this->session->set_userdata($company_message1);
        }
        else{
          $errmsg_already_company1='A Company with the specified name already exists. Please enter another value for the company name';
           $company_error1= array(
			'error_company1' =>$errmsg_already_company1 
       	);
           $this->session->set_userdata($company_error11);
          }
         
         //redirect('/company/company_list/', 'refresh'); 
        
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
    
    function submit_edit_company($id){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
	$newfilename ='';
        $company_name = $this->input->post('edit_company_name');
        $product_image ='';
        if($_FILES['company_logo']['name']!= "")
        {
            
        $product_image=$_FILES['company_logo']['name'];
        //$filename=$_FILES["file"]["tmp_name"];
        $prod='logo_'. $company_name;
        $extension=end(explode(".", $product_image));
        $newfilename=$prod .".".$extension;
        move_uploaded_file($_FILES['company_logo']['tmp_name'], "uploads/company/$newfilename");
        }
	$company_id = $id; 
        $all_userdata = $this->session->userdata('logged_in');
       if($_FILES['company_logo']['name']!= "")
        {
        $data = array(
            'company_id' => $company_id ,
            'company_logo'=>$newfilename,
            'company_name' => $company_name ,
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
         );
        }
        else
        {
            
         $data = array(
            'company_id' => $company_id ,
            'company_name' => $company_name ,
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
         );   
            
        }
        
        
        
        if($this->company_model->updateCompany($data)){
           $success_msg='Company Updated successfully.';
          $company_message = array(
			'success_company' => $success_msg
                );
	 $this->session->set_userdata($company_message);
        }
        else{
          $errmsg_already_company='A Company with the specified name already exists. Please enter another value for the company name';
           $company_error = array(
			'error_company' =>$errmsg_already_company 
       	);
           $this->session->set_userdata($company_error);
          }
         
         redirect('/company/company_list/', 'refresh'); 
        
    }
    
    function delete_company(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $company_id = $this->input->post('company_id');
        if($this->company_model->deleteCompany($company_id)){
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

} 