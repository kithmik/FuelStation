<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

if (isset($_POST['submit'])){

    $id=$_POST['edit_id'];

    $where=['id' => $id];

    $isLubricantUpdateSuccessful = update("lubricant", $_POST, $where);

    if (isset($_SERVER['HTTP_REFERER'])){
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}

