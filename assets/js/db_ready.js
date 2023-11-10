/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function ready_on_db(){
    var cur_date=get_current_date();
    // $(".stDate_current").val(cur_date);
    $('.add_action').next().addClass('saveForm');
    $('.custom_close').on('click',function(){
        $(this).parent().fadeOut();
    })
    $('.addbtn').on('click',function(){
        $('.add_action').val('add');
        $('.radioYesBtn').val('1');
        $('.radioNoBtn').val('0');
        var cur_date=get_current_date();
       // $(".stDate_current").val(cur_date);
        $('.stDate').bdatepicker("update",cur_date);            
//        $('form').data('bootstrapValidator').resetForm();
    })
//    var cur_date=get_current_date();
//            $(".stDate").val(cur_date);
//            $('.stDate').bdatepicker({
//            format: "dd MM yyyy",
//            autoclose: true,
////            startDate: new Date()
//        });
    /*********START Accounts yes no radio button**********/
            $("#show_date_of_special").click(function(){
                $("#date_of_special").slideDown();
            });

            $("#hide_date_of_special").click(function(){
                $("#date_of_special").slideUp();
            });
            /*********END Accounts yes no radio button**********/
			
			/*********START Accounts yes no radio button-edit**********/
            $("#show_date_of_special-edit").click(function(){
                $("#date_of_special-edit").slideDown();
            });

            $("#hide_date_of_special-edit").click(function(){
                $("#date_of_special-edit").slideUp();
            });
            /*********END Accounts yes no radio button-edit**********/

            /*********START TXA/TRC yes no radio button**********/
            $("#show_trc_available").click(function(){
                $("#show_hide_trc_available_div").slideDown();
            });
            $("#hide_trc_available").click(function(){
                $("#show_hide_trc_available_div").slideUp();
            });
            /***********END TXA/TRC yes no radio button**********/

            /*********START Substance Conditions Adopted yes no radio button**********/
            $("#show_address").click(function(){
                $("#show-hide_address").slideDown();
            });
            $("#hide_address").click(function(){
                $("#show-hide_address").slideUp();
            });
            /***********END Substance Conditions Adopted yes no radio button**********/

            /*********START Adopted Arbitration yes no radio button**********/
            $("#show_adopted_arbitration").click(function(){
                $("#show_hide_adopted_arbitration_div").slideDown();
            });
            $("#hide_adopted_arbitration").click(function(){
                $("#show_hide_adopted_arbitration_div").slideUp();
            });
            /***********END Adopted Arbitration yes no radio button**********/

            /*********START shares_are_listed yes no radio button**********/
            $("#direcgorship_textarea_show_div").click(function(){
                $("#directorship_textarea_show_hide_div").slideDown();
            });
            $("#direcgorship_textarea_hide_div").click(function(){
                $("#directorship_textarea_show_hide_div").slideUp();
            });
            /***********END shares_are_listed yes no radio button**********/

            /*********START Directorship yes no radio button**********/
            $("#show_share_are_listed").click(function(){
                $("#show_hide_shares_are_listed").slideDown();
            });
            $("#hide_share_are_listed").click(function(){
                $("#show_hide_shares_are_listed").slideUp();
            });
            /***********END Directorship yes no radio button**********/

            /*********START KYC passport yes no radio button**********/
            $("#kyc_passport_show_div").click(function(){
                $("#kyc_passport_hide_show_div").slideDown();
            });
            $("#kyc_passport_hide_div").click(function(){
                $("#kyc_passport_hide_show_div").slideUp();
            });
            /***********END KYC passport yes no radio button**********/

            /*********START KYC bank refrence yes no radio button**********/
            $("#bank_refrence_show_div").click(function(){
                $("#bank_refrence_show_hide_div").slideDown();
            });
            $("#bank_refrence_hide_div").click(function(){
                $("#bank_refrence_show_hide_div").slideUp();
            });
            /***********END KYC refrence yes no radio button**************/

            /*********START Proof of address yes no radio button**********/
            $("#proof_of_address_show_div").click(function(){
                $("#proof_of_address_show_hide_div").slideDown();
            });
            $("#proof_of_address_hide_div").click(function(){
                $("#proof_of_address_show_hide_div").slideUp();
            });
            /***********END Proof of address yes no radio button**********/

            /*********START passport yes no radio button**********/
            $("#audited_accounts_show_div").click(function(){
                $("#audited_accounts_show_hide_div").slideDown();
            });
            $("#audited_accounts_hide_div").click(function(){
                $("#audited_accounts_show_hide_div").slideUp();
            });
            /***********END passport yes no radio button**********/

            /*********START passport yes no radio button**********/
            $("#passport_show_div").click(function(){
                $("#passport_show_hide_div").slideDown();
            });
            $("#passport_hide_div").click(function(){
                $("#passport_show_hide_div").slideUp();
            });
            /***********END passport yes no radio button**********/

            /*********START beneficial-owner-passport_show_hide_div yes no radio button**********/
            $("#beneficial-owner-passport_show_div").click(function(){
                $("#beneficial-owner-passport_show_hide_div").slideDown();
            });
            $("#beneficial-owner-passport_hide_div").click(function(){
                $("#beneficial-owner-passport_show_hide_div").slideUp();
            });
            /***********END beneficial-owner-passport_show_hide_div yes no radio button**********/

            /*********START beneficial-owner-cv_show_hide_div yes no radio button**********/
            $("#beneficial-owner-cv_show_div").click(function(){
                $("#beneficial-owner-cv_show_hide_div").slideDown();
            });
            $("#beneficial-owner-cv_hide_div").click(function(){
                $("#beneficial-owner-cv_show_hide_div").slideUp();
            });
            /***********END beneficial-owner-cv_show_hide_div yes no radio button**********/

            /*********START  beneficial-owner-bank-reference_show_hide_div yes no radio button**********/
            $("#beneficial-owner-bank-reference_show_div").click(function(){
                $("#beneficial-owner-bank-reference_show_hide_div").slideDown();
            });
            $("#beneficial-owner-bank-reference_hide_div").click(function(){
                $("#beneficial-owner-bank-reference_show_hide_div").slideUp();
            });
            /***********END  beneficial-owner-bank-reference_show_hide_div yes no radio button**********/

            /*********START beneficial-owner-proof_add_show_hide_div yes no radio button**********/
            $("#beneficial-owner-proof_add_show_div").click(function(){
                $("#beneficial-owner-proof_add_show_hide_div").slideDown();
            });
            $("#beneficial-owner-proof_add_hide_div").click(function(){
                $("#beneficial-owner-proof_add_show_hide_div").slideUp();
            });
            /***********END beneficial-owner-proof_add_show_hide_div yes no radio button**********/

            /*********START register_of_directors_show_hide_div yes no radio button**********/
            $("#register_of_directors_show_div").click(function(){
                $("#register_of_directors_show_hide_div").slideDown();
            });
            $("#register_of_directors_hide_div").click(function(){
                $("#register_of_directors_show_hide_div").slideUp();
            });
            /***********END register_of_directors_show_hide_div yes no radio button**********/

            /*********START beneficial-owner-passport_show_hide_div yes no radio button**********/
            $("#beneficial-owner-passport-2_show_div").click(function(){
                $("#beneficial-owner-passport-2_show_hide_div").slideDown();
            });
            $("#beneficial-owner-passport-2_hide_div").click(function(){
                $("#beneficial-owner-passport-2_show_hide_div").slideUp();
            });
            /***********END beneficial-owner-passport_show_hide_div yes no radio button**********/

            /*********START beneficial-owner-audited-accounts_show_hide_div yes no radio button**********/
            $("#beneficial-owner-audited-accounts_show_div").click(function(){
                $("#beneficial-owner-audited-accounts_show_hide_div").slideDown();
            });
            $("#beneficial-owner-audited-accounts_hide_div").click(function(){
                $("#beneficial-owner-audited-accounts_show_hide_div").slideUp();
            });
            /***********END beneficial-owner-audited-accounts_show_hide_div yes no radio button**********/

            /*********START  beneficial-owner-bank-reference_show_hide_div yes no radio button**********/
            $("#beneficial-owner-bank-reference-2_show_div").click(function(){
                $("#beneficial-owner-bank-reference-2_show_hide_div").slideDown();
            });
            $("#beneficial-owner-bank-reference-2_hide_div").click(function(){
                $("#beneficial-owner-bank-reference-2_show_hide_div").slideUp();
            });
            /***********END  beneficial-owner-bank-reference_show_hide_div yes no radio button**********/

            /*********START beneficial-owner-proof_add-2_show_hide_div yes no radio button**********/
            $("#beneficial-owner-proof_add-2_show_div").click(function(){
                $("#beneficial-owner-proof_add-2_show_hide_div").slideDown();
            });
            $("#beneficial-owner-proof_add-2_hide_div").click(function(){
                $("#beneficial-owner-proof_add-2_show_hide_div").slideUp();
            });
            /***********END beneficial-owner-proof_add-2_show_hide_div yes no radio button**********/

            /*********START trusts_individual-are-there_show_hide_div yes no radio button**********/
            $("#trusts_individual-are-there_show_div").click(function(){
                $("#trusts_individual-are-there_show_hide_div").slideDown();
            });
            $("#trusts_individual-are-there_hide_div").click(function(){
                $("#trusts_individual-are-there_show_hide_div").slideUp();
            });
            /***********END trusts_individual-are-there_show_hide_div yes no radio button**********/

            /*********START trusts_individual-letter_of_wishes_show_div yes no radio button**********/
            $("#trusts_individual-letter_of_wishes_show_div").click(function(){
                $("#trusts_individual-letter_of_wishes_show_hide_div").slideDown();
            });
            $("#trusts_individual-letter_of_wishes_hide_div").click(function(){
                $("#trusts_individual-letter_of_wishes_show_hide_div").slideUp();
            });
            /***********END trusts_individual-letter_of_wishes_show_div yes no radio button**********/

            /*********START trusts_individual-are_accounts_show_hide_div yes no radio button**********/
            $("#trusts_individual-are_accounts_show_div").click(function(){
                $("#trusts_individual-are_accounts_show_hide_div").slideDown();
            });
            $("#trusts_individual-are_accounts_hide_div").click(function(){
                $("#trusts_individual-are_accounts_show_hide_div").slideUp();
            });
            /***********END trusts_individual-are_accounts_show_hide_div yes no radio button**********/

            /*********START trusts_individual-is_the_tax_show_hide_div yes no radio button**********/
            $("#trusts_individual-is_the_tax_show_div").click(function(){
                $("#trusts_individual-is_the_tax_show_hide_div").slideDown();
            });
            $("#trusts_individual-is_the_tax_hide_div").click(function(){
                $("#trusts_individual-is_the_tax_show_hide_div").slideUp();
            });
            /***********END trusts_individual-is_the_tax_show_hide_div yes no radio button**********/

            /*********START trusts_individual-settlor_hide_show_div yes no radio button**********/
            $("#trusts_individual-settlor-pas_show_div").click(function(){
                $("#trusts_individual-settlor-pas_hide_show_div").slideDown();
            });
            $("#trusts_individual-settlor-pas_hide_div").click(function(){
                $("#trusts_individual-settlor-pas_hide_show_div").slideUp();
            });
            /***********END trusts_individual-settlor_hide_show_div yes no radio button**********/

            /*********START trusts_individual-settlor_show_hide_div yes no radio button**********/
            $("#trusts_individual-settlor_show_div").click(function(){
                $("#trusts_individual-settlor_show_hide_div").slideDown();
            });
            $("#trusts_individual-settlor_hide_div").click(function(){
                $("#trusts_individual-settlor_show_hide_div").slideUp();
            });
            /***********END trusts_individual-settlor_show_hide_div yes no radio button**********/

            /*********START beneficial-owner-cv-2_show_hide_div yes no radio button**********/
            $("#beneficial-owner-cv-2_show_div").click(function(){
                $("#beneficial-owner-cv-2_show_hide_div").slideDown();
            });
            $("#beneficial-owner-cv-2_hide_div").click(function(){
                $("#beneficial-owner-cv-2_show_hide_div").slideUp();
            });
            /***********END beneficial-owner-cv-2_show_hide_div yes no radio button**********/

            /*********START  beneficial-owner-bank-reference-3_show_hide_div yes no radio button**********/
            $("#beneficial-owner-bank-reference-3_show_div").click(function(){
                $("#beneficial-owner-bank-reference-3_show_hide_div").slideDown();
            });
            $("#beneficial-owner-bank-reference-3_hide_div").click(function(){
                $("#beneficial-owner-bank-reference-3_show_hide_div").slideUp();
            });
            /***********END  beneficial-owner-bank-reference-3_show_hide_div yes no radio button**********/

            /*********START beneficial-owner-proof_add-3_show_hide_div yes no radio button**********/
            $("#beneficial-owner-proof_add-3_show_div").click(function(){
                $("#beneficial-owner-proof_add-3_show_hide_div").slideDown();
            });
            $("#beneficial-owner-proof_add-3_hide_div").click(function(){
                $("#beneficial-owner-proof_add-3_show_hide_div").slideUp();
            });
            /***********END beneficial-owner-proof_add-3_show_hide_div yes no radio button**********/

            /*********START trusts_carporate_regs_director_show_hide_div yes no radio button**********/
            $("#trusts_carporate_regs_director_show_div").click(function(){
                $("#trusts_carporate_regs_director_show_hide_div").slideDown();
            });
            $("#trusts_carporate_regs_director_hide_div").click(function(){
                $("#trusts_carporate_regs_director_show_hide_div").slideUp();
            });
            /***********END trusts_carporate_regs_director_show_hide_div yes no radio button**********/

            /*********START trusts_carporate-settlor-pas_hide_show_div yes no radio button**********/
            $("#trusts_carporate-settlor-pas_show_div").click(function(){
                $("#trusts_carporate-settlor-pas_hide_show_div").slideDown();
            });
            $("#trusts_carporate-settlor-pas_hide_div").click(function(){
                $("#trusts_carporate-settlor-pas_hide_show_div").slideUp();
            });
            /***********END trusts_carporate-audited_account_show_hide_div yes no radio button**********/

            /*********START trusts_carporate-audited_account_show_hide_div yes no radio button**********/
            $("#trusts_carporate-audited_account_show_div").click(function(){
                $("#trusts_carporate-audited_account_show_hide_div").slideDown();
            });
            $("#trusts_carporate-audited_account_hide_div").click(function(){
                $("#trusts_carporate-audited_account_show_hide_div").slideUp();
            });
            /***********END trusts_carporate-settlor-pas_hide_show_div yes no radio button**********/

            /*********START trusts_carporate-bank_ref_show_hide_div yes no radio button**********/
            $("#trusts_carporate-bank_ref_show_div").click(function(){
                $("#trusts_carporate-bank_ref_show_hide_div").slideDown();
            });
            $("#trusts_carporate-bank_ref_hide_div").click(function(){
                $("#trusts_carporate-bank_ref_show_hide_div").slideUp();
            });
            /***********END trusts_carporate-bank_ref_show_hide_div yes no radio button**********/

            /*********START trusts_carporate-proof_add_show_hide_div yes no radio button**********/
            $("#trusts_carporate-proof_add_show_div").click(function(){
                $("#trusts_carporate-proof_add_show_hide_div").slideDown();
            });
            $("#trusts_carporate-proof_add_hide_div").click(function(){
                $("#trusts_carporate-proof_add_show_hide_div").slideUp();
            });
            /***********END trusts_carporate-proof_add_show_hide_div yes no radio button**********/
            
            /*********START share-holder-individual-pas_show_hide_div yes no radio button**********/
            $("#share-holder-individual-pas_show_div").click(function(){
                $("#share-holder-individual-pas_show_hide_div").slideDown();
            });
            $("#share-holder-individual-pas_hide_div").click(function(){
                $("#share-holder-individual-pas_show_hide_div").slideUp();
            });
            /***********END share-holder-individual-pas_show_hide_div yes no radio button**********/
            
            /*********START share-holder-individula-cv_show_hide_div yes no radio button**********/
            $("#share-holder-individula-cv_show_div").click(function(){
                $("#share-holder-individula-cv_show_hide_div").slideDown();
            });
            $("#share-holder-individula-cv_hide_div").click(function(){
                $("#share-holder-individula-cv_show_hide_div").slideUp();
            });
            /***********END share-holder-individula-cv_show_hide_div yes no radio button**********/
            
            /*********START share-holder-individula-bank-reference_show_hide_div yes no radio button**********/
            $("#share-holder-individula-bank-reference_show_div").click(function(){
                $("#share-holder-individula-bank-reference_show_hide_div").slideDown();
            });
            $("#share-holder-individula-bank-reference_hide_div").click(function(){
                $("#share-holder-individula-bank-reference_show_hide_div").slideUp();
            });
            /***********END share-holder-individula-bank-reference_show_hide_div yes no radio button**********/
            
            /*********START share-holder-individual-proof_add_show_hide_div yes no radio button**********/
            $("#share-holder-individual-proof_add_show_div").click(function(){
                $("#share-holder-individual-proof_add_show_hide_div").slideDown();
            });
            $("#share-holder-individual-proof_add_hide_div").click(function(){
                $("#share-holder-individual-proof_add_show_hide_div").slideUp();
            });
            /***********END share-holder-individual-proof_add_show_hide_div yes no radio button**********/
            
            /*********START share-holder-individual-reg-dict_show_hide_div yes no radio button**********/
            $("#share-holder-individual-reg-dict_show_div").click(function(){
                $("#share-holder-individual-reg-dict_show_hide_div").slideDown();
            });
            $("#share-holder-individual-reg-dict_hide_div").click(function(){
                $("#share-holder-individual-reg-dict_show_hide_div").slideUp();
            });
            /***********END share-holder-individual-reg-dict_show_hide_div yes no radio button**********/
            
            /*********START share-holder-corporate-pas_show_hide_div yes no radio button**********/
            $("#share-holder-corporate-pas_show_div").click(function(){
                $("#share-holder-corporate-pas_show_hide_div").slideDown();
            });
            $("#share-holder-corporate-pas_hide_div").click(function(){
                $("#share-holder-corporate-pas_show_hide_div").slideUp();
            });
            /***********END share-holder-corporate-pas_show_hide_div yes no radio button**********/
            
            /*********START share-holder-corporate-audited-acco_show_hide_div yes no radio button**********/
            $("#share-holder-corporate-audited-acco_show_div").click(function(){
                $("#share-holder-corporate-audited-acco_show_hide_div").slideDown();
            });
            $("#share-holder-corporate-audited-acco_hide_div").click(function(){
                $("#share-holder-corporate-audited-acco_show_hide_div").slideUp();
            });
            /***********END share-holder-corporate-audited-acco_show_hide_div yes no radio button**********/
            
            /*********START share-holder-corporate-bank-reference_show_hide_div yes no radio button**********/
            $("#share-holder-corporate-bank-reference_show_div").click(function(){
                $("#share-holder-corporate-bank-reference_show_hide_div").slideDown();
            });
            $("#share-holder-corporate-bank-reference_hide_div").click(function(){
                $("#share-holder-corporate-bank-reference_show_hide_div").slideUp();
            });
            /***********END share-holder-corporate-bank-reference_show_hide_div yes no radio button**********/
            
            /*********START share-holder-corporate-proof_add_show_hide_div yes no radio button**********/
            $("#share-holder-corporate-proof_add_show_div").click(function(){
                $("#share-holder-corporate-proof_add_show_hide_div").slideDown();
            });
            $("#share-holder-corporate-proof_add_hide_div").click(function(){
                $("#share-holder-corporate-proof_add_show_hide_div").slideUp();
            });
            /***********END share-holder-corporate-proof_add_show_hide_div yes no radio button**********/
			
            /*********START bank-accou-net-banking_show_hide_div yes no radio button**********/
            $("#bank-accou-net-banking_show_div").click(function(){
                $("#bank-accou-net-banking_show_hide_div").slideDown();
            });
            $("#bank-accou-net-banking_hide_div").click(function(){
                $("#bank-accou-net-banking_show_hide_div").slideUp();
            });
            /***********END bank-accou-net-banking_show_hide_div yes no radio button**********/
            
            /*********START bank-accou-net-banking_show_hide_div_edit yes no radio button**********/
            $("#bank-accou-net-banking_show_div_edit").click(function(){
                $("#bank-accou-net-banking_show_hide_div_edit").slideDown();
            });
            $("#bank-accou-net-banking_hide_div_edit").click(function(){
                $("#bank-accou-net-banking_show_hide_div_edit").slideUp();
            });
            /***********END bank-accou-net-banking_show_hide_div_edit yes no radio button**********/
			
			/*********START client-info-group-company_show_hide_div yes no radio button**********/
            $("#client-info-group-company_show_div").click(function(){
                $("#client-info-group-company_show_hide_div").slideDown();
            });
            $("#client-info-group-company_hide_div").click(function(){
                $("#client-info-group-company_show_hide_div").slideUp();
            });
            /***********END client-info-group-company_show_hide_div yes no radio button**********/
			
			
			/*************START reset add div element*****************/
			$(".btn-primary").click(function(){
					$(".removed_div").html('');
			});
			/*************END reset add div element*****************/
			
			/*********START license-type-show-hide_div on change function**********/
			$('#license-type-show-hide_div').on('change', function(){
				if($('#license-type-show-hide_div').val() == '1') {
					$('#license-type-plus-icon').show();
					$('#license-type-edit-delete-icon').hide();						
				} else {
					$('#license-type-plus-icon').hide();
					$('#license-type-edit-delete-icon').show();
						
				} 
			});
            /***********END license-type-show-hide_div on change function**********/
			
			/*********START permit-type-show-hide_div on change function**********/
			$('#permit-type-show-hide_div').change(function(){
				if($('#permit-type-show-hide_div').val() == '1') {
					$('#permit-type-plus-icon').show();
					$('#permit-type-edit-delete-icon').hide();						
				} else {
					$('#permit-type-plus-icon').hide();
					$('#permit-type-edit-delete-icon').show();
						
				} 
			});
            /***********END permit-type-show-hide_div on change function**********/
			
			/*********START permit-type-show-hide_div-edit on change function**********/
			$('#permit-type-show-hide_div-edit').change(function(){
				if($('#permit-type-show-hide_div-edit').val() == '') {
					$('#permit-type-plus-icon-edit').show();
					$('#permit-type-edit-delete-icon-edit').hide();						
				} else {
					$('#permit-type-plus-icon-edit').hide();
					$('#permit-type-edit-delete-icon-edit').show();
						
				} 
			});
            /***********END permit-type-show-hide_div-edit on change function**********/
			
			/*********START license-type-show-hide_div-edit on change function**********/
			$('#license-type-show-hide_div-edit').change(function(){
				if($('#license-type-show-hide_div-edit').val() == '1') {
					$('#license-type-plus-icon-edit').show();
					$('#license-type-edit-delete-icon-edit').hide();						
				} else {
					$('#license-type-plus-icon-edit').hide();
					$('#license-type-edit-delete-icon-edit').show();
						
				} 
			});
            /***********END license-type-show-hide_div-edit on change function**********/
			
			/*********START bank-onwer_bank-name-show-hide_div on change function**********/
			$('#bank-onwer_bank-name-show-hide_div').on('change', function(){
				if($('#bank-onwer_bank-name-show-hide_div').val() == '') {
					$('#bank-onwer_bank-name-plus-icon').show();
					$('#bank-onwer_bank-name-edit-delete-icon').hide();						
				} else {
					$('#bank-onwer_bank-name-plus-icon').hide();
					$('#bank-onwer_bank-name-edit-delete-icon').show();
						
				} 
			});
            /***********END bank-onwer_bank-name-show-hide_div on change function**********/
			
			/*********START bank-onwer_account-type-show-hide_div on change function**********/
			$('#bank-onwer_account-type-show-hide_div').on('change', function(){
				if($('#bank-onwer_account-type-show-hide_div').val() == '') {
					$('#bank-onwer_account-type-plus-icon').show();
					$('#bank-onwer_account-type-edit-delete-icon').hide();						
				} else {
					$('#bank-onwer_account-type-plus-icon').hide();
					$('#bank-onwer_account-type-edit-delete-icon').show();
						
				} 
			});
            /***********END bank-onwer_account-type-show-hide_div on change function**********/
			
			/*********START bank-onwer_currency-show-hide_div on change function**********/
			$('#bank-onwer_currency-show-hide_div').on('change', function(){
				if($('#bank-onwer_currency-show-hide_div').val() == '') {
					$('#bank-onwer_currency-plus-icon').show();
					$('#bank-onwer_currency-edit-delete-icon').hide();						
				} else {
					$('#bank-onwer_currency-plus-icon').hide();
					$('#bank-onwer_currency-edit-delete-icon').show();
						
				} 
			});
            /***********END bank-onwer_currency-show-hide_div on change function**********/
			
			/*********START bank-onwer_account-no-show-hide_div on change function**********/
			$('#bank-onwer_account-no-show-hide_div').on('change', function(){
				if($('#bank-onwer_account-no-show-hide_div').val() == '') {
					$('#bank-onwer_account-no-plus-icon').show();
					$('#bank-onwer_account-no-edit-delete-icon').hide();						
				} else {
					$('#bank-onwer_account-no-plus-icon').hide();
					$('#bank-onwer_account-no-edit-delete-icon').show();
						
				} 
			});
            /***********END bank-onwer_account-no-show-hide_div on change function**********/
			
			/*********START bank-onwer_bank-name-show-hide_div-edit on change function**********/
			$('#bank-onwer_bank-name-show-hide_div-edit').on('change', function(){
				if($('#bank-onwer_bank-name-show-hide_div-edit').val() == '') {
					$('#bank-onwer_bank-name-plus-icon-edit').show();
					$('#bank-onwer_bank-name-edit-delete-icon-edit').hide();						
				} else {
					$('#bank-onwer_bank-name-plus-icon-edit').hide();
					$('#bank-onwer_bank-name-edit-delete-icon-edit').show();
						
				} 
			});
            /***********END bank-onwer_bank-name-show-hide_div-edit on change function**********/
			
			/*********START bank-onwer_account-type-show-hide_div-edit on change function**********/
			$('#bank-onwer_account-type-show-hide_div-edit').on('change', function(){
				if($('#bank-onwer_account-type-show-hide_div-edit').val() == '') {
					$('#bank-onwer_account-type-plus-icon-edit').show();
					$('#bank-onwer_account-type-edit-delete-icon-edit').hide();						
				} else {
					$('#bank-onwer_account-type-plus-icon-edit').hide();
					$('#bank-onwer_account-type-edit-delete-icon-edit').show();
						
				} 
			});
            /***********END bank-onwer_account-type-show-hide_div-edit on change function**********/
			
			/*********START bank-onwer_currency-show-hide_div-edit on change function**********/
			$('#bank-onwer_currency-show-hide_div-edit').on('change', function(){
				if($('#bank-onwer_currency-show-hide_div-edit').val() == '') {
					$('#bank-onwer_currency-plus-icon-edit').show();
					$('#bank-onwer_currency-edit-delete-icon-edit').hide();						
				} else {
					$('#bank-onwer_currency-plus-icon-edit').hide();
					$('#bank-onwer_currency-edit-delete-icon-edit').show();
						
				} 
			});
            /***********END bank-onwer_currency-show-hide_div-edit on change function**********/
			
			/*********START bank-onwer_account-no-show-hide_div-edit on change function**********/
			$('#bank-onwer_account-no-show-hide_div-edit').on('change', function(){
				if($('#bank-onwer_account-no-show-hide_div-edit').val() == '') {
					$('#bank-onwer_account-no-plus-icon-edit').show();
					$('#bank-onwer_account-no-edit-delete-icon-edit').hide();						
				} else {
					$('#bank-onwer_account-no-plus-icon-edit').hide();
					$('#bank-onwer_account-no-edit-delete-icon-edit').show();
						
				} 
			});
            /***********END bank-onwer_account-no-show-hide_div-edit on change function**********/
			
			
			/*********START clint-info-status-show-hide_div change function**********/
			$('#clint-info-status-show-hide_div').on('change', function(){
				if($('#clint-info-status-show-hide_div').val() == '') {
				//alert("test");
					$('#client-inof-status-plus-icon').show();
					$('#client-inof-status-edit-delete-icon').hide();						
				} else {
					$('#client-inof-status-plus-icon').hide();
					$('#client-inof-status-edit-delete-icon').show();
						
				} 
			});
            /***********END clint-info-status-show-hide_div on change function**********/
			
			/*********START client-inof-type-of-company-show-hide_div change function**********/
			$('#client-inof-type-of-company-show-hide_div').on('change', function(){
				if($('#client-inof-type-of-company-show-hide_div').val() == '') {
				//alert("test");
					$('#client-inof-type-of-company-plus-icon').show();
					$('#client-inof-type-of-company-edit-delete-icon').hide();						
				} else {
					$('#client-inof-type-of-company-plus-icon').hide();
					$('#client-inof-type-of-company-edit-delete-icon').show();
						
				} 
			});
            /***********END client-inof-type-of-company-show-hide_div on change function**********/
			
			/*********START client-info-activity-show-hide_div change function**********/
			$('#client-info-activity-show-hide_div').on('change', function(){
				if($('#client-info-activity-show-hide_div').val() == '') {
				//alert("test");
					$('#client-info-activity-plus-icon').show();
					$('#client-info-activity-edit-delete-icon').hide();
					$("#client-info-activity_show_hide_input_filed").slideUp();					
				} else {
					$('#client-info-activity-plus-icon').hide();
					$('#client-info-activity-edit-delete-icon').show();
					$("#client-info-activity_show_hide_input_filed").slideDown();
						
				} 
			});
            /***********END client-info-activity-show-hide_div on change function**********/
			
			
			
			/*********START share-type-type-show-hide_div on change function**********/
			$('#share-type-type-show-hide_div').on('change', function(){
				if($('#share-type-type-show-hide_div').val() == '') {
					$('#share-type-plus-icon').show();
					$('#share-type-edit-delete-icon').hide();						
				} else {
					$('#share-type-plus-icon').hide();
					$('#share-type-edit-delete-icon').show();
						
				} 
			});
            /***********END share-type-type-show-hide_div on change function**********/
			
			/*********START share-type-type-show-hide_div-corporate on change function**********/
			$('#share-type-type-show-hide_div-corporate').on('change', function(){
				if($('#share-type-type-show-hide_div-corporate').val() == '') {
					$('#share-type-plus-icon-corporate').show();
					$('#share-type-edit-delete-icon-corporate').hide();						
				} else {
					$('#share-type-plus-icon-corporate').hide();
					$('#share-type-edit-delete-icon-corporate').show();
						
				} 
			});
            /***********END share-type-type-show-hide_div-corporate on change function**********/
			
			/*********START share-type-type-show-hide_div-corporate-transfer on change function**********/
			$('#share-type-type-show-hide_div-corporate-transfer').on('change', function(){
				if($('#share-type-type-show-hide_div-corporate-transfer').val() == '') {
					$('#share-type-plus-icon-corporate-transfer').show();
					$('#share-type-edit-delete-icon-corporate-transfer').hide();						
				} else {
					$('#share-type-plus-icon-corporate-transfer').hide();
					$('#share-type-edit-delete-icon-corporate-transfer').show();
						
				} 
			});
            /***********END share-type-type-show-hide_div-corporate-transfer on change function**********/
			
			$('.modal').modal({backdrop: 'static',show:false, keyboard: false}) 
				 
//				 $('.datepicker2').bdatepicker({
//					format: "dd MM yyyy",
//					autoclose: true,
//				});
//				 $('.datepicker2').bdatepicker("update",new Date());
				 

            /********START adding more div elements********/
                        
            $('.close,.cancel').click(function(){
                $('#temp_div').remove();
            });
			
			$('#add_date_of_review_btn').on('click', function(){
				var str='<div class="removed_div"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;"><label class="client-detailes-sub_heading">Date of review</label><div class="col-md-10" style="padding-left:0px;"><div class="input-group date datepicker2 col-sm-12"><input class="form-control height_25 stDate" type="text"><span class="input-group-addon padding_3"><i class="fa fa-th"></i></span></div></div><div class="col-md-2" style="padding:0px;"><a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" style="padding-left:0;"><i class="fa fa-fw icon-delete-symbol removed_icon_btn pull-right removed_color" onClick="deleteDiv(this)"></i></a></div></div></div>';
				$( str ).appendTo($('#add_date_of_review_div'));
				$('.datepicker2').bdatepicker({
					format: "dd MM yyyy",
					autoclose: true
				});
				$('.datepicker2').bdatepicker("update",new Date());
            });
			
			$('#add_checlist_no_btn').on('click', function(){
				var str='<div class="removed_div"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;"><label class="client-detailes-sub_heading">Checklist number</label><div class="col-md-10" style="padding-left:0px;"><div class="input-group date datepicker2 col-sm-12"><input class="form-control height_25 stDate" type="text"></div></div><div class="col-md-2" style="padding:0px;"><a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" style="padding-left:0;"><i class="fa fa-fw icon-delete-symbol removed_icon_btn pull-right removed_color" onClick="deleteDiv(this)"></i></a></div></div></div>';
				$( str ).appendTo($('#add_checlist_no_div'));
            });
			
			$('#add_date_of_review-edit_btn').on('click', function(){
				var str='<div class="removed_div"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;"><label class="client-detailes-sub_heading">Date of review</label><div class="col-md-10" style="padding-left:0px;"><div class="input-group date datepicker2 col-sm-12"><input class="form-control height_25 stDate" type="text"><span class="input-group-addon padding_3"><i class="fa fa-th"></i></span></div></div><div class="col-md-2" style="padding:0px;"><a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" style="padding-left:0;"><i class="fa fa-fw icon-delete-symbol removed_icon_btn pull-right removed_color" onClick="deleteDiv(this)"></i></a></div></div></div>';
				$( str ).appendTo($('#add_date_of_review-edit_div'));
				$('.datepicker2').bdatepicker({
					format: "dd MM yyyy",
					autoclose: true
				});
				$('.datepicker2').bdatepicker("update",new Date());
			});
			
			
			
			
			
            /********END adding more div elements********/
			
			/********START Reset Modal Box***************/
			$('.modal').on('hidden.bs.modal', function () {
			
				for(var k=0;k<$(this).find(".radioNoBtn").length; k++){
					$(this).find(".radioNoBtn").eq(k).attr('checked', true).trigger('click');
				}
				$(this).find(".iradioNoBtn").addClass("checked");
				$(this).find(".iradioYesBtn").removeClass("checked");
			
				//$(this).find("#hide_date_of_special-edit").eq(0).attr('checked', true).trigger('click');
				//$(this).find("#hide_date_of_special-edit-i").addClass("checked");
				//$(this).find("#show_date_of_special-edit-i").removeClass("checked");
				
				$(this).find("#show_date_of_special-edit").eq(0).attr('checked', true).trigger('click');
				$(this).find("#show_date_of_special-edit-i").addClass("checked");
				$(this).find("#hide_date_of_special-edit-i").removeClass("checked");
				
				$(this).find("#show_date_of_special").eq(0).attr('checked', true).trigger('click');
				$(this).find("#show_date_of_special-i").addClass("checked");
				$(this).find("#hide_date_of_special-i").removeClass("checked");
				
				$(this).find('input').val('');
				$(this).find('textarea').val('');
				$(this).find('select').find('option:first').attr('selected', 'selected');
                                        
                                        var cur_date=get_current_date();
				$(this).find('input.stDate').bdatepicker("update",cur_date);
				$(this).find('input.stDate_di').bdatepicker("update",cur_date);
				$(this).find('input.stDate_di_kyc').bdatepicker("update",cur_date);
				$(this).find('input.stDate_dc').bdatepicker("update",cur_date);
				$(this).find('input.stDate_dc_o').bdatepicker("update",cur_date);
				$(this).find('input.stDate_share_i').bdatepicker("update",cur_date);
				$('#license-type-show-hide_div').trigger('change');
				$('#license-type-show-hide_div-edit').trigger('change');
				$('#permit-type-show-hide_div').trigger('change');
				$('#permit-type-show-hide_div-edit').trigger('change');
				$('#bank-onwer_bank-name-show-hide_div').trigger('change');
				$('#bank-onwer_account-type-show-hide_div').trigger('change');
				$('#bank-onwer_currency-show-hide_div').trigger('change');
				$('#bank-onwer_account-no-show-hide_div').trigger('change');
				$('#bank-onwer_bank-name-show-hide_div-edit').trigger('change');
				$('#bank-onwer_account-type-show-hide_div-edit').trigger('change');
				$('#bank-onwer_currency-show-hide_div-edit').trigger('change');
				$('#bank-onwer_account-no-show-hide_div-edit').trigger('change');
				$('#share-type-type-show-hide_div').trigger('change');
				$('#share-type-type-show-hide_div-corporate-transfer').trigger('change');
				$('#share-type-type-show-hide_div-corporate').trigger('change');
				
			});
			/********END Reset Modal Box***************/
}
function get_current_date(){
    var monthNames = [
      "January", "February", "March",
      "April", "May", "June", "July",
      "August", "September", "October",
      "November", "December"
    ];

    var date = new Date();
    var day = date.getDate();
    var monthIndex = date.getMonth();
    var year = date.getFullYear();
    day = pad(day,2);
    return day + ' ' + monthNames[monthIndex] + ' ' + year;
  
  }
  
