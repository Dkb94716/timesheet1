<div class="tab-content" style="padding-left:11px;padding-right:10px;">
                            <a href="#add-bank-accounts-modal-box" data-toggle="modal" class="btn-xs btn-success pull-right" style="margin-bottom:5px;">Add More</a>
                            <div class="widget-body overflow-x" style="padding:10px 0px;width:100%;">
                                <table class="dynamicTable tableTools table table-striped overflow-x">
                                    <thead>
                                        <tr style="background-color:#c72a25; color:#FFF;">
                                            <th class="thead-th-padg" width="160px">Name of bank</th>
                                            <th class="thead-th-padg" width="160px">Type of account</th>
                                            <th class="thead-th-padg" width="160px">Currency</th>
                                            <th class="thead-th-padg" width="160px">Account no.</th>
                                            <th class="thead-th-padg" width="160px" style="text-align:center;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="gradeX">
                                            <td><span class="td-text-area">HDFC</span></td>
                                            <td><span class="td-text-area">Saving</span></td>
                                            <td><span class="td-text-area">Indian</span></td>
                                            <td><span class="td-text-area">A0052368</span></td>
                                            <td style="width:100px !important; text-align:center;" class="">
                                                <a href="#edit-bank-accounts-modal-box" data-toggle="modal" class="btn-xs btn-warning" style="margin-left:5px;">Edit</a>
                                                <a href="#delete-bank-accounts-modal-box" data-toggle="modal" class="btn-xs btn-danger" style="margin-left:5px;">Delete</a>
                                            </td>
                                        </tr>                           
                                    </tbody>
                                </table>
                            </div>
                        </div>


<script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>        
<!--<script src="<?php echo base_url(); ?>assets/js/db_ready.js"></script>        -->
<script>
//    dynamicTable_license = 'dynamicTable1';
//    $(document).ready(function(){
//        // default stuff
//        stuff_on_ready();
//        ready_on_db();
//    });
//    
//    
//    function stuff_on_ready(){
//        var core_url=CURRENT_URL;
//        // LICENSE
//        // For load default grid.
////        var load_data_body1 = "license_data_body";
////        blockUI(load_data_body1);
////        var url1 = core_url+"/client/get_license_grid_data";
////        grid_data(load_data_body1,url1,dynamicTable_license);
//
//        // validation
//        
//       var validator =  $('#add-license-form').bootstrapValidator({
//        message: 'This value is not valid',
//        fields: {
//           license_type: {
//                        validators: {
//                                notEmpty: {
//                                        message: 'This field is required'
//                                }
//                        }
//                }
//
//            }
//        })
//        .on('success.form.bv', function (e) {
//            e.preventDefault();
//            submit_license_form('add-license-form','add','');   
//        });
//        
//        $(".close,.cancel").click(function() {
//            $('.form-group').removeClass('has-error has-feedback');
//            $('.form-group').find('small.help-block').hide();
//            $('.form-group').find('i.form-control-feedback').hide();
//        });
//    }
//    
//    function data_modal_box_license_type(action,add_div,edit_delete_div){
//        var element_id = 'license-type-show-hide_div';
//        var placeholder = 'Type of license';
//        var dbname = 'db_lp_license_type';
//        var db_field_name = 'type_name';
//        var db_field_id = 'type_id';
//        var loader_element_id = 'modal-body-license-add'
//        var item_id = 0;
//        if(action=="add"){
//            var title = 'Add type of license';
//            var success_msg_id = 'license_success_msg_add';
//            var error_msg_id = 'license_err_msg_add';
//            data_modal_box_add(title,element_id,placeholder,dbname,action,db_field_name,db_field_id,item_id,add_div,edit_delete_div,success_msg_id,error_msg_id,loader_element_id)
//        } else if(action=="edit"){
//            var item_id = $("#"+element_id+" :selected").val();
//            var item_name = $("#"+element_id+" :selected").text();
//            var title = 'Edit type of license';
//            var success_msg_id = 'license_success_msg_add';
//            var error_msg_id = 'license_err_msg_add';
//            data_modal_box_edit(title,element_id,placeholder,dbname,action,db_field_name,db_field_id,item_id,add_div,edit_delete_div,item_name,success_msg_id,error_msg_id,loader_element_id)
//        } else if(action=="delete"){
//            var title = 'Delete type of license';
//            var success_msg_id = 'license_success_msg_add';
//            var error_msg_id = 'license_err_msg_add';
//            item_id = "permit-type-show-hide_div";
//            data_modal_box_delete(title,element_id,placeholder,dbname,action,db_field_name,db_field_id,item_id,add_div,edit_delete_div,success_msg_id,error_msg_id,loader_element_id)
//        }
//    }
//    
//    function edit_license_bar(id){
//        blockUI('license_edit_box');
//        var load_data_body = 'license_edit_box';
//        var db_name = 'db_lp_license';
//        var db_field_id = 'license_id';
//        var tag = 'license';
//        var view_folder = 'LicensePermit';
//        var core_url=CURRENT_URL;
//        var url = core_url+"/client/get_item_detail_for_edit";
//        edit_box(load_data_body,url,id,db_name,db_field_id,tag,view_folder)
//    }
//    
//    function submit_license_form(form,action,id){
//        var load_data_body = 'license_data_body';
//        var core_url=CURRENT_URL;
//        var url = core_url+"/client/submit_license_form";
//        blockUI(load_data_body);
//        submit_form(form,load_data_body,url,action,id,function(data){
//            var url = core_url+"/client/get_license_grid_data";
//            grid_data(load_data_body,url,dynamicTable_license);
//        });
//        
//       
//    }
//    
//    function delete_license_bar(id){
//        var load_data_body = 'license_data_body';
//        var db_name = 'db_lp_license';
//        var db_field_id = 'license_id';
//        var core_url=CURRENT_URL;
//        var url = core_url+"/client/delete_item";
//        var title = "Delete License";
//        var grid_url = CURRENT_URL+"/client/get_license_grid_data";
//        delete_box(load_data_body,url,id,db_name,db_field_id,title,grid_url,dynamicTable_license)
//    }
//    
//    
//    
//    
//</script>

