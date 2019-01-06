<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

if (isset($_POST['submit'])){
    $id = $_POST["edit_id"];
    $fuelId = $_POST["FuelId"];

    $where = ["id" => $id];
//    print_r($_POST);
//    exit(0);

    $isFuelUpdateSuccessful = update("fuel", $_POST, $where);
    if ($isFuelUpdateSuccessful == true){
        $where = ["FuelId" => $fuelId];
        $isFuelPriceUpdateSuccessful = update("fuelprice", $_POST, $where);
    }

    if (isset($_SERVER['HTTP_REFERER'])){
     header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}

