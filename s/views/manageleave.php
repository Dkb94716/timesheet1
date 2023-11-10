<?php
require_once('status.php');
//print_r($_SESSION);die;
$leave_emp_id = $_GET['id'];
$e_id='';
if(!empty($_GET['e_id']))
{
    $e_id=$_GET['e_id'];
}
$m='';
if(!empty($_GET['m']))
    {
     $m=$_GET['m'];
    }
$profilepic = '';
$src = '';

    $profilepic = $_SESSION['profilepic'];
    if(!empty($profilepic))
    {
      $src = BASE_URL.'uploads/'.$profilepic;  
    }
 else {
  
     $src = BASE_URL.'uploads/default.png';
 }
$year = date('Y');
if(!empty($_GET['y']))
{
   $year = $_GET['y'];
}

$emailId = $_SESSION['emailId']; 
$pwd = $_SESSION['pwd'];
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 paceSimple sidebar sidebar-fusion"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 paceSimple sidebar sidebar-fusion"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 paceSimple sidebar sidebar-fusion"> <![endif]-->
<!--[if gt IE 8]> <html class="ie paceSimple sidebar sidebar-fusion"> <![endif]-->
<!--[if !IE]><!--><html class="paceSimple sidebar sidebar-fusion"><!-- <![endif]-->


<head>
    <title>Welcome to ANEX</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">

    <!--
	**********************************************************
	In development, use the LESS files and the less.js compiler
	instead of the minified CSS loaded by default.
	**********************************************************
	<link rel="stylesheet/less" href="assets/less/admin/module.admin.stylesheet-complete.less" />
	-->

            <!--[if lt IE 9]><link rel="stylesheet" href="assets/components/library/bootstrap/css/bootstrap.min.css" /><![endif]-->

                    <link rel="stylesheet" href="assets/css/admin/module.admin.stylesheet-complete.min.css" />
        	<link rel="stylesheet" href="assets/css/admin/bootstrapValidator.min.css" />
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

<script src="assets/library/jquery/jquery.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="assets/library/jquery/jquery-migrate.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="assets/library/modernizr/modernizr.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="assets/plugins/core_less-js/less.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="assets/plugins/charts_flot/excanvas.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="assets/plugins/core_browser/ie/ie.prototype.polyfill.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="assets/library/jquery-ui/js/jquery-ui.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="assets/plugins/admin_notifications_gritter/js/jquery.gritter.min.js?v=v1.0.0-rc1"></script>
<script src="assets/plugins/core_jquery-ui-touch-punch/jquery.ui.touch-punch.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>    <script>if (/*@cc_on!@*/false && document.documentMode === 10) { document.documentElement.className+=' ie ie10'; }</script>
<script src="assets/plugins/adi/sha512.js"></script>
<script src="assets/plugins/adi/profile_sha.js"></script>
<style>
    #DataTables_Table_0_filter
    {
        display : none;
    }
    .pull-left
    {
        display : block;
    }
    .year_select{
        display:none;
    }
    </style>
</head><body class="">
	
	<!-- Main Container Fluid -->
	<div class="container-fluid menu-hidden">
		
				<!-- Sidebar Menu -->
		
		<!-- // Sidebar Menu END -->
				
		<!-- Content -->
		<div id="content">

<?php  include_once('header.php'); ?>    
<!-- // END navbar -->
<div class="top-content-menu" style="margin-bottom:40px;">
    <a href="#" class="visible-xs " data-toggle="collapse" data-target="#top-menu">Submenu <i class="fa fa-caret-down pull-right"></i></a>
	<div class="collapse in" id="top-menu">
		<ul class="list-unstyled " >
		<li class="active"><a href="timesheet.php" class="headericonpadding"><span class="headericon"><i class="fa fa-fw " style="float:left;"></i></span>Timesheet</a></li>
                <li class="active"><a href="leavedashboard.php" class="headericonpadding"><span class="headericon"><i class="fa fa-fw " style="float:left;"></i></span>Leave</a></li>
                <?php if( $_SESSION["uaccesslevel"] == 1 ) {?> 
                <li class="active"><a href="clientedit.php?from=dashboard" class="headericonpadding"><span class="headericon"><i class="fa fa-fw " style="float:left;"></i></span>Database</a></li>
                <?php } ?>
                <li class="active"><a href="<?php echo DMS_BASE_URL; ?>op/op.Login.php?login=<?php echo $emailId;?>&pwd=<?php echo $pwd;?>&lang=English&sesstheme=bootstrap" target="_blank" id="dms_link" class="headericonpadding"><span class="headericon"><i class="fa fa-fw " style="float:left;"></i></span>Document Management System</a></li>
		</ul>		
	 </div>
