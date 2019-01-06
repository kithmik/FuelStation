<?php




if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

    $FuelId=$_POST['FuelId'];
    $FuelType=$_POST['fueltype'];




    $sql="INSERT INTO fuel (FuelId,FuelName) VALUES ('$FuelId','$FuelType')";


    if ($conn->query($sql) === TRUE) {

        $fuel_id = $conn->insert_id;

        $fuel_price = insert("fuelprice", $_POST);

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
