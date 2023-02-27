<?php
session_start();
if (isset($_SESSION['role'])) {
    header('Location: client.php');
}

require_once "includes/header.php";
?>
 <section class="home">

 </section>
<section id="banner" class="banner">
	<div class="container">
		<div class="welcome">
			<h2>
				Need content or article writer?
			</h2>
			<p>
				 Get the best writer who is a good fit to handle your projects here at higherwriters. We are endowed with great talents and creative minds. We offer customized writing services that captures, engage, and retain your readers.
			</p>
			<a href="register.php" class="btn banner-btn">Sign Up Now For Free <i class="fa fa-angle-double-right"></i></a>
		</div>
	</div>
</section>
<section id="about" class="about">
	<div class="container">
		<h1>Who are We?</h1>
		<p>
			We are the best content writing site, endowed with talented and creative writers from across the globe.
			It is here where you can meet the best writer who can create high-value content that meets your needs.
			Whatever the type of content that you may need, we have the right talent to handle your work and
			deliver purpose-driven, unique, and original content.
		</p>
	</div>
</section>



 <?php
require_once 'includes/clientModal.php';
include 'includes/footer.php';

?>