</div>

<!--<div class=""> -->

<div class="col-sm-4" style="margin-left:15px;"><h2>
      <?php  if(!empty($m))
        {
        echo 'Manage Employee Leave';
    }
 else {
        echo 'My Leave'; 
 }?></h2></div>
  <?php  if(empty($m))
        {
      ?>
  
<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right" style="margin-right:15px;">
            <a href="employee_leaves.php" class="btn btn-warning pull-right" style="margin-left:8px;">Apply Leave</a>
        </div>
  <?php
        }
  ?>
<div>
  
</div>
<!--</div>-->
<div class="innerLR" style="margin-top:90px;">

	<!-- Widget -->
	<div class="widget widget-body-white widget-heading-simple">
		<div class="widget-body">
                    <div>
					
					<select class="selectpicker col-md-2" data-style="btn-default" onchange="get_leave_year(this.value)">
                                            
                                            <?php
                                               

                                                $earliest_year = 2014;

                                                foreach (range($earliest_year, date('Y', strtotime('+1 year'))) as $x) 
                                                        {
						 echo '<option value="'.$x.'"'.($x == $year ? ' selected="selected"' : '').'>'.$x.'</option>';
                                                        }

                                                    ?>
					</select>
				</div>
                    
                    <div class="widget-head tdtopbg">
                        <div class=" col-md-4 media" style="padding:0px;">
                            
                            <img src="<?php echo $src;?>" class="pull-left thumbnail" alt="Profile" height="40px;" id="profilepic" style="margin-bottom:0px;">
                            <div class="media-body innerAll half" style="padding:0px !important;">
                                <h5 style="margin-top: 5px; color:#2d91cf;" id="emp_name">
                                    Shiju Jacob
                                </h5>
                                <h6 style="margin-top: 5px; color:#9da1a5;" id="designation">
                                    Project Manager | Software Development
                                </h6>
                            </div>
                        </div>
                        <div class=" col-md-8 pull-right media" style="padding:0px;">
                            <div class="pull-right" id="balance_leave">
                            <b>Balance:</b> Annual Leave <div class="badge badge-success"></div>
                            | Sick Leave <div class="badge badge-success"></div>
                                
                            </div>
                           
                        </div>
                    </div>
                    
			<!-- Table -->
<table class="dynamicTable tableTools table table-striped checkboxs">

	<!-- Table heading -->
	<thead>
		<tr style="background-color:#c72a25; color:#FFF;">
			<th data-class="expand">Leave Type</th>
                        <th class="center" data-hide="phone,tablet">Status</th>
                        <th class="center" data-hide="phone,tablet">From Date</th>
                        <th class="center" data-hide="phone,tablet">From Session</th>
                        <th class="center" data-hide="phone">To Date</th>
                        <th class="center" data-hide="phone">To Session</th>
                        <th class="center">No. of days</th>
                        <?php 
                        //if(!empty($m))
                        //{
                        ?>
                        <th class="center">Actions</th>
                        <?php
                        //}
                        ?>
		</tr>
	</thead>
	<!-- // Table heading END -->
	
	<!-- Table body -->
	<tbody id="table-bodyy">
	
		
	</tbody>
	<!-- // Table body END -->
	
</table>
<!-- // Table END -->
		</div>
		
	</div>
	<!-- // Widget END -->


</div>


