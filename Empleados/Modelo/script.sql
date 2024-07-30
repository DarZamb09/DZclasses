
CREATE DATABASE dbnomina;
USE dbnomina;

CREATE TABLE cargos (
    idcargo INT AUTO_INCREMENT PRIMARY KEY,
    descripcion VARCHAR(100) NOT NULL,
    sueldo DECIMAL(6, 2) NOT NULL
);


INSERT INTO cargos (descripcion, sueldo) VALUES
('Gerente Ventas', 1000.00),
('Asistente Comercial', 650.00),
('Desarrollador Backend', 850.00),
('Analista Senior', 850.00),
('Especialista', 1000.00);

CREATE TABLE empleados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    titulo VARCHAR(100) NOT NULL,
    idcargo INT,
    FOREIGN KEY (idcargo) REFERENCES cargos(idcargo)
);
