    <?php
    $CI = & get_instance();
    $CI->load->model('databaseinfo_model');
    $type_of_share_list = $CI->databaseinfo_model->getShareholderAllotmentTypeofshareList();
    
    $common_data = $CI->databaseinfo_model->getCommonDirector();
    
    $capital_after_reduction="";
    $date_of_capital_reduction="";
    $stated_capital_after_reduction="";
    $capitalInfoArr = $CI->databaseinfo_model->getCapitalRedemptionData($client_id);
    if(!empty($capitalInfoArr)){
        $capital_after_reduction = $capitalInfoArr[0]['capital_after_reduction'];
        $date_of_capital_reduction = ($capitalInfoArr[0]['date_of_capital_reduction']!='0000-00-00 00:00:00')?date('d F Y', strtotime($capitalInfoArr[0]['date_of_capital_reduction'])):"";
        $stated_capital_after_reduction = $capitalInfoArr[0]['stated_capital_after_reduction'];
    }
    
    
    
    

?>
<div class="box-generic" style="padding:0px;box-shadow:none;">
    <!-----START Shareholder Sub tab----->
    <div class="tabsbar" style="height:30px;">
        <ul style="height:30px;">
            <li class="glyphicons camera active" style="height:30px;">
                <a href="#shareholder-individual-tab" data-toggle="tab" style="height:24px;line-height:24px;"id="tab-shareholder-info" onclick="tb_short('th-individual-action');" >Shareholder Info</a>
            </li>
            <li class="glyphicons folder_open" style="height:30px;">
                <a href="#shareholder-corporate-tab" data-toggle="tab" style="height:24px;line-height:24px;" id="tab-shareholder-allot" onclick="tb_short('th-allot-action');">Allotment/Transfers</a>
            </li>            
            <li class="glyphicons folder_open" style="height:30px;">
                <a href="#shareholder-redemption-buyback-tab" data-toggle="tab" style="height:24px;line-height:24px;" onclick="tb_short('th_red');" id="tab-redemption">Redemption and/or buy back</a>
            </li>           
            <li class="glyphicons folder_open" style="height:30px;">
                <a href="#shareholder-capital-redemption-tab" data-toggle="tab" style="height:24px;line-height:24px;"  id="tab-capital-reduction">Capital reduction</a>
            </li>
        </ul>
    </div>

    <div class="tab-content" style="padding-left:11px;padding-right:10px;">
        <!---START Add individual Tab--->
        <div class="tab-pane active" id="shareholder-individual-tab">
            <a href="#add-share-holder-individual-modal-box" data-toggle="modal" class="btn-xs btn-success pull-right addbtn" style="margin-bottom:5px;">Add More</a>
            <div class="widget-body overflow-x" style="padding:10px 0px;width:100%;" id="shareholder_individual_data_body">
                
            </div>
        </div>
        <!---END Add individual Tab--->

        <!---START Add corporate Tab--->
        <div class="tab-pane" id="shareholder-corporate-tab">
            <a href="#add-share-holder-corporate-modal-box" data-toggle="modal" class="btn-xs btn-success pull-right addbtn" style="margin-bottom:5px;">Add More</a>
            <div class="widget-body overflow-x" style="padding:10px 0px;width:100%;" id="shareholder_allotment_data_body">
                
            </div>
        </div>
        <!---END Add corporate Tab--->
        
        <!---START Add redemption Tab--->
        <div class="tab-pane" id="shareholder-redemption-buyback-tab">
            <a href="#add-share-holder-redemption-buyback-modal-box" data-toggle="modal" class="btn-xs btn-success pull-right addbtn" style="margin-bottom:5px;">Add More</a>
            <div class="widget-body overflow-x" style="padding:10px 0px;width:100%;" id="shareholder_redemption_buyback_data_body">
                
            </div>
        </div>
        <!---END Add redemption Tab--->
        
        <!---START Add capital redemption Tab--->
       <div class="tab-pane" id="shareholder-capital-redemption-tab">
           <!--------START Introducer tab----------->
                                    <div class="row">
                                        <div class="col-md-12"><span class="corporate-data-sub-headding-tab">Capital Information</span></div>
                                        <form class="form-horizontal" role="form" id="capital_redemption_info" name="capital_redemption_info">                                           
                                            <input type="hidden" name="client_info" id="client_info" value="<?php echo $client_id;?>" >
                                            <div class="col-md-6">
                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">Capital being reduced</label>
                                                    <input value="<?php echo $capital_after_reduction; ?>" name="capital_after_reduction" id="capital_after_reduction" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                                </div>

                                              
                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">Date of capital reduction</label>
                                                    <div class="input-group date stDate col-sm-12">
                                                        <input value="<?php echo $date_of_capital_reduction; ?>" name="date_of_capital_reduction" id="date_of_capital_reduction" class="form-control height_25" type="text">
                                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                                    </div>
                                                </div>
                                                

                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">Stated capital after capital reduction</label>
                                                    <input value="<?php echo $stated_capital_after_reduction;?>" name="stated_capital_after_reduction" id="stated_capital_after_reduction" type="text" class="form-control height_25 plahole_font required" style="width: 100%;">
                                                </div>
                                                
                                             <div  class="col-md-12" style="clear:both;margin-bottom:20px;margin-top:20px;">
                                                
                                                <a href="#" class="btn-sm btn-success pull-right" type="button" onclick="save_form('capital_redemption_info');" style="margin-left:10px;">Save</a>
                                                <a href="#" class="btn-sm btn-danger pull-right" onclick="reset_form('capital_redemption_info')" type="button">Cancel</a>
                                            </div>                                                

                                            </div>                                         
                                          

                                        </form>
                                    </div>
                                    <!--------END Introducer tab------------->
       </div>
       <!---END Add capital redemption Tab--->
        

    </div>
    <!-----END Shareholder Sub tab------->

</div>

