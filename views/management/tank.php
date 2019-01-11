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

    <!doctype html>
    <html>
    <head>
        <title>Fuel Management System</title>
        <?php
        include_once($include_path."/styles.php");
        ?>
    </head>
    <body>
    <?php
    include_once($include_path."/navbar.php");
    ?>

    <div class="mt-4">
        <div class="row">
            <div class="col-md-3">
                <?php
                include_once($include_path."/sidenav.php");
                ?>
            </div>
            <div class="col-md-7 pt-5">
                <div class="card h-100">
                    <div class="card-header">
                        Fuel Register

                    </div>
                    <div class="card-body h-100">

                        <form width=70% method="post" action="tank.php">

                            <div class="md-form">
                                <label for="fid">Fuel or Lubricant Item</label><br>
                                <select name="fuelid" id="fuelid" class="mdb-select md-form">
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

                                    ?>
                                    <option value="All">All</option>
                                </select>
                            </div>
                            <br>
                            <br>


                            <label for="fid">To Date</label><br>
                            <input type="date" id="fname" name="stockdate" placeholder="Please select date"><br>

                            <button type="submit" name="submittank" value="Submit">Submit</button></center>
                        </form>



                        <?php

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                            $fuelid = $_POST['fuelid'];
                            $stockdate = $_POST['stockdate'];



                            if (isset($fuelid)) {

                                $total_sales_sum = 0;
                                if ($fuelid == 'All') {
                                    $sql = "SELECT `Sales` AS `salas_sum` FROM `fuelinventory` WHERE `Date` BETWEEN '2010-01-01' AND '$stockdate'";
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
                                    $sql = "SELECT SUM(Sales) AS salas_sum FROM fuelinventory WHERE `Date` BETWEEN('2010-01-01' AND  '$stockdate') AND `FuelId`='$fuelid'";

                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {


                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            $total_sales_sum= $row['salas_sum'];
                                        }

                                    }
                                }


//sql output eka veriable ekakta samana karala quary eken ganne. $row[] ekata harida balanna

                                $total_purchase_sum = 0;
                                if ($fuelid == 'All') {
                                    $sql = "SELECT SUM(Purchases) AS purchase_sum FROM `fuelinventory` WHERE `Date` BETWEEN'2010-01-01' AND  '$stockdate'";
                                    $result = $conn->query($sql);


                                    if ($result->num_rows > 0) {


                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            $total_purchase_sum= $row['purchase_sum'];
                                        }
                                    }
                                }

                                else{
                                    $sql ="SELECT SUM(Purchases) AS purchase_sum FROM fuelinventory WHERE `Date` BETWEEN'2010-01-01' AND  '$stockdate' AND `FuelId`='$fuelid'";
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
                                $tankname = 0;
                                $sql ="SELECT TankId FROM tank WHERE FuelId='$fuelid'";

                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {

                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $tankname= $row['TankId'];
                                    }

                                }

                                $tankcapacity = 0;
                                $sql ="SELECT Capacity FROM tank WHERE FuelId='$fuelid'";
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
                                    $sql ="SELECT `ReOrderLevel`,`BufferStock`,`MaxStockLevel`  FROM `stockmgt` WHERE FuelId='$fuelid'";

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
			         <td>".$tankname."</td>
			         <td>".$tankcapacity."</td>
			         <td>".$stock_in_hand."</td>

			 </tr>";

                                        echo "</table></div>";


                                    }

                                }

                            }




                        }

                        ?>


                    </div>



                </div>


            </div>


        </div>





        <?php
        include_once($include_path."/scripts.php");
        include_once ($include_path.'/footer.php');
        ?>

    </body>
    </html>


