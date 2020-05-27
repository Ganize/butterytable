
<div>

<?php 

	require 'db_conn.inc.php';
	$count = 0;
	$row_num = 0;
	$sql =  "SELECT * FROM bt_wishlist WHERE user_id = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql))
	{
		header("Location: contact-us.php?error=sqlerror");
		exit();
	}
	else
	{
		
		mysqli_stmt_bind_param($stmt, "i", $_SESSION['userUid']); //Prepare statement
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_assoc($result)) //Fectching the data from result
		{

			$flavour_id = $row["flavour_id"];
			$menu_id = $row["menu_id"];
	
			$sql1 =  "SELECT * FROM bt_flavour WHERE flavour_id = ? && menu_id= ?";
			$stmt1 = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt1, $sql1))
			{
				//header("Location: contact-us.php?error=sqlerror");
				exit();
			}
			else
			{
				mysqli_stmt_bind_param($stmt1, "ii", $flavour_id,  $menu_id); //Prepare statement
				mysqli_stmt_execute($stmt1);
				$result1 = mysqli_stmt_get_result($stmt1);
				if($row1 = mysqli_fetch_assoc($result1)){ //Fectching the data from result
					if($count == 0)
					{
						echo '<div class="row-'.$row_num.' wa-row" >';
					}

					
					echo "<div>";
					echo $row1["flavour_name"];
					echo '<span class="fa fa-star checked" id="menuid_'. $flavour_id .'" name="'. $flavour_id .'"></span>';
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

		// if($count != 0)
		// {
		// 	echo '</div>';
		// }
	}	
?>

</div>