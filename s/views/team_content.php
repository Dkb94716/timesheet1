
<div class="col-lg-12" style="margin-top:20px;">
  <div class="col-sm-4">
    <h4></h4>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right">
      <?php if ($userPrivileges->administration_control->team->Add == 1) { ?>
      <a href="#modal-add" data-toggle="modal" class="btn-sm btn-warning pull-right" style="margin-left:8px;">Add Team</a> </div>
      <?php } ?>
</div>
<div class="innerLR" style="margin-top:60px;">
  <div class="widget widget-body-white widget-heading-simple">
    <div class="widget-body overflow-x" style="padding:10px;">
      <table class="dynamicTable tableTools table table-striped overflow-x">
        <thead>
          <tr style="background-color:#c72a25; color:#FFF;">
            <th width="44" class="thead-th-padg">Team Name</th>
            <th width="55" class="thead-th-padg">Team Leader</th>
            <th width="55" class="thead-th-padg">Show All Clients</th>
            
            <th width="148" align="right" class="thead-th-padg" style="padding-right: 50px !important;text-align: right;">
                <?php if (($userPrivileges->administration_control->team->Edit == 1) || ($userPrivileges->administration_control->team->Delete == 1)) { ?>
                Actions
                <?php } ?>
            </th>
          
          </tr>
        </thead>
        <tbody>
          <?php
                    if (!empty($team_detail)) {
                        foreach ($team_detail as $team) {
							
                            ?>
          <tr class="gradeX">
            <td><span><?php echo $team->team_name; ?> </span></td>
            <td><?php echo $team->empName;  ?></td>
            <td><?php echo ($team->show_client==1) ? 'Yes' : 'No';  ?></td>
            <td align="right" >
                <?php if ($userPrivileges->administration_control->team->Edit == 1) { ?>
                <a href="#modal-edit" onclick="edit_team('<?php echo $team->team_id; ?>')" data-toggle="modal" class="btn-xs btn-success td-btn-marg-right">Edit</a> 
                <?php } 
                  if ($userPrivileges->administration_control->team->Delete == 1) { ?>
                <a href="#nogo" class="btn-xs btn-danger td-btn-marg-right" onclick="delete_team('<?php echo $team->team_id; ?>')">Delete</a></td>
                <?php } ?>
          </tr>
          <?php }  }  ?>
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
        <h3 class="modal-title">Add Team</h3>
      </div>
      <!-- // Modal heading END --> 
      
      <!-- Modal body -->
      <div class="modal-body">
        <div class="innerAll">
          <div class="innerLR">
            <form class="form-horizontal" role="form" id="addForm" method="post" enctype="multipart/form-data" action="" >
              <div class="form-group">
                <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Team Name</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="team_name" id="team_name" maxlength="200"  placeholder="Team Name">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label"style="text-align: left;">Team Leader</label>
                <div class="col-sm-7"> 
                  <select  class="form-control" name="employee_id" id="employee_id">
                    <option value="">Select</option>
                   <?php foreach($user_details as $user){ ?>
                    <option value="<?php echo $user->id; ?>"><?php echo $user->empName; ?></option>
                   <?php } ?>
                  </select>
                </div>
              </div>
                 <div class="form-group">
                <label class="col-sm-4 control-label"style="text-align: left;">Show All Clients</label>
                <div class="col-sm-7"> 
                    <input type="checkbox" name="check" id="check" value="0" onclick="$(this).val(this.checked ? 1 : 0)"/>
                </div>
              </div>
              
              <img id="addloader" src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" style="display:none;margin-left: 200px;"/>
              <div class="form-group">
                <div class="col-sm-offset-1 col-sm-10"> 
                  <!--<button class="btn btn-success pull-right">Save</button>--> 
                  <?php echo "<input type='submit' name='submit' value='Save' class='btn btn-success pull-right'/> "; ?> <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a> </div>
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
        <h3 class="modal-title">Edit Team</h3>
      </div>
      <!-- // Modal heading END --> 
      
      <!-- Modal body -->
      <div class="modal-body">
        <div class="innerAll">
          <div class="innerLR">
            <form class="form-horizontal" role="form" id="editForm">
              <div class="form-group">
                <label class="col-sm-4 control-label" style="text-align:left;margin-bottom:10px">Team Name</label>
                <div class="col-sm-7">
                  <input type="text" name="edit_team_name" id="edit_team_name" maxlength="200" class="form-control">
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-4 control-label" style="text-align:left;margin-bottom:10px">Team Leader</label>
                <div class="col-sm-7">
                  <select  class="form-control" name="edit_employee_id" id="edit_employee_id">
                    <option value="">Select</option>
                    <?php foreach($user_details as $user1){ ?>
                    <option value="<?php echo $user1->id; ?>"><?php echo $user1->empName; ?></option>
                   <?php } ?>
                  </select>
                </div>
                
              </div>
             <div class="form-group">
                <label class="col-sm-4 control-label"style="text-align: left;">Show All Clients</label>
                <div class="col-sm-7"> 
                    <input type="checkbox" name="edit_check" id="edit_check" value="0" onclick="$(this).val(this.checked ? 1 : 0)"/>
                </div>
              </div>
              <input type="hidden" id="edit_team_id" value="">
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
        });
        
         var sel = $('input[type=checkbox]').map(function(_, el) {
                    return $(el).val();
                }).get();
        
        $('#addForm').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                team_name: {
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
                    var team_name = $('#team_name').val();
		    var employee_id = $('#employee_id').val();
                     var check =    $('#check').val();
		     $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/team/add_team',
                        dataType: "json",
                        data: {team_name: team_name,employee_id:employee_id, show_client:check},
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
                edit_team_name: {
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
                  var team_id = $('#edit_team_id').val();
                  var team_name = $('#edit_team_name').val();
		  var  employee_id = $('#edit_employee_id').val();
		  var check =    $('#edit_check').val();			

                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/team/submit_edit_team',
                        dataType: "json",
                        data: {team_id: team_id, team_name: team_name,employee_id: employee_id,show_client:check},
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

    function edit_team(id) {
         $('#modal-edit').on('shown.bs.modal', function () {
            $('#editForm').bootstrapValidator('resetForm', true);
            $('.btn-success').removeAttr("disabled");
            var request = $.ajax({
            url: CURRENT_URL + '/team/edit_team',
            type: "POST",
            data: {team_id: id},
            dataType: "json"
        });
        request.done(function (msg) {
            $.each(msg, function (i, item) {		
		$('#edit_employee_id').val(item.employee_id);
                $('#edit_team_name').val(item.team_name);
                $('#edit_team_id').val(item.team_id);
                $('#edit_check').val(item.show_client);
                if(item.show_client==1){
                $('input[name=edit_check][value=1]').prop('checked',true);
                }
            });
        });
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
        });
        
    }

    function delete_team(id) {
        bootbox.confirm("Are you sure you want to delete team?", function (result) {

            if (result == true) {

                var request = $.ajax({
                    url: CURRENT_URL + '/team/delete_team',
                    type: "POST",
                    data: {team_id: id},
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