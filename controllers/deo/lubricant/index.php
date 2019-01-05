<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");


$sql = "SELECT * FROM lubricant INNER JOIN lubricantprice ON lubricant.LubricantId = lubricantprice.LubricantId";

$lubricants = customGetData($sql);

?>