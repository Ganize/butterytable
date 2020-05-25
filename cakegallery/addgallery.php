<!-- Header -->
<?php include('../templates/header.php');?>

<form method="post" action="/butterytable/includes/gallery.inc.php" enctype="multipart/form-data">
    <input type="file" name="imagefile">
    <br />
    <input type="submit" name="submit" value="upload">
</form>

<!--Footer-->
<?php include('../templates/footer.php');?>