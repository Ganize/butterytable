
<?php include('../templates/header.php'); ?>
<?php include('../includes/display_image_form.inc.php');?>
	<script src="<?php echo $link ?>/scripts/draganddrop.js"></script>
	<script src="<?php echo $link ?>/scripts/validation.js"></script>

	<div class="container" style="margin-bottom:10px;">
		<div class="account-grid">
		<?php include('user-nav.php'); ?>
			<div class="user-details">
				<div class="wishlist-container">
						<a href="<?php echo $link;?>account/update-images">Back to list </a>
						<br>
						<?php if(isset($_GET["gallery_id"])): ?>
							<div style="text-align: right;">
								Image ID: <?php echo $gallery_id;?>
								<hr class="account-hr hr-right">
							</div>
						<?php endif;?>
						<br>
						<form method="post" action="/butterytable/includes/gallery.inc.php?gallery_id=<?php echo $gallery_id;?>" enctype="multipart/form-data">

						<div class="uploader">
							<span class="upload-text">Upload Image </span>
							<?php
								$img_url = $link."/images/".$gallery_path;
							?>

							<?php if(isset($_GET["gallery_id"])): ?>
						   		<img src="<?php echo $img_url?>" class="upload_image" style="display:initial;"/>
						    <?php else: ?>
						    	<img src="" class="upload_image"/>
						    <?php endif;?>

						    <div class="filephoto-container">
						    	<input type="file" name="filePhoto" id="filePhoto" value="<?php echo $gallery_path;?>" />
							</div>
						</div>
						<div style="margin-bottom:20px;">
							<input type="button" id="upload_file" name="upload_file" class="button" value="Upload" />
							<input type="button" id="remove_file" name="remove_file" class="button" value="Remove" />
						</div>

						<div class="form-group account-group">
							<div>
								<label for="gallery_name">Item Name :</label>
							</div>
							<div>
								<input class="validation_text" style="width:300px;" type="text" name="gallery_name" id="gallery_name" value="<?php echo $gallery_name;?>"/>
							</div>
						</div>

						<div class="form-group account-group">
							<div>
								<label for="gallery_description">Description :</label>
							</div>
							<div>
								<textarea class="validation_text" name="gallery_description" style="width: 300px; resize: none; height: 150px;"><?php echo $gallery_description;?></textarea>
							</div>
						</div>

						<div class="form-group account-group">
							<div>
								<label for="pages">Pages :</label>
							</div>
							<div class="chkbox-list">

							<?php 
								$page = array("Home", "Gallery", "Menu");
								$result = explode(",", $gallery_page);
					
								foreach ($page as $i) {

									echo "<div>";
									if(in_array(strtolower($i), $result))
									{
										echo '<input type="checkbox" name="pages[]" value="'.strtolower($i).'" checked="checked" />';
									}
									else
									{
										echo '<input type="checkbox" name="pages[]" value="'.strtolower($i).'" />';
									}
									echo '<label style="margin-left: 5px;">'.$i.'</label>';
									echo "</div>";
								}
							?>
			
							</div>
						</div>

						<div class="form-group account-group">
							<div>
								<label for="category">Categories :</label>
							</div>
							<div class="chkbox-list">
							<?php 
								$result = explode(",", $gallery_category);
								$page = array("Slideshow", "Gallery", "Posts");

								foreach ($page as $i) {
									echo "<div>";
									if(in_array(strtolower($i), $result))
									{
										echo '<input type="checkbox" name="category[]" value="'.strtolower($i).'" checked="checked"/>';
									}
									else
									{
											echo '<input type="checkbox" name="category[]" value="'.strtolower($i).'" />';
									}
								
									echo '<label style="margin-left: 5px;">'.$i.'</label>';
									echo "</div>";
								}
							?>
							</div>
						</div>
				
					<?php if(isset($_GET["gallery_id"])): ?>
				   		<input style="display:flex;margin:auto;margin-top:20px;" type="button" class="button" id="btn_upload" value = "Update"/>
				    <?php else: ?>
				    	<input style="display:flex;margin:auto;margin-top:20px;" type="button" class="button" id="btn_upload" value = "Add"/>
				    <?php endif;?>
				
					<button style="display: none;" class="button" type="submit" id="submit_form" name="submit">UPDATE</button>
					</form>
				</div>
			</div>
		</div>
	</div>


<?php include('../templates/footer.php'); ?>
