<?php
	include('../db_connection.php');
// initialize variables
	$user_name = "";
	$password = "";
	$email = "";

	if (isset($_POST['register_user'])) {
		$user_name = $_POST['user_name'];
		$password = hash('sha512', $_POST['password']);
		$email = $_POST['email'];

		echo($user_name);
		echo($password);
		echo($email);

		mysqli_query(openCon(), "INSERT INTO user (user_name, password, email) VALUES ('$user_name', '$password', '$email')");
		header("Location: /butterytable/index.php ");
	}
?>