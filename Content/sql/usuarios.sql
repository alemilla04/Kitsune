-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS Kitsune;

-- Usar la base de datos creada
USE Kitsune;

-- Crear la tabla para almacenar información de usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    userID INT PRIMARY KEY AUTO_INCREMENT, -- ID único para cada usuario
    nombre VARCHAR(100) NOT NULL, -- Nombre del usuario
    email VARCHAR(100) UNIQUE NOT NULL, -- Email único para cada usuario
    contraseña VARCHAR(100) UNIQUE NOT NULL, -- Email único para cada usuario
    foto VARCHAR(100) NOT NULL,
    preguntas INT DEFAULT null,
    respuestas INT DEFAULT null
);
