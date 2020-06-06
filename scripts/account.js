jQuery(document).ready(function(){
	jQuery("#btn_update").click(function(){
		var cfm = confirm("Are you sure you want to submit?");
		if (cfm == true) {
			if($.trim(jQuery("#current_pass").val()) != "")
			{
				if($.trim(jQuery("#new_password").val()) == ""|| $.trim(jQuery("#repeat_password").val()) == "")
				{
					alert("Please complete the password word section");
				}
				else if(jQuery("#new_password").val() != jQuery("#repeat_password").val())
				{
					alert("Please confirm your password!");
				}
				else
				{
					jQuery("#submit_form").click();
				}
			}
			else
			{
				jQuery("#submit_form").click();
			}
		}
		else
		{
			return;
		}
	});
});