-- Usar la base de datos creada
USE Kitsune;

-- Crear la tabla para almacenar información de usuarios
CREATE TABLE IF NOT EXISTS Categorias(
    categoriaID INT PRIMARY KEY AUTO_INCREMENT, -- ID único para cada pregunta
    nombre VARCHAR(100) NOT NULL, -- Titulo de la pregunta
);
