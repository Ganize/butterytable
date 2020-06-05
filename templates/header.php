<!--Configuration-->
<?php 
	$title = 'Home'; 
	$currentPage = 'index';
	$link = "http://localhost/butterytable/";
	$DIR = realpath(dirname(__FILE__) . '/..');
?>


<?php

if (!isset($_SESSION)) {
	session_start();
}

// 10 mins in seconds
// $inactive = 600; 

// $session_life = time() - $_session['timeout'];

// if($session_life > $inactive)
// {  
// 	session_destroy(); 
// 	header("Location: logoutpage.php");     
// }

// $_session['timeout']=time();

?>


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
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="<?php echo $link ?>/scripts/custom.js"></script>
	<script src="<?php echo $link ?>/scripts/validation.js"></script>
	<!-- Font Awesome JavaScript -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="<?php echo $link; ?>/css/style.css" type="text/css">

	<?php 
		include $DIR.'\includes\wishlist_count.inc.php';

	?>

	<title><?php echo ($title); ?></title>
</head>

<body>

	<div>
		<div class="nav-header">
			<?php if (isset($_SESSION['userUid'])) : ?>

				<div>
					<div class="dropdown">
						<img width="25px" height="25px" class="dropbtn"src="<?php echo $link;?>images/icon/login.png"/>
					<!-- 	<button class="dropbtn"><?php echo $_SESSION['userEmail'] ?></button> -->
						<div class="dropdown-content">
							<a href="<?php echo $link;?>account/my-account.php">Account</a>
							<a href="<?php echo $link;?>includes/logout.inc.php">Logout</a>

						</div>
					</div>
				</div>

			<?php else : ?>
				<div>
				<img width="25px" height="25px" src="<?php echo $link;?>images/icon/login.png"/>
					<a style="color:#A2A2A2" href="/butterytable/login.php">LOG IN</a>
				</div>
			<?php endif; ?>

			<div class="vl"></div>

			<!-- <div class="vl"></div> -->
			<div class="nav-header-div">
				<a href="https://www.facebook.com/butterytable"><img src="<?php echo $link; ?>/images/icon/facebook_header.png" width="25px" height="25px"></a>
				<a href="https://sg.carousell.com/butterytablebakery/"><img src="<?php echo $link; ?>/images/icon/carousell.png" width="35px" height="35px"></a>
				<a href="http://www.instagram.com/butterytablebakery"><img src="<?php echo $link; ?>/images/icon/instagram_header.png" width="25px" height="25px"></a>
			</div>
			<?php if (isset($_SESSION['userUid'])) : ?>

			<div class="vl"></div>

			<div class="nav-header-div wishlist-icon"style="margin-left: 10px;">
				<a href="/butterytable/account/my-wishlist"><img src="<?php echo $link; ?>/images/icon/wishlist.png" width="25px" height="25px" ></a>
			</div>
		<?php endif;?>
		</div>
		<a href="http://localhost/butterytable/index"><img src="<?php echo $link; ?>/images/icon/BT_Logo.jpg" width="200px" height="200px" class="img-fluid mx-auto d-block "></a>
	</div>

		<a class="menu-toggle" aria-label="Open main menu" onclick="openNav()">
			<span class="sr-only">Open main menu</span>
			<span class="fa fa-bars" aria-hidden="true"></span>
		</a>

		<nav id="main-menu" class="main-menu" aria-label="Main menu">
			<a id="main-menu-close" class="menu-close" aria-label="Close main menu" onclick="closeNav()" >
				<span class="sr-only">Close main menu</span>
				<span class="fa fa-close" aria-hidden="true"></span>
			</a>
			<!--<ul class="navbar-nav">-->
				<?php
					function active($currect_page){
					  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
					  $url = end($url_array);  
					  if($currect_page == $url){
					      return 'active'; //class name in css 
					  } 
					}
				?>
			<ul class="nav_bar">
				<?php 
					$nav_bar = array(
					"Our Story" => 	"our-story" , 
					"Gallery" => 	"gallery" , 
					"Menu" => "menu", 
					"Contact Us" => "contact-us", 
					"FAQ" =>"faq");



					foreach ($nav_bar as $name => $url) {

						if($name === "Gallery")
						{
							echo '<li style="margin:auto;" class="nav-item nav-dropdown dropdown '.active($url).'">';
							echo '<a class="nav-link dropbtn" href="#">Gallery</a>';
							echo '<div class="dropdown-content">';
							echo '<a class="nav-link" href="'.(($currentPage === $name) ? $link : $link.$url).'">Cakes</a>';
							echo '<a class="nav-link" href="'.(($currentPage === $name) ? $link : $link.$url).'">Cupcake</a>';
							echo '<a class="nav-link" href="'.(($currentPage === $name) ? $link : $link.$url).'">Dessert</a>';
							echo '</li>';
							echo '</div>';
						}
						else
						{
							echo '<li style="margin:auto;" class="nav-item '.active($url).'"><a class="nav-link" href="'.(($currentPage === $name) ? $link : $link.$url).'">'.$name.'</a></li>';
						}

					
					}
				?>
				<li style="position:absolute;bottom:0px; width: 100vw; text-align: center; background:#C38687">
				<div >
					<div class="nav-header nav-header-mobile">
						<?php if (isset($_SESSION['userUid'])) : ?>

							<div>
								<div class="dropdown">
									<a href="<?php echo $link; ?>account/my-account">
										<img width="25px" height="25px" class="dropbtn" src="<?php echo $link;?>images/icon/login_header.png"/>
									</a>
								<!-- 	<button class="dropbtn"><?php echo $_SESSION['userEmail'] ?></button> -->
								
								</div>
							</div>

						<?php else : ?>
							<div>
								<a style="color:white" href="/butterytable/login.php">LOG IN</a>
							</div>
						<?php endif; ?>


						<div class="vl"></div>

						<!-- <div class="vl"></div> -->
						<div class="nav-header-div">
							<a href="https://www.facebook.com/butterytable"><img src="<?php echo $link; ?>images/icon/facebook_footer.png" width="25px" height="25px"></a>
							<a href="https://sg.carousell.com/butterytablebakery/"><img src="<?php echo $link; ?>images/icon/carousell.png" width="35px" height="35px"></a>
							<a href="http://www.instagram.com/butterytablebakery"><img src="<?php echo $link; ?>images/icon/instagram_footer.png" width="25px" height="25px"></a>
						</div>
						<?php if (isset($_SESSION['userUid'])) : ?>
						<div class="vl"></div>

						<div class="nav-header-div">
							<a href="/butterytable/account/my-wishlist"><img src="<?php echo $link; ?>/images/icon/heart.png" class="wishlist-icon" width="25px" height="25px"></a>
						</div>
						<?php endif;?>
					</div>
				</div>	
			</li>
			</ul>
		</nav>
		<a href="#main-menu-toggle" class="backdrop" tabindex="-1" aria-hidden="true" hidden></a>

	<div id="page-container">
		<div id="content-wrap">