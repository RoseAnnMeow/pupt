<?php

    include('../admin/config/dbconn.php');
    
    $doctor_id = $_POST['doctor_id'];

    $table = 'tblappointment';
    $primaryKey = 'id';
    
    $columns = array(
        array( 'db' => 'patient_name', 'dt' => 'patient_name' ),
        array( 'db' => 'created_at',  'dt' => 'created_at' ),
        array( 'db' => 'schedule',   'dt' => 'schedule' ),
        array( 'db' => 'starttime',  'dt' => 'starttime' ),
        array( 'db' => 'endtime',   'dt' => 'endtime' ),
        array( 'db' => 'status',   'dt' => 'status' ),
        array( 'db' => 'id',   'dt' => 'id' ),
    );
    
    require( '../admin/config/sspconn.php' );
    
    require( 'ssp.class.php' );
    $where = "schedtype ='Walk-in Schedule' AND doc_id ='".$doctor_id."' ";
    echo json_encode(
        SSP::complex( $_POST, $sql_details, $table, $primaryKey, $columns, $where)
    );

?>