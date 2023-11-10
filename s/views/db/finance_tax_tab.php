<div class="box-generic" style="padding:0px;box-shadow:none;">
    <div class="tabsbar" style="height:30px;">
        <ul style="height:30px;">

            <li class="camera active" style="height:30px;">
                <a href="#accounts-tab" data-toggle="tab" style="height:24px;line-height:24px;">Accounts</a>
            </li>

            <li class="folder_open" style="height:30px;">
                <a href="#auditors-tab" data-toggle="tab" style="height:24px;line-height:24px;">Auditors</a>
            </li>

            <li class="circle_plus tab-stacked" style="height:30px;">
                <a href="#TAX-TRC-tab" data-toggle="tab" style="height:24px;line-height:24px;">TAX/TRC</a>
            </li>

            <li class="folder_plus tab-stacked" style="height:30px;">
                <a href="#Substance_Conditions_Adopted-tab" data-toggle="tab" style="height:24px;line-height:24px;">Substance Conditions Adopted</a>
            </li>

        </ul>
    </div>
    <div class="tab-content" style="padding-left:11px;padding-right:10px;">
        <div class="tab-pane active" id="accounts-tab">
            <a href="#modal-account" data-toggle="modal" class="btn-xs btn-success pull-right addbtn" style="margin-bottom:5px;">Add More</a>
            <div class="widget-body overflow-x" style="padding:10px 0px;width:100%;" id="account_data_body">
                
            </div>
        </div>

        <!-- START Tab Auditors -->
        <div class="tab-pane" id="auditors-tab">
            <a href="#auditors-modal-box-add" data-toggle="modal" class="btn-xs btn-success pull-right addbtn" style="margin-bottom:5px;">Add More</a>
            <div class="widget-body overflow-x" style="padding:10px 0px;width:100%;" id="auditor_data_body">
                
            </div>
        </div>
        <!---END Tab Auditors--->

        <!---START Tab TAX/TRC--->
        <div class="tab-pane" id="TAX-TRC-tab">
            <a href="#tax-trc-modal-box-add" data-toggle="modal" class="btn-xs btn-success pull-right addbtn" style="margin-bottom:5px;">Add More</a>
            <div class="widget-body overflow-x" style="padding:10px 0px;width:100%;" id="taxtrc_data_body">
                
            </div>
        </div>
        <!---END Tab TAX/TRC--->

        <!---START Substance Conditions Adopted Tab---->
        <div class="tab-pane" id="Substance_Conditions_Adopted-tab">
            <a href="#substance-conditions-adopted-modal-box-add" data-toggle="modal" class="btn-xs btn-success pull-right addbtn" style="margin-bottom:5px;">Add More</a>
            <div class="widget-body overflow-x" style="padding:10px 0px;width:100%;" id="substance_data_body">
                
            </div>
        </div>
        <!---END Substance Conditions Adopted Tab---->
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>        
<script src="<?php echo base_url(); ?>assets/js/db_ready.js"></script>
<script>
    dynamicTable_account = 'dynamicTable1';
    dynamicTable_auditor = 'dynamicTable2';
    dynamicTable_taxtrc = 'dynamicTable3';
    dynamicTable_substance = 'dynamicTable4';
    $(document).ready(function() {
        ready_on_db();
        stuff_on_ready();
        var cur_date=get_current_date();
            $(".stDate").val(cur_date);
            $('.stDate').bdatepicker({
            format: "dd MM yyyy",
            autoclose: true,
        });
        
        $('#add_filed').on('click', function(){
//                var inputToCopy='<div class="removed_div"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">'+$('#addinput :first-child').html()+'</div><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">' +$('#addinput').children().eq(1).html() + '</div></div>';
//                $( inputToCopy ).appendTo($('#addinput'));
//                $("#addinput").children().last().children().eq(0).find("label").append('<a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" onClick="deleteDiv(this)"><i class="fa fa-fw icon-delete-symbol" style="width:10px;color:#fff;font-size:10px;"></i></a>');
            var str = '';
            str+= '<div onclick="removeDivFinance(this)"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">';
                    str+='<label class="client-detailes-sub_heading" style="width:100%;">Financial year:<a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" onclick="deleteDiv(this)"><i class="fa fa-fw icon-delete-symbol" style="width:10px;color:#fff;font-size:10px;"></i></a></label>';
                    str+='<div class="input-group date stDate1 col-sm-12">';
                            str+='<input name="financial_year[]" class="form-control height_25 stDate1_current" type="text">';
                            str+='<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>';
                    str+='</div>';
            str+='</div><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">';
                    str+='<label class="client-detailes-sub_heading" style="width:100%;">Date filed:</label>';
                    str+='<div class="input-group date stDate1 col-sm-12">';
                            str+='<input name="date_filed[]" class="form-control height_25 stDate1_current" type="text">';
                           str+= '<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>';
                    str+='</div>';
            str+='</div></div>';
            
            $('#addinput').append(str);
    
            $('.stDate1').each(function(){
                if($(this).children().eq(0).val()==""){
                    var cur_date=get_current_date();
                        //$(this).children().eq(0).val(cur_date);
                        $(this).bdatepicker({
                        format: "dd MM yyyy",
                        autoclose: true,
                    });
                }
            });
            
            });
            
            $('.addbtn').on('click',function(){
                $('#add-account-form').data('bootstrapValidator').resetForm();
                setTimeout(function(){
                    $('#add-account-form').data('bootstrapValidator').resetForm();
                    $('#add-auditor-form').data('bootstrapValidator').resetForm();
                    $('#add-taxtrc-form').data('bootstrapValidator').resetForm();
                },400);
                
                $('#addinput').children().each(function(i){
                    if(i==0 || i==1){
                    } else {
                        $(this).remove();
                    }
                });
            });

    });
    
    function removeDivFinance(){
//    alert('hi');
    }
    function stuff_on_ready(){
        var core_url=CURRENT_URL;
        // ACCOUNT
        // For load default grid.
        var load_data_body1 = "account_data_body";
        blockUI(load_data_body1);
        var url1 = core_url+"/databaseinfo/get_account_grid_data";
        grid_data(load_data_body1,url1,dynamicTable_account);
        
        var validator =  $('#add-account-form').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
           account_team: {
                        validators: {
                                notEmpty: {
                                        message: 'This field is required'
                                }
                        }
                }

            }
        })
        .on('success.form.bv', function (e) {
            e.preventDefault();
            submit_account_form('add-account-form','add','');   
        });
        
        // AUDITORS
        // For load default grid.
        $('.addbtn').on('click',function(){
            $('#add-account-form').bootstrapValidator('revalidateField', 'account_team');

            setTimeout(function(){
                $('#add-account-form').data('bootstrapValidator').resetForm();
                $("#add-auditor-form").data('bootstrapValidator').resetForm();                 
            },400)
            var cur_date = get_current_date();
            $(".stDate_current").val();
            $('.stDate').bdatepicker({
                format: "dd MM yyyy",
                autoclose: true,
            });
                
//            $("#add-director-individual-form").data('bootstrapValidator').resetForm(); 
        });
        var load_data_body1 = "auditor_data_body";
        blockUI(load_data_body1);
        var url1 = core_url+"/databaseinfo/get_auditor_grid_data";
        grid_data(load_data_body1,url1,dynamicTable_auditor);
        $('.stDate').bdatepicker({
	  format: "dd MM yyyy",
	   autoclose: true
	 }).on('changeDate', function(e) {
		// Revalidate the date field
		//$('#add-auditor-form24').bootstrapValidator('revalidateField', 'appointment_date');
		//$('#add-auditor-form24').bootstrapValidator('revalidateField', 'resignation_date');	
	});
        var validator =  $('#add-auditor-form').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
           auditors: {
                        validators: {
                                notEmpty: {
                                        message: 'This field is required'
                                }
                        }
                },
