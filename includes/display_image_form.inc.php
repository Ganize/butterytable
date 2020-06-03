<?php
	//require will emit a fatal error ( E_COMPILE_ERROR ) and halt the script
	require 'db_conn.inc.php';

	$gallery_id = "";
	$gallery_name = "";
	$gallery_path = "";
	$gallery_category = "";
	$gallery_page = "";
	$gallery_description = "";

	$sql =  "SELECT * FROM bt_cakegallery WHERE gallery_id= ?";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql))
	{
		header("Location: ../404.php?error=sqlerror");
		exit();
	}
	else
	{

		mysqli_stmt_bind_param($stmt, "s", $_GET["gallery_id"]);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if($row = mysqli_fetch_assoc($result)) //Fectching the data from result
		{
			$gallery_id = $row["gallery_id"];
			$gallery_name = $row["gallery_name"];
			$gallery_path = $row["gallery_path"];
			$gallery_category = $row["category"];
			$gallery_page = $row["gallery_page"];
			$gallery_description = $row["gallery_description"];
		}
	}
?>