<?php
require_once('status.php');
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

<?php  require_once('header.php'); ?> 
<!-- // END navbar -->
<div class="top-content-menu" style="margin-bottom:50px;">
    <a href="#" class="visible-xs " data-toggle="collapse" data-target="#top-menu">Submenu <i class="fa fa-caret-down pull-right"></i></a>
	<div class="collapse in" id="top-menu">
		<ul class="list-unstyled " >
		<li class="active"><a href="timesheet.php" class="headericonpadding"><span class="headericon"><i class="fa fa-fw " style="float:left;"></i></span>Timesheet</a></li>
                <li class="active"><a href="leavedashboard.php" class="headericonpadding"><span class="headericon"><i class="fa fa-fw " style="float:left;"></i></span>Leave</a></li>
                <?php if( $_SESSION["uaccesslevel"] == 1 ) {?> 
                <li class="active"><a href="clientedit.php?from=dashboard" class="headericonpadding"><span class="headericon"><i class="fa fa-fw " style="float:left;"></i></span>Database</a></li>
                <?php } ?>
                <li class="active"><a href="<?php echo BASE_URL; ?>seeddms/op/op.Login.php?login=<?php echo $emailId;?>&pwd=<?php echo $pwd;?>&lang=English&sesstheme=bootstrap" target="_blank" id="dms_link" class="headericonpadding"><span class="headericon"><i class="fa fa-fw " style="float:left;"></i></span>Document Management System</a></li>
		</ul>		
	 </div>
</div>

<div class=""> 
<div class="col-sm-4" style="margin-left:15px;"><h2><?php 
                            if($_SESSION["uaccesslevel"] ==1){
                                echo 'Set Holiday List';
                            }else{
                                echo 'Holiday List';
                            }
                                ?></h2></div>
    <div>
    
</div>
<?php 
                            if($_SESSION["uaccesslevel"] ==1){
                                ?>
<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right" style="margin-right:15px;">
	<a href="#modal-edit" id = "editClient" data-toggle="modal" class="btn btn-success btn-stroke pull-right" style="margin-left:8px;">Edit</a>
	<a  id = "deleteClient" class="btn btn-danger btn-stroke pull-right" style="margin-left:8px;">Delete</a>
	<a href="#modal-login" data-toggle="modal" class="btn btn-warning pull-right" style="margin-left:8px;">Add Holiday</a>
</div>
<?php 
                            }
?>
</div>
<div class="innerLR" style="margin-top:90px;">
    <!-- Widget -->
	<div class="widget widget-body-white widget-heading-simple">
		<div class="widget-body">
                    
					<div class="year_select">
					<select class="selectpicker col-md-2"  data-style="btn-default" onchange="get_holiday_list_year(this.value)">
                                            
                                            <?php
                                                

                                                $earliest_year = 2014;

                                                foreach (range($earliest_year, date('Y', strtotime('+1 year'))) as $x) 
                                                        {
						 echo '<option value="'.$x.'"'.($x == $year ? ' selected="selected"' : '').'>'.$x.'</option>';
                                                        }

                                                    ?>
					</select>
                                        </div>
				
			<!-- Table -->
