<?php 
 $host = '127.0.0.1:3306';
 $user = "root";
 $pass="Aaron123";
 $dbName="crud_app";

// $host = 'sql109.infinityfree.com';
// $user = "if0_43062408";
// $pass="c4Fc9ujHNUKhk";
// $dbName="if0_43062408_crud_app";

$coon = new mysqli($host, $user,$pass,$dbName);
if($coon->connect_error){
    die('Error de conexion'. $coon->connect_error);
    
}else{
    echo "Conexion exitosa";
}


?>