<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

if (isset($_POST['submit_edit'])){

    $id=$_POST['edit_id'];

    $where = "id = '$id'";


    $lubricant_id = $_POST['LubricantId'];
    $date = $_POST['Date'];
    $no_of_items = $_POST['NoOfItems'];

    $price_sql = "SELECT * FROM lubricantprice WHERE `LubricantId` = '$lubricant_id' AND `UnitPricedDate` <= '$date' ORDER BY `UnitPricedDate` DESC LIMIT 1";

    $price_data = customGetData($price_sql);

    if (count($price_data) == 1){
        $price_data = $price_data[0];

        $total_amount = $price_data["UnitPrice"] * $no_of_items;

        $_POST["TotalAmount"] = $total_amount;

        $isLubricantsaleUpdateSuccessful = update("lubricantsale", $_POST, $where);

        if (isset($_SERVER['HTTP_REFERER'])){
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }

    }

}
