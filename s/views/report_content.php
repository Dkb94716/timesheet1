<style>
    .summary-rep-radio{
        margin-top: 10px !important;
        margin-left: 15px !important;
        font-size: 11px;
    }
    .summary-radio{
        margin-top: 2px !important;
    }
    .form-control{
        font-size:12px !important;
    }
    .filter-text{
        display: none;
    }
    .more_filter-option{
        display:none;
    }
    
</style>

<div style="margin-bottom: 5px; float: right; margin-right:15px; margin-top:24px; cursor: pointer;">
    <?php if($userPrivileges->administration_control->report->ExportExcel==1){  ?>
    <a href="<?php echo base_url(); ?>report/download_report_excel" Title="Export to excel"> <img src="<?php echo base_url(); ?>assets/images/excel_button_logo.png" style="margin-right: 8px;"></a>
    <?php  }  ?>
    
    
    <?php if($userPrivileges->administration_control->report->PrintReport==1){  ?>
    <a href="#nogo" Title="Print"> <img src="<?php echo base_url(); ?>assets/images/print-load.png" onclick="PrintDiv();"> </a>
    <?php } ?>
</div>
<div class="">
    <h2 class="innerTB" style="padding-left:14px; width:800px;">Summary Report</h2>
    <!-- Widget -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="widget" style="background: #eaeaea !important;">
            <div class="widget-head">
                <h4 class="heading">View by:</h4>
            </div>
            <div class="widget-body left" style="padding:10px; padding-top:0px;">
                <form>
                    <div class="radio pull-left" style="font-size:11px;">
                        <input type="radio" name="view_by" value="company" checked="checked" style="margin-top: 2px"><span>Company</span>
                    </div>
                    <div class="radio pull-left summary-rep-radio"> 
                        <input type="radio" class="summary-radio" name="view_by" value="client"><span>Client</span> 
                    </div>

                    <div class="radio pull-left summary-rep-radio">
                        <input type="radio" class="summary-radio" name="view_by" value="project"> <span>Project</span>
                    </div>

                    <div class="radio pull-left summary-rep-radio">
                        <input type="radio" class="summary-radio" name="view_by" value="team"><span>Team</span> 
                    </div>
                    <div class="radio pull-left summary-rep-radio"> 
                        <input type="radio" class="summary-radio" name="view_by" value="user"><span>User</span>
                    </div>

                    <div class="radio pull-left summary-rep-radio"> 
                        <input type="radio" class="summary-radio" name="view_by" value="activity"><span>Activity </span>
                    </div>
                    <div class="radio pull-left summary-rep-radio"> 
                        <input type="radio" class="summary-radio" name="view_by" value="sub_activity"><span>Sub-Activity</span>
                    </div>
                    <div class="radio pull-left summary-rep-radio"> 
                        <input type="radio" class="summary-radio" name="view_by" value="task"><span>Task </span>
                    </div>
                    
                    <button type="button" class="btn-xs btn-success" id="more_filter-btn" style="margin-top:6px; margin-left:25px;">More Filter</button>

                    <div class="widget-head filter-text">
                        <h4 class="heading" style="clear: both; margin-left: -8px;">Filter By:</h4>
                    </div>
                    <div class="widget-body left" style="padding:10px; padding-left: 0px;">
                            <div class="more_filter-option">
                                <div class="col-md-3 pull-left" style="padding-left:0px;">
                                    <div class="input-group date datepicker2" style="margin-bottom:5px;">
                                        <input id="startDate" class="form-control" type="text" placeholder="Start Date" style="height:28px;">
                                        <span class="input-group-addon" style="height:25px;"><i class="fa fa-th"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-3 pull-left">
                                    <div class="input-group date datepicker2" style="margin-bottom:5px;">
                                        <input id="endDate" class="form-control" type="text" placeholder="End Date" style="height:28px;">
                                        <span class="input-group-addon" style="height:28px;"><i class="fa fa-th"></i></span>
                                    </div>
                                </div>

                                <div class="col-md-12" style="padding-left:0px;">


                                    <div class="col-md-2 pull-left" style="padding-left:0px;">
                                        <div class="innerB" style="padding-bottom:5px;">
                                            <select name="companyId" id="companyId" class="form-control"
                                    style="height:25px; padding:0px;">
                                <option disabled selected>Select Company</option>
                                <option value="0" >ALL</option>
                                  <?php foreach ($company_detail as $com_detail) { ?>
                                  <option value="<?php echo $com_detail->company_id; ?>">
                                  <?php echo $com_detail->company_name; ?></option>
                                     <?php } ?>
                            </select>
                                        </div>
                                    </div>
                                <div class="col-md-2 pull-left">
                                    <div class="innerB" style="padding-bottom:5px;">
                                        <select name="clientId" id="clientId" class="form-control" style="height:25px; padding:0px;">
                                <option disabled selected>Select Client</option>
                                <option value="0" >ALL</option>
