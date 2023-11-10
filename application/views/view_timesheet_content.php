<?php
$t = '';
if (isset($_GET['t'])) {
    $t = 1;
}
$timesheet_id_str = '';
$time_status_arr = array();
if (!empty($time_detail)) {
    $i = 0;
    foreach ($time_detail as $time_str) {
        $i++;
        $time_status_arr[] = $time_str->time_status;
        if (count($time_detail) == $i) {
            $timesheet_id_str .= $time_str->timesheet_id;
        } else {
            $timesheet_id_str .= $time_str->timesheet_id . ',';
        }
    }
}
?>



<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;">
    <?php if (in_array("Rejected", $time_status_arr)) { ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Rejected!</strong> <?php echo $time_detail[0]->reason_to_reject; ?>
        </div>
    <?php } elseif (in_array("Approved", $time_status_arr)) { ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Approved!</strong>
        </div>
    <?php } ?>
</div>


<div class="col-lg-12" style="margin-bottom:10px;">

    <div class="col-sm-8">
        <h4>Timesheet - <?php echo $user_detail[0]->empName; ?> week of <?php echo date('jS F Y', strtotime($start_date)); ?></h4>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right">

        <a href="#modal-add" data-toggle="modal" class="btn-sm btn-warning pull-right" style="margin-left:8px;">Add Time</a>
        <?php

        if (!empty($time_detail)) {
            if ((in_array("Pending", $time_status_arr) || in_array("Rejected", $time_status_arr)) && ($timesheet_emp_id == $emp_id)) {
                //  if($timesheet_emp_id==$emp_id){
                if ($userPrivileges->timesheet->managetimesheet->weekend_submission == 1) {
                    //if ($userPrivileges->timesheet->managetimesheet->weekend_submission == 1) {
                    $current_date = date('Y-m-d');
                    if ($end_date < $current_date) {
        ?>
                        <a onclick="submit_status('<?php echo $timesheet_id_str; ?>', 'Submitted')" data-toggle="modal" class="btn-sm btn-info pull-right" style="margin-left:8px;cursor: pointer;">Submit</a>
                    <?php
                    }
                    // }
                } else {
                    ?>
                    <a onclick="submit_status('<?php echo $timesheet_id_str; ?>', 'Submitted')" data-toggle="modal" class="btn-sm btn-info pull-right" style="margin-left:8px;cursor: pointer;">Submit</a>
                <?php
                }
                //}
            } elseif ((in_array("Submitted", $time_status_arr)) && ($timesheet_emp_id != $emp_id)) {
                ?>
                <a onclick="approve_status('<?php echo $timesheet_id_str; ?>', 'Approved')" data-toggle="modal" class="btn-sm btn-success pull-right" style="margin-left:8px;cursor: pointer;">Approve</a>
                <a data-toggle="modal" onclick="reject_status('<?php echo $timesheet_id_str; ?>')" class="btn-sm btn-danger pull-right" style="cursor: pointer;">Reject</a>
        <?php
            }
        }
        ?>


    </div>
