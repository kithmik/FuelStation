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
                    Salary

                </div>
                <div class="card-body h-100">


                    <form width=70% method="post" action="">

                        <label for="fid">Lubbricant item</label><br>
                        <select name="lubid" id="lubid" class='mdb-select md-form'>
                            <?php


                            $count=0;

                            $sql="SELECT LubricantId FROM lubricant";

                            $result=$conn->query($sql);

                            if($result->num_rows>0){
                                while($row=$result->fetch_assoc()){
                                    $n=$row['LubricantId'];
                                    echo "<option value='$n'>".$row['LubricantId']."</option>";

                                    $count++;
                                }
                            }

                            ?>
                            <option>All</option>
                        </select><br>
                        <br>


                        <label for="fid">To Date</label><br>
                        <input type="date" id="fname" name="stockdate" placeholder="Please select date"><br>

                        <button type="submit" name="submitstock" value="Submit">Submit</button></center>
                    </form>

                    <?php

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $lubid = $_POST['fuelid'];
                        $stockdate = $_POST['stockdate'];


                        if (isset($fuelid)) {


                            if ($fuelid == 'All') {
                                $sql = "SELECT SUM(Sales) AS salas_sum FROM lubricantinventory WHERE Date BETWEEN 2010-01-01 AND  Date=$stockdate";
                                $result = $conn->query($sql);


                                if ($result->num_rows > 0) {

                                    // output data of each row
                                    while ($result_1 = $result->fetch_assoc()) {
                                        $lub_sales_sum = $result_1['salas_sum'];

                                    }
                                }
                            } else {
                                $sql = "SELECT SUM(Sales) AS salas_sum FROM lubricantinventory WHERE Date BETWEEN 2010-01-01 AND  Date=$stockdate AND LubricantId=$lubid";
                                $result = $conn->query($sql);


                                if ($result->num_rows > 0) {


                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        $total_sales_sum = $row['salas_sum'];
                                    }

                                }
                            }


                            //sql output eka veriable ekakta samana karala quary eken ganne. $row[] ekata harida balanna


                            if ($fuelid == 'All') {
                                $sql = "SELECT SUM(Purchases) AS purchase_sum FROM lubricantinventory WHERE Date BETWEEN 2010-01-01 AND  Date=$stockdate";
                                $result = $conn->query($sql);


                                if ($result->num_rows > 0) {


                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        $lub_purchase_sum = $row['purchase_sum'];
                                    }
                                }
                            } else {
                                $sql = "SELECT SUM(Purchases) AS purchase_sum FROM lubricantinventory WHERE Date BETWEEN 2010-01-01 AND  Date=$stockdate AND FuelId=$fuelid";
                                $result = $conn->query($sql);


                                if ($result->num_rows > 0) {


                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        $lub_purchase_sum = $row['purchase_sum'];
                                    }

                                }
                            }


                            $stock_in_hand = 0;
                            $stock_in_hand = $total_purchase_sum - $total_sales_sum;

                            //retrieve fuel name
                            $sql = "SELECT LubricantName FROM lubricant WHERE LubricantId=$lubid";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {

                                // output data of each row


                                echo "<div class='table'>
		<table>
		     <tr>
		         <th>Lubricant ID</th>
			     <th>Lubricant Name</th>
			     <th>Stock</th>
			     
			 </tr>";

                                while ($result_3 = $result->fetch_assoc()) {
                                    $lubname = $result_3['LubricantName'];


                                    echo "<tr>
		             <td>" . $lubid . "</td>
			         <td>" . $lubname . "</td>
			         <td>" . $stock_in_hand . "</td>

			 </tr>";

                                    echo "</table></div>";
                                }


                            }
                            $conn->close();

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


