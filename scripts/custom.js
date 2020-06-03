jQuery(document).ready(function($){
	jQuery(".fa-heart").click(function(){
	var galleryId = $(this).attr("name");
	var selectedId = $(this).attr("id");
	var menu_id = 1;

	var current_host = window.location.href;

	$.ajax({
		type: "POST",
		url:   "http://localhost/butterytable/includes/wishlist.inc.php",
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

function retrieve_flavour(e)
{
	var selectedVal = e.options[e.selectedIndex].value;
	jQuery.ajax({
	type: "POST",
	url:   "includes/display_quotation_flavour.inc.php",
	data: { mId: selectedVal} ,
	}).done(function( msg ) {
		jQuery("#quotation-flavour").replaceWith(msg);
  	});	
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
