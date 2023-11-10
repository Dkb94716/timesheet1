<div class="box-generic" style="padding:0px;box-shadow:none;">
    <!-----START Trusts Sub tab----->
    <div class="tabsbar" style="height:30px;">
        <ul style="height:30px;">
            <li class="glyphicons camera active" style="height:30px;">
                <a href="#trusts_individual-tab" data-toggle="tab" style="height:24px;line-height:24px;" id="trusts_individual-info-tab" onclick="tb_short('th-trusinfo-action');">Info on Trust</a>
            </li>

            <li class="glyphicons folder_open" style="height:30px;">
                <a href="#trusts_corporate-tab" data-toggle="tab" style="height:24px;line-height:24px;" id="beneficiary_and-protectors-tab" onclick="tb_short('th-beneficiaries-protector-action');" >Beneficiary and Protectors</a>
            </li>
        </ul>
    </div>

    <div class="tab-content" style="padding-left:11px;padding-right:10px;">

        <!---START Trusts_individual-tab--->
        <div class="tab-pane active" id="trusts_individual-tab">
            <a href="#add-trusts_individual-modal-box" data-toggle="modal" class="btn-xs btn-success pull-right addbtn" style="margin-bottom:5px;">Add More</a>
            <div class="widget-body overflow-x" style="padding:10px 0px;width:100%;" id="trust_trustinfo_data_body">

            </div>
        </div>
        <!---END Trusts_individual-tab--->

        <!---START Trusts_corporate-tab--->
        <div class="tab-pane" id="trusts_corporate-tab">
            <a href="#add-trusts_corporate-modal-box" data-toggle="modal" class="btn-xs btn-success pull-right addbtn" style="margin-bottom:5px;">Add More</a>
            <div class="widget-body overflow-x" style="padding:10px 0px;width:100%;" id="trust_beneficiary_data_body">
                
            </div>
        </div>
        <!---END Trusts_corporate-tab--->
    </div>
    <!-----END Trusts Sub tab------->
</div>
<script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>        
<script src="<?php echo base_url(); ?>assets/js/db_ready.js"></script>
<script>
    dynamicTable_trust_trustinfo = 'dynamicTable1';
    dynamicTable_trust_beneficiary = 'dynamicTable2';
    $(document).ready(function() {
        ready_on_db();
        stuff_on_ready();
        var cur_date = get_current_date();
        $(".stDate").val(cur_date);
        $('.stDate').bdatepicker({
            format: "dd MM yyyy",
            autoclose: true,
        });
        
       

        /*********START trusts_individual-settlor_show_hide_div yes no radio button**********/
        $("#trusts_individual-settlor_show_div").click(function() {
            $("#trusts_individual-settlor_show_hide_div").slideDown();
            $("#trusts_corporate-settlor_show_hide_div").slideUp(); //Add Code on 24-09-2015
        });
        $("#trusts_individual-settlor_hide_div").click(function() {
            $("#trusts_individual-settlor_show_hide_div").slideUp();
            $("#trusts_corporate-settlor_show_hide_div").slideDown();  //Add Code on 24-09-2015
        });
        /***********END trusts_individual-settlor_show_hide_div yes no radio button**********/



        $("#shareholder-passport-2_show_div").click(function() {
            $("#shareholder-passport-2_show_hide_div").slideDown();
        });
        $("#shareholder-passport-2_hide_div").click(function() {
            $("#shareholder-passport-2_show_hide_div").slideUp();
        });

        $("#shareholder-cv_show_div").click(function() {
            $("#shareholder-cv_show_hide_div").slideDown();
        });
        $("#shareholder-cv_hide_div").click(function() {
            $("#shareholder-cv_show_hide_div").slideUp();
        });
        /***********END shareholder-cv_show_hide_div yes no radio button**********/

        /*********START  shareholder-bank-reference_show_hide_div yes no radio button**********/
        $("#shareholder-bank-reference_show_div").click(function() {
            $("#shareholder-bank-reference_show_hide_div").slideDown();
        });
        $("#shareholder-bank-reference_hide_div").click(function() {
            $("#shareholder-bank-reference_show_hide_div").slideUp();
        });
        /***********END  shareholder-bank-reference_show_hide_div yes no radio button**********/

        /*********START shareholder-proof_add_show_hide_div yes no radio button**********/
        $("#shareholder-proof_add_show_div").click(function() {
            $("#shareholder-proof_add_show_hide_div").slideDown();
        });
        $("#shareholder-proof_add_hide_div").click(function() {
            $("#shareholder-proof_add_show_hide_div").slideUp();
        });
        /***********END shareholder-proof_add_show_hide_div yes no radio button**********/

        $("#show_shareholder_dt_reg-meb_btn").click(function() {
            $("#show-hide_shareholder_dt_reg-meb_btn").slideDown();
        });

        $("#hide_shareholder_dt_reg-meb_btn").click(function() {
            $("#show-hide_shareholder_dt_reg-meb_btn").slideUp();
        });

        /*********START shareholder-audited-accounts_show_hide_div yes no radio button**********/
        $("#shareholder-audited-accounts_show_div").click(function() {
            $("#shareholder-audited-accounts_show_hide_div").slideDown();
        });
        $("#shareholder-audited-accounts_hide_div").click(function() {
            $("#shareholder-audited-accounts_show_hide_div").slideUp();
        });
        /***********END shareholder-audited-accounts_show_hide_div yes no radio button**********/

        $("#shareholder-bank-reference-2_show_div").click(function() {
            $("#shareholder-bank-reference-2_show_hide_div").slideDown();
        });
        $("#shareholder-bank-reference-2_hide_div").click(function() {
            $("#shareholder-bank-reference-2_show_hide_div").slideUp();
        });

        /*********START shareholder-proof_add-2_show_hide_div yes no radio button**********/
        $("#shareholder-proof_add-2_show_div").click(function() {
            $("#shareholder-proof_add-2_show_hide_div").slideDown();
        });
        $("#shareholder-proof_add-2_hide_div").click(function() {
            $("#shareholder-proof_add-2_show_hide_div").slideUp();
        });
        
        for_beneficiary();

        $('.radioYesBtn').val('1');
        $('.radioNoBtn').val('0');
        $('.radioNaBtn').val('2');
    });
    
    
     function tb_short(id){
         
          setTimeout(function(){  
                 $( "#"+id ).trigger( "click" ); 
        },100);
    }
    
    
    function stuff_on_ready() {
        var core_url = CURRENT_URL;
        // For load default grid.
        var load_data_body1 = "trust_trustinfo_data_body";
        blockUI(load_data_body1);
        var url1 = core_url + "/databaseinfo/get_trust_trustinfo_grid_data";
        grid_data(load_data_body1, url1, dynamicTable_trust_trustinfo);
        
        $('.addbtn').on('click',function(){
            setTimeout(function(){
                $("#add-trust-trustinfo-form").data('bootstrapValidator').resetForm(); 
                $("#add-trust-beneficiary-form2").data('bootstrapValidator').resetForm();
                var cur_date = get_current_date();
               // $(".stDate_current").val(cur_date);
                $('.stDate').bdatepicker({
                    format: "dd MM yyyy",
                    autoclose: true,
                });
                $('.stDate_tr_ti').bdatepicker("update",cur_date);
                $('.stDate_tr_b').bdatepicker("update",cur_date);
                $('.stDate_tr_by').bdatepicker("update",cur_date);
            },400)
//            $("#add-director-individual-form").data('bootstrapValidator').resetForm(); 
            

        });
        
        $('#shareholder-passport-2_show_div').click(function(){
            setTimeout(function(){
                $("#add-trust-trustinfo-form").data('bootstrapValidator').resetForm(); 
            },200)
        });
        $('.stDate_tr_ti').bdatepicker({
	  format: "dd MM yyyy",
	   autoclose: true
	 }).on('changeDate', function(e) {
		// Revalidate the date field
		//$('#add-trust-trustinfo-form24').bootstrapValidator('revalidateField', 'date_of_issue');
		//$('#add-trust-trustinfo-form24').bootstrapValidator('revalidateField', 'date_of_expiry');	
	});        
        var validator = $('#add-trust-trustinfo-form').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                name_of_trust: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
//                date_of_issue: {
//                    validators: {
//                        callback: {
//                            message: 'This field is required',
//                            callback: function (value, validator, $field) {
//                                var input1 = new Date($('#date_of_issue').val()).getTime();
//                                var input2 = new Date($('#date_of_expiry').val()).getTime();
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
//                                            message: 'Date of issue should be less than date of expiry'
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
//                date_of_expiry: {
//                    validators: {
//                        callback: {
//                            message: 'Date of expiry should be greater than date of issue',
//                            callback: function (value, validator, $field) {
//                               var input1 = new Date($('#date_of_issue').val()).getTime();
//                                var input2 = new Date($('#date_of_expiry').val()).getTime();
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
//                                            message: 'Date of expiry should be greater than date of issue'
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
                //

            }
        })
        .on('success.form.bv', function(e) {
            e.preventDefault();
            submit_trust_trustinfo_form('add-trust-trustinfo-form', 'add', '');
        });
        
        var core_url = CURRENT_URL;
        // For load default grid.
        var load_data_body1 = "trust_beneficiary_data_body";
        blockUI(load_data_body1);
        var url1 = core_url + "/databaseinfo/get_trust_beneficiary_grid_data";
        grid_data(load_data_body1, url1, dynamicTable_trust_beneficiary);
        
        
        $('#shareholder-passport-2_show_div').click(function(){
            setTimeout(function(){
                $("#add-director-individual-form").data('bootstrapValidator').resetForm(); 
            },200)
        });
        
        
        $('#by_shareholder-passport-2_show_div').click(function(){
            setTimeout(function(){
                $("#add-trust-beneficiary-form").data('bootstrapValidator').resetForm(); 
            },200)
        });
        $('#py_shareholder-passport-2_show_div').click(function(){
            setTimeout(function(){
                $("#add-trust-beneficiary-form").data('bootstrapValidator').resetForm(); 
            },200)
        });
        $('.stDate_tr_b').bdatepicker({
	  format: "dd MM yyyy",
	   autoclose: true
	 }).on('changeDate', function(e) {
		// Revalidate the date field
		//$('#add-trust-beneficiary-form').bootstrapValidator('revalidateField', 'by_date_of_issue');
		//$('#add-trust-beneficiary-form').bootstrapValidator('revalidateField', 'by_date_of_expiry');	
	});
        $('.stDate_tr_by').bdatepicker({
	  format: "dd MM yyyy",
	   autoclose: true
	 }).on('changeDate', function(e) {
		// Revalidate the date field
               // $('#add-trust-beneficiary-form').bootstrapValidator('revalidateField', 'py_date_of_issue');
		//$('#add-trust-beneficiary-form').bootstrapValidator('revalidateField', 'py_date_of_expiry');	
	});
        var validator = $('#add-trust-beneficiary-form').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                is_beneficiary: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
