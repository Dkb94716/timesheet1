<div class="innerLR" style="margin-top:60px;">
    <?php
    if ($this->session->userdata('success_msg')) {
        ?>
    <div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>Success!</strong> <?php echo $this->session->userdata('success_msg');?>
</div>
        
        <?php
        $this->session->unset_userdata('success_msg');
    } elseif ($this->session->userdata('error_msg')) {
        ?>
    <div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>Warning!</strong> <?php echo $this->session->userdata('error_msg'); ?>
</div>
        
        <?php
        $this->session->unset_userdata('error_msg');
    }
    ?>
    <?php echo validation_errors('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>Warning! </strong>  ', '</div>'); ?>
    <div id="info" issave="0"></div>
    <form class="form-horizontal margin-none" id="validateSubmitForm" method="post" autocomplete="off" novalidate="novalidate">    
        <div class="widget">
            <div class="widget-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-8 control-label inputtext_formating">Leave Type</label>
                            <div class="col-sm-11">
                                <select class="form-control height_25 plahole_font" name="leave_type_id" id="leave_type_id"  onchange="calBalanceLeave(this.value)" style="padding-top: 2px;">
                                    <option value="">Select</option>
                                    <?php
                                    if (!empty($leave_type_detail)) {
                                        foreach ($leave_type_detail as $leave_type) {
                                            ?>
                                            <option value="<?php echo $leave_type->leave_type_id . '|' . $leave_type->leave_type . '|' . $leave_type->weekend_check; ?>"  <?php echo set_select('leave_type_id', $leave_type->leave_type_id . '|' . $leave_type->leave_type . '|' . $leave_type->weekend_check); ?>><?php echo $leave_type->leave_type; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <div id="error_leaveTypeId">
                                    <small style="" class="help-block" data-bv-validator="notEmpty" data-bv-for="leaveTypeId" data-bv-result="INVALID">Leave Type is required</small>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-8 control-label inputtext_formating">Starts:</label>
                            <div class="col-sm-7">
                                <div class="input-group date datepicker2 start" onchange="calculateDate()" style="width:100%;">
                                    <input class="form-control height_25" name="from_date" id="from_date" placeholder="From" value="<?php echo set_value('from_date'); ?>" readonly type="text"/>
                                    <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                </div>
                                <div id="error_from">
                                    <small style="" class="help-block" data-bv-validator="notEmpty" data-bv-for="fromDate" data-bv-result="INVALID">Start date is required</small></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-8 control-label inputtext_formating">Ends:</label>
                            <div class="col-sm-7">
                                <div class="input-group date datepicker2 end" onchange="calculateDate()" style="width:100%;">
                                    <input class="form-control height_25 plahole_font" name="to_date" id="to_date" value="<?php echo set_value('to_date'); ?>" placeholder="To" readonly type="text"/>
                                    <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                </div>
                                <div id="error_to">
                                    <small style="" class="help-block" data-bv-validator="notEmpty" data-bv-for="toDate" data-bv-result="INVALID">End date is required</small></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-8 control-label inputtext_formating">No. of Days</label>
                            <div class="col-sm-11"> 
                                <input type="text" class="form-control height_25 plahole_font" name="number_of_days" value="<?php echo set_value('number_of_days'); ?>" id="number_of_days" placeholder="0" readonly="">
                                <div id="error_numberOfDates">
                                    <small style="" class="help-block" data-bv-validator="notEmpty" data-bv-for="numberOfDates" data-bv-result="INVALID">You do not have sufficient Leave</small></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-8 control-label inputtext_formating">Apply to</label>
                            <div class="col-sm-11">
                                <select class="form-control height_25 plahole_font" name="manager_id" id="manager_id"  style="padding-top: 2px;">
                                    <?php
                                    if (!empty($manager_detail)) {
                                        foreach ($manager_detail as $manager) {
                                            ?>
                                            <option value="<?php echo $manager->id . '|' . $manager->emailId; ?>" <?php echo set_select('manager_id', $manager->id); ?> ><?php echo $manager->empName; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-8 control-label inputtext_formating">Reason:</label>
                            <div class="col-sm-11">
                                <textarea rows="4" name="reason" id="reason" class="plahole_font" style="width:100%;resize: vertical;"><?php echo set_value('reason'); ?></textarea>
                                <div id="error_reason"><small style="" class="help-block" data-bv-validator="notEmpty" data-bv-for="reason" data-bv-result="INVALID">Reason is required</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" style="margin-top:67px;">
                            <label class="col-sm-8 control-label inputtext_formating">From Session</label>
                            <div class="col-sm-11">
                                <select class="form-control height_25 plahole_font" name="from_session" id="from_session" onchange="calculateDate()" style="padding-top: 2px;">
                                    <option value="1" <?php echo set_select('from_session', 1, true); ?>>First Half</option>
                                    <option value="2" <?php echo set_select('from_session', 2); ?>>Second Half</option>

                                </select>    
                                <div id="error_SessionFrom">
                                    <small style="" class="help-block" data-bv-validator="notEmpty" data-bv-for="SessionFrom" data-bv-result="INVALID">From Session is required</small>
                                </div>  
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-8 control-label inputtext_formating">To Session</label>
                            <div class="col-sm-11">
                                <select class="form-control height_25 plahole_font" name="to_session" id="to_session" onchange="calculateDate()" style="padding-top: 2px;">
                                    <option value="1" <?php echo set_select('to_session', 1); ?>>First Half</option>
                                    <option value="2" <?php echo set_select('to_session', 2, true); ?>>Second Half</option>
                                </select>   
                                <div id="error_ToSession">
                                    <small style="" class="help-block" data-bv-validator="notEmpty" data-bv-for="ToSession" data-bv-result="INVALID">To Session is required</small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-8 control-label inputtext_formating">Balance Leave</label>
                            <div class="col-sm-11">
                                <input type="text" name="balance_leave" id="balance_leave" value="<?php echo set_value('balance_leave'); ?>" class="form-control height_25 plahole_font" readonly="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-8 control-label inputtext_formating">CC to:</label>
                            <div class="col-sm-11">
                                <input type="text" name="cc_to" id="cc_to" value="<?php echo set_value('cc_to'); ?>"  class="form-control input_width85 height_25 plahole_font" style="width:85%" readonly="readonly">
                                <a href="#modal-login" data-toggle="modal" class="btn btn-success pull-right height_25" style="margin-top: -26px;padding-top: 0px;">Select
                                </a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-8 control-label inputtext_formating">Contact details while   on leave:</label>
                            <div class="col-sm-11">
                                <textarea rows="4" name="contact_details" id="contact_details" class="plahole_font" style="width:100%;resize: vertical;"><?php echo set_value('contact_details'); ?></textarea>
                                <div id="error_contact">
                                    <small style="" class="help-block" data-bv-validator="notEmpty" data-bv-for="contactDetails" data-bv-result="INVALID">Contact details is required</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="padding-right:6%;">
                        <button type="button" class="btn btn-success pull-right" style="margin-left: 20px;" onclick="saveForm()">Apply</button>
                        <!--<a onclick="window.history.back()" class="btn btn-danger pull-right">Cancel</a>-->
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal fade"  id="modal-login">
    <div class="modal-dialog modal_widthsl">
        <div class="modal-content">
            <div class="modal-header modal_borderstylenone">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="innerAll">
                    <div class="innerLR">
                        <form class="form-horizontal" role="form">    
                            <div class="widget-body">
                                <table class="dynamicTable tableTools table table-striped checkboxs" style="min-width: 100%;">   
                                    <thead>
                                        <tr style="background-color:#c72a25; color:#FFF;">
                                            <th class="text-center" style="width:15px !important;">
                                                <input type="checkbox" class="checkboxclick">
                                            </th>
                                            <th class="thead-th-padg modaltable_width">Employee No</th>
                                            <th class="thead-th-padg modaltable_width center">Name</th>
                                            <th class="thead-th-padg modaltable_width center">Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($user_detail)) {
                                            foreach ($user_detail as $user) {
                                                ?>
                                                <tr> 
                                                    <td style="width:15px !important;">
                                                        <div class="checkbox checkbox-single margin-none" style="line-height: 0px; padding-top: 3px;">
                                                            <label class="checkbox-custom">
                                                                <i class="fa fa-fw fa-square-o"></i>
                                                                <input type="checkbox" class="checkboxclick" id="<?php echo $user->empId; ?>" value="<?php echo $user->emailId; ?>" onclick="addDataIntoField(this)">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $user->empId; ?></td>
                                                    <td class="center"><?php echo $user->empName; ?></td>
                                                    <td class="center"><?php echo $user->emailId; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10" style="padding-left:0px;">
                                    <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-left:15px;">Close</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        
        $('#modal-login').modal({
          backdrop: 'static',
          keyboard: true,
            show: false   
        })
        
        $('.datepicker2').bdatepicker({
		format: "dd MM yyyy",
		 autoclose: true,
                 startDate: new Date(<?php echo date('Y')-1;?>, 00, 01),
                 endDate: new Date(<?php echo date('Y')+1;?>, 11, 31)
	});
        $('.alert').fadeOut(10000);
        $('#error_leaveTypeId').hide();
        $('#error_from').hide();
        $('#error_to').hide();
        $('#error_reason').hide();
        $('#error_contact').hide();
        $('#error_numberOfDates').hide();
        $('#error_SessionFrom').hide();
        $('#error_ToSession').hide();
         setTimeout(function() {
    initTables();
    $('#DataTables_Table_0_wrapper .row').find('.col-md-6').eq(1).removeClass('col-md-6').addClass('col-md-12');
}, 5000);
        //initTables();
        //$('#DataTables_Table_0_wrapper .row').find('.col-md-6').eq(1).removeClass('col-md-6').addClass('col-md-12');
    });
        var total_leave = 0;
        var weekend_check = 0;
    function calBalanceLeave(val) {
        
        var res = val.split("|"); 
        var comp = new Object();
        comp.leave_type_id = res[0];
        $.ajax({
            async: false,
            type: "POST",
            url: CURRENT_URL + "/employee_leave/get_balance_leave",
            dataType: "json",
            data: $.param(comp),
            success: function (data) {
                $.each(data, function (i, item) {
                    total_leave = item.balance_leave;
                    weekend_check = res[2];
                    $("#balance_leave").val(item.balance_leave);
                    $("#from_date").val('');
                    $("#to_date").val('');
                    $("#number_of_days").val('');
                });
            },
            error: function (xhr, status, error) {
                alert(status);
            }
        });
    }

//    function addDataIntoField() {
//        var emailCollection = '';
//        $(".checkboxclick:checked").each(function (index) {
//            if (index != 0)
//                emailCollection += ', ';
//            emailCollection += $(this).val();
//        });
//        $("#cc_to").val(emailCollection);
//    }
     function addDataIntoField(e) {
         var cc_to =  $("#cc_to").val();
         if(cc_to)
          var ticks_arr = cc_to.split(",");
         else
          var ticks_arr = [];
         setTimeout(function(){  
               if($("#"+e.id).parent().children("i").hasClass( "checked")){
                  ticks_arr.push(e.value);   
               }else{
                 ticks_arr.splice( $.inArray(e.value,ticks_arr) ,1 );   
              }    
               var ticks_arr2 = ticks_arr.join(); 
               $("#cc_to").val(ticks_arr2);
        }, 10);
    }

    function calculateDate() {
        var current_date = new Date();
        var date_from = new Date($("#from_date").val());
        var date_to = new Date($("#to_date").val());
        var fromSess = $("#from_session").val();
        var toSess = $("#to_session").val();
        var from_date = $("#from_date").val();
        var to_date = $("#to_date").val();
        if(to_date==''){
        
        $('.end').bdatepicker("update",from_date);
        var to_date = $("#to_date").val('');
    }
        if (date_to >= date_from) {
            if(weekend_check==1){
            var difference = date_to - date_from;
            var days = difference / (24 * 3600 * 1000);
            var actDays = days + 1;
        }
        else{
            var actDays = calcBusinessDays(date_from,date_to);
        }
            if (fromSess == 1 && toSess == 1 || fromSess == 2 && toSess == 2)
                actDays = actDays - .5;
            if (fromSess == 2 && toSess == 1)
                actDays = actDays - 1;
           // alert(actDays);
            $("#number_of_days").val(actDays);
            change_balance_leave(actDays);
        } else {
            $("#number_of_days").val(0);

        }

    }

    function change_balance_leave(available_leave) {
        var balance_leave = 0;
        if (available_leave > 0) {
            var balance_leave = total_leave - available_leave;
            $("#balance_leave").val(balance_leave);
        } else {
            $("#balance_leave").val(total_leave);
        }
    }

    function checkValidation(leaveTypeId, fromDate, toDate, reason, SessionFrom, ToSession, contactDetails, callback) {
        $('#info').attr('issave', 0);
        if (leaveTypeId == "") {
            $('#error_leaveTypeId').fadeIn();
            $('#info').attr('issave', parseInt($('#info').attr('issave')) + 1);
        }
        if (fromDate == "") {
            $('#error_from').fadeIn();
            $('#info').attr('issave', parseInt($('#info').attr('issave')) + 1);
        }

        if (toDate == "") {
            $('#error_to').fadeIn();
            $('#info').attr('issave', parseInt($('#info').attr('issave')) + 1);
        }
/*
        if (reason == "") {

            $('#error_reason').fadeIn();
            $('#info').attr('issave', parseInt($('#info').attr('issave')) + 1);
        }
        if (contactDetails == "") {
            $('#error_contact').fadeIn();
            $('#info').attr('issave', parseInt($('#info').attr('issave')) + 1);
        }*/
        if (ToSession == "") {
            $('#error_ToSession').fadeIn();
            $('#info').attr('issave', parseInt($('#info').attr('issave')) + 1);
        }
        if (SessionFrom == "") {
            $('#error_SessionFrom').fadeIn();
            $('#info').attr('issave', parseInt($('#info').attr('issave')) + 1);
        }
        var date_from = new Date(fromDate);
        var date_to = new Date(toDate);
        if (date_from > date_to) {
            $('#error_to small').text('End date should be greater than or equal to Start date.')
            $('#error_to').fadeIn();
            $('#info').attr('issave', parseInt($('#info').attr('issave')) + 1);
        }

        if (date_from.getTime() === date_to.getTime()) {
            if (ToSession == 1 && SessionFrom == 2) {
                $('#error_ToSession small').text('To Session should be greater than or equal to From Session.')
                $('#error_ToSession').fadeIn();
                $('#info').attr('issave', parseInt($('#info').attr('issave')) + 1);
            }
        }
        var numberOfDates = $('#numberOfDates').val();
        /* if(parseInt(numberOfDates)>total_leave) {
         $('#error_numberOfDates').fadeIn();
         $('#info').attr('issave',parseInt($('#info').attr('issave'))+1);
         }*/
        //On focus
        $('#leave_type_id').on('focus', function () {
            $('#error_leaveTypeId').fadeOut();
        });
        $('#from_date').on('focus', function () {
            $('#error_from').fadeOut();
            $('#error_numberOfDates').fadeOut();
        });

        $('#to_date').on('focus', function () {
            
            $('#error_to').fadeOut();
            $('#error_numberOfDates').fadeOut();
        });
/*
        $('#reason').on('focus', function () {
            
            $('#error_reason').fadeOut();
        });

        $('#contact_details').on('focus', function () {
            $('#error_contact').fadeOut();
        });
*/
        $('#to_session').on('focus', function () {
            $('#error_ToSession').fadeOut();
        });

        $('#from_session').on('focus', function () {
            $('#error_SessionFrom').fadeOut();
        });

        callback();
    }

    function saveForm() {
        var leaveTypeId = fromDate = toDate = reason = contactDetails = '';
        leaveTypeId = $('#leave_type_id').val();
        fromDate = $('#from_date').val();
        toDate = $('#to_date').val();
        reason = $('#reason').val();
        contactDetails = $('#contact_details').val();
        SessionFrom = $('#from_session').val();
        ToSession = $('#to_session').val();
        checkValidation(leaveTypeId, fromDate, toDate, reason, SessionFrom, ToSession, contactDetails, function () {
            var issave = $('#info').attr('issave');
            if (issave == 0) {
                $("#validateSubmitForm").submit();
            } else {
                return false;
            }
        });
    }

    function calcBusinessDays(dDate1, dDate2) { // input given as Date objects

        var iWeeks, iDateDiff, iAdjust = 0;

        if (dDate2 < dDate1)
            return -1; // error code if dates transposed

        var iWeekday1 = dDate1.getDay(); // day of week
        var iWeekday2 = dDate2.getDay();

        iWeekday1 = (iWeekday1 == 0) ? 7 : iWeekday1; // change Sunday from 0 to 7
        iWeekday2 = (iWeekday2 == 0) ? 7 : iWeekday2;

        if ((iWeekday1 > 5) && (iWeekday2 > 5))
            iAdjust = 1; // adjustment if both days on weekend

        iWeekday1 = (iWeekday1 > 5) ? 5 : iWeekday1; // only count weekdays
        iWeekday2 = (iWeekday2 > 5) ? 5 : iWeekday2;

        // calculate differnece in weeks (1000mS * 60sec * 60min * 24hrs * 7 days = 604800000)
        iWeeks = Math.floor((dDate2.getTime() - dDate1.getTime()) / 604800000)

        if (iWeekday1 <= iWeekday2) {
            iDateDiff = (iWeeks * 5) + (iWeekday2 - iWeekday1)
        } else {
            iDateDiff = ((iWeeks + 1) * 5) - (iWeekday1 - iWeekday2)
        }

        iDateDiff -= iAdjust // take into account both days on weekend

        return (iDateDiff + 1); // add 1 because dates are inclusive

    }
</script>