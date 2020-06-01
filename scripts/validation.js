jQuery(document).ready(function(){
	$(".pass-validation").hide();
	$('input[type="email"]').keyup(function(value){	
		console.log( validateEmail($(this).val()));
	    if (validateEmail($(this).val()))
		{
			$(this).addClass("valid");
			$(this).removeClass("non-valid");
		}
		else
		{			
			$(this).addClass("non-valid");
			$(this).removeClass("valid");
		}

	});

	$(".digits").keypress(function (e) {
		//if the letter is not digit then display error and don't type anything
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
		    return false;
		}
	});

	$("#repeat_password").keyup(function (e) {		

		if($("#repeat_password").val() != $("#new_password").val())
		{
			$(this).addClass("non-valid");
			$(this).removeClass("valid");
			
			$(".pass-validation").text("Password Mismatch!");
			$(".pass-validation").show();
		}
		else
		{
			$(this).addClass("valid");
			$(this).removeClass("non-valid");
			$(".pass-validation").hide();
		}
	});

	$('.validation_text').keyup(function(value){	
	    if($(this).val() == "")
		{
			$(this).addClass("non-valid");
			$(this).removeClass("valid");
		}
		else
		{	
			$(this).addClass("valid");
			$(this).removeClass("non-valid");		
		
		}
	});

});


function validateEmail(email) {
    const re = /^\S+@\S+\.\S+$/;
    return re.test(String(email).toLowerCase());
}

