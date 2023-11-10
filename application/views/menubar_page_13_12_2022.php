<?php
//echo "<pre>";

$session_val = $this->session->all_userdata();
// client/client_detail
$controller = $this->uri->segment(2);
$db_controller = $this->uri->segment(3);
$database = '';
$company = '';
$client_list = '';
$client_detail = '';
$project_list = '';
$project_list_com="";

$project_assign_user_list="";

$activity_list = '';
$subactivity_list = '';
$task_list = '';
$team_list = '';
$department_list = '';
$userdetails_list = '';
$report_list = '';
$user_role_list = '';
$list_user_role = '';
$list_user_privileges = '';
$client_report = '';
$holiday_list = '';
$leave = '';
$in = '';
$leave_type_list = '';
$view_employee_leave = '';
$manage_employee_leave = '';
$apply_leave1 = '';
$time_list = '';
$timesheet = '';
$timesheet_in = '';
$viewtimesheet = '';
if ($db_controller == "database") {
    $database = "active";
}

if ($controller == "company_list") {
    $company = "active";
} elseif ($controller == "client_list") {
    $client_list = "active";
} 


elseif ($controller == "project_list") {
    $project_list = "active";
} 

elseif ($controller == "project_list_com") {
    $project_list_com = "active";
}

elseif ($controller == "project_list_com") {
    $project_list_com = "active";
}

elseif ($controller == "activity_list") {
    $activity_list = "active";
} elseif ($controller == "subactivity_list") {
    $subactivity_list = "active";
} elseif ($controller == "task_list") {
    $task_list = "active";
} elseif ($controller == "team_list") {
    $team_list = "active";
} elseif ($controller == "department_list") {
    $department_list = "active";
} elseif ($controller == "userdetails_list") {
    $userdetails_list = "active";
} elseif ($controller == "add_user") {
    $userdetails_list = "active";
} elseif ($controller == "edit_user") {
    $userdetails_list = "active";
} elseif ($controller == "list_user_role") {
    $list_user_role = "active";
} elseif ($controller == "list_user_privileges") {
    $list_user_role = "active";
} elseif ($controller == "client_report") {
    $client_report = "active";
} elseif ($controller == "client_detail") {
    $database = "active";
} elseif ($controller == "holiday_list") {
    $holiday_list = "active";
    $leave = "active";
    $in = "in";
} elseif ($controller == "leave_type_list") {
    $leave_type_list = "active";
    $leave = "active";
    $in = "in";
} elseif ($controller == "view_employee_leave") {
    $view_employee_leave = "active";
    $leave = "active";
    $in = "in";
} elseif ($controller == "manage_employee_leave") {
    if (!empty($_GET['m'])) {
        $manage_employee_leave = "active";
        $leave = "active";
        $in = "in";
    } else {
        $view_employee_leave = "active";
        $leave = "active";
        $in = "in";
    }
} elseif ($controller == "apply_leave") {
    $apply_leave1 = "active";
    $leave = "active";
    $in = "in";
} elseif ($controller == "time_list") {
    $time_list = "active";
    $timesheet = "active";
    $timesheet_in = "in";
} elseif ($controller == "timesheet_report") {
    $report_list = "active";
} elseif ($controller == "view_time_list") {

    if (isset($_GET['t'])) {
        $viewtimesheet = "active";
        $timesheet = "active";
        $timesheet_in = "in";
    } else {
        $time_list = "active";
        $timesheet = "active";
        $timesheet_in = "in";
    }
}

$userPrimeryId;
$page_last = 'user_role/list_user_role';

$arr_left_company = $userPrivileges->administration_control->company;
$arr_left_clients = $userPrivileges->administration_control->clients;
$arr_left_projects = $userPrivileges->administration_control->projects;
$arr_left_activity = $userPrivileges->administration_control->activity;
//$arr_left_subactivity=$userPrivileges->administration_control->subactivity;

$arr_left_task = $userPrivileges->administration_control->task;
$arr_left_team = $userPrivileges->administration_control->team;
$arr_left_department = $userPrivileges->administration_control->department;
$arr_left_user = $userPrivileges->administration_control->user;
$arr_left_report = $userPrivileges->administration_control->report;
$arr_left_user_role = $userPrivileges->administration_control->user_role;
$arr_left_database = $userPrivileges->client_database->database;
$arr_left_client = $userPrivileges->client_database->client;
$arr_left_client_report = $userPrivileges->client_database->client_report;