<table class="dynamicTable tableTools table table-striped checkboxs">

	<!-- Table heading -->
	<thead>
		<tr style="background-color:#c72a25; color:#FFF;">
                     <?php 
                            if($_SESSION["uaccesslevel"] ==1){
                                ?>
                                         
			<th class="text-center" style="width:2% !important;">
				
	                    <input type="checkbox">
	                
			</th>
                        <?php
                              }
                         ?>
			<!--<th  style="width:15% !important;">Date / Day</th>-->
                        <th style="width:250px !important;">Date / Day</th>
                        <th>Holiday Name</th>
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
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title">New Holiday</h3>
                </div>
                <div class="modal-body">
                    <div class="innerAll">
                        <div class="innerLR">
                            <form class="form-horizontal" id="addForm" role="form">
                                <div class="form-group">
                                    <label class="col-sm-5 control-label l_size_12" style="text-align:left; margin-bottom:10px;">Date</label>
                                    
                                    <div class="input-group date datepicker2 col-sm-6">
                                        <input class="form-control" id="date_field" name="date_field" type="text" value="<?php echo date('d F Y'); ?>" />
                                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-5 control-label l_size_12" style="text-align:left; margin-bottom:10px;">Holiday Name</label>
                                    <div class="col-sm-6" style="padding: 0;">
                                        <input type="text" class="form-control" id="holiday_name" name="holiday_name"  placeholder="Holiday Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10" style="padding-right: 9%;">
                                        <button class="btn btn-success pull-right">Save</button>
                                        <input type="reset" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;" value="Cancel" />
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
				<h3 class="modal-title">Edit Holiday</h3>
			</div>
			<!-- // Modal heading END -->
			
			<!-- Modal body -->
			<div class="modal-body">
				<div class="innerAll">
					<div class="innerLR">
						<form class="form-horizontal" id="editForm" role="form">
                                                    
                                                    <div class="form-group">
                                                        <label class="col-sm-5 control-label" style="text-align:left; margin-bottom:10px;">Date</label>
                                        
                                                        <div class="input-group date datepicker2 col-sm-6">
                                                            <input class="form-control" id="e_date_field" name="e_date_field" type="text" value="" />
                                                            <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                                        </div>
                                                    </div>
                                    
                                                    <div class="form-group">
                                                        <label class="col-sm-5 control-label" style="text-align:left; margin-bottom:10px;">Holiday Name</label>
                                                        <div class="col-sm-6" style="padding: 0;">
                                                            <input type="text" class="form-control" id="e_holiday_name" name="e_holiday_name"  placeholder="Holiday Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10" style="padding-right: 9%;">
                                                            <button class="btn btn-success pull-right">Save</button>
                                                            <input type="reset" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;" value="Cancel" />
                                                            <input id="e_id" type="hidden" value="0" name="e_id" />
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
<!-- // Modal Change password END -->
<div class="modal fade"  id="modal-changepassword">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title">Change Password</h3>
                            </div>
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
                        </div>
                    </div>
                </div>     

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
<script src="assets/plugins/forms_elements_bootstrap-datepicker/js/bootstrap-datepicker.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="assets/components/forms_elements_bootstrap-datepicker/bootstrap-datepicker.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
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

<script src="assets/plugins/forms_elements_bootstrap-select/js/bootstrap-select.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="assets/components/forms_elements_bootstrap-select/bootstrap-select.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>

<!--<script src="assets/js/common.js"></script>-->
<script>
//$(document).ready( function() {
<?php   require('php/notifications.php');   ?> 
    $(document).ready(function() {
    $('#modal-login').on('shown.bs.modal', function() {
		$('#addForm').bootstrapValidator('resetForm', true);
		
	});
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
            beforeSend: function() {
                $("#addloader1").show();
            },
            success: function(data) {
                bootbox.alert(data.message, function() {
                    if(data.status=="SUCCESS"){
                        $('#dms_link').attr('href','<?php echo BASE_URL; ?>seeddms/op/op.Login.php?login=<?php echo $emailId;?>&pwd='+saltPass+'&lang=English&sesstheme=bootstrap');
                        $('#passwordform')[0].reset();
                        $('#modal-changepassword').hide();
                    }                            
                });
            },
            error: function(xhr,status,error) { 
                bootbox.alert(status);
            },
            complete:function(){
                $("#addloader1").hide();
            }
        });
    });	
