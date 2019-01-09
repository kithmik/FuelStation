<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){
    header("Location: ".$_SERVER['DOCUMENT_ROOT']."/index.php");
    exit(0);
}
$document_root = $_SERVER['DOCUMENT_ROOT'];
require_once ($document_root."/controllers/deo/pumper/index.php");

$update_path = "/controllers/deo/pumper/update.php";
$delete_path = "/controllers/deo/pumper/delete.php";

$include_path = $document_root."/views/includes";

?>

<!doctype html>
<html>
<head>
    <title>Pumper Register</title>
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
                    Pumper Register

                </div>
                <div class="card-body">


                    <div class="row">
                        <div class="col">
                            <a href="/views/pumper/create.php" class="btn btn-success">
                                Create New  <i class="fa fa-plus" aria-expanded="false"></i>
                            </a>
                        </div>
                    </div>


                    <div class="table responsive">
                        <table class="table table-striped datatable" cellspacing="0">

                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>NIC</th>
                                <th>EmpId</th>
                                <th>FirstName</th>
                                <th>LastName</th>
                                <th>DOB</th>
                                <th>Address</th>
                                <th>TelephoneNo</th>
                                <th>BasicSalary</th>
                                <th>Allowances</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($pumpers as $pumper){
                                $id = $pumper["id"];
                                echo "<tr>";
                                echo "<td>$id</td>";
                                echo "<td>".$pumper["NIC"]."</td>";
                                echo "<td>".$pumper["EmpId"]."</td>";
                                echo "<td>".$pumper["FirstName"]."</td>";
                                echo "<td>".$pumper["LastName"]."</td>";
                                echo "<td>".$pumper["DOB"]."</td>";
                                echo "<td>".$pumper["Address"]."</td>";
                                echo "<td>".$pumper["TelephoneNo"]."</td>";
                                echo "<td>".$pumper["BasicSalary"]."</td>";
                                echo "<td>".$pumper["Allowances"]."</td>";
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
                                <h4 class="modal-title">Edit Pumper Record</h4>
                            </div>
                            <div class="modal-body">
                                <!--                            <div id="status-text"></div>
                                -->
                                <form action="<?php echo $update_path; ?>" method="post" class="form-horizontal" role="form" id="edit-form">

                                    <input type="hidden" id="edit_id" name="edit_id" value="">

                                    <div class="md-form">
                                        <label for="NIC">NIC</label>
                                        <input type="text" name="NIC" id="NIC" class="form-control" value=" " required>
                                    </div>
                                    <div class="md-form">
                                        <label for="EmpId">EmpId</label>
                                        <input type="text" name="EmpId" id="EmpId" class="form-control" value=" " required>
                                    </div>
                                    <div class="md-form">
                                        <label for="FirstName">FirstName</label>
                                        <input type="text" name="FirstName" id="FirstName" class="form-control" value=" " required>
                                    </div>
                                    <div class="md-form">
                                        <label for="LastName">LastName</label>
                                        <input type="text" name="LastName" id="LastName" class="form-control"value=" " required>
                                    </div>
                                    <div class="md-form">
                                        <label for="DOB">DOB</label>
                                        <input type="text" name="DOB" id="DOB" class="form-control"value=" " required>
                                    </div>
                                    <div class="md-form">
                                        <label for="Address">Address</label>
                                        <input type="text" name="Address" id="Address" class="form-control"value=" " required>
                                    </div>
                                    <div class="md-form">
                                        <label for="TelephoneNo">TelephoneNo</label>
                                        <input type="text" name="TelephoneNo" id="TelephoneNo" class="form-control"value=" " required>
                                    </div>
                                    <div class="md-form">
                                        <label for="BasicSalary">BasicSalary</label>
                                        <input type="text" name="BasicSalary" id="BasicSalary" class="form-control" value=" " required>
                                    </div>
                                    <div class="md-form">
                                        <label for="Allowances">Allowances</label>
                                        <input type="text" name="Allowances" id="Allowances" class="form-control" value=" " required>
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
                                <!--                            <div id="status-text"></div>
                                -->
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
        var pumpers = JSON.parse('<?php echo(json_encode($pumpers)); ?>');
        $(document).ready(function () {

            $(".edit-modal-btn").click(function (e) {
                // e.preventDefault();
                var id = $(this).attr("data-id");
                $("#edit_id").attr("value", id);

                var len = pumpers.length;
                console.log(len);
                for (var i = 0; i < len; i++){
                    var pumper = pumpers[i];
                    if (pumper.id == id){
                        console.log(pumper);
                        $.each(pumper, function (key, value) {
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

</body>
</html>
