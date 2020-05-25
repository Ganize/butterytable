<!-- Header-->
<?php include('templates/header.php'); ?>

<?php

require 'includes/db_conn.inc.php';

$sql = "SELECT * FROM bt_cakegallery";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../login/login.php?error=sqlerror");
    exit();
} else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
}

?>
<div class="container-fluid">
    <div class="row justify-content-center mb-2" >
        <div class="col-lg-10">
            <div id="demo" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <?php
                    $i = 0;
                    foreach ($result as $row) {
                        $actives = '';
                        if ($i == 0) {
                            $actives = 'active';
                        }
                    ?>
                        <li data-target="#demo" data-slide-to="<?= $i; ?>" class="<? $actives; ?> "></li>
                    <?php $i++;
                    } ?>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    <?php
                    $i = 0;
                    foreach ($result as $row) {
                        $actives = '';
                        if ($i == 0) {
                            $actives = 'active';
                        }
                    ?>
                        <div class="carousel-item <?= $actives; ?>">
                            <img src="images/<?= $row['gallery_path'] ?>" width="100%" height="800px">
                        </div>

                    <?php $i++;
                    } ?>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>

            </div>
        </div>
    </div>
</div>


<!-- <a href="https://www.facebook.com/butterytable/"><i class="fa fa-facebook-square"></i></a>
<a href="https://www.instagram.com/butterytablebakery/"><i class="fa fa-instagram" aria-hidden="true"></i></a> -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<span class="fa fa-star name="1"></span>


<?php if(isset($_SESSION['userId'])):?>
    <div>
        <?php 
            echo $_SESSION['userId'];
            echo $_SESSION['userUid'];
            echo $_SESSION['userEmail'];
        ?>
    </div>
<?php endif;?>

<?php
	$sql = "SELECT * FROM test_flavour WHERE catergoryId=?"; //Check username exists
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql))
			{
				header("Location: ../login/signup.php?error=sqlerror");
				exit();
			}
			else
			{
				mysqli_stmt_bind_param($stmt, "i", 1); //Prepare statement
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);

				$resultCheck = mysqli_stmt_num_rows($stmt); //Check if there is any row
				if($resultCheck > 0)
				{
					header("Location: ../login/signup.php?error=usertaken&mail=".$email);
					exit();
				}
				else
				{
					
				}
			}
?>


<!--Footer-->
<?php include('templates/footer.php'); ?>