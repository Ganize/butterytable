<?php

	$servername = "localhost";
	$dbUser = "butteryt_butterfly";
	$dbPass = "buttery9597!";
	$dbName = "butteryt_butterfly";
	
	$conn = new mysqli($servername, $dbUser, $dbPass,$dbName);

	if(!$conn)
	{
		die("Connect failed: %s\n". $conn -> error);
	}


	 require_once("function.php");
?>