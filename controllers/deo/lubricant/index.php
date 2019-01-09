<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

/**
 * Get all the data from the lubricant table to an associative array
 */

    $lubricants = getData('lubricant');

?>