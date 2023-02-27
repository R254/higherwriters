<?php
session_start();

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] != 'admin') {
        if ($_SESSION['role'] != 'writer') {
            header('Location: client.php');
        } else {
            header('Location: writer.php');
        }
    }
} else {
    header('Location: index.php');
}

include 'includes/dashboardHeader.php';

?>
 <div class="content">

 	<div class="container">
 		<iframe width="565.6212938005391" height="349.97037037037035" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSOuCvcCspraLukbk78zZmkPQCRwULlf-rpF41rOlP8fhKBY7s1pzXyL1IhZ8iEICJcZ4p1JM0TTXkA/pubchart?oid=1980768938&amp;format=interactive"></iframe>
 	</div>

 </div>







<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
