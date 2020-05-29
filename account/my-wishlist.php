<?php 
session_start();

if(empty($_SESSION["user_role"]) || empty($_SESSION["userUid"]))
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
				<div class="wishlist-container">
						<div>
							MY WISHLIST
							<hr class="account-hr">
							<p>Uncheck the heart to remove the items from the wishlist</p>
						</div>
						<?php include("../includes/display_account_wishlist.inc.php"); ?>
				</div>
			</div>
		</div>
	</div>

<script>
	jQuery(document).ready(function($){
		jQuery(".fa-star").click(function(){
			var flavourId = $(this).attr("name");
			var selectedId = $(this).attr("id");
			var menu_id = 1;

			var current_host = window.location.href;

			$.ajax({
				type: "POST",
				url:   "../includes/wishlist.inc.php",
				data: { fId: flavourId, cId: menu_id} ,
				}).done(function( msg ) {
					console.log(msg);
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

<?php include('../templates/footer.php'); ?>
