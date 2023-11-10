
	//$(window).on('load', function()
	function initTables()
	{
		//console.log("datatables:"+$('#DataTables_Table_0_wrapper').length);
        if ($('#DataTables_Table_0_wrapper').length)
            return;

		function fnInitCompleteCallback(that)
		{console.log("hello");
			var p = that.parents('.dataTables_wrapper').first();
	    	var l = p.find('.row').find('label');

	    	l.each(function(index, el) {
	    		var iw = $("<div>").addClass('col-md-3').appendTo($(el).parent());
	    		$(el).parent().addClass('form-group margin-none').parent().addClass('form-horizontal');
	            $(el).find('input, select').addClass('form-control').removeAttr('size').appendTo(iw);
	            $(el).addClass('col-md-9 control-label');
	    	});

	    	//var s = p.find('select');
	    	//s.addClass('.selectpicker').selectpicker();
		}

		/* DataTables */
		if ($('.dynamicTable').size() > 0)
		{
			$('.dynamicTable').each(function()
			{
				//console.log("f size "+$('.dynamicTable').size());
				// DataTables with TableTools
				if ($(this).is('.tableTools'))
				{ 
					$(this).dataTable({
						"sPaginationType": "bootstrap",
						"sDom": "<'row separator bottom'<'col-md-5'T><'col-md-12'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
						"oLanguage": {
							"sLengthMenu": "_MENU_ Show"
						},
						"oTableTools": {
							"sSwfPath": componentsPath + "../plugins/tables_datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
					    },
//					    "aoColumnDefs": [
//				          { 'bSortable': false, 'aTargets': [ 0 ] }
//				       	],
				       	"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
					    "fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
				// colVis extras initialization
				else if ($(this).is('.colVis'))
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
						"sDom": "<'row separator bottom'<'col-md-3'f><'col-md-3'l><'col-md-6'C>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
						"oLanguage": {
							"sLengthMenu": "_MENU_ per page"
						},
						"oColVis": {
							"buttonText": "Show / Hide Columns",
							"sAlign": "right"
						},
						"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
						"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
				else if ($(this).is('.scrollVertical'))
				{
					$(this).dataTable({
						"bPaginate": false,
						"sScrollY": "200px",
						"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
				       	"sDom": "<'row separator bottom'<'col-md-12'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				       	"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
				else if ($(this).is('.ajax'))
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
						"bProcessing": true,
						"sAjaxSource": rootPath + 'admin/ajax/DataTables.json',
				       	"sDom": "<'row separator bottom'<'col-md-12'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				       	"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
				       	"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
				else if ($(this).is('.fixedHeaderColReorder'))
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
				       	"sDom": "R<'clear'><'row separator bottom'r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				       	"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
				       	"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
					    	var t = this;
					    	setTimeout(function(){
					    		new FixedHeader( t );
					    	}, 1000);
				        }
					});
				}
				// default initialization
				else
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
						"sDom": "<'row separator bottom'<'col-md-5'T><'col-md-3'l><'col-md-4'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
						"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
						"oLanguage": {
							"sLengthMenu": "_MENU_ per page"
						},
						"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
			});
		}
	//});
    }
    
    function initTables2()
	{
		//console.log("datatables:"+$('#DataTables_Table_0_wrapper').length);
        if ($('#DataTables_Table_0_wrapper').length)
            return;

		function fnInitCompleteCallback(that)
		{
			var p = that.parents('.dataTables_wrapper').first();
	    	var l = p.find('.row').find('label');

	    	l.each(function(index, el) {
	    		var iw = $("<div>").addClass('col-md-3').appendTo($(el).parent());
	    		$(el).parent().addClass('form-group margin-none').parent().addClass('form-horizontal');
	            $(el).find('input, select').addClass('form-control').removeAttr('size').appendTo(iw);
	            $(el).addClass('col-md-9 control-label');
	    	});

	    	//var s = p.find('select');
	    	//s.addClass('.selectpicker').selectpicker();
		}

		/* DataTables */
		if ($('.dynamicTable').size() > 0)
		{
			$('.dynamicTable').each(function()
			{
				//console.log("f size "+$('.dynamicTable').size());
				// DataTables with TableTools
				if ($(this).is('.tableTools'))
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
						"sDom": "<'row separator bottom'<'col-md-5'T><'col-md-12'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
						"oLanguage": {
							"sLengthMenu": "_MENU_ Show"
						},
						"oTableTools": {
							"sSwfPath": componentsPath + "../plugins/tables_datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
					    },
					    "aoColumnDefs": [
				          { 'bSortable': false, 'aTargets': [ 0 ] },
                                          { 'bSortable': false, 'aTargets': [ 1 ] },
                                          { 'bSortable': false, 'aTargets': [ 2 ] }
                                          
				       	],
                                        "bSort" : false,
				       	"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
					    "fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
				// colVis extras initialization
				else if ($(this).is('.colVis'))
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
						"sDom": "<'row separator bottom'<'col-md-3'f><'col-md-3'l><'col-md-6'C>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
						"oLanguage": {
							"sLengthMenu": "_MENU_ per page"
						},
						"oColVis": {
							"buttonText": "Show / Hide Columns",
							"sAlign": "right"
						},
						"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
						"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
				else if ($(this).is('.scrollVertical'))
				{
					$(this).dataTable({
						"bPaginate": false,
						"sScrollY": "200px",
						"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
				       	"sDom": "<'row separator bottom'<'col-md-12'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				       	"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
				else if ($(this).is('.ajax'))
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
						"bProcessing": true,
						"sAjaxSource": rootPath + 'admin/ajax/DataTables.json',
				       	"sDom": "<'row separator bottom'<'col-md-12'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				       	"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
				       	"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
				else if ($(this).is('.fixedHeaderColReorder'))
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
				       	"sDom": "R<'clear'><'row separator bottom'r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				       	"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
				       	"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
					    	var t = this;
					    	setTimeout(function(){
					    		new FixedHeader( t );
					    	}, 1000);
				        }
					});
				}
				// default initialization
				else
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
						"sDom": "<'row separator bottom'<'col-md-5'T><'col-md-3'l><'col-md-4'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
						"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
						"oLanguage": {
							"sLengthMenu": "_MENU_ per page"
						},
						"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
			});
		}
	//});
    }
	
         function initTables3()
	{
		//console.log("datatables:"+$('#DataTables_Table_0_wrapper').length);
        if ($('#DataTables_Table_0_wrapper').length)
            return;

		function fnInitCompleteCallback(that)
		{
			var p = that.parents('.dataTables_wrapper').first();
	    	var l = p.find('.row').find('label');

	    	l.each(function(index, el) {
	    		var iw = $("<div>").addClass('col-md-3').appendTo($(el).parent());
	    		$(el).parent().addClass('form-group margin-none').parent().addClass('form-horizontal');
	            $(el).find('input, select').addClass('form-control').removeAttr('size').appendTo(iw);
	            $(el).addClass('col-md-9 control-label');
	    	});

	    	//var s = p.find('select');
	    	//s.addClass('.selectpicker').selectpicker();
		}

		/* DataTables */
		if ($('.dynamicTable').size() > 0)
		{
			$('.dynamicTable').each(function()
			{
				//console.log("f size "+$('.dynamicTable').size());
				// DataTables with TableTools
				if ($(this).is('.tableTools'))
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
						"sDom": "<'row separator bottom'<'col-md-5'T><'col-md-12'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
						"oLanguage": {
							"sLengthMenu": "_MENU_ Show"
						},
						"oTableTools": {
							"sSwfPath": componentsPath + "../plugins/tables_datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
					    },
					    "aoColumnDefs": [
				          { 'bSortable': false, 'aTargets': [ 0 ] },
                                          { 'bSortable': false, 'aTargets': [ 1 ] },
                                           { 'bSortable': false, 'aTargets': [ 2 ] },
                                          { 'bSortable': false, 'aTargets': [ 3 ] },
                                          { 'bSortable': false, 'aTargets': [ 4 ] }
                                          
				       	],
                                        "bSort" : false,
				       	"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
					    "fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
				// colVis extras initialization
				else if ($(this).is('.colVis'))
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
						"sDom": "<'row separator bottom'<'col-md-3'f><'col-md-3'l><'col-md-6'C>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
						"oLanguage": {
							"sLengthMenu": "_MENU_ per page"
						},
						"oColVis": {
							"buttonText": "Show / Hide Columns",
							"sAlign": "right"
						},
						"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
						"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
				else if ($(this).is('.scrollVertical'))
				{
					$(this).dataTable({
						"bPaginate": false,
						"sScrollY": "200px",
						"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
				       	"sDom": "<'row separator bottom'<'col-md-12'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				       	"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
				else if ($(this).is('.ajax'))
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
						"bProcessing": true,
						"sAjaxSource": rootPath + 'admin/ajax/DataTables.json',
				       	"sDom": "<'row separator bottom'<'col-md-12'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				       	"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
				       	"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
				else if ($(this).is('.fixedHeaderColReorder'))
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
				       	"sDom": "R<'clear'><'row separator bottom'r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				       	"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
				       	"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
					    	var t = this;
					    	setTimeout(function(){
					    		new FixedHeader( t );
					    	}, 1000);
				        }
					});
				}
				// default initialization
				else
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
						"sDom": "<'row separator bottom'<'col-md-5'T><'col-md-3'l><'col-md-4'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
						"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
						"oLanguage": {
							"sLengthMenu": "_MENU_ per page"
						},
						"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
			});
		}
	//});
    }
    
    function initTablesForDB(data)
	{
		//console.log("datatables:"+$('#DataTables_Table_0_wrapper').length);
//        if ($('#DataTables_Table_0_wrapper').length)
//            return;

		function fnInitCompleteCallback(that)
		{
			var p = that.parents('.dataTables_wrapper').first();
	    	var l = p.find('.row').find('label');

	    	l.each(function(index, el) {
	    		var iw = $("<div>").addClass('col-md-3').appendTo($(el).parent());
	    		$(el).parent().addClass('form-group margin-none').parent().addClass('form-horizontal');
	            $(el).find('input, select').addClass('form-control').removeAttr('size').appendTo(iw);
	            $(el).addClass('col-md-9 control-label');
	    	});

	    	//var s = p.find('select');
	    	//s.addClass('.selectpicker').selectpicker();
		}

		/* DataTables */
		if ($('.'+data).size() > 0)
		{

			$('.'+data).each(function()
			{
				//console.log("f size "+$('.dynamicTable').size());
				// DataTables with TableTools
//				if ($(this).is('.tableTools'))
//				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
                                                // for flash button.
//						"sDom": "<'row separator bottom'<'col-md-5'T><'col-md-12'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
						"sDom": "<'row separator bottom'<'col-md-12'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
						"oLanguage": {
							"sLengthMenu": "_MENU_ Show"
						},
						"oTableTools": {
							"sSwfPath": componentsPath + "../plugins/tables_datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
					    },
//					    "aoColumnDefs": [
//				          { 'bSortable': false, 'aTargets': [ 0 ] }
//				       	],
				       	"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
					    "fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				//}
//				// colVis extras initialization
//				else if ($(this).is('.colVis'))
//				{
//                                    console.log(dataTable+'//hi1')
//
//					$(this).dataTable({
//						"sPaginationType": "bootstrap",
//						"sDom": "<'row separator bottom'<'col-md-3'f><'col-md-3'l><'col-md-6'C>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
//						"oLanguage": {
//							"sLengthMenu": "_MENU_ per page"
//						},
//						"oColVis": {
//							"buttonText": "Show / Hide Columns",
//							"sAlign": "right"
//						},
//						"sScrollX": "100%",
//				       	"sScrollXInner": "100%",
//				        "bScrollCollapse": true,
//						"fnInitComplete": function () {
//					    	fnInitCompleteCallback(this);
//				        }
//					});
//				}
//				else if ($(this).is('.scrollVertical'))
//				{
//                                                                        console.log(dataTable+'//hi2')
//
//					$(this).dataTable({
//						"bPaginate": false,
//						"sScrollY": "200px",
//						"sScrollX": "100%",
//				       	"sScrollXInner": "100%",
//				        "bScrollCollapse": true,
//				       	"sDom": "<'row separator bottom'<'col-md-12'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
//				       	"fnInitComplete": function () {
//					    	fnInitCompleteCallback(this);
//				        }
//					});
//				}
//				else if ($(this).is('.ajax'))
//				{
//                                                                        console.log(dataTable+'//hi3')
//
//					$(this).dataTable({
//						"sPaginationType": "bootstrap",
//						"bProcessing": true,
//						"sAjaxSource": rootPath + 'admin/ajax/DataTables.json',
//				       	"sDom": "<'row separator bottom'<'col-md-12'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
//				       	"sScrollX": "100%",
//				       	"sScrollXInner": "100%",
//				        "bScrollCollapse": true,
//				       	"fnInitComplete": function () {
//					    	fnInitCompleteCallback(this);
//				        }
//					});
//				}
//				else if ($(this).is('.fixedHeaderColReorder'))
//				{
//                                                                        console.log(dataTable+'//hi4')
//
//					$(this).dataTable({
//						"sPaginationType": "bootstrap",
//				       	"sDom": "R<'clear'><'row separator bottom'r>t<'row'<'col-md-6'i><'col-md-6'p>>",
//				       	"sScrollX": "100%",
//				       	"sScrollXInner": "100%",
//				        "bScrollCollapse": true,
//				       	"fnInitComplete": function () {
//					    	fnInitCompleteCallback(this);
//					    	var t = this;
//					    	setTimeout(function(){
//					    		new FixedHeader( t );
//					    	}, 1000);
//				        }
//					});
//				}
//				// default initialization
//				else
//				{
//                                                                        console.log(dataTable+'//hi4')
//
//					$(this).dataTable({
//						"sPaginationType": "bootstrap",
//						"sDom": "<'row separator bottom'<'col-md-5'T><'col-md-3'l><'col-md-4'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
//						"sScrollX": "100%",
//				       	"sScrollXInner": "100%",
//				        "bScrollCollapse": true,
//						"oLanguage": {
//							"sLengthMenu": "_MENU_ per page"
//						},
//						"fnInitComplete": function () {
//					    	fnInitCompleteCallback(this);
//				        }
//					});
//				}
			});
		}
	//});
    }
    
    function initTablesTimesheet()
	{
		//console.log("datatables:"+$('#DataTables_Table_0_wrapper').length);
        if ($('#DataTables_Table_0_wrapper').length)
            return;

		function fnInitCompleteCallback(that)
		{
			var p = that.parents('.dataTables_wrapper').first();
	    	var l = p.find('.row').find('label');

	    	l.each(function(index, el) {
	    		var iw = $("<div>").addClass('col-md-3').appendTo($(el).parent());
	    		$(el).parent().addClass('form-group margin-none').parent().addClass('form-horizontal');
	            $(el).find('input, select').addClass('form-control').removeAttr('size').appendTo(iw);
	            $(el).addClass('col-md-9 control-label');
	    	});

	    	//var s = p.find('select');
	    	//s.addClass('.selectpicker').selectpicker();
		}

		/* DataTables */
		if ($('.dynamicTable').size() > 0)
		{
			$('.dynamicTable').each(function()
			{
				//console.log("f size "+$('.dynamicTable').size());
				// DataTables with TableTools
				if ($(this).is('.tableTools'))
				{ 
					$(this).dataTable({
						"sPaginationType": "bootstrap",
						"sDom": "<'row separator bottom'<'col-md-5'T><'col-md-12'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
						"oLanguage": {
							"sLengthMenu": "_MENU_ Show"
						},
						"oTableTools": {
							"sSwfPath": componentsPath + "../plugins/tables_datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
					    },
//					    "aoColumnDefs": [
//				          { 'bSortable': false, 'aTargets': [ 0 ] }
//				       	],
				       	"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
					    "fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        },
                                        "aoColumns": [
				          null,
                                          null,
                                          { 'bSortable': true},
                                          { 'bSortable': true},
                                          null,
                                          null,
                                          null,
                                          null
                                          
				       	]
					});
				}
				// colVis extras initialization
				else if ($(this).is('.colVis'))
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
						"sDom": "<'row separator bottom'<'col-md-3'f><'col-md-3'l><'col-md-6'C>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
						"oLanguage": {
							"sLengthMenu": "_MENU_ per page"
						},
						"oColVis": {
							"buttonText": "Show / Hide Columns",
							"sAlign": "right"
						},
						"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
						"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
				else if ($(this).is('.scrollVertical'))
				{
					$(this).dataTable({
						"bPaginate": false,
						"sScrollY": "200px",
						"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
				       	"sDom": "<'row separator bottom'<'col-md-12'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				       	"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
				else if ($(this).is('.ajax'))
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
						"bProcessing": true,
						"sAjaxSource": rootPath + 'admin/ajax/DataTables.json',
				       	"sDom": "<'row separator bottom'<'col-md-12'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				       	"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
				       	"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
				else if ($(this).is('.fixedHeaderColReorder'))
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
				       	"sDom": "R<'clear'><'row separator bottom'r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				       	"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
				       	"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
					    	var t = this;
					    	setTimeout(function(){
					    		new FixedHeader( t );
					    	}, 1000);
				        }
					});
				}
				// default initialization
				else
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
						"sDom": "<'row separator bottom'<'col-md-5'T><'col-md-3'l><'col-md-4'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
						"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
						"oLanguage": {
							"sLengthMenu": "_MENU_ per page"
						},
						"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
			});
		}
	//});
    }
