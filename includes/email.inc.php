<?php
	if(!isset($_POST['submit']))
	{
		echo "error, you need to submit the form!";
	}

	// $name = $_POST['name'];
	// $visitor_email = $_POST['email'];
	// $message = $_POST['message'];

	// //Validate first
	// if(empty($name) || empty($visitor_email))
	// {
	// 	echo "Name and email are mandatory!";
	// 	exit();
	// }

	$email_form = "huijie_1995@hotmail.com"; //Your email address
	$email_subject ="New Form Submission";
	$email_body = "You have received a new message";
	$to = "huijie_1995@hotmail.com";
	$headers = "From: ";

	//Send the emaild
	mail($to, $email_subject, $email_body, $headers);
?>