//                appointment_date: {
//                    validators: {
//                        callback: {
//                            message: 'This field is required',
//                            callback: function (value, validator, $field) {
//                                var input1 = new Date($('#appointment_date').val()).getTime();
//                                var input2 = new Date($('#resignation_date').val()).getTime();
//                                if(input2!=0 || input1!=0){
//                                    if(input1==0){
//                                        return {
//                                            valid: false,
//                                            message: 'This field is required'
//                                        };
//                                    }
//                                    if(input2!=0){
//                                        if (input2 <= input1) {
//                                            return {
//                                            valid: false,
//                                            message: 'Date of appointment should be less than date of resignation'
//                                            };
//                                        } else {
//                                            return true;
//                                        }
//                                    } else {
//                                        return true;
//                                    }
//                                } else {
//                                    return true;
//                                }
//                                
//                            }
//                        }
//                    }
//                },
//                resignation_date: {
//                    validators: {
//                        callback: {
//                            message: 'Date of expiry should be greater than Date of issue',
//                            callback: function (value, validator, $field) {
//                               var input1 = new Date($('#appointment_date').val()).getTime();
//                                var input2 = new Date($('#resignation_date').val()).getTime();
//                                //console.log(input1);
//                                //console.log(input2);
//                                if(input2!=0 || input1!=0){
//
//                                    if(input2==0){
//                                        return {
//                                            valid: false,
//                                            message: 'This field is required'
//                                        };
//                                    }
//                                    if(input1!=0){
//                                        if (input2 <= input1) {
//                                            return {
//                                            valid: false,
//                                            message: 'Date of resignation should be greater than date of appointment'
//                                        };
//                                        } else {
//                                            return true;
//                                        }
//                                    } else {
//                                            return true;
//                                    }
//                                } else {
//                                    return true;
//                                }
//                            }
//                        }
//                    }
//                }
                

            }
        })
        .on('success.form.bv', function (e) {
            e.preventDefault();
            submit_auditor_form('add-auditor-form','add','');   
        });
        
        $(".close,.cancel").click(function() {
            $('.form-group').removeClass('has-error has-feedback');
            $('.form-group').find('small.help-block').hide();
            $('.form-group').find('i.form-control-feedback').hide();
//            $('#addinput').children().each(function(i){
//                if(i==0 || i==1){
//                } else {
//                    $(this).remove();
//                }
//            });
        });
        
        
        // TAX TRC
        // For load default grid.
        var load_data_body1 = "taxtrc_data_body";
        blockUI(load_data_body1);
        var url1 = core_url+"/databaseinfo/get_taxtrc_grid_data";
        grid_data(load_data_body1,url1,dynamicTable_taxtrc);
        
        var validator =  $('#add-taxtrc-form').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
           vat_no: {
                        validators: {
                                notEmpty: {
                                        message: 'This field is required'
                                }
                        }
                }

            }
        })
        .on('success.form.bv', function (e) {
            e.preventDefault();
            submit_taxtrc_form('add-taxtrc-form','add','');   
        });
        
        $(".close,.cancel").click(function() {
            $('.form-group').removeClass('has-error has-feedback');
            $('.form-group').find('small.help-block').hide();
            $('.form-group').find('i.form-control-feedback').hide();
        });
        
        
         
        // SUBSTANCE
        // For load default grid.
        var load_data_body1 = "substance_data_body";
        blockUI(load_data_body1);
        var url1 = core_url+"/databaseinfo/get_substance_grid_data";
        grid_data(load_data_body1,url1,dynamicTable_substance);
        
        var validator =  $('#add-substance-form').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
           office_premises: {
                        validators: {
                                notEmpty: {
                                        message: 'This field is required'
                                }
                        }
                }

            }
        })
        .on('success.form.bv', function (e) {
            e.preventDefault();
            submit_substance_form('add-substance-form','add','');   
        });
        $('.addbtn').on('click',function(){
            $('#add-substance-form').data('bootstrapValidator').resetForm();
        })
        
        $(".close,.cancel").click(function() {
            $('.form-group').removeClass('has-error has-feedback');
            $('.form-group').find('small.help-block').hide();
            $('.form-group').find('i.form-control-feedback').hide();
        });
      }
      
      
    var submit_ajax= true;
    function submit_account_form(form,action,id){
        
        if(submit_ajax==true){
            submit_ajax = false;
            var load_data_body = 'account_data_body';
            var core_url=CURRENT_URL;
            var url = core_url+"/databaseinfo/submit_account_form";
            blockUI(load_data_body);
            submit_form(form,load_data_body,url,action,id,function(data){
                var url = core_url+"/databaseinfo/get_account_grid_data";
                grid_data(load_data_body,url,dynamicTable_account);
                submit_ajax = true;
            });
        }
    }
    
    function edit_account_bar(id){
        blockUI('bank_account_bar');
        var load_data_body = 'account_edit_bar';
        var db_name = 'db_fta_accounts';
        var db_field_id = 'account_id';
        var tag = 'account';
        var view_folder = 'Finance_tax_audit';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/get_item_detail_for_edit";
        edit_box(load_data_body,url,id,db_name,db_field_id,tag,view_folder)
    }
    
    function delete_account_bar(id){
        var load_data_body = 'account_data_body';
        var db_name = 'db_fta_accounts';
        var db_field_id = 'account_id';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/delete_item";
        var title = "Delete Account Information";
        var grid_url = CURRENT_URL+"/databaseinfo/get_account_grid_data";
        var tag = 'Account'
        delete_box(load_data_body,url,id,db_name,db_field_id,title,grid_url,dynamicTable_account,tag)
    }
    
    function submit_auditor_form(form,action,id){
        var load_data_body = 'auditor_data_body';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/submit_auditor_form";
        blockUI(load_data_body);
        submit_form(form,load_data_body,url,action,id,function(data){
            var url = core_url+"/databaseinfo/get_auditor_grid_data";
            grid_data(load_data_body,url,dynamicTable_auditor);
        });
    }
    
    function edit_auditor_bar(id){
        blockUI('auditor_edit_bar');
        var load_data_body = 'auditor_edit_bar';
        var db_name = 'db_fta_auditors';
        var db_field_id = 'auditor_id';
        var tag = 'auditor';
        var view_folder = 'Finance_tax_audit';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/get_item_detail_for_edit";
        edit_box(load_data_body,url,id,db_name,db_field_id,tag,view_folder)
    }
    
    function delete_auditor_bar(id){
        var load_data_body = 'auditor_data_body';
        var db_name = 'db_fta_auditors';
        var db_field_id = 'auditor_id';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/delete_item";
        var title = "Delete Auditor Information";
        var grid_url = CURRENT_URL+"/databaseinfo/get_auditor_grid_data";
        var tag = 'Auditor'
        delete_box(load_data_body,url,id,db_name,db_field_id,title,grid_url,dynamicTable_auditor,tag)
    }
    
    function submit_taxtrc_form(form,action,id){
        var load_data_body = 'taxtrc_data_body';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/submit_taxtrc_form";
        blockUI(load_data_body);
        submit_form(form,load_data_body,url,action,id,function(data){
            var url = core_url+"/databaseinfo/get_taxtrc_grid_data";
            grid_data(load_data_body,url,dynamicTable_taxtrc);
        });
    }
    
    function edit_taxtrc_bar(id){
        blockUI('taxtrc_edit_bar');
        var load_data_body = 'taxtrc_edit_bar';
        var db_name = 'db_fta_taxtrc';
        var db_field_id = 'taxtrc_id';
        var tag = 'taxtrc';
        var view_folder = 'Finance_tax_audit';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/get_item_detail_for_edit";
        edit_box(load_data_body,url,id,db_name,db_field_id,tag,view_folder)
    }
    
    function delete_taxtrc_bar(id){
        var load_data_body = 'taxtrc_data_body';
        var db_name = 'db_fta_taxtrc';
        var db_field_id = 'taxtrc_id';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/delete_item";
        var title = "Delete TAX/TRC Information";
        var grid_url = CURRENT_URL+"/databaseinfo/get_taxtrc_grid_data";
        var tag = 'TAX/TRC'
        delete_box(load_data_body,url,id,db_name,db_field_id,title,grid_url,dynamicTable_taxtrc,tag)
    }
    
    function submit_substance_form(form,action,id){
        var load_data_body = 'substance_data_body';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/submit_substance_form";
        blockUI(load_data_body);
        submit_form(form,load_data_body,url,action,id,function(data){
            var url = core_url+"/databaseinfo/get_substance_grid_data";
            grid_data(load_data_body,url,dynamicTable_substance);
        });
    }
    
    function edit_substance_bar(id){
        blockUI('substance_edit_bar');
        var load_data_body = 'substance_edit_bar';
        var db_name = 'db_fta_substance';
        var db_field_id = 'substance_id';
        var tag = 'substance';
        var view_folder = 'Finance_tax_audit';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/get_item_detail_for_edit";
        edit_box(load_data_body,url,id,db_name,db_field_id,tag,view_folder)
    }
    
    function delete_substance_bar(id){
        var load_data_body = 'substance_data_body';
        var db_name = 'db_fta_substance';
        var db_field_id = 'substance_id';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/delete_item";
        var title = "Delete Substance Conditions Adopted Information";
        var grid_url = CURRENT_URL+"/databaseinfo/get_substance_grid_data";
        var tag = 'Substance Conditions Adopted Info'
        delete_box(load_data_body,url,id,db_name,db_field_id,title,grid_url,dynamicTable_substance,tag)
    }
