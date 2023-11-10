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

class Client extends CI_Controller {

    function __construct() {
        // Construct our parent class
        parent::__construct();
        $this->load->model('client_model');
        $this->load->model('company_model');
        $this->load->model('team_model');
        $this->load->library('test/TestFolder');
    }

    function add_client() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $client_name = $this->input->post('client_name');
        $company_name = $this->input->post('company_name');
        $team_name_arr = $this->input->post('team_name');
        $team_name_str = '';
        if (!empty($team_name_arr)) {
            $team_name_str = implode(",", $team_name_arr);
        }
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_name' => trim($client_name),
            'company_name' => $company_name,
            'team_name' => $team_name_str,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
        );
        if ($this->client_model->insertClient($data)) {
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'],
                'title' => 'Added Client',
                'message' => trim($client_name) . ' has been added.',
                'created' => date('Y-m-d h:i:s')
            );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Client added successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "A Client with the specified name already exists." }';
        }
    }

    function edit_client() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_id = $this->input->post('client_id');
        if ($single_client_detail = $this->client_model->listClient($client_id)) {
            echo json_encode($single_client_detail);
        } else {
            echo '{ "status" : "FAILED" , "message" : "No record found." }';
        }
    }

    function submit_edit_client() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_id = $this->input->post('client_id');
        $client_name = $this->input->post('client_name');
        $company_name = $this->input->post('company_name');
        $team_name_arr = $this->input->post('team_name');
        $team_name_str = '';
        if (!empty($team_name_arr)) {
            $team_name_str = implode(",", $team_name_arr);
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_id' => $client_id,
            'client_name' => trim($client_name),
            'company_name' => $company_name,
            'team_name' => $team_name_str,
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
        );
        if ($this->client_model->updateClient($data)) {
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'],
                'title' => 'Updated Client',
                'message' => trim($client_name) . ' has been updated.',
                'created' => date('Y-m-d h:i:s')
            );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Client updated successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "A Client with the specified name already exists. " }';
        }
    }

    function delete_client() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $client_id = $this->input->post('client_id');
        if ($this->client_model->deleteClient($client_id)) {
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'],
                'title' => 'Deleted Client',
                'message' => 'Client deleted.',
                'created' => date('Y-m-d h:i:s')
            );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Client deleted successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "You can not delete a client." }';
        }
    }

    function client_list($database = NULL) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);

        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['client_detail'] = $this->client_model->listClient();
        $data['company_detail'] = $this->company_model->listCompany();
        $data['team_detail'] = $this->team_model->listTeam();
        $data['database'] = $database;
        $data['page_url'] = 'client_content';
        $this->load->view('dashboard_page', $data);
    }

    function client_detail($client_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);

        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['client_info_id_detail'] = $this->client_model->listClientInfo($client_id);
        
        $data['client_substance_info_id_detail'] = $this->client_model->listClientSubstanceInfo($client_id);
        $data['client_id'] = $client_id;
        $data['page_url'] = 'client_detail_content';
        $this->load->view('dashboard_page', $data);
    }

    function client_info($client_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['tab_id'] = $this->input->post('tab_id');
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['country_detail'] = $this->client_model->listCountry();
        $data['client_type_detail'] = $this->client_model->listClientType();
        $data['client_detail'] = $this->client_model->listClient($client_id);
        $data['client_id'] = $client_id;

        $this->load->view('client_info_content', $data);
    }

    function submit_add_client_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $client_id = $this->input->post('client_id');
        $client_name = $this->input->post('client_name');
        $company_reference = $this->input->post('company_reference');
        $status = $this->input->post('status');
        $client_type_id = $this->input->post('client_type_id');
        $foreign_country = $this->input->post('foreign_country');
        $date_of_inc = $this->input->post('date_of_inc');
        $file_no = $this->input->post('file_no');
        $portfolio = $this->input->post('portfolio');
        $group = $this->input->post('group');
        $group_name = $this->input->post('group_name');
        $conversion_or_transfer_registration = $this->input->post('conversion_or_transfer_registration');
        $conversion_or_transfer_registration_description = $this->input->post('conversion_or_transfer_registration_description');
        $converted_from_to_str = $this->input->post('converted_from_to');
        $converted_from_to_client_type_id = $this->input->post('converted_from_to_client_type_id');
        $converted_from_to = $converted_from_to_str . '#' . $converted_from_to_client_type_id;
        $transfer_from_another_mc = $this->input->post('transfer_from_another_mc');
        $transfer_from_another_mc_description = $this->input->post('transfer_from_another_mc_description');
        $management_company_name = $this->input->post('management_company_name');
        $previous_name = $this->input->post('previous_name');
        $date_change_of_name = $this->input->post('date_change_of_name');
        $removal_from_register = $this->input->post('removal_from_register');
        $registered_office = $this->input->post('registered_office');
        $business_address = $this->input->post('business_address');
        $file_location = $this->input->post('file_location');
        $gbl_license_no = $this->input->post('gbl_license_no');
        $gbl_license_issue_date = $this->input->post('gbl_license_issue_date');
        $registration_fees = $this->input->post('registration_fees');
        $registration_fees_description = $this->input->post('registration_fees_description');
        $fsc_fees = $this->input->post('fsc_fees');
        $fsc_fees_description = $this->input->post('fsc_fees_description');
        $business_registration_no = $this->input->post('business_registration_no');
        $archives_ref_no = $this->input->post('archives_ref_no');
        $freeport_licence = $this->input->post('freeport_licence');
        $vat_no = $this->input->post('vat_no');
        $tan_no = $this->input->post('tan_no');
        $trc = $this->input->post('trc');
        $renewal_date = $this->input->post('renewal_date');
        $introduced_by_period = $this->input->post('introduced_by_period');
        $place_of_work_of_the_introducer = $this->input->post('place_of_work_of_the_introducer');
        $country_id = $this->input->post('country_id');
        $email_of_the_introducer = $this->input->post('email_of_the_introducer');
        $phone_number_of_the_introducer = $this->input->post('phone_number_of_the_introducer');
        $business_activity = $this->input->post('business_activity');
        $activities_in_line_with_business_plan = $this->input->post('activities_in_line_with_business_plan');
        $activities_in_line_with_business_plan_description = $this->input->post('activities_in_line_with_business_plan_description');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_id' => $client_id,
            'company_reference' => $company_reference,
            'status' => $status,
            'client_type_id' => $client_type_id,
            'foreign_country' => $foreign_country,
            'date_of_inc' => (!empty($date_of_inc)) ? date('Y-m-d', strtotime($date_of_inc)) : '0000-00-00',
            'file_no' => $file_no,
            'portfolio' => $portfolio,
            'group' => $group,
            'group_name' => $group_name,
            'conversion_or_transfer_registration' => $conversion_or_transfer_registration,
            'conversion_or_transfer_registration_description' => (!empty($conversion_or_transfer_registration_description)) ? date('Y-m-d', strtotime($conversion_or_transfer_registration_description)) : '0000-00-00',
            'converted_from_to' => $converted_from_to,
            'transfer_from_another_mc' => $transfer_from_another_mc,
            'transfer_from_another_mc_description' => (!empty($transfer_from_another_mc_description)) ? date('Y-m-d', strtotime($transfer_from_another_mc_description)) : '0000-00-00',
            'management_company_name' => $management_company_name,
            'previous_name' => $previous_name,
            'date_change_of_name' => (!empty($date_change_of_name)) ? date('Y-m-d', strtotime($date_change_of_name)) : '0000-00-00',
            'removal_from_register' => $removal_from_register,
            'registered_office' => $registered_office,
            'business_address' => $business_address,
            'file_location' => $file_location,
            'gbl_license_no' => $gbl_license_no,
            'gbl_license_issue_date' => (!empty($gbl_license_issue_date)) ? date('Y-m-d', strtotime($gbl_license_issue_date)) : '0000-00-00',
            'registration_fees' => $registration_fees,
            'registration_fees_description' => $registration_fees_description,
            'fsc_fees' => $fsc_fees,
            'fsc_fees_description' => $fsc_fees_description,
            'business_registration_no' => $business_registration_no,
            'archives_ref_no' => $archives_ref_no,
            'freeport_licence' => $freeport_licence,
            'vat_no' => $vat_no,
            'tan_no' => $tan_no,
            'trc' => $trc,
            'renewal_date' => (!empty($renewal_date)) ? date('Y-m-d', strtotime($renewal_date)) : '0000-00-00',
            'introduced_by_period' => $introduced_by_period,
            'place_of_work_of_the_introducer' => $place_of_work_of_the_introducer,
            'country_id' => $country_id,
            'email_of_the_introducer' => $email_of_the_introducer,
            'phone_number_of_the_introducer' => $phone_number_of_the_introducer,
            'business_activity' => $business_activity,
            'activities_in_line_with_business_plan' => $activities_in_line_with_business_plan,
            'activities_in_line_with_business_plan_description' => $activities_in_line_with_business_plan_description,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
        );

        if ($this->client_model->insertClientInfo($data)) {
            $handle = curl_init(DMS_HOST);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);

            /* Get the HTML or whatever is linked in $url. */
            $response = curl_exec($handle);

            /* Check for 404 (file not found). */
            $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
            $httpCode = intval($httpCode);
            if ($httpCode != 404 && $httpCode != 400 && $httpCode != 0) {
                $testFolder = new TestFolder();
                $client_type = $this->client_model->listClientType($client_type_id);

                $folder_path1 = CLIENT_FOLDER . '/' . trim($client_name);

                $languages = simplexml_load_file(base_url() . 'xml/' . $client_type[0]->client_type_name . ".xml");
                $folder_path = CLIENT_FOLDER . '/' . $client_type[0]->client_type_name;
                //echo $testFolder->valid_folder($folder_path);die;
                if ($testFolder->valid_folder($folder_path) == 'PathNotFoundException: ' . $folder_path) {
                    $testFolder->test($folder_path);
                }


                $folder_path1 = $folder_path . '/' . trim($client_name);
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


            echo '{ "status" : "SUCCESS" , "message" : "Client information added successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Can not be added." }';
        }
    }

    function edit_client_info($client_id, $client_info_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['tab_id'] = $this->input->post('tab_id');
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['country_detail'] = $this->client_model->listCountry();
        $data['client_type_detail'] = $this->client_model->listClientType();
        $data['client_detail'] = $this->client_model->listClient($client_id);
        $data['client_info_detail'] = $this->client_model->listClientInfo($client_id, $client_info_id);
        $data['client_id'] = $client_id;
        $this->load->view('edit_client_info_content', $data);
    }

    function submit_edit_client_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $client_id = $this->input->post('client_id');
        $client_name = $this->input->post('client_name');
        $client_info_id = $this->input->post('client_info_id');
        $company_reference = $this->input->post('company_reference');
        $status = $this->input->post('status');
        $client_type_id = $this->input->post('client_type_id');
        $foreign_country = $this->input->post('foreign_country');
        $date_of_inc = $this->input->post('date_of_inc');
        $file_no = $this->input->post('file_no');
        $portfolio = $this->input->post('portfolio');
        $group = $this->input->post('group');
        $group_name = $this->input->post('group_name');
        $conversion_or_transfer_registration = $this->input->post('conversion_or_transfer_registration');
        $conversion_or_transfer_registration_description = $this->input->post('conversion_or_transfer_registration_description');
        $converted_from_to_str = $this->input->post('converted_from_to');
        $converted_from_to_client_type_id = $this->input->post('converted_from_to_client_type_id');
        $converted_from_to = $converted_from_to_str . '#' . $converted_from_to_client_type_id;
        $transfer_from_another_mc = $this->input->post('transfer_from_another_mc');
        $transfer_from_another_mc_description = $this->input->post('transfer_from_another_mc_description');
        $management_company_name = $this->input->post('management_company_name');
        $previous_name = $this->input->post('previous_name');
        $date_change_of_name = $this->input->post('date_change_of_name');
        $removal_from_register = $this->input->post('removal_from_register');
        $registered_office = $this->input->post('registered_office');
        $business_address = $this->input->post('business_address');
        $file_location = $this->input->post('file_location');
        $gbl_license_no = $this->input->post('gbl_license_no');
        $gbl_license_issue_date = $this->input->post('gbl_license_issue_date');
        $registration_fees = $this->input->post('registration_fees');
        $registration_fees_description = $this->input->post('registration_fees_description');
        $fsc_fees = $this->input->post('fsc_fees');
        $fsc_fees_description = $this->input->post('fsc_fees_description');
        $business_registration_no = $this->input->post('business_registration_no');
        $archives_ref_no = $this->input->post('archives_ref_no');
        $freeport_licence = $this->input->post('freeport_licence');
        $vat_no = $this->input->post('vat_no');
        $tan_no = $this->input->post('tan_no');
        $trc = $this->input->post('trc');
        $renewal_date = $this->input->post('renewal_date');
        $introduced_by_period = $this->input->post('introduced_by_period');
        $place_of_work_of_the_introducer = $this->input->post('place_of_work_of_the_introducer');
        $country_id = $this->input->post('country_id');
        $email_of_the_introducer = $this->input->post('email_of_the_introducer');
        $phone_number_of_the_introducer = $this->input->post('phone_number_of_the_introducer');
        $business_activity = $this->input->post('business_activity');
        $activities_in_line_with_business_plan = $this->input->post('activities_in_line_with_business_plan');
        $activities_in_line_with_business_plan_description = $this->input->post('activities_in_line_with_business_plan_description');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_id' => $client_id,
            'client_info_id' => $client_info_id,
            'company_reference' => $company_reference,
            'status' => $status,
            'client_type_id' => $client_type_id,
            'foreign_country' => $foreign_country,
            'date_of_inc' => (!empty($date_of_inc)) ? date('Y-m-d', strtotime($date_of_inc)) : '0000-00-00',
            'file_no' => $file_no,
            'portfolio' => $portfolio,
            'group' => $group,
            'group_name' => $group_name,
            'conversion_or_transfer_registration' => $conversion_or_transfer_registration,
            'conversion_or_transfer_registration_description' => (!empty($conversion_or_transfer_registration_description)) ? date('Y-m-d', strtotime($conversion_or_transfer_registration_description)) : '0000-00-00',
            'converted_from_to' => $converted_from_to,
            'transfer_from_another_mc' => $transfer_from_another_mc,
            'transfer_from_another_mc_description' => (!empty($transfer_from_another_mc_description)) ? date('Y-m-d', strtotime($transfer_from_another_mc_description)) : '0000-00-00',
            'management_company_name' => $management_company_name,
            'previous_name' => $previous_name,
            'date_change_of_name' => (!empty($date_change_of_name)) ? date('Y-m-d', strtotime($date_change_of_name)) : '0000-00-00',
            'removal_from_register' => $removal_from_register,
            'registered_office' => $registered_office,
            'business_address' => $business_address,
            'file_location' => $file_location,
            'gbl_license_no' => $gbl_license_no,
            'gbl_license_issue_date' => (!empty($gbl_license_issue_date)) ? date('Y-m-d', strtotime($gbl_license_issue_date)) : '0000-00-00',
            'registration_fees' => $registration_fees,
            'registration_fees_description' => $registration_fees_description,
            'fsc_fees' => $fsc_fees,
            'fsc_fees_description' => $fsc_fees_description,
            'business_registration_no' => $business_registration_no,
            'archives_ref_no' => $archives_ref_no,
            'freeport_licence' => $freeport_licence,
            'vat_no' => $vat_no,
            'tan_no' => $tan_no,
            'trc' => $trc,
            'renewal_date' => (!empty($renewal_date)) ? date('Y-m-d', strtotime($renewal_date)) : '0000-00-00',
            'introduced_by_period' => $introduced_by_period,
            'place_of_work_of_the_introducer' => $place_of_work_of_the_introducer,
            'country_id' => $country_id,
            'email_of_the_introducer' => $email_of_the_introducer,
            'phone_number_of_the_introducer' => $phone_number_of_the_introducer,
            'business_activity' => $business_activity,
            'activities_in_line_with_business_plan' => $activities_in_line_with_business_plan,
            'activities_in_line_with_business_plan_description' => $activities_in_line_with_business_plan_description,
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
        );
        $client_info = $this->client_model->listClientInfo(NULL, $client_info_id);
        $client_type_prev = $this->client_model->listClientType($client_info[0]->client_type_id);

        if ($this->client_model->updateClientInfo($data)) {
            $handle = curl_init(DMS_HOST);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);

            /* Get the HTML or whatever is linked in $url. */
            $response = curl_exec($handle);

            /* Check for 404 (file not found). */
            $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
            $httpCode = intval($httpCode);
            if ($httpCode != 404 && $httpCode != 400 && $httpCode != 0) {
            $testFolder = new TestFolder();
            $client_type = $this->client_model->listClientType($client_type_id);
            $languages = simplexml_load_file(base_url() . 'xml/' . $client_type[0]->client_type_name . ".xml");
            $folder_path = CLIENT_FOLDER . '/' . $client_type_prev[0]->client_type_name . '/' . $client_name;
            $folder_move_path = CLIENT_FOLDER . '/' . $client_type[0]->client_type_name;

            if ($testFolder->valid_folder($folder_move_path) == 'PathNotFoundException: ' . $folder_move_path) {
                $testFolder->test($folder_move_path);
            }
            $testFolder->test_move($folder_path, $folder_move_path);
            }
