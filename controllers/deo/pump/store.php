<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

if (isset($_POST['submit'])){
    $id = $_POST["id"];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $PumpId=$_POST['pumpid'];
        $FuelId=$_POST['fuelid'];
        $TankId=$_POST['tankid'];


        $sql="INSERT INTO Pump(PumpId,FuelId,TankId) VALUES ('$PumpId','$FuelId','$TankId')";


        if ($conn->query($sql) === TRUE) {

            $_SESSION['status'] = "Record was successfully inserted!";
            header("Location: /views/pump/");


        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }



    if (isset($_SERVER['HTTP_REFERER'])){
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}

