<!--<script src="/libs/js/jquery-3.3.1.min.js"></script>-->

<script src="/libs/js/popper.min.js" ></script>
<script src="/libs/js/bootstrap.js" ></script>
<script src="/libs/js/mdb.js" ></script>

<script src="/libs/js/compiled.min.js"></script>

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

<?php
if (isset($_SESSION['status'])){
    ?>
    <script>
        $(document).ready(function () {
            console.log("<?php echo $_SESSION['status']; ?>");
            toastr["success"]("<?php echo $_SESSION['status']; ?>");
        });
    </script>
<?php
    unset($_SESSION['status']);
}
?>


<script>
    // Material Select Initialization
    $(document).ready(function() {
        $('.mdb-select').materialSelect();
    });
</script>

