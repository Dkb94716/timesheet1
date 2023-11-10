

function submitLoginSha(password,md5KeyValue)
{   	
	//added for CR 5034 - begin.
	//added for CR 5034 - end.
	//	var regexp = new RegExp("\\d{19}");
	    var md5keystring = md5KeyValue;//document.quickLookForm.md5key.value ;
       // var md5keystring = document.quickLookForm.md5key.value ;
		var encSaltPass=encryptSha2LoginPassword(md5keystring,password);
			return encSaltPass;
		
	}
