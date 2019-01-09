<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");


if (isset($_POST['submit'])){
    $from = $_POST['from'];
    $to = $_POST['to'];

    $sql= "select * FROM  fuelsale WHERE `Date` BETWEEN '$from' AND '$to'";
    $fuelsales = customGetData($sql);


    $totalliter=0;
    $result=$conn->query($sql);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc())
            $totalliter+=$row['TotalAmount'];
    }
//    echo "Total Amount Of Fuel Sold (Liters)- $totalliter";




}