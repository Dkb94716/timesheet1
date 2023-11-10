<html>

<head>
    <title>Welcome to clavis technologies</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">

   

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/admin/module.admin.stylesheet-complete.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/admin/custom.css" />
        
    
</head><body style="background-color: white;">
    <div><span><img src="assets/img/ANEX-LOGO.png" height="20"></span><span style="font-size: 18px;margin-left: 50px;font-weight: bold;">ANEX MANAGEMENT SERVICES LIMITED</span></div>
    
<div class="col-lg-12" style="margin-top:30px;padding: 0px;"> 
    <div class="col-sm-4" style="padding: 0px;"><h4>LEAVE HISTORY (<?php echo $year;?>)</h4></div>
    
</div>
    <div class="widget-head tdtopbg" style="margin-top:15px;width:94%;">
        <span style="width:100px;float: left;">
            <?php if(!empty($user_detail[0]->profilepic)){
            if(file_exists(realpath("uploads/user").'/'.$user_detail[0]->profilepic)){ ?>
            <img style="margin-bottom:0px;width: 40px;height: 40px;float:left;" alt="Profile" class="pull-left thumbnail" src="uploads/user/<?php echo $user_detail[0]->profilepic;?>">
            <?php } 
                            else{ ?>
            <img style="margin-bottom:0px;width: 40px;height: 40px;float:left;" alt="Profile" class="pull-left thumbnail" src="assets/images/people/80/22.png">
         <?php } }
                            else{ ?>
                            <img style="margin-bottom:0px;width: 40px;height: 40px;float:left;" alt="Profile" class="pull-left thumbnail" src="assets/images/people/80/22.png">
                            <?php } ?>
        </span>
        <span style="width:300px;color:#2d91cf;margin-bottom:15px;height: 40px;vertical-align: middle;font-weight: bold;">
            <?php echo $user_detail[0]->empName;?>(<?php echo $user_detail[0]->empId;?>)
        </span>
    </div>
  
                <div class="widget-body overflow-x">                 
                    
                    
                    <table class="dynamicTable tableTools table table-striped overflow-x">
                        <thead>
                            <tr style="background-color:gray; color:#FFF;">
                                <th class="thead-th-padg" style="width:125px;">Leave Type</th>
                                <th class="thead-th-padg  center" style="width:125px;">Balance Leave</th>
                                <th class="thead-th-padg  center" style="width:125px;">Approved Leave</th>
                                <th class="thead-th-padg  center" style="width:125px;">Advanced Leave</th>
                                <th class="thead-th-padg  center" style="width:125px;">Forward Leave</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
if (!empty($employee_leave_detail)) {
           
    foreach ($employee_leave_detail as $employee_leave) {
         $approve_leave_res = $this->employee_leave_model->getEmployeeApproveLeave($emp_id,$year,$employee_leave->leave_type_id);
         $approve_leave = $approve_leave_res[0]->approve_leave;
        ?>
                            <tr class="gradeX">
                                <td><span class="font-size_12"><?php echo $employee_leave->leave_type; ?></span></td>
                                <td align="right"><span class="font-size_12" style="text-align: center;"><?php echo $employee_leave->balance_leave; ?></span></td>
                                <td align="right"><span class="font-size_12"><?php echo ($approve_leave) ? $approve_leave : 0; ?></span></td>
                                <td align="right"><span class="font-size_12"><?php echo ($employee_leave->balance_leave<0) ? abs($employee_leave->balance_leave) : 0; ?></span></td>
                                <td align="right"><span class="font-size_12"><?php echo $employee_leave->last_year_forward_leaves; ?></span></td>
                                
                               
                            </tr>
                              <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
<!--                </div>
     <div class="col-lg-12" style="margin-top:10px;padding: 0px;"> 
    <div class="col-sm-4" style="padding: 0px;font-weight: normal;"><h4>APPROVED LEAVES REPORT</h4></div>
    
</div>-->
    <div class="widget-body overflow-x" style="margin-top:15px;">                 
                    
                    
                    <table class="dynamicTable tableTools table table-striped overflow-x">
                        <thead>
                            <tr style="background-color:gray; color:#FFF;">
                                <th class="thead-th-padg" style="width:104px;">Leave Type</th>
                                <th class="thead-th-padg" style="width:104px;">Status</th>
                                <th class="thead-th-padg" style="width:104px;">From Date</th>
                                <th class="thead-th-padg" style="width:104px;">From Session</th>
                                <th class="thead-th-padg" style="width:104px;">To Date</th>
                                <th class="thead-th-padg" style="width:104px;">To Session</th>
                                <th class="thead-th-padg" style="width:95px;">No. of days</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
if (!empty($leave_detail)) {
           
    foreach ($leave_detail as $leave) {
        
        ?>
                            <tr class="gradeX">
                                <td><span class="font-size_12"><?php echo $leave->leave_type; ?></span></td>
                                <td><span><?php echo $leave->status; ?> </span></td>
                                <td><span><?php echo date('d F Y',  strtotime($leave->from_date)); ?> </span></td>
                                <td><span> <?php echo ($leave->from_session==1)?'First Half':'Second Half'; ?></span></td>
                                <td><span><?php echo date('d F Y',  strtotime($leave->to_date)); ?> </span></td>
                                <td><span><?php echo ($leave->to_session==1)?'First Half':'Second Half'; ?></span></td>
                                <td align="right"><span><?php echo $leave->number_of_days; ?> </span></td>
                               
                            </tr>
                              <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            
	

</body>
</html>