<?php
include 'config/login_process.php';
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
 				<form class="login" method="post" action="config/login_process.php">
 					<h5>Please Log In </h5>
 					<?php echo $message; ?>
 					<div class="form-group">
 						<input class="form-control" type="email" name="email" placeholder="Enter email address">
 						<input class="form-control" type="password" name="pass" placeholder="Your password">
 						<button style="color:#fff;" class="btn btn-secondary" name="login">Log In</button>
 						<a href="">Forgot Password?</a>
 					</div>


 					<h6><span>Don't have an account?</span> </h6>
 					<a href="register.php" class="btn btn-secondary">Sign Up</a>
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