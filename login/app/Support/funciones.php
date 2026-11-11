<?php
// Crear funciones para leer campos, escapar de HTML, mostrar vistas y redireccion
declare(strinc_types=1);
function escapar(maxied $valor):string{

    return htmlspecialchars((string) $valor, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

//recibe una ruta conocida y devuelve  una URL relativa compatible
function url(string $ruta):string{
    return 'index.php?r=' .rawurldecode($ruta);
}
function vista(string $nombreVista, array $datos=[],int $estado =200):void{
    http_response_code($estado);

    extract($datos,EXTR_SKIP);
    
    $nombreApp = $GLOBALS['config']['app_name'];
    $mensaje = $_SESSION['mensaje']??null;

    unset($_SESSION['mensaje']);

    require dirname(__DIR__) . '/Views/partails/header.php';
    require dirname(__DIR__) . '/Views/'.$nombreVista.'php';
    require dirname(__DIR__) .'/Views/partails/footer.php';
}



?>