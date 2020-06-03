jQuery(document).ready(function($){
	jQuery(".fa-heart").click(function(){
	var galleryId = $(this).attr("name");
	var selectedId = $(this).attr("id");
	var menu_id = 1;

	var current_host = window.location.href;

	$.ajax({
		type: "POST",
		url:   "includes/wishlist.inc.php",
		data: { gId: galleryId} ,
		}).done(function( msg ) {
			console.log(msg);
			var target_star = document.getElementById(selectedId);
			if(msg == 0){
					target_star.classList.remove("checked");
			}
			else if(msg == 1){
				target_star.classList.add("checked");
			}
	  	});	
	});

	/* For Contact Form */
	jQuery("#btnQuotation").click(function(){
		console.log("test")
			$.ajax({
			type: "POST",
			url:   "contact_forms/quotation_form.php",
			}).done(function( msg ) {

				jQuery("#form_container").html(msg);
		  	});	
		});
	
	jQuery("#btnEnquiry").click(function(){
		$.ajax({
		type: "POST",
		url:   "contact_forms/enquiry_form.php",
		}).done(function( msg ) {

			jQuery("#form_container").html(msg);
	  	});	
	});
});


function openNav()
{
	jQuery("#main-menu").attr("aria-expanded","true");
}


function closeNav()
{
	jQuery("#main-menu").attr("aria-expanded","false");
}

// function retrieveQuotation()
// {
// 	jQuery.ajax({
// 		type: "POST",
// 		url:   "contact_forms/quotation_form.php",
// 		}).done(function( msg ) {
// 			jQuery("#form_container").html(msg);
// 	  	});	
// }

// function retrieveEnquiry()
// {
// 	jQuery.ajax({
// 		type: "POST",
// 		url:   "contact_forms/enquiry_form.php",
// 		}).done(function( msg ) {

// 			jQuery("#form_container").html(msg);
// 	  	});	
// }
