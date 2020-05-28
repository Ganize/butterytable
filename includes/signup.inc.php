<?php
if (isset($_POST['register_user'])) {
	//require will emit a fatal error ( E_COMPILE_ERROR ) and halt the script
	require 'db_conn.inc.php';

	$user_email = $_POST['user_email'];
	$password = $_POST['password'];
	$passwordRepeat = $_POST['password-repeat'];

	if (empty($user_email) || empty($password)) //Error when Empty Field
	{
		header("Location: ../login/signup.php?error=emptyfield&email=" . $user_email);
		exit();
	} else if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) //Error when not email
	{
		header("Location: ../login/signup.php?error=invalidemail&email=" . $user_email);
		exit();
	}
	// else if(!preg_match("")) // User registeration regex
	// {
	// 	header("Location: ../login/signup.php?error=invaliduid&=uid=".$user_name);
	// 	exit();
	// }
	else if ($password != $passwordRepeat) 
	{
		header("Location: ../login/signup.php?error=passwordcheckuid&email=" . $user_email);
		exit();
	} 
	else 
	{
		$sql = "SELECT user_email FROM bt_user WHERE user_email=?"; //Check username exists
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../login/signup.php?error=sqlerror1");
			exit();
		} else {
			mysqli_stmt_bind_param($stmt, "s", $user_email); //Prepare statement
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);

			$resultCheck = mysqli_stmt_num_rows($stmt); //Check if there is any row
			if ($resultCheck > 0) {
				header("Location: ../login/signup.php?error=usertaken&mail=" . $user_email);
				exit();
			} 
			else 
			{
				$sql = "INSERT INTO bt_user (user_email, password, user_role) VALUES (?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) 
				{
					header("Location: ../login/signup.php?error=sqlerror2");
					exit();
				}
				else 
				{
					$hash_password = password_hash($password, PASSWORD_DEFAULT); //Use password_hash
					mysqli_stmt_bind_param($stmt, "sss", $user_email, $hash_password, 'guest'); //Prepare statement
					mysqli_stmt_execute($stmt);


					$sql =  "SELECT * FROM bt_user WHERE user_email= ?";
					$stmt = mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt, $sql))
					{
						header("Location: ../login.php?error=signupfail");
						exit();
					}
					else
					{
						mysqli_stmt_bind_param($stmt, "s", $user_email);
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);

						if($row = mysqli_fetch_assoc($result)) //Fectching the data from result
						{
							session_start();
							$_SESSION['userEmail'] = $row['user_email'];
							$_SESSION['userUid'] = $row['user_id'];
							$_SESSION['user_role'] = $row['user_role'];
				
							header("Location: ../index.php?signup=success");
							exit();
						}
					}
					mysqli_stmt_close($stmt);
					mysqli_close($conn);
				}
			}
		}
	}
}
else 
{
	header("Location: ../login/signup.php");
	exit();
}
?>