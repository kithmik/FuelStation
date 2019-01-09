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

$update_path = "/controllers/deo/fuel/sale/update.php";
$delete_path = "/controllers/deo/fuel/sale/delete.php";
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


                    <div class="table ">
                        <table id="fuel-data" class="table table-striped" cellspacing="0" >

                            <thead>
                            <tr>

                                <th>PumpId</th>
                                <th>PumperId</th>
                                <th>Date</th>
                                <th>Opening Meter Reading</th>
                                <th>Closing MReading</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Total Amount (Liters)</th>
                                <th>Debtor Sales</th>
                                <th>Card Sales</th>
                                <th>To Be Received</th>

                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($fuelsales as $row => $fuelsale){
                                $id = $fuelsale["id"];
                                echo "<tr>";

                                echo "<td>".$fuelsale["PumpId"]."</td>";
                                echo "<td>".$fuelsale["PumperId"]."</td>";
                                echo "<td>".$fuelsale["Date"]."</td>";
                                echo "<td>".$fuelsale["OMReading"]."</td>";
                                echo "<td>".$fuelsale["CMReading"]."</td>";
                                echo "<td>".$fuelsale["Stime"]."</td>";
                                echo "<td>".$fuelsale["Etime"]."</td>";
                                echo "<td>".$fuelsale["TotalAmount"]."</td>";
                                echo "<td>".$fuelsale["DebtorSales"]."</td>";
                                echo "<td>".$fuelsale["CardSales"]."</td>";
                                echo "<td>".$fuelsale["ToBeRecieved"]."</td>";

                                echo "<td>";
                                echo "<button class='btn btn-warning edit-modal-btn btn-sm' type='button' data-toggle='modal' data-target='#edit-modal' data-id='$id'>Edit</button>";
                                echo "<button class='btn btn-danger btn-sm delete-modal-btn' type='button' data-toggle='modal' data-target='#delete-modal' data-id='$id'>Delete</button>";
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
                                <h4 class="modal-title">Edit Fuel Sales Record</h4>
                            </div>
                            <div class="modal-body">
                                <!--                            <div id="status-text"></div>
                                -->
                                <form action="<?php echo $update_path; ?>" method="post" class="form-horizontal" role="form" id="edit-form">

                                    <input type="hidden" id="edit_id" name="edit_id" value="">
                                    <div class="form-group">

                                        <label class="control-label col-md-12" for="PumpId">PumpId:</label>
                                        <div class="col-md-12">

                                            <input type="text" class="form-control" id="PumpId" name="PumpId" value="" placeholder="Fuel ID" required autofocus> </div>


                                        <label class="control-label col-md-12" for="PumperId">PumperId:</label>
                                        <div class="col-md-12">

                                            <input type="text" class="form-control" id="PumperId" name="PumperId" value="" placeholder="Fuel Type" required autofocus> </div>

                                        <label class="control-label col-md-12" for="Date">Date:</label>
                                        <div class="col-md-12">

                                            <input type="text" class="form-control" id="Date" name="Date" value=" " placeholder="Fuel ID" required autofocus> </div>

                                        <label class="control-label col-md-12" for="OMReading">Opening Meter Reading:</label>
                                        <div class="col-md-12">

                                            <input type="text" class="form-control" id="OMReading" name="OMReading" value=" " placeholder="Fuel ID" required autofocus> </div>

                                        <label class="control-label col-md-12" for="CMReading">Closing MReading:</label>
                                        <div class="col-md-12">

                                            <input type="text" class="form-control" id="CMReading" name="CMReading" value=" " placeholder="Fuel ID" required autofocus> </div>

                                        <label class="control-label col-md-12" for="Stime">Start Time:</label>
                                        <div class="col-md-12">

                                            <input type="text" class="form-control" id="Stime" name="Stime" value=" " placeholder="Fuel ID" required autofocus> </div>

                                        <label class="control-label col-md-12" for="Etime">End Time:</label>
                                        <div class="col-md-12">

                                            <input type="text" class="form-control" id="Etime" name="Etime" value=" " placeholder="Fuel ID" required autofocus> </div>

                                        <label class="control-label col-md-12" for="TotalAmount">Total Amount (Liters):</label>
                                        <div class="col-md-12">

                                            <input type="text" class="form-control" id="TotalAmount" name="TotalAmount" value=" " placeholder="Fuel ID" required autofocus> </div>


                                        <label class="control-label col-md-12" for="DebtorSales">Debtor Sales:</label>
                                        <div class="col-md-12">

                                            <input type="text" class="form-control" id="DebtorSales" name="DebtorSales" value=" " placeholder="Fuel ID" required autofocus> </div>
                                        <label class="control-label col-md-12" for="CardSales">CardSales:</label>
                                        <div class="col-md-12">

                                            <input type="text" class="form-control" id="CardSales" name="CardSales" value=" " placeholder="Fuel ID" required autofocus> </div>
                                        <label class="control-label col-md-12" for="ToBeRecieved">To Be Received:</label>
                                        <div class="col-md-12">

                                            <input type="text" class="form-control" id="ToBeRecieved" name="ToBeRecieved" value=" " placeholder="Fuel ID" required autofocus> </div>





                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-default" name="submit" id="submit-edit">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>


                                </form>


                                <div id="fuel-data">

                                </div>
                            </div>

                        </div>

                    </div>
                </div>


                <div id="delete-modal" class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">

                                <h4 class="modal-title">Delete Fuel Sales Record</h4>

                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <!--                            <div id="status-text"></div>
                                -->
                                Are you sure you want to delete this?
                                <form action="<?php echo $delete_path; ?>" method="post" class="form-horizontal" role="form" id="delete-form">

                                    <input type="hidden" id="delete_id" name="delete_id" value=" ">
                                    <div class="form-group pull-right">
                                        <input type="submit"  class="btn btn-default btn-sm" name="submit" id="submit-delete">
                                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
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
        var fuelsales = JSON.parse('<?php echo(json_encode($fuelsales)); ?>');

        $(document).ready(function () {

            $(".edit-modal-btn").click(function (e) {
                // e.preventDefault();
                var id = $(this).attr("data-id");
                $("#edit_id").attr("value", id);

                var len = fuelsales.length;
                console.log(len);
                for (var i = 0; i < len; i++){
                    var fuelsale = fuelsales[i];
                    if (fuelsale.id == id){
                        console.log(fuelsale);
                        $.each(fuelsale, function (key, value) {
                            $("#"+key).attr("value", value);
                        });
                    }

                }

                $("#edit-modal").show();
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

            $(".delete-modal-btn").click(function (e) {
                e.preventDefault();
                var id = $(this).attr("data-id");
                console.log(id);
                $("#delete_id").attr("value", id);
                $("#delete-modal").show();
            });

            /*$(".close").click(function (e) {
                e.preventDefault();
                $('.modal').hide();
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
                /*dom: 'Bfrtip',*/
                lengthChange: false/*,
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
                ]*/
            });
        });
    </script>
</body>
</html>
