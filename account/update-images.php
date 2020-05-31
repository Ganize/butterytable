<?php 
session_start();

if(empty($_SESSION["user_role"]) || empty($_SESSION["userUid"]))
{
	header("Location: ../404.php");
	exit();
}
else if($_SESSION["user_role"] != "ujiz4_admin")
{
	header("Location: ../404.php");
	exit();
}
else
{
	include('../templates/header.php');
}

?>


<div class="container" style="margin-bottom:10px;">
	<div class="account-grid">
		<?php include('user-nav.php'); ?>
	
		<div class="user-details">
			<div class="account-container">
				<div>
					UPDATE IMAGES
					<hr class="account-hr">
					<div>
						Update site images here.
					</div>
					<table width="100%" class="data-table">
					<tr>
						<th>ID</th>
						<th>Item Name</th>
						<th>Page</th>
						<th>Category</th>
						<th></th>
					</tr>
					  <?php require("../includes/display_account_image.inc.php");?>
					</table>
					<div class="image_btn_container" style="margin-top: 20px; display: flex; justify-content: center;">
						<a href="image-form" class="button">Add</a>
						<a href="#" class="button">Delete</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('../templates/footer.php'); ?>
