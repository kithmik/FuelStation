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
$create_path = "/controllers/deo/fuel/purchase/reportstore.php";
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
                            <label for="sdate">Start Date</label><br>
                            <input class="form-control" type="date" id="sdate" name="sdate" required><br>

                        </div>

                        <div class="md-form">
                            <label for="edate">End Date</label><br>
                            <input class="form-control" type="date" id="edate" name="edate" required><br>

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