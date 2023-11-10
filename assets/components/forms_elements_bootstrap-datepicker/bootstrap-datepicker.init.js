if (typeof $.fn.bdatepicker == 'undefined')
	$.fn.bdatepicker = $.fn.datepicker.noConflict();

$(function()
{

	/* DatePicker */
	// default
	$(".datepicker1").bdatepicker({
		format: 'yyyy-mm-dd',
		 autoclose: true
		
	});

	// component
	$('.datepicker2').bdatepicker({
		format: "dd MM yyyy",
		 autoclose: true
	});

	// today button
	$('.datepicker3').bdatepicker({
		format: "dd MM yyyy",
		 autoclose: true,
		startDate: new Date(),
		todayBtn: true
	});

	// advanced
	$('.datetimepicker4').bdatepicker({
		format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true,
        startDate: new Date(),
        minuteStep: 10
	});
	
	// meridian
	$('.datetimepicker5').bdatepicker({
		format: "dd MM yyyy - HH:ii P",
	    showMeridian: true,
	    autoclose: true,
	    startDate: new Date(),
	    todayBtn: true
	});
        
        $('.datepicker6').bdatepicker({
		format: "dd MM yyyy",
		 autoclose: true,
                 endDate: '+0d'
	});
        
	// other
	if ($('.datepicker').length) $(".datepicker").bdatepicker({ showOtherMonths:true });
	if ($('.datepicker-inline').length) $('.datepicker-inline').bdatepicker({ inline: true, showOtherMonths:true });

});