<?php

	$servername = "localhost";
	$dbUser = "root";
	$dbPass = "";
	$dbName = "db_butterfly";
	
	$conn = new mysqli($servername, $dbUser, $dbPass,$dbName);

	if(!$conn)
	{
		die("Connect failed: %s\n". $conn -> error);
	}
?>