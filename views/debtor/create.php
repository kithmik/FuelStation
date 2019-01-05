<?php
/*if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){
    header("Location: ".$_SERVER['DOCUMENT_ROOT']."/index.php");
    exit(0);
}*/
$document_root = $_SERVER['DOCUMENT_ROOT'];
require_once ($document_root."/controllers/deo/fuel/index.php");

$update_path = $document_root."/controllers/deo/fuel/update.php";
$delete_path = $document_root."/controllers/deo/fuel/delete.php";
$create_path = $document_root."/controllers/deo/fuel/store.php";

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
                            <label for="debtorid">Debtor ID</label><br>
                            <input class="form-control" type="text" id="debtorid" name="debtorid" required><br>

                        </div>


                        <div class="md-form">
                            <label for="dname">Debtor Name/Company Name</label><br>
                            <input class="form-control" type="text" id="dname" name="dname" required><br>

                        </div>



                        <div class="md-form">
                            <label for="capacity">Address</label><br>
                            <input class="form-control" type="text" id="capacity" name="capacity" required><br>

                        </div>


                        <div class="md-form">
                            <label for="contactnumber">Contact Number</label><br>
                            <input class="form-control" type="text" id="contactnumber" name="contactnumber" required><br>

                        </div>

                        <div class="md-form">
                            <label for="address">Email</label><br>
                            <input class="form-control" type="email" id="email" name="email" required><br>

                        </div>

                        <div class="md-form">
                            <label for="address">Capacity</label><br>
                            <input class="form-control" type="text" id="address" name="address" required><br>

                        </div>




                        <input type="submit" value="Submit" class="form-control btn btn-primary">
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