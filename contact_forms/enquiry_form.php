
<link rel="stylesheet" href="css/enquiry.css" type="text/css">
<div class="rec-container">
	<div class="form-container">
		<div>Enquiry Form</div>
		<form action="includes/enquiry.inc.php" method="post">
			<div class="form-group contact-group">
				<label for="enquiry-name">Name*</label>
				<input type="text" name="enquiry-name" id="enquiry-name">
			</div>
			<div class="form-group contact-group">
				<label for="enquiry-email">Email*</label>
				<input type="email" name="enquiry-email" id="enquiry-email">
			</div>
			<div class="form-group contact-group">
				<label for="enquiry-contact">Contact Number*</label>
				<input type="number" name="enquiry-contact" maxlength="8"  id="enquiry-contact">
			</div>
			<div class="form-group contact-group">
				<label for="enquiry-subject">Subject</label>
				<input type="text" name="enquiry-subject" id="enquiry-subject">
			</div>
			<div class="form-group contact-group">
				<label for="enquiry-message">Message</label>
				<textarea name="enquiry-message" id="enquiry-message"></textarea>
			</div>
			<button class="btn" type="submit" name="btn-enquiry" >Submit</button>
		</form>
	</div>
</div>