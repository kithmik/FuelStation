<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

    $LubId=$_POST['lubid'];
    $UnitPrice=$_POST['uprice'];
    $UpDate=$_POST['update'];



    $sql="INSERT INTO LubricantPrice(LubricantId,UnitPrice,UnitPricedDate) VALUES ('$FuelId','$UnitPrice','$UpDate')";


    if ($conn->query($sql) === TRUE) {

        $_SESSION['status'] = "Record was successfully inserted!";
        if (isset($_SERVER['HTTP_REFERER'])){
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn -> close();

}
?>
