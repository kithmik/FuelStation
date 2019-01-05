<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/controllers/fuel/sale/report.php");

    ?>

<br>
<br>

<h5>Total purchase(Liters):</h5>
<h5>Total purchase(Rs):</h5>
<br>
<table  id="data-table" class="table table-striped table-bordered" style="width:100%" align="center">
    <thead>
    <tr>
        <th>Fuel ID</th>
        <th>Date</th>
        <th>Amount(Liters)</th>
        <th>Expense(Rs)</th>
        <th>Paid Method</th>

    </tr>
    </thead>
    <tbody>
    <?php
//    foreach ()
    ?>
    </tbody>


</table>



<script>
    $(document).ready(function() {
        $('#data-table').DataTable({
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
}