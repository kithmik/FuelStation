<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){
    header("Location: ".$_SERVER['DOCUMENT_ROOT']."/index.php");
    exit(0);
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");
$document_root = $_SERVER['DOCUMENT_ROOT'];

$create_path = "/controllers/deo/lubricant/sale/store.php";
$include_path = $document_root."/views/includes";

$lubricants = getData('lubricant');

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
                   Lubricant Sales Details

                </div>
                <div class="card-body">

                    <form action="<?php echo $create_path; ?>" method="post">



                        <div class="md-form">

                            <label for="LubricantId">Lubricant ID</label>
                            <select name="LubricantId" id="LubricantId" class="mdb-select md-form">
                                <?php
                                foreach ($lubricants as $lubricant) {

                                    ?>
                                    <option value="<?php echo $lubricant['LubricantId']; ?>">
                                        <?php echo $lubricant['LubricantId']; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="md-form">
                            <label for="Date">Date</label><br><br>
                            <input class="form-control" type="Date" id="Date" name="Date" required><br>

                        </div>




                        <div class="md-form">
                            <label for="NoOfItems">No Of Items</label><br><br>
                            <input class="form-control" type="text" id="NoOfItems" name="NoOfItems" required><br>

                        </div>

                        <div class="md-form">
                            <label for="Cashsale">Cash Sale</label><br><br>
                            <input class="form-control" type="text" id="Cashsale" name="Cashsale" required><br>

                        </div>


                        <div class="md-form">
                            <label for="Debtorsale">Debtor Sale</label><br><br>
                            <input class="form-control" type="text" id="Debtorsale" name="Debtorsale" required><br>

                        </div>

                        <div class="md-form">
                            <label for="Cardsale">Card Sale</label><br><br>
                            <input class="form-control" type="text" id="Cardsale" name="Cardsale" required><br>

                        </div>



                        <input type="submit" value="Submit" name="submit" class="form-control btn btn-primary">
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