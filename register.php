<?php
session_start();
if (isset($_SESSION['role'])) {
    header('Location: client.php');
}
include 'includes/header.php';

?>

<section class="login-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-3">

			</div>
			<div class="col-md-6">
				<form id="" class="login" method="post" action="process.php">
					<h5>Please Sign Up</h5>
					<div class="form-group">
						<input id="f_name" class="form-control" type="text" name="f_name" placeholder="Your First Name" required>
						<input id="l_name" class="form-control" type="text" name="l_name" placeholder="Your Last Name" required>
						<input id="email" class="form-control" type="email" name="email" placeholder="Your email address" required>
						<input id="proffesion" class="form-control" type="text" name="proffesion" placeholder="Your proffession / skills" required>
						<input id="pass" class="form-control" type="password" name="pass" placeholder="Your password" required>

						<h4>I want to :</h4>
						<div class="radio-toolbar clearfix">
							<input class="user" type="radio" name="role" id="writer" value="writer">
							<label class="radio-label" for="writer">Work as Freelancer</label>

							<input class="user" type="radio" name="role" id="client" value="client">
							<label class="radio-label" for="client">Hire a Writer</label>

							<input class="user" type="radio" name="role" id="admin" value="admin">
							<label class="radio-label" for="admin">Admin</label>
						</div>
						<button class="btn btn-secondary" name="submit" id="registe" type="submit">Sign Up</button>
					</div>
					<h6><span>Have an account?</span> </h6>
					<a href="login.php" class="btn btn-secondary">Log In</a>
				</form>
			</div>
			<div class="col-md-3">

			</div>
		</div>
	</div>
</section>

 <?php
require_once 'includes/clientModal.php';
include 'includes/footer.php';

?>