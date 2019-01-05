<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){
    header("Location: /views/login.php");
    exit(0);
}
else{
    header("Location: /views/home.php");
    exit(0);
}
?>