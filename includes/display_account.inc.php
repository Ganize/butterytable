<?php
	//require will emit a fatal error ( E_COMPILE_ERROR ) and halt the script
	require 'db_conn.inc.php';

	$user_email = "";
	$user_first ="";
	$user_last ="";

	$sql =  "SELECT * FROM bt_user WHERE user_id= ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql))
	{
		header("Location: ../login.php?error=sqlerror");
		exit();
	}
	else
	{
		mysqli_stmt_bind_param($stmt, "s", $_SESSION["userUid"]);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if($row = mysqli_fetch_assoc($result)) //Fectching the data from result
		{	
			$user_email = $row["user_email"];
			$user_first = $row["first_name"];
			$user_last = $row["last_name"];
		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn);	
	}
?>