

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
   
  
                
    
    <div class="widget-body overflow-x" style="margin-top:15px; width:99%; " >                 
                    
                    
                    <table class="dynamicTable tableTools table table-striped overflow-x "  >
                        <thead>
                            <tr  style="background-color:gray; color:#FFF;">
                                <th class="thead-th-padg" width="150px">Name</th>
                                <th class="thead-th-padg" width="150px" > </th>
                                <?php foreach ($distinct_leave_type_from_emp as $_distinct_leave_type_from_emp) { ?>
                                    <th class="thead-th-padg" width="150px" ><?php echo $_distinct_leave_type_from_emp->leave_type;?></th>   
                                <?php } ?>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
    $next_id = '';
    foreach($employee_leave_detail as $_employee_leave_detail){ 
        $current_id = $_employee_leave_detail['id'];
        if($next_id!=$current_id){
    ?>   
    <tr class="gradeX pdf_table_border" style="background-color: #fff !important;">
        <td>
            <span><?php echo $_employee_leave_detail['empName'];?></span>
        </td>
        <td>
<!--            <table border="0">
                <tr>-->
                    <div>Opening balance</div>
<!--                </tr>
                <tr>-->
                    <div>Leaves taken</div>
<!--                </tr>
                <tr>-->
                    <div>Closing balance</div>
<!--                </tr>-->
<!--            </table>-->
        </td>
        <?php 
            foreach ($distinct_leave_type_from_emp as $key=> $_distinct_leave_type_from_emp) {
             $opening_balance = '';   
             $leaves_taken = '';   
             $closing_balance = '';   
             $searched_arr = $this->employee_leave_model->multiSearch($employee_leave_detail,array('empId' => $_employee_leave_detail['empId'], 'id' => $_employee_leave_detail['id'],'legend'=>$_distinct_leave_type_from_emp->legend));
            if(!empty($searched_arr)){
                $opening_balance = $searched_arr['no_of_leaves'];
                $leaves_taken = $searched_arr['approve_leave'];
                $closing_balance = $searched_arr['balance_leave'];
            }
        ?>
            <td >
                <div style="text-align: right"><?php echo $opening_balance; ?></div>
                <div style="text-align: right"><?php echo $leaves_taken; ?></div>
                <div style="text-align: right"><?php echo $closing_balance; ?></div>
<!--                <table border="0" width="100%">
                    <tr><td align="right"><?php //echo $opening_balance; ?></td></tr>
                    <tr><td align="right"><?php //echo $leaves_taken; ?></td></tr>
                    <tr><td align="right"><?php //echo $closing_balance; ?></td></tr>
                </table>-->
            </td>   
        <?php 
            } 
        ?>
        
    </tr>
    <?php } 
        $next_id = $current_id;
        }
                            
                            
                            
          ?>                  
                            
                            
                            
                            
                            
                          
                        </tbody>
                    </table>
                </div>
            
	

</body>
</html>