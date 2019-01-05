<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){
    header("Location: /views/login.php");
    exit(0);
}

$document_root = $_SERVER['DOCUMENT_ROOT'];

$include_path = $document_root."/views/includes";

?>
<!doctype html>
<html>
<head>
    <title>fuel price</title>
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
        <div class="col-md-9 pt-5">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">

                            <img src="../libs/img/index.jpg" width="700px" height="500px" alt="">
                        </div>
                    </div>
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