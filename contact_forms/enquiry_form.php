
<div id="form_container">
<input type="button" class="button" id="btnEnquiry" value="Enquiry"/>

<input type="button" class="button" id="btnQuotation" value="Quotation"/>

<br />

<link rel="stylesheet" href="http://localhost/butterytable/css/enquiry.css" type="text/css">

<div class="container">
	<div class="row">
		<div class="col-6">
			<div class="form-container">
				<h4>Enquiry Form</h4>
				<hr class="eline">
				</hr>
				<br />
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
						<input type="number" name="enquiry-contact" maxlength="8" id="enquiry-contact">
					</div>
					<div class="form-group contact-group">
						<label for="enquiry-subject">Subject</label>
						<input type="text" name="enquiry-subject" id="enquiry-subject">
					</div>
					<div class="form-group contact-group">
						<label for="enquiry-message">Message</label>
						<textarea name="enquiry-message" id="enquiry-message"></textarea>
					</div>
					<button class="btn button" type="submit" name="btn-enquiry">Submit</button>
				</form>
			</div>
		</div>
		<div class="col-6">
			<img src="http://localhost/butterytable/images/icon/enquiry.jpg" width="450px" height="450px">
		</div>
	</div>
</div>