</div>
<div class="innerLR" style="margin-top:60px;clear:both;">
    <div class="widget widget-body-white widget-heading-simple">
        <div class="widget-body overflow-x" style="padding:10px;">
            <table class="table    table-white overflow-x" id="day_table">
                <!----<table class="dynamicTable tableTools table table-striped overflow-x">---->
                <thead>
                    <input type="text" id="selected_project" value="" style="display: none;" />
                    <tr style="background-color:#c72a25; color:#FFF;">
                        <th class="thead-th-padg">Activity</th>
                        <!--<th class="thead-th-padg">Activity</th>
                        <th class="thead-th-padg center">Billable</th>-->
                        <th class="thead-th-padg center">Sunday<br /><span style="font-size: 12px;"><?php echo date('d F Y', strtotime($start_date)); ?></span></th>
                        <th class="thead-th-padg center">Monday<br /><span style="font-size: 12px;"><?php echo date('d F Y', strtotime('+1 day', strtotime($start_date))); ?></span></th>
                        <th class="thead-th-padg center">Tuesday<br /><span style="font-size: 12px;"><?php echo date('d F Y', strtotime('+2 day', strtotime($start_date))); ?></span></th>
                        <th class="thead-th-padg center">Wednesday<br /><span style="font-size: 12px;"><?php echo date('d F Y', strtotime('+3 day', strtotime($start_date))); ?></span></th>
                        <th class="thead-th-padg center">Thursday<br /><span style="font-size: 12px;"><?php echo date('d F Y', strtotime('+4 day', strtotime($start_date))); ?></span></th>
                        <th class="thead-th-padg center">Friday<br /><span style="font-size: 12px;"><?php echo date('d F Y', strtotime('+5 day', strtotime($start_date))); ?></span></th>
                        <th class="thead-th-padg center">Saturday<br /><span style="font-size: 12px;"><?php echo date('d F Y', strtotime('+6 day', strtotime($start_date))); ?></span></th>
                        <th class="thead-th-padg">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($time_by_day_detail)) {
                        $time_by_day_arr = array();
                        $day_arr = array();
                        $billable_arr = array();
                        $unbillable_arr = array();
                        $total_units = 0;
                        $billable = 0;
                        $unbillable = 0;


                        // start old
                        // foreach ($time_by_day_detail as $time_by_day) {

                        //     if (array_key_exists($time_by_day->activity_name, $time_by_day_arr)) {


                        //         if ($time_by_day->billable == 1) {

                        //             if (array_key_exists($time_by_day->day_name, $billable_arr)) {

                        //                 $billable_arr[$time_by_day->day_name] = $billable_arr[$time_by_day->day_name] + $time_by_day->time_units;
                        //             } else {

                        //                 $billable_arr[$time_by_day->day_name] = $time_by_day->time_units;

                        //             }
                        //         } else {


                        //             if (array_key_exists($time_by_day->day_name, $unbillable_arr)) {

                        //                 $unbillable_arr[$time_by_day->day_name] = $unbillable_arr[$time_by_day->day_name] + $time_by_day->time_units;
                        //             } else {

                        //                 $unbillable_arr[$time_by_day->day_name] = $time_by_day->time_units;
                        //             }
                        //         }
                        //         if (array_key_exists($time_by_day->day_name, $day_arr)) {
                        //             $day_arr[$time_by_day->day_name] = $day_arr[$time_by_day->day_name] + $time_by_day->time_units;
                        //         } else {
                        //             $day_arr[$time_by_day->day_name] = $time_by_day->time_units;
                        //         }
                        //         $total_units = $total_units + $time_by_day->time_units;


                        //         $time_by_day_arr[$time_by_day->activity_name] = array(
                        //             'client_name' => $time_by_day->client_name,
                        //             'activity_name' => $time_by_day->activity_name,
                        //             'project_name' => $time_by_day->project_name,
                        //             'billable' => $billable_arr,
                        //             'unbillable' => $unbillable_arr,
                        //             'day_name' => $day_arr,
                        //             'total_units' => $total_units
                        //         );
                        //     } else {
                        //         // $time_by_day_arr = array();
                        //         $day_arr = array();
                        //         $billable_arr = array();
                        //         $unbillable_arr = array();

                        //         $nnbmin_to_hrs = date('H:i', mktime(0,$time_by_day->time_minutes));
                        //         $nnbhh_mm = explode(':',@$nnbmin_to_hrs);
                        //         $total_units = ($time_by_day->time_units+$nnbhh_mm[0]).':'.$nnbhh_mm[1];



                        //         $total_units = $time_by_day->time_units;
                        //         //array_push($day_arr,array($time_by_day->day_name => $time_by_day->time_units));
                        //         $day_arr[$time_by_day->day_name] = $time_by_day->time_units;
                        //         $billable = 0;
                        //         $unbillable = 0;
                        //         if ($time_by_day->billable == 1) {
                        //             //$billable = $time_by_day->time_units;
                        //             $billable_arr[$time_by_day->day_name] = $time_by_day->time_units;
                        //             ;
                        //         } else {
                        //             //$unbillable = $time_by_day->time_units;
                        //             $unbillable_arr[$time_by_day->day_name] = $time_by_day->time_units;
                        //             ;
                        //         }

                        //         $time_by_day_arr[$time_by_day->activity_name] = array(
                        //             'client_name' => $time_by_day->client_name,
                        //             'activity_name' => $time_by_day->activity_name,
                        //             'project_name' => $time_by_day->project_name,
                        //             'billable' => $billable_arr,
                        //             'unbillable' => $unbillable_arr,
                        //             'day_name' => $day_arr,
                        //             'total_units' => $total_units
                        //         );
                        //     }
                        // }
                        // end old

                        foreach ($time_by_day_detail as $time_by_day) {

                            if (array_key_exists($time_by_day->activity_name, $time_by_day_arr)) {
                                if ($time_by_day->billable == 1) {

                                    $bmin_to_hrs = date('H:i', mktime(0, $time_by_day->time_minutes));
                                    $bhh_mm = explode(':', @$bmin_to_hrs);
                                    // $billable_hrsd= ($time_by_day->time_units+$bhh_mm[0]).':'.$bhh_mm[1];

                                    if (array_key_exists($time_by_day->day_name, $billable_arr)) {

                                        //$billable_hrsd= ($time_by_day->time_units+$bhh_mm[0]).':'.$bhh_mm[1];
                                        //$billable_arr[$time_by_day->day_name] = $billable_arr[$time_by_day->day_name] + $time_by_day->time_units+$bhh_mm[0].':'.$bhh_mm[1];

                                        $already_data = explode(':', $billable_arr[$time_by_day->day_name]);
                                        $new_hrs = $already_data[0] + $time_by_day->time_units;
                                        $new_mnts = $already_data[1] + $time_by_day->time_minutes;
                                        $nbmin_to_hrs = date('H:i', mktime(0, $new_mnts));
                                        $nbhh_mm = explode(':', @$nbmin_to_hrs);

                                        $billable_arr[$time_by_day->day_name] = ($new_hrs + $nbhh_mm[0]) . ':' . $nbhh_mm[1];
                                    } else {

                                        $billable_arr[$time_by_day->day_name] = ($time_by_day->time_units + $bhh_mm[0]) . ':' . $bhh_mm[1];
                                    }
                                } else {

                                    $bmin_to_hrs = date('H:i', mktime(0, $time_by_day->time_minutes));
                                    $bhh_mm = explode(':', @$bmin_to_hrs);
                                    // $billable_hrsd= ($time_by_day->time_units+$bhh_mm[0]).':'.$bhh_mm[1];

                                    if (array_key_exists($time_by_day->day_name, $unbillable_arr)) {

                                        $already_data = explode(':', $unbillable_arr[$time_by_day->day_name]);
                                        $new_hrs = $already_data[0] + $time_by_day->time_units;
                                        $new_mnts = $already_data[1] + $time_by_day->time_minutes;
                                        $nbmin_to_hrs = date('H:i', mktime(0, $new_mnts));
                                        $nbhh_mm = explode(':', @$nbmin_to_hrs);

                                        $unbillable_arr[$time_by_day->day_name] = ($new_hrs + $nbhh_mm[0]) . ':' . $nbhh_mm[1];
                                    } else {

                                        $unbillable_arr[$time_by_day->day_name] = ($time_by_day->time_units + $bhh_mm[0]) . ':' . $bhh_mm[1];
                                    }
                                }

                                if (array_key_exists($time_by_day->day_name, $day_arr)) {

                                    $dalready_data = explode(':', $day_arr[$time_by_day->day_name]);
                                    $dnew_hrs = $dalready_data[0] + $time_by_day->time_units;
                                    $dnew_mnts = $dalready_data[1] + $time_by_day->time_minutes;
                                    $dnbmin_to_hrs = date('H:i', mktime(0, $dnew_mnts));
                                    $dnbhh_mm = explode(':', @$dnbmin_to_hrs);

                                    $day_arr[$time_by_day->day_name] = ($dnew_hrs + $dnbhh_mm[0]) . ':' . $dnbhh_mm[1];

                                    //$day_arr[$time_by_day->day_name] = $day_arr[$time_by_day->day_name] + $time_by_day->time_units.':'.$time_by_day->time_minutes;
                                } else {
                                    $nbmin_to_hrs = date('H:i', mktime(0, $time_by_day->time_minutes));
                                    $nbhh_mm = explode(':', @$nbmin_to_hrs);
                                    $day_arr[$time_by_day->day_name] = ($time_by_day->time_units + $nbhh_mm[0]) . ':' . $nbhh_mm[1];
                                    //$day_arr[$time_by_day->day_name] = $time_by_day->time_units.':'.$time_by_day->time_minutes;

                                }

                                //$total_units = $total_units + $time_by_day->time_units;

                                $adalready_data = explode(':', $total_units);
                                $adnew_hrs = $adalready_data[0] + $time_by_day->time_units;
                                $adnew_mnts = $adalready_data[1] + $time_by_day->time_minutes;
                                $dnbmin_to_hrs = date('H:i', mktime(0, $adnew_mnts));
                                $adnbhh_mm = explode(':', @$dnbmin_to_hrs);
                                $total_units = ($adnew_hrs + $adnbhh_mm[0]) . ':' . $adnbhh_mm[1];


                                $time_by_day_arr[$time_by_day->activity_name] = array(
                                    'client_name' => $time_by_day->client_name,
                                    'activity_name' => $time_by_day->activity_name,
                                    'project_name' => $time_by_day->project_name,
                                    'billable' => $billable_arr,
                                    'unbillable' => $unbillable_arr,
                                    'day_name' => $day_arr,
                                    'total_units' => $total_units
                                );
                            } else {
                                // $time_by_day_arr = array();
                                $day_arr = array();
                                $billable_arr = array();
                                $unbillable_arr = array();

                                // $total_units = $time_by_day->time_units;
                                $nnbmin_to_hrs = date('H:i', mktime(0, $time_by_day->time_minutes));
                                $nnbhh_mm = explode(':', @$nnbmin_to_hrs);
                                $total_units = ($time_by_day->time_units + $nnbhh_mm[0]) . ':' . $nnbhh_mm[1];

                                //array_push($day_arr,array($time_by_day->day_name => $time_by_day->time_units));
                                $nbmin_to_hrs = date('H:i', mktime(0, $time_by_day->time_minutes));
                                $nbhh_mm = explode(':', @$nbmin_to_hrs);
                                $day_arr[$time_by_day->day_name] = ($time_by_day->time_units + $nbhh_mm[0]) . ':' . $nbhh_mm[1];

                                //$day_arr[$time_by_day->day_name] = $time_by_day->time_units.':'.$time_by_day->time_minutes;
                                $billable = 0;
                                $unbillable = 0;
                                if ($time_by_day->billable == 1) {
                                    //$billable = $time_by_day->time_units;
                                    $nbmin_to_hrs = date('H:i', mktime(0, $time_by_day->time_minutes));
                                    $nbhh_mm = explode(':', @$nbmin_to_hrs);
                                    $billable_arr[$time_by_day->day_name] = ($time_by_day->time_units + $nbhh_mm[0]) . ':' . $nbhh_mm[1];

                                        // $billable_arr[$time_by_day->day_name] = $time_by_day->time_units.':'.$time_by_day->time_minutes;
                                    ;
                                } else {
                                    //$unbillable = $time_by_day->time_units;
                                    $nbmin_to_hrs = date('H:i', mktime(0, $time_by_day->time_minutes));
                                    $nbhh_mm = explode(':', @$nbmin_to_hrs);
                                    $unbillable_arr[$time_by_day->day_name] = ($time_by_day->time_units + $nbhh_mm[0]) . ':' . $nbhh_mm[1];

                                        //$unbillable_arr[$time_by_day->day_name] = $time_by_day->time_units.':'.$time_by_day->time_minutes;
                                    ;
                                }

                                $time_by_day_arr[$time_by_day->activity_name] = array(
                                    'client_name' => $time_by_day->client_name,
                                    'activity_name' => $time_by_day->activity_name,
                                    'project_name' => $time_by_day->project_name,
                                    'billable' => $billable_arr,
                                    'unbillable' => $unbillable_arr,
                                    'day_name' => $day_arr,
                                    'total_units' => $total_units
                                );
                            }
                        }


                        //print_r($time_by_day_arr);die;
                        foreach ($time_by_day_arr as $day_arr) {
                    ?>
                            <tr class="gradeX">
                                <td class="td-padding-top_botton_3"><span class="font-size_12"><?php echo $day_arr['activity_name']; ?></span></td>
                                <!--<td class="td-padding-top_botton_3"><span class="font-size_12"><?php echo $day_arr['activity_name']; ?></span></td>
                               <td class="center td-padding-top_botton_3"><span class="font-size_12"><?php echo ($day_arr['billable'] == 1) ? 'Yes' : 'No'; ?></span></td>-->
                                <td class="center td-padding-top_botton_3 day7"><span class="font-size_12" data-billable="<?php echo (!empty($day_arr['billable']['Sunday'])) ? $day_arr['billable']['Sunday'] : ''; ?>" data-unbillable="<?php echo (!empty($day_arr['unbillable']['Sunday'])) ? $day_arr['unbillable']['Sunday'] : ''; ?>"><?php echo (!empty($day_arr['day_name']['Sunday'])) ? $day_arr['day_name']['Sunday'] : ''; ?></span></td>
                                <td class="center td-padding-top_botton_3 day1"><span class="font-size_12" data-billable="<?php echo (!empty($day_arr['billable']['Monday'])) ? $day_arr['billable']['Monday'] : ''; ?>" data-unbillable="<?php echo (!empty($day_arr['unbillable']['Monday'])) ? $day_arr['unbillable']['Monday'] : ''; ?>"><?php echo (!empty($day_arr['day_name']['Monday'])) ? $day_arr['day_name']['Monday'] : ''; ?></span></td>
                                <td class="center td-padding-top_botton_3 day2"><span class="font-size_12" data-billable="<?php echo (!empty($day_arr['billable']['Tuesday'])) ? $day_arr['billable']['Tuesday'] : ''; ?>" data-unbillable="<?php echo (!empty($day_arr['unbillable']['Tuesday'])) ? $day_arr['unbillable']['Tuesday'] : ''; ?>"><?php echo (!empty($day_arr['day_name']['Tuesday'])) ? $day_arr['day_name']['Tuesday'] : ''; ?></span></td>
                                <td class="center td-padding-top_botton_3 day3"><span class="font-size_12" data-billable="<?php echo (!empty($day_arr['billable']['Wednesday'])) ? $day_arr['billable']['Wednesday'] : ''; ?>" data-unbillable="<?php echo (!empty($day_arr['unbillable']['Wednesday'])) ? $day_arr['unbillable']['Wednesday'] : ''; ?>"><?php echo (!empty($day_arr['day_name']['Wednesday'])) ? $day_arr['day_name']['Wednesday'] : ''; ?></span></td>
                                <td class="center td-padding-top_botton_3 day4"><span class="font-size_12" data-billable="<?php echo (!empty($day_arr['billable']['Thursday'])) ? $day_arr['billable']['Thursday'] : ''; ?>" data-unbillable="<?php echo (!empty($day_arr['unbillable']['Thursday'])) ? $day_arr['unbillable']['Thursday'] : ''; ?>"><?php echo (!empty($day_arr['day_name']['Thursday'])) ? $day_arr['day_name']['Thursday'] : ''; ?></span></td>
                                <td class="center td-padding-top_botton_3 day5"><span class="font-size_12" data-billable="<?php echo (!empty($day_arr['billable']['Friday'])) ? $day_arr['billable']['Friday'] : ''; ?>" data-unbillable="<?php echo (!empty($day_arr['unbillable']['Friday'])) ? $day_arr['unbillable']['Friday'] : ''; ?>"><?php echo (!empty($day_arr['day_name']['Friday'])) ? $day_arr['day_name']['Friday'] : ''; ?></span></td>
                                <td class="center td-padding-top_botton_3 day6"><span class="font-size_12" data-billable="<?php echo (!empty($day_arr['billable']['Saturday'])) ? $day_arr['billable']['Saturday'] : ''; ?>" data-unbillable="<?php echo (!empty($day_arr['unbillable']['Saturday'])) ? $day_arr['unbillable']['Saturday'] : ''; ?>"><?php echo (!empty($day_arr['day_name']['Saturday'])) ? $day_arr['day_name']['Saturday'] : ''; ?></span></td>

                                <td class="center td-padding-top_botton_3"><span class="font-size_12"><?php echo $day_arr['total_units']; ?></span></td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr class="gradeX">
                            <td class="td-padding-top_botton_3" colspan="9"><span class="font-size_12">This week's timesheet does not have any time added.
                                    Click add time to start adding time.</span></td>
                        </tr>
                    <?php } ?>

                    <tr class="bg-gray" style="border-bottom: 5px solid; border-bottom-color: white;">
                        <td class="td-padding-top_botton_3"><span class="font-size_12"><strong>Total</strong></span></td>
                        <!--<td class="td-padding-top_botton_3"><span class="font-size_12"></span></td>
                        <td class="td-padding-top_botton_3"><span class="font-size_12"></span></td>-->
                        <td class="center td-padding-top_botton_3" id="total7"><span class="font-size_12"></span></td>
                        <td class="center td-padding-top_botton_3" id="total1"><span class="font-size_12">6</span></td>
                        <td class="center td-padding-top_botton_3" id="total2"><span class="font-size_12">12</span></td>
                        <td class="center td-padding-top_botton_3" id="total3"><span class="font-size_12">9</span></td>
                        <td class="center td-padding-top_botton_3" id="total4"><span class="font-size_12">27</span></td>
                        <td class="center td-padding-top_botton_3" id="total5"><span class="font-size_12">30</span></td>
                        <td class="center td-padding-top_botton_3" id="total6"><span class="font-size_12"></span></td>

                        <td class="center td-padding-top_botton_3" id="grand_total"><span class="font-size_12">0</span></td>
                    </tr>
                    <tr class="bg-gray" style="border-bottom: 5px solid; border-bottom-color: white;">
                        <td class="td-padding-top_botton_3"><span class="font-size_12"><strong>Billable</strong></span></td>
                        <!--<td class="td-padding-top_botton_3"><span class="font-size_12"></span></td>
                        <td class="td-padding-top_botton_3"><span class="font-size_12"></span></td>-->
                        <td class="center td-padding-top_botton_3" id="billable7"><span class="font-size_12"></span></td>
                        <td class="center td-padding-top_botton_3" id="billable1"><span class="font-size_12">6</span></td>
                        <td class="center td-padding-top_botton_3" id="billable2"><span class="font-size_12">8</span></td>
                        <td class="center td-padding-top_botton_3" id="billable3"><span class="font-size_12">6</span></td>
                        <td class="center td-padding-top_botton_3" id="billable4"><span class="font-size_12">27</span></td>
                        <td class="center td-padding-top_botton_3" id="billable5"><span class="font-size_12">30</span></td>
                        <td class="center td-padding-top_botton_3" id="billable6"><span class="font-size_12"></span></td>

                        <td class="center td-padding-top_botton_3" id="grand_billable"><span class="font-size_12">0</span></td>
                    </tr>
                    <tr class="bg-gray" style="border-bottom: 5px solid; border-bottom-color: white;">
                        <td class="td-padding-top_botton_3"><span class="font-size_12"><strong>UnBillable</strong></span></td>
                        <!--<td class="td-padding-top_botton_3"><span class="font-size_12"></span></td>
                        <td class="td-padding-top_botton_3"><span class="font-size_12"></span></td>-->
                        <td class="center td-padding-top_botton_3" id="unbillable7"><span class="font-size_12"></span></td>
                        <td class="center td-padding-top_botton_3" id="unbillable1"><span class="font-size_12">0</span></td>
                        <td class="center td-padding-top_botton_3" id="unbillable2"><span class="font-size_12">4</span></td>
                        <td class="center td-padding-top_botton_3" id="unbillable3"><span class="font-size_12">3</span></td>
                        <td class="center td-padding-top_botton_3" id="unbillable4"><span class="font-size_12">0</span></td>
                        <td class="center td-padding-top_botton_3" id="unbillable5"><span class="font-size_12">0</span></td>
                        <td class="center td-padding-top_botton_3" id="unbillable6"><span class="font-size_12"></span></td>

                        <td class="center td-padding-top_botton_3" id="grand_unbillable"><span class="font-size_12">0</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="innerLR" style="margin-top:0px;">
    <div class="widget">
        <div class="col-lg-12" style="padding: 0px;">
            <div class="col-md-8" style="padding: 0px;">
                <h4 style="padding-top: 0px;">Details activities - <?php echo $user_detail[0]->empName; ?> week of <?php echo date('jS F Y', strtotime($start_date)); ?></h4>
            </div>

        </div>
    </div>
</div>
<div class="innerLR" style="margin-top: 80px;">
    <div class="widget widget-body-white widget-heading-simple">
        <div class="widget-body overflow-x" style="padding:10px;">
            <table class="table    table-white overflow-x">
                <!----<table class="dynamicTable tableTools table table-striped overflow-x">---->
                <thead>
                    <tr style="background-color:#c72a25; color:#FFF;">
                        <th class="thead-th-padg">Client</th>
                        <th class="thead-th-padg">Activity</th>
                        <th class="thead-th-padg">Sub Activity</th>
                        <th class="thead-th-padg">Description</th>
                        <th class="thead-th-padg center">Date</th>
                        <th class="thead-th-padg center">Time (HH:mm)</th>
                        <th class="thead-th-padg center">Billable</th>
                        <th class="thead-th-padg center"></th>
                        <th class="thead-th-padg center"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($time_by_day_detail)) {
                        foreach ($time_by_day_detail as $time) {
                            // echo "<pre>";print_r($time); //die;
                    ?>
                            <tr class="gradeX">
                                <td class="td-padding-top_botton_3"><span class="font-size_12"><?php echo $time->client_name; ?></span></td>
                                <td class="td-padding-top_botton_3"><span class="font-size_12"><?php echo $time->activity_name; ?></span></td>
                                <td class="td-padding-top_botton_3"><span class="font-size_12"><?php echo $time->subactivity_name; ?></span></td>
                                <td class="td-padding-top_botton_3"><span class="font-size_12"><?php echo $time->comments; ?></span></td>
                                <td class="center td-padding-top_botton_3"><span class="font-size_12"><?php echo date('d F Y', strtotime($time->timesheet_date)); ?></span></td>
                                <td class="center td-padding-top_botton_3"><span class="font-size_12"><?php echo $time->time_units . ':' . $time->time_minutes; ?></span></td>
                                <td class="center td-padding-top_botton_3"><span class="font-size_12"><?php echo ($time->billable == 1) ? 'Yes' : 'No'; ?></span></td>
                                <?php if (($time->time_status != 'Approved') && ($timesheet_emp_id == $emp_id)) { ?>
                                    <td class="center td-padding-top_botton_3">
                                        <?php if ($time->timesheet_date >= $sheet_edit_date) { ?>
                                            <span class="font-size_12"><a href="#modal-edit" data-toggle="modal" style="color:#c72a25;cursor: pointer;" onclick="edit_timesheet('<?php echo $time->timesheet_id; ?>')"><i class="fa fa-edit"></i></a></span>
                                        <?php } ?>
                                    </td>
                                    <td class="center td-padding-top_botton_3">
                                        <?php if ($time->timesheet_date >= $sheet_edit_date) { ?>
                                            <span class="font-size_12"><a href="#" onclick="delete_timesheet('<?php echo $time->timesheet_id; ?>')" style="color:#c72a25"><i class="fa fa-trash-o"></i></a></span>
                                        <?php } ?>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr class="gradeX">
                            <td class="td-padding-top_botton_3" colspan="9"><span class="font-size_12">This week's timesheet does not have any time added. </span></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 77%;margin-left: 12%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-top: -3px;">&times;</button>
            </div>
            <div class="modal-body">
                <div class="innerAll" style="padding-left: 0; padding-right: 0px;">
                    <div class="innerLR" style="padding-left: 0; padding-right: 0px;">
                        <form class="form-horizontal" role="form" id="add_timesheet_info" style="width: 540px;">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Name</label>
                                <div class="col-sm-8" style="padding-top: 4px;">
                                    <span class="inputtext_formating"><?php echo $userUname; ?></span>
                                    <span class="inputtext_formating">(<?php echo $userUId; ?>)</span>
                                </div>
                            </div>
                            <div class="form-group">

                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Date</label>
                                <div class="col-sm-8">
                                    <div class="input-group date datepicker2" style="width:100%;">
                                        <input class="form-control height_25" type="text" name="timesheet_date" id="timesheet_date">
                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Time</label>
                                <div class="col-sm-8">
                                    <div class="input-group bootstrap-timepicker col-sm-12">
                                        <input id="timepicker1" type="text" name="start_time" value="00:00" class="form-control height_25" readonly="readonly">
                                        <span class="input-group-addon padding_3"><i class="fa fa-clock-o"></i></span>
                                        <input id="timepicker6" type="text" name="end_time" value="00:00" class="form-control height_25" readonly="readonly">
                                        <span class="input-group-addon padding_3"><i class="fa fa-clock-o"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Hours</label>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="Hours" name="time_units" id="addtimeunits" class="form-control height_25 plahole_font" readonly="">
                                </div>
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Minutes</label>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="Minutes" name="minutes" id="addtimeminutes" class="form-control height_25 plahole_font" readonly="">
                                </div>
                            </div>
                            <div class="form-group">

                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Disbursement</label>
                                <div class="col-sm-8">
                                    <input type="text" name="disbursement" id="disbursement" class="form-control height_25" style="width: 100%;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Client</label>
                                <div class="col-sm-8">
                                    <select name="client_name" id="client_name" onchange="get_project(this.value, 'project_name')" style="padding-top: 2px;width:100%;">
                                        <option value="">Select</option>

                                        <?php
                                        if (!empty($client_detail)) {
                                            foreach ($client_detail as $client) {
                                        ?>
                                                <option value="<?php echo $client->client_name; ?>"><?php echo $client->client_name; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Project</label>
                                <div class="col-sm-8">
                                    <select class="form-control height_25 plahole_font" name="project_name" id="project_name" onchange="get_activity(this.value, 'activity_name')" style="padding-top: 2px;">

                                        <option value="">Select</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Activity</label>
                                <div class="col-sm-8">
                                    <select class="form-control height_25 plahole_font" name="activity_name" id="activity_name" onchange="get_subactivity(this.value, 'subactivity_name')" style="padding-top: 2px;">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Sub-Activity</label>
                                <div class="col-sm-8">
                                    <select class="form-control height_25 plahole_font" name="subactivity_name" id="subactivity_name" onchange="get_task(this.value, 'task_name')" style="padding-top: 2px;">
                                        <option value="">Select</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Task</label>
                                <div class="col-sm-8">
                                    <select class="form-control height_25 plahole_font" name="task_name" id="task_name" onchange="get_task_detail(this.value)" style="padding-top: 2px;">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="consumed_hours">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Consumed Hours</label>
                                <div class="col-sm-3" style="margin-left:5px;" id="add_billable">
                                    <input type="text" placeholder="Consumed Hours" name="show_consumed_hours" id="show_consumed_hours" class="form-control height_25 plahole_font" readonly="" data-bv-field="time_units" fdprocessedid="j0uwb8" value="0.00">
                                </div>
                            </div>
                            <div class="form-group" id="actual_hours" style="display: none;">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Actual Hours</label>
                                <div class="col-sm-3" style="margin-left:5px;" id="add_billable">
                                    <input type="text" placeholder="Actual Hours" name="show_actual_hours" id="show_actual_hours" class="form-control height_25 plahole_font" readonly="" data-bv-field="time_units" fdprocessedid="j0uwb8">
                                </div>
                            </div>
                            <div class="form-group" id="reasion_comment_box" style="display:none;">
                                <label for="inputEmail3" class="col-sm-3 control-label inputtext_formating" style="margin-bottom:5px;">Reason</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="reasion_box" id="reasion_box" placeholder="Fill reason why exceed task time..." maxlength="255" class="form-control plahole_font" rows="5" style="resize: vertical;"></textarea>
                                    (Limit 255 characters.)
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Billable</label>
                                <div class="col-sm-8" style="margin-left:5px;" id="add_billable">
                                    <label for="addbillable" class="checkbox-custom col-sm-8">
                                        <i class="fa fa-fw fa-square-o"></i>
                                        <input id="addbillable" type="checkbox" name="billable" value="0">
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label inputtext_formating" style="margin-bottom:5px;">Notes </label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="comments" id="comments" placeholder="Descriptions..." maxlength="255" class="form-control plahole_font" rows="5" style="resize: vertical;"></textarea>
                                    (Limit 255 characters.)
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-8">
                                    <button class="btn btn-success pull-right" style="padding: 4px 10px;font-size: 12px; line-height: 1.5; border-radius: 3px;">Save</button>
                                    <a href="#" class="btn-sm btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 77%;margin-left: 12%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-top: -3px;">&times;</button>
            </div>
            <div class="modal-body">
                <div class="innerAll" style="padding-left: 0; padding-right: 0px;">
                    <div class="innerLR" style="padding-left: 0; padding-right: 0px;">
                        <form class="form-horizontal" role="form" id="edit_timesheet_info" style="width: 540px;">
                            <input type="hidden" name="edit_emp_id" id="edit_emp_id" />
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Name</label>
                                <div class="col-sm-8" style="padding-top: 4px;">
                                    <span class="inputtext_formating"><?php echo $user_detail[0]->empName; ?></span>
                                    <span class="inputtext_formating">(<?php echo $user_detail[0]->empId; ?>)</span>
                                </div>
                            </div>
                            <div class="form-group">

                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Date</label>
                                <div class="col-sm-8">
                                    <div class="input-group date datepicker2" style="width:100%;">
                                        <input class="form-control height_25" type="text" name="edit_timesheet_date" id="edit_timesheet_date">
                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Time</label>
                                <div class="col-sm-8">
                                    <div class="input-group bootstrap-timepicker col-sm-12">
                                        <input id="timepicker2" type="text" name="edit_start_time" class="form-control height_25" readonly="readonly">
                                        <span class="input-group-addon padding_3"><i class="fa fa-clock-o"></i></span>
                                        <input id="timepicker3" type="text" name="edit_end_time" class="form-control height_25" readonly="readonly">
                                        <span class="input-group-addon padding_3"><i class="fa fa-clock-o"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">

                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Hours</label>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="Hours" name="edit_time_units" id="edittimeunits" class="form-control height_25 plahole_font" readonly="">
                                </div>

                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Minutes</label>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="Minutes" name="edit_minutes" id="edittimeminutes" class="form-control height_25 plahole_font" readonly="">
                                </div>
                            </div>
                            <div class="form-group">

                                <label for="edit_disbursement" class="col-sm-2 control-label inputtext_formating">Disbursement</label>
                                <div class="col-sm-8">
                                    <input type="text" name="edit_disbursement" id="edit_disbursement" class="form-control height_25 plahole_font">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Client</label>
                                <div class="col-sm-8">
                                    <select name="edit_client_name" id="edit_client_name" onchange="get_project(this.value, 'edit_project_name')" style="width:100%;">

                                        <option value="">Select</option>
                                        <?php
                                        if (!empty($client_detail)) {
                                            foreach ($client_detail as $client) {
                                        ?>
                                                <option value="<?php echo $client->client_name; ?>"><?php echo $client->client_name; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Project</label>
                                <div class="col-sm-8">
                                    <select class="form-control height_25 plahole_font" name="edit_project_name" id="edit_project_name" style="padding-top: 2px;">

                                        <option value="">Select</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Activity</label>
                                <div class="col-sm-8">
                                    <select class="form-control height_25 plahole_font" name="edit_activity_name" id="edit_activity_name" onchange="get_subactivity(this.value, 'edit_subactivity_name')" style="padding-top: 2px;">
                                        <option value="">Select</option>
                                        <?php
                                        if (!empty($activity_detail)) {
                                            foreach ($activity_detail as $activity) {
                                        ?>
                                                <option value="<?php echo $activity->activity_name; ?>"><?php echo $activity->activity_name; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Sub-Activity</label>
                                <div class="col-sm-8">
                                    <select class="form-control height_25 plahole_font" name="edit_subactivity_name" id="edit_subactivity_name" onchange="get_task(this.value, 'edit_task_name')" style="padding-top: 2px;">
                                        <option value="">Select</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Task</label>
                                <div class="col-sm-8">
                                    <select onchange="get_edit_task_detail(this.value)" class="form-control height_25 plahole_font" name="edit_task_name" id="edit_task_name" style="padding-top: 2px;">
                                        <option value="">Select</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="show_edit_consumed_hours">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Consumed Hours</label>
                                <div class="col-sm-3" style="margin-left:5px;" id="add_billable">
                                    <input type="text" placeholder="Consumed Hours" name="edit_consumed_hours" id="edit_consumed_hours" class="form-control height_25 plahole_font" readonly="" data-bv-field="time_units" fdprocessedid="j0uwb8" value="0.00">
                                </div>
                            </div>
                            <div class="form-group" id="show_edit_actual_hours">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Actual Hours</label>
                                <div class="col-sm-3" style="margin-left:5px;">
                                    <input type="text" placeholder="Actual Hours" name="edit_actual_hours" id="edit_actual_hours" class="form-control height_25 plahole_font" readonly="" data-bv-field="time_units" fdprocessedid="j0uwb8">
                                </div>
                            </div>
                            <div class="form-group" id="edit_reasion_comment_box" style="display:none;">
                                <label for="inputEmail3" class="col-sm-3 control-label inputtext_formating" style="margin-bottom:5px;">Reason</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="edit_reasion_box" id="edit_reasion_box" placeholder="Fill reason why exceed task time..." maxlength="255" class="form-control plahole_font" rows="5" style="resize: vertical;"></textarea>
                                    (Limit 255 characters.)
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Billable</label>
                                <div class="col-sm-8" style="margin-left:5px;" id="editBillable">
                                    <label for="edit_billable" class="checkbox-custom col-sm-8 editBil">
                                        <i class="fa fa-fw fa-square-o checked"></i>
                                        <input type="checkbox" name="edit_billable" id="edit_billable" value="0">
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label inputtext_formating" style="margin-bottom:5px;">Notes </label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="edit_comments" id="edit_comments" placeholder="Descriptions..." class="form-control plahole_font" maxlength="255" rows="5" style="resize: vertical;"></textarea>
                                    (Limit 255 characters.)
                                </div>
                            </div>
                            <input type="hidden" name="edit_timesheet_id" id="edit_timesheet_id">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-8">
                                    <button class="btn btn-success pull-right" style="padding: 4px 10px;font-size: 12px; line-height: 1.5; border-radius: 3px;">Save</button>
                                    <a href="#" class="btn-sm btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="addloader" style="display:none;position:absolute;top:50%;left:50%;"><img src="<?php echo base_url(); ?>assets/images/loader.gif" /></div>

    <div id="screen"></div>

    <script>
        $(document).ready(function() {
            $('#add_billable').on('click', function() {
                if ($('#add_billable label i').hasClass('checked')) {

                    $('#addbillable').val(0);

                } else {
                    $('#addbillable').val(1);


                }
            });

            $('#editBillable').on('click', function() {
                if ($('#editBillable label i').hasClass('checked')) {

                    $('#edit_billable').val(0);

                } else {
                    $('#edit_billable').val(1);

                }
            });


            $('#modal-add').modal({
                backdrop: 'static',
                keyboard: true,
                show: false
            });

            $('#modal-edit').modal({
                backdrop: 'static',
                keyboard: true,
                show: false
            });

            $("#client_name").select2({
                placeholder: "Select Client",
                allowClear: true
            });
            $("#edit_client_name").select2({
                placeholder: "Select Client",
                allowClear: true
            });
            $('.datepicker2').bdatepicker({
                format: "dd MM yyyy",
                autoclose: true
            }).on('changeDate', function(e) {
                // Revalidate the date field
                $('#add_timesheet_info').bootstrapValidator('revalidateField', 'timesheet_date');
                $('#edit_timesheet_info').bootstrapValidator('revalidateField', 'edit_timesheet_date');

            });

            $('#modal-add').on('hidden.bs.modal', function() {
                $('#select2-drop').hide();

            });
            $('#modal-edit').on('hidden.bs.modal', function() {
                $('#select2-drop').hide();

            });


            var total1 = 0;
            var total2 = 0;
            var total3 = 0;
            var total4 = 0;
            var total5 = 0;
            var total6 = 0;
            var total7 = 0;
            var billable1 = 0;
            var billable2 = 0;
            var billable3 = 0;
            var billable4 = 0;
            var billable5 = 0;
            var billable6 = 0;
            var billable7 = 0;
            var unbillable1 = 0;
            var unbillable2 = 0;
            var unbillable3 = 0;
            var unbillable4 = 0;
            var unbillable5 = 0;
            var unbillable6 = 0;
            var unbillable7 = 0;

            var obj = $('.day1 span');
            $.each(obj, function(key, value) {
                var val = obj.eq(key).text();
                var val2 = obj.eq(key).attr('data-billable');
                var val3 = obj.eq(key).attr('data-unbillable');



                if (val != "") {
                    // total1 = val;
                    if (total1 == 0) {
                        total1 = val;
                    } else {
                        new_one = total1.split(":");
                        new_val = val.split(":");
                        new_hrs_one = parseInt(new_one[0]) + parseInt(new_val[0]);
                        new_min_one = parseInt(new_one[1]) + parseInt(new_val[1]);

                        var hoursB = Math.floor(new_min_one / 60);
                        var minutesB = new_min_one % 60;
                        var totalHourNewB = parseInt(new_hrs_one) + parseInt(hoursB);
                        var totalMinutesNewB = parseInt(minutesB);

                        total1 = totalHourNewB + ':' + totalMinutesNewB;
                    }
                }


                if (val2 != '') {

                    //billable1 = val2;
                    if (billable1 == 0) {
                        billable1 = val2;
                    } else {
                        new_billable_one = billable1.split(":");
                        new_val2 = val2.split(":");
                        new_hrs_billable_one = parseInt(new_billable_one[0]) + parseInt(new_val2[0]);
                        new_min_billable_one = parseInt(new_billable_one[1]) + parseInt(new_val2[1]);

                        var hours_billable_one = Math.floor(new_min_billable_one / 60);
                        var minutes_billable_one = new_min_billable_one % 60;
                        var totalHourNew_billable_one = parseInt(new_hrs_billable_one) + parseInt(hours_billable_one);
                        var totalMinutesNew_billable_one = parseInt(minutes_billable_one);

                        billable1 = totalHourNew_billable_one + ':' + totalMinutesNew_billable_one;
                    }

                }

                if (val3 != '') {

                    if (unbillable1 == 0) {
                        unbillable1 = val3;
                    } else {
                        new_unbillable_one = unbillable1.split(":");
                        new_val3 = val3.split(":");
                        new_hrs_unbillable_one = parseInt(new_unbillable_one[0]) + parseInt(new_val3[0]);
                        new_min_unbillable_one = parseInt(new_unbillable_one[1]) + parseInt(new_val3[1]);

                        var hours_unbillable_one = Math.floor(new_min_unbillable_one / 60);
                        var minutes_unbillable_one = new_min_unbillable_one % 60;
                        var totalHourNew_unbillable_one = parseInt(new_hrs_unbillable_one) + parseInt(hours_unbillable_one);
                        var totalMinutesNew_unbillable_one = parseInt(minutes_unbillable_one);

                        unbillable1 = totalHourNew_unbillable_one + ':' + totalMinutesNew_unbillable_one;
                    }
                }

            });
            var obj = $('.day2 span');
            $.each(obj, function(key, value) {
                var val = obj.eq(key).text();
                var val2 = obj.eq(key).attr('data-billable');
                var val3 = obj.eq(key).attr('data-unbillable');

                if (val != "") {
                    //total2 = val;

                    if (total2 == 0) {
                        total2 = val;
                    } else {
                        new_two = total2.split(":");
                        new_val = val.split(":");
                        new_hrs_two = parseInt(new_two[0]) + parseInt(new_val[0]);
                        new_min_two = parseInt(new_two[1]) + parseInt(new_val[1]);
                        var hoursC = Math.floor(new_min_two / 60);
                        var minutesC = new_min_two % 60;
                        var totalHourNewC = parseInt(new_hrs_two) + parseInt(hoursC);
                        var totalMinutesNewC = parseInt(minutesC);
                        total2 = totalHourNewC + ':' + totalMinutesNewC;
                    }
                }

                if (val2 != '') {
                    //billable2 = val2;
                    if (billable2 == 0) {
                        billable2 = val2;
                    } else {
                        new_billable_one = billable2.split(":");
                        new_val2 = val2.split(":");
                        new_hrs_billable_one = parseInt(new_billable_one[0]) + parseInt(new_val2[0]);
                        new_min_billable_one = parseInt(new_billable_one[1]) + parseInt(new_val2[1]);

                        var hours_billable_one = Math.floor(new_min_billable_one / 60);
                        var minutes_billable_one = new_min_billable_one % 60;
                        var totalHourNew_billable_one = parseInt(new_hrs_billable_one) + parseInt(hours_billable_one);
                        var totalMinutesNew_billable_one = parseInt(minutes_billable_one);
                        billable2 = totalHourNew_billable_one + ':' + totalMinutesNew_billable_one;
                    }
                }


                if (val3 != '') {
                    //unbillable2 = val3;
                    if (unbillable2 == 0) {
                        unbillable2 = val3;
                    } else {
                        new_unbillable_one = unbillable2.split(":");
                        new_val3 = val3.split(":");
                        new_hrs_unbillable_one = parseInt(new_unbillable_one[0]) + parseInt(new_val3[0]);
                        new_min_unbillable_one = parseInt(new_unbillable_one[1]) + parseInt(new_val3[1]);

                        var hours_unbillable_one = Math.floor(new_min_unbillable_one / 60);
                        var minutes_unbillable_one = new_min_unbillable_one % 60;
                        var totalHourNew_unbillable_one = parseInt(new_hrs_unbillable_one) + parseInt(hours_unbillable_one);
                        var totalMinutesNew_unbillable_one = parseInt(minutes_unbillable_one);
                        unbillable2 = totalHourNew_unbillable_one + ':' + totalMinutesNew_unbillable_one;
                    }
                }

            });
            var obj = $('.day3 span');
            $.each(obj, function(key, value) {
                var val = obj.eq(key).text();
                var val2 = obj.eq(key).attr('data-billable');
                var val3 = obj.eq(key).attr('data-unbillable');

                if (val != "") {
                    //total3 = val;

                    if (total3 == 0) {
                        total3 = val;
                    } else {
                        new_three = total3.split(":");
                        new_val = val.split(":");
                        new_hrs_three = parseInt(new_three[0]) + parseInt(new_val[0]);
                        new_min_three = parseInt(new_three[1]) + parseInt(new_val[1]);

                        var hoursD = Math.floor(new_min_three / 60);
                        var minutesD = new_min_three % 60;
                        var totalHourNewD = parseInt(new_hrs_three) + parseInt(hoursD);
                        var totalMinutesNewD = parseInt(minutesD);

                        total3 = totalHourNewD + ':' + totalMinutesNewD;
                    }

                }
                if (val2 != '') {

                    //billable3 = val2;
                    if (billable3 == 0) {
                        billable3 = val2;
                    } else {
                        new_billable_one = billable3.split(":");
                        new_val2 = val2.split(":");
                        new_hrs_billable_one = parseInt(new_billable_one[0]) + parseInt(new_val2[0]);
                        new_min_billable_one = parseInt(new_billable_one[1]) + parseInt(new_val2[1]);

                        var hours_billable_one = Math.floor(new_min_billable_one / 60);
                        var minutes_billable_one = new_min_billable_one % 60;
                        var totalHourNew_billable_one = parseInt(new_hrs_billable_one) + parseInt(hours_billable_one);
                        var totalMinutesNew_billable_one = parseInt(minutes_billable_one);

                        billable3 = totalHourNew_billable_one + ':' + totalMinutesNew_billable_one;
                    }

                }
                if (val3 != '') {

                    //unbillable3 = val3;
                    if (unbillable3 == 0) {
                        unbillable3 = val3;
                    } else {
                        new_unbillable_one = unbillable3.split(":");
                        new_val3 = val3.split(":");
                        new_hrs_unbillable_one = parseInt(new_unbillable_one[0]) + parseInt(new_val3[0]);
                        new_min_unbillable_one = parseInt(new_unbillable_one[1]) + parseInt(new_val3[1]);

                        var hours_unbillable_one = Math.floor(new_min_unbillable_one / 60);
                        var minutes_unbillable_one = new_min_unbillable_one % 60;
                        var totalHourNew_unbillable_one = parseInt(new_hrs_unbillable_one) + parseInt(hours_unbillable_one);
                        var totalMinutesNew_unbillable_one = parseInt(minutes_unbillable_one);

                        unbillable3 = totalHourNew_unbillable_one + ':' + totalMinutesNew_unbillable_one;
                    }
                }

            });
            var obj = $('.day4 span');
            $.each(obj, function(key, value) {
                var val = obj.eq(key).text();
                var val2 = obj.eq(key).attr('data-billable');
                var val3 = obj.eq(key).attr('data-unbillable');

                if (val != "") {
                    //total4 = val;

                    if (total4 == 0) {
                        total4 = val;
                    } else {
                        new_four = total4.split(":");
                        new_val = val.split(":");
                        new_hrs_four = parseInt(new_four[0]) + parseInt(new_val[0]);
                        new_min_four = parseInt(new_four[1]) + parseInt(new_val[1]);

                        var hoursE = Math.floor(new_min_four / 60);
                        var minutesE = new_min_four % 60;
                        var totalHourNewE = parseInt(new_hrs_four) + parseInt(hoursE);
                        var totalMinutesNewE = parseInt(minutesE);

                        total4 = totalHourNewE + ':' + totalMinutesNewE;
                    }

                }
                if (val2 != '') {

                    //billable4 = val2;
                    if (billable4 == 0) {
                        billable4 = val2;
                    } else {
                        new_billable_one = billable4.split(":");
                        new_val2 = val2.split(":");
                        new_hrs_billable_one = parseInt(new_billable_one[0]) + parseInt(new_val2[0]);
                        new_min_billable_one = parseInt(new_billable_one[1]) + parseInt(new_val2[1]);

                        var hours_billable_one = Math.floor(new_min_billable_one / 60);
                        var minutes_billable_one = new_min_billable_one % 60;
                        var totalHourNew_billable_one = parseInt(new_hrs_billable_one) + parseInt(hours_billable_one);
                        var totalMinutesNew_billable_one = parseInt(minutes_billable_one);

                        billable4 = totalHourNew_billable_one + ':' + totalMinutesNew_billable_one;
                    }

                }
                if (val3 != '') {

                    //unbillable4 = val3;
                    if (unbillable4 == 0) {
                        unbillable4 = val3;
                    } else {
                        new_unbillable_one = unbillable4.split(":");
                        new_val3 = val3.split(":");
                        new_hrs_unbillable_one = parseInt(new_unbillable_one[0]) + parseInt(new_val3[0]);
                        new_min_unbillable_one = parseInt(new_unbillable_one[1]) + parseInt(new_val3[1]);

                        var hours_unbillable_one = Math.floor(new_min_unbillable_one / 60);
                        var minutes_unbillable_one = new_min_unbillable_one % 60;
                        var totalHourNew_unbillable_one = parseInt(new_hrs_unbillable_one) + parseInt(hours_unbillable_one);
                        var totalMinutesNew_unbillable_one = parseInt(minutes_unbillable_one);

                        unbillable4 = totalHourNew_unbillable_one + ':' + totalMinutesNew_unbillable_one;
                    }
                }


            });
            var obj = $('.day5 span');
            $.each(obj, function(key, value) {
                var val = obj.eq(key).text();
                var val2 = obj.eq(key).attr('data-billable');
                var val3 = obj.eq(key).attr('data-unbillable');

                if (val != "") {
                    //total5 = val;

                    if (total5 == 0) {
                        total5 = val;
                    } else {
                        new_five = total5.split(":");
                        new_val = val.split(":");
                        new_hrs_five = parseInt(new_five[0]) + parseInt(new_val[0]);
                        new_min_five = parseInt(new_five[1]) + parseInt(new_val[1]);

                        var hoursF = Math.floor(new_min_five / 60);
                        var minutesF = new_min_five % 60;
                        var totalHourNewF = parseInt(new_hrs_five) + parseInt(hoursF);
                        var totalMinutesNewF = parseInt(minutesF);

                        total5 = totalHourNewF + ':' + totalMinutesNewF;
                    }

                }
                if (val2 != '') {

                    //billable5 = val2;
                    if (billable5 == 0) {
                        billable5 = val2;
                    } else {
                        new_billable_one = billable5.split(":");
                        new_val2 = val2.split(":");
                        new_hrs_billable_one = parseInt(new_billable_one[0]) + parseInt(new_val2[0]);
                        new_min_billable_one = parseInt(new_billable_one[1]) + parseInt(new_val2[1]);

                        var hours_billable_one = Math.floor(new_min_billable_one / 60);
                        var minutes_billable_one = new_min_billable_one % 60;
                        var totalHourNew_billable_one = parseInt(new_hrs_billable_one) + parseInt(hours_billable_one);
                        var totalMinutesNew_billable_one = parseInt(minutes_billable_one);

                        billable5 = totalHourNew_billable_one + ':' + totalMinutesNew_billable_one;
                    }

                }
                if (val3 != '') {

                    //unbillable5 = val3;
                    if (unbillable5 == 0) {
                        unbillable5 = val3;
                    } else {
                        new_unbillable_one = unbillable5.split(":");
                        new_val3 = val3.split(":");
                        new_hrs_unbillable_one = parseInt(new_unbillable_one[0]) + parseInt(new_val3[0]);
                        new_min_unbillable_one = parseInt(new_unbillable_one[1]) + parseInt(new_val3[1]);

                        var hours_unbillable_one = Math.floor(new_min_unbillable_one / 60);
                        var minutes_unbillable_one = new_min_unbillable_one % 60;
                        var totalHourNew_unbillable_one = parseInt(new_hrs_unbillable_one) + parseInt(hours_unbillable_one);
                        var totalMinutesNew_unbillable_one = parseInt(minutes_unbillable_one);

                        unbillable5 = totalHourNew_unbillable_one + ':' + totalMinutesNew_unbillable_one;
                    }

                }



            });
            var obj = $('.day6 span');
            $.each(obj, function(key, value) {
                var val = obj.eq(key).text();
                var val2 = obj.eq(key).attr('data-billable');
                var val3 = obj.eq(key).attr('data-unbillable');


                if (val != "") {
                    //total6 = val;

                    if (total6 == 0) {
                        total6 = val;
                    } else {
                        new_six = total6.split(":");
                        new_val = val.split(":");
                        new_hrs_six = parseInt(new_six[0]) + parseInt(new_val[0]);
                        new_min_six = parseInt(new_six[1]) + parseInt(new_val[1]);

                        var hoursG = Math.floor(new_min_six / 60);
                        var minutesG = new_min_six % 60;
                        var totalHourNewG = parseInt(new_hrs_six) + parseInt(hoursG);
                        var totalMinutesNewG = parseInt(minutesG);

                        total6 = totalHourNewG + ':' + totalMinutesNewG;
                    }
                }
                if (val2 != '') {

                    //billable6 = val2;
                    if (billable6 == 0) {
                        billable6 = val2;
                    } else {
                        new_billable_one = billable6.split(":");
                        new_val2 = val2.split(":");
                        new_hrs_billable_one = parseInt(new_billable_one[0]) + parseInt(new_val2[0]);
                        new_min_billable_one = parseInt(new_billable_one[1]) + parseInt(new_val2[1]);

                        var hours_billable_one = Math.floor(new_min_billable_one / 60);
                        var minutes_billable_one = new_min_billable_one % 60;
                        var totalHourNew_billable_one = parseInt(new_hrs_billable_one) + parseInt(hours_billable_one);
                        var totalMinutesNew_billable_one = parseInt(minutes_billable_one);

                        billable6 = totalHourNew_billable_one + ':' + totalMinutesNew_billable_one;
                    }

                }
                if (val3 != '') {

                    //unbillable6 = val3;
                    if (unbillable6 == 0) {
                        unbillable6 = val3;
                    } else {
                        new_unbillable_one = unbillable6.split(":");
                        new_val3 = val3.split(":");
                        new_hrs_unbillable_one = parseInt(new_unbillable_one[0]) + parseInt(new_val3[0]);
                        new_min_unbillable_one = parseInt(new_unbillable_one[1]) + parseInt(new_val3[1]);

                        var hours_unbillable_one = Math.floor(new_min_unbillable_one / 60);
                        var minutes_unbillable_one = new_min_unbillable_one % 60;
                        var totalHourNew_unbillable_one = parseInt(new_hrs_unbillable_one) + parseInt(hours_unbillable_one);
                        var totalMinutesNew_unbillable_one = parseInt(minutes_unbillable_one);

                        unbillable6 = totalHourNew_unbillable_one + ':' + totalMinutesNew_unbillable_one;
                    }

                }





            });
            var obj = $('.day7 span');
            $.each(obj, function(key, value) {
                var val = obj.eq(key).text();
                var val2 = obj.eq(key).attr('data-billable');
                var val3 = obj.eq(key).attr('data-unbillable');


                if (val != "") {
                    if (total7 == 0) {
                        total7 = val;
                    } else {
                        new_seven = total7.split(":");
                        new_val = val.split(":");
                        new_hrs = parseInt(new_seven[0]) + parseInt(new_val[0]);
                        new_min = parseInt(new_seven[1]) + parseInt(new_val[1]);

                        var hoursA = Math.floor(new_min / 60);
                        var minutesA = new_min % 60;
                        var totalHourNewA = parseInt(new_hrs) + parseInt(hoursA);
                        var totalMinutesNewA = parseInt(minutesA);

                        total7 = totalHourNewA + ':' + totalMinutesNewA;
                    }

                }
                if (val2 != '') {

                    //billable7 = val2;
                    if (billable7 == 0) {
                        billable7 = val2;
                    } else {
                        new_billable_one = billable7.split(":");
                        new_val2 = val2.split(":");
                        new_hrs_billable_one = parseInt(new_billable_one[0]) + parseInt(new_val2[0]);
                        new_min_billable_one = parseInt(new_billable_one[1]) + parseInt(new_val2[1]);

                        var hours_billable_one = Math.floor(new_min_billable_one / 60);
                        var minutes_billable_one = new_min_billable_one % 60;
                        var totalHourNew_billable_one = parseInt(new_hrs_billable_one) + parseInt(hours_billable_one);
                        var totalMinutesNew_billable_one = parseInt(minutes_billable_one);

                        billable7 = totalHourNew_billable_one + ':' + totalMinutesNew_billable_one;
                    }

                }
                if (val3 != '') {

                    //unbillable7 = val3;
                    if (unbillable7 == 0) {
                        unbillable7 = val3;
                    } else {
                        new_unbillable_one = unbillable7.split(":");
                        new_val3 = val3.split(":");
                        new_hrs_unbillable_one = parseInt(new_unbillable_one[0]) + parseInt(new_val3[0]);
                        new_min_unbillable_one = parseInt(new_unbillable_one[1]) + parseInt(new_val3[1]);

                        var hours_unbillable_one = Math.floor(new_min_unbillable_one / 60);
                        var minutes_unbillable_one = new_min_unbillable_one % 60;
                        var totalHourNew_unbillable_one = parseInt(new_hrs_unbillable_one) + parseInt(hours_unbillable_one);
                        var totalMinutesNew_unbillable_one = parseInt(minutes_unbillable_one);

                        unbillable7 = totalHourNew_unbillable_one + ':' + totalMinutesNew_unbillable_one;
                    }

                }




            });


            // var grand_total = total1 + total2 + total3 + total4 + total5 + total6 + total7;

            if (total1 == 0) {
                total1 = '0:0';
                var total1New = total1.split(":");
            } else {
                var total1New = total1.split(":");
            }
            if (total2 == 0) {
                total2 = '0:0';
                var total2New = total2.split(":");
            } else {
                var total2New = total2.split(":");
            }
            if (total3 == 0) {
                total3 = '0:0';
                var total3New = total3.split(":");
            } else {
                var total3New = total3.split(":");
            }
            if (total4 == 0) {
                total4 = '0:0';
                var total4New = total4.split(":");
            } else {
                var total4New = total4.split(":");
            }
            if (total5 == 0) {
                total5 = '0:0';
                var total5New = total5.split(":");
            } else {
                var total5New = total5.split(":");
            }
            if (total6 == 0) {
                total6 = '0:0';
                var total6New = total6.split(":");
            } else {
                var total6New = total6.split(":");
            }
            if (total7 == 0) {
                total7 = '0:0';
                var total7New = total7.split(":");
            } else {
                var total7New = total7.split(":");
            }

            var totalHour = parseInt(total1New[0]) + parseInt(total2New[0]) + parseInt(total3New[0]) + parseInt(total4New[0]) + parseInt(total5New[0]) + parseInt(total6New[0]) + parseInt(total7New[0]);
            var totalMinutes = parseInt(total1New[1]) + parseInt(total2New[1]) + parseInt(total3New[1]) + parseInt(total4New[1]) + parseInt(total5New[1]) + parseInt(total6New[1]) + parseInt(total7New[1]);

            var hours = Math.floor(totalMinutes / 60);
            var minutes = totalMinutes % 60;
            var totalHourNew = parseInt(totalHour) + parseInt(hours);
            var totalMinutesNew = parseInt(minutes);
            var grand_total = totalHourNew + ':' + totalMinutesNew;


            var grand_billable = billable1 + billable2 + billable3 + billable4 + billable5 + billable6 + billable7;
            var grand_unbillable = unbillable1 + unbillable2 + unbillable3 + unbillable4 + unbillable5 + unbillable6 + unbillable7;

            if (billable1 == 0) {
                billable1 = '0:0';
                var billable1New = billable1.split(":");
            } else {
                var billable1New = billable1.split(":");
            }
            if (billable2 == 0) {
                billable2 = '0:0';
                var billable2New = billable2.split(":");
            } else {
                var billable2New = billable2.split(":");
            }
            if (billable3 == 0) {
                billable3 = '0:0';
                var billable3New = billable3.split(":");
            } else {
                var billable3New = billable3.split(":");
            }
            if (billable4 == 0) {
                billable4 = '0:0';
                var billable4New = billable4.split(":");
            } else {
                var billable4New = billable4.split(":");
            }
            if (billable5 == 0) {
                billable5 = '0:0';
                var billable5New = billable5.split(":");
            } else {
                var billable5New = billable5.split(":");
            }
            if (billable6 == 0) {
                billable6 = '0:0';
                var billable6New = billable6.split(":");
            } else {
                var billable6New = billable6.split(":");
            }
            if (billable7 == 0) {
                billable7 = '0:0';
                var billable7New = billable7.split(":");
            } else {
                var billable7New = billable7.split(":");
            }

            var totalHourbillable = parseInt(billable1New[0]) + parseInt(billable2New[0]) + parseInt(billable3New[0]) + parseInt(billable4New[0]) + parseInt(billable5New[0]) + parseInt(billable6New[0]) + parseInt(billable7New[0]);
            var totalMinutesbillable = parseInt(billable1New[1]) + parseInt(billable2New[1]) + parseInt(billable3New[1]) + parseInt(billable4New[1]) + parseInt(billable5New[1]) + parseInt(billable6New[1]) + parseInt(billable7New[1]);

            var hoursbillable = Math.floor(totalMinutesbillable / 60);
            var minutesbillable = totalMinutesbillable % 60;
            var totalHourbillableNew = parseInt(totalHourbillable) + parseInt(hoursbillable);
            var totalMinutesbillableNew = parseInt(minutesbillable);

            var grand_billable = totalHourbillableNew + ':' + totalMinutesbillableNew;


            if (unbillable1 == 0) {
                unbillable1 = '0:0';
                var unbillable1New = unbillable1.split(":");
            } else {
                var unbillable1New = unbillable1.split(":");
            }
            if (unbillable2 == 0) {
                unbillable2 = '0:0';
                var unbillable2New = unbillable2.split(":");
            } else {
                var unbillable2New = unbillable2.split(":");
            }
            if (unbillable3 == 0) {
                unbillable3 = '0:0';
                var unbillable3New = unbillable3.split(":");
            } else {
                var unbillable3New = unbillable3.split(":");
            }
            if (unbillable4 == 0) {
                unbillable4 = '0:0';
                var unbillable4New = unbillable4.split(":");
            } else {
                var unbillable4New = unbillable4.split(":");
            }
            if (unbillable5 == 0) {
                unbillable5 = '0:0';
                var unbillable5New = unbillable5.split(":");
            } else {
                var unbillable5New = unbillable5.split(":");
            }
            if (unbillable6 == 0) {
                unbillable6 = '0:0';
                var unbillable6New = unbillable6.split(":");
            } else {
                var unbillable6New = unbillable6.split(":");
            }
            if (unbillable7 == 0) {
                unbillable7 = '0:0';
                var unbillable7New = unbillable7.split(":");
            } else {
                var unbillable7New = unbillable7.split(":");
            }

            var totalHourunbillable = parseInt(unbillable1New[0]) + parseInt(unbillable2New[0]) + parseInt(unbillable3New[0]) + parseInt(unbillable4New[0]) + parseInt(unbillable5New[0]) + parseInt(unbillable6New[0]) + parseInt(unbillable7New[0]);
            var totalMinutesunbillable = parseInt(unbillable1New[1]) + parseInt(unbillable2New[1]) + parseInt(unbillable3New[1]) + parseInt(unbillable4New[1]) + parseInt(unbillable5New[1]) + parseInt(unbillable6New[1]) + parseInt(unbillable7New[1]);

            var hoursunbillable = Math.floor(totalMinutesunbillable / 60);
            var minutesunbillable = totalMinutesunbillable % 60;
            var totalHourunbillableNew = parseInt(totalHourunbillable) + parseInt(hoursunbillable);
            var totalMinutesunbillableNew = parseInt(minutesunbillable);

            var grand_unbillable = totalHourunbillableNew + ':' + totalMinutesunbillableNew;



            $('#total1 span').text(total1);
            $('#total2 span').text(total2);
            $('#total3 span').text(total3);
            $('#total4 span').text(total4);
            $('#total5 span').text(total5);
            $('#total6 span').text(total6);
            $('#total7 span').text(total7);
            $('#total6 span').text(total6);
            $('#total7 span').text(total7);
            $('#grand_total span').text(grand_total);
            $('#billable1 span').text(billable1);
            $('#billable2 span').text(billable2);
            $('#billable3 span').text(billable3);
            $('#billable4 span').text(billable4);
            $('#billable5 span').text(billable5);
            $('#billable6 span').text(billable6);
            $('#billable7 span').text(billable7);
            $('#grand_billable span').text(grand_billable);
            $('#unbillable1 span').text(unbillable1);
            $('#unbillable2 span').text(unbillable2);
            $('#unbillable3 span').text(unbillable3);
            $('#unbillable4 span').text(unbillable4);
            $('#unbillable5 span').text(unbillable5);
            $('#unbillable6 span').text(unbillable6);
            $('#unbillable7 span').text(unbillable7);
            $('#grand_unbillable span').text(grand_unbillable);
            $('#modal-add').on('shown.bs.modal', function() {
                $('#add_timesheet_info').bootstrapValidator('resetForm', true);
                $('#client_name').prop('selectedIndex', 0);
                $('#activity_name').prop('selectedIndex', 0);
                $('#subactivity_name').html('<option value="">Select</option>');
                $('#task_name').html('<option value="">Select</option>');
                $('#timepicker1').timepicker('setTime', '00:00:00');
                $('#timepicker6').timepicker('setTime', '00:00:00');
                $('#add_billable label i').removeClass('checked');

            });

            $('#add_timesheet_info').bootstrapValidator({
                    message: 'This value is not valid',
                    feedbackIcons: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        timesheet_date: {
                            validators: {
                                notEmpty: {
                                    message: 'This field is required'
                                }
                            }
                        },
                        project_name: {
                            validators: {
                                notEmpty: {
                                    message: 'This field is required'
                                }
                            }
                        },
                        activity_name: {
                            validators: {
                                notEmpty: {
                                    message: 'This field is required'
                                }
                            }
                        },
                        subactivity_name: {
                            validators: {
                                notEmpty: {
                                    message: 'This field is required'
                                }
                            }
                        },
                        time_units: {
                            validators: {
                                callback: {
                                    message: 'This field is required',
                                    callback: function(value, validator, $field) {
                                        console.log(value);
                                        // document.getElementById("subactivity_name").selectedIndex = 0;
                                        $('#subactivity_name').prop('selectedIndex', 0);
                                        if (value == '') {
                                            return false;
                                        } else {
                                            return true;
                                        }

                                    }
                                }
                            }
                        },
                        task_name: {
                            validators: {
                                notEmpty: {
                                    message: 'This field is required'
                                }
                            }
                        },
                        reasion_box: {
                            validators: {
                                callback: {
                                    message: 'This field is required',
                                    callback: function(value, validator, $field) {
                                        var consumed_hours = $("#show_consumed_hours").val();
                                        var actual_hours = $("#show_actual_hours").val();
                                        console.log('consumed_hours => ' + consumed_hours + ' actual_hours => ' + actual_hours);
                                        if (consumed_hours > actual_hours) {
                                            if (value == '') {
                                                return false;
                                            } else {
                                                return true;
                                            }
                                        } else {
                                            return true;
                                        }

                                    }
                                }
                            }
                        },
                    }
                })
                .on('success.form.bv', function(e) {
                    e.preventDefault();
                    $('.btn-success').attr("disabled", "disabled");
                    var data = $("#add_timesheet_info").serialize();
                    var mydate = new Date($('#timesheet_date').val());
                    var dd1 = String(mydate.getDate()).padStart(2, '0');
                    var mm1 = String(mydate.getMonth() + 1).padStart(2, '0');
                    var yyyy1 = mydate.getFullYear();

                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0');
                    var yyyy = today.getFullYear();

                    today = mm + '/' + dd + '/' + yyyy;
                    // alert(today);
                    const oneDay = 24 * 60 * 60 * 1000; // 
                    var firstDate = new Date(yyyy, mm, dd);
                    var secondDate = new Date(yyyy1, mm1, dd1);

                    var diffDays = Math.round(Math.abs((firstDate - secondDate) / oneDay));
                    if (diffDays > 2) {
                        alert('Your submission requires admin approval to be considered. Contact admin for approval.');
                    }
                    if (diffDays > 2) {
                        $.ajax({
                            async: true,
                            type: "POST",
                            url: CURRENT_URL + '/timesheet/pending_add_time',
                            dataType: "json",
                            data: data,
                            beforeSend: function() {
                                $("#addloader").show();
                            },
                            success: function(data) {
                                bootbox.alert(data.message, function() {
                                    if (data.status == "SUCCESS") {
                                        $("#modal-add").modal("hide");
                                        window.stop();
                                        location.reload(true);
                                    } else {
                                        $('.btn-success').removeAttr("disabled");
                                    }

                                });

                            },
                            error: function(xhr, status, error) {
                                bootbox.alert(status);
                            },
                            complete: function() {
                                $("#addloader").hide();
                            }
                        });
                    } else {
                        $.ajax({
                            async: true,
                            type: "POST",
                            url: CURRENT_URL + '/timesheet/add_time',
                            dataType: "json",
                            data: data,
                            beforeSend: function() {
                                $("#addloader").show();
                            },
                            success: function(data) {

                                bootbox.alert(data.message, function() {
                                    if (data.status == "SUCCESS") {
                                        $("#modal-add").modal("hide");
                                        window.stop();
                                        location.reload(true);
                                    } else {
                                        $('.btn-success').removeAttr("disabled");
                                    }

                                });

                            },
                            error: function(xhr, status, error) {
                                bootbox.alert(status);
                            },
                            complete: function() {
                                $("#addloader").hide();
                            }
                        });
                    }
                });


            $('#edit_timesheet_info').bootstrapValidator({
                    message: 'This value is not valid',
                    feedbackIcons: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        edit_timesheet_date: {
                            validators: {
                                notEmpty: {
                                    message: 'This field is required'
                                }
                            }
                        },
                        edit_project_name: {
                            validators: {
                                notEmpty: {
                                    message: 'This field is required'
                                }
                            }
                        },
                        edit_activity_name: {
                            validators: {
                                notEmpty: {
                                    message: 'This field is required'
                                }
                            }
                        },
                        edit_subactivity_name: {
                            validators: {
                                notEmpty: {
                                    message: 'This field is required'
                                }
                            }
                        },
                        edit_time_units: {
                            validators: {
                                callback: {
                                    message: 'This field is required',
                                    callback: function(value, validator, $field) {
                                        if (value == '') {
                                            return false;
                                        } else {
                                            return true;
                                        }
                                    }
                                }
                            }
                        },
                        edit_task_name: {
                            validators: {
                                notEmpty: {
                                    message: 'This field is required'
                                }
                            }
                        },
                        edit_reasion_box: {
                            validators: {
                                callback: {
                                    message: 'This field is required',
                                    callback: function(value, validator, $field) {
                                        var consumed_hours = $("#edit_consumed_hours").val();
                                        var actual_hours = $("#edit_actual_hours").val();
                                        if (consumed_hours > actual_hours) {
                                            if (value == '') {
                                                return false;
                                            } else {
                                                return true;
                                            }
                                        } else {
                                            return true;
                                        }

                                    }
                                }
                            }
                        }
                    }
                })
                .on('success.form.bv', function(e) {
                    e.preventDefault();

                    var data = $("#edit_timesheet_info").serialize();

                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/timesheet/submit_edit_time',
                        dataType: "json",
                        data: data,
                        beforeSend: function() {
                            $("#addloader").show();

                        },
                        success: function(data) {
                            $("#modal-edit").modal("hide");
                            bootbox.alert(data.message, function() {
                                if (data.status == "SUCCESS") {

                                    window.stop();
                                    location.reload(true);
                                } else {
                                    $("#modal-edit").modal("show");
                                }

                            });
                        },
                        error: function(xhr, status, error) {
                            alert(status);
                        },
                        complete: function() {
                            $("#addloader").hide();
                        }
                    });



                });


            initTables();
            $('.dataTables_filter').hide();
        });

        function edit_timesheet(id) {
            $('#modal-edit').on('shown.bs.modal', function() {
                $('#edit_timesheet_info').bootstrapValidator('resetForm', true);
                //$('#edit_client_name').prop('selectedIndex',0);
                //$('#edit_activity_name').prop('selectedIndex',0);
                //$('#edit_subactivity_name').prop('selectedIndex',0);
                // $('#edit_task_name').prop('selectedIndex',0);
                //$('#edit_subactivity_name').html('<option value="">Select</option>');
                //$('#edit_task_name').html('<option value="">Select</option>');
                $('#timepicker2').timepicker('setTime', '00:00:00');
                $('#timepicker3').timepicker('setTime', '00:00:00');
                $('#edit_billable label i').removeClass('checked');


                var request = $.ajax({
                    url: CURRENT_URL + '/timesheet/edit_time',
                    type: "POST",
                    data: {
                        timesheet_id: id
                    },
                    dataType: "json"
                });
                request.done(function(msg) {
                    console.log(msg);
                    $.each(msg, function(i, item) {
                        $("#selected_project").val(item.project_id);
                        $('#edit_emp_id').val(item.emp_id);
                        $('#edit_timesheet_id').val(item.timesheet_id);
                        $('#edit_timesheet_date').val(item.timesheet_date);
                        $('#edit_disbursement').val(item.disbursement);
                        var start = item.start_time.split(":");
                        var end = item.end_time.split(":");
                        $('#timepicker2').val(start[0] + ':' + start[1]);
                        $('#timepicker3').val(end[0] + ':' + end[1]);
                        $("#edit_client_name option").each(function() {
                            if ($(this).text() == item.client_name) {
                                $("#edit_client_name").select2("data", {
                                    id: item.client_name,
                                    text: item.client_name
                                });
                            }
                        });

                        //$('#edit_client_name').val(item.client_name);
                        $('#edit_activity_name').val(item.activity_name);

                        get_project(item.client_name, 'edit_project_name')
                        setTimeout(function() {
                            $('#edit_project_name').val(item.project_name);
                        }, 2000);

                        //$('#edit_activity_name').val(item.activity_name);
                        get_subactivity(item.activity_name, 'edit_subactivity_name');
                        setTimeout(function() {
                            $('#edit_subactivity_name').val(item.subactivity_name);
                            $('#edit_timesheet_info').bootstrapValidator('revalidateField', 'edit_subactivity_name');
                        }, 500);

                        get_task(item.subactivity_name, 'edit_task_name');
                        setTimeout(function() {
                            $('#edit_task_name').val(item.task_name);
                        }, 200);

                        $('#edit_task_name').val(item.task_name);
                        if (item.consume_hours > 0) {
                            $('#edit_consumed_hours').val(item.consume_hours);
                            $('#show_edit_consumed_hours').show();
                        } else {
                            $('#show_edit_consumed_hours').hide();
                        }
                        if (item.actual_hours > 0) {
                            $('#edit_actual_hours').val(item.actual_hours);
                            $('#show_edit_actual_hours').show();
                        } else {
                            $('#show_edit_actual_hours').hide();
                        }
                        $('#edit_reasion_box').val(item.reason_to_exceed_time);

                        $('#edit_billable').val(item.billable);
                        if (item.billable == 1) {
                            $('.editBil i').addClass('checked');
                        }
                        $('#edittimeunits').val(item.time_units);

                        $('#edittimeminutes').val(item.time_minutes);

                        $('#edit_comments').val(item.comments);


                    });
                });
                request.fail(function(jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
            });
        }

        function delete_timesheet(id) {
            bootbox.confirm("Are you sure you want to remove timesheet information?", function(result) {

                if (result == true) {

                    var request = $.ajax({
                        url: CURRENT_URL + '/timesheet/delete_time',
                        type: "POST",
                        data: {
                            timesheet_id: id
                        },
                        dataType: "json"
                    });
                    request.done(function(data) {
                        bootbox.alert(data.message, function() {
                            if (data.status == "SUCCESS") {

                                window.stop();
                                location.reload();
                            }


                        });
                    });
                    request.fail(function(jqXHR, textStatus) {
                        alert("Request failed: " + textStatus);
                    });
                }
            });

        }

        function approve_status(timesheet_id, time_status) {
            bootbox.confirm("Are you sure you want to approve this Timesheet?", function(result) {
                if (result == true) {
                    var comp = new Object();

                    comp.timesheet_id = timesheet_id;
                    comp.time_status = time_status;
                    comp.emp_id = '<?php echo $user_detail[0]->id; ?>';
                    comp.empId = '<?php echo $user_detail[0]->empId; ?>';
                    comp.empName = '<?php echo $user_detail[0]->empName; ?>';
                    comp.emailId = '<?php echo $user_detail[0]->emailId; ?>';
                    comp.start_date = '<?php echo date('d F Y', strtotime($start_date)); ?>';
                    comp.end_date = '<?php echo date('d F Y', strtotime($end_date)); ?>';



                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/timesheet/change_time_status',
                        dataType: "json",
                        data: $.param(comp),
                        beforeSend: function() {
                            $("#addloader").show();
                        },
                        success: function(data) {

                            $('#modal-login').modal("hide");

                            if (data.status == "SUCCESS") {
                                bootbox.alert(data.message, function() {
                                    //$('#action_btn_'+employee_leave_id).html('');
                                    //calBalanceLeave('',year);
                                    location.reload();

                                });
                            } else {
                                bootbox.alert(data.message, function() {
                                    location.reload();
                                });
                            }


                        },
                        error: function(xhr, status, error) {
                            bootbox.alert(status);
                        },
                        complete: function() {
                            $("#addloader").hide();
                        }
                    });

                }
            });


        }

        function submit_status(timesheet_id, time_status) {

            var comp = new Object();
            comp.timesheet_id = timesheet_id;
            comp.time_status = time_status;
            comp.emp_id = '<?php echo $user_detail[0]->id; ?>';
            comp.empId = '<?php echo $user_detail[0]->empId; ?>';
            comp.empName = '<?php echo $user_detail[0]->empName; ?>';
            comp.emailId = '<?php echo $user_detail[0]->emailId; ?>';
            comp.start_date = '<?php echo date('d F Y', strtotime($start_date)); ?>';
            comp.end_date = '<?php echo date('d F Y', strtotime($end_date)); ?>';
            comp.managerId = '<?php echo $user_detail[0]->managerId; ?>';

            $.ajax({
                async: true,
                type: "POST",
                url: CURRENT_URL + '/timesheet/change_time_status',
                dataType: "json",
                data: $.param(comp),
                beforeSend: function() {
                    $("#addloader").show();
                },
                success: function(data) {
                    $('#modal-login').modal("hide");
                    if (data.status == "SUCCESS") {
                        bootbox.alert(data.message, function() {
                            //$('#action_btn_'+employee_leave_id).html('');
                            //calBalanceLeave('',year);
                            location.reload();

                        });
                    } else {
                        bootbox.alert(data.message, function() {
                            location.reload();
                        });
                    }
                },
                error: function(xhr, status, error) {
                    bootbox.alert(status);
                },
                complete: function() {
                    $("#addloader").hide();
                }
            });

        }

        function reject_status(id) {
            bootbox.dialog({
                title: "Reason for Rejection (Optional)",
                message: '<div class="row"> ' +
                    '<div class="col-md-12"> ' +
                    '<form class="form-horizontal" id="reject_time" role="form"> ' +
                    '<div class="form-group"> ' +
                    '<div class="col-md-20"> ' +
                    '<input type="text" id="reason_to_reject" class="form-control" name="reason_to_reject"  placeholder="Hey! please need to fill the description in activity (Miscellaneous)">' +
                    '<input type="hidden" name="timesheet_id" id="timesheet_id" value="' + id + '"> ' +
                    '<input type="hidden" name="time_status" id="time_status" value="Rejected">' +
                    '<input type="hidden" name="empId" id="empId" value="<?php echo $user_detail[0]->empId; ?>"> ' +
                    '<input type="hidden" name="empName" id="empName" value="<?php echo $user_detail[0]->empName; ?>">' +
                    '<input type="hidden" name="emailId" id="emailId" value="<?php echo $user_detail[0]->emailId; ?>">' +
                    '<input type="hidden" name="start_date" id="start_date" value="<?php echo date('d F Y', strtotime($start_date)); ?>">' +
                    '<input type="hidden" name="end_date" id="end_date" value="<?php echo date('d F Y', strtotime($end_date)); ?>">' +
                    '<input type="hidden" name="emp_id" id="emp_id" value="<?php echo $user_detail[0]->id; ?>">' +
                    '</div> ' +
                    '</div> ' +
                    '</div> </div>' +
                    '</form> </div> </div>',
                buttons: {
                    success: {
                        label: "Save",
                        className: "btn-success",
                        callback: function() {
                            var data = $("#reject_time").serialize();
                            var request = $.ajax({
                                url: CURRENT_URL + '/timesheet/change_time_status',
                                type: "POST",
                                data: data,
                                dataType: "json"
                            });
                            request.done(function(data) {
                                bootbox.alert(data.message, function() {
                                    if (data.status == "SUCCESS") {

                                        window.stop();
                                        location.reload();
                                    } else {
                                        location.reload();
                                    }


                                });
                            });
                            request.fail(function(jqXHR, textStatus) {
                                alert("Request failed: " + textStatus);
                            });
                        }
                    },
                    main: {
                        label: "Cancel",
                        className: "btn-danger",
                        callback: function() {
                            bootbox.hideAll()
                        }
                    },
                }
            });
        }

        function get_project(client_name, id) {
            var request = $.ajax({
                url: CURRENT_URL + '/project/get_project_assign_time',
                type: "POST",
                data: {
                    client_name: client_name
                },
                dataType: "html"
            });
            request.done(function(data) {
                $('#' + id).html(data);
            });
            request.fail(function(jqXHR, textStatus) {
                alert("Request failed: " + textStatus);
            });
        }

        function get_activity(project_name, id) {
            var request = $.ajax({
                url: CURRENT_URL + '/activity/get_activity',
                type: "POST",
                data: {
                    project_name: project_name
                },
                dataType: "html"
            });
            request.done(function(data) {
                var res = $.parseJSON(data);
                $("#selected_project").val(res.project_id);
                var option_data = res.option_data;
                $('#' + id).html(option_data);
                $('#add_timesheet_info').bootstrapValidator('revalidateField', 'subactivity_name');
                $('#edit_timesheet_info').bootstrapValidator('revalidateField', 'edit_subactivity_name');
            });
            request.fail(function(jqXHR, textStatus) {
                alert("Request failed: " + textStatus);
            });
        }

        function get_subactivity(activity_name, id) {
            var project_id = $("#selected_project").val();
            var request = $.ajax({
                url: CURRENT_URL + '/subactivity/get_subactivity',
                type: "POST",
                data: {
                    project_id: project_id,
                    activity_name: activity_name
                },
                dataType: "html"
            });
            request.done(function(data) {
                $('#' + id).html(data);
                $('#add_timesheet_info').bootstrapValidator('revalidateField', 'subactivity_name');
                $('#edit_timesheet_info').bootstrapValidator('revalidateField', 'edit_subactivity_name');
            });
            request.fail(function(jqXHR, textStatus) {
                alert("Request failed: " + textStatus);
            });
        }

        function get_task(subactivity_name, id) {
            var project_id = $("#selected_project").val();
            var request = $.ajax({
                url: CURRENT_URL + '/task/get_task',
                type: "POST",
                data: {
                    project_id: project_id,
                    subactivity_name: subactivity_name
                },
                dataType: "html"
            });
            request.done(function(data) {
                $('#' + id).html(data);
            });
            request.fail(function(jqXHR, textStatus) {
                alert("Request failed: " + textStatus);
            });
        }

        function get_task_detail(task_name) {
            var project_name = $("#project_name").val();
            var project_id = $("#selected_project").val();
            var activity_name = $("#activity_name").val();
            var subactivity_name = $("#subactivity_name").val();
            var request = $.ajax({
                url: CURRENT_URL + '/task/get_task_detail',
                type: "POST",
                data: {
                    task_name: task_name,
                    activity_name: activity_name,
                    subactivity_name: subactivity_name,
                    project_id: project_id,
                    project_name: project_name
                },
                dataType: "html"
            });
            request.done(function(data) {
                var res = $.parseJSON(data);
                console.log(res);
                if (res.actual_hours > 0) {
                    if ($("#addtimeunits").val() != "" || $("#addtimeminutes").val() != "") {
                        var addtimehours = parseFloat($("#addtimeunits").val());
                        var addtimeminutes = $("#addtimeminutes").val();

                        var consume_time = res.consume_hours;
                        consume_time = (consume_time).toFixed(2);
                        var getconsumetime = (consume_time).toString().split(".");
                        var getconsumehours = getconsumetime[0]
                        var getconsumeminetes = getconsumetime[1];

                        var consumedhours = +(Number(addtimehours) + Number(getconsumehours)).toFixed(2);

                        var gettotalminutes = +(Number(addtimeminutes) + Number(getconsumeminetes)).toFixed(2);
                        var hours = Math.floor(gettotalminutes / 60);
                        var minutes = gettotalminutes % 60;

                        var totalconsumedhours = +(Number(consumedhours) + Number(hours)).toFixed(2);

                        var totalconsumedtime = totalconsumedhours + '.' + minutes;
                        totalconsumedtime = (Number(totalconsumedtime)).toFixed(2);

                        if (totalconsumedtime == 0) {
                            $("#show_consumed_hours").val(0.00);
                        } else {
                            $("#show_consumed_hours").val(totalconsumedtime);
                            if (totalconsumedtime > res.actual_hours) {
                                $("#reasion_comment_box").show();
                            } else {
                                $("#reasion_comment_box").hide();
                            }
                        }
                    }
                }
                if (res.actual_hours > 0) {
                    $("#show_actual_hours").val(res.actual_hours);
                    $("#actual_hours").show();
                } else {
                    $("#consumed_hours").hide();
                    $("#actual_hours").hide();
                }

            });
            request.fail(function(jqXHR, textStatus) {
                alert("Request failed: " + textStatus);
            });
        }

        function get_edit_task_detail(task_name) {
            var project_name = $("#edit_project_name").val();
            var project_id = $("#selected_project").val();
            var activity_name = $("#edit_activity_name").val();
            var subactivity_name = $("#edit_subactivity_name").val();
            var request = $.ajax({
                url: CURRENT_URL + '/task/get_task_detail',
                type: "POST",
                data: {
                    task_name: task_name,
                    activity_name: activity_name,
                    subactivity_name: subactivity_name,
                    project_id: project_id,
                    project_name: project_name
                },
                // dataType: "html"
            });
            request.done(function(data) {
                var res = $.parseJSON(data);
                if (res.actual_hours > 0) {
                    if ($("#edittimeunits").val() != "" || $("#edittimeminutes").val() != "") {
                        var addtimehours = parseFloat($("#edittimeunits").val());
                        var addtimeminutes = $("#edittimeminutes").val();

                        var consume_time = res.consume_hours;
                        consume_time = (consume_time).toFixed(2);
                        var getconsumetime = (consume_time).toString().split(".");
                        var getconsumehours = getconsumetime[0]
                        var getconsumeminetes = getconsumetime[1];

                        var consumedhours = +(Number(addtimehours) + Number(getconsumehours)).toFixed(2);

                        var gettotalminutes = +(Number(addtimeminutes) + Number(getconsumeminetes)).toFixed(2);
                        var hours = Math.floor(gettotalminutes / 60);
                        var minutes = gettotalminutes % 60;

                        var totalconsumedhours = +(Number(consumedhours) + Number(hours)).toFixed(2);

                        var totalconsumedtime = totalconsumedhours + '.' + minutes;
                        totalconsumedtime = (Number(totalconsumedtime)).toFixed(2);

                        if (totalconsumedtime == 0) {
                            $("#edit_consumed_hours").val(0.00);
                        } else {
                            $("#edit_consumed_hours").val(totalconsumedtime);
                            if (totalconsumedtime > res.actual_hours) {
                                $("#edit_reasion_comment_box").show();
                            } else {
                                $("#edit_reasion_comment_box").hide();
                            }
                        }
                    }
                }
                if (res.actual_hours > 0) {
                    $("#edit_actual_hours").val(res.actual_hours);
                    $("#actual_hours").show();
                }
            });
            request.fail(function(jqXHR, textStatus) {
                alert("Request failed: " + textStatus);
            });
        }
    </script>