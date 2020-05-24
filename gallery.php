<!-- Header-->
<?php include('templates/header.php'); ?>
<link rel="stylesheet" href="css/gallery.css" type="text/css">


<form method="post" action="/butterytable/create/addphoto.php" enctype="multipart/form-data">
    <input type="file" name="imagefile">
    <br />
    <input type="submit" name="submit" value="upload">
</form>

<?php include('templates/footer.php'); ?>