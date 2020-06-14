<?php if (!isset($_SESSION)) {
	session_start();
}?>
<div id="form_container" class="contact-container" style="margin-top:30px;margin-bottom: 30px;">
	<div class="row me-row">
		<div class="col-7 g-form">
			<div class="form-container">
				<h4>Enquiry Form</h4>
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
				<form action="includes/enquiry.inc.php" method="post" id="contact_form">
					<div class="form-group contact-group">
						<label for="enquiry-name">Name*</label>
						<input type="text" name="enquiry-name" id="enquiry-name" class="require <?php echo ($name == " ") ? "empty" : "" ;?>" value="<?php echo $name;?>"/>
					</div>
					<div class="form-group contact-group">
						<label for="enquiry-email">Email*</label>
						<input type="email" name="enquiry-email" id="enquiry-email" class="require <?php echo isset($_SESSION['userEmail']) ? "" : "empty";?>" value="<?php echo isset($_SESSION['userEmail']) ? $_SESSION['userEmail'] : ""; ?>"/>
					</div>
					<div class="form-group contact-group">
						<label for="enquiry-contact">Contact Number*</label>
						<input type="text" name="enquiry-contact" maxlength="8" id="enquiry-contact" class="require digits empty"/>
					</div>
					<div class="form-group contact-group">
						<label for="enquiry-subject">Subject</label>
						<input type="text" name="enquiry-subject" id="enquiry-subject" class="empty"/>
					</div>
					<div class="form-group contact-group">
						<label for="enquiry-message">Message</label>
						<textarea name="enquiry-message" id="enquiry-message" class="empty txtarea"></textarea>
					</div>
					<input type="button" class="button" value="Submit" name="btn-submit" />
					<button class="button" type="submit"  class="submit" name="btn-enquiry" id="btn-enquiry" style="display:none;">Submit</button>
				</form>
			</div>
		</div>
		<div class="col-5 g-img">
			<img src="https://butterytablebakery.com/images/icon/enquiry.jpg" width="450px" height="450px">
		</div>
	</div>
</div>

<script src="scripts/contact_validation.js"></script>