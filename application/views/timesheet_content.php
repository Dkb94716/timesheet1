
<div class="col-lg-12" style="margin-top:20px;">

    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 pull-right">

        <a href="#modal-add" data-toggle="modal" class="btn-sm btn-warning pull-right" style="margin-left:8px;">Add Time</a>
        <!--<a href="#modal-edit" data-toggle="modal" class="btn-sm btn-success pull-right">Approve</a>-->
        
    </div>
</div>
<div class="innerLR" style="margin-top:90px;">
    <div class="widget widget-body-white widget-heading-simple">
        <div class="widget-body overflow-x" style="padding:10px;">
            <table class="dynamicTable tableTools table table-striped overflow-x">
                <thead>
                    <tr style="background-color:#c72a25; color:#FFF;">
                        <!--<th class="thead-th-padg" style="width:30px !important;"><input type="checkbox" name="multi-approved" class="multi-approved"></th>-->
                        <th class="thead-th-padg">Date</th>
                        <th class="thead-th-padg">Employee Name</th>
                        <th class="thead-th-padg center">Billable</th>
                        <th class="thead-th-padg center">Unbillable</th>
                        <th class="thead-th-padg">Status</th>
                        <th class="thead-th-padg">Submit Date</th>
                        <th class="thead-th-padg">Action Date</th>
                        <th class="thead-th-padg" id="action_h" align="right">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if (!empty($time_detail)) {
                        foreach ($time_detail as $time) {
                            $week_arr = explode("/", $time->week);
                            ?>
                            <tr class="gradeX">
                                <!--<td style="width:30px !important;"><input type="checkbox" name="multi-approved" class="multi-approved"></td>-->
                               
                                <td><span class="center" style="width:240px;"><?php echo '<span style="display:none">'.date("Ymd", strtotime($week_arr[0])).'</span>'.date('d F Y', strtotime($week_arr[0])) . ' - ' . date('d F Y', strtotime($week_arr[1])); ?></span></td>
                                <td><span class="center"><?php echo $time->empName; ?></span></td>
                                <td class="center"><span class="td-text-area" style="width:80px;"><?php echo $time->billable_time; ?></span></td>
                                <td class="center"><span class="td-text-area" style="width:80px;"><?php echo $time->unbillable_time; ?></span></td>
                                <td><span class="td-text-area" style="width:80px;"><?php echo $time->time_status; ?></span></td>
                       

                        <td><span class="center" style="width:120px;">
                               <?php 
                                if($time->time_status != 'Pending'){
                                    echo '<span style="display:none">'.date("Ymd", strtotime($time->created)).'</span>'.date('d F Y', strtotime($time->created));
                                }
                                ?>
                            </span>
                        </td>
                                <td><span class="center" style="width:120px;">
                                    <?php
                                    if(($time->time_status == 'Approved' || $time->time_status == 'Rejected' || $time->time_status == 'Submitted' ) && ($time->updated)) {echo '<span style="display:none">'.date("Ymd", strtotime($time->updated)).'</span>'. date('d F Y', strtotime($time->updated));}
                                    
                                    ?></span></td>
                                <td><span class="td-text-area" style="width:160px;">
                                    <a href="<?php echo base_url(); ?>timesheet/view_time_list/<?php echo $time->emp_id; ?>/<?php echo $time->week; ?>" class="btn-xs btn-success td-btn-marg-right">View</a>
                                    <?php if (($time->time_status == 'Submitted')&&($time->emp_id!=$emp_id)) { ?>
                                        <a onclick="approve_status('<?php echo $time->emp_id; ?>', '<?php echo $time->week; ?>', 'Approved', '<?php echo $time->empId; ?>', '<?php echo $time->empName; ?>', '<?php echo $time->emailId; ?>', '<?php echo date('d F Y', strtotime($week_arr[0])); ?>', '<?php echo date('d F Y', strtotime($week_arr[1])); ?>')" class="btn-xs btn-success td-btn-marg-right" style="cursor: pointer;">Approve</a>
                                        <a onclick="reject_status('<?php echo $time->emp_id; ?>', '<?php echo $time->week; ?>', '<?php echo $time->empId; ?>', '<?php echo $time->empName; ?>', '<?php echo $time->emailId; ?>', '<?php echo date('d F Y', strtotime($week_arr[0])); ?>', '<?php echo date('d F Y', strtotime($week_arr[1])); ?>')"  class="btn-xs btn-danger td-btn-marg-right" style="cursor: pointer;">Reject</a>
                                    <?php } 
                                    elseif(($time->time_status == 'Pending')||($time->time_status == 'Rejected')) { 
                                         if ($userPrivileges->timesheet->managetimesheet->weekend_submission == 1) {
                
                    $current_date = date('Y-m-d');
                    $end_date=date('Y-m-d', strtotime($week_arr[1]));
                    if($end_date<$current_date){ ?>
            <a onclick="submit_status('<?php echo $time->emp_id; ?>', '<?php echo $time->week; ?>', 'Submitted', '<?php echo $time->empId; ?>', '<?php echo $time->empName; ?>', '<?php echo $time->emailId; ?>', '<?php echo date('d F Y', strtotime($week_arr[0])); ?>', '<?php echo date('d F Y', strtotime($week_arr[1])); ?>','<?php echo $time->managerId; ?>')" data-toggle="modal" class="btn-xs btn-info" style="cursor: pointer;font-size: 10px;">Submit</a>
                    <?php }
               
                }
                else{
                    ?>
                   <a onclick="submit_status('<?php echo $time->emp_id; ?>', '<?php echo $time->week; ?>', 'Submitted', '<?php echo $time->empId; ?>', '<?php echo $time->empName; ?>', '<?php echo $time->emailId; ?>', '<?php echo date('d F Y', strtotime($week_arr[0])); ?>', '<?php echo date('d F Y', strtotime($week_arr[1])); ?>','<?php echo $time->managerId; ?>')" data-toggle="modal" class="btn-xs btn-info" style="cursor: pointer;font-size: 10px;
">Submit</a> 
           <?php     }
                                    } ?>
                                    </span>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade"  id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 77%;margin-left: 12%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-top: -3px;">&times;</button>
            </div>
            <div class="modal-body">
                <div class="innerAll" style="padding-left: 0; padding-right: 0px;padding-bottom:0px;">
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
                                    <select class="plahole_font" name="client_name" id="client_name" onchange="get_project(this.value, 'project_name')" style="padding-top: 2px;width:100%;">

                                        <option  value="">Select Client</option>
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
                                <div class="col-sm-8" id="add_billable" style="margin-left:5px;">
                                    <label for="addbillable" class="checkbox-custom col-sm-8">
                                        <i class="fa fa-fw fa-square-o"></i>
                                        <input type="checkbox" name="billable" id="addbillable" value="0">
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label inputtext_formating" style="margin-bottom:5px;">Notes</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="comments" id="comments" placeholder="Descriptions..." class="form-control plahole_font" maxlength="255" rows="5" style="resize: vertical;"></textarea>
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

<div id="addloader" style="display:none;position:absolute;top:50%;left:50%;"><img src="<?php echo base_url(); ?>assets/images/loader.gif"/></div>

<div id="screen"></div>
<script>
    $(document).ready(function () {
		 $('#add_billable').on('click',function(){
           if($('#add_billable label i').hasClass('checked')){ 
               
               $('#addbillable').val(0); 
              
           } 
           else{
			   $('#addbillable').val(1);
             
              
           }
        });
        $('#modal-add').modal({
          backdrop: 'static',
          keyboard: true,
            show: false   
        });
         $('#modal-add').on('hidden.bs.modal', function () {
                $('#select2-drop').hide();

            });
        
   $("#client_name").select2({
                placeholder: "Select Client",
                allowClear: true
            });
           $('.datepicker2').bdatepicker({
		format: "dd MM yyyy",
		 autoclose: true
	}).on('changeDate', function(e) {
            // Revalidate the date field
            $('#add_timesheet_info').bootstrapValidator('revalidateField', 'timesheet_date');
        });

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
            $('.btn-success').attr("disabled", "disabled");
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
                            
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {
                                    $("#modal-add").modal("hide");
                                    window.stop();
                                    location.reload(true);
                                }
                                else
                                {
                                    $('.btn-success').removeAttr("disabled");
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



       //377 initTables3();
        initTablesTimesheet()
        //$('.dataTables_filter').hide();
        //$('#action_h').css('width','');
    });

    function edit_client_timesheet_info(id) {
        var request = $.ajax({
            url: CURRENT_URL + '/client/edit_client_timesheet_info',
            type: "POST",
            data: {client_id: client_id, client_timesheet_info_id: id},
            dataType: "json"
        });
        request.done(function (msg) {
            $.each(msg, function (i, item) {
                $('#edit_client_timesheet_info_id').val(item.client_timesheet_info_id);
                $('#edit_timesheet_type_id').val(item.client_timesheet_info_id);
                $('#edit_issue_date').val(item.issue_date);
                $('#edit_expiry_date').val(item.expiry_date);
                $('#edit_licensing_conditions').val(item.licensing_conditions);

            });
        });
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    }

    function delete_client_timesheet_info(id) {
        bootbox.confirm("Are you sure you want to remove timesheet information?", function (result) {

            if (result == true) {

                var request = $.ajax({
                    url: CURRENT_URL + '/client/delete_client_timesheet_info',
                    type: "POST",
                    data: {client_timesheet_info_id: id},
                    dataType: "json"
                });
                request.done(function (data) {
                    bootbox.alert(data.message, function () {
                        if (data.status == "SUCCESS")
                        {

                            window.stop();
                           location.reload(true);
                        }


                    });
                });
                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
            }
        });

    }
    function approve_status(emp_id, week, time_status, empId, empName, emailId, start_date, end_date)
    {
        bootbox.confirm("Are you sure you want to approve this Timesheet?", function (result) {
            if (result == true)
            {
                var comp = new Object();

                //comp.timesheet_id= timesheet_id;
                comp.time_status = time_status;
                comp.empId = empId;
                comp.empName = empName;
                comp.emailId = emailId;
                comp.start_date = start_date;
                comp.end_date = end_date;
                comp.emp_id = emp_id;


                $.ajax({
                    async: true,
                    type: "POST",
                    url: CURRENT_URL + '/timesheet/change_time_status',
                    dataType: "json",
                    data: $.param(comp),
                    beforeSend: function ()
                    {
                        $('#screen').css({opacity: 0.7, 'width': $(document).width(), 'height': $(document).height()});
                        $('body').css({'overflow': 'hidden'});
                        $('#addloader').css({'display': 'block'});

                    },
                    success: function (data) {
                        $("#addloader").hide();
                        $('#modal-login').modal("hide");

                        if (data.status == "SUCCESS") {
                            bootbox.alert(data.message, function () {
                                //$('#action_btn_'+employee_leave_id).html('');
                                //calBalanceLeave('',year);
                                location.reload(true);

                            });
                        }
                        else
                        {
                            bootbox.alert(data.message, function () {
                                location.reload(true);
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

    function reject_status(emp_id, id, empId, empName, emailId, start_date, end_date) {
        bootbox.dialog({
            title: "Reason for Rejection (Optional)",
            message: '<div class="row"> ' +
                    '<div class="col-md-12"> ' +
                    '<form class="form-horizontal" id="reject_time" role="form"> ' +
                    '<div class="form-group"> ' +
                    '<div class="col-md-20"> ' +
                    '<input type="text" id="reason_to_reject" class="form-control" name="reason_to_reject"  placeholder="Hey! please need to fill the description in activity (Miscellaneous)">' +
                    '<input type="hidden" name="time_status" id="time_status" value="Rejected">' +
                    '<input type="hidden" name="empId" id="empId" value="' + empId + '"> ' +
                    '<input type="hidden" name="empName" id="empName" value="' + empName + '">' +
                    '<input type="hidden" name="emailId" id="emailId" value="' + emailId + '">' +
                    '<input type="hidden" name="start_date" id="start_date" value="' + start_date + '">' +
                    '<input type="hidden" name="end_date" id="end_date" value="' + end_date + '">' +
                    '<input type="hidden" name="emp_id" id="emp_id" value="' + emp_id + '">' +
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
                            dataType: "json",
                            beforeSend: function () {
                                $('#screen').css({opacity: 0.7, 'width': $(document).width(), 'height': $(document).height()});
                                $('body').css({'overflow': 'hidden'});
                                $('#addloader').css({'display': 'block'});
                            }

                        });


                        request.done(function (data) {
                            $("#addloader").hide();
                            $('#screen').css({opacity: 0.0});
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {

                                    window.stop();
                                    location.reload(true);
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
    
     function submit_status(emp_id, week, time_status, empId, empName, emailId, start_date, end_date,managerId)
        {
            
                    var comp = new Object();
                    comp.time_status = time_status;
                    comp.empId = empId;
                    comp.empName = empName;
                    comp.emailId = emailId;
                    comp.start_date = start_date;
                    comp.end_date = end_date;
                    comp.emp_id = emp_id;
                    comp.managerId = managerId;

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
     

</script>