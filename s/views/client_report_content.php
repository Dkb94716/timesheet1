 <div style="margin-bottom: 5px; float: right; margin-right:15px; margin-top:24px; cursor: pointer;">

     <?php if($userPrivileges->client_database->client_report->ExportExcel==1){ ?>
     <a href="<?php echo base_url();?>client/download_report_excel" Title="Export to excel"> <img src="<?php echo base_url();?>assets/images/excel_button_logo.png"></a>
     <?php } 
     if($userPrivileges->client_database->client_report->Print==1) { ?>

     <a href="#nogo" Title="Print"> <img src="<?php echo base_url();?>assets/images/print-load.png" onclick="PrintDiv();"> </a>
     <?php } ?>
 </div>
<div class="">
	<h2 class="innerTB" style="padding-left:14px; width:800px;">Client Report</h2>
	<!-- Widget -->
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
					<div class="widget">
						<div class="widget-head">
							<h4 class="heading">View by:</h4>
						</div>
						<div class="widget-body left" style="padding:10px; padding-top:0px; font-size: 11px;">
							<form>
							<div class="radio">
                                                            <input type="radio" name="client_report_by" value="status" checked="checked"><span>Status</span>
							</div>
							<div class="radio"> 
									<input type="radio" name="client_report_by" value="client_type_name"><span>Type</span> 
							</div>
							<div class="radio"> 
									<input type="radio" name="client_report_by" value="date_of_inc"><span>Date of incorporation</span>
							</div>
							<div class="radio">
									<input type="radio" name="client_report_by" value="registration_fees"> <span>Registration fees paid for the current year</span>
							</div>
							<div class="radio"> 
									<input type="radio" name="client_report_by" value="portfolio"><span>Portfolio</span>
							</div>
							<div class="radio">
									<input type="radio" name="client_report_by" value="removal_from_register"><span>Strike off</span> 
							</div>
							<div class="radio"> 
									<input type="radio" name="client_report_by" value="fsc_fees"><span>Fees paid for the year</span>
							</div>
							<div class="radio">
									<input type="radio" name="client_report_by" value="director_name"><span>Name of the directors</span> 
							</div>
							<div class="radio"> 
									<input type="radio" name="client_report_by" value="passport_expiry_date"><span>Passport expiry dates</span>
							</div>
                                                            <div class="radio"> 
									<input type="radio" name="client_report_by" value="name_of_authorised_person"><span>Name of beneficial owner</span>
							</div>
                                                            <div class="radio"> 
									<input type="radio" name="client_report_by" value="country_name"><span>Country</span>
							</div>
                                                            <div class="radio"> 
									<input type="radio" name="client_report_by" value="date_last_review"><span>Date of last review</span>
							</div>
								
							<div class="input-group" style="margin-bottom: 20px; margin-left: 11px; margin-top: 8px;">
                                                            <button type="button" class="btn btn-success pull-right" name="submit" id="filter" style="margin-left: 10px;" onclick="submit_client_report()">Filter</button>
								
								
							</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
					<div class="widget widget-body-white widget-heading-simple">
						<div class="widget-body overflow-x">
                                                   
                                                    <div class="widget-body overflow-x" id="div-to-print">
							<div class="widget-body overflow-x" id="div-to-print" style="color: #e2e1e0;">Use filter to generate report</div>
                                                    </div>
						</div>
					</div>
				</div>	
	<!-- // Widget END -->


	
</div>
<script>
    function submit_client_report() {
       if($("input[name=client_report_by]:checked").length<=0){
           alert('Please select one view.');
           return false;
       }
    var client_report_by = $("input[name=client_report_by]:checked").val();
    var client_report_by_text = $("input[name=client_report_by]:checked").next('span').text();
        var request = $.ajax({
            url: CURRENT_URL + '/client/submit_client_report',
            type: "POST",
            data: {client_report_by:client_report_by,client_report_by_text:client_report_by_text},
            dataType: "html"
        });
        request.done(function (msg) {
            
                $('#div-to-print').html(msg);
           
        });
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    }
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
            popupWin.document.write('<div style="margin-top: 15px; margin-bottom: 15px;">&nbsp;</div>');
            popupWin.document.write(divToPrint.innerHTML);
            popupWin.document.write('</body></html>');
            popupWin.document.close();
            popupWin.print();
        }
    </script>