function initTablesLeave()
	{
		//console.log("datatables:"+$('#DataTables_Table_0_wrapper').length);
        if ($('#DataTables_Table_0_wrapper').length)
            return;

		function fnInitCompleteCallback(that)
		{
			var p = that.parents('.dataTables_wrapper').first();
	    	var l = p.find('.row').find('label');

	    	l.each(function(index, el) {
	    		var iw = $("<div>").addClass('col-md-3').appendTo($(el).parent());
	    		$(el).parent().addClass('form-group margin-none').parent().addClass('form-horizontal');
	            $(el).find('input, select').addClass('form-control').removeAttr('size').appendTo(iw);
	            $(el).addClass('col-md-9 control-label');
	    	});

	    	//var s = p.find('select');
	    	//s.addClass('.selectpicker').selectpicker();
		}

		/* DataTables */
		if ($('.dynamicTable').size() > 0)
		{
			$('.dynamicTable').each(function()
			{
				//console.log("f size "+$('.dynamicTable').size());
				// DataTables with TableTools
				if ($(this).is('.tableTools'))
				{ 
					$(this).dataTable({
						"sPaginationType": "bootstrap",
						"sDom": "<'row separator bottom'<'col-md-5'T><'col-md-12'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
						"oLanguage": {
							"sLengthMenu": "_MENU_ Show"
						},
						"oTableTools": {
							"sSwfPath": componentsPath + "../plugins/tables_datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
					    },
//					    "aoColumnDefs": [
//				          { 'bSortable': false, 'aTargets': [ 0 ] }
//				       	],
				       	"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
					    "fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        },
                                        "aoColumns": [
				          null,
                                          null,
                                          null,
                                          null,
                                          null,
                                          null,
                                          null,
                                          { 'bSortable': true},
                                          null,
                                          null
                                          
				       	]
					});
				}
				// colVis extras initialization
				else if ($(this).is('.colVis'))
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
						"sDom": "<'row separator bottom'<'col-md-3'f><'col-md-3'l><'col-md-6'C>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
						"oLanguage": {
							"sLengthMenu": "_MENU_ per page"
						},
						"oColVis": {
							"buttonText": "Show / Hide Columns",
							"sAlign": "right"
						},
						"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
						"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
				else if ($(this).is('.scrollVertical'))
				{
					$(this).dataTable({
						"bPaginate": false,
						"sScrollY": "200px",
						"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
				       	"sDom": "<'row separator bottom'<'col-md-12'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				       	"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
				else if ($(this).is('.ajax'))
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
						"bProcessing": true,
						"sAjaxSource": rootPath + 'admin/ajax/DataTables.json',
				       	"sDom": "<'row separator bottom'<'col-md-12'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				       	"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
				       	"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
				else if ($(this).is('.fixedHeaderColReorder'))
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
				       	"sDom": "R<'clear'><'row separator bottom'r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				       	"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
				       	"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
					    	var t = this;
					    	setTimeout(function(){
					    		new FixedHeader( t );
					    	}, 1000);
				        }
					});
				}
				// default initialization
				else
				{
					$(this).dataTable({
						"sPaginationType": "bootstrap",
						"sDom": "<'row separator bottom'<'col-md-5'T><'col-md-3'l><'col-md-4'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
						"sScrollX": "100%",
				       	"sScrollXInner": "100%",
				        "bScrollCollapse": true,
						"oLanguage": {
							"sLengthMenu": "_MENU_ per page"
						},
						"fnInitComplete": function () {
					    	fnInitCompleteCallback(this);
				        }
					});
				}
			});
		}
	//});
    }