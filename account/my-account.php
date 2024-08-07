<?php
session_start();

if (empty($_SESSION["user_role"]) || empty($_SESSION["userUid"])) {
	header("Location: ../login.php");
	exit();
} else {
	include('../templates/header.php');
}

?>

<?php include('../includes/display_account.inc.php'); ?>
<?php include('../includes/display_account_address.inc.php'); ?>
<script src="<?php echo $link ?>/scripts/account.js"></script>

<div class="container" style="margin-bottom:10px; height:100vh;">
	<div class="account-grid">
		<?php include('user-nav.php'); ?>

		<div class="user-details">
			<div class="account-container">
				<form action="../includes/account.inc.php" method="post">
					<div>
						<div style="font-family:myGeorgia; color:#726061; font-weight:bold; font-size:20px;">
							MY ACCOUNT
						</div>
						<hr class="account-hr">
						<div class="name-container">
							<div class="account-last-name">
								<label for="last_name">Last Name :</label>
								<div>
									<input class="account-border-style" type="text" name="last_name" id="last_name" value="<?php echo $user_last; ?>" />
								</div>
							</div>
							<div class="account-first-name">
								<label for="first_name">First Name :</label>
								<div>
									<input class="account-border-style" type="text" name="first_name" id="first_name" value="<?php echo $user_first; ?>" />
								</div>
							</div>
						</div>
						<br />
						<div>
							<div class="account-label">
								<label for="email">Email :</label>
							</div>
							<div>
								<input style="width:300px; " type="email" name="email" id="email" value="<?php echo $user_email; ?>" />
							</div>
						</div>

						<div style="margin-top:30px; font-family:myGeorgia; color:#726061; font-weight:bold; font-size:20px;">
							MY ADDRESS
						</div>
						<hr class="account-hr">
						<div>
							<div class="account-label">
								<label for="address_1">Address :</label>
							</div>
							<div>
								<input style="width:300px; display:block;" class="account-border-style" type="text" name="address_1" id="address_1" value="<?php echo $address_1; ?>" />
								<input style="width:300px; display:block;" class="account-border-style" type="text" name="address_2" id="address_2" value="<?php echo $address_2; ?>" />
							</div>
						</div>

						<div>
							<div class="account-label">
								<label for="user_floor">Unit Number :</label>
							</div>
							<div>
								#
								<input style="width:40px;" class="account-border-style" type="text" name="user_floor" class="digits" id="user_floor" value="<?php echo $user_floor; ?>" />
								-
								<input style="width:40px;" class="account-border-style" type="text" name="user_unit" class="digits" id="user_unit" value="<?php echo $user_unit; ?>" />
							</div>
						</div>

						<div>
							<div class="account-label">
								<label for="user_postal">Postal Code :</label>
							</div>
							<div>
								<input class="account-border-style" type="text" name="user_postal" maxlength="6" class="digits" id="user_postal" value="<?php echo $user_postal; ?>" />
							</div>
						</div>

						<div style="margin-top:30px; font-family:myGeorgia; color:#726061; font-weight:bold; font-size:20px;">
							CHANGE PASSWORD
						</div>
						<hr class="account-hr">
						<div>
							<div class="account-label">
								<label for="current_pass">Current Password :</label>
							</div>
							<div>
								<input class="account-border-style" type="password" name="current_pass" id="current_pass" />
							</div>
						</div>
						<div>
							<div class="account-label">
								<label for="new_pass">New Password :</label>
							</div>
							<div>
								<input class="account-border-style" type="password" name="new_password" id="new_password" />
							</div>
						</div>
						<div>
							<div class="account-label">
								<label for="password-repeat">Confirm Password :</label>
							</div>
							<div>
								<input class="account-border-style" type="password" name="repeat_password" id="repeat_password">
								<span class="pass-validation"></span>
							</div>
							<input type="button" style="display:flex;margin:auto;margin-top:20px;" id="btn_update" class="button" type="submit" name="update_user" value="UPDATE" />

							<button style="display:none" id="submit_form" class="button" type="submit" name="update_user">UPDATE</button>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<?php include('../templates/footer.php'); ?>