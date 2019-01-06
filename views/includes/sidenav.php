
<!-- Sidebar -->
<div class="sidebar-fixed position-fixed mt-5">

    <a class="logo-wrapper waves-effect">
        <img src="/libs/img/logo.jpg" class="img-fluid" alt="">
    </a>

    <div class="list-group list-group-flush">
        <a href="/" class="list-group-item active waves-effect">
            <i class="fas fa-chart-pie mr-3"></i>Dashboard
        </a>
        <a href="#" class="list-group-item waves-effect">
            <i class="fas fa-chart-pie mr-3"></i>User Manuals
        </a>
        <?php
        if (isset($_SESSION['user']) && $_SESSION['user']['Type'] == "Data Entry Operator"){
        ?>
        <a class="list-group-item waves-effect"  data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <i class="fa fa-table mr-3"></i>Register <i class="fa fa-angle-down"></i>
        </a>

        <!-- Collapsible element -->
        <div class="collapse list-group list-group-flush ml-4" id="collapseExample">
                <a href="/views/fuel" class="list-group-item  waves-effect">
                    <i class="fa fa-sun-o mr-3"></i>Fuel
                </a>
                <a href="/views/fuelprice" class="list-group-item  waves-effect">
                    <i class="fa fa-sun-o mr-3"></i>Fuel Price
                </a>
                <a href="/views/lubricant" class="list-group-item waves-effect">
                    <i class="fa fa-bars mr-3"></i>Lubricant
                </a>
                <a href="/views/lubricantprice" class="list-group-item waves-effect">
                    <i class="fa fa-bars mr-3"></i>Lubricant price
                </a>
                <a href="/views/pumper" class="list-group-item waves-effect">
                    <i class="fa fa-bars mr-3"></i>Pumper
                </a>
                <a href="/views/pump" class="list-group-item waves-effect">
                    <i class="fa fa-bars mr-3"></i>Pump
                </a>
                <a href="/views/tank" class="list-group-item waves-effect">
                    <i class="fa fa-bars mr-3"></i>Tank
                </a>
                <a href="/views/debtor" class="list-group-item waves-effect">
                    <i class="fa fa-bars mr-3"></i>Debtor
                </a>
        </div>

            <a class="list-group-item waves-effect"  data-toggle="collapse" href="#saleMenu" aria-expanded="false" aria-controls="saleMenu">
                <i class="fa fa-table mr-3"></i>Sales <i class="fa fa-angle-down"></i>
            </a>

            <!-- Collapsible element -->
            <div class="collapse list-group list-group-flush ml-4" id="saleMenu">
                <a href="/views/fuel/sale/index.php" class="list-group-item  waves-effect">
                    <i class="fa fa-sun-o mr-3"></i>Fuel Sales
                </a>
                <a href="/views/lubricant/sale/index.php" class="list-group-item waves-effect">
                    <i class="fa fa-bars mr-3"></i>Lubricant Sales
                </a>

            </div>

            <?php
        }
        ?>


        <?php
        if (isset($_SESSION['user']) && $_SESSION['user']['Type'] == "Manager"){
            ?>
            <a class="list-group-item waves-effect"  data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <i class="fa fa-table mr-3"></i>View Reports <i class="fa fa-angle-down"></i>
            </a>

            <!-- Collapsible element -->
            <div class="collapse list-group list-group-flush ml-4" id="collapseExample">
                <a href="/views/fuel/sale/report.php" class="list-group-item  waves-effect">
                    <i class="fa fa-sun-o mr-3"></i>Fuel Sales
                </a>
                <a href="/views/lubricant/sale/report.php" class="list-group-item waves-effect">
                    <i class="fa fa-bars mr-3"></i>Lubricant Sales
                </a>
                <a href="/views/fuel/purchase/reportcreate.php" class="list-group-item waves-effect">
                    <i class="fa fa-bars mr-3"></i>Fuel Purchase
                </a>
                <a href="/views/lubricant/" class="list-group-item waves-effect">
                    <i class="fa fa-bars mr-3"></i>Lubricant Purchase
                </a>

            </div>

            <a class="list-group-item waves-effect"  data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <i class="fa fa-table mr-3"></i>Purchase Details <i class="fa fa-angle-down"></i>
            </a>

            <!-- Collapsible element -->
            <div class="collapse list-group list-group-flush ml-4" id="collapseExample">
                <a href="/views/fuel" class="list-group-item  waves-effect">
                    <i class="fa fa-sun-o mr-3"></i>Fuel Purchase
                </a>
                <a href="/views/lubricant" class="list-group-item waves-effect">
                    <i class="fa fa-bars mr-3"></i>Lubricant Purchase
                </a>

            </div>

            <?php
        }
        ?>

        <?php
        if (isset($_SESSION['user']) && $_SESSION['user']['Type'] == "Owner"){
            ?>
            <a class="list-group-item waves-effect"  data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <i class="fa fa-table mr-3"></i>View Reports <i class="fa fa-angle-down"></i>
            </a>

            <!-- Collapsible element -->
            <div class="collapse list-group list-group-flush ml-4" id="collapseExample">
                <a href="/views/fuel" class="list-group-item  waves-effect">
                    <i class="fa fa-sun-o mr-3"></i>Fuel Sales
                </a>
                <a href="/views/lubricant" class="list-group-item waves-effect">
                    <i class="fa fa-bars mr-3"></i>Lubricant Sales
                </a>
                <a href="/views/lubricant" class="list-group-item waves-effect">
                    <i class="fa fa-bars mr-3"></i>Fuel Purchase
                </a>
                <a href="/views/lubricant" class="list-group-item waves-effect">
                    <i class="fa fa-bars mr-3"></i>Lubricant Purchase
                </a>

            </div>


            <?php
        }
        ?>

        <?php
        if (isset($_SESSION['user']) && $_SESSION['user']['Type'] == "Cashier"){
            ?>
            <a href="#" class="list-group-item active waves-effect">
                <i class="fas fa-chart-pie mr-3"></i>Daily Cash from shift
            </a>

            <?php
        }
        ?>
    </div>

</div>
<!-- Sidebar -->