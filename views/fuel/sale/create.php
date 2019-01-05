<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){
    header("Location: /index.php");
    exit(0);
}
$document_root = $_SERVER['DOCUMENT_ROOT'];

$update_path = "/controllers/deo/fuel/sale/update.php";
$delete_path = "/controllers/deo/fuel/sale/delete.php";
$create_path = "/controllers/deo/fuel/sale/store.php";
$include_path = $document_root."/views/includes";

?>
<!doctype html>
<html>
<head>
    <title>Fuel Sales</title>
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
                    Fuel Sales

                </div>
                <div class="card-body">

                    <form action="<?php echo $create_path; ?>" method="post">

                        <div class="md-form">
                            <label for="PumpId">Pump Id</label>
                            <input type="text" name="PumpId" id="PumpId" class="form-control">
                        </div>

                        <div class="md-form">
                            <label for="PumperId">Pumper Id</label>
                            <input type="text" name="PumperId" id="PumperId" class="form-control">
                        </div>

                        <div class="md-form">
                            <label for="date">Date</label><br><br>
                            <input class="form-control" type="date" id="date" name="Date" required><br>
                        </div>

                        <div class="md-form">
                            <label for="openingreading">Opening Meater Readings</label><br><br>
                            <input class="form-control" type="text" id="openingreading" name="OMReading" required><br>
                        </div>




                        <div class="md-form">
                            <label for="cmreading">Closing Meater Readings</label><br><br>
                            <input class="form-control" type="text" id="cmreading" name="CMReading" required><br>
                        </div>


                        <div class="md-form">
                            <label for="stime">Starting Time</label><br><br>
                            <input class="form-control" type="time" id="time" name="Stime" required><br>
                        </div>


                        <div class="md-form">
                            <label for="etime">Ending Time</label><br><br>
                            <input class="form-control" type="time" id="etime" name="Etime" required><br>
                        </div>

                        <div class="md-form">
                            <label for="cashsale">Cash Sale</label><br><br>
                            <input class="form-control" type="text" id="cashsale" name="Cashsale" required><br>
                        </div>

                        <!--<div class="md-form">
                            <label for="debtorsales">Debtor Sales</label><br><br>
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rs.</div>
                                <input class="form-control" type="text" id="debtorsales" name="debtorsales" ><br>
                            </div>
                        </div>-->

                        <div class="md-form">

                            <label for="cardsales">Credit Card Sales</label><br><br>
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rs.</div>
                                <input class="form-control" type="text" id="cardsales" name="CardSales" ><br>
                            </div>
                        </div>

                        <input type="submit" name="submit" value="Submit" class="form-control btn btn-primary">
                    </form>


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