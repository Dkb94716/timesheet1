<div class="col-lg-12" style="margin-top:20px;"> 
    <div class="col-sm-4"><h4></h4></div>
    <?php if(empty($database)){ 
        if ($userPrivileges->administration_control->clients->Add == 1) { ?>
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right">
        <a href="#modal-add" data-toggle="modal" class="btn-sm btn-warning pull-right" style="margin-left:8px;">Add Client</a>
    </div>
    <?php 
        }
        } ?>
</div>
<div class="innerLR" style="margin-top:60px;">
    <div class="widget widget-body-white widget-heading-simple">
        <div class="widget-body overflow-x" style="padding:10px;">
            <div class="col-lg-12" style="padding-right: 0px;">
                <a href="<?php echo base_url('client/kycdirectors');?>" style="cursor: pointer; margin-right: 0px;" class="btn-sm btn-success pull-right td-btn-marg-right">KYC Directors</a>
            </div>
            <table class="dynamicTable tableTools table table-striped overflow-x">
                <thead>
                    <tr style="background-color:#c72a25; color:#FFF;">
                        <th class="thead-th-padg">Client Name</th>
                        <th class="thead-th-padg">Company Name</th>
                        <th class="thead-th-padg" width="200">Team</th>
                        <?php if(!empty($database)){ ?>
                        <th class="thead-th-padg">Status</th>
                        <?php } ?>
                        <th class="thead-th-padg" align="right" style="padding-right: 50px !important;text-align: right;">
                            <?php if(!empty($database)){ 
                                if(($userPrivileges->client_database->database->view_edit_details==1)||($userPrivileges->client_database->database->excel_export==1)||($userPrivileges->client_database->database->download_pdf==1)){ ?>
                                Actions
                             <?php 
                                }
                                }
                            else
                            { if(($userPrivileges->administration_control->clients->Edit == 1) || ($userPrivileges->administration_control->clients->Delete == 1)) { ?>
                            Actions
                         <?php } 
                            } ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($client_detail)) {
                        
                     foreach ($client_detail as $client) {
                          $status = $this->client_model->listClientInfo($client->client_id);
                            ?>
                            <tr class="gradeX">
                                <td><span><?php echo $client->client_name; ?> </span></td>
                                <td><span><?php echo $client->company_name; ?> </span></td>
                                <td><span><?php echo str_replace(',', ', ', $client->team_name); ?> </span></td>
                                <?php if(!empty($database)){ ?>
                        <td><span><?php echo $status[0]->status; ?> </span></td>
                        <?php } ?>
                                <td align="right">  
                                    <?php if(!empty($database)){
                                        if($userPrivileges->client_database->database->view_edit_details==1){ ?>
                                    <a href="<?php echo base_url();?>client/client_detail/<?php echo $client->client_id; ?>?from=content" data-toggle="modal" class="btn-xs btn-success td-btn-marg-right">View/Edit Details</a>
                                        <?php }
                                        if($userPrivileges->client_database->database->excel_export==1){ ?>
<!--                                    <a href="<?php echo base_url();?>client/download_excel/<?php echo $client->client_id; ?>" data-toggle="modal" class="btn-xs btn-success td-btn-marg-right">Export Excel</a>-->
                                    <a href="#" class="btn-xs btn-success td-btn-marg-right">Export Excel</a>
                                        <?php } 
                                        if($userPrivileges->client_database->database->download_pdf==1){ ?>
<!--                                    <a href="<?php echo base_url();?>client/download_pdf/<?php echo $client->client_id; ?>" data-toggle="modal" class="btn-xs btn-success td-btn-marg-right">Download PDF</a>-->
                                    <a href="#" data-toggle="modal" class="btn-xs btn-success td-btn-marg-right">Download PDF</a>
                                    <?php 
                                        }
                                        } 
                                    else{ 
                                        if ($userPrivileges->administration_control->clients->Edit == 1) { ?>
                                    <a href="#modal-edit" onclick="edit_client('<?php echo $client->client_id; ?>')" data-toggle="modal" class="btn-xs btn-success td-btn-marg-right">Edit</a>
                                    <?php } 
                                      if ($userPrivileges->administration_control->clients->Delete == 1) { ?>
                                    <a href="#nogo" class="btn-xs btn-danger td-btn-marg-right" onclick="delete_client('<?php echo $client->client_id; ?>')">Delete</a>
                                    <?php 
                                      }
                                      } ?>
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
                <h3 class="modal-title">Add Client</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="innerAll">
                    <div class="innerLR">
                        <form class="form-horizontal" role="form" id="addForm">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Client Name</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="client_name" id="client_name" maxlength="200"  placeholder="Client Name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Company Name</label>
                                <div class="col-sm-7">
                                    <select type="text" class="form-control" name="company_name" id="company_name">
                                        <option value="">Select</option>
                                        <?php
                                        foreach ($company_detail as $company) {
                                            ?>
                                            <option value="<?php echo $company->company_name; ?>"><?php echo $company->company_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                 <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Team Assigned</label>
                                 <div class="col-sm-7">
                                     <select type="text" class="form-control" name="team_name" id="team_name" multiple="">
                                      <optgroup label="Select">   
                            <?php
                            foreach ($team_detail as $team) {
                                ?>
                                                 <option value="<?php echo $team->team_name; ?>"><?php echo $team->team_name; ?></option>
                            <?php } ?>
                                      </optgroup>
                                     </select>
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
                <h3 class="modal-title">Edit Client</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="innerAll">
                    <div class="innerLR">
                        <form class="form-horizontal" role="form" id="editForm">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" style="text-align:left;margin-bottom:10px">Client Name</label>
                                <div class="col-sm-7">
                                    <input type="text" name="edit_client_name" id="edit_client_name" maxlength="200" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Company Name</label>
                                <div class="col-sm-7">
                                    <select type="text" class="form-control" name="edit_company_name" id="edit_company_name">
                                        <option value="">Select</option>
                                        <?php
                                        foreach ($company_detail as $company) {
                                            ?>
                                            <option value="<?php echo $company->company_name; ?>"><?php echo $company->company_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                           <div class="form-group">
                                <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Team Assigned</label>
                                <div class="col-sm-7">
                                    <select type="text" class="form-control" name="edit_team_name" id="edit_team_name" multiple="">
                                       <optgroup label="Select">
    
  
                            <?php
                            foreach ($team_detail as $team) {
                                ?>
                                                <option value="<?php echo $team->team_name; ?>"><?php echo $team->team_name; ?></option>
                            <?php } ?>
                                                </optgroup>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" id="edit_client_id" value="">
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
            $('.btn-success').prop("disabled", false);
            $('#addForm').bootstrapValidator('resetForm', true);
            $("#team_name option:selected").removeAttr("selected");
        });
        $('#addForm').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                client_name: {
                    validators: {
                        notEmpty: {
                            message: 'Client Name is required'
                        }
                    }
                },
                company_name: {
                    validators: {
                        notEmpty: {
                            message: 'Company Name is required'
                        }
                    }
                }
            }
        })
                .on('success.form.bv', function (e) {
                    e.preventDefault();
            $('.btn-success').prop("disabled", true);
                    var client_name = $('#client_name').val();
                    var company_name = $('#company_name').val();
                    var team_name = $('#team_name').val();


                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/client/add_client',
                        dataType: "json",
                        data: {client_name: client_name, company_name: company_name, team_name: team_name},
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
                                    //$("#modal-add").modal("show");
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
                edit_client_name: {
                    validators: {
                        notEmpty: {
                            message: 'Client Name is required'
                        }
                    }
                },
                edit_company_name: {
                    validators: {
                        notEmpty: {
                            message: 'Company Name is required'
                        }
                    }
                }
            }
        })
                .on('success.form.bv', function (e) {
                    e.preventDefault();
            $('.btn-success').attr("disabled", "disabled");
                    var client_id = $('#edit_client_id').val();
                    var client_name = $('#edit_client_name').val();
                    var team_name = $('#edit_team_name').val();
                    var company_name = $('#edit_company_name').val();
                    

                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/client/submit_edit_client',
                        dataType: "json",
                        data: {client_id: client_id, client_name: client_name, company_name: company_name, team_name: team_name},
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

    function edit_client(id) {
          $('#modal-edit').on('shown.bs.modal', function () {
            $('#editForm').bootstrapValidator('resetForm', true);
           
            $('.btn-success').removeAttr("disabled");
        var request = $.ajax({
            url: CURRENT_URL + '/client/edit_client',
            type: "POST",
            data: {client_id: id},
            dataType: "json"
        });
        request.done(function (msg) {
            $.each(msg, function (i, item) {
                if(i==0){
                $('#edit_client_name').val(item.client_name);
                $('#edit_company_name').val(item.company_name);
                
                $('#edit_client_id').val(item.client_id);
            }
             $("#edit_team_name option:selected").removeAttr("selected");
            if(item.team_name!=''){
            var res = item.team_name.split(","); 
            $("#edit_team_name option").each(function(){
                if (res.indexOf($(this).attr("value")) != -1) { 
        $(this).attr("selected",true); 
      }
              });
          }
                
            });
        });
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
        });
    }

    function delete_client(id) {
        bootbox.confirm("Are you sure you want to delete the client?", function (result) {

            if (result == true) {

                var request = $.ajax({
                    url: CURRENT_URL + '/client/delete_client',
                    type: "POST",
                    data: {client_id: id},
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