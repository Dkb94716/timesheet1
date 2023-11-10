<?php
$date = date('Y-m-d');
$date_of_establishment = ($detail[0]['date_of_establishment'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['date_of_establishment'])) : "";
$date_of_incorp = ($detail[0]['date_of_incorp'] == "0000-00-00 00:00:00") ? "" : date('d F Y', strtotime($detail[0]['date_of_incorp']));
$member_register_date = ($detail[0]['member_register_date'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['member_register_date'])) : "";
$director_register_date = ($detail[0]['director_register_date'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['director_register_date'])) : "";
$date_of_finantial_year_end = ($detail[0]['date_of_finantial_year_end'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['date_of_finantial_year_end'])) : "";
$date_of_issue = ($detail[0]['date_of_issue'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['date_of_issue'])) : "";
$date_of_expiry = ($detail[0]['date_of_expiry'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['date_of_expiry'])) : "";
$address_proof_date = ($detail[0]['address_proof_date'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['address_proof_date'])) : "";
$recieved_date = ($detail[0]['recieved_date'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['recieved_date'])) : "";
$date_n = ($detail[0]['date_n'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['date_n'])) : date('d F Y', strtotime($date));
$address_proof_date_n = ($detail[0]['address_proof_date_n'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['address_proof_date_n'])) : "";
$date = ($detail[0]['date'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['date'])) : "";


$is_other_than_anex_yes = ($detail[0]['is_other_than_anex'] == "1") ? 'checked=checked' : '';
$is_other_than_anex_no = ($detail[0]['is_other_than_anex'] == "0") ? 'checked=checked' : '';
$trusts_individual_are_there_show_hide_div_edit = ($detail[0]['is_other_than_anex'] == 1) ? 'block' : 'none';

$is_trust_deed_yes = ($detail[0]['is_trust_deed'] == "1") ? 'checked=checked' : '';
$is_trust_deed_no = ($detail[0]['is_trust_deed'] == "0") ? 'checked=checked' : '';

$is_global_business_license_yes = ($detail[0]['is_global_business_license'] == "1") ? 'checked=checked' : '';
$is_global_business_license_no = ($detail[0]['is_global_business_license'] == "0") ? 'checked=checked' : '';
$is_global_business_license_na = ($detail[0]['is_global_business_license'] == "2") ? 'checked=checked' : '';

$is_letter_of_wishes_yes = ($detail[0]['is_letter_of_wishes'] == "1") ? 'checked=checked' : '';
$is_letter_of_wishes_no = ($detail[0]['is_letter_of_wishes'] == "0") ? 'checked=checked' : '';
$trusts_individual_letter_of_wishes_show_hide_div_edit = ($detail[0]['is_letter_of_wishes'] == 1) ? 'block' : 'none';

$is_non_residence_yes = ($detail[0]['is_non_residence'] == "1") ? 'checked=checked' : '';
$is_non_residence_no = ($detail[0]['is_non_residence'] == "0") ? 'checked=checked' : '';

$is_trust_tax_residence_yes = ($detail[0]['is_trust_tax_residence'] == "1") ? 'checked=checked' : '';
$is_trust_tax_residence_no = ($detail[0]['is_trust_tax_residence'] == "0") ? 'checked=checked' : '';
$trusts_individual_is_the_tax_show_hide_div_edit = ($detail[0]['is_trust_tax_residence'] == 1) ? 'block' : 'none';

$is_account_prepared_yes = ($detail[0]['is_account_prepared'] == "1") ? 'checked=checked' : '';
$is_account_prepared_no = ($detail[0]['is_account_prepared'] == "0") ? 'checked=checked' : '';
$trusts_individual_are_accounts_show_div_edit = ($detail[0]['is_letter_of_wishes'] == 1) ? 'block' : 'none';

$is_settlor_individual_yes = ($detail[0]['is_settlor_individual'] == "1") ? 'checked=checked' : '';
$is_settlor_individual_no = ($detail[0]['is_settlor_individual'] == "0") ? 'checked=checked' : '';
$trusts_individual_settlor_show_hide_div_edit = ($detail[0]['is_settlor_individual'] == 1) ? 'block' : 'none';
$trusts_corporate_settlor_show_hide_div_edit = ($detail[0]['is_settlor_individual'] == 0) ? 'block' : 'none';

$is_passport_yes = ($detail[0]['is_passport'] == "1") ? 'checked=checked' : '';
$is_passport_no = ($detail[0]['is_passport'] == "0") ? 'checked=checked' : '';
$shareholder_passport_2_show_hide_div_edit = ($detail[0]['is_passport'] == "1") ? 'block' : 'none';

$has_cv_yes = ($detail[0]['has_cv'] == 1) ? 'checked=checked' : '';
$has_cv_no = ($detail[0]['has_cv'] == 0) ? 'checked=checked' : '';
$shareholder_cv_show_hide_div_edit = ($detail[0]['has_cv'] == 1) ? 'block' : 'none';

$is_bank_ref_yes = ($detail[0]['is_bank_ref'] == 1) ? 'checked=checked' : '';
$is_bank_ref_no = ($detail[0]['is_bank_ref'] == 0) ? 'checked=checked' : '';
$shareholder_bank_reference_show_hide_div_edit = ($detail[0]['is_bank_ref'] == 1) ? 'block' : 'none';

$has_address_proof_yes = ($detail[0]['has_address_proof'] == 1) ? 'checked=checked' : '';
$has_address_proof_no = ($detail[0]['has_address_proof'] == 0) ? 'checked=checked' : '';
$shareholder_proof_add_show_hide_div_edit = ($detail[0]['has_address_proof'] == 1) ? 'block' : 'none';

$is_member_register_yes = ($detail[0]['is_member_register'] == "1") ? 'checked=checked' : '';
$is_member_register_no = ($detail[0]['is_member_register'] == "0") ? 'checked=checked' : '';
$show_hide_shareholder_dt_reg_meb_btn = ($detail[0]['is_member_register'] == "1") ? 'block' : 'none';

$is_director_register_yes = ($detail[0]['is_director_register'] == "1") ? 'checked=checked' : '';
$is_director_register_no = ($detail[0]['is_director_register'] == "0") ? 'checked=checked' : '';
$register_of_directors_show_hide_div_edit = ($detail[0]['is_director_register'] == "1") ? 'block' : 'none';

$is_corporate_profile_yes = ($detail[0]['is_corporate_profile'] == "1") ? 'checked=checked' : '';
$is_corporate_profile_no = ($detail[0]['is_corporate_profile'] == "0") ? 'checked=checked' : '';

$is_audited_account_yes = ($detail[0]['is_audited_account'] == "1") ? 'checked=checked' : '';
$is_audited_account_no = ($detail[0]['is_audited_account'] == "0") ? 'checked=checked' : '';
$shareholder_audited_accounts_show_hide_div_edit = ($detail[0]['is_audited_account'] == "1") ? 'block' : 'none';

