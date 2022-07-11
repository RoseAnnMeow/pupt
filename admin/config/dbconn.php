<?php

    $sname= "localhost";
    $uname= "root";
    $password = "";
    
    $db_name = "taguig_dental";
    
    $conn = mysqli_connect($sname, $uname, $password, $db_name);
    
    if (!$conn) {
      header("Location: ../errors/db.php");
      //die("Connection failed: " . mysqli_connect_error());
      die();
    }

?>