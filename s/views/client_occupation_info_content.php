<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal margin-none">
			<div class="overflow-x"> 
				<?php if ($userPrivileges->client_database->occupation->Add == 1) { ?>
				<a href="#add-occupation-permit-info" data-toggle="modal" class="btn-xs btn-success pull-right" style="margin-bottom:5px;">Add More</a>
				<?php } ?>
				<table class="dynamicTable tableTools table table-striped overflow-x">
					<thead class="bg-gray">
						<tr role="row">
							<th class="thead-th-tr-textarea" style="padding-left: 5px !important;">Investor permit</th>
							<th class="thead-th-tr-textarea">Professional permit</th>
							<th class="thead-th-tr-textarea">Self employed permit</th>
							<th class="thead-th-tr-textarea">Retired permit</th>
							<th class="thead-th-tr-textarea">Permanent residence permit</th>
							<th style="width:100px !important; text-align:right"></th>
						</tr>
					</thead>
					<tbody>
						 <?php
						if (!empty($client_occupation_info_detail)) {
						foreach ($client_occupation_info_detail as $client_occupation_info) {
							?>
						<tr role="row" id="add-more_tr">
							<td class="tbody-tr-td-area">
								<div class="td-area-form-marg">
									<?php echo $client_occupation_info->investor_permit; ?> 
								</div>
							</td>
							<td class="tbody-tr-td-area">
								<div class="td-area-form-marg">
									<?php echo $client_occupation_info->professional_permit; ?> 
								</div>
							</td>
							<td class="tbody-tr-td-area">
								<div class="td-area-form-marg">
									<?php echo $client_occupation_info->self_employed_permit; ?> 
								</div>
							</td>
							<td class="tbody-tr-td-area">
								<div class="td-area-form-marg">
									<?php echo $client_occupation_info->retired_permit; ?> 
								</div>
							</td>
							<td class="tbody-tr-td-area">
								<div class="td-area-form-marg">
									<?php echo $client_occupation_info->permanent_residence_permit; ?> 
								</div>
							</td>
							<td style="width:100px !important; padding:3px; text-align:center;">
								<?php if ($userPrivileges->client_database->occupation->Delete == 1) { ?>
								<a href="#delete-popup_div" data-toggle="modal" onclick="delete_client_occupation_info('<?php echo $client_occupation_info->client_occupation_info_id; ?>')" class="btn btn-stroke btn-circle btn-danger td-icon" style="margin-left:5px;"><i class="fa fa-trash-o td-icon_font-size"></i></a>
								<?php } 
								if ($userPrivileges->client_database->occupation->Edit == 1) { ?>
								<a href="#edit-occupation-permit-info" data-toggle="modal" onclick="edit_client_occupation_info('<?php echo $client_occupation_info->client_occupation_info_id; ?>')" class="btn btn-stroke btn-circle btn-danger td-icon"><i class="fa fa-pencil td-icon_font-size"></i></a>
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
<div class="modal fade"  id="add-occupation-permit-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Add Occupation Permit Information</h3>
            </div>
            <div class="modal-body">
                <div class="innerAll" style="padding: 0px;">
                    <form class="form-horizontal" role="form" id="add_occupation_info">
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="col-sm-4 client-detailes-sub_heading">Investor permit</label>
                            <div>
                            	<input type="radio" name="investor_permit" style="float:left" value="Yes">
								<span style="float:left">&nbsp;Yes</span>
								<input type="radio" name="investor_permit" style="margin-left:10px;float:left" value="No" checked>
								<span style="float:left">&nbsp;No</span>
							</div>
                            
                        </div>
                        <div class="form-group td-area-form-marg" id="investor_permit_date_field" style="display: none;margin-bottom:10px !important;">
                            <label class="col-sm-4 client-detailes-sub_heading">&nbsp;</label>
                            
                            <div class="col-sm-4 input-group date datepicker2">
                                <input class="form-control height_25" type="text" name="investor_permit_date" id="investor_permit_date"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="col-sm-4 client-detailes-sub_heading">Professional permit</label>
                            <div>
								<input type="radio" name="professional_permit" style="float:left" value="Yes">
								<span style="float:left">&nbsp;Yes</span>
								<input type="radio" name="professional_permit" style="margin-left:10px;float:left" value="No" checked>
								<span style="float:left">&nbsp;No</span>
							</div>
                            
                        </div>
                        <div class="form-group td-area-form-marg" id="professional_permit_date_field" style="display: none;margin-bottom:10px !important;">
                            <label class="col-sm-4 client-detailes-sub_heading">&nbsp;</label>
                            
                            <div class="col-sm-4 input-group date datepicker2">
                                <input class="form-control height_25" type="text" name="professional_permit_date" id="professional_permit_date"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="col-sm-4 client-detailes-sub_heading">Self employed permit</label>
                            <div>
								<input type="radio" name="self_employed_permit" style="float:left" value="Yes">
								<span style="float:left">&nbsp;Yes</span>
								<input type="radio" name="self_employed_permit" style="margin-left:10px;float:left" value="No" checked>
								<span style="float:left">&nbsp;No</span>
							</div>
                            
                        </div>
                        <div class="form-group td-area-form-marg" id="self_employed_permit_date_field" style="display: none;margin-bottom:10px !important;">
                            <label class="col-sm-4 client-detailes-sub_heading">&nbsp;</label>
                            
                            <div class="col-sm-4 input-group date datepicker2">
                                <input class="form-control height_25" type="text" name="self_employed_permit_date" id="self_employed_permit_date"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="col-sm-4 client-detailes-sub_heading">Retired permit</label>
                            <div>
								<input type="radio" name="retired_permit" style="float:left" value="Yes">
								<span style="float:left">&nbsp;Yes</span>
								<input type="radio" name="retired_permit" style="margin-left:10px;float:left" value="No" checked>
								<span style="float:left">&nbsp;No</span>
							</div>
                            
                        </div>
                        <div class="form-group td-area-form-marg" id="retired_permit_date_field" style="display: none;margin-bottom:10px !important;">
                            <label class="col-sm-4 client-detailes-sub_heading">&nbsp;</label>
                            
                            <div class="col-sm-4 input-group date datepicker2">
                                <input class="form-control height_25" type="text" name="retired_permit_date" id="retired_permit_date"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="col-sm-4 client-detailes-sub_heading">Permanent residence permit</label>
                            <div>
								<input type="radio" name="permanent_residence_permit" style="float:left" value="Yes">
								<span style="float:left">&nbsp;Yes</span>
								<input type="radio" name="permanent_residence_permit" style="margin-left:10px;float:left" value="No" checked>
								<span style="float:left">&nbsp;No</span>
							</div>
                            
                        </div>
                        <div class="form-group td-area-form-marg" id="permanent_residence_permit_date_field" style="display: none;margin-bottom:10px !important;">
                            <label class="col-sm-4 client-detailes-sub_heading">&nbsp;</label>
                            
                            <div class="col-sm-4 input-group date datepicker2">
                                <input class="form-control height_25" type="text" name="permanent_residence_permit_date" id="permanent_residence_permit_date"/>
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
<div class="modal fade"  id="edit-occupation-permit-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Edit Occupation Permit Information</h3>
            </div>
            <div class="modal-body">
                <div class="innerAll" style="padding: 0px;">
                    <form class="form-horizontal" role="form" id="edit_occupation_info">
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="col-sm-4 client-detailes-sub_heading">Investor permit</label>
                            <div>
								<input type="radio" name="edit_investor_permit" style="float:left" value="Yes">
								<span style="float:left">&nbsp;Yes</span>
                                                                <input type="radio" name="edit_investor_permit" style="margin-left:10px;float:left" value="No" checked>
								<span style="float:left">&nbsp;No</span>
							</div>
                            
                        </div>
                        <div class="form-group td-area-form-marg" id="edit_investor_permit_date_field" style="display: none;margin-bottom:10px !important;">
                            <label class="col-sm-4 client-detailes-sub_heading">&nbsp;</label>
                            
                            <div class="col-sm-4 input-group date datepicker2" id="edit_investor_permit_date_datepicker">
                                <input class="form-control height_25" type="text" name="edit_investor_permit_date" id="edit_investor_permit_date"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="col-sm-4 client-detailes-sub_heading">Professional permit</label>
                            <div>
								<input type="radio" name="edit_professional_permit" style="float:left" value="Yes">
								<span style="float:left">&nbsp;Yes</span>
								<input type="radio" name="edit_professional_permit" style="margin-left:10px;float:left" value="No" checked>
								<span style="float:left">&nbsp;No</span>
							</div>
                            
                        </div>
                        <div class="form-group td-area-form-marg" id="edit_professional_permit_date_field" style="display: none;margin-bottom:10px !important;">
                            <label class="col-sm-4 client-detailes-sub_heading">&nbsp;</label>
                            
                            <div class="col-sm-4 input-group date datepicker2" id="edit_professional_permit_date_datepicker">
                                <input class="form-control height_25" type="text" name="edit_professional_permit_date" id="edit_professional_permit_date"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="col-sm-4 client-detailes-sub_heading">Self employed permit</label>
                            <div>
								<input type="radio" name="edit_self_employed_permit" style="float:left" value="Yes">
								<span style="float:left">&nbsp;Yes</span>
								<input type="radio" name="edit_self_employed_permit" style="margin-left:10px;float:left" value="No" checked>
								<span style="float:left">&nbsp;No</span>
							</div>
                            
                        </div>
                        <div class="form-group td-area-form-marg" id="edit_self_employed_permit_date_field" style="display: none;margin-bottom:10px !important;">
                            <label class="col-sm-4 client-detailes-sub_heading">&nbsp;</label>
                            
                            <div class="col-sm-4 input-group date datepicker2" id="edit_self_employed_permit_date_datepicker">
                                <input class="form-control height_25" type="text" name="edit_self_employed_permit_date" id="edit_self_employed_permit_date"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="col-sm-4 client-detailes-sub_heading">Retired permit</label>
                        	<div>
								<input type="radio" name="edit_retired_permit" style="float:left" value="Yes">
								<span style="float:left">&nbsp;Yes</span>
								<input type="radio" name="edit_retired_permit" style="margin-left:10px;float:left" value="No" checked>
								<span style="float:left">&nbsp;No</span>
							</div>
                            
                        </div>
                        <div class="form-group td-area-form-marg" id="edit_retired_permit_date_field" style="display: none;margin-bottom:10px !important;">
                            <label class="col-sm-4 client-detailes-sub_heading">&nbsp;</label>
                        	
                            <div class="col-sm-4 input-group date datepicker2" id="edit_retired_permit_date_datepicker">
                                <input class="form-control height_25" type="text" name="edit_retired_permit_date" id="edit_retired_permit_date"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="col-sm-4 client-detailes-sub_heading">Permanent residence permit</label>
                            <div>
								<input type="radio" name="edit_permanent_residence_permit" style="float:left" value="Yes">
								<span style="float:left">&nbsp;Yes</span>
								<input type="radio" name="edit_permanent_residence_permit" style="margin-left:10px;float:left" value="No" checked>
								<span style="float:left">&nbsp;No</span>
							</div>	
                            
                        </div>
                        <div class="form-group td-area-form-marg" id="edit_permanent_residence_permit_date_field" style="display: none;margin-bottom:10px !important;">
                            <label class="col-sm-4 client-detailes-sub_heading">&nbsp;</label>
                            
                            <div class="col-sm-4 input-group date datepicker2" id="edit_permanent_residence_permit_date_datepicker">
                                <input class="form-control height_25" type="text" name="edit_permanent_residence_permit_date" id="edit_permanent_residence_permit_date"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <input type="hidden" id="edit_client_occupation_info_id" value="">
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
        
          $('input[name="investor_permit"]').on('click', function() {
        if ($(this).val() == 'Yes') {
            $("#investor_permit_date_field").show();
        }
        else {
            $("#investor_permit_date_field").hide();
            $('#investor_permit_date').val('');
        }
    });
      $('input[name="professional_permit"]').on('click', function() {
        if ($(this).val() == 'Yes') {
            $("#professional_permit_date_field").show();
        }
        else {
            $("#professional_permit_date_field").hide();
            $('#professional_permit_date').val('');
        }
    });
      $('input[name="self_employed_permit"]').on('click', function() {
        if ($(this).val() == 'Yes') {
           $("#self_employed_permit_date_field").show();
        }
        else {
            $("#self_employed_permit_date_field").hide();
            $('#self_employed_permit_date').val('');
        }
    });
      $('input[name="retired_permit"]').on('click', function() {
        if ($(this).val() == 'Yes') {
           $("#retired_permit_date_field").show();
        }
        else {
            $("#retired_permit_date_field").hide();
            $('#retired_permit_date').val('');
        }
    });
      $('input[name="permanent_residence_permit"]').on('click', function() {
        if ($(this).val() == 'Yes') {
            $("#permanent_residence_permit_date_field").show();
        }
        else {
            $("#permanent_residence_permit_date_field").hide();
            $('#permanent_residence_permit_date').val('');
        }
    });
    
     $('input[name="edit_investor_permit"]').on('click', function() {
        if ($(this).val() == 'Yes') {
            $("#edit_investor_permit_date_field").show();
        }
        else {
            $("#edit_investor_permit_date_field").hide();
            $('#edit_investor_permit_date').val('');
        }
    });
      $('input[name="edit_professional_permit"]').on('click', function() {
        if ($(this).val() == 'Yes') {
            $("#edit_professional_permit_date_field").show();
        }
        else {
            $("#edit_professional_permit_date_field").hide();
            $('#edit_professional_permit_date').val('');
        }
    });
      $('input[name="edit_self_employed_permit"]').on('click', function() {
        if ($(this).val() == 'Yes') {
           $("#edit_self_employed_permit_date_field").show();
        }
        else {
            $("#edit_self_employed_permit_date_field").hide();
            $('#edit_self_employed_permit_date').val('');
        }
    });
      $('input[name="edit_retired_permit"]').on('click', function() {
        if ($(this).val() == 'Yes') {
           $("#edit_retired_permit_date_field").show();
        }
        else {
            $("#edit_retired_permit_date_field").hide();
            $('#edit_retired_permit_date').val('');
        }
    });
      $('input[name="edit_permanent_residence_permit"]').on('click', function() {
        if ($(this).val() == 'Yes') {
            $("#edit_permanent_residence_permit_date_field").show();
        }
        else {
            $("#edit_permanent_residence_permit_date_field").hide();
            $('#edit_permanent_residence_permit_date').val('');
        }
    });
    
    
        $('#add-occupation-permit-info').on('shown.bs.modal', function () {
            $('#add_occupation_info').bootstrapValidator('resetForm', true);
        });
        $('#add_occupation_info').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                
                
            }
        })
                .on('success.form.bv', function (e) {
                    $('.btn-success').attr("disabled", "disabled");
                    e.preventDefault();
                    var comp = new Object();
                    comp.client_id = <?php echo $client_id;?>;
                    comp.investor_permit = $("input[name=investor_permit]:checked").val();
                    comp.investor_permit_date = $('#investor_permit_date').val();
                    comp.professional_permit = $("input[name=professional_permit]:checked").val();
                    comp.professional_permit_date = $('#professional_permit_date').val();
                    comp.self_employed_permit = $("input[name=self_employed_permit]:checked").val();
                    comp.self_employed_permit_date = $('#self_employed_permit_date').val();
                    comp.retired_permit = $("input[name=retired_permit]:checked").val();
                    comp.retired_permit_date = $('#retired_permit_date').val();
                    comp.permanent_residence_permit = $("input[name=permanent_residence_permit]:checked").val();
                    comp.permanent_residence_permit_date = $('#permanent_residence_permit_date').val();

                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/client/add_client_occupation_info',
                        dataType: "json",
                        data: $.param(comp),
                        beforeSend: function ()
                        {
                            $("#addloader").show();
                        },
                        success: function (data) {
                            $("#add-occupation-permit-info").modal("hide");
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {
                                   window.stop();
                                   window_location();
                                }
                                else
                                {
                                    $("#add-occupation-permit-info").modal("show");
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


        $('#edit_occupation_info').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                
            }
        })
                .on('success.form.bv', function (e) {
                    e.preventDefault();
            $('.btn-success').attr("disabled", "disabled");
                    var comp = new Object();
                    comp.client_occupation_info_id = $('#edit_client_occupation_info_id').val();
                    comp.investor_permit = $("input[name=edit_investor_permit]:checked").val();
                    comp.investor_permit_date = $('#edit_investor_permit_date').val();
                    comp.professional_permit = $("input[name=edit_professional_permit]:checked").val();
                    comp.professional_permit_date = $('#edit_professional_permit_date').val();
                    comp.self_employed_permit = $("input[name=edit_self_employed_permit]:checked").val();
                    comp.self_employed_permit_date = $('#edit_self_employed_permit_date').val();
                    comp.retired_permit = $("input[name=edit_retired_permit]:checked").val();
                    comp.retired_permit_date = $('#edit_retired_permit_date').val();
                    comp.permanent_residence_permit = $("input[name=edit_permanent_residence_permit]:checked").val();
                    comp.permanent_residence_permit_date = $('#edit_permanent_residence_permit_date').val();

                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/client/submit_edit_client_occupation_info',
                        dataType: "json",
                        data: $.param(comp),
                        beforeSend: function ()
                        {
                            $("#editloader").show();

                        },
                        success: function (data) {
                            $("#edit-occupation-permit-info").modal("hide");
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {

                                    window.stop();
                                   window_location();
                                }
                                else
                                {
                                    $("#edit-occupation-permit-info").modal("show");
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

    function edit_client_occupation_info(id) {
    var client_id = <?php echo $client_id;?>;
        var request = $.ajax({
            url: CURRENT_URL + '/client/edit_client_occupation_info',
            type: "POST",
            data: {client_id:client_id,client_occupation_info_id: id},
            dataType: "json"
        });
        request.done(function (msg) {
            $.each(msg, function (i, item) {
                $('#edit_client_occupation_info_id').val(item.client_occupation_info_id);
                $('input[name=edit_investor_permit][value=' + item.investor_permit + ']').prop('checked',true);
                 if(item.investor_permit=='Yes'){
                  $("#edit_investor_permit_date_field").show(); 
                }
                else{
                 $("#edit_investor_permit_date_field").hide();
                }
                $('#edit_investor_permit_date').val(item.investor_permit_date);
                $('#edit_investor_permit_date_datepicker').bdatepicker("update", item.investor_permit_date);
                $('input[name=edit_professional_permit][value=' + item.professional_permit + ']').prop('checked',true);
                if(item.professional_permit=='Yes'){
                  $("#edit_professional_permit_date_field").show(); 
                }
                else{
                 $("#edit_professional_permit_date_field").hide();
                }
                $('#edit_professional_permit_date').val(item.professional_permit_date);
                $('#edit_professional_permit_date_datepicker').bdatepicker("update", item.professional_permit_date);
                $('input[name=edit_self_employed_permit][value=' + item.self_employed_permit + ']').prop('checked',true);
                if(item.self_employed_permit=='Yes'){
                  $("#edit_self_employed_permit_date_field").show(); 
                }
                else{
                 $("#edit_self_employed_permit_date_field").hide();
                }
                $('#edit_self_employed_permit_date').val(item.self_employed_permit_date);
                $('#edit_self_employed_permit_date_datepicker').bdatepicker("update", item.self_employed_permit_date);
                $('input[name=edit_retired_permit][value=' + item.retired_permit + ']').prop('checked',true);
                if(item.retired_permit=='Yes'){
                  $("#edit_retired_permit_date_field").show(); 
                }
                else{
                 $("#edit_retired_permit_date_field").hide();
                }
                $('#edit_retired_permit_date').val(item.retired_permit_date);
                $('#edit_retired_permit_date_datepicker').bdatepicker("update", item.retired_permit_date);
                $('input[name=edit_permanent_residence_permit][value=' + item.permanent_residence_permit + ']').prop('checked',true);
                if(item.permanent_residence_permit=='Yes'){
                  $("#edit_permanent_residence_permit_date_field").show(); 
                }
                else{
                 $("#edit_permanent_residence_permit_date_field").hide();
                }
                $('#edit_permanent_residence_permit_date').val(item.permanent_residence_permit_date);
                $('#edit_permanent_residence_permit_date_datepicker').bdatepicker("update", item.permanent_residence_permit_date);
                
            });
        });
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    }

    function delete_client_occupation_info(id) {
        bootbox.confirm("Are you sure you want to delete occupation information?", function (result) {

            if (result == true) {

                var request = $.ajax({
                    url: CURRENT_URL + '/client/delete_client_occupation_info',
                    type: "POST",
                    data: {client_occupation_info_id: id},
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