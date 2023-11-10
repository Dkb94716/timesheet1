<?php

$CI = & get_instance();
$CI->load->model('databaseinfo_model');
$bank_data = $CI->databaseinfo_model->getBankFieldsList();
$bank_signing_mangate_data = $CI->databaseinfo_model->getBankSigningangateData($detail[0]['bank_id']);

$bank_a_button = ($detail[0]['currency_id']) ? 'none' : 'block';
$bank_ed_button = ($detail[0]['currency_id']) ? 'block' : 'none';

$accounttype_a_button = ($detail[0]['account_type_id']) ? 'none' : 'block';
$accounttype_ed_button = ($detail[0]['account_type_id']) ? 'block' : 'none';

$currency_a_button = ($detail[0]['currency_id']) ? 'none' : 'block';
$currency_ed_button = ($detail[0]['currency_id']) ? 'block' : 'none';
$is_internet_banking = $detail[0]['is_internet_banking'];
$accountno_a_button = ($detail[0]['accountno_id']) ? 'none' : 'block';
$accountno_ed_button = ($detail[0]['accountno_id']) ? 'block' : 'none';
$is_internet_banking_yes = ($is_internet_banking == 1) ? 'checked="checked"' : '';
$is_internet_banking_no = ($is_internet_banking == 0) ? 'checked="checked"' : '';
$type_facility_style = ($is_internet_banking == 1) ? 'block' : 'none';
$status_0 = ($detail[0]['status']=="")? 'selected=selected':'';
$status_1 = ($detail[0]['status']=="Active")? 'selected=selected':'';
$status_2 = ($detail[0]['status']=="Dormant")? 'selected=selected':'';


$date_of_min_resu = ($detail[0]['date_of_min_resu']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['date_of_min_resu'])):"";



//    echo "<pre>"; print_r($detail); die;
?>
<div id="bank_success_msg_add-edit" class="alert alert-success padding-for-modal" style="display:none;">
    <button type="button" class="custom_close" >&times;</button>
    <span class="success-msg">Best check yo self, you're not looking too good.</span>
</div>
<div id="bank_err_msg_add-edit" class="alert alert-danger padding-for-modal" style="display:none;">
    <button type="button" class="custom_close" >&times;</button>
    <span class="error-msg"> Best check yo self, you're not looking too good. </span>
</div>

