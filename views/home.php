<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){
    header("Location: /views/login.php");
    exit(0);
}

$serverName = "localhost";
$username = "root";
$password = "";
$database = "fuel_station";

$conn = new mysqli($serverName, $username, $password , $database);

$fuel_total_sql = "SELECT SUM(`TotalAmount`) AS fuel_total FROM `fuelsale`";
$fuel_total = 0;

$result = $conn->query($fuel_total_sql);
if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
        $fuel_total = $row['fuel_total'];
    }
}

$lubricant_total_sql = "SELECT SUM(`TotalAmount`) AS lubricant_total FROM `lubricantsale`";
$lubricant_total = 0;

$result = $conn->query($lubricant_total_sql);
if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
        $lubricant_total = $row['lubricant_total'];
    }
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

<div class="mt-5">
    <div class="row">
        <div class="col-md-3">
            <?php
            include_once($include_path."/sidenav.php");
            ?>
        </div>



        <div class="card mt-5"  >
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-primary o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fa fa-fw fa-cubes"></i>
                                    </div>
                                    <div class="mr-5"><?php echo $fuel_total; ?> Liters of Fuel Sold </div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="/views/fuel/sale">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-warning o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fa fa-fw fa-line-chart"></i>
                                    </div>
                                    <div class="mr-5"><?php echo $lubricant_total; ?> <br> Total Lubricant Sales</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="/views/lubricant/sale">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-success o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa-shopping-cart"></i>
                                    </div>
                                    <div class="mr-5">123 New Orders!</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="#">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-danger o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa-life-ring"></i>
                                    </div>
                                    <div class="mr-5">13 New Tickets!</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="#">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--<div class="col-md-9 pt-5">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">

                            <img src="../libs/img/index.jpg" width="700px" height="500px" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </div>-->





    </div>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-9 pt-1 pl-0">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">

                            <img src="../libs/img/index.jpg" class="img-fluid">
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