<script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>        
<script src="<?php echo base_url(); ?>assets/js/db_ready.js"></script>
<script>
    ajax_call=false;
    dynamicTable_shareholder_individual = 'dynamicTable1';
    dynamicTable_shareholder_allotment = 'dynamicTable2';
    dynamicTable_shareholder_redemption_share ='dynamicTable3'
    $(document).ready(function() {
        ready_on_db();
        stuff_on_ready();
        var cur_date = get_current_date();
        $(".stDate").val(cur_date);
        $('.stDate').bdatepicker({
            format: "dd MM yyyy",
            autoclose: true,
        });
        
        $('.addbtn').on('click',function(){
            setTimeout(function(){
                    $("#add-shareholder-individual-form").data('bootstrapValidator').resetForm(); 
                    $("#add-shareholder-allotment-form").data('bootstrapValidator').resetForm();                     
                    $("#add-share-holder-redemption-buyback-form").data('bootstrapValidator').resetForm(); 
                     
                     
                    
//                    $("#add-shareholder-corporate-form").data('bootstrapValidator').resetForm();
                    var cur_date = get_current_date();
                    //$(".stDate_current").val(cur_date);
                    $('.stDate').bdatepicker({
                        format: "dd MM yyyy",
                        autoclose: true,
                    });
                    $('.stDate_share_i').bdatepicker("update",cur_date);
            },400);
        });
            
        /******************START share-holder-reg-member_show_hide_div*************/
        $("#share-holder-reg-member_show_div").click(function(){
            $("#share-holder-reg-member_show_hide_div").slideDown();
        });

        $("#share-holder-reg-member_hide_div").click(function(){
            $("#share-holder-reg-member_show_hide_div").slideUp();
        });
        /******************END share-holder-reg-member_show_hide_div*************/

        /******************START share-holder-info_show_hide_div*************/
        $("#share-holder-info_show_btn").click(function(){
                $("#share-holder-info_show_div").slideDown();
                $("#share-holder-info_hide_div").slideUp();
                $("#add-shareholder-individual-form").data('bootstrapValidator').resetForm(); 
        });

        $("#share-holder-info_hide_btn").click(function(){
                $("#share-holder-info_show_div").slideUp();
                $("#share-holder-info_hide_div").slideDown();
                $("#add-shareholder-individual-form").data('bootstrapValidator').resetForm(); 
        });
        /******************END share-holder-info_show_hide_div*************/
                                
        /*********START shareholder-passport_show_hide_div yes no radio button**********/
        $("#shareholder-passport_show_div").click(function(){
            $("#shareholder-passport_show_hide_div").slideDown();
        });
        $("#shareholder-passport_hide_div").click(function(){
            $("#shareholder-passport_show_hide_div").slideUp();
        });
        /***********END shareholder-passport_show_hide_div yes no radio button**********/

        /*********START shareholder-cv_show_hide_div yes no radio button**********/
        $("#shareholder-cv_show_div").click(function(){
            $("#shareholder-cv_show_hide_div").slideDown();
        });
        $("#shareholder-cv_hide_div").click(function(){
            $("#shareholder-cv_show_hide_div").slideUp();
        });
        /***********END shareholder-cv_show_hide_div yes no radio button**********/

        /*********START  shareholder-bank-reference_show_hide_div yes no radio button**********/
        $("#shareholder-bank-reference_show_div").click(function(){
            $("#shareholder-bank-reference_show_hide_div").slideDown();
        });
        $("#shareholder-bank-reference_hide_div").click(function(){
            $("#shareholder-bank-reference_show_hide_div").slideUp();
        });
        /***********END  shareholder-bank-reference_show_hide_div yes no radio button**********/

        /*********START shareholder-proof_add_show_hide_div yes no radio button**********/
        $("#shareholder-proof_add_show_div").click(function(){
            $("#shareholder-proof_add_show_hide_div").slideDown();
        });
        $("#shareholder-proof_add_hide_div").click(function(){
            $("#shareholder-proof_add_show_hide_div").slideUp();
        });
        
        $('#director_company_data').change(function(){                    
                        var element = $("option:selected", this);
                        var director_surname = element.attr("data-surname"); 
                        $("#director_surname").val(director_surname);                      
                     
        });
                     
        /***********END shareholder-proof_add_show_hide_div yes no radio button**********/
        
        $("#show_shareholder_dt_reg-meb_btn").click(function(){
            $("#show-hide_shareholder_dt_reg-meb_btn").slideDown();
        });
				
        $("#hide_shareholder_dt_reg-meb_btn").click(function(){
            $("#show-hide_shareholder_dt_reg-meb_btn").slideUp();
        });
        
        /*********START shareholder-audited-accounts_show_hide_div yes no radio button**********/
            $("#shareholder-audited-accounts_show_div").click(function(){
                $("#shareholder-audited-accounts_show_hide_div").slideDown();
            });
            $("#shareholder-audited-accounts_hide_div").click(function(){
                $("#shareholder-audited-accounts_show_hide_div").slideUp();
            });
            /***********END shareholder-audited-accounts_show_hide_div yes no radio button**********/

            $("#shareholder-bank-reference-2_show_div").click(function(){
                $("#shareholder-bank-reference-2_show_hide_div").slideDown();
            });
            $("#shareholder-bank-reference-2_hide_div").click(function(){
                $("#shareholder-bank-reference-2_show_hide_div").slideUp();
            });
            /***********END  shareholder-bank-reference_show_hide_div yes no radio button**********/

            /*********START shareholder-proof_add-2_show_hide_div yes no radio button**********/
            $("#shareholder-proof_add-2_show_div").click(function(){
                $("#shareholder-proof_add-2_show_hide_div").slideDown();
            });
            $("#shareholder-proof_add-2_hide_div").click(function(){
                $("#shareholder-proof_add-2_show_hide_div").slideUp();
            });
            
            $("#shareholder-passport-2_show_div").click(function(){
                $("#shareholder-passport-2_show_hide_div").slideDown();
                var cur_date = get_current_date();
                    //$(".stDate_current").val(cur_date);
                    $('.stDate').bdatepicker({
                        format: "dd MM yyyy",
                        autoclose: true,
                    });
                    $('.stDate_share_i').bdatepicker("update",cur_date);
                    $("#add-shareholder-individual-form").data('bootstrapValidator').resetForm(); 
            });
            $("#shareholder-passport-2_hide_div").click(function(){
                $("#shareholder-passport-2_show_hide_div").slideUp();
            });
            /***********END shareholder-passport_show_hide_div yes no radio button**********/
                        
            
            
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
              
              
//               setTimeout(function(){      
//               
//         $( "#tab-redemption" ).click(function() {
//                    $( "#th_red" ).trigger( "click" ); 
//                    $( "#th-allot-action" ).trigger( "click" );  
//                    $( "#th-individual-action" ).trigger( "click" );   
//
//        });
//
//        $( "#tab-shareholder-allot" ).click(function() {
//                $( "#th_red" ).trigger( "click" ); 
//                $( "#th-allot-action" ).trigger( "click" );  
//                $( "#th-individual-action" ).trigger( "click" );   
//        });
//
//         $( "#tab-shareholder-info" ).click(function() {
//                $( "#th_red" ).trigger( "click" ); 
//                $( "#th-allot-action" ).trigger( "click" );  
//                $( "#th-individual-action" ).trigger( "click" );  
//         });
//    
//       
//    },100);
//    
    
    });
    
    
    function tb_short(id){
          
          setTimeout(function(){  
                 $( "#"+id ).trigger( "click" ); 
        },200);
    }
    
    
    function stuff_on_ready() {
        var core_url = CURRENT_URL;
        // For load default grid.
        var load_data_body1 = "shareholder_individual_data_body";
        blockUI(load_data_body1);
        var url1 = core_url + "/databaseinfo/get_shareholder_individual_grid_data";
        grid_data(load_data_body1, url1, dynamicTable_shareholder_individual);
        
        $('.stDate_share_i').bdatepicker({
	  format: "dd MM yyyy",
	   autoclose: true
	 }).on('changeDate', function(e) {
		// Revalidate the date field
		$('#add-shareholder-individual-form24').bootstrapValidator('revalidateField', 'date_of_issue');
		$('#add-shareholder-individual-form24').bootstrapValidator('revalidateField', 'date_of_expiry');	
	});
        var validator = $('#add-shareholder-individual-form').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                name_of_shareholder: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                name_of_corporate_shareholder:{
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
            submit_shareholder_individual_form('add-shareholder-individual-form', 'add', '');
        });
        
        var load_data_body1 = "shareholder_allotment_data_body";
        blockUI(load_data_body1);
        var url1 = core_url + "/databaseinfo/get_shareholder_allotment_grid_data";
        grid_data(load_data_body1, url1, dynamicTable_shareholder_allotment);

        var validator = $('#add-shareholder-allotment-form').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                shareholder: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                }, 
                holding_after_allotment: {
                    validators: {
                        numeric: {
                            message: 'The value should be an integer or decimal'
                        },
                        between: {
                            min: 1,
                            max: 100,
                            message: 'Value should be in between or equal to 1 to 100'
                        }
                    }
                },
                transfer_holding_after_allotment: {
                    validators: {
                        numeric: {
                            message: 'The value should be an integer or decimal'
                        },
                        between: {
                            min: 1,
                            max: 100,
                            message: 'Value should be in between or equal to 1 to 100'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            e.preventDefault();
            submit_shareholder_allotment_form('add-shareholder-allotment-form', 'add', '');
        });
        
        var load_data_body2 = "shareholder_redemption_buyback_data_body";
        blockUI(load_data_body2);
        var url2 = core_url + "/databaseinfo/get_shareholder_redemption_grid_data";
        grid_data(load_data_body2, url2, dynamicTable_shareholder_redemption_share);


    
        
        var validator = $('#capital_redemption_info').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                
                capital_after_reduction: {
                    validators: {
                        numeric: {
                            message: 'The value should be an integer or decimal'
                        }
                    }
                },
                stated_capital_after_reduction: {
                    validators: {
                        numeric: {
                            message: 'The value should be an integer or decimal'
                        }
                    }
                }
                
            },
            
        })
        .on('success.form.bv', function(e) {
            e.preventDefault();           
        });
        
        
        $('.addbtn').on('click',function(){
            $('#add-shareholder-individual-form').data('bootstrapValidator').resetForm();
            $('#add-shareholder-allotment-form').data('bootstrapValidator').resetForm();
        })
    }
    
    function submit_shareholder_individual_form(form, action, id) {
        var load_data_body = 'shareholder_individual_data_body';
        var core_url = CURRENT_URL;
        var url = core_url + "/databaseinfo/submit_shareholder_individual_form";
        blockUI(load_data_body);
        submit_form(form, load_data_body, url, action, id, function(data) {
            var url = core_url + "/databaseinfo/get_shareholder_individual_grid_data";
            grid_data(load_data_body, url, dynamicTable_shareholder_individual);
        });
    }
    
    function edit_shareholder_ind_bar(id) {
        blockUI('shareholder_individual_edit_bar');
        var load_data_body = 'shareholder_individual_edit_bar';
        var db_name = 'db_shareholder_individual';
        var db_field_id = 'shareholder_ind_id';
        var tag = 'shareholder_individual';
        var view_folder = 'Shareholder';
        var core_url = CURRENT_URL;
        var url = core_url + "/databaseinfo/get_item_detail_for_edit";
        edit_box(load_data_body, url, id, db_name, db_field_id, tag, view_folder)
    }
    
    function delete_shareholder_ind_bar(id){
        var load_data_body = 'shareholder_individual_data_body';
        var db_name = 'db_shareholder_individual';
        var db_field_id = 'shareholder_ind_id';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/delete_item";
        var title = "Delete Shareholder's Information";
        var grid_url = CURRENT_URL+"/databaseinfo/get_shareholder_individual_grid_data";
        var tag = "Shareholder's Information"
        delete_box(load_data_body,url,id,db_name,db_field_id,title,grid_url,dynamicTable_shareholder_individual,tag)
    }
    
    function submit_shareholder_allotment_form(form, action, id) {
        var load_data_body = 'shareholder_allotment_data_body';
        var core_url = CURRENT_URL;
        var url = core_url + "/databaseinfo/submit_shareholder_allotment_form";
        blockUI(load_data_body);
        submit_form(form, load_data_body, url, action, id, function(data) {
            var url = core_url + "/databaseinfo/get_shareholder_allotment_grid_data";
            grid_data(load_data_body, url, dynamicTable_shareholder_allotment);
        });
    }
    
    function edit_shareholder_allotment_bar(id) {
        blockUI('shareholder_allotment_edit_bar');
        var load_data_body = 'shareholder_allotment_edit_bar';
        var db_name = 'db_shareholder_allotment';
        var db_field_id = 'allotment_id';
        var tag = 'shareholder_allotment';
        var view_folder = 'Shareholder';
        var core_url = CURRENT_URL;
        var url = core_url + "/databaseinfo/get_item_detail_for_edit";
        edit_box(load_data_body, url, id, db_name, db_field_id, tag, view_folder)
    }
    
    function delete_shareholder_allotment_bar(id){
        var load_data_body = 'shareholder_allotment_data_body';
        var db_name = 'db_shareholder_allotment';
        var db_field_id = 'allotment_id';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/delete_item";
        var title = "Delete shareholder's Allotment/Transfers Information";
        var grid_url = CURRENT_URL+"/databaseinfo/get_shareholder_allotment_grid_data";
        var tag = "Shareholder's Allotment/Transfers Information"
        delete_box(load_data_body,url,id,db_name,db_field_id,title,grid_url,dynamicTable_shareholder_allotment,tag)
    }
    
    
    function data_modal_box_typeofshare(action,tag){
//        if(tag==''){
//            $("#add-corporate-allotment-form").data('bootstrapValidator').resetForm(); 
//        } else {
//            $("#add-corporate-allotment-form").data('bootstrapValidator').resetForm(); 
//        }
        var add_div = 'share-type-plus-icon-corporate'+tag;
        var edit_delete_div = 'share-type-edit-delete-icon-corporate'+tag;
        var element_id = 'share-type-type-show-hide_div-corporate'+tag;
        var placeholder = 'Type of share';
        var dbname = 'db_shareholder_allotment_typeofshare';
        var db_field_name = 'type_of_share';
        var db_field_id = 'type_id';
        var loader_element_id = 'modal-body-corporate-allotment'
        var message_title = 'type of share';
        var success_msg_id = 'typeofshare_success_msg_add'+tag;
        var error_msg_id = 'typeofshare_err_msg_add'+tag;
        var title_on_add = 'Add type of share';
        var title_on_edit = 'Edit type of share';
        var title_on_delete = 'Delete type of share';
        var item_id_on_add = 0;
        var item_id_on_edit = $("#" + element_id + " :selected").val();
        var item_id_on_delete = element_id;
        var item_name_on_edit = $("#" + element_id + " :selected").text();
        add_edit_delete_list_on_modal_s(action,add_div,edit_delete_div,element_id,dbname,placeholder,db_field_name,db_field_id,loader_element_id,message_title,success_msg_id,error_msg_id,title_on_add,title_on_edit,title_on_delete,item_id_on_add,item_id_on_edit,item_id_on_delete,item_name_on_edit)
    }
    
    function data_modal_box_typeofshare1(action,tag){
//        if(tag==''){
//            $("#add-corporate-allotment-form").data('bootstrapValidator').resetForm(); 
//        } else {
//            $("#add-corporate-allotment-form").data('bootstrapValidator').resetForm(); 
//        }
        var add_div = 'share-type-plus-icon-corporate-transfer'+tag;
        var edit_delete_div = 'share-type-edit-delete-icon-corporate-transfer'+tag;
        var element_id = 'share-type-type-show-hide_div-corporate-transfer'+tag;
        var placeholder = 'Type of share';
        var dbname = 'db_shareholder_allotment_typeofshare';
        var db_field_name = 'type_of_share';
        var db_field_id = 'type_id';
        var loader_element_id = 'modal-body-corporate-allotment'
        var message_title = 'type of share';
        var success_msg_id = 'typeofshare_success_msg_add'+tag;
        var error_msg_id = 'typeofshare_err_msg_add'+tag;
        var title_on_add = 'Add type of share';
        var title_on_edit = 'Edit type of share';
        var title_on_delete = 'Delete type of share';
        var item_id_on_add = 0;
        var item_id_on_edit = $("#" + element_id + " :selected").val();
        var item_id_on_delete = element_id;
        var item_name_on_edit = $("#" + element_id + " :selected").text();
        add_edit_delete_list_on_modal_s(action,add_div,edit_delete_div,element_id,dbname,placeholder,db_field_name,db_field_id,loader_element_id,message_title,success_msg_id,error_msg_id,title_on_add,title_on_edit,title_on_delete,item_id_on_add,item_id_on_edit,item_id_on_delete,item_name_on_edit)
    }
    
    function add_edit_delete_list_on_modal_s(action,add_div,edit_delete_div,element_id,dbname,placeholder,db_field_name,db_field_id,loader_element_id,message_title,success_msg_id,error_msg_id,title_on_add,title_on_edit,title_on_delete,item_id_on_add,item_id_on_edit,item_id_on_delete,item_name_on_edit) {
        if (action == "add") {
            data_modal_box_add_s(title_on_add, element_id, placeholder, dbname, action, db_field_name, db_field_id, item_id_on_add, add_div, edit_delete_div, success_msg_id, error_msg_id, loader_element_id,message_title)
        } else if (action == "edit") {
            data_modal_box_edit_s(title_on_edit, element_id, placeholder, dbname, action, db_field_name, db_field_id, item_id_on_edit, add_div, edit_delete_div, item_name_on_edit, success_msg_id, error_msg_id, loader_element_id,message_title)
        } else if (action == "delete") {
            data_modal_box_delete_s(title_on_delete, element_id, placeholder, dbname, action, db_field_name, db_field_id, item_id_on_delete, add_div, edit_delete_div, success_msg_id, error_msg_id, loader_element_id,message_title)
        }
    }
    
    /* Start code for modal box */
    function data_modal_box_add_s(title,element_id,placeholder,dbname,action,db_field_name,db_field_id,item_id,add_div,edit_delete_div,success_msg_id,error_msg_id,loader_element_id,message_title){
        $('#item_name').css('border','solid 1px #e1e0df');
        bootbox.dialog({
            message: '<input type="text" id="item_name" name="name" style="height:28px;" class="form-control" placeholder="'+placeholder+'"><div id="err_cat" style="color:#a94442;margin-top:4px;display:none;font-size: 13px;">This field is required.</div>',
            title: title,
            buttons: {
                success: {
                    label: "Save",
                    className: "btn-sm btn-success pull-right modal-custom-button",
                    callback: function() {
                        var item_name = $('#item_name').val();
                        if($('#item_name').val()==""){
                            $('#err_cat').show();
                            $('#item_name').css('border','solid 1px #ebccd1');
                            $('#item_name').focus();
                            return false;
                        }
                        submit_item_s(title,element_id,placeholder,dbname,action,item_name,db_field_name,db_field_id,item_id,add_div,edit_delete_div,success_msg_id,error_msg_id,loader_element_id,message_title)
                    }
                },
                danger: {
                    label: "Cancel",
                    className: "btn-sm btn-primary pull-right modal-custom-button modal-custom-button_left",
                    callback: function() {

                    }
                }
            }
        });
        $('#item_name').on('keyup',function(){
            $('#item_name').css('border','solid 1px #e1e0df');
            $('#err_cat').hide();
        });
        
    }
    
    function data_modal_box_edit_s(title,element_id,placeholder,dbname,action,db_field_name,db_field_id,item_id,add_div,edit_delete_div,item_name_pre,success_msg_id,error_msg_id,loader_element_id,message_title){
        $('#item_name').css('border','solid 1px #e1e0df');
        
        bootbox.dialog({
            message: '<input type="text" id="item_name" value="'+item_name_pre+'" name="name" style="height:28px;" class="form-control" placeholder="'+placeholder+'"><div id="err_cat" style="color:#a94442;margin-top:4px;display:none;font-size: 13px;">This field is required.</div>',
            title: title,
            buttons: {
                success: {
                    label: "Save Changes",
                    className: "btn-sm btn-success pull-right modal-custom-button",
                    callback: function() {
                        var item_name = $('#item_name').val();
                        if($('#item_name').val()==""){
                            $('#err_cat').show();
                            $('#item_name').css('border','solid 1px #ebccd1');
                            $('#item_name').focus();
                            return false;
                        }
                        submit_item_s(title,element_id,placeholder,dbname,action,item_name,db_field_name,db_field_id,item_id,add_div,edit_delete_div,success_msg_id,error_msg_id,loader_element_id,message_title)
                    }
                },
                danger: {
                    label: "Cancel",
                    className: "btn-sm btn-primary pull-right modal-custom-button modal-custom-button_left",
                    callback: function() {

                    }
                }
            }
        });
        $('#item_name').on('keyup',function(){
            $('#item_name').css('border','solid 1px #e1e0df');
            $('#err_cat').hide();
        });
        
    }
    function data_modal_box_delete_s(title,element_id,placeholder,dbname,action,db_field_name,db_field_id,item_id,add_div,edit_delete_div,success_msg_id,error_msg_id,loader_element_id,message_title){
        $('#item_name').css('border','solid 1px #e1e0df');
        item_id = $('#'+item_id).val();
        console.log(item_id);
        bootbox.dialog({
            message: 'Are you sure you want to delete this record?',
            title: title,
            buttons: {
                success: {
                    label: "Yes",
                    className: "btn-sm btn-success pull-right modal-custom-button",
                    callback: function() {
                        var item_name = '';
                        submit_item_s(title,element_id,placeholder,dbname,action,item_name,db_field_name,db_field_id,item_id,add_div,edit_delete_div,success_msg_id,error_msg_id,loader_element_id,message_title)
                    }
                },
                danger: {
                    label: "No",
                    className: "btn-sm btn-primary pull-right modal-custom-button modal-custom-button_left",
                    callback: function() {

                    }
                }
            }
        });
        $('#item_name').on('keyup',function(){
            $('#item_name').css('border','solid 1px #e1e0df');
            $('#err_cat').hide();
        });
        
    }
    
    function submit_item_s(title,element_id,placeholder,dbname,action,item_name,db_field_name,db_field_id,item_id,add_div,edit_delete_div,success_msg_id,error_msg_id,loader_element_id,message_title){
        blockUI(loader_element_id);
        item_name = $.trim(item_name);
        var object = {
                        title:title,
                        element_id:element_id,
                        placeholder:placeholder,
                        dbname:dbname,
                        item_name:item_name,
                        item_id:item_id,
                        db_field_name:db_field_name,
                        db_field_id:db_field_id,
                        action:action,
                        message_title:message_title
                    }
        var url=CURRENT_URL;
        $.ajax({
            type: "POST",
            url: url+"/databaseinfo/modal_box_data",
            dataType: 'json',
            data: object,
            success: function(msg){
                var status = msg.status;
                var message = msg.message;
                var item_data = msg.data;
                var insert_id = msg.insert_id;
                var str = '';
                str += '<option value="" selected="selected">Select</option>';
                $.each(item_data, function(i) {
                        if(item_data[i][db_field_name]==item_name)
                            str += '<option value="' + item_data[i][db_field_id] + '" selected="selected">' + item_data[i][db_field_name] + '</option>';
                        else
                            str += '<option value="' + item_data[i][db_field_id] + '">' + item_data[i][db_field_name] + '</option>';
                });
                if(action=="delete" && status==1){
                    $('#'+add_div).show();
                    $('#'+edit_delete_div).hide();
                } else {
                    if(action=="add" && status==0){
                        $('#'+add_div).show();
                        $('#'+edit_delete_div).hide();
                    } else {
                        $('#'+add_div).hide();
                        $('#'+edit_delete_div).show();
                    }
                }
                if(status==1){
                    $('#'+element_id).html(str);
                    var str1 = '';
                    str1 += '<option value="" selected="selected">Select</option>';
                    $.each(item_data, function(i) {
                        str1 += '<option value="' + item_data[i][db_field_id] + '">' + item_data[i][db_field_name] + '</option>';
                    });
                    
                    if(element_id=="share-type-type-show-hide_div-corporate"){
                        $('#share-type-type-show-hide_div-corporate-transfer').html(str1);
                        $('#share-type-plus-icon-corporate-transfer').show();
                        $('#share-type-edit-delete-icon-corporate-transfer').hide();
                    } else if(element_id=="share-type-type-show-hide_div-corporate-transfer") {
                        $('#share-type-type-show-hide_div-corporate').html(str1);
                        $('#share-type-plus-icon-corporate').show();
                        $('#share-type-edit-delete-icon-corporate').hide();
                        
                    }
                    
                    if(element_id=="share-type-type-show-hide_div-corporate-edit"){
                        $('#share-type-type-show-hide_div-corporate-transfer-edit').html(str1);
                        $('#share-type-plus-icon-corporate-transfer-edit').show();
                        $('#share-type-edit-delete-icon-corporate-transfer-edit').hide();
                    } else if(element_id=="share-type-type-show-hide_div-corporate-transfer-edit") {
                        $('#share-type-type-show-hide_div-corporate-edit').html(str1);
                        $('#share-type-plus-icon-corporate-edit').show();
                        $('#share-type-edit-delete-icon-corporate-edit').hide();
                    }
                        
                    
                }
                
                
                
                // last message and refresh list
                if(status==1){
                    $('.success-msg').text(message)
                    $('#'+success_msg_id).fadeIn();
                    setTimeout(function(){
                        $('#'+success_msg_id).fadeOut();
                    },4000);
                } else {
                    $('.error-msg').text(message)
                    $('#'+error_msg_id).fadeIn();
                    setTimeout(function(){
                        $('#'+error_msg_id).fadeOut();
                    },4000);
                }
                unblockUI(loader_element_id);
            }
        });
    }
    
    /* Start share holder redemtion */
    function submit_shareholder_redemption_buyback_form(form, action, id) {
        var load_data_body = 'shareholder_redemption_data_body';
        var core_url = CURRENT_URL;
        var url = core_url + "/databaseinfo/submit_shareholder_redemption_form";
        blockUI(load_data_body);
        submit_form(form, load_data_body, url, action, id, function(data) {
            
            var load_data_body2 = "shareholder_redemption_buyback_data_body";
            var url2 = core_url + "/databaseinfo/get_shareholder_redemption_grid_data";
            grid_data(load_data_body2, url2, dynamicTable_shareholder_redemption_share);
            ajax_call = false;
        });
    }
    
    function edit_shareholder_redemption_buyback_bar(id) {
       
        blockUI('shareholder_redemption_share_edit_bar');
        var load_data_body = 'shareholder_redemption_share_edit_bar';
        var db_name = 'db_shareholder_redemption';
        var db_field_id = 'redemption_id';
        var tag = 'shareholder_redemption_share';
        var view_folder = 'Shareholder';
        var core_url = CURRENT_URL;
        var url = core_url + "/databaseinfo/get_item_detail_for_edit";
        edit_box(load_data_body, url, id, db_name, db_field_id, tag, view_folder)
    }
    
    
    function delete_shareholder_redemption_share_bar(id){
        var load_data_body = 'shareholder_redemption_buyback_data_body';
        var db_name = 'db_shareholder_redemption';
        var db_field_id = 'redemption_id';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/delete_item";
        var title = "Delete Shareholder's Redemption and/or buy back Information";
        var grid_url = CURRENT_URL+"/databaseinfo/get_submit_shareholder_redemption_grid_data";
        var tag = "Shareholder's Information";            
        var dynamicTable_shareholder_redemption_share ="dynamicTable3";
        delete_box(load_data_body,url,id,db_name,db_field_id,title,grid_url,dynamicTable_shareholder_redemption_share,tag)
    }
    
    /**1**/
    
     var validator = $('#add-share-holder-redemption-buyback-form').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                shareholder_name: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                }, 
                no_of_shares: {
                    validators: {
                        integer: {
                            message: 'The value should be an integer'
                        }
                        
                    }
                },
                
            }
        })
        .on('success.form.bv', function(e) {
            e.preventDefault();
            submit_shareholder_redemption_buyback_form('add-share-holder-redemption-buyback-form', 'add', '');
        });
        
        
        
        
        
    function save_form(form_id){
        var load_data_body = form_id;
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/save_cm_"+form_id;
        var action = "edit";
        var capital_after_reduction = $('#capital_after_reduction').val();
        var stated_capital_after_reduction = $('#stated_capital_after_reduction').val();
        var id = $('#client_info').val(); 
        
        if((capital_after_reduction=='') && (stated_capital_after_reduction=='')){
               blockUI(load_data_body);   
                submit_form(form_id,load_data_body,url,action,id,function(data){
                 unblockUI(load_data_body);
                });
        }
        else if(capital_after_reduction.length!=0){ 
            
            if($.isNumeric(capital_after_reduction)===true){
                if(stated_capital_after_reduction.length!=0){
                    if($.isNumeric(stated_capital_after_reduction)===true){
                    blockUI(load_data_body);   
                    submit_form(form_id,load_data_body,url,action,id,function(data){
                     unblockUI(load_data_body);
                    });
                }else{
                  $('#capital_redemption_info').bootstrapValidator('revalidateField', 'stated_capital_after_reduction');  
                }
              }else{
                  
                 blockUI(load_data_body);   
                 submit_form(form_id,load_data_body,url,action,id,function(data){
                 unblockUI(load_data_body);
                });
                    
              }
                
            }else{
              $('#capital_redemption_info').bootstrapValidator('revalidateField', 'capital_after_reduction');
           }
           
         
        }else{
              if(stated_capital_after_reduction.length!=0){
                if($.isNumeric(stated_capital_after_reduction)===true){
                    blockUI(load_data_body);   
                    submit_form(form_id,load_data_body,url,action,id,function(data){
                     unblockUI(load_data_body);
                    });
                }else{
                  $('#capital_redemption_info').bootstrapValidator('revalidateField', 'stated_capital_after_reduction');
               }
            }
            
        }
     
    }
    
    /* End share holder redemtion */

