<?php

class Client_model extends CI_Model {
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

    function insertClient($data) {
        if ($this->checkClient($data)) {
            
            $this->db->insert('client', $data);
            $client_id = $this->db->insert_id();
            $data_db_arr = array('client_id'=>$client_id);
            $this->db->insert('db_corporate_data', $data_db_arr);
            return $client_id;
        } else {
            return false;
        }
    }

    /** function to update records */
    function updateClient($data) {
        if ($this->checkClient($data)) {
           
            $this->db->where('client_id', $data['client_id']);
            $this->db->update('client', $data);
            
            $this->db->select('*');
            $this->db->from('db_corporate_data');
            $this->db->where('client_id', $data['client_id']);
            $query = $this->db->get();
            $num_rows = $query->num_rows();
            if($num_rows==0){
                $data_db_arr = array('client_id'=>$data['client_id']);
                $this->db->insert('db_corporate_data', $data_db_arr);
            }
            return $data['client_id'];
        } else {

            return false;
        }
    }

    function deleteClient($client_id) {

        $this->db->where('client_id', $client_id);
        $this->db->delete('client');

        return true;
    }

    function checkClient($data) {
        $this->db->select('*');
        $this->db->from('client');

        if (!empty($data['client_id'])) {

            $this->db->where_not_in('client_id', $data['client_id']);
        }
        //$this->db->where('company_id', $data['company_id']);
        $this->db->where('client_name', $data['client_name']);
        $query = $this->db->get();
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
                                
            return false;
        } else {
            return true;
        }
    }

    function listClientNew($user_name=NULL) {
        $this->db->select('*');
        $this->db->from('project_assign_to_users');
        $this->db->where('user_name',$user_name);
        $this->db->group_by('client_name');
        $this->db->order_by('client_name', 'asc');
        $query = $this->db->get();
        // echo $this->db->last_query();die;
        $result = $query->result();
        return $result;
    }

    function listClient($client_id = NULL,$group_by=NULL,$team_name=NULL) {
        if(!empty($team_name)){
          $query = $this->db->query("SELECT * FROM `client` WHERE team_name LIKE '%,".$team_name.",%' OR team_name = '".$team_name."' OR team_name LIKE '%,".$team_name."' OR team_name LIKE '".$team_name.",%'");
        //echo $this->db->last_query();die;   
        $result = $query->result();   
           if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->result();
        }  
        }
        else{
        
        $this->db->select('*,client.client_id as client_main_id');
        $this->db->from('client');
       
        $this->db->order_by('client_name', 'asc');
        if (!empty($client_id)) {
            $this->db->where('client.client_id', $client_id);
        }
         if (!empty($client_name)) {
            $this->db->where('client.client_name', $client_name);
        }
        if(!empty($group_by)){
        $this->db->group_by('client_name');
        }
        
        $query = $this->db->get();
        // echo $this->db->last_query();die;
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
        }
    }

    function listCountry($country_id=NULL) {
        $this->db->select('*');
        $this->db->from('country');
        if(!empty($country_id)){
            $this->db->where('country_id', $country_id);
        }
        $this->db->order_by('country_name', 'asc');
        $query = $this->db->get();
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }

    function listClientType($client_type_id=NULL) {
        $this->db->select('*');
        $this->db->from('db_cd_company_type');
        if (!empty($client_type_id)) {
            $this->db->where('ctype_id', $client_type_id);
        }
        $this->db->order_by('company_type', 'asc');
        $query = $this->db->get();
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    
    function insertClientInfo($data) {

        $this->db->insert('client_info', $data);
        $insert_id = $this->db->insert_id();
        if ($insert_id) {
            return $insert_id;
        } else {
            return false;
        }
    }
    
    function listClientInfo($client_id = NULL,$client_info_id = NULL) {
        $this->db->select('*');
        $this->db->from('client');
        $this->db->join('client_info', 'client_info.client_id = client.client_id','left');
        $this->db->join('client_type', 'client_type.client_type_id = client_info.client_type_id','left');
        $this->db->join('country', 'country.country_id = client_info.country_id','left');
        if (!empty($client_id)) {
            $this->db->where('client.client_id', $client_id);
        }
        if (!empty($client_info_id)) {
            $this->db->where('client_info_id', $client_info_id);
        }
        $this->db->group_by('client_info.client_info_id');
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    
    function updateClientInfo($data) {
        
            $this->db->where('client_info_id', $data['client_info_id']);
            $this->db->update('client_info', $data);

            return $data['client_info_id'];
        
    }


    function insertClientAccountInfo($data) {

        $this->db->insert('client_account_info', $data);
        $insert_id = $this->db->insert_id();
        if ($insert_id) {
            return $insert_id;
        } else {
            return false;
        }
    }
    
    function listClientAccountInfo($client_id=NULL,$client_account_info_id = NULL) {
        $where='';
        
        if (!empty($client_account_info_id)) {
            $where = ' and client_account_info_id='.$client_account_info_id;
        }
        
        $query = $this->db->query('select client_account_info_id,client_id,'
                . 'DATE_FORMAT(financial_year_end,\'%d %M %Y\') as financial_year_end,accounting_done_by,'
                . 'DATE_FORMAT(date_last_accounts_filed,\'%d %M %Y\') as date_last_accounts_filed,auditors,'
                . 'DATE_FORMAT(date_last_annual_returns,\'%d %M %Y\') as date_last_annual_returns,'
                . 'DATE_FORMAT(date_last_tax_returns,\'%d %M %Y\') as date_last_tax_returns,'
                . 'DATE_FORMAT(add_date_last_financial_summaries_filed,\'%d %M %Y\') as add_date_last_financial_summaries_filed'
                . ' from client_account_info where client_id='.$client_id.' '.$where);
        
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    
    function updateClientAccountInfo($data) {
        
            $this->db->where('client_account_info_id', $data['client_account_info_id']);
            $this->db->update('client_account_info', $data);

            return $data['client_account_info_id'];
        
    }
    
    function deleteClientAccountInfo($client_account_info_id) {

        $this->db->where('client_account_info_id', $client_account_info_id);
        $this->db->delete('client_account_info');

        return true;
    }
    
    function insertClientDirectorInfo($data) {

        $this->db->insert('client_director_info', $data);
        $insert_id = $this->db->insert_id();
        if ($insert_id) {
            return $insert_id;
        } else {
            return false;
        }
    }
    
     function listClientDirectorInfo($client_id=NULL,$client_director_info_id = NULL) {
        $where='';
        $where_client = '';
        if (!empty($client_director_info_id)) {
            $where = ' and client_director_info_id='.$client_director_info_id;
        }
        if (!empty($client_id)) {
            $where_client = ' where client_director_info.client_id='.$client_id.' '.$where;
        }
        
        $query = $this->db->query('select client.client_name,client_director_info_id,client_director_info.client_id,director_name,'
                . 'DATE_FORMAT(date_appointed,\'%d %M %Y\') as date_appointed,'
                . 'DATE_FORMAT(date_resigned,\'%d %M %Y\') as date_resigned,'
                . 'DATE_FORMAT(passport_expiry_date,\'%d %M %Y\') as passport_expiry_date,'
                . 'directorship_yes_no,age_of_the_director,other_kyc_docs'
                . ' from client join client_director_info on client_director_info.client_id=client.client_id '.$where_client);
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    function updateClientDirectorInfo($data) {
        
            $this->db->where('client_director_info_id', $data['client_director_info_id']);
            $this->db->update('client_director_info', $data);

            return $data['client_director_info_id'];
        
    }
    
    function deleteClientDirectorInfo($client_director_info_id) {

        $this->db->where('client_director_info_id', $client_director_info_id);
        $this->db->delete('client_director_info');

        return true;
    }
    
    function insertClientShareholderInfo($data) {

        $this->db->insert('client_shareholder_info', $data);
        $insert_id = $this->db->insert_id();
        if ($insert_id) {
            return $insert_id;
        } else {
            return false;
        }
    }
    
     function listClientShareholderInfo($client_id=NULL,$client_shareholder_info_id = NULL) {
        $where='';
        if (!empty($client_shareholder_info_id)) {
            $where = ' and client_shareholder_info_id='.$client_shareholder_info_id;
        }
        
        $query = $this->db->query('select client_shareholder_info_id,client_id,shareholder_name,no_of_shares,type_of_shares,value_of_shares,'
                . 'DATE_FORMAT(passport_expiry_date,\'%d %M %Y\') as passport_expiry_date,other_kyc_docs,transfer_of_shares,stated_capital,new_share_holder'
                . ' from client_shareholder_info where client_shareholder_info.client_id='.$client_id.' '.$where);
        
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    function listClientShareholderTypeInfo($client_id) {
        $this->db->select("type_of_shares,sum(stated_capital) as total_stated_capital");
        $this->db->from('client_shareholder_info');
        $this->db->where('client_id', $client_id);
        $this->db->group_by('type_of_shares');
        $query = $this->db->get();
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    function updateClientShareholderInfo($data) {
        
            $this->db->where('client_shareholder_info_id', $data['client_shareholder_info_id']);
            $this->db->update('client_shareholder_info', $data);

            return $data['client_shareholder_info_id'];
        
    }
    
    function deleteClientShareholderInfo($client_shareholder_info_id) {

        $this->db->where('client_shareholder_info_id', $client_shareholder_info_id);
        $this->db->delete('client_shareholder_info');

        return true;
    }
    
     function insertClientBeneficialOwnerInfo($data) {

        $this->db->insert('client_beneficial_owner_info', $data);
        $insert_id = $this->db->insert_id();
        if ($insert_id) {
            return $insert_id;
        } else {
            return false;
        }
    }
    
     function listClientBeneficialOwnerInfo($client_id=NULL,$client_beneficial_owner_info_id = NULL) {
        $this->db->select('*');
        $this->db->from('client');
        $this->db->join('client_beneficial_owner_info', 'client_beneficial_owner_info.client_id = client.client_id');
        $this->db->join('country', 'country.country_id = client_beneficial_owner_info.country_id');
        if (!empty($client_id)) {
            $this->db->where('client_beneficial_owner_info.client_id', $client_id);
        }
        if (!empty($client_beneficial_owner_info_id)) {
            $this->db->where('client_beneficial_owner_info_id', $client_beneficial_owner_info_id);
        }
        //$this->db->group_by('client_beneficial_owner_info_id');
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    function updateClientBeneficialOwnerInfo($data) {
        
            $this->db->where('client_beneficial_owner_info_id', $data['client_beneficial_owner_info_id']);
            $this->db->update('client_beneficial_owner_info', $data);

            return $data['client_beneficial_owner_info_id'];
        
    }
    
    function deleteClientBeneficialOwnerInfo($client_beneficial_owner_info_id) {

        $this->db->where('client_beneficial_owner_info_id', $client_beneficial_owner_info_id);
        $this->db->delete('client_beneficial_owner_info');

        return true;
    }
    
    function listCurrency() {
        $this->db->select('*');
        $this->db->from('currency');
        $this->db->order_by('currency_code', 'asc');
        $query = $this->db->get();
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    
     function insertClientBankInfo($data) {

        $this->db->insert('client_bank_info', $data);
        $insert_id = $this->db->insert_id();
        if ($insert_id) {
            return $insert_id;
        } else {
            return false;
        }
    }
    
     function listClientBankInfo($client_id=NULL,$client_bank_info_id = NULL) {
        $where='';
        if (!empty($client_bank_info_id)) {
            $where = ' and client_bank_info_id='.$client_bank_info_id;
        }
        
        $query = $this->db->query('select client_bank_info_id,client_id,bank_name,account_type,client_bank_info.currency_id,currency_name,'
                . 'DATE_FORMAT(date_account_opened,\'%d %M %Y\') as date_account_opened,bank_signatories,internet_banking,additional_info'
                . ' from client_bank_info left join currency on currency.currency_id=client_bank_info.currency_id where client_id='.$client_id.' '.$where);
        //echo $this->db->last_query();die;
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    function updateClientBankInfo($data) {
        
            $this->db->where('client_bank_info_id', $data['client_bank_info_id']);
            $this->db->update('client_bank_info', $data);

            return $data['client_bank_info_id'];
        
    }
    
    function deleteClientBankInfo($client_bank_info_id) {

        $this->db->where('client_bank_info_id', $client_bank_info_id);
        $this->db->delete('client_bank_info');

        return true;
    }
    
     function insertClientComplianceInfo($data) {

        $this->db->insert('client_compliance_info', $data);
        $insert_id = $this->db->insert_id();
        if ($insert_id) {
            return $insert_id;
        } else {
            return false;
        }
    }
    
     function listClientComplianceInfo($client_id=NULL,$client_compliance_info_id = NULL) {
        $where ='';
        $where_client ='';
        if (!empty($client_compliance_info_id)) {
            $where = ' and client_compliance_info_id='.$client_compliance_info_id;
        }
        if (!empty($client_id)) {
            $where_client = ' where client_compliance_info.client_id='.$client_id.' '.$where;
        }
        $query = $this->db->query('select client.client_name,client_compliance_info_id,client.client_id,checklist_number,'
                . 'DATE_FORMAT(date_last_review,\'%d %M %Y\') as date_last_review'
                . ' from client join client_compliance_info on client_compliance_info.client_id=client.client_id '.$where_client);
        
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    function updateClientComplianceInfo($data) {
        
            $this->db->where('client_compliance_info_id', $data['client_compliance_info_id']);
            $this->db->update('client_compliance_info', $data);

            return $data['client_compliance_info_id'];
        
    }
    
    function deleteClientComplianceInfo($client_compliance_info_id) {

        $this->db->where('client_compliance_info_id', $client_compliance_info_id);
        $this->db->delete('client_compliance_info');

        return true;
    }
    
    
     function insertClientSubstanceInfo($data) {

        $this->db->insert('client_substance_info', $data);
        $insert_id = $this->db->insert_id();
        if ($insert_id) {
            return $insert_id;
        } else {
            return false;
        }
    }
    
     function listClientSubstanceInfo($client_id=NULL,$client_substance_info_id = NULL) {
        $this->db->select('*');
        $this->db->from('client_substance_info');
        if (!empty($client_id)) {
            $this->db->where('client_id', $client_id);
        }
        if (!empty($client_substance_info_id)) {
            $this->db->where('client_substance_info_id', $client_substance_info_id);
        }
        $query = $this->db->get();
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    function updateClientSubstanceInfo($data) {
        
            $this->db->where('client_substance_info_id', $data['client_substance_info_id']);
            $this->db->update('client_substance_info', $data);

            return $data['client_substance_info_id'];
        
    }
    
    function deleteClientSubstanceInfo($client_substance_info_id) {

        $this->db->where('client_substance_info_id', $client_substance_info_id);
        $this->db->delete('client_substance_info');

        return true;
    }
    
    function insertClientOccupationInfo($data) {

        $this->db->insert('client_occupation_info', $data);
        $insert_id = $this->db->insert_id();
        if ($insert_id) {
            return $insert_id;
        } else {
            return false;
        }
    }
    
     function listClientOccupationInfo($client_id=NULL,$client_occupation_info_id = NULL) {
        $where='';
        if (!empty($client_occupation_info_id)) {
            $where = ' and client_occupation_info_id='.$client_occupation_info_id;
        }
        
        $query = $this->db->query('select client_occupation_info_id,client_id,investor_permit,professional_permit,self_employed_permit,retired_permit,permanent_residence_permit,'
                . 'DATE_FORMAT(investor_permit_date,\'%d %M %Y\') as investor_permit_date,'
                . 'DATE_FORMAT(professional_permit_date,\'%d %M %Y\') as professional_permit_date,'
                . 'DATE_FORMAT(self_employed_permit_date,\'%d %M %Y\') as self_employed_permit_date,'
                . 'DATE_FORMAT(retired_permit_date,\'%d %M %Y\') as retired_permit_date,'
                . 'DATE_FORMAT(permanent_residence_permit_date,\'%d %M %Y\') as permanent_residence_permit_date'
                . ' from client_occupation_info where client_id='.$client_id.' '.$where);
        
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    function updateClientOccupationInfo($data) {
        
            $this->db->where('client_occupation_info_id', $data['client_occupation_info_id']);
            $this->db->update('client_occupation_info', $data);

            return $data['client_occupation_info_id'];
        
    }
    
    function deleteClientOccupationInfo($client_occupation_info_id) {

        $this->db->where('client_occupation_info_id', $client_occupation_info_id);
        $this->db->delete('client_occupation_info');

        return true;
    }
    
    function insertClientTrustInfo($data) {

        $this->db->insert('client_trust_info', $data);
        $insert_id = $this->db->insert_id();
        if ($insert_id) {
            return $insert_id;
        } else {
            return false;
        }
    }
    
     function listClientTrustInfo($client_id=NULL,$client_trust_info_id = NULL) {
        $where='';
        if (!empty($client_trust_info_id)) {
            $where = ' and client_trust_info_id='.$client_trust_info_id;
        }
        
        $query = $this->db->query('select client_trust_info_id,client_trust_info.client_id,client_trust_info.trust_type_id,trust_type_name,trust_type_other,global_business_licence,trust_deed_available,trustee_name,'
                . 'DATE_FORMAT(non_resident_trustee_passport_expiry_date,\'%d %M %Y\') as non_resident_trustee_passport_expiry_date,'
                . 'DATE_FORMAT(non_resident_trustee_utility_bill_available_and_dated,\'%d %M %Y\') as non_resident_trustee_utility_bill_available_and_dated,settlor_name,'
                . 'DATE_FORMAT(settlor_passport_expiry_date,\'%d %M %Y\') as settlor_passport_expiry_date,'
                . 'DATE_FORMAT(settlor_utility_bill_available_and_dated,\'%d %M %Y\') as settlor_utility_bill_available_and_dated,beneficiaries_name,letter_of_wishes,declaration_of_non_residence_available,accounts_prepared,tax_returns'
                . ' from client join client_trust_info on client_trust_info.client_id=client.client_id join trust_type on trust_type.trust_type_id=client_trust_info.trust_type_id where client_trust_info.client_id='.$client_id.' '.$where);
        
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    function updateClientTrustInfo($data) {
        
            $this->db->where('client_trust_info_id', $data['client_trust_info_id']);
            $this->db->update('client_trust_info', $data);

            return $data['client_trust_info_id'];
        
    }
    
    function deleteClientTrustInfo($client_trust_info_id) {

        $this->db->where('client_trust_info_id', $client_trust_info_id);
        $this->db->delete('client_trust_info');

        return true;
    }
    
    function listTrustType() {
        $this->db->select('*');
        $this->db->from('trust_type');
        $this->db->order_by('trust_type_name', 'asc');
        $query = $this->db->get();
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
     function insertClientLicenceInfo($data) {

        $this->db->insert('client_licence_info', $data);
        $insert_id = $this->db->insert_id();
        if ($insert_id) {
            return $insert_id;
        } else {
            return false;
        }
    }
    
     function listClientLicenceInfo($client_id=NULL,$client_licence_info_id = NULL) {
        $where='';
        if (!empty($client_licence_info_id)) {
            $where = ' and client_licence_info_id='.$client_licence_info_id;
        }
        
        $query = $this->db->query('select client_licence_info_id,client_licence_info.client_id,client_licence_info.licence_type_id,licence_type_name,'
                . 'DATE_FORMAT(issue_date,\'%d %M %Y\') as issue_date,DATE_FORMAT(expiry_date,\'%d %M %Y\') as expiry_date,licensing_conditions'
                . ' from client join client_licence_info on client_licence_info.client_id=client.client_id join licence_type on licence_type.licence_type_id=client_licence_info.licence_type_id where client_licence_info.client_id='.$client_id.' '.$where);
        
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    function updateClientLicenceInfo($data) {
        
            $this->db->where('client_licence_info_id', $data['client_licence_info_id']);
            $this->db->update('client_licence_info', $data);

            return $data['client_licence_info_id'];
        
    }
    
    function deleteClientLicenceInfo($client_licence_info_id) {

        $this->db->where('client_licence_info_id', $client_licence_info_id);
        $this->db->delete('client_licence_info');

        return true;
    }
    
    function listLicenceType() {
        $this->db->select('*');
        $this->db->from('licence_type');
        $this->db->order_by('licence_type_name', 'asc');
        $query = $this->db->get();
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    
    
     function insertClientAGMInfo($data) {

        $this->db->insert('client_agm_info', $data);
        $insert_id = $this->db->insert_id();
        if ($insert_id) {
            return $insert_id;
        } else {
            return false;
        }
    }
    
     function listClientAGMInfo($client_id=NULL,$client_agm_info_id = NULL) {
        $where='';
        if (!empty($client_agm_info_id)) {
            $where = ' and client_agm_info_id='.$client_agm_info_id;
        }
        
        $query = $this->db->query('select client_agm_info_id,client_agm_info.client_id,'
                . 'DATE_FORMAT(agm_date,\'%d %M %Y\') as agm_date,financial_statements,constitution_adopted,amendment,'
                . 'DATE_FORMAT(relevant_date,\'%d %M %Y\') as relevant_date'
                . ' from client join client_agm_info on client_agm_info.client_id=client.client_id where client_agm_info.client_id='.$client_id.' '.$where);
        
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    function updateClientAGMInfo($data) {
        
            $this->db->where('client_agm_info_id', $data['client_agm_info_id']);
            $this->db->update('client_agm_info', $data);

            return $data['client_agm_info_id'];
        
    }
    
    function deleteClientAGMInfo($client_agm_info_id) {

        $this->db->where('client_agm_info_id', $client_agm_info_id);
        $this->db->delete('client_agm_info');

        return true;
    }
    
    function listClientShareholderInfoNotification() {
        
        $query = $this->db->query('select client_shareholder_info_id,client_id,shareholder_name,no_of_shares,type_of_shares,value_of_shares,'
                . 'DATE_FORMAT(passport_expiry_date,\'%d %M %Y\') as passport_expiry_date,other_kyc_docs,transfer_of_shares,stated_capital,new_share_holder'
                . ' from client_shareholder_info ');
        
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    
    function listClientOccupationInfoNotification() {
        
        
        $query = $this->db->query('select client_occupation_info_id,client_id,investor_permit,professional_permit,self_employed_permit,retired_permit,permanent_residence_permit,'
                . 'DATE_FORMAT(investor_permit_date,\'%d %M %Y\') as investor_permit_date,'
                . 'DATE_FORMAT(professional_permit_date,\'%d %M %Y\') as professional_permit_date,'
                . 'DATE_FORMAT(self_employed_permit_date,\'%d %M %Y\') as self_employed_permit_date,'
                . 'DATE_FORMAT(retired_permit_date,\'%d %M %Y\') as retired_permit_date,'
                . 'DATE_FORMAT(permanent_residence_permit_date,\'%d %M %Y\') as permanent_residence_permit_date'
                . ' from client_occupation_info ');
        
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }
    
    
}
