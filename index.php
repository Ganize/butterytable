<!-- Header-->
<?php include('templates/header.php'); ?>


<a href="https://www.facebook.com/butterytable/"><i class="fa fa-facebook-square"></i></a>
<a href="https://www.instagram.com/butterytablebakery/"><i class="fa fa-instagram" aria-hidden="true"></i></a>

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