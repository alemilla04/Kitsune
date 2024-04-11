-- Usar la base de datos creada
USE Kitsune;

-- Crear la tabla para almacenar información de usuarios
CREATE TABLE IF NOT EXISTS Preguntas(
    preguntaID INT PRIMARY KEY AUTO_INCREMENT, -- ID único para cada pregunta
    Titulo VARCHAR(100) NOT NULL, -- Titulo de la pregunta
    Cuerpo VARCHAR(100) NOT NULL, -- Cuerpo
    Etiqueta VARCHAR(100) NOT NULL
);
