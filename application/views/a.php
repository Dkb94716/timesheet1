<?php 
$t = '';
if(isset($_GET['t'])){
    $t = 1;
}
$timesheet_id_str = '';
if (!empty($time_detail)) {
    $i = 0;
    foreach ($time_detail as $time_str) {
        $i++;
        if (count($time_detail) == $i) {
            $timesheet_id_str .= $time_str->timesheet_id;
        } else {
            $timesheet_id_str .= $time_str->timesheet_id . ',';
        }
    }
}
?>
<div class="col-lg-12" style="margin-top:20px;"> 
    <div class="col-sm-8"><h4>Timesheet - <?php echo $user_detail[0]->empName; ?> week of <?php echo date('jS F Y', strtotime($start_date)); ?></h4></div>
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right">
<?php if ($userPrivileges->timesheet->timesheet_status->Add == 1) { ?>
        <a href="#modal-add" data-toggle="modal" class="btn-sm btn-warning pull-right" style="margin-left:8px;">Add Time</a>
<?php }
        if (!empty($time_detail)) {
        if ($time_detail[0]->time_status == 'Pending') {
            if($t==1){
                if ($userPrivileges->timesheet->managetimesheet->weekend_submission == 1) {
                if ($userPrivileges->timesheet->managetimesheet->weekend_submission == 1) {
                    $current_date = date('Y-m-d');
                    if($end_date>$current_date){ ?>
            <a onclick="submit_status('<?php echo $timesheet_id_str; ?>', 'Submitted')" data-toggle="modal" class="btn-sm btn-info pull-right" style="margin-left:8px;cursor: pointer;">Submit for approval</a>
                    <?php }
                }
                }
                }
            else {?>
            <a onclick="approve_status('<?php echo $timesheet_id_str; ?>', 'Approved')" data-toggle="modal" class="btn-sm btn-success pull-right" style="margin-left:8px;cursor: pointer;">Approve</a>
            <a data-toggle="modal" onclick="reject_status('<?php echo $timesheet_id_str; ?>')"  class="btn-sm btn-danger pull-right" style="cursor: pointer;">Reject</a>
        <?php 
            }
            }
        }
        ?>


    </div>
