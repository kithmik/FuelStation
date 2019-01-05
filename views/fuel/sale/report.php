<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){
    header("Location: /index.php");
    exit(0);
}
$document_root = $_SERVER['DOCUMENT_ROOT'];
require_once ($document_root."/controllers/deo/fuel/sale/report.php");


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
            <div class="card">
                <div class="card-header">
                    Fuel Register

                </div>
                <div class="card-body">

                    <div class="row">

                        <form action="" method="POST">
                            <input type="text" name="from" placeholder="from">
                            <br>
                            <input type="text" name="to" placeholder="to">
                            <input type="submit" name="submit">
                        </form>
                    </div>


                    <div class="table">
                        <table id="report-data-table" class="table table-striped" cellspacing="0" >

                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Pump Id</th>
                                <th>Pumper Id</th>
                                <th>Date</th>
                                <th>OMReading</th>
                                <th>CMReading</th>
                                <th>Stime</th>
                                <th>Etime</th>
                                <th>TotalAmount</th>
                                <th>Cashsale</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($fuelsales)) {
                                foreach ($fuelsales as $row => $fuelsale) {
                                    $id = $fuelsale["id"];
                                    echo "<tr>";
                                    echo "<td>$id</td>";
                                    echo "<td>" . $fuelsale["PumpId"] . "</td>";
                                    echo "<td>" . $fuelsale["PumperId"] . "</td>";
                                    echo "<td>" . $fuelsale["Date"] . "</td>";
                                    echo "<td>" . $fuelsale["OMReading"] . "</td>";
                                    echo "<td>" . $fuelsale["CMReading"] . "</td>";
                                    echo "<td>" . $fuelsale["Stime"] . "</td>";
                                    echo "<td>" . $fuelsale["Etime"] . "</td>";
                                    echo "<td>" . $fuelsale["TotalAmount"] . "</td>";
                                    echo "<td>" . $fuelsale["Cashsale"] . "</td>";
                                    echo "<td>" . $fuelsale["DebtorSales"] . "</td>";
                                    echo "<td>" . $fuelsale["CardSales"] . "</td>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            }
                            ?>
                            </tbody>

                        </table>
                    </div>



                </div>


            </div>


        </div>


    </div>


    <?php
    include_once($include_path."/scripts.php");
    include_once ($include_path.'/footer.php');
    ?>

    <script defer>
        $(document).ready(function() {
            $('#report-data-table').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                lengthChange: false,
                buttons: [
                    { extend: 'copy', className: 'btn btn-outline-info m-1 p-1' },
                    { extend: 'print', className: 'btn btn-outline-info m-1 p-1' },
                    {
                        extend: 'excelHtml5', className: 'btn btn-outline-info m-1 p-1'
                    },
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A3', className: 'btn btn-outline-info m-1 p-1'
                    }
                ]
            });
        } );
    </script>

</body>
</html>

