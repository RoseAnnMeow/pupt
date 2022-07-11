<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbconn.php');
?>
<body class="hold-transition sidebar-mini layout-fixed">
    <style>
        .table#transact_table.dataTable tbody tr.Highlight {
            background-color: #74b9ff;
            color:#fff;
        }
    </style>
<div class="wrapper">
    <div class="content-wrapper">
        <div class="content-header">
            <section class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Transaction of Supplies</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Transaction of Supplies</li>
                        </ol>
                    </div> 
                </div> 
            </section>
        </div> 
      

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <?php
                        include('message.php');
                    ?>
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                            <table id="transact_table" class="table table-borderless table-hover" style="width:100%">
                                <thead class="bg-light">
                                <tr>
                                    <th class="export">Created Date</th>
                                    <th class="export">Supply Name</th>
                                    <th class="export">Name of User</th>
                                    <th class="export">Stock</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $sql = "SELECT s.supply_name,st.created_at,st.user,st.stock FROM supply_transactions st INNER JOIN supplies s ON st.supply_id = s.id ORDER BY st.id DESC";
                                    $query_run = mysqli_query($conn, $sql);
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                        ?> 
                                    <tr>
                                        <td><?=date('F j, Y (g:i a)',strtotime($row['created_at'])) ?></td>
                                        <td><?=$row['supply_name']?></td>
                                        <td><?=$row['user']?></td>
                                        <td><?=$row['stock']?></td>
                                    </tr>
                                    <?php
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
        </div> 

    </div>

<?php include('includes/scripts.php');?>
<script>
    $(document).ready(function () {
      var table = $('#transact_table').DataTable({
            "dom": "<'row'<'col-sm-3'l><'col-sm-5'B><'col-sm-4'f>>" +
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            "responsive":true,
            "ordering": false,
            "searching": true,
            "paging": true,
            "buttons": [
            {
                extend: 'copyHtml5',
                className: 'btn btn-outline-secondary btn-sm',
                text: '<i class="fas fa-clipboard"></i>  Copy',
                exportOptions: {
                    columns: '.export'
                }
            },
            {
                extend: 'csvHtml5',
                className: 'btn btn-outline-secondary btn-sm',
                text: '<i class="far fa-file-csv"></i>  CSV',
                exportOptions: {
                    columns: '.export'
                }
            },
            {
                extend: 'excel',
                className: 'btn btn-outline-secondary btn-sm',
                text: '<i class="far fa-file-excel"></i>  Excel',
                exportOptions: {
                    columns: '.export'
                }
            },
            {
                extend: 'pdfHtml5',
                className: 'btn btn-outline-secondary btn-sm',
                text: '<i class="far fa-file-pdf"></i>  PDF',
                exportOptions: {
                    columns: '.export'
                }
            },
            {
                extend: 'print',
                className: 'btn btn-outline-secondary btn-sm',
                text: '<i class="fas fa-print"></i>  Print',
                exportOptions: {
                    columns: '.export'
                }
            }
        ],
            initComplete: function () {
                // Apply the highlight
                var api = this.api();
                $(api.row(':eq(0)').node()).addClass('Highlight');
            }
        });

});

</script>

<?php include('includes/footer.php');?>