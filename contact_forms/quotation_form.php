<!-- Header-->
<?php include('../templates/header.php'); ?>
<link rel="stylesheet" href="../css/quotation.css" type="text/css">

<a href="#" class="button">Enquiry</a>

<a href="#" class="button">quotation</a>

<div class="container">
	<div class="row">
		<div class="col-6">
			<div class="form-container">
				<h4>Quotation Form</h4>
				<hr class="eline">
				</hr>
				<br />
				<form action="includes/quotation.inc.php" method="post">
					<div class="form-group contact-group">
						<label for="quotation-name">Name*</label>
						<input type="text" name="quotation-name" id="quotation-name">
					</div>
					<div class="form-group contact-group">
						<label for="quotation-email">Email*</label>
						<input type="email" name="quotation-email" id="quotation-email">
					</div>
					<div class="form-group contact-group">
						<label for="quotation-contact">Contact Number*</label>
						<input type="text" maxlength="8" name="quotation-contact" id="quotation-contact">
					</div>
					<div class="form-group contact-group">
						<label for="quotation-size">Serving Size/Quantity</label>
						<input type="number" name="quotation-size" id="quotation-size">
					</div>
					<div class="form-group contact-group">
						<label for="quotation-category">Category</label>
						<select name="quotation-category" id="quotation-category">
							<option value="test1">test1</option>
							<option value="test2">test2</option>
						</select>
					</div>
					<div class="form-group contact-group">
						<label for="quotation-flavour">Cake Flavour</label>
						<select name="quotation-flavour" id="quotation-flavour">
							<option value="test3">test3</option>
							<option value="test4">test4</option>
						</select>
					</div>
					<div class="form-group contact-group">
						<label for="">Cake Design</label>
						<textarea name="quotation-design" id="quotation-design"></textarea>
					</div>
					<div class="form-group contact-group">
						<label for="">Date of Collection</label>
						<input type="checkbox" id="quotation-collection" name="quotation-collection" value="Self-Collection">
						<input type="checkbox" id="quotation-delivery" name="quotation-collection" value="Delivery from $15">
					</div>
					<div class="form-group contact-group">
						<label for="">Additional Comments</label>
						<textarea name="quotation-comments" id="quotation-comments"></textarea>
					</div>
					<button class="btn button" type="submit" name="btn-quotation">Submit</button>
				</form>
			</div>
		</div>
		<div class="col-6">
			<img src="../images/icon/quotation.jpg" width="450px" height="600px">
		</div>
		<div>
		</div>
	</div>

	<?php include('../templates/footer.php'); ?>