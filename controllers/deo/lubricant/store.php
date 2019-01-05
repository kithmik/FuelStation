<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

if (isset($_POST['submit'])){
    $id = $_POST["id"];

    $lubricant_id = insert("lubricant", $_POST);

    array_merge($_POST, ["lubricant_id" => $lubricant_id]);
    $lubricant_price_id = insert("lubricantprice", $_POST);

    if (isset($_SERVER['HTTP_REFERER'])){
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}

