-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS Kitsune;

-- Usar la base de datos creada
USE Kitsune;

-- Crear la tabla para almacenar información de usuarios
CREATE TABLE IF NOT EXISTS Usuarios (
    UserID INT PRIMARY KEY AUTO_INCREMENT, -- ID único para cada usuario
    Nombre VARCHAR(100) NOT NULL, -- Nombre del usuario
    Email VARCHAR(100) UNIQUE NOT NULL, -- Email único para cada usuario
    Contraseña VARCHAR(100) UNIQUE NOT NULL, -- Email único para cada usuario
    Foto VARCHAR(100) NOT NULL
);
