<?php
session_start();
include('../admin/config/dbconn.php');
if(!isset($_SESSION['auth']))
{   
    header('Location: login.php');
    exit(0);
}
else if($_SESSION['auth_role'] == "staff")
{
    header('Location: ../staff/login.php');
    exit(0);
}
else if($_SESSION['auth_role'] == "patient")
{
    header('Location: ../login.php');
    exit(0);
}
else if($_SESSION['auth_role'] == "admin")
{
    header('Location: ../admin/login.php');
    exit(0);
}
else
{
    
}
?>