function pad (str, max) {
  str = str.toString();
  return str.length < max ? pad("0" + str, max) : str;
}

function date_validation(){
  $('.stDate').bdatepicker({
	  format: "dd MM yyyy",
	   autoclose: true
	 }).on('changeDate', function(e) {
		// Revalidate the date field
		$('#add-license-form').bootstrapValidator('revalidateField', 'issue_date');
		$('#add-license-form').bootstrapValidator('revalidateField', 'expiry_date');	
	});
        
       var validator =  $('#add-license-form').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
           
                
        
                issue_date: {
                    validators: {
                        callback: {
                            message: 'This field is required',
                            callback: function (value, validator, $field) {
                               var input1 = parseInt($('#issue_date').val(), 10) || 0;
				var input2 = parseInt($('#expiry_date').val(), 10) || 0;
								//console.log(input2);
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
                                    message: 'Date of issue should be greater than Date of expiry'
                                };
									} 
									else{
										return true;
									}
									}
									else{
									return true;
									}
								}
								else{
								return true;
								}
                                
                            }
                        }
                    }
                },
                expiry_date: {
                    validators: {
                        callback: {
                            message: 'Date of expiry should be greater than Date of issue',
                            callback: function (value, validator, $field) {
                               var input1 = parseInt($('#issue_date').val(), 10) || 0;
								var input2 = parseInt($('#expiry_date').val(), 10) || 0;
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
                                    message: 'Date of expiry should be greater than Date of issue'
                                };
                                } 
                                else{
                                        return true;
                                }
                                } 
                                else{
                                        return true;
                                }
                                }
                                else{
                                return true;
                                }
                                
                            }
                        }
                    }
                }
                
                
                
                
                

            }
        });  
}


$('.addbtn').live('click',function(){
    setTimeout(function(){
        $('.stDate_current').val("");
        $('.stDate_bo_c').val("");
    },100);
});




