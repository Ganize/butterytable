<?php include('../templates/header.php'); ?>

	<div class="container" style="margin-bottom:10px;">
		<div class="account-grid">
			<?php include('user-nav.php'); ?>
			<div class="user-details">
				<div class="wishlist-container">
						<div>
							MY WISHLIST
							<hr class="account-hr">
						</div>
						<?php include("../includes/display_account_wishlist.inc.php"); ?>
				</div>
			</div>
		</div>
	</div>


<?php include('../templates/footer.php'); ?>