<div class="modal fade"  id="modal-login">
	
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal heading -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Reason for Rejection</h3>
			</div>
			<!-- // Modal heading END -->
			
			<!-- Modal body -->
			<div class="modal-body">
				<div class="innerAll">
					<div class="innerLR">
                                           
						<form id="addForm" class="form-horizontal" role="form">
							<div class="form-group">
                                    <label class="col-sm-5 control-label" style="text-align:left; margin-bottom:10px;">Reason</label>
                                    <div class="col-sm-6" style="padding: 0;">
                                        <textarea style="resize: vertical;" rows="5" class="form-control" placeholder="Reason..." type="text" id="manageComment" name="manageComment"></textarea>
                                        <input type="hidden" id="leave_id">
                                        <input type="hidden" id="leave_status">
                                        <input type="hidden" id="managerId">
                                        <input type="hidden" id="emailId">
                                        <input type="hidden" id="emp_leave_type_id">
                                        <input type="hidden" id="numberOfDates">
                                        <input type="hidden" id="leave_year">
                                    </div>
                                </div>
                                
                                
								<div class="form-group">
							<div class="col-sm-5"></div>
								<div class="col-sm-2">
								<img id="addloader" src="assets/images/ajax-loader.gif" style="display:none;"/>
								</div>
								<div class="col-sm-5"></div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
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
							<form class="form-horizontal" id="passwordform" role="form">
		
								<div class="form-group" style="padding-left:10px; padding-right:10px; margin-bottom: 25px;">
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
									<button class="btn btn-success pull-right" style="margin-right:40px;
" type="submit">Submit</button>
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

<!-- // END MODAL -->

		
		</div>
		<!-- // Content END -->
		
		<div class="clearfix"></div>
		<!-- // Sidebar menu & content wrapper END -->
		
		
		
		<!-- // Footer END -->
		
	</div>
	<!-- // Main Container Fluid END -->
	

    <!-- Global -->
    <script data-id="App.Config">
        var App = {};        var basePath = '',
            commonPath = 'assets/',
            rootPath = '../',
            DEV = false,
            componentsPath = 'assets/components/';

        var primaryColor = '#c72a25',
            dangerColor = '#b55151',
            successColor = '#609450',
            infoColor = '#4a8bc2',
            warningColor = '#ab7a4b',
            inverseColor = '#45484d';

        var themerPrimaryColor = primaryColor;

            </script>

<script src="assets/library/bootstrap/js/bootstrap.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="assets/plugins/core_nicescroll/jquery.nicescroll.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>

<script src="assets/plugins/core_preload/pace.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="assets/components/core_preload/preload.pace.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="assets/plugins/tables_datatables/js/jquery.dataTables.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>


<script src="assets/components/tables_datatables/js/DT_bootstrap.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="assets/components/tables_datatables/js/datatables.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="assets/components/forms_elements_fuelux-checkbox/fuelux-checkbox.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>




<script src="assets/components/tables/tables-classic.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>

