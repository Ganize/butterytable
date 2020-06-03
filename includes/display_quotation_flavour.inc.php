<?php require 'db_conn.inc.php';?>


<?php

	$menu_id = $_POST["mId"];

	$sql =  "SELECT * FROM bt_flavour WHERE menu_id = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql))
	{
			
	}
	else
	{
		mysqli_stmt_bind_param($stmt, "i", $menu_id ); //Prepare statement
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		
		if (mysqli_num_rows($result) == 0) {
			echo '<div id="quotation-flavour">No flavour in the menu</div>';
		}
		else
		{
			echo '<select name="quotation-flavour" id="quotation-flavour" style="width:fit-content";>';
			echo '<option disabled selected value> -- Select an option -- </option>';
			while($row = mysqli_fetch_assoc($result)) //Fectching the data from result
			{	
				echo '<option value="'.$row["flavour_id"].'">'.ucwords($row["flavour_name"]).'</option>';
			}
			echo '</select>';
		}
	}
?>


