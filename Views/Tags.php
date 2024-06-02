<?php
session_start();
require_once(__DIR__ . "/../Models/Funciones.php");
$listaUsuarios = selectUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Content/output.css">
    <script src="../Scripts/Counter.js"></script>
    <style>
        :root {
            font-size: 18px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
    </style>
</head>

<body class="h-screen w-[100%]">
    <?php
    require("../Models/Header.php");
    ?>
    <main class="h-[100%] w-[100%] grid grid-cols-[auto_1fr] grid-rows-[1fr]">
        <?php
        require("../Models/Nav.php");
        ?>
        <div class="m-5">
            <div class="justify-start">
                <h1>Etiquetas</h1>
                <br>
            </div>
            <div id="counter-wrapper">
                <div id="counter">
                </div>
            </div>
            <div class="usuarios">
                <!-- Aqui poner algo rollo asi para los usuario o mostrar el nombre con un icono para hablar entre ellos -->
                <div class="w-[500px] h-[80%] sm:ml-10 lg:ml-48 
                sm:bg-whitemr-5 mt-5 mb-5 border-4 
                border-black rounded-md text-black">
                </div>
            </div>
        </div>
    </main>
    <?php
    require("../Models/Footer.php");
    ?>
</body>

</html>