<?php

session_start();
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] != 'writer') {
        if ($_SESSION['role'] != 'client') {
            header('Location: dashboard.php');
        } else {
            header('Location: client.php');
        }

    }
    // Here the writer page is executed since the role is writer
} else {
    header('Location: index.php');
}

require_once './config/db.php';

// Checks if user id is not set and redirects if it is not set.
if (!isset($_GET['user_id'])){
	header('Location:writer.php');
}

//The get method below gets user_id and store it as a variable to be used within the if statement
if (isset($_GET['user_id'])) {
	$user_id = $_GET['user_id'];

	// Updates the database with all the fields from the form fetch with post method.
	if (isset($_POST['update'])) {
	    $f_name = $_POST['f_name'];
	    $l_name = $_POST['l_name'];
	    $country = $_POST['country'];
	    $proffession = $_POST['proffesion'];
	    $desc = $_POST['description'];

	    $sql = "UPDATE users SET f_name=?,l_name=?,country=?,proffession=?,description=? WHERE user_id=?";
		
	    $stmt = $conn->prepare($sql);

	    $results = $stmt->execute([$f_name, $l_name, $country, $proffession, $desc,$user_id]);

	    if ($results == true) {
	    	header('refresh:2; url=writer.php');
	    }
	}

	// Fetching the data from the databases to be used to check and make corrections on all fields.
	$sql = "SELECT * FROM users WHERE user_id='$user_id' AND role='writer'";

    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
        	$user_id = $row->user_id;
            $f_name = $row->f_name;
            $l_name = $row->l_name;
            $country = $row->country;
            $proffession = $row->proffession;
            $desc = $row->description;
        }

    } else {
        header('Location: writer.php');
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="r254developers.co.ke">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>
		Freelancer | Get the best writing services with our experts
	</title>
	<link rel="icon" type="image/ico" href="img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container-fluid nav-fluid">
	<nav class="navbar navbar-expand-lg navbar-light"> <a class="navbar-brand" href="index.php">HigherWriters</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <i class="fa fa-bars"></i>
		</button>
		<div class="container">
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"> <a class="nav-link" href="#" data-toggle="modal" data-target=".pricing-modal">Pricing</a>
					</li>
					<li class="nav-item"> <button class="btn nav-btn-profile" data-trigger="focus" data-toggle="popover" title='<i class="fa fa-user"></i> title' data-placement="bottom" data-content='<a name="logout" class="btn nav-btn" href="logout.php">log Out</a>'><i class="fa fa-user"></i></button></li>
					<li class="nav-item"> <a name="logout" class="btn nav-btn" href="logout.php">log Out</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md -6"><br>
			<h4>Edit Your Profile</h4><br>
			<form action="" method="post">
				<div class="form-group">
				    <label for="f_name">First Name</label>
				    <input type="text" id="f_name" name="f_name" class="form-control" value="<?php echo $f_name; ?>">
				</div>
				<div class="form-group">
				    <label for="l_name">Last Name</label>
				    <input type="text" id="l_name" name="l_name" class="form-control" value="<?php echo $l_name; ?>">
				</div>
			  <div class="form-group">
			    <label for="country">Country</label>
			    <input type="text" id="country" class="form-control" name="country" value="<?php echo $country; ?>">
			  </div>
			  <div class="form-group">
				    <label for="proffesion">Proffession</label>
				    <input type="text" id="proffesion" name="proffesion" class="form-control" value="<?php echo $proffession; ?>">
				</div>
			  <div class="form-group">
			    <label for="description">Statement of Purpose</label>
			    <textarea class="form-control" id="description" rows="4" cols="30"
			    name="description"><?php echo $desc; ?></textarea>
			  </div>
			  <div class="form-group">
			  	<button class="btn btn-warning" type="submit" name="update">Update</button>
			  </div>
			</form><br>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>

<?php
require_once 'includes/writerModal.php';
require_once "includes/footer.php";
?>