$arr_left_accounts = $userPrivileges->client_database->accounts;
$arr_left_director = $userPrivileges->client_database->director;
$arr_left_shareholder = $userPrivileges->client_database->shareholder;
$arr_left_beneficial = $userPrivileges->client_database->beneficial;
$arr_left_bank = $userPrivileges->client_database->bank;
$arr_left_compliance = $userPrivileges->client_database->compliance;
$arr_left_substance = $userPrivileges->client_database->substance;
$arr_left_occupation = $userPrivileges->client_database->occupation;
$arr_left_setholidaylist = $userPrivileges->leave_management->setholidaylist;
$arr_left_setleaves = $userPrivileges->leave_management->setleaves;
$arr_left_manageleave = $userPrivileges->leave_management->manageleave;
$arr_left_applyleave = $userPrivileges->leave_management->applyleave;
$arr_left_manage_timesheet = $userPrivileges->timesheet->managetimesheet;
$arr_left_timesheet = $userPrivileges->timesheet->timesheet_status;
$arr_left_dms = @$userPrivileges->dms->dms;
$all_userdata = $this->session->userdata('logged_in');
$apply_leave = false;
$row_date = $this->common_model->listDateofConf($all_userdata['userPrimeryId']);

if ($arr_left_applyleave->View == 1) {
    
    if ((@$row_date[0]->dateOfConfirmation <= date('Y-m-d')) && (@$row_date[0]->dateOfConfirmation != '0000-00-00')) {
        $apply_leave = true;
    } elseif (@$row_date[0]->apply_leave == '1') {
        $apply_leave = true;
    } elseif (!empty($row_date[0]->probation_period) && ($row_date[0]->dateJoining != '0000-00-00')) {
        $probation_period = $row_date[0]->probation_period;
        $date_joining = $row_date[0]->dateJoining;
        $date_conf = date('Y-m-d', strtotime(date("Y-m-d", strtotime($date_joining)) . " +$probation_period month"));
        $no_of_month = intval($row_date[0]->no_of_days);
        $datediff = strtotime($date_conf) - strtotime($date_joining);
         $num_days = floor($datediff / (60 * 60 * 24));
        if ($no_of_month >= $num_days) {
            $apply_leave = true;
        } else {
            $apply_leave = false;
        }
    }
}
?>


