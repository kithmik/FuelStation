<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){
    header("Location: /index.php");
    exit(0);
}
$document_root = $_SERVER['DOCUMENT_ROOT'];
require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

$include_path = $document_root."/views/includes";

?>

<!doctype html>
<html>
<head>
    <title>Fuel Management System</title>
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
            <div class="card h-100">
                <div class="card-header">
                    Salary Advance

                </div>
                <div class="card-body h-100">

                    <form width=70% action="" method="POST">

                        <label for="fid">Pumper ID</label><br>
                        <?php
                        $sql = "SELECT EmpId FROM pumper";

                        $result= $conn->query($sql);

                        echo "<select name='empid' class='mdb-select md-form'>";
                        echo '<option value="">Select Employee ID</option>';
                        while ($row = $result->fetch_assoc()) {
                            $empid = $row['EmpId'];

                            echo '<option value="'.$empid.'">'.$empid.'</option>';
                        }
                        echo '<option value="all">all</option>';
                        echo "</select>"


                        ?>
                        <br>
                        <!--
                        <label for="fid">Pumper ID</label><br>
                        <input type="text" id="fname" name="empid" placeholder="Enter Pumper ID.." required><br>
-->
                        <label for="uprice">Date </label><br>
                        <input type="date" id="lname" name="formonth"  required><br>


                        <label for="advance">Advace</label><br>
                        <input type="text" id="fname" name="advance" ><br>








                        <button type="submit" name="submitLA" value="Submit">Submit</button></center>
                    </form>

                    <?php
                    //if upload button pressed

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                        $empid=$_POST['empid'];
                        $advance=$_POST['advance'];
                        $formonth=$_POST['formonth'];


                        $sql="INSERT INTO loanadvance VALUES ('$empid','$advance','$formonth')";

                        $result = mysqli_query($db,$sql);//store submitted data into database table
                        if (!$result){
                            echo "<script>alert(\"Error Occured!\");</script>";
                        }else {
                            echo "<script>alert(\"Successfully Entered!\");</script>";
                        }


                    }



                    ?>


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


