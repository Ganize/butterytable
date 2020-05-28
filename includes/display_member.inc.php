<table width="100%">
<tr>
	<th>ID</th>
	<th>Email</th>
	<th>Role</th>
</tr>
<?php 
	require 'db_conn.inc.php';

	$sql =  "SELECT * FROM bt_user";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql))
	{
		header("Location: member-list.php?error=sqlerror");
		exit();
	}
	else
	{
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

			echo "<td>".$row["user_role"]."</td>";
			echo "<td><button>View</button></td>";
			echo "</tr>";		
		}
	}	
?>

</table>