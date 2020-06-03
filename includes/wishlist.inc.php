<?php
	require 'db_conn.inc.php';
	session_start();
	$gallery_id = $_POST["gId"];
	// $menu_id = $_POST["cId"];
	$user_id =  $_SESSION['userUid'];

	$sql = "SELECT * FROM bt_wishlist WHERE user_id=? && gallery_id=?"; //Check username exists
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "-1";
	} else {
		mysqli_stmt_bind_param($stmt, "ii", $user_id , $gallery_id); //Prepare statement
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);

		$resultCheck = mysqli_stmt_num_rows($stmt); //Check if there is any row
		if ($resultCheck > 0) {
			$sql = "DELETE FROM bt_wishlist WHERE user_id=? && gallery_id=?";
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				echo "-1";
			} else {
				mysqli_stmt_bind_param($stmt, "ii", $user_id , $gallery_id); //Prepare statement
				mysqli_stmt_execute($stmt);
				echo "0";
			}

		} else {
			$sql = "INSERT INTO bt_wishlist (user_id, gallery_id) VALUES (?,?)";

			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				echo "-1";
			} else {
				
				mysqli_stmt_bind_param($stmt, "ii", $user_id, $gallery_id); //Prepare statement
				mysqli_stmt_execute($stmt);
				echo "1";
			}
		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}
?>

