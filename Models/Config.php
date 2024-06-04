<?php
define("SQLITE", 2);                        // Base de datos SQLITE
define("MYSQL", 1);                         // Base de datos MySQL

// Base de datos utilizada por la aplicación
$cfg["dbMotor"] = MYSQL;                                   // Valores posibles: MYSQL o SQLITE

// Configuración para MySQL
$cfg["mysqlHost"]     = "localhost";                        // Nombre de host
$cfg["mysqlUser"]     = "root";           // Nombre de usuario
$cfg["mysqlPassword"] = "";                                 // Contraseña de usuario
$cfg["mysqlDatabase"] = "Kitsune";           // Nombre de la base de datos
$cfg["mysqlTable"] = array(
    "table1" => "etiquetas",
    "table2" => "experiencias",
    "table3" => "preguntas",
    "table4" => "usuarios",
    "table5" => "categorias",
    "table6" => "respuestas"
);

define('APP_FOLDER', substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])));