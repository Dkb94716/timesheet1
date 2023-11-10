<?php 
    $CI =& get_instance();
    $CI->load->model('databaseinfo_model');
    $account_id = $detail[0]['account_id'];    
    $account_values = $CI->databaseinfo_model->getAccountValues($account_id);
    $adopted_at_agm1 = ($detail[0]['adopted_at_agm']==1)?'checked=checked':'';
    $adopted_at_agm2 = ($detail[0]['adopted_at_agm']==0)?'checked=checked':'';
    $date_of_special_edit = ($detail[0]['adopted_at_agm']==0)?'block':'none';
    $date = date('Y-m-d');
    $special_meeting_on = ($detail[0]['special_meeting_on']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['special_meeting_on'])):"";
   
 
//    echo "<pre />"; print_r($account_values); die;

?>

<form class="form-horizontal" action="<?php echo base_url();?>/databaseinfo/submit_data" id="edit-account-form"  role="form">
								<div class="col-md-6">
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Accounting team</label>
										<input name="account_team" value="<?php echo $detail[0]['account_team'];?>" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
									</div>
									<div class="form-group td-area-form-marg">
										<label class="client-detailes-sub_heading" style="width:100%;">Financial year ending</label>
										<div class="col-md-4" style="padding-left:0px;">
											<select name="financial_year_date" id="financial_year_date" class="form-control height_25 plahole_font">
												<option value="01">01</option>
												<option value="02">02</option>
												<option value="03">03</option>
												<option value="04">04</option>
												<option value="05">05</option>
												<option value="06">06</option>
												<option value="07">07</option>
												<option value="08">08</option>
												<option value="09">09</option>
												<option value="10">10</option>
												<option value="11">11</option>
												<option value="12">12</option>
												<option value="13">13</option>
												<option value="14">14</option>
												<option value="15">15</option>
												<option value="16">16</option>
												<option value="17">17</option>
												<option value="18">18</option>
												<option value="19">19</option>
												<option value="20">20</option>
												<option value="21">21</option>
												<option value="22">22</option>
												<option value="23">23</option>
												<option value="24">24</option>
												<option value="25">25</option>
												<option value="26">26</option>
												<option value="27">27</option>
												<option value="28">28</option>
												<option value="29">29</option>
												<option value="30">30</option>
												<option value="31">31</option>
											</select>
										</div>
										<div class="col-md-8" style="padding-right:0px;">
											<select name="financial_year_month" id="financial_year_month" class="form-control height_25 plahole_font" style="padding-top:2px;padding-bottom:2px;">
												<option value="January">January</option>
												<option value="February">February</option>
												<option value="March">March</option>
												<option value="April">April</option>
												<option value="May">May</option>
												<option value="June">June</option>
												<option value="July">July</option>
												<option value="August">August</option>
												<option value="September">September</option>
												<option value="October">October</option>
												<option value="November">November</option>
												<option value="December">December</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;border-bottom:1px solid #ddd;">
										<label class="client-detailes-sub_heading"><strong>Filling of accounts:</strong></label>
										<a href="#" class="btn-xs btn-success pull-right" id="add_filed_edit" style="width:20px;text-align:right;"><i class="fa fa-plus" style="color:#fff;"></i></a>
									</div>

									<div id="addinput_edit">
                                                                            <?php
                                                                            
                                                                            $i=0;
                                                                            foreach ($account_values as $_account_values) { 
                                                                              $i++;  
                                                                            ?>
                                                                            <?php if($i==1) { ?>
										<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
											<label class="client-detailes-sub_heading" style="width:100%;">Financial year:</label>
											<div class="input-group date col-sm-12 stDate_edit">
												<input name="financial_year_edit[]" value="<?php $financial_year = ($_account_values['financial_year']!="0000-00-00 00:00:00")?date('d F Y', strtotime($_account_values['financial_year'])):""; echo $financial_year; ?>" class="form-control height_25 stDate_edit1" type="text">
												<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
											</div>
										</div>
										<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
											<label class="client-detailes-sub_heading" style="width:100%;">Date filed:</label>
											<div class="input-group date stDate_edit col-sm-12">
												<input name="date_filed_edit[]" value="<?php $date_filed = ($_account_values['date_filed']!="0000-00-00 00:00:00")?date('d F Y', strtotime($_account_values['date_filed'])):""; echo $date_filed; //echo date('d F Y', strtotime($_account_values['date_filed'])); ?>" class="form-control height_25 stDate_edit1" type="text">
												<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
											</div>
										</div>
                                                                            <?php } else { ?>
                                                                            
                                                                            <div class="removed_div"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
											<label class="client-detailes-sub_heading" style="width:100%;">Financial year:<a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" onclick="deleteDiv(this)"><i class="fa fa-fw icon-delete-symbol" style="width:10px;color:#fff;font-size:10px;"></i></a></label>
											<div class="input-group date stDate_edit col-sm-12">
												<input name="financial_year_edit[]" value="<?php $financial_year = ($_account_values['financial_year']!="0000-00-00 00:00:00")?date('d F Y', strtotime($_account_values['financial_year'])):""; echo $financial_year;  ?>" class="form-control height_25" type="text">
												<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
											</div>
										</div><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
											<label class="client-detailes-sub_heading" style="width:100%;">Date filed:</label>
											<div class="input-group date stDate_edit col-sm-12">
												<input name="date_filed_edit[]" value="<?php $date_filed =($_account_values['date_filed']!="0000-00-00 00:00:00")?date('d F Y', strtotime($_account_values['date_filed'])):""; echo $date_filed;//date('d F Y', strtotime($_account_values['date_filed'])); ?>" class="form-control height_25" type="text">
												<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
											</div>
										</div></div>
                                                                            <?php }  ?>

                                                                            <?php } ?>
                                                                            
									</div>
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Have the audited financial statements/financial summaries been adopted at AGM?</label>
										<div class="radio pull-left" style="margin-right:30px;">
                                                                                    <input name="adopted_at_agm" type="radio" name="radio"  id="hide_date_of_special-edit" value="1" <?php echo $adopted_at_agm1;?>> 
                                                                                     Yes
										</div>

										<div class="radio pull-left" style="margin-right:30px;"> 
                                                                                    <input name="adopted_at_agm" type="radio" name="radio"  id="show_date_of_special-edit" value="0" <?php echo $adopted_at_agm2;?>> 
                                                                                     No
										</div>

									</div>

                                                                    <div class="form-group td-area-form-marg" id="date_of_special-edit" style="display:<?php echo $date_of_special_edit;?>">
										<label class="client-detailes-sub_heading" style="width:100%;">Date of special meeting for approval of accounts</label>
										<div class="input-group date stDate_edit col-sm-12">
											<input name="special_meeting_on" class="form-control height_25" value="<?php echo $special_meeting_on; ?>" type="text">
											<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
										</div>
									</div>
								</div>
                                <div class="form-group" style="clear:both;">
                                    <div class="col-sm-offset-2 col-sm-10" style="margin-top:15px;">
                                        <input type="hidden"  name="id" id="accounting_done_by" style="width: 100%;" value="<?php echo $detail[0]['account_id'];?>">
                                        <input type="hidden"  name="action" id="accounting_done_by" style="width: 100%;" value="edit">
                                        <button class="btn btn-success pull-right">Save</button>
                                        <a href="#" class="btn btn-primary pull-right cancel" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

                                    </div>
                                </div>
                            </form>