//        foreach ($languages->mainfolder as $lang) {
//            $folder_path1=$folder_move_path.'/'.$lang["title"];
//           $testFolder->test($folder_path1);
//            foreach ($lang->subfolder as $lang2) {
//                $folder_path2=$folder_path1.'/'.$lang2["title"];
//                $testFolder->test($folder_path2);
//                foreach ($lang2->subsubfolder as $lang3) {
//                  $folder_path3=$folder_path2.'/'.$lang3["title"];
//                  $testFolder->test($folder_path3);
//            }
//                
//            }
//          
//}
            echo '{ "status" : "SUCCESS" , "message" : "Client information updated successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Can not be added." }';
        }
    }

    function client_account_info($client_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['tab_id'] = $this->input->post('tab_id');
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['client_account_info_detail'] = $this->client_model->listClientAccountInfo($client_id);
        $data['client_id'] = $client_id;

        $this->load->view('client_account_info_content', $data);
    }

    function add_client_account_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $client_id = $this->input->post('client_id');
        $financial_year_end = $this->input->post('financial_year_end');
        $accounting_done_by = $this->input->post('accounting_done_by');
        $date_last_accounts_filed = $this->input->post('date_last_accounts_filed');
        $auditors = $this->input->post('auditors');
        $date_last_annual_returns = $this->input->post('date_last_annual_returns');
        $date_last_tax_returns = $this->input->post('date_last_tax_returns');
        $add_date_last_financial_summaries_filed = $this->input->post('add_date_last_financial_summaries_filed');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_id' => $client_id,
            'financial_year_end' => (!empty($financial_year_end)) ? date('Y-m-d', strtotime($financial_year_end)) : '0000-00-00',
            'accounting_done_by' => $accounting_done_by,
            'date_last_accounts_filed' => (!empty($date_last_accounts_filed)) ? date('Y-m-d', strtotime($date_last_accounts_filed)) : '0000-00-00',
            'auditors' => $auditors,
            'date_last_annual_returns' => (!empty($date_last_annual_returns)) ? date('Y-m-d', strtotime($date_last_annual_returns)) : '0000-00-00',
            'date_last_tax_returns' => (!empty($date_last_tax_returns)) ? date('Y-m-d', strtotime($date_last_tax_returns)) : '0000-00-00',
            'add_date_last_financial_summaries_filed' => (!empty($add_date_last_financial_summaries_filed)) ? date('Y-m-d', strtotime($add_date_last_financial_summaries_filed)) : '0000-00-00',
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
        );
        if ($this->client_model->insertClientAccountInfo($data)) {
            echo '{ "status" : "SUCCESS" , "message" : "Account, Tax and Audit information added successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Can not be added." }';
        }
    }

    function edit_client_account_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_id = $this->input->post('client_id');
        $client_account_info_id = $this->input->post('client_account_info_id');
        if ($single_client_account_info_detail = $this->client_model->listClientAccountInfo($client_id, $client_account_info_id)) {
            echo json_encode($single_client_account_info_detail);
        } else {
            echo '{ "status" : "FAILED" , "message" : "No record found." }';
        }
    }

    function submit_edit_client_account_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_account_info_id = $this->input->post('client_account_info_id');
        $financial_year_end = $this->input->post('financial_year_end');
        $accounting_done_by = $this->input->post('accounting_done_by');
        $date_last_accounts_filed = $this->input->post('date_last_accounts_filed');
        $auditors = $this->input->post('auditors');
        $date_last_annual_returns = $this->input->post('date_last_annual_returns');
        $date_last_tax_returns = $this->input->post('date_last_tax_returns');
        $add_date_last_financial_summaries_filed = $this->input->post('add_date_last_financial_summaries_filed');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_account_info_id' => $client_account_info_id,
            'financial_year_end' => (!empty($financial_year_end)) ? date('Y-m-d', strtotime($financial_year_end)) : '0000-00-00',
            'accounting_done_by' => $accounting_done_by,
            'date_last_accounts_filed' => (!empty($date_last_accounts_filed)) ? date('Y-m-d', strtotime($date_last_accounts_filed)) : '0000-00-00',
            'auditors' => $auditors,
            'date_last_annual_returns' => (!empty($date_last_annual_returns)) ? date('Y-m-d', strtotime($date_last_annual_returns)) : '0000-00-00',
            'date_last_tax_returns' => (!empty($date_last_tax_returns)) ? date('Y-m-d', strtotime($date_last_tax_returns)) : '0000-00-00',
            'add_date_last_financial_summaries_filed' => (!empty($add_date_last_financial_summaries_filed)) ? date('Y-m-d', strtotime($add_date_last_financial_summaries_filed)) : '0000-00-00',
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
        );
        if ($this->client_model->updateClientAccountInfo($data)) {
            echo '{ "status" : "SUCCESS" , "message" : "Account, Tax and Audit information updated successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Can not be updated." }';
        }
    }

    function delete_client_account_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_account_info_id = $this->input->post('client_account_info_id');
        if ($this->client_model->deleteClientAccountInfo($client_account_info_id)) {
            echo '{ "status" : "SUCCESS" , "message" : "Account, Tax and Audit information deleted successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "You can not delete a account." }';
        }
    }

    function client_director_info($client_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['tab_id'] = $this->input->post('tab_id');
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['client_director_info_detail'] = $this->client_model->listClientDirectorInfo($client_id);
        $data['client_id'] = $client_id;

        $this->load->view('client_director_info_content', $data);
    }

    function add_client_director_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $client_id = $this->input->post('client_id');
        $director_name = $this->input->post('director_name');
        $date_appointed = $this->input->post('date_appointed');
        $date_resigned = $this->input->post('date_resigned');
        $passport_expiry_date = $this->input->post('passport_expiry_date');
        $directorship_yes_no = $this->input->post('directorship_yes_no');
        $age_of_the_director = $this->input->post('age_of_the_director');
        $other_kyc_docs = $this->input->post('other_kyc_docs');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_id' => $client_id,
            'director_name' => $director_name,
            'date_appointed' => (!empty($date_appointed)) ? date('Y-m-d', strtotime($date_appointed)) : '0000-00-00',
            'date_resigned' => (!empty($date_resigned)) ? date('Y-m-d', strtotime($date_resigned)) : '0000-00-00',
            'passport_expiry_date' => (!empty($passport_expiry_date)) ? date('Y-m-d', strtotime($passport_expiry_date)) : '0000-00-00',
            'directorship_yes_no' => $directorship_yes_no,
            'age_of_the_director' => $age_of_the_director,
            'other_kyc_docs' => $other_kyc_docs,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
        );
        if ($this->client_model->insertClientDirectorInfo($data)) {
            echo '{ "status" : "SUCCESS" , "message" : "Director information added successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Can not be added." }';
        }
    }

    function edit_client_director_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_id = $this->input->post('client_id');
        $client_director_info_id = $this->input->post('client_director_info_id');
        if ($single_client_director_info_detail = $this->client_model->listClientDirectorInfo($client_id, $client_director_info_id)) {
            echo json_encode($single_client_director_info_detail);
        } else {
            echo '{ "status" : "FAILED" , "message" : "No record found." }';
        }
    }

    function submit_edit_client_director_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_director_info_id = $this->input->post('client_director_info_id');
        $director_name = $this->input->post('director_name');
        $date_appointed = $this->input->post('date_appointed');
        $date_resigned = $this->input->post('date_resigned');
        $passport_expiry_date = $this->input->post('passport_expiry_date');
        $directorship_yes_no = $this->input->post('directorship_yes_no');
        $age_of_the_director = $this->input->post('age_of_the_director');
        $other_kyc_docs = $this->input->post('other_kyc_docs');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_director_info_id' => $client_director_info_id,
            'director_name' => $director_name,
            'date_appointed' => (!empty($date_appointed)) ? date('Y-m-d', strtotime($date_appointed)) : '0000-00-00',
            'date_resigned' => (!empty($date_resigned)) ? date('Y-m-d', strtotime($date_resigned)) : '0000-00-00',
            'passport_expiry_date' => (!empty($passport_expiry_date)) ? date('Y-m-d', strtotime($passport_expiry_date)) : '0000-00-00',
            'directorship_yes_no' => $directorship_yes_no,
            'age_of_the_director' => $age_of_the_director,
            'other_kyc_docs' => $other_kyc_docs,
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
        );
        if ($this->client_model->updateClientDirectorInfo($data)) {
            echo '{ "status" : "SUCCESS" , "message" : "Director information updated successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Can not be updated." }';
        }
    }

    function delete_client_director_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_director_info_id = $this->input->post('client_director_info_id');
        if ($this->client_model->deleteClientDirectorInfo($client_director_info_id)) {
            echo '{ "status" : "SUCCESS" , "message" : "Director information deleted successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "You can not delete a account." }';
        }
    }

    function client_shareholder_info($client_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['tab_id'] = $this->input->post('tab_id');
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['client_shareholder_info_detail'] = $this->client_model->listClientShareholderInfo($client_id);
        $data['client_shareholder_type_info_detail'] = $this->client_model->listClientShareholderTypeInfo($client_id);
        $data['client_id'] = $client_id;

        $this->load->view('client_shareholder_info_content', $data);
    }

    function add_client_shareholder_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $client_id = $this->input->post('client_id');
        $shareholder_name = $this->input->post('shareholder_name');
        $no_of_shares = $this->input->post('no_of_shares');
        $type_of_shares = $this->input->post('type_of_shares');
        $value_of_shares = $this->input->post('value_of_shares');
        $passport_expiry_date = $this->input->post('passport_expiry_date');
        $transfer_of_shares = $this->input->post('transfer_of_shares');
        $new_share_holder = $this->input->post('new_share_holder');
        $other_kyc_docs = $this->input->post('other_kyc_docs');
        $stated_capital = $this->input->post('stated_capital');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_id' => $client_id,
            'shareholder_name' => $shareholder_name,
            'no_of_shares' => $no_of_shares,
            'type_of_shares' => $type_of_shares,
            'value_of_shares' => $value_of_shares,
            'passport_expiry_date' => (!empty($passport_expiry_date)) ? date('Y-m-d', strtotime($passport_expiry_date)) : '0000-00-00',
            'transfer_of_shares' => $transfer_of_shares,
            'new_share_holder' => $new_share_holder,
            'other_kyc_docs' => $other_kyc_docs,
            'stated_capital' => $stated_capital,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
        );
        if ($this->client_model->insertClientShareholderInfo($data)) {
            echo '{ "status" : "SUCCESS" , "message" : "Shareholder information added successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Can not be added." }';
        }
    }

    function edit_client_shareholder_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_id = $this->input->post('client_id');
        $client_shareholder_info_id = $this->input->post('client_shareholder_info_id');
        if ($single_client_shareholder_info_detail = $this->client_model->listClientShareholderInfo($client_id, $client_shareholder_info_id)) {
            echo json_encode($single_client_shareholder_info_detail);
        } else {
            echo '{ "status" : "FAILED" , "message" : "No record found." }';
        }
    }

    function submit_edit_client_shareholder_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_shareholder_info_id = $this->input->post('client_shareholder_info_id');
        $shareholder_name = $this->input->post('shareholder_name');
        $no_of_shares = $this->input->post('no_of_shares');
        $type_of_shares = $this->input->post('type_of_shares');
        $value_of_shares = $this->input->post('value_of_shares');
        $passport_expiry_date = $this->input->post('passport_expiry_date');
        $transfer_of_shares = $this->input->post('transfer_of_shares');
        $new_share_holder = $this->input->post('new_share_holder');
        $other_kyc_docs = $this->input->post('other_kyc_docs');
        $stated_capital = $this->input->post('stated_capital');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_shareholder_info_id' => $client_shareholder_info_id,
            'shareholder_name' => $shareholder_name,
            'no_of_shares' => $no_of_shares,
            'type_of_shares' => $type_of_shares,
            'value_of_shares' => $value_of_shares,
            'passport_expiry_date' => (!empty($passport_expiry_date)) ? date('Y-m-d', strtotime($passport_expiry_date)) : '0000-00-00',
            'transfer_of_shares' => $transfer_of_shares,
            'new_share_holder' => $new_share_holder,
            'other_kyc_docs' => $other_kyc_docs,
            'stated_capital' => $stated_capital,
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
        );
        if ($this->client_model->updateClientShareholderInfo($data)) {
            echo '{ "status" : "SUCCESS" , "message" : "Shareholder information updated successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Can not be updated." }';
        }
    }

    function delete_client_shareholder_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_shareholder_info_id = $this->input->post('client_shareholder_info_id');
        if ($this->client_model->deleteClientShareholderInfo($client_shareholder_info_id)) {
            echo '{ "status" : "SUCCESS" , "message" : "Shareholder information deleted successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "You can not delete a shareholder." }';
        }
    }

    function client_beneficial_owner_info($client_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['tab_id'] = $this->input->post('tab_id');
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['client_beneficial_owner_info_detail'] = $this->client_model->listClientBeneficialOwnerInfo($client_id);
        $data['country_detail'] = $this->client_model->listCountry();
        $data['client_id'] = $client_id;

        $this->load->view('client_beneficial_owner_info_content', $data);
    }

    function add_client_beneficial_owner_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $client_id = $this->input->post('client_id');
        $contact_details = $this->input->post('contact_details');
        $country_id = $this->input->post('country_id');
        $name_of_authorised_person = $this->input->post('name_of_authorised_person');
        $email_of_the_authorised_person = $this->input->post('email_of_the_authorised_person');
        $phone_number_of_the_authorised_person = $this->input->post('phone_number_of_the_authorised_person');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_id' => $client_id,
            'contact_details' => $contact_details,
            'country_id' => $country_id,
            'name_of_authorised_person' => $name_of_authorised_person,
            'email_of_the_authorised_person' => $email_of_the_authorised_person,
            'phone_number_of_the_authorised_person' => $phone_number_of_the_authorised_person,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
        );
        if ($this->client_model->insertClientBeneficialOwnerInfo($data)) {
            echo '{ "status" : "SUCCESS" , "message" : "Beneficial owner information added successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Can not be added." }';
        }
    }

    function edit_client_beneficial_owner_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_id = $this->input->post('client_id');
        $client_beneficial_owner_info_id = $this->input->post('client_beneficial_owner_info_id');
        if ($single_client_beneficial_owner_info_detail = $this->client_model->listClientBeneficialOwnerInfo($client_id, $client_beneficial_owner_info_id)) {
            echo json_encode($single_client_beneficial_owner_info_detail);
        } else {
            echo '{ "status" : "FAILED" , "message" : "No record found." }';
        }
    }

    function submit_edit_client_beneficial_owner_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_beneficial_owner_info_id = $this->input->post('client_beneficial_owner_info_id');
        $contact_details = $this->input->post('contact_details');
        $country_id = $this->input->post('country_id');
        $name_of_authorised_person = $this->input->post('name_of_authorised_person');
        $email_of_the_authorised_person = $this->input->post('email_of_the_authorised_person');
        $phone_number_of_the_authorised_person = $this->input->post('phone_number_of_the_authorised_person');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_beneficial_owner_info_id' => $client_beneficial_owner_info_id,
            'contact_details' => $contact_details,
            'country_id' => $country_id,
            'name_of_authorised_person' => $name_of_authorised_person,
            'email_of_the_authorised_person' => $email_of_the_authorised_person,
            'phone_number_of_the_authorised_person' => $phone_number_of_the_authorised_person,
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
        );
        if ($this->client_model->updateClientBeneficialOwnerInfo($data)) {
            echo '{ "status" : "SUCCESS" , "message" : "Beneficial owner information updated successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Can not be updated." }';
        }
    }

    function delete_client_beneficial_owner_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_beneficial_owner_info_id = $this->input->post('client_beneficial_owner_info_id');
        if ($this->client_model->deleteClientBeneficialOwnerInfo($client_beneficial_owner_info_id)) {
            echo '{ "status" : "SUCCESS" , "message" : "Beneficial owner information deleted successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "You can not delete a account." }';
        }
    }

    function client_bank_info($client_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['tab_id'] = $this->input->post('tab_id');
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['client_bank_info_detail'] = $this->client_model->listClientBankInfo($client_id);
        $data['currency_detail'] = $this->client_model->listCurrency();
        $data['client_id'] = $client_id;

        $this->load->view('client_bank_info_content', $data);
    }

    function add_client_bank_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $client_id = $this->input->post('client_id');
        $bank_name = $this->input->post('bank_name');
        $account_type = $this->input->post('account_type');
        $currency_id = $this->input->post('currency_id');
        $date_account_opened = $this->input->post('date_account_opened');
        $bank_signatories = $this->input->post('bank_signatories');
        $internet_banking = $this->input->post('internet_banking');
        $additional_info = $this->input->post('additional_info');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_id' => $client_id,
            'bank_name' => $bank_name,
            'account_type' => $account_type,
            'currency_id' => $currency_id,
            'date_account_opened' => (!empty($date_account_opened)) ? date('Y-m-d', strtotime($date_account_opened)) : '0000-00-00',
            'bank_signatories' => $bank_signatories,
            'internet_banking' => $internet_banking,
            'additional_info' => $additional_info,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
        );
        if ($this->client_model->insertClientBankInfo($data)) {
            echo '{ "status" : "SUCCESS" , "message" : "Bank information added successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Can not be added." }';
        }
    }

    function edit_client_bank_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_id = $this->input->post('client_id');
        $client_bank_info_id = $this->input->post('client_bank_info_id');
        if ($single_client_bank_info_detail = $this->client_model->listClientBankInfo($client_id, $client_bank_info_id)) {
            echo json_encode($single_client_bank_info_detail);
        } else {
            echo '{ "status" : "FAILED" , "message" : "No record found." }';
        }
    }

    function submit_edit_client_bank_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_bank_info_id = $this->input->post('client_bank_info_id');
        $bank_name = $this->input->post('bank_name');
        $account_type = $this->input->post('account_type');
        $currency_id = $this->input->post('currency_id');
        $date_account_opened = $this->input->post('date_account_opened');
        $bank_signatories = $this->input->post('bank_signatories');
        $internet_banking = $this->input->post('internet_banking');
        $additional_info = $this->input->post('additional_info');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_bank_info_id' => $client_bank_info_id,
            'bank_name' => $bank_name,
            'account_type' => $account_type,
            'currency_id' => $currency_id,
            'date_account_opened' => (!empty($date_account_opened)) ? date('Y-m-d', strtotime($date_account_opened)) : '0000-00-00',
            'bank_signatories' => $bank_signatories,
            'internet_banking' => $internet_banking,
            'additional_info' => $additional_info,
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
        );
        if ($this->client_model->updateClientBankInfo($data)) {
            echo '{ "status" : "SUCCESS" , "message" : "Bank information updated successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Can not be updated." }';
        }
    }

    function delete_client_bank_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_bank_info_id = $this->input->post('client_bank_info_id');
        if ($this->client_model->deleteClientBankInfo($client_bank_info_id)) {
            echo '{ "status" : "SUCCESS" , "message" : "Bank information deleted successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "You can not delete a account." }';
        }
    }

    function client_compliance_info($client_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['tab_id'] = $this->input->post('tab_id');
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['client_compliance_info_detail'] = $this->client_model->listClientComplianceInfo($client_id);
        $data['client_id'] = $client_id;

        $this->load->view('client_compliance_info_content', $data);
    }

    function add_client_compliance_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $client_id = $this->input->post('client_id');
        $checklist_number = $this->input->post('checklist_number');
        $date_last_review = $this->input->post('date_last_review');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_id' => $client_id,
            'checklist_number' => $checklist_number,
            'date_last_review' => (!empty($date_last_review)) ? date('Y-m-d', strtotime($date_last_review)) : '0000-00-00',
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
        );
        if ($this->client_model->insertClientComplianceInfo($data)) {
            echo '{ "status" : "SUCCESS" , "message" : "Compliance information added successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Can not be added." }';
        }
    }

    function edit_client_compliance_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_id = $this->input->post('client_id');
        $client_compliance_info_id = $this->input->post('client_compliance_info_id');
        if ($single_client_compliance_info_detail = $this->client_model->listClientComplianceInfo($client_id, $client_compliance_info_id)) {
            echo json_encode($single_client_compliance_info_detail);
        } else {
            echo '{ "status" : "FAILED" , "message" : "No record found." }';
        }
    }

    function submit_edit_client_compliance_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_compliance_info_id = $this->input->post('client_compliance_info_id');
        $checklist_number = $this->input->post('checklist_number');
        $date_last_review = $this->input->post('date_last_review');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_compliance_info_id' => $client_compliance_info_id,
            'checklist_number' => $checklist_number,
            'date_last_review' => (!empty($date_last_review)) ? date('Y-m-d', strtotime($date_last_review)) : '0000-00-00',
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
        );
        if ($this->client_model->updateClientComplianceInfo($data)) {
            echo '{ "status" : "SUCCESS" , "message" : "Compliance information updated successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Can not be updated." }';
        }
    }

    function delete_client_compliance_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_compliance_info_id = $this->input->post('client_compliance_info_id');
        if ($this->client_model->deleteClientComplianceInfo($client_compliance_info_id)) {
            echo '{ "status" : "SUCCESS" , "message" : "Compliance information deleted successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "You can not delete a account." }';
        }
    }

    function client_substance_info($client_id, $client_substance_info_id = NULL) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['tab_id'] = $this->input->post('tab_id');
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['client_substance_info_detail'] = $this->client_model->listClientSubstanceInfo($client_id);
        $data['client_id'] = $client_id;
        $data['client_substance_info_id'] = $client_substance_info_id;

        $this->load->view('client_substance_info_content', $data);
    }

    function add_client_substance_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $client_id = $this->input->post('client_id');
        $arbitration_clause = $this->input->post('arbitration_clause');
        $office_in_mauritius = $this->input->post('office_in_mauritius');
        $office_address = $this->input->post('office_address');
        $other_substance_conditions = $this->input->post('other_substance_conditions');
        $mauritius_employ = $this->input->post('mauritius_employ');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_id' => $client_id,
            'arbitration_clause' => $arbitration_clause,
            'office_in_mauritius' => $office_in_mauritius,
            'office_address' => $office_address,
            'other_substance_conditions' => $other_substance_conditions,
            'mauritius_employ' => $mauritius_employ,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
        );
        if ($this->client_model->insertClientSubstanceInfo($data)) {
            echo '{ "status" : "SUCCESS" , "message" : "Substance information added successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Can not be added." }';
        }
    }

    function edit_client_substance_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_id = $this->input->post('client_id');
        $client_substance_info_id = $this->input->post('client_substance_info_id');
        if ($single_client_substance_info_detail = $this->client_model->listClientSubstanceInfo($client_id, $client_substance_info_id)) {
            echo json_encode($single_client_substance_info_detail);
        } else {
            echo '{ "status" : "FAILED" , "message" : "No record found." }';
        }
    }

    function submit_edit_client_substance_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_substance_info_id = $this->input->post('client_substance_info_id');
        $arbitration_clause = $this->input->post('arbitration_clause');
        $office_in_mauritius = $this->input->post('office_in_mauritius');
        $office_address = $this->input->post('office_address');
        $other_substance_conditions = $this->input->post('other_substance_conditions');
        $mauritius_employ = $this->input->post('mauritius_employ');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_substance_info_id' => $client_substance_info_id,
            'arbitration_clause' => $arbitration_clause,
            'office_in_mauritius' => $office_in_mauritius,
            'office_address' => $office_address,
            'other_substance_conditions' => $other_substance_conditions,
            'mauritius_employ' => $mauritius_employ,
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
        );
        if ($this->client_model->updateClientSubstanceInfo($data)) {
            echo '{ "status" : "SUCCESS" , "message" : "Substance information updated successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Can not be updated." }';
        }
    }

    function client_occupation_info($client_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['tab_id'] = $this->input->post('tab_id');
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['client_occupation_info_detail'] = $this->client_model->listClientOccupationInfo($client_id);
        $data['client_id'] = $client_id;

        $this->load->view('client_occupation_info_content', $data);
    }

    function add_client_occupation_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $client_id = $this->input->post('client_id');
        $investor_permit = $this->input->post('investor_permit');
        $investor_permit_date = $this->input->post('investor_permit_date');
        $professional_permit = $this->input->post('professional_permit');
        $professional_permit_date = $this->input->post('professional_permit_date');
        $self_employed_permit = $this->input->post('self_employed_permit');
        $self_employed_permit_date = $this->input->post('self_employed_permit_date');
        $retired_permit = $this->input->post('retired_permit');
        $retired_permit_date = $this->input->post('retired_permit_date');
        $permanent_residence_permit = $this->input->post('permanent_residence_permit');
        $permanent_residence_permit_date = $this->input->post('permanent_residence_permit_date');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_id' => $client_id,
            'investor_permit' => $investor_permit,
            'investor_permit_date' => (!empty($investor_permit_date)) ? date('Y-m-d', strtotime($investor_permit_date)) : '0000-00-00',
            'professional_permit' => $professional_permit,
            'professional_permit_date' => (!empty($professional_permit_date)) ? date('Y-m-d', strtotime($professional_permit_date)) : '0000-00-00',
            'self_employed_permit' => $self_employed_permit,
            'self_employed_permit_date' => (!empty($self_employed_permit_date)) ? date('Y-m-d', strtotime($self_employed_permit_date)) : '0000-00-00',
            'retired_permit' => $retired_permit,
            'retired_permit_date' => (!empty($retired_permit_date)) ? date('Y-m-d', strtotime($retired_permit_date)) : '0000-00-00',
            'permanent_residence_permit' => $permanent_residence_permit,
            'permanent_residence_permit_date' => (!empty($permanent_residence_permit_date)) ? date('Y-m-d', strtotime($permanent_residence_permit_date)) : '0000-00-00',
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
        );
        if ($this->client_model->insertClientOccupationInfo($data)) {
            echo '{ "status" : "SUCCESS" , "message" : "Occupation information added successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Can not be added." }';
        }
    }

    function edit_client_occupation_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_id = $this->input->post('client_id');
        $client_occupation_info_id = $this->input->post('client_occupation_info_id');
        if ($single_client_occupation_info_detail = $this->client_model->listClientOccupationInfo($client_id, $client_occupation_info_id)) {
            echo json_encode($single_client_occupation_info_detail);
        } else {
            echo '{ "status" : "FAILED" , "message" : "No record found." }';
        }
    }

    function submit_edit_client_occupation_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_occupation_info_id = $this->input->post('client_occupation_info_id');
        $investor_permit = $this->input->post('investor_permit');
        $investor_permit_date = $this->input->post('investor_permit_date');
        $professional_permit = $this->input->post('professional_permit');
        $professional_permit_date = $this->input->post('professional_permit_date');
        $self_employed_permit = $this->input->post('self_employed_permit');
        $self_employed_permit_date = $this->input->post('self_employed_permit_date');
        $retired_permit = $this->input->post('retired_permit');
        $retired_permit_date = $this->input->post('retired_permit_date');
        $permanent_residence_permit = $this->input->post('permanent_residence_permit');
        $permanent_residence_permit_date = $this->input->post('permanent_residence_permit_date');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_occupation_info_id' => $client_occupation_info_id,
            'investor_permit' => $investor_permit,
            'investor_permit_date' => (!empty($investor_permit_date)) ? date('Y-m-d', strtotime($investor_permit_date)) : '0000-00-00',
            'professional_permit' => $professional_permit,
            'professional_permit_date' => (!empty($professional_permit_date)) ? date('Y-m-d', strtotime($professional_permit_date)) : '0000-00-00',
            'self_employed_permit' => $self_employed_permit,
            'self_employed_permit_date' => (!empty($self_employed_permit_date)) ? date('Y-m-d', strtotime($self_employed_permit_date)) : '0000-00-00',
            'retired_permit' => $retired_permit,
            'retired_permit_date' => (!empty($retired_permit_date)) ? date('Y-m-d', strtotime($retired_permit_date)) : '0000-00-00',
            'permanent_residence_permit' => $permanent_residence_permit,
            'permanent_residence_permit_date' => (!empty($permanent_residence_permit_date)) ? date('Y-m-d', strtotime($permanent_residence_permit_date)) : '0000-00-00',
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
        );
        if ($this->client_model->updateClientOccupationInfo($data)) {
            echo '{ "status" : "SUCCESS" , "message" : "Occupation information updated successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Can not be updated." }';
        }
    }

    function delete_client_occupation_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_occupation_info_id = $this->input->post('client_occupation_info_id');
        if ($this->client_model->deleteClientOccupationInfo($client_occupation_info_id)) {
            echo '{ "status" : "SUCCESS" , "message" : "Occupation information deleted successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "You can not delete a account." }';
        }
    }

    function download_pdf($client_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);

        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['country_detail'] = $this->client_model->listCountry();
        $data['client_type_detail'] = $this->client_model->listClientType();
        $data['client_detail'] = $this->client_model->listClient($client_id);
        $data['client_info_detail'] = $this->client_model->listClientInfo($client_id);
        $data['client_account_info_detail'] = $this->client_model->listClientAccountInfo($client_id);
        $data['client_director_info_detail'] = $this->client_model->listClientDirectorInfo($client_id);
        $data['client_shareholder_info_detail'] = $this->client_model->listClientShareholderInfo($client_id);
        $data['client_beneficial_owner_info_detail'] = $this->client_model->listClientBeneficialOwnerInfo($client_id);
        $data['client_bank_info_detail'] = $this->client_model->listClientBankInfo($client_id);
        $data['client_compliance_info_detail'] = $this->client_model->listClientComplianceInfo($client_id);
        $data['client_substance_info_detail'] = $this->client_model->listClientSubstanceInfo($client_id);
        $data['client_occupation_info_detail'] = $this->client_model->listClientOccupationInfo($client_id);
        $data['client_trust_info_detail'] = $this->client_model->listClientTrustInfo($client_id);
        $data['client_licence_info_detail'] = $this->client_model->listClientLicenceInfo($client_id);
        $data['client_agm_info_detail'] = $this->client_model->listClientAGMInfo($client_id);
        $this->load->library('pdf');
        $this->pdf->load_view('client_pdf_content', $data);
        $this->pdf->render();
        $this->pdf->stream($data['client_detail'][0]->client_name . ".pdf");
    }

    function download_excel($client_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);

        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $country_detail = $this->client_model->listCountry();
        $client_type_detail = $this->client_model->listClientType();
        $client_detail = $this->client_model->listClient($client_id);
        $client_info_detail = $this->client_model->listClientInfo($client_id);
        $client_account_info_detail = $this->client_model->listClientAccountInfo($client_id);
        $client_director_info_detail = $this->client_model->listClientDirectorInfo($client_id);
        $client_shareholder_info_detail = $this->client_model->listClientShareholderInfo($client_id);
        $client_beneficial_owner_info_detail = $this->client_model->listClientBeneficialOwnerInfo($client_id);
        $client_bank_info_detail = $this->client_model->listClientBankInfo($client_id);
        $client_compliance_info_detail = $this->client_model->listClientComplianceInfo($client_id);
        $client_substance_info_detail = $this->client_model->listClientSubstanceInfo($client_id);
        $client_occupation_info_detail = $this->client_model->listClientOccupationInfo($client_id);
        $client_trust_info_detail = $this->client_model->listClientTrustInfo($client_id);
        $client_licence_info_detail = $this->client_model->listClientLicenceInfo($client_id);
        $client_agm_info_detail = $this->client_model->listClientAGMInfo($client_id);
        //load our new PHPExcel library
        $this->load->library('excel');
        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Client Information');
        //set cell A1 content with some text
        if (!empty($client_info_detail[0]->client_info_id)) {
            $col = 0;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Company Reference');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Name of Client');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Status');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Type');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Date of Inc');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'File No.');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'GBL License No.');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Conversion or transfer registration');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Transfer from another MC');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Business Registration No.');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Freeport Licence');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'VAT No.');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'TAN No.');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Previous Name');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Date of Name Change');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Registration fees paid for the current year');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Portfolio');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Introduced by');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Place of work of the Introducer');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Country of the Introducer');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Email of the Introducer');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Phone number of the Introducer');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'TRC');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Renewal Date');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'GROUP');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Activity of Company');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Activities in line with business plan');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Strike off/Wind up/Removal from Register');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Registered Office');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Business Address');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'File Location');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Archives Reference No.');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'FSC fees paid for the year');
            $col ++;
            $col = 0;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->company_reference);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_detail[0]->client_name);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->status);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->client_type_name);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, ($client_info_detail[0]->date_of_inc != '0000-00-00') ? date('d F Y', strtotime($client_info_detail[0]->date_of_inc)) : '');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->file_no);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->gbl_license_no);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->conversion_or_transfer_registration);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->transfer_from_another_mc);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->business_registration_no);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->freeport_licence);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->vat_no);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->tan_no);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->previous_name);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, ($client_info_detail[0]->date_change_of_name != '0000-00-00') ? date('d F Y', strtotime($client_info_detail[0]->date_change_of_name)) : '');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->registration_fees);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->portfolio);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->introduced_by_period);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->place_of_work_of_the_introducer);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->country_name);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->email_of_the_introducer);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->phone_number_of_the_introducer);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->trc);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, ($client_info_detail[0]->renewal_date != '0000-00-00') ? date('d F Y', strtotime($client_info_detail[0]->renewal_date)) : '');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->group);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->business_activity);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->activities_in_line_with_business_plan);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->removal_from_register);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->registered_office);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->business_address);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->file_location);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->archives_ref_no);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 2, $client_info_detail[0]->fsc_fees);
            $col ++;
        }
        if (!empty($client_account_info_detail)) {

            $this->excel->createSheet();
            $this->excel->setActiveSheetIndex(1);
            $this->excel->getActiveSheet()->setTitle('Account Information');
            $col = 0;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Financial Year End');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Accounting done by');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Date last audited financial statements filed');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Auditors');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Date last annual returns filed');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Date last Tax returns filed');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Add Date last financial summaries filed');
            $col ++;
            foreach ($client_account_info_detail as $client_account_info) {
                $col = 0;
                $row = 1;
                $row++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_account_info->financial_year_end);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_account_info->accounting_done_by);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_account_info->date_last_accounts_filed);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_account_info->auditors);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_account_info->date_last_annual_returns);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_account_info->date_last_tax_returns);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_account_info->add_date_last_financial_summaries_filed);
            }
        }
        if (!empty($client_director_info_detail)) {

            $this->excel->createSheet();
            $this->excel->setActiveSheetIndex(2);
            $this->excel->getActiveSheet()->setTitle('Director Information');
            $col = 0;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Director Name');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Date Appointed');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Date Resigned');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Passport expiry date');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Directorship in public company');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Age of the director');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Other KYC docs available');
            $col ++;
            foreach ($client_director_info_detail as $client_director_info) {
                $col = 0;
                $row = 1;
                $row++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_director_info->director_name);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_director_info->date_appointed);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_director_info->date_resigned);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_director_info->passport_expiry_date);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_director_info->directorship_yes_no);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_director_info->age_of_the_director);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_director_info->other_kyc_docs);
            }
        }

        if (!empty($client_shareholder_info_detail)) {

            $this->excel->createSheet();
            $this->excel->setActiveSheetIndex(3);
            $this->excel->getActiveSheet()->setTitle('Shareholder Information');
            $col = 0;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Name');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'No.of Shares');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Type of shares');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Value of shares');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Passport expiry date');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Other KYC docs');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Transfer of shares');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Stated Capital');
            $col ++;
            foreach ($client_shareholder_info_detail as $client_shareholder_info) {
                $col = 0;
                $row = 1;
                $row++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_shareholder_info->shareholder_name);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_shareholder_info->no_of_shares);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_shareholder_info->type_of_shares);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_shareholder_info->value_of_shares);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_shareholder_info->passport_expiry_date);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_shareholder_info->other_kyc_docs);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_shareholder_info->transfer_of_shares);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_shareholder_info->stated_capital);
                $col ++;
            }
        }
        if (!empty($client_beneficial_owner_info_detail)) {

            $this->excel->createSheet();
            $this->excel->setActiveSheetIndex(4);
            $this->excel->getActiveSheet()->setTitle('Beneficial Owner Information');
            $col = 0;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Contact Details');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Country');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Name of Authorised Person');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Email of the Authorised Person');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Phone number of the Authorised Person');

            foreach ($client_beneficial_owner_info_detail as $client_beneficial_owner_info) {
                $col = 0;
                $row = 1;
                $row++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_beneficial_owner_info->contact_details);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_beneficial_owner_info->country_name);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_beneficial_owner_info->name_of_authorised_person);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_beneficial_owner_info->email_of_the_authorised_person);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_beneficial_owner_info->phone_number_of_the_authorised_person);
            }
        }
        if (!empty($client_bank_info_detail)) {

            $this->excel->createSheet();
            $this->excel->setActiveSheetIndex(5);
            $this->excel->getActiveSheet()->setTitle('Bank Information');
            $col = 0;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Name of Bank');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Type of Account');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Currency');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Date account opened');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Name of Bank Signatories');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Is the Company on internet banking?');
            $col ++;
            foreach ($client_bank_info_detail as $client_bank_info) {
                $col = 0;
                $row = 1;
                $row++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_bank_info->bank_name);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_bank_info->account_type);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_bank_info->currency_name);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_bank_info->date_account_opened);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_bank_info->bank_signatories);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_bank_info->internet_banking);
            }
        }
        if (!empty($client_compliance_info_detail)) {

            $this->excel->createSheet();
            $this->excel->setActiveSheetIndex(6);
            $this->excel->getActiveSheet()->setTitle('Compliance Information');
            $col = 0;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Checklist number');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Date of Last review');

            foreach ($client_compliance_info_detail as $client_compliance_info) {
                $col = 0;
                $row = 1;
                $row++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_compliance_info->checklist_number);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_compliance_info->date_last_review);
            }
        }
        if (!empty($client_substance_info_detail)) {

            $this->excel->createSheet();
            $this->excel->setActiveSheetIndex(7);
            $this->excel->getActiveSheet()->setTitle('Substance Information');
            $col = 0;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Arbitration clause in the constitution');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Office in Mauritius');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Other substance conditions');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Employ on a full time basis one person in Mauritius');


            $col = 0;
            $row = 1;
            $row++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_substance_info_detail[0]->arbitration_clause);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_substance_info_detail[0]->office_in_mauritius);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_substance_info_detail[0]->other_substance_conditions);
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_substance_info_detail[0]->mauritius_employ);
        }
        if (!empty($client_occupation_info_detail)) {

            $this->excel->createSheet();
            $this->excel->setActiveSheetIndex(8);
            $this->excel->getActiveSheet()->setTitle('Occupation Permit Information');
            $col = 0;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Investor permit');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Professional permit');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Self employed permit');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Retired permit');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Permanent residence permit');

            foreach ($client_occupation_info_detail as $client_occupation_info) {
                $col = 0;
                $row = 1;
                $row++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_occupation_info->investor_permit);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_occupation_info->professional_permit);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_occupation_info->self_employed_permit);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_occupation_info->retired_permit);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_occupation_info->permanent_residence_permit);
            }
        }
        if (!empty($client_trust_info_detail)) {

            $this->excel->createSheet();
            $this->excel->setActiveSheetIndex(9);
            $this->excel->getActiveSheet()->setTitle('Trust Information');
            $col = 0;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Type of Trust');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Does the Trust hold a global business licence');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Trust Deed available');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Name of Trustees');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Date of Expiry of passport of non-resident trustee');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Utility bill available and dated of non-resident trustee');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Name of Settlor');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Date of Expiry of passport of Settlors');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Utility bill available and dated of Settlors');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Name of Beneficiaries');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Letter of wishes available for non-discretionary trust');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Declaration of non-residence available');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Are accounts prepared?');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Tax returns filed?');
            foreach ($client_trust_info_detail as $client_trust_info) {
                $col = 0;
                $row = 1;
                $row++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_trust_info->trust_type_name);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_trust_info->global_business_licence);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_trust_info->trust_deed_available);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_trust_info->trustee_name);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_trust_info->non_resident_trustee_passport_expiry_date);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_trust_info->non_resident_trustee_utility_bill_available_and_dated);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_trust_info->settlor_name);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_trust_info->settlor_passport_expiry_date);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_trust_info->settlor_utility_bill_available_and_dated);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_trust_info->beneficiaries_name);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_trust_info->letter_of_wishes);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_trust_info->declaration_of_non_residence_available);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_trust_info->accounts_prepared);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_trust_info->tax_returns);
            }
        }
        if (!empty($client_licence_info_detail)) {

            $this->excel->createSheet();
            $this->excel->setActiveSheetIndex(10);
            $this->excel->getActiveSheet()->setTitle('Licences Information');
            $col = 0;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Type of licences');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Date of issue of the licence');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Date of expiry of the licence');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Special licensing conditions');

            foreach ($client_licence_info_detail as $client_licence_info) {
                $col = 0;
                $row = 1;
                $row++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_licence_info->licence_type_name);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_licence_info->issue_date);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_licence_info->expiry_date);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_licence_info->licensing_conditions);
            }
        }
        if (!empty($client_agm_info_detail)) {

            $this->excel->createSheet();
            $this->excel->setActiveSheetIndex(11);
            $this->excel->getActiveSheet()->setTitle('AGM Information');
            $col = 0;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Date AGM held for the current year');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Have the audited financial statements been adopted at the AGM?');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Constitution adopted');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Has there been any amendment/revocation to the constitution?');
            $col ++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Date relevant filing done with RoC');

            foreach ($client_agm_info_detail as $client_agm_info) {
                $col = 0;
                $row = 1;
                $row++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_agm_info->agm_date);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_agm_info->financial_statements);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_agm_info->constitution_adopted);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_agm_info->amendment);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client_agm_info->relevant_date);
            }
        }

        $filename = $client_detail[0]->client_name . '.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
    }

    function client_report() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);

        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['page_url'] = 'client_report_content';
        $this->load->view('dashboard_page', $data);
    }

    function submit_client_report() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['client_report_by'] = $this->input->post('client_report_by');
        $data['client_report_by_text'] = $this->input->post('client_report_by_text');
        $newdata = array(
            'client_report_by' => $data['client_report_by'],
            'client_report_by_text' => $data['client_report_by_text']
        );

        $this->session->set_userdata($newdata);
        if ($data['client_report_by'] == 'director_name' || $data['client_report_by'] == 'passport_expiry_date') {
            $data['client_detail'] = $this->client_model->listClientDirectorInfo();
        } elseif ($data['client_report_by'] == 'name_of_authorised_person' || $data['client_report_by'] == 'country_name') {
            $data['client_detail'] = $this->client_model->listClientBeneficialOwnerInfo();
        } elseif ($data['client_report_by'] == 'date_last_review') {
            $data['client_detail'] = $this->client_model->listClientComplianceInfo();
        } else {
            $data['client_detail'] = $this->client_model->listClientInfo();
        }

        $this->load->view('client_report_data_content', $data);
    }

    function download_report_excel() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_report_by = $this->session->userdata('client_report_by');
        $client_report_by_text = $this->session->userdata('client_report_by_text');
        if ($client_report_by == 'director_name' || $client_report_by == 'passport_expiry_date') {
            $client_detail = $this->client_model->listClientDirectorInfo();
        } elseif ($client_report_by == 'name_of_authorised_person' || $client_report_by == 'country_name') {
            $client_detail = $this->client_model->listClientBeneficialOwnerInfo();
        } elseif ($client_report_by == 'date_last_review') {
            $client_detail = $this->client_model->listClientComplianceInfo();
        } else {
            $client_detail = $this->client_model->listClientInfo();
        }
        
        
        //load our new PHPExcel library
        $this->load->library('excel');
        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Client Report');
        //set cell A1 content with some text
        $col = 0;
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, 'Client');
        $col ++;
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $client_report_by_text);
        $col ++;
        $row = 2;
        if (!empty($client_detail)) {
            foreach ($client_detail as $client) {
                $col = 0;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client->client_name);
                $col ++;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $client->$client_report_by);

                $row++;
            }
        }

        $filename = 'Client Report.xls'; //save our workbook as this file name    

        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
    }

    function client_trust_info($client_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['tab_id'] = $this->input->post('tab_id');
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['client_trust_info_detail'] = $this->client_model->listClientTrustInfo($client_id);

        $data['trust_type_detail'] = $this->client_model->listTrustType();
        $data['client_id'] = $client_id;

        $this->load->view('client_trust_info_content', $data);
    }

    function add_client_trust_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $client_id = $this->input->post('client_id');
        $trust_type_id = $this->input->post('trust_type_id');
        $trust_type_other = $this->input->post('trust_type_other');
        $global_business_licence = $this->input->post('global_business_licence');
        $trust_deed_available = $this->input->post('trust_deed_available');
        $trustee_name = $this->input->post('trustee_name');
        $non_resident_trustee_passport_expiry_date = $this->input->post('non_resident_trustee_passport_expiry_date');
        $non_resident_trustee_utility_bill_available_and_dated = $this->input->post('non_resident_trustee_utility_bill_available_and_dated');
        $settlor_name = $this->input->post('settlor_name');
        $settlor_passport_expiry_date = $this->input->post('settlor_passport_expiry_date');
        $settlor_utility_bill_available_and_dated = $this->input->post('settlor_utility_bill_available_and_dated');
        $beneficiaries_name = $this->input->post('beneficiaries_name');
        $letter_of_wishes = $this->input->post('letter_of_wishes');
        $declaration_of_non_residence_available = $this->input->post('declaration_of_non_residence_available');
        $accounts_prepared = $this->input->post('accounts_prepared');
        $tax_returns = $this->input->post('tax_returns');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_id' => $client_id,
            'trust_type_id' => $trust_type_id,
            'trust_type_other' => $trust_type_other,
            'global_business_licence' => $global_business_licence,
            'trust_deed_available' => $trust_deed_available,
            'trustee_name' => $trustee_name,
            'non_resident_trustee_passport_expiry_date' => (!empty($non_resident_trustee_passport_expiry_date)) ? date('Y-m-d', strtotime($non_resident_trustee_passport_expiry_date)) : '0000-00-00',
            'non_resident_trustee_utility_bill_available_and_dated' => (!empty($non_resident_trustee_utility_bill_available_and_dated)) ? date('Y-m-d', strtotime($non_resident_trustee_utility_bill_available_and_dated)) : '0000-00-00',
            'settlor_name' => $settlor_name,
            'settlor_passport_expiry_date' => (!empty($settlor_passport_expiry_date)) ? date('Y-m-d', strtotime($settlor_passport_expiry_date)) : '0000-00-00',
            'settlor_utility_bill_available_and_dated' => (!empty($settlor_utility_bill_available_and_dated)) ? date('Y-m-d', strtotime($settlor_utility_bill_available_and_dated)) : '0000-00-00',
            'beneficiaries_name' => $beneficiaries_name,
            'letter_of_wishes' => $letter_of_wishes,
            'declaration_of_non_residence_available' => $declaration_of_non_residence_available,
            'accounts_prepared' => $accounts_prepared,
            'tax_returns' => $tax_returns,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
        );
        if ($this->client_model->insertClientTrustInfo($data)) {
            echo '{ "status" : "SUCCESS" , "message" : "Trust information added successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Can not be added." }';
        }
    }

    function edit_client_trust_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_id = $this->input->post('client_id');
        $client_trust_info_id = $this->input->post('client_trust_info_id');
        if ($single_client_trust_info_detail = $this->client_model->listClientTrustInfo($client_id, $client_trust_info_id)) {
            echo json_encode($single_client_trust_info_detail);
        } else {
            echo '{ "status" : "FAILED" , "message" : "No record found." }';
        }
    }

    function submit_edit_client_trust_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_trust_info_id = $this->input->post('edit_client_trust_info_id');
        $trust_type_id = $this->input->post('edit_trust_type_id');
        $trust_type_other = $this->input->post('edit_trust_type_other');
        $global_business_licence = $this->input->post('edit_global_business_licence');
        $trust_deed_available = $this->input->post('edit_trust_deed_available');
        $trustee_name = $this->input->post('edit_trustee_name');
        $non_resident_trustee_passport_expiry_date = $this->input->post('edit_non_resident_trustee_passport_expiry_date');
        $non_resident_trustee_utility_bill_available_and_dated = $this->input->post('edit_non_resident_trustee_utility_bill_available_and_dated');
        $settlor_name = $this->input->post('edit_settlor_name');
        $settlor_passport_expiry_date = $this->input->post('edit_settlor_passport_expiry_date');
        $settlor_utility_bill_available_and_dated = $this->input->post('edit_settlor_utility_bill_available_and_dated');
        $beneficiaries_name = $this->input->post('edit_beneficiaries_name');
        $letter_of_wishes = $this->input->post('edit_letter_of_wishes');
        $declaration_of_non_residence_available = $this->input->post('edit_declaration_of_non_residence_available');
        $accounts_prepared = $this->input->post('edit_accounts_prepared');
        $tax_returns = $this->input->post('edit_tax_returns');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_trust_info_id' => $client_trust_info_id,
            'trust_type_id' => $trust_type_id,
            'trust_type_other' => $trust_type_other,
            'global_business_licence' => $global_business_licence,
            'trust_deed_available' => $trust_deed_available,
            'trustee_name' => $trustee_name,
            'non_resident_trustee_passport_expiry_date' => (!empty($non_resident_trustee_passport_expiry_date)) ? date('Y-m-d', strtotime($non_resident_trustee_passport_expiry_date)) : '0000-00-00',
            'non_resident_trustee_utility_bill_available_and_dated' => (!empty($non_resident_trustee_utility_bill_available_and_dated)) ? date('Y-m-d', strtotime($non_resident_trustee_utility_bill_available_and_dated)) : '0000-00-00',
            'settlor_name' => $settlor_name,
            'settlor_passport_expiry_date' => (!empty($settlor_passport_expiry_date)) ? date('Y-m-d', strtotime($settlor_passport_expiry_date)) : '0000-00-00',
            'settlor_utility_bill_available_and_dated' => (!empty($settlor_utility_bill_available_and_dated)) ? date('Y-m-d', strtotime($settlor_utility_bill_available_and_dated)) : '0000-00-00',
            'beneficiaries_name' => $beneficiaries_name,
            'letter_of_wishes' => $letter_of_wishes,
            'declaration_of_non_residence_available' => $declaration_of_non_residence_available,
            'accounts_prepared' => $accounts_prepared,
            'tax_returns' => $tax_returns,
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
        );
        if ($this->client_model->updateClientTrustInfo($data)) {
            echo '{ "status" : "SUCCESS" , "message" : "Trust information updated successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Can not be updated." }';
        }
    }

    function delete_client_trust_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_trust_info_id = $this->input->post('client_trust_info_id');
        if ($this->client_model->deleteClientTrustInfo($client_trust_info_id)) {
            echo '{ "status" : "SUCCESS" , "message" : "Trust information deleted successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "You can not delete a account." }';
        }
    }

    function client_licence_info($client_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['tab_id'] = $this->input->post('tab_id');
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['client_licence_info_detail'] = $this->client_model->listClientLicenceInfo($client_id);

        $data['licence_type_detail'] = $this->client_model->listLicenceType();
        $data['client_id'] = $client_id;

        $this->load->view('client_licence_info_content', $data);
    }

    function add_client_licence_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $client_id = $this->input->post('client_id');
        $licence_type_id = $this->input->post('licence_type_id');
        $issue_date = $this->input->post('issue_date');
        $expiry_date = $this->input->post('expiry_date');
        $licensing_conditions = $this->input->post('licensing_conditions');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_id' => $client_id,
            'licence_type_id' => $licence_type_id,
            'issue_date' => (!empty($issue_date)) ? date('Y-m-d', strtotime($issue_date)) : '0000-00-00',
            'expiry_date' => (!empty($expiry_date)) ? date('Y-m-d', strtotime($expiry_date)) : '0000-00-00',
            'licensing_conditions' => $licensing_conditions,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
        );
        if ($this->client_model->insertClientLicenceInfo($data)) {
            echo '{ "status" : "SUCCESS" , "message" : "Licence information added successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Can not be added." }';
        }
    }

    function edit_client_licence_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_id = $this->input->post('client_id');
        $client_licence_info_id = $this->input->post('client_licence_info_id');
        if ($single_client_licence_info_detail = $this->client_model->listClientLicenceInfo($client_id, $client_licence_info_id)) {
            echo json_encode($single_client_licence_info_detail);
        } else {
            echo '{ "status" : "FAILED" , "message" : "No record found." }';
        }
    }

    function submit_edit_client_licence_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_licence_info_id = $this->input->post('edit_client_licence_info_id');
        $licence_type_id = $this->input->post('edit_licence_type_id');
        $issue_date = $this->input->post('edit_issue_date');
        $expiry_date = $this->input->post('edit_expiry_date');
        $licensing_conditions = $this->input->post('edit_licensing_conditions');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_licence_info_id' => $client_licence_info_id,
            'licence_type_id' => $licence_type_id,
            'issue_date' => (!empty($issue_date)) ? date('Y-m-d', strtotime($issue_date)) : '0000-00-00',
            'expiry_date' => (!empty($expiry_date)) ? date('Y-m-d', strtotime($expiry_date)) : '0000-00-00',
            'licensing_conditions' => $licensing_conditions,
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
        );
        if ($this->client_model->updateClientLicenceInfo($data)) {
            echo '{ "status" : "SUCCESS" , "message" : "Licence information updated successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Can not be updated." }';
        }
    }

    function delete_client_licence_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_licence_info_id = $this->input->post('client_licence_info_id');
        if ($this->client_model->deleteClientLicenceInfo($client_licence_info_id)) {
            echo '{ "status" : "SUCCESS" , "message" : "Licence information deleted successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "You can not delete a account." }';
        }
    }

    function client_agm_info($client_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['tab_id'] = $this->input->post('tab_id');
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['client_agm_info_detail'] = $this->client_model->listClientAGMInfo($client_id);
        $data['client_id'] = $client_id;

        $this->load->view('client_agm_info_content', $data);
    }

    function add_client_agm_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $client_id = $this->input->post('client_id');
        $agm_date = $this->input->post('agm_date');
        $financial_statements = $this->input->post('financial_statements');
        $constitution_adopted = $this->input->post('constitution_adopted');
        $amendment = $this->input->post('amendment');
        $relevant_date = $this->input->post('relevant_date');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_id' => $client_id,
            'agm_date' => (!empty($agm_date)) ? date('Y-m-d', strtotime($agm_date)) : '0000-00-00',
            'financial_statements' => $financial_statements,
            'constitution_adopted' => $constitution_adopted,
            'amendment' => $amendment,
            'relevant_date' => (!empty($relevant_date)) ? date('Y-m-d', strtotime($relevant_date)) : '0000-00-00',
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
        );
        if ($this->client_model->insertClientAGMInfo($data)) {
            echo '{ "status" : "SUCCESS" , "message" : "AGM information added successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Can not be added." }';
        }
    }

    function edit_client_agm_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_id = $this->input->post('client_id');
        $client_agm_info_id = $this->input->post('client_agm_info_id');
        if ($single_client_agm_info_detail = $this->client_model->listClientAGMInfo($client_id, $client_agm_info_id)) {
            echo json_encode($single_client_agm_info_detail);
        } else {
            echo '{ "status" : "FAILED" , "message" : "No record found." }';
        }
    }

    function submit_edit_client_agm_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_agm_info_id = $this->input->post('edit_client_agm_info_id');
        $agm_date = $this->input->post('edit_agm_date');
        $financial_statements = $this->input->post('edit_financial_statements');
        $constitution_adopted = $this->input->post('edit_constitution_adopted');
        $amendment = $this->input->post('edit_amendment');
        $relevant_date = $this->input->post('edit_relevant_date');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'client_agm_info_id' => $client_agm_info_id,
            'agm_date' => (!empty($agm_date)) ? date('Y-m-d', strtotime($agm_date)) : '0000-00-00',
            'financial_statements' => $financial_statements,
            'constitution_adopted' => $constitution_adopted,
            'amendment' => $amendment,
            'relevant_date' => (!empty($relevant_date)) ? date('Y-m-d', strtotime($relevant_date)) : '0000-00-00',
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
        );
        if ($this->client_model->updateClientAGMInfo($data)) {
            echo '{ "status" : "SUCCESS" , "message" : "AGM information updated successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "Can not be updated." }';
        }
    }

    function delete_client_agm_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $client_agm_info_id = $this->input->post('client_agm_info_id');
        if ($this->client_model->deleteClientAGMInfo($client_agm_info_id)) {
            echo '{ "status" : "SUCCESS" , "message" : "AGM information deleted successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "You can not delete a account." }';
        }
    }
    public function testDatabase2() {
        $row = 1;
if (($handle = fopen("database1.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
       // echo '<pre>';
       // print_r($data);
       
//       if($row != 1){
//          
//       $data5 = array(
//            'client_name' => trim($data[2]),
//            'company_name' => 'Anex Management Services Limited',
//            'team_name' => (!empty($data[3])) ? $data[3] : '',
//            'created_by' => 1,
//            'created' => date('Y-m-d h:i:s')
//        );
//        if($client_id=$this->client_model->insertClient($data5))
//        {
//			if($row >2){
//        $data2 = array(
//            'client_id' => $client_id,
//            'company_reference' => (!empty($data[1])) ? $data[1] : '',
//            'status' => (!empty($data[4])) ? $data[4] : '',
//            'client_type_id' => (!empty($data[5])) ? $data[5] : '',
//            'foreign_country' => '',
//            'date_of_inc' => (!empty($data[6])) ? date('Y-m-d', strtotime($data[6])) : '0000-00-00',
//            'file_no' => (!empty($data[7])) ? $data[7] : '',
//            'portfolio' => (!empty($data[3])) ? $data[3] : '',
//            'group' => (!empty($data[18])) ? 'Yes' : 'No',
//            'group_name' => (!empty($data[18])) ? $data[18] : '',
//            'conversion_or_transfer_registration' => '',
//            'conversion_or_transfer_registration_description' => '0000-00-00',
//            'converted_from_to' => '',
//            'transfer_from_another_mc' => '',
//            'transfer_from_another_mc_description' => '0000-00-00',
//            'management_company_name' => '',
//            'previous_name' => (!empty($data[9])) ? $data[9] : '',
//            'date_change_of_name' => (!empty($data[10])&&($data[10]!='NOT APPLICABLE')) ? date('Y-m-d', strtotime($data[10])) : '0000-00-00',
//            'removal_from_register' => '',
//            'registered_office' => '',
//            'business_address' => '',
//            'file_location' => '',
//            'gbl_license_no' => (!empty($data[8])) ? $data[8] : '',
//            'gbl_license_issue_date' => '0000-00-00',
//            'registration_fees' => (!empty($data[12])&& ($data[12]!='NOT APPLICABLE'))? 'Yes' : 'No',
//            'registration_fees_description' => (!empty($data[12])) ? $data[12] : '',
//            'fsc_fees' => 'No',
//            'fsc_fees_description' => '',
//            'business_registration_no' => '',
//            'archives_ref_no' => '',
//            'freeport_licence' => '',
//            'vat_no' => '',
//            'tan_no' => '',
//            'trc' => '',
//            'renewal_date' => '0000-00-00',
//            'introduced_by_period' => (!empty($data[22])&& ($data[22]!='NOT APPLICABLE'))? $data[22] : '',
//            'place_of_work_of_the_introducer' => '',
//            'country_id' => '',
//            'email_of_the_introducer' => '',
//            'phone_number_of_the_introducer' => '',
//            'business_activity' => '',
//            'activities_in_line_with_business_plan' => '',
//            'activities_in_line_with_business_plan_description' => '',
//            'created_by' => 1,
//            'created' => date('Y-m-d h:i:s')
//        );
//
//       $this->client_model->insertClientInfo($data2);
//	   
//	   }
//        }
//        }
        $row++;
    }
    //fclose($handle);
}
    }
   
	
	public function testDatabase4() {
            ini_set('memory_limit','-1');
			ini_set('max_execution_time','-1');
        $row = 1;
        $a=array();
if (($handle = fopen("database1.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if($row != 1){
            $a[]=$data;
        }
        $row++;
    }
    //fclose($handle);
}
//print_r($a);die;
$i=0;
foreach($a as $data){
       
        if(1)
        {
            if($i>0){
                
                $client_type = $this->client_model->listClientType($data[5]);
		//echo $client_type[0]->client_type_name.'<br/>';
                		
                $languages = simplexml_load_file(base_url() . 'xml/' . $client_type[0]->client_type_name . ".xml");
            $folder_path = CLIENT_FOLDER . '/' . $client_type[0]->client_type_name;
                //echo $testFolder->valid_folder('/okm:root/Client/GBC1');die;
               $testFolder = new TestFolder();
            //  echo $testFolder->valid_folder($folder_path);die;
            if ($testFolder->valid_folder($folder_path) == 'PathNotFoundException: ' . $folder_path) {
                    $testFolder->test($folder_path);
                    
             }
              

             $cn=  str_replace(' ', '%20', trim($data[2]));
               $folder_path1 = $folder_path . '/' .$cn ;
                $f_path1 = $folder_path . '/' .trim($data[2]) ;
                if ($testFolder->valid_folder($folder_path1) == 'PathNotFoundException: ' . $f_path1) {
                    
					$testFolder->test($f_path1);
                    
             }
                foreach ($languages->mainfolder as $lang) {
                    $folder_path2 = $folder_path1 . '/' . str_replace(' ', '%20', trim($lang["title"]));
					$f_path2 = $f_path1 . '/' . trim($lang["title"]);
                   // $testFolder->test($folder_path2);
                    if ($testFolder->valid_folder($folder_path2) == 'PathNotFoundException: ' . $f_path2) {
                    $testFolder->test($f_path2);
                    
             }
                    foreach ($lang->subfolder as $lang2) {
                        $folder_path3 = $folder_path2 . '/' . str_replace(' ', '%20', trim($lang2["title"]));
                        $f_path3 = $f_path2 . '/' . trim($lang2["title"]);
                        //$testFolder->test($folder_path3);
                          if ($testFolder->valid_folder($folder_path3) == 'PathNotFoundException: ' . $f_path3) {
                    $testFolder->test($f_path3);
                    
             }
                        foreach ($lang2->subsubfolder as $lang3) {
                            $folder_path4 = $folder_path3 . '/' . str_replace(' ', '%20', trim($lang3["title"]));
                            $f_path4 = $f_path3 . '/' . trim($lang3["title"]);
                           //$testFolder->test($folder_path4);
                             if ($testFolder->valid_folder($folder_path4) == 'PathNotFoundException: ' . $f_path4) {
                    $testFolder->test($f_path4);
                    
             }
                        }
                    }
                }
            }
        }
        $i++;
}


    }
    
   	
public function testDatabase() {
            ini_set('memory_limit','-1');
			ini_set('max_execution_time','-1');
        $row = 1;
        $a=array();
if (($handle = fopen("newc.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if($row != 1){
            $a[]=$data;
        }
        $row++;
    }
    //fclose($handle);
}
//print_r($a);die;
$i=0;
foreach($a as $data){
       
        if(1)
        {
            if($i>0){
                
                //$client_type = $this->client_model->listClientType($data[5]);
		//echo $client_type[0]->client_type_name.'<br/>';
                		
                $languages = simplexml_load_file(base_url() . 'xml/Domestic.xml');
            $folder_path = CLIENT_FOLDER . '/Domestic';
                //echo $testFolder->valid_folder('/okm:root/Client/GBC1');die;
               $testFolder = new TestFolder();
            
              

             $cn=  str_replace(' ', '%20', trim($data[0]));
               $folder_path1 = $folder_path . '/' .$cn ;
                $f_path1 = $folder_path . '/' .trim($data[0]) ;
                if ($testFolder->valid_folder($folder_path1) == 'PathNotFoundException: ' . $f_path1) {
                    
					$testFolder->test($f_path1);
                    
             }
                foreach ($languages->mainfolder as $lang) {
                    $folder_path2 = $folder_path1 . '/' . str_replace(' ', '%20', trim($lang["title"]));
					$f_path2 = $f_path1 . '/' . trim($lang["title"]);
                   // $testFolder->test($folder_path2);
                    if ($testFolder->valid_folder($folder_path2) == 'PathNotFoundException: ' . $f_path2) {
                    $testFolder->test($f_path2);
                    
             }
                    foreach ($lang->subfolder as $lang2) {
                        $folder_path3 = $folder_path2 . '/' . str_replace(' ', '%20', trim($lang2["title"]));
                        $f_path3 = $f_path2 . '/' . trim($lang2["title"]);
                        //$testFolder->test($folder_path3);
                          if ($testFolder->valid_folder($folder_path3) == 'PathNotFoundException: ' . $f_path3) {
                    $testFolder->test($f_path3);
                    
             }
                        foreach ($lang2->subsubfolder as $lang3) {
                            $folder_path4 = $folder_path3 . '/' . str_replace(' ', '%20', trim($lang3["title"]));
                            $f_path4 = $f_path3 . '/' . trim($lang3["title"]);
                           //$testFolder->test($folder_path4);
                             if ($testFolder->valid_folder($folder_path4) == 'PathNotFoundException: ' . $f_path4) {
                    $testFolder->test($f_path4);
                    
             }
                        }
                    }
                }
            }
        }
        $i++;
}


    }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
}
