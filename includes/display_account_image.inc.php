
<?php 
	require 'db_conn.inc.php';

	if(isset($_GET["user_id"]))
	{
		$sql =  "SELECT * FROM bt_user WHERE user_id=?";
	}
	else
	{
		$sql =  "SELECT * FROM bt_user";
	}

	

	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql))
	{
		header("Location: member-list.php?error=sqlerror");
		exit();
	}
	else
	{
		if(isset($_GET["user_id"]))
		{
			$sql =  "SELECT * FROM bt_user WHERE user_id=?";
			mysqli_stmt_bind_param($stmt, "i", $_GET["user_id"]); //Prepare statement
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)) //Fectching the data from result
			{
				echo "<div><b>ID :</b> ".$row["user_id"]."</div>";
				echo '<div class="a-name">';
				echo "<div><b>First Name : </b>".$row["first_name"]."</div>";
				echo "<div><b>Last Name : </b>".$row["last_name"]."</div>";
				echo "</div>";
				echo "<div><b>Email : </b>".$row["user_email"]."</div>";
			}
		}
		else
		{
			$sql =  "SELECT * FROM bt_user";
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			while($row = mysqli_fetch_assoc($result)) //Fectching the data from result
			{

				echo "<tr>";
				echo "<td>".$row["user_id"]."</td>";

				$len = 10;
				if(strlen($row["user_email"])<=$len)
				{
					echo "<td>".$row["user_email"]."</td>";
				}
				else
				{
					$email_sub=substr($row["user_email"],0,$len) . '...';
					echo "<td>".$email_sub."</td>";
				}
				echo '<td><a href="account-details?user_id='.$row["user_id"].'"">View</a></td>';
				echo "</tr>";		
			}
		}
	
	}	
?>
