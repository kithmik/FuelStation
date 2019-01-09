<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

/**
 * Update the fuel data
 */

if (isset($_POST['submit'])){

    $fuelId = $_POST["FuelId"];

    $id=$_POST['edit_id'];
    $where = "id = '$id'";


    update("fuel", $_POST, $where);


    if (isset($_SERVER['HTTP_REFERER'])){
     header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}

