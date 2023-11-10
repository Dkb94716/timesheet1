<?php     
    $trc_available1 = ($detail[0]['trc_available']==1)?'checked=checked':'';
    $trc_available2 = ($detail[0]['trc_available']==0)?'checked=checked':'';
    $show_hide_trc_available_div_edit = ($detail[0]['trc_available']==1)?'block':'none';
    $date = date('Y-m-d');
    $trc_renewal_at = ($detail[0]['trc_renewal_at']=="" || $detail[0]['trc_renewal_at']=="0000-00-00 00:00:00")? "" : date('d F Y', strtotime($detail[0]['trc_renewal_at']));
?>
<form class="form-horizontal" action="<?php echo base_url(); ?>/databaseinfo/submit_data" id="edit-taxtrc-form"  role="form">
    <div class="col-md-6">
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">VAT No.</label>
            <input name="vat_no" type="text" value="<?php echo $detail[0]['vat_no'];?>" class="form-control height_25 plahole_font" style="width: 100%;">
        </div>
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">TAN No.</label>
            <input name="tan_no" value="<?php echo $detail[0]['tan_no'];?>" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
        </div>
    </div>
    <div class="col-md-6">	
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Last tax return filed</label>
            <div class="input-group date stDate_edit col-sm-12">
                <input name="last_tax_returned_on" value="<?php $last_tax_returned_on = ($detail[0]['last_tax_returned_on']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['last_tax_returned_on'])):""; echo $last_tax_returned_on; ?>" class="form-control height_25" type="text">
                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
            </div>
        </div>
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">TRC available ?</label>
            <div class="radio pull-left" style="margin-right:30px;">
                <input type="radio" class="radioYesBtn" name="trc_available" id="show_trc_available_edit" value="1" <?php echo $trc_available1;?>> 
                Yes
            </div>

            <div class="radio pull-left"> 
                <input type="radio" class="radioNoBtn" name="trc_available"  id="hide_trc_available_id_edit" value="0" <?php echo $trc_available2;?> > 
                No
            </div>
        </div>
        <div id="show_hide_trc_available_div_edit" style="display:<?php echo $show_hide_trc_available_div_edit;?>;">
            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">TRC number</label>
                <input type="text" value="<?php echo $detail[0]['trc_no'];?>" class="form-control height_25 plahole_font" name="trc_no" id="accounting_done_by" style="width: 100%;">
            </div>
            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">TRC expiry date</label>
                <div class="input-group date stDate_edit col-sm-12">
                    <input name="trc_renewal_at" class="form-control height_25" type="text" value="<?php echo $trc_renewal_at; ?>">
                    <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                </div>
            </div>
            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Treaty countries</label>
                <input type="text" class="form-control height_25 plahole_font" name="treaty_countries" id="accounting_done_by" value="<?php echo $detail[0]['treaty_countries'];?>" style="width: 100%;">
            </div>
        </div>
    </div>	
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="hidden"  name="id" id="" style="width: 100%;" value="<?php echo $detail[0]['taxtrc_id'];?>">
            <input type="hidden"  name="action" id="" style="width: 100%;" value="edit">
            <button type="submit" class="btn btn-success pull-right">Save</button>
            <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

        </div>
    </div>
</form>
<!--<script src="<?php echo base_url(); ?>assets/js/db_ready.js"></script>-->

<script>
    $(document).ready(function(){
        var cur_date=get_current_date();
//            $(".stDate_edit").val(cur_date);
            $('.stDate_edit').bdatepicker({
            format: "dd MM yyyy",
            autoclose: true,
        });
        
        var validator =  $('#edit-taxtrc-form').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
           vat_no: {
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
            submit_taxtrc_form('edit-taxtrc-form','edit','<?php echo $detail[0]['taxtrc_id'];?>');   
        });
        
        $(".close,.cancel").click(function() {
            $('.form-group').removeClass('has-error has-feedback');
            $('.form-group').find('small.help-block').hide();
            $('.form-group').find('i.form-control-feedback').hide();
        });
        
        $("#show_trc_available_edit").click(function(){
            $("#show_hide_trc_available_div_edit").slideDown();
        });
        
        $("#hide_trc_available_id_edit").click(function(){
            $("#show_hide_trc_available_div_edit").slideUp();
        });
      });
</script>