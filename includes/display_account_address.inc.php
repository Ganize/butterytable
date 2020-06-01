<?php
	//require will emit a fatal error ( E_COMPILE_ERROR ) and halt the script
	require 'db_conn.inc.php';

	$address_1 = "";
	$address_2 = "";
	$user_floor = "";
	$user_unit = "";
	$user_postal = "";

	$sql =  "SELECT * FROM bt_address WHERE user_id= ?";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql))
	{
		header("Location: ../404.php?error=sqlerror");
		exit();
	}
	else
	{
		mysqli_stmt_bind_param($stmt, "s", $_SESSION["userUid"]);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if($row = mysqli_fetch_assoc($result)) //Fectching the data from result
		{
			$address_1 = decryptString($row["address_1"]);
			$address_2 = decryptString($row["address_2"]);
			$user_floor = decryptString($row["user_floor"]);
			$user_unit = decryptString($row["user_unit"]);
			$user_postal = decryptString($row["user_postal"]);
		}
	}
?>