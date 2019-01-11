<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){
    header("Location: /index.php");
    exit(0);
}
$document_root = $_SERVER['DOCUMENT_ROOT'];
require_once ($document_root."/controllers/deo/fuel/task.php");


$include_path = $document_root."/views/includes";

?>
<!doctype html>
<html>
<head>
    <title>task</title>
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
            <div class="card">
                <div class="card-header">
                  task
                </div>
                <div class="card-body">

                    <div class="row">

                        <form action="" method="POST">
                            <input class="form-control" type="text" id="open" name="open" placeholder="opening meter reading" required><br>

                            <input type="submit" name="submit" class="form-control btn btn-primary">
                        </form>
                    </div>


                    <div class="table">
                        <table  class="table table-striped datatable" cellspacing="0" >

                            <thead>
                            <tr>

                                <th>Pump Id</th>
                                <th>Pumper Id</th>
                                <th>Date</th>
                                <th>Opening MeterReading</th>
                                <th>Closing Meter Reading</th>
                                <th>Start time</th>
                                <th>End time time</th>
                                <th>TotalAmount(Liters)</th>
                                <th>Debtor Sale</th>
                                <th>Card Sale</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            if (isset($fuelsales)) {

                                foreach ($fuelsales as $row => $fuelsale) {
                                    $id = $fuelsale["id"];
                                    echo "<tr>";

                                    echo "<td>" . $fuelsale["PumpId"] . "</td>";
                                    echo "<td>" . $fuelsale["PumperId"] . "</td>";
                                    echo "<td>" . $fuelsale["Date"] . "</td>";
                                    echo "<td>" . $fuelsale["OMReading"] . "</td>";
                                    echo "<td>" . $fuelsale["CMReading"] . "</td>";
                                    echo "<td>" . $fuelsale["Stime"] . "</td>";
                                    echo "<td>" . $fuelsale["Etime"] . "</td>";
                                    echo "<td>" . $fuelsale["TotalAmount"] . "</td>";
                                    echo "<td>" . $fuelsale["DebtorSales"] . "</td>";
                                    echo "<td>" . $fuelsale["CardSales"] . "</td>";
                                    echo "</td>";
                                    echo "</tr>";
                                }

                            }





                            ?>
                            </tbody>



                        </table>


                    </div>



                </div>


            </div>


        </div>


    </div>

</div>

<?php
require_once ($include_path.'/footer.php');
require_once($include_path."/scripts.php");

?>





</body>
</html>

