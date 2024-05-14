<?php
session_start();

if(isset($_SESSION['insertarOk'])){
    $insertarOk = $_SESSION['insertarOk'];
}

if(isset($_SESSION['insertarError'])){
    $insertarError = $_SESSION['insertarError'];
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
            font-size: 18px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
</head>
<body class="h-screen">
    <?php
    require_once(__DIR__."/../Models/Header.php");
    ?>

    <main class="h-screen w-[100%] grid grid-cols-[auto_1fr] grid-rows-[1fr]">

    <?php
    require_once(__DIR__."/../Models/Nav.php");
    ?>
    
    <div class="flex justify-between mt-5 ml-[5rem] mr-[5rem]">
        <div class="h-fit w-fit flex-grow text-lg">
            <h1>Explora nuestras preguntas</h1>
        </div>
        <div class="text-white">
            <a class="border bg-blue-500 rounded-[5px] p-2 text-xs" href="MakeQuestion.php">Formular una pregunta</a>
        </div>
        <div class="questions">
        </div>
    </div>
    <?php
    if(isset($insertarOk)){
        print "<p>$insertarOk</p>";
    }

    if(isset($insertarError)){
        print "<p>$insertarError</p>";
    }

    unset($_SESSION["insertarOk"]);
    unset($_SESSION["insertarError"]);
    ?>
    </main>

    <?php
    require_once(__DIR__."/../Models/Footer.php");
    ?>
</body>
</html>