// Validation code on for add new value         
                $('#addForm').bootstrapValidator({
                        message: 'This value is not valid',
                        feedbackIcons: {
                            valid: 'glyphicon glyphicon-ok',
                            invalid: 'glyphicon glyphicon-remove',
                            validating: 'glyphicon glyphicon-refresh'
                        },
                        fields: {
                            holiday_name: {
                                validators: {
                                    notEmpty: {
                                        message: 'The holiday name is required'
                                    }
                                }
                            }
                        }
                    }).on('success.form.bv', function(e) {
                        e.preventDefault();
                        var date_field = $('#date_field').val();
                        var d = new Date(date_field);
                        var n = d.getFullYear();
                        
                        var holiday_name = $('#holiday_name').val();
                        var comp = new Object();
                        comp.date_field 	= date_field;
                        comp.holiday_name 	= holiday_name;
                        comp.action 	= "addnew";
                        $.ajax({
                            async: true , 
                            type: "POST" , 
                            url: "php/holiday_list_data.php", 
                            dataType: "json" , 
                            data: $.param(comp), 
                            beforeSend: function()
                            {
                                //$("#addloader1").show();
                            },
                            success: function(data) {
                                $('#modal-login').modal("hide");
                                bootbox.alert(data.message, function() {  
                                    if(data.status == "SUCCESS") {
                                         <!--
                        
                                        window.location="<?php echo BASE_URL?>holiday_list.php?y="+n;

                                     //-->
                                    }
                                    else{
                                        $('#modal-login').modal("show");
                                    }
                                });
                            },
                            error: function(xhr,status,error) { 
                                bootbox.alert(status);
                            },
                            complete:function()
                            {
                                $('#modal-login').modal("hide");
                            }
                        });
                    });
                    
                    //******************End code on clcik add new record  *************************// 
                    //***************** On Load data to display listing Record *********************//  
                    function get_holiday_list_year(year)
                    {
                        <!--
                        
                       window.location="<?php echo BASE_URL?>holiday_list.php?y="+year;
                     
                    //-->
                    }
                    function get_holiday_list_year_data(year){
                    var comp = new Object();
                    comp.selection = "admin";
                    comp.action = "loadpage";
                    comp.year = year;
                    $.ajax({
                        async: false , 
                        type: "POST" , 
                        url: "php/holiday_list_data.php" , 
                        dataType: "json" , 
                        data: $.param(comp), 
                       
                        success: function(data) {
					$('#table-bodyy').empty();
						$(function() {
							$.each(data, function(i, item) {

								if(i!=0){
                                                                    <?php 
                            if($_SESSION["uaccesslevel"] ==1){
                                ?>

                                                                                var text = '<tr class="gradeX "><td class="text-center"><div class="checkbox checkbox-single margin-none"><label class="checkbox-custom"><i class="fa fa-fw fa-square-o"></i><input type="checkbox" class="checkboxclick" value="'+item.id+'"></label></div></td><td>'+item.h_day+'</td><td class=" " data-deptid="" data-teamid="">'+item.h_name +'</td></tr>';
										//var text = '<tr class="gradeX"><td class="text-center"><div class="checkbox checkbox-single margin-none"><label class="checkbox-custom"><i class="fa fa-fw fa-square-o"></i><input type="checkbox" value="' + item.empid +'"></label></div></td><td >' + item.empname + '</td><td>' + item.empid + '</td><td data-teamid="' + item.teamid + '">' + item.teamname +'</td><td data-deptid="' + item.deptid + '">' + item.deptname + '</td><td>' + item.emprole  + '</td></tr>';
										
                            <?php }
                            else 
                            { 
                                ?>
                                                         var text = '<tr class="gradeX "><td>'+item.h_day+'</td><td class=" " data-deptid="" data-teamid="">'+item.h_name +'</td></tr>';
                                <?php
                            }
?>
										$('tbody').append(text);
                                                                                
                                                                                
								}
                                                                if(i == data.length-1)
                                                                                {

                                                                                   setTimeout(function() {
                                                                                        initTables();
                                                                                        $('.year_select').show();
                                                                                   }, 1000);
                                                                                }
	
							});
						
							$( "input[type=checkbox]" ).on( "click", countChecked );
						});
				},
                        error: function(xhr,status,error) { 
                            alert(status);
                        }
                    });
                    }
                    get_holiday_list_year_data('<?php echo $year;?>');
                    
                    //*****************End Load data to display listing Record *********************// 
                    $("#deleteClient").on("click",  function(e) {
                        bootbox.confirm("Are you sure you want to remove "+$( "td input:checked" ).length+ " number of holiday(s)?", function(result) {
                            if(result)
                            {
                                deleteHolidayData();
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
                    
                    var countChecked = function() {
                        setTimeout(function(){
                            var n = $( "td input:checked" ).length;
                            if(n==1)
                            {
                                if(($("#deleteClient").hasClass('disabled')))
                                    $("#deleteClient").removeClass('disabled');
                                if(($("#editClient").hasClass('disabled')))
                                    $("#editClient").removeClass('disabled');
                            }
                            else if(n>1)
                            {
                                if(!($("#editClient").hasClass('disabled')))
                                    $("#editClient").addClass('disabled');
                                if(($("#deleteClient").hasClass('disabled')))
                                    $("#deleteClient").removeClass('disabled');
                            }
                            else
                            {
                                if(!($("#editClient").hasClass('disabled')))
                                    $("#editClient").addClass('disabled');
                                if(!($("#deleteClient").hasClass('disabled')))
                                    $("#deleteClient").addClass('disabled');
                            }
                        }, 200);	
                    };
                    
                    countChecked();
                   /* 
                    $('#modal-login').on('shown.bs.modal', function() {
                        $('#addForm').bootstrapValidator('resetForm', true);
                        $('#addTaskName').val("");
                        $('#addTeamName').val("");
                        $('#addActivityName').val("0");
                        $('#addSubActivityName').val("0");
                        $('#addExpense').val("");
                    });*/
                  /*  
                    $('#modal-login').on('shown.bs.modal', function() {
		$('#addForm').bootstrapValidator('resetForm', true);
		
	        });*/
                    
                    $('#modal-edit').on('shown.bs.modal', function() {
                        editData();			
                    });
                    
                    function deleteHolidayData(){ 
                        var mydata="";
                        $("td input:checked").each( function(index) { 
                            //console.log("A checked box found.");
                            mydata += $(this).get(0).value + ",";
                        });
                        var comp = new Object();
                        comp.action 	= "delete";
                        comp.values 	= mydata;
                        $.ajax({
                            async: false , 
                            type: "POST" , 
                            url: "php/holiday_list_data.php", 
                            dataType: "json" , 
                            data: $.param(comp),
                            success: function(data) {
                                // alert(data);
                                if(data.status == "SUCCESS") {
                                    bootbox.alert("Holiday(s) Deleted Successfully", function() {
                                        //if(data.status == "SUCCESS") {
                                        location.reload();
                                        // }
                                    });
                                }
                                else
                                {
                                    bootbox.alert(data.message);
                                }
                            },
                            error: function(xhr,status,error) { 
                                bootbox.alert(status);
                            }
                        });
                    }
                    
                    function editData()
                    {
                        var comp = new Object();
                        $("td input:checked").each( function(index) { 
                            comp.e_id = $(this).get(0).value;
                            comp.e_date_field = $(this).eq(0).parent().parent().parent().next().get(0).innerHTML;
                            comp.e_holiday_name = $(this).eq(0).parent().parent().parent().next().next().get(0).innerHTML;

                        });
                        var splitedDate =  comp.e_date_field.split(",");
                        $('#e_date_field').val(splitedDate[0]);
                        $('#e_holiday_name').val(comp.e_holiday_name);
                        $('#e_id').val(comp.e_id);          
                    }
                    
                    $('#editForm').bootstrapValidator({
                        message: 'This value is not valid',
                        feedbackIcons: {
                            valid: 'glyphicon glyphicon-ok',
                            invalid: 'glyphicon glyphicon-remove',
                            validating: 'glyphicon glyphicon-refresh'
                        },
                        fields: {
                            e_holiday_name: {
                                validators: {
                                    notEmpty: {
                                        message: 'The holiday name is required'
                                    }
                                }
                            }
                        }
                    }).on('success.form.bv', function(e) {
                        e.preventDefault();
                        var comp = new Object();
                        comp.action = 'edit';
                        comp.id = $('#e_id').val();
                        comp.e_date_field = $('#e_date_field').val();
                        comp.e_holiday_name = $('#e_holiday_name').val();
                        $.ajax({
                            async: true , 
                            type: "POST" , 
                            url: "php/holiday_list_data.php" , 
                            dataType: "json" , 
                            data: $.param(comp), 
                            beforeSend: function()
                            {
                                $("#addloader1").show();
                            },
                            success: function(data) {
                                $("#modal-edit").modal("hide");
                                bootbox.alert(data.message, function() {
                                    if(data.status=="SUCCESS")
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
                            error: function(xhr,status,error) { 
                                bootbox.alert(status);
                            },
                            complete:function()
                            {
                                //$("#addloader1").hide();
                            }
                        });
                    });

</script>
</body>
</html>