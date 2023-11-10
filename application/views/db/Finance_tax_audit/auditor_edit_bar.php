<?php ?>
<form class="form-horizontal" action="<?php echo base_url();?>client/submit_data" id="edit-auditor-form" role="form">
    <div class="col-md-6">
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Auditors</label>
            <input name="auditors" type="text" class="form-control height_25 plahole_font" value="<?php echo $detail[0]['auditors'];?>" name="accounting_done_by" id="" style="width: 100%;">
        </div>
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Date of appointment</label>
            <div class="input-group date stDate_edit">
                <input name="appointment_date" id="appointment_date_edit" class="form-control height_25" value="<?php $appointment_date = ($detail[0]['appointment_date']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['appointment_date'])):""; echo $appointment_date;  ?>" type="text" >
                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
            </div>
        </div>
    </div>
    <div class="col-md-6">	
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Date of resignation</label>
            <div class="input-group date stDate_edit">
                <input name="resignation_date" id="resignation_date_edit" class="form-control height_25" value="<?php $resignation_date = ($detail[0]['resignation_date']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['resignation_date'])):""; echo $resignation_date; ?>" type="text" >
                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
            </div>
        </div>
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Remark</label>
            <textarea name="remark" style="width:100%;resize:vertical;"><?php echo $detail[0]['remark'];?></textarea>
        </div>
        
    </div>	
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="hidden" class="form-control height_25 plahole_font" name="id"  style="width: 100%;" value="<?php echo $detail[0]['auditor_id'];?>">
            <input type="hidden" class="form-control height_25 plahole_font" name="action"  style="width: 100%;" value="edit">
            <button type="submit" class="btn btn-success pull-right">Save</button>
            <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

        </div>
    </div>
</form>

<script>
    dynamicTable_account = 'dynamicTable1';
    $(document).ready(function() {
        stuff_on_ready();
        $('.stDate_edit').bdatepicker({
	  format: "dd MM yyyy",
	   autoclose: true
	 }).on('changeDate', function(e) {
		// Revalidate the date field
		$('#edit-auditor-form24').bootstrapValidator('revalidateField', 'appointment_date');
		$('#edit-auditor-form24').bootstrapValidator('revalidateField', 'resignation_date');	
	});
        var validator =  $('#edit-auditor-form').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
           auditors: {
                        validators: {
                                notEmpty: {
                                        message: 'This field is required'
                                }
                        }
                },
//                appointment_date: {
//                    validators: {
//                        callback: {
//                            message: 'This field is required',
//                            callback: function (value, validator, $field) {
//                                var input1 = new Date($('#appointment_date_edit').val()).getTime();
//                                var input2 = new Date($('#resignation_date_edit').val()).getTime();
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
//                                            message: 'Date of appointment should be less than date of resignation'
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
//                resignation_date: {
//                    validators: {
//                        callback: {
//                            message: 'Date of expiry should be greater than Date of issue',
//                            callback: function (value, validator, $field) {
//                               var input1 = new Date($('#appointment_date_edit').val()).getTime();
//                                var input2 = new Date($('#resignation_date_edit').val()).getTime();
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
//                                            message: 'Date of resignation should be greater than date of appointment'
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
        .on('success.form.bv', function (e) {
            e.preventDefault();
            submit_auditor_form('edit-auditor-form','edit','<?php echo $detail[0]['auditor_id'];?>');   
        });
        
        $(".close,.cancel").click(function() {
            $('.form-group').removeClass('has-error has-feedback');
            $('.form-group').find('small.help-block').hide();
            $('.form-group').find('i.form-control-feedback').hide();
        });
        
    });
    function stuff_on_ready(){
        var cur_date=get_current_date();
            $('.stDate_edit').bdatepicker({
            format: "dd MM yyyy",
            autoclose: true,
        });
    }
</script>