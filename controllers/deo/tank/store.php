<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

if (isset($_POST['submit'])){
    $id = $_POST["id"];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        $TankId=$_POST['tankid'];
        $FuelId=$_POST['fuelid'];
        $Capacity=$_POST['capacity'];


        $sql="INSERT INTO Tank(TankId,FuelId,Capacity) VALUES ('$TankId','$FuelId','$Capacity')";


        if ($conn->query($sql) === TRUE) {

            $_SESSION['status'] = "Record was successfully inserted!";
            header("Location: /views/tank/");


        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }



    if (isset($_SERVER['HTTP_REFERER'])){
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}

