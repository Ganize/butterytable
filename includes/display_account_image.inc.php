
<?php 
	require 'db_conn.inc.php';


	$sql =  "SELECT * FROM bt_cakegallery";
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

		if($row = mysqli_fetch_assoc($result)) //Fectching the data from result
		{
			while($row = mysqli_fetch_assoc($result)) //Fectching the data from result
			{

				echo "<tr>";
				echo "<td>".$row["gallery_id"]."</td>";

				$len = 10;
				if(strlen($row["gallery_name"])<=$len)
				{
					echo "<td>".$row["gallery_name"]."</td>";
				}
				else
				{
					$gallery_sub=substr($row["gallery_name"],0,$len) . '...';
					echo "<td>".$gallery_sub."</td>";
				}

				echo "<td>".$row["gallery_page"]."</td>";
				echo "<td>".$row["category"]."</td>";
				echo '<td><a href="image-form?gallery_id='.$row["gallery_id"].'"">View</a></td>';
				echo "</tr>";		
			}
		}
		else
		{
			echo "<tr>";
			echo '<td colspan="4" style="text-align:center;">No images is being set</td>';
			echo "</tr>";
		}
	}
?>