<?php foreach ($client_detail as $cl_detail) { ?>

                                    <option value="<?php echo $cl_detail->client_name; ?>"><?php echo $cl_detail->client_name; ?></option>
<?php } ?>
                                </select>							
                                    </div>
                                </div>
                                <div class="col-md-2 pull-left">
                                    <div class="innerB" style="padding-bottom:5px;">
                                        <select name="projectId" id="projectId" class="form-control" style="height:25px; padding:0px;">
                                <option disabled selected>Select Project</option>
                                <option value="0" >ALL</option>
                                     <?php foreach ($project_detail as $pj_detail) { ?>
                                          <option value="<?php echo $pj_detail->project_name; ?>"><?php echo $pj_detail->project_name; ?></option>
                                    <?php } ?>
                                </select>

                                    </div>
                                </div>
                                <div class="col-md-2 pull-left" style="padding-left: 0px;">
                                    <div class="innerB" style="padding-bottom:5px;">
                               <select name="employeeId" id="employeeId" class="form-control" style="height:25px; padding:0px;">
                                <option disabled selected>Select Employee</option>
                                <option value="0" >ALL</option>
                                <?php foreach ($user_detail as $ur_detail) { ?>
                                    <option value="<?php echo $ur_detail->id; ?>"><?php echo $ur_detail->empName . "&nbsp" . "$ur_detail->surname"; ?></option>
                                   <?php } ?>
                            </select>
                                    </div>
                                </div>    
                             </div>
                                <div class="col-md-12" style="  padding-left: 0px;">
                                    <div class="col-md-2 pull-left" style="padding-left:0px;">
                                        <div class="innerB" style="padding-bottom:5px;">
                                           <select name="teamId" id="teamId" class="form-control" style="height:25px; padding:0px;">
                                <option disabled selected>Select Team</option>
                                <option value="0" >ALL</option>
                                <?php foreach ($team_details as $te_detail) { ?>
                                    <option value="<?php echo $te_detail->team_id; ?>"><?php echo $te_detail->team_name; ?></option>
<?php } ?>
                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 pull-left">
                                        <div class="innerB" style="padding-bottom:5px;">
                                             <select name="activityid" id="activityId" class="form-control" style="height:25px; padding:0px;">
                                <option disabled selected>Select Activity</option>
                                <option value="0" >ALL</option>
                                <?php foreach ($activity_detail as $ac_detail) { ?>
                                    <option value="<?php echo $ac_detail->activity_name; ?>"><?php echo $ac_detail->activity_name; ?></option>
<?php } ?>
                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 pull-left">
                                        <div class="innerB" style="padding-bottom:5px;">
                                           <select name="taskId" id="taskId" class="form-control" style="height:25px; padding:0px;">
                                <option disabled selected>Select Task</option>
                                <option value="0" >ALL</option>
                                <?php foreach ($task_detail as $ts_detail) { ?>
                                    <option value="<?php echo $ts_detail->task_name; ?>"><?php echo $ts_detail->task_name; ?></option>
<?php } ?>
                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 pull-left" style="  padding-left: 0px;">
                                        <div class="innerB" style="padding-bottom:5px;">
                                            <select name="isBillable" id="isBillable" class="form-control" style="height:25px; padding:0px;">
                                                <option value="">Both</option>
                                                <option value="1"> Billable time</option>
                                                <option value="0"> Unbillable time</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="padding-left: 0px;">
                                    <div class="checkbox">
                                        <label class="checkbox-custom">
                                            <input type="checkbox" name="checkbox" id="description" value="" >
                                            <i class="fa fa-fw fa-square-o"></i> Include Descriptions
                                        </label> 
                                    </div>
                                </div>
                            </div>        
                            <div class="input-group col-md-12">
                                <button type="button" class="btn-xs btn-success pull-right" name="submit" id="filter" style="margin-left: 10px;">Filter</button>
                                <button type="reset" class="btn-xs btn-success pull-right" name="reset" id="reset">Reset</button>

                            </div>
                    </div>

                </form>
            </div>

        </div>


    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="widget widget-body-white widget-heading-simple">
            <div class="widget-body overflow-x" style="  background: #eaeaea !important;">
                
                    <div class=" col-md-12" style="padding:0px; margin-top: 10px; margin-bottom: 20px;">
                        <span style="font-size:12px;  width:95px !important; float:left; margin-right: 15px;" colspan="7">
                            <?php if($user_logo[0]->company_logo){  ?>
                                  <img src="<?php echo base_url();  ?>uploads/company/<?php echo $user_logo[0]->company_logo; ?>" style=" margin-top:-3px; width:95px;" class="pull-right"/>
                          <?php  }  else { ?>
                                <img src="<?php echo base_url();  ?>assets/img/ANEX-LOGO.png" style=" margin-top:-3px; width:95px;" class="pull-right" />                               
                                <?php } ?>
                        </span>
                        <span style="font-size:16px; float: left;margin-top: -5px;" colspan="8">ANEX MANAGEMENT SERVICES LIMITED</span>
                            
                    </div>
                    
                    <table style="width:100%;">
                        <thead class="bg-gray" id="div-to-print">
                            <tr>
                                <th style="font-size:11px;  width:70px !important;">Company</th>
                                <th style="font-size:11px;  width:70px !important;">Client</th>
                                <th style="font-size:11px;  width:70px !important;">Project</th>
                                <th style="font-size:11px;  width:70px !important;">Team</th>
                                <th style="font-size:11px;  width:70px !important;">User</th>
                                <th style="font-size:11px;  width:70px !important;">Activity</th>
                                <th style="font-size:11px;  width:120px !important;">Disbursement</th>
                                <th style="font-size:11px;  width:70px !important;">Time/Units</th>
                                <th style="font-size:11px;  width:70px !important;">Billable</th>
                                <th style="font-size:11px;  width:70px !important;">Date</th>
                                <th style="font-size:11px;  width:70px !important;">Start Date</th>
                                <th style="font-size:11px;  width:70px !important;">End Date </th>
                                <th style="font-size:11px;  width:70px !important;">Hours </th>
                                <!-- <th style="font-size:12px;">Non-Billable</th> -->
                            </tr>
                        </thead>
                    </table>
            </div>
        </div>
    </div>

    	
    <!-- // Widget END -->

