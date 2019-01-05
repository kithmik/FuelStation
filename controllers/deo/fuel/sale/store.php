<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

if (isset($_POST['submit'])){


    $totalsales = $_POST['CMReading'] - $_POST['OMReading'];
    $_POST["TotalAmount"] = $totalsales;
/*    echo " ts: $totalsales, cm: ".$_POST['CMReading'].", ";
    exit(0);*/


    $fuelsale = insert("fuelsale", $_POST);

    if (isset($_SERVER['HTTP_REFERER'])){
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}

//
//if (isset($_POST['submit'])){
//    $PumpId=$_POST['pumpid'];
//    $PumperId=$_POST['pumperid'];
//    $FuelId=$_POST['fuelid'];
//    $CMreading=$_POST['cmreading'];
//    $OpenReading=$_POST['openingreading'];
//    $Stime=$_POST['stime'];
//    $Etime=$_POST['etime'];
//    $Date=$_POST['date'];
//    $DebtorSales=$_POST['debtorsales'];
//    $Cardsales=$_POST['cardsales'];
//    $TotAmnt = 0;
//
//    $sql = "SELECT UnitPrice FROM fuelprice WHERE 	(FuelId = '$FuelId' AND UnitPricedDate = '$Date') ";
//    $result = $conn->query($sql);
//
//
//    if ($result->num_rows > 0) {
//        // output data of each row
//        while($row = $result->fetch_assoc()) {
//            $TotAmnt = ($CMreading - $OpenReading - $Short) * $row["UnitPrice"] ;
//        }
//
//        $sql="INSERT INTO FuelSale(PumpId,PumperId,OMReading,CMReading,Stime,Etime,Date,DebtorSales,CardSales,Shortages,TotalAmount) VALUES ('$PumpId','$PumperId','$OpenReading','$CMreading','$Stime','$Etime','$Date','$DebtorSales','$Cardsales','$Short','$TotAmnt')";
//
//
//        if ($conn->query($sql) === TRUE) {
//            echo "<script>window.alert('Successfully added !');
////    			window.location='salesdeo.php'</script>";
//
//        } else {
//            echo "Error: " . $sql . "<br>" . $conn->error;
//        }
//    } else {
//        echo "Error: " . $sql . "<br>" . $conn->error;
//    }
//
//}

?>

