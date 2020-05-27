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
<?php require 'includes/display_wishlist.inc.php'?>

</div>
<script>
	jQuery(document).ready(function($){
		jQuery(".fa-star").click(function(){
			var flavourId = $(this).attr("name");
			var selectedId = $(this).attr("id");
			var menu_id = 1;

			console.log("test");
			$.ajax({
				type: "POST",
				url: "includes/wishlist.inc.php",
				data: { fId: flavourId, cId: menu_id} ,
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

