<?php
// if (isset($_POST['register_user'])) {
	require 'db_conn.inc.php';

	$user_email = $_POST['e_val'];
	if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) //Error when not email
	{
		echo "Invalid Email";
	}
	else
	{
		$sql = "SELECT user_email FROM bt_user WHERE user_email=?"; //Check username exists
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			//header("Location: ../login/signup.php?error=sqlerror1");
			//exit();
			echo "-1";
		} 
		else 
		{
			mysqli_stmt_bind_param($stmt, "s", $user_email); //Prepare statement
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);

			$resultCheck = mysqli_stmt_num_rows($stmt); //Check if there is any row
			if ($resultCheck > 0) {
				echo "Email have been taken";
			} 
			else
			{
				echo "0";
			}
		}
	}
// }
?>