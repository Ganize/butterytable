<!-- Header-->
<?php include('templates/header.php');?>
<link rel="stylesheet" href="css/contact.css" type="text/css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php if(isset($_SESSION['userId'])):?>
    <div>
        <?php 
 	
            echo $_SESSION['userUid'];
            echo $_SESSION['userEmail'];
        ?>
    </div>


<?php endif;?>
<div>
<?php 

		// require 'includes/db_conn.inc.php';

		// $sql =  "SELECT * FROM test_flavour WHERE catergoryId= 1";
		// $stmt = mysqli_stmt_init($conn);
		// if(!mysqli_stmt_prepare($stmt, $sql))
		// {
		// 	header("Location: contact-us.php?error=sqlerror");
		// 	exit();
		// }
		// else
		// {
		// 	mysqli_stmt_execute($stmt);
		// 	$result = mysqli_stmt_get_result($stmt);
		// 	while($row = mysqli_fetch_assoc($result)) //Fectching the data from result
		// 	{
		// 		echo "</br>".$row["name"];
		// 		echo "</br>".$row["id"];

		// 		$sql1 =  "SELECT * FROM bt_wishlist WHERE EXISTS (SELECT * FROM test_flavour WHERE bt_wishlist.user_id = ?  && catergoryId = ? && flavourId = ?)";
		// 		$stmt1 = mysqli_stmt_init($conn);
		// 		if(!mysqli_stmt_prepare($stmt1, $sql1))
		// 		{
		// 			//header("Location: contact-us.php?error=sqlerror");
		// 			exit();
		// 		}
		// 		else
		// 		{
		// 			mysqli_stmt_bind_param($stmt1, "iii", $_SESSION['userUid'] , $row["id"], $row["catergoryId"]); //Prepare statement
		// 			mysqli_stmt_execute($stmt1);
		// 			mysqli_stmt_store_result($stmt1);

		// 			$resultCheck = mysqli_stmt_num_rows($stmt1); //Check if there is any row
		// 			if ($resultCheck > 0) {
		// 				echo '<span class="fa fa-star checked" id="menuid_'.$row["id"].'" name="'.$row["id"].'"></span>';
		// 			}
		// 			else
		// 			{
		// 				echo '<span class="fa fa-star" id="menuid_'.$row["id"].'" name="'.$row["id"].'"></span>';
		// 			}
		// 		}				
		// 	}
		// }
	
?>
</div>
<script>
	jQuery(document).ready(function($){
		jQuery(".fa-star").click(function(){
			var flavourId = $(this).attr("name");
			var selectedId = $(this).attr("id");
			var catergoryId = 1;
			$.ajax({
				type: "POST",
				url: "includes/wishlist.inc.php",
				data: { fId: flavourId, cId: catergoryId} ,
				}).done(function( msg ) {
					var target_star = document.getElementById(selectedId);
					if(msg == 0){
 						target_star.classList.remove("checked");
					}
					else if(msg == 1){
						target_star.classList.add("checked");
					}
			  	});	
			});
		});
	
</script>

<!--Footer-->
<?php include('templates/footer.php'); ?>

<!--Footer-->
<?php include('templates/footer.php');?>