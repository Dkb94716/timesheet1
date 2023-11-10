<?php 
$CI =& get_instance();
$CI->load->model('databaseinfo_model');
$bank_data = $CI->databaseinfo_model->getBankFieldsList();
$license_permit_data = $CI->databaseinfo_model->getLicensePermitData();
//echo "<pre>"; print_r($bank_data);
//die;


?>
<div class="tab-content" style="padding-left:11px;padding-right:10px;">
    <a href="#add-bank-accounts-modal-box" data-toggle="modal" class="btn-xs btn-success pull-right addbtn" id="btn-add" style="margin-bottom:5px;">Add More</a>
    <div class="widget-body overflow-x" style="padding:10px 0px;width:100%;" id="bank_data_body">

    </div>
</div>
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
            <div class="modal-body" id="modal-body-bank-add">
                <div class="innerLR" style="padding:0;">
                    <div id="bank_success_msg_add" class="alert alert-success padding-for-modal" style="display:none;">
                        <button type="button" class="custom_close" >&times;</button>
                        <span class="success-msg"></span>
                    </div>
                    <div id="bank_err_msg_add" class="alert alert-danger padding-for-modal" style="display:none;">
                        <button type="button" class="custom_close" >&times;</button>
                        <span class="error-msg"></span>
                    </div>
                            <form class="form-horizontal" action="<?php echo base_url();?>/databaseinfo/submit_data" id="add-bank-form"  role="form">
                        <div class="col-md-6">
                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Name of bank</label>
                                <div class="col-md-10" style="padding-left:0px;">
                                    <select class="form-control height_25 plahole_font" name="bank_name_id" id="bank-onwer_bank-name-show-hide_div" style="width: 100%;">
                                        <option value="">Select bank</option>
                                        <?php foreach ($bank_data['bank_name'] as $item) { ?>
                                            <option value="<?php echo $item['bank_name_id'];?>"><?php echo $item['bank_name'];?></option>

                                        <?php } 
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-2" style="padding:0px;">
                                    <a  onclick="data_modal_box_bankname('add','');" href="#add-more-bank-account-bank-name-modal-box" id="bank-onwer_bank-name-plus-icon" data-toggle="modal" class="btn-xs btn-success pull-right"><i class="fa fa-plus" style="font-size:14px;margin-top:3px;"></i></a>
                                    <span id="bank-onwer_bank-name-edit-delete-icon" style="display:none;">
                                        <a onclick="data_modal_box_bankname('delete','');" href="#delete-more-bank-account-bank-name-modal-box" data-toggle="modal" class="btn-xs btn-danger pull-right" style="margin-left:5px;"><i class="fa fa-trash-o" style="font-size:14px;"></i></a>
                                        <a onclick="data_modal_box_bankname('edit','');" href="#edit-more-bank-account-bank-name-modal-box" data-toggle="modal" class="btn-xs btn-warning pull-right"><i class="fa fa-edit" style="font-size:14px;"></i></a>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Type of account</label>
                                <div class="col-md-10" style="padding-left:0px;">
                                    <select class="form-control height_25 plahole_font" name="account_type_id" id="bank-onwer_account-type-show-hide_div" style="width: 100%;">
                                        <option value="">Select account</option>
                                        <?php foreach ($bank_data['account_type'] as $item) { ?>
                                            <option value="<?php echo $item['account_type_id'];?>"><?php echo $item['account_type_name'];?></option>
                                        <?php } 
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-2" style="padding:0px;">
                                    <a onclick="data_modal_box_accounttype('add','');" href="#add-more-bank-account-account-type-modal-box" id="bank-onwer_account-type-plus-icon" data-toggle="modal" class="btn-xs btn-success pull-right"><i class="fa fa-plus" style="font-size:14px;margin-top:3px;"></i></a>
                                    <span id="bank-onwer_account-type-edit-delete-icon" style="display:none;">
                                        <a onclick="data_modal_box_accounttype('delete','');" href="#delete-more-bank-account-account-type-modal-box" data-toggle="modal" class="btn-xs btn-danger pull-right" style="margin-left:5px;"><i class="fa fa-trash-o" style="font-size:14px;"></i></a>
                                        <a onclick="data_modal_box_accounttype('edit','');" href="#edit-more-bank-account-account-type-modal-box" data-toggle="modal" class="btn-xs btn-warning pull-right"><i class="fa fa-edit" style="font-size:14px;"></i></a>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Status</label>
                                <div class="col-md-10" style="padding-left:0px;">
                                    <select class="form-control height_25 plahole_font" name="status"  style="width: 100%;">
                                        <option value="">Select status</option>
                                            <option value="Active">Active</option>
                                            <option value="Dormant">Dormant</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Currency</label>
                                <div class="col-md-10" style="padding-left:0px;">
                                    <select class="form-control height_25 plahole_font" name="currency_id" id="bank-onwer_currency-show-hide_div" style="width: 100%;">
                                        <option value="">Select currency</option>
                                        <?php foreach ($bank_data['currency'] as $item) { ?>
                                            <option value="<?php echo $item['currency_id'];?>"><?php echo $item['currency_name'];?></option>
                                        <?php } 
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-2" style="padding:0px;">
                                    <a onclick="data_modal_box_currency('add','');" href="#add-more-bank-account-currency-modal-box" id="bank-onwer_currency-plus-icon" data-toggle="modal" class="btn-xs btn-success pull-right"><i class="fa fa-plus" style="font-size:14px;margin-top:3px;"></i></a>
                                    <span id="bank-onwer_currency-edit-delete-icon" style="display:none;">
                                        <a onclick="data_modal_box_currency('delete','');" href="#delete-more-bank-account-currency-modal-box" data-toggle="modal" class="btn-xs btn-danger pull-right" style="margin-left:5px;"><i class="fa fa-trash-o" style="font-size:14px;"></i></a>
                                        <a onclick="data_modal_box_currency('edit','');" href="#edit-more-bank-account-currency-modal-box" data-toggle="modal" class="btn-xs btn-warning pull-right"><i class="fa fa-edit" style="font-size:14px;"></i></a>
                                    </span>
                                </div>
                            </div>


                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Account no.</label>
                                <div class="col-md-10" style="padding-left:0px;">
                                    <input class="form-control height_25 plahole_font" name="account_no" id="bank-onwer_account-no-show-hide_div-edit" style="width: 100%;" value="">                  
                                </div>                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;border-bottom:1px solid #ddd;">
                                <label class="client-detailes-sub_heading" style="margin-bottom:0px;"><strong>Name of bank signatories</strong></label>
                            </div>
                       
                        <div>        
                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Signing mandate</label>
                                <a href="#" class="btn-xs btn-success pull-right" id="add_filed" style="width:20px;text-align:right;"><i class="fa fa-plus" style="color:#fff;"></i></a>
                                <input type="text" class="form-control height_25 plahole_font" name="signing_mangate[]" style="width: 90%;">
                            </div>                         
                            <div id="addinput"></div>
                        </div>
                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Date of minutes/resolution</label>
                                <div class="input-group date stDate col-sm-12">
                                    <input class="form-control height_25 stDate_current" name="date_of_min_resu" type="text">
                                    <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                </div>
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Internet banking facility</label>
                                <div class="radio pull-left" style="margin-right:30px;">
                                    <input name="is_internet_banking" type="radio" class="radioYesBtn"  id="bank-accou-net-banking_show_div" value="1"> 
                                    <i class="iradioYesBtn"></i> Yes
                                </div>

                                <div class="radio pull-left" style="margin-right:30px;"> 
                                    <input name="is_internet_banking" type="radio" class="radioNoBtn"  id="bank-accou-net-banking_hide_div" checked="checked" value="0"> 
                                    <i class="iradioNoBtn checked"></i> No
                                </div>
                            </div>

                            <div class="form-group td-area-form-marg" id="bank-accou-net-banking_show_hide_div" style="margin-bottom:10px !important;display:none;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Type of facility</label>
                                <input type="text" class="form-control height_25 plahole_font" name="type_facility" style="width: 100%;">
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Remark</label>
                                <textarea name="remark" style="width:100%;resize:vertical;"></textarea>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="hidden"  name="id" id="accounting_done_by" style="width: 100%;" value="">
                                <input type="hidden"  name="action"  class="add_action"  style="width: 100%;" value="add">
                                <button type="submit" class="btn btn-success pull-right" >Save</button>
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


