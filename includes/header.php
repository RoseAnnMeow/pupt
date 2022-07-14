<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PUP Taguig DCMS</title>
  <?php
  include('admin/config/dbconn.php');
  $sql = "SELECT * FROM system_details";
  $query_run = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_array($query_run)){?> 
  <link href="upload/<?=$row['logo']?>" rel="icon">
  <?php }; ?>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/assets/plugins/font-awesome-pro/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="admin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="admin/assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="admin/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="admin/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="admin/assets/plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="admin/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="admin/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="admin/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Toastr -->
   <link rel="stylesheet" href="admin/assets/plugins/toastr/toastr.min.css">
  <!-- Date Picker -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet"/>
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="admin/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="admin/assets/plugins/fullcalendar/main.css">
   <!-- Select2 -->
 <link rel="stylesheet" href="admin/assets/plugins/select2/css/select2.min.css">
 <link rel="stylesheet" href="admin/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Custom style -->
</head>
<style>
      .sidebar-dark-red{
        background: #7E0E09 !important;
      }
      [class*=sidebar-dark-] .sidebar a {
        color: white;
      }
      [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link {
        color: white;
      }
 </style>



