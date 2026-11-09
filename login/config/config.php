<?php 
 $archivo = dirname(__DIR__) . '.env';
if(!is_file($archivo) || !is_readable($archivo)){
    throw new RuntimeException('El archivo .env no existe o no es legible');

}

$variables = parse_ini_file($archivo, false, INI_SCANNER_RAW);
if( $variables === false){
    throw new RuntimeException('Error al leer el archivo .env');
}

$leer = static function (string $clave) use ($variables):string{
    $valor = getenv($clave); 
    if($valor === false){
        $valor = $variables[$clave] ?? null;
    }
    if(!is_string($valor)){

        throw new RuntimeException(sprintf('Falta  una variable de entorno %s en el archivo .env', $clave));
    }   
return $valor;
};
$base = $leer('DB_DATABASE');
$puerto = filter_var($leer('DB_PORT'), FILTER_VALIDATE_INT,['options' => ['min_range' => 1, 'max_range' => 65535]]);
if(!preg_match('/^([a-zA-Z0-9_]{1,64})+$/', $base) || $puerto === false){
    throw new RuntimeException('El nombre de la base de datos o el puerto no son válidos');

}

return [
    'app_name' => $leer('APP_NAME'),
    'database' => [
        'host' => $leer('DB_HOST'),
        'port' => $puerto,
        'name' => $base,
        'username' => $leer('DB_USERNAME'),
        'password' => $leer('DB_PASSWORD'),
    ],
];

?>