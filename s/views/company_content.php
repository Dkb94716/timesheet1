<div class="col-lg-12" style="margin-top:20px;"> 
    <div class="col-sm-4"><h4></h4></div>
    <?php if ($userPrivileges->administration_control->company->Add == 1) { ?>
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right">
        <a href="#modal-add" data-toggle="modal" class="btn-sm btn-warning pull-right" style="margin-left:8px;">Add Company</a>
    </div>
    <?php } ?>
</div>
<div class="innerLR" style="margin-top:60px;">
    <div class="widget widget-body-white widget-heading-simple">
        <div class="widget-body overflow-x" style="padding:10px;">
            <table class="dynamicTable tableTools table table-striped overflow-x">
                <thead>
                    <tr style="background-color:#c72a25; color:#FFF;">
                        <th class="thead-th-padg">Company Name</th>
                        <th class="thead-th-padg">Company Logo</th>
                        <th class="thead-th-padg" style="padding-right: 50px !important;text-align: right;">
                            <?php if (($userPrivileges->administration_control->company->Edit == 1) || ($userPrivileges->administration_control->company->Delete == 1)) { ?>
                            Actions
                         <?php } ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($company_detail)) {
                        foreach ($company_detail as $company) {
                            ?>
                            <tr class="gradeX">
                                <td><span><?php echo $company->company_name; ?> </span></td>
                                <td><span><?php if(!empty($company->company_logo)){
                                
                            if(file_exists(realpath("uploads/company").'/'.$company->company_logo)){ ?>
                                        <img src="<?php echo base_url();?>uploads/company/<?php echo $company->company_logo;?>" style="max-height: 30px;">
                            <?php } 
                                }
                           ?> </span></td>
                                <td align="right">                           
                                    <?php if ($userPrivileges->administration_control->company->Edit == 1) { ?>
                                    <a href="#modal-edit" onclick="edit_company('<?php echo $company->company_id; ?>')" data-toggle="modal" class="btn-xs btn-success td-btn-marg-right">Edit</a>
                                     <?php } 
                                      if ($userPrivileges->administration_control->company->Delete == 1) { ?>
                                    <a href="#nogo" class="btn-xs btn-danger td-btn-marg-right" onclick="delete_company('<?php echo $company->company_id; ?>','<?php echo $company->company_logo; ?>')">Delete</a>
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
                <h3 class="modal-title">Add Company</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="innerAll">
                    <div class="innerLR">
                        <form class="form-horizontal" role="form" id="addForm" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Company Name</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="company_name" id="company_name" maxlength="200"  placeholder="Company Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Company Logo</label>
                                <div class="col-sm-7">
                                    <input type="file" name="company_logo" id="company_logo" >
                                    
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
                <h3 class="modal-title">Edit Company</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="innerAll">
                    <div class="innerLR">
                        <form class="form-horizontal" role="form" id="editForm" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" style="text-align:left;margin-bottom:10px">Company Name</label>
                                <div class="col-sm-7">
                                    <input type="text" name="edit_company_name" id="edit_company_name" maxlength="200" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Company Logo</label>
                                <div class="col-sm-7">
                                    <input type="file" name="edit_company_logo" id="edit_company_logo" >
                                    <button type="button" onclick="delete_company_logo()" id="logo_delete" class="btn-xs btn-warning">Delete Logo</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" style="text-align: left;"></label>
                                <div class="col-sm-7">
                                    <img src="" id="prev_logo" style="max-height: 30px;">
                                    
                                </div>
                            </div>
                            <input type="hidden" id="logo_delete_flag" value="0">
                            <input type="hidden" id="edit_company_id" value="">
                            <input type="hidden" name="prev_company_logo" id="prev_company_logo">
                            <img id="editloader" src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" style="display:none;margin-left: 200px;" />
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
                company_name: {
                    validators: {
                        notEmpty: {
                            message: 'The Company Name is required'
                        }
                    }
                },
                company_logo: {
                validators: {
                    file: {
                        extension: 'jpeg,png,jpg',
                        type: 'image/jpeg,image/png,image/jpg',
                        maxSize: 10240,   // 2048 * 1024
                        message: 'Image file format should be jpg or png and file size not more than 10kb.'
                    }
                }
            }
            }
        })
                .on('success.form.bv', function (e) {
                    e.preventDefault();
                    var company_name = $('#company_name').val();
                    var file = document.getElementById("company_logo");
                    var formData = new FormData();

                  /* Add the file */ 
                  formData.append("company_logo", file.files[0]);
                  formData.append("company_name", company_name);

                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/company/add_company',
                        processData: false,
                        contentType: false,
                        data: formData,
                        dataType: "json",
                        beforeSend: function ()
                        {
                            $("#addloader").show();
                        },
                        success: function (data) {
                            $('.btn-success').attr("disabled", "disabled");
                            
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
                edit_company_name: {
                    validators: {
                        notEmpty: {
                            message: 'The Company Name is required'
                        }
                    }
                },
                edit_company_logo: {
                validators: {
                    file: {
                        extension: 'jpeg,png,jpg',
                        type: 'image/jpeg,image/png,image/jpg',
                        maxSize: 10240,   // 2048 * 1024
                        message: 'Image file format should be jpg or png and file size not more than 10kb.'
                    }
                }
            }
            }
        })
                .on('success.form.bv', function (e) {
                    e.preventDefault();
                    $('.btn-success').attr("disabled", "disabled");
                    var company_id = $('#edit_company_id').val();
                    var company_name = $('#edit_company_name').val();
                    var prev_company_logo = $('#prev_company_logo').val();
                    var logo_delete_flag = $('#logo_delete_flag').val();
                    var file = document.getElementById("edit_company_logo");
                    var formData = new FormData();

                  /* Add the file */ 
                  formData.append("company_logo", file.files[0]);
                  formData.append("company_id", company_id);
                  formData.append("company_name", company_name);
                  formData.append("prev_company_logo", prev_company_logo);
                  formData.append("logo_delete_flag", logo_delete_flag);
                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/company/submit_edit_company',
                        processData: false,
                        contentType: false,
                        data: formData,
                        dataType: "json",
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

    function edit_company(id) {
        $('#modal-edit').on('shown.bs.modal', function () {
            $('#editForm').bootstrapValidator('resetForm', true);
            var request = $.ajax({
            url: CURRENT_URL + '/company/edit_company',
            type: "POST",
            data: {company_id: id},
            dataType: "json"
        });
        request.done(function (msg) {
            $.each(msg, function (i, item) {
                $('#edit_company_name').val(item.company_name);
                $('#edit_company_id').val(item.company_id);
                $('#prev_company_logo').val(item.company_logo);
                $('#prev_logo').hide();
                $('#logo_delete').hide();
                if(item.company_logo){
                $('#prev_logo').show();
                $('#logo_delete').show();
                $('#prev_logo').attr('src',CURRENT_URL +'/uploads/company/'+item.company_logo);
                $('#edit_company_logo').hide();
            }
            else{
                $('#prev_logo').hide();
                $('#logo_delete').hide();
                $('#prev_logo').attr('src','');
                $('#edit_company_logo').show();
            }
                $('.btn-success').removeAttr("disabled");
            });
        });
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
        });
        
    }

    function delete_company(id,company_logo) {
        bootbox.confirm("Are you sure you want to delete company?", function (result) {

            if (result == true) {

                var request = $.ajax({
                    url: CURRENT_URL + '/company/delete_company',
                    type: "POST",
                    data: {company_id: id,company_logo:company_logo},
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
    
    function delete_company_logo() {
       
                $('#logo_delete').hide();
                $('#prev_logo').hide();
                $('#logo_delete_flag').val('1');
                $('#edit_company_logo').show();
            

    }
</script>