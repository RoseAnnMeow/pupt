<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('../admin/config/dbconn.php');
?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<!--Edit Modal-->
<div class="modal fade" id="EditAppointmentModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Treatment</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
 
      <form action="treatment_action.php" method="POST">
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                  <input type="hidden" name="edit_id" id="edit_id">
                  <b>Patient Name: </b> <span class="text-muted" id="edit_patient"></span>
                </div>
              </div>
              <div class="col-sm-12">              
                <div class="form-group">
                  <b>Date Visit: </b> <span class="text-muted" id="edit_visit"></span>
                </div>
              </div>     
              <div class="col-sm-12">
                <div class="form-group">
                  <b>Service: </b> <span class="text-muted" id="edit_treatment"></span>
                </div>
              </div>  
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="">Teeth No./s</label>
                  <input type="text" name="teeth" id="edit_teeth" class="form-control" >
                </div>
              </div>  
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Description</label>
                  <span class="text-danger">*</span>
                  <textarea class="form-control" rows="2" name="description" id="edit_complaint" placeholder="Enter ..."></textarea>
                </div>
              </div>
              <div class="col-sm-12">
                  <div class="form-group">
                      <label for="">Fees</label>
                      <input type="number" name="fees" id="edit_fees" class="form-control" >
                  </div>
              </div>                   
              <div class="col-sm-12">
                  <div class="form-group">
                      <label for="">Remarks</label>
                      <input type="text" name="remarks" id="edit_remarks" class="form-control" >
                  </div>
              </div>                   
            </div>
          </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" name="update_treatment" class="btn btn-primary">Submit</button>
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
              <h4 class="modal-title">Delete Treatment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div> 

            <form action="treatment_action.php" method="POST">
              <div class="modal-body">
                <input type="hidden" name="delete_id" id="delete_id">
                <p> Do you want to delete this data?</p>                          
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
                <h1>Treatment</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active">Treatment</li>
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
                <h3 class="card-title">Treatment List</h3>
              </div>
                <div class="card-body">
                  <table id="treatment_table" class="table table-borderless table-hover" style="width:100%">
                    <thead class="bg-light">
                      <tr>
                        <th class="export">Patient</th>
                        <th class="export">Date Visit</th>
                        <th class="export">Service</th>
                        <th class="export">Teeth No./s</th>
                        <th class="export">Description</th>
                        <th class="export">Fees</th>
                        <th class="export">Remarks</th>
                        <th width="10%">Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th class="search">Patient</th>
                        <th class="search">Date Visit</th>
                        <th class="search">Service</th>
                        <th class="search">Teeth No./s</th>
                        <th class="search">Description</th>
                        <th class="search">Fees</th>
                        <th class="search">Remarks</th>
                        <th></th>
                      </tr>
                    </tfoot>
                  </table>
               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    <!-- /.container-fluid -->
  </div> <!-- /.container -->
</div> <!-- /.content-wrapper -->

</div>

<?php include('includes/scripts.php');?>
<script>
    $(document).ready(function () {

      var table = $('#treatment_table').DataTable( {
      "dom": "<'row'<'col-sm-3'l><'col-sm-5'B><'col-sm-4'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-5'i><'col-sm-7'p>>",
      "processing": true,
      "searching": true,
      "paging": true,
      "responsive":true,
      "pagingType": "simple",
      "bLengthChange": true,
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
      "order": [[ 1, "asc" ]],
      "async": true,
      "language": {
        'search': '',
        'searchPlaceholder': "Search...",
        'emptyTable': "No results found",
      },
      "ajax": {
          "url": "treatment_table.php",
          "type": "GET",
          "data": {
            "doc_id": <?=$_SESSION['auth_user']['user_id']?>
          }
      },
      "columns": [
        {
          "data": 'fname',
          render: function(data, type, row) {
            return row.lname + ", " + row.fname;
          }
        },
        { 
          "data": "day",
          render: function(data,type,row){
            return moment(data).format("DD-MMM-YYYY")
          }
        },
        { "data": "treatment" },
        { "data": "teeth" },
        { "data": "complaint" },
        { "data": "fees" },
        { "data": "remarks" },
        {
          "data": 'id',
          render: function(data, type,row) {
            return '<button type="button" data-id="'+data+'" class="btn btn-sm btn-info editbtn"><i class="fas fa-edit"></i></button> <button type="button" data-id="'+data+'" class="btn btn-danger btn-sm deletebtn"><i class="far fa-trash-alt"></i></button>';
          }
        },
      ],
      "initComplete": function () {
        this.api().columns().every( function () {
          var that = this;
          $( 'input', this.footer() ).on( 'keyup change clear', function () {
            if ( that.search() !== this.value ) {
              that
                .search( this.value )
                .draw();
            }
          });
        });
      },
    });
    $('#treatment_table tfoot th.search').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" class="search-input form-control form-control-sm"/>' );
    } );
    
      $('#scheddate1').datepicker({
      });
      $('#scheddate2').datepicker({
      });

      $('.select2').select2()

      $(".patient").select2({
      placeholder: "Select Patient",
      allowClear: true
      });

      $(".dentist").select2({
      placeholder: "Select Dentist",
      allowClear: true
      });
      


    $(document).on('click', '.editbtn', function() {          
      var user_id = $(this).data('id');
      console.log(user_id);
      $.ajax({
        type:'post',
        url:"treatment_action.php",
        data:
        {
          'checking_editbtn':true,
          'userid':user_id,
        },
        dataType:"JSON",
        success: function (response) {
          $('#edit_id').val(response.id);
          $('#edit_patient').text(response.fullname);
          $('#edit_visit').text(response.day);
          $('#edit_treatment').text(response.treatment);   
          $('#edit_teeth').val(response.teeth);      
          $('#edit_complaint').val(response.complaint); 
          $('#edit_fees').val(response.fees);
          $('#edit_remarks').val(response.remarks);
          $('#EditAppointmentModal').modal('show');
        }
      })
      
    });

    $(document).on('click','.deletebtn', function(){     
      var user_id = $(this).data('id');
      $('#delete_id').val(user_id);
      $('#deletemodal').modal('show');
      
      });



});

</script>

<?php include('includes/footer.php');?>