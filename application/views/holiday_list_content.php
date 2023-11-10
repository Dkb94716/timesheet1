<div class="col-lg-12" style="margin-top:20px;"> 
	<div class="col-sm-4"><h4></h4></div>
	<?php if ($userPrivileges->leave_management->setholidaylist->Add == 1) { ?>
		<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right">
			<a href="#modal-add" data-toggle="modal" class="btn-sm btn-warning pull-right" style="margin-left:8px;">Add Holiday</a>
		</div>
	<?php } ?>
</div>
<div class="innerLR" style="margin-top:60px;">
	<div class="widget widget-body-white widget-heading-simple">
		<div class="widget-body overflow-x" style="padding:10px;">
			<div class="year_select">
				<select class="selectpicker col-md-2"  data-style="btn-default" onchange="get_holiday_list_year(this.value)">
					<?php
					foreach (range(EARLIEST_YEAR, date('Y', strtotime('+1 year'))) as $x) {
						echo '<option value="' . $x . '"' . ($x == $holiday_date ? ' selected="selected"' : '') . '>' . $x . '</option>';
					}
					?>
				</select>
			</div>
			<table class="dynamicTable tableTools table table-striped overflow-x">
				<thead>
					<tr style="background-color:#c72a25; color:#FFF;">
						<th class="thead-th-padg">Date</th>
						<th class="thead-th-padg">Holiday Name</th>
						<th class="thead-th-padg"></th>
					</tr>
				</thead>
				<tbody>
				<?php
				if (!empty($holiday_detail)) {
					foreach ($holiday_detail as $holiday) {
				?>
					<tr class="gradeX">
						<td><span><?php echo '<span style="display:none">'.date("Ymd", strtotime($holiday->holiday_date_str)).'</span>'.$holiday->holiday_date_str; ?> </span></td>
						<td><span><?php echo $holiday->holiday_name; ?> </span></td>
						<td>						   
							<?php if ($userPrivileges->leave_management->setholidaylist->Edit == 1) { ?>
								<a href="#modal-edit" onclick="edit_holiday('<?php echo $holiday->holiday_id; ?>')" data-toggle="modal" class="btn-xs btn-success pull-right td-btn-marg-right">Edit</a>
							<?php }
							if ($userPrivileges->leave_management->setholidaylist->Delete == 1) {?>
								<a href="#nogo" class="btn-xs btn-danger pull-right td-btn-marg-right" onclick="delete_holiday('<?php echo $holiday->holiday_id; ?>')">Delete</a>
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
	</div>
</div>

<div class="modal fade"	 id="modal-add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">New Holiday</h3>
			</div>
			<!-- // Modal heading END -->

			<!-- Modal body -->
			<div class="modal-body">
				<div class="innerAll">
					<div class="innerLR">
						<form class="form-horizontal" role="form" id="addForm">
							
							<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
								<label class="client-detailes-sub_heading">Date</label>
								<div class="input-group date datepicker2" style="width:100%;">
									<input class="form-control height_25" name="holiday_date" id="holiday_date" placeholder="" type="text"/>
									<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
								</div>
							</div>
							<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
								<label class="client-detailes-sub_heading">Holiday Name</label>
								<input type="text" placeholder="Holiday Name" name="holiday_name" id="holiday_name" class="form-control height_25 plahole_font" style="width: 100%;">
							</div>
							
							<img id="addloader" src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" style="display:none;"/>

							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button class="btn btn-success pull-right">Save</button>
									<a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade"	 id="modal-edit">

	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal heading -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Edit Holiday</h3>
			</div>
			<!-- // Modal heading END -->

			<!-- Modal body -->
			<div class="modal-body">
				<div class="innerAll">
					<div class="innerLR">
						<form class="form-horizontal" role="form" id="editForm">
							
							<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
								<label class="client-detailes-sub_heading">Date</label>
								<div class="input-group date datepicker2" style="width:100%;">
									<input class="form-control height_25" name="edit_holiday_date" id="edit_holiday_date" placeholder="" type="text"/>
									<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
								</div>
							</div>
							<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
								<label class="client-detailes-sub_heading">Holiday Name</label>
								<input type="text" placeholder="Holiday Name" name="edit_holiday_name" id="edit_holiday_name" class="form-control height_25 plahole_font" style="width: 100%;">
							</div>
							<input type="hidden" name="edit_holiday_id" id="edit_holiday_id" value="">
							<img id="editloader" src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" style="display:none;"/>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button class="btn btn-success pull-right">Save</button>
									<a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- // Modal body END -->

		</div>
	</div>

</div>
<script>
	$(document).ready(function () {
        
        $('#modal-add').modal({
          backdrop: 'static',
          keyboard: true,
            show: false   
        })
        $('#modal-edit').modal({
          backdrop: 'static',
          keyboard: true,
            show: false   
        })
        
        
		$('#modal-add').on('shown.bs.modal', function () {
                   
                    $('.datepicker2').bdatepicker("update","<?php echo date('d F Y');?>");

                    
			$('#addForm').bootstrapValidator('resetForm', true);
                        
		});
		$('#addForm').bootstrapValidator({
			message: 'This value is not valid',
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				 holiday_date: {
					validators: {
						notEmpty: {
							message: 'The Holiday Date is required'
						}
					}
				},
				holiday_name: {
					validators: {
						notEmpty: {
							message: 'The Holiday Name is required'
						}
					}
				}
			}
		})
				.on('success.form.bv', function (e) {
					e.preventDefault();
					var data = $("#addForm").serialize();


					$.ajax({
						async: true,
						type: "POST",
						url: CURRENT_URL + '/holiday/add_holiday',
						dataType: "json",
						data: data,
						beforeSend: function ()
						{
							$("#addloader").show();
						},
						success: function (data) {
							$("#modal-add").modal("hide");
							bootbox.alert(data.message, function () {
								if (data.status == "SUCCESS")
								{
									location.reload();
								}
								else
								{
									$("#modal-add").modal("show");
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


		$('#editForm').bootstrapValidator({
			message: 'This value is not valid',
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				edit_holiday_date: {
					validators: {
						notEmpty: {
							message: 'The Holiday Date is required'
						}
					}
				},
				edit_holiday_name: {
					validators: {
						notEmpty: {
							message: 'The Holiday Name is required'
						}
					}
				}
			}
		})
				.on('success.form.bv', function (e) {
					e.preventDefault();

					var data = $("#editForm").serialize();

					$.ajax({
						async: true,
						type: "POST",
						url: CURRENT_URL + '/holiday/submit_edit_holiday',
						dataType: "json",
						data: data,
						beforeSend: function ()
						{
							$("#editloader").show();

						},
						success: function (data) {
							$("#modal-edit").modal("hide");
							bootbox.alert(data.message, function () {
								if (data.status == "SUCCESS")
								{

									window.stop();
									location.reload();
								}
								else
								{
									$("#modal-edit").modal("show");
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
	});

	function edit_holiday(id) {
		var request = $.ajax({
			url: CURRENT_URL + '/holiday/edit_holiday',
			type: "POST",
			data: {holiday_id: id},
			dataType: "json"
		});
		request.done(function (msg) {
			$.each(msg, function (i, item) {
				$('#edit_holiday_date').val(item.holiday_date_str);
				$('#edit_holiday_name').val(item.holiday_name);
				$('#edit_holiday_id').val(item.holiday_id);
			});
		});
		request.fail(function (jqXHR, textStatus) {
			alert("Request failed: " + textStatus);
		});
	}

	function delete_holiday(id) {
		bootbox.confirm("Are you sure you want to delete holiday?", function (result) {

			if (result == true) {

				var request = $.ajax({
					url: CURRENT_URL + '/holiday/delete_holiday',
					type: "POST",
					data: {holiday_id: id},
					dataType: "json"
				});
				request.done(function (data) {
					bootbox.alert(data.message, function () {
						if (data.status == "SUCCESS")
						{

							window.stop();
							location.reload();
						}


					});
				});
				request.fail(function (jqXHR, textStatus) {
					alert("Request failed: " + textStatus);
				});
			}
		});

	}
	function get_holiday_list_year(year)
					{
						<!--
						
					   window.location=CURRENT_URL + '/holiday/holiday_list/'+year;
					 
					//-->
					}
</script>