//                by_date_of_issue: {
//                    validators: {
//                        callback: {
//                            message: 'This field is required',
//                            callback: function (value, validator, $field) {
//                                var input1 = new Date($('#by_date_of_issue').val()).getTime();
//                                var input2 = new Date($('#by_date_of_expiry').val()).getTime();
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
//                                            message: 'Date of issue should be less than date of expiry'
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
//                by_date_of_expiry: {
//                    validators: {
//                        callback: {
//                            message: 'Date of expiry should be greater than date of issue',
//                            callback: function (value, validator, $field) {
//                               var input1 = new Date($('#by_date_of_issue').val()).getTime();
//                                var input2 = new Date($('#by_date_of_expiry').val()).getTime();
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
//                                            message: 'Date of expiry should be greater than date of issue'
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
//                },
//                py_date_of_issue: {
//                    validators: {
//                        callback: {
//                            message: 'This field is required',
//                            callback: function (value, validator, $field) {
//                                var input1 = new Date($('#py_date_of_issue').val()).getTime();
//                                var input2 = new Date($('#py_date_of_expiry').val()).getTime();
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
//                                            message: 'Date of issue should be less than date of expiry'
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
//                py_date_of_expiry: {
//                    validators: {
//                        callback: {
//                            message: 'Date of expiry should be greater than date of issue',
//                            callback: function (value, validator, $field) {
//                               var input1 = new Date($('#py_date_of_issue').val()).getTime();
//                                var input2 = new Date($('#py_date_of_expiry').val()).getTime();
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
//                                            message: 'Date of expiry should be greater than date of issue'
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
                //

            }
        })
        .on('success.form.bv', function(e) {
            e.preventDefault();
            submit_trust_beneficiary_form('add-trust-beneficiary-form', 'add', '');
        });
    }

    function submit_trust_trustinfo_form(form, action, id) {
        var load_data_body = 'trust_trustinfo_data_body';
        var core_url = CURRENT_URL;
        var url = core_url + "/databaseinfo/submit_trust_trustinfo_form";
        blockUI(load_data_body);
        submit_form(form, load_data_body, url, action, id, function(data) {
            var url = core_url + "/databaseinfo/get_trust_trustinfo_grid_data";
            grid_data(load_data_body, url, dynamicTable_trust_trustinfo);
        });
    }

    function edit_trust_trustinfo_bar(id) {
        blockUI('trust_trustinfo_edit_bar');
        var load_data_body = 'trust_trustinfo_edit_bar';
        var db_name = 'db_trust_trustinfo';
        var db_field_id = 'trustinfo_id';
        var tag = 'trust_trustinfo';
        var view_folder = 'Trust';
        var core_url = CURRENT_URL;
        var url = core_url + "/databaseinfo/get_item_detail_for_edit";
        edit_box(load_data_body, url, id, db_name, db_field_id, tag, view_folder)
    }

    function delete_trust_trustinfo_bar(id) {
        var load_data_body = 'trust_trustinfo_data_body';
        var db_name = 'db_trust_trustinfo';
        var db_field_id = 'trustinfo_id';
        var core_url = CURRENT_URL;
        var url = core_url + "/databaseinfo/delete_item";
        var title = "Delete Info on Trust";
        var grid_url = CURRENT_URL + "/databaseinfo/get_trust_trustinfo_grid_data";
        var tag = "Info on Trust"
        delete_box(load_data_body, url, id, db_name, db_field_id, title, grid_url, dynamicTable_trust_trustinfo, tag)
    }
    
    function submit_trust_beneficiary_form(form, action, id) {
        var load_data_body = 'trust_beneficiary_data_body';
        var core_url = CURRENT_URL;
        var url = core_url + "/databaseinfo/submit_trust_beneficiary_form";
        blockUI(load_data_body);
        submit_form(form, load_data_body, url, action, id, function(data) {
            var url = core_url + "/databaseinfo/get_trust_beneficiary_grid_data";
            grid_data(load_data_body, url, dynamicTable_trust_beneficiary);
        });
    }

    function edit_trust_beneficiary_bar(id) {
        blockUI('trust_beneficiary_edit_bar');
        var load_data_body = 'trust_beneficiary_edit_bar';
        var db_name = 'db_trust_beneficiary';
        var db_field_id = 'beneficiary_id';
        var tag = 'trust_beneficiary';
        var view_folder = 'Trust';
        var core_url = CURRENT_URL;
        var url = core_url + "/databaseinfo/get_item_detail_for_edit";
        edit_box(load_data_body, url, id, db_name, db_field_id, tag, view_folder)
    }

    function delete_trust_beneficiary_bar(id) {
        var load_data_body = 'trust_beneficiary_data_body';
        var db_name = 'db_trust_beneficiary';
        var db_field_id = 'beneficiary_id';
        var core_url = CURRENT_URL;
        var url = core_url + "/databaseinfo/delete_item";
        var title = "Delete Beneficiary and Protectors";
        var grid_url = CURRENT_URL + "/databaseinfo/get_trust_beneficiary_grid_data";
        var tag = "Beneficiary and Protectors Information"
        delete_box(load_data_body, url, id, db_name, db_field_id, title, grid_url, dynamicTable_trust_beneficiary, tag)
    }
    
    function for_beneficiary(){
        /******************START trust-beneficial-beneficiary-show-_hide_div*************/
        $("#trust-beneficial-beneficiary_show_btn").click(function(){
            $("#trust-beneficial-beneficiary_show_div").slideDown();
            $("#trust-beneficial-beneficiary_hide_div").slideUp();
        });

        $("#trust-beneficial-beneficiary_hide_btn").click(function(){
            $("#trust-beneficial-beneficiary_show_div").slideUp();
            $("#trust-beneficial-beneficiary_hide_div").slideDown();
        });
        /******************END trust-beneficial-beneficiary-show-_hide_div*************/
        /******************START trust-beneficial-beneficiary-show-_hide_div*************/
        $("#trust-beneficial-Protector_show_btn").click(function(){
                $("#trust-beneficial-Protector_show_div").slideDown();
                $("#trust-beneficial-Protector_hide_div").slideUp();
        });

        $("#trust-beneficial-Protector_hide_btn").click(function(){
                $("#trust-beneficial-Protector_show_div").slideUp();
                $("#trust-beneficial-Protector_hide_div").slideDown();
        });
        /******************END trust-beneficial-beneficiary-show-_hide_div*************/
        
        // b 
        $("#by_shareholder-passport-2_show_div").click(function() {
            $("#by_shareholder-passport-2_show_hide_div").slideDown();
        });
        $("#by_shareholder-passport-2_hide_div").click(function() {
            $("#by_shareholder-passport-2_show_hide_div").slideUp();
        });

        $("#by_shareholder-cv_show_div").click(function() {
            $("#by_shareholder-cv_show_hide_div").slideDown();
        });
        $("#by_shareholder-cv_hide_div").click(function() {
            $("#by_shareholder-cv_show_hide_div").slideUp();
        });
        /***********END shareholder-cv_show_hide_div yes no radio button**********/

        /*********START  shareholder-bank-reference_show_hide_div yes no radio button**********/
        $("#by_shareholder-bank-reference_show_div").click(function() {
            $("#by_shareholder-bank-reference_show_hide_div").slideDown();
        });
        $("#by_shareholder-bank-reference_hide_div").click(function() {
            $("#by_shareholder-bank-reference_show_hide_div").slideUp();
        });
        /***********END  shareholder-bank-reference_show_hide_div yes no radio button**********/

        /*********START shareholder-proof_add_show_hide_div yes no radio button**********/
        $("#by_shareholder-proof_add_show_div").click(function() {
            $("#by_shareholder-proof_add_show_hide_div").slideDown();
        });
        $("#by_shareholder-proof_add_hide_div").click(function() {
            $("#by_shareholder-proof_add_show_hide_div").slideUp();
        });
        /***********END shareholder-proof_add_show_hide_div yes no radio button**********/

        $("#bn_show_shareholder_dt_reg-meb_btn").click(function() {
            $("#bn_show-hide_shareholder_dt_reg-meb_btn").slideDown();
        });

        $("#bn_hide_shareholder_dt_reg-meb_btn").click(function() {
            $("#bn_show-hide_shareholder_dt_reg-meb_btn").slideUp();
        });
        
        /*********START register_of_directors_show_hide_div yes no radio button**********/
        $("#bn_register_of_directors_show_div").click(function(){
            $("#bn_register_of_directors_show_hide_div").slideDown();
        });
        $("#bn_register_of_directors_hide_div").click(function(){
            $("#bn_register_of_directors_show_hide_div").slideUp();
        });
        /***********END register_of_directors_show_hide_div yes no radio button**********/

        
        /*********START shareholder-audited-accounts_show_hide_div yes no radio button**********/
        $("#bn_shareholder-audited-accounts_show_div").click(function() {
            $("#bn_shareholder-audited-accounts_show_hide_div").slideDown();
        });
        $("#bn_shareholder-audited-accounts_hide_div").click(function() {
            $("#bn_shareholder-audited-accounts_show_hide_div").slideUp();
        });
        /***********END shareholder-audited-accounts_show_hide_div yes no radio button**********/

        $("#bn_shareholder-bank-reference-2_show_div").click(function() {
            $("#bn_shareholder-bank-reference-2_show_hide_div").slideDown();
        });
        $("#bn_shareholder-bank-reference-2_hide_div").click(function() {
            $("#bn_shareholder-bank-reference-2_show_hide_div").slideUp();
        });

        /*********START shareholder-proof_add-2_show_hide_div yes no radio button**********/
        $("#bn_shareholder-proof_add-2_show_div").click(function() {
            $("#bn_shareholder-proof_add-2_show_hide_div").slideDown();
        });
        $("#bn_shareholder-proof_add-2_hide_div").click(function() {
            $("#bn_shareholder-proof_add-2_show_hide_div").slideUp();
        });
        
        // p 
        $("#py_shareholder-passport-2_show_div").click(function() {
            $("#py_shareholder-passport-2_show_hide_div").slideDown();
        });
        $("#py_shareholder-passport-2_hide_div").click(function() {
            $("#py_shareholder-passport-2_show_hide_div").slideUp();
        });

        $("#py_shareholder-cv_show_div").click(function() {
            $("#py_shareholder-cv_show_hide_div").slideDown();
        });
        $("#py_shareholder-cv_hide_div").click(function() {
            $("#py_shareholder-cv_show_hide_div").slideUp();
        });
        /***********END shareholder-cv_show_hide_div yes no radio button**********/

        /*********START  shareholder-bank-reference_show_hide_div yes no radio button**********/
        $("#py_shareholder-bank-reference_show_div").click(function() {
            $("#py_shareholder-bank-reference_show_hide_div").slideDown();
        });
        $("#py_shareholder-bank-reference_hide_div").click(function() {
            $("#py_shareholder-bank-reference_show_hide_div").slideUp();
        });
        /***********END  shareholder-bank-reference_show_hide_div yes no radio button**********/

        /*********START shareholder-proof_add_show_hide_div yes no radio button**********/
        $("#py_shareholder-proof_add_show_div").click(function() {
            $("#py_shareholder-proof_add_show_hide_div").slideDown();
        });
        $("#py_shareholder-proof_add_hide_div").click(function() {
            $("#py_shareholder-proof_add_show_hide_div").slideUp();
        });
        /***********END shareholder-proof_add_show_hide_div yes no radio button**********/

        $("#pn_show_shareholder_dt_reg-meb_btn").click(function() {
            $("#pn_show-hide_shareholder_dt_reg-meb_btn").slideDown();
        });

        $("#pn_hide_shareholder_dt_reg-meb_btn").click(function() {
            $("#pn_show-hide_shareholder_dt_reg-meb_btn").slideUp();
        });
        
        /*********START register_of_directors_show_hide_div yes no radio button**********/
        $("#pn_register_of_directors_show_div").click(function(){
            $("#pn_register_of_directors_show_hide_div").slideDown();
        });
        $("#pn_register_of_directors_hide_div").click(function(){
            $("#pn_register_of_directors_show_hide_div").slideUp();
        });
        /***********END register_of_directors_show_hide_div yes no radio button**********/

        
        /*********START shareholder-audited-accounts_show_hide_div yes no radio button**********/
        $("#pn_shareholder-audited-accounts_show_div").click(function() {
            $("#pn_shareholder-audited-accounts_show_hide_div").slideDown();
        });
        $("#pn_shareholder-audited-accounts_hide_div").click(function() {
            $("#pn_shareholder-audited-accounts_show_hide_div").slideUp();
        });
        /***********END shareholder-audited-accounts_show_hide_div yes no radio button**********/

        $("#pn_shareholder-bank-reference-2_show_div").click(function() {
            $("#pn_shareholder-bank-reference-2_show_hide_div").slideDown();
        });
        $("#pn_shareholder-bank-reference-2_hide_div").click(function() {
            $("#pn_shareholder-bank-reference-2_show_hide_div").slideUp();
        });

        /*********START shareholder-proof_add-2_show_hide_div yes no radio button**********/
        $("#pn_shareholder-proof_add-2_show_div").click(function() {
            $("#pn_shareholder-proof_add-2_show_hide_div").slideDown();
        });
        $("#pn_shareholder-proof_add-2_hide_div").click(function() {
            $("#pn_shareholder-proof_add-2_show_hide_div").slideUp();
        });
    }

