<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  Project Name : Timesheet
  Developed In: Clavis Technologies Pvt Ltd.
  Modification History
  Create Date           Version         Author			Description                                Last modified
  __________	___________	_______________   ________________________________________  ________________________________________
  25-04-2015            1.0             Ajay                 Controller for Crone                        25-04-2015
 */

class Cron_email_notification extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->model('client_model');
        $this->load->model('timesheet_model');
        $this->load->helper(array('common'));
    }

    function expiry_email_notification() {
        // For Director email notification 

        $common = new Common();
        $directorListArray = $this->client_model->listClientDirectorInfo();
        // print_r($directorListArray);
        $now = time(); // or your date as well
        $search_data = array('[client_name]','[director_name]', '[passport_expiry_date]');
        if (!empty($directorListArray)) {
            foreach ($directorListArray as $directorList) {
                $client_name_arr = $this->client_model->listClient($directorList->client_id);
                $client_name = $client_name_arr[0]->client_name;
                $director_name = $directorList->director_name;
                $passport_expiry_date = $directorList->passport_expiry_date;
                if ($passport_expiry_date != '0000-00-00') {
                    $expiry_date = strtotime($passport_expiry_date);
                    $datediff = $now - $expiry_date;
                    $dataDifference = abs(floor($datediff / (60 * 60 * 24)));
                    if ($dataDifference == 30 || $dataDifference == 7) {
                        $replace_data = array(ucfirst($client_name),ucfirst($director_name), $passport_expiry_date);
                        $Sendto = DIRECTOR_NOTIFICATION_EMAIL_ADDRESS;
                        $MailSubject = DIRECTOR_NOTIFICATION_EMAIL_SUBJECT;
                        $email_message = DIRECTOR_NOTIFICATION_EMAIL_MESSAGE;
                        $MailTemplateContents = str_replace($search_data, $replace_data, $email_message);
                        $Status = $common->sendmail($Sendto, $MailSubject, $MailTemplateContents);
                    }
                }
            }
        }
        //mail to
        //mail to shareholder notification
        $shareholdListArray = $this->client_model->listClientShareholderInfoNotification();
        $now = time();  //or your date as well
        $search_data = array('[client_name]','[shareholder_name]', '[passport_expiry_date]');
        if (!empty($shareholdListArray)) {
            foreach ($shareholdListArray as $shareholderList) {
                $client_name_arr = $this->client_model->listClient($shareholderList->client_id);
               $client_name = $client_name_arr[0]->client_name;
                $shareholder_name = $shareholderList->shareholder_name;
                $passport_expiry_date = $shareholderList->passport_expiry_date;
                if ($passport_expiry_date != '0000-00-00') {
                    $your_date = strtotime($passport_expiry_date);
                    $datediff = $now - $your_date;
                    $dataDifference = abs(floor($datediff / (60 * 60 * 24)));
                    if ($dataDifference == 30 || $dataDifference == 7) {
                        $replace_data = array(ucfirst($client_name),ucfirst($shareholder_name), $passport_expiry_date);
                        $Sendto = SHAREHOLDER_NOTIFICATION_EMAIL_ADDRESS;
                        $MailSubject = SHAREHOLDER_NOTIFICATION_EMAIL_SUBJECT;
                        $email_message = SHAREHOLDER_NOTIFICATION_EMAIL_MESSAGE;
                        $MailTemplateContents = str_replace($search_data, $replace_data, $email_message);
                        $Status = $common->sendmail($Sendto, $MailSubject, $MailTemplateContents);
                    }
                }
            }
        }


        //mail to Occupation permit notification
        $occupationListArray = $this->client_model->listClientOccupationInfoNotification();
        $now = time();  //or your date as well
        $search_data = array('[client_name]','[permit_name]', '[permit_date]');
        if (!empty($occupationListArray)) {
            foreach ($occupationListArray as $occupationList) {
                $client_name_arr = $this->client_model->listClient($occupationList->client_id);
                $client_name = $client_name_arr[0]->client_name;
                $investor_permit_date = $occupationList->investor_permit_date;
                $professional_permit_date = $occupationList->professional_permit_date;
                $self_employed_permit_date = $occupationList->self_employed_permit_date;
                $retired_permit_date = $occupationList->retired_permit_date;
                $permanent_residence_permit_date = $occupationList->permanent_residence_permit_date;

                if ($investor_permit_date != '0000-00-00') {
                    $permit_date = strtotime($investor_permit_date);
                    $datediff = $now - $permit_date;
                    $dataDifference = abs(floor($datediff / (60 * 60 * 24)));
                    if ($dataDifference == 30 || $dataDifference == 7) {
                        $replace_data = array(ucfirst($client_name),'Investor permit', $investor_permit_date);
                        $Sendto = OCCUPATION_PERMIT_NOTIFICATION_EMAIL_ADDRESS;
                        $MailSubject = OCCUPATION_PERMIT_NOTIFICATION_EMAIL_SUBJECT;
                        $email_message = OCCUPATION_PERMIT_NOTIFICATION_EMAIL_MESSAGE;
                        $MailTemplateContents = str_replace($search_data, $replace_data, $email_message);
                        $Status = $common->sendmail($Sendto, $MailSubject, $MailTemplateContents);
                    }
                }
                if ($professional_permit_date != '0000-00-00') {
                    $permit_date = strtotime($professional_permit_date);
                    $datediff = $now - $permit_date;
                    $dataDifference = abs(floor($datediff / (60 * 60 * 24)));
                    if ($dataDifference == 30 || $dataDifference == 7) {
                        $replace_data = array(ucfirst($client_name),'Professional permit', $professional_permit_date);
                        $Sendto = OCCUPATION_PERMIT_NOTIFICATION_EMAIL_ADDRESS;
                        $MailSubject = OCCUPATION_PERMIT_NOTIFICATION_EMAIL_SUBJECT;
                        $email_message = OCCUPATION_PERMIT_NOTIFICATION_EMAIL_MESSAGE;
                        $MailTemplateContents = str_replace($search_data, $replace_data, $email_message);
                        $Status = $common->sendmail($Sendto, $MailSubject, $MailTemplateContents);
                    }
                }
                if ($self_employed_permit_date != '0000-00-00') {
                    $permit_date = strtotime($self_employed_permit_date);
                    $datediff = $now - $permit_date;
                    $dataDifference = abs(floor($datediff / (60 * 60 * 24)));
                    if ($dataDifference == 30 || $dataDifference == 7) {
                        $replace_data = array(ucfirst($client_name),'Self employed permit', $self_employed_permit_date);
                        $Sendto = OCCUPATION_PERMIT_NOTIFICATION_EMAIL_ADDRESS;
                        $MailSubject = OCCUPATION_PERMIT_NOTIFICATION_EMAIL_SUBJECT;
                        $email_message = OCCUPATION_PERMIT_NOTIFICATION_EMAIL_MESSAGE;
                        $MailTemplateContents = str_replace($search_data, $replace_data, $email_message);
                        $Status = $common->sendmail($Sendto, $MailSubject, $MailTemplateContents);
                    }
                }
                if ($retired_permit_date != '0000-00-00') {
                    $permit_date = strtotime($retired_permit_date);
                    $datediff = $now - $permit_date;
                    $dataDifference = abs(floor($datediff / (60 * 60 * 24)));
                    if ($dataDifference == 30 || $dataDifference == 7) {
                        $replace_data = array(ucfirst($client_name),'Retired permit', $retired_permit_date);
                        $Sendto = OCCUPATION_PERMIT_NOTIFICATION_EMAIL_ADDRESS;
                        $MailSubject = OCCUPATION_PERMIT_NOTIFICATION_EMAIL_SUBJECT;
                        $email_message = OCCUPATION_PERMIT_NOTIFICATION_EMAIL_MESSAGE;
                        $MailTemplateContents = str_replace($search_data, $replace_data, $email_message);
                        $Status = $common->sendmail($Sendto, $MailSubject, $MailTemplateContents);
                    }
                }
                if ($permanent_residence_permit_date != '0000-00-00') {
                    $permit_date = strtotime($permanent_residence_permit_date);
                    $datediff = $now - $permit_date;
                    $dataDifference = abs(floor($datediff / (60 * 60 * 24)));
                    if ($dataDifference == 30 || $dataDifference == 7) {
                        $replace_data = array(ucfirst($client_name),'Permanent residence', $permanent_residence_permit_date);
                        $Sendto = OCCUPATION_PERMIT_NOTIFICATION_EMAIL_ADDRESS;
                        $MailSubject = OCCUPATION_PERMIT_NOTIFICATION_EMAIL_SUBJECT;
                        $email_message = OCCUPATION_PERMIT_NOTIFICATION_EMAIL_MESSAGE;
                        $MailTemplateContents = str_replace($search_data, $replace_data, $email_message);
                        $Status = $common->sendmail($Sendto, $MailSubject, $MailTemplateContents);
                    }
                }
            }
        }
        /* start Notify when a user has not fill in the timesheet */
        $pending_time_detail = $this->timesheet_model->overdueTimesheetNotification();
        
        if (!empty($pending_time_detail)) {
            foreach ($pending_time_detail as $pending_time) {
                $user_name_arr = $this->userdetails_model->listUser($pending_time->emp_id);
               if(!empty($user_name_arr[0]->managerId)){
                $user_id = $user_name_arr[0]->managerId;
                $manager_name_arr = $this->userdetails_model->listUser(NULL,$user_id);
                $manager_email = $manager_name_arr[0]->emailId;
                $empname = $pending_time->empName;
                $empId = $pending_time->empId;
                $emailId = $pending_time->emailId;
                $pending_count = $pending_time->pending_count;
                $search_data = array('[empname]', '[empId]', '[emailId]', '[pending_count]');
                $replace_data = array(ucfirst($empname), $empId, $emailId, $pending_count);
                $MailSubject = str_replace($search_data, $replace_data, OVERDUE_TIMESHEET_NOTIFICATION_EMAIL_SUBJECT);
                $email_message = OVERDUE_TIMESHEET_NOTIFICATION_EMAIL_MESSAGE;

                $MailTemplateContents = str_replace($search_data, $replace_data, $email_message);
                $Sendto = $manager_email;
                // $common = new Common();
                
                $Status = $common->sendmail($Sendto, $MailSubject, $MailTemplateContents);
                }
                // }
            }
        }

        /* End */

        /* Start One month before to notify for end of probation period. */
        $user_detail = $this->userdetails_model->probationPeriodNotification();
        if (!empty($user_detail)) {
            foreach ($user_detail as $user) {
                $empname = $user['empName'];
                $empId = $user['empId'];
                $emailId = $user['emailId'];
                $search_data = array('[empname]', '[empId]', '[emailId]');
                $replace_data = array(ucfirst($empname), $empId, $emailId);
                $MailSubject = str_replace($search_data, $replace_data, PROBATION_PERIOD_NOTIFICATION_EMAIL_SUBJECT);
                $email_message = PROBATION_PERIOD_NOTIFICATION_EMAIL_MESSAGE;
                $Sendto = PROBATION_PERIOD_NOTIFICATION_EMAIL_ADDRESS;
                $MailTemplateContents = str_replace($search_data, $replace_data, $email_message);
                $Status = $common->sendmail($Sendto, $MailSubject, $MailTemplateContents);
            }
        }
        /* End */
    }

}
