CREATE DATABASE crud_app;
USE crud_app;

CREATE TABLE usuario(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre  VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    telefono VARCHAR(15)
);