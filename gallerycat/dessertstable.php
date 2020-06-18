<!-- Header-->
<?php include('../templates/header.php'); ?>
<link rel="stylesheet" href="<?php echo $link;?>css/gallery.css" type="text/css">

<h3>Dessert Table</h3>
<hr class="bline">
</hr>
<div class="iconphotos">
      <a href="http://www.instagram.com/butterytablebakery"><img src="<?php echo $link;?>images/icon/insta.png" width="35px" height="35px"></a>
    <a href="https://www.facebook.com/butterytable"><img src="<?php echo $link;?>images/icon/fb.png" width="35px" height="35px"></a>
    <a href="https://sg.carousell.com/butterytablebakery/"><img src="<?php echo $link;?>images/icon/carousell.png" width="50px" height="50px"></a>
</div>


<?php require '../includes/gallery_category_dessertstable.inc.php'?>

<?php include('../templates/footer.php'); ?>