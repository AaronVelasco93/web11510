<?php
include('db.php');
$id = $_GET['id'];

$sql = "DELETE FROM usuarios WHERE id = $id";
if($coon->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error al eliminar el registro.";
}
?>