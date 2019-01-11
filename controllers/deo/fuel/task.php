<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");


if (isset($_POST['submit'])){
    $open = $_POST['open'];

    $sql= "select * FROM  fuelsale WHERE `OMReading` >= $open";
    $fuelsales = customGetData($sql);




    }

