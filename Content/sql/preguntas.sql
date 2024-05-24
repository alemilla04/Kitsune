-- Usar la base de datos creada
USE Kitsune;

-- Crear la tabla para almacenar información de usuarios
CREATE TABLE IF NOT EXISTS preguntas(
    preguntaID INT PRIMARY KEY AUTO_INCREMENT, -- ID único para cada pregunta
    titulo VARCHAR(100) NOT NULL, -- Titulo de la pregunta
    cuerpo VARCHAR(100) NOT NULL, -- Cuerpo
    etiqueta VARCHAR(100) NOT NULL,
    userID int,
    FOREIGN KEY (userID) REFERENCES usuarios(userID),
    guest_nombre VARCHAR(100) DEFAULT null,
    guest_email VARCHAR(100) DEFAULT null,
    respuestas INT NOT NULL DEFAULT '0',
    fecha TIMESTAMP
);
