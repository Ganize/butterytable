<?php
session_start();

if (empty($_SESSION["user_role"]) || empty($_SESSION["userUid"])) {
	header("Location: ../404.php");
	exit();
} else if ($_SESSION["user_role"] != "ujiz4_admin") {
	header("Location: ../404.php");
	exit();
} else {
	include('../templates/header.php');
}

?>


<div class="container" style="margin-bottom:10px;">
	<div class="account-grid">
		<?php include('user-nav.php'); ?>

		<div class="user-details">
			<div class="account-container" style="border: 1px solid #C18570;">
				<div style="font-family:myGeorgia; color:#726061; font-weight:bold; font-size:20px;"> 
					UPDATE IMAGES
				</div>
				<div>
					<hr class="account-hr">
					<div style="font-family:myGeorgia; color:#707070; font-style: italic; font-size:15px;">
						Update site images here.
					</div>
					<br />
					<table width="100%" class="data-table">
						<tr style="color:#726061;">
							<th>ID</th>
							<th>Item Name</th>
							<th>Page</th>
							<th>Category</th>
							<th></th>
						</tr>
						<?php require("../includes/display_account_image.inc.php"); ?>
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