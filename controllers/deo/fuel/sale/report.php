<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");


if (isset($_POST['submit'])){
    $from = $_POST['from'];
    $to = $_POST['to'];

    $sql= "select * FROM  fuelsale WHERE `Date` BETWEEN '$from' AND '$to'";
    $fuelsales = customGetData($sql);

}

?>