</script>



<!---------START Add TRUSTS  Individual Modal box-------->
<div class="modal fade"  id="add-trusts_individual-modal-box">
    <div class="modal-dialog modal_box_custome_size">
        <div class="modal-content">
            <!-- Modal heading -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Add Info on Trust</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="innerLR" style="padding:0;">
                    <form class="form-horizontal" action="<?php echo base_url(); ?>/databaseinfo/submit_data" id="add-trust-trustinfo-form"  role="form">
                        <div class="col-md-6">

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Name of trust</label>
                                <input name="name_of_trust" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                            </div>
                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Type of trust</label>
                                <select name="trust_type" class="form-control input_area plahole_font height_25" style="width:100%; padding-top: 0px;">
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
                                        <input type="radio" class="radioYesBtn" name="is_other_than_anex" id="trusts_individual-are-there_show_div"> 
                                        Yes
                                    </label> 
                                </div>

                                <div class="radio pull-left" style="margin-right:30px;"> 
                                    <label class="radio-custom-none"> 
                                        <input type="radio" class="radioNoBtn" name="is_other_than_anex" id="trusts_individual-are-there_hide_div" checked="checked"> 
                                        No
                                    </label> 
                                </div>

                            </div>

                            <div class="form-group td-area-form-marg" id="trusts_individual-are-there_show_hide_div" style="margin-bottom:10px !important;display:none;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Name</label>
                                <input name="name" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Date of establishment of trust</label>
                                <div class="input-group date stDate col-sm-12">
                                    <input name="date_of_establishment" class="form-control height_25 stDate_current" type="text">
                                    <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                </div>
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Trust Deed available</label>

                                <div class="radio pull-left" style="margin-right:30px;">
                                    <label class="radio-custom-none">
                                        <input type="radio" class="radioYesBtn" name="is_trust_deed"> 
                                        Yes
                                    </label> 
                                </div>

                                <div class="radio pull-left" style="margin-right:30px;"> 
                                    <label class="radio-custom-none"> 
                                        <input type="radio" class="radioNoBtn" name="is_trust_deed" checked="checked"> 
                                        No
                                    </label> 
                                </div>

                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Does the trust hold a global business licence?</label>

                                <div class="radio pull-left" style="margin-right:30px;">
                                    <label class="radio-custom-none">
                                        <input type="radio" class="radioYesBtn" name="is_global_business_license"> 
                                        Yes
                                    </label> 
                                </div>

                                <div class="radio pull-left" style="margin-right:30px;"> 
                                    <label class="radio-custom-none"> 
                                        <input type="radio" class="radioNoBtn" name="is_global_business_license" checked="checked"> 
                                        No
                                    </label> 
                                </div>
                                <div class="radio pull-left" style="margin-right:30px;">
                                    <label class="radio-custom-none">
                                        <input type="radio" class="radioNaBtn" name="is_global_business_license"> 
                                        NA
                                    </label> 
                                </div>

                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Letter of wishes available for non-discretionary trust</label>
                                <div class="radio pull-left" style="margin-right:30px;">
                                    <label class="radio-custom-none">
                                        <input type="radio" class="radioYesBtn" name="is_letter_of_wishes" id="trusts_individual-letter_of_wishes_show_div"> 
                                        Yes
                                    </label> 
                                </div>

                                <div class="radio pull-left" style="margin-right:30px;"> 
                                    <label class="radio-custom-none"> 
                                        <input type="radio" class="radioNoBtn" name="is_letter_of_wishes" id="trusts_individual-letter_of_wishes_hide_div" checked="checked"> 
                                        No
                                    </label> 
                                </div>
                            </div>

                            <div id="trusts_individual-letter_of_wishes_show_hide_div" style="display:none;">
                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">From</label>
                                    <input name="from" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Details</label>
                                    <textarea name="detail" style="width:100%;resize:vertical;"></textarea>
                                </div>

                            </div>
                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Declaration of non-residence available</label>
                                <div class="radio pull-left" style="margin-right:30px;">
                                    <label class="radio-custom-none">
                                        <input type="radio" class="radioYesBtn" name="is_non_residence"> 
                                        Yes
                                    </label> 
                                </div>

                                <div class="radio pull-left" style="margin-right:30px;"> 
                                    <label class="radio-custom-none"> 
                                        <input type="radio" class="radioNoBtn" name="is_non_residence" checked="checked"> 
                                        No
                                    </label> 
                                </div>
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Is the trust tax resident?</label>
                                <div class="radio pull-left" style="margin-right:30px;">
                                    <label class="radio-custom-none">
                                        <input type="radio" class="radioYesBtn" name="is_trust_tax_residence" id="trusts_individual-is_the_tax_show_div"> 
                                        Yes
                                    </label> 
                                </div>

                                <div class="radio pull-left" style="margin-right:30px;"> 
                                    <label class="radio-custom-none"> 
                                        <input type="radio" class="radioNoBtn" name="is_trust_tax_residence" id="trusts_individual-is_the_tax_hide_div" checked="checked"> 
                                        No
                                    </label> 
                                </div>
                            </div>

                            <div class="form-group td-area-form-marg" id="trusts_individual-is_the_tax_show_hide_div" style="margin-bottom:10px !important;display:none;">
                                <label class="client-detailes-sub_heading" style="width:100%;">TAN No.</label>
                                <input name="tan_no" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Are accounts prepared?</label>
                                <div class="radio pull-left" style="margin-right:30px;">
                                    <label class="radio-custom-none">
                                        <input type="radio" class="radioYesBtn" name="is_account_prepared" id="trusts_individual-are_accounts_show_div"> 
                                        Yes
                                    </label> 
                                </div>

                                <div class="radio pull-left" style="margin-right:30px;"> 
                                    <label class="radio-custom-none"> 
                                        <input type="radio" class="radioNoBtn" name="is_account_prepared" id="trusts_individual-are_accounts_hide_div" checked="checked"> 
                                        No
                                    </label> 
                                </div>
                            </div>
                            <div class="form-group td-area-form-marg" id="trusts_individual-are_accounts_show_hide_div" style="margin-bottom:10px !important;display:none;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Finacial year end</label>
                                <div class="col-md-4" style="padding-left:0px;">
                                    <select name="finantial_year_date" class="form-control height_25 plahole_font">
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
                                    <select name="finantial_year_month" class="form-control height_25 plahole_font" style="padding-top:2px;padding-bottom:2px;">
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
                                        <input type="radio" class="radioYesBtn" name="is_settlor_individual" id="trusts_individual-settlor_show_div"> 
                                        Yes
                                    </label> 
                                </div>

                                <div class="radio pull-left" style="margin-right:30px;"> 
                                    <label class="radio-custom-none"> 
                                        <input type="radio" class="radioNoBtn" name="is_settlor_individual" id="trusts_individual-settlor_hide_div" checked="checked"> 
                                        No
                                    </label> 
                                </div>
                            </div>

                            <div id="trusts_individual-settlor_show_hide_div" style="display:none;">
                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Name of settlor</label>
                                    <input name="name_of_settlor" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Passport</label>
                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="is_passport" id="shareholder-passport-2_show_div"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="is_passport" id="shareholder-passport-2_hide_div" checked="checked"> 
                                            No
                                        </label> 
                                    </div>
                                </div>

                                <div id="shareholder-passport-2_show_hide_div" style="display:none;">
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Passport number</label>
                                        <input name="passport_no" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                    </div>
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Country of issue</label>
                                        <select name="country_of_issue" class="form-control plahole_font" style="width: 100%;">
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

                                        <div class="input-group date stDate_tr_ti">
                                            <input id="date_of_issue" name="date_of_issue" class="form-control height_25 stDate_current" type="text">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>

                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Date of expiry</label>

                                        <div class="input-group date stDate_tr_ti">
                                            <input id="date_of_expiry" name="date_of_expiry" class="form-control height_25 stDate_current" type="text">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">CV</label>

                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="has_cv" id="shareholder-cv_show_div"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="has_cv" id="shareholder-cv_hide_div" checked="checked"> 
                                            No
                                        </label> 
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" id="shareholder-cv_show_hide_div" style="margin-bottom:10px !important;display:none;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Date received</label>

                                    <div class="input-group date stDate col-sm-12">
                                        <input name="recieved_date" class="form-control height_25 stDate_current" type="text">
                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Bank reference</label>

                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="is_bank_ref" id="shareholder-bank-reference_show_div"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="is_bank_ref" id="shareholder-bank-reference_hide_div" checked="checked"> 
                                            No
                                        </label> 
                                    </div>
                                </div>

                                <div id="shareholder-bank-reference_show_hide_div" style="display:none;">
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Bank</label>
                                        <input name="bank_name" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                    </div>
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Date</label>

                                        <div class="input-group date stDate col-sm-12">
                                            <input name="date" class="form-control height_25 stDate_current" type="text">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Proof of address</label>

                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="has_address_proof" id="shareholder-proof_add_show_div"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="has_address_proof" id="shareholder-proof_add_hide_div" checked="checked"> 
                                            No
                                        </label> 
                                    </div>

                                </div>

                                <div id="shareholder-proof_add_show_hide_div" style="display:none;">
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                                        <textarea name="address" style="width:100%;resize:vertical;"></textarea>
                                    </div>
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Country</label>
                                        <select name="country" class="form-control plahole_font" style="width: 100%;">
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
                                            <input name="address_proof_date" class="form-control height_25 stDate_current" type="text">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Other</label>
                                    <textarea name="other_detail" style="width:100%;resize:vertical;"></textarea>
                                </div>

                            </div>

                            <div id="trusts_corporate-settlor_show_hide_div">

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Name of company</label>
                                    <input name="name_of_company" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Represented by</label>
                                    <input name="represented_by" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Date of incorporation</label>
                                    <div class="input-group date stDate col-sm-12">
                                        <input name="date_of_incorp" class="form-control height_25 stDate_current" type="text">
                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Registered in</label>
                                    <input name="registered_in" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Register of members</label>
                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="is_member_register" id="show_shareholder_dt_reg-meb_btn"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="is_member_register" id="hide_shareholder_dt_reg-meb_btn" checked="checked"> 
                                            No
                                        </label> 
                                    </div>
                                </div>
                                <div class="form-group td-area-form-marg" id="show-hide_shareholder_dt_reg-meb_btn" style="margin-bottom:10px !important;display:none;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Date of member of directors</label>
                                    <div class="input-group date stDate col-sm-12" style="margin-bottom:10px !important;">
                                        <input name="member_register_date" class="form-control height_25 stDate_current" type="text">
                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Register of directors</label>

                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="is_director_register" id="register_of_directors_show_div"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="is_director_register" id="register_of_directors_hide_div" checked="checked"> 
                                            No
                                        </label> 
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" id="register_of_directors_show_hide_div" style="margin-bottom:10px !important;display:none;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Date of register of directors</label>
                                    <div class="input-group date stDate col-sm-12">
                                        <input name="director_register_date" class="form-control height_25 stDate_current" type="text">
                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Corporate profile</label>

                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="is_corporate_profile"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="is_corporate_profile" checked="checked"> 
                                            No
                                        </label> 
                                    </div>

                                </div>


                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Audited accounts</label>
                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="is_audited_account" id="shareholder-audited-accounts_show_div"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="is_audited_account" id="shareholder-audited-accounts_hide_div" checked="checked"> 
                                            No
                                        </label> 
                                    </div>
                                </div>

                                <div id="shareholder-audited-accounts_show_hide_div" style="display:none;">
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Date of financial year end</label>
                                        <div class="input-group date stDate col-sm-12">
                                            <input name="date_of_finantial_year_end" class="form-control height_25 stDate_current" type="text">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Bank reference</label>
                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="is_bank_ref_n" id="shareholder-bank-reference-2_show_div"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="is_bank_ref_n" id="shareholder-bank-reference-2_hide_div" checked="checked"> 
                                            No
                                        </label> 
                                    </div>
                                </div>

                                <div id="shareholder-bank-reference-2_show_hide_div" style="display:none;">
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Name of bank </label>
                                        <input name="bank_name_n" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                    </div>
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Date</label>
                                        <div class="input-group date stDate col-sm-12">
                                            <input name="date_n" class="form-control height_25 stDate_current" type="text">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Proof of address</label>

                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="has_address_proof_n" id="shareholder-proof_add-2_show_div"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="has_address_proof_n" id="shareholder-proof_add-2_hide_div" checked="checked"> 
                                            No
                                        </label> 
                                    </div>

                                </div>

                                <div id="shareholder-proof_add-2_show_hide_div" style="display:none;">
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                                        <textarea name="address_n" style="width:100%;resize:vertical;"></textarea>
                                    </div>
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Country</label>
                                        <select name="country_n" class="form-control plahole_font" style="width: 100%;">
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
                                            <input name="address_proof_date_n" class="form-control height_25 stDate_current" type="text">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group td-area-form-marg">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Remarks</label>
                                    <textarea name="remarks" style="width:100%;resize:vertical;"></textarea>
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
<!---------END Add TRUSTS Individual Modal box---------->

