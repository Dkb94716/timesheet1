<style>
    .summary-rep-radio {
        margin-top: 10px !important;
        margin-left: 15px !important;
        font-size: 11px;
    }
    .summary-radio {
        margin-top: 2px !important;
    }
    .form-control {
        font-size: 12px !important;
    }
    .filter-text {
        display: none;
    }
</style>
<div style="margin-bottom: 5px; float: right; margin-right:15px; margin-top:24px; cursor: pointer;">
    <?php if ($userPrivileges->administration_control->report->ExportExcel == 1) {  ?>
        <!-- <a href="<?php //echo base_url(); 
                        ?>report/download_report_excel" Title="Export to excel"> <img src="<?php //echo base_url(); 
                                                                                                                    ?>assets/images/excel_button_logo.png" style="margin-right: 8px;"></a> -->
    <?php  }  ?>

    <?php if ($userPrivileges->administration_control->project_wise_report->PrintReport == 1) {  ?>
        <a href="#nogo" Title="Print"> <img src="<?php echo base_url(); ?>assets/images/print-load.png" onclick="PrintDiv();"> </a>
    <?php } ?>
</div>
<div class="">
    <h2 class="innerTB" style="padding-left:14px; width:800px;">Summary Report</h2>
    <!-- Widget -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="widget" style="background: #eaeaea !important;">
            <div class="widget-body left" style="padding:10px; padding-top:0px;">
                <form>
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
                            <div class="col-md-2 pull-left">
                                <div class="innerB" style="padding-bottom:5px;">
                                    <select name="clientId" onchange="get_project(this.value, 'project_name')" id="clientId" class="form-control" style="height:25px; padding:0px;">
                                        <option disabled selected value="">Select Client</option>
                                        <?php foreach ($client_detail as $cl_detail) { ?>
                                            <option value="<?php echo $cl_detail->client_name; ?>"><?php echo $cl_detail->client_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 pull-left">
                                <div class="innerB" style="padding-bottom:5px;">
                                    <select name="project_name" id="project_name" class="form-control" style="height:25px; padding:0px;">
                                        <option disabled selected>Select Project</option>
                                    </select>
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
                        <?php if ($user_logo[0]->company_logo) {  ?>
                            <img src="<?php echo base_url();  ?>uploads/company/<?php echo $user_logo[0]->company_logo; ?>" style=" margin-top:-3px; width:95px;" class="pull-right" />
                        <?php  } else { ?>
                            <img src="<?php echo base_url();  ?>assets/img/ANEX-LOGO.png" style=" margin-top:-3px; width:95px;" class="pull-right" />
                        <?php } ?>
                    </span>
                    <span style="font-size:16px; float: left;margin-top: -5px;" colspan="8">Clavis Technologies</span>
                </div>
                <table style="width:100%;">
                    <thead class="bg-gray" id="div-to-print">
                        <tr>
                            <th style="font-size:11px;  width:70px !important;">Task</th>
                            <th style="font-size:11px;  width:70px !important;">Users</th>
                            <th style="font-size:11px;  width:70px !important;">Actual Hours</th>
                            <th style="font-size:11px;  width:70px !important;">Consumed Hours</th>
                            <!-- <th style="font-size:11px;  width:70px !important;">Time/Units</th> -->
                            <?php
                            $all_userdata = $this->session->userdata('logged_in');
                            if ($all_userdata['usrRoleld'] == 1) { ?>
                                <th style="font-size:11px;  width:70px !important;">Amount</th>
                            <?php } ?>
                            <th style="font-size:11px;  width:70px !important;">Added Date </th>
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
    $(document).ready(function() {
        $('#reset').click(function() {
            location.reload(true);
        });
        $('#filter').click(function() {
            var obj = new Object();
            obj.startDate = $('#startDate').val();
            obj.endDate = $('#endDate').val();
            obj.clientId = $('#clientId').val();
            obj.projectId = $('#project_name').val();
            if (!obj.clientId) {
                alert('Please select client');
                return false;
            }
            if (!obj.projectId) {
                alert('Please select project');
                return false;
            }
            var request = $.ajax({
                url: CURRENT_URL + '/report/submit_project_wise_report',
                type: "POST",
                data: $.param(obj),
                dataType: "html"
            });
            request.done(function(msg) {
                $('#div-to-print').html(msg);
            });
            request.fail(function(jqXHR, textStatus) {
                alert("Request failed: " + textStatus);
            });
        });
    });

    function get_project(client_name, id) {
        var request = $.ajax({
            url: CURRENT_URL + '/project/get_project_assign_time',
            type: "POST",
            data: {
                client_name: client_name
            },
            dataType: "html"
        });
        request.done(function(data) {
            $('#' + id).html(data);
        });
        request.fail(function(jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    }

    function PrintDiv() {
        var divToPrint = document.getElementById('div-to-print');
        var popupWin = window.open('', '_blank', 'width=800,height=500,left=200px, top=200px');
        popupWin.document.write('<html><head><title></title>');
        popupWin.document.write('<style type="text/css" media="print"> @page { size: landscape; }  body { writing-mode: tb-rl;}</style>');
        popupWin.document.write('<style>table thead  tr  th, .table  tbody  tr  th, .table  tfoot  tr  th, .table  thead  tr  td, .table  tbody  tr  td, .table  tfoot  tr  td { border-top-color: #000 !important; padding: 2px !important; }</style>');
        popupWin.document.write('<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin/module.admin.stylesheet-complete.min.css" type="text/css" />');
        popupWin.document.write('<style type="text/css">.test { color:red; } </style></head><body>');
        popupWin.document.write('<div><img src="<?php echo base_url(); ?>assets/img/ANEX-LOGO.png" alt="SMART"></div>');

        <?php if ($user_logo[0]->company_logo) {  ?>
            popupWin.document.write('<div><img src="<?php echo base_url(); ?>uploads/company/<?php echo $user_logo[0]->company_logo; ?>" alt="SMART" style="margin-top:-3px; width:30px; height:30px;"> ANEX MANAGEMENT SERVICES LIMITED</div>');
        <?php } else { ?>
            popupWin.document.write('<div><img src="<?php echo base_url(); ?>assets/images/people/80/22.png" style=" margin-top:-3px; width:30px; height:30px;" alt="SMART">  ANEX MANAGEMENT SERVICES LIMITED</div>');
        <?php } ?>
        popupWin.document.write('<div style="margin-top: 15px; margin-bottom: 15px;">&nbsp;</div>');
        popupWin.document.write(divToPrint.innerHTML);
        popupWin.document.write('</body></html>');
        popupWin.document.close();
        popupWin.print();
    }
</script>