<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

/*$fuels = getData("fuel");
$fuel_price = getData("fuelprice");*/

$sql = "SELECT * FROM fuel LEFT JOIN fuelprice ON fuel.FuelId = fuelprice.FuelId";
/*echo $sql;
exit(0);*/
$fuels = customGetData($sql);

?>