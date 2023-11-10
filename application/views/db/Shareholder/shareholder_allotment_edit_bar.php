<?php
$CI = & get_instance();
$CI->load->model('databaseinfo_model');
$type_of_share_list = $CI->databaseinfo_model->getShareholderAllotmentTypeofshareList();
$date = date('Y-m-d');
$date_of_allotment = ($detail[0]['date_of_allotment'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['date_of_allotment'])) : "";
$date_of_transfer = ($detail[0]['date_of_transfer'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['date_of_transfer'])) : "";
?>
<div id="typeofshare_success_msg_add-edit" class="alert alert-success padding-for-modal" style="display:none;">
    <button type="button" class="custom_close" >&times;</button>
    <span class="success-msg"></span>
</div>
<div id="typeofshare_err_msg_add-edit" class="alert alert-danger padding-for-modal" style="display:none;">
    <button type="button" class="custom_close" >&times;</button>
    <span class="error-msg"></span>
</div>
<form class="form-horizontal" action="<?php echo base_url(); ?>/databaseinfo/submit_data" id="edit-shareholder-allotment-form"  role="form">
    <div class="col-md-6">

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;border-bottom:1px solid #ddd;">
            <label class="client-detailes-sub_heading" style="margin-bottom:0px;"><strong>Allotment of shares</strong></label>
        </div>
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Shareholder</label>
            <input value="<?php echo $detail[0]["shareholder"]; ?>" name="shareholder" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
            <textarea name="address" style="width:100%;resize:vertical;"><?php echo $detail[0]["address"]; ?></textarea>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Date of allotment</label>
            <div class="input-group date stDate_edit col-sm-12">
                <input value="<?php echo $date_of_allotment; ?>" name="date_of_allotment" class="form-control height_25" type="text">
                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
            </div>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Type of share</label>
            <div class="col-md-10" style="padding-left:0px;">
                <select name="type_of_share" class="form-control height_25 plahole_font" id="share-type-type-show-hide_div-corporate-edit" style="width: 100%;">
                    <option value="">Select</option>
                    <?php
                    foreach ($type_of_share_list as $_type_of_share_list) {
                        $selected = ($_type_of_share_list['type_id'] == $detail[0]['type_of_share']) ? 'selected=selected' : '';
                        ?>
                        <option value="<?php echo $_type_of_share_list['type_id']; ?>" <?php echo $selected; ?>><?php echo $_type_of_share_list['type_of_share']; ?></option>
<?php } ?>
                </select>
            </div>
            <div class="col-md-2" style="padding:0px;">
                <a onclick="data_modal_box_typeofshare('add', '-edit');" href="#add-more-share-type-modal-box-corporate" id="share-type-plus-icon-corporate-edit" class="btn-xs btn-success pull-right" data-toggle="modal">
                    <span class="tooltip_area" data-toggle="tooltip" data-original-title="Add" data-placement="top"> <i class="fa fa-plus" style="font-size:14px;margin-top:3px;"></i><span>
                            </a>
                            <span id="share-type-edit-delete-icon-corporate-edit" style="display:none;">
                                <a onclick="data_modal_box_typeofshare('delete', '-edit');" href="#delete-more-share-type-modal-box-corporate" data-toggle="modal" class="btn-xs btn-danger pull-right" style="margin-left:5px;">
                                    <span class="tooltip_area" data-toggle="tooltip" data-original-title="Delete" data-placement="top"><i class="fa fa-trash-o" style="font-size:14px;"></i></span>
                                </a>
                                <a onclick="data_modal_box_typeofshare('edit', '-edit');" href="#edit-more-share-type-modal-box-corporate" data-toggle="modal" class="btn-xs btn-warning pull-right">
                                    <span class="tooltip_area" data-toggle="tooltip" data-original-title="Edit" data-placement="top"><i class="fa fa-edit" style="font-size:14px;"></i></span>
                                </a>
                            </span>
                            </div>
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Numbers of shares</label>
                                <input value="<?php echo $detail[0]["no_of_shares"]; ?>" name="no_of_shares" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Currency</label>
                                <input value="<?php echo $detail[0]["currency"]; ?>" name="currency" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Value</label>
                                <input value="<?php echo $detail[0]["value"]; ?>" name="value" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Stated capital after issue</label>
                                <input value="<?php echo $detail[0]["capital_after_issue"]; ?>" name="capital_after_issue" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">% Holding after allotment</label>
                                <input value="<?php echo $detail[0]["holding_after_allotment"]; ?>" name="holding_after_allotment" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Remarks</label>
                                <textarea name="allotment_remark" style="width:100%;resize:vertical;"><?php echo $detail[0]["allotment_remark"]; ?></textarea>
                            </div>

                            </div>

                            <div class="col-md-6">	
                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;border-bottom:1px solid #ddd;">
                                    <label class="client-detailes-sub_heading" style="margin-bottom:0px;"><strong>Transfer of shares</strong></label>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Transfer from</label>
                                    <input value="<?php echo $detail[0]["transfer_from"]; ?>" name="transfer_from" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Transfer to</label>
                                    <input value="<?php echo $detail[0]["transfer_to"]; ?>" name="transfer_to" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                                    <textarea name="allotment_address" style="width:100%;resize:vertical;"><?php echo $detail[0]["allotment_address"]; ?></textarea>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Date of transfer</label>
                                    <div class="input-group date stDate_edit col-sm-12">
                                        <input value="<?php echo $date_of_transfer; ?>" name="date_of_transfer" class="form-control height_25" type="text">
                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Type of share</label>
                                    <div class="col-md-10" style="padding-left:0px;">
                                        <select name="transfer_type_of_share" class="form-control height_25 plahole_font" id="share-type-type-show-hide_div-corporate-transfer-edit" style="width: 100%;">
                                            <option value="">Select</option>
                                            <?php
                                            foreach ($type_of_share_list as $_type_of_share_list) {
                                                $selected = ($_type_of_share_list['type_id'] == $detail[0]['transfer_type_of_share']) ? 'selected=selected' : '';
                                                ?>
                                                <option value="<?php echo $_type_of_share_list['type_id']; ?>" <?php echo $selected; ?>><?php echo $_type_of_share_list['type_of_share']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2" style="padding:0px;">
                                        <a onclick="data_modal_box_typeofshare1('add', '-edit')" href="#add-more-share-type-modal-box-corporate-transfer" id="share-type-plus-icon-corporate-transfer-edit" class="btn-xs btn-success pull-right" data-toggle="modal">
                                            <span class="tooltip_area" data-toggle="tooltip" data-original-title="Add" data-placement="top"> <i class="fa fa-plus" style="font-size:14px;margin-top:3px;"></i></span>
                                        </a>
                                        <span id="share-type-edit-delete-icon-corporate-transfer-edit" style="display:none;">
                                            <a onclick="data_modal_box_typeofshare1('delete', '-edit')" href="#delete-more-share-type-modal-box-corporate-transfer" data-toggle="modal" class="btn-xs btn-danger pull-right" style="margin-left:5px;">
                                                <span class="tooltip_area" data-toggle="tooltip" data-original-title="Delete" data-placement="top"><i class="fa fa-trash-o" style="font-size:14px;"></i></span>
                                            </a>
                                            <a onclick="data_modal_box_typeofshare1('edit', '-edit')" href="#edit-more-share-type-modal-box-corporate-transfer" data-toggle="modal" class="btn-xs btn-warning pull-right">
                                                <span class="tooltip_area" data-toggle="tooltip" data-original-title="Edit" data-placement="top"><i class="fa fa-edit" style="font-size:14px;"></i></span>
                                            </a>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Number of shares transferred</label>
                                    <input value="<?php echo $detail[0]["no_of_shares_transfer"]; ?>" name="no_of_shares_transfer" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Currency</label>
                                    <input value="<?php echo $detail[0]["transfer_currency"]; ?>" name="transfer_currency" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Value</label>
                                    <input value="<?php echo $detail[0]["transfer_value"]; ?>" name="transfer_value" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Stated Capital after transfer</label>
                                    <input value="<?php echo $detail[0]["transfer_capital_after_transfer"]; ?>" name="transfer_capital_after_transfer" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">% Holding after allotment</label>
                                    <input value="<?php echo $detail[0]["transfer_holding_after_allotment"]; ?>" name="transfer_holding_after_allotment" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Remarks</label>
                                    <textarea name="transfer_remark" style="width:100%;resize:vertical;"><?php echo $detail[0]["transfer_remark"]; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input  type="hidden"  name="id" id="" style="width: 100%;" value="<?php echo $detail[0]['allotment_id']; ?>">
                                    <input  type="hidden"  name="action"  class="add_action"  style="width: 100%;" value="edit">
                                    <button type="submit" class="btn btn-success pull-right">Save</button>
                                    <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

                                </div>
                            </div>
                            </form>

<script src="<?php echo base_url(); ?>assets/js/db_ready.js"></script>
<script>
    $(document).ready(function() {
    //        stDate_edit
        ready_on_db();
        stuff_on_ready();
    });
    function stuff_on_ready() {

        var core_url = CURRENT_URL;

        var validator = $('#edit-shareholder-allotment-form').bootstrapValidator({
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
        }).on('success.form.bv', function(e) {
            e.preventDefault();
            submit_shareholder_allotment_form('edit-shareholder-allotment-form', 'edit', '<?php echo $detail[0]['allotment_id']; ?>');
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
        /*********START share-type-type-show-hide_div-corporate on change function**********/
        $('#share-type-type-show-hide_div-corporate-edit').on('change', function() {
            if ($('#share-type-type-show-hide_div-corporate-edit').val() == '') {
                $('#share-type-plus-icon-corporate-edit').show();
                $('#share-type-edit-delete-icon-corporate-edit').hide();
            } else {
                $('#share-type-plus-icon-corporate-edit').hide();
                $('#share-type-edit-delete-icon-corporate-edit').show();

            }
        });
        /***********END share-type-type-show-hide_div-corporate on change function**********/

        /*********START share-type-type-show-hide_div-corporate-transfer on change function**********/
        $('#share-type-type-show-hide_div-corporate-transfer-edit').on('change', function() {
            if ($('#share-type-type-show-hide_div-corporate-transfer-edit').val() == '') {
                $('#share-type-plus-icon-corporate-transfer-edit').show();
                $('#share-type-edit-delete-icon-corporate-transfer-edit').hide();
            } else {
                $('#share-type-plus-icon-corporate-transfer-edit').hide();
                $('#share-type-edit-delete-icon-corporate-transfer-edit').show();

            }
        });
        /***********END share-type-type-show-hide_div-corporate-transfer on change function**********/
        
        var transfer_type_of_share = '<?php echo $detail[0]['transfer_type_of_share'];?>'
        if (transfer_type_of_share == '') {
            $('#share-type-plus-icon-corporate-transfer-edit').show();
            $('#share-type-edit-delete-icon-corporate-transfer-edit').hide();
        } else {
            $('#share-type-plus-icon-corporate-transfer-edit').hide();
            $('#share-type-edit-delete-icon-corporate-transfer-edit').show();
        }
        var type_of_share = '<?php echo $detail[0]['type_of_share'];?>'
        if (type_of_share == '') {
            $('#share-type-plus-icon-corporate-edit').show();
            $('#share-type-edit-delete-icon-corporate-edit').hide();
        } else {
            $('#share-type-plus-icon-corporate-edit').hide();
            $('#share-type-edit-delete-icon-corporate-edit').show();
        }
    }
</script>
