<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal margin-none">
			<div class="overflow-x">   
				<?php if ($userPrivileges->client_database->agm->Add == 1) { ?>
				<a href="#add-agm-info" data-toggle="modal" class="btn-xs btn-success pull-right" style="margin-bottom:5px;">Add More</a>
				<?php } ?>
				<table class="dynamicTable tableTools table table-striped overflow-x">
					<thead class="bg-gray">
						<tr role="row">
							<th class="thead-th-tr-textarea" style="padding-left: 5px !important;">AGM date</th>
							<th class="thead-th-tr-textarea">Constitution adopted</th>
							<th style="width:10% !important; text-align:right"></th>
						</tr>
					</thead>
					<tbody>
					<?php
					if (!empty($client_agm_info_detail)) {
					foreach ($client_agm_info_detail as $client_agm_info) {
						?>
						<tr role="row" id="add-more_tr">
							<td class="tbody-tr-td-area">
								<div class="td-area-form-marg">
									<?php echo date('d F Y',  strtotime($client_agm_info->agm_date)); ?> 
								</div>
							</td>
							<td class="tbody-tr-td-area drectorship_hidden-filed">
								<div class="td-area-form-marg">
									<?php echo $client_agm_info->constitution_adopted; ?> 
								</div>
							</td>
							
							
							<td style="width:10% !important; padding:3px; text-align:center;">
								<?php if ($userPrivileges->client_database->agm->Delete == 1) { ?>
								<a href="#delete-popup_div" data-toggle="modal" onclick="delete_client_agm_info('<?php echo $client_agm_info->client_agm_info_id; ?>')" class="btn btn-stroke btn-circle btn-danger td-icon" style="margin-left:5px;"><i class="fa fa-trash-o td-icon_font-size"></i></a>
								<?php } 
							    if ($userPrivileges->client_database->agm->Edit == 1) { ?>
								<a href="#edit-agm-info" data-toggle="modal" onclick="edit_client_agm_info('<?php echo $client_agm_info->client_agm_info_id; ?>')" class="btn btn-stroke btn-circle btn-danger td-icon"><i class="fa fa-pencil td-icon_font-size"></i></a>
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
<div class="modal fade"  id="add-agm-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Add AGM and Constitution Information</h3>
            </div>
            <div class="modal-body">
                <div class="innerAll" style="padding: 0px;">
                    <form class="form-horizontal" role="form" id="add_agm_info">
                        <input type="hidden" name="client_id" id="client_id" value="<?php echo $client_id;?>">
                        
                        <h4 class="modal-title">AGM</h4>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date  AGM held for the current year</label>
                            <div class="input-group date datepicker2" style="width:100%;">
                                <input class="form-control height_25" type="text" name="agm_date" id="agm_date"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                       
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float:left; margin-right:50px;">Have the audited financial statements been adopted at the AGM?</label>
                            <input type="radio" name="financial_statements" style="float:left" value="Yes">
                            <span style="float:left">&nbsp;Yes</span>
                            <input type="radio" name="financial_statements" style="margin-left:10px;float:left" value="No" checked>
                            <span style="float:left">&nbsp;No</span>
                        </div>
                        <h4 class="modal-title">Constitution</h4>
                         <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float:left; margin-right:50px;">Constitution adopted</label>
                            <input type="radio" name="constitution_adopted" style="float:left" value="Yes">
                            <span style="float:left">&nbsp;Yes</span>
                            <input type="radio" name="constitution_adopted" style="margin-left:10px;float:left" value="No" checked>
                            <span style="float:left">&nbsp;No</span>
                        </div>
                          <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float:left; margin-right:50px;">Has there been any amendment/revocation to the constitution?</label>
                            <input type="radio" name="amendment" style="float:left" value="Yes">
                            <span style="float:left">&nbsp;Yes</span>
                            <input type="radio" name="amendment" style="margin-left:10px;float:left" value="No" checked>
                            <span style="float:left">&nbsp;No</span>
                        </div>
                          <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date relevant filing done with RoC</label>
                            <div class="input-group date datepicker2" style="width:100%;">
                                <input class="form-control height_25" type="text" name="relevant_date" id="relevant_date"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
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
<div class="modal fade"  id="edit-agm-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Edit AGM and Constitution Information</h3>
            </div>
            <div class="modal-body">
                <div class="innerAll" style="padding: 0px;">
                    <form class="form-horizontal" role="form" id="edit_agm_info">
                        <h4 class="modal-title">AGM</h4>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date  AGM held for the current year</label>
                            <div class="input-group date datepicker2" id="edit_agm_date_datepicker" style="width:100%;">
                                <input class="form-control height_25" type="text" name="edit_agm_date" id="edit_agm_date"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                       
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float:left; margin-right:50px;">Have the audited financial statements been adopted at the AGM?</label>
                            <input type="radio" name="edit_financial_statements" style="float:left" value="Yes">
                            <span style="float:left">&nbsp;Yes</span>
                            <input type="radio" name="edit_financial_statements" style="margin-left:10px;float:left" value="No">
                            <span style="float:left">&nbsp;No</span>
                        </div>
                        <h4 class="modal-title">Constitution</h4>
                         <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float:left; margin-right:50px;">Constitution adopted</label>
                            <input type="radio" name="edit_constitution_adopted" style="float:left" value="Yes">
                            <span style="float:left">&nbsp;Yes</span>
                            <input type="radio" name="edit_constitution_adopted" style="margin-left:10px;float:left" value="No">
                            <span style="float:left">&nbsp;No</span>
                        </div>
                          <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float:left; margin-right:50px;">Has there been any amendment/revocation to the constitution?</label>
                            <input type="radio" name="edit_amendment" style="float:left" value="Yes">
                            <span style="float:left">&nbsp;Yes</span>
                            <input type="radio" name="edit_amendment" style="margin-left:10px;float:left" value="No">
                            <span style="float:left">&nbsp;No</span>
                        </div>
                          <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date relevant filing done with RoC</label>
                            <div class="input-group date datepicker2" id="edit_relevant_date_datepicker" style="width:100%;">
                                <input class="form-control height_25" type="text" name="edit_relevant_date" id="edit_relevant_date"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                         <input type="hidden" name="edit_client_agm_info_id" id="edit_client_agm_info_id" value="">
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
            $('#add_agm_info').bootstrapValidator('revalidateField', 'agm_date');
            $('#edit_agm_info').bootstrapValidator('revalidateField', 'edit_agm_date');
        });
         
        $('#add-agm-info').on('shown.bs.modal', function () {
            $('#add_agm_info').bootstrapValidator('resetForm', true);
        });
        $('#add_agm_info').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                agm_date: {
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
            $('.btn-success').attr("disabled", "disabled");
                    var data = $( "#add_agm_info" ).serialize();


                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/client/add_client_agm_info',
                        dataType: "json",
                        data: data,
                        beforeSend: function ()
                        {
                            $("#addloader").show();
                        },
                        success: function (data) {
                            $("#add-agm-info").modal("hide");
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {
                                    window.stop();
                                   window_location();
                                }
                                else
                                {
                                    $("#add-agm-info").modal("show");
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


        $('#edit_agm_info').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                  edit_agm_date: {
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
                    $('.btn-success').attr("disabled", "disabled");
                    var data = $( "#edit_agm_info" ).serialize();

                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/client/submit_edit_client_agm_info',
                        dataType: "json",
                        data: data,
                        beforeSend: function ()
                        {
                            $("#editloader").show();

                        },
                        success: function (data) {
                            $("#edit-agm-info").modal("hide");
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {

                                    window.stop();
                                   window_location();
                                }
                                else
                                {
                                    $("#edit-agm-info").modal("show");
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

    function edit_client_agm_info(id) {
    var client_id = <?php echo $client_id;?>;
        var request = $.ajax({
            url: CURRENT_URL + '/client/edit_client_agm_info',
            type: "POST",
            data: {client_id:client_id,client_agm_info_id: id},
            dataType: "json"
        });
        request.done(function (msg) {
            $.each(msg, function (i, item) {
                $('#edit_client_agm_info_id').val(item.client_agm_info_id);
                $('#edit_agm_date').val(item.agm_date);
                $('#edit_agm_date_datepicker').bdatepicker("update", item.agm_date);
                $('input[name=edit_financial_statements][value=' + item.financial_statements + ']').prop('checked',true);
                $('input[name=edit_constitution_adopted][value=' + item.constitution_adopted + ']').prop('checked',true);
                $('input[name=edit_amendment][value=' + item.amendment + ']').prop('checked',true);
                $('#edit_relevant_date').val(item.relevant_date);
                $('#edit_relevant_date_datepicker').bdatepicker("update", item.relevant_date);
                
            });
        });
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    }

    function delete_client_agm_info(id) {
        bootbox.confirm("Are you sure you want to delete agm information?", function (result) {

            if (result == true) {

                var request = $.ajax({
                    url: CURRENT_URL + '/client/delete_client_agm_info',
                    type: "POST",
                    data: {client_agm_info_id: id},
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