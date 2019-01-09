<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

/**
 * Update the fuel data
 */

if(isset($_POST["submit"])){
    if (isset($_POST['submit'])){

        $id=$_POST['edit_id'];

        $where = "id = '$id'";

        $isfuelsaleUpdateSuccessful = update("fuelsale", $_POST, $where);

        if (isset($_SERVER['HTTP_REFERER'])){
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }
    }
}