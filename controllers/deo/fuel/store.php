<?php


/**
 * Create a new record in the fuel table
 */


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

    $FuelId=$_POST['FuelId'];
    $FuelType=$_POST['fueltype'];




    $sql="INSERT INTO fuel (FuelId,FuelName) VALUES ('$FuelId','$FuelType')";


    if ($conn->query($sql) === TRUE) {

        $fuel_id = $conn->insert_id;

        $fuel_price = insert("fuelprice", $_POST);

        /**
         * If the insertion was successful, set the session status with a success message
         */

        $_SESSION['status'] = "Record was successfully inserted!";

        if (isset($_SERVER['HTTP_REFERER'])){
            header("Location: views/fuel/index.php");
        }

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn -> close();

}
?>
