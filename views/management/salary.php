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
                    Salary

                </div>
                <div class="card-body h-100">

                    <form width=70% method="post" action="salary.php">

                        <label for="fid">Employee Name</label><br>
                        <?php
                        $sql = "SELECT EmpId FROM pumper";

                        $result= $conn->query($sql);

                        echo "<select name='pumper' class='mdb-select md-form'>";
                        echo '<option value="">Select Employee ID</option>';
                        while ($row = $result->fetch_assoc()) {
                            $empid = $row['EmpId'];

                            echo '<option value="'.$empid.'">'.$empid.'</option>';
                        }
                        echo '<option value="all">all</option>';
                        echo "</select>"


                        ?>
                        <br>


                        <label for="fid">From</label><br>
                        <input type="date" id="fname" name="from" placeholder="Please select 1st day of required month"><br>

                        <label for="fid">To</label><br>
                        <input type="date" id="fname" name="to" placeholder="Please select last day of required month"><br>




                        <!--     <a href="debtordeo.php"><button type="button" class="btn">Debtor</button></a>
                        -->

                        <button class="btn btn-primary" type="submit" name="submittime" value="Submit">Submit</button></center>

                    </form>



                    <?php
                    // include 'LoanAdvance.php'







                    $db=mysqli_connect("localhost","root","", "fuel_station");

                    if (isset($_POST['submittime'])){





                        global $db;


                        $emp_id=0;

                        $from = $_POST['from'];
                        $to = $_POST['to'];
                        $pumperselect = $_POST['pumper'];



                        //display specific empid salary or all salary
                        if($pumperselect === "all"){
                            $empquery = mysqli_query($db,"SELECT EmpId FROM pumper");

                        }
                        else{
                            $empquery = mysqli_query($db,"SELECT EmpId FROM pumper WHERE EmpId='$pumperselect'");
                        }

                        while ($employee = mysqli_fetch_assoc($empquery) ){
                            $emp_id=$employee['EmpId'];


                            //date format change
                            $from = date_format(date_create($from), "y-m-d");
                            $to = date_format(date_create($to), "y-m-d");





                            //caculating employee working hours per specific period
                            $working_hours=mysqli_query($db, "SELECT WorkHour FROM salarydetails WHERE Date BETWEEN '$from' AND '$to' AND EmpId='$pumperselect'");
                            $emphours = 0;
                            $days = 0;
                            while ($result = mysqli_fetch_assoc($working_hours)){


                                $emphours += $result['WorkHour'];
                                $days++;


                                if ($days>31){
                                    break;
                                }


                            }


                            //retrieve basic salary & allowence from pumper

                            $basic_salary = mysqli_query($db, "SELECT BasicSalary FROM pumper WHERE EmpId =$emp_id");
                            $allowence_data = mysqli_query($db, "SELECT Allowances FROM pumper WHERE EmpId =$emp_id");



                            $advance = 0;
                            $loan=0;



                            $result2 = mysqli_fetch_assoc($basic_salary);
                            $basic_salary2 = $result2['BasicSalary'];




                            $result2 = mysqli_fetch_assoc($allowence_data);
                            $allowence = $result2['Allowances'];




                            //retrieve salary advance
                            $advance=mysqli_query($db,"SELECT Advance FROM advance WHERE FromMonth BETWEEN '$from' AND '$to' AND EmpId=$emp_id");

                            $advance1=0;
                            $loan1=0;


                            while ($result1 = mysqli_fetch_assoc($advance)){
                                $advance1= $result1['Advance'];



                            }
                            //retrieve shortages
                            $shortage=mysqli_query($db,"SELECT SUM(Shortages) AS sum_shortage FROM cashiersale WHERE Date BETWEEN '$from' AND '$to' AND EmpId=$emp_id");

                            while ($result2 = mysqli_fetch_assoc($shortage)){
                                $shortage1= $result2['sum_shortage'];
                            }




                            //calculate overtime and nopay
                            $nopay=0;
                            $ot=0;

                            if ($emphours<208){
                                $perhour=$basic_salary2/208;
                                $nopay =($emphours-208)*$perhour;
                                $nopay = number_format((float)$nopay, 2, '.', '');
                                if ($nopay<0){
                                    break;
                                }
                            }
                            else{
                                $perhour=$basic_salary2/208;
                                $overtime = $perhour*1.5;
                                $ot = $overtime*($emphours-208);
                                $ot = number_format((float)$ot, 2, '.', '');
                            }

                            //calculate gross salary
                            $gross = $basic_salary2 + $allowence  + $nopay + $ot;
                            $gross = number_format((float)$gross, 2, '.', '');

                            //calculate EPF employees contribution
                            $epf = $basic_salary2*0.08;
                            $epf = number_format((float)$epf, 2, '.', '');

                            //calcutale Net salary
                            $net= $gross-($epf+$advance1+$shortage1);
                            $net = number_format((float)$net, 2, '.', '');











                            echo "<div class='table'>
		<table>
		     <tr>
		         <th>Employee ID</th>
			     <th>Basic Salary</th>
			     <th>Allownce</th>
			     <th>Nopay</th>
				 <th>OT</th>
			     <th>Gross Salary</th>
			     <th>EPF 8%</th>
			     <th>Advance</th>
			     <th>Shortage</td>
			     <th>Net Salary</th>
			 </tr>";


                            echo"<tr>
		             <td>".$emp_id."</td>
			         <td>".$basic_salary2."</td>
			         <td>".$allowence."</td>
			         <td>".$nopay."</td>
			         <td>".$ot."</td>
					 <td>".$gross."</td>
					 <td>".$epf."</td>
					 <td>".$advance1."</td>
					 <td>".$shortage1."</td>
					 <td>".$net."</td>

			 </tr>";

                            echo "</table>
			 </div>";
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


