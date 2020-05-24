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


// function openCon()
// {
// 	$servername = "localhost";
// 	$dbuser = "root";
// 	$dbpass = "";
// 	$db = "db_butterfly";
// 	$conn = new mysqli($servername, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
// 	return $conn;
// }


// function closeCon($conn)
// {
// 	$conn -> close();
// }

?>