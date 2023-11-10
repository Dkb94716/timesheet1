<form class="form-horizontal" action="<?php echo base_url(); ?>/databaseinfo/submit_data" id="edit-compliance-form"  role="form">
    <div class="col-md-6">
            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Checklist number</label>
                    <input name="check_list_no" type="text" class="form-control height_25 plahole_font" style="width: 100%;" value="<?php echo $detail[0]['check_list_no'];?>">
            </div> 
            <div id="add_date_of_review-edit_div">
                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date of review</label>
                            <div class="col-md-10" style="padding-left:0px;">
                                    <div class="input-group date stDate_edit col-sm-12">
                                            <input name="review_date" class="form-control height_25" type="text" value="<?php $review_date = ($detail[0]['review_date']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['review_date'])):""; echo $review_date; ?>">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                    </div>
                            </div>
                    </div>
            </div>
    </div>
    <div class="col-md-6">
            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Remarks</label>
                    <textarea name="remarks" style="width:100%;resize:vertical;"><?php echo $detail[0]['remarks'];?></textarea>
            </div>
            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Level of risk</label>
                <input name="risk_level" type="text" class="form-control height_25 plahole_font" value="<?php echo $detail[0]['risk_level'];?>" style="width: 100%;">
            </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="hidden"  name="id" id="accounting_done_by" style="width: 100%;" value="<?php echo $detail[0]['compliance_id']; ?>">
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

        var validator = $('#edit-compliance-form').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                check_list_no: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                }

            }
        }).on('success.form.bv', function(e) {
            e.preventDefault();
            submit_compliance_form('edit-compliance-form', 'edit', '<?php echo $detail[0]['compliance_id']; ?>');
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
