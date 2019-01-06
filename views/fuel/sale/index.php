<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){
    header("Location: ".$_SERVER['DOCUMENT_ROOT']."/index.php");
    exit(0);
}
$document_root = $_SERVER['DOCUMENT_ROOT'];
require_once ($document_root."/controllers/deo/fuel/sale/index.php");

$update_path = $document_root."/controllers/deo/fuel/sale/update.php";
$delete_path = $document_root."/controllers/deo/fuel/sale/delete.php";
$include_path = $document_root."/views/includes";

?>

<!doctype html>
<html>
<head>
    <title>Fuel Sales</title>
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
                    Fuel Sales

                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col">
                            <a href="/views/fuel/sale/create.php" class="btn btn-success">
                                Create New  <i class="fa fa-plus" aria-expanded="false"></i>
                            </a>
                        </div>
                    </div>


                    <div class="table responsive">
                        <table id="fuel-data" class="table table-striped" cellspacing="0" width="100%">

                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>PumpId</th>
                                <th>PumperId</th>
                                <th>Date</th>
                                <th>Opening Meter Reading</th>
                                <th>Closing MReading</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Total Amount (Liters)</th>
                                <th>Cash Sales</th>
                                <th>Debtor Sales</th>
                                <th>Card Sales</th>

                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($fuelsales as $row => $fuelsale){
                                $id = $fuelsale["id"];
                                echo "<tr>";
                                echo "<td>$id</td>";
                                echo "<td>".$fuelsale["PumpId"]."</td>";
                                echo "<td>".$fuelsale["PumperId"]."</td>";
                                echo "<td>".$fuelsale["Date"]."</td>";
                                echo "<td>".$fuelsale["OMReading"]."</td>";
                                echo "<td>".$fuelsale["CMReading"]."</td>";
                                echo "<td>".$fuelsale["Stime"]."</td>";
                                echo "<td>".$fuelsale["Etime"]."</td>";
                                echo "<td>".$fuelsale["TotalAmount"]."</td>";
                                echo "<td>".$fuelsale["Cashsale"]."</td>";
                                echo "<td>".$fuelsale["DebtorSales"]."</td>";
                                echo "<td>".$fuelsale["CardSales"]."</td>";
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
                                <h4 class="modal-title">Edit Fuel Record</h4>
                            </div>
                            <div class="modal-body">
                                <!--                            <div id="status-text"></div>
                                -->
                                <form action="<?php echo $update_path; ?>" method="post" class="form-horizontal" role="form" id="edit-form">

                                    <input type="hidden" id="edit_id" name="edit_id" value="">
                                    <div class="form-group">

                                        <label class="control-label col-sm-2" for="FuelId">Fuel ID:</label>
                                        <div class="col-sm-4">

                                            <input type="text" class="form-control" id="FuelId" name="FuelId" value="" placeholder="Fuel ID" required autofocus> </div>


                                        <label class="control-label col-sm-2" for="FuelName">Fuel Type:</label>
                                        <div class="col-sm-4">

                                            <input type="text" class="form-control" id="FuelName" name="FuelName" value="" placeholder="Fuel Type" required autofocus> </div>

                                        <label class="control-label col-sm-2" for="UnitPrice">Unit Price:</label>
                                        <div class="col-sm-4">

                                            <input type="text" class="form-control" id="UnitPrice" name="UnitPrice" value="" placeholder="Unit Price" required> </div>

                                        <label class="control-label col-sm-2" for="UnitPricedDate">Unit Priced Date:</label>
                                        <div class="col-sm-4">

                                            <input type="text" class="form-control" id="UnitPricedDate" name="UnitPricedDate" value="" placeholder="Unit Priced Date" required autofocus> </div>

                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-default" name="submit_edit" id="submit-edit">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>


                                </form>


                                <div id="fuel-data">

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>


        </div>


    </div>



    <script>
        var fuels = JSON.parse('<?php echo(json_encode($fuels)); ?>');
        $(document).ready(function () {

            $(".edit-modal-btn").click(function (e) {
                // e.preventDefault();
                var id = $(this).attr("data-id");
                $("#edit_id").attr("value", id);
                $.each(fuels[id], function (key, value) {
                    if (key === "id"){
                        $("#FuelId").attr("value", value);
                    }
                    else if(key === "FuelName"){
                        $("#Name").attr("value", value);
                    }
                    else if(key === "UnitPrice"){
                        $("#UnitPrice").attr("value", value);
                    }
                    else if(key === "UnitPricedDate"){
                        $("#UnitPricedDate").attr("value", value);
                    }

                });
                $("#edit-modal").show();
                console.log(id);
            });

            /*$("#submit-edit").click(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "update.php",
                    data: $("#edit-form").serializeArray(),
                    method: "post",
                    success: function (data) {
                        console.log("data: "+data);
                        $("#status-text").html("Server sent: "+data);
                    },
                    error: function (err) {
                        $("#status-text").html("An error occured: "+err);
                    }

                });
            });*/

        });
    </script>




    <?php
    include_once($include_path."/scripts.php");
    include_once ($include_path.'/footer.php');
    ?>

    ?>

    <script>
        $(document).ready(function() {
            $('#fuel-data').DataTable({
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
