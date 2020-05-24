<?php
	if (isset($_POST['register_user'])) {
		//require will emit a fatal error ( E_COMPILE_ERROR ) and halt the script
		require 'db_conn.inc.php';
		
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$passwordRepeat = $_POST['password-repeat'];
		$email = $_POST['email'];

		if(empty($user_name) || empty($password) || empty($email)) //Error when Empty Field
		{
			header("Location: ../login/signup.php?error=emptyfield&=uid=".$user_name."&email=".$email);
			exit();
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) //Error when not email
		{
			header("Location: ../login/signup.php?error=invalidemail&=uid=".$user_name);
			exit();
		}
		// else if(!preg_match("")) // User registeration regex
		// {
		// 	header("Location: ../login/signup.php?error=invaliduid&=uid=".$user_name);
		// 	exit();
		// }
		else if($password != $passwordRepeat)
		{
			header("Location: ../login/signup.php?error=passwordcheckuid&=uid=".$user_name."&email=".$email);
			exit();
		}
		else
		{
			$sql = "SELECT user_name FROM user WHERE user_name=?"; //Check username exists
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql))
			{
				header("Location: ../login/signup.php?error=sqlerror");
				exit();
			}
			else
			{
				mysqli_stmt_bind_param($stmt, "s", $user_name); //Prepare statement
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);

				$resultCheck = mysqli_stmt_num_rows($stmt); //Check if there is any row
				if($resultCheck > 0)
				{
					header("Location: ../login/signup.php?error=usertaken&mail=".$email);
					exit();
				}
				else
				{
					$sql = "INSERT INTO user (user_name, password, email) VALUES (?, ? ,?)" ;
					$stmt = mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt, $sql))
					{
						header("Location: ../login/signup.php?error=sqlerror");
						exit();
					}
					else
					{
						$hash_password = password_hash($password, PASSWORD_DEFAULT); //Use password_hash
						mysqli_stmt_bind_param($stmt, "sss", $user_name, $hash_password, $email); //Prepare statement
						mysqli_stmt_execute($stmt);
						header("Location: ../login/signup.php?signup=success");
						exit();
					}
				}
				mysqli_stmt_close($stmt);
				mysqli_close($conn);
			}
		}

	}
	else
	{
		header("Location: ../login/signup.php");
		exit();
	}
?>

