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
			echo $_POST["mId"];
			echo '<div id="quotation-flavour" class="form-group contact-group form-customize">No flavour in the menu</div>';
		}
		else
		{

			echo '<label for="quotation-category">Cake Flavour</label>';
			echo '<select name="quotation-flavour" id="quotation-test" style="width:fit-content";>';
			echo '<option disabled selected value="-1"> -- Select an option -- </option>';
			while($row = mysqli_fetch_assoc($result)) //Fectching the data from result
			{	
				echo '<option value="'.$row["flavour_name"].'">'.ucwords($row["flavour_name"]).'</option>';
			}
			echo '</select>';

		}
	}
?>