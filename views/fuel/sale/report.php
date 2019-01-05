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

</div>

    <?php
//    require_once ($include_path.'/footer.php');
//    require_once($include_path."/scripts.php");

    ?>

<script src="/libs/js/jquery-3.3.1.min.js"></script>

<script src="/libs/js/popper.min.js" ></script>
<script src="/libs/js/bootstrap.js" ></script>
<script src="/libs/js/mdb.js" ></script>

<script src="/libs/js/compiled.min.js" defer></script>

<!--<script src="/libs/js/bootstrap.min.js"></script>-->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>


<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap4.min.js"></script>


<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.40/pdfmake.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.40/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js">
</script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>

    <script type="text/javascript">
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

