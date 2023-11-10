<div style="margin-bottom: 5px; float: right; margin-right:15px; margin-top:24px; cursor: pointer;">
  <?php if ($userPrivileges->administration_control->project_expense->PrintReport == 1) {  ?>
    <a href="#nogo" Title="Print"> <img src="<?php echo base_url(); ?>assets/images/print-load.png" onclick="PrintDiv();"> </a>
  <?php } ?>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="widget" style="background: #eaeaea !important;">
    <div class="widget-body left" style="padding:10px; padding-top:0px;">
      <form class="form-horizontal">
        <div class="widget-head filter-text">
          <h4 class="heading" style="clear: both; margin-left: -8px;">Expense Of Project:</h4>
        </div>
        <div class="widget-body left" style="padding:10px; padding-left: 0px;">
          <div class="form-group">
            <label class="col-sm-1 control-label" style="text-align: left; margin-bottom:10px;">Client</label>
            <div class="col-sm-3">
              <select name="clientId" onchange="get_project(this.value, 'client_project_name')" id="clientId" class="form-control" style="height:25px; padding:0px;">
                <option disabled selected value="">Select Client</option>
                <?php foreach ($client_detail as $cl_detail) { ?>
                  <option value="<?php echo $cl_detail->client_name; ?>"><?php echo $cl_detail->client_name; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-1 control-label" style="text-align: left; margin-bottom:10px;">Project</label>
            <div class="col-sm-3">
              <select name="client_project_name" id="client_project_name" class="form-control" style="height:25px; padding:0px;">
                <option disabled selected>Select Project</option>
              </select>
            </div>
          </div>
          <div class="input-group col-md-12">
            <button type="button" class="btn-xs btn-success pull-left" name="submit" id="filter" style="margin-right: 10px;margin-left: 18px;">Filter</button>
            <button type="reset" class="btn-xs btn-success pull-left" name="reset" id="reset">Reset</button>

          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div id="show_list_container" class="col-lg-12" style="margin-top:20px; display:none">
  <div class="col-sm-4">
    <h4></h4>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 pull-right">
    <?php if ($userPrivileges->administration_control->project_expense->Add == 1) { ?>
      <a href="#modal-add" data-toggle="modal" class="btn-sm btn-warning pull-right" style="margin-left:8px;" onclick="get_expense_list()">Add New Expense</a>
      <!-- <a href="#modal-add-manager" data-toggle="modal" class="btn-sm btn-warning pull-right" style="margin-left:8px;">Add Manager</a> -->
      <!-- <a href="#modal-edit-manager" data-toggle="modal" class="btn-sm btn-warning pull-right" style="margin-left:8px;">Edit Manager</a> -->
  </div>
<?php } ?>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="widget widget-body-white widget-heading-simple">
    <div class="widget-body overflow-x" style="  background: #eaeaea !important;">
      <div class=" col-md-12" style="padding:0px; margin-top: 10px; margin-bottom: 20px;">
        <span style="font-size:12px;  width:95px !important; float:left; margin-right: 15px;" colspan="7">
          <?php if ($user_logo[0]->company_logo) {  ?>
            <img src="<?php echo base_url();  ?>uploads/company/<?php echo $user_logo[0]->company_logo; ?>" style=" margin-top:-3px; width:95px;" class="pull-right" />
          <?php  } else { ?>
            <img src="<?php echo base_url();  ?>assets/img/ANEX-LOGO.png" style=" margin-top:-3px; width:95px;" class="pull-right" />
          <?php } ?>
        </span>
        <span style="font-size:16px; float: left;margin-top: -5px;" colspan="8">Clavis Technologies</span>
      </div>
      <!-- <div class=" col-md-12" style="padding:0px; margin-top: 10px; margin-bottom: 20px;">
          <span style="font-size:16px; float: left;margin-top: -5px;" colspan="8">Total Estimate Cost:</span>
      </div>
      <div class=" col-md-12" style="padding:0px; margin-top: 10px; margin-bottom: 20px;">
          <span style="font-size:16px; float: left;margin-top: -5px;" colspan="8">Month Wise Development Cost:</span>
      </div> -->
      <table style="width:100%;">
        <thead class="bg-gray" id="div-to-print">
          <tr>
            <th style="font-size:11px;  width:70px !important;">Month</th>
            <th style="font-size:11px;  width:70px !important;">Year</th>
            <th style="font-size:11px;  width:70px !important;">Amount</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Add Expense</h3>
      </div>
      <!-- // Modal heading END -->

      <!-- Modal body -->
      <div class="modal-body">
        <div class="innerAll">
          <div class="innerLR">
            <form class="form-horizontal" role="form" id="addForm">
              <div class="form-group">
                <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Project</label>
                <div class="col-sm-7">
                  <!-- <input type="text" class="form-control" name="project_name" id="project_name" maxlength="200"  placeholder="Project Name"> -->
                  <select class="form-control" name="project_name" id="project_name">
                    <option value="">Select</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label" style="text-align: left;">Expense Type</label>
                <div class="col-sm-7">
                  <div class="input-group" style="width:100%;">
                    <input class="form-control" type="text" name="expense_type" id="expense_type" list="expense" placeholder="Type here...">
                    <span class="input-group-addon padding_3" title="Add Expensse" style="cursor:pointer;font: size 20px;" onclick="show_expense()"><i class="fa fa-plus-circle"></i></span>
                    <datalist id="expense"></datalist>
                  </div>
                  <div class="input-group" id="expense_div" style="width:100%; display:none;margin-top:10px;">
                    <input class="form-control height_25" type="text" name="expense_name" id="expense_name" placeholder="Expense Name">
                    <span class="input-group-addon padding_3" title="Save Expensse" style="cursor:pointer;font: size 20px;" onclick="add_expense()">Save</span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Expense Amount</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="expense_amount" id="expense_amount" maxlength="200" placeholder="Expense Amount">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label" style="text-align: left;">Expense Date </label>
                <div class="col-sm-7">
                  <div class="input-group date datepicker2" style="width:100%;">
                    <input class="form-control height_25" type="text" name="expense_date" id="expense_date" data-bv-field="project_start_date">
                    <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                  </div><i class="form-control-feedback bv-icon-input-group" data-bv-icon-for="expense_date" style="display: none;"></i>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Remark</label>
                <div class="col-sm-7">
                  <textarea type="text" name="remark" id="remark" placeholder="Descriptions..." maxlength="255" class="form-control plahole_font" rows="7" style="resize: vertical;" data-bv-field="comments"></textarea><i class="form-control-feedback" data-bv-icon-for="comments" style="display: none;"></i>
                  (Limit 255 characters.)
                </div>
              </div>
              <img id="addloader" src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" style="display:none;margin-left: 200px;" />
              <div class="form-group">
                <div class="col-sm-offset-1 col-sm-10">
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

<script>
  $(document).ready(function() {

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

    $('#modal-add').on('shown.bs.modal', function() {
      $('#addForm').bootstrapValidator('resetForm', true);
      $('.btn-success').removeAttr("disabled");
      $('#client_id').prop('selectedIndex', 0);
      $('#currency_id').prop('selectedIndex', 0);
    });
    $('#addForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
          project_name: {
            validators: {
              notEmpty: {
                message: 'This field is required.'
              }
            }
          },
          expense_type: {
            validators: {
              notEmpty: {
                message: 'Expense Type is required'
              }
            }
          },
          expense_amount: {
            validators: {
              notEmpty: {
                message: 'This field is required'
              }
            }
          },
        }
      })
      .on('success.form.bv', function(e) {
        e.preventDefault();
        $('.btn-success').attr("disabled", "disabled");
        var project_id = $('#project_name').val();
        var expense_type = $('#expense_type').val();
        var expense_amount = $('#expense_amount').val();
        var expense_date = $('#expense_date').val();
        var remark = $('#remark').val();
        $.ajax({
          async: true,
          type: "POST",
          url: CURRENT_URL + '/report/add_project_wise_expense',
          dataType: "json",
          data: {
            project_id: project_id,
            expense_type: expense_type,
            expense_amount: expense_amount,
            expense_date: expense_date,
            remark: remark
          },
          beforeSend: function() {
            $("#addloader").show();
          },
          success: function(data) {
            bootbox.alert(data.message, function() {
              if (data.status == "SUCCESS") {
                $("#modal-add").modal("hide");
                $("#filter").trigger("click");
                // location.reload();
              } else {
                $('.btn-success').removeAttr("disabled");
              }

            });

          },
          error: function(xhr, status, error) {
            bootbox.alert(status);
          },
          complete: function() {
            $("#addloader").hide();
          }
        });
      });

    initTables();

    $('#filter').click(function() {
      var obj = new Object();
      obj.clientId = $('#clientId').val();
      obj.projectId = $('#client_project_name').val();
      if (!obj.clientId) {
        alert('Please select client');
        return false;
      }
      if (!obj.projectId) {
        alert('Please select project');
        return false;
      }
      if (obj.clientId && obj.projectId) {
        $("#show_list_container").show();
      }
      var request = $.ajax({
        url: CURRENT_URL + '/report/submit_project_expense_report',
        type: "POST",
        data: $.param(obj),
        dataType: "html"
      });
      request.done(function(msg) {
        $('#div-to-print').html(msg);
      });
      request.fail(function(jqXHR, textStatus) {
        alert("Request failed: " + textStatus);
      });
    });
  });

  function get_project(client_name, id) {
    var request = $.ajax({
      url: CURRENT_URL + '/project/get_project_assign_client',
      type: "POST",
      data: {
        client_name: client_name
      },
      dataType: "html"
    });
    request.done(function(data) {
      $('#' + id).html(data);
      $('#project_name').html(data);
      $("#show_list_container").hide();
    });
    request.fail(function(jqXHR, textStatus) {
      alert("Request failed: " + textStatus);
    });
  }

  function PrintDiv() {
    var divToPrint = document.getElementById('div-to-print');
    var popupWin = window.open('', '_blank', 'width=800,height=500,left=200px, top=200px');
    popupWin.document.write('<html><head><title></title>');
    popupWin.document.write('<style type="text/css" media="print"> @page { size: landscape; }  body { writing-mode: tb-rl;}</style>');
    popupWin.document.write('<style>table thead  tr  th, .table  tbody  tr  th, .table  tfoot  tr  th, .table  thead  tr  td, .table  tbody  tr  td, .table  tfoot  tr  td { border-top-color: #000 !important; padding: 2px !important; }</style>');
    popupWin.document.write('<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin/module.admin.stylesheet-complete.min.css" type="text/css" />');
    popupWin.document.write('<style type="text/css">.test { color:red; } </style></head><body>');
    popupWin.document.write('<div><img src="<?php echo base_url(); ?>assets/img/ANEX-LOGO.png" alt="SMART"></div>');

    <?php if ($user_logo[0]->company_logo) {  ?>
      popupWin.document.write('<div><img src="<?php echo base_url(); ?>uploads/company/<?php echo $user_logo[0]->company_logo; ?>" alt="SMART" style="margin-top:-3px; width:30px; height:30px;"> ANEX MANAGEMENT SERVICES LIMITED</div>');
    <?php } else { ?>
      popupWin.document.write('<div><img src="<?php echo base_url(); ?>assets/images/people/80/22.png" style=" margin-top:-3px; width:30px; height:30px;" alt="SMART">  ANEX MANAGEMENT SERVICES LIMITED</div>');
    <?php } ?>
    popupWin.document.write('<div style="margin-top: 15px; margin-bottom: 15px;">&nbsp;</div>');
    popupWin.document.write(divToPrint.innerHTML);
    popupWin.document.write('</body></html>');
    popupWin.document.close();
    popupWin.print();
  }

  function show_expense() {
    $("#expense_div").show();
    $("#expense_name").val("");
  }
  function add_expense() {
    var expense_name = $('#expense_name').val();
    if (!expense_name) {
        alert('Please write expense name');
        return false;
    }
    $.ajax({
      async: true,
      type: "POST",
      url: CURRENT_URL + '/report/add_expense',
      dataType: "json",
      data: {expense_name: expense_name},
      beforeSend: function() {
        $("#addloader").show();
      },
      success: function(data) {
        bootbox.alert(data.message, function() {
          if (data.status == "SUCCESS") {
            $("#expense_div").hide();
            $("#filter").trigger("click");
            get_expense_list();
          } else {
            $('.btn-success').removeAttr("disabled");
          }
        });
      },
      error: function(xhr, status, error) {
        bootbox.alert(status);
      },
      complete: function() {
        $("#addloader").hide();
      }
    });
  }
  function get_expense_list() {
    $("#expense_div").hide();
    var request = $.ajax({
      url: CURRENT_URL + '/report/get_expense_list',
      type: "POST",
      data: {
      }
    });
    request.done(function(msg) {
      $("#expense").empty();
      $('#expense').append(msg);
    });
    request.fail(function(jqXHR, textStatus) {
      alert("Request failed: " + textStatus);
    });
  }
</script>