</script>

<!-- START modal for account add -->
<div class="modal fade"  id="modal-account">
            <div class="modal-dialog modal_box_custome_size">
                <div class="modal-content">
                    <!-- Modal heading -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">New Accounts</h3>
                    </div>
                    <!-- // Modal heading END -->

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="innerLR" style="padding:0;">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url();?>databaseinfo/submit_data" id="add-account-form" enctype="multipart/form-data"  role="form">
								<div class="col-md-6">
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Accounting team</label>
										<input name="account_team" type="text"  class="form-control height_25 plahole_font" style="width: 100%;">
									</div>
									<div class="form-group td-area-form-marg">
										<label class="client-detailes-sub_heading" style="width:100%;">Financial year ending</label>
										<div class="col-md-4" style="padding-left:0px;">
											<select name="financial_year_date" class="form-control height_25 plahole_font">
												<option value="01">01</option>
												<option value="02">02</option>
												<option value="03">03</option>
												<option value="04">04</option>
												<option value="05">05</option>
												<option value="06">06</option>
												<option value="07">07</option>
												<option value="08">08</option>
												<option value="09">09</option>
												<option value="10">10</option>
												<option value="11">11</option>
												<option value="12">12</option>
												<option value="13">13</option>
												<option value="14">14</option>
												<option value="15">15</option>
												<option value="16">16</option>
												<option value="17">17</option>
												<option value="18">18</option>
												<option value="19">19</option>
												<option value="20">20</option>
												<option value="21">21</option>
												<option value="22">22</option>
												<option value="23">23</option>
												<option value="24">24</option>
												<option value="25">25</option>
												<option value="26">26</option>
												<option value="27">27</option>
												<option value="28">28</option>
												<option value="29">29</option>
												<option value="30">30</option>
												<option value="31">31</option>
											</select>
										</div>
										<div class="col-md-8" style="padding-right:0px;">
											<select name="financial_year_month" class="form-control height_25 plahole_font" style="padding-top:2px;padding-bottom:2px;">
												<option value="January">January</option>
												<option value="February">February</option>
												<option value="March">March</option>
												<option value="April">April</option>
												<option value="May">May</option>
												<option value="June">June</option>
												<option value="July">July</option>
												<option value="August">August</option>
												<option value="September">September</option>
												<option value="October">October</option>
												<option value="November">November</option>
												<option value="December">December</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;border-bottom:1px solid #ddd;">
										<label class="client-detailes-sub_heading"><strong>Filling of accounts:</strong></label>
										<a href="#" class="btn-xs btn-success pull-right" id="add_filed" style="width:20px;text-align:right;"><i class="fa fa-plus" style="color:#fff;"></i></a>
									</div>

									<div id="addinput">
										<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
											<label class="client-detailes-sub_heading" style="width:100%;">Financial year:</label>
											<div class="input-group date stDate col-sm-12">
												<input name="financial_year[]" class="form-control height_25 stDate_current" type="text">
												<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
											</div>
										</div>
										<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
											<label class="client-detailes-sub_heading" style="width:100%;">Date filed:</label>
											<div class="input-group date stDate col-sm-12">
												<input name="date_filed[]" class="form-control height_25 stDate_current" type="text">
												<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
											</div>
										</div>
									</div>
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Have the audited financial statements/financial summaries been adopted at AGM?</label>
										<div class="radio pull-left" style="margin-right:30px;">
                                                                                    <input name="adopted_at_agm" type="radio" name="radio"  id="hide_date_of_special" value="1"> 
                                                                                     Yes
										</div>

										<div class="radio pull-left" style="margin-right:30px;"> 
                                                                                    <input name="adopted_at_agm" type="radio" name="radio" checked="checked" id="show_date_of_special" value="0"> 
                                                                                     No
										</div>

									</div>

									<div class="form-group td-area-form-marg" id="date_of_special">
										<label class="client-detailes-sub_heading" style="width:100%;">Date of special meeting for approval of accounts</label>
										<div class="input-group date stDate col-sm-12">
											<input name="special_meeting_on" class="form-control height_25 stDate_current" type="text">
											<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
										</div>
									</div>
								</div>
                                <div class="form-group" style="clear:both;">
                                    <div class="col-sm-offset-2 col-sm-10" style="margin-top:15px;">
                                        <input type="hidden"  name="id" id="accounting_done_by" style="width: 100%;" value="">
                                        <input type="hidden"  name="action"  class="add_action"  style="width: 100%;" value="add">
                                        <button class="btn btn-success pull-right">Save</button>
                                        <a href="#" class="btn btn-primary pull-right cancel" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- // Modal body END -->
                </div>
            </div>
        </div>
