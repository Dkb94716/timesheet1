$(function()
{
	var bWizardTabClass = '';
	$('.wizard').each(function()
	{
		if ($(this).is('#rootwizard'))
			bWizardTabClass = 'bwizard-steps';
		else
			bWizardTabClass = '';

		var wiz = $(this);
		
		$(this).bootstrapWizard(
		{
			onNext: function(tab, navigation, index) 
			{
                            
                            
				if(index==1)
				{
                                       $('#addForm').bootstrapValidator('revalidateField', 'username1');
                                       $('#addForm').bootstrapValidator('revalidateField', 'employeeId');
                                      // $('#addForm').bootstrapValidator('revalidateField', 'user_image');
                                       //$('#addForm').bootstrapValidator('revalidateField', 'nationality');
                                      // $('#addForm').bootstrapValidator('revalidateField', 'country');
                                      // $('#addForm').bootstrapValidator('revalidateField', 'team');
                                       //$('#addForm').bootstrapValidator('revalidateField', 'department');
                                       $('#addForm').bootstrapValidator('revalidateField', 'emailId');
                                       $('#addForm').bootstrapValidator('revalidateField', 'accesslevel');
                                       $('#addForm').bootstrapValidator('revalidateField', 'user_image');
                                       var error_flag = $('#error_flag').text();
                                       
                                        if($('.form-group').hasClass('has-error')==false && error_flag=='0'){
                                // Make sure we entered the title
					if(!wiz.find('.inputTitle').val()) {
						//alert('You must enter the product title');
						wiz.find('.inputTitle').focus();
						//return false;
                                              // alert('a');
                                                return true;
					}
                                    }
                                    else{
                                       return false; 
                                    }
                                    
				}
                                else if(index==2)
				{
                                    
					//$('#addForm').bootstrapValidator('revalidateField', 'c_name1');
                                        //$('#addForm').bootstrapValidator('revalidateField', 'c_relationship1');
                                        $('#addForm').bootstrapValidator('revalidateField', 'c_tel_no1');
                                        $('#addForm').bootstrapValidator('revalidateField', 'c_tel_no2');
                                       
                                        if($('.form-group').hasClass('has-error')==false){
                                // Make sure we entered the title
					if(!wiz.find('.inputTitle').val()) {
						//alert('You must enter the product title');
						wiz.find('.inputTitle').focus();
						//return false;
                                              // alert('a');
                                                return true;
					}
                                    }
                                    else{
                                       return false; 
                                    }
				}
                                
                                else if(index==3)
				{
                                    
					//$('#addForm').bootstrapValidator('revalidateField', 'identity_card_passport');
                                        
                                       
                                        if($('.form-group').hasClass('has-error')==false){
                                // Make sure we entered the title
					if(!wiz.find('.inputTitle').val()) {
						//alert('You must enter the product title');
						wiz.find('.inputTitle').focus();
						//return false;
                                              // alert('a');
                                                return true;
					}
                                    }
                                    else{
                                       return false; 
                                    }
				}
			}, 
			onLast: function(tab, navigation, index) 
			{
				// Make sure we entered the title
				if(!wiz.find('.inputTitle').val()) {
					//alert('You must enter the product title');
					wiz.find('.inputTitle').focus();
					//return false;
                                         //alert('test');
                                         $(".primary").removeAttr('style');
                                        //  alert('c');
                                        return true;
				}
			}, 
			onTabClick: function(tab, navigation, index) 
			{
				// Make sure we entered the title
				if(!wiz.find('.inputTitle').val()) {
					//alert('You must enter the product title');
					wiz.find('.inputTitle').focus();
					//return false;
                                       //  alert('c');
                                        return true;
                                        
				}
			},
			onTabShow: function(tab, navigation, index) 
			{
				var $total = navigation.find('li:not(.status)').length;
				var $current = index+1;
				var $percent = ($current/$total) * 100;
				
				if (wiz.find('.progress-bar').length)
				{
					wiz.find('.progress-bar').css({width:$percent+'%'});
					wiz.find('.progress-bar')
						.find('.step-current').html($current)
						.parent().find('.steps-total').html($total)
						.parent().find('.steps-percent').html(Math.round($percent) + "%");
				}
				
				// update status
				if (wiz.find('.step-current').length) wiz.find('.step-current').html($current);
				if (wiz.find('.steps-total').length) wiz.find('.steps-total').html($total);
				if (wiz.find('.steps-complete').length) wiz.find('.steps-complete').html(($current-1));
				
				// mark all previous tabs as complete
				navigation.find('li:not(.status)').removeClass('primary');
				navigation.find('li:not(.status):lt('+($current-1)+')').addClass('primary');
	
				// If it's the last tab then hide the last button and show the finish instead
				if($current >= $total) {
					wiz.find('.pagination .next').hide();
					wiz.find('.pagination .finish').show();
					wiz.find('.pagination .finish').removeClass('disabled');
				} else {
					wiz.find('.pagination .next').show();
					wiz.find('.pagination .finish').hide();
				}
                                //alert('d');
                                $(".primary").removeAttr('style');
			},
			tabClass: bWizardTabClass,
			nextSelector: '.next', 
			previousSelector: '.previous',
			firstSelector: '.first', 
			lastSelector: '.last'
		});

		wiz.find('.finish').click(function() 
		{
			alert('Finished!, Starting over!');
			wiz.find("a[data-toggle*='tab']:first").trigger('click');
		});
	});
});