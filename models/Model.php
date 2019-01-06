<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$serverName = "localhost";
$username = "root";
$password = "";
$database = "fuel_station";

$conn = new mysqli($serverName, $username, $password , $database);


if($conn -> connect_error){
    die("Connection Failed." . $conn->connect_error);
}

function filterDataForTable($table, $data){
    global $conn;

    if (is_array($data)){
        $data_keys = array_keys($data);
        $table_fields = array();

        $get_table_columns_sql = "DESCRIBE $table";
        $table_describe_result = $conn->query($get_table_columns_sql);

        if ($table_describe_result->num_rows > 0){
            while ($row = $table_describe_result->fetch_assoc()){
                array_push($table_fields, $row["Field"]);
            }

            foreach ($data_keys as $data_key){
                if (!in_array($data_key, $table_fields)){
                    unset($data[$data_key]);
                }
            }

            return $data;

        }
        else{
            return null;
        }
    }

}

function prepareToUpdate(&$value, $key){
    $value = "$key = '$value'";
}

function insert($table, $data){

    global $conn;

    $data = filterDataForTable($table, $data);

    if ($data != null){
        $fields = implode(", ", array_keys($data));

        $values = implode("', '", array_values($data));

        $sql = "INSERT INTO $table($fields) VALUES ('$values')";
        /*print_r($sql);
        exit(0);*/

        if ($conn->query($sql) === TRUE){
            $_SESSION['status'] = "Record was successfully inserted to $table";

            return $conn->insert_id;
        }
    }

    $_SESSION["status"] = "Something went wrong while inserting to $table";
    return null;

}

function update($table, $data, $where){
    global $conn;

    $data = filterDataForTable($table, $data);
    $where = filterDataForTable($table, $where);

    if ($data != null){
        array_walk($data, "prepareToUpdate");
        $fields = implode(", ", $data);

        if ($where != null){
            array_walk($where, "prepareToUpdate");
            $where = implode(", ", $where);
        }
        else{
            $where = "1";
        }

        $sql = "UPDATE $table SET $fields WHERE $where";

        if ($conn->query($sql) === TRUE){
            $_SESSION['status'] = "Record was successfully updated in $table";
            return true;
        }
    }

    $_SESSION["status"] = "Something went wrong while updating in $table";
    return false;
}

function delete($table, $where){
    global $conn;

//    $where = filterDataForTable($table, $where);


    if ($where != null){

        if (is_array($where)){
            array_walk($where, "prepareToUpdate");
/*
            $where = implode(", ", $where);*/
        }



        $sql = "DELETE FROM $table WHERE $where";
        if ($conn->query($sql) === TRUE){
            $_SESSION['status'] = "Record was successfully deleted in $table";
            return true;
        }
    }

    $_SESSION["status"] = "Something went wrong while deleting in $table";
    return false;
}

function getData($table, $fields = "*", $where = "1"){
    global $conn;

    if ($fields !== "*"){
        $fields = filterDataForTable($table, $fields);
        $fields = implode(", ", $fields);
    }

    if ($where !== "1"){
        $where = filterDataForTable($table, $where);
    }

    $dataset = array();

    $sql = "SELECT $fields FROM $table WHERE $where";
    $result = $conn->query($sql);

    if (isset($result) && $result != null){
        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                array_push($dataset, $row);
            }
        }
    }


    return $dataset;
}

function customGetData($sql){
    global $conn;
    $dataset = array();
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            array_push($dataset, $row);
        }
    }

    return $dataset;
}

function customExecuteQuery($sql){
    global $conn;

    if ($conn->query($sql) === TRUE){
        return true;
    }
    else{
        return false;
    }
}
