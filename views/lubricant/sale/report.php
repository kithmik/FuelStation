<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){
    header("Location: /index.php");
    exit(0);
}
$document_root = $_SERVER['DOCUMENT_ROOT'];
require_once ($document_root."/controllers/deo/lubricant/sale/report.php");


$include_path = $document_root."/views/includes";

?>
<!doctype html>
<html>
<head>
    <title>lubricant sales report</title>
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
                    lubricant sales report

                </div>
                <div class="card-body">

                    <div class="row">

                        <form action="" method="POST">

                            <input class="form-control" type="text" id="from" name="from" placeholder="From" required><br>

                            <input class="form-control" type="text" id="to" name="to" placeholder="To" required><br>

                            <input type="submit" name="submit" class="form-control btn btn-primary">

                        </form>
                    </div>


                    <div class="table">
                        <table  class="datatable table table-striped" cellspacing="0" >

                            <thead>
                            <tr>

                                <th>Lubricant Id</th>
                                <th>Date</th>
                                <th>No Of Items</th>
                                <th>Total Amount</th>
                                <th>Cash Sales</th>
                                <th>Debtor Sales</th>
                                <th>Card Sales</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($lubricantsales)) {
                                foreach ($lubricantsales as $row => $lubricantsale) {
                                    $id = $lubricantsale["id"];
                                    echo "<tr>";

                                    echo "<td>" . $lubricantsale["LubricantId"] . "</td>";
                                    echo "<td>" . $lubricantsale["Date"] . "</td>";
                                    echo "<td>" . $lubricantsale["NoOfItems"] . "</td>";
                                    echo "<td>" . $lubricantsale["TotalAmount"] . "</td>";
                                    echo "<td>" . $lubricantsale["Cashsale"] . "</td>";
                                    echo "<td>" . $lubricantsale["Debtorsale"] . "</td>";
                                    echo "<td>" . $lubricantsale["Cardsale"] . "</td>";

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
    require_once ($include_path.'/footer.php');
   require_once($include_path."/scripts.php");

?>


<script>
    $(document).ready(function() {
        $('.datatable').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            lengthChange: false,
            buttons: [

                { extend: 'print', className: 'btn btn-outline-info m-1 p-1' },
                {
                    extend: 'excelHtml5', className: 'btn btn-outline-info m-1 p-1'
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'A3', className: 'btn btn-outline-info m-1 p-1'
                },
                { extend: 'colvis', className: 'btn btn-outline-info m-1 p-1' },
            ]
        });
    });
</script>

</body>
</html>

