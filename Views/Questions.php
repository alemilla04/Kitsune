<?php
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Content/output.css">
    <link rel="stylesheet" href="../Content/style-alta.css">
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
        <div class="text-white border bg-blue-800 rounded-[5px] h-fit w-fit p-2 text-xs">
            <a href="MakeQuestion.php">Formular una pregunta</a>
        </div>
        <div class="">
            <div>

            </div>
        </div>
    </div>
    </main>

    <?php
    require_once(__DIR__."/../Models/Footer.php");
    ?>
</body>
</html>