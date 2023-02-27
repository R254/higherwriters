<?php
	session_start();
	require_once('login-db.php');
	
	$message 	= "";
	$role 		= "";

	if (isset($_POST['login'])) {

		$email 	= $_POST['email'];
		$pass 	= sha1($_POST['pass']);

		$query = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass'";

		$result = mysqli_query($conn,$query);


		if (mysqli_num_rows($result) > 0 ) 
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				if ($row['role'] == 'writer') {
					$_SESSION['WriterUser'] = $row['email'];
					$_SESSION['role'] = $row['role'];
					header('Location: ../writer.php');
				}
				elseif ($row['role'] == 'client'){
					$_SESSION['ClientUser'] = $row['email'];
					$_SESSION['role'] = $row['role'];
					header('Location: ../client.php');
				}elseif ($row['role'] == 'admin') {
					$_SESSION['AdminUser'] = $row['f_name'];
					$_SESSION['role'] = $row['role'];
					header('Location: ../dashboard.php');
				}
				else{
					header('Location: ../index.php');
				}
			}
		}
		else{
		header('Location: ../login.php');
	}

	}


?>