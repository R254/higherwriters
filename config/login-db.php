<?php 

	$server = "localhost";
	$username = "root";
	$dbpass = "Masteryii2#";
	$dbname = "higherwriters";

	$conn = new mysqli($server, $username, $dbpass, $dbname);

		// Check connection
	if ($conn->connect_error) {
		die("connection failed: ".$conn->connect_error);
	}
 ?>