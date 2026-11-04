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
    
};






?>