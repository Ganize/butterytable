<?php

require 'db_conn.inc.php';

$sql =  "SELECT * FROM bt_gallery";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
	header("Location: contact-us.php?error=sqlerror");
	exit();
} else {
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	while ($row = mysqli_fetch_assoc($result)) //Fetching the data from result
	{
		$gallery_id = $row["gallery_id"];
		$sql1 =  "SELECT * FROM bt_wishlist WHERE user_id = ? && gallery_id = ?";
		$stmt1 = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt1, $sql1)) {
			//header("Location: contact-us.php?error=sqlerror");
			exit();
		} else {
			mysqli_stmt_bind_param($stmt1, "ii", $_SESSION['userUid'], $gallery_id); //Prepare statement
			mysqli_stmt_execute($stmt1);
			mysqli_stmt_store_result($stmt1);

			if (current_url() == "contact-us.php") {

				echo '<option name="" value="" id="menuid_' . $gallery_id . '" name="' . $gallery_id . '"></span>';
			} else {
				$resultCheck = mysqli_stmt_num_rows($stmt1); //Check if there is any row
				if ($resultCheck > 0) {
					echo '<span class="fa fa-star checked" id="menuid_' . $gallery_id . '" name="' . $gallery_id . '"></span>';
				} else {
					echo '<span class="fa fa-star" id="menuid_' . $gallery_id . '" name="' . $gallery_id . '"></span>';
				}
			}
		}
	}
}
