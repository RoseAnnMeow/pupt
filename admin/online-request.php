<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbconn.php');
?>

<body class="hold-transition sidebar-mini layout-fixed">
  <style>
    .select2-selection__choice__remove{
      display: contents;
      position: relative;
      padding-right: 5px !important;
    }
  </style>
<div class="wrapper">
<!--Edit Modal-->
<div class="modal fade" id="EditOnlineAppModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Appointment</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
 
      <form action="online_action.php" method="POST" id="edit">
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <input type="hidden" name="edit_id" id="edit_id">
                <input type="hidden" name="select_patient" id="edit_patient_id">	
                <input type="hidden" id="edit_schedule">
              <label>Select Patient</label>
              <span class="text-danger">*</span>
                <select class="select2 patient" name="" id="edit_patient" style="width:100%;" required disabled>
                  <?php
                    $sql = "SELECT * FROM tblpatient";
                    $query_run = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($query_run) > 0){
                      foreach($query_run as $row){
                        ?>
                        <option>
                        <?php echo $row['fname'].' '.$row['lname'];?></option>
                        <?php
                      }
                    }
                    ?>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Select Doctor</label>
                <span class="text-danger">*</span>
                <select class="form-control select2 dentist" name="select_dentist" id="edit_dentist" style="width:100%;" required>
                  <?php
                      if(isset($_GET['id']))
                      {
                        echo $id = $_GET['id'];
                      } 
                      $sql = "SELECT * FROM tbldoctor WHERE status='1'";
                      $doctor_query_run = mysqli_query($conn,$sql);
                      if(mysqli_num_rows($doctor_query_run) > 0){
                        foreach($doctor_query_run as $row){
                          ?>

                          <option value="<?php echo $row['id'];?>">
                          <?php echo $row['name'];?></option>
                          <?php
                        }
                      }
                      ?>     
                  </select>
                </div>
              </div>   
              <div class="col-sm-12">              
                <div class="form-group">
                    <label>Appontment Date</label>
                    <span class="text-danger">*</span>
                    <select class="form-control select2" name="scheddate" id="edit_sched" style="width:100%;" required>
                    </select>
                </div>
              </div>     
              <div class="col-sm-12">              
                <div class="form-group">
                    <label>Appontment Time</label>
                    <span class="text-danger">*</span>
                    <select class="form-control select2" name="schedTime" id="edit_schedTime" style="width:100%;" required>
                    </select>
                </div>
              </div>   
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Service</label>
                  <span class="text-danger">*</span>
                  <select class="select2" multiple="multiple" name="service[]" id="edit_reason" style="width: 100%;" required>
                      <?php
                        $sql = "SELECT * FROM procedures ORDER BY procedures ASC";
                        $query_run = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($query_run) > 0){
                          foreach($query_run as $row){
                            $service_name = $row['procedures'];
                            echo '
                              <option value="'.$service_name.'">'.$service_name.'</option>
                            ';
                            
                          }
                        }
                      ?>
                  </select>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                    <label>Appointment Status</label>
                    <span class="text-danger">*</span>
                    <select class="form-control custom-select" name="status" id="edit_status" id="show-checkbox" required>
                      <option value="Confirmed">Confirmed</option>
                      <option value="Pending">Pending</option>
                      <option value="Cancelled">Cancelled</option>
                      <option value="No Show">No Show</option>
                      <option value="Treated">Treated</option>
                    </select>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                <label for="color">Color</label>
                <select name="color" class="form-control custom-select" id="edit_color">
                    <option style="color:#f39c12;" value="#f39c12">Yellow</option>
                    <option style="color:#00c0ef;" value="#00c0ef"> Aqua</option>
                    <option style="color:#0073b7;" value="#0073b7"> Blue</option>						  
                    <option style="color:#00a65a;" value="#00a65a"> Green</option>
                    <option style="color:#FF8C00;" value="#FF8C00"> Orange</option>
                    <option style="color:#3c8dbc;" value="#3c8dbc"> Light Blue</option>
                    <option style="color:#f56954;" value="#f56954"> Red</option>						  
                  </select>
                </div>             
              </div>
              <div class="col-sm-12">
                <div class="custom-control custom-checkbox" id="show-email2">
                  <input class="custom-control-input ck" type="checkbox" id="customCheckbox3" name="send-email" disabled>
                  <label for="customCheckbox3" class="custom-control-label">Send Email</label>
                </div>
              </div>       
            </div>
          </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" name="update_appointment" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--/edit modal -->


