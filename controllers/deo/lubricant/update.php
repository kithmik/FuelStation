<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

if (isset($_POST['submit'])){
    $id = $_POST["id"];

    $isLubricantUpdateSuccessful = update("lubricant", $_POST, $id);
    if ($isLubricantUpdateSuccessful == true){
        $where = ["lubricant_id" => $id];
        $isLubricantPriceUpdateSuccessful = update("lubricantprice", $_POST, $where);
    }

    if (isset($_SERVER['HTTP_REFERER'])){
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}

