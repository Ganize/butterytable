<!-- Header-->
<?php include('templates/header.php'); ?>
<link rel="stylesheet" href="<?php echo $link;?>css/gallery.css" type="text/css">

<h3>Gallery</h3>
<hr class="bline">
</hr>
<div class="iconphotos">
  <!--   <a href="http://www.instagram.com/butterytablebakery"><img src="../images/icon/instagram_gallery.png" width="35px" height="35px"></a>
    <a href="https://www.facebook.com/butterytable"><img src="../images/icon/facebook_gallery.png" width="35px" height="35px"></a>
    <a href="https://sg.carousell.com/butterytablebakery/"><img src="../images/icon/carousell.png" width="50px" height="50px"></a> -->

      <a href="http://www.instagram.com/butterytablebakery"><img src="<?php echo $link;?>images/icon/instagram_gallery.png" width="35px" height="35px"></a>
    <a href="https://www.facebook.com/butterytable"><img src="<?php echo $link;?>images/icon/facebook_gallery.png" width="35px" height="35px"></a>
    <a href="https://sg.carousell.com/butterytablebakery/"><img src="<?php echo $link;?>images/icon/carousell.png" width="50px" height="50px"></a>
</div>

<?php require 'includes/display_gallery.inc.php'?>


<?php include('templates/footer.php'); ?>