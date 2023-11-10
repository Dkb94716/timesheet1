<div class="tab-pane active" id="client-tab">
		<div class="row">
			<form class="form-horizontal margin-none" role="form" id="add_client_info">
				<input type="hidden" name="client_id" value="<?php echo $client_id;?>" >
				<div class="col-md-6">
					<div>
						<label class="col-sm-11 inputtext_heading"><strong>Company Reference</strong></label>
						<div class="form-group">
							<div class="col-sm-11">
								<input type="text" class="form-control height_25 plahole_font" name="company_reference" id="company_reference">
							</div>
						</div>
					</div>
					<div style="margin-top:20px;">
						<label class="col-sm-11 inputtext_heading"><strong>Information on Client</strong></label>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">Name of client</label>
							<div class="col-sm-11">
								<input type="text" class="form-control height_25 plahole_font" name="client_name" id="client_name" value="<?php echo $client_detail[0]->client_name;?>" readonly="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">Status</label>
							<div class="col-sm-11">
                                                            <input type="radio" class="pull-left" name="status" value="Active" checked>
									<span class="radio-text_formatting pull-left">&nbsp;Active</span>
								<input type="radio" class="pull-left" name="status" value="Inactive" style="margin-left: 10px;">
								<span class="radio-text_formatting pull-left">&nbsp;Inactive</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">Type</label>
							<div class="col-sm-11">
								<select class="form-control height_25 plahole_font" name="client_type_id" id="client_type_id" style="padding-top: 0px;">
									<option value="">-- Select Type --</option>
									<?php  foreach ($client_type_detail as $client_type) { 
									?>
										<option value="<?php echo $client_type->client_type_id;?>"><?php echo $client_type->client_type_name;?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
                                                <div class="form-group" id="foreign_type_country">
							<label class="col-sm-8 control-label inputtext_formating blue">Country</label>
							<div class="col-sm-11">
								<select class="form-control input_area plahole_font height_25" name="foreign_country" id="foreign_country" style="width:100%; padding-top: 0px;">
									<option value="">-- select one --</option>                
									<?php  foreach ($country_detail as $country) { 
									?>
										<option value="<?php echo $country->country_id;?>"><?php echo $country->country_name;?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">Date of incorporation</label>
							<div class="col-sm-6">
								<div class="input-group date datepicker2" style="width:100%;">
									<input class="form-control height_25" type="text" name="date_of_inc" id="date_of_inc"/>
									<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">File number</label>
							<div class="col-sm-11">
								<input type="text" class="form-control height_25 plahole_font" name="file_no" id="file_no">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">Portfolio</label>
							<div class="col-sm-11">
								<input type="text" class="form-control height_25 plahole_font" name="portfolio" id="portfolio">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">Group Company?</label>
							<div class="col-sm-11">
                                                            <input type="radio" class="pull-left" name="group" id="group_btn-yes" value="Yes" checked >
								<span class="radio-text_formatting pull-left">&nbsp;Yes</span>
								<input type="radio" class="pull-left" name="group" value="No" style="margin-left:10px;" id="group_btn-no">
								<span class="radio-text_formatting pull-left">&nbsp;No</span>
							</div>
						</div>
						<div class="form-group" id="group_hidden-filed">
							<label class="col-sm-8 control-label inputtext_formating blue">Name of the group</label>
							<div class="col-sm-11">
								<input type="text" class="form-control height_25 plahole_font" name="group_name" id="group_name">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">Conversion or transfer registration</label>
							<div class="col-sm-11">
                                                            <input type="radio" class="pull-left" name="conversion_or_transfer_registration" id="conversion-radio_btn-yes" value="Yes" checked>
									<span class="radio-text_formatting pull-left">&nbsp;Yes</span>
									<input type="radio" class="pull-left" name="conversion_or_transfer_registration" style="margin-left: 10px;" id="conversion-radio_btn-no" value="No">
								<span class="radio-text_formatting pull-left">&nbsp;No</span>
							</div>
						</div>
                                               
						<div class="form-group" id="conversion-hidden_filed">
                                                    <label class="col-sm-8 control-label inputtext_formating blue">Date of conversion or transfer</label>
							<div class="col-sm-6">
								<div class="input-group date datepicker2" style="width:100%;">
									<input class="form-control height_25 plahole_font" type="text" name="conversion_or_transfer_registration_description" id="conversion_or_transfer_registration_description"/>
									<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
								</div>
							</div>
                                                    <label class="col-sm-8 control-label inputtext_formating  blue">Converted from/to</label>
                                                    <div class="col-sm-5">
								<select class="form-control height_25 plahole_font" name="converted_from_to" id="converted_from_to" style="padding-top: 0px;">
									<option value="">-- Select --</option>
                                                                        <option value="From">From</option>
                                                                        <option value="To">To</option>
									
								</select>
							</div>
							
							<div class="col-sm-5">
								<select class="form-control height_25 plahole_font" name="converted_from_to_client_type_id" id="converted_from_to_client_type_id" style="padding-top: 0px;">
									<option value="">-- Select Type --</option>
									<?php  foreach ($client_type_detail as $client_type) { 
									?>
										<option value="<?php echo $client_type->client_type_id;?>"><?php echo $client_type->client_type_name;?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">Transfer from another management company?</label>
							<div class="col-sm-11">
								<input type="radio" class="pull-left" name="transfer_from_another_mc" id="trsf-anotr-radio_btn-yes" value="Yes" checked>
									<span class="radio-text_formatting pull-left">&nbsp;Yes</span>
								<input type="radio" class="pull-left" name="transfer_from_another_mc" style="margin-left: 10px;" id="trsf-anotr-radio_btn-no" value="No">
								<span class="radio-text_formatting pull-left">&nbsp;No</span>
							</div>
						</div>
                                                
						<div class="form-group" id="trsf-anotr-hidden_filed-cal">
                                                    <label class="col-sm-8 control-label inputtext_formating blue">Date of transfer</label>
							<div class="col-sm-6">
								<div class="input-group date datepicker2" style="width:100%;">
									<input class="form-control height_25" type="text" name="transfer_from_another_mc_description" id="transfer_from_another_mc_description"/>
									<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
								</div>
							</div>
                                                    <label class="col-sm-8 control-label inputtext_formating blue">Name of the management company from where the company is transferred </label>
							<div class="col-sm-11">
								<input type="text" class="form-control height_25 plahole_font" name="management_company_name" id="management_company_name">
							</div>
						</div>
                                                
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">Previous name (if any)</label>
							<div class="col-sm-11">
								<input type="text" class="form-control height_25 plahole_font" name="previous_name" id="previous_name">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">Date of change of name</label>
							<div class="col-sm-6">
                                                        <div class="input-group date datepicker2" >
									<input class="form-control height_25 plahole_font" type="text" name="date_change_of_name" id="date_change_of_name"/>
									<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
								</div>
                                                            </div>
						</div>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">Strike off/Wind up/Removal from register</label>
							<div class="col-sm-11">
							   <input type="text" class="form-control height_25 plahole_font" name="removal_from_register" id="removal_from_register">
							</div>
						</div>
					</div>
					<div style="margin-bottom:0px;">
						<label class="col-sm-11 inputtext_heading"><strong>Address</strong></label>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">Registered office of the company</label>
							<div class="col-sm-11">
								<textarea type="text" class="form-control height_25 plahole_font" name="registered_office" id="registered_office" style="resize: vertical;"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">Business address of the company (if any)</label>
							<div class="col-sm-11">
								<textarea type="text" class="form-control height_25 plahole_font" name="business_address" id="business_address" style="resize: vertical;"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">File location</label>
							<div class="col-sm-11">
								<input type="text" class="form-control height_25 plahole_font" name="file_location" id="file_location">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">Archives reference number</label>
							<div class="col-sm-11">
								<input type="text" class="form-control height_25 plahole_font" name="archives_ref_no" id="archives_ref_no">
							</div>
						</div>
					</div>
				</div>
				
				
				
				<div class="col-md-6">
					
					<div style="margin-bottom:0px;">
						<label class="col-sm-11 inputtext_heading"><strong>Licences/Fees/TRC</strong></label>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">GBL License number</label>
							<div class="col-sm-11">
								<input type="text" class="form-control height_25 plahole_font" name="gbl_license_no" id="gbl_license_no">
							</div>
						</div>
                                                <div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">Date of issue of Global Business License</label>
							<div class="col-sm-6">
							   <div class="input-group date datepicker2" style="width:100%;">
									<input class="form-control height_25 plahole_font" type="text" name="gbl_license_issue_date" id="gbl_license_issue_date"/>
									<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">Registration fees paid for the current year</label>
							<div class="col-sm-11">
								<input type="radio" class="pull-left" name="registration_fees" id="reg-fees_btn-yes" value="Yes">
								<span class="radio-text_formatting pull-left">&nbsp;Yes</span>
								<input type="radio" class="pull-left" name="registration_fees" value="No" style="margin-left:10px;" id="reg-fees_btn-no" checked>
								<span class="radio-text_formatting pull-left">&nbsp;No</span>
							</div>
						</div>
						<div class="form-group" id="reg-fees_hidden-filed">
                                                    <label class="col-sm-8 control-label inputtext_formating blue">Reason for not paying</label>
							<div class="col-sm-11">
								<input type="text" placeholder="Specify reason for not paying" class="form-control height_25 plahole_font" name="registration_fees_description" id="registration_fees_description">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">FSC fees paid for the current year</label>
							<div class="col-sm-11">
								<input type="radio" class="pull-left" name="fsc_fees" id="fsc_fee-paid_btn-yes" value="Yes">
								<span class="radio-text_formatting pull-left">&nbsp;Yes</span>
								<input type="radio" class="pull-left" name="fsc_fees" style="margin-left:10px;" id="fsc_fee-paid_btn-no" value="No" checked>
								<span class="radio-text_formatting pull-left">&nbsp;No</span>
							</div>
						</div>
						<div class="form-group" id="fsc_fee-paid_hidden-filed">
                                                    <label class="col-sm-8 control-label inputtext_formating blue">Reason for not paying</label>
							<div class="col-sm-11">
								<input type="text" placeholder="Specify reason for not paying" class="form-control height_25 plahole_font" name="fsc_fees_description" id="fsc_fees_description">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">Business registration number</label>
							<div class="col-sm-11">
								<input type="text" class="form-control height_25 plahole_font" name="business_registration_no" id="business_registration_no">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">Freeport licence</label>
							<div class="col-sm-11">
								<input type="text" class="form-control height_25 plahole_font" name="freeport_licence" id="freeport_licence">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">VAT number</label>
							<div class="col-sm-11">
								<input type="text" class="form-control height_25 plahole_font" name="vat_no" id="vat_no">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">TAN number</label>
							<div class="col-sm-11">
								<input type="text" class="form-control height_25 plahole_font" name="tan_no" id="tan_no">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">TRC</label>
							<div class="col-sm-11">
								<input type="radio" class="pull-left" name="trc" id="yes_raido" value="Yes" checked>
								<span class="radio-text_formatting pull-left">&nbsp;Yes</span>
								<input type="radio" class="pull-left" name="trc" id="no_raido" value="No" style="margin-left:10px;">
								<span class="radio-text_formatting pull-left">&nbsp;No</span>
							</div>
						</div>
						<div class="form-group" id="renewal_date-paid_hidden-filed">
							<label class="col-sm-8 control-label inputtext_formating blue">TRC renewal date</label>
							<div class="col-sm-6">
							   <div class="input-group date datepicker2" style="width:100%;">
									<input class="form-control height_25 plahole_font" type="text" name="renewal_date" id="renewal_date"/>
									<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
								</div>
							</div>
						</div>
					</div>
					<div style="margin-bottom:0px;">
						<label class="col-sm-11 inputtext_heading"><strong>Introducer</strong></label>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">Introduced by</label>
							<div class="col-sm-11">
								<textarea type="text" class="form-control plahole_font" name="introduced_by_period" id="introduced_by_period" style="resize: vertical;"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">Place of work of the introducer</label>
							<div class="col-sm-11">
								<input type="text" class="form-control height_25 plahole_font" name="place_of_work_of_the_introducer" id="place_of_work_of_the_introducer">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">Country of the introducer</label>
							<div class="col-sm-11">
								<select class="form-control input_area plahole_font height_25" name="country_id" id="country_id" style="width:100%; padding-top: 0px;">
									<option value="">-- select one --</option>                
									<?php  foreach ($country_detail as $country) { 
									?>
										<option value="<?php echo $country->country_id;?>"><?php echo $country->country_name;?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">Email of the introducer</label>
							<div class="col-sm-11">
								<input type="text" class="form-control height_25 plahole_font" name="email_of_the_introducer" id="email_of_the_introducer">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">Phone number of the introducer</label>
							<div class="col-sm-11">
								<input type="text" class="form-control height_25 plahole_font" name="phone_number_of_the_introducer" id="phone_number_of_the_introducer">
							</div>
						</div>
					</div>
					<div style="margin-bottom:0px;">
						<label class="col-sm-11 inputtext_heading"><strong>Activity</strong></label>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">Business activity of the company (if any)</label>
							<div class="col-sm-11">
							   <input type="text" class="form-control height_25 plahole_font" name="business_activity" id="business_activity" style="margin-bottom:10px;">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-8 control-label inputtext_formating">Are the activities in line with business plan?</label>
							<div class="col-sm-11">
								<input type="radio" class="pull-left" name="activities_in_line_with_business_plan" id="actv-busn_palan_btn-yes" value="Yes" checked>
								<span class="radio-text_formatting pull-left">&nbsp;Yes</span>
								<input type="radio" class="pull-left" name="activities_in_line_with_business_plan" style="margin-left:10px;" id="actv-busn_palan_btn-no" value="No">
								<span class="radio-text_formatting pull-left">&nbsp;No</span>
							</div>
						</div>
						<div class="form-group" id="actv-busn_palan-hidden-filed" style="display:none;">
                                                    <label class="col-sm-8 control-label inputtext_formating blue">More information</label>
						<div class="col-sm-11">
							<textarea type="text" class="form-control plahole_font" name="activities_in_line_with_business_plan_description" id="activities_in_line_with_business_plan_description" style="resize: vertical; height:75px;"></textarea>
						</div>
							
						</div>
					</div>
					
				</div>
				<div id="submit_btn" class="col-md-12" style="padding-right:6%;margin-bottom: 20px;">
					<input class="btn btn-success pull-right" type="submit" value="Submit">
				</div>
			</form>    
		</div>
	</div>

<script>
    $(document).ready(function () {
        <?php 
        if ($userPrivileges->client_database->client->Edit != 1) { ?>
        $("#add_client_info :input").attr("disabled","disabled");
        $('#submit_btn').html('');
        <?php } ?>
            $('#foreign_type_country').hide();
            $('#client_type_id').on('change', function() {
            if($('#client_type_id option:selected').text()=='Foreign'){
            $('#foreign_type_country').show();
        }
        else{
            $('#foreign_type_country').hide();
        }
        });
        $('input[name="group"]').on('click', function() {
        if ($(this).val() == 'Yes') {
            $("#group_hidden-filed").show();
        }
        else {
            $("#group_hidden-filed").hide();
            $('#group_name').val('');
        }
    });
    $('input[name="conversion_or_transfer_registration"]').on('click', function() {
        if ($(this).val() == 'Yes') {
            $("#conversion-hidden_filed").show();
        }
        else {
            $("#conversion-hidden_filed").hide();
            $('#conversion_or_transfer_registration_description').val('');
        }
    });
     $('input[name="transfer_from_another_mc"]').on('click', function() {
        if ($(this).val() == 'Yes') {
            $("#trsf-anotr-hidden_filed-cal").show();
        }
        else {
            $("#trsf-anotr-hidden_filed-cal").hide();
            $('#transfer_from_another_mc_description').val('');
        }
    });
    
    $('input[name="registration_fees"]').on('click', function() {
        if ($(this).val() == 'No') {
            $("#reg-fees_hidden-filed").show();
        }
        else {
            $("#reg-fees_hidden-filed").hide();
            $('#registration_fees_description').val('');
        }
    });
    $('input[name="fsc_fees"]').on('click', function() {
        if ($(this).val() == 'No') {
            $("#fsc_fee-paid_hidden-filed").show();
        }
        else {
            $("#fsc_fee-paid_hidden-filed").hide();
            $('#fsc_fees_description').val('');
        }
    });
    
     $('input[name="trc"]').on('click', function() {
        if ($(this).val() == 'Yes') {
            $("#renewal_date-paid_hidden-filed").show();
        }
        else {
            $("#renewal_date-paid_hidden-filed").hide();
            $('#renewal_date').val('');
        }
    });
     $('input[name="activities_in_line_with_business_plan"]').on('click', function() {
        if ($(this).val() == 'No') {
            $("#actv-busn_palan-hidden-filed").show();
        }
        else {
            $("#actv-busn_palan-hidden-filed").hide();
            $('#activities_in_line_with_business_plan_description').val('');
        }
    });
    $('input[name="agm_yes_no"]').on('click', function() {
        if ($(this).val() == 'Yes') {
            $("#last-agm_hidden-filed").show();
        }
        else {
            $("#last-agm_hidden-filed").hide();
            $('#agm_held').val('');
        }
    });
        
         $('.datepicker2').bdatepicker({
		format: "dd MM yyyy",
		 autoclose: true
	});
         
       
        $('#add_client_info').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                
                client_type_id: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                country_id: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                phone_number_of_the_introducer: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                        integer: {
                        message: 'The value is not an integer'
                    }
                    }
                },
                email_of_the_introducer: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                        emailAddress: {
                        message: 'The value is not a valid email address'
                    }
                    }
                } 
            }
        })
                .on('success.form.bv', function (e) {
                    e.preventDefault();
            $('.btn-success').attr("disabled", "disabled");
                    var data = $( "#add_client_info" ).serialize();


                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/client/submit_add_client_info',
                        dataType: "json",
                        data: data,
                        beforeSend: function ()
                        {
                            $("#addloader").show();
                        },
                        success: function (data) {
                            
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {
                                    window.stop();
                                   window_location();
                                }
                                else
                                {
                                    
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


       
    });
    function window_location(){
        <!--
                            window.location="<?php echo site_url('client/client_detail/'.$client_id);?>?tab_id=<?php echo $tab_id;?>";
                        //-->
    }

</script>