<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

/*$fuels = getData("fuel");
$fuel_price = getData("fuelprice");*/

$sql = "SELECT * FROM fuel INNER JOIN fuelprice ON fuel.FuelId = fuelprice.FuelId";
$fuels = customGetData($sql);

?>