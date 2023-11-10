 <?php
$this->load->library('session');
$session_val = $this->session->all_userdata();
$success_msg     = @$this->session->userdata('success_user');
?>        

<div class="col-lg-12" style="margin-top:20px;"> 
    <div class="col-sm-4"><h4></h4></div>
   <?php if($userPrivileges->administration_control->user->Add==1){  ?>
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right">
        <a href="add_user"  class="btn-sm btn-warning pull-right" style="margin-left:8px;">Add User</a>
    </div>
   <?php } ?>
</div>
 
<div class="innerLR" style="margin-top:60px;">
    <?php
 
 if(!empty($success_msg)){
 ?>
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>Success!</strong> <?php echo $success_msg;?>
</div>
              
                <?php 
                $user_message1 = array(
                'success_user' => ''
            );

            $this->session->set_userdata($user_message1); 
               // $this->session->unset_userdata($success_msg);
                ?> 
            <?php } ?>
    <div class="widget widget-body-white widget-heading-simple">
        <div class="widget-body overflow-x" style="padding:10px;">
            <table class="dynamicTable tableTools table table-striped overflow-x">
                <thead>
                    <tr style="background-color:#c72a25; color:#FFF;">
                        <th class="thead-th-padg">Full Name</th>
                         <th class="thead-th-padg">Employee ID</th>
                          <th class="thead-th-padg">Team</th>
                           <th class="thead-th-padg">Department</th>
                            <th class="thead-th-padg">Role</th>
                           
                            <th class="thead-th-padg" style="padding-right: 120px !important;text-align: right;">
                                <?php if (($userPrivileges->administration_control->user->Edit == 1) || ($userPrivileges->administration_control->user->Delete == 1 ||($userPrivileges->administration_control->user->user_pdf==1))) { ?>
                            Actions
                         <?php } ?>
                            </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($userdetails_detail)) {
                        foreach ($userdetails_detail as $user) {
                           
                            
                            ?>
                            <tr class="gradeX">
                                <td><span><?php echo $user->empName; ?> </span></td>
                                        <td><span><?php echo $user->empId; ?> </span></td>
                                        <td><span><?php echo $user->team_name; ?> </span></td>
                                        <td><span><?php echo $user->department_name; ?> </span></td>
                                        <td><span><?php echo $user->role_name; ?> </span></td>
   
                                <td align="right">                           
                                    <?php if($userPrivileges->administration_control->user->Edit==1){  ?>
                                    <a  href="edit_user/<?php echo $user->id; ?>" data-toggle="modal" class="btn-xs btn-success td-btn-marg-right">Edit</a>
                                     <?php  } ?>
                                      <?php if($userPrivileges->administration_control->user->Delete==1){  ?>
                                    <a href="#nogo" class="btn-xs btn-danger td-btn-marg-right" onclick="delete_user('<?php echo $user->id; ?>','<?php echo (!empty($user->profilepic) ? $user->profilepic : '' ); ?>')">Delete</a>
                                 <?php } ?>
                                    <?php if($userPrivileges->administration_control->user->user_pdf==1){  ?>
                                    <a href="<?php echo base_url();?>userdetails/download_pdf/<?php echo  $user->id; ?>" class="btn-xs btn-info td-btn-marg-right" >Download</a>
                               <?php  }?>
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


        </div>
    </div>
</div>





<script>
    $(document).ready(function () {
        $('.alert').fadeOut(5000);
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
                user_name: {
                    validators: {
                        notEmpty: {
                            message: 'The Department Name is required'
                        }
                    }
                },
                
                
            }
        })
                .on('success.form.bv', function (e) {
                    e.preventDefault();
                    var user_name = $('#user_name').val();


                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/userdetails/add_user',
                        dataType: "json",
                        data: {user_name: user_name},
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
                edit_user_name: {
                    validators: {
                        notEmpty: {
                            message: 'The Department Name is required'
                        }
                    }
                },
            }
        })
                .on('success.form.bv', function (e) {
                    e.preventDefault();

                    var user_id = $('#edit_user_id').val();
                    var user_name = $('#edit_user_name').val();

                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/userdetails/submit_edit_user',
                        dataType: "json",
                        data: {user_id: user_id, user_name: user_name},
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
        initTables();
    });

    

    function delete_user(id,profilepic) {
        bootbox.confirm("Are you sure you want to delete user?", function (result) {

            if (result == true) {

                var request = $.ajax({
                    url: CURRENT_URL + '/userdetails/delete_userdetails',
                    type: "POST",
                    data: {empId: id,profilepic:profilepic},
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