<script>
    $(document).ready(function() {
        /*********START Accounts yes no radio button**********/
        $("#show_date_of_special").click(function() {
            $("#date_of_special").slideDown();
        });

        $("#hide_date_of_special").click(function() {
            $("#date_of_special").slideUp();
        });
        /*********END Accounts yes no radio button**********/

        /*********START Accounts yes no radio button-edit**********/
        $("#show_date_of_special-edit").click(function() {
            $("#date_of_special-edit").slideDown();
        });

        $("#hide_date_of_special-edit").click(function() {
            $("#date_of_special-edit").slideUp();
        });
        /*********END Accounts yes no radio button-edit**********/

        /*********START TXA/TRC yes no radio button**********/
        $("#show_trc_available").click(function() {
            $("#show_hide_trc_available_div").slideDown();
        });
        $("#hide_trc_available").click(function() {
            $("#show_hide_trc_available_div").slideUp();
        });
        /***********END TXA/TRC yes no radio button**********/

        /*********START Substance Conditions Adopted yes no radio button**********/
        $("#show_address").click(function() {
            $("#show-hide_address").slideDown();
        });
        $("#hide_address").click(function() {
            $("#show-hide_address").slideUp();
        });
        /***********END Substance Conditions Adopted yes no radio button**********/

        /*********START Adopted Arbitration yes no radio button**********/
        $("#show_adopted_arbitration").click(function() {
            $("#show_hide_adopted_arbitration_div").slideDown();
        });
        $("#hide_adopted_arbitration").click(function() {
            $("#show_hide_adopted_arbitration_div").slideUp();
        });
        /***********END Adopted Arbitration yes no radio button**********/

        /*********START shares_are_listed yes no radio button**********/
        $("#direcgorship_textarea_show_div").click(function() {
            $("#directorship_textarea_show_hide_div").slideDown();
        });
        $("#direcgorship_textarea_hide_div").click(function() {
            $("#directorship_textarea_show_hide_div").slideUp();
        });
        /***********END shares_are_listed yes no radio button**********/

        /*********START Directorship yes no radio button**********/
        $("#show_share_are_listed").click(function() {
            $("#show_hide_shares_are_listed").slideDown();
        });
        $("#hide_share_are_listed").click(function() {
            $("#show_hide_shares_are_listed").slideUp();
        });
        /***********END Directorship yes no radio button**********/

        /*********START KYC passport yes no radio button**********/
        $("#kyc_passport_show_div").click(function() {
            $("#kyc_passport_hide_show_div").slideDown();
        });
        $("#kyc_passport_hide_div").click(function() {
            $("#kyc_passport_hide_show_div").slideUp();
        });
        /***********END KYC passport yes no radio button**********/

        /*********START KYC bank refrence yes no radio button**********/
        $("#bank_refrence_show_div").click(function() {
            $("#bank_refrence_show_hide_div").slideDown();
        });
        $("#bank_refrence_hide_div").click(function() {
            $("#bank_refrence_show_hide_div").slideUp();
        });
        /***********END KYC refrence yes no radio button**************/

        /*********START Proof of address yes no radio button**********/
        $("#proof_of_address_show_div").click(function() {
            $("#proof_of_address_show_hide_div").slideDown();
        });
        $("#proof_of_address_hide_div").click(function() {
            $("#proof_of_address_show_hide_div").slideUp();
        });
        /***********END Proof of address yes no radio button**********/

        /*********START passport yes no radio button**********/
        $("#audited_accounts_show_div").click(function() {
            $("#audited_accounts_show_hide_div").slideDown();
        });
        $("#audited_accounts_hide_div").click(function() {
            $("#audited_accounts_show_hide_div").slideUp();
        });
        /***********END passport yes no radio button**********/

        /*********START passport yes no radio button**********/
        $("#passport_show_div").click(function() {
            $("#passport_show_hide_div").slideDown();
        });
        $("#passport_hide_div").click(function() {
            $("#passport_show_hide_div").slideUp();
        });
        /***********END passport yes no radio button**********/

        /*********START beneficial-owner-passport_show_hide_div yes no radio button**********/
        $("#beneficial-owner-passport_show_div").click(function() {
            $("#beneficial-owner-passport_show_hide_div").slideDown();
        });
        $("#beneficial-owner-passport_hide_div").click(function() {
            $("#beneficial-owner-passport_show_hide_div").slideUp();
        });
        /***********END beneficial-owner-passport_show_hide_div yes no radio button**********/

        /*********START beneficial-owner-cv_show_hide_div yes no radio button**********/
        $("#beneficial-owner-cv_show_div").click(function() {
            $("#beneficial-owner-cv_show_hide_div").slideDown();
        });
        $("#beneficial-owner-cv_hide_div").click(function() {
            $("#beneficial-owner-cv_show_hide_div").slideUp();
        });
        /***********END beneficial-owner-cv_show_hide_div yes no radio button**********/

        /*********START  beneficial-owner-bank-reference_show_hide_div yes no radio button**********/
        $("#beneficial-owner-bank-reference_show_div").click(function() {
            $("#beneficial-owner-bank-reference_show_hide_div").slideDown();
        });
        $("#beneficial-owner-bank-reference_hide_div").click(function() {
            $("#beneficial-owner-bank-reference_show_hide_div").slideUp();
        });
        /***********END  beneficial-owner-bank-reference_show_hide_div yes no radio button**********/

        /*********START beneficial-owner-proof_add_show_hide_div yes no radio button**********/
        $("#beneficial-owner-proof_add_show_div").click(function() {
            $("#beneficial-owner-proof_add_show_hide_div").slideDown();
        });
        $("#beneficial-owner-proof_add_hide_div").click(function() {
            $("#beneficial-owner-proof_add_show_hide_div").slideUp();
        });
        /***********END beneficial-owner-proof_add_show_hide_div yes no radio button**********/

        /*********START register_of_directors_show_hide_div yes no radio button**********/
        $("#register_of_directors_show_div").click(function() {
            $("#register_of_directors_show_hide_div").slideDown();
        });
        $("#register_of_directors_hide_div").click(function() {
            $("#register_of_directors_show_hide_div").slideUp();
        });
        /***********END register_of_directors_show_hide_div yes no radio button**********/

        /*********START beneficial-owner-passport_show_hide_div yes no radio button**********/
        $("#beneficial-owner-passport-2_show_div").click(function() {
            $("#beneficial-owner-passport-2_show_hide_div").slideDown();
        });
        $("#beneficial-owner-passport-2_hide_div").click(function() {
            $("#beneficial-owner-passport-2_show_hide_div").slideUp();
        });
        /***********END beneficial-owner-passport_show_hide_div yes no radio button**********/

        /*********START beneficial-owner-audited-accounts_show_hide_div yes no radio button**********/
        $("#beneficial-owner-audited-accounts_show_div").click(function() {
            $("#beneficial-owner-audited-accounts_show_hide_div").slideDown();
        });
        $("#beneficial-owner-audited-accounts_hide_div").click(function() {
            $("#beneficial-owner-audited-accounts_show_hide_div").slideUp();
        });
        /***********END beneficial-owner-audited-accounts_show_hide_div yes no radio button**********/

        /*********START  beneficial-owner-bank-reference_show_hide_div yes no radio button**********/
        $("#beneficial-owner-bank-reference-2_show_div").click(function() {
            $("#beneficial-owner-bank-reference-2_show_hide_div").slideDown();
        });
        $("#beneficial-owner-bank-reference-2_hide_div").click(function() {
            $("#beneficial-owner-bank-reference-2_show_hide_div").slideUp();
        });
        /***********END  beneficial-owner-bank-reference_show_hide_div yes no radio button**********/

        /*********START beneficial-owner-proof_add-2_show_hide_div yes no radio button**********/
        $("#beneficial-owner-proof_add-2_show_div").click(function() {
            $("#beneficial-owner-proof_add-2_show_hide_div").slideDown();
        });
        $("#beneficial-owner-proof_add-2_hide_div").click(function() {
            $("#beneficial-owner-proof_add-2_show_hide_div").slideUp();
        });
        /***********END beneficial-owner-proof_add-2_show_hide_div yes no radio button**********/

        /*********START trusts_individual-are-there_show_hide_div yes no radio button**********/
        $("#trusts_individual-are-there_show_div").click(function() {
            $("#trusts_individual-are-there_show_hide_div").slideDown();
        });
        $("#trusts_individual-are-there_hide_div").click(function() {
            $("#trusts_individual-are-there_show_hide_div").slideUp();
        });
        /***********END trusts_individual-are-there_show_hide_div yes no radio button**********/

        /*********START trusts_individual-letter_of_wishes_show_div yes no radio button**********/
        $("#trusts_individual-letter_of_wishes_show_div").click(function() {
            $("#trusts_individual-letter_of_wishes_show_hide_div").slideDown();
        });
        $("#trusts_individual-letter_of_wishes_hide_div").click(function() {
            $("#trusts_individual-letter_of_wishes_show_hide_div").slideUp();
        });
        /***********END trusts_individual-letter_of_wishes_show_div yes no radio button**********/

        /*********START trusts_individual-are_accounts_show_hide_div yes no radio button**********/
        $("#trusts_individual-are_accounts_show_div").click(function() {
            $("#trusts_individual-are_accounts_show_hide_div").slideDown();
        });
        $("#trusts_individual-are_accounts_hide_div").click(function() {
            $("#trusts_individual-are_accounts_show_hide_div").slideUp();
        });
        /***********END trusts_individual-are_accounts_show_hide_div yes no radio button**********/

        /*********START trusts_individual-is_the_tax_show_hide_div yes no radio button**********/
        $("#trusts_individual-is_the_tax_show_div").click(function() {
            $("#trusts_individual-is_the_tax_show_hide_div").slideDown();
        });
        $("#trusts_individual-is_the_tax_hide_div").click(function() {
            $("#trusts_individual-is_the_tax_show_hide_div").slideUp();
        });
        /***********END trusts_individual-is_the_tax_show_hide_div yes no radio button**********/

        /*********START trusts_individual-settlor_hide_show_div yes no radio button**********/
        $("#trusts_individual-settlor-pas_show_div").click(function() {
            $("#trusts_individual-settlor-pas_hide_show_div").slideDown();
        });
        $("#trusts_individual-settlor-pas_hide_div").click(function() {
            $("#trusts_individual-settlor-pas_hide_show_div").slideUp();
        });
        /***********END trusts_individual-settlor_hide_show_div yes no radio button**********/

        /*********START trusts_individual-settlor_show_hide_div yes no radio button**********/
        $("#trusts_individual-settlor_show_div").click(function() {
            $("#trusts_individual-settlor_show_hide_div").slideDown();
        });
        $("#trusts_individual-settlor_hide_div").click(function() {
            $("#trusts_individual-settlor_show_hide_div").slideUp();
        });
        /***********END trusts_individual-settlor_show_hide_div yes no radio button**********/

        /*********START beneficial-owner-cv-2_show_hide_div yes no radio button**********/
        $("#beneficial-owner-cv-2_show_div").click(function() {
            $("#beneficial-owner-cv-2_show_hide_div").slideDown();
        });
        $("#beneficial-owner-cv-2_hide_div").click(function() {
            $("#beneficial-owner-cv-2_show_hide_div").slideUp();
        });
        /***********END beneficial-owner-cv-2_show_hide_div yes no radio button**********/

        /*********START  beneficial-owner-bank-reference-3_show_hide_div yes no radio button**********/
        $("#beneficial-owner-bank-reference-3_show_div").click(function() {
            $("#beneficial-owner-bank-reference-3_show_hide_div").slideDown();
        });
        $("#beneficial-owner-bank-reference-3_hide_div").click(function() {
            $("#beneficial-owner-bank-reference-3_show_hide_div").slideUp();
        });
        /***********END  beneficial-owner-bank-reference-3_show_hide_div yes no radio button**********/

        /*********START beneficial-owner-proof_add-3_show_hide_div yes no radio button**********/
        $("#beneficial-owner-proof_add-3_show_div").click(function() {
            $("#beneficial-owner-proof_add-3_show_hide_div").slideDown();
        });
        $("#beneficial-owner-proof_add-3_hide_div").click(function() {
            $("#beneficial-owner-proof_add-3_show_hide_div").slideUp();
        });
        /***********END beneficial-owner-proof_add-3_show_hide_div yes no radio button**********/

        /*********START trusts_carporate_regs_director_show_hide_div yes no radio button**********/
        $("#trusts_carporate_regs_director_show_div").click(function() {
            $("#trusts_carporate_regs_director_show_hide_div").slideDown();
        });
        $("#trusts_carporate_regs_director_hide_div").click(function() {
            $("#trusts_carporate_regs_director_show_hide_div").slideUp();
        });
        /***********END trusts_carporate_regs_director_show_hide_div yes no radio button**********/

        /*********START trusts_carporate-settlor-pas_hide_show_div yes no radio button**********/
        $("#trusts_carporate-settlor-pas_show_div").click(function() {
            $("#trusts_carporate-settlor-pas_hide_show_div").slideDown();
        });
        $("#trusts_carporate-settlor-pas_hide_div").click(function() {
            $("#trusts_carporate-settlor-pas_hide_show_div").slideUp();
        });
        /***********END trusts_carporate-audited_account_show_hide_div yes no radio button**********/

        /*********START trusts_carporate-audited_account_show_hide_div yes no radio button**********/
        $("#trusts_carporate-audited_account_show_div").click(function() {
            $("#trusts_carporate-audited_account_show_hide_div").slideDown();
        });
        $("#trusts_carporate-audited_account_hide_div").click(function() {
            $("#trusts_carporate-audited_account_show_hide_div").slideUp();
        });
        /***********END trusts_carporate-settlor-pas_hide_show_div yes no radio button**********/

        /*********START trusts_carporate-bank_ref_show_hide_div yes no radio button**********/
        $("#trusts_carporate-bank_ref_show_div").click(function() {
            $("#trusts_carporate-bank_ref_show_hide_div").slideDown();
        });
        $("#trusts_carporate-bank_ref_hide_div").click(function() {
            $("#trusts_carporate-bank_ref_show_hide_div").slideUp();
        });
        /***********END trusts_carporate-bank_ref_show_hide_div yes no radio button**********/

        /*********START trusts_carporate-proof_add_show_hide_div yes no radio button**********/
        $("#trusts_carporate-proof_add_show_div").click(function() {
            $("#trusts_carporate-proof_add_show_hide_div").slideDown();
        });
        $("#trusts_carporate-proof_add_hide_div").click(function() {
            $("#trusts_carporate-proof_add_show_hide_div").slideUp();
        });
        /***********END trusts_carporate-proof_add_show_hide_div yes no radio button**********/

        /*********START share-holder-individual-pas_show_hide_div yes no radio button**********/
        $("#share-holder-individual-pas_show_div").click(function() {
            $("#share-holder-individual-pas_show_hide_div").slideDown();
        });
        $("#share-holder-individual-pas_hide_div").click(function() {
            $("#share-holder-individual-pas_show_hide_div").slideUp();
        });
        /***********END share-holder-individual-pas_show_hide_div yes no radio button**********/

        /*********START share-holder-individula-cv_show_hide_div yes no radio button**********/
        $("#share-holder-individula-cv_show_div").click(function() {
            $("#share-holder-individula-cv_show_hide_div").slideDown();
        });
        $("#share-holder-individula-cv_hide_div").click(function() {
            $("#share-holder-individula-cv_show_hide_div").slideUp();
        });
        /***********END share-holder-individula-cv_show_hide_div yes no radio button**********/

        /*********START share-holder-individula-bank-reference_show_hide_div yes no radio button**********/
        $("#share-holder-individula-bank-reference_show_div").click(function() {
            $("#share-holder-individula-bank-reference_show_hide_div").slideDown();
        });
        $("#share-holder-individula-bank-reference_hide_div").click(function() {
            $("#share-holder-individula-bank-reference_show_hide_div").slideUp();
        });
        /***********END share-holder-individula-bank-reference_show_hide_div yes no radio button**********/

        /*********START share-holder-individual-proof_add_show_hide_div yes no radio button**********/
        $("#share-holder-individual-proof_add_show_div").click(function() {
            $("#share-holder-individual-proof_add_show_hide_div").slideDown();
        });
        $("#share-holder-individual-proof_add_hide_div").click(function() {
            $("#share-holder-individual-proof_add_show_hide_div").slideUp();
        });
        /***********END share-holder-individual-proof_add_show_hide_div yes no radio button**********/

        /*********START share-holder-individual-reg-dict_show_hide_div yes no radio button**********/
        $("#share-holder-individual-reg-dict_show_div").click(function() {
            $("#share-holder-individual-reg-dict_show_hide_div").slideDown();
        });
        $("#share-holder-individual-reg-dict_hide_div").click(function() {
            $("#share-holder-individual-reg-dict_show_hide_div").slideUp();
        });
        /***********END share-holder-individual-reg-dict_show_hide_div yes no radio button**********/

        /*********START share-holder-corporate-pas_show_hide_div yes no radio button**********/
        $("#share-holder-corporate-pas_show_div").click(function() {
            $("#share-holder-corporate-pas_show_hide_div").slideDown();
        });
        $("#share-holder-corporate-pas_hide_div").click(function() {
            $("#share-holder-corporate-pas_show_hide_div").slideUp();
        });
        /***********END share-holder-corporate-pas_show_hide_div yes no radio button**********/

        /*********START share-holder-corporate-audited-acco_show_hide_div yes no radio button**********/
        $("#share-holder-corporate-audited-acco_show_div").click(function() {
            $("#share-holder-corporate-audited-acco_show_hide_div").slideDown();
        });
        $("#share-holder-corporate-audited-acco_hide_div").click(function() {
            $("#share-holder-corporate-audited-acco_show_hide_div").slideUp();
        });
        /***********END share-holder-corporate-audited-acco_show_hide_div yes no radio button**********/

        /*********START share-holder-corporate-bank-reference_show_hide_div yes no radio button**********/
        $("#share-holder-corporate-bank-reference_show_div").click(function() {
            $("#share-holder-corporate-bank-reference_show_hide_div").slideDown();
        });
        $("#share-holder-corporate-bank-reference_hide_div").click(function() {
            $("#share-holder-corporate-bank-reference_show_hide_div").slideUp();
        });
        /***********END share-holder-corporate-bank-reference_show_hide_div yes no radio button**********/

        /*********START share-holder-corporate-proof_add_show_hide_div yes no radio button**********/
        $("#share-holder-corporate-proof_add_show_div").click(function() {
            $("#share-holder-corporate-proof_add_show_hide_div").slideDown();
        });
        $("#share-holder-corporate-proof_add_hide_div").click(function() {
            $("#share-holder-corporate-proof_add_show_hide_div").slideUp();
        });
        /***********END share-holder-corporate-proof_add_show_hide_div yes no radio button**********/

        /*********START bank-accou-net-banking_show_hide_div yes no radio button**********/
        $("#bank-accou-net-banking_show_div").click(function() {
            $("#bank-accou-net-banking_show_hide_div").slideDown();
        });
        $("#bank-accou-net-banking_hide_div").click(function() {
            $("#bank-accou-net-banking_show_hide_div").slideUp();
        });
        /***********END bank-accou-net-banking_show_hide_div yes no radio button**********/

        /*********START client-info-group-company_show_hide_div yes no radio button**********/
        $("#client-info-group-company_show_div").click(function() {
            $("#client-info-group-company_show_hide_div").slideDown();
        });
        $("#client-info-group-company_hide_div").click(function() {
            $("#client-info-group-company_show_hide_div").slideUp();
        });
        /***********END client-info-group-company_show_hide_div yes no radio button**********/


        /*************START reset add div element*****************/
        $(".btn-primary").click(function() {
            $(".removed_div").html('');
        });
        /*************END reset add div element*****************/

        

        
        /*********START permit-type-show-hide_div-edit on change function**********/
        $('#permit-type-show-hide_div-edit').change(function() {
            if ($('#permit-type-show-hide_div-edit').val() == '') {
                $('#permit-type-plus-icon-edit').show();
                $('#permit-type-edit-delete-icon-edit').hide();
            } else {
                $('#permit-type-plus-icon-edit').hide();
                $('#permit-type-edit-delete-icon-edit').show();

            }
        });
        /***********END permit-type-show-hide_div-edit on change function**********/

        /*********START license-type-show-hide_div-edit on change function**********/
        $('#license-type-show-hide_div-edit').change(function() {
            if ($('#license-type-show-hide_div-edit').val() == '1') {
                $('#license-type-plus-icon-edit').show();
                $('#license-type-edit-delete-icon-edit').hide();
            } else {
                $('#license-type-plus-icon-edit').hide();
                $('#license-type-edit-delete-icon-edit').show();

            }
        });
        /***********END license-type-show-hide_div-edit on change function**********/

        /*********START bank-onwer_bank-name-show-hide_div on change function**********/
        $('#bank-onwer_bank-name-show-hide_div').on('change', function() {
            if ($('#bank-onwer_bank-name-show-hide_div').val() == '') {
                $('#bank-onwer_bank-name-plus-icon').show();
                $('#bank-onwer_bank-name-edit-delete-icon').hide();
            } else {
                $('#bank-onwer_bank-name-plus-icon').hide();
                $('#bank-onwer_bank-name-edit-delete-icon').show();

            }
        });
        /***********END bank-onwer_bank-name-show-hide_div on change function**********/

        /*********START bank-onwer_account-type-show-hide_div on change function**********/
        $('#bank-onwer_account-type-show-hide_div').on('change', function() {
            if ($('#bank-onwer_account-type-show-hide_div').val() == '') {
                $('#bank-onwer_account-type-plus-icon').show();
                $('#bank-onwer_account-type-edit-delete-icon').hide();
            } else {
                $('#bank-onwer_account-type-plus-icon').hide();
                $('#bank-onwer_account-type-edit-delete-icon').show();

            }
        });
        /***********END bank-onwer_account-type-show-hide_div on change function**********/

        /*********START bank-onwer_currency-show-hide_div on change function**********/
        $('#bank-onwer_currency-show-hide_div').on('change', function() {
            if ($('#bank-onwer_currency-show-hide_div').val() == '') {
                $('#bank-onwer_currency-plus-icon').show();
                $('#bank-onwer_currency-edit-delete-icon').hide();
            } else {
                $('#bank-onwer_currency-plus-icon').hide();
                $('#bank-onwer_currency-edit-delete-icon').show();

            }
        });
        /***********END bank-onwer_currency-show-hide_div on change function**********/

        /*********START bank-onwer_account-no-show-hide_div on change function**********/
        $('#bank-onwer_account-no-show-hide_div').on('change', function() {
            if ($('#bank-onwer_account-no-show-hide_div').val() == '') {
                $('#bank-onwer_account-no-plus-icon').show();
                $('#bank-onwer_account-no-edit-delete-icon').hide();
            } else {
                $('#bank-onwer_account-no-plus-icon').hide();
                $('#bank-onwer_account-no-edit-delete-icon').show();

            }
        });
        /***********END bank-onwer_account-no-show-hide_div on change function**********/

        /*********START bank-onwer_bank-name-show-hide_div-edit on change function**********/
        $('#bank-onwer_bank-name-show-hide_div-edit').on('change', function() {
            if ($('#bank-onwer_bank-name-show-hide_div-edit').val() == '') {
                $('#bank-onwer_bank-name-plus-icon-edit').show();
                $('#bank-onwer_bank-name-edit-delete-icon-edit').hide();
            } else {
                $('#bank-onwer_bank-name-plus-icon-edit').hide();
                $('#bank-onwer_bank-name-edit-delete-icon-edit').show();

            }
        });
        /***********END bank-onwer_bank-name-show-hide_div-edit on change function**********/

        /*********START bank-onwer_account-type-show-hide_div-edit on change function**********/
        $('#bank-onwer_account-type-show-hide_div-edit').on('change', function() {
            if ($('#bank-onwer_account-type-show-hide_div-edit').val() == '') {
                $('#bank-onwer_account-type-plus-icon-edit').show();
                $('#bank-onwer_account-type-edit-delete-icon-edit').hide();
            } else {
                $('#bank-onwer_account-type-plus-icon-edit').hide();
                $('#bank-onwer_account-type-edit-delete-icon-edit').show();

            }
        });
        /***********END bank-onwer_account-type-show-hide_div-edit on change function**********/

        /*********START bank-onwer_currency-show-hide_div-edit on change function**********/
        $('#bank-onwer_currency-show-hide_div-edit').on('change', function() {
            if ($('#bank-onwer_currency-show-hide_div-edit').val() == '') {
                $('#bank-onwer_currency-plus-icon-edit').show();
                $('#bank-onwer_currency-edit-delete-icon-edit').hide();
            } else {
                $('#bank-onwer_currency-plus-icon-edit').hide();
                $('#bank-onwer_currency-edit-delete-icon-edit').show();

            }
        });
        /***********END bank-onwer_currency-show-hide_div-edit on change function**********/

        /*********START bank-onwer_account-no-show-hide_div-edit on change function**********/
        $('#bank-onwer_account-no-show-hide_div-edit').on('change', function() {
            if ($('#bank-onwer_account-no-show-hide_div-edit').val() == '') {
                $('#bank-onwer_account-no-plus-icon-edit').show();
                $('#bank-onwer_account-no-edit-delete-icon-edit').hide();
            } else {
                $('#bank-onwer_account-no-plus-icon-edit').hide();
                $('#bank-onwer_account-no-edit-delete-icon-edit').show();

            }
        });
        /***********END bank-onwer_account-no-show-hide_div-edit on change function**********/


        /*********START clint-info-status-show-hide_div change function**********/
        $('#clint-info-status-show-hide_div').on('change', function() {
            if ($('#clint-info-status-show-hide_div').val() == '0') {
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
        $('#client-inof-type-of-company-show-hide_div').on('change', function() {
            if ($('#client-inof-type-of-company-show-hide_div').val() == '0') {
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
        $('#client-info-activity-show-hide_div').on('change', function() {
            if ($('#client-info-activity-show-hide_div').val() == '0') {
                //alert("test");
                //$('#client-info-activity-plus-icon').show();
                //$('#client-info-activity-edit-delete-icon').hide();
                $("#client-info-activity_show_hide_input_filed").slideUp();
            } else {
                //$('#client-info-activity-plus-icon').hide();
                //$('#client-info-activity-edit-delete-icon').show();
                $("#client-info-activity_show_hide_input_filed").slideDown();

            }
        });
        /***********END client-info-activity-show-hide_div on change function**********/



        /*********START share-type-type-show-hide_div on change function**********/
        $('#share-type-type-show-hide_div').on('change', function() {
            if ($('#share-type-type-show-hide_div').val() == '') {
                $('#share-type-plus-icon').show();
                $('#share-type-edit-delete-icon').hide();
            } else {
                $('#share-type-plus-icon').hide();
                $('#share-type-edit-delete-icon').show();

            }
        });
        /***********END share-type-type-show-hide_div on change function**********/

        /*********START share-type-type-show-hide_div-corporate on change function**********/
        $('#share-type-type-show-hide_div-corporate').on('change', function() {
            if ($('#share-type-type-show-hide_div-corporate').val() == '') {
                $('#share-type-plus-icon-corporate').show();
                $('#share-type-edit-delete-icon-corporate').hide();
            } else {
                $('#share-type-plus-icon-corporate').hide();
                $('#share-type-edit-delete-icon-corporate').show();

            }
        });
        /***********END share-type-type-show-hide_div-corporate on change function**********/

        /*********START share-type-type-show-hide_div-corporate-transfer on change function**********/
        $('#share-type-type-show-hide_div-corporate-transfer').on('change', function() {
            if ($('#share-type-type-show-hide_div-corporate-transfer').val() == '') {
                $('#share-type-plus-icon-corporate-transfer').show();
                $('#share-type-edit-delete-icon-corporate-transfer').hide();
            } else {
                $('#share-type-plus-icon-corporate-transfer').hide();
                $('#share-type-edit-delete-icon-corporate-transfer').show();

            }
        });
        /***********END share-type-type-show-hide_div-corporate-transfer on change function**********/

        $('.modal').modal({backdrop: 'static', show: false, keyboard: false})

        $('.datepicker2').bdatepicker({
            format: "dd MM yyyy",
            autoclose: true,
        });
        $('.datepicker2').bdatepicker("update", new Date());


        /********START adding more div elements********/
        $('#add_filed').on('click', function() {
            var inputToCopy = '<div class="removed_div"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">' + $('#addinput :first-child').html() + '</div><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">' + $('#addinput').children().eq(1).html() + '</div></div>';
            $(inputToCopy).appendTo($('#addinput'));
            $("#addinput").children().last().children().eq(0).find("label").append('<a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" onClick="deleteDiv(this)"><i class="fa fa-fw icon-delete-symbol" style="width:10px;color:#fff;font-size:10px;"></i></a>');
            /*$('#addinput').children().children().find('label').after('<a href="#nogo" class="btn-xs btn-danger pull-right"><i class="fa fa-fw icon-delete-symbol pull-right removed_color" onClick="deleteDiv(this)"></i></a>');*/
            $('.datepicker2').bdatepicker({
                format: "dd MM yyyy",
                autoclose: true
            });
            $('.datepicker2').bdatepicker("update", new Date());
        });

        $('#add_date_of_review_btn').on('click', function() {
            var str = '<div class="removed_div"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;"><label class="client-detailes-sub_heading">Date of review</label><div class="col-md-10" style="padding-left:0px;"><div class="input-group date datepicker2 col-sm-12"><input class="form-control height_25 stDate" type="text"><span class="input-group-addon padding_3"><i class="fa fa-th"></i></span></div></div><div class="col-md-2" style="padding:0px;"><a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" style="padding-left:0;"><i class="fa fa-fw icon-delete-symbol removed_icon_btn pull-right removed_color" onClick="deleteDiv(this)"></i></a></div></div></div>';
            $(str).appendTo($('#add_date_of_review_div'));
            $('.datepicker2').bdatepicker({
                format: "dd MM yyyy",
                autoclose: true
            });
            $('.datepicker2').bdatepicker("update", new Date());
        });

        $('#add_checlist_no_btn').on('click', function() {
            var str = '<div class="removed_div"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;"><label class="client-detailes-sub_heading">Checklist number</label><div class="col-md-10" style="padding-left:0px;"><div class="input-group date datepicker2 col-sm-12"><input class="form-control height_25 stDate" type="text"></div></div><div class="col-md-2" style="padding:0px;"><a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" style="padding-left:0;"><i class="fa fa-fw icon-delete-symbol removed_icon_btn pull-right removed_color" onClick="deleteDiv(this)"></i></a></div></div></div>';
            $(str).appendTo($('#add_checlist_no_div'));
        });

        $('#add_date_of_review-edit_btn').on('click', function() {
            var str = '<div class="removed_div"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;"><label class="client-detailes-sub_heading">Date of review</label><div class="col-md-10" style="padding-left:0px;"><div class="input-group date datepicker2 col-sm-12"><input class="form-control height_25 stDate" type="text"><span class="input-group-addon padding_3"><i class="fa fa-th"></i></span></div></div><div class="col-md-2" style="padding:0px;"><a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" style="padding-left:0;"><i class="fa fa-fw icon-delete-symbol removed_icon_btn pull-right removed_color" onClick="deleteDiv(this)"></i></a></div></div></div>';
            $(str).appendTo($('#add_date_of_review-edit_div'));
            $('.datepicker2').bdatepicker({
                format: "dd MM yyyy",
                autoclose: true
            });
            $('.datepicker2').bdatepicker("update", new Date());
        });


        $('#add_authoried_filed-btn').on('click', function() {
            var str = '<div class="removed_div"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;"><label class="client-detailes-sub_heading">Name of authorised persons</label><a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" onclick="deleteDiv1(this)"><i class="fa fa-fw icon-delete-symbol" style="width:10px;color:#fff;font-size:10px;"></i></a><input type="text" class="form-control height_25 plahole_font" style="width: 100%;"></div><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;"><label class="client-detailes-sub_heading" style="width:100%;">Address</label><input type="text" class="form-control height_25 plahole_font" style="width: 100%;"></div><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;"><label class="client-detailes-sub_heading" style="width:100%;">Email</label><input type="text" class="form-control height_25 plahole_font" style="width: 100%;"></div><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;"><label class="client-detailes-sub_heading" style="width:100%;">Phone number</label><input type="text" class="form-control height_25 plahole_font" style="width: 100%;"></div></div>';
            $(str).appendTo($('#add_authoried_filed'));
        });


        /********END adding more div elements********/

        /********START Reset Modal Box***************/
        $('.modal').on('hidden.bs.modal', function() {

            for (var k = 0; k < $(this).find(".radioNoBtn").length; k++) {
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
            $(this).find('input.stDate').bdatepicker("update", new Date());
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

    });
    function deleteDiv(myDiv) {
        $(myDiv).parent().parent().parent().remove()
    }
    function deleteDiv1(myDiv) {
        $(myDiv).parent().parent().remove()
    }
</script>
<!--    <script src="../assets/library/bootstrap/js/bootstrap.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="../assets/plugins/core_nicescroll/jquery.nicescroll.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="../assets/plugins/core_preload/pace.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="../assets/components/core_preload/preload.pace.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="../assets/components/forms_elements_fuelux-checkbox/fuelux-checkbox.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>-->

<script src="<?php echo base_url(); ?>assets/components/forms_elements_fuelux-radio/fuelux-radio.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="<?php echo base_url(); ?>assets/plugins/forms_elements_jasny-fileupload/js/bootstrap-fileupload.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="<?php echo base_url(); ?>assets/plugins/forms_editors_wysihtml5/js/wysihtml5-0.3.0_rc2.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="<?php echo base_url(); ?>assets/plugins/forms_editors_wysihtml5/js/bootstrap-wysihtml5-0.0.2.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="<?php echo base_url(); ?>assets/components/forms_editors_wysihtml5/wysihtml5.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="<?php echo base_url(); ?>assets/components/forms_elements_button-states/button-loading.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<!--    <script src="../assets/plugins/forms_elements_bootstrap-select/js/bootstrap-select.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>-->
<!--    <script src="../assets/components/forms_elements_bootstrap-select/bootstrap-select.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>-->
<!--    <script src="../assets/plugins/forms_elements_select2/js/select2.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>-->
<script src="<?php echo base_url(); ?>assets/components/forms_elements_select2/select2.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="<?php echo base_url(); ?>assets/plugins/forms_elements_multiselect/js/jquery.multi-select.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="<?php echo base_url(); ?>assets/components/forms_elements_multiselect/multiselect.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="<?php echo base_url(); ?>assets/plugins/forms_elements_inputmask/jquery.inputmask.bundle.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="<?php echo base_url(); ?>assets/components/forms_elements_inputmask/inputmask.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<!--    <script src="../assets/plugins/forms_elements_bootstrap-datepicker/js/bootstrap-datepicker.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>-->
<!--    <script src="../assets/components/forms_elements_bootstrap-datepicker/bootstrap-datepicker.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>-->
<!--    <script src="../assets/components/menus/sidebar.main.init.js?v=v1.0.0-rc1"></script>-->
<!--    <script src="../assets/components/menus/sidebar.collapse.init.js?v=v1.0.0-rc1"></script>-->

<script src="<?php echo base_url(); ?>assets/components/ui_modals/modals.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<!--	<script src="http://dev.clavistechnologies.com/newtimesheet/assets/js/bootstrapValidator.min.js"></script>-->

<!---------START Add Bank Accounts Modal box-------->
        <div class="modal fade"  id="add-bank-accounts-modal-box">
            <div class="modal-dialog modal_box_custome_size">
                <div class="modal-content">
                    <!-- Modal heading -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Add Bank Information</h3>
                    </div>
                    <!-- // Modal heading END -->

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="innerLR" style="padding:0;">
                            <form class="form-horizontal"  role="form">
								<div class="col-md-6">
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Name of bank</label>
										<div class="col-md-10" style="padding-left:0px;">
											<select class="height_25 plahole_font" id="bank-onwer_bank-name-show-hide_div" style="width: 100%;">
												<option value="">Select bank</option>
												<option value="1">HDFC</option>
												<option value="2">IDBI</option>
												<option value="3">ICICI</option>
												<option value="4">HSBC</option>
											</select>
										</div>
										<div class="col-md-2" style="padding:0px;">
											<a href="#add-more-bank-account-bank-name-modal-box" id="bank-onwer_bank-name-plus-icon" data-toggle="modal" class="btn-xs btn-success pull-right"><i class="fa fa-plus" style="font-size:14px;margin-top:3px;"></i></a>
											<span id="bank-onwer_bank-name-edit-delete-icon" style="display:none;">
												<a href="#delete-more-bank-account-bank-name-modal-box" data-toggle="modal" class="btn-xs btn-danger pull-right" style="margin-left:5px;"><i class="fa fa-trash-o" style="font-size:14px;"></i></a>
												<a href="#edit-more-bank-account-bank-name-modal-box" data-toggle="modal" class="btn-xs btn-warning pull-right"><i class="fa fa-edit" style="font-size:14px;"></i></a>
											</span>
										</div>
									</div>
									
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Type of account</label>
										<div class="col-md-10" style="padding-left:0px;">
											<select class="height_25 plahole_font" id="bank-onwer_account-type-show-hide_div" style="width: 100%;">
												<option value="">Select account</option>
												<option value="1">Savings</option>
												<option value="2">Current</option>
											</select>
										</div>
										<div class="col-md-2" style="padding:0px;">
											<a href="#add-more-bank-account-account-type-modal-box" id="bank-onwer_account-type-plus-icon" data-toggle="modal" class="btn-xs btn-success pull-right"><i class="fa fa-plus" style="font-size:14px;margin-top:3px;"></i></a>
											<span id="bank-onwer_account-type-edit-delete-icon" style="display:none;">
												<a href="#delete-more-bank-account-account-type-modal-box" data-toggle="modal" class="btn-xs btn-danger pull-right" style="margin-left:5px;"><i class="fa fa-trash-o" style="font-size:14px;"></i></a>
												<a href="#edit-more-bank-account-account-type-modal-box" data-toggle="modal" class="btn-xs btn-warning pull-right"><i class="fa fa-edit" style="font-size:14px;"></i></a>
											</span>
										</div>
									</div>
									
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Currency</label>
										<div class="col-md-10" style="padding-left:0px;">
											<select class="height_25 plahole_font" id="bank-onwer_currency-show-hide_div" style="width: 100%;">
												<option value="">Select currency</option>
												<option value="1">MUR</option>
											</select>
										</div>
										<div class="col-md-2" style="padding:0px;">
											<a href="#add-more-bank-account-currency-modal-box" id="bank-onwer_currency-plus-icon" data-toggle="modal" class="btn-xs btn-success pull-right"><i class="fa fa-plus" style="font-size:14px;margin-top:3px;"></i></a>
											<span id="bank-onwer_currency-edit-delete-icon" style="display:none;">
												<a href="#delete-more-bank-account-currency-modal-box" data-toggle="modal" class="btn-xs btn-danger pull-right" style="margin-left:5px;"><i class="fa fa-trash-o" style="font-size:14px;"></i></a>
												<a href="#edit-more-bank-account-currency-modal-box" data-toggle="modal" class="btn-xs btn-warning pull-right"><i class="fa fa-edit" style="font-size:14px;"></i></a>
											</span>
										</div>
									</div>
									
									
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Account no.</label>
										<div class="col-md-10" style="padding-left:0px;">
											<select class="height_25 plahole_font" id="bank-onwer_account-no-show-hide_div" style="width: 100%;">
												<option value="">Select account</option>
												<option value="1">A00012</option>
												<option value="2">A00013</option>
												<option value="3">A00014</option>
											</select>
										</div>
										<div class="col-md-2" style="padding:0px;">
											<a href="#add-more-bank-account-account-no-modal-box" id="bank-onwer_account-no-plus-icon" data-toggle="modal" class="btn-xs btn-success pull-right"><i class="fa fa-plus" style="font-size:14px;margin-top:3px;"></i></a>
											<span id="bank-onwer_account-no-edit-delete-icon" style="display:none;">
												<a href="#delete-more-bank-account-account-no-modal-box" data-toggle="modal" class="btn-xs btn-danger pull-right" style="margin-left:5px;"><i class="fa fa-trash-o" style="font-size:14px;"></i></a>
												<a href="#edit-more-bank-account-account-no-modal-box" data-toggle="modal" class="btn-xs btn-warning pull-right"><i class="fa fa-edit" style="font-size:14px;"></i></a>
											</span>
										</div>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;border-bottom:1px solid #ddd;">
										<label class="client-detailes-sub_heading" style="margin-bottom:0px;"><strong>Name of bank signatories</strong></label>
									</div>
									
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Signing mandate</label>
										<input type="text" class="form-control height_25 plahole_font" name="edit_financial_year_end" style="width: 100%;">
									</div>
									
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Date of minutes/resolution</label>
										<div class="input-group date datepicker2 col-sm-12">
											<input class="form-control height_25 stDate" type="text">
											<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
										</div>
									</div>
									
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Is the company to internet banking</label>
										<div class="radio pull-left" style="margin-right:30px;">
											<label class="radio-custom">
												<input type="radio" class="radioYesBtn" name="bank-accou-net-banking_radio_btn" id="bank-accou-net-banking_show_div" value="Yes"> 
												<i class="fa fa-circle-o iradioYesBtn"></i> Yes
											</label> 
										</div>

										<div class="radio pull-left" style="margin-right:30px;"> 
											<label class="radio-custom"> 
												<input type="radio" class="radioNoBtn" name="bank-accou-net-banking_radio_btn" id="bank-accou-net-banking_hide_div" checked="checked" value="No"> 
												<i class="fa fa-circle-o iradioNoBtn checked"></i> No
											</label> 
										</div>
									</div>
									
									<div class="form-group td-area-form-marg" id="bank-accou-net-banking_show_hide_div" style="margin-bottom:10px !important;display:none;">
										<label class="client-detailes-sub_heading" style="width:100%;">Type of facility</label>
										<input type="text" class="form-control height_25 plahole_font" name="edit_financial_year_end" style="width: 100%;">
									</div>
									
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Remark</label>
										<textarea style="width:100%;resize:vertical;"></textarea>
									</div>
									
								</div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="button" class="btn btn-success pull-right">Save</button>
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
        <!---------END Add Bank Accounts-Name of Bank Modal box---------->