<script src="assets/components/core/core.init.js?v=v1.0.0-rc1"></script>
<script src="assets/js/bootstrapValidator.min.js"></script>
<script src="assets/js/bootbox.min.js"></script>
<script src="assets/components/forms_elements_button-states/button-loading.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="assets/plugins/forms_elements_bootstrap-select/js/bootstrap-select.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="assets/components/forms_elements_bootstrap-select/bootstrap-select.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="assets/plugins/forms_elements_select2/js/select2.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="assets/components/forms_elements_select2/select2.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="assets/plugins/forms_elements_multiselect/js/jquery.multi-select.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="assets/components/forms_elements_multiselect/multiselect.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="assets/plugins/forms_elements_inputmask/jquery.inputmask.bundle.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="assets/components/forms_elements_inputmask/inputmask.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="assets/js/common_lib.js"></script>
<script src="assets/js/common.js"></script>
<script>
//$(document).ready( function() {
	<?php   require('php/notifications.php');   ?> 

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
	
		e.preventDefault();
	
		var saltPass = submitLoginSha($('#newpassword').val(),'yVqQd56m');
		var saltPassOld = submitLoginSha($('#oldpassword').val(),'yVqQd56m');
				
				var comp = new Object();
				comp.oldpassword 	= saltPassOld;
				comp.newpassword 	= saltPass;
		
			$.ajax({
			
				async: true , 
				type: "POST" , 
				
				url: "php/changePassword.php" , 
				dataType: "json" , 
				data: $.param(comp), 
				beforeSend: function()
				{
					$("#addloader1").show();
				},
				success: function(data) {
						bootbox.alert(data.message, function() {
						if(data.status=="SUCCESS")
						{
                                                  $('#dms_link').attr('href','<?php echo DMS_BASE_URL; ?>op/op.Login.php?login=<?php echo $emailId;?>&pwd='+saltPass+'&lang=English&sesstheme=bootstrap');  
						  $('#passwordform')[0].reset();
							//location.reload();
							//close modal
							  $('#modal-changepassword').hide();
						}
						
						});
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
	
         $('#modal-changepassword').on('shown.bs.modal', function() {
       $('#passwordform').bootstrapValidator('resetForm', true);
});
 
	$("#logoutbutton").on("click",  function(e) {
	
				$.ajax({
							
                                async: false , 
                                type: "POST" , 

                                url: "php/logout.php" , 


                                beforeSend: function()
                                {
                                        //$("#addloader1").show();
                                },
                                success: function(data) {
                                        //location.reload();
                                         document.location.href="login.php";    
                                },
                                error: function(xhr,status,error) { 
                                        //alert(status);
                                },
                                complete:function()
                                {
                                        //$("#addloader1").hide();
                                }
                        });
						
						});


         
		
   function withdraw_leave(id,emp_leave_type_id,numberOfDates)
   {
           bootbox.confirm("Are you sure you want to withdraw this leave?", function(result) {
                                    if(result)
                                    {
					 deleteData(id,emp_leave_type_id,numberOfDates);
                                     }

	}); 
    }



	
function deleteData(mydata,emp_leave_type_id,numberOfDates){ 
	
	$.ajax({
				
				async: false , 
				type: "POST" , 
				
				url: "php/deleteData.php" , 
				dataType: "json" , 
				data: "selection=leave&values="+mydata, 
				success: function(data) {
					if(data.status == "SUCCESS") {
						bootbox.alert("Leave Withdraw Successfully ", function() {
                                                        
							window.location.replace("manageleave.php?id=<?php echo $leave_emp_id;?>");
						
						});
					}
					else
					{
						bootbox.alert(data.message, function() {
                                                        
							window.location.replace("manageleave.php?id=<?php echo $leave_emp_id;?>");
						
						});
					}
				},
				error: function(xhr,status,error) { 
					alert(status);
				}
		});
	
	
	}
        /*
        function update_balance_leave(emp_leave_type_id,numberOfDates)
        {
           
		var comp = new Object();
		       comp.action = "update_balance_leave";
                       
                       comp.empId = '<?php echo $leave_emp_id?>';
                       comp.leave_type = emp_leave_type_id;
                       comp.numberOfDates = numberOfDates;
                       
			
			
			$.ajax({
				
				async: true , 
				type: "POST" , 
				
				url: "php/employee_leave_data.php" , 
				dataType: "json" , 
				data: $.param(comp), 
				beforeSend: function()
				{
					$("#addloader").show();
				},
				success: function(data) {
				
					if(data.status == "SUCCESS") {
						bootbox.alert("Leave withdraw Successfully ", function() {
                                                        
							window.location.replace("manageleave.php?id=<?php echo $leave_emp_id;?>");
						
						});
					}
					else
					{
						bootbox.alert(data.message);
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
*/

	$('#modal-login').on('shown.bs.modal', function() {
		$('#addForm').bootstrapValidator('resetForm', true);
		
	});

	
function get_leave_year(year)
{
    <!--
    <?php if(!empty($m))
    {
        ?>
     window.location="<?php echo BASE_URL?>manageleave.php?id=<?php echo $leave_emp_id;?>&m=<?php echo $m;?>&y="+year;
    <?php
    }
 else {
 
    ?>
   window.location="<?php echo BASE_URL?>manageleave.php?id=<?php echo $leave_emp_id;?>&y="+year;
 <?php } ?>
//-->
}
function get_leave_year_data(year,e_id)
{
		var comp = new Object();
			comp.selection="manageleave";
                        comp.leave_emp_id = '<?php echo $leave_emp_id; ?>';
                        comp.year = year;
                        comp.e_id = e_id;
			//alert("Start Executing AJAX REquest.");
			
			$.ajax({
				
				async: false , 
				type: "POST" , 
				
				url: "php/retrieveData.php" , 
				dataType: "json" , 
				data: $.param(comp), 
				success: function(data) {
				$('#table-bodyy').empty();
		$(function() {
                    j=1;
                   
                    if(data.length>1)
                    {
                    $('#emp_name').text(data[1].empName);
                    $('#designation').text(data[1].designation);
                    if(data[1].profilepic != '')
                    {
                    $('#profilepic').attr("src",'<?php echo BASE_URL;?>'+data[1].profilepic);
                    }
                    else
                    {
                    $('#profilepic').attr("src",'<?php echo BASE_URL;?>assets/images/people/80/22.png');    
                    }
                    }
                    
                    $.each(data, function(i, item) {

                                if((i!=0)&& (item.leaveType !='')){
                                    var action_button ='';
                                    <?php 
                                    if(!empty($m))
                                    {
                                    ?>
                                    if(item.status=='Pending')
                                    {
                                     var action_button =   '<td class="center"><button id="'+item.employee_leaves_id+'_approved" class="btn btn-success" onclick="change_status_approved('+item.employee_leaves_id+',\'approved\',\''+item.managerId+'\',\''+item.emailId+'\','+item.emp_leave_type_id+','+item.numberOfDates+','+item.leave_year+')" style="margin-right: 10px;">Approve</button><button id="'+item.employee_leaves_id+'_rejected" href="#modal-login" data-toggle="modal" class="btn btn-danger" onclick="change_status('+item.employee_leaves_id+',\'rejected\',\''+item.managerId+'\',\''+item.emailId+'\','+item.emp_leave_type_id+','+item.numberOfDates+','+item.leave_year+')">Reject</button></td>';
                                    }
                                    else if(item.status=='Approved')
                                    {
                                     var action_button =   '<td class="center"><button id="'+item.employee_leaves_id+'_approved" class="btn btn-success" disabled>Approved</button></td>';   
                                    }
                                    else
                                    {
                                     var action_button =   '<td class="center"><button id="'+item.employee_leaves_id+'_rejected" href="#modal-login" data-toggle="modal" class="btn btn-danger" disabled>Rejected</button></td>' 
                                    }
                                    <?php
                                    }else{
                                    ?>
                                     if(item.status=='Pending')
                                    {                           
                                                            
                                    var action_button =   '<td class="center"><button class="btn btn-success" onclick="withdraw_leave('+item.employee_leaves_id+','+item.emp_leave_type_id+','+item.numberOfDates+')">Withdraw</button></td>';
                                    }
                                    else{
                                    var action_button =   '<td class="center"></td>';  
                                    }
                                    <?php
                                    }
                                    ?>
                                    if(item.fromSession == 1)
                                        item.fromSession = "First Half";
                                    if(item.fromSession == 2)
                                        item.fromSession = "Second Half";
                                    if(item.toSession == 1)
                                        item.toSession = "First Half";
                                    if(item.toSession == 2)
                                        item.toSession = "Second Half";
                                    
                                var text = '<tr class="'+ ((j%2==0) ? "gradeC" : "gradeX")+'"><td>'+item.leaveType+'</td><td class="center" id="status_text_'+item.employee_leaves_id+'">'+item.status+'</td><td class="center">'+item.fromDate+'</td><td class="center">'+item.fromSession+'</td><td class="center">'+item.toDate+'</td><td class="center">'+item.toSession+'</td><td class="center">'+item.numberOfDates+'</td>'+action_button+'</td></tr>';
                                $('#table-bodyy').append(text);
                                j++;
                                }
                                    if(i == data.length-1)
                                        {

                                           setTimeout(function() {
                                                initTables();
                                                $('.col-md-12').hide();
                                                $('.col-md-5').hide();
                                                $('.tdtopbg').css('margin-bottom','0px');
                                                $('.year_select').show();
                                                
                                                calBalanceLeave('<?php echo $leave_emp_id?>',year);
                                           }, 1000);
                                        }

                    });
	
});
				},
				error: function(xhr,status,error) { 
					alert(status);
				}
			});
                        
		
                }
                get_leave_year_data('<?php echo $year;?>','<?php echo $e_id;?>');
                //calBalanceLeave('<?php echo $leave_emp_id?>','<?php echo $year;?>');
	function change_status(id,status,managerId,emailId,emp_leave_type_id,numberOfDates,year)
        {
            $("#modal-login").modal("show");
            $('#leave_id').val(id);
            $('#leave_status').val(status);
            $('#managerId').val(managerId);
            $('#emailId').val(emailId);
            $('#emp_leave_type_id').val(emp_leave_type_id);
            $('#numberOfDates').val(numberOfDates);
            $('#leave_year').val(year);
            
        }
        
        function change_status_approved(id,status,managerId,emailId,emp_leave_type_id,numberOfDates,year)
        {
            bootbox.confirm("Are you sure you want to approve this Leave?", function(result) {
               if(result == true)
                {
                  var comp = new Object();
                
			comp.action="updatestatus";
                        comp.id= id;
                        comp.status= status;
                        comp.managerId = managerId;
                        comp.emailId = emailId;
                        comp.empId = '<?php echo $leave_emp_id?>';
                        comp.leave_type = emp_leave_type_id;
                        comp.numberOfDates = numberOfDates;
                        comp.year = year;
			
			
			$.ajax({
				
				async: true , 
				type: "POST" , 
				
				url: "php/employee_leave_data.php" , 
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
                                            if(status=='approved')
                                            {
                                              $('#'+id+'_'+status).text('Approved');
                                              $('#'+id+'_'+status).prop('disabled', true);
                                              $('#'+id+'_rejected').remove();
                                              
                                            }   
                                            else
                                            {
                                              $('#'+id+'_'+status).text('Rejected'); 
                                              $('#'+id+'_'+status).prop('disabled', true);
                                              $('#'+id+'_approved').remove();
                                              
                                            }
                                            //$('#status_text').text($.ucfirst(status));
                                            var update_status = $.ucfirst(status); 
                                            $('#status_text_'+id).text(update_status);
                                            calBalanceLeave('<?php echo $leave_emp_id?>',year);
							
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
        
        
       $('#addForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           
        }
    })
	.on('success.form.bv', function(e) {
		e.preventDefault();
	
		var comp = new Object();
                var id=$('#leave_id').val();
                var status=$('#leave_status').val();
                var managerId = $('#managerId').val();
                var emailId = $('#emailId').val();
                var emp_leave_type_id = $('#emp_leave_type_id').val();
                var numberOfDates = $('#numberOfDates').val();
                var year = $('#leave_year').val();
			comp.action="updatestatus";
                        comp.id= id;
                        comp.status= status;
                        comp.manageComment= $('#manageComment').val();
                        comp.managerId= managerId;
                        comp.emailId= emailId;
                        comp.empId = '<?php echo $leave_emp_id?>';
                       comp.leave_type = emp_leave_type_id;
                       comp.numberOfDates = numberOfDates;
                       comp.year = year;
			
			
			$.ajax({
				
				async: true , 
				type: "POST" , 
				
				url: "php/employee_leave_data.php" , 
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
                                            if(status=='approved')
                                            {
                                              $('#'+id+'_'+status).text('Approved');
                                              $('#'+id+'_'+status).prop('disabled', true);
                                              $('#'+id+'_rejected').remove();
                                              
                                            }   
                                            else
                                            {
                                              $('#'+id+'_'+status).text('Rejected'); 
                                              $('#'+id+'_'+status).prop('disabled', true);
                                              $('#'+id+'_approved').remove();
                                              
                                            }
                                            //$('#status_text').text($.ucfirst(status));
                                            var update_status = $.ucfirst(status); 
                                            $('#status_text_'+id).text(update_status);
                                            calBalanceLeave('<?php echo $leave_emp_id?>',year);
							
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
	});
  
                        
                        
                        
                        
       
</script>


</body>
</html>