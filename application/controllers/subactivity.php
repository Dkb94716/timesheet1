<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  Project Name : Timesheet
  Developed In: Clavis Technologies Pvt Ltd.
  Modification History
  Create Date           Version         Author			Description                                Last modified
  __________	___________	_______________   ________________________________________  ________________________________________
  03-02-2015            1.0             Dablu                 Controller for Subactivity                        16-02-2015
 */

class Subactivity extends CI_Controller {

    function __construct() {
        // Construct our parent class
        parent::__construct();
        $this->load->model('subactivity_model');
        $this->load->model('activity_model');
    }

    function add_subactivity() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $activity_name = $this->input->post('activity_name');
        $subactivity_name = $this->input->post('subactivity_name');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'activity_name' => $activity_name,
            'subactivity_name' => trim($subactivity_name),
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
        );
        if ($this->subactivity_model->insertSubactivity($data)) {
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Added Sub-Activity',
                'message' => trim($subactivity_name). ' has been added.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Sub-Activity added successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "A Sub-Activity with the specified name already exists." }';
        }
    }

    function edit_subactivity() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $subactivity_id = $this->input->post('subactivity_id');
        if ($single_subactivity_detail = $this->subactivity_model->listSubactivity($subactivity_id)) {
            echo json_encode($single_subactivity_detail);
        } else {
            echo '{ "status" : "FAILED" , "message" : "No record found." }';
        }
    }

    function submit_edit_subactivity() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $subactivity_id = $this->input->post('subactivity_id');
        $subactivity_name = $this->input->post('subactivity_name');
        $activity_name = $this->input->post('activity_name');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array(
            'subactivity_id' => $subactivity_id,
            'subactivity_name' => trim($subactivity_name),
            'activity_name' => $activity_name,
            'updated_by' => $all_userdata['userPrimeryId'],
            'updated' => date('Y-m-d h:i:s')
        );
        if ($this->subactivity_model->updateSubactivity($data)) {
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Updated Sub-Activity',
                'message' => trim($subactivity_name). ' has been updated.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Sub-Activity updated successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "A Sub-Activity with the specified name already exists." }';
        }
    }

    function delete_subactivity() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
         $all_userdata = $this->session->userdata('logged_in');
        $subactivity_id = $this->input->post('subactivity_id');
        if ($this->subactivity_model->deleteSubactivity($subactivity_id)) {
            $history = array(
                'emp_id' => $all_userdata['userPrimeryId'] ,
                'title' => 'Deleted Sub-Activity',
                'message' => 'Sub-Activity deleted.',
                'created' => date('Y-m-d h:i:s')
             );
            $this->common_model->addToHistory($history);
            echo '{ "status" : "SUCCESS" , "message" : "Sub-Activity deleted successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "You can not delete a subactivity." }';
        }
    }

    function subactivity_list() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);

        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['activity_detail'] = $this->activity_model->listActivity();
        $data['subactivity_detail'] = $this->subactivity_model->listSubactivity();

        $data['page_url'] = 'subactivity_content';
        $this->load->view('dashboard_page', $data);
    }

    function get_subactivity() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $activity_name = $this->input->post('activity_name');
        $project_id = $this->input->post('project_id');
        $msg = '';
        if(!empty($project_id)){
            $subactivity_detail = $this->subactivity_model->listSubactivityByProjectId($project_id,$activity_name);
            if (!empty($subactivity_detail)) { 
                $msg .='<option value="">Select</option>';
                foreach ($subactivity_detail as $subactivity) {
                    $msg .='<option value="' . $subactivity->subactivity_name . '">' . $subactivity->subactivity_name . '</option>';
                }
            }else{
                if(!empty($activity_name)){
                    $subactivity_detail = $this->subactivity_model->listSubactivity(NULL, $activity_name);
                    $msg = '';
                    if (!empty($subactivity_detail)) {
                        $msg .='<option value="">Select</option>';
                        foreach ($subactivity_detail as $subactivity) {
                            $msg .='<option value="' . $subactivity->subactivity_name . '">' . $subactivity->subactivity_name . '</option>';
                        }
                    }
                }   
            }
            echo $msg;
        }
        else{
            $subactivity_detail = $this->subactivity_model->listSubactivity(NULL, $activity_name);
                    $msg = '';
                    if (!empty($subactivity_detail)) {
                        $msg .='<option value="">Select</option>';
                        foreach ($subactivity_detail as $subactivity) {
                            $msg .='<option value="' . $subactivity->subactivity_name . '">' . $subactivity->subactivity_name . '</option>';
                        }
                    }
            echo $msg;   
        }
    }

}
