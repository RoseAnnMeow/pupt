<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('../admin/config/dbconn.php');
?>

<body class="hold-transition sidebar-mini layout-fixed">
<style>
    .table#transact-table.dataTable tbody tr.Highlight {
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
                <?php
                if(isset($_GET['id']))
                {
                    $med_id = $_GET['id'];
                    $sql = "SELECT * FROM medicines WHERE id='$med_id'";
                    $query_run = mysqli_query($conn,$sql);
                    
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $row)
                        {
                ?>
                <h1>Details of <?=$row['med_name']?></h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active">Details of <?=$row['med_name']?></li>
                    </ol>
              </div> 
            </div> 
          </section>
          <?php 
          }
        }
    }
    ?>
      </div>
      

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <?php
            include('message.php');
          ?>
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Medicine Details</h3>
                    <a href="medicine-stock.php" class="btn  btn-outline-danger btn-sm float-right">
                    <i class="fas fa-long-arrow-left"></i> &nbsp;&nbsp;Back</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <?php
                            if(isset($_GET['id']))
                            {
                                $med_id = $_GET['id'];
                                $trans = "SELECT m.id,m.med_name,m.danger_level,ms.total FROM medicines m INNER JOIN medicine_stocks ms ON m.id=ms.medicines_id WHERE m.id='$med_id'";
                                $query_run = mysqli_query($conn,$trans);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $row)
                                    {
                            ?>
                            <tr>
                                <th width="45%">Medicine id</th>
                                <td><?=$row['id']?></td>
                            </tr>
                            <tr>
                                <th width="45%">Supply Name</th>
                                <td><?=$row['med_name']?></td>
                            </tr>
                            <tr>
                                <th width="45%">Danger Level</th>
                                <td><?=$row['danger_level']?></td>
                            </tr>
                            <tr>
                                <th width="45%">Current Stock</th>
                                <td><?=$row['total']?></td>
                            </tr>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php 
                        if(isset($_GET['id']))
                        {
                            $med_id = $_GET['id'];
                            $user = "SELECT mt.created_at,mt.user,mt.stock,med_name FROM medicines_transactions mt INNER JOIN medicines m ON mt.medicines_id=m.id WHERE medicines_id='$med_id' ORDER BY mt.id DESC";
                            $query_run = mysqli_query($conn,$user);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                ?>
                    <h5 class="text-center mt-4">History of <?php echo $row['med_name'] ?></h5>
                    <table id="transact-table" class="table table-borderless table-hover" style="width:100%">
                        <thead class="bg-light">
                            <tr>
                                <th>Created Date</th>
                                <th>Name of User</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($query_run as $row)
                                {                               
                                ?>
                            <tr>
                                <td><?=date('F j, Y (g:i a)',strtotime($row['created_at'])) ?></td>
                                <td><?=$row['user']?></td>
                                <td><?=$row['stock']?></td>
                            </tr>
                            <?php
                            }
                        }
                        else
                        {
                            echo '<h5 class="text-center mt-4">History of '.$row['med_name'].' is empty</h5>';
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
      var table = $('#transact-table').DataTable({
            "responsive":true,
            "ordering":false,
            "searching": true,
            "paging": true,

            initComplete: function () {
                // Apply the search
                var api = this.api();
                $(api.row(':eq(0)').node()).addClass('Highlight');
            }
        });
});

</script>

<?php include('includes/footer.php');?>