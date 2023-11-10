<?php

//Array
//(
//    [0] => Array
//        (
//            [substance_id] => 1
//            [office_premises] => 1
//            [office_address] => 
//            [employee_full_time] => 1
//            [adopted_arbitration] => 1
//            [has_the_constitution] => SSS
//            [date_relevant] => 2015-09-22 00:00:00
//            [is_expected] => 1
//            [shares_are] => 1
//            [security_exchange] => SS
//            [has_yearly_expenditure] => 1
//            [is_active] => 1
//            [client_id] => 6
//            [created_by] => 11
//            [created_on] => 2015-09-22 18:31:36
//            [updated_by] => 11
//            [updated_on] => 2015-09-22 18:31:36
//        )
//
//);
    $date = date('Y-m-d');
    $date_relevant = ($detail[0]['date_relevant'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['date_relevant'])) : "";
    $office_premises_yes = ($detail[0]['office_premises']==1)?'checked=checked':'';
    $office_premises_no = ($detail[0]['office_premises']==0)?'checked=checked':'';
    $office_address_display = ($detail[0]['office_premises']==1)?'block':'none';
    
    $employee_full_time_yes = ($detail[0]['employee_full_time']==1)?'checked=checked':'';
    $employee_full_time_no = ($detail[0]['employee_full_time']==0)?'checked=checked':'';
        
    $adopted_arbitration_yes = ($detail[0]['adopted_arbitration']==1)?'checked=checked':'';
    $adopted_arbitration_no = ($detail[0]['adopted_arbitration']==0)?'checked=checked':'';
    $show_hide_adopted_arbitration_div_display = ($detail[0]['adopted_arbitration']==1)?'block':'none';
        
    $is_expected_yes = ($detail[0]['is_expected']==1)?'checked=checked':'';
    $is_expected_no = ($detail[0]['is_expected']==0)?'checked=checked':'';
        
    $shares_are_yes = ($detail[0]['shares_are']==1)?'checked=checked':'';
    $shares_are_no = ($detail[0]['shares_are']==0)?'checked=checked':'';
    $show_hide_shares_are_listed_display = ($detail[0]['shares_are']==1)?'block':'none';
    
        
    $has_yearly_expenditure_yes = ($detail[0]['has_yearly_expenditure']==1)?'checked=checked':'';
    $has_yearly_expenditure_no = ($detail[0]['has_yearly_expenditure']==0)?'checked=checked':'';
//            echo "<pre>"; print_r($detail); die;
?>

