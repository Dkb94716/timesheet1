<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  Project Name : Timesheet
  Developed In: Clavis Technologies Pvt Ltd.
  Modification History
  Create Date           Version         Author			Description                                Last modified
  __________	___________	_______________   ________________________________________  ________________________________________
  17-02-2015            1.0             Ajay                 Controller for Client                        17-02-2015
 */

class Databaseinfo extends CI_Controller {

    function __construct() {
        // Construct our parent class
        parent::__construct();
		$this->load->model('client_model');
        $this->load->model('databaseinfo_model');
        $this->load->model('company_model');
        $this->load->model('team_model');
        $this->load->library('test/TestFolder');
    }
    
    function get_tab(){
        $tab = $this->input->get('tab');
        $client_id = $this->input->get('client_id');
        $client_name = $this->input->get('client_name');
        $data['client_id'] = $client_id;
        $data['client_name'] = $client_name;
        $this->load->view("db/".$tab,$data);
    }
    
    function modal_box_data(){
       $data['title']= $this->input->post('title');
       $data['element_id']= $this->input->post('element_id');
       $data['placeholder']= $this->input->post('placeholder');
       $data['dbname']= $this->input->post('dbname');
       $data['item_name']= $this->input->post('item_name');
       $data['item_id']= $this->input->post('item_id');
       $data['db_field_name'] = $this->input->post('db_field_name');
       $data['db_field_id'] = $this->input->post('db_field_id');
       $data['action'] = $this->input->post('action');
       $data['message_title'] = $this->input->post('message_title');
             
        try {
            $return_arr = $this->databaseinfo_model->modalBoxOperation($data);
        }  catch (Exception $e) {
            $message = $e->getMessage();
            if (strpos($message,'Cannot delete or update a parent row') !== false) {
                $message = "foreign";
            }
            if($message=="foreign"){
                if($data['message_title']=="license type"){
                    $delete_to = $data['message_title'];
                    $associated_with = "licenses";
                }
                
                if($data['message_title']=="permit type"){
                    $delete_to = $data['message_title'];
                    $associated_with = "permits";
                }
                
                if($data['message_title']=="bank"){
                    $delete_to = "bank name";
                    $associated_with = "banks";
                }
                
                if($data['message_title']=="type of account"){
                    $delete_to = $data['message_title'];
                    $associated_with = "banks";
                }
                
                if($data['message_title']=="currency"){
                    $delete_to = $data['message_title'];
                    $associated_with = "banks";
                }
                
                if($data['message_title']=="account no."){
                    $delete_to = $data['message_title'];
                    $associated_with = "banks";
                }
                
                if($data['message_title']=="type of share"){
                    $delete_to = $data['message_title'];
                    $associated_with = "shareholders";
                }
                
                $message = "Cannot delete item because it is being used by another records.";
                
//                $message = "This ".$delete_to." has ".$associated_with." associated with them. Please delete all ".$associated_with." associated and try deleting the ".$delete_to." again.";
            }
            $status = 0;
            $data_results = $this->databaseinfo_model->getModalListOnDelete($data);
            $return_arr = array(
                                'status'=>$status,
                                'message'=>$message,
                                'data'=>$data_results,
                                'insert_id'=>"foreign"
                              );        
                }
       
       echo json_encode($return_arr);
    
    }
    
