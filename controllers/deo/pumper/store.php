<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

if (isset($_POST['submit'])){
    $id = $_POST["id"];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $NIC=$_POST['nic'];
        $PumperId=$_POST['pumperid'];
        $FirstName=$_POST['firstname'];
        $LastName=$_POST['lastname'];
        $DOB=$_POST['dob'];
        $Address=$_POST['address'];
        $cno=$_POST['cno'];
        $Basicsalary=$_POST['basicsalary'];
        $Allowances=$_POST['allowances'];


        $sql="INSERT INTO Pumper(NIC,PumperId,FirstName,LastName,DOB,Address,TelephoneNo,BasicSalary,Allowances) VALUES ('$NIC','$PumperId,'$FirstName','$LastName','$DOB','$Address','$cno','$Basicsalary','$Allowances')";


        if ($conn->query($sql) === TRUE) {

            $_SESSION['status'] = "Record was successfully inserted!";
            header("Location: /views/pumper/index.php");


        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }


    if (isset($_SERVER['HTTP_REFERER'])){
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}

