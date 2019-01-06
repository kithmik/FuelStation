<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");


if (isset($_POST['submit'])){
    $from = $_POST['from'];
    $to = $_POST['to'];

    $sql= "select * FROM  lubricantsale WHERE `Date` BETWEEN '$from' AND '$to'";
    $lubricantsales = customGetData($sql);

}

?>