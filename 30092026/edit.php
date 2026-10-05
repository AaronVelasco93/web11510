<?php
    include('db.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = $coon->query($sql);
    $row = $resultado->fetch_assoc();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    
    $sql="UPDATE usuarios SET nombre = '$nombre', email = '$email', telefono = '$telefono' WHERE id = $id";

    if($coon->query($sql) === TRUE){
        echo "Usuario actualizado correctamente";
        header("Location: index.php");
    }else{
        echo "Error al actualizar el usuario: " . $coon->error; 
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <a href="index.php">Inicio</a>
    <form  method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" ><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" ><br><br>
        <label for="telefono">Telefono:</label>
        <input type="text" name="telefono" value="<?php echo $row['telefono']; ?>" ><br><br>
        <button type="submit">Guardar</button>

    </form>    


</body>
</html>