-- Usar la base de datos creada
USE Kitsune;

-- Crear la tabla para almacenar información de usuarios
CREATE TABLE IF NOT EXISTS respuestas(
    respuestaID INT PRIMARY KEY AUTO_INCREMENT, -- ID único para cada pregunta
    preguntaID INT,
    FOREIGN KEY (preguntaID) REFERENCES preguntas(preguntaID),
    cuerpo VARCHAR(100) NOT NULL, -- Cuerpo
    userID int,
    FOREIGN KEY (userID) REFERENCES usuarios(userID),
    fecha TIMESTAMP
);
