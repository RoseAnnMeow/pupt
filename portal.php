<?php
session_start();
include('includes/header.php');
?>

<body class="hold-transition login-page">
<div class="login-box">
<div class="login-logo">
<a href="index.php"><b>PUPT</b>DCMS</a>
</div>

<div class="card card-outline card-primary shadow">
<div class="card-body login-card-body">
<p class="login-box-msg">You're about to enter the PUPT DCMS Portal. Please select to login.</p>

<div class="social-auth-links text-center mb-3">
<a href="patient/login.php" class="btn btn-block btn-info">
 Patient
</a>
<a href="dentist/login.php" class="btn btn-block btn-secondary">
 Dentist
</a>
<a href="staff/login.php" class="btn btn-block btn-warning">
 Staff
</a>
<a href="admin/login.php" class="btn btn-block btn-danger">
Admin
</a>
</div>
</div>

</div>
</div>

  
</body>
</html>
<?php include('includes/scripts.php'); ?>