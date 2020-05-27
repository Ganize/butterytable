<?php
	if (isset($_POST['btn-enquiry'])) {
		//require will emit a fatal error ( E_COMPILE_ERROR ) and halt the script
		require 'db_conn.inc.php';

		$enquiry_name = $_POST['enquiry-name'];
		$enquiry_email = $_POST['enquiry-email'];
		$enquiry_contact = $_POST['enquiry-contact'];
		$enquiry_subject = $_POST['enquiry-subject'];
		$enquiry_message = $_POST['enquiry-message'];
		

		if(empty($enquiry_name) || empty($enquiry_email) || empty($enquiry_contact) || empty($enquiry_subject)  || empty($enquiry_message) ) //Error when Empty Field
		{
			header("Location: ../contact-us.php?error=emptyfield");
			exit();
		}
		else if(!filter_var($enquiry_email, FILTER_VALIDATE_EMAIL)) //Error when not email
		{
			header("Location: ../contact-us.php?error=invalidemail");
			exit();
		}
		else if(!is_numeric($enquiry_contact)) //Error when not email
		{
			header("Location: ../contact-us.php?error=invalidcontact");
			exit();
		}
		else
		{
			$sql = "INSERT INTO bt_enquiry (enquiry_name, enquiry_email, enquiry_contact, enquiry_subject, enquiry_message, enquiry_datetime) VALUES (?, ? ,?,?,?,?)" ;
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql))
			{
				header("Location: ../contact-us.php?error=sqlerror");
				exit();
			}
			else
			{
				date_default_timezone_set('Asia/Singapore');
				$date = date('Y-m-d H:i:s');
				mysqli_stmt_bind_param($stmt, "ssisss", $enquiry_name, $enquiry_email, $enquiry_contact,$enquiry_subject, $enquiry_message, $date); //Prepare statement
				mysqli_stmt_execute($stmt);
				header("Location: ../contact-us.php?result=success");
				exit();
			}
		}
	}
	else
	{
		header("Location: ../index.php");
		exit();
	}
?>