$is_bank_ref_n_yes = ($detail[0]['is_bank_ref_n'] == "1") ? 'checked=checked' : '';
$is_bank_ref_n_no = ($detail[0]['is_bank_ref_n'] == "0") ? 'checked=checked' : '';
$shareholder_bank_reference_2_show_hide_div_edit = ($detail[0]['is_bank_ref_n'] == "1") ? 'block' : 'none';

$has_address_proof_n_yes = ($detail[0]['has_address_proof_n'] == "1") ? 'checked=checked' : '';
$has_address_proof_n_no = ($detail[0]['has_address_proof_n'] == "0") ? 'checked=checked' : '';
$shareholder_proof_add_2_show_hide_div_edit = ($detail[0]['has_address_proof_n'] == "1") ? 'block' : 'none';
?>

<script src="<?php echo base_url(); ?>assets/js/db_ready.js"></script>
<script>
    dynamicTable_trust_trustinfo = 'dynamicTable1';
    dynamicTable_bo_corporate = 'dynamicTable2';
    $(document).ready(function() {
        ready_on_db();
        stuff_on_ready();
        var cur_date = get_current_date();
//        $(".stDate").val(cur_date);
        $('.stDate').bdatepicker({
            format: "dd MM yyyy",
            autoclose: true,
        });
        /*********START trusts_individual-settlor_show_hide_div_edit yes no radio button**********/
        $("#trusts_individual-settlor_show_div_edit").click(function() {
            $("#trusts_individual-settlor_show_hide_div_edit").slideDown();
            $("#trusts_corporate-settlor_show_hide_div_edit").slideUp(); //Add Code on 24-09-2015
        });
        $("#trusts_individual-settlor_hide_div_edit").click(function() {
            $("#trusts_individual-settlor_show_hide_div_edit").slideUp();
            $("#trusts_corporate-settlor_show_hide_div_edit").slideDown();  //Add Code on 24-09-2015
        });
        /***********END trusts_individual-settlor_show_hide_div_edit yes no radio button**********/



        $("#shareholder-passport-2_show_div_edit").click(function() {
            $("#shareholder-passport-2_show_hide_div_edit").slideDown();
        });
        $("#shareholder-passport-2_hide_div_edit").click(function() {
            $("#shareholder-passport-2_show_hide_div_edit").slideUp();
        });

        $("#shareholder-cv_show_div_edit").click(function() {
            $("#shareholder-cv_show_hide_div_edit").slideDown();
        });
        $("#shareholder-cv_hide_div_edit").click(function() {
            $("#shareholder-cv_show_hide_div_edit").slideUp();
        });
        /***********END shareholder-cv_show_hide_div_edit yes no radio button**********/

        /*********START  shareholder-bank-reference_show_hide_div_edit yes no radio button**********/
        $("#shareholder-bank-reference_show_div_edit").click(function() {
            $("#shareholder-bank-reference_show_hide_div_edit").slideDown();
        });
        $("#shareholder-bank-reference_hide_div_edit").click(function() {
            $("#shareholder-bank-reference_show_hide_div_edit").slideUp();
        });
        /***********END  shareholder-bank-reference_show_hide_div_edit yes no radio button**********/

        /*********START shareholder-proof_add_show_hide_div_edit yes no radio button**********/
        $("#shareholder-proof_add_show_div_edit").click(function() {
            $("#shareholder-proof_add_show_hide_div_edit").slideDown();
        });
        $("#shareholder-proof_add_hide_div_edit").click(function() {
            $("#shareholder-proof_add_show_hide_div_edit").slideUp();
        });
        /***********END shareholder-proof_add_show_hide_div_edit yes no radio button**********/

        $("#show_shareholder_dt_reg-meb_btn_edit").click(function() {
            $("#show-hide_shareholder_dt_reg-meb_btn_edit").slideDown();
        });

        $("#hide_shareholder_dt_reg-meb_btn_edit").click(function() {
            $("#show-hide_shareholder_dt_reg-meb_btn_edit").slideUp();
        });

        /*********START shareholder-audited-accounts_show_hide_div_edit yes no radio button**********/
        $("#shareholder-audited-accounts_show_div_edit").click(function() {
            $("#shareholder-audited-accounts_show_hide_div_edit").slideDown();
        });
        $("#shareholder-audited-accounts_hide_div_edit").click(function() {
            $("#shareholder-audited-accounts_show_hide_div_edit").slideUp();
        });
        /***********END shareholder-audited-accounts_show_hide_div_edit yes no radio button**********/

        $("#shareholder-bank-reference-2_show_div_edit").click(function() {
            $("#shareholder-bank-reference-2_show_hide_div_edit").slideDown();
        });
        $("#shareholder-bank-reference-2_hide_div_edit").click(function() {
            $("#shareholder-bank-reference-2_show_hide_div_edit").slideUp();
        });

        /*********START shareholder-proof_add-2_show_hide_div_edit yes no radio button**********/
        $("#shareholder-proof_add-2_show_div_edit").click(function() {
            $("#shareholder-proof_add-2_show_hide_div_edit").slideDown();
        });
        $("#shareholder-proof_add-2_hide_div_edit").click(function() {
            $("#shareholder-proof_add-2_show_hide_div_edit").slideUp();
        });

        /*********START trusts_individual-are-there_show_hide_div yes no radio button**********/
        $("#trusts_individual-are-there_show_div_edit").click(function() {
            $("#trusts_individual-are-there_show_hide_div_edit").slideDown();
        });
        $("#trusts_individual-are-there_hide_div_edit").click(function() {
            $("#trusts_individual-are-there_show_hide_div_edit").slideUp();
        });
        /***********END trusts_individual-are-there_show_hide_div yes no radio button**********/
        /*********START trusts_individual-letter_of_wishes_show_div yes no radio button**********/
        $("#trusts_individual-letter_of_wishes_show_div_edit").click(function() {
            $("#trusts_individual-letter_of_wishes_show_hide_div_edit").slideDown();
        });
        $("#trusts_individual-letter_of_wishes_hide_div_edit").click(function() {
            $("#trusts_individual-letter_of_wishes_show_hide_div_edit").slideUp();
        });

        /*********START trusts_individual-is_the_tax_show_hide_div yes no radio button**********/
        $("#trusts_individual-is_the_tax_show_div_edit").click(function() {
            $("#trusts_individual-is_the_tax_show_hide_div_edit").slideDown();
        });
        $("#trusts_individual-is_the_tax_hide_div_edit").click(function() {
            $("#trusts_individual-is_the_tax_show_hide_div_edit").slideUp();
        });
        /***********END trusts_individual-is_the_tax_show_hide_div yes no radio button**********/
        /*********START trusts_individual-are_accounts_show_hide_div yes no radio button**********/
        $("#trusts_individual-are_accounts_show_div_edit").click(function() {
            $("#trusts_individual-are_accounts_show_hide_div_edit").slideDown();
        });
        $("#trusts_individual-are_accounts_hide_div_edit").click(function() {
            $("#trusts_individual-are_accounts_show_hide_div_edit").slideUp();
        });
        /***********END trusts_individual-are_accounts_show_hide_div yes no radio button**********/
        /*********START register_of_directors_show_hide_div yes no radio button**********/
        $("#register_of_directors_show_div_edit").click(function() {
            $("#register_of_directors_show_hide_div_edit").slideDown();
        });
        $("#register_of_directors_hide_div_edit").click(function() {
            $("#register_of_directors_show_hide_div_edit").slideUp();
        });
        /***********END register_of_directors_show_hide_div yes no radio button**********/
        var trust_type = '<?php echo $detail[0]['trust_type']; ?>';
        $('#trust_type').children().each(function() {
            if ($(this).attr('value') == trust_type) {
                $(this).attr('selected', 'selected')
            }
        });

        var finantial_year_date = '<?php echo $detail[0]['finantial_year_date']; ?>';
        $('#finantial_year_date').children().each(function() {
            if ($(this).attr('value') == finantial_year_date) {
                $(this).attr('selected', 'selected')
            }
        });

        var finantial_year_month = '<?php echo $detail[0]['finantial_year_month']; ?>';
        $('#finantial_year_month').children().each(function() {
            if ($(this).attr('value') == finantial_year_month) {
                $(this).attr('selected', 'selected')
            }
        });

        var country_of_issue = '<?php echo $detail[0]['country_of_issue']; ?>';
        $('#country_of_issue').children().each(function() {
            if ($(this).attr('value') == country_of_issue) {
                $(this).attr('selected', 'selected')
            }
        });

        var country = '<?php echo $detail[0]['country']; ?>';
        $('#country').children().each(function() {
            if ($(this).attr('value') == country) {
                $(this).attr('selected', 'selected')
            }
        });

        var country_n = '<?php echo $detail[0]['country_n']; ?>';
        $('#country_n').children().each(function() {
            if ($(this).attr('value') == country_n) {
                $(this).attr('selected', 'selected')
            }
        });



        $('.radioYesBtn').val('1');
        $('.radioNoBtn').val('0');
        $('.radioNaBtn').val('2');
    });
    function stuff_on_ready() {
        
        var core_url = CURRENT_URL;
        $('.stDate').bdatepicker({
	  format: "dd MM yyyy",
	   autoclose: true
	 }).on('changeDate', function(e) {
		// Revalidate the date field
		$('#edit-trust-trustinfo-form24').bootstrapValidator('revalidateField', 'date_of_issue');
		$('#edit-trust-trustinfo-form24').bootstrapValidator('revalidateField', 'date_of_expiry');	
	});        
        var validator = $('#edit-trust-trustinfo-form').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                name_of_trust: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                date_of_issue: {
                    validators: {
                        callback: {
                            message: 'This field is required',
                            callback: function (value, validator, $field) {
                                var input1 = new Date($('#date_of_issue_edit').val()).getTime();
                                var input2 = new Date($('#date_of_expiry_edit').val()).getTime();
                                if(input2!=0 || input1!=0){
                                    if(input1==0){
                                        return {
                                            valid: false,
                                            message: 'This field is required'
                                        };
                                    }
                                    if(input2!=0){
                                        if (input2 <= input1) {
                                            return {
                                            valid: false,
                                            message: 'Date of issue should be less than date of expiry'
                                            };
                                        } else {
                                            return true;
                                        }
                                    } else {
                                        return true;
                                    }
                                } else {
                                    return true;
                                }
                                
                            }
                        }
                    }
                },
                date_of_expiry: {
                    validators: {
                        callback: {
                            message: 'Date of expiry should be greater than date of issue',
                            callback: function (value, validator, $field) {
                               var input1 = new Date($('#date_of_issue_edit').val()).getTime();
                                var input2 = new Date($('#date_of_expiry_edit').val()).getTime();
                                //console.log(input1);
                                //console.log(input2);
                                if(input2!=0 || input1!=0){

                                    if(input2==0){
                                        return {
                                            valid: false,
                                            message: 'This field is required'
                                        };
                                    }
                                    if(input1!=0){
                                        if (input2 <= input1) {
                                            return {
                                            valid: false,
                                            message: 'Date of expiry should be greater than date of issue'
                                        };
                                        } else {
                                            return true;
                                        }
                                    } else {
                                            return true;
                                    }
                                } else {
                                    return true;
                                }
                            }
                        }
                    }
                }
                //

            }
        })
        .on('success.form.bv', function(e) {
            e.preventDefault();
            submit_trust_trustinfo_form('edit-trust-trustinfo-form', 'edit', '<?php echo $detail[0]['trustinfo_id'] ?>');
        });
    }

