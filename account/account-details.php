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
else if(empty($_GET["user_id"]))
{
	header("Location: member-list.php?error=no_user");
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
				<div class="wishlist-container">
						<a href="<?php echo $link;?>account/member-list">Back to list</a>
						<div>
							User Info
							<hr class="account-hr">
							<?php require("../includes/display_member.inc.php");?>
							<br>
							User Address
							<hr class="account-hr">

							<?php require("../includes/display_account_address.inc.php");?>
						</div>
						<br>
						<div>
							 Wishlist
							<hr class="account-hr">	
						</div>
						<?php include("../includes/display_account_wishlist.inc.php"); ?>
				</div>
			</div>
		</div>
	</div>



<?php include('../templates/footer.php'); ?>
