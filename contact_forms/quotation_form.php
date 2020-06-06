
<?php if (!isset($_SESSION)) {
	session_start();
}?>

<div id="form_container" class="contact-container" style="margin-top:30px;margin-bottom: 30px;">
	<div class="row mq-row">
		<div class="col-7 g-form">
			<div class="form-container">
				<h4>Quotation Form</h4>
				<hr class="eline">
				</hr>
				<br />
				<?php
					$name = "";
					$first_name = "";
					$last_name = "";
					if(isset($_SESSION['user_first']))
					{
						$first_name = $_SESSION['user_first'];
					}

					if(isset($_SESSION['user_last']))
					{
						$last_name = $_SESSION['user_last'];
					}

					$name = $first_name." ".$last_name;

				?>
			
				<form action="includes/quotation.inc.php" method="post" id="contact_form">
					<div class="form-group contact-group">
						<label for="quotation-name">Name*</label>
						<input type="text" name="quotation-name" id="quotation-name" class="require empty" value="<?php echo $name;?>">
					</div>
					<div class="form-group contact-group">
						<label for="quotation-email">Email*</label>
						<input type="email" name="quotation-email" id="quotation-email" class="require empty" value="<?php echo isset($_SESSION['userEmail']) ? $_SESSION['userEmail'] : ""; ?>">
					</div>
					<div class="form-group contact-group">
						<label for="quotation-contact">Contact Number*</label>
						<input type="text" maxlength="8" name="quotation-contact" id="quotation-contact" class="digits require empty"/>
					</div>
					<div class="form-group contact-group">
						<label for="quotation-size">Serving Size/Quantity</label>
						<input type="number" name="quotation-size" id="quotation-size" class="empty">
					</div>
				
					<?php if(isset($_SESSION['userUid'])): ?>
						<div class="form-group contact-group">
							<label for="quotation-option">Option</label>
							<select name="quotation-option" id="quotation-option" onchange="display_menu_form(this)">
								<option disabled <?php echo (empty($_GET["gId"])) ?  "selected" :  ""; ?> value="-1">Select an option</option>
								<option <?php echo (!empty($_GET["gId"])) ?  "selected" :  ""; ?> value="0">Wishlist</option>
								<option  value="1">Customize</option>
							</select>
						</div>

					<div id="wishlist-container">
						<div class="form-group contact-group form-wishlist" style="display: none;">
							<label for="quotation-wishlist">Wishlist Menu</label>
							<select name="quotation-wishlist" id="quotation-wishlist" onchange="display_menu_form(this)">
								<option disabled <?php echo (empty($_GET["gId"])) ?  "selected" :  ""; ?> value="-1">Select an option</option>
								<?php 
									if(!empty($_GET["gId"]))
									{
										include 'includes/display_account_wishlist.inc.php'; 
									} 
									else
									{
										include '../includes/display_account_wishlist.inc.php'; 
									}
								?>
							</select>
						</div>
					</div>
					<?php endif;?>

					<div id="customize-container">
						<div class="form-group contact-group form-customize" style="display: none;">
							<label for="quotation-category">Category</label>
							<select name="quotation-category" id="quotation-category">
								<option disabled selected value="-1">Select an option</option>
								<option value="cakes">Cakes</option>
								<option value="cupcakes">Cupcakes</option>
								<option value="desserts">Desserts</option>
							</select>
						</div>

						<div class="form-group contact-group form-customize" style="display: none;">
							
							<?php 
								if(!empty($_GET["gId"]))
								{
									include 'includes/display_quotation_menu.inc.php';
								} 
								else
								{
									include '../includes/display_quotation_menu.inc.php';
								}
							?>
							<div name="quotation-flavour" id="quotation-flavour">
							</div>	

						</div>
					</div>

					<div class="form-group contact-group">
						<label for="quotation-design">Cake Design</label>
						<textarea name="quotation-design" id="quotation-design" class="empty txtarea"></textarea>
					</div>
			
					<div class="form-group contact-group">
						<label for="">Date of Collection</label>
						<div style="margin-left:0px">
							<input type="checkbox" id="quotation-collection" name="quotation-collection" value="Self-Collection">
							<label for="quotation-collection">Self-Collection</label>
						</div>
						<div style="margin-left:0px;">						
							<input type="checkbox" id="quotation-delivery" name="quotation-collection" value="Delivery from $15">
							<label for="">Delivery from $15</label>
						</div>
					</div>
					<div class="form-group contact-group">
						<label for="">Additional Comments</label>
						<textarea name="quotation-comments" id="quotation-comments" class="empty txtarea"></textarea>
					</div>
					<input type="button" class="button" value="Submit" name="btn-submit" />
					<button class="button" type="submit" name="btn-quotation" style="display:none;">Submit</button>
				</form>
			</div>
		</div>

		<div class="col-5 g-img">
			<img src="http://localhost/butterytable/images/icon/quotation.jpg" width="450px" height="600px">
		</div>
	</div>
</div>

<script src="scripts/contact_validation.js"></script>