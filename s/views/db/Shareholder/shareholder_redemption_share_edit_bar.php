<?php
$date = date('Y-m-d');
$shareholder_name =$detail[0]['shareholder_name'];
$shareholder_address =$detail[0]['shareholder_address'];
$no_of_shares =$detail[0]['no_of_shares'];
$date_of_redemption = ($detail[0]['date_of_redemption'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['date_of_redemption'])) : "";
$redemption_remark =$detail[0]['redemption_remark'];

?>

   <form class="form-horizontal" action="<?php echo base_url(); ?>/databaseinfo/submit_data" id="edit-share-holder-redemption-share-form" method="post" role="form" >
                        <div class="col-md-12">

                            <div id="share-holder-info_hide_div">

                                <div class="col-md-6" style="padding-left:0px;">

                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Name of shareholder</label>
                                        <input name="shareholder_name" id="shareholder_name" type="text" class="form-control height_25 plahole_font" value="<?php echo $shareholder_name ;?>" style="width: 100%;">
                                    </div>

                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Address of shareholder</label>
                                        <textarea name="shareholder_address"  id="shareholder_address_edit" style="width:100%;resize:vertical;"><?php echo $shareholder_address ;?></textarea>
                                    </div>
                                    
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                       <label class="client-detailes-sub_heading" style="width:100%;">No. of shares being redeemed or bought back</label>
                                        <input name="no_of_shares" id="no_of_shares" type="text" class="form-control height_25 plahole_font"  value="<?php echo $no_of_shares;?>" style="width: 100%;">
                                   </div>                                    
                                    

                                </div>

                                <div class="col-md-6" style="padding-right:0px;">                                 
                                 <div id="shareholder-audited-accounts_show_hide_div">
                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Date of redeemed or bought back</label>
                                          <div class="input-group date stDate_edit col-sm-12">
                                              <input name="date_of_redemption"  class="form-control height_25 " value="<?php echo $date_of_redemption;?>" type="text">
                                              <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                          </div>
                                      </div>
                                  </div>                                
                                    

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Types of shares being redeemed or bought back</label>
                                    <input name="type_of_share" type="text" class="form-control height_25 plahole_font" value="<?php echo $detail[0]['type_of_share'];?>" style="width: 100%;">
                                </div>
                                   
                                <div class="form-group td-area-form-marg">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Remarks</label>
                                        <textarea name="redemption_remark" style="width:100%;resize:vertical;"><?php echo $redemption_remark;?></textarea>
                                </div>
                                    
                                </div>

                            </div>

                        </div>	
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                 <input type="hidden"  name="id" id="" style="width: 100%;" value="<?php echo $detail[0]['redemption_id']; ?>">
                                 <input type="hidden"  name="action"  class="add_action"  style="width: 100%;" value="edit">                                                              
                                <button type="submit" class="btn btn-success pull-right">Save</button>
                                <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

                            </div>
                        </div>
                    </form>


<script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>        
<script src="<?php echo base_url(); ?>assets/js/db_ready.js"></script>
<script>
    $(document).ready(function() {
        
        ready_on_db();
        stuff_on_ready();
        $('.stDate_edit').bdatepicker({
            format: "dd MM yyyy",
            autoclose: true,
        });

      
    });
    
    
    
    function stuff_on_ready() {
                
               
        var validator = $('#edit-share-holder-redemption-share-form').bootstrapValidator({
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
            submit_shareholder_redemption_buyback_form('edit-share-holder-redemption-share-form', 'edit', '<?php echo $detail[0]['redemption_id']; ?>');
        });
        
        
    }

</script>