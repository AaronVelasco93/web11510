<?php
$host='127.0.0.1';
$port='3306';
$user='root';
$pass='Aaron123';
$db='crud_app';
$conexion = new mysqli($host,$user,$pass,$db,$port);
if($conexion->connect_error){
    echo "sin conexion";
}else{
    echo "Genial tenemos conexion";
}



?>