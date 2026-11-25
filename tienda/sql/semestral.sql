-- =====================================================
--  Base de datos: semestral
--  Tienda de electrodomésticos - Ingeniería Web
--  Ejecutar en phpMyAdmin (pestaña SQL) o en la consola de MySQL
-- =====================================================

DROP DATABASE IF EXISTS semestral;
CREATE DATABASE semestral CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE semestral;

-- Tabla proveedor
CREATE TABLE proveedor (
    id_proveedor     INT          NOT NULL,
    nombre_proveedor VARCHAR(100) NOT NULL,
    PRIMARY KEY (id_proveedor)
) ENGINE = InnoDB;

-- Tabla productos
CREATE TABLE productos (
    id_producto  INT           NOT NULL AUTO_INCREMENT,
    descripcion  VARCHAR(150)  NOT NULL,
    cantidad     INT           NOT NULL DEFAULT 0,
    marca        VARCHAR(50)   NOT NULL,
    costo        DECIMAL(10,2) NOT NULL,
    id_proveedor INT           NOT NULL,
    PRIMARY KEY (id_producto),
    CONSTRAINT fk_productos_proveedor
        FOREIGN KEY (id_proveedor) REFERENCES proveedor (id_proveedor)
        ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE = InnoDB;

-- Datos de prueba
INSERT INTO proveedor (id_proveedor, nombre_proveedor) VALUES
(1, 'Distribuidora Panamá S.A.'),
(2, 'ElectroImport Corp.'),
(3, 'Hogar Total');

INSERT INTO productos (descripcion, cantidad, marca, costo, id_proveedor) VALUES
('Refrigeradora 18 pies',       5, 'Samsung',   899.99, 1),
('Lavadora automática 20 lb',   8, 'LG',        549.50, 2),
('Microondas 1.1 pies',        15, 'Panasonic', 119.90, 3),
('Televisor LED 55 pulgadas',   6, 'Samsung',   649.00, 1),
('Aire acondicionado 12000 BTU',4, 'LG',        429.75, 2),
('Licuadora 10 velocidades',   20, 'Oster',      45.99, 3);
