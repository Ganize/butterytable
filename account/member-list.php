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
			<div class="account-container">
				<div style="font-family:myGeorgia; color:#726061; font-weight:bold; font-size:20px;">
					MEMBERS LIST
				</div>
				<div>
					<hr class="account-hr">
					<div style="font-family:myGeorgia; color:#707070; font-style: italic; font-size:15px;">
						View and update your member information here.
					</div>
					<br />
					<table width="100%" class="data-table">
						<tr style="color:#726061;">
							<th>ID</th>
							<th>Email</th>
							<th></th>
						</tr>
						<?php require("../includes/display_member.inc.php"); ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('../templates/footer.php'); ?>