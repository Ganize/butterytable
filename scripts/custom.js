jQuery(document).ready(function($){
	jQuery(".fa-star").click(function(){
	var flavourId = $(this).attr("name");
	var selectedId = $(this).attr("id");
	var menu_id = 1;

	var current_host = window.location.href;

	$.ajax({
		type: "POST",
		url:   "../includes/wishlist.inc.php",
		data: { fId: flavourId, cId: menu_id} ,
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
});


function openNav()
{
	jQuery("#main-menu").attr("aria-expanded","true");
}


function closeNav()
{
	jQuery("#main-menu").attr("aria-expanded","false");
}
