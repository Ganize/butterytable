jQuery(document).ready(function(){
	var url = new URL(window. location. href);
	var gallery_id = url.searchParams.get("gallery_id");
	if(gallery_id != null)
	{
		jQuery(".upload_image").show();
		jQuery("#remove_file").show();
		jQuery(".filephoto-container").addClass("fs-active");
		jQuery("#filePhoto").addClass("fu-active");
		jQuery(".uploader").css("height","auto");
	}
	else
	{
		jQuery(".upload_image").hide();
		jQuery("#remove_file").hide();
	}
	


	var imageLoader = document.getElementById("filePhoto");
	imageLoader.addEventListener('change', handleImage, false);

	function handleImage(e) {
	    var reader = new FileReader();
	    var get_type = e.target.files[0].type.split('/');
	    if(get_type[0] == 'image')
	    {
	    	reader.onload = function (event) {
	        	jQuery('.uploader img').attr('src',event.target.result);
		        jQuery(".upload_image").show();
		       	jQuery(".upload-text").hide();
		       	jQuery(".filephoto-container").addClass("fs-active");
		       	jQuery("#filePhoto").addClass("fu-active");
	       		jQuery(".uploader").css("height","auto");
	       		jQuery("#remove_file").show();
	   		 }
	    	reader.readAsDataURL(e.target.files[0]);
	    }
	    else
	    {
	    	alert("Only can upload image!");
	    }
	}

	function removeImage(e) {
	    var reader = new FileReader();
	    reader.onload = function (event) {
	        $('.uploader img').attr('src',event.target.result);
	        jQuery(".upload_image").show();
	       	jQuery(".upload-text").hide();
	       	jQuery(".filephoto-container").addClass("fs-active");
	       	jQuery("#filePhoto").addClass("fu-active");
	       
	       	jQuery(".uploader").css("height","auto");
	    }
	    reader.readAsDataURL(e.target.files[0]);
	}


	jQuery("#upload_file").click(function(){
		jQuery("#filePhoto").click();
	});

	jQuery("#remove_file").click(function(){
		jQuery(".upload_image").hide();
       	jQuery(".upload-text").show();
       	jQuery(".filephoto-container").removeClass("fs-active");
       	jQuery("#filePhoto").removeClass("fu-active");
       	jQuery('.uploader img').attr('src',"");  		
       	jQuery("#remove_file").hide();
	});

	jQuery("#btn_upload").click(function(){
		var cfm = confirm("Are you sure you want to submit?");
		if (cfm == true) {
			var nonValid = jQuery('.non-valid').length;
			var checkCategory = jQuery("input[name='category[]']:checked").length;
			var checkPage = jQuery("input[name='pages[]']:checked").length;
			var checkImage = jQuery(".upload_image").attr("src")
	
			if(nonValid == 0 && checkCategory != 0 && checkPage !=0 && checkImage != "")
			{
				jQuery("#submit_form").click();
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

