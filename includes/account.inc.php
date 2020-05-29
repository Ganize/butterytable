<?php
	if (isset($_POST['update_user'])) 
	{
		//require will emit a fatal error ( E_COMPILE_ERROR ) and halt the script
		require 'db_conn.inc.php';
		session_start();

		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];

		$current_pass = $_POST['current_pass'];
		$password = $_POST['password'];
		$password_repeat = $_POST['password_repeat'];

		$url = "";


		$sql =  "UPDATE bt_user SET first_name = ?, last_name = ?, user_email = ? WHERE user_id =?;";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql))
		{
			header("Location: ../account/my-account.php?error=sqlerror");
			exit();
		}
		else
		{
			mysqli_stmt_bind_param($stmt, "sssi", $first_name, $last_name, $email, $_SESSION["userUid"]);
			mysqli_stmt_execute($stmt);

			$_SESSION['userEmail'] = $email;
		}
		

		if(!empty($current_pass))
		{
			if(empty($password) || empty($password_repeat))
			{
				header("Location: ../account/my-account.php?error=emptyfield");
				exit();
			}
			else if($password !== $password_repeat)
			{
				header("Location: ../account/my-account.php?error=mismatch");
				exit();
			}
			else
			{
				$sql = "SELECT password FROM bt_user WHERE user_id = ?;";
				$stmt = mysqli_stmt_init($conn);

				if(!mysqli_stmt_prepare($stmt, $sql))
				{
					header("Location: ../account/my-account.php?error=sqlerror");
					exit();
				}
				else
				{
					mysqli_stmt_bind_param($stmt, "i", $_SESSION["userUid"]);
					mysqli_stmt_execute($stmt);

					$result = mysqli_stmt_get_result($stmt);

					if($row = mysqli_fetch_assoc($result)) //Fectching the data from result
					{
						$pwdCheck = password_verify($current_pass, $row['password']);

						if($pwdCheck == false)
						{
							header("Location:  ../account/my-account.php?error=wrongpwd");
							exit();
						}
						else if($pwdCheck == true)
						{
							$sql =  "UPDATE bt_user SET password = ? WHERE user_id =?;";
							$stmt = mysqli_stmt_init($conn);

							if(!mysqli_stmt_prepare($stmt, $sql))
							{
								header("Location: ../account/my-account.php?error=sqlerror");
								exit();
							}
							else
							{
								$hash_password = password_hash($password, PASSWORD_DEFAULT); //Use password_hash
								mysqli_stmt_bind_param($stmt, "si", $hash_password, $_SESSION["userUid"]);
								mysqli_stmt_execute($stmt);
							}
						}
					}
					else
					{
						header("Location: ../account/my-account.php?erro=no_such_user");
						exit();
					}
				}
			}
		}	

		header("Location: ../account/my-account.php?update=success");
		exit();	
	}
	else
	{
		header("Location: ../account/my-account.php?update=fail");
		exit();
	}
?>