<!---------START Edit Bank Accounts Modal box-------->
<div class="modal fade"  id="edit-bank-accounts-modal-box">
    <div class="modal-dialog modal_box_custome_size">
        <div class="modal-content">
            <!-- Modal heading -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Edit Bank Information</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body" id="modal-body-bank-add">
                <div class="innerLR" style="padding:0;" id="bank_edit_bar">
                    
                </div>
            </div>
            <!-- // Modal body END -->
        </div>
    </div>
</div>
<!---------END Add Bank Accounts-Name of Bank Modal box---------->





<script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>        
<script src="<?php echo base_url(); ?>assets/js/db_ready.js"></script>
<script>
    dynamicTable_bank = 'dynamicTable1';
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
            var str='';
            str+= '<div onclick="removeDivSigningMangate(this)"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">';
                    //str+='<label class="client-detailes-sub_heading" style="width:100%;">Signing mandate:<a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" onclick="deleteDiv(this)"><i class="fa fa-fw icon-delete-symbol" style="width:10px;color:#fff;font-size:10px;"></i></a></label>';
                     
                            str+='<div class="input-group date stDate1 col-sm-12">';
                            str+='<input name="signing_mangate[]" class="form-control height_25 " style="width:90%;" type="text"><a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" onclick="deleteDiv(this)"><i class="fa fa-fw icon-delete-symbol" style="width:10px;color:#fff;font-size:10px;"></i></a>';
                            str+='</div>';
            str+='</div>';                                      
          
            
            $('#addinput').append(str);    
           
            
            });
            
            
            
            
            
            
    });
    function stuff_on_ready(){
        $('.addbtn').on('click',function(){           
           
            setTimeout(function(){
                $('#add-bank-form').data('bootstrapValidator').resetForm();
                $('#addinput').html('');
            },200);
        })
        var core_url=CURRENT_URL;
        // LICENSE
        // For load default grid.
        var load_data_body1 = "bank_data_body";
        blockUI(load_data_body1);
        var url1 = core_url+"/databaseinfo/get_bank_grid_data";
        grid_data(load_data_body1,url1,dynamicTable_bank);

        // validation
        
       var validator =  $('#add-bank-form').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
           bank_name_id: {
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
            submit_bank_form('add-bank-form','add','');   
        });
        
        $(".close,.cancel").click(function() {
            $('.form-group').removeClass('has-error has-feedback');
            $('.form-group').find('small.help-block').hide();
            $('.form-group').find('i.form-control-feedback').hide();
        });
      }
