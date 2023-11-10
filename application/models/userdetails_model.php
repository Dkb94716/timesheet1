<?php

class Userdetails_model extends CI_Model {
    /*
      Developed In: Clavis Technologies Pvt Ltd.
      Modification History
      Create Date   Author			Description
      __________  _______________  ________________________________________
      03-03-2015     Dablu                   Model for Userdetails
     */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->helper('common');
    }

    function insertUserdetails($data_insert, $employee_job_details, $employee_job_traning, $employee_pension_plan, $employee_medical_plan) {

        if ($this->checkUserdetails($data_insert)) {

            $user_info = array(
                'empName' => $data_insert['empName'],
                'surname' => $data_insert['surname'],
                'other' => $data_insert['other'],
                'dob' => $data_insert['dob'],
                'empId' => $data_insert['empId'],
                'placeOfBirth' => $data_insert['placeOfBirth'],
                'company_id' => $data_insert['company_id'],
                'designation' => $data_insert['designation'],
                'occupation' => $data_insert['occupation'],
                'currentTeamId' => $data_insert['currentTeamId'],
                'city' => $data_insert['city'],
                'deptId' => $data_insert['deptId'],
                'country' => $data_insert['country'],
                'emailId' => $data_insert['emailId'],
                'homePhone' => $data_insert['homePhone'],
                'gender' => $data_insert['gender'],
                'mobile' => $data_insert['mobile'],
                'nationality' => $data_insert['nationality'],
                'usrRoleld' => $data_insert['usrRoleld'],
                'address' => $data_insert['address'],
                'probation_period' => $data_insert['probation_period'],
                'dateOfConfirmation' => $data_insert['dateOfConfirmation'],
                'status' => $data_insert['status'],
                'dateLeft' => $data_insert['dateLeft'],
                'managerId' => $data_insert['managerId'],
                'apply_leave' => $data_insert['apply_leave'],
                'dateJoining' => $data_insert['datejoining'],
                'empPassword' => $data_insert['empPassword'],
                'pension_status' => $data_insert['pension_status'],
                'medical_status' => $data_insert['medical_status'],
                'created_by' => $data_insert['created_by'],
                'created' => $data_insert['created'],
                'hourly_rate'=>$data_insert['hourly_rate']
            );
            $this->db->insert('employee', $user_info);
            $insert_id = $this->db->insert_id();


            #############Employee_contact_details ############################

            $employee_contact = array(
                'employee_id' => $insert_id,
                'name1' => $data_insert['name1'],
                'releationship1' => $data_insert['releationship1'],
                'telephone1' => $data_insert['telephone1'],
                'address1' => $data_insert['address1'],
                'name2' => $data_insert['name2'],
                'releationship2' => $data_insert['releationship2'],
                'telephone2' => $data_insert['telephone2'],
                'address2' => $data_insert['address2'],
                'created_by' => $data_insert['created_by'],
                'created' => $data_insert['created'],);

            $this->db->insert('employee_contact_details', $employee_contact);
            ################## Employee Document ###############################
            $employee_document = array(
                'employee_id' => $insert_id,
                'identity_card' => $data_insert['identity_card'],
                'eds_form' => $data_insert['eds_form'],
                'other_documents' => $data_insert['other_documents'],
                'employee_documentcol' => $data_insert['employee_documentcol'],
                'bank' => $data_insert['bank'],
                'contract' => $data_insert['contract'],
                'driving_licence' => $data_insert['driving_licence'],
                'certificates_memberships' => $data_insert['certificates_memberships'],
                'personal_questionnaires' => $data_insert['personal_questionnaires'],
                'created_by' => $data_insert['created_by'],
                'created' => $data_insert['created'],);
            $this->db->insert('employee_document', $employee_document);
            ////////Employee Job Details....////////////////////

            foreach ($employee_job_details as $employee) {
                $employee_job_details_data = array(
                    'employee_id' => $insert_id,
                    'title' => $employee['title'],
                    'pormotion_date' => (!empty($employee['pormotion_date'])) ? date('Y-m-d', strtotime($employee['pormotion_date'])) : '0000-00-00',
                    'special_remarks' => $employee['special_remarks'],
                    'created_by' => $data_insert['created_by'],
                    'created' => $data_insert['created'],
                );
                $this->db->insert('employee_job_detail', $employee_job_details_data);
            }
            ////////Employee Job Training....////////////////////
            foreach ($employee_job_traning as $employee_training) {
                $employee_job_training_data = array(
                    'employee_id' => $insert_id,
                    'course_name' => $employee_training['course_name'],
                    'purpose' => $employee_training['purpose'],
                    'offered_by' => $employee_training['offered_by'],
                    'cpd_points' => $employee_training['cpd_points'],
                    'training_date' => (!empty($employee_training['training_date'])) ? date('Y-m-d', strtotime($employee_training['training_date'])) : '0000-00-00',
                    'created_by' => $data_insert['created_by'],
                    'created' => $data_insert['created'],
                );
                $this->db->insert('employee_training', $employee_job_training_data);
            }

            ////////Employee Pension Plan....////////////////////
            foreach ($employee_pension_plan as $employee_pension) {
                $employee_pension_plan = array(
                    'employee_id' => $insert_id,
                    'pension_plan' => $employee_pension['pension_plan'],
                    'pension_join_date' => (!empty($employee_pension['pension_join_date'])) ? date('Y-m-d', strtotime($employee_pension['pension_join_date'])) : '0000-00-00',
                    'created_by' => $employee_pension['created_by'],
                    'created' => $employee_pension['created'],
                );
                $this->db->insert('employee_pension_insurance', $employee_pension_plan);
            }

            ////////Employee Medical Plan....////////////////////
            foreach ($employee_medical_plan as $employee_medical) {
                $employee_medical_plan = array(
                    'employee_id' => $insert_id,
                    'medical_plan' => $employee_medical['medical_plan'],
                    'medical_paln_joined' => (!empty($employee_medical['medical_paln_joined'])) ? date('Y-m-d', strtotime($employee_medical['medical_paln_joined'])) : '0000-00-00',
                    'created_by' => $employee_medical['created_by'],
                    'created' => $employee_medical['created'],
                );
                $this->db->insert('employee_medical_insurance', $employee_medical_plan);
            }
            /* Entry in leave_employee_details table for user 
              Added by : Ajay Kumar Gupta */
            $this->db->select('leave_type_id');
            $this->db->from('leave_category');
            $this->db->order_by('leave_type', 'asc');
            $query = $this->db->get();
            $leave_result = $query->result();
            foreach ($leave_result as $leave) {
                $log_data = array();
                $log_data_text = "The No of Days Added on " . date('Y-m-d h:i:s') . " by user( EMPID ) " . $insert_id . " is 0 ";
                array_push($log_data, $log_data_text);
                $leave_employee_details['log_data'] = json_encode($log_data);
                $leave_employee_details['emp_id'] = $insert_id;
                $leave_employee_details['no_of_leaves'] = 0;
                $leave_employee_details['leave_type_id'] = $leave->leave_type_id;
                $leave_employee_details['year'] = date('Y');
                $leave_employee_details['balance_leave'] = 0;
                $this->db->insert('leave_employee_details', $leave_employee_details);
            }
            /* End */

            $user_info['emp_id'] = $insert_id;
            return $user_info;
        } else {

            return false;
        }
    }

    // New function for adding user cost details in table user_cost_details 26-09-2022

    function insertUserCost($cost_details){
        $where = array('user_id'=>$cost_details['user_id'],'hourly_rate'=>$cost_details['hourly_rate']);
        $this->db->select('*');
        $this->db->from('user_cost_details');
        $this->db->where($where);
        $result = $this->db->get();
        if($result->num_rows()>0){
            return false;
        }
        else{
            error_reporting(0);
            $this->db->insert('user_cost_details',$cost_details);
            $cost_id = $this->db->insert_id();
            return $cost_id;
        }
    }

    /** function to update records */
    function updateUserdetails($data_insert, $employee_job_details, $employee_job_traning, $employee_pension_plan, $employee_medical_plan) {

        $user_info = array(
            //'id'=>   $data_insert['id'],
            'empName' => $data_insert['empName'],
            'surname' => $data_insert['surname'],
            'other' => $data_insert['other'],
            'dob' => $data_insert['dob'],
            'empId' => $data_insert['empId'],
            'company_id' => $data_insert['company_id'],
            'placeOfBirth' => $data_insert['placeOfBirth'],
            'designation' => $data_insert['designation'],
            'occupation' => $data_insert['occupation'],
            'currentTeamId' => $data_insert['currentTeamId'],
            'city' => $data_insert['city'],
            'deptId' => $data_insert['deptId'],
            'country' => $data_insert['country'],
            'emailId' => $data_insert['emailId'],
            'homePhone' => $data_insert['homePhone'],
            'gender' => $data_insert['gender'],
            'mobile' => $data_insert['mobile'],
            'nationality' => $data_insert['nationality'],
            'usrRoleld' => $data_insert['usrRoleld'],
            'address' => $data_insert['address'],
            'probation_period' => $data_insert['probation_period'],
            'dateOfConfirmation' => $data_insert['dateOfConfirmation'],
            'status' => $data_insert['status'],
            'dateLeft' => $data_insert['dateLeft'],
            'managerId' => $data_insert['managerId'],
            'apply_leave' => $data_insert['apply_leave'],
            'dateJoining' => $data_insert['datejoining'],
            'pension_status' => $data_insert['pension_status'],
            'medical_status' => $data_insert['medical_status'],
            'hourly_rate' =>$data_insert['hourly_rate']
        );
        // print_r($user_info);die;
        $this->db->where('id', $data_insert['id']);
        $this->db->update('employee', $user_info);


        #############Employee_contact_details ############################
        $this->db->select('*');
        $this->db->from('employee_contact_details');

        $this->db->where('employee_id', $data_insert['id']);

        $query = $this->db->get();
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            $employee_contact = array(
                'name1' => $data_insert['name1'],
                'releationship1' => $data_insert['releationship1'],
                'telephone1' => $data_insert['telephone1'],
                'address1' => $data_insert['address1'],
                'name2' => $data_insert['name2'],
                'releationship2' => $data_insert['releationship2'],
                'telephone2' => $data_insert['telephone2'],
                'address2' => $data_insert['address2'],);
            $this->db->where('employee_id', $data_insert['id']);
            $this->db->update('employee_contact_details', $employee_contact);
        } else {
            $employee_contact = array(
                'employee_id' => $data_insert['id'],
                'name1' => $data_insert['name1'],
                'releationship1' => $data_insert['releationship1'],
                'telephone1' => $data_insert['telephone1'],
                'address1' => $data_insert['address1'],
                'name2' => $data_insert['name2'],
                'releationship2' => $data_insert['releationship2'],
                'telephone2' => $data_insert['telephone2'],
                'address2' => $data_insert['address2']);
            $this->db->insert('employee_contact_details', $employee_contact);
        }
        // echo $this->db->last_query();die;
        #############Employee Document ###############################
        $this->db->select('*');
        $this->db->from('employee_document');

        $this->db->where('employee_id', $data_insert['id']);

        $query = $this->db->get();
        $num_rows = $query->num_rows();
        if ($num_rows > 0) {
            $employee_document = array(
                'identity_card' => $data_insert['identity_card'],
                'eds_form' => $data_insert['eds_form'],
                'other_documents' => $data_insert['other_documents'],
                'employee_documentcol' => $data_insert['employee_documentcol'],
                'bank' => $data_insert['bank'],
                'contract' => $data_insert['contract'],
                'driving_licence' => $data_insert['driving_licence'],
                'certificates_memberships' => $data_insert['certificates_memberships'],
                'personal_questionnaires' => $data_insert['personal_questionnaires'],);
            $this->db->where('employee_id', $data_insert['id']);
            $this->db->update('employee_document', $employee_document);
        } else {

            $employee_document = array(
                'employee_id' => $data_insert['id'],
                'identity_card' => $data_insert['identity_card'],
                'eds_form' => $data_insert['eds_form'],
                'other_documents' => $data_insert['other_documents'],
                'employee_documentcol' => $data_insert['employee_documentcol'],
                'bank' => $data_insert['bank'],
                'contract' => $data_insert['contract'],
                'driving_licence' => $data_insert['driving_licence'],
                'certificates_memberships' => $data_insert['certificates_memberships'],
                'personal_questionnaires' => $data_insert['personal_questionnaires']);
            $this->db->insert('employee_document', $employee_document);
        }

        if (!empty($employee_job_details)) {
            $this->db->where('employee_id', $data_insert['id']);
            $this->db->delete('employee_job_detail');
            foreach ($employee_job_details as $employee) {
                $employee_job_details_data = array(
                    'employee_id' => $data_insert['id'],
                    'title' => $employee['title'],
                    'pormotion_date' => (!empty($employee['pormotion_date'])) ? date('Y-m-d', strtotime($employee['pormotion_date'])) : '0000-00-00',
                    'special_remarks' => $employee['special_remarks'],
                );
                $this->db->insert('employee_job_detail', $employee_job_details_data);
            }
        }
        if (!empty($employee_job_traning)) {
            $this->db->where('employee_id', $data_insert['id']);
            $this->db->delete('employee_training');
            ////////Employee Job Training....////////////////////
            foreach ($employee_job_traning as $employee_training) {
                $employee_job_training_data = array(
                    'employee_id' => $data_insert['id'],
                    'course_name' => $employee_training['course_name'],
                    'purpose' => $employee_training['purpose'],
                    'offered_by' => $employee_training['offered_by'],
                    'cpd_points' => $employee_training['cpd_points'],
                    'training_date' => (!empty($employee_training['training_date'])) ? date('Y-m-d', strtotime($employee_training['training_date'])) : '0000-00-00',
                );
                //$this->db->where('employee_id', $data_insert['id']);
                // $this->db->update('employee_training',$employee_job_training_data);
                $this->db->insert('employee_training', $employee_job_training_data);
            }
        }


        ////////Employee Pension Plan....////////////////////
        if (!empty($employee_pension_plan)) {
            $this->db->where('employee_id', $data_insert['id']);
            $this->db->delete('employee_pension_insurance');
            foreach ($employee_pension_plan as $employee_pension) {
                $employee_pension_plan = array(
                    'employee_id' => $data_insert['id'],
                    'pension_plan' => $employee_pension['pension_plan'],
                    'pension_join_date' => (!empty($employee_pension['pension_join_date'])) ? date('Y-m-d', strtotime($employee_pension['pension_join_date'])) : '0000-00-00',
                );
                // $this->db->where('employee_id', $data_insert['id']);
                //$this->db->update('employee_pension_insurance',$employee_pension_plan);
                $this->db->insert('employee_pension_insurance', $employee_pension_plan);
            }
        }

        ////////Employee Medical Plan....////////////////////
        if (!empty($employee_medical_plan)) {
            $this->db->where('employee_id', $data_insert['id']);
            $this->db->delete('employee_medical_insurance');
            foreach ($employee_medical_plan as $employee_medical) {
                $employee_medical_plan = array(
                    'employee_id' => $data_insert['id'],
                    'medical_plan' => $employee_medical['medical_plan'],
                    'medical_paln_joined' => (!empty($employee_medical['medical_paln_joined'])) ? date('Y-m-d', strtotime($employee_medical['medical_paln_joined'])) : '0000-00-00',
                );

                // $this->db->where('employee_id', $data_insert['id']);
                // $this->db->update('employee_medical_insurance',$employee_medical_plan);
                $this->db->insert('employee_medical_insurance', $employee_medical_plan);
            }
        }

        return $user_info;
    }

    function deleteUserdetails($userdetails_id) {

        $this->db->where("id", $userdetails_id);
        $this->db->delete("employee");
        //echo  $this->db->last_query();
        return true;
    }

    function checkUserdetails($data_insert) {
        $this->db->select('*');
        $this->db->from('employee');
        if (!empty($data['employee_id'])) {

            $this->db->where_not_in('id', $data_insert['id']);
        }
        $this->db->where('empId', $data_insert['empId']);
        $this->db->or_where('emailId', $data_insert['emailId']);
        $query = $this->db->get();
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            return false;
        } else {
            return true;
        }
    }

    function listUserdetails($employee_id = NULL) {
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->join('team', 'team.team_id = employee.currentTeamId', 'left');
        $this->db->join('department', 'department.department_id=employee.deptId', 'left');
        $this->db->join('user_role', 'user_role.role_id=employee.usrRoleld', 'left');
        $this->db->where_not_in('employee.usrRoleld', 1);
        $this->db->order_by('empName', 'asc');
        if (!empty($employee_id)) {
            $this->db->where('employee.id', $employee_id);
        }
        $query = $this->db->get();
        $result = $query->result();
        // echo  $this->db->last_query(); die;
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }

    function listManagerdetails($employee_id = NULL) {
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where_not_in('employee.usrRoleld', 1);
        $this->db->order_by('empName', 'asc');
        if (!empty($employee_id)) {
            $this->db->where_not_in('id', $employee_id);
        }
        $query = $this->db->get();
        $result = $query->result();
        // echo  $this->db->last_query(); die;
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }

    function listEmployeedetails($employee_id = NULL) {
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->join('team', 'team.team_id = employee.currentTeamId', 'left');
        $this->db->join('department', 'department.department_id=employee.deptId', 'left');
        $this->db->join('user_role', 'user_role.role_id=employee.usrRoleld', 'left');
        $this->db->where_not_in('employee.usrRoleld', 1);
        $this->db->order_by('empName', 'asc');
        if (!empty($employee_id)) {
            $this->db->where('id', $employee_id);
        }
        $query = $this->db->get();
        $result = $query->result();
        // echo  $this->db->last_query(); die;
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }

    function listEmployeecontactdetails($employee_id = NULL) {
        $this->db->select('*');
        $this->db->from('employee_contact_details');
        // $this->db->order_by('id', 'asc');
        if (!empty($employee_id)) {
            $this->db->where('employee_id', $employee_id);
        }
        $query = $this->db->get();
        $result = $query->result();
        // echo  $this->db->last_query(); die;
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }

    function listEmployeedocumentdetails($employee_id = NULL) {
        $this->db->select('*');
        $this->db->from('employee_document');
        // $this->db->order_by('id', 'asc');
        if (!empty($employee_id)) {
            $this->db->where('employee_id', $employee_id);
        }
        $query = $this->db->get();
        $result = $query->result();
        // echo  $this->db->last_query(); die;
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }

    function listEmployeejobdetails($employee_id = NULL) {
        $this->db->select('*');
        $this->db->from('employee_job_detail');
        if (!empty($employee_id)) {
            $this->db->where('employee_id', $employee_id);
        }
        $query = $this->db->get();
        $result = $query->result();
        // echo  $this->db->last_query(); die;
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }

    function listEmployeetraningdetails($employee_id = NULL) {
        $this->db->select('*');
        $this->db->from('employee_training');
        if (!empty($employee_id)) {
            $this->db->where('employee_id', $employee_id);
        }
        $query = $this->db->get();
        $result = $query->result();
        // echo  $this->db->last_query(); die;
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }

    function listEmployeePensiondetails($employee_id = NULL) {
        $this->db->select('*');
        $this->db->from('employee_pension_insurance');
        if (!empty($employee_id)) {
            $this->db->where('employee_id', $employee_id);
        }
        $query = $this->db->get();
        $result = $query->result();
        // echo  $this->db->last_query(); die;
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }

    function listEmployeeMedicaldetails($employee_id = NULL) {
        $this->db->select('*');
        $this->db->from('employee_medical_insurance');
        if (!empty($employee_id)) {
            $this->db->where('employee_id', $employee_id);
        }
        $query = $this->db->get();
        $result = $query->result();
        // echo  $this->db->last_query(); die;
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }

    function listUser($emp_id = NULL, $managerId = NULL) {
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where_not_in('employee.usrRoleld', 1);

        if (!empty($emp_id)) {
            $this->db->where('id', $emp_id);
        }
        if (!empty($managerId)) {
            $this->db->where('id', $managerId);
        }
        $this->db->order_by('empName', 'asc');
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }

    function checkEmpId($data) {
        $this->db->select('*');
        $this->db->from('employee');

        $this->db->where('empId', $data['emp_id']);
        if (!empty($data['employee_id'])) {

            $this->db->where_not_in('id', $data['employee_id']);
        }
        $query = $this->db->get();
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {

            return false;
        } else {
            return true;
        }
    }

    function checkEmailId($data) {
        $this->db->select('*');
        $this->db->from('employee');

        $this->db->where('emailId', $data['emailId']);
        if (!empty($data['employee_id'])) {

            $this->db->where_not_in('id', $data['employee_id']);
        }
        $query = $this->db->get();
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {

            return false;
        } else {
            return true;
        }
    }

  
  
    function updateEmpProfilePic($data, $emp_id) {

        $this->db->where('id', $emp_id);
        $this->db->update('employee', $data);

        return $emp_id;
    }

    function probationPeriodNotification() {
        $user_detail = $this->listUser();
        $emp_info = new ArrayObject();
        foreach ($user_detail as $user) {
            if ($user->dateOfConfirmation != '0000-00-00') {
                $dateOfConfirmation = date("Y-m-d", strtotime("-1 month", strtotime($user->dateOfConfirmation)));
                //echo $dateOfConfirmation.'<br/>';
                //echo date("Y-m-d").'<br/>';
                if ($dateOfConfirmation == date("Y-m-d")) {
                    
                    $emp_info->append(array(
                        'empId' => $user->empId,
                        'empName' => $user->empName,
                        'emailId' => $user->emailId
                    ));
                }
            } elseif (($user->dateJoining != '0000-00-00') && (!empty($user->probation_period))) {
                $probation_period = $user->probation_period;
                $date_joining = $user->dateJoining;
                $d1 = new DateTime($user->dateJoining);
                $d2 = new DateTime(date("Y-m-d"));
                $datediff = $d1->diff($d2)->m;

                //$date_conf = date('Y-m-d', strtotime(date("Y-m-d", strtotime($date_joining)) . " +$probation_period month"));
                // echo $datediff-1;
                //echo $probation_period;
                if ($datediff == $probation_period - 1) {
                    $emp_info->append(array(
                        'empId' => $user->empId,
                        'empName' => $user->empName,
                        'emailId' => $user->emailId
                    ));
                }
            }
        }


        //echo count($emp_info);die;
        if (count($emp_info) == 0) {
            return false;
        } else {
            return $emp_info;
        }
    }

}
