<div class="col-lg-12" style="margin-top:20px;"> 

    
</div>
<div class="innerLR" style="margin-top:60px;">
       <?php
    if ($this->session->userdata('success_msg')) {
        ?>
    <div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>Success!</strong> <?php echo $this->session->userdata('success_msg');?>
</div>
        
        <?php
        $this->session->unset_userdata('success_msg');
    } 
        ?>
    <div class="widget widget-body-white widget-heading-simple">
        <div class="widget-body overflow-x" style="padding:10px;">
            <div class="year_select">
                <select class="selectpicker col-md-2"  data-style="btn-default" onchange="get_employee_leave_year(this.value)">

                    <?php
                    foreach (range(EARLIEST_YEAR, date('Y', strtotime('+1 year'))) as $x) {
                        echo '<option value="' . $x . '"' . ($x == $year ? ' selected="selected"' : '') . '>' . $x . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="widget-head tdtopbg" style="margin-bottom: 0px;">
                        <div class=" col-md-4 media" style="padding:0px;">
                            <?php if(!empty($user_detail[0]->profilepic)){
                                
                            if(file_exists(realpath("uploads/user").'/'.$user_detail[0]->profilepic)){ ?>
                            <img src="<?php echo base_url();?>uploads/user/<?php echo $user_detail[0]->profilepic;?>" class="pull-left thumbnail" alt="Profile" height="40px;" style="margin-bottom:0px;">
                            <?php } 
                            else{ ?>
                            <img src="<?php echo base_url();?>assets/images/people/80/22.png" class="pull-left thumbnail" alt="Profile" height="40px;" style="margin-bottom:0px;">
                            <?php } 
                            }
                            else{ ?>
                            <img src="<?php echo base_url();?>assets/images/people/80/22.png" class="pull-left thumbnail" alt="Profile" height="40px;" style="margin-bottom:0px;">
                            <?php } ?>
                            <div class="media-body innerAll half" style="padding:0px !important;">
                                <h5 style="margin-top: 5px; color:#2d91cf;" id="emp_name"><?php echo $user_detail[0]->empName; ?></h5>
                                <h6 style="margin-top: 5px; color:#9da1a5;" id="designation"></h6>
                            </div>
                        </div>
                        <div class=" col-md-8 pull-right media" style="padding:0px; margin-top:5px;">
                            <div class="col-md-12 pull-right" id="balance_leave" style="text-align:end;">
                                <?php if(!empty($balance_leave_detail)){
                                    $i=0;
                                    $separator = '|';
                                    
                                foreach($balance_leave_detail as $balance_leave){
                                    $i++;
                                    if(count($balance_leave_detail)==$i){ 
                                    
                                        $separator='';
                                    }
                                    
?>
                                <?php echo $balance_leave->leave_type;?> <div class="badge badge-success"><?php echo $balance_leave->balance_leave;?></div><?php echo $separator;?>
                                <?php 
                                }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
            <table class="dynamicTable tableTools table table-striped overflow-x">
                <thead>
                    <tr style="background-color:#c72a25; color:#FFF;">
                        <th width="130px" class="thead-th-padg">Applied Date</th>
                        <th class="thead-th-padg">Leave Type</th>
                         <th class="thead-th-padg">Status</th>
                         <th class="thead-th-padg">From Date</th>
                         <th class="thead-th-padg">From Session</th>
                         <th class="thead-th-padg">To Date</th>
                         <th class="thead-th-padg">To Session</th>
                         <th class="thead-th-padg" align="right" style="text-align: right;">No. of days</th>
                         <th class="thead-th-padg" align="right" style="padding-left:40px !important">Action Date</th>
                        <th width="50px" class="thead-th-padg" align="right" style="text-align: center;">Actions</th>
                    </tr>
                </thead>
                <tbody>
<?php
if (!empty($employee_leave_detail)) {
    foreach ($employee_leave_detail as $employee_leave) {
        
        ?>
                            <tr class="gradeX">
                                <td><span><?php echo '<span style="display:none">'.date("Ymd", strtotime($employee_leave->created)).'</span>'.date('d F Y',  strtotime($employee_leave->created)); ?> </span></td>
                                <td><span><?php echo $employee_leave->leave_type; ?> </span></td>
                                <td><span><?php echo $employee_leave->status; ?> </span></td>
                                <td><span><?php echo '<span style="display:none">'.date("Ymd", strtotime($employee_leave->from_date)).'</span>'.date('d F Y',  strtotime($employee_leave->from_date)); ?> </span></td>
                                <td><span> <?php echo ($employee_leave->from_session==1)?'First Half':'Second Half'; ?></span></td>
                                <td><span><?php echo '<span style="display:none">'.date("Ymd", strtotime($employee_leave->to_date)).'</span>'.date('d F Y',  strtotime($employee_leave->to_date)); ?> </span></td>
                                <td><span><?php echo ($employee_leave->to_session==1)?'First Half':'Second Half'; ?></span></td>
                                <td align="right"><span><?php echo $employee_leave->number_of_days; ?> </span></td>
                                <td><span><?php 
                                
                                if($employee_leave->updated){echo date('d F Y',  strtotime($employee_leave->updated));} 
                                
                                ?> </span></td>
                                <td align="right" id="action_btn_<?php echo $employee_leave->employee_leave_id; ?>">                           
                            <?php 
                                if($employee_leave->status=='Pending'){
                                    if(empty($m)){ 
                                       
                                            ?>
                                    <a href="#nogo"   class="btn-xs btn-success td-btn-marg-right" onclick="change_leave_status(<?php echo $employee_leave->employee_leave_id; ?>,'Approved',<?php echo $employee_leave->leave_id; ?>,<?php echo $employee_leave->number_of_days; ?>,'<?php echo $employee_leave->emailId; ?>','<?php echo $employee_leave->empName; ?>','<?php echo $employee_leave->empId; ?>','<?php echo $employee_leave->leave_type; ?>','<?php echo date('d F Y',  strtotime($employee_leave->from_date)); ?>','<?php echo date('d F Y',  strtotime($employee_leave->to_date)); ?>','<?php echo $employee_leave->id; ?>','<?php echo $employee_leave->leave_type_id; ?>')">Approve</a>
                                    <a href="#modal-add"   onclick="reject_leave(<?php echo $employee_leave->employee_leave_id; ?>,'<?php echo $employee_leave->emailId; ?>','<?php echo $employee_leave->empName; ?>','<?php echo $employee_leave->empId; ?>','<?php echo $employee_leave->leave_type; ?>','<?php echo date('d F Y',  strtotime($employee_leave->from_date)); ?>','<?php echo date('d F Y',  strtotime($employee_leave->to_date)); ?>',<?php echo $employee_leave->number_of_days; ?>)"  data-toggle="modal" class="btn-xs btn-danger td-btn-marg-right">Reject</a>
                                    <a href="<?php echo base_url();?>employee_leave/edit_apply_leave/<?php echo $employee_leave->employee_leave_id; ?>?v=1" class="btn-xs btn-inverse td-btn-marg-right" >View</a>
                                
                                    <?php 
                                        
                                    }
                                     else{
                                         //if ($userPrivileges->leave_management->applyleave->View == 1) { 
                                   ?>
                                    
                                    <a href="#nogo"  class="btn-xs btn-success td-btn-marg-right" onclick="withdraw_leave(<?php echo $employee_leave->employee_leave_id; ?>)">Withdraw</a>
                                   <a href="<?php echo base_url();?>employee_leave/edit_apply_leave/<?php echo $employee_leave->employee_leave_id; ?>" class="btn-xs btn-warning td-btn-marg-right">Edit</a>
                                    <?php
                                    // }
                                     }
                                    }
                                    else{
       
          if ($manager == 'Manager') {
                ?>
                                            <a href="<?php echo base_url(); ?>employee_leave/edit_apply_leave/<?php echo $employee_leave->employee_leave_id; ?>" class="btn-xs btn-warning td-btn-marg-right">Edit</a>
                                        <?php } ?>
                                    <a href="<?php echo base_url();?>employee_leave/edit_apply_leave/<?php echo $employee_leave->employee_leave_id; ?>?v=1" class="btn-xs btn-inverse td-btn-marg-right">View</a>
                                </td>
                            </tr>    
                                    <?php
                                    }
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
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title">Reason for Rejection (Optional)</h3>
                </div>
                <div class="modal-body">
                    <div class="innerAll" style="padding: 0px;">
                        <form class="form-horizontal" role="form" id="addForm">      
                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading">Reason</label>
                                <textarea rows="5" class="form-control plahole_font" name="reason" id="reason" placeholder="Reason..." style="resize: vertical;"></textarea>
                            </div>
                            <input type="hidden" name="employee_leave_id" id="employee_leave_id">
                            <input type="hidden" name="status" id="status" value="Rejected">
                            <input type="hidden" name="emailId" id="emailId" value="">
                            <input type="hidden" name="empName" id="empName" value="">
                            <input type="hidden" name="empId" id="empId" value="">
                            <input type="hidden" name="leave_type" id="leave_type" value="">
                            <input type="hidden" name="from_date" id="from_date" value="">
                            <input type="hidden" name="to_date" id="to_date" value="">
                            <input type="hidden" name="number_of_days" id="number_of_days" value="">
                            <div class="form-group td-area-form-marg" style="padding-bottom: 15px;float: inherit; margin-top:30px;">
                                <button class="btn btn-success pull-right savebtn">Save</button>
                                <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:10px;">Cancel</a>
                            </div>
                        </form>
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
            $('.savebtn').removeAttr("disabled");
        });
        $('#addForm').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                 reason: {
                    validators: {
                       stringLength: {
                        max: 255,
                        message: 'The reason must be less than 255 characters.'
                    }
                    }
                }
            }
        })
                .on('success.form.bv', function (e) {
                    e.preventDefault();
                    $('.savebtn').attr("disabled", "disabled");
                    var data = $("#addForm").serialize();


                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/employee_leave/change_employee_leave_status',
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


       
        initTablesLeave();
        $('.dataTables_filter').hide();
    });

   

    function withdraw_leave(id) {
        bootbox.confirm("Are you sure you want to withdraw this leave?", function (result) {

            if (result == true) {

                var request = $.ajax({
                    url: CURRENT_URL + '/employee_leave/delete_employee_leave',
                    type: "POST",
                    data: {employee_leave_id: id},
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
    function change_leave_status(employee_leave_id,status,leave_id,number_of_days,emailId,empName,empId,leave_type,from_date,to_date,emp_id,leave_type_id)
        {
            bootbox.confirm("Are you sure you want to approve this Leave?", function(result) {
               if(result == true)
                {
                  var comp = new Object();
                
                        comp.employee_leave_id= employee_leave_id;
                        comp.status= status;
                        comp.leave_id= leave_id;
                        comp.number_of_days= number_of_days;
                        comp.emailId= emailId;
                        comp.empName= empName;
                        comp.empId= empId;
			comp.leave_type= leave_type;
                        comp.from_date= from_date;
			comp.to_date= to_date;
                        comp.emp_id= emp_id;
                        comp.leave_type_id= leave_type_id;
                        
			
			$.ajax({
				
				async: true , 
				type: "POST" , 
				
				url: CURRENT_URL + '/employee_leave/change_employee_leave_status' , 
				dataType: "json" , 
				data: $.param(comp), 
				beforeSend: function()
				{
					$("#addloader").show();
				},
				success: function(data) {
				
				    $('#modal-login').modal("hide");
                                    
				    if(data.status == "SUCCESS") {
					bootbox.alert(data.message, function() {
                                            //$('#action_btn_'+employee_leave_id).html('');
                                            //calBalanceLeave('',year);
                                            location.reload();
							
					});
					}
					else
					{
						bootbox.alert(data.message, function() {
                                                    location.reload();
                                                });
					}
					
					
				},
				error: function(xhr,status,error) { 
					bootbox.alert(status);
				},
				complete:function()
				{
					$("#addloader").hide();
				}
			});
      
                }
            }); 
        
            
        }
        function reject_leave(employee_leave_id,emailId,empName,empId,leave_type,from_date,to_date,number_of_days)
        {
            
            $('#employee_leave_id').val(employee_leave_id);
            $('#emailId').val(emailId);
            $('#empName').val(empName);
            $('#empId').val(empId);
            $('#leave_type').val(leave_type);
            $('#from_date').val(from_date);
            $('#to_date').val(to_date);
            $('#number_of_days').val(number_of_days);
            
            
        }
    function get_employee_leave_year(year)
                    {
                        <!--
                        
                       window.location=CURRENT_URL + '/employee_leave/manage_employee_leave/<?php echo $emp_id;?>/'+year+'?m=<?php echo $m;?>';
                     
                    //-->
                    }
</script>