<div id="menu" class="hidden-print hidden-xs">
    <div id="sidebar-fusion-wrapper">

        <?php //if ($userPrimeryId != 1) { ?>
            <ul class="menu list-unstyled" style="top:80px;">

                <?php if ($arr_left_company->View == 1 || $arr_left_company->Add == 1 || $arr_left_company->Edit == 1 || $arr_left_company->Delete == 1) { ?>
                    <li class="<?php echo $company; ?>" >
                        <a href="<?php echo base_url(); ?>company/company_list" class="no-ajaxify">
                            <i class="fa fa-fw icon-building"></i>
                            <span>Company</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($arr_left_clients->View == 1 || $arr_left_clients->Add == 1 || $arr_left_clients->Edit == 1 || $arr_left_clients->Delete == 1) { ?>
                    <li class="<?php if ($db_controller != "database") { ?> <?php echo $client_list; ?> <?php } ?>">
                        <a href="<?php echo base_url(); ?>client/client_list" class="no-ajaxify">
                            <i class="fa fa-fw icon-worldwide"></i>
                            <span>Clients</span>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($arr_left_projects->View == 1 || $arr_left_projects->Add == 1 || $arr_left_projects->Edit == 1 || $arr_left_projects->Delete == 1) { ?>
                    <li class="<?php echo $project_list; ?>">
                        <a href="<?php echo base_url(); ?>project/project_list" class="no-ajaxify">
                            <i class="fa fa-fw  icon-categories"></i>
                            <span>Projects</span>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($arr_left_projects->View == 1 || $arr_left_projects->Add == 1 || $arr_left_projects->Edit == 1 || $arr_left_projects->Delete == 1) { ?>
                    <li class="<?php echo $project_list_com; ?>">
                        <a href="<?php echo base_url(); ?>project/project_list_com" class="no-ajaxify">
                            <i class="fa fa-fw  icon-categories"></i>
                            <span>Completed Projects</span>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($arr_left_projects->View == 1 || $arr_left_projects->Add == 1 || $arr_left_projects->Edit == 1 || $arr_left_projects->Delete == 1) { ?>
                    <li class="<?php echo $project_assign_user_list; ?>">
                        <a href="<?php echo base_url(); ?>project/project_assign_user_list" class="no-ajaxify">
                            <i class="fa fa-fw  icon-categories"></i>
                            <span>Projects Users</span>
                        </a>
                    </li>
                <?php } ?>


                <?php if ($arr_left_activity->View == 1 || $arr_left_activity->Add == 1 || $arr_left_activity->Edit == 1 || $arr_left_activity->Delete == 1) { ?>
                    <li class="<?php echo $activity_list; ?>">
                        <a href="<?php echo base_url(); ?>activity/activity_list" class="no-ajaxify">
                            <i class="fa fa-fw icon-document-bar"></i>
                            <span>Activity</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($arr_left_activity->View == 1 || $arr_left_activity->Add == 1 || $arr_left_activity->Edit == 1 || $arr_left_activity->Delete == 1) { ?>
                    <li class="<?php echo $subactivity_list; ?>">
                        <a href="<?php echo base_url(); ?>subactivity/subactivity_list" class="no-ajaxify">
                            <i class="fa fa-fw icon-document-sub"></i>
                            <span>Sub-Activity</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($arr_left_task->View == 1 || $arr_left_task->Add == 1 || $arr_left_task->Edit == 1 || $arr_left_task->Delete == 1) { ?>   
                    <li class="<?php echo $task_list ?>">
                        <a href="<?php echo base_url(); ?>task/task_list" class="no-ajaxify">
                            <i class="fa fa-fw  icon-compose"></i>
                            <span>Task</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($arr_left_team->View == 1 || $arr_left_team->Add == 1 || $arr_left_team->Edit == 1 || $arr_left_team->Delete == 1) { ?>   
                    <li class="<?php echo $team_list ?> ">
                        <a href="<?php echo base_url() ?>team/team_list" class="no-ajaxify">
                            <i class="fa fa-fw  icon-group"></i>
                            <span>Team</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($arr_left_department->View == 1 || $arr_left_department->Add == 1 || $arr_left_department->Edit == 1 || $arr_left_department->Delete == 1) { ?>   
                    <li class="<?php echo $department_list; ?>">
                        <a href="<?php echo base_url() ?>department/department_list" class="no-ajaxify">
                            <i class="fa fa-fw icon-book-shelf"></i>
                            <span>Department</span>
                        </a>
                    </li>
                <?php } ?> 
                <?php if ($arr_left_user->View == 1 || $arr_left_user->Add == 1 || $arr_left_user->Edit == 1 || $arr_left_user->Delete == 1 || $arr_left_user->user_pdf == 1) { ?>          
                    <li class="<?php echo $userdetails_list; ?>">
                        <a href="<?php echo base_url() ?>userdetails/userdetails_list" class="no-ajaxify">
                            <i class="fa fa-fw icon-user-2"></i>
                            <span>User</span>
                        </a>
                    </li>
                <?php } ?>  
                <?php if ($arr_left_report->View == 1 || $arr_left_report->PrintReport == 1 || $arr_left_report->ExportExcel == 1) { ?>
                    <li class="<?php echo $report_list; ?>">
                        <a href="<?php echo base_url() ?>report/timesheet_report" class="no-ajaxify">
                            <i class="fa fa-fw icon-graph-up-1"></i>
                            <span>Report</span>
                        </a>
                    </li>
                <?php } ?>



                <?php if ($arr_left_database->download_pdf == 1 || $arr_left_database->excel_export == 1 || $arr_left_database->view_edit_details == 1) { ?>
                    <li class="<?php echo $database ?>">
                        <a href="<?php echo base_url(); ?>client/client_list/database" class="no-ajaxify">
                            <i class="fa fa-cloud"></i>
                            <span>Database</span>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($arr_left_client_report->View == 1 || $arr_left_client_report->Print == 1 || $arr_left_client_report->ExportExcel == 1) { ?>
                    <li class="<?php echo $client_report ?>">
                        <a href="<?php echo base_url(); ?>client/client_report" class="no-ajaxify">
                            <i class="fa fa-fw icon-graph-up-1"></i>
                            <span>Client Report</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ((@$arr_left_setholidaylist->View == 1 || @$arr_left_setholidaylist->Add == 1 || @$arr_left_setholidaylist->Edit == 1 || @$arr_left_setholidaylist->Delete == 1) || (@$arr_left_setleaves->View == 1 || @$arr_left_setleaves->Add == 1 || @$arr_left_setleaves->Edit == 1 || @$arr_left_setleaves->Delete == 1|| $arr_left_setleaves->Grant == 1|| $arr_left_setleaves->Forward == 1) || (@$arr_left_manageleave->View == 1 || @$arr_left_manageleave->Leave_PDF == 1 ) || (@$arr_left_applyleave->View == 1)) { ?>
                    <li class="hasSubmenu <?php echo $leave ?>">
                        <a href="#menu-c837feb8ef90b308bb14f1f27d024bb8312" data-toggle="collapse">
                            <i class="fa fa-briefcase"></i>
                            <span>Leave</span>
                        </a>
                        <ul class="collapse <?php echo $in ?>" id="menu-c837feb8ef90b308bb14f1f27d024bb8312">
                            <?php if ($arr_left_setholidaylist->View == 1 || $arr_left_setholidaylist->Add == 1 || $arr_left_setholidaylist->Edit == 1 || $arr_left_setholidaylist->Delete == 1) { ?>
                                <li class="<?php echo $holiday_list ?>">
                                    <a href="<?php echo base_url(); ?>holiday/holiday_list" class="no-ajaxify">
                                        <i class="fa fa-circle-o"></i>
                                        <span>Holiday List</span>
                                    </a>
                                </li>
                            <?php } ?>      
                            <?php if ($arr_left_setleaves->View == 1 || $arr_left_setleaves->Add == 1 || $arr_left_setleaves->Edit == 1 || $arr_left_setleaves->Delete == 1|| $arr_left_setleaves->Grant == 1|| $arr_left_setleaves->Forward == 1) { ?>
                                <li class="<?php echo $leave_type_list; ?>">
                                    <a href="<?php echo base_url(); ?>leave/leave_type_list" class="no-ajaxify">
                                        <i class="fa fa-circle-o"></i>
                                        <span>Leave Type</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if ($arr_left_manageleave->View == 1 || $arr_left_manageleave->Leave_PDF == 1) { ?>
                                <li class="<?php echo $view_employee_leave; ?>">
                                    <a href="<?php echo base_url(); ?>employee_leave/view_employee_leave" class="no-ajaxify">
                                        <i class="fa fa-circle-o"></i>
                                        <span>Manage Leave</span>
                                    </a>
                                </li>
                            <?php } ?>

                            <?php if ($apply_leave == true) { ?>

                                <li class="<?php echo $manage_employee_leave; ?> ">
                                    <a href="<?php echo base_url(); ?>employee_leave/manage_employee_leave/<?php echo $userPrimeryId . '/' . date('Y'); ?>?m=1" class="no-ajaxify">
                                        <i class="fa fa-circle-o"></i>
                                        <span>My Leave</span>
                                    </a>
                                </li>

                                <li class="<?php echo $apply_leave1 ?>">
                                    <a href="<?php echo base_url(); ?>employee_leave/apply_leave" class="no-ajaxify">
                                        <i class="fa fa-circle-o"></i>
                                        <span>Apply Leave</span>
                                    </a>
                                </li>
                            <?php } ?>

                        </ul>
                    </li>
                <?php } ?>

                <?php if (($arr_left_manage_timesheet->View == 1 || $arr_left_manage_timesheet->weekend_submission == 1) || ($arr_left_timesheet->View == 1 )) { ?>

                    <li class="hasSubmenu <?php echo $timesheet; ?>">
                        <a href="#menu-timesheet" data-toggle="collapse">
                            <i class="fa fa-clock-o"></i>
                            <span>Timesheet</span>
                        </a>
                        <ul class="collapse <?php echo $timesheet_in ?>" id="menu-timesheet">


                            <?php if ($arr_left_manage_timesheet->View == 1  || $arr_left_manage_timesheet->weekend_submission == 1) { ?>
                                <li class="<?php echo $time_list; ?>">
                                    <a href="<?php echo base_url(); ?>timesheet/time_list" class="no-ajaxify">
                                        <i class="fa fa-circle-o"></i>
                                        <span>Manage Timesheet</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if ($arr_left_timesheet->View == 1) { ?>
                                <li class="<?php echo $viewtimesheet; ?>">
                                    <a href="<?php echo base_url(); ?>timesheet/view_time_list/<?php echo $userPrimeryId; ?>/<?php echo date("Y-m-d", strtotime('last Sunday', strtotime(date('Y-m-d')))); ?>/<?php echo date("Y-m-d", strtotime('saturday this week')); ?>?t=1" class="no-ajaxify">
                                        <i class="fa fa-circle-o"></i>
                                        <span>Timesheet</span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($arr_left_user_role->View == 1 || $arr_left_user_role->Add == 1 || $arr_left_user_role->Edit == 1 || $arr_left_user_role->Delete == 1 || $userPrivileges->administration_control->user_role->Privileges == 1) { ?>
                    <li class="<?php echo $list_user_role ?>">
                        <a href="<?php echo base_url(); ?>user_role/list_user_role" class="index">
                            <i class="fa fa-user"></i>
                            <span>User Roles</span>
                        </a>
                    </li>
                <?php } ?> 
                
                <?php if (@$arr_left_dms->View == 1) { ?>
                <!--    <li class="hasSubmenu ">
                        <a href="<?php echo DMS_HOST; ?>" class="index" target="_blank">
                            <i class="fa fa-suitcase"></i>
                            <span>DMS</span>
                        </a>
                    </li>-->
                <?php } ?>
                
            </ul>

        <?php //} else { ?>
<!--            <ul class="menu list-unstyled" style="top:80px;">



                <li class="<?php echo $company; ?>">
                    <a href="<?php echo base_url(); ?>company/company_list" class="no-ajaxify">
                        <i class="fa fa-fw icon-building"></i>
                        <span>Company</span>
                    </a>
                </li>

                <li class="<?php echo $project_list; ?>">
                    <a href="<?php echo base_url() ?>project/project_list" class="no-ajaxify">
                        <i class="fa fa-fw  icon-categories"></i>
                        <span>Projects</span>
                    </a>
                </li>


                <li class="<?php echo $activity_list; ?>">
                    <a href="<?php echo base_url() ?>activity/activity_list" class="no-ajaxify">
                        <i class="fa fa-fw icon-document-bar <?php echo $activity_list; ?>"></i>
                        <span>Activity</span>
                    </a>
                </li>
                <li class="<?php echo $subactivity_list; ?>">
                    <a href="<?php echo base_url(); ?>subactivity/subactivity_list" class="no-ajaxify">
                        <i class="fa fa-fw icon-document-sub"></i>
                        <span>Sub-Activity</span>
                    </a>
                </li>


                <li class="<?php echo $task_list; ?>">
                    <a href="<?php echo base_url(); ?>task/task_list" class="no-ajaxify">
                        <i class="fa fa-fw  icon-compose"></i>
                        <span>Task</span>
                    </a>
                </li>


                <li class="<?php echo $team_list; ?>">
                    <a href="<?php echo base_url() ?>team/team_list" class="no-ajaxify">
                        <i class="fa fa-fw  icon-group"></i>
                        <span>Team</span>
                    </a>
                </li>


                <li class="<?php echo $department_list; ?>">
                    <a href="<?php echo base_url(); ?>department/department_list" class="no-ajaxify">
                        <i class="fa fa-fw icon-book-shelf"></i>
                        <span>Department</span>
                    </a>
                </li>


                <li class="<?php echo $userdetails_list ?>">
                    <a href="<?php echo base_url() ?>userdetails/userdetails_list" class="no-ajaxify">
                        <i class="fa fa-fw icon-user-2"></i>
                        <span>User</span>
                    </a>
                </li>


                <li class="<?php echo $list_user_role ?>">
                    <a href="<?php echo base_url(); ?>user_role/list_user_role" class="no-ajaxify">
                        <i class="fa fa-user"></i>
                        <span>User Roles</span>
                    </a>
                </li>

                <li class=" ">
                    <a href="<?php echo base_url(); ?>dashboard/dms_login" class="index">
                        <i class="fa fa-pencil"></i>
                        <span>DMS</span>
                    </a>
                </li>
            </ul>-->


        <?php //} ?>
    </div>
</div>
<script>
    //$('li.hasSubmenu').click(function () {
    // $('li.hasSubmenu').removeClass("active");
    //$(this).addClass("active");
    // });
</script>