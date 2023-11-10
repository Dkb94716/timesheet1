<?php
//error_reporting(0);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  Project Name : Timesheet
  Developed In: Clavis Technologies Pvt Ltd.
  Modification History
  Create Date           Version         Author			Description                                Last modified
  __________	___________	_______________   ________________________________________  ________________________________________
  03-03-2015            1.0             Dablu                 Controller for Userdetails                        03-03-2015
 */

class Userdetails extends CI_Controller {

    function __construct() {
        // Construct our parent class
        parent::__construct();
        $this->load->library('pdf');
        $this->load->library('test/TestFolder');
        $this->load->model('userdetails_model');
        $this->load->model('team_model');
        $this->load->model('department_model');
        $this->load->model('client_model');
        $this->load->model('user_role_model');
        $this->load->model('company_model');
		
        $this->load->helper('string');
        $this->load->helper('common');
        
    }

    function add_user() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['team_detail'] = $this->team_model->listTeam();
        $data['user_detail'] = $this->userdetails_model->listManagerdetails();
        $data['country_detail'] = $this->client_model->listCountry();
        $data['company_detail'] = $this->company_model->listCompany();
        $data['department_detail'] = $this->department_model->listDepartment();
        $data['user_role_detail'] = $this->user_role_model->listUserRole();
        $data['team_detail'] = $this->team_model->detailTeam();
        $data['page_url'] = 'add_user_content';
        $this->load->view('dashboard_page', $data);
    }

    function add_user_data() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        #############Employee Information###############################
        $common = new Common();
        $saltPassword = $common->generate_password();
        
        $this->load->library('encrypt');
        $password = $this->encrypt->encode($saltPassword);
        $user_name = $this->input->post('username1');
        $surname = $this->input->post('surname');
        $othername = $this->input->post('othername');
        $dob = $this->input->post('dob');
        $employeeId = $this->input->post('employeeId');
        $companyId = $this->input->post('companyId');
        $placeOfBirth = $this->input->post('placeOfBirth');
        $designation = $this->input->post('designation');
        $occupation = $this->input->post('occupation');
        $team = $this->input->post('team');
        $city = $this->input->post('city');
        $department = $this->input->post('department');
        $country = $this->input->post('country');
        $emailId = $this->input->post('emailId');
        $homeTel = $this->input->post('homeTel');
        $gender = $this->input->post('gender');
        $mobileNo = $this->input->post('mobileNo');
        $nationality = $this->input->post('nationality');
        $accesslevel = $this->input->post('accesslevel');
        $dtJoin = $this->input->post('dtJoin');
        $address = $this->input->post('address');
        $pro_period = $this->input->post('pro_period');
        $dtconfirm= $this->input->post('dtconfirm');
        $status = $this->input->post('status');
        $dtLeft = $this->input->post('dtLeft');
        $manager_id = $this->input->post('manager_id');
        $apply_leave = $this->input->post('apply_leave');
        $c_name1 = $this->input->post('c_name1');
        $c_relationship1 = $this->input->post('c_relationship1');
        $c_address1 = $this->input->post('c_tel_no1');
        $c_tel_no1 = $this->input->post('c_address1');
        $c_name2 = $this->input->post('c_name2');
        $c_relationship2 = $this->input->post('c_relationship2');
        $c_tel_no2 = $this->input->post('c_tel_no2');
        $c_address2 = $this->input->post('c_address2');
        $identity_card_passport = $this->input->post('identity_card_passport');
        $edf_forms = $this->input->post('edf_forms');
        $other_documents = $this->input->post('other_documents');
        $bank_account = $this->input->post('bank_account');
        $contract = $this->input->post('contract');
        $driving_licence = $this->input->post('driving_licence');
        $certificates_memberships = $this->input->post('certificates_memberships');
        $personal_questionnaires_fsc = $this->input->post('personal_questionnaires_fsc');
        $medicalPlan = $this->input->post('medicalPlan');
        $pensionPlan = $this->input->post('pensionPlan');
        $all_userdata = $this->session->userdata('logged_in');
            
