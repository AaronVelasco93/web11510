<?php 
    // Cargar la configuracion
    $config = require __DIR__ . "/config.php";
    
    $host    = $config["DB_HOST"]; 
    $dbname  = $config["DB_NAME"];
    $user    = $config["DB_USER"];
    $pass    = $config["DB_PASS"];
    $charset = $config["DB_CHARSET"];
// Opciones recomendadas para PDO
$options=[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try{
        //motor + host + nombre db + charset
    $dsn="mysql:host=$host; dbname=$dbname;charset=$charset";

    $pdo = new PDO($dsn,$user,$pass,$options);


}catch(PDOException $e){
    die("Error de conexion: ". $e->getMessage());
}


?>