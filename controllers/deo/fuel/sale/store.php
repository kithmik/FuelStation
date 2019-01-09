<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

if (isset($_POST['submit'])){


    /**
     * Create a new record in the fuelsale table
     */


    $totalsales = $_POST['CMReading'] - $_POST['OMReading'];

    $_POST["TotalAmount"] = $totalsales;

    $pumpId = $_POST['PumpId'];

    /**
     * Get the tankID using the pumpId
     */
    $tank_sql = "SELECT TankId FROM pump WHERE PumpId = '$pumpId' LIMIT 1";
    $tankId = customGetData($tank_sql)[0]['TankId'];

    /**
     * Get the fuel ID using the tankId
     */

    $fuelId_sql = "SELECT FuelId FROM tank WHERE TankId = '$tankId' LIMIT 1";
    $fuelId = customGetData($fuelId_sql)[0]['FuelId'];

    /**
     * Get the unit price of the fuel
     */

    $fuelPrice_sql = "SELECT UnitPrice FROM fuelprice WHERE FuelId = '$fuelId'  ";
    $fuelPrice = customGetData($fuelPrice_sql)[0]['UnitPrice'];

    /**
     * Calculating the to be received
     */

    $_POST['ToBeRecieved'] = $fuelPrice * $totalsales;

    $fuelsale = insert("fuelsale", $_POST);

    if (isset($_SERVER['HTTP_REFERER'])){
        header("Location: ".$_SERVER['HTTP_REFERER']);
        header("Location: /views/fuel/sale/index.php");

    }
}




?>


?>