</script>

<!---------START Add share_holder-individual Modal box-------->
<div class="modal fade"  id="add-share-holder-individual-modal-box">
    <div class="modal-dialog modal_box_custome_size">
        <div class="modal-content">
            <!-- Modal heading -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Add Shareholder Info</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="innerLR" style="padding:0;">
                    <form class="form-horizontal" action="<?php echo base_url(); ?>/databaseinfo/submit_data" id="add-shareholder-individual-form"  role="form">
                        <div class="col-md-12">
                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;border-bottom:1px solid #ddd;">
                                <label class="client-detailes-sub_heading" style="margin-bottom:0px;"><strong>KYC documents on shareholder</strong></label>
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Shareholder</label>

                                <div class="radio pull-left" style="margin-right:30px;">
                                    <label class="radio-custom-none">
                                        <input type="radio" class="radioYesBtn" name="is_shareholder" id="share-holder-info_show_btn"> 
                                         Individual
                                    </label> 
                                </div>

                                <div class="radio pull-left" style="margin-right:30px;"> 
                                    <label class="radio-custom-none"> 
                                        <input type="radio" class="radioNoBtn" name="is_shareholder" id="share-holder-info_hide_btn" checked="checked"> 
                                         Corporate
                                    </label> 
                                </div>

                            </div>

                            <div id="share-holder-info_show_div" style="display:none;">
                                <div class="col-md-6" style="padding-left:0px;">

                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Name of shareholder</label><!--
                                        <input name="name_of_shareholder" type="text" class="form-control height_25 plahole_font" style="width: 100%;">-->
                                    <div class="col-md-10" style="padding-left:0px;">
                                    <select onclick="fill_common_values_share_ind(this.value,'');" class="form-control height_25 plahole_font" name="director_list" id="director_company_data" style="width: 100%;">
                                        <option value="">Select Shareholder</option>
                                        <?php foreach ($common_data as $item) { ?>
                                            <option data-surname="<?php echo $item['director_surname']; ?>" value="<?php echo $item['id'];?>"><?php echo $item['director_name'];?></option>
                                        <?php } 
                                        ?>
                                    </select>
                                    <input name="name_of_shareholder" id="director_name" type="hidden" value="">
                                    </div>
                                    </div>
                                    
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Surname of shareholder</label><!--
                                        <input name="name_of_shareholder" type="text" class="form-control height_25 plahole_font" style="width: 100%;">-->
                                    <div class="col-md-10" style="padding-left:0px;">                                   
                                    <input name="surname_of_shareholder" id="director_surname" type="text" class="form-control height_25 plahole_font" style="width: 100%;" value="" readonly>
                                    </div>
                                    </div>                     
                                    
                                    

                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                                        <textarea name="shareholder_address" style="width:100%;resize:vertical;"></textarea>
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
                                          <input name="passport_no" id="passport_no" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                      </div>
                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Country of issue</label>
                                          <select id="country_of_issue" name="country_of_issue" class="form-control plahole_font" style="width: 100%;">
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
                                          <label class="client-detailes-sub_heading" style="width:100%;">Date of issue</label>

                                         
                                              <input id="date_of_issue" name="date_of_issue" class="form-control height_25 stDate_current" type="text">
                                            
                                      </div>

                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Date of expiry</label>

                                         
                                              <input id="date_of_expiry" name="date_of_expiry" class="form-control height_25 stDate_current" type="text">
                                             
                                      </div>
                                  </div>

                                </div>

                                <div class="col-md-6" style="padding-right:0px;">

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

                                        
                                            <input id="recieved_date" name="recieved_date" class="form-control height_25 stDate_current" type="text">
                                            
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
                                            <input id="accounting_done_by" name="bank_name" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                        </div>
                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                            <label class="client-detailes-sub_heading" style="width:100%;">Date</label>

                                           
                                                <input id="date" name="date" class="form-control height_25 stDate_current" type="text">
                                               
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
                                            <textarea id="address_detail" name="address" style="width:100%;resize:vertical;" class="readonly"></textarea>
                                        </div>
                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                            <label class="client-detailes-sub_heading" style="width:100%;">Country</label>
                                            <select id="country" name="country" class="form-control plahole_font" style="width: 100%;">
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
                                            
                                                <input id="address_proof_date" name="address_proof_date" class="form-control height_25 stDate_current" type="text">
                                               
                                        </div>

                                    </div>

                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Other</label>
                                        <textarea id="other_detail" name="other_detail" style="width:100%;resize:vertical;" class="readonly"></textarea>
                                    </div>

                                </div>

                            </div>

                            <div id="share-holder-info_hide_div">

                                <div class="col-md-6" style="padding-left:0px;">

                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Name of corporate shareholder</label>
                                        <input name="name_of_corporate_shareholder" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                    </div>

                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                                        <textarea name="corporate_shareholder_address" style="width:100%;resize:vertical;"></textarea>
                                    </div>

                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Certificate of incorporation dated</label>
                                        <div class="input-group date stDate col-sm-12">
                                            <input name="date_of_certification_of_incorp" class="form-control height_25 stDate_current" type="text">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>

                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Type of company</label>
                                      <input name="type_of_company"  type="text" class="form-control height_25 plahole_font" style="width: 100%;">
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

                                </div>

                                <div class="col-md-6" style="padding-right:0px;">

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
                                        <label class="client-detailes-sub_heading" style="width:100%;">Represented by</label>
                                        <input name="represented_by" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                    </div>


                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Bank reference</label>
                                      <div class="radio pull-left" style="margin-right:30px;">
                                          <label class="radio-custom-none">
                                              <input type="radio" class="radioYesBtn" name="is_bank_ref_c" id="shareholder-bank-reference-2_show_div"> 
                                              Yes
                                          </label> 
                                      </div>

                                      <div class="radio pull-left" style="margin-right:30px;"> 
                                          <label class="radio-custom-none"> 
                                              <input type="radio" class="radioNoBtn" name="is_bank_ref_c" id="shareholder-bank-reference-2_hide_div" checked="checked"> 
                                              No
                                          </label> 
                                      </div>
                                  </div>

                                  <div id="shareholder-bank-reference-2_show_hide_div" style="display:none;">
                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Name of bank </label>
                                          <input name="bank_name_c" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                      </div>
                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Date</label>
                                          <div class="input-group date stDate col-sm-12">
                                              <input name="date_c" class="form-control height_25 stDate_current" type="text">
                                              <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                          </div>
                                      </div>
                                  </div>

                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Proof of address</label>

                                      <div class="radio pull-left" style="margin-right:30px;">
                                          <label class="radio-custom-none">
                                              <input type="radio" class="radioYesBtn" name="has_address_proof_c" id="shareholder-proof_add-2_show_div"> 
                                              Yes
                                          </label> 
                                      </div>

                                      <div class="radio pull-left" style="margin-right:30px;"> 
                                          <label class="radio-custom-none"> 
                                              <input type="radio" class="radioNoBtn" name="has_address_proof_c" id="shareholder-proof_add-2_hide_div" checked="checked"> 
                                              No
                                          </label> 
                                      </div>

                                  </div>

                                  <div id="shareholder-proof_add-2_show_hide_div" style="display:none;">
                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                                          <textarea name="address_c" style="width:100%;resize:vertical;"></textarea>
                                      </div>
                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Country</label>
                                          <select name="country_c" class="form-control plahole_font" style="width: 100%;">
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
                                              <input name="address_proof_date_c" class="form-control height_25 stDate_current" type="text">
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

                        </div>	
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="hidden"  name="id" id="" style="width: 100%;" value="">
                                <input type="hidden"  name="action"  class="add_action"  style="width: 100%;" value="add">
                                
                                <input type="hidden" id="hp"  name="is_passport"  value="">
                                <input type="hidden" id="hc"  name="has_cv"  value="">
                                <input type="hidden" id="hbr"  name="is_bank_ref"  value="">
                                <input type="hidden" id="iap"  name="has_address_proof"  value="">
                                <input type="hidden" id="coi"  name="country_of_issue"  value="">
                                <input type="hidden" id="co"  name="country"  value="">
                                
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
<!---------END Add share_holder-individual Modal box---------->

