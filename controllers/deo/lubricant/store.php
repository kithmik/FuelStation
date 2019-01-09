<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

    $LubId=$_POST['lubid'];
    $LubType=$_POST['ltype'];



    $sql="INSERT INTO Lubricant(LubricantId,LubricantName) VALUES ('$LubId','$LubType')";


    if ($conn->query($sql) === TRUE) {

//        echo "<script>window.alert('Successfully added !');";
        $_SESSION['status'] = "Record was successfully inserted!";
        if (isset($_SERVER['HTTP_REFERER'])){
            header("Location: /views/lubricant/index.php");
        }

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn -> close();

}
?>
