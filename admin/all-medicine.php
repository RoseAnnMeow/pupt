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
<div class="modal fade" id="AddMedicineModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Medicine</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="all_medicine_action.php" method="POST">
        <div class="modal-body">
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label for="">Medicine Name</label>
                      <span class="text-danger">*</span>
                      <input type="text" name="med_name" class="form-control" required>
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
              <div class="col-sm-12">              
                <div class="form-group">
                  <label>Expiration Date</label>
                  <span class="text-danger">*</span>
                  <input type="date" name="expiration" class="form-control" required>
                </div>
              </div>      
            </div>
          </div>
            
      
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="insert_medicine" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--Edit Modal-->
<div class="modal fade" id="EditMedicineModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Medicine</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="all_medicine_action.php" method="POST">
        <div class="modal-body">
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                    <input type="hidden" name="edit_id" id="edit_id"> 
                      <label for="">Medicine Name</label>
                      <span class="text-danger">*</span>
                      <input type="text" name="med_name" id="edit_med" class="form-control" required>
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
              <div class="col-sm-12">              
                <div class="form-group">
                  <label>Expiration Date</label>
                  <span class="text-danger">*</span>
                  <input type="date" name="expiration" id="edit_expiration" class="form-control" required>
                </div>
              </div>      
            </div>
          </div>
            
      
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="update_medicine" class="btn btn-primary">Submit</button>
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
              <h4 class="modal-title">Delete Medicine</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div> 

            <form action="all_medicine_action.php" method="POST">
              <div class="modal-body">
                <input type="hidden" name="delete_id" id="delete_id">
                <p> Do you want to delete this Medicine?</p>                          
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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
    <div class="content-header">
        <section class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>List of Medicines</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active">List of Medicines</li>
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
                <h3 class="card-title">Medicine List</h3>
                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#AddMedicineModal">
                <i class="fa fa-plus"></i> &nbsp;&nbsp;Add Medicine</button>
              </div>
              <div class="col-md-12 mt-4">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="all-tab" data-toggle="tab" data-target="#all" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="expired-tab" data-toggle="tab" data-target="#expired" href="#expired" role="tab" aria-controls="expired" aria-selected="false">Expired Medicines</a>
                  </li>
                </ul>
              </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div id="all" class="tab-pane fade show active" role="tabpanel" aria-labelledby="all-tab">
                      <table id="medicinetbl" class="table table-borderless table-hover" style="width:100%">
                      <thead class="bg-light">
                        <tr>
                          <th width="5%">#</th>
                          <th class="export" width="25%">Medicine Name</th>
                          <th class="export" width="10%">Unit</th>
                          <th class="export" width="15%">Danger Level</th>
                          <th class="export">Date Received</th>
                          <th class="export">Expiration Date</th>
                          <th width="10%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
                          date_default_timezone_set("Asia/Manila");
                          $i = 1;
                          $today = date("Y-m-d");
                          $sql = "SELECT * FROM medicines";
                          $query_run = mysqli_query($conn, $sql);
                          if(mysqli_num_rows($query_run) > 0)
                          {
                              foreach($query_run as $row)
                              {
                                $expired = $row['expiration'];
                                if ($today > $expired) {
                                  echo '<tr class="bg-warning">';
                                  }
                                  else {
                                  echo '<tr>';
                                  }
                                  ?>                            
                              <td><?php echo $i++; ?></td>
                              <td><?=$row['med_name']?></td>
                              <td><?=$row['unit']?></td>
                              <td class="text-center"><?=$row['danger_level']?></td>
                              <td><?=date('d-M-Y',strtotime($row['received']))?></td>
                              <td><?=date('d-M-Y',strtotime($row['expiration'])) ?></td>
                              <td>
                                <button type="button" data-id="<?=$row['id'] ?>" class="btn btn-sm btn-info editbtn"><i class="fas fa-edit"></i></button>
                                <button type="button" data-id="<?=$row['id'] ?>" class="btn btn-danger btn-sm deletebtn"><i class="far fa-trash-alt"></i></button>
                              </td>
                          </tr>
                            <?php
                            }
                        }
                        ?>
                      </tbody>
                      </table>
                    </div>            
                    <div id="expired" class="tab-pane fade" role="tabpanel" aria-labelledby="expired-tab">
                      <table id="expiredtbl" class="table table-borderless table-hover" style="width:100%">
                        <thead class="bg-light">
                          <tr>
                            <th width="5%">#</th>
                            <th class="export" width="25%">Medicine Name</th>
                            <th class="export" width="10%">Unit</th>
                            <th class="export" width="15%">Danger Level</th>
                            <th class="export">Date Received</th>
                            <th class="export">Expiration Date</th>
                            <th width="10%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                            date_default_timezone_set("Asia/Manila");
                            $i = 1;
                            $today = date("Y-m-d");
                            $sql = "SELECT * FROM medicines WHERE expiration < now()";
                            $query_run = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                { ?>
                              <tr>                        
                                <td><?php echo $i++; ?></td>
                                <td><?=$row['med_name']?></td>
                                <td><?=$row['unit']?></td>
                                <td class="text-center"><?=$row['danger_level']?></td>
                                <td><?=date('d-M-Y',strtotime($row['received']))?></td>
                                <td><?=date('d-M-Y',strtotime($row['expiration'])) ?></td>
                                <td>
                                  <button type="button" data-id="<?=$row['id'] ?>" class="btn btn-sm btn-info editbtn"><i class="fas fa-edit"></i></button>
                                  <button type="button" data-id="<?=$row['id'] ?>" class="btn btn-danger btn-sm deletebtn"><i class="far fa-trash-alt"></i></button>
                                </td>
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
    </div>
</div> 

</div>

<?php include('includes/scripts.php');?>
<script>
    $(document).ready(function () {
      // $('#medicinetbl, #expiredtbl tfoot th.search').each( function () {
      //       var title = $(this).text();
      //       $(this).html( '<input type="text" placeholder="Search '+title+'" class="search-input form-control form-control-sm"/>' );
      // } );
      var table1 = $('#medicinetbl').DataTable({
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
    });

      var table2 = $('#expiredtbl').DataTable({
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
    });

    $('.nav-tabs a').on('shown.bs.tab', function (event) {
      var tabID = $(event.target).attr('data-target');
      if( tabID === '#all') {
        table1.columns.adjust().responsive.recalc();
      }
      if( tabID === '#expired') {
        
        table2.columns.adjust().responsive.recalc();
      }
    } );

      $(document).on('click', '.editbtn', function() {          
      var medicine = $(this).data('id');

      $.ajax({
        type:'post',
        url: "all_medicine_action.php",
        data:
        {
          'checking_editbtn':true,
          'medicine_id':medicine,
        },
        success: function (response) {
        $.each(response, function (key, value){
          $('#edit_id').val(value['id']);
          $('#edit_med').val(value['med_name']);
          $('#edit_unit').val(value['unit']);
          $('#edit_lvl').val(value['danger_level']);
          $('#edit_received').val(value['received']);      
          $('#edit_expiration').val(value['expiration']);      
        });

        $('#EditMedicineModal').modal('show');
        }
      });
    });

    $(document).on('click','.deletebtn', function(){     
      var user_id = $(this).data('id');
      $('#delete_id').val(user_id);
      $('#deletemodal').modal('show');
      
      });

      $(function(){
      var hash = window.location.hash;
      hash && $('ul.nav a[href="' + hash + '"]').tab('show');

      $('.nav-tabs a').click(function (e) {
        $(this).tab('show');
        var scrollmem = $('body').scrollTop();
        window.location.hash = this.hash;
        $('html,body').scrollTop(scrollmem);
      });
    });
});

</script>

<?php include('includes/footer.php');?>