<form class="form-horizontal" action="<?php echo base_url(); ?>databaseinfo/submit_data" id="edit-bank-form"  role="form" method="post">
    <div class="col-md-6">
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Name of bank</label>
            <div class="col-md-10" style="padding-left:0px;">
                <select class="form-control height_25 plahole_font" name="bank_name_id" id="bank-onwer_bank-name-show-hide_div-edit" style="width: 100%;">
                    <option value="">Select</option>
                    <?php foreach ($bank_data['bank_name'] as $item) { ?>
                        <option value="<?php echo $item['bank_name_id']; ?>" <?php if ($item['bank_name_id'] == $detail[0]['bank_name_id']) { ?> selected="selected" <?php } ?>><?php echo $item['bank_name']; ?></option>

                    <?php }
                    ?>
                </select>
            </div>
            <div class="col-md-2" style="padding:0px;">
                <a style="display:<?php echo $bank_a_button; ?>;" onclick="data_modal_box_bankname('add', '-edit')" href="#add-more-bank-account-bank-name-modal-box-edit" id="bank-onwer_bank-name-plus-icon-edit" data-toggle="modal" class="btn-xs btn-success pull-right"><i class="fa fa-plus" style="font-size:14px;margin-top:3px;"></i></a>
                <span id="bank-onwer_bank-name-edit-delete-icon-edit" style="display:<?php echo $bank_ed_button; ?>;">
                    <a onclick="data_modal_box_bankname('delete', '-edit')" href="#delete-more-bank-account-bank-name-modal-box-edit" data-toggle="modal" class="btn-xs btn-danger pull-right" style="margin-left:5px;"><i class="fa fa-trash-o" style="font-size:14px;"></i></a>
                    <a onclick="data_modal_box_bankname('edit', '-edit')" href="#edit-more-bank-account-bank-name-modal-box-edit" data-toggle="modal" class="btn-xs btn-warning pull-right"><i class="fa fa-edit" style="font-size:14px;"></i></a>
                </span>
            </div>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Type of account</label>
            <div class="col-md-10" style="padding-left:0px;">

                <select class="form-control height_25 plahole_font" name="account_type_id" id="bank-onwer_account-type-show-hide_div-edit" style="width: 100%;">
                    <option value="">Select</option>
                    <?php foreach ($bank_data['account_type'] as $item) { ?>
                        <option value="<?php echo $item['account_type_id']; ?>" <?php if ($item['account_type_id'] == $detail[0]['account_type_id']) { ?> selected="selected" <?php } ?>><?php echo $item['account_type_name']; ?></option>
                    <?php }
                    ?>
                </select>
            </div>
            <div class="col-md-2" style="padding:0px;">
                <a style="display:<?php echo $accounttype_a_button; ?>;" onclick="data_modal_box_accounttype('add', '-edit');" href="#add-more-bank-account-account-type-modal-box-edit" id="bank-onwer_account-type-plus-icon-edit" data-toggle="modal" class="btn-xs btn-success pull-right"><i class="fa fa-plus" style="font-size:14px;margin-top:3px;"></i></a>
                <span id="bank-onwer_account-type-edit-delete-icon-edit" style="display:<?php echo $accounttype_ed_button; ?>;">
                    <a onclick="data_modal_box_accounttype('delete', '-edit');" href="#delete-more-bank-account-account-type-modal-box-edit" data-toggle="modal" class="btn-xs btn-danger pull-right" style="margin-left:5px;"><i class="fa fa-trash-o" style="font-size:14px;"></i></a>
                    <a onclick="data_modal_box_accounttype('edit', '-edit');" href="#edit-more-bank-account-account-type-modal-box-edit" data-toggle="modal" class="btn-xs btn-warning pull-right"><i class="fa fa-edit" style="font-size:14px;"></i></a>
                </span>
            </div>
        </div>
        
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Status</label>
            <div class="col-md-10" style="padding-left:0px;">
                <select class="form-control height_25 plahole_font" name="status"  style="width: 100%;">
                    <option value="" <?php echo $status_0;?>>Select status</option>
                    <option value="Active" <?php echo $status_1;?>>Active</option>
                    <option value="Dormant" <?php echo $status_2;?>>Dormant</option>
                </select>
            </div>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Currency</label>
            <div class="col-md-10" style="padding-left:0px;">

                <select class="form-control height_25 plahole_font" name="currency_id" id="bank-onwer_currency-show-hide_div-edit" style="width: 100%;">
                    <option value="">Select</option>
                    <?php foreach ($bank_data['currency'] as $item) { ?>
                        <option value="<?php echo $item['currency_id']; ?>" <?php if ($item['currency_id'] == $detail[0]['currency_id']) { ?> selected="selected" <?php } ?>><?php echo $item['currency_name']; ?></option>
                    <?php }
                    ?>
                </select>
            </div>
            <div class="col-md-2" style="padding:0px;">
                <a style="display:<?php echo $currency_a_button; ?>;" onclick="data_modal_box_currency('add', '-edit');" href="#add-more-bank-account-currency-modal-box-edit" id="bank-onwer_currency-plus-icon-edit" data-toggle="modal" class="btn-xs btn-success pull-right"><i class="fa fa-plus" style="font-size:14px;margin-top:3px;"></i></a>
                <span  id="bank-onwer_currency-edit-delete-icon-edit" style="display:<?php echo $currency_ed_button; ?>;">
                    <a onclick="data_modal_box_currency('delete', '-edit');" href="#delete-more-bank-account-currency-modal-box-eidt" data-toggle="modal" class="btn-xs btn-danger pull-right" style="margin-left:5px;"><i class="fa fa-trash-o" style="font-size:14px;"></i></a>
                    <a onclick="data_modal_box_currency('edit', '-edit');" href="#edit-more-bank-account-currency-modal-box-edit" data-toggle="modal" class="btn-xs btn-warning pull-right"><i class="fa fa-edit" style="font-size:14px;"></i></a>
                </span>
            </div>
        </div>


        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Account no.</label>
            <div class="col-md-10" style="padding-left:0px;">
                <input class="form-control height_25 plahole_font" name="account_no" id="bank-onwer_account-no-show-hide_div-edit" style="width: 100%;" value="<?php echo $detail[0]['account_no']; ?>">                  
            </div>           
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;border-bottom:1px solid #ddd;">
            <label class="client-detailes-sub_heading" style="margin-bottom:0px;"><strong>Name of bank signatories</strong></label>
        </div>
        
        <div id="addinput_edit">
       <?php
        $bank_signing_mangate_data;
        if(empty($bank_signing_mangate_data)){
       ?>
             <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Signing mandate</label> 
                     <a href="#" class="btn-xs btn-success pull-right" id="add_filed_edit" style="width:20px;text-align:right;"><i class="fa fa-plus" style="color:#fff;"></i></a>
                    <input type="text" class="form-control height_25 plahole_font" name="signing_mangate[]" value="" style="width: 90%;">
                </div>
       <?php     
        }
        $i = 0;
        foreach ($bank_signing_mangate_data as $signing_mangate) {
            $i++;
            if ($i == 1) {
                ?>
        
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Signing mandate</label> 
                     <a href="#" class="btn-xs btn-success pull-right" id="add_filed_edit" style="width:20px;text-align:right;"><i class="fa fa-plus" style="color:#fff;"></i></a>
                    <input type="text" class="form-control height_25 plahole_font" name="signing_mangate[]" value="<?php echo $signing_mangate['signing_mandate']; ?>" style="width: 90%;">
                </div>
    <?php } else { ?>
                <div onclick="removeDivSigningMangate(this)"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <div class="input-group date stDate1 col-sm-12">     
                    <input type="text" class="form-control height_25 plahole_font" name="signing_mangate[]" value="<?php echo $signing_mangate['signing_mandate']; ?>" style="width: 90%;">
                    <a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" onclick="deleteDiv(this)"><i class="fa fa-fw icon-delete-symbol" style="width:10px;color:#fff;font-size:10px;"></i></a>
                    </div>  
                </div>  
                </div>    
                <?php
            }
        }
        ?>
        </div>     
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Date of minutes/resolution</label>
            <div class="input-group date stDate_edit  col-sm-12">
                <input name="date_of_min_resu" class="form-control height_25 " type="text" value="<?php echo $date_of_min_resu; ?>">
                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
            </div>
        </div>
     
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Internet banking facility</label>
            <div class="radio pull-left" style="margin-right:30px;">
                <input type="radio" class="radioYesBtn" value="1" name="is_internet_banking" id="bank-accou-net-banking_show_div_edit" <?php echo $is_internet_banking_yes; ?>> 
                Yes
            </div>

            <div class="radio pull-left" style="margin-right:30px;"> 
                <input type="radio" class="radioNoBtn" value="0" name="is_internet_banking" id="bank-accou-net-banking_hide_div_edit" <?php echo $is_internet_banking_no; ?>> 
                No
            </div>
        </div>

        <div class="form-group td-area-form-marg" id="bank-accou-net-banking_show_hide_div_edit" style="margin-bottom:10px !important;display:<?php echo $type_facility_style; ?>">
            <label class="client-detailes-sub_heading" style="width:100%;">Type of facility</label>
            <input type="text" class="form-control height_25 plahole_font" value="<?php echo $detail[0]['type_facility']; ?>" name="type_facility" style="width: 100%;">
        </div>	

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Remark</label>
            <textarea name="remark" style="width:100%;resize:vertical;"><?php echo $detail[0]['remark']; ?></textarea>
        </div>

    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="hidden"  name="id" id="accounting_done_by" style="width: 100%;" value="<?php echo $detail[0]['bank_id']; ?>">
            <input type="hidden"  name="action" id="accounting_done_by" style="width: 100%;" value="edit">
            <button type="submit" class="btn btn-success pull-right">Save</button>
            <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

        </div>
    </div>
