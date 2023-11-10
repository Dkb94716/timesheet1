<?php
session_start();
require_once('status.php');
$todayDate = date("Y-m-d");
$previousSunday = date('j M Y', strtotime('last Sunday', strtotime($todayDate)));
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
        <script src="assets/plugins/core_jquery-ui-touch-punch/jquery.ui.touch-punch.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>    
        <script src="assets/plugins/admin_notifications_gritter/js/jquery.gritter.min.js?v=v1.0.0-rc1"></script>

        <script src="assets/plugins/admin_notifications_gritter/js/jquery.gritter.min.js?v=v1.0.0-rc1"></script>
        <script src="assets/plugins/adi/sha512.js"></script>
        <script src="assets/plugins/adi/profile_sha.js"></script>
        <script>if (/*@cc_on!@*/false && document.documentMode === 10) { document.documentElement.className+=' ie ie10'; }</script>

        <script type="text/javascript">
	
            $(document).ready(function() {
                var previousSunday = '<?php echo $previousSunday; ?>';

<?php require('php/notifications.php'); ?> 

<?php echo "var acl=" . $_SESSION["uaccesslevel"] . ";"; ?>
                    
<?php //echo "var status=".$_GET["status"].";"; ?>
                             var status='<?php echo $_GET["status"]; ?>';   
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
                             //	$('.approvebutton').click( function() {	
                             //FILL THE COMBO BOXES FOR MODAL_LOGIN.
                             $.ajax({
				
                                 async: false , 
                                 type: "POST" , 
				
                                 url: "php/retrieveEmployeeDataForTimesheet.php" , 
                                 dataType: "json" , 
				 
                                 beforeSend: function()
                                 {
                                     $("#addloader1").show();
                                 },
                                 success: function(data1) {
					
                                     $.each(data1, function(i, item) {

                                         if(i!=0){
                                             var text = '<option value="' + item.id  +  '" data-teamid="'  +  item.teamId  + '" data-deptid="' + item.deptId + '">' + item.name + '</option>';
                                             //console.log("Text is:" + text);
                                             $('#addempname').append(text);
                                             //$('#editempname').append(text);
									
                                         }
                                     });
				
			
                                 },
                                 error: function(xhr,status,error) { },
                                 complete:function()
                                 {
                                     $("#addloader1").hide();
                                 }
                             });
		
                             $.ajax({
				
                                 async: false , 
                                 type: "POST" , 
				
                                 url: "php/retrieveData.php" , 
                                 dataType: "json" , 
                                 data: "selection=teamname", 
                                 beforeSend: function()
                                 {
                                     $("#addloader1").show();
                                 },
                                 success: function(data) {
					
                                     $.each(data, function(i, item) {

                                         if(i!=0){
                                             var text = '<option value="' + item.id  +  '">' + item.name + '</option>';
                                             $('#addteam').append(text);						
                                             //$('#editteam').append(text);
                                         }
                                     });
				
				
                                 },
                                 error: function(xhr,status,error) { },
                                 complete:function()
                                 {
                                     $("#addloader1").hide();
                                 }
                             });
		
                             $.ajax({
				
                                 async: true , 
                                 type: "POST" , 
				
                                 url: "php/retrieveData.php" , 
                                 dataType: "json" , 
                                 data: "selection=department", 
                                 beforeSend: function()
                                 {
                                     $("#addloader1").show();
                                 },
                                 success: function(data) {
					
                                     $.each(data, function(i, item) {

                                         if(i!=0){
                                             if(item.name == '<?php echo $_SESSION["department_name"]; ?>'){
                                                                                    var text = '<option value="' + item.id  +  '" selected="selected">' + item.name + '</option>';
                                                                                } else {
                                                                                    var text = '<option value="' + item.id  +  '">' + item.name + '</option>';
                                                                                }
                                             //var text = '<option value="' + item.id  +  '">' + item.name + '</option>';
                                             $('#adddept').append(text);
                                             //$('#editdept').append(text);
                                         }
                                     });
				
                                 },
                                 error: function(xhr,status,error) { },
                                 complete:function()
                                 {
                                     $("#addloader1").hide();
                                 }
                             });
	
                             $.ajax({
				
                                 async: true , 
                                 type: "POST" , 
				
                                 url: "php/retrieveData.php" , 
                                 dataType: "json" , 
                                 data: "selection=activity", 
                                 beforeSend: function()
                                 {
                                     $("#addloader1").show();
                                 },
                                 success: function(data) {
						
                                     $.each(data, function(i, item) {

                                         if(i!=0){
                                             var text = '<option value="' + item.id  +  '">' + item.name + '</option>';
                                             $('#addactivity').append(text);
                                             //$('#editactivity').append(text);
                                         }
                                     });
				
					
                                 },
                                 error: function(xhr,status,error) { },
                                 complete:function()
                                 {
                                     $("#addloader1").hide();
                                 }
                             });
	
                             $.ajax({
				
                                 async: true , 
                                 type: "POST" , 
				
                                 url: "php/retrieveData.php" , 
                                 dataType: "json" , 
                                 data: "selection=subactivity", 
                                 beforeSend: function()
                                 {
                                     $("#addloader1").show();
                                 },
                                 success: function(data) {
						
                                     $.each(data, function(i, item) {

                                         if(i!=0){
                                             var text = '<option value="' + item.id  +  '">' + item.name + '</option>';
                                             $('#addsubactivity').append(text);
                                             //$('#editsubactivity').append(text);
                                         }
                                     });
				
					
                                 },
                                 error: function(xhr,status,error) { },
                                 complete:function()
                                 {
                                     $("#addloader1").hide();
                                 }
                             });
		
                             $.ajax({
                                 async: false , 
                                 type: "POST" , 
				
                                 url: "php/getTimesheetData.php?status="+status, 
                                 dataType: "json" , 
                                 success: function(data) {
                                     var  count = 0 ;
                                     //console.log(data);
                                     $('#table-body').empty();
					
					
                                     $.each(data, function(i, item) {
						    	
                                         if(i==0)
                                         {
                                             if(item.status == "FAILED")
                                             {	
                                                 //bootbox.alert("Failed to load data.");
                                                 return;
                                             }
                                         }		
						
                                         if(i != 0)
                                         {
                                             // previousSunday
                                             if(item.approvalStatus =='PENDING'){
                                                 var splitedDate =  item.week.split("-");
                                                          
                                                 var myDate=splitedDate[1];//"26-02-2012";
                                                 myDate=myDate.split(" ");
                                                 if(myDate[0] == 'Jan')
                                                     myDate[0] = '01';
                                                 if(myDate[0] == 'Feb')
                                                     myDate[0] = '02';
                                                 if(myDate[0] == 'Mar')
                                                     myDate[0] = '03';
                                                 if(myDate[0] == 'Apr')
                                                     myDate[0] = '04';
                                                 if(myDate[0] == 'May')
                                                     myDate[0] = '05';
                                                 if(myDate[0] == 'Jun')
                                                     myDate[0] = '06';
                                                 if(myDate[0] == 'Jul')
                                                     myDate[0] = '07';
                                                 if(myDate[0] == 'Aug')
                                                     myDate[0] = '08';
                                                 if(myDate[0] == 'Sep')
                                                     myDate[0] = '09';
                                                 if(myDate[0] == 'Oct')
                                                     myDate[0] = '10';
                                                 if(myDate[0] == 'Nov')
                                                     myDate[0] = '11';
                                                 if(myDate[0] == 'Dec')
                                                     myDate[0] = '12';
                                                 var newDate=myDate[1]+","+myDate[0]+","+myDate[2];
                                                 var newDateA1 = new Date(newDate).getTime();
                                                            
                                                 var myDate1=previousSunday;//"26-02-2012";
                                                 myDate1=myDate1.split(" ");
                                                 if(myDate1[0] == 'Jan')
                                                     myDate1[0] = '01';
                                                 if(myDate1[0] == 'Feb')
                                                     myDate1[0] = '02';
                                                 if(myDate1[0] == 'Mar')
                                                     myDate1[0] = '03';
                                                 if(myDate1[0] == 'Apr')
                                                     myDate1[0] = '04';
                                                 if(myDate1[0] == 'May')
                                                     myDate1[0] = '05';
                                                 if(myDate1[0] == 'Jun')
                                                     myDate1[0] = '06';
                                                 if(myDate1[0] == 'Jul')
                                                     myDate1[0] = '07';
                                                 if(myDate1[0] == 'Aug')
                                                     myDate1[0] = '08';
                                                 if(myDate1[0] == 'Sep')
                                                     myDate1[0] = '09';
                                                 if(myDate1[0] == 'Oct')
                                                     myDate1[0] = '10';
                                                 if(myDate1[0] == 'Nov')
                                                     myDate1[0] = '11';
                                                 if(myDate1[0] == 'Dec')
                                                     myDate1[0] = '12';
                                                 var newDate1=myDate1[1]+","+myDate1[0]+","+myDate1[2];
                                                 var newDateB1 = new Date(newDate1).getTime();

                                                 // alert(newDateA1+' '+newDateB1);
                                                                                                                    
                                                          
                                                 if(newDateA1 <= newDateB1)
                                                     count++;   
                                             }
                                             //alert(item.approvalStatus)
                                             var text1 = "";
                                             <?php if($_SESSION["uaccesslevel"] != 3){ ?>   
                                                         if(acl!=3 && item.approvalStatus=="SUBMITTED"){       
                                                         if(item.empid != '<?php echo $_SESSION["uid"]; ?>'){
                                             text1 = '<td style="width:30px !important;"><input type="checkbox" name="multi-approved" class="multi-approved" value="'+item.empid+'#####'+item.week+'"></td>';          
                                             }else { 
                                                 text1 = '<td style="width:30px !important;"></td>'; 
                                                 }
                                              }else { 
                                                 text1 = '<td style="width:30px !important;"></td>'; 
                                                 }
                                            <?php  }?>
                                             var text = '<tr class="gradeX">'+text1+'<td style="width:170px !important;">' + item.week + '</td><td style="width:170px !important;">' + item.empname + '</td><td>' + item.billable + '</td><td>' + item.unbillable + '</td><td>' + item.approvalStatus + '</td><td class="right" style="width:250px !important;">';
								
								
								
                                             //	'<button data-empid="' + item.empid + '" data-week="' + item.week + '" data-status="' + item.approvalStatus + '"  class="btn btn-danger btn-stroke viewbutton">View</button>';
								
                                             if(acl!=3 && item.approvalStatus=="SUBMITTED")
                                             {
						if(item.empid != '<?php echo $_SESSION["uid"]; ?>'){		
                                                 text = text +'<button class="btn btn-inverse btn-stroke approvebutton" data-empid="'+item.empid+'" data-week="'+item.week+'" style="margin-right:13px";>Approve</button><a href="#modal-loginreject" data-empid="'+item.empid+'" data-week="'+item.week+'" data-toggle="modal"  class="btn btn-danger btn-stroke rejectbutton" >Reject</a>';
                                                } else if(acl==1) {
                                                   text = text +'<button class="btn btn-inverse btn-stroke approvebutton" data-empid="'+item.empid+'" data-week="'+item.week+'" style="margin-right:13px";>Approve</button><a href="#modal-loginreject" data-empid="'+item.empid+'" data-week="'+item.week+'" data-toggle="modal"  class="btn btn-danger btn-stroke rejectbutton" >Reject</a>'; 
                                                }
                                             }
							
							
                                             text=text+'<form method="GET" class="btn "  action="timesheetedit.php"><input type="hidden" name="week" value="'+item.week+'" /><input type="hidden" name="empid" value="'+item.empid+'" /><input value="View" class="btn btn-danger btn-stroke"  type="submit" /></form></td></tr>';

                                             $('#table-body').append(text);
					    	
								
                                         }
                                          if(i == data.length-1)
                                            {

                                               setTimeout(function() {
                                                    initTables();
                                               }, 1000);
                                            }	
                                                       
						 
                                     });
                                     $("#overdueCount").text(count);
                                     //alert(count);
 
                                 },
                                 error: function(xhr,status,error) { 
                                     bootbox.alert(status);
                                 }
                             });
                             
                                             $(".multiapprovebutton").click(function(){
                                                 var count = 0;
                                                 var data = [];
                                                 $('.multi-approved:checked').each(function() { 
                                                     data[count] = $(this).val();
                                                     count++;
                                                 });
                                                 //console.log(data);
                                                 if(count==0) {
                                                     bootbox.alert('You need to select some Timesheet to perform this action.');
                                                     return;
                                                 }
                                                 bootbox.confirm("Are you sure you want to approve selected timesheet?", function(result) {
                                                     if(result)
                                                     {
                                                         var myJSONText = JSON.stringify(data);
                                                         var mydata="data="+myJSONText;
                                                         $.ajax({
                                                             
                                                             async: false , 
                                                             type: "POST" , 
                                                             
                                                             url: "php/approveMultipletimesheet.php" , 
                                                             dataType: "json" , 
                                                             data: mydata, 
                                                             success: function(data) {
                                                                 if(data.status == "SUCCESS") {
                                                                     bootbox.alert(data.message, function() {
                                                                         window.location.replace(window.location.href);
                                                                         
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
                                                 });
                                             });
                                             /*  $.ajax({
                     async: false , 
                     type: "POST" , 

                     url: "php/getOverdueCount.php" , 
                     //dataType: "json" , 
                     success: function(data) {
                    // alert(data);
                      $("#overdueCount").text(data);
               



                     },
                     error: function(xhr,status,error) { 
                             bootbox.alert(status);
                     }
                     });
                
                              */ 
                
                
                
	
	

                             $(document).on('click', ".approvebutton", function(event) {
	
                                 bootbox.confirm("Are you sure you want to approve this timesheet?", function(result) {
                                     if(result)
                                     {
                                         var empId = event.target.getAttribute("data-empid");
                                         var week =event.target.getAttribute("data-week");
                                         var mydata="empId="+empId+"&week="+week;
				
                                         $.ajax({
				
                                             async: false , 
                                             type: "POST" , 
					
                                             url: "php/approveTimesheet.php" , 
                                             dataType: "json" , 
                                             data: mydata, 
                                             success: function(data) {
                                                 if(data.status == "SUCCESS") {
                                                     bootbox.alert(data.message, function() {
                                                         window.location.replace(window.location.href);
							
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
                                 }); 		
	
	
                             });	
	


                             $('#modal-loginreject').on('shown.bs.modal', function(e) {
     
                                 $('#empid').val(e.relatedTarget.getAttribute('data-empid'));
                                 $('#week').val(e.relatedTarget.getAttribute('data-week'));
                                 $('#reasonToReject').val('');
	
                             });




                             $('#addForm1').bootstrapValidator({
                                 message: 'This value is not valid',
                                 feedbackIcons: {
                                     valid: 'glyphicon glyphicon-ok',
                                     invalid: 'glyphicon glyphicon-remove',
                                     validating: 'glyphicon glyphicon-refresh'
                                 },
                                 fields: {
                                     username: {
                                         validators: {
                                             notEmpty: {
                                                 message: 'The Employee Name is required'
                                             }
                                         }
                                     },
                                     dateOfEntry: {
                                         validators: {
                                             notEmpty: {
                                                 message: 'The Date is required'
                                             }
                                         }
                                     },
		
                                     fromTime: {
                                         validators: {
                                             notEmpty: {
                                                 message: 'The time field is required'
                                             }
                                         }
                                     },
                                     toTime: {
                                         container:'#errorTime',
                                         validators: {
                                             notEmpty: {
                                                 message: 'The time field is required'
                                             }
                                         }
                                     },
                                     client: {
                                         validators: {
                                             notEmpty: {
                                                 message: 'The Client Name is required'
                                             }
                                         }
                                     },
                                     //			project: {
                                     //                validators: {
                                     //                    notEmpty: {
                                     //                        message: 'The Project Name is required'
                                     //                    }
                                     //                }
                                     //            },
                                     activity: {
                                         validators: {
                                             notEmpty: {
                                                 message: 'The Activity Name is required'
                                             }
                                         }
                                     },
                                     subactivity: {
                                         validators: {
                                             notEmpty: {
                                                 message: 'The Subactivity Name is required'
                                             }
                                         }
                                     }

                                 }
                             })
                             .on('success.form.bv', function(e){
                                 e.preventDefault();
                                 if( $("#addtimeunits").val()<1)
                                 {
                                     bootbox.alert("The number of time units must atleast be 1.");
                                     return;
                                 }
                                 var obj = new Object();
                                 obj.empId = $("#addempid").val();                
                                 obj.companyId = $('#addcompany').val();
                                 obj.clientId =  $("#addclient").val();
                                 obj.projectId = $("#addproject").val();
                                 obj.activityId = $("#addactivity").val();
                                 obj.subactivityId = $("#addsubactivity").val();
                                 obj.deptId = $("#adddept").val();
                                 obj.teamId =  $("#addteam").val();
                                 obj.taskId = $("#addtask").val();
                                 obj.date = $("#adddate").val();
                                 obj.startTime = $("#timepicker1").val();
                                 obj.endTime = $("#timepicker6").val();
                                 obj.billable = $("#addbillable").is(':checked')?'1':'0';
                                 obj.timeunits = $("#addtimeunits").val();
                                 obj.comments = $("#addcomments").val();
		
                                 $.ajax({
				
                                     async: true , 
                                     type: "POST" , 
				
                                     url: "php/addTimesheet.php", 
                                     dataType: "json" , 
                                     data: $.param(obj), 
                                     beforeSend: function()
                                     {
                                         $("#addloader1").show();
                                     },
                                     success: function(data) {
                                         bootbox.alert(data.message, function() {
                                           
                                             if(data.status=="SUCCESS")
                                             {
                                                 $("#modal-login").modal("hide");
                                                 location.reload();
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



                             $('#rejectform').bootstrapValidator({
                                 message: 'This value is not valid',
                                 feedbackIcons: {
                                     valid: 'glyphicon glyphicon-ok',
                                     invalid: 'glyphicon glyphicon-remove',
                                     validating: 'glyphicon glyphicon-refresh'
                                 }
                             })	
                             .on('success.form.bv', function(e) {
		
                                 e.preventDefault();
                                 $('#modal-loginreject').hide();
               
                                 bootbox.confirm("Are you sure you want to reject this timesheet?", function(result) 
                                 {
                    
                                     $('#modal-loginreject').show();
                   
                                     if(result)
                                     {
                                         var empId = $('#empid').val();
                                         var week = $('#week').val();
                                         var reason = $("#reasonToReject").val();
                                         var mydata="empId="+empId+"&week="+week+"&reasonToReject="+reason;
				
                                         $.ajax({
				
                                             async: false , 
                                             type: "POST" , 
					
                                             url: "php/rejectTimesheet.php" , 
                                             dataType: "json" , 
                                             data: mydata, 
                                             success: function(data) {	
                                                 $('#modal-loginreject').hide();
					
                                                 bootbox.alert(data.message, function() {  
                                                     if(data.status == "SUCCESS") {
                                                         location.reload();
							
                                                     }
                                                 });
						
						
                                             },
                                             error: function(xhr,status,error) { 
                                                 bootbox.alert(status);
                                             }
                                         });
                                     }
                         
                                 }); 		
	
                             });


                             $('#addempname').change(function(){ 
			
	
                                 $('#addempid').val( $(this).eq(0).attr("value") );
		
                                 console.log("Team ID is:" + $(this).find(":selected").attr("data-teamid"));
                                 $('#addteam').val( $(this).find(":selected").attr("data-teamid") );
		
                                 console.log("Department ID is:" + $(this).find(":selected").attr("data-deptid"));
                                 $('#adddept').val( $(this).find(":selected").attr("data-deptid") );
                
		
                                 // Load tasks. 
                                 $.ajax({
					
                                     async: true , 
                                     type: "POST" , 
					
                                     url: "php/retrieveTaskDataForTimesheet.php" , 
                                     dataType: "json" , 
                                     data : "teamId=" + $('#addteam').val(), 
                                     beforeSend: function()
                                     {
                                         $("#addloader1").show();
                                     },
                                     success: function(data) {
                                         //console.log(data);
                                         $('#addtask').empty();
                                         $('#addtask').append('<option value="0"  selected="">Select Task</option>');
									
						
								
                                         $.each(data, function(i, item) {
									
                                             if(i!=0){
                                                 var text = '<option value="' + item.id  +  '" data-activityid="' + item.activityId  + '" data-subactivityid="' + item.subactivityId  + '">' + item.name + '</option>';
                                                 $('#addtask').append(text);
                                                 //$('#edittask').append(text);
                                             }
                                         });
					
						
                                     },
                                     error: function(xhr,status,error) { },
                                     complete:function()
                                     {
                                         $("#addloader1").hide();
                                     }
                                 });
			
                                 // Load clients for which this team is specified.
                                 // if(acl)
               
                                 //alert("teamId=" + $('#addteam').val()+"&empid="+$('#addempid').val());
                                 $.ajax({
				
                                     async: true , 
                                     type: "POST" , 
				
                                     url: "php/retrieveClientForTeam.php" , 
                                     dataType: "json" , 
                                     data: "teamId=" + $('#addteam').val()+"&empid="+$('#addempid').val(), 
                                     beforeSend: function()
                                     {
                                         $("#addloader1").show();
                                     },
                                     success: function(data) {
						
                                         $('#addclient').empty();
                                         $('#addclient').append('<option value="0"  selected="">Select Client</option>');
							
                                         $.each(data, function(i, item) {

                                             if(i!=0){
                                                 var text = '<option value="' + item.id    +  '" data-companyid="' + item.companyId  + '">' + item.name + '</option>';
                                                 $('#addclient').append(text);
                                                 //$('#editclient').append(text);
                                             }
                                         });
				
					
                                     },
                                     error: function(xhr,status,error) { },
                                     complete:function()
                                     {
                                         $("#addloader1").hide();
                                     }
                                 });
		

		
                             });	
	
                             $('#addtask').change(function(){ 
	
                                 if($('#addtask').val() != 0)
                                 {
                                     console.log("ActivityId is:" + $(this).find(":selected").attr("data-activityid"));
			
                                     $('#addactivity').val( $(this).find(":selected").attr("data-activityid") );
			
                                     console.log("SubActivityId is:" + $(this).find(":selected").attr("data-subactivityid"));
			
                                     $('#addsubactivity').val( $(this).find(":selected").attr("data-subactivityid") );	
                                     $('#addactivity').attr("disabled","disabled");
                                     $('#addsubactivity').attr("disabled","disabled");
                                 }
                                 else
                                 {
                                     $('#addactivity').removeAttr("disabled");
                                     $('#addsubactivity').removeAttr("disabled");
                                 }
		
                             });		

	
                             $('#addactivity').change(function() {
                                 if($('#addtask').val() != 0){
		
                                     // Reselect the value in addtask.
                                     $('#addactivity').val( $('#addtask').find(":selected").attr("data-activityid") );
			
                                 }
                             });
	
                             $('#addsubactivity').change(function() {
                                 if($('#addtask').val() != 0){
		
                                     // Reselect the value in addtask.
                                     $('#addsubactivity').val( $('#addtask').find(":selected").attr("data-subactivityid") );
			
                                 }
                             });
	
                             $('#addteam').change(function() {
	
                                 if($('#addempname').val() != "" && $('#addempname').val() != 0) {
	
                                     $('#addteam').val( $('#addempname').find(":selected").attr("data-teamid") );
                                 }
		
			
	
                             });

	
                             $('#adddept').change(function() {
	
                                 if($('#addempname').val() != "" && $('#addempname').val() != 0) {
	
                                     $('#adddept').val( $('#addempname').find(":selected").attr("data-deptid") );
                                 }
                             });
	
                             $('#addclient').change(function() {
	
                                 //Load company of this client.
                                 $('#addcompany').val($(this).eq(0).find(':selected').attr('data-companyid'));			 
                                 // Load Projects for this client.
                                 $.ajax({
				
                                     async: true , 
                                     type: "POST" , 
				
                                     url: "php/retrieveProjectForClient.php" , 
                                     dataType: "json" , 
                                     data: "clientId=" + $('#addclient').val(), 
                                     beforeSend: function()
                                     {
                                         $("#addloader1").show();
                                     },
                                     success: function(data) {
					
                                         $('#addproject').empty();
                                         $('#addproject').append('<option value="0"  selected="">Select Project</option>');
							
                                         $.each(data, function(i, item) {

                                             if(i!=0){
                                                 var text = '<option value="' + item.id  +  '">' + item.name + '</option>';
                                                 $('#addproject').append(text);
                                                 //$('#editclient').append(text);
                                             }
                                         });
				
					
                                     },
                                     error: function(xhr,status,error) { },
                                     complete:function()
                                     {
                                         $("#addloader1").hide();
                                     }
                                 });
		
	
                             });

	
	
                             //select emp ID
                             $("#addempname").val('<?php echo $_SESSION["uid"]; ?>');
	
                             //trigger val changed
                             $("#addempname").change();
                             function resetForm() {
                                 alert("in");
                                 $('#addForm1').bootstrapValidator('resetForm', true);
                             }
                             $('#modal-login').on('shown.bs.modal', function() {
                                 	
                             });
                         });




        </script>
    </head><body class="">
        <!-- Main Container Fluid -->
        <div class="container-fluid menu-hidden">

            <!-- Sidebar Menu -->

            <!-- // Sidebar Menu END -->

            <!-- Content -->
            <div id="content">

                <?php include_once('header.php'); ?>            

                <?php include_once('top_content_munu.php'); ?> 
                

                
                
                
                

                <!-- // END navbar -->
                <div class=""> 
                    <div class="col-sm-4" style="margin-left:15px;"><h2>Timesheet</h2></div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right" style="margin-right:15px;">
                        <a href="#modal-login" data-toggle="modal" data-backdrop="static" data-keyboard="false" class="btn btn-warning pull-right" style="margin-left:8px;">Add Time</a>
                        <?php if($_SESSION["uaccesslevel"] != 3) { ?>
                                <button class="btn btn-inverse btn-stroke multiapprovebutton pull-right" style="margin-right:13px;" >Approve</button>
                               <?php } ?>
                        
                    </div>

                </div>
<?php
$todayDate = date("Y-m-d");
$previousSunday = date('Y-m-d', strtotime('last Sunday', strtotime($todayDate)));
$query = "SELECT COUNT(*) as 'OverDurCount' FROM Timesheet WHERE approvalStatus  = 'PENDING' AND date <= '" . $previousSunday . "' AND empId ='" . $_SESSION['uid'] . "'";

$result = executeSelectQuery($query);

if ($row = mysql_fetch_array($result)) {
    $OverDurCount = $row['OverDurCount'];
} else {
    $OverDurCount = 0;
}
$generateURL = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '?status=PENDING';
?> 
                <?php
                if ($OverDurCount) {
                    //print_r($_SERVER);
                    // die;
                    ?>
                    <div class="innerLR" style="margin-top:90px;">
                        <div class="alert alert-warning alert-dismissible" role="alert" id="overdue" >
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong><a href="<?php echo $generateURL; ?>" >Overdue Timesheets (<span id="overdueCount">0</span>)</a></strong><p>

                            </p>
                        </div>    
                    </div>
                    <div class="innerLR" style="margin-top:25px;">
<?php } else { ?>
                        <div class="innerLR" style="margin-top:90px;">
                    <?php } ?>


                        <!-- Widget -->

                        <!-- // Widget END -->

                        <!-- // Widget END -->

                        <!-- // Widget END -->




                        <!-- Widget -->
                        <div class="widget" style="background: #ffffff;">
                            <div class="widget-body overflow-x">
                                <div class="row separator bottom" style="display:none;"></div>
                                <!-- Table -->
                                
                                <table class="dynamicTable tableTools table table-striped checkboxs">

                                    <!-- Table heading -->
                                    <thead class="bg-gray">
                                        <tr>
                                            <?php if($_SESSION["uaccesslevel"] != 3) { ?>
                                            <th style="width:60px !important;">Select</th>
                                            <?php } ?>
                                            <th style="width:265px !important;">Date</th>
                                            <th style="width:210px !important;">Employee Name</th>
                                            <th style="width:80px !important;">Billable</th>
                                            <th style="width:90px !important;">Unbillable</th>
                                            <th style="width:180px !important;">Status</th>
                                            <th style="width:250px !important;"></th>
                                        </tr>
                                    </thead>
                                    <!-- // Table heading END -->

                                    <!-- Table body -->
                                    <tbody id="table-body">


                                        <!-- // Table row END -->

                                    </tbody>
                                    <!-- // Table body END -->

                                </table>
                                <!-- // Table END -->







                            </div>
                        </div>
                        <!-- // Widget END -->
                        <!-- // Widget END -->

                        <!-- Widget -->
                        <!-- // Widget END -->



                    </div>

                    <div class="modal fade"  id="modal-login">
                        <div class="modal-dialog" style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;">
                            <div class="modal-content">

                                <!-- Modal heading -->
                                <div class="modal-header" style="border-style: none;">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <!-- // Modal heading END -->

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="innerAll" style="padding:0;">
                                        <div class="innerLR" style="padding:0;">
                                            <form class="form-horizontal" id="addForm1" role="form">
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-3 control-label">Employee Name</label>
                                                    <div class="col-sm-8">
<?php $disable = ""; if ($_SESSION["uaccesslevel"] == 2 || $_SESSION["uaccesslevel"] == 3) { 
                                                        $disable = "disabled";
                                                          } ?>
                                                            <select id="addempname" name="username" class="form-control" <?php echo $disable; ?>>
                                                        
                                                                <option value="" disabled="" selected="">Select Employee</option>

                                                            </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-3 control-label">Employee ID</label>
                                                    <div class="col-sm-8">
                                                        <input id="addempid" type="text" class="form-control" readonly />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-3 control-label">Department</label>
                                                    <div class="col-sm-8">
                                                        <select id="adddept" class="form-control" disabled>
                                                            <option value=""></option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-3 control-label">Date</label>
                                                    <div class="input-group date datepicker6 col-sm-8" style="margin-left:12px; float:left; width:63%;">
                                                        <input id="adddate" class="form-control" name="dateOfEntry" type="text" value="<?php echo date('d F Y'); ?>" >
                                                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-3 control-label">Time</label>
                                                    <div class="input-group bootstrap-timepicker col-sm-8" style="margin-left:12px; float:left; width:63%;">
                                                        <input id="timepicker1" name="fromTime" type="text" class="form-control">
                                                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                        <input id="timepicker6" name="toTime" type="text" class="form-control">
                                                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                    </div>

                                                </div>
                                                <span class=" col-sm-3" ></span>
                                                <span class="help-block col-sm-8" id="errorTime"></span>
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-3 control-label">Units</label>
                                                    <div class="col-sm-3">
                                                        <input id="addtimeunits" type="text" placeholder="Units" class="form-control" readonly />
                                                    </div>
                                                    <label for="inputEmail3" class="col-sm-2 control-label">Minutes</label>
                                                    <div class="col-sm-3">
                                                        <input id="addtimeminutes" type="text" placeholder="Minutes" class="form-control" readonly />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-3 control-label">Client</label>
                                                    <div class="col-sm-8">
                                                        <select id="addclient" name="client" class="form-control">
                                                            <option value=""  selected="">Select Client</option>

                                                        </select>
                                                        <input type="hidden" id="addcompany" class="form-control" value="" /> 
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-3 control-label">Project</label>
                                                    <div class="col-sm-8">
                                                        <select id="addproject" name="project" class="form-control">
                                                            <option value="" disabled="" selected="">Select Project</option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-3 control-label">Team</label>
                                                    <div class="col-sm-8">
                                                        <select id="addteam" class="form-control" disabled>
                                                            <option value=""  selected="">Select Team</option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-3 control-label">Task</label>
                                                    <div class="col-sm-8">
                                                        <select id="addtask" class="form-control">
                                                            <option value="0"  selected="">Select Task</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-3 control-label">Activity</label>
                                                    <div class="col-sm-8">
                                                        <select id="addactivity" name="activity" class="form-control">
                                                            <option value="" disabled="" selected="">Select Activity</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-3 control-label">Sub-Activity</label>
                                                    <div class="col-sm-8">
                                                        <select id="addsubactivity" name="subactivity" class="form-control">
                                                            <option value="" disabled="" selected="">Select Sub-Activity</option>

                                                        </select>
                                                    </div>
                                                </div>								

                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-3 control-label">Billable</label>
                                                    <div class="col-sm-8" style="margin-left:5px;">
                                                        <label for="addbillable" class="checkbox-custom col-sm-8">
                                                            <i class="fa fa-fw fa-square-o checked"></i>
                                                            <input id="addbillable" type="checkbox"  checked="checked">

                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-1 control-label" style="margin-bottom:5px;">Notes</label>
                                                    <div class="col-sm-12">
                                                        <textarea id="addcomments" type="text" placeholder="Descriptions..." class="form-control" rows="5" style="resize: vertical;"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-5"></div>
                                                    <div class="col-sm-2">
                                                        <img id="addloader1" src="assets/images/ajax-loader.gif" style="display:none;"/>
                                                    </div>
                                                    <div class="col-sm-5"></div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button class="btn btn-success pull-right"><i class="fa fa-check"></i> &nbsp;&nbsp;Submit</button>
                                                        <a href="#" class="btn btn-danger pull-right" data-dismiss="modal" style="margin-right:10px;"><i class="fa fa-times"></i> &nbsp;&nbsp;Cancel</a>
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

                    <!-- CREATE TASK MODAL -->
                    <!-- Modal -->
                    <div class="modal fade"  id="modal-loginreject">

                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal heading -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3 class="modal-title">Reason for Rejection (Optional)</h3>
                                </div>
                                <!-- // Modal heading END -->

                                <!-- Modal body -->
                                <div class="modal-body" style="padding:0; padding-top:10px;">
                                    <div class="innerAll" style="padding:0;">
                                        <div class="innerLR" style="padding:0;">
                                            <form class="form-horizontal" id="rejectform" role="form">

                                                <div class="form-group" style="padding-left:10px; padding-right:10px; margin-bottom: 25px;">

                                                    <div class="col-sm-20">
                                                        <input type="text" id="reasonToReject" class="form-control"  placeholder="Hey! please need to fill the description in activity (Miscellaneous)">
                                                        <input type="hidden" id="empid" >
                                                        <input type="hidden" id="week" >
                                                    </div>
                                                </div>

                                                <!--<div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                                <button class="btn btn-primary pull-right">OK</button>
                                                                <a href="#" class="btn btn-default pull-right" data-dismiss="modal" style="margin-right:10px;">Cancel</a>
                                                        </div>
                                                </div>--->
                                                <div class="modal-footer center margin-none">
                                                    <button class="btn btn-primary pull-right">OK</button>
                                                    <a href="#" class="btn btn-default pull-right" data-dismiss="modal" style="margin-right:10px;" onclick="resetForm()">Cancel</a>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- // Modal body END -->

                            </div>
                        </div>

                    </div>
                    <!-- // Modal END -->

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
            <script src="assets/plugins/forms_elements_bootstrap-datepicker/js/bootstrap-datepicker.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
            <script src="assets/components/forms_elements_bootstrap-datepicker/bootstrap-datepicker.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
            <script src="assets/plugins/forms_elements_bootstrap-timepicker/js/bootstrap-timepicker.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
            <script src="assets/components/forms_elements_bootstrap-timepicker/bootstrap-timepicker.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
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
            <!--<script src="assets/js/common.js"></script>-->




    </body>
</html>