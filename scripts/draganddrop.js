jQuery(document).ready(function(){
	
	jQuery(".upload_image").hide();
	jQuery("#remove_file").hide();

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
});