</div>
<div class="innerLR" style="margin-top:60px;">
    <div class="widget widget-body-white widget-heading-simple">
        <div class="widget-body overflow-x" style="padding:10px;">
            <table class="table    table-white overflow-x" id="day_table">
            <!----<table class="dynamicTable tableTools table table-striped overflow-x">---->
                <thead>
                    <tr style="background-color:#c72a25; color:#FFF;">
                        <th class="thead-th-padg">Activity</th>
                        <!--<th class="thead-th-padg">Activity</th>
                        <th class="thead-th-padg center">Billable</th>-->
                        <th class="thead-th-padg center">Monday<br /><span style="font-size: 12px;"><?php echo date('d F Y', strtotime($start_date)); ?></span></th>
                        <th class="thead-th-padg center">Tuesday<br /><span style="font-size: 12px;"><?php echo date('d F Y', strtotime('+1 day', strtotime($start_date))); ?></span></th>
                        <th class="thead-th-padg center">Wednesday<br /><span style="font-size: 12px;"><?php echo date('d F Y', strtotime('+2 day', strtotime($start_date))); ?></span></th>
                        <th class="thead-th-padg center">Thursday<br /><span style="font-size: 12px;"><?php echo date('d F Y', strtotime('+3 day', strtotime($start_date))); ?></span></th>
                        <th class="thead-th-padg center">Friday<br /><span style="font-size: 12px;"><?php echo date('d F Y', strtotime('+4 day', strtotime($start_date))); ?></span></th>
                        <th class="thead-th-padg center">Saturday<br /><span style="font-size: 12px;"><?php echo date('d F Y', strtotime('+5 day', strtotime($start_date))); ?></span></th>
                        <th class="thead-th-padg center">Sunday<br /><span style="font-size: 12px;"><?php echo date('d F Y', strtotime('+6 day', strtotime($start_date))); ?></span></th>
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
                        foreach ($time_by_day_detail as $time_by_day) {

                            if (array_key_exists($time_by_day->activity_name, $time_by_day_arr)) {
                                $day_date=date('d',  strtotime($time_by_day->timesheet_date));
                                //array_push($day_arr,array($time_by_day->day_name => $time_by_day->time_units));
                                if (!empty($day_arr[$day_date])) {
                                    $day_arr[$day_date] = $day_arr[$day_date] + $time_by_day->time_units;
                                    if($time_by_day->billable == 1) 
                                {
                                    $billable = $billable+$time_by_day->time_units;
                                    $billable_arr[$day_date] = $billable;
                                }
                                else{
                                    $unbillable = $unbillable+$time_by_day->time_units;
                                    $unbillable_arr[$day_date] = $unbillable;
                                }
                                } else {
                                    $day_arr[$day_date] = $time_by_day->time_units;
                                    if($time_by_day->billable == 1) 
                                {
                                    $billable = $time_by_day->time_units;
                                    $billable_arr[$day_date] = $billable;
                                }
                                else{
                                    $unbillable = $time_by_day->time_units;
                                    $unbillable_arr[$day_date] = $unbillable;
                                }
                                }
                                $total_units = $total_units + $time_by_day->time_units;
                                
                                
                                $time_by_day_arr[$time_by_day->activity_name] = array(
                                    'client_name' => $time_by_day->client_name,
                                    'activity_name' => $time_by_day->activity_name,
                                    'project_name' => $time_by_day->project_name,
                                    'billable' => $billable_arr,
                                    'unbillable' => $unbillable_arr,
                                    'day_name' => $day_arr,
                                    'total_units' => $total_units,
                                    'day_date' => $day_date
                                );
                            } else {
                                // $time_by_day_arr = array();
                                $day_arr = array();
                                $billable_arr = array();
                                $unbillable_arr = array();
                                $total_units = $time_by_day->time_units;
                                //array_push($day_arr,array($time_by_day->day_name => $time_by_day->time_units));
                                $day_date=date('d',  strtotime($time_by_day->timesheet_date));
                                $day_arr[$day_date] = $time_by_day->time_units;
                                $billable = 0;
                                $unbillable = 0;
                               if($time_by_day->billable == 1) 
                                {
                                    $billable = $time_by_day->time_units;
                                    $billable_arr[$day_date] = $billable;
                                }
                                else{
                                    $unbillable = $time_by_day->time_units;
                                    $unbillable_arr[$day_date] = $unbillable;
                                }
                                
                                $time_by_day_arr[$time_by_day->activity_name] = array(
                                    'client_name' => $time_by_day->client_name,
                                    'activity_name' => $time_by_day->activity_name,
                                    'project_name' => $time_by_day->project_name,
                                    'billable' => $billable_arr,
                                    'unbillable' => $unbillable_arr,
                                    'day_name' => $day_arr,
                                    'total_units' => $total_units,
                                    'day_date' => $day_date
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
                                <td class="center td-padding-top_botton_3 day1"><span class="font-size_12" data-billable="<?php echo (!empty($day_arr['billable'][date('d', strtotime($start_date))])) ? $day_arr['billable'][date('d', strtotime($start_date))] : ''; ?>" data-unbillable="<?php echo (!empty($day_arr['unbillable'][date('d', strtotime($start_date))])) ? $day_arr['unbillable'][date('d', strtotime($start_date))] : ''; ?>"><?php echo (!empty($day_arr['day_name'][date('d', strtotime($start_date))])) ? $day_arr['day_name'][date('d', strtotime($start_date))] : ''; ?></span></td>
                                <td class="center td-padding-top_botton_3 day2"><span class="font-size_12" data-billable="<?php echo (!empty($day_arr['billable'][date('d', strtotime('+1 day', strtotime($start_date)))])) ? $day_arr['billable'][date('d', strtotime('+1 day', strtotime($start_date)))] : ''; ?>" data-unbillable="<?php echo (!empty($day_arr['unbillable'][date('d', strtotime('+1 day', strtotime($start_date)))])) ? $day_arr['unbillable'][date('d', strtotime('+1 day', strtotime($start_date)))] : ''; ?>"><?php echo (!empty($day_arr['day_name'][date('d', strtotime('+1 day', strtotime($start_date)))])) ? $day_arr['day_name'][date('d', strtotime('+1 day', strtotime($start_date)))] : ''; ?></span></td>
                                <td class="center td-padding-top_botton_3 day3"><span class="font-size_12" data-billable="<?php echo (!empty($day_arr['billable'][date('d', strtotime('+2 day', strtotime($start_date)))])) ? $day_arr['billable'][date('d', strtotime('+2 day', strtotime($start_date)))] : ''; ?>" data-unbillable="<?php echo (!empty($day_arr['unbillable'][date('d', strtotime('+2 day', strtotime($start_date)))])) ? $day_arr['unbillable'][date('d', strtotime('+2 day', strtotime($start_date)))] : ''; ?>"><?php echo (!empty($day_arr['day_name'][date('d', strtotime('+2 day', strtotime($start_date)))])) ? $day_arr['day_name'][date('d', strtotime('+2 day', strtotime($start_date)))] : ''; ?></span></td>
                                <td class="center td-padding-top_botton_3 day4"><span class="font-size_12" data-billable="<?php echo (!empty($day_arr['billable'][date('d', strtotime('+3 day', strtotime($start_date)))])) ? $day_arr['billable'][date('d', strtotime('+3 day', strtotime($start_date)))] : ''; ?>" data-unbillable="<?php echo (!empty($day_arr['unbillable'][date('d', strtotime('+3 day', strtotime($start_date)))])) ? $day_arr['unbillable'][date('d', strtotime('+3 day', strtotime($start_date)))] : ''; ?>"><?php echo (!empty($day_arr['day_name'][date('d', strtotime('+3 day', strtotime($start_date)))])) ? $day_arr['day_name'][date('d', strtotime('+3 day', strtotime($start_date)))] : ''; ?></span></td>
                                <td class="center td-padding-top_botton_3 day5"><span class="font-size_12" data-billable="<?php echo (!empty($day_arr['billable'][date('d', strtotime('+4 day', strtotime($start_date)))])) ? $day_arr['billable'][date('d', strtotime('+4 day', strtotime($start_date)))] : ''; ?>" data-unbillable="<?php echo (!empty($day_arr['unbillable'][date('d', strtotime('+4 day', strtotime($start_date)))])) ? $day_arr['unbillable'][date('d', strtotime('+4 day', strtotime($start_date)))] : ''; ?>"><?php echo (!empty($day_arr['day_name'][date('d', strtotime('+4 day', strtotime($start_date)))])) ? $day_arr['day_name'][date('d', strtotime('+4 day', strtotime($start_date)))] : ''; ?></span></td>
                                <td class="center td-padding-top_botton_3 day6"><span class="font-size_12" data-billable="<?php echo (!empty($day_arr['billable'][date('d', strtotime('+5 day', strtotime($start_date)))])) ? $day_arr['billable'][date('d', strtotime('+5 day', strtotime($start_date)))] : ''; ?>" data-unbillable="<?php echo (!empty($day_arr['unbillable'][date('d', strtotime('+5 day', strtotime($start_date)))])) ? $day_arr['unbillable'][date('d', strtotime('+5 day', strtotime($start_date)))] : ''; ?>"><?php echo (!empty($day_arr['day_name'][date('d', strtotime('+5 day', strtotime($start_date)))])) ? $day_arr['day_name'][date('d', strtotime('+5 day', strtotime($start_date)))] : ''; ?></span></td>
                                <td class="center td-padding-top_botton_3 day7"><span class="font-size_12" data-billable="<?php echo (!empty($day_arr['billable'][date('d', strtotime('+6 day', strtotime($start_date)))])) ? $day_arr['billable'][date('d', strtotime('+6 day', strtotime($start_date)))] : ''; ?>" data-unbillable="<?php echo (!empty($day_arr['unbillable'][date('d', strtotime('+6 day', strtotime($start_date)))])) ? $day_arr['unbillable'][date('d', strtotime('+6 day', strtotime($start_date)))] : ''; ?>"><?php echo (!empty($day_arr['day_name'][date('d', strtotime('+6 day', strtotime($start_date)))])) ? $day_arr['day_name'][date('d', strtotime('+6 day', strtotime($start_date)))] : ''; ?></span></td>
                                <td class="center td-padding-top_botton_3"><span class="font-size_12"><?php echo $day_arr['total_units']; ?></span></td>
                            </tr>
        <?php
    }
}else{
?>
                            <tr class="gradeX">
                                <td class="td-padding-top_botton_3" colspan="9"><span class="font-size_12">This week's timesheet does not have any time added.
Click add time to start adding time.</span></td>
                            </tr>
<?php }?>

                    <tr class="bg-gray" style="border-bottom: 5px solid; border-bottom-color: white;">
                        <td class="td-padding-top_botton_3"><span class="font-size_12"><strong>Total</strong></span></td>
                        <!--<td class="td-padding-top_botton_3"><span class="font-size_12"></span></td>
                        <td class="td-padding-top_botton_3"><span class="font-size_12"></span></td>-->
                        <td class="center td-padding-top_botton_3" id="total1"><span class="font-size_12">6</span></td>
                        <td class="center td-padding-top_botton_3" id="total2"><span class="font-size_12">12</span></td>
                        <td class="center td-padding-top_botton_3" id="total3"><span class="font-size_12">9</span></td>
                        <td class="center td-padding-top_botton_3" id="total4"><span class="font-size_12">27</span></td>
                        <td class="center td-padding-top_botton_3" id="total5"><span class="font-size_12">30</span></td>
                        <td class="center td-padding-top_botton_3" id="total6"><span class="font-size_12"></span></td>
                        <td class="center td-padding-top_botton_3" id="total7"><span class="font-size_12"></span></td>
                        <td class="center td-padding-top_botton_3" id="grand_total"><span class="font-size_12">0</span></td>
                    </tr>
                    <tr class="bg-gray" style="border-bottom: 5px solid; border-bottom-color: white;">
                        <td class="td-padding-top_botton_3"><span class="font-size_12"><strong>Billable</strong></span></td>
                        <!--<td class="td-padding-top_botton_3"><span class="font-size_12"></span></td>
                        <td class="td-padding-top_botton_3"><span class="font-size_12"></span></td>-->
                        <td class="center td-padding-top_botton_3" id="billable1"><span class="font-size_12">6</span></td>
                        <td class="center td-padding-top_botton_3" id="billable2"><span class="font-size_12">8</span></td>
                        <td class="center td-padding-top_botton_3" id="billable3"><span class="font-size_12">6</span></td>
                        <td class="center td-padding-top_botton_3" id="billable4"><span class="font-size_12">27</span></td>
                        <td class="center td-padding-top_botton_3" id="billable5"><span class="font-size_12">30</span></td>
                        <td class="center td-padding-top_botton_3" id="billable6"><span class="font-size_12"></span></td>
                        <td class="center td-padding-top_botton_3" id="billable7"><span class="font-size_12"></span></td>
                        <td class="center td-padding-top_botton_3" id="grand_billable"><span class="font-size_12">0</span></td>
                    </tr>
                    <tr class="bg-gray" style="border-bottom: 5px solid; border-bottom-color: white;">
                        <td class="td-padding-top_botton_3"><span class="font-size_12"><strong>UnBillable</strong></span></td>
                        <!--<td class="td-padding-top_botton_3"><span class="font-size_12"></span></td>
                        <td class="td-padding-top_botton_3"><span class="font-size_12"></span></td>-->
                        <td class="center td-padding-top_botton_3" id="unbillable1"><span class="font-size_12">0</span></td>
                        <td class="center td-padding-top_botton_3" id="unbillable2"><span class="font-size_12">4</span></td>
                        <td class="center td-padding-top_botton_3" id="unbillable3"><span class="font-size_12">3</span></td>
                        <td class="center td-padding-top_botton_3" id="unbillable4"><span class="font-size_12">0</span></td>
                        <td class="center td-padding-top_botton_3" id="unbillable5"><span class="font-size_12">0</span></td>
                        <td class="center td-padding-top_botton_3" id="unbillable6"><span class="font-size_12"></span></td>
                        <td class="center td-padding-top_botton_3" id="unbillable7"><span class="font-size_12"></span></td>
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
            <div class="col-md-8" style="padding: 0px;"><h4 style="padding-top: 0px;">Details activities - <?php echo $user_detail[0]->empName; ?> week of <?php echo date('jS F Y', strtotime($start_date)); ?></h4></div>
            
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
                        <th class="thead-th-padg center">Sub Activity</th>
                        <th class="thead-th-padg center">Description</th>
                        <th class="thead-th-padg center">Date</th>
                        <th class="thead-th-padg center">Time</th>
                        <th class="thead-th-padg center">Billable</th>
                        <th class="thead-th-padg center"></th>
                        <th class="thead-th-padg center"></th>
                    </tr>
                </thead>
                <tbody>
<?php
if (!empty($time_detail)) {
    foreach ($time_detail as $time) {
        ?>
                            <tr class="gradeX">
                                <td class="td-padding-top_botton_3"><span class="font-size_12"><?php echo $time->client_name; ?></span></td>
                                <td class="td-padding-top_botton_3"><span class="font-size_12"><?php echo $time->activity_name; ?></span></td>
                                <td class="center td-padding-top_botton_3"><span class="font-size_12"><?php echo $time->subactivity_name; ?></span></td>
                                <td class="center td-padding-top_botton_3"><span class="font-size_12 ellipsis_text"><?php echo $time->comments; ?></span></td>
                                <td class="center td-padding-top_botton_3"><span class="font-size_12"><?php echo date('d F Y', strtotime($time->timesheet_date)); ?></span></td>
                                <td class="center td-padding-top_botton_3"><span class="font-size_12"><?php echo $time->time_units; ?></span></td>
                                <td class="center td-padding-top_botton_3"><span class="font-size_12"><?php echo ($time->billable == 1) ? 'Yes' : 'No'; ?></span></td>
        <?php if ($time->time_status == 'Pending') { ?>
                                    <td class="center td-padding-top_botton_3"><span class="font-size_12"><a href="#modal-edit" data-toggle="modal" style="color:#c72a25;cursor: pointer;" onclick="edit_timesheet('<?php echo $time->timesheet_id; ?>')" ><i class="fa fa-edit"></i></a></span></td>
                                    <td class="center td-padding-top_botton_3"><span class="font-size_12"><a href="#" onclick="delete_timesheet('<?php echo $time->timesheet_id; ?>')" style="color:#c72a25"><i class="fa fa-trash-o"></i></a></span></td>
        <?php } ?>
                            </tr>
                                <?php
                            }
                        }
                        else{
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
<div class="modal fade"  id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 77%;margin-left: 12%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-top: -8px;">&times;</button>
            </div>
            <div class="modal-body">
                <div class="innerAll" style="padding-left: 0; padding-right: 0px;">
                    <div class="innerLR" style="padding-left: 0; padding-right: 0px;">
                        <form class="form-horizontal" role="form" id="add_timesheet_info" style="width: 540px;">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Employee Name</label>
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
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Units</label>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="Units" name="time_units" id="addtimeunits" class="form-control height_25 plahole_font" readonly="">
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
                                    <select class="form-control height_25 plahole_font" name="project_name" id="project_name" style="padding-top: 2px;">

                                        <option value="">Select</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Activity</label>
                                <div class="col-sm-8">
                                    <select class="form-control height_25 plahole_font" name="activity_name" id="activity_name" onchange="get_subactivity(this.value, 'subactivity_name')" style="padding-top: 2px;">
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
                                    <select class="form-control height_25 plahole_font" name="subactivity_name" id="subactivity_name" onchange="get_task(this.value, 'task_name')" style="padding-top: 2px;">
                                        <option value="">Select</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Task</label>
                                <div class="col-sm-8">
                                    <select class="form-control height_25 plahole_font" name="task_name" id="task_name" style="padding-top: 2px;">
                                        <option value="">Select</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Billable</label>
                                <div class="col-sm-8" style="margin-left:5px;" id="add_billable">
                                    <label for="addbillable" class="checkbox-custom col-sm-8">
                                        <i class="fa fa-fw fa-square-o checked"></i>
                                        <input id="addbillable" type="checkbox" name="billable" id="billable" onclick="$(this).attr('value', this.checked ? 1 : 0)" value="0">
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-top: -8px;">&times;</button>
            </div>
            <div class="modal-body">
                <div class="innerAll" style="padding-left: 0; padding-right: 0px;">
                    <div class="innerLR" style="padding-left: 0; padding-right: 0px;">
                        <form class="form-horizontal" role="form" id="edit_timesheet_info" style="width: 540px;">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Employee Name</label>
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
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Units</label>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="Units" name="edit_time_units" id="edittimeunits" class="form-control height_25 plahole_font" readonly="">
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
                                    <select name="edit_client_name" id="edit_client_name"  onchange="get_project(this.value, 'edit_project_name')" style="width:100%;">

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
                                    <select class="form-control height_25 plahole_font" name="edit_activity_name" id="edit_activity_name" onchange="get_subactivity(this.value, 'edit_subactivity_name')"  style="padding-top: 2px;">
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
                                    <select class="form-control height_25 plahole_font" name="edit_task_name" id="edit_task_name" style="padding-top: 2px;">
                                        <option value="">Select</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label inputtext_formating">Billable</label>
                                <div class="col-sm-8" style="margin-left:5px;" id="edit_billable">
                                    <label for="edit_billable" class="checkbox-custom col-sm-8 editBil">
                                        <i class="fa fa-fw fa-square-o checked"></i>
                                        <input type="checkbox" name="edit_billable" id="edit_billable" onclick="$(this).attr('value', this.checked ? 1 : 0)" value="0">
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
                            <input type="hidden" name="edit_timesheet_id" id="edit_timesheet_id" >
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


    <script>
        $(document).ready(function () {
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

            $('#modal-add').on('hidden.bs.modal', function () {
                $('#select2-drop').hide();
                
            });
            $('#modal-edit').on('hidden.bs.modal', function () {
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
            $.each(obj, function (key, value) {
                var val = obj.eq(key).text();
                var val2 = obj.eq(key).attr('data-billable');
                var val3 = obj.eq(key).attr('data-unbillable');
                if (val != "") {
                    total1 = total1 + parseInt(val);
                }


                if (val2 != '') {

                    billable1 = billable1 + parseInt(val2);

                }
                if (val3 != '') {

                    unbillable1 = unbillable1 + +parseInt(val3);

                }

            });
            var obj = $('.day2 span');
            $.each(obj, function (key, value) {
                var val = obj.eq(key).text();
                var val2 = obj.eq(key).attr('data-billable');
                var val3 = obj.eq(key).attr('data-unbillable');
                if (val != "") {
                    total2 = total2 + parseInt(val);
                }
                if (val2 != '') {

                    billable2 = billable2 + parseInt(val2);

                }
                if (val3 != '') {

                    unbillable2 = unbillable2 + +parseInt(val3);

                }

            });
            var obj = $('.day3 span');
            $.each(obj, function (key, value) {
                var val = obj.eq(key).text();
                var val2 = obj.eq(key).attr('data-billable');
                var val3 = obj.eq(key).attr('data-unbillable');
                if (val != "") {
                    total3 = total3 + parseInt(val);
                }
                if (val2 != '') {

                    billable3 = billable3 + parseInt(val2);

                }
                if (val3 != '') {

                    unbillable3 = unbillable3 + +parseInt(val3);

                }
            });
            var obj = $('.day4 span');
            $.each(obj, function (key, value) {
                var val = obj.eq(key).text();
                var val2 = obj.eq(key).attr('data-billable');
                var val3 = obj.eq(key).attr('data-unbillable');
                if (val != "") {
                    total4 = total4 + parseInt(val);
                }
                if (val2 != '') {

                    billable4 = billable4 + parseInt(val2);

                }
                if (val3 != '') {

                    unbillable4 = unbillable4 + +parseInt(val3);

                }
            });
            var obj = $('.day5 span');
            $.each(obj, function (key, value) {
                var val = obj.eq(key).text();
                var val2 = obj.eq(key).attr('data-billable');
                var val3 = obj.eq(key).attr('data-unbillable');
                if (val != "") {
                    total5 = total5 + parseInt(val);
                }
               if (val2 != '') {

                    billable5 = billable5 + parseInt(val2);

                }
                if (val3 != '') {

                    unbillable5 = unbillable5 + +parseInt(val3);

                }
            });
            var obj = $('.day6 span');
            $.each(obj, function (key, value) {
                var val = obj.eq(key).text();
                var val2 = obj.eq(key).attr('data-billable');
                var val3 = obj.eq(key).attr('data-unbillable');
                if (val != "") {
                    total6 = total6 + parseInt(val);
                }
                if (val2 != '') {

                    billable6 = billable6 + parseInt(val2);

                }
                if (val3 != '') {

                    unbillable6 = unbillable6 + +parseInt(val3);

                }
            });
            var obj = $('.day7 span');
            $.each(obj, function (key, value) {
                var val = obj.eq(key).text();
                var val2 = obj.eq(key).attr('data-billable');
                var val3 = obj.eq(key).attr('data-unbillable');
                if (val != "") {
                    total7 = total7 + parseInt(val);
                }
                if (val2 != '') {

                    billable7 = billable7 + parseInt(val2);

                }
                if (val3 != '') {

                    unbillable7 = unbillable7 + +parseInt(val3);

                }
            });
            var grand_total = total1+total2+total3+total4+total5+total6+total7;
            var grand_billable = billable1+billable2+billable3+billable4+billable5+billable6+billable7;
            var grand_unbillable = unbillable1+unbillable2+unbillable3+unbillable4+unbillable5+unbillable6+unbillable7;
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
            $('#modal-add').on('shown.bs.modal', function () {
                $('#add_timesheet_info').bootstrapValidator('resetForm', true);
                $('#client_name').prop('selectedIndex',0);
            $('#activity_name').prop('selectedIndex',0);
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
                            callback: function (value, validator, $field) {
                                if(value==0 || value==''){
                                    return false;
                                }
                                else{
                                   return true; 
                                }
                                
                            }
                        }
                    }
                }
                }
            })
                    .on('success.form.bv', function (e) {
                        e.preventDefault();
                        var data = $("#add_timesheet_info").serialize();


                        $.ajax({
                            async: true,
                            type: "POST",
                            url: CURRENT_URL + '/timesheet/add_time',
                            dataType: "json",
                            data: data,
                            beforeSend: function ()
                            {
                                $("#addloader").show();
                            },
                            success: function (data) {
                                $("#modal-add").modal("hide");
                                bootbox.alert(data.message, function () {
                                    if (data.status == "SUCCESS")
                                    {
                                        window.stop();
                                        location.reload(true);
                                    }
                                    else
                                    {
                                        $("#modal-add").modal("show");
                                    }

                                });

                            },
                            error: function (xhr, status, error) {
                                bootbox.alert(status);
                            },
                            complete: function ()
                            {
                                $("#addloader").hide();
                            }
                        });
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
                            callback: function (value, validator, $field) {
                                if(value==0 || value==''){
                                    return false;
                                }
                                else{
                                   return true; 
                                }
                                
                            }
                        }
                    }
                }
                }
            })
                    .on('success.form.bv', function (e) {
                        e.preventDefault();

                        var data = $("#edit_timesheet_info").serialize();

                        $.ajax({
                            async: true,
                            type: "POST",
                            url: CURRENT_URL + '/timesheet/submit_edit_time',
                            dataType: "json",
                            data: data,
                            beforeSend: function ()
                            {
                                $("#editloader").show();

                            },
                            success: function (data) {
                                $("#modal-edit").modal("hide");
                                bootbox.alert(data.message, function () {
                                    if (data.status == "SUCCESS")
                                    {

                                        window.stop();
                                        location.reload(true);
                                    }
                                    else
                                    {
                                        $("#modal-edit").modal("show");
                                    }

                                });
                            },
                            error: function (xhr, status, error) {
                                alert(status);
                            },
                            complete: function ()
                            {
                                $("#editloader").hide();
                            }
                        });



                    });


            initTables();
            $('.dataTables_filter').hide();
        });

        function edit_timesheet(id) {
            $('#modal-edit').on('shown.bs.modal', function () {
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
                data: {timesheet_id: id},
                dataType: "json"
            });
            request.done(function (msg) {
                $.each(msg, function (i, item) {
                    $('#edit_timesheet_id').val(item.timesheet_id);
                    $('#edit_timesheet_date').val(item.timesheet_date);
                    $('#edit_disbursement').val(item.disbursement);
                    var start = item.start_time.split(":");
                    var end = item.end_time.split(":");
                    $('#timepicker2').val(start[0] + ':' + start[1]);
                    $('#timepicker3').val(end[0] + ':' + end[1]);
                    $('#edit_client_name').val(item.client_name);
                    $('#edit_activity_name').val(item.activity_name);
                     get_project(item.client_name, 'edit_project_name')
                setTimeout(function() {
                       $('#edit_project_name').val(item.project_name);
                  }, 200);
                    //$('#edit_activity_name').val(item.activity_name);
                     get_subactivity(item.activity_name,'edit_subactivity_name');
                setTimeout(function() {
                        $('#edit_subactivity_name').val(item.subactivity_name);
                        $('#edit_timesheet_info').bootstrapValidator('revalidateField', 'edit_subactivity_name');
                  }, 200);
                    
                     get_task(item.subactivity_name,'edit_task_name');
                setTimeout(function() {
                        $('#edit_task_name').val(item.task_name);
                  }, 200);
                    
                    $('#edit_task_name').val(item.task_name);
                    $('#edit_billable').val(item.billable);
                    if (item.billable == 1) {
                        $('.editBil i').addClass('checked');
                    }
                    $('#edittimeunits').val(item.time_units);
                    $('#edittimeminutes').val(item.time_units*15);
                    $('#edit_comments').val(item.comments);
                    

                });
            });
            request.fail(function (jqXHR, textStatus) {
                alert("Request failed: " + textStatus);
            });
            });
        }

        function delete_timesheet(id) {
            bootbox.confirm("Are you sure you want to remove timesheet information?", function (result) {

                if (result == true) {

                    var request = $.ajax({
                        url: CURRENT_URL + '/timesheet/delete_time',
                        type: "POST",
                        data: {timesheet_id: id},
                        dataType: "json"
                    });
                    request.done(function (data) {
                        bootbox.alert(data.message, function () {
                            if (data.status == "SUCCESS")
                            {

                                window.stop();
                                location.reload();
                            }


                        });
                    });
                    request.fail(function (jqXHR, textStatus) {
                        alert("Request failed: " + textStatus);
                    });
                }
            });

        }
        function approve_status(timesheet_id, time_status)
        {
            bootbox.confirm("Are you sure you want to approve this Timesheet?", function (result) {
                if (result == true)
                {
                    var comp = new Object();

                    comp.timesheet_id = timesheet_id;
                    comp.time_status = time_status;
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
                        beforeSend: function ()
                        {
                            $("#addloader").show();
                        },
                        success: function (data) {

                            $('#modal-login').modal("hide");

                            if (data.status == "SUCCESS") {
                                bootbox.alert(data.message, function () {
                                    //$('#action_btn_'+employee_leave_id).html('');
                                    //calBalanceLeave('',year);
                                    location.reload();

                                });
                            }
                            else
                            {
                                bootbox.alert(data.message, function () {
                                    location.reload();
                                });
                            }


                        },
                        error: function (xhr, status, error) {
                            bootbox.alert(status);
                        },
                        complete: function ()
                        {
                            $("#addloader").hide();
                        }
                    });

                }
            });


        }
        
        function submit_status(timesheet_id, time_status)
        {
            
                    var comp = new Object();

                    comp.timesheet_id = timesheet_id;
                    comp.time_status = time_status;
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
                        beforeSend: function ()
                        {
                            $("#addloader").show();
                        },
                        success: function (data) {

                            $('#modal-login').modal("hide");

                            if (data.status == "SUCCESS") {
                                bootbox.alert(data.message, function () {
                                    //$('#action_btn_'+employee_leave_id).html('');
                                    //calBalanceLeave('',year);
                                    location.reload();

                                });
                            }
                            else
                            {
                                bootbox.alert(data.message, function () {
                                    location.reload();
                                });
                            }


                        },
                        error: function (xhr, status, error) {
                            bootbox.alert(status);
                        },
                        complete: function ()
                        {
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
                        '</div> ' +
                        '</div> ' +
                        '</div> </div>' +
                        '</form> </div> </div>',
                buttons: {
                    success: {
                        label: "Save",
                        className: "btn-success",
                        callback: function () {
                            var data = $("#reject_time").serialize();
                            var request = $.ajax({
                                url: CURRENT_URL + '/timesheet/change_time_status',
                                type: "POST",
                                data: data,
                                dataType: "json"
                            });
                            request.done(function (data) {
                                bootbox.alert(data.message, function () {
                                    if (data.status == "SUCCESS")
                                    {

                                        window.stop();
                                        location.reload();
                                    }


                                });
                            });
                            request.fail(function (jqXHR, textStatus) {
                                alert("Request failed: " + textStatus);
                            });
                        }
                    },
                    main: {
                        label: "Cancel",
                        className: "btn-danger",
                        callback: function () {
                            bootbox.hideAll()
                        }
                    },
                }
            }
            );
        }

        function get_project(client_name, id) {
            var request = $.ajax({
                url: CURRENT_URL + '/project/get_project',
                type: "POST",
                data: {client_name: client_name},
                dataType: "html"
            });
            request.done(function (data) {
                $('#' + id).html(data);
            });
            request.fail(function (jqXHR, textStatus) {
                alert("Request failed: " + textStatus);
            });
        }

        function get_subactivity(activity_name, id) {
            var request = $.ajax({
                url: CURRENT_URL + '/subactivity/get_subactivity',
                type: "POST",
                data: {activity_name: activity_name},
                dataType: "html"
            });
            request.done(function (data) {
                $('#' + id).html(data);
                $('#add_timesheet_info').bootstrapValidator('revalidateField', 'subactivity_name');
                $('#edit_timesheet_info').bootstrapValidator('revalidateField', 'edit_subactivity_name');
            });
            request.fail(function (jqXHR, textStatus) {
                alert("Request failed: " + textStatus);
            });
        }

        function get_task(subactivity_name, id) {
            var request = $.ajax({
                url: CURRENT_URL + '/task/get_task',
                type: "POST",
                data: {subactivity_name: subactivity_name},
                dataType: "html"
            });
            request.done(function (data) {
                $('#' + id).html(data);
            });
            request.fail(function (jqXHR, textStatus) {
                alert("Request failed: " + textStatus);
            });
        }
    </script>