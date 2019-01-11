<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['user'])){
    header("Location: /views/index.php");
    exit(0);
}
$document_root = $_SERVER['DOCUMENT_ROOT'];
require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

if(isset($_POST['login']))
{


    $EmpId = $_POST['NIC'];
    $password = $_POST['password'];
    $deo="Data Entry Operator";
    $manager="Manager";
    $owner="Owner";
    $cashier="Cashier";

    $sql = "SELECT * FROM employee WHERE NIC='$EmpId' AND Password='$password'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $_SESSION['user'] = mysqli_fetch_assoc($result);
        header("Location: /views/home.php");
    }
    else
    {
        echo "<script>alert('Employee ID or Password is invalid')</script>";
        echo "<script>window.location = '/views/login.php'</script>";
//        header("Location: /views/login.php");
    }


}
?>