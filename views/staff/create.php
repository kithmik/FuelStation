<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){
    header("Location: ".$_SERVER['DOCUMENT_ROOT']."/index.php");
    exit(0);
}
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
                    Staff Register

                </div>
                <div class="card-body">

                    <form action="<?php echo $create_path; ?>" method="post">



                            <div class="md-form">
                                <label for="NIC">NIC</label><br>
                                <input class="form-control" type="text" id="NIC" name="NIC" required><br>

                            </div>
                            <div class="md-form">
                                <label for="firstname">First Name</label><br>
                                <input class="form-control" type="text" id="firstname" name="firstname" required><br>

                            </div>

                            <div class="md-form">
                                <label for="empid">Employee ID</label><br>
                                <input class="form-control" type="text" id="empid" name="empid" required><br>

                            </div>

                            <div class="md-form">
                                <label for="firstname">First Name</label><br>
                                <input class="form-control" type="text" id="firstname" name="firstname" required><br>

                            </div>


                            <div class="md-form">
                                <label for="lastname">Last Name</label><br>
                                <input class="form-control" type="text" id="lastname" name="lastname" required><br>

                            </div>


                            <div class="md-form">
                                <label for="cno">Contact Number</label><br>
                                <input class="form-control" type="text" id="cno" name="contactnumber" required><br>

                            </div>

                            <div class="md-form">
                                <label for="address">Address</label><br>
                                <input class="form-control" type="text" id="address" name="address" required><br>

                            </div>

                            <div class="md-form">
                                <label for="dob">Date of Birth</label><br>
                                <input class="form-control" type="date" id="dob" name="dob" required><br>

                            </div>
                            <div class="md-form">
                                <label for="email">Email</label><br>
                                <input class="form-control" type="email" id="email" name="email" required><br>

                            </div>
                            <div class="md-form">
                                <label for="type">Job Role</label><br>

                                <select name="type" id="type" class="form-control">
                                    <option value="Data Entry Operator">Data Entry Operator</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Cashier">Cashier</option>
                                    <option value="Owner">Owner</option>
                                </select>

                            </div>
                            <div class="md-form">
                                <label for="password">Password</label><br>
                                <input class="form-control" type="password" id="password" name="password" required><br>

                            </div>
                            <div class="md-form">
                                <label for="conpassword">Confirm Password</label><br>
                                <input class="form-control" type="password" id="conpassword" name="conpassword" required><br>

                            </div>

                            <div class="md-form">
                                <label for="bsalary">Basic Salary</label><br>
                                <input class="form-control" type="text" id="bsalary" name="bsalary" required><br>

                            </div>

                            <div class="md-form">
                                <label for="allowances">Allowances</label><br>
                                <input class="form-control" type="text" id="allowances" name="allowances" required><br>

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