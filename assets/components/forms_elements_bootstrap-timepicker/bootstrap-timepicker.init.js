$(function()
{
    /*
     * bootstrap-timepicker
     */
	 function calculateDiff(time1,time2)
	 {
	 
			var hours1 = time1.substring(0,2);
			var hours2=time2.substring(0,2);
			var minutes1= time1.substring(3,5);
			var minutes2 = time2.substring(3,5);
			var meridian1= time1.substring(6,8);
			var meridian2 = time2.substring(6,8);
			/* if(hours2==12)
				hours2=0;
				if(hours1==12)
					hours1=0; */
		
			if(meridian2=='PM' && meridian1=='AM')
				hours2= parseInt(hours2,10) + 12;
				
			    // console.log(hours1+" "+hours2+" "+minutes1+" "+minutes2+" "+meridian1+" "+meridian2);		
				var answer = (hours2-hours1)*60 + ( minutes2-minutes1);
				// console.log(answer);

				if(answer<=0){
					hrs='';
					mints='';
					$('#addtimeunits').val(hrs);
					$('#edittimeunits').val(hrs);
					$('#addtimeminutes').val(mints);
                    $('#edittimeminutes').val(mints);
					return answer;
				}
				else{
                    var mints = (answer%60);					
					if(mints==0){
						var mints = '0';
					}else{
						var mints =  mints;
					}
					$('#addtimeminutes').val(mints);
					$('#edittimeminutes').val(mints);

					var hours = Math.floor(answer/60);
                    // console.log(hours+'==='+answer);
					$('#addtimeunits').val(hours);
					$('#edittimeunits').val(hours);
					return answer;
				}
	
	 }
	 
	 
	 
$('#timepicker1').timepicker({
minuteStep: 15,
showSeconds: false,
showMeridian: false,
defaultTime: false
}).on('hide.timepicker', function(e) {
			var answer = calculateDiff( $('#timepicker1').val(), $('#timepicker6').val()); 				
			// $('#addtimeunits').val(answer/15);
			// $('#addtimeminutes').val(answer);
		    $('#add_timesheet_info').bootstrapValidator('revalidateField', 'time_units');
});


$('#timepicker6').timepicker({
minuteStep: 15,
showSeconds: false,
showMeridian: false,
defaultTime: false
}).on('hide.timepicker', function(e) {
	var answer = calculateDiff( $('#timepicker1').val(), $('#timepicker6').val()); 				
			// $('#addtimeunits').val(answer/15);
			// $('#addtimeminutes').val(answer);
            $('#add_timesheet_info').bootstrapValidator('revalidateField', 'time_units');
});


$('#timepicker2').timepicker({
minuteStep: 15,
showSeconds: false,
showMeridian: false,
defaultTime: false
}).on('hide.timepicker', function(e) {
			var answer = calculateDiff( $('#timepicker2').val(), $('#timepicker3').val()); 				
			//$('#edittimeunits').val(answer/15);
			//$('#edittimeminutes').val(answer);
		    $('#edit_timesheet_info').bootstrapValidator('revalidateField', 'edit_time_units');
});


$('#timepicker3').timepicker({
minuteStep: 15,
showSeconds: false,
showMeridian: false,
defaultTime: false
}).on('hide.timepicker', function(e) {
			var answer = calculateDiff($('#timepicker2').val(),$('#timepicker3').val()); 				
			// $('#edittimeunits').val(answer/15);
			// $('#edittimeminutes').val(answer);
            $('#edit_timesheet_info').bootstrapValidator('revalidateField', 'edit_time_units');

});
$('#timepicker4').timepicker({
	minuteStep: 1,
	secondStep: 5,
	showInputs: false,
	showSeconds: true,
	showMeridian: false
});
$('#timepicker5').timepicker({
	template: false,
	showInputs: false,
	minuteStep: 5
});

	

	
});