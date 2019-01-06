<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){
    header("Location: ".$_SERVER['DOCUMENT_ROOT']."/index.php");
    exit(0);
}
$document_root = $_SERVER['DOCUMENT_ROOT'];
require_once ($document_root."/controllers/deo/pump/index.php");

$update_path = "/controllers/deo/fuel/update.php";
$delete_path = "/controllers/deo/fuel/delete.php";
$create_path = "/controllers/deo/fuel/store.php";

$include_path = $document_root."/views/includes";

?>
<!doctype html>
<html>
<head>
    <title>pump register</title>
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
                    Pump Register

                </div>
                <div class="card-body">

                    <form action="<?php echo $create_path; ?>" method="post">





                        <div class="md-form">
                            <label for="pumpid">Pump ID</label><br>
                            <input class="form-control" type="text" id="pumpid" name="pumpid" required><br>

                        </div>


                        <div class="md-form">
                            <label for="fuelid">Fuel ID</label><br>
                            <input class="form-control" type="text" id="fuelid" name="fuelid" required><br>

                        </div>



                        <div class="md-form">
                            <label for="tankid">Tank ID</label><br>
                            <input class="form-control" type="text" id="tankid" name="tankid" required><br>

                        </div>

                        <div class="md-form">
                            <input type="submit" value="Submit" class="form-control btn btn-primary">
                        </div>

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