

<?php 
session_start();

if($_SESSION["user_role"] == "ujiz4_guest")
{
	header("Location: ../index.php");
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
					MEMBERS LIST
					<hr class="account-hr">
					  <?php require("../includes/display_member.inc.php");?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('../templates/footer.php'); ?>
