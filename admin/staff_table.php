<?php

    include('config/dbconn.php');

    $table = 'tblstaff';
    $primaryKey = 'id';
    
    $columns = array(
        array( 'db' => 'image', 'dt' => 'image' ),
        array( 'db' => 'name',  'dt' => 'name' ),
        array( 'db' => 'gender',  'dt' => 'gender' ),
        array( 'db' => 'phone',   'dt' => 'phone' ),
        array( 'db' => 'status',   'dt' => 'status' ),
        array( 'db' => 'email',   'dt' => 'email' ),
        array( 'db' => 'id',   'dt' => 'id' ),
    );
    
    require( 'config/sspconn.php' );
    
    require( 'ssp.class.php' );
    
    echo json_encode(
        SSP::complex( $_POST, $sql_details, $table, $primaryKey, $columns)
    );

?>