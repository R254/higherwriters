<?php
	session_start();
	require_once './config/db.php';
	if (isset($_SESSION['role'])) {
	    if ($_SESSION['role'] != 'admin') {
	        if ($_SESSION['role'] != 'writer') {
	            header('Location: client.php');
	        } else {
	            header('Location: writer.php');
	            exit();
	        }
	    }
	    // It execute this file as it is the admin dashboard
	} else {
	    header('Location: index.php');
	}
	$sql = "SELECT * FROM users;";
	$q = $conn->query($sql);
	$wq = "SELECT * FROM users WHERE role='writer';";
	$qw = $conn->query($wq);
	$cq = "SELECT * FROM users WHERE role='client';";
	$qc = $conn->query($cq);
	$sqle = "SELECT * FROM users WHERE role='admin';";
	$qe = $conn->query($sqle);

	while ($row = $qe->fetch(PDO::FETCH_OBJ)) {
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
		Admin dashboard | Get the best writing services with our experts
	</title>
	<link rel="icon" type="image/ico" href="img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<section id="header">
<div class="container-fluid nav-fluid">
	<nav class="navbar navbar-expand-lg navbar-light"> 
		<a id="sidebarCollapse" class="btn nav-btn"><i class="fa fa-bars"></i> </a> 
		<div class="container">
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"> <button class="btn nav-btn-profile" data-trigger="focus" data-toggle="popover" title='<i class="fa fa-user"></i> title' data-placement="bottom" data-content='<a name="logout" class="btn nav-btn" href="logout.php">log Out</a>'><i class="fa fa-user"></i></button></li>				
					<li class="nav-item"> <a name="logout" class="btn nav-btn" href="logout.php"><i class="fa fa-sign-out"></i> log Out</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</div>
</section>
<section class="wrapper">
	<nav id="sidebar">
		<div class="sidebar-header">
			<h3>
				Higherwriters 
			</h3>
		</div>
		<ul class="list-unstyled components">
			<li>
				<a href="index.php"><i class="fa fa-desktop"></i> Dashboard</a>
			</li>
			<li>
				<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-cogs"></i> Controls</a>
				<ul class="collapse list-unstyled" id="homeSubmenu">
					<li>
						<a href="users.php"> <i class="fa fa-users"></i> Users</a>
					</li>
					<li>
						<a href="writer_details.php"> <i class="fa fa-users"></i> Writers</a>
					</li>
					<li>
						<a href="client_details.php"> <i class="fa fa-users"></i> Clients</a>
					</li>
					<li>
						<a href="analytics.php"><i class="fa fa-users"></i> Analytics</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="admin.php"><i class="fa fa-info-circle"></i> About</a>
			</li>
			<li>
				<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-th"></i> Forms</a>
				<ul class="collapse list-unstyled" id="pageSubmenu">
					<li>
						<a href="edit_admin.php?user_id=<?php echo $user_id;?>">Admin Edit</a>
					</li>
					<li>
						<a href="#">Page 2</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-sliders"></i> Settings</a>
			</li>
			
			<li>
				<a href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a>
			</li>
		</ul>
	</nav>

	<!-- Delete confirmation modal -->

		<!-- Modal -->
		<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Delete the user</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<p class="lead">
		      		Are you sure that you need to delete it?
		      	</p>
		      </div>
		      <div class="modal-footer"><button type="button" class="btn btn-danger">Yes</button>
		        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
		      </div>
		    </div>
		  </div>
		</div>


	<!-- Activate confirmation modal -->

	<div class="modal fade" id="activate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Activate the User</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <p class="lead">
		      		Are you sure that you want to activate this user?
		      	</p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary">Yes</button>
		        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
		      </div>
		    </div>
		  </div>
		</div>