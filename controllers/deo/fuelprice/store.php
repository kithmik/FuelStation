<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

if (isset($_POST['submit'])){
    $id = $_POST["id"];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $FuelId=$_POST['fuelid'];
        $UnitPrice=$_POST['unitprice'];
        $UpDate=$_POST['unitpriceddate'];



        $sql="INSERT INTO FuelPrice(FuelId,UnitPrice,UnitPricedDate) VALUES ('$FuelId','$UnitPrice','$UpDate')";




        if ($conn->query($sql) === TRUE) {

            $_SESSION['status'] = "Record was successfully inserted!";

            header("Location: /views/fuelprice/index.php");


        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }



    if (isset($_SERVER['HTTP_REFERER'])){
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}

