<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal margin-none">
			<div class="overflow-x">    
				<?php if ($userPrivileges->client_database->director->Add == 1) { ?>
				<a href="#add-director-info" data-toggle="modal" class="btn-xs btn-success pull-right" style="margin-bottom:5px;">Add More</a>
				<?php } ?>
				<table class="dynamicTable tableTools table table-striped overflow-x">
					<thead class="bg-gray">
						<tr role="row">
							<th class="thead-th-tr-textarea" style="padding-left: 5px !important;">Director name</th>
							<th class="thead-th-tr-textarea">Date appointed</th>
							<th class="thead-th-tr-textarea">Date resigned</th>
							<th class="thead-th-tr-textarea">Passport <br />expiry date</th>
							<th class="thead-th-tr-textarea">Directorship in <br />public company</th>
							<th class="thead-th-tr-textarea drectorship_hidden-filed">Age of the <br />director</th>
							<th class="thead-th-tr-textarea">Other KYC <br />docs available</th>
							<th style="width:100px !important; text-align:right"></th>
						</tr>
					</thead>
					<tbody>
						<?php
                    		if (!empty($client_director_info_detail)) {
                        		foreach ($client_director_info_detail as $client_director_info) {
                    	?>
						<tr role="row" id="add-more_tr">
							<td class="tbody-tr-td-area">
								<div class="td-area-form-marg">
									<?php echo $client_director_info->director_name; ?> 
								</div>
							</td>
							<td class="tbody-tr-td-area">
								<div class="td-area-form-marg">
									<?php echo $client_director_info->date_appointed; ?> 
								</div>
							</td>
							<td class="tbody-tr-td-area">
								<div class="td-area-form-marg">
									<?php echo $client_director_info->date_resigned; ?>
								</div>
							</td>
							<td class="tbody-tr-td-area">
								<div class="td-area-form-marg">
									<?php echo $client_director_info->passport_expiry_date; ?>
								</div>
							</td>
							<td class="tbody-tr-td-area" style="text-align:center;">
								<div class="td-area-form-marg">
									<?php echo ucfirst($client_director_info->directorship_yes_no); ?>
								</div>
							</td>
							<td class="tbody-tr-td-area" style="text-align:center;">
								<div class="td-area-form-marg">
									<?php echo $client_director_info->age_of_the_director; ?>
								</div>
							</td>
							<td class="tbody-tr-td-area">
								<div class="td-area-form-marg">
									<?php echo $client_director_info->other_kyc_docs; ?>
								</div>
							</td>
							<td style="width:100px !important; padding:3px; text-align:center;">
								<?php if ($userPrivileges->client_database->director->Delete == 1) { ?>
								<a href="#delete-popup_div" data-toggle="modal" onclick="delete_client_director_info('<?php echo $client_director_info->client_director_info_id; ?>')"  class="btn btn-stroke btn-circle btn-danger td-icon" style="margin-left:5px;"><i class="fa fa-trash-o td-icon_font-size"></i></a>
								<?php } 
								if ($userPrivileges->client_database->director->Edit == 1) { ?>
								<a href="#edit-director-info" data-toggle="modal" onclick="edit_client_director_info('<?php echo $client_director_info->client_director_info_id; ?>')" class="btn btn-stroke btn-circle btn-danger td-icon"><i class="fa fa-pencil td-icon_font-size"></i></a>
								<?php } ?>
							</td>
						</tr>
						<?php }
                    } ?>
                    </tbody>
				</table>
			</div>
		</form>
	</div>