//        if ($_FILES['user_image']['name'] != "") {
//            $user_image = $_FILES['user_image']['name'];
//            $prod = 'logo_' . $user_name;
//            $extension = end(explode(".", $user_image));
//            $userimage = $prod . "." . $extension;
//            move_uploaded_file($_FILES['user_image']['tmp_name'], "uploads/user/$userimage");
//        }
//       else {
//           $userimage='';
//         }
        
         
        
        $data_insert = array(
           
            'empPassword' => $password,
            'empName' => $user_name,
            'surname' => $surname,
            'other' => $othername,
            'dob' => (!empty($dob))? date('Y-m-d', strtotime($dob)):'0000-00-00',
            'empId' => $employeeId,
            'company_id'=>$companyId,
            'placeOfBirth' => $placeOfBirth,
            'designation' => $designation,
            'occupation' => $occupation,
            'currentTeamId' => $team,
            'city' => $city,
            'deptId' => $department,
            'country' => $country,
            'emailId' => $emailId,
            'homePhone' => $homeTel,
            'gender' => $gender,
            'mobile' => $mobileNo,
            'nationality' => $nationality,
            'usrRoleld' => $accesslevel,
            'address' => $address,
            'probation_period' => $pro_period,
            'dateOfConfirmation' => (!empty($dtconfirm))? date('Y-m-d', strtotime($dtconfirm)):'0000-00-00',
            'status' => $status,
            'dateLeft' => (!empty($dtLeft))? date('Y-m-d', strtotime($dtLeft)):'0000-00-00',
            'managerId' => $manager_id,
             'apply_leave' => $apply_leave,
            'datejoining' => (!empty($dtJoin))? date('Y-m-d', strtotime($dtJoin)):'0000-00-00',
            'name1' => $c_name1,
            'releationship1' => $c_relationship1,
            'telephone1' => $c_address1,
            'address1' => $c_tel_no1,
            'name2' => $c_name2,
            'releationship2' => $c_relationship2,
            'telephone2' => $c_tel_no2,
            'address2' => $c_address2,
            'identity_card' => $identity_card_passport,
            'eds_form' => $edf_forms,
            'other_documents' => $other_documents,
            'employee_documentcol' => $c_tel_no1,
            'bank' => $bank_account,
            'contract' => $contract,
            'driving_licence' => $driving_licence,
            'certificates_memberships' => $certificates_memberships,
            'personal_questionnaires' => $personal_questionnaires_fsc,
            'medical_status' => $medicalPlan,
            'pension_status' => $pensionPlan,
            'created_by' => $all_userdata['userPrimeryId'],
            'created' => date('Y-m-d h:i:s')
        );

        $j_title = $this->input->post('j_title');
        $j_special_remarks = $this->input->post('j_special_remarks');
        $j_date_of_promotion = $this->input->post('j_date_of_promotion');
        
        
        $count = count($this->input->post('j_title'));
        $employee_job_details = array();
        for ($i = 0; $i < $count; $i++) {

            $employee_job_details[$i] = array(
                'title' => $j_title[$i],
                'pormotion_date' => $j_date_of_promotion[$i],
                'special_remarks' => $j_special_remarks[$i],
            );
        }
        $t_course_name = $this->input->post('t_course_name');
        $t_purpose = $this->input->post('t_purpose');
        $t_offered_by = $this->input->post('t_offered_by');
        $t_cpd_points = $this->input->post('t_cpd_points');
        $t_training_date = $this->input->post('t_training_date');
       
        
        $count = count($this->input->post('t_course_name'));
        $employee_job_traning = array();
        for ($i = 0; $i < $count; $i++) {
            $employee_job_traning[$i] = array(
                'course_name' => $t_course_name[$i],
                'purpose' => $t_purpose[$i],
                'offered_by' => $t_offered_by[$i],
                'cpd_points' => $t_cpd_points[$i],
                'training_date' => $t_training_date[$i],
                'created_by' => $all_userdata['userPrimeryId'],
                'created' => date('Y-m-d h:i:s')
            );
        }


        $i_pension_plan = $this->input->post('i_pension_plan');
        $i_pension_date_joined = $this->input->post('i_pension_date_joined');
        $count = count($this->input->post('i_pension_plan'));
        $employee_pension_plan = array();
        for ($i = 0; $i < $count; $i++) {

            //echo "Hello"; die;
            $employee_pension_plan[$i] = array(
                'pension_plan' => $i_pension_plan[$i],
                'pension_join_date' => $i_pension_date_joined[$i],
                'created_by' => $all_userdata['userPrimeryId'],
                'created' => date('Y-m-d h:i:s')
            );
        }

        $i_medical_plan = $this->input->post('i_medical_plan');
        $i_medical_date_Joined = $this->input->post('i_medical_date_Joined');
      
        $count = count($this->input->post('i_medical_plan'));
        $employee_medical_plan = array();
        for ($i = 0; $i < $count; $i++) {
            $employee_medical_plan[$i] = array(
                'medical_plan' => $i_medical_plan[$i],
                'medical_paln_joined' => $i_medical_date_Joined[$i],
                 'created_by' => $all_userdata['userPrimeryId'],
                'created' => date('Y-m-d h:i:s')
            );
        }
        
      
        $user_details=$this->userdetails_model->insertUserdetails($data_insert, $employee_job_details, $employee_job_traning, $employee_pension_plan, $employee_medical_plan);
        if($user_details)
			{
				$this->load->model('dms_model');
				// code for DMS 
             $okm = array(
                'USR_ID'=>$employeeId,
                'USR_NAME'=>$user_name,
                'USR_PASSWORD'=>md5($saltPassword),
                'USR_EMAIL'=>$emailId,
                'USR_ACTIVE'=>'T'
            );
            $okm_role = array(
                'UR_USER'=>$employeeId,
                'UR_ROLE'=>'ROLE_USER'
            );
            $this->dms_model->addDMSUser($okm,$okm_role);
			// end
             $password=$user_details['empPassword'];
                     $emailId=$user_details['emailId'];
                    
		    $data = array();
                    
            $data['saltPassword'] = $password;
            $data['emailId'] = $emailId;
            $email_message = REGISTRATION_SUCCESSFULLY_MESSAGE;
            $search_data = array('[empId]','[emailId]', '[password]');
            $replace_data = array($employeeId,$emailId, $saltPassword);
            $MailTemplateContents = str_replace($search_data, $replace_data, $email_message);
            $MailSubject = REGISTRATION_EMAIL_SUBJECT;
            $Sendto = $emailId;
		    $Status = $common->sendmail($Sendto, $MailSubject, $MailTemplateContents); 
			$success_msg1 = 'Userdetails added successfully.';
            
            $user_message1 = array(
                'success_user' => $success_msg1
            );
             $testFolder = new TestFolder();
        
        
            $folder_path= EMPLOYEE_FOLDER.'/'.trim($employeeId);
           
        
        //echo $testFolder->valid_folder($folder_path);die;
        if($testFolder->valid_folder($folder_path)=='PathNotFoundException: '.$folder_path){
          $testFolder->test($folder_path);  
        }
       
        if(!empty($_FILES["user_image"]['name'])){
            $upload_file = $this->do_upload('user_image',$user_details['emp_id']);
        if (@$upload_file['error']) {
           $user_message1 = array(
                'success_user' => $upload_file['error']
            );
            $this->session->set_userdata($user_message1); 
           redirect(site_url("userdetails/userdetails_list"), 'refresh');
        } else {
            $profilepic['profilepic'] = $upload_file['upload_data']['file_name'];
            
            $this->userdetails_model->updateEmpProfilePic($profilepic,$user_details['emp_id']);
        }
            }
        
            $this->session->set_userdata($user_message1); 
            
        } else {
            $success_msg1 = 'A EmailID or   Employee ID  with the specified name already exists.';
            $user_message1 = array(
                'success_user' => $success_msg1
            );
            $this->session->set_userdata($user_message1); 
        
        }
      redirect(site_url("userdetails/userdetails_list"), 'refresh');
    }
   
    
    function edit_user($employee_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['team_detail'] = $this->team_model->listTeam();
        $data['manager_details'] = $this->userdetails_model->listManagerdetails($employee_id);
        $data['employee_id'] = $employee_id;
        $data['employee_presonal_details'] = $this->userdetails_model->listEmployeedetails($employee_id);
        $data['employee_contact_details'] = $this->userdetails_model->listEmployeecontactdetails($employee_id);
        $data['employee_document_details'] = $this->userdetails_model->listEmployeedocumentdetails($employee_id);
        $data['employee_job_details'] = $this->userdetails_model->listEmployeejobdetails($employee_id);
        $data['employee_traning_details'] = $this->userdetails_model->listEmployeetraningdetails($employee_id);
        $data['employee_pension_details'] = $this->userdetails_model->listEmployeePensiondetails($employee_id);
        $data['employee_medical_details'] = $this->userdetails_model->listEmployeeMedicaldetails($employee_id);
        $data['country_detail'] = $this->client_model->listCountry();
        $data['department_detail'] = $this->department_model->listDepartment();
        $data['user_role_detail'] = $this->user_role_model->listUserRole();
        $data['team_detail'] = $this->team_model->detailTeam();
        $data['company_detail'] = $this->company_model->listCompany();
        $data['page_url'] = 'edit_user_content';
        $this->load->view('dashboard_page', $data);
    }

    function edit_userdetails() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $userdetails_id = $this->input->post('userdetails_id');
        if ($single_userdetails_detail = $this->userdetails_model->listUserdetails($userdetails_id)) {
            echo json_encode($single_userdetails_detail);
        } else {
            echo '{ "status" : "FAILED" , "message" : "No record found." }';
        }
    }

    function update_user_data($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        #############Employee Information###############################
        $user_name = $this->input->post('username1');
        $surname = $this->input->post('surname');
        $othername = $this->input->post('othername');
        $dob= $this->input->post('dob');
        $employeeId = $this->input->post('employeeId');
        $companyId = $this->input->post('companyId');
        $placeOfBirth = $this->input->post('placeOfBirth');
        $designation = $this->input->post('designation');
        $occupation = $this->input->post('occupation');
        $team = $this->input->post('team');
        $city = $this->input->post('city');
        $department = $this->input->post('department');
        $country = $this->input->post('country');
        $emailId = $this->input->post('emailId');
        $homeTel = $this->input->post('homeTel');
        $gender = $this->input->post('gender');
        $mobileNo = $this->input->post('mobileNo');
        $nationality = $this->input->post('nationality');
        $accesslevel = $this->input->post('accesslevel');
        $dtJoin = $this->input->post('dtJoin');
        $apply_leave = $this->input->post('apply_leave');
        $address = $this->input->post('address');
        $pro_period = $this->input->post('pro_period');
        $dtconfirm = $this->input->post('dtconfirm');
        $status = $this->input->post('status');
        $dtLeft = $this->input->post('dtLeft');
        $manager_id = $this->input->post('manager_id');
        $c_name1 = $this->input->post('c_name1');
        $c_relationship1 = $this->input->post('c_relationship1');
        $c_address1 = $this->input->post('c_tel_no1');
        $c_tel_no1 = $this->input->post('c_address1');
        $c_name2 = $this->input->post('c_name2');
        $c_relationship2 = $this->input->post('c_relationship2');
        $c_tel_no2 = $this->input->post('c_tel_no2');
        $c_address2 = $this->input->post('c_address2');
        $identity_card_passport = $this->input->post('identity_card_passport');
        $edf_forms = $this->input->post('edf_forms');
        $other_documents = $this->input->post('other_documents');
        $bank_account = $this->input->post('bank_account');
        $contract = $this->input->post('contract');
        $driving_licence = $this->input->post('driving_licence');
        $certificates_memberships = $this->input->post('certificates_memberships');
        $personal_questionnaires_fsc = $this->input->post('personal_questionnaires_fsc');
        $medicalPlan = $this->input->post('medicalPlan');
        $pensionPlan = $this->input->post('pensionPlan');
        $prev_profilepic = $this->input->post('prev_profilepic');
//      if ($_FILES['user_image']['name'] != "") {
//            $user_image = $_FILES['user_image']['name'];
//            $prod = 'logo_' . $user_name;
//            $extension = end(explode(".", $user_image));
//            $userimage = $prod . "." . $extension;
//            move_uploaded_file($_FILES['user_image']['tmp_name'], "uploads/user/$userimage");
//        }
// else {
//     
//     $prod = 'logo_' . $user_name;
// }
        $data_insert = array(
            'id' => $id,
            'empName' => $user_name,
            'surname' => $surname,
            'other' => $othername,
            'dob' => (!empty($dob))? date('Y-m-d', strtotime($dob)):'0000-00-00',
            'empId' => $employeeId,
            'placeOfBirth' => $placeOfBirth,
             'company_id'=>$companyId,
            'designation' => $designation,
            'occupation' => $occupation,
            'currentTeamId' => $team,
            'city' => $city,
            'deptId' => $department,
            'country' => $country,
            'emailId' => $emailId,
            'homePhone' => $homeTel,
            'gender' => $gender,
            'mobile' => $mobileNo,
            'nationality' => $nationality,
            'usrRoleld' => $accesslevel,
            'address' => $address,
            'probation_period' => $pro_period,
            'dateOfConfirmation' => (!empty($dtconfirm))? date('Y-m-d', strtotime($dtconfirm)):'0000-00-00',
            'status' => $status,
            'dateLeft' => (!empty($dtLeft))? date('Y-m-d', strtotime($dtLeft)):'0000-00-00',
            'managerId' => $manager_id,
             'apply_leave' => $apply_leave,
            'datejoining' => (!empty($dtJoin))? date('Y-m-d', strtotime($dtJoin)):'0000-00-00',
            'name1' => $c_name1,
            'releationship1' => $c_relationship1,
            'telephone1' => $c_address1,
            'address1' => $c_tel_no1,
            'name2' => $c_name2,
            'releationship2' => $c_relationship2,
            'telephone2' => $c_tel_no2,
            'address2' => $c_address2,
            'identity_card' => $identity_card_passport,
            'eds_form' => $edf_forms,
            'other_documents' => $other_documents,
            'employee_documentcol' => $c_tel_no1,
            'bank' => $bank_account,
            'contract' => $contract,
            'driving_licence' => $driving_licence,
            'certificates_memberships' => $certificates_memberships,
            'personal_questionnaires' => $personal_questionnaires_fsc,
            'medical_status' => $medicalPlan,
            'pension_status' => $pensionPlan,
        );

        $j_title = $this->input->post('j_title');
        $j_special_remarks = $this->input->post('j_special_remarks');
        $j_date_of_promotion = $this->input->post('j_date_of_promotion');
       
        $count = count($this->input->post('j_title'));
        $employee_job_details = array();
        for ($i = 0; $i < $count; $i++) {

            $employee_job_details[$i] = array(
                'employee_id' => $id,
                'title' => $j_title[$i],
                'pormotion_date' => $j_date_of_promotion[$i],
                'special_remarks' => $j_special_remarks[$i],
            );
        }


        $t_course_name = $this->input->post('t_course_name');
        $t_purpose = $this->input->post('t_purpose');
        $t_offered_by = $this->input->post('t_offered_by');
        $t_cpd_points = $this->input->post('t_cpd_points');
        $t_training_date= $this->input->post('t_training_date');
        
        
        $count = count($this->input->post('t_course_name'));
        $employee_job_traning = array();
        for ($i = 0; $i < $count; $i++) {

            $employee_job_traning[$i] = array(
                'employee_id' => $id,
                'course_name' => $t_course_name[$i],
                'purpose' => $t_purpose[$i],
                'offered_by' => $t_offered_by[$i],
                'cpd_points' => $t_cpd_points[$i],
                'training_date' => $t_training_date[$i],
            );
        }

        $pensionPlan = $this->input->post('pensionPlan');
        $i_pension_plan = $this->input->post('i_pension_plan');
       
        $i_pension_date_joined = $this->input->post('i_pension_date_joined');
       
        
        $count = count($this->input->post('i_pension_plan'));
        $employee_pension_plan = array();
        for ($i = 0; $i < $count; $i++) {
            $employee_pension_plan[$i] = array(
                'employee_id' => $id,
                'pension_plan_status' => $pensionPlan,
                'pension_plan' => $i_pension_plan[$i],
                'pension_join_date' => $i_pension_date_joined[$i],
            );
        }
        $medicalPlan = $this->input->post('medicalPlan');
        $i_medical_plan = $this->input->post('i_medical_plan');
       
         $i_medical_date_Joined = $this->input->post('i_medical_date_Joined');
       
        $count = count($this->input->post('i_medical_plan'));
        $employee_medical_plan = array();
        for ($i = 0; $i < $count; $i++) {
            $employee_medical_plan[$i] = array(
                'employee_id' => $id,
                'medical_status' => $medicalPlan,
                'medical_plan' => $i_medical_plan[$i],
                'medical_paln_joined' => $i_medical_date_Joined[$i],
            );
        }
      if ($this->userdetails_model->updateUserdetails($data_insert, $employee_job_details, $employee_job_traning, $employee_pension_plan, $employee_medical_plan)) {
           $success_msg1 = 'Userdetails Updated successfully.';
            $user_message1 = array(
                'success_user' => $success_msg1
            );
            if(!empty($_FILES["user_image"]['name'])){
                if(!empty($prev_profilepic)){
                unlink(realpath("uploads/user").'/'.$prev_profilepic);
                }
            $upload_file = $this->do_upload('user_image',$id);
        if (@$upload_file['error']) {
             $user_message1 = array(
                'success_user' => $upload_file['error']
            );
            $this->session->set_userdata($user_message1); 
           redirect(site_url("userdetails/userdetails_list"), 'refresh');
        } else {
            $profilepic['profilepic'] = $upload_file['upload_data']['file_name'];
            
            $this->userdetails_model->updateEmpProfilePic($profilepic,$id);
        }
            }
            $this->session->set_userdata($user_message1); 
        } else {
            $success_msg1 = 'A EmailID or   Employee ID  with the specified name already exists.';
            $user_message1 = array(
                'success_user' => $success_msg1
            );
            $this->session->set_userdata($user_message1); 
        
        }
      redirect('/userdetails/userdetails_list', 'refresh'); 
    }

    function delete_userdetails() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $userdetails_id = $this->input->post('empId');
		$user_info = $this->userdetails_model->listUser($userdetails_id);
        //echo "<pre>";
        //print_r($userdetails_id); 
        if ($this->userdetails_model->deleteUserdetails($userdetails_id)) {
			
			$this->load->model('dms_model');
				// code for DMS 
            $USR_ID= $user_info[0]->empId;
            
            $this->dms_model->deleteDMSUser($USR_ID);
			// end
            echo '{ "status" : "SUCCESS" , "message" : "Userdetails deleted successfully. "}';
        } else {
            echo '{ "status" : "FAILED" , "message" : "You can not delete a userdetails." }';
        }
    }

    function userdetails_list() {
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['userdetails_detail'] = $this->userdetails_model->listUserdetails();
        $data['page_url'] = 'userdetails_content';
        $this->load->view('dashboard_page', $data);
    }

    function download_pdf($employee_id){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $data = array();
        $data['userPrimeryId'] = $all_userdata['userPrimeryId'];
        $getUserPrivileges = $this->common_model->getUserPrivileges($data);
        $data['userPrivileges'] = json_decode($getUserPrivileges->user_privileges);
        $data['employee_presonal_details'] = $this->userdetails_model->listEmployeedetails($employee_id);
        $data['employee_contact_details'] = $this->userdetails_model->listEmployeecontactdetails($employee_id);
        $data['employee_document_details'] = $this->userdetails_model->listEmployeedocumentdetails($employee_id);
        $data['employee_job_details'] = $this->userdetails_model->listEmployeejobdetails($employee_id);
        $data['employee_traning_details'] = $this->userdetails_model->listEmployeetraningdetails($employee_id);
        $data['employee_pension_details'] = $this->userdetails_model->listEmployeePensiondetails($employee_id);
        $data['employee_medical_details'] = $this->userdetails_model->listEmployeeMedicaldetails($employee_id);
        $data['country_name_detail'] = $this->client_model->listCountry($data['employee_presonal_details'][0]->country);
        $data['nationality_detail'] = $this->client_model->listCountry($data['employee_presonal_details'][0]->nationality);
        $data['manager_detail'] = $this->userdetails_model->listManagerdetails($data['employee_presonal_details'][0]->managerId);
        $this->pdf->load_view('employee_pdf_content',$data);
        $this->pdf->render();
        $this->pdf->stream($data['employee_presonal_details'][0]->empName.".pdf");
    }
    
    
    function check_emp_id(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $emp_id = $this->input->post('emp_id');
        $employee_id = '';
        if($this->input->post('employee_id')){
          $employee_id = $this->input->post('employee_id');
        } 
        
        $data = array(
            'emp_id' => trim($emp_id),
            'employee_id' => trim($employee_id)
            
        );
        if ($this->userdetails_model->checkEmpId($data)) {
            
            echo 1;
        } else {
            echo 0;
        }
    }
    
    function check_email_id(){
        if (!$this->session->userdata('logged_in')) {
            redirect(site_url("login"), 'refresh');
        }
        $all_userdata = $this->session->userdata('logged_in');
        $emailId = $this->input->post('emailId');
        $employee_id = '';
        if($this->input->post('employee_id')){
          $employee_id = $this->input->post('employee_id');
        } 
        $data = array(
            'emailId' => trim($emailId),
            'employee_id' => trim($employee_id)
        );
        if ($this->userdetails_model->checkEmailId($data)) {
            
            echo 1;
        } else {
            echo 0;
        }
    }
    
    function do_upload($file_name,$emp_id) {

        $new_name = $_FILES["user_image"]['name'];
        $info = new SplFileInfo($new_name);
        $new_name = 'profilepic_'.$emp_id.'.'.$info->getExtension();
        $config['file_name'] = $new_name;
        $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]) . '/uploads/user/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '100';
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
	 function testUser(){
         $testFolder = new TestFolder();
         $row = 1;
        $a=array();
if (($handle = fopen("employee.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if($row != 1){
            $a[]=$data;
        }
        $row++;
    }
    //fclose($handle);
}
$languages = simplexml_load_file(base_url() . 'xml/employee.xml');
foreach($a as $data){
    $folder_path= EMPLOYEE_FOLDER.'/'.trim($data[2]);
                //echo $testFolder->valid_folder($folder_path);die;
                if ($testFolder->valid_folder($folder_path) == 'PathNotFoundException: ' . $folder_path) {
                    $testFolder->test($folder_path);
                }
    foreach ($languages->mainfolder as $lang) {
                   $folder_path2 = $folder_path . '/' . str_replace(' ', '%20', trim($lang["title"]));
					$f_path2 = $folder_path . '/' . trim($lang["title"]);
                   // $testFolder->test($folder_path2);
                    if ($testFolder->valid_folder($folder_path2) == 'PathNotFoundException: ' . $f_path2) {
        
                    $testFolder->test($f_path2);
                    
             }
                    
                }
}
        
           
    }
    
    
}