<!-- delete modal pop up modal -->
<div class="modal fade" id="ViewModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Health Declaration Form</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div> 
            <div class="modal-body">
              <div class="view_form">   
              </div>                   
            </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
    <!--/delete modal -->
    
<!-- delete modal pop up modal -->
<div class="modal fade" id="deletemodal">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Delete Appointment</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div> 

        <form action="online_action.php" method="POST">
            <div class="modal-body">
            <input type="hidden" name="delete_id" id="delete_id">
            <p> Do you want to delete this Appointment?</p>                          
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
                <h1>Online Request</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active">Online Request</li>
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
                <h3 class="card-title">Online Request Appointment List</h3>
              </div>
                <div class="card-body">
                  <table id="apptmttbl" class="table table-borderless table-hover" style="width: 100%;">
                    <thead class="bg-light">
                      <tr>
                        <th class="export">Patient Name</th>
                        <th class="export">Date Submitted</th>
                        <th class="export">Appointment Date</th>
                        <th class="export">Start Time</th>
                        <th class="export">End Time</th>
                        <th class="export">Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th class="search">Patient Name</th>
                        <th class="search">Date Submitted</th>
                        <th class="search">Appointment Date</th>
                        <th class="search">Start Time</th>
                        <th class="search">End Time</th>
                        <th class="search">Status</th>
                        <th></th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
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
    $(document).ready(function(){
      var table = $('#apptmttbl').DataTable( {
        "dom": "<'row'<'col-sm-3'l><'col-sm-5'B><'col-sm-4'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        "processing": true,
        "searching": true,
        "paging": true,
        "responsive": true,
        "pagingType": "simple",
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
        "order": [[ 1, "desc" ]],
        "language": {
          'search': '',
          'searchPlaceholder': "Search...",
          'emptyTable': "No results found",
        },
        "ajax": {
            "url": "online_rq_table.php",
        },
        "columns": [
          { "data": "patient_name" },
          { 
            "data": "created_at",
            render: function(data,type,row){
              return moment(data).format("DD-MMMM-YYYY")
            }
          },
          { 
            "data": "schedule",
            render: function(data,type,row){
              return moment(data).format("DD-MMMM-YYYY")
            }
          },
          { "data": "starttime" },
          { "data": "endtime" },
          {
            "data": 'status',
            render: function(data, type, row) {
              if(data == 'Confirmed'){
                return '<span class="badge badge-success">Confirmed</span>';
              }else if(data == 'Pending'){
                return '<span class="badge badge-warning">Pending</span>';
              }else if(data == 'Treated'){
                return '<span class="badge badge-primary">Treated</span>';
              }else if(data == 'No Show'){
                return '<span class="badge badge-secondary">No Show</span>';
              }else{
                return '<span class="badge badge-danger">Cancelled</span>';
              }
            }
          },
          {
            "data": 'id',
            render: function(data, type,row) {
              return '<button type="button" data-id="'+ row.patient_id +'" class="btn btn-sm btn-secondary viewbtn"><i class="fad fa-head-side-mask"></i></button> <button type="button" data-id="'+ data +'" class="btn btn-sm btn-info editbtn"><i class="fas fa-edit"></i></button> <button type="button" data-id="'+ data +'" class="btn btn-danger btn-sm deletebtn"><i class="far fa-trash-alt"></i></button>';
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
      $('#apptmttbl tfoot th.search').each( function () {
          var title = $(this).text();
          $(this).html( '<input type="text" placeholder="Search '+title+'" class="search-input form-control form-control-sm"/>' );
      } );
    });

    $(document).ready(function () {

      var table1 = $('#alltable').DataTable( {
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'print',
                    exportOptions: {
                        columns: '.export'
                    }
                },
            ],
        });

        var table2 = $('#pendingtable').DataTable( {
          responsive: true,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'print',
                    exportOptions: {
                        columns: '.export'
                    }
                },
            ],
        });

        var table3 = $('#confirmedtable').DataTable( {
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'print',
                    exportOptions: {
                        columns: '.export'
                    }
                },
            ],
        } );
        var table4 = $('#cancelledtable').DataTable( {
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'print',
                    exportOptions: {
                        columns: '.export'
                    }
                },
            ],
        } );
        var table5 = $('#treatedtable').DataTable( {
             responsive: true,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'print',
                    exportOptions: {
                        columns: '.export'
                    }
                },
            ],
        } );
        var table6 = $('#requesttable').DataTable( {
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'print',
                    exportOptions: {
                        columns: '.export'
                    }
                },
            ],
        } );
        
        $(document).ready(function(){
            $("#alltable > thead > tr > th:not(:last-child)").addClass("export");
            $("#pendingtable > thead > tr > th:not(:last-child)").addClass("export");
            $("#confirmedtable > thead > tr > th:not(:last-child)").addClass("export");
            $("#cancelledtable > thead > tr > th:not(:last-child)").addClass("export");
            $("#treatedtable > thead > tr > th:not(:last-child)").addClass("export");
            $("#requesttable > thead > tr > th:not(:last-child)").addClass("export");
        });

      $('#scheddate1').datepicker({
      });
      $('#scheddate2').datepicker({
      });

      $('.select2').select2()

      $("#selectedPatient").on("change", function(){
        var patientID = $('#selectedPatient').val();
        $("#preferredDentist").val('');
        $('#preferredDate').val('');
        $("#preferredDentist").select2({
          allowClear: true,
          placeholder: "Select Dentist",
          ajax: {
            url: 'appointment_action.php',
            type: 'GET',
            dataType: 'json',
            delay: 250,
            data: function(params){
              return{
                getDoctors: patientID
              };
            },
            processResults: function(response){
              return{
                results: response
              };
            },
            cache: true,
          }
        });
        $('#preferredDate').select2({
          allowClear: true,
          placeholder: "Available Date",
          ajax: {
            url: 'appointment_action.php',
            type: 'GET',
            dataType: 'json',
            delay: 250,
            data: function(params){
                return{
                    doctorIdDate: selectedDentistId,
                    patientId: patientID
                };
            },
            processResults: function(response){
                return{
                    results: response
                };
            },
            cache: true,
          }
        });
      })

      $("#preferredDentist").on("change", function (){
          var selectedDentistId =  $("#preferredDentist").val();
          var patientID = $("#selectedPatient").val();
          $('#preferredDate').val('');
          $('#preferredDate').select2({
              allowClear: true,
              placeholder: "Available Date",
              ajax: {
              url: 'appointment_action.php',
              type: 'GET',
              dataType: 'json',
              delay: 250,
              data: function(params){
                  return{
                      doctorIdDate: selectedDentistId,
                      patientId: patientID
                  };
              },
              processResults: function(response){
                  return{
                      results: response
                  };
              },
              cache: true,
              }
          });
      });

      $("#edit_dentist").on("change", function (){
          var selectedDentistId =  $("#edit_dentist").val();
          var patientID = $("#edit_patient").val();
          $("#edit_sched").empty().trigger('change');
          $("#edit_schedTime").empty().trigger('change');
          $('#edit_sched').select2({
              allowClear: true,
              placeholder: "Available Date",
              ajax: {
              url: 'appointment_action.php',
              type: 'GET',
              dataType: 'json',
              delay: 250,
              data: function(params){
                  return{
                      doctorIdDate: selectedDentistId,
                      patientId: patientID
                  };
              },
              processResults: function(response){
                  return{
                      results: response
                  };
              },
              cache: true,
              }
          });
      });
      $("#edit_sched").on("change", function (){
        var selectedSchedId =  $("#edit_sched").val();
        var patientID = $("#edit_patient").val();
        $("#edit_schedTime").empty().trigger('change');
        $('#edit_schedTime').select2({
          allowClear: true,
          placeholder: "Available Date",
          ajax: {
            url: 'appointment_action.php',
            type: 'POST',
            dataType: 'json',
            delay: 250,
            data: function(params){
              return{
                selectedDateId: selectedSchedId,
                patientId: patientID
              };
            },
            processResults: function(response){
              return{
                results: response
              };
            },
            cache: true,
          }
        });
      });
      $(".select2").select2();
      $('.select2').on('select2:open', function () {
        $('.select2-selection__choice__remove').addClass('select2-remove-right');
      });
      $(".patient").select2({
        placeholder: "Select Patient",
        allowClear: true
      });
      $(".treatment").select2({
      placeholder: "Select Treatment",
      allowClear: true
      });

      $(".dentist").select2({
      placeholder: "Select Dentist",
      allowClear: true
      });

      $("#preferredDate").select2({
        placeholder: "Available Date",
      allowClear: true
      });
      $("#edit_reason").select2({
        placeholder: "Select Service",
        allowClear: true
      });

      $("#edit_sched").select2({
      placeholder: "Select Date",
      allowClear: true
      });
      $("#edit_schedTime").select2({
        placeholder: "Select Time",
        allowClear: true
      });

      const colorBox = document.getElementById('edit_color');

      colorBox.addEventListener('change', (event) => {
        const color = event.target.value;
        event.target.style.color = color;
      }, false);

      $("#edit_status").on('change', function() {
      var val = $(this).val();
      if (this.value == "Confirmed") {
          $('.ck').prop("disabled", false);
      }
      else
      {
        $('.ck').prop("disabled", true);
        $('#customCheckbox3').prop("checked", false);
      }
    });

 
  $(document).on('click','.viewbtn', function() {
    var userid = $(this).data('id');
    $.ajax({
      type: "GET",
      url: "online_action.php",
      data: {
        'health_dec':true,
        'user_id':userid,
      },
      success: function (response) {
        console.log(response);
        $('.view_form').html(response);
        $('#ViewModal').modal('show'); 
      }
    });
  });

    $(document).on('click', '.editbtn', function() {          
      var schedid = $(this).data('id');
      $("#edit_sched").empty().trigger('change')
      $("#edit_schedTime").empty().trigger('change')

      $.ajax({
        type:'post',
        url: "online_action.php",
        data:
        {
          'checking_editbtn':true,
          'app_id':schedid,
        },
        success: function (response) {
          $('#edit_id').val(response['id']);
          $('#edit_patient_id').val(response['patient_id']);
          $('#edit_patient').val(response['patient_name']);
          $('#edit_patient').select2().trigger('change');
          $('#edit_dentist').val(response['doc_id']);
          $('#edit_dentist').select2().trigger('change');
          var services = response['reason'].split(",");
          $('#edit_reason').val(services);
          $('#edit_reason').trigger('change');
          $('#edit_status').val(response['status']);
          $('#edit_color').val(response['bgcolor']);
          $('#edit_schedule').val(response['schedule']);
          var newOption = new Option(response['schedule'], response['sched_id'], true, false);
          $('#edit_sched').append(newOption).trigger('change');
          var newOpt = new Option(response['time'], response['time'], true, false);
          $('#edit_schedTime').append(newOpt).trigger('change');

          $('#EditOnlineAppModal').modal('show');
        }
      });
    });

    $(document).on('click','.deletebtn', function(){     
      var user_id = $(this).data('id');
      $('#delete_id').val(user_id);
      $('#deletemodal').modal('show');
      
    });

    $('#edit_status').on('change', function() {
          var treated = $(this).val();
          var schedDate = $("#edit_schedule").val();
          var appDate = Date.parse(schedDate);
          var todayDate = new Date().getTime();; 
          if(treated == "Treated")
          {
            if(todayDate < appDate)
            {
              if(confirm('The appointment date is not today, are you sure you want to set it to Treated?')){
              }else{
                  this.selectedIndex = 0;
              }
            }         
            return false;
          }  
        });

});

</script>

<?php include('includes/footer.php');?>