<?php require 'db_conn.inc.php';?>

<?php
	$menu_category = $_POST["menu_category"];

	$sql =  "SELECT * FROM bt_cakegallery WHERE gallerycategory = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql))
	{
			
	}
	else
	{
		echo '<div name="quotation-flavour" id="quotation-flavour" class="form-group contact-group form-customize">';
		echo '<label for="quotation-flavour">Item</label>';
		echo '<select name="quotation-menu" id="quotation-menu" onchange="retrieve_flavour(this)" style="width:fit-content;">';
		echo '<option disabled selected value="-1">Select an option</option>';
		mysqli_stmt_bind_param($stmt, "s", $menu_category ); //Prepare statement
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
	
		while($row = mysqli_fetch_assoc($result)) //Fectching the data from result
		{	
			echo '<option value="'.$row["gallery_name"].'">'.ucwords($row["gallery_name"]).'</option>';
		}

		echo '</select>';
		echo '</div>';
	}
?>

<?php
	$menu_category = $_POST["menu_category"];

	$sql =  "SELECT * FROM bt_menu WHERE menu_category = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql))
	{
			
	}
	else
	{
		echo '<div name="quotation-flavour" id="quotation-flavour" class="form-group contact-group form-customize">';
		echo '<label for="quotation-flavour">Flavour series</label>';
		echo '<select name="quotation-wishlist" id="quotation-wishlist" onchange="retrieve_flavour(this)" style="width:fit-content;">';
		echo '<option disabled selected value="-1">Select an option</option>';
		mysqli_stmt_bind_param($stmt, "s", $menu_category ); //Prepare statement
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
	
		while($row = mysqli_fetch_assoc($result)) //Fectching the data from result
		{	
			echo '<option value="'.$row["menu_name"].'">'.ucwords($row["menu_name"]).'</option>';
		}
		echo '</select>';
		echo '</div>';
	}
?>

