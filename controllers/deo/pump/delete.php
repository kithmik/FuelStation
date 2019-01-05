<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

if (isset($_POST['submit'])){
    $id = $_POST["id"];

    $where = ["id" => $id];

    $pump_data = delete("pump", $where);

    if (isset($_SERVER['HTTP_REFERER'])){
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}
