<?php
    require_once "config/db.php";

    if(isset($_GET['id'])) {
        $user_id = $_GET['id'];

        $stmt = $conn->prepare("DELETE FROM users WHERE user_id=?");
        $result = $stmt->execute([$user_id]);

        if ($result == true) {
        	echo "The record has been deleted successfully!";
            header("refresh:3; url=users.php");
        }
        else{
        	echo "Error:".$stmt."<br>".$conn->error;
        }
    }
?>