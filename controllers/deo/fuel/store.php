<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");
//
//  Create a new record in the fuel table
//


if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    $FuelId=$_POST['FuelId'];
    $FuelType=$_POST['fueltype'];




    $sql="INSERT INTO fuel (FuelId,FuelName) VALUES ('$FuelId','$FuelType')";


    if ($conn->query($sql) === TRUE) {

//
//   If the insertion was successful, set the session status with a success message
//

        $_SESSION['status'] = "Record was successfully inserted!";

        if (isset($_SERVER['HTTP_REFERER'])){
            header("Location: /views/fuel/index.php");
        }

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn -> close();

}
?>