<script src="<?php echo base_url(); ?>assets/js/db_ready.js"></script>
<script>
    dynamicTable_account = 'dynamicTable1';
    $(document).ready(function() {
        ready_on_db();
        stuff_on_ready();
        $('.stDate_edit').bdatepicker({
               format: "dd MM yyyy",
               autoclose: true,
        });
        $('.stDate_edit1').bdatepicker({
               format: "dd MM yyyy",
               autoclose: true,
        });
//        $('.stDate_edit').bdatepicker("update",new Date());
        // select 
        var financial_year_date = '<?php echo $detail[0]['financial_year_date'];?>';
        financial_year_date = pad(financial_year_date, 2);
        $('#financial_year_date').children().each(function(){
            if($(this).attr('value')==financial_year_date){
               $(this).attr('selected','selected') 
            }
        });
        
        var financial_year_month = '<?php echo $detail[0]['financial_year_month'];?>';
        $('#financial_year_month').children().each(function(){
            if($(this).attr('value')==financial_year_month){
               $(this).attr('selected','selected') 
            }
        });
        
       $('#add_filed_edit').on('click', function(){
//                var inputToCopy='<div class="removed_div"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">'+$('#addinput :first-child').html()+'</div><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">' +$('#addinput').children().eq(1).html() + '</div></div>';
//                $( inputToCopy ).appendTo($('#addinput'));
//                $("#addinput").children().last().children().eq(0).find("label").append('<a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" onClick="deleteDiv(this)"><i class="fa fa-fw icon-delete-symbol" style="width:10px;color:#fff;font-size:10px;"></i></a>');
            var str = '';
            str+= '<div onclick="removeDivFinance(this)"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">';
                    str+='<label class="client-detailes-sub_heading" style="width:100%;">Financial year:<a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" onclick="deleteDiv(this)"><i class="fa fa-fw icon-delete-symbol" style="width:10px;color:#fff;font-size:10px;"></i></a></label>';
                    str+='<div class="input-group date stDate1 col-sm-12">';
                            str+='<input name="financial_year_edit[]" class="form-control height_25 stDate1_current" type="text">';
                            str+='<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>';
                    str+='</div>';
            str+='</div><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">';
                    str+='<label class="client-detailes-sub_heading" style="width:100%;">Date filed:</label>';
                    str+='<div class="input-group date stDate1 col-sm-12">';
                            str+='<input name="date_filed_edit[]" class="form-control height_25 stDate1_current" type="text">';
                           str+= '<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>';
                    str+='</div>';
            str+='</div></div>';
            
            $('#addinput_edit').append(str);
    
            $('.stDate1').each(function(){
                if($(this).children().eq(0).val()==""){
                    var cur_date=get_current_date();
                        //$(this).children().eq(0).val(cur_date);
                        //$(this).children().eq(0).val("");
                        $(this).bdatepicker({
                        format: "dd MM yyyy",
                        autoclose: true,
                    });
                }
            });
            
            });
    });
    
    function pad (str, max) {
        str = str.toString();
        return str.length < max ? pad("0" + str, max) : str;
    }



    function stuff_on_ready(){
        var core_url=CURRENT_URL;
        // ACCOUNT
        // For load default grid.
        var load_data_body1 = "account_data_body";
        blockUI(load_data_body1);
        var url1 = core_url+"/databaseinfo/get_account_grid_data";
        grid_data(load_data_body1,url1,dynamicTable_account);

        // validation
        
       var validator =  $('#edit-account-form').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
           account_team: {
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
            submit_account_form('edit-account-form','add','');   
        });
        
        $(".close,.cancel").click(function() {
            $('.form-group').removeClass('has-error has-feedback');
            $('.form-group').find('small.help-block').hide();
            $('.form-group').find('i.form-control-feedback').hide();
        });
      }
      </script>