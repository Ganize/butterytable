<?php
	if (isset($_POST['login'])) {
		//require will emit a fatal error ( E_COMPILE_ERROR ) and halt the script
		require 'db_conn.inc.php';

		$user_name = $_POST['user_name'];
		$password = $_POST['password'];


		if(empty($user_name) || empty($password) ) //Error when Empty Field
		{
			header("Location: ../login/login.php?error=emptyfield");
			exit();
		}
		else
		{
			$sql =  "SELECT * FROM bt_user WHERE user_name= ?";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql))
			{
				header("Location: ../login/login.php?error=sqlerror");
				exit();
			}
			else
			{
				mysqli_stmt_bind_param($stmt, "s", $user_name);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);

				if($row = mysqli_fetch_assoc($result)) //Fectching the data from result
				{
					$pwdCheck = password_verify($password, $row['password']);
					if($pwdCheck == false)
					{
						header("Location: ../login/login.php?error=wrongpwd");
						exit();
					}
					else if($pwdCheck == true)
					{
						session_start();
						$_SESSION['userId'] = $row['user_name'];
						$_SESSION['userUid'] = $row['user_id'];
						$_SESSION['userEmail'] = $row['email'];

						header("Location: ../login/login.php?login=success");
						exit();
					}
					else
					{
						header("Location: ../login/login.php?error=wrongpwd");
						exit();
					}
				}
				else
				{
					header("Location: ../login/login.php?error=nouser");
					exit();
				}
			}
		}
	}
	else
	{
		header("Location: ../login/login.php");
		exit();
	}
?>