</form>


<script src="<?php echo base_url(); ?>assets/js/db_ready.js"></script>
<script>
    $(document).ready(function() {
        
         $('#add_filed_edit').on('click', function(){
                         
            var str='';
            str+= '<div onclick="removeDivSigningMangate(this)"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">';
                    //str+='<label class="client-detailes-sub_heading" style="width:100%;">Signing mandate:<a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" onclick="deleteDiv(this)"><i class="fa fa-fw icon-delete-symbol" style="width:10px;color:#fff;font-size:10px;"></i></a></label>';
                     
                            str+='<div class="input-group date stDate1 col-sm-12">';
                            str+='<input name="signing_mangate[]" class="form-control height_25 " style="width:90%;" type="text"><a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" onclick="deleteDiv(this)"><i class="fa fa-fw icon-delete-symbol" style="width:10px;color:#fff;font-size:10px;"></i></a>';
                            str+='</div>';
            str+='</div>';                                      
          
            
            $('#addinput_edit').append(str);    
           
            
            });
            
            
            
        if($('#bank-onwer_bank-name-show-hide_div-edit')==""){
            $('#bank-onwer_bank-name-plus-icon-edit').show();
            $('#bank-onwer_bank-name-edit-delete-icon-edit').hide();
        } else {
            $('#bank-onwer_bank-name-plus-icon-edit').hide();
            $('#bank-onwer_bank-name-edit-delete-icon-edit').show();
        }
//        stDate_edit
        ready_on_db();
        stuff_on_ready();
    });
    function stuff_on_ready() {
        var core_url = CURRENT_URL;

        var validator = $('#edit-bank-form').bootstrapValidator({
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
        }).on('success.form.bv', function(e) {
            e.preventDefault();
            submit_bank_form('edit-bank-form', 'edit', '<?php echo $detail[0]['bank_id']; ?>');
        });

        $(".close,.cancel").click(function() {
            $('.form-group').removeClass('has-error has-feedback');
            $('.form-group').find('small.help-block').hide();
            $('.form-group').find('i.form-control-feedback').hide();
            $('.stDate_edit').bdatepicker({
            format: "dd MM yyyy",
            autoclose: true,
        });
        $(this).find('input.stDate_edit').bdatepicker();
        });
        
        $('.stDate_edit').bdatepicker({
            format: "dd MM yyyy",
            autoclose: true,
        });
        $(this).find('input.stDate_edit').bdatepicker();

    }
</script>
