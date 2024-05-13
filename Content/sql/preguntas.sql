-- Usar la base de datos creada
USE Kitsune;

-- Crear la tabla para almacenar información de usuarios
CREATE TABLE IF NOT EXISTS Preguntas(
    preguntaID INT PRIMARY KEY AUTO_INCREMENT, -- ID único para cada pregunta
    titulo VARCHAR(100) NOT NULL, -- Titulo de la pregunta
    cuerpo VARCHAR(100) NOT NULL, -- Cuerpo
    etiqueta VARCHAR(100) NOT NULL,
    userID int,
    FOREIGN KEY (userID) REFERENCES usuarios(userID),
    guest_nombre VARCHAR(100),
    guest_email VARCHAR(100)
);
