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
$sql = "SELECT * FROM projects";
$q = $conn->query($sql);
$wq = "SELECT * FROM users WHERE role='writer';";
$qw = $conn->query($wq);

while ($row = $qw->fetch(PDO::FETCH_OBJ)) {
	$user_id = $row->user_id;
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
					<li class="nav-item"> <a class="nav-link" href="edit_writer.php?user_id=<?php echo $user_id;?>">Edit Profile</a>
					</li>
					<li class="nav-item"> <button class="btn nav-btn-profile" data-trigger="focus" data-toggle="popover" title='<i class="fa fa-user"></i> title' data-placement="bottom" data-content='<a name="logout" class="btn nav-btn" href="logout.php">log Out</a>'><i class="fa fa-user"></i></button></li>
					<li class="nav-item"> <a name="logout" class="btn nav-btn" href="logout.php">log Out</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</div>


<div class="feed">
<div class="container">
	<div class="row">
		<div class="find-w col-md-2"><br>
			<h3>Find work</h3>
		</div>
		<div class="col-md-8">
			<input type="search" class="search form-control" name="search" placeholder ="search for a job">
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<h4>My Feeds</h4>
					</div>
					<?php while ($row = $q->fetch(PDO::FETCH_OBJ)): ?>
					<div class="card-body">
						<div class="btn-w">
							<ul>
								<li><a href="register.php"><button class="btn nav-btn">Save</button></a></li>
								<li><a href="login.php"><button class="btn btn-c">Invite to job</button></a></li>
							</ul>
						</div>
							<h4><a href=""><?php echo $row->title; ?></a></h4> <span><?php echo $row->date_posted; ?></span>
							<p>
								<?php echo $row->body; ?>
							</p>
					</div>
					<hr>
					<?php endwhile;?>
					<div class="card-footer"></div>
				</div>
			</div>
		<div class="col-md-2">
			<img src=""><h5>My Profile</h5>
			<p><?php echo $_SESSION['WriterUser']; ?></p>
		</div>
	</div>
</div>
</div>





<?php
require_once 'includes/writerModal.php';
require_once "includes/footer.php";
?>