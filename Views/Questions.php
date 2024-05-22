<?php
session_start();

if(isset($_SESSION['insertarOk'])){
    $insertarOk = $_SESSION['insertarOk'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Content/output.css">
    <style>
        :root {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
</head>
<body class="h-screen w-[100%] grid grid-rows-[auto_1fr_auto] grid-cols-[1fr]">
    <header>
    <?php
    require_once(__DIR__."/../Models/Header.php");
    ?>
    </header>

    <main class="h-[100%] w-[100%] grid grid-cols-[auto_1fr] grid-rows-[1fr]">

    <?php
    require_once(__DIR__."/../Models/Nav.php");
    ?>
    
    <!-- <div class="flex justify-between mt-5 ml-[5rem]">
        <div class="h-fit w-fit flex-grow text-lg">
            <h1>Explora nuestras preguntas</h1>
        </div>
        <div class="text-white">
            <a class="border bg-blue-500 rounded-[5px] p-2 text-xs" href="MakeQuestion.php">Formular una pregunta</a>
        </div>
        <div class="questions">
        <div class=''>hola</div>
        </div>
    </div> -->
    <div class="h-screen grid grid-cols-[1fr] grid-rows-[auto_auto_1fr] mt-5 lg:ml-[5rem] sm:ml-[10px] mr-[5px]">
        <div class="text-lg lg:flex lg:flex-row lg:justify-between md:flex md:flex-row md:justify-between sm:flex sm:flex-col">
            <h1>Explora nuestras preguntas</h1>
            <div class="text-white">
                <a class="border bg-blue-500 rounded-[5px] p-2 text-xs" href="MakeQuestion.php">Formular una pregunta</a>
            </div>
        </div>
        <div class='mt-[20px] mb-[20px] lg:flex lg:flex-row md:flex md:flex-col'>
            <h1>5 preguntas en total</h1>
            <div class='text-sm flex justify-between border-[1px] rounded-[5px] border-[#BABFC5] p-[8px]'>
                <li class=''>Mas reciente</li>       
                <li>Sin responder</li>
                <li>Puntuacion</li>     
            </div>
        </div>
        <div class="questions border-2 border-green-400">
            <p>hola</p>

            <!-- <?php
            print "<table>";
            print "";
            print "</table>";
            ?> -->
        </div>
    </div>
    <?php
    if(isset($insertarOk)){
        print "<p>$insertarOk</p>";
    }

    unset($_SESSION["insertarOk"]);
    ?>
    </main>
    <footer>
        <?php
        require_once(__DIR__."/../Models/Footer.php");
        ?>
    </footer>
</body>
</html>