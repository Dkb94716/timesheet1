<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	public function index()
	{
            
                if(!$this->session->userdata('logged_in'))
		{
		redirect(site_url("login"), 'refresh');
		}
		$this->load->model('common_model');
                $all_userdata = $this->session->userdata('logged_in');
                $data = array();
                $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
                $getUserPrivileges = $this->common_model->getUserPrivileges($data);
                
                $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
                $data['page_url']='dashboard_page_body';
                $this->load->view('dashboard_page',$data); 
                
                
	}
}