
CREATE DATABASE examen2;
USE examen2;

CREATE TABLE `edificios` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) DEFAULT NULL,
  `pisos` int DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `idtipo` int DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `idtipo` (`idtipo`),
  CONSTRAINT `edificios_ibfk_1` FOREIGN KEY (`idtipo`) REFERENCES `tipos` (`idtipo`)
);

CREATE TABLE `tipos` (
  `idtipo` int NOT NULL AUTO_INCREMENT,
  `descriptipo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idtipo`)
);

INSERT INTO `tipos` (`idtipo`, `descriptipo`) VALUES
(1, 'Residencial'),
(2, 'Comercial'),
(3, 'Industrial'),
(4, 'Educacional');