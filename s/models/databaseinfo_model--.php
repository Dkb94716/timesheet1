<?php

class Databaseinfo_model extends CI_Model {
    /*
      Developed In: Clavis Technologies Pvt Ltd.
      Modification History
      Create Date   Author			Description
      __________  _______________  ________________________________________
      17-02-2015     Ajay                   Model for Client
     */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function modalBoxOperation($data) {
        $title = $data['title'];
        $element_id = $data['element_id'];
        $placeholder = $data['placeholder'];
        $dbname = $data['dbname'];
        $item_name = $data['item_name'];
        $item_id = $data['item_id'];
        $action = $data['action'];
        $db_field_name = $data['db_field_name'];
        $db_field_id = $data['db_field_id'];
        $message_title = $data['message_title'];
        $dbname_del = "";
        if ($action == "delete") {
            if ($data['message_title'] == "license type") {
                $dbname_del = "db_lp_license";
                $db_field_name_del = "license_type";
            }

            if ($data['message_title'] == "permit type") {
                $dbname_del = "db_lp_permit";
                $db_field_name_del = "permit_type";
            }

            if ($data['message_title'] == "bank") {
                $dbname_del = "db_bank_info";
                $db_field_name_del = "bank_name_id";
            }

            if ($data['message_title'] == "type of account") {
                $dbname_del = "db_bank_info";
                $db_field_name_del = "account_type_id";
            }

            if ($data['message_title'] == "currency") {
                $dbname_del = "db_bank_info";
                $db_field_name_del = "currency_id";
            }

            if ($data['message_title'] == "account no.") {
                $dbname_del = "db_bank_info";
                $db_field_name_del = "accountno_id";
            }

            if ($data['message_title'] == "type of share") {
                $dbname_del = "db_shareholder_allotment";
                $db_field_name_del = "type_of_share";
            }
            if ($dbname_del !== "") {
                $this->db->select('COUNT(*) AS count');
                $this->db->from($dbname_del);
                if ($data['message_title'] == "type of share") {
                    $this->db->where("type_of_share", $item_id);
                    $this->db->or_where("transfer_type_of_share", $item_id);
                } else {
                    $this->db->where($db_field_name_del, $item_id);
                }
                $query = $this->db->get();
                $result = $query->result_array();
                $count = $result[0]['count'];
                if ($count > 0) {
                    $msg = "Cannot delete or update a parent row child";
                    // Throw an exception for database.
                    throw new Exception($msg);
                } else {
                    $this->db->where($db_field_id, $item_id);
                    $this->db->delete($dbname);
                }

                $insert_id = '';
                $status = 1;
                $message = $placeholder . " has been deleted successfully.";
            } else {
                $this->db->where($db_field_id, $item_id);
                $this->db->delete($dbname);
                $insert_id = '';
                $status = 1;
                $message = $placeholder . " has been deleted successfully.";
            }
        } else {
            $item_arr[$db_field_name] = $item_name;
            // check for duplicate
            $this->db->select('COUNT(*) AS count');
            $this->db->from($dbname);
            $this->db->where($db_field_name, $item_name);
            $this->db->where_not_in($db_field_id, $item_id);

            $query = $this->db->get();
            $result = $query->result_array();
            $count = $result[0]['count'];
            if ($count == 0) {
                if ($action == "add") {
                    $this->db->insert($dbname, $item_arr);
                    $insert_id = $this->db->insert_id();
                    $status = 1;
                    $message = $placeholder . " has been added succesfully.";
                } else {
                    $this->db->where($db_field_id, $item_id);
                    $this->db->update($dbname, $item_arr);
                    $insert_id = $this->db->insert_id();
                    $status = 1;
                    $message = $placeholder . " has been updated succesfully.";
                }
            } else {
                $status = 0;
                $message = "A " . $message_title . " with specified name is already exist. Please try a different name.";
                $insert_id = '';
            }
        }
        $this->db->select('*');
        $this->db->from($dbname);
        $this->db->order_by($db_field_name);
        $query = $this->db->get();
        $result = $query->result_array();
        $final_arr = array(
            'status' => $status,
            'message' => $message,
            'data' => $result,
            'insert_id' => $insert_id
        );
        return $final_arr;
    }

