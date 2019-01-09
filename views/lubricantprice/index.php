<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){
    header("Location: ".$_SERVER['DOCUMENT_ROOT']."/index.php");
    exit(0);
}
$document_root = $_SERVER['DOCUMENT_ROOT'];
require_once ($document_root."/controllers/deo/lubricantprice/index.php");

$update_path = "/controllers/deo/lubricantprice/update.php";
$delete_path = "/controllers/deo/lubricantprice/delete.php";

$include_path = $document_root."/views/includes";

?>

<!doctype html>
<html>
<head>
    <title>Lubricantprice Register</title>
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
                    Lubricant price Register

                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col">
                            <a href="/views/lubricantprice/create.php" class="btn btn-success">
                                Create New  <i class="fa fa-plus" aria-expanded="false"></i>
                            </a>
                        </div>
                    </div>

                    <div class="table ">
                        <table class="table table-striped datatable" cellspacing="0" >

                            <thead>
                            <tr>
                                <th>LubricantId</th>
                                <th>Unit Price</th>
                                <th>UnitPriced Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($lubricantprices as $lubricantprice){
                                $id = $lubricantprice["id"];
                                echo "<tr>";

                                echo "<td>".$lubricantprice["LubricantId"]."</td>";
                                echo "<td>".$lubricantprice["UnitPrice"]."</td>";
                                echo "<td>".$lubricantprice["UnitPricedDate"]."</td>";


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
                                <h4 class="modal-title">Edit Lubricant price Record</h4>
                            </div>
                            <div class="modal-body">

                                <form action="<?php echo $update_path; ?>" method="post" class="form-horizontal" role="form" id="edit-form">

                                    <input type="hidden" id="edit_id" name="edit_id" value="">

                                    <div class="md-form">
                                        <label for="LubricantId">Lubricant Id</label>
                                        <input type="text" name="LubricantId" id="LubricantId" value=" " class="form-control" required>
                                    </div>
                                    <div class="md-form">
                                        <label for="UnitPrice">Unit Price</label>
                                        <input type="text" name="UnitPrice" id="UnitPrice" value=" " class="form-control" required>
                                    </div>
                                    <div class="md-form">
                                        <label for="UnitPricedDate">Unit Priced Date</label>
                                        <input type="text" name="UnitPricedDate" id="UnitPricedDate" value=" " class="form-control" required>
                                    </div>

                                    <div class="md-form">
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

                                <h4 class="modal-title">Delete Fuel Record</h4>

                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">

                                     Are you sure you want to delete this?

                                   <form action="<?php echo $delete_path; ?>" method="post" class="form-horizontal" role="form" id="delete-form">

                                           <input type="hidden" id="delete_id" name="delete_id" value="">
                                           <div class="form-group pull-right">
                                               <input type="submit"  class="btn btn-default btn-sm" name="submit" id="submit-delete">
                                               <button type="button" class="btn btn-default btn-sm close" data-dismiss="modal">Close</button>
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
        var lubricantprices = JSON.parse('<?php echo(json_encode($lubricantprices)); ?>');
        $(document).ready(function () {

            $(".edit-modal-btn").click(function (e) {

                var id = $(this).attr("data-id");
                $("#edit_id").attr("value", id);

                var len = lubricantprices.length;

                for (var i = 0; i < len; i++){
                    var lubricantprice = lubricantprices[i];
                    if (lubricantprice.id == id){
                        console.log(lubricantprice);
                        $.each(lubricantprice, function (key, value) {
                            $("#"+key).attr("value", value);

                        });
                    }

                }

                $("#edit-modal").show();
            });


            $(".delete-modal-btn").click(function (e) {
                e.preventDefault();
                var id = $(this).attr("data-id");
                console.log(id);
                $("#delete_id").attr("value", id);
                $("#delete-modal").show();
            });


        });
    </script>



    <?php
    include_once($include_path."/scripts.php");
    include_once ($include_path.'/footer.php');
    ?>


</body>
</html>
