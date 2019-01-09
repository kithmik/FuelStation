<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){
    header("Location: /index.php");
    exit(0);
}
$document_root = $_SERVER['DOCUMENT_ROOT'];
require_once ($document_root."/controllers/deo/lubricant/sale/index.php");

$update_path = "/controllers/deo/lubricant/sale/update.php";
$delete_path = "/controllers/deo/lubricant/sale/delete.php";

$include_path = $document_root."/views/includes";

?>

<!doctype html>
<html>
<head>
    <title>Lubricant Sales</title>
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
                    Lubricant Sales
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col">
                            <a href="/views/lubricant/sale/create.php" class="btn btn-success">
                                Create New  <i class="fa fa-plus" aria-expanded="false"></i>
                            </a>
                        </div>
                    </div>

                    <div class="table responsive">
                        <table id="lubricantsale-data" class="table table-striped data_table" cellspacing="0" width="100%">

                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Lubricant ID</th>
                                <th>Date</th>
                                <th>No Of Items</th>
                                <th>Total Amount(Rs)</th>
                                <th>Cash Sales</th>
                                <th>Debtor Sales</th>
                                <th>Card Sales</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($lubricantsales as $lubricantsale){
                                $id = $lubricantsale["id"];
                                echo "<tr>";
                                echo "<td>$id</td>";
                                echo "<td>".$lubricantsale["LubricantId"]."</td>";
                                echo "<td>".$lubricantsale["Date"]."</td>";
                                echo "<td>".$lubricantsale["NoOfItems"]."</td>";
                                echo "<td>".$lubricantsale["TotalAmount"]."</td>";
                                echo "<td>".$lubricantsale["Cashsale"]."</td>";
                                echo "<td>".$lubricantsale["Debtorsale"]."</td>";
                                echo "<td>".$lubricantsale["Cardsale"]."</td>";
                                echo "<td>";
                                echo "<button class='btn btn-warning edit-modal-btn btn-sm' type='button' data-toggle='modal' data-target='#edit-modal' data-id='$id'>Edit</button>";
                                echo "<button class='btn btn-danger btn-sm' type='button' data-toggle='modal' data-target='#delete-modal' data-id='$id'>Delete</button>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                            </tbody>

                        </table>
                    </div>



                </div>

                <div id="edit-modal" class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Edit Lubricant Sales Record</h4>
                            </div>
                            <div class="modal-body">

                                <form action="<?php echo $update_path; ?>" method="post" class="form-horizontal" role="form" id="edit-form">

                                    <input type="hidden" id="edit_id" name="edit_id" value="">
                                    <div class="form-group">

                                        <label class="control-label col-sm-12" for="LubricantId">Lubricant ID:</label>
                                        <div class="col-md-12">

                                            <input type="text" class="form-control" id="LubricantId" name="LubricantId" value="" placeholder="Fuel ID" required autofocus> </div>

                                        <label class="control-label col-sm-12" for="Date">Date:</label>
                                        <div class="col-md-12">

                                            <input type="text" class="form-control" id="Date" name="Date" value="" placeholder="Fuel ID" required autofocus> </div>



                                        <label class="control-label col-sm-12" for="NoOfItems">No Of Items:</label>
                                        <div class="col-md-12">

                                            <input type="text" class="form-control" id="NoOfItems" name="NoOfItems" value="" placeholder="Fuel Type" required autofocus> </div>

                                        <label class="control-label col-sm-12" for="TotalAmount">Total Amount(Rs):</label>
                                        <div class="col-md-12">

                                            <input type="text" class="form-control" id="TotalAmount" name="TotalAmount" value="" placeholder="Unit Price" required> </div>

                                        <label class="control-label col-sm-12" for="Cashsale">Cash Sales:</label>
                                        <div class="col-md-12">

                                            <input type="text" class="form-control" id="Cashsale" name="Cashsale" value="" placeholder="Unit Priced Date" required autofocus> </div>

                                        <label class="control-label col-sm-12" for="Debtorsale">Debtor Sales:</label>
                                        <div class="col-md-12">

                                            <input type="text" class="form-control" id="Debtorsale" name="Debtorsale" value="" placeholder="Unit Priced Date" required autofocus> </div>

                                        <label class="control-label col-sm-12" for="Cardsale">Card Sales:</label>
                                        <div class="col-md-12">

                                            <input type="text" class="form-control" id="Cardsale" name="Cardsale" value="" placeholder="Unit Priced Date" required autofocus> </div>

                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-default" name="submit_edit" id="submit-edit">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>


                                </form>


                                <div id="lubricantsale-data">

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>


        </div>


    </div>



    <script>
        var lubricantsales = JSON.parse('<?php echo(json_encode($lubricantsales)); ?>');
        $(document).ready(function () {

            $(".edit-modal-btn").click(function (e) {
                // e.preventDefault();
                var id = $(this).attr("data-id");
                $("#edit_id").attr("value", id);

                var len = lubricantsales.length;

                for (var i = 0; i < len; i++){
                    var lubricantsale = lubricantsales[i];
                    if (lubricantsale.id == id){
                        console.log(lubricantsale);
                        $.each(lubricantsale, function (key, value) {
                            $("#"+key).attr("value", value);

                        });
                    }

                }

                $("#edit-modal").show();
            });



        });
    </script>




    <?php
    include_once($include_path."/scripts.php");
    include_once ($include_path.'/footer.php');
    ?>

    ?>

    <script>
        $(document).ready(function() {
            $('.data_table').DataTable({
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
