<?php

require_once './config/db.php';

if (isset($_POST['submit'])) {

    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $proffession = $_POST['proffesion'];
    $pass = sha1($_POST['pass']);
    $role = $_POST['role'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute([$email]);
    $result = $stmt->fetch();
    if ($result) {
        echo "Email already exists in the database! Please use another email!";
        header("refresh:3; url=register.php");
    } else {

        $sql = "INSERT INTO users(f_name,l_name,email,proffession, pass,role) VALUES(?,?,?,?,?,?)";

        $stmt = $conn->prepare($sql);

        $results = $stmt->execute([$f_name, $l_name, $email, $proffession, $pass, $role]);
        
        if ($results) {
            echo "Your registration has been submitted successfully.";
            header("refresh:3; url=login.php");
        } else {
            echo "There were errors while saving the data.";
        }
        header('Location: login.php');
    }

}
