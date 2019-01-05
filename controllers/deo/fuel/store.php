<?php




if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

    $FuelId=$_POST['fuelid'];
    $FuelType=$_POST['fueltype'];




    $sql="INSERT INTO Fuel(FuelId,Name) VALUES ('$FuelId','$FuelType')";


    if ($conn->query($sql) === TRUE) {
        echo "<script>window.alert('Successfully added !');
    			window.location='view.php'</script>";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn -> close();

}
?>