</script>

<script>
    function data_modal_box_bankname(action,tag){
        if(tag==''){
            $("#add-bank-form").data('bootstrapValidator').resetForm();
            
        } else {
            $("#edit-bank-form").data('bootstrapValidator').resetForm(); 
        }
        var add_div = 'bank-onwer_bank-name-plus-icon'+tag;
        var edit_delete_div = 'bank-onwer_bank-name-edit-delete-icon'+tag;
        var element_id = 'bank-onwer_bank-name-show-hide_div'+tag;
        var placeholder = 'Name of Bank';
        var dbname = 'db_ba_bankname';
        var db_field_name = 'bank_name';
        var db_field_id = 'bank_name_id';
        var loader_element_id = 'modal-body-bank-add'
        var message_title = 'bank';
        var success_msg_id = 'bank_success_msg_add'+tag;
        var error_msg_id = 'bank_err_msg_add'+tag;
        var title_on_add = 'Add name of bank';
        var title_on_edit = 'Edit name of bank';
        var title_on_delete = 'Delete name of bank';
        var item_id_on_add = 0;
        var item_id_on_edit = $("#" + element_id + " :selected").val();
        var item_id_on_delete = element_id;
        var item_name_on_edit = $("#" + element_id + " :selected").text();
        add_edit_delete_list_on_modal(action,add_div,edit_delete_div,element_id,dbname,placeholder,db_field_name,db_field_id,loader_element_id,message_title,success_msg_id,error_msg_id,title_on_add,title_on_edit,title_on_delete,item_id_on_add,item_id_on_edit,item_id_on_delete,item_name_on_edit)
    }
    
    function data_modal_box_accounttype(action,tag){
        var add_div = 'bank-onwer_account-type-plus-icon'+tag;
        var edit_delete_div = 'bank-onwer_account-type-edit-delete-icon'+tag;
        var element_id = 'bank-onwer_account-type-show-hide_div'+tag;
        var placeholder = 'Type of account';
        var dbname = 'db_ba_accounttype';
        var db_field_name = 'account_type_name';
        var db_field_id = 'account_type_id';
        var loader_element_id = 'modal-body-bank-add'
        var message_title = 'type of account';
        var success_msg_id = 'bank_success_msg_add'+tag;
        var error_msg_id = 'bank_err_msg_add'+tag;
        var title_on_add = 'Add type of account';
        var title_on_edit = 'Edit type of account';
        var title_on_delete = 'Delete type of account';
        var item_id_on_add = 0;
        var item_id_on_edit = $("#" + element_id + " :selected").val();
        var item_id_on_delete = element_id;
        var item_name_on_edit = $("#" + element_id + " :selected").text();
        add_edit_delete_list_on_modal(action,add_div,edit_delete_div,element_id,dbname,placeholder,db_field_name,db_field_id,loader_element_id,message_title,success_msg_id,error_msg_id,title_on_add,title_on_edit,title_on_delete,item_id_on_add,item_id_on_edit,item_id_on_delete,item_name_on_edit)

    }
    
    function data_modal_box_currency(action,tag){
        var add_div = 'bank-onwer_currency-plus-icon'+tag;
        var edit_delete_div = 'bank-onwer_currency-edit-delete-icon'+tag;
        var element_id = 'bank-onwer_currency-show-hide_div'+tag;
        var placeholder = 'Currency';
        var dbname = 'db_ba_currency';
        var db_field_name = 'currency_name';
        var db_field_id = 'currency_id';
        var loader_element_id = 'modal-body-bank-add'
        var message_title = 'currency';
        var success_msg_id = 'bank_success_msg_add'+tag;
        var error_msg_id = 'bank_err_msg_add'+tag;
        var title_on_add = 'Add currency';
        var title_on_edit = 'Edit currency';
        var title_on_delete = 'Delete currency';
        var item_id_on_add = 0;
        var item_id_on_edit = $("#" + element_id + " :selected").val();
        var item_id_on_delete = element_id;
        var item_name_on_edit = $("#" + element_id + " :selected").text();
        add_edit_delete_list_on_modal(action,add_div,edit_delete_div,element_id,dbname,placeholder,db_field_name,db_field_id,loader_element_id,message_title,success_msg_id,error_msg_id,title_on_add,title_on_edit,title_on_delete,item_id_on_add,item_id_on_edit,item_id_on_delete,item_name_on_edit)

    }
    
    function data_modal_box_accountno(action,tag){
        var add_div = 'bank-onwer_account-no-plus-icon'+tag;
        var edit_delete_div = 'bank-onwer_account-no-edit-delete-icon'+tag;
        var element_id = 'bank-onwer_account-no-show-hide_div'+tag;
        var placeholder = 'Account no.';
        var dbname = 'db_ba_accountno';
        var db_field_name = 'account_no';
        var db_field_id = 'accountno_id';
        var loader_element_id = 'modal-body-bank-add'
        var message_title = 'account no.';
        var success_msg_id = 'bank_success_msg_add'+tag;
        var error_msg_id = 'bank_err_msg_add'+tag;
        var title_on_add = 'Add account no.';
        var title_on_edit = 'Edit account no.';
        var title_on_delete = 'Delete account no.';
        var item_id_on_add = 0;
        var item_id_on_edit = $("#" + element_id + " :selected").val();
        var item_id_on_delete = element_id;
        var item_name_on_edit = $("#" + element_id + " :selected").text();
        add_edit_delete_list_on_modal(action,add_div,edit_delete_div,element_id,dbname,placeholder,db_field_name,db_field_id,loader_element_id,message_title,success_msg_id,error_msg_id,title_on_add,title_on_edit,title_on_delete,item_id_on_add,item_id_on_edit,item_id_on_delete,item_name_on_edit)

    }
    
    function submit_bank_form(form,action,id){
        var load_data_body = 'bank_data_body';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/submit_bank_form";
        blockUI(load_data_body);
        submit_form(form,load_data_body,url,action,id,function(data){
            console.log(data);
            var url = core_url+"/databaseinfo/get_bank_grid_data";
            grid_data(load_data_body,url,dynamicTable_bank);
        });
    }
    
    function edit_bank_bar(id){
        blockUI('bank_edit_bar');
        var load_data_body = 'bank_edit_bar';
        var db_name = 'db_bank_info';
        var db_field_id = 'bank_id';
        var tag = 'bank';
        var view_folder = 'BankInfo';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/get_item_detail_for_edit";
        edit_box(load_data_body,url,id,db_name,db_field_id,tag,view_folder)
    }
    
    function delete_bank_bar(id){
        var load_data_body = 'bank_data_body';
        var db_name = 'db_bank_info';
        var db_field_id = 'bank_id';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/delete_item";
        var title = "Delete Bank Information";
        var grid_url = CURRENT_URL+"/databaseinfo/get_bank_grid_data";
        var tag = 'Bank'
        delete_box(load_data_body,url,id,db_name,db_field_id,title,grid_url,dynamicTable_bank,tag)
    }
</script>


