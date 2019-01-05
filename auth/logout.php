<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){
    header("Location: /index.php");
    exit(0);
}
else{
    session_destroy();
    header('Location: /index.php');
    exit(0);
}
?>