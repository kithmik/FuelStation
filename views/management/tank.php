<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){
    header("Location: /index.php");
    exit(0);
}
$document_root = $_SERVER['DOCUMENT_ROOT'];
require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");


$include_path = $document_root."/views/includes";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Tank Management</title>
</head>
<body>


<form width=70% method="post" action="tank.php">

    <label for="fid">Fuel or Lubricant Item</label><br>
    <select name="fuelid" id="fuelid">
        <?php


//        include "../../../dbConnect/dbConnect.php";
        $count=0;
//        $conn=dbConnect();
        // $conn2 = mysqli_connect()
        $sql="SELECT FuelId FROM fuel ";

        $result=$conn->query($sql);

        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                $n=$row['FuelId'];
                echo "<option value='$n'>".$row['FuelId']."</option>";

                $count++;
            }
        }

        $conn -> close();
        ?>
        <option>All</option>
    </select><br>
    <br>


    <label for="fid">To Date</label><br>
    <input type="date" id="fname" name="stockdate" placeholder="Please select date"><br>

    <button type="submit" name="submittank" value="Submit">Submit</button></center>
</form>

</body>
</html>





<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fuelid = $_POST['fuelid'];
    $stockdate = $_POST['stockdate'];



    if (isset($fuelid)) {

        $total_sales_sum = 0;
        if ($fuelid == 'All') {
            $sql = "SELECT Sales AS salas_sum FROM fuelinventory WHERE Date BETWEEN('2010-01-01' AND  Date='$stockdate')";
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {


                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $total_sales_sum= $row['salas_sum'];
                }
            }
        }


        //$sql = "SELECT id, firstname, lastname FROM MyGuests";
        //$result = $conn->query($sql);


        else{
            $sql = "SELECT SUM(Sales) AS salas_sum FROM fuelinventory WHERE Date BETWEEN 2010-01-01 AND  Date=$stockdate AND FuelId='$fuelid'";
            print_r($sql);
            exit(0);
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {


                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $total_sales_sum= $row['salas_sum'];
                }

            }
        }


//sql output eka veriable ekakta samana karala quary eken ganne. $row[] ekata harida balanna

        $total_purchase_sum;
        if ($fuelid == 'All') {
            $sql = "SELECT SUM(Purchases) AS purchase_sum FROM fuelinventory WHERE Date BETWEEN 2010-01-01 AND  Date=$stockdate ";
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {


                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $total_purchase_sum= $row['purchase_sum'];
                }
            }
        }

        else{
            $sql ="SELECT SUM(Purchases) AS purchase_sum FROM fuelinventory WHERE Date BETWEEN 2010-01-01 AND  Date=$stockdate AND FuelId=$fuelid";
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {


                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $total_purchase_sum= $row['purchase_sum'];
                }

            }
        }








        $total_purchase_sum=0;
        $total_sales_sum=0;



        $stock_in_hand=0;
        $stock_in_hand=$total_purchase_sum-$total_sales_sum;

        //retrieve tank name & capacity from tank
        $tankname;
        $sql ="SELECT TankId FROM tank WHERE FuelId=$fuelid";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            // output data of each row
            while($row = $result->fetch_assoc()) {
                $tankname= $row['TankId'];
            }

        }

        $tankcapacity;
        $sql ="SELECT Capacity FROM tank WHERE FuelId=$fuelid";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            // output data of each row
            while($row = $result->fetch_assoc()) {
                $tankcapacity= $row['Capacity'];
            }












            $reorder_level=0;
            $buffer_stock=0;
            $maxstocklevel=0;

            //retreive data from stock_manage for alarts for re order level, buffer stock, max tank requirements
            $sql ="SELECT ReOrderLevel,BufferStock,MaxStockLevel  FROM stock_manage WHERE FuelId=$fuelid";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                // output data of each row
                while($result_3= $result->fetch_assoc()) {
                    $reorder_level= $result_3['ReOrderLevel'];
                    $buffer_stock= $result_3['BufferStock'];
                    $maxstocklevel= $result_3['MaxStockLevel'];
                }



                if($stock_in_hand>$reorder_level){
                    echo "<script>alert(\"RE-ORDER LEVEL has arraived. Please place the order\");</script>";

                }

                if($stock_in_hand>$buffer_stock){
                    echo "<script>alert(\"BUFFER STOCK LEVEL has arraived. Please place the order as soon as possible\");</script>";

                }

                if($maxstocklevel>$tankcapacity){
                    echo "<script>alert(\"Tank capacity is not sufficient to keep maximum stock level. \");</script>";

                }

//meka danna ona parameters monada balananna
                echo "<div class='table'>
		<table>
		     <tr>
		         <th>Fuel ID</th>
			     <th>Tank ID</th>
			     <th>Capacity</th>
			     <th>stock(leters)</th>
			     
			 </tr>";


                echo"<tr>
		             <td>".$fuelid."</td>
			         <td>".$fuelname."</td>
			         <td>".$tankcapacity."</td>
			         <td>".$stock_in_hand."</td>

			 </tr>";

                echo "</table></div>";


            }

        }

    }


    $conn->close();



}

?>