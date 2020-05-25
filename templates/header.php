<!--Configuration-->
<?php $title = 'Home'; ?>
<?php $currentPage = 'index'; ?>
<?php $link = "http://localhost/butterytable/" ?>
<?php session_start(); ?>
<?php date_default_timezone_set('Asia/Singapore'); ?>


<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	    <!-- Optional JavaScript -->
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		
		<!-- Font Awesome JavaScript -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" href="<?php echo $link; ?>/css/style.css" type="text/css">


	    <title><?php echo($title); ?></title>
	</head>
  <body>
		<div>
			<a href="http://localhost/butterytable/index"><img src="images/BT_Logo.jpg" width="200px" height="200px" class="img-fluid mx-auto d-block "></a>
		</div>	
		<nav class="navbar navbar-expand-lg navbar-light">			
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse nav-center" id="navbarNav">
				<ul class="navbar-nav">
					<?php 
						$nav_bar = array(
						"Home" => "index",
						"Our Story" => 	"our-story" , 
						"Gallery" => 	"gallery" , 
						"Menu" => "menu", 
						"Contact Us" => "contact-us", 
						"FAQ" =>"faq");

						foreach ($nav_bar as $name => $url) {
							echo '<li class="nav-item px-5"'.(($currentPage === $name) ? '"active" ': '').'><a class="nav-link" href="'.(($currentPage === $name) ? $link : $link.$url).'">'.$name.'</a></li>';
						}
					?>
				</ul>
		</nav> 
		