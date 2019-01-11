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

                        <form action="" method="post">

                            <label for="fid">FUEL TYPE</label><br>
                            <select name="fuelid" id="fuelid" class="mdb-select md-form">
                                <?php


                                $count=0;

                                $sql="SELECT FuelId FROM fuel ";

                                $result=$conn->query($sql);

                                if($result->num_rows>0){
                                    while($row=$result->fetch_assoc()){
                                        $n=$row['FuelId'];
                                        echo "<option value='$n'>".$row['FuelId']."</option>";

                                        $count++;
                                    }
                                }


                                ?>
                                <option>All</option>
                            </select><br>
                            <br>




                            <div class="md-form">
                                <label for="tankid">MIN. DAILY SALES</label><br>
                                <input class="form-control" type="text" id="mindailysale" name="mindailysale" placeholder="Minimum fuel sales per day" required><br>

                            </div>



                            <div class="md-form">
                                <label for="reorderlevel">MAX. DAILY SALES</label><br>
                                <input class="form-control" type="text" id="maxdailysale" name="maxdailysale" placeholder="Maximum daily sales per day" required><br>

                            </div>

                            <div class="md-form">
                                <label for="tankid">RE ORDER QUANTITY</label><br>
                                <input class="form-control" type="text" id="reorderqty" name="reorderqty" placeholder="Fuel ordered for single purchase in leters"><br>

                            </div>



                            <div class="md-form">
                                <label for="reorderlevel">MIN. LEAD TIME</label><br>
                                <input class="form-control" type="text" id="minleadtime" name="minleadtime"  placeholder="Minimum days taken to recieve the order" required><br>

                            </div>

                            <div class="md-form">
                                <label for="bufferstock">MAX. LEAD TIME </label><br>
                                <input class="form-control" type="text" id="maxleadtime" name="maxleadtime" placeholder="Maximum days taken to receive the order" required><br>

                            </div>












                            <input type="submit" value="Submit" name="submittank" class="form-control btn btn-primary">
                        </form>


                        <?php

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $conn = dbConnect();





                            $fuelid=$_POST['fuelid'];
                            $mindailysale=$_POST['mindailysale'];
                            $maxdailysale=$_POST['maxdailysale'];
                            $reorderqty=$_POST['reorderqty'];
                            $minleadtime=$_POST['minleadtime'];
                            $maxleadtime=$_POST['maxleadtime'];




                            $sql ="SELECT TankId FROM tank WHERE FuelId=$fuelid";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {

                                // output data of each row
                                while($result_3= $result->fetch_assoc()) {
                                    $tankid= $result_3['TankId'];
                                }
                            }












                            $result = "INSERT INTO stocklevel VALUES ('$fuelid','$tankid','$mindailysale','$maxdailysale','$reorderqty','$minleadtime','$maxleadtime')";
                            if (!$result){
                                echo "<script>alert(\"Error Occured!\");</script>";
                            }else {
                                echo "<script>alert(\"Successfully Entered!\");</script>";
                            }



                            $reorderlevel=0;
                            $bufferstock=0;
                            $maxstocklevel=0;
                            $avgdailysale=0;
                            $avgleadtime=0;

                            $reorderlevel=$maxdailysale*$maxleadtime;

                            $avgdailysale=($maxdailysale+$mindailysale)/2;
                            $avgdailysale=($maxleadtime+$minleadtime)/2;

                            $bufferstock=$reorderlevel-($avgdailysale*$avgdailysale);

                            $maxstocklevel=$reorderlevel-($mindailysale*$mindailysale)+$reorderqty;


                            $result = "INSERT INTO stock_manage VALUES ('$tankid','$reorderlevel','$bufferstock','$maxstocklevel')";

                            if (!$result){
                                echo "<script>alert(\"Error Occured!\");</script>";
                            }
                            else {
                                echo "<script>alert(\"Successfully Entered!\");</script>";
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