<form class="form-horizontal" action="<?php echo base_url(); ?>/databaseinfo/submit_data" id="edit-substance-form"  role="form">
    <div class="col-md-6">
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Office premises in mauritius</label>
            <div class="radio pull-left" style="margin-right:30px;">

                <input <?php echo $office_premises_yes;?> type="radio" name="office_premises" value="1" class="radioYesBtn" name="radio" id="show_address_edit"> 
                Yes
            </div>

            <div class="radio pull-left"> 

                <input <?php echo $office_premises_no;?> type="radio" name="office_premises" value="0" class="radioNoBtn" name="radio" id="hide_address_edit" > 
                No
            </div>
        </div>
        <div class="form-group td-area-form-marg" id="show-hide_address_edit" style="margin-bottom:10px !important;display:<?php echo $office_address_display;?>;">
                <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                <textarea name="office_address" style="width:100%;resize:vertical;"><?php echo $detail[0]['office_address'];?></textarea>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Employs on a full time basis at administrative/technical level, at least one person who shall be resident in Mauritius</label>
            <div class="radio pull-left" style="margin-right:30px;">

                <input <?php echo $employee_full_time_yes;?> type="radio" name="employee_full_time" value="1" class="radioYesBtn" name="employs_on"> 
                Yes

            </div>

            <div class="radio pull-left"> 

                <input <?php echo $employee_full_time_no;?> type="radio" name="employee_full_time" value="0" class="radioNoBtn" name="employs_on" > 
                No

            </div>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Adopted arbitration clause in the constitution</label>
            <div class="radio pull-left" style="margin-right:30px;">

                <input <?php echo $adopted_arbitration_yes;?> type="radio" name="adopted_arbitration" value="1" class="radioYesBtn" name="adopted_arbitration" id="show_adopted_arbitration_edit"> 
                Yes
                </label> 
            </div>

            <div class="radio pull-left"> 

                <input <?php echo $adopted_arbitration_no;?> type="radio" name="adopted_arbitration" value="0" class="radioNoBtn" name="adopted_arbitration" id="hide_adopted_arbitration_edit" > 
                No

            </div>
        </div>
        <div id="show_hide_adopted_arbitration_div_edit" style="display:<?php echo $show_hide_adopted_arbitration_div_display;?>">
            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Has the constitution been amended?</label>
                <input value="<?php echo $detail[0]['has_the_constitution'];?>" type="text" name="has_the_constitution" class="form-control height_25 plahole_font"  id="accounting_done_by" style="width: 100%;">
            </div>
            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Date relevant filing done with ROC</label>
                <div class="input-group date stDate_edit col-sm-12">
                    <input value="<?php echo $date_relevant; ?>" name="date_relevant" class="form-control height_25" type="text">
                    <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">	
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Holds or is expected to hold within the next 12 months, assets (excluding cash held in bank account or shares/interests in another corporation holding a Global Business Licence) which are worth at least USD 100, 000 in Mauritius  </label>
            <div class="radio pull-left" style="margin-right:30px;">
                <input <?php echo $is_expected_yes;?> type="radio" class="radioYesBtn" name="is_expected" value="1"> 
                Yes
            </div>

            <div class="radio pull-left"> 

                <input <?php echo $is_expected_no;?> type="radio" class="radioNoBtn" name="is_expected" value="0" > 
                No

            </div>
        </div>
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Shares are listed on a securities exchange licensed by the FSC</label>
            <div class="radio pull-left" style="margin-right:30px;">

                <input <?php echo $shares_are_yes;?> type="radio" class="radioYesBtn" name="shares_are" value="1" id="show_share_are_listed_edit"> 
                Yes
                </label> 
            </div>

            <div class="radio pull-left"> 

                <input <?php echo $shares_are_no;?> type="radio" class="radioNoBtn" name="shares_are" value="0" id="hide_share_are_listed_edit" > 
                No

            </div>
        </div>

        <div class="form-group td-area-form-marg" id="show_hide_shares_are_listed_edit" style="margin-bottom:10px !important;display:<?php echo $show_hide_shares_are_listed_display;?>">
            <label class="client-detailes-sub_heading" style="width:100%;">Name of securities exchange</label>
            <input value="<?php echo $detail[0]['security_exchange'];?>" type="text" class="form-control height_25 plahole_font" name="security_exchange" id="accounting_done_by" style="width: 100%;">
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Has yearly expenditure in mauritius which can be reasonably expected from any similar corporation which is controlled and managed from mauritius</label>
            <div class="radio pull-left" style="margin-right:30px;">

                <input <?php echo $has_yearly_expenditure_yes;?> type="radio" class="radioYesBtn" name="has_yearly_expenditure" value="1"> 
                Yes
                </label> 
            </div>

            <div class="radio pull-left"> 

                <input <?php echo $has_yearly_expenditure_no;?> type="radio" class="radioNoBtn" name="has_yearly_expenditure" value="0" > 
                No

            </div>
        </div>
    </div>	


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="hidden"  name="id" id="" style="width: 100%;" value="<?php echo $detail[0]['substance_id'];?>">
            <input type="hidden"  name="action" id="" style="width: 100%;" value="edit">
            <button type="submit" class="btn btn-success pull-right">Save</button>
            <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

        </div>
    </div>
</form>

<script>
    $(document).ready(function(){
            stuff_on_ready();
            /*********START Substance Conditions Adopted yes no radio button**********/
            $("#show_address_edit").click(function(){
                $("#show-hide_address_edit").slideDown();
            });
            $("#hide_address_edit").click(function(){
                $("#show-hide_address_edit").slideUp();
            });
            /***********END Substance Conditions Adopted yes no radio button**********/

            /*********START Adopted Arbitration yes no radio button**********/
            $("#show_adopted_arbitration_edit").click(function(){
                $("#show_hide_adopted_arbitration_div_edit").slideDown();
            });
            $("#hide_adopted_arbitration_edit").click(function(){
                $("#show_hide_adopted_arbitration_div_edit").slideUp();
            });
            /***********END Adopted Arbitration yes no radio button**********/

            /*********START Directorship yes no radio button**********/
            $("#show_share_are_listed_edit").click(function(){
                $("#show_hide_shares_are_listed_edit").slideDown();
            });
            $("#hide_share_are_listed_edit").click(function(){
                $("#show_hide_shares_are_listed_edit").slideUp();
            });
            /***********END Directorship yes no radio button**********/
    });
    function stuff_on_ready(){
            $('.stDate_edit').bdatepicker({
            format: "dd MM yyyy",
            autoclose: true,
        });
    // SUBSTANCE
        // For load default grid.      
        var validator =  $('#edit-substance-form').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
           office_premises: {
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
            submit_substance_form('edit-substance-form','edit','<?php echo $detail[0]['substance_id'];?>');   
        });
        
        $(".close,.cancel").click(function() {
            $('.form-group').removeClass('has-error has-feedback');
            $('.form-group').find('small.help-block').hide();
            $('.form-group').find('i.form-control-feedback').hide();
        });
      }
</script>