</div>
<div class="modal fade"  id="add-director-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Add Director Information</h3>
            </div>
            <div class="modal-body">
                <div class="innerAll" style="padding: 0px;">
                    <form class="form-horizontal" role="form" id="add_director_info">
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Director name</label>
                            <input type="text" class="form-control height_25 plahole_font" name="director_name" id="director_name" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date appointed</label>
                            <div class="input-group date datepicker2" style="width:100%;">
                                <input class="form-control height_25" type="text" name="date_appointed" id="date_appointed"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date resigned</label>
                            <div class="input-group date datepicker2" style="width:100%;">
                                <input class="form-control height_25" type="text" name="date_resigned" id="date_resigned"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Passport expiry date</label>
                            <div class="input-group date datepicker2" style="width:100%;">
                                <input class="form-control height_25" type="text" name="passport_expiry_date" id="passport_expiry_date"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float: left;margin-right: 30px">Directorship in public company</label>
                            <input type="radio" name="directorship_yes_no" style="float:left" value="yes" id="drectorship-radio_yes-pop-up">
                            <span style="float:left">&nbsp;Yes</span>
                            <input type="radio" name="directorship_yes_no" style="margin-left:10px;float:left" value="no" id="drectorship-radio_no-pop-up" checked>
                            <span style="float:left">&nbsp;No</span>
                        </div>
                        <div class="form-group td-area-form-marg" id="directorship-hidden-pop-up" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Age of the director</label>
                            <input type="text" class="form-control height_25 plahole_font" name="age_of_the_director" id="age_of_the_director" style="width: 100%;">
                        </div>

                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Other KYC docs available</label>
                            <textarea class="form-control height_25 plahole_font" name="other_kyc_docs" id="other_kyc_docs" style="resize: vertical; height:75px; width: 100%;"></textarea>
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
<div class="modal fade"  id="edit-director-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Edit Director Information</h3>
            </div>
            <div class="modal-body">
                <div class="innerAll" style="padding: 0px;">
                    <form class="form-horizontal" role="form" id="edit_director_info">
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Director Name</label>
                            <input type="text" placeholder="Director Name" class="form-control height_25 plahole_font" name="edit_director_name" id="edit_director_name" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date Appointed</label>
                            <div class="input-group date datepicker2" id="edit_date_appointed_datepicker" style="width:100%;">
                                <input class="form-control height_25" type="text" name="edit_date_appointed" id="edit_date_appointed"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date Resigned</label>
                            <div class="input-group date datepicker2" id="edit_date_resigned_datepicker" style="width:100%;">
                                <input class="form-control height_25" type="text" name="edit_date_resigned" id="edit_date_resigned"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Passport expiry date</label>
                            <div class="input-group date datepicker2" id="edit_passport_expiry_date_datepicker" style="width:100%;">
                                <input class="form-control height_25" type="text" name="edit_passport_expiry_date" id="edit_passport_expiry_date"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float: left;margin-right: 30px">Directorship in public company</label>
                            <input type="radio" name="edit_directorship_yes_no" style="float:left" value="yes" id="edit_drectorship-radio_yes-pop-up">
                            <span style="float:left">&nbsp;Yes</span>
                            <input type="radio" name="edit_directorship_yes_no" style="margin-left:10px;float:left" value="no" id="edit_drectorship-radio_no-pop-up">
                            <span style="float:left">&nbsp;No</span>
                        </div>
                        <div class="form-group td-area-form-marg" id="directorship-hidden-pop-up" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Age of the director</label>
                            <input type="text" placeholder="Age of the director" class="form-control height_25 plahole_font" name="edit_age_of_the_director" id="edit_age_of_the_director" style="width: 100%;">
                        </div>

                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Other KYC docs available</label>
                            <textarea type="text" class="form-control plahole_font" name="edit_other_kyc_docs" id="edit_other_kyc_docs" style="resize: vertical; height:75px; width: 100%;"></textarea>
                        </div>
                        <input type="hidden" id="edit_client_director_info_id" value="">
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
	}).on('changeDate', function(e) {
            // Revalidate the date field
            $('#add_director_info').bootstrapValidator('revalidateField', 'date_appointed');
            $('#edit_director_info').bootstrapValidator('revalidateField', 'edit_date_appointed');
        });
         
        $('#add-director-info').on('shown.bs.modal', function () {
            $('#add_director_info').bootstrapValidator('resetForm', true);
        });
        $('#add_director_info').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                director_name: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                date_appointed: {
                    validators: {
                         notEmpty: {
                            message: 'This field is required'
                        }
                        
                    }
                }/*,
                date_resigned: {
                    validators: {
                       
                        callback: {
                            message: 'Date resigned must be greater than or equal to Date appointed.',
                            callback: function (value, validator, $field) {
                                var date_resigned = new Date(value);
                                var date_appointed = new Date($("#date_appointed").val());
                                return date_resigned >= date_appointed;
                            }
                        }
                    }
                }*/
                
            }
        })
                .on('success.form.bv', function (e) {
                    e.preventDefault();
            $('.btn-success').attr("disabled", "disabled");
                    var comp = new Object();
                    comp.client_id = <?php echo $client_id;?>;
                    comp.director_name = $('#director_name').val();
                    comp.date_appointed = $('#date_appointed').val();
                    comp.date_resigned = $('#date_resigned').val();
                    comp.passport_expiry_date = $('#passport_expiry_date').val();
                    comp.directorship_yes_no = $("input[name=directorship_yes_no]:checked").val();
                    comp.age_of_the_director = $('#age_of_the_director').val();
                    comp.other_kyc_docs = $('#other_kyc_docs').val();


                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/client/add_client_director_info',
                        dataType: "json",
                        data: $.param(comp),
                        beforeSend: function ()
                        {
                            $("#addloader").show();
                        },
                        success: function (data) {
                            $("#add-director-info").modal("hide");
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {
                                    window.stop();
                                   window_location();
                                }
                                else
                                {
                                    $("#add-director-info").modal("show");
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


        $('#edit_director_info').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                edit_director_name: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                edit_date_appointed: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                }/*,
                edit_date_resigned: {
                    validators: {
                       
                        callback: {
                            message: 'Date resigned must be greater than or equal to Date appointed.',
                            callback: function (value, validator, $field) {
                                var date_resigned = new Date(value);
                                var date_appointed = new Date($("#edit_date_appointed").val());
                                return date_resigned >= date_appointed;
                            }
                        }
                    }
                }*/
            }
        })
                .on('success.form.bv', function (e) {
                    e.preventDefault();
            $('.btn-success').attr("disabled", "disabled");
                    var comp = new Object();
                    comp.client_director_info_id = $('#edit_client_director_info_id').val();
                    comp.director_name = $('#edit_director_name').val();
                    comp.date_appointed = $('#edit_date_appointed').val();
                    comp.date_resigned = $('#edit_date_resigned').val();
                    comp.passport_expiry_date = $('#edit_passport_expiry_date').val();
                    comp.directorship_yes_no = $("input[name=edit_directorship_yes_no]:checked").val();
                    comp.age_of_the_director = $('#edit_age_of_the_director').val();
                    comp.other_kyc_docs = $('#edit_other_kyc_docs').val();

                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/client/submit_edit_client_director_info',
                        dataType: "json",
                        data: $.param(comp),
                        beforeSend: function ()
                        {
                            $("#editloader").show();

                        },
                        success: function (data) {
                            $("#edit-director-info").modal("hide");
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {

                                   window.stop();
                                   window_location();
                                }
                                else
                                {
                                    $("#edit-director-info").modal("show");
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

    function edit_client_director_info(id) {
        var client_id = <?php echo $client_id;?>;
        var request = $.ajax({
            url: CURRENT_URL + '/client/edit_client_director_info',
            type: "POST",
            data: {client_id:client_id,client_director_info_id: id},
            dataType: "json"
        });
        request.done(function (msg) {
            $.each(msg, function (i, item) {
                $('#edit_client_director_info_id').val(item.client_director_info_id);
                $('#edit_director_name').val(item.director_name);
                $('#edit_date_appointed').val(item.date_appointed);
                $('#edit_date_appointed_datepicker').bdatepicker("update", item.date_appointed);
                $('#edit_date_resigned').val(item.date_resigned);
                $('#edit_date_resigned_datepicker').bdatepicker("update", item.date_resigned);
                $('#edit_passport_expiry_date').val(item.passport_expiry_date);
                $('#edit_passport_expiry_date_datepicker').bdatepicker("update", item.passport_expiry_date);
                $('input[name=edit_directorship_yes_no][value=' + item.directorship_yes_no + ']').prop('checked',true);
                $('#edit_age_of_the_director').val(item.age_of_the_director);
                $('#edit_other_kyc_docs').val(item.other_kyc_docs);
            });
        });
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    }

    function delete_client_director_info(id) {
        bootbox.confirm("Are you sure you want to delete director information?", function (result) {

            if (result == true) {

                var request = $.ajax({
                    url: CURRENT_URL + '/client/delete_client_director_info',
                    type: "POST",
                    data: {client_director_info_id: id},
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