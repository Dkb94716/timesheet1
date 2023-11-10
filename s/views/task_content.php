

<div class="col-lg-12" style="margin-top:20px;">
  <div class="col-sm-4">
    <h4></h4>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right">
       <?php if($userPrivileges->administration_control->task->Add == 1) { ?>
      <a href="#modal-add" data-toggle="modal" class="btn-sm btn-warning pull-right" style="margin-left:8px;">Add Task</a> </div>
      <?php } ?>
</div>
<div class="innerLR" style="margin-top:60px;">
  <div class="widget widget-body-white widget-heading-simple">
    <div class="widget-body overflow-x" style="padding:10px;">
      <table class="dynamicTable tableTools table table-striped overflow-x">
        <thead>
          <tr style="background-color:#c72a25; color:#FFF;">
            <th width="44" class="thead-th-padg">Task Name</th>
            <th width="55" class="thead-th-padg">Team</th>
             <th width="55" class="thead-th-padg">Expenses</th>
             <th width="55" class="thead-th-padg">Activity</th>
            <th width="55" class="thead-th-padg">Sub-Activity</th>
            <th width="148" class="thead-th-padg" align="right" style="padding-right: 50px !important;text-align: right;">
                <?php if (($userPrivileges->administration_control->task->Edit == 1) || ($userPrivileges->administration_control->task->Delete == 1)) { ?>
                            Actions
                         <?php } ?>
                
            </th>
          </tr>
        </thead>
        <tbody>
          <?php
            if (!empty($task_detail)) {
             foreach ($task_detail as $task)
                 { ?>
          <tr class="gradeX">
            <td><span><?php echo $task->task_name; ?> </span></td>
             <td><span><?php echo $task->team_name; ?> </span></td>
              <td><span><?php echo $task->expense; ?> </span></td>
               <td><span><?php echo $task->activity_name; ?> </span></td>
               <td><span><?php echo $task->subactivity_name;  ?></span></td>
            <td align="right">
                <?php if ($userPrivileges->administration_control->task->Edit == 1) { ?>
                <a href="#modal-edit" onclick="edit_task('<?php echo $task->task_id; ?>')" data-toggle="modal" class="btn-xs btn-success td-btn-marg-right">Edit</a> 
                <?php } 
                  if ($userPrivileges->administration_control->task->Delete == 1) { ?>
                <a href="#nogo" class="btn-xs btn-danger td-btn-marg-right" onclick="delete_task('<?php echo $task->task_id; ?>')">Delete</a></td>
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
        <h3 class="modal-title">Add Task</h3>
      </div>
      <!-- // Modal heading END --> 
      
      <!-- Modal body -->
      <div class="modal-body">
        <div class="innerAll">
          <div class="innerLR">
            <form class="form-horizontal" role="form" id="addForm" method="post" enctype="multipart/form-data" action="" >
              <div class="form-group">
                <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Task Name</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="task_name" id="task_name" maxlength="200"  placeholder="Task Name">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label"style="text-align: left;">Team</label>
                <div class="col-sm-7"> 
                  <select  class="form-control" name="team_name" id="team_name">
                    <option value="">Select</option>
                   <?php foreach($team_detail as $team){ ?>
                    <option value="<?php echo $team->team_name; ?>"><?php echo $team->team_name; ?></option>
                   <?php } ?>
                  </select>
                </div>
              </div>
                  <div class="form-group">
                <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Expense</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="expense" id="expense" maxlength="200"  placeholder="Expense">
                </div>
              </div>
                
              <div class="form-group">
                <label class="col-sm-4 control-label"style="text-align: left;">Activity</label>
                <div class="col-sm-7"> 
                  <select  class="form-control" name="activity_name" id="activity_name" onchange="get_subactivity(this.value,'subactivity_name')"  >
                    <option value="">Select</option>
                   <?php foreach($activity_detail as $activity_data){ ?>
                    <option value="<?php echo $activity_data->activity_name; ?>" ><?php echo $activity_data->activity_name; ?></option>
                   <?php } ?>
                  </select>
                </div>
              </div>
               
                 <div class="form-group">
                <label class="col-sm-4 control-label"style="text-align: left;">Sub Activity</label>
                <div class="col-sm-7" id="subactivity_1"> 
                  <select  class="form-control" name="subactivity_name" id="subactivity_name">
                    <option value="">Select</option>
                 
                  </select>
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
        <h3 class="modal-title">Edit Task</h3>
      </div>
      <!-- // Modal heading END --> 
      
      <!-- Modal body -->
      <div class="modal-body">
        <div class="innerAll">
          <div class="innerLR">
            <form class="form-horizontal" role="form" id="editForm">
              <div class="form-group">
                <label class="col-sm-4 control-label" style="text-align:left;margin-bottom:10px">Task Name</label>
                <div class="col-sm-7">
                   <input type="text" class="form-control" name="edit_task_name" id="edit_task_name" maxlength="200"  placeholder="Task Name">
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-4 control-label"style="text-align: left;">Team</label>
                <div class="col-sm-7"> 
                  <select  class="form-control" name="edit_team_name" id="edit_team_name">
                    <option value="">Team</option>
                   <?php foreach($team_detail as $team){ ?>
                    <option value="<?php echo $team->team_name; ?>"><?php echo $team->team_name; ?></option>
                   <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label" style="text-align:left;margin-bottom:10px">Expense</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="edit_expense" id="edit_expense" maxlength="200"  placeholder="Expense"> 
                </div>
              </div>
                  <div class="form-group">
                <label class="col-sm-4 control-label"style="text-align: left;">Activity</label>
                <div class="col-sm-7"> 
                   <select  class="form-control" name="edit_activity_name" id="edit_activity_name" onchange="get_subactivity(this.value,'edit_subactivity_name')"  >
                    <option value="">Select</option>
                   <?php foreach($activity_detail as $activity_data){ ?>
                    <option value="<?php echo $activity_data->activity_name; ?>" ><?php echo $activity_data->activity_name; ?></option>
                   <?php } ?>
                  </select>
                </div>
              </div>
                <div class="form-group">
                <label class="col-sm-4 control-label"style="text-align: left;">Sub Activity</label>
                <div class="col-sm-7"> 
                  <select  class="form-control" name="edit_subactivity_name" id="edit_subactivity_name">
                    <option value="">Select </option>
                 
                  </select>
                </div>
              </div>
                
                
                
              <input type="hidden" id="edit_task_id" value="">
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
            $('#team_name').prop('selectedIndex',0);
            $('#activity_name').prop('selectedIndex',0);
             $('#subactivity_name').html('<option value="">Select</option>');
        });
        $('#addForm').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                
                task_name: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required.'
                        }
                    }
                },
                expense: {
                    validators: {
                        integer: {
                        message: 'The value is not an integer'
                    }
                    }
                },
                activity_name: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required.'
                        }
                    }
                },
                subactivity_name: {
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
                    var task_name = $('#task_name').val();
	            var team_name =    $('#team_name').val();
		    var expense = $('#expense').val();
                    var activity_name = $('#activity_name').val();
                    var subactivity_name = $('#subactivity_name').val();


                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/task/add_task',
                        dataType: "json",
                        data: {task_name: task_name,team_name:team_name,expense:expense,activity_name:activity_name,
                                subactivity_name:subactivity_name },
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
                edit_task_name: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required.'
                        }
                    }
                },
                edit_expense: {
                    validators: {
                        integer: {
                        message: 'The value is not an integer'
                    }
                    }
                },
                edit_activity_name: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required.'
                        }
                    }
                },
                edit_subactivity_name: {
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
                    var task_id = $('#edit_task_id').val();
                    var task_name = $('#edit_task_name').val();
	            var team_name =    $('#edit_team_name').val();
		    var expense = $('#edit_expense').val();
                    var activity_name = $('#edit_activity_name').val();
                    var subactivity_name = $('#edit_subactivity_name').val();

                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/task/submit_edit_task',
                        dataType: "json",
                       data: {task_id: task_id, task_name: task_name,team_name:team_name,expense:expense,activity_name:activity_name,
                                subactivity_name:subactivity_name },
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
                                   // $("#modal-edit").modal("show");
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

    function edit_task(id) {
        $('#modal-edit').on('shown.bs.modal', function () {
            $('#editForm').bootstrapValidator('resetForm', true);
            $('.btn-success').removeAttr("disabled");
        var request = $.ajax({
            url: CURRENT_URL + '/task/edit_task',
            type: "POST",
            data: {task_id: id},
            dataType: "json"
        });
        request.done(function (msg) {
            $.each(msg, function (i, item) {
                $('#edit_task_id').val(item.task_id);
                $('#edit_task_name').val(item.task_name);
                $('#edit_team_name').val(item.team_name);
                $('#edit_expense').val(item.expense);
                $('#edit_activity_name').val(item.activity_name);
                get_subactivity(item.activity_name,'edit_subactivity_name');
                setTimeout(function() {
                        $('#edit_subactivity_name').val(item.subactivity_name);
                  }, 500);
                
            });
        });
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
         });
    }


     


     function get_subactivity(activity_name,id) {
          
        var request = $.ajax({
            url: CURRENT_URL + '/subactivity/get_subactivity',
            type: "POST",
            data: {activity_name: activity_name},
        });
        request.done(function (msg) {
            $('#'+id).html(msg);
        });
        
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
     }
      
    
    
    function delete_task(id) {
        bootbox.confirm("Are you sure you want to delete task?", function (result) {

            if (result == true) {

                var request = $.ajax({
                    url: CURRENT_URL + '/task/delete_task',
                    type: "POST",
                    data: {task_id: id},
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