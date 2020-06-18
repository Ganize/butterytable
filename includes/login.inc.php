<?php
	if (isset($_POST['login'])) {
		//require will emit a fatal error ( E_COMPILE_ERROR ) and halt the script
		require 'db_conn.inc.php';

		$user_email = $_POST['user_email'];
		$password = $_POST['password'];


		if(empty($user_email) || empty($password) ) //Error when Empty Field
		{
			header("Location: ../login.php?error=emptyfield&&user_email=".$user_email."&&password=".$password);
			exit();
		}
		else
		{
			$sql =  "SELECT * FROM bt_user WHERE user_email= ?";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql))
			{
				//header("Location: ../login.php?error=sqlerror");
				exit();
			}
			else
			{
				mysqli_stmt_bind_param($stmt, "s", $user_email);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);

				if($row = mysqli_fetch_assoc($result)) //Fectching the data from result
				{
					$pwdCheck = password_verify($password, $row['password']);
					if($pwdCheck == false)
					{
						header("Location: ../login.php?error=wrongpwd");
						exit();
					}
					else if($pwdCheck == true)
					{
						session_start();
						$_SESSION['userEmail'] = $row['user_email'];
						$_SESSION['userUid'] = $row['user_id'];
						$_SESSION['user_role'] = $row['user_role'];

						$_SESSION['user_first'] = $row["first_name"];
						$_SESSION['user_last'] = $row["last_name"];
						header("Location: ../index.php?login=success");
						exit();
					}
					else
					{
						header("Location: ../login.php?error=wrongpwd");
						exit();
					}
				}
				else
				{
					header("Location: ../login.php?error=nouser");
					exit();
				}
				mysqli_stmt_close($stmt);
				mysqli_close($conn);


			}
		}
	}
	else
	{
		header("Location: ../login.php");
		exit();
	}
?>