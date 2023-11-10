<div style="margin-top:20px;width:97.5%"> 
    <div class="col-sm-4"><h4></h4></div>
    <?php if ($userPrivileges->leave_management->setleaves->Add == 1) { ?>
        
            <a href="#modal-add" data-toggle="modal" class="btn-sm btn-warning pull-right" style="margin-left:8px;">Add Leave Type</a>
        
    <?php } 
    if ($userPrivileges->leave_management->setleaves->Grant == 1) { ?>
    <a href="#modal-Leave" data-toggle="modal" class="btn-sm btn-warning pull-right" style="margin-left:8px;">Grant Leave</a>
     <?php } 
    if ($userPrivileges->leave_management->setleaves->Forward == 1) { ?>
    <a href="#modal-Leave-forward" data-toggle="modal" class="btn-sm btn-warning pull-right" style="margin-left:8px;">Forward Leave</a>
    <?php } ?>
</div>
<div class="innerLR" style="margin-top:60px;">
    <div class="widget widget-body-white widget-heading-simple">
        <div class="widget-body overflow-x" style="padding:10px;">
            <table class="dynamicTable tableTools table table-striped overflow-x">
                <thead>
                    <tr style="background-color:#c72a25; color:#FFF;">
                        <th class="thead-th-padg">Leave Type</th>
                        <th class="thead-th-padg">Legend</th>
                        <th class="thead-th-padg">Weekend Included</th>
                        <th class="thead-th-padg"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($leave_type_detail)) {
                        foreach ($leave_type_detail as $leave_type) {
                            ?>
                            <tr class="gradeX">
                                <td><span><?php echo $leave_type->leave_type; ?> </span></td>
                                <td><span><?php echo $leave_type->legend; ?> </span></td>
                                <td><span><?php echo ($leave_type->weekend_check == 1) ? 'Yes' : 'No'; ?> </span></td>
                                <td>                           
                                    <?php if ($userPrivileges->leave_management->setleaves->Edit == 1) { ?>
                                        <a href="#modal-edit" onclick="edit_leave_type('<?php echo $leave_type->leave_type_id; ?>')" data-toggle="modal" class="btn-xs btn-success pull-right td-btn-marg-right">Edit</a>
                                        <?php
                                    }
                                    if ($userPrivileges->leave_management->setleaves->Delete == 1) {
                                        ?>
                                        <a href="#nogo" class="btn-xs btn-danger pull-right td-btn-marg-right" onclick="delete_leave_type('<?php echo $leave_type->leave_type_id; ?>')">Delete</a>
                                    <?php } ?>
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
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Add Leave Type</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="innerAll">
                    <div class="innerLR">
                        <form class="form-horizontal" role="form" id="addForm">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Leave Type</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="leave_type" id="leave_type" maxlength="200"  placeholder="Leave Type">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Legend</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="legend" id="legend" maxlength="200"  placeholder="Legend">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Weekend Included </label>

                                <div class="col-sm-7 checkbox"> 
                                    <label class="checkbox-custom" style="margin-left:20px;"> 
                                        <input type="checkbox" name="weekend_check" id="weekend_check" onclick="$(this).attr('value', this.checked ? 1 : 0)" value="0">
                                        <i class="fa fa-fw fa-square-o checked"></i> 
                                    </label> 
                                </div>
                            </div>
                            <img id="addloader" src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" style="display:none;"/>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button class="btn btn-success pull-right">Save</button>
                                    <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade"  id="modal-edit">

    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal heading -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Edit Leave Type</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="innerAll">
                    <div class="innerLR">
                        <form class="form-horizontal" role="form" id="editForm">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Leave Type</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="edit_leave_type" id="edit_leave_type" maxlength="200"  placeholder="Leave Type">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Legend</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="edit_legend" id="edit_legend" maxlength="200"  placeholder="Legend">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Weekend Included </label>

                                <div class="checkbox"> 
                                    <label class="checkbox-custom" style="margin-left:20px;"> 
                                        <input type="checkbox" name="edit_weekend_check" id="edit_weekend_check" onclick="$(this).attr('value', this.checked ? 1 : 0)" value="0">
                                        <i class="fa fa-fw fa-square-o checked"></i> 
                                    </label> 
                                </div>
                            </div>

                            <input type="hidden" name="edit_leave_type_id" id="edit_leave_type_id" value="">
                            <img id="editloader" src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" style="display:none;"/>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button class="btn btn-success pull-right">Save</button>
                                    <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- // Modal body END -->

        </div>
    </div>

</div>
<div class="modal fade"  id="modal-Leave">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Grant Leave</h3>
            </div>
            <div class="modal-body">
                <div class="innerAll">
                    <div class="innerLR">
                        <form id="addLeaveForm" class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-sm-5 control-label" style="text-align:left; margin-bottom:10px;">Leave Type</label>
                                <div class="col-sm-6" style="padding: 0;">
                                    <select id="addleaveTypeCategory" name="leaveTypeCategory" class="form-control">
                                        <option value="" disabled="" selected="">Select Type</option>
                                        <?php
                                                           
                                        if (!empty($leave_type_detail)) {
                                            foreach ($leave_type_detail as $leave_type) {
                                                ?>
                                                <option value="<?php echo $leave_type->leave_type_id; ?>"><?php echo $leave_type->leave_type; ?></option>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>    
                            <div class="form-group">
                                <label class="col-sm-5 control-label" style="text-align:left; margin-bottom:10px;">Year</label>
                                <div class="col-sm-6" style="padding: 0;">
                                    <select id="addLeaveYear" name="LeaveYear" class="form-control">
                                        <option value="" disabled="" selected="">Select Year</option>
                                        <?php
                                        

                                        foreach (range(EARLIEST_YEAR, date('Y', strtotime('+1 year'))) as $x) {
                                            echo '<option value="' . $x . '"' . ($x == $year ? ' selected="selected"' : '') . '>' . $x . '</option>';
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label" style="text-align:left; margin-bottom:10px;">No. Of Days</label>
                                <div class="col-sm-6" style="padding: 0;">
                                    <input type="text" class="form-control" name="noOfLeaves" id="addnoOfLeaves" placeholder="No. Of Days">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label" style="text-align:left; margin-bottom:10px;">All Employee</label>
                                <div class="col-sm-6" style="padding: 0;">
                                    <input name="allEmp" id="addallEmp" type="checkbox">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label" style="text-align:left; margin-bottom:10px;">List Of Employee</label>
                                <div class="col-sm-6" style="padding: 0;">
                                    <select id="addlistOfEmp" name="listOfEmp[]" class="form-control" multiple style="height: 160px;">
                                        <optgroup label="Select Employees">
<?php
if (!empty($user_detail)) {
    foreach ($user_detail as $user) {
        ?>
                                                    <option value="<?php echo $user->id; ?>"><?php echo $user->empName; ?></option>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button class="btn btn-success pull-right" id="g_leave">Save</button>
                                    <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;" id="c_g_leave">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade"  id="modal-Leave-forward">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Forward Leave</h3>
            </div>
            <div class="modal-body">
                <div class="innerAll">
                    <div class="innerLR">
                        <form id="addForwardLeaveForm" class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-sm-5 control-label" style="text-align:left; margin-bottom:10px;">Leave Type</label>
                                <div class="col-sm-6" style="padding: 0;">
                                    <select id="addforwardleaveTypeCategory" name="forwardleaveTypeCategory" class="form-control">
                                        <option value="" disabled="" selected="">Select Type</option>
<?php
if (!empty($leave_type_detail)) {
    foreach ($leave_type_detail as $leave_type) {
        ?>
                                                <option value="<?php echo $leave_type->leave_type_id; ?>"><?php echo $leave_type->leave_type; ?></option>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>    
                            <div class="form-group">
                                <label class="col-sm-5 control-label" style="text-align:left; margin-bottom:10px;">Balance leaves carry forward</label>
                                <div class="col-sm-6" style="padding: 0;">
                                    <select id="addforwardYear" name="forwardYear" class="form-control">
                                        <option value="" disabled="" selected="">Select Year</option>
                                        <option value="<?php echo date('Y') . '_' . date('Y', strtotime('+1 year')); ?>"><?php echo date('Y') . ' to ' . date('Y', strtotime('+1 year')); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label" style="text-align:left; margin-bottom:10px;">All Leave</label>
                                <div class="col-sm-6" style="padding: 0;">
                                    <input name="allLeave" id="allLeave" type="checkbox" checked>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label" style="text-align:left; margin-bottom:10px;">No. Of Days</label>
                                <div class="col-sm-6" style="padding: 0;">
                                    <input type="text" class="form-control" name="forwardLeaves" id="addforwardLeaves" placeholder="No. Of Days" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button class="btn btn-success pull-right" id="f_leave">Save</button>
                                    <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;" id="c_f_leave">Cancel</a>
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
    (function ($) {
        $.fn.bootstrapValidator.validators.integerLength = {
            validate: function (validator, $field, options) {
                var value = $field.val();
                if (value > 90) {
                    return false;
                }
                return true;
            }
        };
    }(window.jQuery));
    $(document).ready(function () {
        
        $('#modal-add').modal({
          backdrop: 'static',
          keyboard: true,
            show: false   
        })
        $('#modal-edit').modal({
          backdrop: 'static',
          keyboard: true,
            show: false   
        })
        
        $('#modal-Leave-forward').modal({
          backdrop: 'static',
          keyboard: true,
            show: false   
        })
        $('#modal-Leave').modal({
          backdrop: 'static',
          keyboard: true,
            show: false   
        })
        
        $('#modal-add').on('shown.bs.modal', function () {
            $('#addForm').bootstrapValidator('resetForm', true);
            $('input[name=weekend_check]').next('i').removeClass('checked');
        });
        $('#modal-Leave').on('shown.bs.modal', function () {
            $('#addLeaveForm').bootstrapValidator('resetForm', true);
            $('#addallEmp').prop('checked', false);
            $('#addlistOfEmp option').prop('selected', false);
            $('#addlistOfEmp').removeAttr("disabled");
        });
        $('#modal-Leave-forward').on('shown.bs.modal', function () {
            $('#addForwardLeaveForm').bootstrapValidator('resetForm', true);
            $('#allLeave').prop('checked', true);
            $('#addforwardLeaves').attr("disabled", "disabled");
        });

        $('#addForm').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                leave_type: {
                    validators: {
                        notEmpty: {
                            message: 'The Leave type is required'
                        }
                    }
                },
                legend: {
                    validators: {
                        notEmpty: {
                            message: 'The Legend is required'
                        }
                    }
                }
            }
        })
                .on('success.form.bv', function (e) {
                    e.preventDefault();
                    var data = $("#addForm").serialize();


                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/leave/add_leave_type',
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
                                    location.reload();
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


        $('#editForm').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                edit_leave_type: {
                    validators: {
                        notEmpty: {
                            message: 'The Leave type is required'
                        }
                    }
                },
                edit_legend: {
                    validators: {
                        notEmpty: {
                            message: 'The Legend is required'
                        }
                    }
                }
            }
        })
                .on('success.form.bv', function (e) {
                    e.preventDefault();
                    var data = $("#editForm").serialize();

                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/leave/submit_edit_leave_type',
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
                                    location.reload();
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
        $('#modal-Leave').on('shown.bs.modal', function () {
            $('#addLeaveForm').bootstrapValidator('resetForm', true);


        });
        $('#addLeaveForm').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            }, fields: {
                leaveTypeCategory: {
                    validators: {
                        notEmpty: {
                            message: 'LeaveType Category is required'
                        }
                    }
                }, LeaveYear: {
                    validators: {
                        notEmpty: {
                            message: 'Leave Year is required'
                        }
                    }
                }, noOfLeaves: {
                    validators: {
                        notEmpty: {
                            message: 'No. of days per year is required'
                        }
                    }
                }
            }
        })
                .on('success.form.bv', function (e) {
                    e.preventDefault();
                    var EmpList = [];
                    $('#addlistOfEmp :selected').each(function (i, selected) {
                        if ($(selected).val() != "") {
                            EmpList[i] = $(selected).val();
                        }
                    });
                    //console.log(EmpList);
                    if (EmpList.length <= 0) {
                        bootbox.alert("Please Select atleast 1 Employee from list");
                        return;
                    }
                    $('#g_leave').attr("disabled", "disabled");
                    $('#c_g_leave').attr("disabled", "disabled");

                    var comp = new Object();
                    comp.leaveTypeCategory = $('#addleaveTypeCategory').val();
                    comp.LeaveYear = $('#addLeaveYear').val();
                    comp.noOfLeaves = $('#addnoOfLeaves').val();
                    comp.EmployeeList = EmpList;
                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/leave/grant_leave',
                        dataType: "json",
                        data: $.param(comp),
                        beforeSend: function () {
                            $("#addloader").show();
                        },
                        success: function (data) {
                            $('#modal-Leave').modal("hide");
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS") {
                                    //location.reload();
                                    $('#g_leave').removeAttr('disabled');
                                    $('#c_g_leave').removeAttr('disabled');
                                } else {
                                    $('#modal-Leave').modal("show");
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
        $('#modal-Leave-forward').on('shown.bs.modal', function () {
            $('#addForwardLeaveForm').bootstrapValidator('resetForm', true);


        });
        $('#addForwardLeaveForm').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            }, fields: {
                forwardleaveTypeCategory: {
                    validators: {
                        notEmpty: {
                            message: 'LeaveType Category is required'
                        }
                    }
                }, forwardYear: {
                    validators: {
                        notEmpty: {
                            message: 'Leave Year is required'
                        }
                    }
                }, forwardLeaves: {
                    validators: {
                        notEmpty: {
                            message: 'No. Of Days per year is required'
                        }
                    }
                }
            }
        })
                .on('success.form.bv', function (e) {
                    e.preventDefault();
                    var comp = new Object();
                    if ($("#allLeave").is(':checked')) {
                        comp.selectAll = "ALL";
                    } else {
                        comp.selectAll = "NONE";
                    }
                    $('#f_leave').attr("disabled", "disabled");
                    $('#c_f_leave').attr("disabled", "disabled");
                    comp.leaveTypeCategory = $('#addforwardleaveTypeCategory').val();
                    comp.LeaveYear = $('#addforwardYear').val();
                    comp.noOfLeaves = $('#addforwardLeaves').val();
                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/leave/forward_leave',
                        dataType: "json",
                        data: $.param(comp),
                        beforeSend: function () {
                            $("#addloader").show();
                        },
                        success: function (data) {
                            $('#modal-Leave-forward').modal("hide");
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS") {
                                    $('#f_leave').removeAttr('disabled');
                                    $('#c_f_leave').removeAttr('disabled');
                                } else {
                                    $('#f_leave').removeAttr('disabled');
                                    $('#c_f_leave').removeAttr('disabled');
                                    $('#modal-Leave-forward').modal("show");
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

        initTables();
        $('#addallEmp').click(function () {
            if ($("#addallEmp").is(':checked')) {
                $('#addlistOfEmp option').prop('selected', true);
                $('#addlistOfEmp').attr("disabled", "disabled");
            } else {
                $('#addlistOfEmp option').prop('selected', false);
                $('#addlistOfEmp').removeAttr("disabled");
            }
        });

        $('#allLeave').click(function () {
            if ($("#allLeave").is(':checked')) {
                $('#addforwardLeaves').attr("disabled", "disabled");
            } else {
                $('#addforwardLeaves').removeAttr("disabled");
            }
        });
    });

    function edit_leave_type(id) {
        var request = $.ajax({
            url: CURRENT_URL + '/leave/edit_leave_type',
            type: "POST",
            data: {leave_type_id: id},
            dataType: "json"
        });
        request.done(function (msg) {
            $.each(msg, function (i, item) {
                $('#edit_leave_type_id').val(item.leave_type_id);
                $('#edit_leave_type').val(item.leave_type);
                $('#edit_legend').val(item.legend);
                $('#edit_weekend_check').val(item.weekend_check);
                if (item.weekend_check == 1) {
                    $('input[name=edit_weekend_check]').next('i').addClass('checked');
                }
            });
        });
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    }

    function delete_leave_type(id) {
        bootbox.confirm("Are you sure you want to delete leave type?", function (result) {

            if (result == true) {

                var request = $.ajax({
                    url: CURRENT_URL + '/leave/delete_leave_type',
                    type: "POST",
                    data: {leave_type_id: id},
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
</script>