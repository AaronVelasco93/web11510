<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <form action="getEnviar.php" method="GET">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre"> <br><br>

        <label for="correo">Correo:</label>
        <input type="text" name="correo"><br><br>

        <label for="telefono">Telefono:</label>
        <input type="text" name="telefono">
        <button type="submit">Enviar datos</button>
    </form>
</body>

</html>