<?php 
session_start();

if(empty($_SESSION["user_role"]) || empty($_SESSION["userUid"]))
{
	header("Location: ../login.php");
	exit();
}
else
{
	include('../templates/header.php');
}

?>

<?php include('../includes/display_account.inc.php');?>

<div class="container" style="margin-bottom:10px; height:100vh;">
	<div class="account-grid">
		<?php include('user-nav.php'); ?>
	
		<div class="user-details">
			<div class="account-container">
				<form action="../includes/account.inc.php" method="post">
					<div>
						MY ACCOUNT
						<hr class="account-hr">
						<div>
							<div style="float:right;">
								<label for="last_name">Last Name :</label>	
								<div>
									<input type="text" name="last_name" id="last_name" value="<?php echo $user_last;?>">
								</div>
							</div>
							<div>
									<label for="first_name">First Name :</label>
								<div>
									<input type="text" name="first_name" id="first_name" value="<?php echo $user_first;?>">
								</div>
							</div>
						</div>

	

						<div>
							<div>
								<label for="email">Email :</label>
							</div>
							<div>
								<input style="width:300px;" type="email" name="email" id="email" value="<?php echo $user_email;?>">
							</div>
						</div>
					<div style="margin-top:30px;">
						CHANGE PASSWORD
					</div>
						<hr class="account-hr">
							<div>
								<div>
									<label for="current_pass">Current Password :</label>
								</div>
								<div>
									<input type="password" name="current_pass" id="current_pass">
								</div>
							</div>
							<div>
								<div>
									<label for="new_pass">New Password :</label>
								</div>
								<div>
									<input type="password" name="password" id="password">
								</div>
							</div>
							<div>
								<div>
									<label for="password-repeat">Confirm Password :</label>
								</div>
								<div>
									<input type="password" name="password_repeat" id="password">
								</div>
							</div>
							<button style="display:flex;margin:auto;margin-top:20px;" class="button" type="submit" name="update_user">UPDATE	</button>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('../templates/footer.php'); ?>
