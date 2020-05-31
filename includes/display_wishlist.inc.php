<?php 

	require 'db_conn.inc.php';

	$sql =  "SELECT * FROM bt_flavour";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql))
	{
		header("Location: contact-us.php?error=sqlerror");
		exit();
	}
	else
	{
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_assoc($result)) //Fectching the data from result
		{
			$flavour_name = $row["flavour_name"];
			$flavour_id = $row["flavour_id"];
			$menu_id = 1;

			echo "</br>".$row["flavour_name"];
			echo "</br>".$row["flavour_id"];

			$sql1 =  "SELECT * FROM bt_wishlist WHERE user_id = ?  && menu_id = ? && flavour_id = ?";
			$stmt1 = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt1, $sql1))
			{
				//header("Location: contact-us.php?error=sqlerror");
				exit();
			}
			else
			{
				mysqli_stmt_bind_param($stmt1, "iii", $_SESSION['userUid'] , $menu_id, $flavour_id ); //Prepare statement
				mysqli_stmt_execute($stmt1);
				mysqli_stmt_store_result($stmt1);

				$resultCheck = mysqli_stmt_num_rows($stmt1); //Check if there is any row
				if ($resultCheck > 0) {
					echo '<span class="fa fa-star checked" id="menuid_'. $flavour_id .'" name="'. $flavour_id .'"></span>';
				}
				else
				{
					echo '<span class="fa fa-star" id="menuid_'.$flavour_id.'" name="'.$flavour_id .'"></span>';
				}
			}				
		}
	}	
?>