<!---------START Add share_holder-individual Modal box-------->
<div class="modal fade"  id="edit-share-holder-individual-modal-box">
    <div class="modal-dialog modal_box_custome_size">
        <div class="modal-content">
            <!-- Modal heading -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Edit Shareholder Info</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="innerLR" style="padding:0;" id="shareholder_individual_edit_bar">
                    
                </div>
            </div>
            <!-- // Modal body END -->
        </div>
    </div>
</div>
<!---------END Add share_holder-individual Modal box---------->

<!---------START Add redemption or Buy-back Modal box-------->
<div class="modal fade"  id="add-share-holder-redemption-buyback-modal-box">
    <div class="modal-dialog modal_box_custome_size">
        <div class="modal-content">
            <!-- Modal heading -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Add Redemption and/or buy back Info</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="innerLR" style="padding:0;">
                    <form class="form-horizontal" action="<?php echo base_url(); ?>/databaseinfo/submit_data" id="add-share-holder-redemption-buyback-form"  role="form">
                        <div class="col-md-12">

                            <div id="share-holder-info_hide_div">

                                <div class="col-md-6" style="padding-left:0px;">

                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Name of shareholder</label>
                                        <input name="shareholder_name" id="shareholder_name" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                    </div>

                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Address of shareholder</label>
                                        <textarea name="shareholder_address" style="width:100%;resize:vertical;"></textarea>
                                    </div>
                                    
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                       <label class="client-detailes-sub_heading" style="width:100%;">No. of shares being redeemed or bought back</label>
                                        <input name="no_of_shares" id="no_of_shares" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                   </div>                                    
                                    

                                </div>

                                <div class="col-md-6" style="padding-right:0px;">                                 

                                <div id="shareholder-audited-accounts_show_hide_div">
                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Date of redeemed or bought back</label>
                                          <div class="input-group date stDate col-sm-12">
                                              <input name="date_of_redemption"  class="form-control height_25 stDate_current" type="text">
                                              <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                          </div>
                                      </div>
                                  </div>
                                    

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Types of shares being redeemed or bought back</label>
                                    <input name="type_of_share" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                </div>
                                   
                                <div class="form-group td-area-form-marg">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Remarks</label>
                                        <textarea name="redemption_remark" style="width:100%;resize:vertical;"></textarea>
                                </div>
                                    
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
<!---------END Add redemption or Buy-back Modal box---------->

