<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* Start SMTP detail edited by ajay*/
define('SMTP_HOST','tls://smtp.googlemail.com');
define('SMTP_PORT',465);


define('SMTP_USER','asclavistech@gmail.com');
define('SMTP_PASSWORD','rzeueyqxdkehlzlo');
define('EMAIL_FROM','asclavistech@gmail.com');
define('EMAIL_FROM_NAME','TimeSheet');
define('RESET_PASSWORD_EMAIL_SUBJECT','Please find your new login details attached!'); 

define('RESET_PASSWORD_EMAIL_MESSAGE','<html>
                <head>
                <title>Your new password!  </title>
                <style>body{font-family:Arial,Helvetica,sans-serif;}</style>
                </head>
                <body>
                <p><b>Please find below your login details for your reference :</b></p>

                <p>Login Username : [email]</p>
                <p>Login Password: [password]</p>

                <p> If you face any issues, please feel free to email us at admin@clavis-tech.com. </p>
                </body>
                </html>'); 
define('CHANGE_PASSWORD_EMAIL_SUBJECT','[empname], your password has been changed !'); 
define('CHANGE_PASSWORD_EMAIL_MESSAGE','<html>
                                                <head>
                                                <title> [empname], your password has been changed !  </title>
                                                <style>body{font-family:Arial,Helvetica,sans-serif;}</style>
                                                </head>
                                                <body>
                                                <p><b>This email is to inform you that your password has been changed recently.</b></p>
                                                <p>If you did not change the password , please contact your system admin immediately.</p>

                                                <p> If you face any issues, please feel free to email us at admin@clavis-tech.com. </p>
                                                </body>
                                                </html>'); 
define('APPLY_LEAVE_EMAIL_SUBJECT','Leave Applied'); 
define('APPLY_LEAVE_EMAIL_MESSAGE','<html>
                                                <head>
                                                <title> [empname], your password has been changed !  </title>
                                                <style>body{font-family:Arial,Helvetica,sans-serif;}</style>
                                                </head>
                                                <body>
                                                <p>Hi,</p> <p>[empname][[empId]] has applied for a leave. 
Please log on to [base_url] and review the leave application.</p>
<p>Following are the applied leave details:</p><p>Leave type: [leave_type]</p><p>From Date:  [from_date]</p>
<p>To Date: [to_date]</p>
<p>Number of days: [number_of_days]</p>
 <p>Reason: [reason]</p>
 <p>Contact details while on leave: [contact_details]</p><p>Regards </p><p>Note:This is an auto-generated email. Please do not reply.</p>
                                                </body>
                                                </html>'); 
define('APPROVED_LEAVE_EMAIL_SUBJECT','Leave Approved'); 
define('APPROVED_LEAVE_EMAIL_MESSAGE','<html>
                                                <head>
                                                <title> [empname], your password has been changed !  </title>
                                                <style>body{font-family:Arial,Helvetica,sans-serif;}</style>
                                                </head>
                                                <body>
                                               <p>Hi [empname][[empId]],</p><p>Your leave application has been accepted.</p>   
<p>Leave type: [leave_type]</p>
<p>From Date: [from_date]</p>   
<p>To Date: [to_date]</p>
<p>Number of days: [number_of_days]</p>
<p>Reason: [reason]</p><p>Regards</p><p>Note:This is an auto-generated email. Please do not reply.</p>
                                                </body>
                                                </html>'); 
define('REJECTION_LEAVE_EMAIL_SUBJECT','Leave Rejection'); 
define('REJECTION_LEAVE_EMAIL_MESSAGE','<html>
                                                <head>
                                                <title> [empname], your password has been changed !  </title>
                                                <style>body{font-family:Arial,Helvetica,sans-serif;}</style>
                                                </head>
                                                <body>
                                                <p>Hi  [empname][[empId]],</p><p>Your leave application has been declined.</p><p>Leave type: [leave_type]</p>
<p>From Date: [from_date]</p>
<p>To Date: [to_date]</p><p>Number of days: [number_of_days]</p><p>Reason: [reason]</p><p>Regards </p><p>Note:This is an auto-generated email. Please do not reply.</p>
                                                </body>
                                                </html>'); 
define('APPROVED_TIMESHEET_EMAIL_SUBJECT','Timesheet Approved'); 
define('APPROVED_TIMESHEET_EMAIL_MESSAGE','<html>
                                                <head>
                                                <title> [empname], your password has been changed !  </title>
                                                <style>body{font-family:Arial,Helvetica,sans-serif;}</style>
                                                </head>
                                                <body>
                                               <p>Hi [empname][[empId]],</p><p>Your timesheet application has been accepted.</p>   

<p>Start Date: [start_date]</p>   
<p>End Date: [end_date]</p>
<p>Reason: [reason_to_reject]</p><p>Regards</p><p>Note:This is an auto-generated email. Please do not reply.</p>
                                                </body>
                                                </html>'); 
define('REJECTION_TIMESHEET_EMAIL_SUBJECT','Timesheet Rejected'); 
define('REJECTION_TIMESHEET_EMAIL_MESSAGE','<html>
                                                <head>
                                                <title> [empname], your password has been changed !  </title>
                                                <style>body{font-family:Arial,Helvetica,sans-serif;}</style>
                                                </head>
                                                <body>
                                                <p>Hi  [empname][[empId]],</p><p>Your timesheet application has been declined.</p><p></p>
<p>Start Date: [start_date]</p>
<p>End Date: [end_date]</p><p>Reason: [reason_to_reject]</p><p>Regards </p><p>Note:This is an auto-generated email. Please do not reply.</p>
                                                </body>
                                                </html>');
define('SUBMITTED_TIMESHEET_EMAIL_SUBJECT','Timesheet Submitted for Approval'); 
define('SUBMITTED_TIMESHEET_EMAIL_MESSAGE','<p>Hi  [empname][[empId]],</p><p>This timesheet application has been submitted by [empname].</p><p></p>
<p>Start Date: [start_date]</p>
<p>End Date: [end_date]</p><p>Regards </p><p>Note:This is an auto-generated email. Please do not reply.</p>
                                                ');

define('DAILY_TIMESHEET_REPORT_ADMIN_EMAIL', 'wasimclavistech@gmail.com');                                                
define('DAILY_TIMESHEET_REPORT_EMAIL_SUBJECT','Daily Timesheet Report Of Employee'); 
define('DAILY_TIMESHEET_REPORT_EMAIL_MESSAGE','<p>Hi, This timesheet application has been added by [empname][[empId]].</p><p></p>
<p>Date: [timesheet_date]</p><p>Start Time: [start_time]</p><p>End Time: [end_time]</p><p>Total Hours: [time_units]</p><p>Total Minutes: [minutes]</p><p>Client Name: [client_name]</p><p>Project Name: [project_name]</p><p>Activity Name: [activity_name]</p><p>Subactivity Name: [subactivity_name]</p><p>Regards </p><p>Note:This is an auto-generated email. Please do not reply.</p> ');                                                
/* End SMTP detail. */
define('EARLIEST_YEAR',2014);
define('REGISTRATION_EMAIL_SUBJECT','Registration Successfully'); 
define('REGISTRATION_SUCCESSFULLY_MESSAGE','<html>
                <head>
                <title>Your Login Details !  </title>
                <style>body{font-family:Arial,Helvetica,sans-serif;}</style>
                </head>
                <body>
                <p><b>Please find below your login details for your reference :</b></p>
                <p>Employee Id : [empId]</p>
                <p>Login Username : [emailId]</p>
                <p>Login Password: [password]</p>

                <p> If you face any issues, please feel free to email us at admin@clavis-tech.com. </p>
                </body>
                </html>'); 

/* DMS folder */
define('DMS_HOST','');
define('DMS_USER','');
define('DMS_PASSWORD','');
define('CLIENT_FOLDER','');
define('EMPLOYEE_FOLDER','');

define('LEAVE_NOTIFICATION_ADMIN_EMAIL','deepanshu.chauhan61@gmail.com'); 
define('LEAVE_NOTIFICATION_EMAIL_SUBJECT','Leave Notification'); 
define('LEAVE_NOTIFICATION_EMAIL_MESSAGE','<p>Hi  Admin,</p><p>This employee [empname][[empId]], has taken advance leave.</p><p></p>
<p>Leave type: [leave_type]</p>
<p>Number of Leave Balance: [balance_leave]</p>
<p>Regards </p><p>Note:This is an auto-generated email. Please do not reply.</p>');
define('DIRECTOR_NOTIFICATION_EMAIL_ADDRESS','deepanshu.chauhan61@gmail.com'); 
define('DIRECTOR_NOTIFICATION_EMAIL_SUBJECT','Director - passport expiry notification'); 
define('DIRECTOR_NOTIFICATION_EMAIL_MESSAGE','<p>Hi Admin,</p><p>The passport will get expired on [passport_expiry_date] for the director [director_name] of client [client_name].</p>
                                                <p>Regards </p>
                                                <p>Note:This is an auto-generated mail. Please do not reply.</p>');  


define('OVERDUE_TIMESHEET_NOTIFICATION_EMAIL_SUBJECT','Overdue Timesheet Notification'); 
define('OVERDUE_TIMESHEET_NOTIFICATION_EMAIL_MESSAGE','<p>Hi Admin,</p><p>[pending_count] timesheet(s) is overdue for the user : </p>
    <p>Employee Id : [empname][[empId]]</p>
                <p>Email Id : [emailId]</p><p></p>

<p>Regards </p><p>Note:This is an auto-generated email. Please do not reply.</p>');
// FOR SHAREHOLDER 
define('SHAREHOLDER_NOTIFICATION_EMAIL_ADDRESS','deepanshu.chauhan61@gmail.com'); 
define('SHAREHOLDER_NOTIFICATION_EMAIL_SUBJECT','Shareholder - passport expiry notification'); 
define('SHAREHOLDER_NOTIFICATION_EMAIL_MESSAGE','<p>Hi Admin,</p><p>The passport will get expired on [passport_expiry_date] for the shareholder [shareholder_name] of client [client_name].</p>
                                                <p>Regards </p>
                                                <p>Note:This is an auto-generated mail. Please do not reply.</p>'); 

// FOR OCCUPATION 

define('OCCUPATION_PERMIT_NOTIFICATION_EMAIL_ADDRESS','deepanshu.chauhan61@gmail.com');  
define('OCCUPATION_PERMIT_NOTIFICATION_EMAIL_SUBJECT','Occupation permit Notification'); 
define('OCCUPATION_PERMIT_NOTIFICATION_EMAIL_MESSAGE','<p>Hi Admin,</p><p>The [permit_name] will get expired on [permit_date] of client [client_name].</p>
                                                <p>Regards </p>
                                                <p>Note:This is an auto-generated mail. Please do not reply.</p>');
define('PROBATION_PERIOD_NOTIFICATION_EMAIL_ADDRESS','deepanshu.chauhan61@gmail.com'); 
define('PROBATION_PERIOD_NOTIFICATION_EMAIL_SUBJECT','Probation period Notification'); 
define("PROBATION_PERIOD_NOTIFICATION_EMAIL_MESSAGE","<p>Hi Admin,</p><p>This user's probation period will be complete on next month.</p>
    <p>Employee Id : [empname][[empId]]</p>
                <p>Email Id : [emailId]</p><p></p>

<p>Regards </p><p>Note:This is an auto-generated email. Please do not reply.</p>");
/* End of file constants.php */
/* Location: ./application/config/constants.php */


// message for add edit delete or some else for db module
define('LICENSE_ADD','License has been added successfully.');
define('LICENSE_EDIT','License has been updated successfully.');
define('LICENSE_DELETE','License has been deleted successfully.');

define('PERMIT_ADD','Permit has been added successfully.');
define('PERMIT_EDIT','Permit has been updated successfully.');
define('PERMIT_DELETE','Permit has been deleted successfully.');

define('BANK_ADD','Bank information has been added successfully.');
define('BANK_EDIT','Bank information has been updated successfully.');
define('BANK_DELETE','Bank information has been deleted successfully.');

define('ACCOUNT_ADD','Account information has been added successfully.');
define('ACCOUNT_EDIT','Account information has been updated successfully.');
define('ACCOUNT_DELETE','Account information has been deleted successfully.');

define('AUDITOR_ADD','Auditor has been added successfully.');
define('AUDITOR_EDIT','Auditor has been updated successfully.');
define('AUDITOR_DELETE','Auditor has been deleted successfully.');

define('TAXTRC_ADD','TAX/TRC has been added successfully.');
define('TAXTRC_EDIT','TAX/TRC has been updated successfully.');
define('TAXTRC_DELETE','TAX/TRC has been deleted successfully.');

define('COMPLIANCE_ADD','Compliance information has been added successfully.');
define('COMPLIANCE_EDIT','Compliance information has been updated successfully.');
define('COMPLIANCE_DELETE','Compliance information has been deleted successfully.');

define('AGREEMENT_ADD','Agreement and contracts information has been added successfully.');
define('AGREEMENT_EDIT','Agreement and contracts information has been updated successfully.');
define('AGREEMENT_DELETE','Agreement and contracts information has been deleted successfully.');


define('CORPORATE_COMPANY_REFRENCE_EDIT','Corporate Data: Company refrence information has been updated successfully.');
define('CORPORATE_PORTFOLIO_EDIT','Corporate Data: Portfolio information has been updated successfully.');
define('CORPORATE_CLIENT_EDIT','Corporate Data: Client information has been updated successfully.');
define('CORPORATE_ACTIVITY_EDIT','Corporate Data: Activity information has been updated successfully.');
define('CORPORATE_ADDRESS_EDIT','Corporate Data: Address information has been updated successfully.');
define('CORPORATE_INTRODUCER_EDIT','Corporate Data: Introducer information has been updated successfully.');

define('DIRECTOR_INDIVIDUAL_ADD',"Director's individual information has been added successfully.");
define('DIRECTOR_INDIVIDUAL_EDIT',"Director's individual information has been updated successfully.");
define('DIRECTOR_INDIVIDUAL_DELETE',"Director's individual information has been deleted successfully.");


define('DIRECTOR_CORPORATE_ADD',"Director's corporate information has been added successfully.");
define('DIRECTOR_CORPORATE_EDIT',"Director's corporate information has been updated successfully.");
define('DIRECTOR_CORPORATE_DELETE',"Director's corporate information has been deleted successfully.");

define('BO_INDIVIDUAL_ADD',"Beneficial owner's individual information has been added successfully.");
define('BO_INDIVIDUAL_EDIT',"Beneficial owner's individual information has been updated successfully.");
define('BO_INDIVIDUAL_DELETE',"Beneficial owner's individual information has been deleted successfully.");


define('BO_CORPORATE_ADD',"Beneficial owner's corporate information has been added successfully.");
define('BO_CORPORATE_EDIT',"Beneficial owner's corporate information has been updated successfully.");
define('BO_CORPORATE_DELETE',"Beneficial owner's corporate information has been deleted successfully.");

define('SHAREHOLDER_CORPORATE_ADD',"Shareholder's  information has been added successfully.");
define('SHAREHOLDER_CORPORATE_EDIT',"Shareholder's  information has been updated successfully.");
define('SHAREHOLDER_CORPORATE_DELETE',"Shareholder's  information has been deleted successfully.");

define('SHAREHOLDER_ALLOTMENT_ADD',"Shareholder's Allotment/Transfers information has been added successfully.");
define('SHAREHOLDER_ALLOTMENT_EDIT',"Shareholder's Allotment/Transfers information has been updated successfully.");
define('SHAREHOLDER_ALLOTMENT_DELETE',"Shareholder's Allotment/Transfers information has been deleted successfully.");

define('SHAREHOLDER_REDEMPTION_BUYBACK_ADD',"Shareholder's Redemption/Buyback information has been added successfully.");
define('SHAREHOLDER_REDEMPTION_BUYBACK_EDIT',"Shareholder's Redemption/Buyback information has been updated successfully.");
define('SHAREHOLDER_REDEMPTION_BUYBACK_DELETE',"Shareholder's Redemption/Buyback information has been deleted successfully.");

define('SHAREHOLDER_REDEMPTION_CAPITAL_EDIT',"Shareholder's Capital Redemption information has been updated successfully.");



define('TRUST_TRUSTINFO_ADD',"Info on Trust has been added successfully.");
define('TRUST_TRUSTINFO_EDIT',"Info on Trust has been updated successfully.");
define('TRUST_TRUSTINFO_DELETE',"Info on Trust has been deleted successfully.");

define('TRUST_BENEFICIARY_ADD',"Beneficiary and Protectors information has been added successfully.");
define('TRUST_BENEFICIARY_EDIT',"Beneficiary and Protectors information has been updated successfully.");
define('TRUST_BENEFICIARY_DELETE',"Beneficiary and Protectors information has been deleted successfully.");

define('SUBSTANCE_ADD',"Substance Conditions Adopted information has been added successfully.");
define('SUBSTANCE_EDIT',"Substance Conditions Adopted information has been updated successfully.");
define('SUBSTANCE_DELETE',"Substance Conditions Adopted information has been deleted successfully.");
define('ADDITIONAL_MAIL_FOR_LEAVE', 'shsatish1987@gmail.com');

define('DIRECTOR_INDIVIDUAL_ADD_KYC',"KYC Director's information has been added successfully.");
define('DIRECTOR_INDIVIDUAL_EDIT_KYC',"KYC Director's information has been updated successfully.");
define('DIRECTOR_INDIVIDUAL_DELETE_KYC',"KYC Director's information has been deleted successfully.");
define('PENDING_TIMESHEET_REJECTED','<html>
                                    <head>
                                    <title>Timesheet Rejec+tion Notification  </title>
                                    <style>body{font-family:Arial,Helvetica,sans-serif;}</style>
                                    </head>
                                    <body>      
                                    <div style="background-color:#fff;padding:3% 8%">
                                    <h2 style="font-size:18px;line-height:24px;color:#245f6f;font-weight:400">Hey EMP_NAME,  </h2>
                                    <p style="font-size:13px;margin-bottom: -10px;">This email is to notify you that your daily timesheet for DATE has been rejected.</p>
                                    <p style="font-size:13px;"> For any issue, feel free to contact your HR/Manager.</p>
                                    </div>
                                    <div style="font-size:13px; background-color:#fff;padding:3% 8%; margin-top: -83px;">
                                    <p style="margin-bottom: -10px;">Clavis Technologies PVT. LTD. </p>
                                    </div> 
                                    </body>
                                    </html>');