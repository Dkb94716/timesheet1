<?php $user_data = $this->session->userdata('logged_in'); ?>
<script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>                    
<script type="text/javascript">
                                 
    $(document).ready(function() {    
        $('#modal-changepassword').on('shown.bs.modal', function() {
        $('#passwordform').bootstrapValidator('resetForm', true);
    });                      
        $('#passwordform').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                oldpassword: {
                    validators: {
                        notEmpty: {
                            message: 'The Old Password is required'
                        }
                    }
                },
                newpassword: {
                    validators: {
                    
                        notEmpty: {
                            message: 'The New Password is required'
                        },
                        stringLength: {
                            min: 6,
                            message: 'Password must be more than 6 characters long'
                        },
                        identical: {
                            field: 'newpassword1',
                            message: ''
                        }
                    }
                },
                newpassword1: {
                    validators: {
                        identical: {
                            field: 'newpassword',
                            message: 'The password and its confirm are not the same'
                        },
                        notEmpty: {
                            message: 'The Confirm New Password is required'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            e.preventDefault();
            var oldpassword = $('#oldpassword').val();
            var newpassword = $('#newpassword').val();
				
            
            $.ajax({
			
                async: true , 
                type: "POST", 
                url: CURRENT_URL +'/login/change_password', 
                dataType: "json" , 
                data: {oldpassword: oldpassword, newpassword: newpassword}, 
                beforeSend: function()
                {
                    $("#addloader1").show();
                },
                success: function(data) {
                    
                    $("#displayPassSmg").show();
                    if(data.status=='SUCCESS'){ 
                        $('#displayPassSmg').html('<div class="alert alert-success" style="width:517px;"><button  class="close" id="CloseButton" data-close="alert"></button><strong>Success! </strong>'+ data.message+'</div>');     
                    }else{
                        $('#displayPassSmg').html('<div class="alert alert-danger" style="width:517px;"><button  class="close" id="CloseButton"  data-close="alert"></button><strong>Error! </strong>'+ data.message+'</div>');   
                    }
                    $('#passwordform').bootstrapValidator('resetForm', true);
                    
                     setTimeout(function() {
                    $('#displayPassSmg').fadeOut('slow');
                }, 3000);

                },
                error: function(xhr,status,error) { 
                    bootbox.alert(status);
                },
                complete:function()
                {
                    $("#addloader1").hide();
                }
            });
        });
    });
    <?php if(!empty($user_data['userUname'])){ ?>
    pending_leave();
pending_time();
overdue_timesheet();
    <?php } ?>
</script>   


<!-- header page-->
<div class="navbar hidden-print main navbar-default" role="navigation">
    <div class="user-action user-action-btn-navbar pull-right">
        <button class="btn btn-sm btn-navbar btn-inverse btn-stroke hidden-lg hidden-md"><i class="fa fa-bars fa-2x"></i></button>
    </div>
   
    <a href="<?php echo base_url(); ?>dashboard/index" class="logo">
        <img src="<?php echo base_url(); ?>assets/img/ANEX-LOGO.png" alt="SMART">
    </a>
   
    <ul class="main pull-right">
        <li class="dropdown username hidden-xs ">
            <a href="" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $user_data['userUname'];   ?> <span class="caret"></span></a>

            <ul class="dropdown-menu pull-right">
                <li><a href="<?php echo base_url(); ?>userdetails/edit_user/<?php echo $user_data['userPrimeryId'];?>?account=1" class="glyphicons user"><i></i> Account</a></li>
                <li><a href="<?php echo base_url(); ?>dashboard/history_list" class="glyphicons calendar"><i></i> History</a></li>
                <li><a href="#modal-changepassword" data-toggle="modal" class="glyphicons keys"><i></i>Change Password</a></li>
                <li><a href="<?php echo base_url(); ?>login/logout" class="glyphicons lock no-ajaxify"><i></i>Logout</a></li>
            </ul>
        </li>
    </ul>
    
     <?php if($user_data['usrRoleld']!=1){ ?>
   <ul class="main pull-right hidden-xs ">
       <li class="notifications">
			<a href="#" id="pending_time_submit_url" title="Overdue Timesheet"><i class="fa fa-exclamation-triangle"></i> <span class="badge badge-warning" id="pending_time_count" style="width:auto;height:auto;"></span></a>
		</li>
		<?php if ($userPrivileges->timesheet->managetimesheet->View == 1) { ?>
                
		<li class="notifications">
			<a href="#" id="pending_time_url" title="Timesheet for Approval"><i class="fa fa-clock-o"></i> <span class="badge badge-warning" id="time_count" style="width:auto;height:auto;"></span></a>
		</li>
                <?php }
                ?>
		<li class="notifications">
                    <a href="" id="pending_leave_url" title="Leave for Approval"><i class="fa fa-calendar-o"></i> <span class="badge badge-info" id="leave_count" style="width:auto;height:auto;"></span></a>
		</li>
               
	</ul>
    <?php } ?>
     
</div>
<!---Header End -->
<!-- Modal Change Password-->
<div class="modal fade"  id="modal-changepassword">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal heading -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Change Password</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body" style="padding:0; padding-top:10px;">
                <div class="innerAll" style="padding:0;">
                    <div class="innerLR" style="padding:0;">
                        <form class="form-horizontal" id="passwordform" role="form" >

                            <div class="form-group" style="padding-left:10px; padding-right:10px; margin-bottom: 25px;">
                                <div class="" id="displayPassSmg" style="width: 515px; margin-left: 48px;"> </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Old Password</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="oldpassword" id="oldpassword" placeholder="Enter Old Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">New Password</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="newpassword" id="newpassword"    minlength="6"  data-bv-stringlength-message="The password must be greater than 6 characters"  class="form-control" placeholder="Enter New Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Re-enter New Password</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="newpassword1" id="newpassword1"     minlength="6" data-bv-stringlength-message="The confirm password must be greater than 6 characters"  class="form-control" placeholder="Re-enter New Password">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer center margin-none">
                                <button class="btn btn-success pull-right" style="margin-right:40px;" type="submit">Submit</button>
                                <a href="#" class="btn btn-default pull-right" data-dismiss="modal" style="margin-right:10px;">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- // Modal body END -->

        </div>
    </div>

</div>
<!-- // Modal Change password END -->