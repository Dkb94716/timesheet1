<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal margin-none">
			<div class="overflow-x">    
				<?php if ($userPrivileges->client_database->shareholder->Add == 1) { ?>
				<a href="#add-shareholder-info" data-toggle="modal" class="btn-xs btn-success pull-right" style="margin-bottom:5px;">Add More</a>
				<?php } ?>
				<div class="widget-head tdtopbg" style="margin-bottom: 0px;">
					<div class=" col-md-8 pull-left media" style="padding:0px; margin-top:5px;">
						<div>
							<?php if(!empty($client_shareholder_type_info_detail)){
									$i=0;
									$separator = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
									foreach($client_shareholder_type_info_detail as $client_shareholder_type){
										$i++;
										if(count($client_shareholder_type_info_detail)==$i){
											$separator='';
										}
							?>
							<?php if(!empty($client_shareholder_type->type_of_shares)){
                                                        echo $client_shareholder_type->type_of_shares;?> 
                                                    <div class="badge badge-success"><?php echo $client_shareholder_type->total_stated_capital;?></div><?php echo $separator;?>
							<?php 
									
                                                        }
                                                        }
								}
							?>
						</div>
					</div>
				</div>
				<table class="dynamicTable tableTools table table-striped overflow-x">
					<thead class="bg-gray">
						<tr role="row">
							<th class="thead-th-tr-textarea" style="padding-left: 5px !important;">Shareholder <br />name</th>
							<th class="thead-th-tr-textarea">Number of <br />shares</th>
							<th class="thead-th-tr-textarea">Type of <br />shares</th>
							<th class="thead-th-tr-textarea">Value of <br />shares</th>
							<th class="thead-th-tr-textarea">Passport <br />expiry date</th>
							<th class="thead-th-tr-textarea">Transfer <br />of shares</th>
							<th class="thead-th-tr-textarea">Stated <br />Capital</th>
							<th style="width:100px !important; text-align:right"></th>
						</tr>
					</thead>
                    <tbody>
                        <?php
						if (!empty($client_shareholder_info_detail)) {
							foreach ($client_shareholder_info_detail as $client_shareholder_info) {
                    	?>
						<tr role="row" id="add-more_tr">
							<td class="tbody-tr-td-area">
								<div class="td-area-form-marg">
									<?php echo $client_shareholder_info->shareholder_name; ?>
								</div>
							</td>
							<td class="tbody-tr-td-area">
								<div class="td-area-form-marg" style="text-align:right; padding-right:50px;">
									<?php echo $client_shareholder_info->no_of_shares; ?>
								</div>
							</td>
							<td class="tbody-tr-td-area">
								<div class="td-area-form-marg">
									<?php echo $client_shareholder_info->type_of_shares; ?>
								</div>
							</td>
							<td class="tbody-tr-td-area">
								<div class="td-area-form-marg" style="text-align:right; padding-right:50px;">
									<?php echo $client_shareholder_info->value_of_shares; ?>
								</div>
							</td>
							<td class="tbody-tr-td-area drectorship_hidden-filed">
								<div class="td-area-form-marg">
									<?php echo $client_shareholder_info->passport_expiry_date; ?>
								</div>
							</td>
							<td class="tbody-tr-td-area" style="text-align:center;">
								<div class="td-area-form-marg">
									<?php echo $client_shareholder_info->transfer_of_shares; ?>
								</div>
							</td>
							
							
							<td class="tbody-tr-td-area">
								<div class="td-area-form-marg"  style="text-align:right; padding-right:50px;">
									<?php echo $client_shareholder_info->stated_capital; ?>
								</div>
							</td>
							<td style="width:100px !important; padding:3px; text-align:center;">
								<?php if ($userPrivileges->client_database->shareholder->Delete == 1) { ?>
								<a href="#delete-popup_div" data-toggle="modal" onclick="delete_client_shareholder_info('<?php echo $client_shareholder_info->client_shareholder_info_id; ?>')" class="btn btn-stroke btn-circle btn-danger td-icon" style="margin-left:5px;"><i class="fa fa-trash-o td-icon_font-size"></i></a>
								<?php } 
								if ($userPrivileges->client_database->shareholder->Edit == 1) { ?>
								<a href="#edit-shareholder-info" data-toggle="modal" onclick="edit_client_shareholder_info('<?php echo $client_shareholder_info->client_shareholder_info_id; ?>')" class="btn btn-stroke btn-circle btn-danger td-icon"><i class="fa fa-pencil td-icon_font-size"></i></a>
								<?php } ?>
							</td>
						</tr>
                    	<?php
                        }
                    }
                    ?>
                    </tbody>
				</table>
			</div>
		</form>
	</div>