<!---------START edit TRUSTS  Individual Modal box-------->
<div class="modal fade"  id="edit-trusts_individual-modal-box">
    <div class="modal-dialog modal_box_custome_size">
        <div class="modal-content">
            <!-- Modal heading -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Edit Info on Trust</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="innerLR" style="padding:0;" id="trust_trustinfo_edit_bar">

                </div>
            </div>
            <!-- // Modal body END -->
        </div>
    </div>
</div>
<!---------END edit TRUSTS Individual Modal box---------->


<!---------START Add TRUSTS  Corporate Modal box-------->
<div class="modal fade"  id="add-trusts_corporate-modal-box">
    <div class="modal-dialog modal_box_custome_size">
        <div class="modal-content">
            <!-- Modal heading -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Add Beneficiary and Protectors</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="innerLR" style="padding:0;">
                    <form class="form-horizontal" action="<?php echo base_url(); ?>/databaseinfo/submit_data" id="add-trust-beneficiary-form"  role="form">

                        <div class="col-md-6">
                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;border-bottom:1px solid #ddd;">
                                <label class="client-detailes-sub_heading" style="margin-bottom:0px;"><strong>KYC documents on Beneficiaries</strong></label>
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Beneficiary - Individual</label>

                                <div class="radio pull-left" style="margin-right:30px;">
                                    <label class="radio-custom-none">
                                        <input name="is_beneficiary" type="radio" class="radioYesBtn"  id="trust-beneficial-beneficiary_show_btn"> 
                                         Yes
                                    </label> 
                                </div>

                                <div class="radio pull-left" style="margin-right:30px;"> 
                                    <label class="radio-custom-none"> 
                                        <input name="is_beneficiary" type="radio" class="radioNoBtn"  id="trust-beneficial-beneficiary_hide_btn" checked="checked"> 
                                         No
                                    </label> 
                                </div>
                            </div>

                            <div id="trust-beneficial-beneficiary_show_div" style="display:none;">

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Name of beneficiary</label>
                                    <input name="by_name_of_beneficiary" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Passport</label>
                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="by_is_passport" id="by_shareholder-passport-2_show_div"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="by_is_passport" id="by_shareholder-passport-2_hide_div" checked="checked"> 
                                            No
                                        </label> 
                                    </div>
                                </div>

                                <div id="by_shareholder-passport-2_show_hide_div" style="display:none;">
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Passport number</label>
                                        <input name="by_passport_no" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                    </div>
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Country of issue</label>
                                        <select name="by_country_of_issue" class="form-control plahole_font" style="width: 100%;">
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

                                        <div class="input-group date stDate_tr_b">
                                            <input id="by_date_of_issue" name="by_date_of_issue" class="form-control height_25 stDate_current" type="text">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>

                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Date of expiry</label>

                                        <div class="input-group date stDate_tr_b">
                                            <input id="by_date_of_expiry" name="by_date_of_expiry" class="form-control height_25 stDate_current" type="text">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">CV</label>

                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="by_has_cv" id="by_shareholder-cv_show_div"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="by_has_cv" id="by_shareholder-cv_hide_div" checked="checked"> 
                                            No
                                        </label> 
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" id="by_shareholder-cv_show_hide_div" style="margin-bottom:10px !important;display:none;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Date received</label>

                                    <div class="input-group date stDate col-sm-12">
                                        <input name="by_recieved_date" class="form-control height_25 stDate_current" type="text">
                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Bank reference</label>

                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="by_is_bank_ref" id="by_shareholder-bank-reference_show_div"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="by_is_bank_ref" id="by_shareholder-bank-reference_hide_div" checked="checked"> 
                                            No
                                        </label> 
                                    </div>
                                </div>

                                <div id="by_shareholder-bank-reference_show_hide_div" style="display:none;">
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Bank</label>
                                        <input name="by_bank_name" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                    </div>
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Date</label>

                                        <div class="input-group date stDate col-sm-12">
                                            <input name="by_date" class="form-control height_25 stDate_current" type="text">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Proof of address</label>

                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="by_has_address_proof" id="by_shareholder-proof_add_show_div"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="by_has_address_proof" id="by_shareholder-proof_add_hide_div" checked="checked"> 
                                            No
                                        </label> 
                                    </div>

                                </div>

                                <div id="by_shareholder-proof_add_show_hide_div" style="display:none;">
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                                        <textarea name="by_address" style="width:100%;resize:vertical;"></textarea>
                                    </div>
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Country</label>
                                        <select name="by_country" class="form-control plahole_font" style="width: 100%;">
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
                                            <input name="by_address_proof_date" class="form-control height_25 stDate_current" type="text">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Other</label>
                                    <textarea name="by_other_detail" style="width:100%;resize:vertical;"></textarea>
                                </div>


                            </div>

                            <div id="trust-beneficial-beneficiary_hide_div">

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Name of company</label>
                                    <input name="bn_name_of_company" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Represented by</label>
                                    <input name="bn_represented_by" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Date of incorporation</label>
                                    <div class="input-group date stDate col-sm-12">
                                        <input name="bn_date_of_incorp" class="form-control height_25 stDate_current" type="text">
                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Registered in</label>
                                    <input name="bn_registered_in" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Register of members</label>
                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="bn_is_member_register" id="bn_show_shareholder_dt_reg-meb_btn"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="bn_is_member_register" id="bn_hide_shareholder_dt_reg-meb_btn" checked="checked"> 
                                            No
                                        </label> 
                                    </div>
                                </div>
                                <div class="form-group td-area-form-marg" id="bn_show-hide_shareholder_dt_reg-meb_btn" style="margin-bottom:10px !important;display:none;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Date of member of directors</label>
                                    <div class="input-group date stDate col-sm-12" style="margin-bottom:10px !important;">
                                        <input name="bn_member_register_date" class="form-control height_25 stDate_current" type="text">
                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Register of directors</label>

                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="bn_is_director_register" id="bn_register_of_directors_show_div"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="bn_is_director_register" id="bn_register_of_directors_hide_div" checked="checked"> 
                                            No
                                        </label> 
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" id="bn_register_of_directors_show_hide_div" style="margin-bottom:10px !important;display:none;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Date of register of directors</label>
                                    <div class="input-group date stDate col-sm-12">
                                        <input name="bn_director_register_date" class="form-control height_25 stDate_current" type="text">
                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Corporate profile</label>

                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="bn_is_corporate_profile"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="bn_is_corporate_profile" checked="checked"> 
                                            No
                                        </label> 
                                    </div>

                                </div>


                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Audited accounts</label>
                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="bn_is_audited_account" id="bn_shareholder-audited-accounts_show_div"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="bn_is_audited_account" id="bn_shareholder-audited-accounts_hide_div" checked="checked"> 
                                            No
                                        </label> 
                                    </div>
                                </div>

                                <div id="bn_shareholder-audited-accounts_show_hide_div" style="display:none;">
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Date of financial year end</label>
                                        <div class="input-group date stDate col-sm-12">
                                            <input name="bn_date_of_finantial_year_end" class="form-control height_25 stDate_current" type="text">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Bank reference</label>
                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="bn_is_bank_ref" id="bn_shareholder-bank-reference-2_show_div"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="bn_is_bank_ref" id="bn_shareholder-bank-reference-2_hide_div" checked="checked"> 
                                            No
                                        </label> 
                                    </div>
                                </div>

                                <div id="bn_shareholder-bank-reference-2_show_hide_div" style="display:none;">
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Name of bank </label>
                                        <input name="bn_bank_name" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                    </div>
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Date</label>
                                        <div class="input-group date stDate col-sm-12">
                                            <input name="bn_date" class="form-control height_25 stDate_current" type="text">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Proof of address</label>

                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="bn_has_address_proof" id="bn_shareholder-proof_add-2_show_div"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="bn_has_address_proof" id="bn_shareholder-proof_add-2_hide_div" checked="checked"> 
                                            No
                                        </label> 
                                    </div>

                                </div>

                                <div id="bn_shareholder-proof_add-2_show_hide_div" style="display:none;">
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                                        <textarea name="bn_address" style="width:100%;resize:vertical;"></textarea>
                                    </div>
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Country</label>
                                        <select name="bn_country" class="form-control plahole_font" style="width: 100%;">
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
                                            <input name="bn_address_proof_date" class="form-control height_25 stDate_current" type="text">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group td-area-form-marg">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Remarks</label>
                                    <textarea name="bn_remarks" style="width:100%;resize:vertical;"></textarea>
                                </div>


                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;border-bottom:1px solid #ddd;">
                                <label class="client-detailes-sub_heading" style="margin-bottom:0px;"><strong>KYC documents on Protector</strong></label>
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Protector - Individual</label>

                                <div class="radio pull-left" style="margin-right:30px;">
                                    <label class="radio-custom-none">
                                        <input type="radio" class="radioYesBtn" name="is_protector" id="trust-beneficial-Protector_show_btn"> 
                                         Yes
                                    </label> 
                                </div>

                                <div class="radio pull-left" style="margin-right:30px;"> 
                                    <label class="radio-custom-none"> 
                                        <input type="radio" class="radioNoBtn" name="is_protector" id="trust-beneficial-Protector_hide_btn" checked="checked"> 
                                         No
                                    </label> 
                                </div>
                            </div>
                        <div id="trust-beneficial-Protector_show_div" style="display:none;">

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Name of protector</label>
                                    <input name="py_name_of_protector" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Passport</label>

                                    <div class="radio pull-left" style="margin-right:30px;">
                                            <label class="radio-custom-none">
                                                    <input type="radio" class="radioYesBtn" name="py_is_passport" id="py_shareholder-passport-2_show_div"> 
                                                     Yes
                                            </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                            <label class="radio-custom-none"> 
                                                    <input type="radio" class="radioNoBtn" name="py_is_passport" id="py_shareholder-passport-2_hide_div" checked="checked"> 
                                                     No
                                            </label> 
                                    </div>
                            </div>
                            <div id="py_shareholder-passport-2_show_hide_div" style="display:none;">

