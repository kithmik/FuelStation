<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$serverName = "localhost";
$username = "root";
$password = "";
$database = "abc";

$conn = new mysqli($serverName, $username, $password , $database);


if($conn -> connect_error){
    die("Connection Failed." . $conn->connect_error);
}


//  Parameters:- $table (String), $data (An associative array)
//
//  This function validates an associative array according to the fields in a table
//  It gets all the fields in the table by the MySQL DESCRIBE command, and then checks the keys of the data array
//  If any key in the data array is not present in the table fields, then it is removed using the unset command
//
//  Returns:- The filtered $data array (by it's keys corresponding with the table fields) or null (if incorrect table name)

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


//  Parameters:- $value (Pointer to a value in an array), $key (A key in an array)
//
//  Sets the value to : key = 'value'
//  Example:- ["abc" => 123] will be converted to: ["abc" => "abc = '123'"]
//
//  This is later used to build SQL query strings such as:
//  UPDATE SET abc = '123'


function prepareToUpdate(&$value, $key){
    $value = "$key = '$value'";
}


//  parameters:-  $table (String), $data (An associative array which includes the data to be inserted to the table)
//
//  This is used to insert data from an associative array to a table.
//  Can call insert('fuel', $_POST)
//  If the $data is set as $_POST, the name attributes in the HTML form inputs should match the field names in the table of the database
//  The unwanted fields in the $_POST will the removed by calling the filterDataForTable() function
//
//  Returns:- The id of the newly created row


function insert($table, $data){

    global $conn;


// Remove the unnecessary elements (which are not in the $table in the database), from the $data associative array


    $data = filterDataForTable($table, $data);

    if ($data != null){
        $fields = implode(", ", array_keys($data));

        $values = implode("', '", array_values($data));

        $sql = "INSERT INTO $table($fields) VALUES ('$values')";

        if ($conn->query($sql) === TRUE){
            $_SESSION['status'] = "Record was successfully inserted to $table";

            return $conn->insert_id;
        }
    }

    $_SESSION["status"] = "Something went wrong while inserting to $table";
    return null;

}




// parameters:-  $table (String), $data (An associative array which includes the data to be inserted to the table),
//                  $where (for example when this function is been called $where will be set to: id = '$id')
//
// This is used to update data from an associative array to a table.
// Can call update('fuel', $_POST, "id = '$id'")
// If the $data is set as $_POST, the name attributes in the HTML form inputs should match the field names in the table of the database
// The unwanted fields in the $_POST will the removed by calling the filterDataForTable() function
//
// Returns:- true if successfully updated,or fault.


function update($table, $data, $where = "1"){
    global $conn;

//
//  Remove the unnecessary elements (which are not in the $table in the database), from the $data associative array
//
    $data = filterDataForTable($table, $data);

//
//  Example:- $data: $_POST[] -->> $_POST[] = ["submit" => "Submit", "id" => "4", "EmpName" => "Abc", "NIC" => "93874832423V"]
//  "submit" => "Submit" will be removed after calling filterDataForTable()
//

    if ($data != null){
        array_walk($data, "prepareToUpdate");
        $fields = implode(", ", $data);


        $sql = "UPDATE $table SET $fields WHERE $where";

        if ($conn->query($sql) === TRUE){
            $_SESSION['status'] = "Record was successfully updated in $table";
            return true;
        }
    }

    $_SESSION["status"] = "Something went wrong while updating in $table";
    return false;
}


//
//  parameters:-  $table (String), $where(for example when this function is been called $where will be set to: id = '$id')
//
//  This is used to delete data from a table when an id is provided
//
//  Returns:- true if successfully updated,or fault.
//


function delete($table, $where){
    global $conn;


    if ($where != null){

        $sql = "DELETE FROM $table WHERE $where";
        if ($conn->query($sql) === TRUE){
            $_SESSION['status'] = "Record was successfully deleted in $table";
            return true;
        }
    }

    $_SESSION["status"] = "Something went wrong while deleting in $table";
    return false;
}


//
//  parameters:-  $table (String), $field(can be an array or a string), $where(if any where condition is specified as a string)
//
//  This is used to fetch data from a table default where is 1
//
//  Returns:- true if successfully updated,or fault.
//




function getData($table, $fields = "*", $where = "1"){
    global $conn;

    if ($fields !== "*" && is_array($fields)){
        // $fields = ["id", "name"]
        $fields = implode(", ", $fields);
    }


    $dataset = array();

    $sql = "SELECT $fields FROM $table WHERE $where";
    $result = $conn->query($sql);

    if (isset($result) && $result != null){
        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                // $row = ['id' => 1, 'name' => "Abc"];
                array_push($dataset, $row);
            }
        }
    }

        //     $dataset = [
        //         [0] => ["id" => 1, "name" => "Abc"],
        //         [1] => ["id" => 2, "name" => "Def"]
        //     ]

    return $dataset;
}

//
//  parameters:-  $sql(sql query string)
//  can use to select with joins, limits of any other customized sql statement with return a dataset.
//   execute a sql query
//
//  Returns:- fetched dataset as a multidimentional associative array
//


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

//
//  parameters:-  $sql(sql query string)
//
//   execute a sql query
//   can use to execute -delete,update with customized sql statement with does not return a data set.
//
//  Returns:- true if successfully updated,or fault.
//

/*
function customExecuteQuery($sql){
    global $conn;

    if ($conn->query($sql) === TRUE){
        return true;
    }
    else{
        return false;
    }
}*/
