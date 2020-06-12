jQuery(document).ready(function(){
	$(".pass-validation").hide();
	$('input[type="email"]').keyup(function(value){	
		$(this).removeClass("empty");
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

	jQuery(".digits").keypress(function (e) {
		//if the letter is not digit then display error and don't type anything
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
		    return false;
		}
	});

	jQuery("#new_password").keyup(function (e) {	
		$(this).removeClass("empty");
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
	

	jQuery("#repeat_password").keyup(function (e) {		
		$(this).removeClass("empty");
		if($("#repeat_password").val() != $("#new_password").val())
		{
			$(this).addClass("non-valid");
			$(this).removeClass("valid");
			
			if($("#new_password").val() == "")
			{
				$(".pass-validation").text("Empty Password!");
			}
			else
			{
				$(".pass-validation").text("Password Mismatch!");
			}
		
			$(".pass-validation").show();
		}
		else
		{
			$(this).addClass("valid");
			$(this).removeClass("non-valid");
			$(".pass-validation").hide();
		}
	});

	jQuery('.validation_text').keyup(function(value){	
		$(this).removeClass("empty");
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

	jQuery("#register_email").focusout(function(e){
		var r_email = e.target.value; 
		var r_id = e.currentTarget.id;

		$.ajax({
		type: "POST",
		url:   "includes/check_email.inc.php",
		data: { e_val: r_email} ,
		}).done(function( msg ) {
			var id = document.getElementById(r_id);
		
			if(msg == 0)
			{
				$(id).addClass("valid");
				$(id).removeClass("non-valid");	
				$("#email_error").text('');
			}
			else
			{	
				$(id).addClass("non-valid");
				$(id).removeClass("valid");
				$("#email_error").text(msg);
			}
	  	});	
	});

	jQuery("#btnSubmit").click(function(){
		var cfm = confirm("Are you sure you want to submit?");
		if (cfm == true) {
			var nonValid = jQuery('.non-valid').length;
	
			if(nonValid == 0)
			{
				//jQuery("#submit_form").click();
			}
			else
			{
				alert("Please fill up all details");
			}
		}
		else
		{
			return;
		}
	});

});



function validateEmail(email) {
    const re = /^\S+@\S+\.\S+$/;
    return re.test(String(email).toLowerCase());
}

