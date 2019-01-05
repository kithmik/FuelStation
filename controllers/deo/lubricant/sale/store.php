<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");
if (isset($_POST['submit'])){
    $lubricant_id = $_POST['LubricantId'];
    $date = $_POST['Date'];
    $no_of_items = $_POST['NoOfItems'];

    $price_sql = "SELECT * FROM lubricantprice WHERE `LubricantId` = '$lubricant_id' AND `Date` >= '$date' ORDER BY `Date` LIMIT 1";
    $price_data = customGetData($price_sql);

    if (count($price_data) == 1){
        $price_data = $price_data[0];

        $total_amount = $price_data["UnitPrice"] * $no_of_items;

        $_POST["TotalAmount"] = $total_amount;

        $lubricantsale_id = insert("lubricantsale", $_POST);

        if (isset($_SERVER['HTTP_REFERER'])){
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }

    }


}

?>