<!-- END modal for account add -->

<!-- START modal for account edit -->
<div class="modal fade"  id="modal-account-edit">
            <div class="modal-dialog modal_box_custome_size">
                <div class="modal-content">
                    <!-- Modal heading -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Edit Account</h3>
                    </div>
                    <!-- // Modal heading END -->

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="innerLR" style="padding:0;" id="account_edit_bar">
                            
                        </div>
                    </div>
                    <!-- // Modal body END -->
                </div>
            </div>
        </div>
<!-- END modal for account edit -->

<!---------START Auditors Add more Modal box------>
        <div class="modal fade"  id="auditors-modal-box-add">
            <div class="modal-dialog modal_box_custome_size">
                <div class="modal-content">
                    <!-- Modal heading -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Add Auditors</h3>
                    </div>
                    <!-- // Modal heading END -->

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="innerLR" style="padding:0;">
                            <form class="form-horizontal" action="<?php echo base_url();?>/databaseinfo/submit_data" id="add-auditor-form"  role="form">
								<div class="col-md-6">
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Auditors</label>
										<input name="auditors" type="text" class="form-control height_25 plahole_font" name="accounting_done_by" id="accounting_done_by" style="width: 100%;">
									</div>
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Date of appointment</label>
										<div class="input-group date stDate">
											<input name="appointment_date" id="appointment_date" class="form-control height_25 stDate_current" type="text">
											<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Date of resignation</label>
										<div class="input-group date stDate">
											<input id="resignation_date" name="resignation_date" class="form-control height_25 stDate_current" type="text">
											<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
										</div>
                                                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                                                    <label class="client-detailes-sub_heading" style="width:100%;">Remark</label>
                                                                                    <textarea name="remark" style="width:100%;resize:vertical;"></textarea>
                                                                                </div>
									</div>
								</div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="hidden"  name="id" id="" style="width: 100%;" value="">
                                        <input type="hidden"  name="action"  class="add_action"  style="width: 100%;" value="add">
                                        <button type="submit" class="btn btn-success pull-right">Save</button>
                                        <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- // Modal body END -->
                </div>
            </div>
        </div>
        <!---------END Auditors Add more Modal box-------->

        <!---------START Auditors Edit Modal box------>
        <div class="modal fade"  id="auditors-modal-box-edit">
            <div class="modal-dialog modal_box_custome_size">
                <div class="modal-content">
                    <!-- Modal heading -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Edit Auditors</h3>
                    </div>
                    <!-- // Modal heading END -->

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="innerLR" style="padding:0;" id="auditor_edit_bar">
                            
                        </div>
                    </div>
                    <!-- // Modal body END -->
                </div>
            </div>
        </div>
        <!---------END Auditors Edit Modal box-------->
        
        <!---------START TAX/TRC Add Modal box------>
        <div class="modal fade"  id="tax-trc-modal-box-add">
            <div class="modal-dialog modal_box_custome_size">
                <div class="modal-content">
                    <!-- Modal heading -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Add TAX/TRC</h3>
                    </div>
                    <!-- // Modal heading END -->

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="innerLR" style="padding:0;">
                            <form class="form-horizontal" action="<?php echo base_url();?>/databaseinfo/submit_data" id="add-taxtrc-form"  role="form">
								<div class="col-md-6">
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">VAT No.</label>
										<input name="vat_no" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
									</div>
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">TAN No.</label>
										<input name="tan_no" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
									</div>
								</div>
								<div class="col-md-6">	
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Last tax return filed</label>
										<div class="input-group date stDate col-sm-12">
											<input name="last_tax_returned_on" class="form-control height_25 stDate_current" type="text">
											<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
										</div>
									</div>
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">TRC available ?</label>
										<div class="radio pull-left" style="margin-right:30px;">
												<input type="radio" class="radioYesBtn" name="trc_available" id="show_trc_available" value="1"> 
												 Yes
										</div>

										<div class="radio pull-left"> 
												<input type="radio" class="radioNoBtn" name="trc_available" checked="checked" id="hide_trc_available" value="0"> 
												 No
										</div>
									</div>
									<div id="show_hide_trc_available_div" style="display:none;">
										<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
											<label class="client-detailes-sub_heading" style="width:100%;">TRC number</label>
											<input type="text" class="form-control height_25 plahole_font" name="trc_no" id="accounting_done_by" style="width: 100%;">
										</div>
										<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
											<label class="client-detailes-sub_heading" style="width:100%;">TRC expiry date</label>
											<div class="input-group date stDate col-sm-12">
												<input name="trc_renewal_at" class="form-control height_25 stDate_current" type="text" >
												<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
											</div>
										</div>
										<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
											<label class="client-detailes-sub_heading" style="width:100%;">Treaty countries</label>
											<input type="text" class="form-control height_25 plahole_font" name="treaty_countries" id="accounting_done_by" style="width: 100%;">
										</div>
									</div>
								</div>	
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="hidden"  name="id" id="" style="width: 100%;" value="">
                                        <input type="hidden"  name="action"  class="add_action"  style="width: 100%;" value="add">
                                        <button type="submit" class="btn btn-success pull-right">Save</button>
                                        <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- // Modal body END -->
                </div>
            </div>
        </div>
        <!---------END TAX/TRC Add Modal box-------->

        <!---------START TAX/TRC Add Modal box------>
        <div class="modal fade"  id="tax-trc-modal-box-edit">
            <div class="modal-dialog modal_box_custome_size">
                <div class="modal-content">
                    <!-- Modal heading -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Edit TAX/TRC</h3>
                    </div>
                    <!-- // Modal heading END -->

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="innerLR" style="padding:0;" id="taxtrc_edit_bar">
                            
                        </div>
                    </div>
                    <!-- // Modal body END -->
                </div>
            </div>
        </div>
        <!---------END TAX/TRC Add Modal box-------->

        <!---------START Substance Conditions Adopted Add Modal box------>
        <div class="modal fade"  id="substance-conditions-adopted-modal-box-add">
            <div class="modal-dialog modal_box_custome_size">
                <div class="modal-content">
                    <!-- Modal heading -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Add Substance Conditions Adopted</h3>
                    </div>
                    <!-- // Modal heading END -->

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="innerLR" style="padding:0;">
                            <form class="form-horizontal" action="<?php echo base_url();?>/databaseinfo/submit_data" id="add-substance-form"  role="form">
								<div class="col-md-6">
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Office premises in mauritius</label>
										<div class="radio pull-left" style="margin-right:30px;">
											 
												<input type="radio" name="office_premises" value="1" class="radioYesBtn" name="radio" id="show_address"> 
												Yes
										</div>

										<div class="radio pull-left"> 
											
												<input type="radio" name="office_premises" value="0" class="radioNoBtn" name="radio" id="hide_address" checked="checked"> 
												 No
										</div>
									</div>
									<div class="form-group td-area-form-marg" id="show-hide_address" style="margin-bottom:10px !important;display:none;">
										<label class="client-detailes-sub_heading" style="width:100%;">Address</label>
										<textarea name="office_address" style="width:100%;resize:vertical;"></textarea>
									</div>

									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Employs on a full time basis at administrative/technical level, at least one person who shall be resident in Mauritius</label>
										<div class="radio pull-left" style="margin-right:30px;">
											 
												<input type="radio" name="employee_full_time" value="1" class="radioYesBtn" name="employs_on"> 
												  Yes
											 
										</div>

										<div class="radio pull-left"> 
											
												<input type="radio" name="employee_full_time" value="0" class="radioNoBtn" name="employs_on" checked="checked"> 
												 No
											 
										</div>
									</div>

									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Adopted arbitration clause in the constitution</label>
										<div class="radio pull-left" style="margin-right:30px;">
											
												<input type="radio" name="adopted_arbitration" value="1" class="radioYesBtn" name="adopted_arbitration" id="show_adopted_arbitration"> 
												Yes
											</label> 
										</div>

										<div class="radio pull-left"> 
											
												<input type="radio" name="adopted_arbitration" value="0" class="radioNoBtn" name="adopted_arbitration" id="hide_adopted_arbitration" checked="checked"> 
												 No
											 
										</div>
									</div>
									<div id="show_hide_adopted_arbitration_div" style="display:none;">
										<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
											<label class="client-detailes-sub_heading" style="width:100%;">Has the constitution been amended?</label>
											<input type="text" name="has_the_constitution" class="form-control height_25 plahole_font"  id="accounting_done_by" style="width: 100%;">
										</div>
										<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
											<label class="client-detailes-sub_heading" style="width:100%;">Date relevant filing done with ROC</label>
											<div class="input-group date stDate col-sm-12">
												<input name="date_relevant" class="form-control height_25 stDate_current" type="text">
												<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">	
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Holds or is expected to hold within the next 12 months, assets (excluding cash held in bank account or shares/interests in another corporation holding a Global Business Licence) which are worth at least USD 100, 000 in Mauritius  </label>
										<div class="radio pull-left" style="margin-right:30px;">
 												<input type="radio" class="radioYesBtn" name="is_expected" value="1"> 
												 Yes
 										</div>

										<div class="radio pull-left"> 
											
												<input type="radio" class="radioNoBtn" name="is_expected" value="0" checked="checked"> 
												 No
											  
										</div>
									</div>
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Shares are listed on a securities exchange licensed by the FSC</label>
										<div class="radio pull-left" style="margin-right:30px;">
											
												<input type="radio" class="radioYesBtn" name="shares_are" value="1" id="show_share_are_listed"> 
												Yes
											</label> 
										</div>

										<div class="radio pull-left"> 
											
												<input type="radio" class="radioNoBtn" name="shares_are" value="0" id="hide_share_are_listed" checked="checked"> 
												 No
											 
										</div>
									</div>

									<div class="form-group td-area-form-marg" id="show_hide_shares_are_listed" style="margin-bottom:10px !important;display:none;">
										<label class="client-detailes-sub_heading" style="width:100%;">Name of securities exchange</label>
										<input type="text" class="form-control height_25 plahole_font" name="security_exchange" id="accounting_done_by" style="width: 100%;">
									</div>

									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Has yearly expenditure in mauritius which can be reasonably expected from any similar corporation which is controlled and managed from mauritius</label>
										<div class="radio pull-left" style="margin-right:30px;">
											
												<input type="radio" class="radioYesBtn" name="has_yearly_expenditure" value="1"> 
												Yes
											</label> 
										</div>

										<div class="radio pull-left"> 
											
												<input type="radio" class="radioNoBtn" name="has_yearly_expenditure" value="0" checked="checked"> 
												 No
											 
										</div>
									</div>
								</div>	


                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="hidden"  name="id" id="" style="width: 100%;" value="">
                                        <input type="hidden"  name="action"  class="add_action"  style="width: 100%;" value="add">
                                        <button type="submit" class="btn btn-success pull-right">Save</button>
                                        <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- // Modal body END -->
                </div>
            </div>
        </div>
        <!---------END Substance Conditions Adopted Add Modal box-------->

        <!---------START Substance Conditions Adopted Edit Modal box------>
        <div class="modal fade"  id="substance-conditions-adopted-modal-box-edit">
            <div class="modal-dialog modal_box_custome_size">
                <div class="modal-content">
                    <!-- Modal heading -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Edit Substance Conditions Adopted</h3>
                    </div>
                    <!-- // Modal heading END -->

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="innerLR" style="padding:0;" id="substance_edit_bar">
                            
                        </div>
                    </div>
                    <!-- // Modal body END -->
                </div>
            </div>
        </div>
        <!---------END Substance Conditions Adopted Edit Modal box-------->

