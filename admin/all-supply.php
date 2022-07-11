<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbconn.php');
?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<!-- Add Modal -->
<div class="modal fade" id="AddSuppliesModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Supplies</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="all_supply_action.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label for="">Supply Name</label>
                      <span class="text-danger">*</span>
                      <input type="text" name="supply_name" class="form-control" required>
                  </div>
              </div>   
              <div class="col-sm-6">
                <div class="form-group">
                    <label>Choose Supply Image</label>
                    <input type="file" name="files"> 
                </div>
              </div>   
              <div class="col-sm-12">
                  <div class="form-group">
                      <label for="">Unit</label>
                      <span class="text-danger">*</span>
                      <input type="text" name="unit" class="form-control" required>
                  </div>
              </div>  
              <div class="col-sm-12">
                  <div class="form-group">
                      <label for="">Danger Level</label>
                      <span class="text-danger">*</span>
                      <input type="number" name="danger_lvl" class="form-control" min="0" required>
                  </div>
              </div>
              <div class="col-sm-12">              
                <div class="form-group">
                  <label>Date Received</label>
                  <span class="text-danger">*</span>
                  <input type="date" name="received" class="form-control" required>
                </div>
              </div>           
            </div>
          </div>
            
      
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="insert_supply" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--Edit Modal-->
<div class="modal fade" id="EditSupplyModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Supply</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="all_supply_action.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                    <input type="hidden" name="edit_id" id="edit_id"> 
                      <label for="">Supply Name</label>
                      <span class="text-danger">*</span>
                      <input type="text" name="supply_name" id="edit_supply" class="form-control" required>
                  </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                    <label>Upload image</label>
                    <input type="file" id="edit_image" name="files">
                    <input type="hidden" name="old_image" id="old_image">
                </div>
              </div>            
              <div class="col-sm-12">
                  <div class="form-group">
                      <label for="">Unit</label>
                      <span class="text-danger">*</span>
                      <input type="text" name="unit" id="edit_unit" class="form-control" required>
                  </div>
              </div>  
              <div class="col-sm-12">
                  <div class="form-group">
                      <label for="">Danger Level</label>
                      <span class="text-danger">*</span>
                      <input type="number" name="danger_lvl" id="edit_lvl" min="0" class="form-control" required>
                  </div>
              </div>
              <div class="col-sm-12">              
                <div class="form-group">
                  <label>Date Received</label>
                  <span class="text-danger">*</span>
                  <input type="date" name="received" id="edit_received" class="form-control" required>
                </div>
              </div>       
            </div>
          </div>
            
      
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="update_supply" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--/edit modal -->

<!-- delete modal pop up modal -->
<div class="modal fade" id="deletemodal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Supply</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div> 

            <form action="all_supply_action.php" method="POST">
              <div class="modal-body">
                <input type="hidden" name="delete_id" id="delete_id">
                <p> Do you want to delete this Supply?</p>                          
              </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" name="deletedata" class="btn btn-primary ">Submit</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <!--/delete modal -->

<div class="content-wrapper">
 <!-- Content Header (Page header) -->
    <div class="content-header">
        <section class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>List of Supplies</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active">List of Supplies</li>
                </ol>
              </div> <!-- /.col -->
            </div> <!-- /.row -->
          </section><!-- /.container-fluid -->
      </div> <!--/.content-header-->
      

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <?php
            include('message.php');
          ?>
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Supplies List</h3>
                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#AddSuppliesModal">
                <i class="fa fa-plus"></i> &nbsp;&nbsp;Add Supplies</button>
              </div>
                <div class="card-body">
                  <table id="treatment_table" class="table table-borderless table-hover" style="width:100%">
                    <thead class="bg-light">
                      <tr>
                        <th width="5%">#</th>
                        <th class="export">Supply Name</th>
                        <th class="export">Picture</th>
                        <th class="export" width="10%">Unit</th>
                        <th width="15%" class="export text-center">Danger Level</th>
                        <th class="export">Date Received</th>
                        <th width="10%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                        $sql = "SELECT * FROM supplies";
                        $query_run = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $row)
                            {
                          ?>
                        <tr>                              
                            <td><?php echo $i++; ?></td>
                            <td><?=$row['supply_name']?></td>
                            <td><?php
                                if($row['image']!=null)
                                {?>
                                    <img src="../upload/supply/<?= $row['image']?>" class="img-fluid img-thumbnail" width="50" alt="">
                                    <?php
                                }
                                else{
                                    echo 'No image inserted';
                                }
                                 ?>                               
                            </td>
                            <td><?=$row['unit']?></td>
                            <td class="text-center"><?=$row['danger_level']?></td>
                            <td><?=date('d-M-Y',strtotime($row['received']))?></td>
                            <td>
                              <button type="button" data-id="<?=$row['id'] ?>" class="btn btn-sm btn-info editbtn"><i class="fas fa-edit"></i></button>
                              <input type="hidden" name="del_image" value="<?=$row['image'];?>">
                              <button type="button" data-id="<?=$row['id'] ?>" class="btn btn-danger btn-sm deletebtn"><i class="far fa-trash-alt"></i></button>
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
                        <th class="search">Supply Name</th>
                        <th></th>
                        <th class="search">Unit</th>
                        <th class="search">Danger Level</th>
                        <th class="search">Date Received</th>
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
      $('#treatment_table tfoot th.search').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" class="search-input form-control form-control-sm"/>' );
      } );
      var table = $('#treatment_table').DataTable({
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

      $(document).on('click', '.editbtn', function() {          
      var supply = $(this).data('id');

      $.ajax({
        type:'post',
        url: "all_supply_action.php",
        data:
        {
          'checking_editbtn':true,
          'supply_id':supply,
        },
        success: function (response) {
        $.each(response, function (key, value){
          $('#edit_id').val(value['id']);
          $('#edit_supply').val(value['supply_name']);
          $('#edit_unit').val(value['unit']);
          $('#edit_lvl').val(value['danger_level']);
          $('#edit_received').val(value['received']); 
          $('#old_image').val(value['image']);                
        });

        $('#EditSupplyModal').modal('show');
        }
      });
    });

    $(document).on('click','.deletebtn', function(){     
      var user_id = $(this).data('id');
      $('#delete_id').val(user_id);
      $('#deletemodal').modal('show');
      
      });
});

</script>

<?php include('includes/footer.php');?>