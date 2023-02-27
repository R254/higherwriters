<?php

session_start();

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] != 'client') {
        header('Location: writer.php');
    }
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
					<h5>Order articles</h5>
				</div>

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