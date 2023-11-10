<div class="col-lg-12" style="margin-top:20px;"> 
    <div class="col-sm-4"><h4></h4></div>
   
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right">
        <?php if ($userPrivileges->administration_control->department->Add == 1) { ?>
        <a href="#modal-add" data-toggle="modal" class="btn-sm btn-warning pull-right" style="margin-left:8px;">Add Department</a>
    <?php } ?>
    </div>
 
</div>
<div class="innerLR" style="margin-top:60px;">
    <div class="widget widget-body-white widget-heading-simple">
        <div class="widget-body overflow-x" style="padding:10px;">
            <table class="dynamicTable tableTools table table-striped overflow-x">
                <thead>
                    <tr style="background-color:#c72a25; color:#FFF;">
                        <th class="thead-th-padg">Department Name</th>

                        <th class="thead-th-padg" align="right" style="padding-right: 50px !important;text-align: right;">
                            <?php if(($userPrivileges->administration_control->department->Edit == 1) || ($userPrivileges->administration_control->department->Delete == 1)) { ?>
                            Actions
                         <?php } ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($department_detail)) {
                        foreach ($department_detail as $department) {
                           
                            ?>
                            <tr class="gradeX">
                                <td><span><?php echo $department->department_name; ?> </span></td>

                                <td align="right">                           
                                   <?php if($userPrivileges->administration_control->department->Edit == 1) { ?>
                                    <a href="#modal-edit" onclick="edit_department('<?php echo $department->department_id; ?>')" data-toggle="modal" class="btn-xs btn-success td-btn-marg-right">Edit</a>
                                    <?php } 
                       if($userPrivileges->administration_control->department->Delete == 1) { ?>
                                      
                                    <a href="#nogo" class="btn-xs btn-danger td-btn-marg-right" onclick="delete_department('<?php echo $department->department_id; ?>')">Delete</a>
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
                <h3 class="modal-title">Add Department</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="innerAll">
                    <div class="innerLR">
                       
                        <form class="form-horizontal" role="form" id="addForm" >
                            <div class="form-group">
                                <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Department Name</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="department_name" id="department_name" maxlength="200"  placeholder="Department Name">
                                </div>
                            </div>
                              
                            <img id="addloader" src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" style="display:none;margin-left: 200px;"/>

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
                <h3 class="modal-title">Edit Department</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="innerAll">
                    <div class="innerLR">
                        <form class="form-horizontal" role="form" id="editForm">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" style="text-align:left;margin-bottom:10px">Department Name</label>
                                <div class="col-sm-7">
                                    <input type="text" name="edit_department_name" id="edit_department_name" maxlength="200" class="form-control">
                                </div>
                            </div>
                            <input type="hidden" id="edit_department_id" value="">
                            <img id="editloader" src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" style="display:none;margin-left: 200px;"/>
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
        
        $('#modal-add').on('shown.bs.modal', function () {
            $('#addForm').bootstrapValidator('resetForm', true);
            $('.btn-success').removeAttr("disabled");
        });
        $('#addForm').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                department_name: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required.'
                        }
                    }
                }
                
                
            }
        })
                .on('success.form.bv', function (e) {
                    e.preventDefault();
            $('.btn-success').attr("disabled", "disabled");
                    var department_name = $('#department_name').val();


                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/department/add_department',
                        dataType: "json",
                        data: {department_name: department_name},
                        beforeSend: function ()
                        {
                            $("#addloader").show();
                        },
                        success: function (data) {
                            
                            
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {
                                    $("#modal-add").modal("hide");
                                    location.reload();
                                }
                                else
                                {
                                   // $("#modal-add").modal("show");
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
  

        $('#editForm').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                edit_department_name: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required.'
                        }
                    }
                }
            }
        })
                .on('success.form.bv', function (e) {
                    e.preventDefault();
                    $('.btn-success').attr("disabled", "disabled");
                    var department_id = $('#edit_department_id').val();
                    var department_name = $('#edit_department_name').val();

                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/department/submit_edit_department',
                        dataType: "json",
                        data: {department_id: department_id, department_name: department_name},
                        beforeSend: function ()
                        {
                            $("#editloader").show();

                        },
                        success: function (data) {
                            
                           
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {
                                     $("#modal-edit").modal("hide");
                                    window.stop();
                                    location.reload();
                                }
                                else
                                {
                                    //$("#modal-edit").modal("show");
                                    $('.btn-success').removeAttr("disabled");
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
    });

    function edit_department(id) {
         $('#modal-edit').on('shown.bs.modal', function () {
            $('#editForm').bootstrapValidator('resetForm', true);
            $('.btn-success').removeAttr("disabled");
        var request = $.ajax({
            url: CURRENT_URL + '/department/edit_department',
            type: "POST",
            data: {department_id: id},
            dataType: "json"
        });
        request.done(function (msg) {
            $.each(msg, function (i, item) {
                $('#edit_department_name').val(item.department_name);
                $('#edit_department_id').val(item.department_id);
                
            });
        });
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
        });
    }

    function delete_department(id) {
        bootbox.confirm("Are you sure you want to delete department?", function (result) {

            if (result == true) {

                var request = $.ajax({
                    url: CURRENT_URL + '/department/delete_department',
                    type: "POST",
                    data: {department_id: id},
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