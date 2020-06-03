
<div>

<?php 
	require 'db_conn.inc.php';
	$count = 0;
	$row_num = 0;
	$sql =  "SELECT * FROM bt_wishlist WHERE user_id = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql))
	{
		header("Location: my-wishlist.php?error=sqlerror");
		exit();
	}
	else
	{
		if(isset($_GET["user_id"]) && $_SESSION["user_role"] == "ujiz4_admin")
		{
			mysqli_stmt_bind_param($stmt, "i", $_GET["user_id"]); //Prepare statement
		}
		else
		{
			mysqli_stmt_bind_param($stmt, "i", $_SESSION['userUid']); //Prepare statement
		}
		mysqli_stmt_execute($stmt);
		
		$result = mysqli_stmt_get_result($stmt);


		if (mysqli_num_rows($result) == 0) {
			echo "<p>No item in the wishlist</p>";
		}
		else
		{
	
			echo "<p>Uncheck the heart to remove the items from the wishlist</p>";
			while($row = mysqli_fetch_assoc($result)) //Fectching the data from result
			{	
				$sql1 =  "SELECT * FROM bt_cakegallery WHERE gallery_id = ?";
				$stmt1 = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt1, $sql1))
				{
					header("Location: contact-us.php?error=sqlerror");
					exit();
				}
				else
				{
					mysqli_stmt_bind_param($stmt1, "i", $row["gallery_id"]); //Prepare statement
					mysqli_stmt_execute($stmt1);
					$result1 = mysqli_stmt_get_result($stmt1);

					if($row1 = mysqli_fetch_assoc($result1)){ //Fectching the data from result
						if($count == 0)
						{
							echo '<div class="row-'.$row_num.' wa-row" >';
						}

						echo '<div class="wish_grid">';
						echo '<div class="fname">'. $row1["gallery_name"] .'</div>';
						if(!isset($_GET["user_id"]) && $_SESSION["user_role"] != "ujiz4_admin")
						{
							echo '<span class="fa fa-heart checked" id="menuid_'. $row1["gallery_id"] .'" name="'. $row1["gallery_id"] .'"></span>';
						}
						
						echo '<img src="http://localhost/butterytable/images/'.$row1["gallery_path"].'" alt="'. $row1["gallery_name"].'" width="150" height="150">';
						echo "</div>";

						if($count == 2)
						{
							echo '</div>';
							$count = 0;
							$row_num = $row_num + 1;
						}
						else
						{
							$count = $count + 1;
						}
					}
				}		
			}
		}	
	}	
?>

</div>