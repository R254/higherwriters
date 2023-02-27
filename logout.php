<?php

session_start();

if ($_SESSION['role']) {
    session_unset();
    session_destroy();
    header('Location: login.php');
} else {
    header('Location: login.php');
}
