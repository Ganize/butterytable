
<?php include('../templates/header.php'); ?>
	<script src="<?php echo $link ?>/scripts/draganddrop.js"></script>

	<div class="container" style="margin-bottom:10px;">
		<div class="account-grid">
		<?php include('user-nav.php'); ?>
			<div class="user-details">
				<div class="wishlist-container">
						<a href="<?php echo $link;?>account/update-image">Back to list </a>
						<div>
							Image ID: ?
							<hr class="account-hr">
						</div>
						<br>
						<form method="post" action="/butterytable/includes/gallery.inc.php" enctype="multipart/form-data">
						 <!--    <input type="file" name="imagefile">
						    <br />
						    <input type="submit" name="submit" value="upload"> -->

						<div class="uploader">
							<span class="upload-text">Upload Image </span>
						    <img src="" class="upload_image"/>
						    <div class="filephoto-container">
						    	<input type="file" name="filePhoto"  id="filePhoto" />
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
								<input style="width:300px;" type="text" name="gallery_name" id="gallery_name" value=""/>
							</div>
						</div>

						<div class="form-group account-group">
							<div>
								<label for="gallery_description">Description :</label>
							</div>
							<div>
								<textarea name="gallery_description" style="width: 300px; resize: none; height: 150px;"></textarea>
							</div>
						</div>

						<div class="form-group account-group">
							<div>
								<label for="pages">Pages :</label>
							</div>
							<div class="chkbox-list">

							<?php 
								$page = array("Home", "Gallery", "Menu");
								foreach ($page as $i) {
									echo "<div>";
									echo '<input type="checkbox" name="pages[]" value="'.strtolower($i).'" />';
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
								$page = array("Slideshow", "Gallery", "Posts");
								foreach ($page as $i) {
									echo "<div>";
									echo '<input type="checkbox" name="category[]" value="'.strtolower($i).'" />';
									echo '<label style="margin-left: 5px;">'.$i.'</label>';
									echo "</div>";
								}
							?>
							</div>
						</div>

					<button style="display:flex;margin:auto;margin-top:20px;" class="button" type="submit" name="submit">UPDATE</button>
					</form>
				</div>
			</div>
		</div>
	</div>


<?php include('../templates/footer.php'); ?>
