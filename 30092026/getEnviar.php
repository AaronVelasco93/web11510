<?php 
include ('db.php');

if($_SERVER['REQUEST_METHOD']=== 'GET'){
//nombre
$nombre =$_GET['nombre'];
//correo
$correo = $_GET['correo'];
//telefono
$telefono = $_GET['telefono'];
//consulta de SQL
$sql = "INSERT INTO usuarios (nombre, email ,telefono)VALUES('$nombre','$correo','$telefono')";

//enviarla
if($coon->query($sql) === TRUE){
    header( 'Location: create.php');
    exit();
}else{
    echo "Todo mal Tonoto";
}


}else{
    echo "error";
}


?>