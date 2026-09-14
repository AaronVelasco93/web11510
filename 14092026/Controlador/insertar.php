<?php
    include('../Config/db.php');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $sql = "INSERT INTO usuarios (nombre,email,telefono) VALUES ('$nombre','$email','$telefono')";

        if ($conn->query($sql) === TRUE) {
             header('Location: ../index.php');
            echo "Hola desde un modulo de PHP, tu no tiene que ver esto";
            exit();
        } else {
            echo "Error" . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error";
    }

?>
