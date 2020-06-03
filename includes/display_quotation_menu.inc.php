<?php require 'db_conn.inc.php';?>


<?php
		$sql =  "SELECT * FROM bt_menu";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql))
		{
				
		}
		else
		{
			echo '<label for="quotation-flavour">Cake Flavour</label>';
			echo '<select name="quotation-flavour" id="quotation-menu" onchange="retrieve_flavour(this)" style="width:fit-content";>';
			echo '<option disabled selected value>Select an option</option>';
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
		
			while($row = mysqli_fetch_assoc($result)) //Fectching the data from result
			{	
				echo '<option value="'.$row["menu_id"].'">'.ucwords($row["menu_name"]).'</option>';
			}

			echo '</select>';
		}
?>

