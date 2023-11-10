<div class="col-lg-12" style="margin-top:20px;"> 
    <div class="col-sm-4"><h4></h4></div>
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right">
        <?php if ($userPrivileges->administration_control->user_role->Add == 1) { ?>
        <a href="#modal-add" data-toggle="modal" class="btn-sm btn-warning pull-right" style="margin-left:8px;">Add Role</a>
        <?php } ?>
    </div>
</div>
<div class="innerLR" style="margin-top:60px;">
    <div class="widget widget-body-white widget-heading-simple">
        <div class="widget-body overflow-x" style="padding:10px;">
            <table class="dynamicTable tableTools table table-striped overflow-x">
                <thead>
                    <tr style="background-color:#c72a25; color:#FFF;">
                        <th class="thead-th-padg">Role Name</th>

                        <th class="thead-th-padg" align="right" style="padding-right: 130px !important;text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($user_role_detail)) {
                        foreach ($user_role_detail as $user_role) {
                            ?>


                            <tr class="gradeX">
                                <td><span><?php echo $user_role->role_name; ?> </span></td>

                                <td>     
                                   <?php if ($userPrivileges->administration_control->user_role->Delete == 1) { ?>
                                    <a href="#nogo" class="btn-xs btn-danger pull-right td-btn-marg-right" onclick="delete_user_role('<?php echo $user_role->role_id; ?>')">Delete</a>
                                    <?php } ?>
                                     <?php if ($userPrivileges->administration_control->user_role->Privileges == 1) { ?>
                                    <a href="#" class="btn-xs btn-inverse pull-right td-btn-marg-right"  onclick="set_privileges('<?php echo $user_role->role_id; ?>')">Set Privileges</a>
                                    <?php } ?>
                                     
                                    
                                     <?php if ($userPrivileges->administration_control->user_role->Edit == 1) { ?>
                                    <a href="#modal-edit" onclick="edit_user_role('<?php echo $user_role->role_id; ?>')" data-toggle="modal" class="btn-xs btn-success pull-right td-btn-marg-right">Edit</a>
                                    <?php } ?>
                                </td>
                            </tr>    




                        <?php }
                    } ?>
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
                <h3 class="modal-title">Add Role</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="innerAll">
                    <div class="innerLR">
                        <form class="form-horizontal" role="form" id="addForm">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Name Of The Role</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="role_name" id="role_name"  placeholder="Role Name">
                                </div>
                            </div>
                            <img id="addloader" src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" style="display:none;"/>

                            <div class="form-group">
                                <div class="col-sm-offset-1 col-sm-10">
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
                <h3 class="modal-title">Edit Company</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="innerAll">
                    <div class="innerLR">
                        <form class="form-horizontal" role="form" id="editForm">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" style="text-align:left;margin-bottom:10px">Role Name</label>
                                <div class="col-sm-7">
                                    <input type="text" name="edit_role_name" id="edit_role_name" class="form-control">
                                </div>
                            </div>
                            <input type="hidden" id="edit_role_id" value="">

                            <div class="form-group">
                                <div class="col-sm-offset-1 col-sm-10">
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
<script>
    $(document).ready(function() {
        
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
        
        $('#modal-add').on('shown.bs.modal', function () {
            $('#addForm').bootstrapValidator('resetForm', true);
        });
        $('#addForm').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                role_name: {
                    validators: {
                        notEmpty: {
                            message: 'The Role Name is required'
                        }
                    }
                },
            }
        })
        .on('success.form.bv', function(e) {
            e.preventDefault();
    $('.btn-success').prop("disabled", true);
            var role_name = $('#role_name').val();
            $.ajax({
                async: true,
                type: "POST",
                url: CURRENT_URL + '/user_role/add_role',
                dataType: "json",
                data: {role_name: role_name},
                beforeSend: function()
                {
                    $("#addloader").show();
                },
                success: function(data) {
                    
                    bootbox.alert(data.message, function() {
                        if (data.status == "SUCCESS")
                        {
                            $("#modal-add").modal("hide");
                            location.reload();
                        }
                        else
                        {
                            $('.btn-success').removeAttr("disabled");
                        }

                    });

                },
                error: function(xhr, status, error) {
                    bootbox.alert(status);
                },
                complete: function()
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
                edit_role_name: {
                    validators: {
                        notEmpty: {
                            message: 'The Role Name is required'
                        }
                    }
                },
            }
        })
        .on('success.form.bv', function(e) {
            e.preventDefault();
$('.btn-success').prop("disabled", true);
            var role_id = $('#edit_role_id').val();
            var role_name = $('#edit_role_name').val();
                        
            $.ajax({
                async: true,
                type: "POST",
                url: CURRENT_URL + '/user_role/submit_edit_user_role',
                dataType: "json",
                data: {role_id: role_id, role_name: role_name},
                beforeSend: function()
                {
                    $("#addloader").show();

                },
                success: function(data) {
                    
                    bootbox.alert(data.message, function() {
                        if (data.status == "SUCCESS")
                        {
                            $("#modal-edit").modal("hide");
                            window.stop();
                            location.reload();
                        }
                        else
                        {
                            $('.btn-success').removeAttr("disabled");
                        }

                    });
                },
                error: function(xhr, status, error) {
                    alert(status);
                },
                complete: function()
                {
                    $("#addloader").hide();
                }
            });



        });
        initTables();

    });

    function edit_user_role(id) {
        var request = $.ajax({
            url: CURRENT_URL + '/user_role/edit_user_role',
            type: "POST",
            data: {role_id: id},
            dataType: "json"
        });
        request.done(function(msg) {
            $.each(msg, function(i, item) {
                $('#edit_role_name').val(item.role_name);
                $('#edit_role_id').val(item.role_id);
            });
        });
        request.fail(function(jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    }

    function delete_user_role(id) {
        bootbox.confirm("Are you sure you want to delete role?", function(result) {
            if (result == true) {
                var chkRequest = $.ajax({
                    url: CURRENT_URL + '/user_role/chkRoleAllotedToEmploye',
                    type: "POST",
                    data: {role_id: id},
                    dataType: "json"
                });
                chkRequest.done(function(data) {
                        if (data.status == "SUCCESS") {
                            bootbox.alert(data.message, function() { });
                        } else if (data.status == "FAILED") {
                            var request = $.ajax({
                            url: CURRENT_URL + '/user_role/delete_user_role',
                            type: "POST",
                            data: {role_id: id},
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
                    } else {
                            
                        }
                });
                chkRequest.fail(function(jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
            }
        });
    }

    function set_privileges(role_id)
    {

        window.location.href = "list_user_privileges/" + role_id;

    }

</script>