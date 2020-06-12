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
		if (isset($_GET["user_id"]))
		{
			mysqli_stmt_bind_param($stmt, "i", $_GET["user_id"]);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)) //Fectching the data from result
			{
				$address_1 = decryptString($row["address_1"]);
				$address_2 = decryptString($row["address_2"]);
				$user_floor = decryptString($row["user_floor"]);
				$user_unit = decryptString($row["user_unit"]);
				$user_postal = decryptString($row["user_postal"]);

					echo "<div><b>Address :</b></div>";
					echo "<div>".$address_1."</div>";
					echo "<div>" . $address_2 . "</div>";
					echo '<div class="a-name">';
					echo "<div><b>Unit Number : </b> #" . $user_floor . " - " . $user_unit . "</div>";
					echo "<div><b>Postal Code : </b>" . $user_postal . "</div>";	
			}
		}
		else
		{
		
			mysqli_stmt_bind_param($stmt, "i", $_SESSION["userUid"]);
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
	
		mysqli_stmt_close($stmt);
		mysqli_close($conn);	

			$address_1 = decryptString($row["address_1"]);
			$address_2 = decryptString($row["address_2"]);
			$user_floor = decryptString($row["user_floor"]);
			$user_unit = decryptString($row["user_unit"]);
			$user_postal = decryptString($row["user_postal"]);
			
		}

	}

?>