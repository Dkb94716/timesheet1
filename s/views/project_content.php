
<div class="col-lg-12" style="margin-top:20px;">
  <div class="col-sm-4">
    <h4></h4>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right">
      <?php if ($userPrivileges->administration_control->projects->Add == 1) { ?>
      <a href="#modal-add" data-toggle="modal" class="btn-sm btn-warning pull-right" style="margin-left:8px;">Add Project</a> </div>
       <?php } ?>
</div>
<div class="innerLR" style="margin-top:60px;">
  <div class="widget widget-body-white widget-heading-simple">
    <div class="widget-body overflow-x" style="padding:10px;">
      <table class="dynamicTable tableTools table table-striped overflow-x">
        <thead>
          <tr style="background-color:#c72a25; color:#FFF;">
            <th width="44" class="thead-th-padg">Project Name</th>
            <th width="55" class="thead-th-padg">Client Name</th>
            <th width="148" class="thead-th-padg" align="right" style="padding-right: 50px !important;text-align: right;">
                <?php if (($userPrivileges->administration_control->projects->Edit == 1) || ($userPrivileges->administration_control->projects->Delete == 1)) { ?>
                            Actions
                         <?php } ?>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php
                    if (!empty($project_detail)) {
                     foreach ($project_detail as $project)
                         {
		
                            ?>
          <tr class="gradeX">
            <td><span><?php echo $project->project_name; ?> </span></td>
            <td><?php echo $project->client_name;  ?></td>
            <td align="right"><?php if ($userPrivileges->administration_control->projects->Edit == 1) { ?>
                <a href="#modal-edit" onclick="edit_project('<?php echo $project->project_id; ?>')" data-toggle="modal" class="btn-xs btn-success td-btn-marg-right">Edit</a> 
                <?php } 
                  if ($userPrivileges->administration_control->projects->Delete == 1) { ?>
                <a href="#nogo" class="btn-xs btn-danger td-btn-marg-right" onclick="delete_project('<?php echo $project->project_id; ?>')">Delete</a></td>
                <?php } ?>
          </tr>
          <?php  } } ?>
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
        <h3 class="modal-title">Add Project</h3>
      </div>
      <!-- // Modal heading END --> 
      
      <!-- Modal body -->
      <div class="modal-body">
        <div class="innerAll">
          <div class="innerLR">
            <form class="form-horizontal" role="form" id="addForm">
              <div class="form-group">
                <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Project Name</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="project_name" id="project_name" maxlength="200"  placeholder="Project Name">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label"style="text-align: left;">Client Assigned</label>
                <div class="col-sm-7"> 
                  <select  class="form-control" name="client_name" id="client_name">
                    <option value="">Select</option>
                   <?php foreach($clent_details as $client){
                       
                       ?>
                    
                    
                    <option value="<?php echo $client->client_name; ?>"><?php echo $client->client_name; ?></option>
                   <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label"style="text-align: left;">Currency </label>
                <div class="col-sm-7"> 
                  <!--  <input type="file" class="form-control" name="project_logo" style="height:24px; padding-bottom:30px; border-radius: 0;"/> -->
                  <select  class="form-control" name="currency_code" id="currency_code" >
                    <option value="">Select</option>
                   <?php foreach($currency as $currency11){ ?>
                    <option value="<?php echo $currency11->currency_code; ?>"><?php echo $currency11->currency_code; ?></option>
                   <?php } ?>
                  </select>
                </div>
              </div>
              <img id="addloader" src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" style="display:none;margin-left: 200px;"/>
              <div class="form-group">
                <div class="col-sm-offset-1 col-sm-10"> 
                  <button class="btn btn-success pull-right">Save</button>
                   <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a> </div>
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
        <h3 class="modal-title">Edit Project</h3>
      </div>
      <!-- // Modal heading END --> 
      
      <!-- Modal body -->
      <div class="modal-body">
        <div class="innerAll">
          <div class="innerLR">
            <form class="form-horizontal" role="form" id="editForm">
              <div class="form-group">
                <label class="col-sm-4 control-label" style="text-align:left;margin-bottom:10px">Project Name</label>
                <div class="col-sm-7">
                  <input type="text" name="edit_project_name" id="edit_project_name" maxlength="200" class="form-control">
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-4 control-label" style="text-align:left;margin-bottom:10px">Client Assigned</label>
                <div class="col-sm-7">
                  <select  class="form-control" name="edit_client_name" id="edit_client_name">
                   <option value="">Select</option>
                   <?php foreach($clent_details as $client){ ?>
                    <option value="<?php echo $client->client_name; ?>"><?php echo $client->client_name; ?></option>
                   <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label" style="text-align:left;margin-bottom:10px">Currency</label>
                <div class="col-sm-7">
                   <select  class="form-control" name="edit_currency_code" id="edit_currency_code" >
                    <option value="">Select</option>
                    <?php foreach($currency as $currency1){ ?>
                    <option value="<?php echo $currency1->currency_code;  ?>"><?php echo $currency1->currency_code;  ?></option>
                   <?php } ?>
                   </select>
                </div>
              </div>
              <input type="hidden" id="edit_project_id" value="">
              <img id="editloader" src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" style="display:none;margin-left: 200px;"/>
              <div class="form-group">
                <div class="col-sm-offset-1 col-sm-10">
                  <button class="btn btn-success pull-right">Save</button>
                  <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a> </div>
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
            $('#client_id').prop('selectedIndex',0);
            $('#currency_id').prop('selectedIndex',0);
        });
        $('#addForm').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                project_name: {
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
                    var project_name = $('#project_name').val();
                    var client_name =    $('#client_name').val();
                    var currency_code = $('#currency_code').val();


                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/project/add_project',
                        dataType: "json",
                        data: {project_name: project_name,client_name:client_name,currency_code:currency_code},
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
                edit_project_name: {
                    validators: {
                        notEmpty: {
                            message: 'The Company Name is required'
                        }
                    }
                }
            }
        })
                .on('success.form.bv', function (e) {
                    e.preventDefault();
                     $('.btn-success').attr("disabled", "disabled");
                    var project_id = $('#edit_project_id').val();
                    var project_name = $('#edit_project_name').val();
                    var client_name =    $('#edit_client_name').val();
                    var currency_code = $('#edit_currency_code').val();

                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/project/submit_edit_project',
                        dataType: "json",
                        data: {project_id: project_id, project_name: project_name,client_name: client_name, currency_code: currency_code},
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

    function edit_project(id) {
         $('#modal-edit').on('shown.bs.modal', function () {
            $('#editForm').bootstrapValidator('resetForm', true);
            $('.btn-success').removeAttr("disabled");
            $('#edit_client_id').prop('selectedIndex',0);
            $('#edit_currency_id').prop('selectedIndex',0);
        var request = $.ajax({
            url: CURRENT_URL + '/project/edit_project',
            type: "POST",
            data: {project_id: id},
            dataType: "json"
        });
        request.done(function (msg) {
            $.each(msg, function (i, item) {
               $('#edit_currency_code').val(item.currency_code);
               $('#edit_client_name').val(item.client_name);
               $('#edit_project_name').val(item.project_name);
                $('#edit_project_id').val(item.project_id);
                $('.btn-success').removeAttr("disabled");
            });
        });
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
        });
    }

    function delete_project(id) {
        bootbox.confirm("Are you sure you want to delete project?", function (result) {

            if (result == true) {

                var request = $.ajax({
                    url: CURRENT_URL + '/project/delete_project',
                    type: "POST",
                    data: {project_id: id},
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