<!--                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Name of protector</label>
                                    <input name="py_name_of_protector" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                </div>-->

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Passport number</label>
                                        <input name="py_passport_no" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                    </div>
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Country of issue</label>
                                        <select name="py_country_of_issue" class="form-control plahole_font" style="width: 100%;">
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

                                        <div class="input-group date stDate_tr_by">
                                            <input id="py_date_of_issue" name="py_date_of_issue" class="form-control height_25 stDate_current" type="text">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>

                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Date of expiry</label>

                                        <div class="input-group date stDate_tr_by">
                                            <input id="py_date_of_expiry" name="py_date_of_expiry" class="form-control height_25 stDate_current" type="text">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">CV</label>

                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="py_has_cv" id="py_shareholder-cv_show_div"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="py_has_cv" id="py_shareholder-cv_hide_div" checked="checked"> 
                                            No
                                        </label> 
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" id="py_shareholder-cv_show_hide_div" style="margin-bottom:10px !important;display:none;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Date received</label>

                                    <div class="input-group date stDate col-sm-12">
                                        <input name="py_recieved_date" class="form-control height_25 stDate_current" type="text">
                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Bank reference</label>

                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="py_is_bank_ref" id="py_shareholder-bank-reference_show_div"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="py_is_bank_ref" id="py_shareholder-bank-reference_hide_div" checked="checked"> 
                                            No
                                        </label> 
                                    </div>
                                </div>

                                <div id="py_shareholder-bank-reference_show_hide_div" style="display:none;">
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Bank</label>
                                        <input name="py_bank_name" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                    </div>
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Date</label>

                                        <div class="input-group date stDate col-sm-12">
                                            <input name="py_date" class="form-control height_25 stDate_current" type="text">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Proof of address</label>

                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="py_has_address_proof" id="py_shareholder-proof_add_show_div"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="py_has_address_proof" id="py_shareholder-proof_add_hide_div" checked="checked"> 
                                            No
                                        </label> 
                                    </div>

                                </div>

                                <div id="py_shareholder-proof_add_show_hide_div" style="display:none;">
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                                        <textarea name="py_address" style="width:100%;resize:vertical;"></textarea>
                                    </div>
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Country</label>
                                        <select name="py_country" class="form-control plahole_font" style="width: 100%;">
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
                                            <input name="py_address_proof_date" class="form-control height_25 stDate_current" type="text">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Other</label>
                                    <textarea name="py_other_detail" style="width:100%;resize:vertical;"></textarea>
                                </div>


                            </div>

                            <div id="trust-beneficial-Protector_hide_div">

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Name of company</label>
                                    <input name="pn_name_of_company" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Represented by</label>
                                    <input name="pn_represented_by" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Date of incorporation</label>
                                    <div class="input-group date stDate col-sm-12">
                                        <input name="pn_date_of_incorp" class="form-control height_25 stDate_current" type="text">
                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Registered in</label>
                                    <input name="pn_registered_in" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Register of members</label>
                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="pn_is_member_register" id="pn_show_shareholder_dt_reg-meb_btn"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="pn_is_member_register" id="pn_hide_shareholder_dt_reg-meb_btn" checked="checked"> 
                                            No
                                        </label> 
                                    </div>
                                </div>
                                <div class="form-group td-area-form-marg" id="pn_show-hide_shareholder_dt_reg-meb_btn" style="margin-bottom:10px !important;display:none;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Date of member of directors</label>
                                    <div class="input-group date stDate col-sm-12" style="margin-bottom:10px !important;">
                                        <input name="pn_member_register_date" class="form-control height_25 stDate_current" type="text">
                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Register of directors</label>

                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="pn_is_director_register" id="pn_register_of_directors_show_div"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="pn_is_director_register" id="pn_register_of_directors_hide_div" checked="checked"> 
                                            No
                                        </label> 
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" id="pn_register_of_directors_show_hide_div" style="margin-bottom:10px !important;display:none;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Date of register of directors</label>
                                    <div class="input-group date stDate col-sm-12">
                                        <input name="pn_director_register_date" class="form-control height_25 stDate_current" type="text">
                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Corporate profile</label>

                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="pn_is_corporate_profile"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="pn_is_corporate_profile" checked="checked"> 
                                            No
                                        </label> 
                                    </div>

                                </div>


                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Audited accounts</label>
                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="pn_is_audited_account" id="pn_shareholder-audited-accounts_show_div"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="pn_is_audited_account" id="pn_shareholder-audited-accounts_hide_div" checked="checked"> 
                                            No
                                        </label> 
                                    </div>
                                </div>

                                <div id="pn_shareholder-audited-accounts_show_hide_div" style="display:none;">
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Date of financial year end</label>
                                        <div class="input-group date stDate col-sm-12">
                                            <input name="pn_date_of_finantial_year_end" class="form-control height_25 stDate_current" type="text">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Bank reference</label>
                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="pn_is_bank_ref" id="pn_shareholder-bank-reference-2_show_div"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="pn_is_bank_ref" id="pn_shareholder-bank-reference-2_hide_div" checked="checked"> 
                                            No
                                        </label> 
                                    </div>
                                </div>

                                <div id="pn_shareholder-bank-reference-2_show_hide_div" style="display:none;">
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Name of bank </label>
                                        <input name="pn_bank_name" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                    </div>
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Date</label>
                                        <div class="input-group date stDate col-sm-12">
                                            <input name="pn_date" class="form-control height_25 stDate_current" type="text">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Proof of address</label>

                                    <div class="radio pull-left" style="margin-right:30px;">
                                        <label class="radio-custom-none">
                                            <input type="radio" class="radioYesBtn" name="pn_has_address_proof" id="pn_shareholder-proof_add-2_show_div"> 
                                            Yes
                                        </label> 
                                    </div>

                                    <div class="radio pull-left" style="margin-right:30px;"> 
                                        <label class="radio-custom-none"> 
                                            <input type="radio" class="radioNoBtn" name="pn_has_address_proof" id="pn_shareholder-proof_add-2_hide_div" checked="checked"> 
                                            No
                                        </label> 
                                    </div>

                                </div>

                                <div id="pn_shareholder-proof_add-2_show_hide_div" style="display:none;">
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                                        <textarea name="pn_address" style="width:100%;resize:vertical;"></textarea>
                                    </div>
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Country</label>
                                        <select name="pn_country" class="form-control plahole_font" style="width: 100%;">
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
                                            <input name="pn_address_proof_date" class="form-control height_25 stDate_current" type="text">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group td-area-form-marg">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Remarks</label>
                                    <textarea name="pn_remarks" style="width:100%;resize:vertical;"></textarea>
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
<!---------END Add TRUSTS Corporate Modal box---------->

<!---------START Add TRUSTS  Corporate Modal box-------->
<div class="modal fade"  id="edit-trusts_corporate-modal-box">
    <div class="modal-dialog modal_box_custome_size">
        <div class="modal-content">
            <!-- Modal heading -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Edit Beneficiary and Protectors</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="innerLR" style="padding:0;" id="trust_beneficiary_edit_bar">
                    
                </div>
            </div>
            <!-- // Modal body END -->
        </div>
    </div>
</div>
<!---------END Add TRUSTS Corporate Modal box---------->



