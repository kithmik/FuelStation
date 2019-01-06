<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

/*if (isset($_POST['submit'])){
    $id = $_POST["id"];

    $lubricant_id = insert("lubricant", $_POST);

    array_merge($_POST, ["lubricant_id" => $lubricant_id]);
    $lubricant_price_id = insert("lubricantprice", $_POST);

    if (isset($_SERVER['HTTP_REFERER'])){
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}*/



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

    $LubId=$_POST['lubid'];
    $UnitPrice=$_POST['uprice'];
    $UpDate=$_POST['update'];



    $sql="INSERT INTO LubricantPrice(LubricantId,UnitPrice,UnitPricedDate) VALUES ('$FuelId','$UnitPrice','$UpDate')";


    if ($conn->query($sql) === TRUE) {

//        echo "<script>window.alert('Successfully added !');";
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
