<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbconn.php');
?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<div class="content-wrapper">
    <div class="content-header">
        <section class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Stock of Supplies</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active">Stock of Supplies</li>
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
                  <table id="stock-table" class="table table-borderless table-hover" style="width:100%">
                    <thead class="bg-light">
                      <tr>
                        <th>#</th>
                        <th class="export">Supplies</th>
                        <th class="export">Unit</th>
                        <th class="export text-center">Quantity</th>
                        <th class="export text-center">Consumed</th>
                        <th class="export text-center">Total</th>
                        <th>Add Supply</th>
                        <th>Remove Supply</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                        $sql = "SELECT s.supply_name,s.danger_level,s.unit,ss.supply_id,ss.current_stock,ss.consumed,ss.total FROM supplies s INNER JOIN supply_stocks ss ON s.id = ss.supply_id";
                        $query_run = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $row)
                            {
                                $stock = $row['total'];
                                $critical = $row['danger_level'];
                                if ($stock <= $critical) {
                                echo '<tr class="bg-warning">';
                                }
                                else {
                                echo '<tr>';
                                }
                                ?> 
                            <td><?php echo $i++; ?></td>
                            <td><?=$row['supply_name']?></td>
                            <td><?=$row['unit']?></td>
                            <td class="text-center"><?=$row['current_stock']?></td>
                            <td class="text-center"><?=$row['consumed']?></td>
                            <td class="text-center"><?=$stock?></td>
                            <td>
                                <form action="all_supply_action.php" style="display: inline-block;" class="form-inline" method="post">
                                    <input type="number" name="stock" class="form-control form-control-sm col-4" min="1" required>
                                    <input type="hidden" name="supply_id" value="<?=$row['supply_id']?>">
                                    <input type="submit" name="addstock" class="btn btn-sm btn-success fas fa-input" value="&#xf067">
                                </form>
                            </td>
                            <td>
                                <form action="all_supply_action.php" style="display: inline-block;" class="form-inline" method="post">
                                    <input type="number" name="stock" class="form-control form-control-sm col-4" min="1" required>
                                    <input type="hidden" name="supply_id" value="<?=$row['supply_id']?>">
                                    <input type="submit" name="substock" class="btn btn-sm btn-danger fas fa-input" value="&#xf068">
                                </form>
                            </td>
                            <td>
                            <a href="supply-stock-history.php?id=<?php echo $row['supply_id'];?>"  class="btn btn-block btn-outline-secondary btn-sm">Details</a>

                            </td>
                        </tr>
                          <?php
                          }
                      }
                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th></th>
                        <th class="search">Supplies</th>
                        <th class="search">Unit</th>
                        <th class="search">Quantity</th>
                        <th class="search">Consumed</th>
                        <th class="search">Total</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </tfoot>
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
      $('#stock-table tfoot th.search').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" class="search-input form-control form-control-sm"/>' );
      } );
      var table = $('#stock-table').DataTable({
            "dom": "<'row'<'col-sm-3'l><'col-sm-5'B><'col-sm-4'f>>" +
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            "responsive":true,
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
                // Apply the search
                this.api().columns().every( function () {
                    var that = this;
     
                    $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            }
        });
});

</script>

<?php include('includes/footer.php');?>