    function submit_license_form($client_id){
        $session_data = $this->session->all_userdata();
        $userPrimeryId = $session_data['logged_in']['userPrimeryId'];
        $data['license_type'] = $this->input->post('license_type');
//        2015-10-05 00:00:00
        $data['issue_date'] = ($this->input->post('issue_date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('issue_date'))):'0000-00-00 00:00:00';
        $data['expiry_date'] = ($this->input->post('expiry_date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('expiry_date'))):'0000-00-00 00:00:00';
        $data['licensing_cond'] = $this->input->post('licensing_cond');
        $data['license_no'] = $this->input->post('license_no');
        $data['client_id'] = $client_id;
        if($this->input->post('action')=="add"){
            $data['created_by'] = $userPrimeryId;
            $data['created_on'] = date('Y-m-d - H:i:s');
        }
        $data['updated_by'] = $userPrimeryId;
        $data['updated_on'] = date('Y-m-d - H:i:s');
        $data['is_active'] = 1;
        $additional_data['id'] = $this->input->post('id');
        $additional_data['action'] = $this->input->post('action');
        // call common function for add update item form
        $attribute_id = 'license_id';
        $db_name = 'db_lp_license';
        try {
            $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);
            if($additional_data['action']=="add")
                $message = LICENSE_ADD;
            else if($additional_data['action']=="edit")
                $message = LICENSE_EDIT;
            else
                $message = LICENSE_DELETE;
            $success = 1;
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                                'message'=>$message,
                                'success'=>$success
                            );
        echo json_encode($return_arr);
    }
    
    function get_license_grid_data(){
        $client_id = $this->input->post('client_id');
        $license_permit_data = $this->databaseinfo_model->getLicensePermitData($client_id);
        $data['license_data'] = $license_permit_data['license_data'];
        $data['license_data1'] =  $this->databaseinfo_model->getCorporateDataValues($client_id);
          //echo "<pre>"; print_r($data['license_data']); 
        //echo "<pre>"; print_r($data['license_data1']);
        $this->load->view("db/LicensePermit/license_grid_data",$data);
    }
    
    function get_item_detail_for_edit(){
        $id = $this->input->post('id');
        $db_name = $this->input->post('db_name');
        $tag = $this->input->post('tag');
        $view_folder = $this->input->post('view_folder');
        $db_field_id = $this->input->post('db_field_id');
        $data['detail'] = $this->databaseinfo_model->getDetail($id,$db_name,$db_field_id);
                   
        $this->load->view("db/".$view_folder."/".$tag."_edit_bar",$data);

    }
    
    function delete_item(){
        $data['id'] = $this->input->post('id');
        $data['db_name'] = $this->input->post('db_name');
        $data['db_field_id'] = $this->input->post('db_field_id');
        $item_name = $this->input->post('item_name');
        try {
            $this->databaseinfo_model->deleteItem($data);
            $message = $item_name." has been deleted successfully.";
            $success = 1;
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                                'message'=>$message,
                                'success'=>$success
                            );
        echo json_encode($return_arr);
    }
    
    function submit_permit_form($client_id){
        $session_data = $this->session->all_userdata();
        $userPrimeryId = $session_data['logged_in']['userPrimeryId'];
        $data['permit_type'] = $this->input->post('permit_type');
        $data['issue_date'] = ($this->input->post('issue_date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('issue_date'))):'0000-00-00 00:00:00';
        $data['expiry_date'] = ($this->input->post('expiry_date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('expiry_date'))):'0000-00-00 00:00:00';
        $data['name_of_permit_holder'] = $this->input->post('name_of_permit_holder');
        $data['remark'] = $this->input->post('remark');
        $data['client_id'] = $client_id;
        if($this->input->post('action')=="add"){
            $data['created_by'] = $userPrimeryId;
            $data['created_on'] = date('Y-m-d - H:i:s');
        }
        $data['updated_by'] = $userPrimeryId;
        $data['updated_on'] = date('Y-m-d - H:i:s');
        $data['is_active'] = 1;
        $additional_data['id'] = $this->input->post('id');
        $additional_data['action'] = $this->input->post('action');
        // call common function for add update item form
        $attribute_id = 'permit_id';
        $db_name = 'db_lp_permit';
        try {
            $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);
            if($additional_data['action']=="add")
                $message = PERMIT_ADD;
            else if($additional_data['action']=="edit")
                $message = PERMIT_EDIT;
            else
                $message = PERMIT_DELETE;
            $success = 1;
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                                'message'=>$message,
                                'success'=>$success
                            );
        echo json_encode($return_arr);
    }
    
    function get_permit_grid_data(){
        $client_id = $this->input->post('client_id');
        $license_permit_data = $this->databaseinfo_model->getLicensePermitData($client_id);
        $data['permit_data'] = $license_permit_data['permit_data'];
//        echo "<pre>"; print_r($data['license_data']); 
        $this->load->view("db/LicensePermit/permit_grid_data",$data);
    }
    
    function submit_bank_form($client_id){
        $session_data = $this->session->all_userdata();
        $userPrimeryId = $session_data['logged_in']['userPrimeryId'];
        $data['status'] = $this->input->post('status');
        $data['bank_name_id'] = $this->input->post('bank_name_id');
        $data['account_type_id'] = $this->input->post('account_type_id');
        $data['currency_id'] = $this->input->post('currency_id');
        $data['accountno_id'] = $this->input->post('accountno_id');
        $data['account_no'] = $this->input->post('account_no');       
        //$data['signing_mangate'] = $this->input->post('signing_mangate');
        $data['date_of_min_resu'] = ($this->input->post('date_of_min_resu')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date_of_min_resu'))):'0000-00-00 00:00:00';
        $data['is_internet_banking'] = $this->input->post('is_internet_banking');
        
        if($data['is_internet_banking']==1)
            $data['type_facility'] = $this->input->post('type_facility');
        else
            $data['type_facility'] = '';
        
        $data['remark'] = $this->input->post('remark');
        $data['client_id'] = $client_id;
        if($this->input->post('action')=="add"){
            $data['created_by'] = $userPrimeryId;
            $data['created_on'] = date('Y-m-d - H:i:s');
        }
        $data['updated_by'] = $userPrimeryId;
        $data['updated_on'] = date('Y-m-d - H:i:s');
        $data['is_active'] = 1;
        $additional_data['id'] = $this->input->post('id');
        $additional_data['action'] = $this->input->post('action');
        // call common function for add update item form
        $attribute_id = 'bank_id';
        $db_name = 'db_bank_info';
        try {
            $bank_id = $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);
            
             $signing_mangate = $this->input->post('signing_mangate');
             if(!empty($signing_mangate) ){
                 if(!empty($additional_data['id'])){
                        $attribute_id = 'bank_id';
                        $db_name = 'db_ba_signing_mandate';
                        $delete_previous_data = array(
                                            'db_field_id'=>$attribute_id,
                                            'db_name'=>$db_name,
                                            'id'=>$additional_data['id'],
                                         );
                    $this->databaseinfo_model->deleteItem($delete_previous_data);  
                 }
                 
                  for($i=0;$i<count($signing_mangate);$i++){
                      
                      if(!empty($signing_mangate[$i])){
                                             $relational_data_arr = array(
                                                  'bank_id'=>$bank_id,
                                                  'signing_mandate'=>$signing_mangate[$i],                                                  
                                              ); 
                     
                        $db_name = 'db_ba_signing_mandate';
                        $this->databaseinfo_model->postRelationalItemData($relational_data_arr,NULL,NULL,$db_name);
                      }
                  }
                 
             }            
            
            
            if($additional_data['action']=="add")
                $message = BANK_ADD;
            else if($additional_data['action']=="edit")
                $message = BANK_EDIT;
            else
                $message = BANK_DELETE;
            $success = 1;
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                                'message'=>$message,
                                'success'=>$success
                            );
        echo json_encode($return_arr);
    }

    function get_bank_grid_data(){
        $client_id = $this->input->post('client_id');
        $bank_data = $this->databaseinfo_model->getBankData($client_id);
        $data['bank_data'] = $bank_data;
        $this->load->view("db/BankInfo/bank_grid_data",$data);
    }
    
    function submit_account_form($client_id){
        $financial_year = $this->input->post('financial_year_edit');
//        echo count($financial_year);
//        echo "<pre />"; print_r($financial_year); die;
        
        $session_data = $this->session->all_userdata();
        $userPrimeryId = $session_data['logged_in']['userPrimeryId'];
        $data['account_team'] = $this->input->post('account_team');
        $data['financial_year_date'] = $this->input->post('financial_year_date');
        $data['financial_year_month'] = $this->input->post('financial_year_month');
        $data['adopted_at_agm'] = $this->input->post('adopted_at_agm');
        
        if($data['adopted_at_agm']==0)
            $data['special_meeting_on'] = ($this->input->post('special_meeting_on')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('special_meeting_on'))):'0000-00-00 00:00:00';
        else
            $data['special_meeting_on'] = '0000-00-00 00:00:00';
         $data['client_id'] = $client_id;
        if($this->input->post('action')=="add"){
            $data['created_by'] = $userPrimeryId;
            $data['created_on'] = date('Y-m-d - H:i:s');
        }
        $data['updated_by'] = $userPrimeryId;
        $data['updated_on'] = date('Y-m-d - H:i:s');
        $data['is_active'] = 1;
        $additional_data['id'] = $this->input->post('id');
        $additional_data['action'] = $this->input->post('action');
        $attribute_id = 'account_id';
        $db_name = 'db_fta_accounts';
        try {
           
            $id = $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);
            if($additional_data['action']=="add"){
                $financial_year = $this->input->post('financial_year');
                $date_filed = $this->input->post('date_filed');
            } else {
                $financial_year = $this->input->post('financial_year_edit');
                $date_filed = $this->input->post('date_filed_edit');
            }
          
            $attribute_id = 'account_id';
            $db_name = 'db_fta_accounts_values';
            $delete_previous_data = array(
                                            'db_field_id'=>$attribute_id,
                                            'db_name'=>$db_name,
                                            'id'=>$id,
                                         );
            $this->databaseinfo_model->deleteItem($delete_previous_data);  
            
            if(!empty($financial_year) ){
                for($i=0;$i<count($financial_year);$i++){
                  $relational_data_arr = array(
                                                  'financial_year'=>($financial_year[$i]=="")?"0000-00-00 00:00:00":date('Y-m-d - H:i:s',  strtotime($financial_year[$i])),
                                                  'date_filed'=>($date_filed[$i]=="")?"0000-00-00 00:00:00":date('Y-m-d - H:i:s',  strtotime($date_filed[$i])),
                                                  'account_id'=>$id
                                              );
                  $attribute_id = 'auto_id';
                  $db_name = 'db_fta_accounts_values';
                  $this->databaseinfo_model->postRelationalItemData($relational_data_arr,$id,$attribute_id,$db_name);
              }
            }
            if($additional_data['action']=="edit")
                $message = ACCOUNT_EDIT;
            else 
                $message = ACCOUNT_ADD;
            
            $success = 1;
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                                'message'=>$message,
                                'success'=>$success
                            );
        echo json_encode($return_arr);
    }

    function get_account_grid_data(){
        $client_id = $this->input->post('client_id');
        $account_data = $this->databaseinfo_model->getAccountData($client_id);
        $data['account_data'] = $account_data;
        $this->load->view("db/Finance_tax_audit/account_grid_data",$data);
    }
    
    function submit_auditor_form($client_id){
        
        $session_data = $this->session->all_userdata();
        $userPrimeryId = $session_data['logged_in']['userPrimeryId'];
        $data['auditors'] = $this->input->post('auditors');
        $data['resignation_date'] = ($this->input->post('resignation_date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('resignation_date'))):'0000-00-00 00:00:00';
        $data['appointment_date'] = ($this->input->post('appointment_date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('appointment_date'))):'0000-00-00 00:00:00';
        $data['remark']=$this->input->post('remark');

        if($this->input->post('action')=="add"){
            $data['created_by'] = $userPrimeryId;
            $data['created_on'] = date('Y-m-d - H:i:s');
        }
        $data['client_id'] = $client_id;
        $data['updated_by'] = $userPrimeryId;
        $data['updated_on'] = date('Y-m-d - H:i:s');
        $data['is_active'] = 1;
        $additional_data['id'] = $this->input->post('id');
        $additional_data['action'] = $this->input->post('action');
        
        // call common function for add update item form
        $attribute_id = 'auditor_id';
        $db_name = 'db_fta_auditors';
        try {
            $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);
            if($additional_data['action']=="add")
                $message = AUDITOR_ADD;
            else if($additional_data['action']=="edit")
                $message = AUDITOR_EDIT;
            else
                $message = AUDITOR_DELETE;
            $success = 1;
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                                'message'=>$message,
                                'success'=>$success
                            );
        echo json_encode($return_arr);
    }
    function get_auditor_grid_data(){
        $client_id = $this->input->post('client_id');
        $grid_data = $this->databaseinfo_model->getAuditorData($client_id);
        $data['grid_data'] = $grid_data;
        $this->load->view("db/Finance_tax_audit/auditor_grid_data",$data);
    }
    
   
    
     function submit_taxtrc_form($client_id){
        
        $session_data = $this->session->all_userdata();
        $userPrimeryId = $session_data['logged_in']['userPrimeryId'];
        $data['vat_no'] = $this->input->post('vat_no');
        $data['tan_no'] = $this->input->post('tan_no');
        $data['last_tax_returned_on'] = ($this->input->post('last_tax_returned_on')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('last_tax_returned_on'))):'0000-00-00 00:00:00';
        $data['trc_available'] = $this->input->post('trc_available');
        if($this->input->post('trc_available')==1){
            $data['trc_no'] = $this->input->post('trc_no');
            $data['trc_renewal_at'] = ($this->input->post('trc_renewal_at')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('trc_renewal_at'))):'0000-00-00 00:00:00';
            $data['treaty_countries'] = $this->input->post('treaty_countries');
        } else {
            $data['trc_no'] = '';
            $data['trc_renewal_at'] = '0000-00-00 00:00:00';
            $data['treaty_countries'] = '';
        }
        if($this->input->post('action')=="add"){
            $data['created_by'] = $userPrimeryId;
            $data['created_on'] = date('Y-m-d - H:i:s');
        }
        $data['client_id'] = $client_id;
        $data['updated_by'] = $userPrimeryId;
        $data['updated_on'] = date('Y-m-d - H:i:s');
        $data['is_active'] = 1;
        $additional_data['id'] = $this->input->post('id');
        $additional_data['action'] = $this->input->post('action');
        // call common function for add update item form
        $attribute_id = 'taxtrc_id';
        $db_name = 'db_fta_taxtrc';
        try {
            $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);
            if($additional_data['action']=="add")
                $message = TAXTRC_ADD;
            else if($additional_data['action']=="edit")
                $message = TAXTRC_EDIT;
            else
                $message = TAXTRC_DELETE;
            $success = 1;
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                                'message'=>$message,
                                'success'=>$success
                            );
        echo json_encode($return_arr);
    }
    
     function get_taxtrc_grid_data(){
        $client_id = $this->input->post('client_id');
        $grid_data = $this->databaseinfo_model->getTaxtrcData($client_id);
        $data['grid_data'] = $grid_data;
        $this->load->view("db/Finance_tax_audit/taxtrc_grid_data",$data);
    }
    
    function submit_substance_form($client_id){
        
        $session_data = $this->session->all_userdata();
        $userPrimeryId = $session_data['logged_in']['userPrimeryId'];
        $data['office_premises'] = $this->input->post('office_premises');
        if($data['office_premises']==1){
            $data['office_address'] = $this->input->post('office_address');
        } else {
            $data['office_address'] = '';
        }
        $data['employee_full_time'] = $this->input->post('employee_full_time');
        $data['adopted_arbitration'] = $this->input->post('adopted_arbitration');
        if($data['adopted_arbitration']==1){
            $data['has_the_constitution'] = $this->input->post('has_the_constitution');
            $data['date_relevant'] = ($this->input->post('date_relevant')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date_relevant'))):'0000-00-00 00:00:00';
        } else {
            $data['has_the_constitution'] = '';
            $data['date_relevant'] = '0000-00-00 00:00:00';
        }
        $data['is_expected'] = $this->input->post('is_expected');
        $data['shares_are'] = $this->input->post('shares_are');
        if($data['shares_are']==1){
            $data['security_exchange'] = $this->input->post('security_exchange');
        } else {
            $data['security_exchange'] = '';
        }
        $data['has_yearly_expenditure'] = $this->input->post('has_yearly_expenditure');
        
        if($this->input->post('action')=="add"){
            $data['created_by'] = $userPrimeryId;
            $data['created_on'] = date('Y-m-d - H:i:s');
        }
        $data['client_id'] = $client_id;
        $data['updated_by'] = $userPrimeryId;
        $data['updated_on'] = date('Y-m-d - H:i:s');
        $data['is_active'] = 1;
        $additional_data['id'] = $this->input->post('id');
        $additional_data['action'] = $this->input->post('action');
        // call common function for add update item form
        $attribute_id = 'substance_id';
        $db_name = 'db_fta_substance';
        try {
            $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);
            if($additional_data['action']=="add")
                $message = SUBSTANCE_ADD;
            else if($additional_data['action']=="edit")
                $message = SUBSTANCE_EDIT;
            else
                $message = SUBSTANCE_DELETE;
            $success = 1;
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                                'message'=>$message,
                                'success'=>$success
                            );
        echo json_encode($return_arr);
    }
    
     function get_substance_grid_data(){
        $client_id = $this->input->post('client_id');
        $grid_data = $this->databaseinfo_model->getSubstanceData($client_id);
        $data['grid_data'] = $grid_data;
        $this->load->view("db/Finance_tax_audit/substance_grid_data",$data);
    }
    
    function submit_compliance_form($client_id){
        
        $session_data = $this->session->all_userdata();
        $userPrimeryId = $session_data['logged_in']['userPrimeryId'];
        $data['check_list_no'] = $this->input->post('check_list_no');
        $data['review_date'] = ($this->input->post('review_date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('review_date'))):'0000-00-00 00:00:00';
        $data['remarks'] = $this->input->post('remarks');
        $data['risk_level'] = $this->input->post('risk_level');
        
        if($this->input->post('action')=="add"){
            $data['created_by'] = $userPrimeryId;
            $data['created_on'] = date('Y-m-d - H:i:s');
        }
        $data['client_id'] = $client_id;
        $data['updated_by'] = $userPrimeryId;
        $data['updated_on'] = date('Y-m-d - H:i:s');
        $data['is_active'] = 1;
        $additional_data['id'] = $this->input->post('id');
        $additional_data['action'] = $this->input->post('action');
        // call common function for add update item form
        $attribute_id = 'compliance_id';
        $db_name = 'db_compliance_info';
        try {
            $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);
            if($additional_data['action']=="add")
                $message = COMPLIANCE_ADD;
            else if($additional_data['action']=="edit")
                $message = COMPLIANCE_EDIT;
            else
                $message = COMPLIANCE_DELETE;
            $success = 1;
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                                'message'=>$message,
                                'success'=>$success
                            );
        echo json_encode($return_arr);
    }
    
     function get_compliance_grid_data(){
        $client_id = $this->input->post('client_id');
        $grid_data = $this->databaseinfo_model->getComplianceData($client_id);
        $data['grid_data'] = $grid_data;
        $this->load->view("db/Compliance/compliance_grid_data",$data);
    }
    
    function submit_agreement_form($client_id){
        $session_data = $this->session->all_userdata();
        $userPrimeryId = $session_data['logged_in']['userPrimeryId'];
        $data['agreement_type'] = $this->input->post('agreement_type');
        $data['termination_date'] = ($this->input->post('termination_date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('termination_date'))):'0000-00-00 00:00:00';
        $data['signed_date'] = ($this->input->post('signed_date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('signed_date'))):'0000-00-00 00:00:00';
        $data['remarks'] = $this->input->post('remarks');
        
        if($this->input->post('action')=="add"){
            $data['created_by'] = $userPrimeryId;
            $data['created_on'] = date('Y-m-d - H:i:s');
        }
        $data['client_id'] = $client_id;
        $data['updated_by'] = $userPrimeryId;
        $data['updated_on'] = date('Y-m-d - H:i:s');
        $data['is_active'] = 1;
        $additional_data['id'] = $this->input->post('id');
        $additional_data['action'] = $this->input->post('action');
        // call common function for add update item form
        $attribute_id = 'agreement_co_id';
        $db_name = 'db_agreement_contracts';
        try {
            $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);
            if($additional_data['action']=="add")
                $message = AGREEMENT_ADD;
            else if($additional_data['action']=="edit")
                $message = AGREEMENT_EDIT;
            else
                $message = AGREEMENT_DELETE;
            $success = 1;
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                                'message'=>$message,
                                'success'=>$success
                            );
        echo json_encode($return_arr);
    }
    
    function get_agreement_grid_data(){
        $client_id = $this->input->post('client_id');
        $grid_data = $this->databaseinfo_model->getAgreementData($client_id);
        $data['grid_data'] = $grid_data;
        $this->load->view("db/Agreement/agreement_grid_data",$data);
    }
    
    function save_cd_company_refrence($client_id){
        $data['company_refrence'] = $this->input->post('company_refrence');
        $additional_data['id'] = $client_id;
        $additional_data['action'] = 'edit';
        // call common function for add update item form
        $attribute_id = 'client_id';
        $db_name = 'db_corporate_data';
        try {
            $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);
            $message = CORPORATE_COMPANY_REFRENCE_EDIT;
            $success = 1;
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                                'message'=>$message,
                                'success'=>$success
                            );
        echo json_encode($return_arr);
    }
    
    function save_cd_portfolio($client_id){
        $data['portfolio'] = $this->input->post('portfolio');
        $additional_data['id'] = $client_id;
        $additional_data['action'] = 'edit';
        // call common function for add update item form
        $attribute_id = 'client_id';
        $db_name = 'db_corporate_data';
        try {
            $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);
            $message = CORPORATE_PORTFOLIO_EDIT;
            $success = 1;
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                                'message'=>$message,
                                'success'=>$success
                            );
        echo json_encode($return_arr);
    }
    
    function save_cd_client_info_form($client_id){
        $data['client_name'] = $this->input->post('client_name');
        $data['gbl_license_no'] = $this->input->post('gbl_license_no');
        $data['previous_name'] = $this->input->post('previous_name');
        $data['global_license_issue_date'] = ($this->input->post('global_license_issue_date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('global_license_issue_date'))):'0000-00-00 00:00:00';
        $data['date_of_change_name'] = ($this->input->post('date_of_change_name')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date_of_change_name'))):'0000-00-00 00:00:00';
        $data['business_reg_no'] = $this->input->post('business_reg_no');
        $data['date_of_incorp'] = ($this->input->post('date_of_incorp')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date_of_incorp'))):'0000-00-00 00:00:00';
        $data['transfer_reg'] = $this->input->post('transfer_reg');
        $data['status'] = $this->input->post('status');
        $data['transfer_from_to'] = $this->input->post('transfer_from_to');
        $data['roc_file_no'] = $this->input->post('roc_file_no');
        $data['within_group'] = $this->input->post('within_group');
        if($data['within_group']==1)
            $data['name_of_group'] = $this->input->post('name_of_group');
        else
            $data['name_of_group'] = '';
        
        $data['type_of_company'] = $this->input->post('type_of_company');
        
        $additional_data['id'] = $client_id;
        $additional_data['action'] = 'edit';
        // call common function for add update item form
        $attribute_id = 'client_id';
        $db_name = 'db_corporate_data';
        try {
            $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);
            /* Start code for DMS */
            $handle = curl_init(DMS_HOST);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);

            /* Get the HTML or whatever is linked in $url. */
            $response = curl_exec($handle);

            /* Check for 404 (file not found). */
            $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
            $httpCode = intval($httpCode);
            if ($httpCode != 404 && $httpCode != 400 && $httpCode != 0) {
                $testFolder = new TestFolder();
                $client_type = $this->client_model->listClientType($data['type_of_company']);

                $folder_path1 = CLIENT_FOLDER . '/' . trim($data['client_name']);

                $languages = simplexml_load_file(base_url() . 'xml/' . $client_type[0]->company_type . ".xml");
                $folder_path = CLIENT_FOLDER . '/' . $client_type[0]->company_type;
                //echo $testFolder->valid_folder($folder_path);die;
                if ($testFolder->valid_folder($folder_path) == 'PathNotFoundException: ' . $folder_path) {
                    $testFolder->test($folder_path);
                }


                $folder_path1 = $folder_path . '/' . trim($data['client_name']);
                $testFolder->test($folder_path1);
                foreach ($languages->mainfolder as $lang) {
                    $folder_path2 = $folder_path1 . '/' . $lang["title"];
                    $testFolder->test($folder_path2);
                    foreach ($lang->subfolder as $lang2) {
                        $folder_path3 = $folder_path2 . '/' . $lang2["title"];
                        $testFolder->test($folder_path3);
                        foreach ($lang2->subsubfolder as $lang3) {
                            $folder_path4 = $folder_path3 . '/' . $lang3["title"];
                            $testFolder->test($folder_path4);
                        }
                    }
                }
            }
            /* End code for DMS */
            $message = CORPORATE_CLIENT_EDIT;
            $success = 1;
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                            'message'=>$message,
                            'success'=>$success
                           );
        echo json_encode($return_arr);
    }
    
    function save_cd_activity_info($client_id){
        $data['activity'] = $this->input->post('activity');
        if($data['activity']!=0)
            $data['activity_detail'] = $this->input->post('activity_detail');
        else
            $data['activity_detail'] = '';
        
        $additional_data['id'] = $client_id;
        $additional_data['action'] = 'edit';
        // call common function for add update item form
        $attribute_id = 'client_id';
        $db_name = 'db_corporate_data';
        try {
            $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);
            $this->databaseinfo_model->postActivityDetail($data);
            $message = CORPORATE_ACTIVITY_EDIT;
            $success = 1;
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                            'message'=>$message,
                            'success'=>$success
                           );
        echo json_encode($return_arr);
    }
    
    function save_cd_address_info($client_id){
        $data['registered_office'] = $this->input->post('registered_office');
        $data['file_location'] = $this->input->post('file_location');
        $data['business_address'] = $this->input->post('business_address');
        $data['archieves_ref_no'] = $this->input->post('archieves_ref_no');
        
        $additional_data['id'] = $client_id;
        $additional_data['action'] = 'edit';
        // call common function for add update item form
        $attribute_id = 'client_id';
        $db_name = 'db_corporate_data';
        try {
            $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);
            $message = CORPORATE_ADDRESS_EDIT;
            $success = 1;
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                            'message'=>$message,
                            'success'=>$success
                           );
        echo json_encode($return_arr);
    } 
    
    function save_cd_introducer_info($client_id){
        $data['introduced_by'] = $this->input->post('introduced_by');
        $data['introducer_email'] = $this->input->post('introducer_email');
        $data['introducer_address'] = $this->input->post('introducer_address');
        $data['introducer_phone'] = $this->input->post('introducer_phone');
        $data['introducer_country'] = $this->input->post('introducer_country');
        
        $additional_data['id'] = $client_id;
        $additional_data['action'] = 'edit';
        // call common function for add update item form
        $attribute_id = 'client_id';
        $db_name = 'db_corporate_data';
        try {
            $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);
            $message = CORPORATE_INTRODUCER_EDIT;
            $success = 1;
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                            'message'=>$message,
                            'success'=>$success
                           );
        echo json_encode($return_arr);
    }
    
    function submit_director_individual_form($client_id){
        $session_data = $this->session->all_userdata();
        $userPrimeryId = $session_data['logged_in']['userPrimeryId'];
        $data['director_name'] = $this->input->post('director_name');
         $data['director_surname'] = $this->input->post('director_surname');
        $data['appointed_date'] = ($this->input->post('appointed_date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('appointed_date'))):'0000-00-00 00:00:00';
        $data['is_form16_filled'] = $this->input->post('is_form16_filled');        
        $data['resigned_date'] = ($this->input->post('resigned_date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('resigned_date'))):'0000-00-00 00:00:00';
        $data['is_form17_filled'] = $this->input->post('is_form17_filled');
        $data['director_birth_date'] = ($this->input->post('director_birth_date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('director_birth_date'))):'0000-00-00 00:00:00';
        $data['director_age'] = $this->input->post('director_age');
        $data['directorship_in_public'] = $this->input->post('directorship_in_public');
        if($data['directorship_in_public']==1)
            $data['directorship_desc'] = $this->input->post('directorship_desc');
        else
            $data['directorship_desc'] = '';
        
        $data['represented_by'] = $this->input->post('represented_by');

        $data['has_passport'] = $this->input->post('has_passport');
        if($data['has_passport']==1){
            $data['passport_no'] = $this->input->post('passport_no');
            $data['country_of_issue'] = $this->input->post('country_of_issue');
            $data['date_of_issue'] = ($this->input->post('date_of_issue')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date_of_issue'))):'0000-00-00 00:00:00';
            $data['date_of_expiry'] = ($this->input->post('date_of_expiry')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date_of_expiry'))):'0000-00-00 00:00:00';
        } else {
            $data['passport_no'] = "";
            $data['country_of_issue'] = "";
            $data['date_of_issue'] = "0000-00-00 00:00:00";
            $data['date_of_expiry'] = "0000-00-00 00:00:00";
        }
        
        $data['has_cv'] = $this->input->post('has_cv');
        if ($data['has_cv'] == 1)
            $data['recieved_date'] = ($this->input->post('recieved_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('recieved_date'))) : '0000-00-00 00:00:00';
        else
            $data['recieved_date'] = '0000-00-00 00:00:00';

        $data['has_bank_ref'] = $this->input->post('has_bank_ref');
        if($data['has_bank_ref']==1){
            $data['bank_name'] = $this->input->post('bank_name');
            $data['date'] = ($this->input->post('date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date'))):'0000-00-00 00:00:00';
        } else {
            $data['bank_name'] = "";
            $data['date'] = "";
        }
        $data['is_address_proof'] = $this->input->post('is_address_proof');
        if($data['is_address_proof']==1){
            $data['address_detail'] = $this->input->post('address_detail');
            $data['address_proof_date'] = ($this->input->post('address_proof_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('address_proof_date'))) : '0000-00-00 00:00:00';
            $data['country'] = $this->input->post('country');
        } else {
            $data['address_detail'] = "";
            $data['address_proof_date'] = '0000-00-00 00:00:00';
            $data['country'] = "";
        }
        
        $data['common_dir_id'] = $this->input->post('director_list');
        $data['other_detail'] = $this->input->post('other_detail');
        
        if($this->input->post('action')=="add"){
            $data['created_by'] = $userPrimeryId;
            $data['created_on'] = date('Y-m-d - H:i:s');
        }
        $data['client_id'] = $client_id;
        $data['updated_by'] = $userPrimeryId;
        $data['updated_on'] = date('Y-m-d - H:i:s');
        $data['is_active'] = 1;
        $additional_data['id'] = $this->input->post('id');
        $additional_data['action'] = $this->input->post('action');
        // call common function for add update item form
        $attribute_id = 'dtr_individual_id';
        $db_name = 'db_director_individual';
        
        
        try {
            $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);

            if($additional_data['action']=="add")
                $message = DIRECTOR_INDIVIDUAL_ADD;
            else if($additional_data['action']=="edit")
                $message = DIRECTOR_INDIVIDUAL_EDIT;
            else
                $message = DIRECTOR_INDIVIDUAL_DELETE;
            $success = 1;
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                                'message'=>$message,
                                'success'=>$success
                            );
        echo json_encode($return_arr);
    }
    
    function get_director_individual_grid_data(){
        $client_id = $this->input->post('client_id');
        $grid_data = $this->databaseinfo_model->getDirectorIndividualData($client_id);
        $data['grid_data'] = $grid_data;
        $this->load->view("db/Director/director_individual_grid_data",$data);
    }
    
    function submit_director_corporate_form($client_id){
        $session_data = $this->session->all_userdata();
        $userPrimeryId = $session_data['logged_in']['userPrimeryId'];
        $data['entity_name'] = $this->input->post('entity_name');
        $data['registered_in'] = $this->input->post('registered_in');
        $data['date_of_incorporation'] = ($this->input->post('date_of_incorporation')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date_of_incorporation'))):'0000-00-00 00:00:00';
        $data['date_of_appointment'] = ($this->input->post('date_of_appointment')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date_of_appointment'))):'0000-00-00 00:00:00';
        $data['date_of_resigned'] = ($this->input->post('date_of_resigned')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date_of_resigned'))):'0000-00-00 00:00:00';
        $data['is_register_of_members'] = $this->input->post('is_register_of_members');
        if($data['is_register_of_members']=="1")
            $data['member_register_date'] = ($this->input->post('member_register_date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('member_register_date'))):'0000-00-00 00:00:00';
        else
            $data['member_register_date'] = '0000-00-00 00:00:00';        
        
        $data['is_register_directors'] = $this->input->post('is_register_directors');
        if($data['is_register_directors']=="1")
            $data['director_register_date'] = ($this->input->post('director_register_date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('director_register_date'))):'0000-00-00 00:00:00';
        else
            $data['director_register_date'] = '0000-00-00 00:00:00';
        
        $data['represented_by'] = $this->input->post('represented_by');
        $data['is_passport'] = $this->input->post('is_passport');
        if($data['is_passport']==1){
            $data['passport_no'] = $this->input->post('passport_no');
            $data['country_of_issue'] = $this->input->post('country_of_issue');
            $data['date_of_issue'] = ($this->input->post('date_of_issue')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date_of_issue'))):'0000-00-00 00:00:00';
            $data['date_of_expiry'] = ($this->input->post('date_of_expiry')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date_of_expiry'))):'0000-00-00 00:00:00';
        } else {
            $data['passport_no'] = "";
            $data['country_of_issue'] = "";
            $data['date_of_issue'] = '0000-00-00 00:00:00';
            $data['date_of_expiry'] = '0000-00-00 00:00:00';
        }
        $data['is_bank_ref'] = $this->input->post('is_bank_ref');
        if($data['is_bank_ref']==1){
            $data['bank_name_c'] = $this->input->post('bank_name_c');
            $data['date_c'] = ($this->input->post('date_c')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date_c'))):'0000-00-00 00:00:00';
        } else {
            $data['bank_name_c'] = "";
            $data['date_c'] = "";
        }
        
        $data['is_proof_address'] = $this->input->post('is_proof_address');
        if($data['is_proof_address']==1){
            $data['address'] = $this->input->post('address');
            $data['country'] = $this->input->post('country');
            $data['date'] = ($this->input->post('date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date'))):'0000-00-00 00:00:00';
        } else {
            $data['address'] = "";
            $data['country'] = "";
            $data['date'] = '0000-00-00 00:00:00';
        }
        $data['is_corporate_profile'] = $this->input->post('is_corporate_profile');
        $data['is_audited_accounts'] = $this->input->post('is_audited_accounts');
        if($data['is_audited_accounts']==1)
            $data['finantial_year_end_date'] = ($this->input->post('finantial_year_end_date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('finantial_year_end_date'))):'0000-00-00 00:00:00';
        else
            $data['finantial_year_end_date'] = '0000-00-00 00:00:00';
            
        $data['proof_of_address_date'] = ($this->input->post('proof_of_address_date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('proof_of_address_date'))):'0000-00-00 00:00:00';
        
        
        if($this->input->post('action')=="add"){
            $data['created_by'] = $userPrimeryId;
            $data['created_on'] = date('Y-m-d - H:i:s');
        }
        $data['client_id'] = $client_id;
        $data['updated_by'] = $userPrimeryId;
        $data['updated_on'] = date('Y-m-d - H:i:s');
        $data['is_active'] = 1;
        $additional_data['id'] = $this->input->post('id');
        $additional_data['action'] = $this->input->post('action');
        // call common function for add update item form
        $attribute_id = 'director_corp_id';
        $db_name = 'db_director_corporate';
        try {
            $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);
            if($additional_data['action']=="add")
                $message = DIRECTOR_CORPORATE_ADD;
            else if($additional_data['action']=="edit")
                $message = DIRECTOR_CORPORATE_EDIT;
            else
                $message = DIRECTOR_CORPORATE_DELETE;
            $success = 1;
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                                'message'=>$message,
                                'success'=>$success
                            );
        echo json_encode($return_arr);
    }
    
    function get_director_corporate_grid_data(){
        $client_id = $this->input->post('client_id');
        $grid_data = $this->databaseinfo_model->getDirectorCorporateData($client_id);
        $data['grid_data'] = $grid_data;
        $this->load->view("db/Director/director_corporate_grid_data",$data);
    }
    
    function submit_bo_individual_form($client_id){
        $session_data = $this->session->all_userdata();
        $userPrimeryId = $session_data['logged_in']['userPrimeryId'];
        $data['owner_name'] = $this->input->post('owner_name');
        $data['owner_surname'] = $this->input->post('owner_surname');
        $data['has_passport'] = $this->input->post('has_passport');
        $data['remark'] = $this->input->post('remark');
        if($data['has_passport']==1){
            $data['passport_no'] = $this->input->post('passport_no');
            $data['country_of_issue'] = $this->input->post('country_of_issue');
            $data['date_of_issue'] = ($this->input->post('date_of_issue')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date_of_issue'))):'0000-00-00 00:00:00';
            $data['date_of_expiry'] = ($this->input->post('date_of_expiry')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date_of_expiry'))):'0000-00-00 00:00:00';
        } else {
            $data['passport_no'] = "";
            $data['country_of_issue'] = "";
            $data['date_of_issue'] = '0000-00-00 00:00:00';
            $data['date_of_expiry'] = '0000-00-00 00:00:00';
        }
        $data['has_cv'] = $this->input->post('has_cv');
        if($data['has_cv']==1)
            $data['recieved_date'] = ($this->input->post('recieved_date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('recieved_date'))):'0000-00-00 00:00:00';
        else
            $data['recieved_date'] = '0000-00-00 00:00:00';
        
        $data['is_bank_ref'] = $this->input->post('is_bank_ref');
        if($data['is_bank_ref']==1){
            $data['bank_name'] = $this->input->post('bank_name');
            $data['date'] = ($this->input->post('date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date'))):'0000-00-00 00:00:00';
        } else {
            $data['bank_name'] = "";
            $data['date'] = '0000-00-00 00:00:00';
        }
        $data['has_address_proof'] = $this->input->post('has_address_proof');
        if($data['has_address_proof']==1){
            $data['address'] = $this->input->post('address');
            $data['country'] = $this->input->post('country');
            $data['address_proof_date'] = ($this->input->post('address_proof_date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('address_proof_date'))):'0000-00-00 00:00:00';
        } else {
            $data['address'] = "";
            $data['country'] = "";
            $data['address_proof_date'] = '0000-00-00 00:00:00';
        }
        $data['common_dir_id'] = $this->input->post('director_list');
        
        
        $data['other_detail'] = $this->input->post('other_detail');
        
        if($this->input->post('action')=="add"){
            $data['created_by'] = $userPrimeryId;
            $data['created_on'] = date('Y-m-d - H:i:s');
        }
        $data['client_id'] = $client_id;
        $data['updated_by'] = $userPrimeryId;
        $data['updated_on'] = date('Y-m-d - H:i:s');
        $data['is_active'] = 1;
        $additional_data['id'] = $this->input->post('id');
        $additional_data['action'] = $this->input->post('action');
        // call common function for add update item form
        $attribute_id = 'beneficial_ind_id';
        $db_name = 'db_beneficial_individual';
        try {
            $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);
            if($additional_data['action']=="add")
                $message = BO_INDIVIDUAL_ADD;
            else if($additional_data['action']=="edit")
                $message = BO_INDIVIDUAL_EDIT;
            else
                $message = BO_INDIVIDUAL_DELETE;
            $success = 1;
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                                'message'=>$message,
                                'success'=>$success
                            );
        echo json_encode($return_arr);
    }
    
    function get_bo_individual_grid_data(){
        $client_id = $this->input->post('client_id');
        $grid_data = $this->databaseinfo_model->getBoIndividualData($client_id);
        $data['grid_data'] = $grid_data;
        $this->load->view("db/Beneficial/bo_individual_grid_data",$data);
    }
    
    
    function submit_bo_corporate_form($client_id){
        $session_data = $this->session->all_userdata();
        $userPrimeryId = $session_data['logged_in']['userPrimeryId'];
        $data['name_of_company'] = $this->input->post('name_of_company');
        $data['registered_in'] = $this->input->post('registered_in');
        $data['date_of_incorp'] = ($this->input->post('date_of_incorp')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date_of_incorp'))):'0000-00-00 00:00:00';
        $data['date_of_certification_of_incorp'] = ($this->input->post('date_of_certification_of_incorp')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date_of_certification_of_incorp'))):'0000-00-00 00:00:00';
        $data['type_of_company'] = $this->input->post('type_of_company');
        $data['is_member_register'] = $this->input->post('is_member_register');
        
        if($data['is_member_register']==1){
            $data['member_register_date'] = ($this->input->post('member_register_date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('member_register_date'))):'0000-00-00 00:00:00';
        } else {
            $data['member_register_date'] = '0000-00-00 00:00:00';
        }
        $data['is_director_register'] = $this->input->post('is_director_register');
        if($data['is_director_register']==1)
            $data['director_register_date'] = ($this->input->post('director_register_date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('director_register_date'))):'0000-00-00 00:00:00';
        else
            $data['director_register_date'] = '0000-00-00 00:00:00';
        
        $data['represented_by'] = $this->input->post('represented_by');
        $data['is_passport'] = $this->input->post('is_passport');
        if($data['is_passport']==1){
            $data['passport_no'] = $this->input->post('passport_no');
            $data['country_of_issue'] = $this->input->post('country_of_issue');
            $data['date_of_issue'] = ($this->input->post('date_of_issue')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date_of_issue'))):'0000-00-00 00:00:00';
            $data['date_of_expiry'] = ($this->input->post('date_of_expiry')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date_of_expiry'))):'0000-00-00 00:00:00';
        } else {
            $data['passport_no'] = "";
            $data['country_of_issue'] = "";
            $data['date_of_issue'] = '0000-00-00 00:00:00';
            $data['date_of_expiry'] = '0000-00-00 00:00:00';
        }

        $data['is_bank_ref'] = $this->input->post('is_bank_ref');
        if($data['is_bank_ref']==1){
            $data['name_of_bank'] = $this->input->post('name_of_bank');
            $data['date'] = ($this->input->post('date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date'))):'0000-00-00 00:00:00';
        } else {
            $data['name_of_bank'] = "";
            $data['date'] = '0000-00-00 00:00:00';
        }
        $data['is_address_proof'] = $this->input->post('is_address_proof');
        if($data['is_address_proof']==1){
            $data['address'] = $this->input->post('address');
            $data['country'] = $this->input->post('country');
            $data['address_proof_date'] = ($this->input->post('address_proof_date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('address_proof_date'))):'0000-00-00 00:00:00';
        } else {
            $data['address'] = "";
            $data['country'] = "";
            $data['address_proof_date'] = '0000-00-00 00:00:00';
        }
        
        $data['is_corporate_profile'] = $this->input->post('is_corporate_profile');
        $data['is_audited_account'] = $this->input->post('is_audited_account');
        if($data['is_audited_account']==1)
            $data['date_of_finantial_year_end'] = ($this->input->post('date_of_finantial_year_end')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date_of_finantial_year_end'))):'0000-00-00 00:00:00';
        else
            $data['date_of_finantial_year_end'] = '0000-00-00 00:00:00';

        $data['remarks'] = $this->input->post('remarks');
        
        
        
        if($this->input->post('action')=="add"){
            $data['created_by'] = $userPrimeryId;
            $data['created_on'] = date('Y-m-d - H:i:s');
        }
        $data['client_id'] = $client_id;
        $data['updated_by'] = $userPrimeryId;
        $data['updated_on'] = date('Y-m-d - H:i:s');
        $data['is_active'] = 1;
        $additional_data['id'] = $this->input->post('id');
        $additional_data['action'] = $this->input->post('action');
        // call common function for add update item form
        $attribute_id = 'beneficial_crp_id';
        $db_name = 'db_beneficial_corporate';
        try {
            $id = $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);
            if($additional_data['action']=="add")
                $message = BO_CORPORATE_ADD;
            else if($additional_data['action']=="edit")
                $message = BO_CORPORATE_EDIT;
            else
                $message = BO_CORPORATE_DELETE;
            $success = 1;
            
            $person_name = $this->input->post('person_name');
            $address = $this->input->post('person_address');
            $email = $this->input->post('email');
            $phone_no = $this->input->post('phone_no');
            
            $attribute_id = 'beneficial_crp_id';
            $db_name = 'db_beneficial_corporate_auth_person';
            $delete_previous_data = array(
                                            'db_field_id'=>$attribute_id,
                                            'db_name'=>$db_name,
                                            'id'=>$id,
                                         );
            $this->databaseinfo_model->deleteItem($delete_previous_data);        
            for($i=0;$i<count($person_name);$i++){
                //echo "hilal";
                $relational_data_arr = array(
                                                'person_name'=>$person_name[$i],
                                                'address'=>$address[$i],
                                                'email'=>$email[$i],
                                                'phone_no'=>$phone_no[$i],
                                                'beneficial_crp_id'=>$id
                                            );
                $attribute_id = 'person_id';
                $db_name = 'db_beneficial_corporate_auth_person';
                $this->databaseinfo_model->postRelationalItemData($relational_data_arr,$id,$attribute_id,$db_name);
            }
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                                'message'=>$message,
                                'success'=>$success
                            );
        echo json_encode($return_arr);
    }
    
    function get_bo_corporate_grid_data(){
        $client_id = $this->input->post('client_id');
        $grid_data = $this->databaseinfo_model->getBoCorporateData($client_id);
        $data['grid_data'] = $grid_data;
        $this->load->view("db/Beneficial/bo_corporate_grid_data",$data);
    }
    
    function submit_shareholder_individual_form($client_id){
        $session_data = $this->session->all_userdata();
        $userPrimeryId = $session_data['logged_in']['userPrimeryId'];
        $data['is_shareholder'] = $this->input->post('is_shareholder');
                
        // yes
        $data['name_of_shareholder'] = $this->input->post('name_of_shareholder');
        $data['surname_of_shareholder'] = $this->input->post('surname_of_shareholder');
        $data['shareholder_address'] = $this->input->post('shareholder_address');
        $data['is_passport'] = $this->input->post('is_passport');
        if ($data['is_passport'] == 1) {
            $data['passport_no'] = $this->input->post('passport_no');
            $data['country_of_issue'] = $this->input->post('country_of_issue');
            $data['date_of_issue'] = ($this->input->post('date_of_issue') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('date_of_issue'))) : '0000-00-00 00:00:00';
            $data['date_of_expiry'] = ($this->input->post('date_of_expiry') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('date_of_expiry'))) : '0000-00-00 00:00:00';
        } else {
            $data['passport_no'] = "";
            $data['country_of_issue'] = "";
            $data['date_of_issue'] = '0000-00-00 00:00:00';
            $data['date_of_expiry'] = '0000-00-00 00:00:00';
        }
        $data['has_cv'] = $this->input->post('has_cv');
        if ($data['has_cv'] == 1)
            $data['recieved_date'] = ($this->input->post('recieved_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('recieved_date'))) : '0000-00-00 00:00:00';
        else
            $data['recieved_date'] = '0000-00-00 00:00:00';

        $data['is_bank_ref'] = $this->input->post('is_bank_ref');
        if ($data['is_bank_ref'] == 1) {
            $data['bank_name'] = $this->input->post('bank_name');
            $data['date'] = ($this->input->post('date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('date'))) : '0000-00-00 00:00:00';
        } else {
            $data['bank_name'] = "";
            $data['date'] = '0000-00-00 00:00:00';
        }
        $data['has_address_proof'] = $this->input->post('has_address_proof');
        if ($data['has_address_proof'] == 1) {
            $data['address'] = $this->input->post('address');
            $data['country'] = $this->input->post('country');
            $data['address_proof_date'] = ($this->input->post('address_proof_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('address_proof_date'))) : '0000-00-00 00:00:00';
        } else {
            $data['address'] = "";
            $data['country'] = "";
            $data['address_proof_date'] = '0000-00-00 00:00:00';
        }
        $data['common_dir_id'] = $this->input->post('director_list');
        $data['other_detail'] = $this->input->post('other_detail');

        // No
        $data['name_of_corporate_shareholder'] = $this->input->post('name_of_corporate_shareholder');
        $data['corporate_shareholder_address'] = $this->input->post('corporate_shareholder_address');
        $data['date_of_certification_of_incorp'] = ($this->input->post('date_of_certification_of_incorp') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('date_of_certification_of_incorp'))) : '0000-00-00 00:00:00';
        $data['type_of_company'] = $this->input->post('type_of_company');
        $data['is_member_register'] = $this->input->post('is_member_register');
        if ($data['is_member_register'] == 1) {
            $data['member_register_date'] = ($this->input->post('member_register_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('member_register_date'))) : '0000-00-00 00:00:00';
        } else {
            $data['member_register_date'] = '0000-00-00 00:00:00';
        }
        $data['is_director_register'] = $this->input->post('is_director_register');
        if ($data['is_director_register'] == 1)
            $data['director_register_date'] = ($this->input->post('director_register_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('director_register_date'))) : '0000-00-00 00:00:00';
        else
            $data['director_register_date'] = '0000-00-00 00:00:00';
        $data['is_corporate_profile'] = $this->input->post('is_corporate_profile');
        $data['is_audited_account'] = $this->input->post('is_audited_account');
        if ($data['is_audited_account'] == 1)
            $data['date_of_finantial_year_end'] = ($this->input->post('date_of_finantial_year_end') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('date_of_finantial_year_end'))) : '0000-00-00 00:00:00';
        else
            $data['date_of_finantial_year_end'] = '0000-00-00 00:00:00';

        $data['represented_by'] = $this->input->post('represented_by');
        $data['is_bank_ref_c'] = $this->input->post('is_bank_ref_c');
        if ($data['is_bank_ref_c'] == 1) {
            $data['bank_name_c'] = $this->input->post('bank_name_c');
            $data['date_c'] = ($this->input->post('date_c') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('date_c'))) : '0000-00-00 00:00:00';
        } else {
            $data['bank_name_c'] = "";
            $data['date_c'] = '0000-00-00 00:00:00';
        }
        $data['has_address_proof_c'] = $this->input->post('has_address_proof_c');
        if ($data['has_address_proof_c'] == 1) {
            $data['address_c'] = $this->input->post('address_c');
            $data['country_c'] = $this->input->post('country_c');
            $data['address_proof_date_c'] = ($this->input->post('address_proof_date_c') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('address_proof_date_c'))) : '0000-00-00 00:00:00';
        } else {
            $data['address_c'] = "";
            $data['country_c'] = "";
            $data['address_proof_date_c'] = '0000-00-00 00:00:00';
        }
        $data['remarks'] = $this->input->post('remarks');
        
        
        
        $data['client_id'] = $client_id;
        $additional_data['id'] = $this->input->post('id');
        $additional_data['action'] = $this->input->post('action');
        
        
        if ($data['is_shareholder'] == 1) {
            $data['name_of_corporate_shareholder'] = "";
            $data['corporate_shareholder_address'] = "";
            $data['date_of_certification_of_incorp'] = '0000-00-00 00:00:00';
            $data['type_of_company'] = "";
            $data['is_member_register'] = "";
            $data['member_register_date'] = '0000-00-00 00:00:00';
            $data['is_director_register'] = "";
            $data['director_register_date'] = '0000-00-00 00:00:00';
            $data['is_corporate_profile'] = "";
            $data['date_of_finantial_year_end'] = '0000-00-00 00:00:00';
            $data['represented_by'] = "";
            $data['is_bank_ref_c'] = "";
            $data['bank_name_c'] = "";
            $data['date_c'] = '0000-00-00 00:00:00';
            $data['has_address_proof_c'] = '0000-00-00 00:00:00';
            $data['address_c'] = "";
            $data['country_c'] = "";
            $data['address_proof_date_c'] = '0000-00-00 00:00:00';
            $data['remarks'] = "";
        } else {
            $data['name_of_shareholder'] = "";
            $data['shareholder_address'] = "";
            $data['is_passport'] = "";
            $data['passport_no'] = "";
            $data['country_of_issue'] = "";
            $data['date_of_issue'] = '0000-00-00 00:00:00';
            $data['date_of_expiry'] = '0000-00-00 00:00:00';
            $data['has_cv'] = "";
            $data['recieved_date'] = '0000-00-00 00:00:00';
            $data['is_bank_ref'] = "";
            $data['bank_name'] = "";
            $data['date'] = '0000-00-00 00:00:00';
            $data['has_address_proof'] = "";
            $data['address'] = "";
            $data['country'] = "";
            $data['address_proof_date'] = '0000-00-00 00:00:00';
            $data['other_detail'] = "";
        }
        // call common function for add update item form
        $attribute_id = 'shareholder_ind_id';
        $db_name = 'db_shareholder_individual';
        try {
            $id = $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);
            if($additional_data['action']=="add")
                $message = SHAREHOLDER_CORPORATE_ADD;
            else if($additional_data['action']=="edit")
                $message = SHAREHOLDER_CORPORATE_EDIT;
            else
                $message = SHAREHOLDER_CORPORATE_DELETE;
            $success = 1;
                    } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                                'message'=>$message,
                                'success'=>$success
                            );
        echo json_encode($return_arr);
    }
    
    function get_shareholder_individual_grid_data(){
        $client_id = $this->input->post('client_id');
        $grid_data = $this->databaseinfo_model->getShareholderIndividualData($client_id);
        $data['grid_data'] = $grid_data;
        $this->load->view("db/Shareholder/shareholder_individual_grid_data",$data);
    }
    
    function submit_shareholder_allotment_form($client_id){
        $session_data = $this->session->all_userdata();
        $userPrimeryId = $session_data['logged_in']['userPrimeryId'];
        $data['shareholder'] = $this->input->post('shareholder');
        $data['address'] = $this->input->post('address');
        $data['date_of_allotment'] = ($this->input->post('date_of_allotment')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date_of_allotment'))):'0000-00-00 00:00:00';
        $data['type_of_share'] = $this->input->post('type_of_share');
        $data['no_of_shares'] = $this->input->post('no_of_shares');
        $data['currency'] = $this->input->post('currency');
        $data['value'] = $this->input->post('value');
        $data['capital_after_issue'] = $this->input->post('capital_after_issue');
        $data['holding_after_allotment'] = $this->input->post('holding_after_allotment');
        $data['allotment_remark'] = $this->input->post('allotment_remark');
        $data['transfer_from'] = $this->input->post('transfer_from');
        $data['transfer_to'] = $this->input->post('transfer_to');
        $data['allotment_address'] = $this->input->post('allotment_address');
        $data['date_of_transfer'] = ($this->input->post('date_of_transfer')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date_of_transfer'))):'0000-00-00 00:00:00';
        $data['transfer_type_of_share'] = $this->input->post('transfer_type_of_share');
        $data['no_of_shares_transfer'] = $this->input->post('no_of_shares_transfer');
        $data['transfer_currency'] = $this->input->post('transfer_currency');
        $data['transfer_value'] = $this->input->post('transfer_value');
        $data['transfer_capital_after_transfer'] = $this->input->post('transfer_capital_after_transfer');
        $data['transfer_holding_after_allotment'] = $this->input->post('transfer_holding_after_allotment');
        $data['transfer_remark'] = $this->input->post('transfer_remark');
                
        $data['client_id'] = $client_id;
        $additional_data['id'] = $this->input->post('id');
        $additional_data['action'] = $this->input->post('action');
        // call common function for add update item form
        $attribute_id = 'allotment_id';
        $db_name = 'db_shareholder_allotment';
        try {
            $id = $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);
            if($additional_data['action']=="add")
                $message = SHAREHOLDER_ALLOTMENT_ADD;
            else if($additional_data['action']=="edit")
                $message = SHAREHOLDER_ALLOTMENT_EDIT;
            else
                $message = SHAREHOLDER_ALLOTMENT_DELETE;
            $success = 1;
            
            
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                                'message'=>$message,
                                'success'=>$success
                            );
        echo json_encode($return_arr);
    }
    
    
    function submit_shareholder_redemption_form($client_id){   
     
                
        $session_data = $this->session->all_userdata();
        $userPrimeryId = $session_data['logged_in']['userPrimeryId'];
        $data['shareholder_name'] = $this->input->post('shareholder_name');
        $data['shareholder_address'] = $this->input->post('shareholder_address');
        $data['date_of_redemption'] = ($this->input->post('date_of_redemption')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date_of_redemption'))):'0000-00-00 00:00:00';
        $data['type_of_share'] = $this->input->post('type_of_share');
        $data['no_of_shares'] = $this->input->post('no_of_shares');
        $data['redemption_remark'] = $this->input->post('redemption_remark');                 
        $data['client_id'] = $client_id;
        $additional_data['id'] = $this->input->post('id');
        $additional_data['action'] = $this->input->post('action');
        // call common function for add update item form
       
        $attribute_id = 'redemption_id';
        $db_name = 'db_shareholder_redemption';
        try {
            $id = $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);
            if($additional_data['action']=="add")
                $message = SHAREHOLDER_REDEMPTION_BUYBACK_ADD;
            else if($additional_data['action']=="edit")
                $message = SHAREHOLDER_REDEMPTION_BUYBACK_EDIT;
            else
                $message = SHAREHOLDER_REDEMPTION_BUYBACK_DELETE;
            $success = 1;
            
            
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                                'message'=>$message,
                                'success'=>$success
                            );
        echo json_encode($return_arr);
    }
    
    function get_submit_shareholder_redemption_grid_data(){
        $client_id = $this->input->post('client_id');
        $grid_data = $this->databaseinfo_model->getShareholderRedemptionData($client_id);
        $data['grid_data'] = $grid_data;
        $this->load->view("db/Shareholder/shareholder_redemption_share_grid_data",$data);
    }
    
     function get_shareholder_redemption_grid_data(){
        $client_id = $this->input->post('client_id');
        $grid_data = $this->databaseinfo_model->getShareholderRedemptionData($client_id);
        $data['grid_data'] = $grid_data;
        $this->load->view("db/Shareholder/shareholder_redemption_share_grid_data",$data);
    }
    
    
    function submit_shareholder_redemption_capital_form($client_id){   
     
                
        $session_data = $this->session->all_userdata();
        $userPrimeryId = $session_data['logged_in']['userPrimeryId'];
        $data['shareholder_name'] = $this->input->post('shareholder_name');
        $data['shareholder_address'] = $this->input->post('shareholder_address');
        $data['date_of_redemption'] = ($this->input->post('date_of_redemption')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date_of_allotment'))):'0000-00-00 00:00:00';
        $data['type_of_share'] = $this->input->post('type_of_share');
        $data['no_of_shares'] = $this->input->post('no_of_shares');
        $data['redemption_remark'] = $this->input->post('redemption_remark');                 
        $data['client_id'] = $client_id;
        $additional_data['id'] = $this->input->post('id');
        $additional_data['action'] = $this->input->post('action');
        // call common function for add update item form
       
        $attribute_id = 'redemption_id';
        $db_name = 'db_shareholder_redemption';
        try {
            $id = $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);
            if($additional_data['action']=="add")
                $message = SHAREHOLDER_REDEMPTION_CAPITAL_ADD;
            else if($additional_data['action']=="edit")
                $message = SHAREHOLDER_REDEMPTION_CAPITAL_EDIT;
            else
                $message = SHAREHOLDER_REDEMPTION_CAPITAL_DELETE;
            $success = 1;
            
            
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                                'message'=>$message,
                                'success'=>$success
                            );
        echo json_encode($return_arr);
    }
    
    function get_submit_shareholder_redemption_capital__grid_data(){
        $client_id = $this->input->post('client_id');
        $grid_data = $this->databaseinfo_model->getShareholderRedemptionData($client_id);
        $data['grid_data'] = $grid_data;
        $this->load->view("db/Shareholder/shareholder_redemption_capital_grid_data",$data);
    }
    
    function get_shareholder_allotment_grid_data(){
        $client_id = $this->input->post('client_id');
        $grid_data = $this->databaseinfo_model->getShareholderAllotmentData($client_id);
        $data['grid_data'] = $grid_data;
        $this->load->view("db/Shareholder/shareholder_allotment_grid_data",$data);
    }
    
    function submit_trust_trustinfo_form($client_id){
        $session_data = $this->session->all_userdata();
        $userPrimeryId = $session_data['logged_in']['userPrimeryId'];
        $data['name_of_trust'] = $this->input->post('name_of_trust');
        $data['trust_type'] = $this->input->post('trust_type');
        $data['is_other_than_anex'] = $this->input->post('is_other_than_anex');
        
        if($data['is_other_than_anex']==1){
            $data['name'] = $this->input->post('name');
        } else {
            $data['name'] = "";
        }
        
        $data['date_of_establishment'] = ($this->input->post('date_of_establishment') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('date_of_establishment'))) : '0000-00-00 00:00:00';
        $data['is_trust_deed'] = $this->input->post('is_trust_deed');
        $data['is_global_business_license'] = $this->input->post('is_global_business_license');
        $data['is_letter_of_wishes'] = $this->input->post('is_letter_of_wishes');
        $data['from'] = $this->input->post('from');
        $data['detail'] = $this->input->post('detail');
        $data['is_non_residence'] = $this->input->post('is_non_residence');
        $data['is_trust_tax_residence'] = $this->input->post('is_trust_tax_residence');
        $data['tan_no'] = $this->input->post('tan_no');
        $data['is_account_prepared'] = $this->input->post('is_account_prepared');
        $data['finantial_year_date'] = $this->input->post('finantial_year_date');
        $data['finantial_year_month'] = $this->input->post('finantial_year_month');
        
        $data['is_settlor_individual'] = $this->input->post('is_settlor_individual');
        // yes
        $data['name_of_settlor'] = $this->input->post('name_of_settlor');        
        $data['is_passport'] = $this->input->post('is_passport');
        if ($data['is_passport'] == 1) {
            $data['passport_no'] = $this->input->post('passport_no');
            $data['country_of_issue'] = $this->input->post('country_of_issue');
            $data['date_of_issue'] = ($this->input->post('date_of_issue') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('date_of_issue'))) : '0000-00-00 00:00:00';
            $data['date_of_expiry'] = ($this->input->post('date_of_expiry') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('date_of_expiry'))) : '0000-00-00 00:00:00';
        } else {
            $data['passport_no'] = "";
            $data['country_of_issue'] = "";
            $data['date_of_issue'] = '0000-00-00 00:00:00';
            $data['date_of_expiry'] = '0000-00-00 00:00:00';
        }
        $data['has_cv'] = $this->input->post('has_cv');
        if ($data['has_cv'] == 1)
            $data['recieved_date'] = ($this->input->post('recieved_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('recieved_date'))) : '0000-00-00 00:00:00';
        else
            $data['recieved_date'] = '0000-00-00 00:00:00';

        $data['is_bank_ref'] = $this->input->post('is_bank_ref');
        if ($data['is_bank_ref'] == 1) {
            $data['bank_name'] = $this->input->post('bank_name');
            $data['date'] = ($this->input->post('date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('date'))) : '0000-00-00 00:00:00';
        } else {
            $data['bank_name'] = "";
            $data['date'] = '0000-00-00 00:00:00';
        }
        $data['has_address_proof'] = $this->input->post('has_address_proof');
        if ($data['has_address_proof'] == 1) {
            $data['address'] = $this->input->post('address');
            $data['country'] = $this->input->post('country');
            $data['address_proof_date'] = ($this->input->post('address_proof_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('address_proof_date'))) : '0000-00-00 00:00:00';
        } else {
            $data['address'] = "";
            $data['country'] = "";
            $data['address_proof_date'] = '0000-00-00 00:00:00';
        }

        $data['other_detail'] = $this->input->post('other_detail');
       
        // No
        $data['name_of_company'] = $this->input->post('name_of_company');
        $data['represented_by'] = $this->input->post('represented_by');
        $data['date_of_incorp'] = ($this->input->post('date_of_incorp') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('date_of_incorp'))) : '0000-00-00 00:00:00';
        $data['registered_in'] = $this->input->post('registered_in');
        $data['is_member_register'] = $this->input->post('is_member_register');
        if ($data['is_member_register'] == 1) {
            $data['member_register_date'] = ($this->input->post('member_register_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('member_register_date'))) : '0000-00-00 00:00:00';
        } else {
            $data['member_register_date'] = '0000-00-00 00:00:00';
        }
        $data['is_director_register'] = $this->input->post('is_director_register');
        if ($data['is_director_register'] == 1)
            $data['director_register_date'] = ($this->input->post('director_register_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('director_register_date'))) : '0000-00-00 00:00:00';
        else
            $data['director_register_date'] = '0000-00-00 00:00:00';
        $data['is_corporate_profile'] = $this->input->post('is_corporate_profile');
        $data['is_audited_account'] = $this->input->post('is_audited_account');
        if ($data['is_audited_account'] == 1)
            $data['date_of_finantial_year_end'] = ($this->input->post('date_of_finantial_year_end') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('date_of_finantial_year_end'))) : '0000-00-00 00:00:00';
        else
            $data['date_of_finantial_year_end'] = '0000-00-00 00:00:00';

        $data['is_bank_ref_n'] = $this->input->post('is_bank_ref_n');
        if ($data['is_bank_ref_n'] == 1) {
            $data['bank_name_n'] = $this->input->post('bank_name_n');
            $data['date_n'] = ($this->input->post('date_n') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('date_n'))) : '0000-00-00 00:00:00';
        } else {
            $data['bank_name_n'] = "";
            $data['date_n'] = '0000-00-00 00:00:00';
        }
        $data['has_address_proof_n'] = $this->input->post('has_address_proof_n');
        if ($data['has_address_proof_n'] == 1) {
            $data['address_n'] = $this->input->post('address_n');
            $data['country_n'] = $this->input->post('country_n');
            $data['address_proof_date_n'] = ($this->input->post('address_proof_date_n') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('address_proof_date_n'))) : '0000-00-00 00:00:00';
        } else {
            $data['address_n'] = "";
            $data['country_n'] = "";
            $data['address_proof_date_n'] = '0000-00-00 00:00:00';
        }
        $data['remarks'] = $this->input->post('remarks');
        
        $data['client_id'] = $client_id;
        $additional_data['id'] = $this->input->post('id');
        
        $additional_data['action'] = $this->input->post('action');
        if ($data['is_settlor_individual'] == 1) {
            $data['name_of_company'] = "";
            $data['represented_by'] = "";
            $data['date_of_incorp'] = '0000-00-00 00:00:00';
            $data['registered_in'] = "";
            $data['is_member_register'] = "";
            $data['member_register_date'] = '0000-00-00 00:00:00';
            $data['is_director_register'] = "";
            $data['director_register_date'] = '0000-00-00 00:00:00';
            $data['is_corporate_profile'] = "";
            $data['is_audited_account'] = "";
            $data['date_of_finantial_year_end'] = "";
            $data['is_bank_ref_n'] = "";
            $data['bank_name_n'] = "";
            $data['date_n'] = '0000-00-00 00:00:00';
            $data['has_address_proof_n'] = "";
            $data['address_n'] = "";
            $data['country_n'] = "";
            $data['address_proof_date_n'] = '0000-00-00 00:00:00';
            $data['remarks'] = "";
                        
        } else {
            $data['name_of_settlor'] = "";        
            $data['is_passport'] = "";       
            $data['passport_no'] = "";        
            $data['country_of_issue'] = "";       
            $data['date_of_issue'] = '0000-00-00 00:00:00';
            $data['date_of_expiry'] = '0000-00-00 00:00:00';
            $data['has_cv'] = "";        
            $data['recieved_date'] = '0000-00-00 00:00:00';
            $data['is_bank_ref'] = "";        
            $data['bank_name'] = ""; 
            $data['date'] = '0000-00-00 00:00:00';
            $data['has_address_proof'] = ""; 
            $data['address'] = "";
            $data['country'] = "";
            $data['address_proof_date'] = '0000-00-00 00:00:00';
            $data['other_detail'] = "";
            
        }
        // call common function for add update item form
        $attribute_id = 'trustinfo_id';
        $db_name = 'db_trust_trustinfo';
        try {
            $id = $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);
            if($additional_data['action']=="add")
                $message = TRUST_TRUSTINFO_ADD;
            else if($additional_data['action']=="edit")
                $message = TRUST_TRUSTINFO_EDIT;
            else
                $message = TRUST_TRUSTINFO_DELETE;
            $success = 1;
                    } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                                'message'=>$message,
                                'success'=>$success
                            );
        echo json_encode($return_arr);
    }
    
    function get_trust_trustinfo_grid_data(){
        $client_id = $this->input->post('client_id');
        $grid_data = $this->databaseinfo_model->getTrustTrustInfoData($client_id);
        $data['grid_data'] = $grid_data;
        $this->load->view("db/Trust/trust_trustinfo_grid_data",$data);
    }
    
    function submit_trust_beneficiary_form($client_id){
        $session_data = $this->session->all_userdata();
        $userPrimeryId = $session_data['logged_in']['userPrimeryId'];
        
        // Beneficiary
        $data['is_beneficiary'] = $this->input->post('is_beneficiary');
        // b yes
        $data['by_name_of_beneficiary'] = $this->input->post('by_name_of_beneficiary');
        $data['by_is_passport'] = $this->input->post('by_is_passport');
        if ($data['by_is_passport'] == 1) {
            $data['by_passport_no'] = $this->input->post('by_passport_no');
            $data['by_country_of_issue'] = $this->input->post('by_country_of_issue');
            $data['by_date_of_issue'] = ($this->input->post('by_date_of_issue') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('by_date_of_issue'))) : '0000-00-00 00:00:00';
            $data['by_date_of_expiry'] = ($this->input->post('by_date_of_expiry') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('by_date_of_expiry'))) : '0000-00-00 00:00:00';
        } else {
            $data['by_passport_no'] = "";
            $data['by_country_of_issue'] = "";
            $data['by_date_of_issue'] = '0000-00-00 00:00:00';
            $data['by_date_of_expiry'] = '0000-00-00 00:00:00';
        }
        $data['by_has_cv'] = $this->input->post('by_has_cv');
        if ($data['by_has_cv'] == 1)
            $data['by_recieved_date'] = ($this->input->post('by_recieved_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('by_recieved_date'))) : '0000-00-00 00:00:00';
        else
            $data['by_recieved_date'] = '0000-00-00 00:00:00';

        $data['by_is_bank_ref'] = $this->input->post('by_is_bank_ref');
        if ($data['by_is_bank_ref'] == 1) {
            $data['by_bank_name'] = $this->input->post('by_bank_name');
            $data['by_date'] = ($this->input->post('by_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('by_date'))) : '0000-00-00 00:00:00';
        } else {
            $data['by_bank_name'] = "";
            $data['by_date'] = '0000-00-00 00:00:00';
        }
        $data['by_has_address_proof'] = $this->input->post('by_has_address_proof');
        if ($data['by_has_address_proof'] == 1) {
            $data['by_address'] = $this->input->post('by_address');
            $data['by_country'] = $this->input->post('by_country');
            $data['by_address_proof_date'] = ($this->input->post('by_address_proof_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('by_address_proof_date'))) : '0000-00-00 00:00:00';
        } else {
            $data['by_address'] = "";
            $data['by_country'] = "";
            $data['by_address_proof_date'] = '0000-00-00 00:00:00';
        }

        $data['by_other_detail'] = $this->input->post('by_other_detail');
       
        // b No
        $data['bn_name_of_company'] = $this->input->post('bn_name_of_company');
        $data['bn_represented_by'] = $this->input->post('bn_represented_by');
        $data['bn_date_of_incorp'] = ($this->input->post('bn_date_of_incorp') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('bn_date_of_incorp'))) : '0000-00-00 00:00:00';
        $data['bn_registered_in'] = $this->input->post('bn_registered_in');
        $data['bn_is_member_register'] = $this->input->post('bn_is_member_register');
        if ($data['bn_is_member_register'] == 1) {
            $data['bn_member_register_date'] = ($this->input->post('bn_member_register_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('bn_member_register_date'))) : '0000-00-00 00:00:00';
        } else {
            $data['bn_member_register_date'] = '0000-00-00 00:00:00';
        }
        $data['bn_is_director_register'] = $this->input->post('bn_is_director_register');
        if ($data['bn_is_director_register'] == 1)
            $data['bn_director_register_date'] = ($this->input->post('bn_director_register_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('bn_director_register_date'))) : '0000-00-00 00:00:00';
        else
            $data['bn_director_register_date'] = '0000-00-00 00:00:00';
        $data['bn_is_corporate_profile'] = $this->input->post('bn_is_corporate_profile');
        $data['bn_is_audited_account'] = $this->input->post('bn_is_audited_account');
        if ($data['bn_is_audited_account'] == 1)
            $data['bn_date_of_finantial_year_end'] = ($this->input->post('bn_date_of_finantial_year_end') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('bn_date_of_finantial_year_end'))) : '0000-00-00 00:00:00';
        else
            $data['bn_date_of_finantial_year_end'] = '0000-00-00 00:00:00';

        $data['bn_is_bank_ref'] = $this->input->post('bn_is_bank_ref');
        if ($data['bn_is_bank_ref'] == 1) {
            $data['bn_bank_name'] = $this->input->post('bn_bank_name');
            $data['bn_date'] = ($this->input->post('bn_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('bn_date'))) : '0000-00-00 00:00:00';
        } else {
            $data['bn_bank_name'] = "";
            $data['bn_date'] = '0000-00-00 00:00:00';
        }
        $data['bn_has_address_proof'] = $this->input->post('bn_has_address_proof');
        if ($data['bn_has_address_proof'] == 1) {
            $data['bn_address'] = $this->input->post('bn_address');
            $data['bn_country'] = $this->input->post('bn_country');
            $data['bn_address_proof_date'] = ($this->input->post('bn_address_proof_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('bn_address_proof_date'))) : '0000-00-00 00:00:00';
        } else {
            $data['bn_address'] = "";
            $data['bn_country'] = "";
            $data['bn_address_proof_date'] = '0000-00-00 00:00:00';
        }
        $data['bn_remarks'] = $this->input->post('bn_remarks');
        
        if ($data['is_beneficiary'] == 1) {
            $data['bn_name_of_company'] = "";
            $data['bn_represented_by'] = "";
            $data['bn_date_of_incorp'] = '0000-00-00 00:00:00';
            $data['bn_registered_in'] = "";
            $data['bn_is_member_register'] = "";
            $data['bn_member_register_date'] = '0000-00-00 00:00:00';
            $data['bn_is_director_register'] = "";
            $data['bn_director_register_date'] = '0000-00-00 00:00:00';
            $data['bn_is_corporate_profile'] = "";
            $data['bn_is_audited_account'] = "";
            $data['bn_date_of_finantial_year_end'] = "";
            $data['bn_is_bank_ref'] = "";
            $data['bn_bank_name'] = "";
            $data['bn_date'] = '0000-00-00 00:00:00';
            $data['bn_has_address_proof'] = "";
            $data['bn_address'] = "";
            $data['bn_country'] = "";
            $data['bn_address_proof_date'] = '0000-00-00 00:00:00';
            $data['bn_remarks'] = "";
                        
        } else {
            $data['by_name_of_beneficiary'] = "";        
            $data['by_is_passport'] = "";       
            $data['by_passport_no'] = "";        
            $data['by_country_of_issue'] = "";       
            $data['by_date_of_issue'] = '0000-00-00 00:00:00';
            $data['by_date_of_expiry'] = '0000-00-00 00:00:00';
            $data['by_has_cv'] = "";        
            $data['by_recieved_date'] = '0000-00-00 00:00:00';
            $data['by_is_bank_ref'] = "";        
            $data['by_bank_name'] = ""; 
            $data['by_date'] = '0000-00-00 00:00:00';
            $data['by_has_address_proof'] = ""; 
            $data['by_address'] = "";
            $data['by_country'] = "";
            $data['by_address_proof_date'] = '0000-00-00 00:00:00';
            $data['by_other_detail'] = "";
        }
        
        // Protector
        $data['is_protector'] = $this->input->post('is_protector');
        // p yes
        $data['py_name_of_protector'] = $this->input->post('py_name_of_protector');
        $data['py_is_passport'] = $this->input->post('py_is_passport');
        if ($data['py_is_passport'] == 1) {
            $data['py_passport_no'] = $this->input->post('py_passport_no');
            $data['py_country_of_issue'] = $this->input->post('py_country_of_issue');
            $data['py_date_of_issue'] = ($this->input->post('py_date_of_issue') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('py_date_of_issue'))) : '0000-00-00 00:00:00';
            $data['py_date_of_expiry'] = ($this->input->post('py_date_of_expiry') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('py_date_of_expiry'))) : '0000-00-00 00:00:00';
        } else {
            $data['py_passport_no'] = "";
            $data['py_country_of_issue'] = "";
            $data['py_date_of_issue'] = '0000-00-00 00:00:00';
            $data['py_date_of_expiry'] = '0000-00-00 00:00:00';
        }
        $data['py_has_cv'] = $this->input->post('py_has_cv');
        if ($data['py_has_cv'] == 1)
            $data['py_recieved_date'] = ($this->input->post('py_recieved_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('py_recieved_date'))) : '0000-00-00 00:00:00';
        else
            $data['py_recieved_date'] = '0000-00-00 00:00:00';

        $data['py_is_bank_ref'] = $this->input->post('py_is_bank_ref');
        if ($data['py_is_bank_ref'] == 1) {
            $data['py_bank_name'] = $this->input->post('py_bank_name');
            $data['py_date'] = ($this->input->post('py_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('py_date'))) : '0000-00-00 00:00:00';
        } else {
            $data['py_bank_name'] = "";
            $data['py_date'] = '0000-00-00 00:00:00';
        }
        $data['py_has_address_proof'] = $this->input->post('py_has_address_proof');
        if ($data['py_has_address_proof'] == 1) {
            $data['py_address'] = $this->input->post('py_address');
            $data['py_country'] = $this->input->post('py_country');
            $data['py_address_proof_date'] = ($this->input->post('py_address_proof_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('py_address_proof_date'))) : '0000-00-00 00:00:00';
        } else {
            $data['py_address'] = "";
            $data['py_country'] = "";
            $data['py_address_proof_date'] = '0000-00-00 00:00:00';
        }

        $data['py_other_detail'] = $this->input->post('py_other_detail');
       
        // p No
        $data['pn_name_of_company'] = $this->input->post('pn_name_of_company');
        $data['pn_represented_by'] = $this->input->post('pn_represented_by');
        $data['pn_date_of_incorp'] = ($this->input->post('pn_date_of_incorp') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('pn_date_of_incorp'))) : '0000-00-00 00:00:00';
        $data['pn_registered_in'] = $this->input->post('pn_registered_in');
        $data['pn_is_member_register'] = $this->input->post('pn_is_member_register');
        if ($data['pn_is_member_register'] == 1) {
            $data['pn_member_register_date'] = ($this->input->post('pn_member_register_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('pn_member_register_date'))) : '0000-00-00 00:00:00';
        } else {
            $data['pn_member_register_date'] = '0000-00-00 00:00:00';
        }
        $data['pn_is_director_register'] = $this->input->post('pn_is_director_register');
        if ($data['pn_is_director_register'] == 1)
            $data['pn_director_register_date'] = ($this->input->post('pn_director_register_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('pn_director_register_date'))) : '0000-00-00 00:00:00';
        else
            $data['pn_director_register_date'] = '0000-00-00 00:00:00';
        $data['pn_is_corporate_profile'] = $this->input->post('pn_is_corporate_profile');
        $data['pn_is_audited_account'] = $this->input->post('pn_is_audited_account');
        if ($data['pn_is_audited_account'] == 1)
            $data['pn_date_of_finantial_year_end'] = ($this->input->post('pn_date_of_finantial_year_end') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('pn_date_of_finantial_year_end'))) : '0000-00-00 00:00:00';
        else
            $data['pn_date_of_finantial_year_end'] = '0000-00-00 00:00:00';

        $data['pn_is_bank_ref'] = $this->input->post('pn_is_bank_ref');
        if ($data['pn_is_bank_ref'] == 1) {
            $data['pn_bank_name'] = $this->input->post('pn_bank_name');
            $data['pn_date'] = ($this->input->post('pn_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('pn_date'))) : '0000-00-00 00:00:00';
        } else {
            $data['pn_bank_name'] = "";
            $data['pn_date'] = '0000-00-00 00:00:00';
        }
        $data['pn_has_address_proof'] = $this->input->post('pn_has_address_proof');
        if ($data['pn_has_address_proof'] == 1) {
            $data['pn_address'] = $this->input->post('pn_address');
            $data['pn_country'] = $this->input->post('pn_country');
            $data['pn_address_proof_date'] = ($this->input->post('pn_address_proof_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('pn_address_proof_date'))) : '0000-00-00 00:00:00';
        } else {
            $data['pn_address'] = "";
            $data['pn_country'] = "";
            $data['pn_address_proof_date'] = '0000-00-00 00:00:00';
        }
        $data['pn_remarks'] = $this->input->post('pn_remarks');
        
        if ($data['is_protector'] == 1) {
            $data['pn_name_of_company'] = "";
            $data['pn_represented_by'] = "";
            $data['pn_date_of_incorp'] = '0000-00-00 00:00:00';
            $data['pn_registered_in'] = "";
            $data['pn_is_member_register'] = "";
            $data['pn_member_register_date'] = '0000-00-00 00:00:00';
            $data['pn_is_director_register'] = "";
            $data['pn_director_register_date'] = '0000-00-00 00:00:00';
            $data['pn_is_corporate_profile'] = "";
            $data['pn_is_audited_account'] = "";
            $data['pn_date_of_finantial_year_end'] = "";
            $data['pn_is_bank_ref'] = "";
            $data['pn_bank_name'] = "";
            $data['pn_date'] = '0000-00-00 00:00:00';
            $data['pn_has_address_proof'] = "";
            $data['pn_address'] = "";
            $data['pn_country'] = "";
            $data['pn_address_proof_date'] = '0000-00-00 00:00:00';
            $data['pn_remarks'] = "";
                        
        } else {
            $data['py_name_of_protector'] = "";        
            $data['py_is_passport'] = "";       
            $data['py_passport_no'] = "";        
            $data['py_country_of_issue'] = "";       
            $data['py_date_of_issue'] = '0000-00-00 00:00:00';
            $data['py_date_of_expiry'] = '0000-00-00 00:00:00';
            $data['py_has_cv'] = "";        
            $data['py_recieved_date'] = '0000-00-00 00:00:00';
            $data['py_is_bank_ref'] = "";        
            $data['py_bank_name'] = ""; 
            $data['py_date'] = '0000-00-00 00:00:00';
            $data['py_has_address_proof'] = ""; 
            $data['py_address'] = "";
            $data['py_country'] = "";
            $data['py_address_proof_date'] = '0000-00-00 00:00:00';
            $data['py_other_detail'] = "";
        }
        
        
        $data['client_id'] = $client_id;
        $additional_data['id'] = $this->input->post('id');
        $additional_data['action'] = $this->input->post('action');
        
        // call common function for add update item form
        $attribute_id = 'beneficiary_id';
        $db_name = 'db_trust_beneficiary';
        try {
            $id = $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);
            if($additional_data['action']=="add")
                $message = TRUST_BENEFICIARY_ADD;
            else if($additional_data['action']=="edit")
                $message = TRUST_BENEFICIARY_EDIT;
            else
                $message = TRUST_BENEFICIARY_DELETE;
            $success = 1;
                    } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                                'message'=>$message,
                                'success'=>$success
                            );
        echo json_encode($return_arr);
    }
    
    function get_trust_beneficiary_grid_data(){
        $client_id = $this->input->post('client_id');
        $grid_data = $this->databaseinfo_model->getTrustBeneficiaryData($client_id);
        $data['grid_data'] = $grid_data;
        $this->load->view("db/Trust/trust_beneficiary_grid_data",$data);
    }
    
    function get_activity_detail(){
        $activity = $this->input->post('activity');
        $detail = $this->databaseinfo_model->getActivityDetail($activity);
        echo  $detail;
    }
    
    function submit_data(){
                echo $account_team = $this->input->post('account_team');
                $financial_year = $this->input->post('financial_year');
                echo "<pre>"; print_r($financial_year);

    }
    
    function updateclient(){
        $this->databaseinfo_model->updateClient();
    }
    
    function get_director_detail(){
        $id = $this->input->post('id');
        $director_detail = $this->databaseinfo_model->getDirectorDetail($id);
        return $director_detail;
    }
    
    function submit_director_individual_common(){
        
              
        $session_data = $this->session->all_userdata();
        $userPrimeryId = $session_data['logged_in']['userPrimeryId'];
        $data['director_name'] = $this->input->post('director_name');
        $data['director_surname'] = $this->input->post('director_surname');
        $data['director_birth_date'] = ($this->input->post('director_birth_date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('director_birth_date'))):'0000-00-00 00:00:00';
        $data['director_age'] = $this->input->post('director_age');
        

        $data['has_passport'] = $this->input->post('has_passport');
        if($data['has_passport']==1){
            $data['passport_no'] = $this->input->post('passport_no');
            $data['country_of_issue'] = $this->input->post('country_of_issue');
            $data['date_of_issue'] = ($this->input->post('date_of_issue')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date_of_issue'))):'0000-00-00 00:00:00';
            $data['date_of_expiry'] = ($this->input->post('date_of_expiry')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date_of_expiry'))):'0000-00-00 00:00:00';
        } else {
            $data['passport_no'] = "";
            $data['country_of_issue'] = "";
            $data['date_of_issue'] = "0000-00-00 00:00:00";
            $data['date_of_expiry'] = "0000-00-00 00:00:00";
        }
        
        $data['has_cv'] = $this->input->post('has_cv');
        if ($data['has_cv'] == 1)
            $data['recieved_date'] = ($this->input->post('recieved_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('recieved_date'))) : '0000-00-00 00:00:00';
        else
            $data['recieved_date'] = '0000-00-00 00:00:00';

        $data['has_bank_ref'] = $this->input->post('has_bank_ref');
        if($data['has_bank_ref']==1){
            $data['bank_name'] = $this->input->post('bank_name');
            $data['date'] = ($this->input->post('date')!="")?date('Y-m-d - H:i:s',  strtotime($this->input->post('date'))):'0000-00-00 00:00:00';
        } else {
            $data['bank_name'] = "";
            $data['date'] = "";
        }
        $data['is_address_proof'] = $this->input->post('is_address_proof');
        if($data['is_address_proof']==1){
            $data['address_detail'] = $this->input->post('address_detail');
            $data['address_proof_date'] = ($this->input->post('address_proof_date') != "") ? date('Y-m-d - H:i:s', strtotime($this->input->post('address_proof_date'))) : '0000-00-00 00:00:00';
            $data['country'] = $this->input->post('country');
        } else {
            $data['address_detail'] = "";
            $data['address_proof_date'] = '0000-00-00 00:00:00';
            $data['country'] = "";
        }
        

        $data['other_detail'] = $this->input->post('other_detail');
        
        
        
        $additional_data['id'] = $this->input->post('id');
        $additional_data['action'] = $this->input->post('action');
        // call common function for add update item form
        $attribute_id = 'id';
        $db_name = 'db_director_individual_common';
        
        
        
        try {
            $b = $this->databaseinfo_model->postCommonItemData($data,$additional_data,$attribute_id,$db_name);
//$a = array('a'=>$b);
//        echo json_encode($a);
//        return;
            if($additional_data['action']=="add")
                $message = DIRECTOR_INDIVIDUAL_ADD_KYC;
            else if($additional_data['action']=="edit")
                $message = DIRECTOR_INDIVIDUAL_EDIT_KYC;
            else
                $message = DIRECTOR_INDIVIDUAL_DELETE_KYC;
            $success = 1;
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                                'message'=>$message,
                                'success'=>$success
                            );
        echo json_encode($return_arr);
    }
    
    function get_director_common_grid_data(){
        $grid_data = $this->databaseinfo_model->getDirectorCommonData();
        $data['grid_data'] = $grid_data;
        $this->load->view("db/Director/director_common_grid_data",$data);
    }
    
   function update_accountno(){     
       $AccounnoArr = $this->databaseinfo_model->updateAccountNo();
      
   }
   
   function save_cm_capital_redemption_info($client_id){
       
        $data['capital_after_reduction'] = $this->input->post('capital_after_reduction');
        $data['date_of_capital_reduction'] = ($this->input->post('date_of_capital_reduction') !="")?date('Y-m-d - H:i:s', strtotime($this->input->post('date_of_capital_reduction'))):'0000-00-00 00:00:00';
        $data['stated_capital_after_reduction'] = $this->input->post('stated_capital_after_reduction');
        $data['client_id'] = $this->input->post('client_info');
       
        $additional_data['id'] = $data['client_id'];
        $capitalInfoArr = $this->databaseinfo_model->getCapitalRedemptionData($data['client_id']);           
        
        if(!empty($capitalInfoArr)){
             $additional_data['action'] = 'edit';
        }else{
             $additional_data['action'] = 'add';
        }  
       
        // call common function for add update item form
        $attribute_id = 'client_id';
        $db_name = 'db_capital_redemption_data';
        try {
            $this->databaseinfo_model->postItemData($data,$additional_data,$attribute_id,$db_name);
            $message = SHAREHOLDER_REDEMPTION_CAPITAL_EDIT;
            $success = 1;
        } catch (Exception $e) {
            $message = $e->getMessage();
            $success = 0;
            $restaurants_data = '';
        }
        $return_arr = array(
                            'message'=>$message,
                            'success'=>$success
                           );
        echo json_encode($return_arr);
    }
    
    
   
   function gettab(){
       echo 1;
   }
    
    
}
