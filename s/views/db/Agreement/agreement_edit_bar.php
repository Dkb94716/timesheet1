<form class="form-horizontal" action="<?php echo base_url();?>/databaseinfo/submit_data" id="edit-agreement-form"  role="form">
                                <div class="col-md-6">
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Type of agreement</label>
                                        <input name="agreement_type" type="text" class="form-control height_25 plahole_font" style="width: 100%;" value="<?php echo $detail[0]['agreement_type'];?>">
                                    </div>

                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Date signed</label>
                                        <div class="input-group date stDate_edit">
                                            <input id="signed_date_edit" name="signed_date" class="form-control height_25" type="text" value="<?php if($detail[0]['signed_date']=="" ||$detail[0]['signed_date']=="0000-00-00 00:00:00"){echo '';}else{echo date('d F Y', strtotime($detail[0]['signed_date']));} ?>">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Date of termination</label>
                                        <div class="input-group date stDate_edit">
                                            <input id="termination_date_edit" name="termination_date" class="form-control height_25" type="text" value="<?php if($detail[0]['termination_date']=="" ||$detail[0]['termination_date']=="0000-00-00 00:00:00"){echo '';}else{echo date('d F Y', strtotime($detail[0]['termination_date']));} ?>">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>

                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Remarks</label>
                                        <textarea name="remarks" style="width:100%;resize:vertical;"><?php echo $detail[0]['remarks'];?></textarea>
                                    </div>
                                </div>	
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="hidden"  name="id" id="accounting_done_by" style="width: 100%;" value="<?php echo $detail[0]['agreement_co_id']; ?>">
                                        <input type="hidden"  name="action" id="accounting_done_by" style="width: 100%;" value="edit">
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

        $('.stDate_edit').bdatepicker({
	  format: "dd MM yyyy",
	   autoclose: true
	 }).on('changeDate', function(e) {
		// Revalidate the date field
		$('#edit-agreement-form24').bootstrapValidator('revalidateField', 'signed_date');
		$('#edit-agreement-form24').bootstrapValidator('revalidateField', 'termination_date');	
	});
        var validator = $('#edit-agreement-form').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                agreement_type: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
//                signed_date: {
//                    validators: {
//                        callback: {
//                            message: 'This field is required',
//                            callback: function (value, validator, $field) {
//                                var input1 = new Date($('#signed_date_edit').val()).getTime();
//                                var input2 = new Date($('#termination_date_edit').val()).getTime();
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
//                                            message: 'Date of signed should be less than date of termination'
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
//                termination_date: {
//                    validators: {
//                        callback: {
//                            message: 'Date of termination should be greater than date of signed',
//                            callback: function (value, validator, $field) {
//                                var input1 = new Date($('#signed_date_edit').val()).getTime();
//                                var input2 = new Date($('#termination_date_edit').val()).getTime();
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
//                                            message: 'Date of termination should be greater than date of signed'
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
            submit_agreement_form('edit-agreement-form', 'edit', '<?php echo $detail[0]['agreement_co_id']; ?>');
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