</div>

<div class="modal fade"  id="add-shareholder-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Add Shareholder Information</h3>
            </div>
            <div class="modal-body">
                <div class="innerAll" style="padding: 0px;">
                    <form class="form-horizontal" role="form" id="add_shareholder_info">
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Shareholder name</label>
                            <input type="text" class="form-control height_25 plahole_font" name="shareholder_name" id="shareholder_name" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Number of shares</label>
                            <input type="text" class="form-control height_25 plahole_font" name="no_of_shares" id="no_of_shares" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Type of shares</label>
                            <input type="text" class="form-control height_25 plahole_font" name="type_of_shares" id="type_of_shares" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Value of shares</label>
                            <input type="text" class="form-control height_25 plahole_font" name="value_of_shares" id="value_of_shares" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float: left;margin-right: 30px">Passport expiry date</label>
                            <div class="input-group date datepicker2" style="width:100%;">
                                <input class="form-control height_25" type="text" name="passport_expiry_date" id="passport_expiry_date"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float:left; margin-right:50px;">Transfer of shares</label>
                            <input type="radio" name="transfer_of_shares" style="float:left" value="Yes">
                            <span style="float:left">&nbsp;Yes</span>
                            <input type="radio" name="transfer_of_shares" style="margin-left:10px;float:left" value="No" checked>
                            <span style="float:left">&nbsp;No</span>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important; display:none;" id="transfer-share_hidden-filed">
                            <label class="client-detailes-sub_heading blue">New share holder</label>
                            <input type="text" class="form-control height_25 plahole_font" name="new_share_holder" id="new_share_holder" style="width: 100%;">

                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Other KYC docs</label>
                            <textarea type="text" class="form-control height_25 plahole_font" name="other_kyc_docs" id="other_kyc_docs" style="resize: vertical; height:75px; width: 100%;"></textarea>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Stated Capital</label>
                            <input type="text" class="form-control height_25 plahole_font" name="stated_capital" id="stated_capital" style="width: 100%;">    
                        </div>
                        <div class="form-group td-area-form-marg" style="padding-bottom: 15px;float: inherit; margin-top:30px;">
                            <button class="btn btn-success pull-right">Save</button>
                            <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:10px;">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade"  id="edit-shareholder-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Edit Shareholder Information</h3>
            </div>
            <div class="modal-body">
                <div class="innerAll" style="padding: 0px;">
                    <form class="form-horizontal" role="form" id="edit_shareholder_info">
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Name</label>
                            <input type="text" placeholder="Shareholder Name" class="form-control height_25 plahole_font" name="edit_shareholder_name" id="edit_shareholder_name" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">No.of Shares</label>
                            <input type="text" placeholder="No.of Shares" class="form-control height_25 plahole_font" name="edit_no_of_shares" id="edit_no_of_shares" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Type of shares</label>
                            <input type="text" placeholder="Type of shares" class="form-control height_25 plahole_font" name="edit_type_of_shares" id="edit_type_of_shares" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Value of shares</label>
                            <input type="text" placeholder="Value of shares" class="form-control height_25 plahole_font" name="edit_value_of_shares" id="edit_value_of_shares" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float: left;margin-right: 30px">Passport expiry date</label>
                            <div class="input-group date datepicker2" id="edit_passport_expiry_date_datepicker" style="width:100%;">
                                <input class="form-control height_25" type="text" name="edit_passport_expiry_date" id="edit_passport_expiry_date"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float:left; margin-right:50px;">Transfer of shares</label>
                            <input type="radio" name="edit_transfer_of_shares" style="float:left" value="Yes">
                            <span style="float:left">&nbsp;Yes</span>
                            <input type="radio" name="edit_transfer_of_shares" style="margin-left:10px;float:left" value="No">
                            <span style="float:left">&nbsp;No</span>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important; display:none;" id="edit_transfer-share_hidden-filed">
                            <label class="client-detailes-sub_heading blue">New share holder</label>
                            <input type="text" placeholder="New share holder" class="form-control height_25 plahole_font" name="edit_new_share_holder" id="edit_new_share_holder" style="width: 100%;">

                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Other KYC docs</label>
                            <textarea type="text" class="form-control height_25 plahole_font" name="edit_other_kyc_docs" id="edit_other_kyc_docs" style="resize: vertical; height:75px; width: 100%;"></textarea>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Stated Capital</label>
                            <input type="text" placeholder="Stated Capital" class="form-control height_25 plahole_font" name="edit_stated_capital" id="edit_stated_capital" style="width: 100%;">    
                        </div>
                        <input type="hidden" id="edit_client_shareholder_info_id" value="">
                        <div class="form-group td-area-form-marg" style="padding-bottom: 15px;float: inherit; margin-top:30px;">
                            <button class="btn btn-success pull-right">Save</button>
                            <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:10px;">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        
        $('.datepicker2').bdatepicker({
		format: "dd MM yyyy",
		 autoclose: true
	});
        $('input[name="transfer_of_shares"]').on('click', function() {
        if ($(this).val() == 'Yes') {
            $("#transfer-share_hidden-filed").show();
        }
        else {
            $("#transfer-share_hidden-filed").hide();
            $('#new_share_holder').val('');
        }
    });
     $('input[name="edit_transfer_of_shares"]').on('click', function() {
        if ($(this).val() == 'Yes') {
            $("#edit_transfer-share_hidden-filed").show();
        }
        else {
            $("#edit_transfer-share_hidden-filed").hide();
            $('#edit_new_share_holder').val('');
        }
    });
     
        
         
        $('#add-shareholder-info').on('shown.bs.modal', function () {
            $('#add_shareholder_info').bootstrapValidator('resetForm', true);
        });
        $('#add_shareholder_info').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
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
                        notEmpty: {
                            message: 'This field is required'
                        },
                        integer: {
                        message: 'The value is not an integer'
                    }
                    }
                },
                stated_capital: {
                    validators: {
                       
                        integer: {
                        message: 'The value is not an integer'
                    }
                    }
                }
                
            }
        })
                .on('success.form.bv', function (e) {
                    e.preventDefault();
            $('.btn-success').attr("disabled", "disabled");
                    var comp = new Object();
                    comp.client_id = <?php echo $client_id;?>;
                    comp.shareholder_name = $('#shareholder_name').val();
                    comp.no_of_shares = $('#no_of_shares').val();
                    comp.type_of_shares = $('#type_of_shares').val();
                    comp.value_of_shares = $('#value_of_shares').val();
                    comp.passport_expiry_date = $('#passport_expiry_date').val();
                    comp.transfer_of_shares = $("input[name=transfer_of_shares]:checked").val();
                    comp.new_share_holder = $('#new_share_holder').val();
                    comp.other_kyc_docs = $('#other_kyc_docs').val();
                    comp.stated_capital = $('#stated_capital').val();


                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/client/add_client_shareholder_info',
                        dataType: "json",
                        data: $.param(comp),
                        beforeSend: function ()
                        {
                            $("#addloader").show();
                        },
                        success: function (data) {
                            $("#add-shareholder-info").modal("hide");
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {
                                   window.stop();
                                   window_location();
                                }
                                else
                                {
                                    $("#add-shareholder-info").modal("show");
                                }

                            });

                        },
                        error: function (xhr, status, error) {
                            bootbox.alert(status);
                        },
                        complete: function ()
                        {
                            $("#addloader").hide();
                        }
                    });
                });


        $('#edit_shareholder_info').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
               edit_shareholder_name: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                edit_no_of_shares: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                        integer: {
                        message: 'The value is not an integer'
                    }
                    }
                },
                edit_stated_capital: {
                    validators: {
                       
                        integer: {
                        message: 'The value is not an integer'
                    }
                    }
                }
            }
        })
                .on('success.form.bv', function (e) {
                    e.preventDefault();
                    $('.btn-success').attr("disabled", "disabled");
                    var comp = new Object();
                    comp.client_shareholder_info_id = $('#edit_client_shareholder_info_id').val();
                    comp.shareholder_name = $('#edit_shareholder_name').val();
                    comp.no_of_shares = $('#edit_no_of_shares').val();
                    comp.type_of_shares = $('#edit_type_of_shares').val();
                    comp.value_of_shares = $('#edit_value_of_shares').val();
                    comp.passport_expiry_date = $('#edit_passport_expiry_date').val();
                    comp.transfer_of_shares = $("input[name=edit_transfer_of_shares]:checked").val();
                    comp.new_share_holder = $('#edit_new_share_holder').val();
                    comp.other_kyc_docs = $('#edit_other_kyc_docs').val();
                    comp.stated_capital = $('#edit_stated_capital').val();

                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/client/submit_edit_client_shareholder_info',
                        dataType: "json",
                        data: $.param(comp),
                        beforeSend: function ()
                        {
                            $("#editloader").show();

                        },
                        success: function (data) {
                            $("#edit-shareholder-info").modal("hide");
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {

                                    window.stop();
                                   window_location();
                                }
                                else
                                {
                                    $("#edit-shareholder-info").modal("show");
                                }

                            });
                        },
                        error: function (xhr, status, error) {
                            alert(status);
                        },
                        complete: function ()
                        {
                            $("#editloader").hide();
                        }
                    });



                });
        initTables();
         $('.dataTables_filter').hide();
    });

    function edit_client_shareholder_info(id) {
    var client_id = <?php echo $client_id;?>;
        var request = $.ajax({
            url: CURRENT_URL + '/client/edit_client_shareholder_info',
            type: "POST",
            data: {client_id:client_id,client_shareholder_info_id: id},
            dataType: "json"
        });
        request.done(function (msg) {
            $.each(msg, function (i, item) {
                $('#edit_client_shareholder_info_id').val(item.client_shareholder_info_id);
                $('#edit_shareholder_name').val(item.shareholder_name);
                $('#edit_no_of_shares').val(item.no_of_shares);
                $('#edit_type_of_shares').val(item.type_of_shares);
                $('#edit_value_of_shares').val(item.value_of_shares);
                $('#edit_passport_expiry_date').val(item.passport_expiry_date);
                $('#edit_passport_expiry_date_datepicker').bdatepicker("update", item.passport_expiry_date);
                $('input[name=edit_transfer_of_shares][value=' + item.transfer_of_shares + ']').prop('checked',true);
                if(item.transfer_of_shares=='Yes'){
                  $("#edit_transfer-share_hidden-filed").css('display','block');  
                }
                else{
                  $("#edit_transfer-share_hidden-filed").css('display','none');  
                }
                $('#edit_new_share_holder').val(item.new_share_holder);
                $('#edit_other_kyc_docs').val(item.other_kyc_docs);
                $('#edit_stated_capital').val(item.stated_capital);
            });
        });
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    }

    function delete_client_shareholder_info(id) {
        bootbox.confirm("Are you sure you want to delete shareholder information?", function (result) {

            if (result == true) {

                var request = $.ajax({
                    url: CURRENT_URL + '/client/delete_client_shareholder_info',
                    type: "POST",
                    data: {client_shareholder_info_id: id},
                    dataType: "json"
                });
                request.done(function (data) {
                    bootbox.alert(data.message, function () {
                        if (data.status == "SUCCESS")
                        {

                           window.stop();
                                   window_location();
                        }


                    });
                });
                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
            }
        });

    }
   
    function window_location(){
        <!--
                            window.location="<?php echo site_url('client/client_detail/'.$client_id);?>?tab_id=<?php echo $tab_id;?>";
                        //-->
    }
</script>