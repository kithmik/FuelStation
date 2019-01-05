<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$document_root = $_SERVER['DOCUMENT_ROOT'];
$include_path = $document_root."/views/includes";

$login_path = "/controllers/login.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Fuel Station Management System</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="/libs/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/libs/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="/libs/css/style.min.css" rel="stylesheet">
    <style type="text/css">
        html,
        body,
        header,
        .view {
            height: 100%;
        }

        @media (max-width: 740px) {
            html,
            body,
            header,
            .view {
                height: 1000px;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {
            html,
            body,
            header,
            .view {
                height: 650px;
            }
        }
        @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
                background: #1C2331!important;
            }
        }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">


        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">


            <!-- Right -->


        </div>

    </div>
</nav>
<!-- Navbar -->

<!-- Full Page Intro -->
<div class="view full-page-intro" style="background-image: url('/libs/img/index.jpg'); background-repeat: no-repeat; background-size: cover;">

    <!-- Mask & flexbox options-->
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

        <!-- Content -->
        <div class="container">

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-6 mb-4 white-text text-center text-md-left">

                    <h1 class="display-4 font-weight-bold">Fuel Station Management System</h1>




                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 col-xl-5 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">

                            <!-- Form -->
                            <form method="POST" action="<?php echo $login_path; ?>">

                                <!-- Heading -->
                                <h3 class="dark-grey-text text-center">
                                    <strong>Login Here:</strong>
                                </h3>
                                <hr>



                                <div class="md-form">
                                    <i class="fa fa-envelope prefix "></i>




                                    <input id="EmpId" type="text" class="form-control" name="NIC" placeholder="Enter your NIC" value="<?php if(isset($_COOKIE["EmpId"])) { echo $_COOKIE["EmpId"]; } ?>" required autofocus>


                                </div>


                                <div class="md-form">
                                    <i class="fa fa-lock prefix "></i>




                                    <input id="password" type="password" class="form-control" name="password" placeholder="Enter Your Password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" required>




                                </div>



                                <div class="text-center">

                                    <input type="submit" name="login"  class="btn btn-indigo" value="Login"><br>
                                    <hr>


                                    <fieldset class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">

                                        <label class="form-check-label dark-grey-text" for="remember">
                                            Remember Me
                                        </label>

                                    </fieldset>
                                </div>

                            </form>
                            <!-- Form -->

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </div>
        <!-- Content -->

    </div>
    <!-- Mask & flexbox options-->

</div>
<!-- Full Page Intro -->



<!--Footer-->


<?php
//include_once($include_path."/scripts.php");
include_once ($include_path.'/footer.php');
?>

<!--/.Footer-->


</body>
</html>