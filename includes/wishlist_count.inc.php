<?php

	require 'db_conn.inc.php';

	$sql = "SELECT COUNT(*) AS total FROM bt_wishlist WHERE user_id=?"; //Check username exists
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		//header("Location: ../login/signup.php?error=sqlerror1");
		exit();
	} 
	else 
	{
		if(!mysqli_stmt_prepare($stmt, $sql))
		{
			// header("Location: ../login.php?error=sqlerror");
			// exit();
		}
		else
		{
			mysqli_stmt_bind_param($stmt, "i", 	$_SESSION['userUid']); //Prepare statement
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)) //Fectching the data from result
			{
				echo '<style>';
				echo ".wishlist-icon::before{ content: '".$row['total']."';}";
				echo '</style>';
			}
			else
			{
				echo '<style>';
				echo ".wishlist-icon::before{ content: '".$row['total']."';}";
				echo '</style>';
			}
			
			mysqli_stmt_close($stmt);
			mysqli_close($conn);
		}
	}

?>