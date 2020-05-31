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
					MEMBERS LIST
					<hr class="account-hr">
					<table width="100%" class="data-table">
					<tr>
						<th>ID</th>
						<th>Email</th>
						<th></th>
					</tr>
					  <?php require("../includes/display_member.inc.php");?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('../templates/footer.php'); ?>
