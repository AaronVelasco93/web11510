<?php 
$host='127.0.0.1';
$user ='root';
$pass='Aaron123';
$dbName='crud_app';
$port=3306;
$conn = new mysqli($host,$user,$pass,$dbName,$port);
if($conn->connect_error){
    die('Error en la conexion'. $conn->connect_error);
}else{
    echo "Conexion realizada :# ";
}

?>