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
    <title>Lubricant Sales</title>
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
                   Lubricant Sales

                </div>
                <div class="card-body">

                    <form action="<?php echo $create_path; ?>" method="post">

                        <label for="fid">Lubricant ID</label><br>
                        <input type="text" id="lubid" name="lubid" placeholder="Enter Lubricant ID.."><br>

                        <label for="fid">Date</label><br>
                        <input type="Date" id="date" name="date" placeholder="Enter Date.."><br>


                        <label for="fid">Time</label><br>
                        <input type="time" id="time" name="time" placeholder="Enter time.."><br>


                        <label for="uprice">No Of Items</label><br>
                        <input type="text" id="noi" name="noi" placeholder="Enter No of Items.."><br>


                        <div class="md-form">
                            <label for="lubid">Lubricant  Id</label><br>
                            <input class="form-control" type="text" id="lubid" name="lubid" required><br>

                        </div>

                        <div class="md-form">
                            <label for="date">Date</label><br><br>
                            <input class="form-control" type="date" id="date" name="date" required><br>

                        </div>

                        <div class="md-form">
                            <label for="time">Time</label><br><br>
                            <input class="form-control" type="time" id="time" name="date" required><br>

                        </div>


                        <div class="md-form">
                            <label for="noi">Number Of Item</label><br><br>
                            <input class="form-control" type="text" id="noi" name="noi" required><br>

                        </div>

                        <div class="md-form">
                            <label for="noi">To Br Received</label><br><br>
                            <input class="form-control" type="text" id="noi" name="noi" required><br>

                        </div>

                        <div class="md-form">
                            <label for="noi">Cash Sale</label><br><br>
                            <input class="form-control" type="text" id="noi" name="noi" required><br>

                        </div>


                        <div class="md-form">
                            <label for="noi">Shortage</label><br><br>
                            <input class="form-control" type="text" id="noi" name="noi" required><br>

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