

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `usuarios` VALUES (10,'Aaron zhbhbhAgustin','asasas@gmail.com','23456'),(12,'Aaron Velasco Agustin','aaron@gmail.git','345678'),(14,'Datos test','datos@gmail.com','44rtyui4');
UNLOCK TABLES;
