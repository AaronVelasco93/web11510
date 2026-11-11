<?php
//Programaremos las consultas : buscar correo, registrar usuario, listar u actualizar el hash
declare(strict_types=1);
namespace App\Models;
use App\Core\Conexion;

final class Usuario
{
    //tenemos PDO para poder aser conexiones
    public function __construct(private Conexion $conexion)
    {

    }
    public function buscarPorCorreo (string $correo):array|false{
        $consulta = $this->conexion->obtener()->prepare('SELECT id, nombre, correo, password_hash FROM usuarios WHERE correo = :correo LIMIT');
        $consulta->execute(['correo'=>$correo]);
        return $consulta->fetch();
    }
    public function registrar (string $nombre, string $correo, string $hash):int{
        $pdo = $this->conexion->obtener();
        $consulta = $pdo->prepare('INSERT INTO usuarios (nombre, correo, password_hash) VALUES (:nombre, :correo, :hash)');
        $consulta->execute(['nombre'=>$nombre,'correo'=>$correo,'hash'=>$hash]);
        return (int) $pdo->lastInsertId();
    }

    public function listar():array{
        $consulta ='SELECT id, nombre, correo, creado_en FROM usuarios ORDER BY id DESC';
        return $this->conexion->obtener()->prepare($consulta)->fetchAll();

    }

    public function actualizarHash(int $id, string $hash):void{
        $sql='UPDATE usuarios SET password_hash= :hash WHERE id = :id';
        $consulta = $this->conexion->obtener()->prepare($sql);
        $consulta->execute([
            'hash' => $hash,
            'id' => $id
        ]);
    }


}

?>