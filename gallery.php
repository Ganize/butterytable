<!-- Header-->
<?php include('templates/header.php'); ?>
<link rel="stylesheet" href="<?php echo $link;?>css/gallery.css" type="text/css">

<h3>Gallery</h3>
<hr class="bline">
</hr>
<div class="iconphotos">
      <a href="http://www.instagram.com/butterytablebakery"><img src="<?php echo $link;?>images/icon/insta.png" width="35px" height="35px"></a>
    <a href="https://www.facebook.com/butterytable"><img src="<?php echo $link;?>images/icon/fb.png" width="35px" height="35px"></a>
    <a href="https://sg.carousell.com/butterytablebakery/"><img src="<?php echo $link;?>images/icon/carousell.png" width="50px" height="50px"></a>
</div>

<div id="gallery_container">
<?php include 'includes/display_gallery.inc.php'?>
</div>

<button id="btnGallery" onclick="myFunction()" style="display: flex; margin: 0 auto; margin-bottom: 10px; color:#726061;" class="button">show more</button>


<script>
var start_limit = 3 
function myFunction() {
		$.ajax({
		type: "POST",
		url:   "includes/display_gallery.inc.php",
		data: {start_limit: start_limit}
		}).done(function( msg ) {
			start_limit = start_limit + 3;
     		jQuery("#gallery_container").append(msg);
     		var last_append = jQuery("#gallery_container .gallerycontainer").last();
     		var num_div = $(last_append).children("div");
     		console.log(num_div.length)

     		if(num_div.length < 3)
     		{
     			jQuery("#btnGallery").hide();
     		}
	  	});	
}
</script>

<?php include('templates/footer.php'); ?>