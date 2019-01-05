<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

if (isset($_POST['submit'])){
    $id = $_POST["FuelId"];

    $isFuelUpdateSuccessful = update("fuel", $_POST, $id);
    if ($isFuelUpdateSuccessful == true){
        $where = ["FuelId" => $id];
        $isFuelPriceUpdateSuccessful = update("fuelprice", $_POST, $where);
    }

    print_r($_POST);

    if (isset($_SERVER['HTTP_REFERER'])){
     header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}