    function getModalListOnDelete($data) {
        $title = $data['title'];
        $element_id = $data['element_id'];
        $placeholder = $data['placeholder'];
        $dbname = $data['dbname'];
        $item_name = $data['item_name'];
        $item_id = $data['item_id'];
        $action = $data['action'];
        $db_field_name = $data['db_field_name'];
        $db_field_id = $data['db_field_id'];
        $message_title = $data['message_title'];
        $this->db->select('*');
        $this->db->from($dbname);
        $this->db->order_by($db_field_name);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function getTypeOfLicensePermit() {
        $this->db->select('*');
        $this->db->from("db_lp_license_type");
        $this->db->order_by('type_name');
        $query = $this->db->get();
        $result1 = $query->result_array();
        $this->db->select('*');
        $this->db->from("db_lp_permit_type");
        $this->db->order_by('type_name');
        $query = $this->db->get();
        $result2 = $query->result_array();
        $final_arr = array(
            'license' => $result1,
            'permit' => $result2,
        );
        return $final_arr;
    }

    function getLicensePermitData($client_id = '') {
        $this->db->select('dll.*,dllt.type_name as license_type_name');
        $this->db->from("db_lp_license as dll");
        $this->db->join("db_lp_license_type as dllt", 'dll.license_type=dllt.type_id');
        $this->db->where('dll.client_id', $client_id);
        $query = $this->db->get();
        $this->db->last_query();
        $result1 = $query->result_array();
        $this->db->select('*');
        $this->db->select('dlp.*,dlpt.type_name as permit_type_name');
        $this->db->from("db_lp_permit as dlp");
        $this->db->join("db_lp_permit_type as dlpt", 'dlp.permit_type=dlpt.type_id');
        $this->db->where('dlp.client_id', $client_id);
        $query = $this->db->get();
        $result2 = $query->result_array();
        $final_arr = array(
            'license_data' => $result1,
            'permit_data' => $result2,
        );
        return $final_arr;
    }

    function postItemData($data, $additional_data, $attribute_id, $db_name) {
        
        
        $action = $additional_data['action'];
        $id = '';
        if ($action == "edit") {
            $id = $additional_data['id'];
            $this->db->where($attribute_id, $id);
            $this->db->update($db_name, $data);
        } else {
//            return $data;
            $this->db->insert($db_name, $data);
            $id = $this->db->insert_id();
        }
        return $id;
    }
    
    function postCommonItemData($data, $additional_data, $attribute_id, $db_name) {
        
        
        $action = $additional_data['action'];
        $id = '';
        if ($action == "edit") {
            $id = $additional_data['id'];
            $this->db->where($attribute_id, $id);
            $this->db->update($db_name, $data);
            $this->updateMainTbles($data,$additional_data);
        } else {
//            return $data;
            $this->db->insert($db_name, $data);
            $id = $this->db->insert_id();
        }
        return $id;
    }
    
    
    function updateMainTbles($data,$additional_data){
        $this->updateDirIndFrCom($data,$additional_data);
        $this->updateShareIndFrCom($data,$additional_data);
        $this->updateBenefIndFrCom($data,$additional_data);
    }
    
    function updateDirIndFrCom($info,$additional_data){        
        $data['director_name'] = $info['director_name'];
        $data['director_surname'] = $info['director_surname'];
        $data['director_birth_date'] = $info['director_birth_date'];
        $data['director_age'] = $info['director_age'];
        $data['has_passport'] = $info['has_passport'];
        $data['passport_no'] = $info['passport_no'];
        $data['country_of_issue'] = $info['country_of_issue'];
        $data['date_of_issue'] = $info['date_of_issue'];
        $data['date_of_expiry'] = $info['date_of_expiry'];        
        $data['has_cv'] = $info['has_cv'];
        $data['recieved_date'] = $info['recieved_date'];
        $data['has_bank_ref'] = $info['has_bank_ref'];
        $data['bank_name'] = $info['bank_name'];
        $data['date'] = $info['date'];
        $data['is_address_proof'] = $info['is_address_proof'];
        $data['address_detail'] = $info['address_detail'];
        $data['address_proof_date'] = $info['address_proof_date'];
        $data['country'] = $info['country'];
        $data['other_detail'] = $info['other_detail'];
        $this->db->where('common_dir_id', $additional_data['id']);
        $this->db->update('db_director_individual', $data);
    }
    
    function updateShareIndFrCom($info,$additional_data){        
        $data['name_of_shareholder'] = $info['director_name'];
        $data['surname_of_shareholder'] = $info['director_surname'];         
        $data['is_passport'] = $info['has_passport'];
        $data['passport_no'] = $info['passport_no'];
        $data['country_of_issue'] = $info['country_of_issue'];
        $data['date_of_issue'] = $info['date_of_issue'];
        $data['date_of_expiry'] = $info['date_of_expiry'];        
        $data['has_cv'] = $info['has_cv'];
        $data['recieved_date'] = $info['recieved_date'];
        $data['is_bank_ref'] = $info['has_bank_ref'];
        $data['bank_name'] = $info['bank_name'];
        $data['date'] = $info['date'];
        $data['has_address_proof'] = $info['is_address_proof'];
        $data['address'] = $info['address_detail'];
        $data['address_proof_date'] = $info['address_proof_date'];
        $data['country'] = $info['country'];
        $data['other_detail'] = $info['other_detail'];
        $this->db->where('common_dir_id', $additional_data['id']);
        $this->db->update('db_shareholder_individual', $data);
//        echo $this->db->last_query();
//        echo "<pre>"; print_r($info);
    }
    
    function updateBenefIndFrCom($info,$additional_data){        
        $data['owner_name'] = $info['director_name'];
        $data['owner_surname'] = $info['director_surname'];
        $data['has_passport'] = $info['has_passport'];
        $data['passport_no'] = $info['passport_no'];
        $data['country_of_issue'] = $info['country_of_issue'];
        $data['date_of_issue'] = $info['date_of_issue'];
        $data['date_of_expiry'] = $info['date_of_expiry'];        
        $data['has_cv'] = $info['has_cv'];
        $data['recieved_date'] = $info['recieved_date'];
        $data['is_bank_ref'] = $info['has_bank_ref'];
        $data['bank_name'] = $info['bank_name'];
        $data['date'] = $info['date'];
        $data['has_address_proof'] = $info['is_address_proof'];
        $data['address'] = $info['address_detail'];
        $data['address_proof_date'] = $info['address_proof_date'];
        $data['country'] = $info['country'];
        $data['other_detail'] = $info['other_detail'];
        $this->db->where('common_dir_id', $additional_data['id']);
        $this->db->update('db_beneficial_individual', $data);
    }
    

    function postRelationalItemData($relational_data_arr, $id, $attribute_id, $db_name) {
        $this->db->insert($db_name, $relational_data_arr);
        return true;
    }

    function getDetail($id, $db_name, $db_field_id) {
        $this->db->select('*');
        $this->db->from($db_name);
        $this->db->where($db_field_id, $id);
        $query = $this->db->get();
        $result = $query->result_array();
       
        
        return $result;
    }

    function deleteItem($data) {
        $id = $data['id'];
        $db_name = $data['db_name'];
        $db_field_id = $data['db_field_id'];
        $this->db->where($db_field_id, $id);
        $this->db->delete($db_name);
        return 1;
    }

    function getBankFieldsList() {
        $this->db->select('*');
        $this->db->from("db_ba_accountno");
        $this->db->order_by('accountno_id');
        $query = $this->db->get();
        $result1 = $query->result_array();
        $this->db->select('*');
        $this->db->from("db_ba_accounttype");
        $this->db->order_by('account_type_id');
        $query = $this->db->get();
        $result2 = $query->result_array();
        $this->db->select('*');
        $this->db->from("db_ba_bankname");
        $this->db->order_by('bank_name_id');
        $query = $this->db->get();
        $result3 = $query->result_array();
        $this->db->select('*');
        $this->db->from("db_ba_currency");
        $this->db->order_by('currency_id');
        $query = $this->db->get();
        $result4 = $query->result_array();
        $final_arr = array(
            'account_no' => $result1,
            'account_type' => $result2,
            'bank_name' => $result3,
            'currency' => $result4
        );
        return $final_arr;
    }

    function getBankData($client_id) {
        $this->db->select('dbi.*,dbi.account_no,dbac.account_type_name,dbb.bank_name,dbc.currency_name');
        $this->db->from("db_bank_info as dbi");
        $this->db->join("db_ba_accountno as dba", 'dba.accountno_id=dbi.accountno_id', 'left');
        $this->db->join("db_ba_accounttype as dbac", 'dbac.account_type_id=dbi.account_type_id', 'left');
        $this->db->join("db_ba_bankname as dbb", 'dbb.bank_name_id=dbi.bank_name_id', 'left');
        $this->db->join("db_ba_currency as dbc", 'dbc.currency_id=dbi.currency_id', 'left');
        $this->db->where('dbi.client_id', $client_id);
        $query = $this->db->get();
        $this->db->last_query();
        $result = $query->result_array();
        return $result;
    }

    function getAccountData($client_id) {
        $this->db->select('*');
        $this->db->from("db_fta_accounts");
        $this->db->where('client_id', $client_id);
        $this->db->order_by('account_id');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function getAccountValues($account_id) {
        $this->db->select('*');
        $this->db->from("db_fta_accounts_values");
        $this->db->where('account_id', $account_id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function getAuditorData($client_id) {
        $this->db->select('*');
        $this->db->from("db_fta_auditors");
        $this->db->where('client_id', $client_id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function getTaxtrcData($client_id) {
        $this->db->select('*');
        $this->db->from("db_fta_taxtrc");
        $this->db->where('client_id', $client_id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function getSubstanceData($client_id) {
        $this->db->select('*');
        $this->db->from("db_fta_substance");
        $this->db->where('client_id', $client_id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function getComplianceData($client_id) {
        $this->db->select('*');
        $this->db->from("db_compliance_info");
        $this->db->where('client_id', $client_id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function getAgreementData($client_id) {
        $this->db->select('*');
        $this->db->from("db_agreement_contracts");
        $this->db->where('client_id', $client_id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function getCorporateDataValues($client_id) {
        $this->db->select('*');
        $this->db->from("db_corporate_data");
        $this->db->where('client_id', $client_id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function getCorporateSelectMenuData() {
        $this->db->select('*');
        $this->db->from("db_cd_company_type");
        $this->db->order_by('company_type');
        $query = $this->db->get();
        $result1 = $query->result_array();
        $this->db->select('*');
        $this->db->from("db_cd_status");
        $this->db->order_by('status');
        $query = $this->db->get();
        $result2 = $query->result_array();
        $this->db->select('*');
        $this->db->from("db_cd_activity");
        $this->db->order_by('activity_id');
        $query = $this->db->get();
        $result3 = $query->result_array();

        $final_arr = array(
            'company_type' => $result1,
            'status' => $result2,
            'activity' => $result3
        );
        return $final_arr;
    }

    function getDirectorIndividualData($client_id) {
        $this->db->select('*');
        $this->db->from("db_director_individual");
        $this->db->where('client_id', $client_id);
        $this->db->order_by('director_name');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function getDirectorCorporateData($client_id) {
        $this->db->select('*');
        $this->db->from("db_director_corporate");
        $this->db->where('client_id', $client_id);
        $this->db->order_by('entity_name');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function getBoIndividualData($client_id) {
        $this->db->select('*');
        $this->db->from("db_beneficial_individual");
        $this->db->where('client_id', $client_id);
        $this->db->order_by('owner_name');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function getBoCorporateData($client_id) {
        $this->db->select('*');
        $this->db->from("db_beneficial_corporate");
        $this->db->where('client_id', $client_id);
        $this->db->order_by('name_of_company');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function getAuthPersonInfo($beneficial_crp_id) {
        $this->db->select('*');
        $this->db->from("db_beneficial_corporate_auth_person");
        $this->db->where('beneficial_crp_id', $beneficial_crp_id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function getShareholderIndividualData($client_id) {
        $this->db->select('*');
        $this->db->from("db_shareholder_individual");
        $this->db->where('client_id', $client_id);
//        $this->db->order_by('name_of_company');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function getShareholderAllotmentData($client_id) {
        $this->db->select('dsa.*,dsat.type_of_share,dsata.type_of_share as transfer_type_of_share');
        $this->db->from("db_shareholder_allotment as dsa");
        $this->db->join("db_shareholder_allotment_typeofshare dsat", "dsat.type_id=dsa.type_of_share", "left");
        $this->db->join("db_shareholder_allotment_typeofshare dsata", "dsata.type_id=dsa.transfer_type_of_share", "left");
        $this->db->where('client_id', $client_id);
        $this->db->order_by('shareholder');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function getShareholderAllotmentTypeofshareList() {
        $this->db->select('*');
        $this->db->from("db_shareholder_allotment_typeofshare");
        $this->db->order_by('type_of_share');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function getTrustTrustInfoData($client_id) {
        $this->db->select('*');
        $this->db->from("db_trust_trustinfo");
        $this->db->where('client_id', $client_id);
        $this->db->order_by('name_of_trust');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function getTrustBeneficiaryData($client_id) {
        $this->db->select('*');
        $this->db->from("db_trust_beneficiary");
        $this->db->where('client_id', $client_id);
        $this->db->order_by('beneficiary_id');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function postActivityDetail($data) {
        $this->db->select('COUNT(*) AS count');
        $this->db->from("db_cd_activity_detail");
        $this->db->where('activity', $data['activity']);
        $query = $this->db->get();
        $result = $query->result_array();
        $count = $result[0]['count'];
        if ($count > 0) {
            // update
            $update_data_arr = array('detail' => $data['activity_detail']);
            $this->db->where('activity', $data['activity']);
            $this->db->update('db_cd_activity_detail', $update_data_arr);
        } else {
            // add
            $insert_data_arr = array('detail' => $data['activity_detail'], 'activity' => $data['activity']);
            $this->db->insert('db_cd_activity_detail', $insert_data_arr);
        }
    }

    function getActivityDetail($activity) {
        $this->db->select('detail');
        $this->db->from("db_cd_activity_detail");
        $this->db->where('activity', $activity);
        $query = $this->db->get();
        $result = $query->result_array();
        $detail = @$result[0]['detail'];
        return $detail;
    }

    function updateClient() {
        $query = $this->db->query("SELECT * FROM client");


        //echo $this->db->last_query();die;   
        // $query = $this->db->get();

        $result = $query->result();
        foreach ($result as $res) {
            $client_id = $res->client_id;
            $this->db->select('*');
            $this->db->from('db_corporate_data');
            $this->db->where('client_id', $client_id);
            $query = $this->db->get();
            $num_rows = $query->num_rows();
            if ($num_rows == 0) {
                $data_db_arr = array('client_id' => $client_id);
                $this->db->insert('db_corporate_data', $data_db_arr);
            }
        }
        // echo "<pre>"; print_r($result);
        $query = $this->db->query("");

        echo "clients info on corporate info has updated successfully";
    }

    function postIndividualCommonData($data) {
        $this->db->select('*');
        $this->db->from('db_director_individual_common');
        $this->db->where('passport_no', $data['passport_no']);
        $query = $this->db->get();
        $num_rows = $query->num_rows();
        if ($num_rows == 0) {
            $this->db->insert('db_director_individual_common', $data);
        } else {
            $this->db->where('passport_no', $data['passport_no']);
            $this->db->update('db_director_individual_common', $data);
        }
    }

    function getCommonDirector() {
        $this->db->select('*');
        $this->db->from("db_director_individual_common");
        $this->db->order_by('director_name');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    
    function getDirectorDetail($id){
        $date = date('Y-m-d');
        $this->db->select('*');
        $this->db->from("db_director_individual_common");
        $this->db->where('id',$id);
        $query = $this->db->get();
        $result = $query->result_array();
        $final_array = array();
        foreach ($result as $_result) {
            
            $date_of_issue = ($_result['date_of_issue']!="0000-00-00 00:00:00")?date('d F Y', strtotime($_result['date_of_issue'])):"";
            $date_of_expiry = ($_result['date_of_expiry']!="0000-00-00 00:00:00")?date('d F Y', strtotime($_result['date_of_expiry'])):"";
            $recieved_date = ($_result['recieved_date']!="0000-00-00 00:00:00")?date('d F Y', strtotime($_result['recieved_date'])):"";
            $date1 = ($_result['date']!="0000-00-00 00:00:00")?date('d F Y', strtotime($_result['date'])):"";
            $address_proof_date = ($_result['address_proof_date']!="0000-00-00 00:00:00")?date('d F Y', strtotime($_result['address_proof_date'])):"";
            $director_birth_date = ($_result['director_birth_date']!="0000-00-00 00:00:00")?date('d F Y', strtotime($_result['director_birth_date'])):"";
            
            $final_array[] = array(
                                    'director_name'=>$_result['director_name'],
                                    'director_age'=>$_result['director_age'],
                                    'director_birth_date'=>$director_birth_date,
                                    'has_passport'=>$_result['has_passport'],
                                    'passport_no'=>$_result['passport_no'],
                                    'country_of_issue'=>$_result['country_of_issue'],
                                    'date_of_issue'=>$date_of_issue,
                                    'date_of_expiry'=>$date_of_expiry,
                                    'has_cv'=>$_result['has_cv'],
                                    'recieved_date'=>$recieved_date,
                                    'has_bank_ref'=>$_result['has_bank_ref'],
                                    'bank_name'=>$_result['bank_name'],
                                    'date'=>$date1,
                                    'is_address_proof'=>$_result['is_address_proof'],
                                    'address_detail'=>$_result['address_detail'],
                                    'country'=>$_result['country'],
                                    'address_proof_date'=>$address_proof_date,
                                    'other_detail'=>$_result['other_detail'],
                                  );
        }
        $result_str = json_encode($final_array);
        echo $result_str;
    }
    
    function getDirectorCommonData() {
        $this->db->select('*');
        $this->db->from("db_director_individual_common");
        $this->db->order_by('director_name');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    
        
    
    function updateAccountNo(){  
         $query = $this->db->query("SELECT * FROM db_bank_info");
         $result = $query->result();
       
        foreach ($result as $res) {
            $accountno_id = $res->accountno_id;
            $this->db->select('*');
            $this->db->from('db_ba_accountno');
            $this->db->where('accountno_id', $accountno_id);
            $query = $this->db->get();            
            $result1 = $query->result();
            $num_rows = $query->num_rows();
            
            if ($num_rows != 0) {                        
            $update_data_arr = array('account_no' => $result1[0]->account_no);
            $this->db->where('accountno_id', $accountno_id);
            $this->db->update('db_bank_info', $update_data_arr);
            }
        }
       
        echo "Account no info has updated successfully";
    }
    
    
    
    function getBankSigningangateData($bank_id) {
        $this->db->select('*');
        $this->db->from("db_ba_signing_mandate");
        $this->db->where('bank_id', $bank_id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    
    

}
