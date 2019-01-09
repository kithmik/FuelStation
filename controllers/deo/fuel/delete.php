<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

/**
 * Delete a record from the fuel table by its id
 */

if (isset($_POST['submit'])){
    $id = $_POST["delete_id"];

    $where = "id = '$id'";

    $fuel_data = delete("fuel", $where);

    if (isset($_SERVER['HTTP_REFERER'])){
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}

