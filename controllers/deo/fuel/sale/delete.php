<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

/**
 * Delete a record from the fuelsale table by its id
 */

if (isset($_POST['submit'])){
    $id = $_POST["delete_id"];

    $where = "id = '$id'";

    $fuelsale_data = delete("fuelsale", $where);

    if (isset($_SERVER['HTTP_REFERER'])){
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}

