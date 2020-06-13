jQuery(".digits").keypress(function (e) {
	//if the letter is not digit then display error and don't type anything
	if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
	    return false;
	}
});


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

$('.txtarea').focusout(function(e){	
	var val = e.target.value;
	$(this).removeClass("empty");

	if (val.trim() == "")
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

$('input[type="text"]').focusout(function(e){	
	var val = e.target.value;
	$(this).removeClass("empty");
   if (val.trim() == "")
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

$('input[type="number"]').focusout(function(e){	
	var val = e.target.value;
	$(this).removeClass("empty");
   if (val == 0 || val.trim() == "")
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

// the selector will match all input controls of type :checkbox
// and attach a click event handler 
$("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});

$("input[name='btn-submit']").click(function(){
	var cfm = confirm("Are you sure you want to submit?");
	if (cfm == true) {
		var empty = jQuery('.empty').length;
		var nonValid = jQuery('.non-valid').length;

		var get_quotation_checkbox = jQuery("input[name='quotation-collection']").length;

		if(jQuery("#quotation-option").length > 0)
		{
			var select_val = $($("#quotation-option")).find(":selected").val();
			var get_length = 0;
			var get_selectbox = jQuery("#wishlist-container select");

			switch(select_val)
			{
				case "-1":
					console.log("selectbox")
					alert("Please fill up accordingly!");
					return;
				break;
				case "0":
					get_length = jQuery("#wishlist-container select").length;
					get_selectbox = jQuery("#wishlist-container select");
				break;
				case "1":
					get_length = jQuery("#customize-container select").length;
					get_selectbox = jQuery("#customize-container select");
				break;
			}

			for(var i = 0; i < get_length; i++)
			{
				var select_val = $($(get_selectbox)[i]).find(":selected").val();
				if(select_val == "-1")
				{
					console.log("select_val");
					alert("Please fill up accordingly!");
					return;
				}
			}

		}



		if(empty > 0 || nonValid > 0)
		{
			console.log("empty");
			alert("Please fill up accordingly!");
			
		}
		else
		{

			if(get_quotation_checkbox != 0)
			{
				if(jQuery("input[name='quotation-collection']:checked").length == 0 )
				{
					alert("Please fill up accordingly!");
					return;
				}
			}
		
	
			if(jQuery('#btn-enquiry').length == 1)
			{
				jQuery('#btn-enquiry').click();	
			}
			else if(jQuery('#btn-quotation').length == 1)
			{

				jQuery('#btn-quotation').click();	
			}
		}			
		
	}
});

if(document.getElementById("quotation-option") == null)
{
	jQuery(".form-customize").show();
}