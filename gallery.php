<!-- Header-->
<?php include('templates/header.php'); ?>
<link rel="stylesheet" href="../css/gallery.css" type="text/css">

<h3>Gallery</h3>
<hr class="bline">
</hr>
<div class="iconphotos">
    <a href="http://www.instagram.com/butterytablebakery"><img src="../images/icon/instagram_gallery.png" width="35px" height="35px"></a>
    <a href="https://www.facebook.com/butterytable"><img src="../images/icon/facebook_gallery.png" width="35px" height="35px"></a>
    <a href="https://sg.carousell.com/butterytablebakery/"><img src="../images/icon/carousell.png" width="50px" height="50px"></a>
</div>

<?php require 'includes/display_gallery.inc.php'?>


<!-- <script>
	jQuery(document).ready(function($){
		jQuery(".fa-star").click(function(){
			var flavourId = $(this).attr("name");
			var selectedId = $(this).attr("id");
			var menu_id = 1;

			console.log("test");
			$.ajax({
				type: "POST",
				url: "includes/wishlist.inc.php",
				data: { fId: flavourId, cId: menu_id} ,
				}).done(function( msg ) {

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
	
</script> -->

<?php include('templates/footer.php'); ?>