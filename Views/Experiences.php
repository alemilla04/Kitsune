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
                <h1>Pagina principal de kitsune</h1>
                <p>Esto es la informacion sobre la pagina principal de kitsune</p>
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
                border-black rounded-md">
                <!-- Esto es un posible idea cosas como descubre temas o unete a la comunidad -->
                <!-- En los siguientes cuadros-->
                    <div class="border-2 border-black mt-4 ml-4 mr-4 mb-4 rounded-md flex justify-center gap-4 p-4">
                        <h3 class="ml-2 mt-2">Ojea otras publicaciones</h3>
                        <a href="../Views/ShowMessagesGroups.php" class="bg-orange-500 p-2 rounded-md">Go!</a>
                    </div>
                    <div class="border-2 border-black mt-4 ml-4 mr-4 mb-10 rounded-md flex justify-center gap-4 p-4">
                        <h3 class="ml-2 mt-2">Descubre Grupos</h3>
                        <a href="../Views/Groups.php" class="bg-orange-500 p-2 rounded-md">Go!</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    require("../Models/Footer.php");
    ?>
</body>

</html>