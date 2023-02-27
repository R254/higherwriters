 <?php

	$db_user = "root";
	$db_pass = "Masteryii2#";
	$db_name = "higherwriters";

	$conn = new PDO('mysql:host=localhost;dbname='. $db_name. ';charset=utf8', $db_user, $db_pass);

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>