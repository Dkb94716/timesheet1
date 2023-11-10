<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        // Construct our parent class
        parent::__construct();
    }

    public function index() {

        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $this->load->model('common_model');
        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);

        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);

        // json_decode($role1, true);
        $data['page_url'] = 'dashboard_page_body';
        $this->load->view('dashboard_page', $data);
    }

    function dms_login() {
        $OKMAuth = new SoapClient('http://192.168.2.95:8080/OpenKM/services/OKMAuth?wsdl');
         $loginResp = $OKMAuth->login(array('user' => 'ajay123', 'password' => '123456'));
        echo $token = $loginResp->return;die;
        //redirect('http://192.168.2.95:8080/OpenKM/frontend/index.jsp');
    }
    
    function history_list() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }

        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);

        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['history_detail'] = $this->common_model->listHistory($data['userPrimeryId']);
        
        $data['page_url'] = 'history_content';
        $this->load->view('dashboard_page', $data);
    }

}
