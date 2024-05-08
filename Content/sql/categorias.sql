-- Usar la base de datos creada
USE Kitsune;

-- Crear la tabla para almacenar información de usuarios
CREATE TABLE IF NOT EXISTS Categorias(
    categoriaID INT PRIMARY KEY AUTO_INCREMENT, -- ID único para cada pregunta
    Nombre VARCHAR(100) NOT NULL, -- Titulo de la pregunta
    Etiqueta VARCHAR(100) NOT NULL,
    userID int,
    FOREIGN KEY (userID) REFERENCES usuarios(userID),
    guest_nombre VARCHAR(100),
    guest_email VARCHAR(100)
);
