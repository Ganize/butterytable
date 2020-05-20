
<!--Configuration-->
<?php $title = 'Home'; ?>
<?php $currentPage = 'index'; ?>
<?php $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>

<!-- Header-->
<?php include('templates/header.php');?>

Index Page, Home has an active class

<!--Footer-->
<?php include('templates/footer.php');?>