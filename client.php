<?php

session_start();

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] != 'client') {
        if ($_SESSION['role'] != 'writer') {
            header('Location: dashboard.php');
        } else {
            header('Location: writer.php');
        }
    }
    // Here the client page is executed since the role is client
} else {
    header('Location: index.php');
}

require_once 'includes/clientHeader.php';
require_once './config/db.php';
$sql = "SELECT * FROM users WHERE role = 'writer';";
$q = $conn->query($sql);
?>
<div class="feed">
<div class="container">
	<div class="row card-client">
		<div class="col-md-2"><br>
			<?php echo $_SESSION['ClientUser']; ?>
		</div>
		<div class="col-md-10">
			<div class="card">
				<div class="card-header">
					<h5>Freelancers</h5>
				</div>
				<?php while ($row = $q->fetch(PDO::FETCH_OBJ)): ?>
				<div class="card-body card-body-h">
						<div class="btn-w">
							<ul>
								<li><a href="register.php"><button class="btn nav-btn">Save</button></a></li>
								<li><a href="login.php"><button class="btn btn-c">Invite to job</button></a></li>
							</ul>
						</div>
						<a href=""><?php echo $row->f_name . ' ' . $row->l_name; ?></a>
						<h5>
							<?php echo $row->proffession; ?>
						</h5>
						<div class="row">
							<div class="col-md-3">
								<b>$20.0 </b>/ hr
							</div>
							<div class="col-md-3">
								<b>$10k +</b> earned
							</div>
							<div class="col-md-3">
								100% job success
							</div>
							<div class="col-md-3">
								<b><?php echo $row->country; ?></b>
							</div>
						</div>
						<p>
							<?php echo $row->description; ?>
						</p>
				</div>
				<hr>
				<?php endwhile;?>
				<div class="card-footer"></div>
			</div>
		</div>
	</div>
</div>
</div>



<?php
require_once 'includes/clientModal.php';
require_once "includes/footer.php";

?>