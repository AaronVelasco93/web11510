<?php 
    require_once __DIR__ . "/../config/db.php";
    $error ="";
    $id = (int)($_GET['id'] ?? 0);

    if($id <= 0){
        die("ID Invalido");
    }
    
    $consulta = "SELECT id, nombre, email FROM alumnos WHERE id = :id";
    $stmt = $pdo->prepare($consulta);
    $stmt->execute([":id"=> $id]);
    $alumno = $stmt->fetch();
    
    
    if(!$alumno){
        die("Registro no encontrado");
    }
    //Si se envian datos por el formulario aremos edicion
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $nombre = trim($_POST["nombre"] ?? "");
        $email = trim($_POST["correo"] ?? "");

        if($nombre === "" || $email === ""){
            $error = "Todos los campos son obligatorios";
        }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $error="El email no es valido";
        }else{
            try{
                $sql = "UPDATE alumnos SET nombre = :nombre, email = :email WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ":nombre" => $nombre,
                    ":email"  => $email,
                    ":id" => $id
                ]);
                header("Location: index.php");
                exit;
            }catch(PDOException $e){
                $error = "Error al actualizar". $e->getMessage();

            }
        }




    }else{
        //cargar los datos del alumno
        $nombre = $alumno["nombre"];
        $email = $alumno["email"];

    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Editar</h1>
    <a href="index.php">Inicio</a>
    <?php if($error):?>
        <p><?=  htmlspecialchars($error) ?>></p>
    <?php endif;?>
    <form  method="post">
        <p>ID que modificare <?php echo $id ?></p>
        <label for="">Nombre</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($nombre) ?>"  required>
        <br>
        <label for="">Correo</label>
        <input type="text" name="correo" value="<?= htmlspecialchars($email)?>" required>
        <br>
        <button type="submit" > Actualizar</button>
    </form>    
        

</body>
</html>