</script>

<form class="form-horizontal" action="<?php echo base_url(); ?>/databaseinfo/submit_data" id="edit-trust-trustinfo-form"  role="form">
    <div class="col-md-6">

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Name of trust</label>
            <input name="name_of_trust" type="text" value="<?php echo $detail[0]['name_of_trust'] ?>" class="form-control height_25 plahole_font" style="width: 100%;">
        </div>
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Type of trust</label>
            <select name="trust_type" id="trust_type" class="form-control input_area plahole_font height_25" style="width:100%; padding-top: 0px;">
                <option value="">-- select one --</option>
                <option value="1">Charitable</option>
                <option value="2">Discretionary</option>
                <option value="3">Non-discretionary</option>
                <option value="5">Other</option>
                <option value="4">Purpose Trust</option>

            </select>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Are there trustees other than anex?</label>

            <div class="radio pull-left" style="margin-right:30px;">
                <label class="radio-custom-none">
                    <input type="radio" class="radioYesBtn" <?php echo $is_other_than_anex_yes; ?> name="is_other_than_anex" id="trusts_individual-are-there_show_div_edit"> 
                    Yes
                </label> 
            </div>

            <div class="radio pull-left" style="margin-right:30px;"> 
                <label class="radio-custom-none"> 
                    <input type="radio" class="radioNoBtn" <?php echo $is_other_than_anex_no; ?> name="is_other_than_anex" id="trusts_individual-are-there_hide_div_edit" > 
                    No
                </label> 
            </div>

        </div>

        <div class="form-group td-area-form-marg" id="trusts_individual-are-there_show_hide_div_edit" style="margin-bottom:10px !important;display:<?php echo $trusts_individual_are_there_show_hide_div_edit; ?>;">
            <label class="client-detailes-sub_heading" style="width:100%;">Name</label>
            <input name="name" type="text" value="<?php echo $detail[0]['name'] ?>" class="form-control height_25 plahole_font" style="width: 100%;">
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Date of establishment of trust</label>
            <div class="input-group date stDate col-sm-12">
                <input name="date_of_establishment" class="form-control height_25" type="text" value="<?php echo $date_of_establishment; ?>">
                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
            </div>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Trust Deed available</label>

            <div class="radio pull-left" style="margin-right:30px;">
                <label class="radio-custom-none">
                    <input type="radio" class="radioYesBtn" <?php echo $is_trust_deed_yes; ?> name="is_trust_deed"> 
                    Yes
                </label> 
            </div>

            <div class="radio pull-left" style="margin-right:30px;"> 
                <label class="radio-custom-none"> 
                    <input type="radio" class="radioNoBtn" <?php echo $is_trust_deed_no; ?> name="is_trust_deed" > 
                    No
                </label> 
            </div>

        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Does the trust hold a global business licence?</label>

            <div class="radio pull-left" style="margin-right:30px;">
                <label class="radio-custom-none">
                    <input type="radio" class="radioYesBtn" <?php echo $is_global_business_license_yes; ?> name="is_global_business_license"> 
                    Yes
                </label> 
            </div>

            <div class="radio pull-left" style="margin-right:30px;"> 
                <label class="radio-custom-none"> 
                    <input type="radio" class="radioNoBtn" <?php echo $is_global_business_license_no; ?> name="is_global_business_license" > 
                    No
                </label> 
            </div>
            <div class="radio pull-left" style="margin-right:30px;">
                <label class="radio-custom-none">
                    <input type="radio" class="radioNaBtn" <?php echo $is_global_business_license_na; ?>  name="is_global_business_license"> 
                    NA
                </label> 
            </div>

        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Letter of wishes available for non-discretionary trust</label>
            <div class="radio pull-left" style="margin-right:30px;">
                <label class="radio-custom-none">
                    <input type="radio" class="radioYesBtn" <?php echo $is_letter_of_wishes_yes; ?> name="is_letter_of_wishes" id="trusts_individual-letter_of_wishes_show_div_edit"> 
                    Yes
                </label> 
            </div>

            <div class="radio pull-left" style="margin-right:30px;"> 
                <label class="radio-custom-none"> 
                    <input type="radio" class="radioNoBtn" <?php echo $is_letter_of_wishes_no; ?> name="is_letter_of_wishes" id="trusts_individual-letter_of_wishes_hide_div_edit" > 
                    No
                </label> 
            </div>
        </div>

        <div id="trusts_individual-letter_of_wishes_show_hide_div_edit" style="display:<?php echo $trusts_individual_letter_of_wishes_show_hide_div_edit; ?>;">
            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">From</label>
                <input name="from" type="text" value="<?php echo $detail[0]['from'] ?>" class="form-control height_25 plahole_font" style="width: 100%;">
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Details</label>
                <textarea name="detail" style="width:100%;resize:vertical;"><?php echo $detail[0]['detail'] ?></textarea>
            </div>

        </div>
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Declaration of non-residence available</label>
            <div class="radio pull-left" style="margin-right:30px;">
                <label class="radio-custom-none">
                    <input type="radio" class="radioYesBtn" <?php echo $is_non_residence_yes; ?> name="is_non_residence"> 
                    Yes
                </label> 
            </div>

            <div class="radio pull-left" style="margin-right:30px;"> 
                <label class="radio-custom-none"> 
                    <input type="radio" class="radioNoBtn" <?php echo $is_non_residence_no; ?> name="is_non_residence" > 
                    No
                </label> 
            </div>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Is the trust tax resident?</label>
            <div class="radio pull-left" style="margin-right:30px;">
                <label class="radio-custom-none">
                    <input type="radio" class="radioYesBtn" <?php echo $is_trust_tax_residence_yes; ?> name="is_trust_tax_residence" id="trusts_individual-is_the_tax_show_div_edit"> 
                    Yes
                </label> 
            </div>

            <div class="radio pull-left" style="margin-right:30px;"> 
                <label class="radio-custom-none"> 
                    <input type="radio" class="radioNoBtn" <?php echo $is_trust_tax_residence_no; ?> name="is_trust_tax_residence" id="trusts_individual-is_the_tax_hide_div_edit" > 
                    No
                </label> 
            </div>
        </div>

        <div class="form-group td-area-form-marg" id="trusts_individual-is_the_tax_show_hide_div_edit" style="margin-bottom:10px !important;display:<?php echo $trusts_individual_is_the_tax_show_hide_div_edit; ?>;">
            <label class="client-detailes-sub_heading" style="width:100%;">TAN No.</label>
            <input name="tan_no" type="text" value="<?php echo $detail[0]['tan_no'] ?>" class="form-control height_25 plahole_font" style="width: 100%;">
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Are accounts prepared?</label>
            <div class="radio pull-left" style="margin-right:30px;">
                <label class="radio-custom-none">
                    <input type="radio" class="radioYesBtn" <?php echo $is_account_prepared_yes; ?> name="is_account_prepared" id="trusts_individual-are_accounts_show_div_edit"> 
                    Yes
                </label> 
            </div>

            <div class="radio pull-left" style="margin-right:30px;"> 
                <label class="radio-custom-none"> 
                    <input type="radio" class="radioNoBtn" <?php echo $is_account_prepared_no; ?> name="is_account_prepared" id="trusts_individual-are_accounts_hide_div_edit" > 
                    No
                </label> 
            </div>
        </div>
        <div class="form-group td-area-form-marg" id="trusts_individual-are_accounts_show_hide_div_edit" style="margin-bottom:10px !important;display:<?php echo $trusts_individual_are_accounts_show_div_edit; ?>;">
            <label class="client-detailes-sub_heading" style="width:100%;">Finacial year end</label>
            <div class="col-md-4" style="padding-left:0px;">
                <select name="finantial_year_date" id="finantial_year_date" class="form-control height_25 plahole_font">
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
                <select name="finantial_year_month" id="finantial_year_month" class="form-control height_25 plahole_font" style="padding-top:2px;padding-bottom:2px;">
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;border-bottom:1px solid #ddd;">
            <label class="client-detailes-sub_heading" style="margin-bottom:0px;"><strong>KYC on settlors</strong></label>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Settlor – individual</label>
            <div class="radio pull-left" style="margin-right:30px;">
                <label class="radio-custom-none">
                    <input type="radio" class="radioYesBtn" <?php echo $is_settlor_individual_yes; ?> name="is_settlor_individual" id="trusts_individual-settlor_show_div_edit"> 
                    Yes
                </label> 
            </div>

            <div class="radio pull-left" style="margin-right:30px;"> 
                <label class="radio-custom-none"> 
                    <input type="radio" class="radioNoBtn" <?php echo $is_settlor_individual_no; ?> name="is_settlor_individual" id="trusts_individual-settlor_hide_div_edit" > 
                    No
                </label> 
            </div>
        </div>

        <div id="trusts_individual-settlor_show_hide_div_edit" style="display:<?php echo $trusts_individual_settlor_show_hide_div_edit; ?>;">
            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Name of settlor</label>
                <input name="name_of_settlor" type="text" value="<?php echo $detail[0]['name_of_settlor'] ?>" class="form-control height_25 plahole_font" style="width: 100%;">
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Passport</label>
                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $is_passport_yes; ?> name="is_passport" id="shareholder-passport-2_show_div_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $is_passport_no; ?> name="is_passport" id="shareholder-passport-2_hide_div_edit" > 
                        No
                    </label> 
                </div>
            </div>

            <div id="shareholder-passport-2_show_hide_div_edit" style="display:<?php echo $shareholder_passport_2_show_hide_div_edit; ?>;">
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Passport number</label>
                    <input name="passport_no" type="text" value="<?php echo $detail[0]['passport_no'] ?>" class="form-control height_25 plahole_font" style="width: 100%;">
                </div>
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Country of issue</label>
                    <select name="country_of_issue" id="country_of_issue" class="form-control plahole_font" style="width: 100%;">
                        <option value="AF">Afghanistan</option>
                        <option value="AX">Åland Islands</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                        <option value="AS">American Samoa</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AQ">Antarctica</option>
                        <option value="AG">Antigua and Barbuda</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaijan</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrain</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BY">Belarus</option>
                        <option value="BE">Belgium</option>
                        <option value="BZ">Belize</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermuda</option>
                        <option value="BT">Bhutan</option>
                        <option value="BO">Bolivia, Plurinational State of</option>
                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                        <option value="BA">Bosnia and Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BV">Bouvet Island</option>
                        <option value="BR">Brazil</option>
                        <option value="IO">British Indian Ocean Territory</option>
                        <option value="BN">Brunei Darussalam</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="KH">Cambodia</option>
                        <option value="CM">Cameroon</option>
                        <option value="CA">Canada</option>
                        <option value="CV">Cape Verde</option>
                        <option value="KY">Cayman Islands</option>
                        <option value="CF">Central African Republic</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CX">Christmas Island</option>
                        <option value="CC">Cocos (Keeling) Islands</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comoros</option>
                        <option value="CG">Congo</option>
                        <option value="CD">Congo, the Democratic Republic of the</option>
                        <option value="CK">Cook Islands</option>
                        <option value="CR">Costa Rica</option>
                        <option value="CI">Côte d'Ivoire</option>
                        <option value="HR">Croatia</option>
                        <option value="CU">Cuba</option>
                        <option value="CW">Curaçao</option>
                        <option value="CY">Cyprus</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="DK">Denmark</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egypt</option>
                        <option value="SV">El Salvador</option>
                        <option value="GQ">Equatorial Guinea</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FK">Falkland Islands (Malvinas)</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="TF">French Southern Territories</option>
                        <option value="GA">Gabon</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GG">Guernsey</option>
                        <option value="GN">Guinea</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="GY">Guyana</option>
                        <option value="HT">Haiti</option>
                        <option value="HM">Heard Island and McDonald Islands</option>
                        <option value="VA">Holy See (Vatican City State)</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IR">Iran, Islamic Republic of</option>
                        <option value="IQ">Iraq</option>
                        <option value="IE">Ireland</option>
                        <option value="IM">Isle of Man</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JE">Jersey</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="KP">Korea, Democratic People's Republic of</option>
                        <option value="KR">Korea, Republic of</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Lao People's Democratic Republic</option>
                        <option value="LV">Latvia</option>
                        <option value="LB">Lebanon</option>
                        <option value="LS">Lesotho</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libya</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MO">Macao</option>
                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                        <option value="MG">Madagascar</option>
                        <option value="MW">Malawi</option>
                        <option value="MY">Malaysia</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>has_
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="FM">Micronesia, Federated States of</option>
                        <option value="MD">Moldova, Republic of</option>
                        <option value="MC">Monaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="ME">Montenegro</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="MM">Myanmar</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NL">Netherlands</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="MP">Northern Mariana Islands</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PK">Pakistan</option>
                        <option value="PW">Palau</option>
                        <option value="PS">Palestinian Territory, Occupied</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua New Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PN">Pitcairn</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="RE">Réunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russian Federation</option>
                        <option value="RW">Rwanda</option>
                        <option value="BL">Saint Barthélemy</option>
                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                        <option value="KN">Saint Kitts and Nevis</option>
                        <option value="LC">Saint Lucia</option>
                        <option value="MF">Saint Martin (French part)</option>
                        <option value="PM">Saint Pierre and Miquelon</option>
                        <option value="VC">Saint Vincent and the Grenadines</option>
                        <option value="WS">Samoa</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">Sao Tome and Principe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                        <option value="RS">Serbia</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leone</option>
                        <option value="SG">Singapore</option>
                        <option value="SX">Sint Maarten (Dutch part)</option>
                        <option value="SK">Slovakia</option>
                        <option value="SI">Slovenia</option>
                        <option value="SB">Solomon Islands</option>
                        <option value="SO">Somalia</option>
                        <option value="ZA">South Africa</option>
                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                        <option value="SS">South Sudan</option>
                        <option value="ES">Spain</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="SD">Sudan</option>
                        <option value="SR">Suriname</option>
                        <option value="SJ">Svalbard and Jan Mayen</option>
                        <option value="SZ">Swaziland</option>
                        <option value="SE">Sweden</option>
                        <option value="CH">Switzerland</option>
                        <option value="SY">Syrian Arab Republic</option>
                        <option value="TW">Taiwan, Province of China</option>
                        <option value="TJ">Tajikistan</option>
                        <option value="TZ">Tanzania, United Republic of</option>
                        <option value="TH">Thailand</option>
                        <option value="TL">Timor-Leste</option>
                        <option value="TG">Togo</option>
                        <option value="TK">Tokelau</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad and Tobago</option>
                        <option value="TN">Tunisia</option>
                        <option value="TR">Turkey</option>
                        <option value="TM">Turkmenistan</option>
                        <option value="TC">Turks and Caicos Islands</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UG">Uganda</option>
                        <option value="UA">Ukraine</option>
                        <option value="AE">United Arab Emirates</option>
                        <option value="GB">United Kingdom</option>
                        <option value="US">United States</option>
                        <option value="UM">United States Minor Outlying Islands</option>
                        <option value="UY">Uruguay</option>
                        <option value="UZ">Uzbekistan</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                        <option value="VN">Viet Nam</option>
                        <option value="VG">Virgin Islands, British</option>
                        <option value="VI">Virgin Islands, U.S.</option>
                        <option value="WF">Wallis and Futuna</option>
                        <option value="EH">Western Sahara</option>
                        <option value="YE">Yemen</option>
                        <option value="ZM">Zambia</option>
                        <option value="ZW">Zimbabwe</option>
                    </select>
                </div>

                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Date of issue</label>

                    <div class="input-group date stDate">
                        <input id="date_of_issue_edit" name="date_of_issue" class="form-control height_25" type="text" value="<?php echo $date_of_issue; ?>">
                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                    </div>
                </div>

                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Date of expiry</label>

                    <div class="input-group date stDate">
                        <input id="date_of_expiry_edit" name="date_of_expiry" class="form-control height_25" type="text" value="<?php echo $date_of_expiry; ?>">
                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">CV</label>

                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $has_cv_yes; ?> name="has_cv" id="shareholder-cv_show_div_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $has_cv_no; ?> name="has_cv" id="shareholder-cv_hide_div_edit" > 
                        No
                    </label> 
                </div>
            </div>

            <div class="form-group td-area-form-marg" id="shareholder-cv_show_hide_div_edit" style="margin-bottom:10px !important;display:<?php echo $shareholder_cv_show_hide_div_edit; ?>;">
                <label class="client-detailes-sub_heading" style="width:100%;">Date received</label>

                <div class="input-group date stDate col-sm-12">
                    <input name="recieved_date" class="form-control height_25" type="text" value="<?php echo $recieved_date; ?>">
                    <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                </div>
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Bank reference</label>

                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $is_bank_ref_yes; ?> name="is_bank_ref" id="shareholder-bank-reference_show_div_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $is_bank_ref_no; ?> name="is_bank_ref" id="shareholder-bank-reference_hide_div_edit" > 
                        No
                    </label> 
                </div>
            </div>

            <div id="shareholder-bank-reference_show_hide_div_edit" style="display:<?php echo $shareholder_bank_reference_show_hide_div_edit; ?>;">
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Bank</label>
                    <input name="bank_name" type="text" value="<?php echo $detail[0]['bank_name']; ?>" class="form-control height_25 plahole_font" style="width: 100%;">
                </div>
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Date</label>

                    <div class="input-group date stDate col-sm-12">
                        <input name="date" class="form-control height_25" type="text" value="<?php echo $date; ?>">
                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Proof of address</label>

                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $has_address_proof_yes; ?> name="has_address_proof" id="shareholder-proof_add_show_div_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $has_address_proof_no; ?> name="has_address_proof" id="shareholder-proof_add_hide_div_edit" > 
                        No
                    </label> 
                </div>

            </div>

            <div id="shareholder-proof_add_show_hide_div_edit" style="display:<?php echo $shareholder_proof_add_show_hide_div_edit; ?>;">
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                    <textarea name="address" style="width:100%;resize:vertical;"><?php echo $detail[0]['address']; ?></textarea>
                </div>
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Country</label>
                    <select name="country" id="country" class="form-control plahole_font" style="width: 100%;">
                        <option value="AF">Afghanistan</option>
                        <option value="AX">Åland Islands</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                        <option value="AS">American Samoa</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AQ">Antarctica</option>
                        <option value="AG">Antigua and Barbuda</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaijan</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrain</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BY">Belarus</option>
                        <option value="BE">Belgium</option>
                        <option value="BZ">Belize</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermuda</option>
                        <option value="BT">Bhutan</option>
                        <option value="BO">Bolivia, Plurinational State of</option>
                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                        <option value="BA">Bosnia and Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BV">Bouvet Island</option>
                        <option value="BR">Brazil</option>
                        <option value="IO">British Indian Ocean Territory</option>
                        <option value="BN">Brunei Darussalam</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="KH">Cambodia</option>
                        <option value="CM">Cameroon</option>
                        <option value="CA">Canada</option>
                        <option value="CV">Cape Verde</option>
                        <option value="KY">Cayman Islands</option>
                        <option value="CF">Central African Republic</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CX">Christmas Island</option>
                        <option value="CC">Cocos (Keeling) Islands</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comoros</option>
                        <option value="CG">Congo</option>
                        <option value="CD">Congo, the Democratic Republic of the</option>
                        <option value="CK">Cook Islands</option>
                        <option value="CR">Costa Rica</option>
                        <option value="CI">Côte d'Ivoire</option>
                        <option value="HR">Croatia</option>
                        <option value="CU">Cuba</option>
                        <option value="CW">Curaçao</option>
                        <option value="CY">Cyprus</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="DK">Denmark</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egypt</option>
                        <option value="SV">El Salvador</option>
                        <option value="GQ">Equatorial Guinea</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FK">Falkland Islands (Malvinas)</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="TF">French Southern Territories</option>
                        <option value="GA">Gabon</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GG">Guernsey</option>
                        <option value="GN">Guinea</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="GY">Guyana</option>
                        <option value="HT">Haiti</option>
                        <option value="HM">Heard Island and McDonald Islands</option>
                        <option value="VA">Holy See (Vatican City State)</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IR">Iran, Islamic Republic of</option>
                        <option value="IQ">Iraq</option>
                        <option value="IE">Ireland</option>
                        <option value="IM">Isle of Man</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JE">Jersey</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="KP">Korea, Democratic People's Republic of</option>
                        <option value="KR">Korea, Republic of</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Lao People's Democratic Republic</option>
                        <option value="LV">Latvia</option>
                        <option value="LB">Lebanon</option>
                        <option value="LS">Lesotho</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libya</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MO">Macao</option>
                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                        <option value="MG">Madagascar</option>
                        <option value="MW">Malawi</option>
                        <option value="MY">Malaysia</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="FM">Micronesia, Federated States of</option>
                        <option value="MD">Moldova, Republic of</option>
                        <option value="MC">Monaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="ME">Montenegro</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="MM">Myanmar</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NL">Netherlands</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="MP">Northern Mariana Islands</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PK">Pakistan</option>
                        <option value="PW">Palau</option>
                        <option value="PS">Palestinian Territory, Occupied</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua New Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PN">Pitcairn</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="RE">Réunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russian Federation</option>
                        <option value="RW">Rwanda</option>
                        <option value="BL">Saint Barthélemy</option>
                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                        <option value="KN">Saint Kitts and Nevis</option>
                        <option value="LC">Saint Lucia</option>
                        <option value="MF">Saint Martin (French part)</option>
                        <option value="PM">Saint Pierre and Miquelon</option>
                        <option value="VC">Saint Vincent and the Grenadines</option>
                        <option value="WS">Samoa</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">Sao Tome and Principe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                        <option value="RS">Serbia</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leone</option>
                        <option value="SG">Singapore</option>
                        <option value="SX">Sint Maarten (Dutch part)</option>
                        <option value="SK">Slovakia</option>
                        <option value="SI">Slovenia</option>
                        <option value="SB">Solomon Islands</option>
                        <option value="SO">Somalia</option>
                        <option value="ZA">South Africa</option>
                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                        <option value="SS">South Sudan</option>
                        <option value="ES">Spain</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="SD">Sudan</option>
                        <option value="SR">Suriname</option>
                        <option value="SJ">Svalbard and Jan Mayen</option>
                        <option value="SZ">Swaziland</option>
                        <option value="SE">Sweden</option>
                        <option value="CH">Switzerland</option>
                        <option value="SY">Syrian Arab Republic</option>
                        <option value="TW">Taiwan, Province of China</option>
                        <option value="TJ">Tajikistan</option>
                        <option value="TZ">Tanzania, United Republic of</option>
                        <option value="TH">Thailand</option>
                        <option value="TL">Timor-Leste</option>
                        <option value="TG">Togo</option>
                        <option value="TK">Tokelau</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad and Tobago</option>
                        <option value="TN">Tunisia</option>
                        <option value="TR">Turkey</option>
                        <option value="TM">Turkmenistan</option>
                        <option value="TC">Turks and Caicos Islands</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UG">Uganda</option>
                        <option value="UA">Ukraine</option>
                        <option value="AE">United Arab Emirates</option>
                        <option value="GB">United Kingdom</option>
                        <option value="US">United States</option>
                        <option value="UM">United States Minor Outlying Islands</option>
                        <option value="UY">Uruguay</option>
                        <option value="UZ">Uzbekistan</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                        <option value="VN">Viet Nam</option>
                        <option value="VG">Virgin Islands, British</option>
                        <option value="VI">Virgin Islands, U.S.</option>
                        <option value="WF">Wallis and Futuna</option>
                        <option value="EH">Western Sahara</option>
                        <option value="YE">Yemen</option>
                        <option value="ZM">Zambia</option>
                        <option value="ZW">Zimbabwe</option>
                    </select>
                </div>
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Date</label>
                    <div class="input-group date stDate col-sm-12">
                        <input name="address_proof_date" class="form-control height_25" type="text" value="<?php echo $address_proof_date ?>">
                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                    </div>
                </div>

            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Other</label>
                <textarea name="other_detail" style="width:100%;resize:vertical;"><?php echo $detail[0]['other_detail'] ?></textarea>
            </div>

        </div>

        <div id="trusts_corporate-settlor_show_hide_div_edit" style="display:<?php echo $trusts_corporate_settlor_show_hide_div_edit; ?>;">

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Name of company</label>
                <input name="name_of_company" type="text" value="<?php echo $detail[0]['name_of_company'] ?>" class="form-control height_25 plahole_font" style="width: 100%;">
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Represented by</label>
                <input name="represented_by" type="text" value="<?php echo $detail[0]['represented_by'] ?>" class="form-control height_25 plahole_font" style="width: 100%;">
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Date of incorporation</label>
                <div class="input-group date stDate col-sm-12">
                    <input name="date_of_incorp" class="form-control height_25" type="text" value="<?php echo $date_of_incorp; ?>">
                    <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                </div>
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Registered in</label>
                <input name="registered_in" type="text" value="<?php echo $detail[0]['registered_in'] ?>" class="form-control height_25 plahole_font" style="width: 100%;">
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Register of members</label>
                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $is_member_register_yes; ?> name="is_member_register" id="show_shareholder_dt_reg-meb_btn_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $is_member_register_no; ?> name="is_member_register" id="hide_shareholder_dt_reg-meb_btn_edit" > 
                        No
                    </label> 
                </div>
            </div>
            <div class="form-group td-area-form-marg" id="show-hide_shareholder_dt_reg-meb_btn_edit" style="margin-bottom:10px !important;display:<?php echo $show_hide_shareholder_dt_reg_meb_btn; ?>">
                <label class="client-detailes-sub_heading" style="width:100%;">Date of member of directors</label>
                <div class="input-group date stDate col-sm-12" style="margin-bottom:10px !important;">
                    <input name="member_register_date" class="form-control height_25" type="text" value="<?php echo $member_register_date; ?>">
                    <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                </div>
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Register of directors</label>

                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $is_director_register_yes; ?> name="is_director_register" id="register_of_directors_show_div_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $is_director_register_no; ?> name="is_director_register" id="register_of_directors_hide_div_edit" > 
                        No
                    </label> 
                </div>
            </div>

            <div class="form-group td-area-form-marg" id="register_of_directors_show_hide_div_edit" style="margin-bottom:10px !important;display:<?php echo $register_of_directors_show_hide_div_edit; ?>;">
                <label class="client-detailes-sub_heading" style="width:100%;">Date of register of directors</label>
                <div class="input-group date stDate col-sm-12">
                    <input name="director_register_date" class="form-control height_25" type="text" value="<?php echo $director_register_date ?>">
                    <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                </div>
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Corporate profile</label>

                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $is_corporate_profile_yes; ?> name="is_corporate_profile"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $is_corporate_profile_no; ?> name="is_corporate_profile" > 
                        No
                    </label> 
                </div>

            </div>


            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Audited accounts</label>
                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $is_audited_account_yes; ?> name="is_audited_account" id="shareholder-audited-accounts_show_div_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $is_audited_account_no; ?> name="is_audited_account" id="shareholder-audited-accounts_hide_div_edit" > 
                        No
                    </label> 
                </div>
            </div>

            <div id="shareholder-audited-accounts_show_hide_div_edit" style="display:<?php echo $shareholder_audited_accounts_show_hide_div_edit; ?>;">
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Date of financial year end</label>
                    <div class="input-group date stDate col-sm-12">
                        <input name="date_of_finantial_year_end" class="form-control height_25" type="text" value="<?php echo $date_of_finantial_year_end ?>">
                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                    </div>
                </div>
            </div>


            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Bank reference</label>
                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $is_bank_ref_n_yes; ?> name="is_bank_ref_n" id="shareholder-bank-reference-2_show_div_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $is_bank_ref_n_no; ?> name="is_bank_ref_n" id="shareholder-bank-reference-2_hide_div_edit" > 
                        No
                    </label> 
                </div>
            </div>

            <div id="shareholder-bank-reference-2_show_hide_div_edit" style="display:<?php echo $shareholder_bank_reference_2_show_hide_div_edit; ?>;">
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Name of bank </label>
                    <input name="bank_name_n" type="text" value="<?php echo $detail[0]['bank_name_n'] ?>" class="form-control height_25 plahole_font" style="width: 100%;">
                </div>
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Date</label>
                    <div class="input-group date stDate col-sm-12">
                        <input name="date_n" class="form-control height_25" type="text" value="<?php echo $date_n ?>">
                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Proof of address</label>

                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $has_address_proof_n_yes; ?> name="has_address_proof_n" id="shareholder-proof_add-2_show_div_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $has_address_proof_n_no; ?> name="has_address_proof_n" id="shareholder-proof_add-2_hide_div_edit" > 
                        No
                    </label> 
                </div>

            </div>

            <div id="shareholder-proof_add-2_show_hide_div_edit" style="display:<?php echo $shareholder_proof_add_2_show_hide_div_edit; ?>;">
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                    <textarea name="address_n" style="width:100%;resize:vertical;"><?php echo $detail[0]['address_n'] ?></textarea>
                </div>
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Country</label>
                    <select name="country_n" id="country_n" class="form-control plahole_font" style="width: 100%;">
                        <option value="AF">Afghanistan</option>
                        <option value="AX">Åland Islands</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                        <option value="AS">American Samoa</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AQ">Antarctica</option>
                        <option value="AG">Antigua and Barbuda</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaijan</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrain</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BY">Belarus</option>
                        <option value="BE">Belgium</option>
                        <option value="BZ">Belize</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermuda</option>
                        <option value="BT">Bhutan</option>
                        <option value="BO">Bolivia, Plurinational State of</option>
                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                        <option value="BA">Bosnia and Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BV">Bouvet Island</option>
                        <option value="BR">Brazil</option>
                        <option value="IO">British Indian Ocean Territory</option>
                        <option value="BN">Brunei Darussalam</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="KH">Cambodia</option>
                        <option value="CM">Cameroon</option>
                        <option value="CA">Canada</option>
                        <option value="CV">Cape Verde</option>
                        <option value="KY">Cayman Islands</option>
                        <option value="CF">Central African Republic</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CX">Christmas Island</option>
                        <option value="CC">Cocos (Keeling) Islands</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comoros</option>
                        <option value="CG">Congo</option>
                        <option value="CD">Congo, the Democratic Republic of the</option>
                        <option value="CK">Cook Islands</option>
                        <option value="CR">Costa Rica</option>
                        <option value="CI">Côte d'Ivoire</option>
                        <option value="HR">Croatia</option>
                        <option value="CU">Cuba</option>
                        <option value="CW">Curaçao</option>
                        <option value="CY">Cyprus</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="DK">Denmark</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egypt</option>
                        <option value="SV">El Salvador</option>
                        <option value="GQ">Equatorial Guinea</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FK">Falkland Islands (Malvinas)</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="TF">French Southern Territories</option>
                        <option value="GA">Gabon</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GG">Guernsey</option>
                        <option value="GN">Guinea</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="GY">Guyana</option>
                        <option value="HT">Haiti</option>
                        <option value="HM">Heard Island and McDonald Islands</option>
                        <option value="VA">Holy See (Vatican City State)</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IR">Iran, Islamic Republic of</option>
                        <option value="IQ">Iraq</option>
                        <option value="IE">Ireland</option>
                        <option value="IM">Isle of Man</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JE">Jersey</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="KP">Korea, Democratic People's Republic of</option>
                        <option value="KR">Korea, Republic of</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Lao People's Democratic Republic</option>
                        <option value="LV">Latvia</option>
                        <option value="LB">Lebanon</option>
                        <option value="LS">Lesotho</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libya</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MO">Macao</option>
                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                        <option value="MG">Madagascar</option>
                        <option value="MW">Malawi</option>
                        <option value="MY">Malaysia</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="FM">Micronesia, Federated States of</option>
                        <option value="MD">Moldova, Republic of</option>
                        <option value="MC">Monaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="ME">Montenegro</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="MM">Myanmar</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NL">Netherlands</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="MP">Northern Mariana Islands</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PK">Pakistan</option>
                        <option value="PW">Palau</option>
                        <option value="PS">Palestinian Territory, Occupied</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua New Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PN">Pitcairn</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="RE">Réunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russian Federation</option>
                        <option value="RW">Rwanda</option>
                        <option value="BL">Saint Barthélemy</option>
                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                        <option value="KN">Saint Kitts and Nevis</option>
                        <option value="LC">Saint Lucia</option>
                        <option value="MF">Saint Martin (French part)</option>
                        <option value="PM">Saint Pierre and Miquelon</option>
                        <option value="VC">Saint Vincent and the Grenadines</option>
                        <option value="WS">Samoa</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">Sao Tome and Principe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                        <option value="RS">Serbia</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leone</option>
                        <option value="SG">Singapore</option>
                        <option value="SX">Sint Maarten (Dutch part)</option>
                        <option value="SK">Slovakia</option>
                        <option value="SI">Slovenia</option>
                        <option value="SB">Solomon Islands</option>
                        <option value="SO">Somalia</option>
                        <option value="ZA">South Africa</option>
                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                        <option value="SS">South Sudan</option>
                        <option value="ES">Spain</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="SD">Sudan</option>
                        <option value="SR">Suriname</option>
                        <option value="SJ">Svalbard and Jan Mayen</option>
                        <option value="SZ">Swaziland</option>
                        <option value="SE">Sweden</option>
                        <option value="CH">Switzerland</option>
                        <option value="SY">Syrian Arab Republic</option>
                        <option value="TW">Taiwan, Province of China</option>
                        <option value="TJ">Tajikistan</option>
                        <option value="TZ">Tanzania, United Republic of</option>
                        <option value="TH">Thailand</option>
                        <option value="TL">Timor-Leste</option>
                        <option value="TG">Togo</option>
                        <option value="TK">Tokelau</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad and Tobago</option>
                        <option value="TN">Tunisia</option>
                        <option value="TR">Turkey</option>
                        <option value="TM">Turkmenistan</option>
                        <option value="TC">Turks and Caicos Islands</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UG">Uganda</option>
                        <option value="UA">Ukraine</option>
                        <option value="AE">United Arab Emirates</option>
                        <option value="GB">United Kingdom</option>
                        <option value="US">United States</option>
                        <option value="UM">United States Minor Outlying Islands</option>
                        <option value="UY">Uruguay</option>
                        <option value="UZ">Uzbekistan</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                        <option value="VN">Viet Nam</option>
                        <option value="VG">Virgin Islands, British</option>
                        <option value="VI">Virgin Islands, U.S.</option>
                        <option value="WF">Wallis and Futuna</option>
                        <option value="EH">Western Sahara</option>
                        <option value="YE">Yemen</option>
                        <option value="ZM">Zambia</option>
                        <option value="ZW">Zimbabwe</option>
                    </select>
                </div>
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Date</label>
                    <div class="input-group date stDate col-sm-12">
                        <input name="address_proof_date_n" class="form-control height_25" type="text" value="<?php echo $address_proof_date_n ?>">
                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                    </div>
                </div>

            </div>

            <div class="form-group td-area-form-marg">
                <label class="client-detailes-sub_heading" style="width:100%;">Remarks</label>
                <textarea name="remarks" style="width:100%;resize:vertical;"><?php echo $detail[0]['remarks'] ?></textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="hidden"  name="id" id="" style="width: 100%;" value="<?php echo $detail[0]['trustinfo_id'] ?>">
            <input type="hidden"  name="action"  class="add_action"  style="width: 100%;" value="edit">
            <button type="submit" class="btn btn-success pull-right">Save</button>
            <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

        </div>
    </div>
</form>