<!---------START Add capital_redemption Modal box-------->

<!---------END Add capital_redemption Modal box---------->


<!---------START Add share_holder-Corporate Modal box-------->
        <div class="modal fade"  id="add-share-holder-corporate-modal-box">
            <div class="modal-dialog modal_box_custome_size">
                <div class="modal-content">
                    <!-- Modal heading -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Add Allotment/Transfers</h3>
                    </div>
                    <!-- // Modal heading END -->

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="innerLR" style="padding:0;" id="modal-body-corporate-allotment">
                        <div id="typeofshare_success_msg_add" class="alert alert-success padding-for-modal" style="display:none;">
                            <button type="button" class="custom_close" >&times;</button>
                            <span class="success-msg"></span>
                        </div>
                        <div id="typeofshare_err_msg_add" class="alert alert-danger padding-for-modal" style="display:none;">
                            <button type="button" class="custom_close" >&times;</button>
                            <span class="error-msg"></span>
                        </div>
                    <form class="form-horizontal" action="<?php echo base_url(); ?>/databaseinfo/submit_data" id="add-shareholder-allotment-form"  role="form">
                                <div class="col-md-6">

                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;border-bottom:1px solid #ddd;">
                                                <label class="client-detailes-sub_heading" style="margin-bottom:0px;"><strong>Allotment of shares</strong></label>
                                        </div>
                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                <label class="client-detailes-sub_heading" style="width:100%;">Shareholder</label>
                                                <input name="shareholder" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                        </div>

                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                                                <textarea name="address" style="width:100%;resize:vertical;"></textarea>
                                        </div>

                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                <label class="client-detailes-sub_heading" style="width:100%;">Date of allotment</label>
                                                <div class="input-group date stDate col-sm-12">
                                                        <input name="date_of_allotment" class="form-control height_25 stDate_current" type="text">
                                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                                </div>
                                        </div>

                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                <label class="client-detailes-sub_heading" style="width:100%;">Type of share</label>
                                                <div class="col-md-10" style="padding-left:0px;">
                                                        <select name="type_of_share" class="form-control height_25 plahole_font" id="share-type-type-show-hide_div-corporate" style="width: 100%;">
                                                                <option value="">Select</option>
                                                                <?php foreach ($type_of_share_list as $_type_of_share_list) {
                                                                ?>
                                                                <option value="<?php echo $_type_of_share_list['type_id'];?>"><?php echo $_type_of_share_list['type_of_share'];?></option>
                                                                <?php } ?>
                                                        </select>
                                                </div>
                                                <div class="col-md-2" style="padding:0px;">
                                                        <a onclick="data_modal_box_typeofshare('add','');" href="#add-more-share-type-modal-box-corporate" id="share-type-plus-icon-corporate" class="btn-xs btn-success pull-right" data-toggle="modal">
                                                        <span class="tooltip_area" data-toggle="tooltip" data-original-title="Add" data-placement="top"> <i class="fa fa-plus" style="font-size:14px;margin-top:3px;"></i><span>
                                                        </a>
                                                        <span id="share-type-edit-delete-icon-corporate" style="display:none;">
                                                                <a onclick="data_modal_box_typeofshare('delete','');" href="#delete-more-share-type-modal-box-corporate" data-toggle="modal" class="btn-xs btn-danger pull-right" style="margin-left:5px;">
                                                                        <span class="tooltip_area" data-toggle="tooltip" data-original-title="Delete" data-placement="top"><i class="fa fa-trash-o" style="font-size:14px;"></i></span>
                                                                </a>
                                                                <a onclick="data_modal_box_typeofshare('edit','');" href="#edit-more-share-type-modal-box-corporate" data-toggle="modal" class="btn-xs btn-warning pull-right">
                                                                <span class="tooltip_area" data-toggle="tooltip" data-original-title="Edit" data-placement="top"><i class="fa fa-edit" style="font-size:14px;"></i></span>
                                                                </a>
                                                        </span>
                                                </div>
                                        </div>

                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                <label class="client-detailes-sub_heading" style="width:100%;">Numbers of shares</label>
                                                <input name="no_of_shares" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                        </div>

                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                <label class="client-detailes-sub_heading" style="width:100%;">Currency</label>
                                                <input name="currency" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                        </div>

                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                <label class="client-detailes-sub_heading" style="width:100%;">Value</label>
                                                <input name="value" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                        </div>

                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                <label class="client-detailes-sub_heading" style="width:100%;">Stated capital after issue</label>
                                                <input name="capital_after_issue" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                        </div>

                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                <label class="client-detailes-sub_heading" style="width:100%;">% Holding after allotment</label>
                                                <input name="holding_after_allotment" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                        </div>

                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                <label class="client-detailes-sub_heading" style="width:100%;">Remarks</label>
                                                <textarea name="allotment_remark" style="width:100%;resize:vertical;"></textarea>
                                        </div>

                                </div>

                                <div class="col-md-6">	
                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;border-bottom:1px solid #ddd;">
                                                <label class="client-detailes-sub_heading" style="margin-bottom:0px;"><strong>Transfer of shares</strong></label>
                                        </div>

                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                <label class="client-detailes-sub_heading" style="width:100%;">Transfer from</label>
                                                <input name="transfer_from" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                        </div>

                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                <label class="client-detailes-sub_heading" style="width:100%;">Transfer to</label>
                                                <input name="transfer_to" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                        </div>

                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                                                <textarea name="allotment_address" style="width:100%;resize:vertical;"></textarea>
                                        </div>

                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                <label class="client-detailes-sub_heading" style="width:100%;">Date of transfer</label>
                                                <div class="input-group date stDate col-sm-12">
                                                        <input name="date_of_transfer" class="form-control height_25 stDate_current" type="text">
                                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                                </div>
                                        </div>

                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                        <label class="client-detailes-sub_heading" style="width:100%;">Type of share</label>
                                                        <div class="col-md-10" style="padding-left:0px;">
                                                                <select name="transfer_type_of_share" class="form-control height_25 plahole_font" id="share-type-type-show-hide_div-corporate-transfer" style="width: 100%;">
                                                                        <option value="">Select share</option>
                                                                        <?php foreach ($type_of_share_list as $_type_of_share_list) {
                                                                         ?>
                                                                        <option value="<?php echo $_type_of_share_list['type_id'];?>"><?php echo $_type_of_share_list['type_of_share'];?></option>
                                                                        <?php } ?>
                                                                </select>
                                                        </div>
                                                        <div class="col-md-2" style="padding:0px;">
                                                                <a onclick="data_modal_box_typeofshare1('add','')" href="#add-more-share-type-modal-box-corporate-transfer" id="share-type-plus-icon-corporate-transfer" class="btn-xs btn-success pull-right" data-toggle="modal">
                                                                <span class="tooltip_area" data-toggle="tooltip" data-original-title="Add" data-placement="top"> <i class="fa fa-plus" style="font-size:14px;margin-top:3px;"></i></span>
                                                                </a>
                                                                <span id="share-type-edit-delete-icon-corporate-transfer" style="display:none;">
                                                                        <a onclick="data_modal_box_typeofshare1('delete','')" href="#delete-more-share-type-modal-box-corporate-transfer" data-toggle="modal" class="btn-xs btn-danger pull-right" style="margin-left:5px;">
                                                                                <span class="tooltip_area" data-toggle="tooltip" data-original-title="Delete" data-placement="top"><i class="fa fa-trash-o" style="font-size:14px;"></i></span>
                                                                        </a>
                                                                        <a onclick="data_modal_box_typeofshare1('edit','')" href="#edit-more-share-type-modal-box-corporate-transfer" data-toggle="modal" class="btn-xs btn-warning pull-right">
                                                                        <span class="tooltip_area" data-toggle="tooltip" data-original-title="Edit" data-placement="top"><i class="fa fa-edit" style="font-size:14px;"></i></span>
                                                                        </a>
                                                                </span>
                                                        </div>
                                        </div>

                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                <label class="client-detailes-sub_heading" style="width:100%;">Number of shares transferred</label>
                                                <input name="no_of_shares_transfer" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                        </div>

                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                <label class="client-detailes-sub_heading" style="width:100%;">Currency</label>
                                                <input name="transfer_currency" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                        </div>

                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                <label class="client-detailes-sub_heading" style="width:100%;">Value</label>
                                                <input name="transfer_value" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                        </div>

                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                <label class="client-detailes-sub_heading" style="width:100%;">Stated Capital after transfer</label>
                                                <input name="transfer_capital_after_transfer" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                        </div>

                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                <label class="client-detailes-sub_heading" style="width:100%;">% Holding after allotment</label>
                                                <input name="transfer_holding_after_allotment" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                        </div>

                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                <label class="client-detailes-sub_heading" style="width:100%;">Remarks</label>
                                                <textarea name="transfer_remark" style="width:100%;resize:vertical;"></textarea>
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
        <!---------END Add share_holder-Corporate Modal box---------->


        
        <!---------START edit share_holder-Corporate Modal box-------->
        <div class="modal fade"  id="edit-share-holder-corporate-modal-box">
            <div class="modal-dialog modal_box_custome_size">
                <div class="modal-content">
                    <!-- Modal heading -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Edit Allotment/Transfers</h3>
                    </div>
                    <!-- // Modal heading END -->

                    <!-- Modal body -->
                    <div class="modal-body">
                    <div class="innerLR" style="padding:0;" id="shareholder_allotment_edit_bar">
                    
                        </div>
                    </div>
                    <!-- // Modal body END -->
                </div>
            </div>
        </div>
        <!---------END edit share_holder-Corporate Modal box---------->
        
        
        <!---------START edit share_holder-Corporate Modal box-------->
        <div class="modal fade"  id="edit-share-holder-redemption-share-modal-box">
            <div class="modal-dialog modal_box_custome_size">
                <div class="modal-content">
                    <!-- Modal heading -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Edit Redemption and/or buy back Info</h3>
                    </div>
                    <!-- // Modal heading END -->

                    <!-- Modal body -->
                    <div class="modal-body">
                    <div class="innerLR" style="padding:0;" id="shareholder_redemption_share_edit_bar">
                    
                        </div>
                    </div>
                    <!-- // Modal body END -->
                </div>
            </div>
        </div>
        <!---------END edit share_holder-Corporate Modal box---------->