</div>

<script>
    
    $(document).ready(function(){
        
        $("#more_filter-btn").click(function(){
            $(".more_filter-option").toggle();
            $(".filter-text").toggle();
        });
        
        
        $('#reset').click(function()
            {
               // alert("hello");
                location.reload(true);
            }
           );
        
        
        $('#filter').click(function(){
            $("#more_filter-option").hide();
            $("#filter-text").hide();
           var obj = new Object();
            obj.companyId= $('#companyId').val();
            obj.clientId = $('#clientId').val();
            obj.projectId = $('#projectId').val();
            obj.employeeId = $('#employeeId').val();
            obj.teamId = $('#teamId').val();
            obj.activityId = $('#activityId').val();
            //obj.subactivityId = $('#subactivityId').val();
            obj.taskId = $('#taskId').val();
            obj.startDate = $('#startDate').val();
            obj.endDate = $('#endDate').val();
            obj.viewBy = $("input[name=view_by]:checked").val();
            obj.startDate = $("#startDate").val();
            obj.endDate = $("#endDate").val();
            obj.billable = $("#isBillable").val();
            obj.description=$("#description").is(':checked') ? 1 : 0;
            //obj.viewBy = radioVal;
            console.log("Object created completely.");
            console.log($.param(obj));
         
            var request = $.ajax({
                url: CURRENT_URL + '/report/submit_report',
                type: "POST",
                data: $.param(obj),
                dataType: "html"
            });
            request.done(function (msg) {
            
                $('#div-to-print').html(msg);
           
            });
            request.fail(function (jqXHR, textStatus) {
                alert("Request failed: " + textStatus);
            });
         
        
        });
        
    });
    
    
    
      function PrintDiv() {    
           var divToPrint = document.getElementById('div-to-print');
           var popupWin = window.open('', '_blank', 'width=800,height=500,left=200px, top=200px');
//           popupWin.document.open();
//           //alert(divToPrint.innerHTML)
//           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
//            popupWin.document.close();
           //$("#div-to-print").print();
            popupWin.document.write('<html><head><title></title>');
            popupWin.document.write('<style type="text/css" media="print"> @page { size: landscape; }  body { writing-mode: tb-rl;}</style>');
            popupWin.document.write('<style>table thead  tr  th, .table  tbody  tr  th, .table  tfoot  tr  th, .table  thead  tr  td, .table  tbody  tr  td, .table  tfoot  tr  td { border-top-color: #000 !important; padding: 2px !important; }</style>');
            popupWin.document.write('<link rel="stylesheet" href="<?php echo base_url();?>assets/css/admin/module.admin.stylesheet-complete.min.css" type="text/css" />');  
            popupWin.document.write('<style type="text/css">.test { color:red; } </style></head><body>');
            popupWin.document.write('<div><img src="<?php echo base_url();?>assets/img/ANEX-LOGO.png" alt="SMART"></div>');
             
            <?php if($user_logo[0]->company_logo){  ?>
            popupWin.document.write('<div><img src="<?php echo base_url();?>uploads/company/<?php echo $user_logo[0]->company_logo; ?>" alt="SMART" style="margin-top:-3px; width:30px; height:30px;"> ANEX MANAGEMENT SERVICES LIMITED</div>');
           
           <?php } else { ?>
               popupWin.document.write('<div><img src="<?php echo base_url();?>assets/images/people/80/22.png" style=" margin-top:-3px; width:30px; height:30px;" alt="SMART">  ANEX MANAGEMENT SERVICES LIMITED</div>');
               <?php } ?>
            popupWin.document.write('<div style="margin-top: 15px; margin-bottom: 15px;">&nbsp;</div>');
            popupWin.document.write(divToPrint.innerHTML);
            popupWin.document.write('</body></html>');
            popupWin.document.close();
            popupWin.print();
        }
    </script>
</script>