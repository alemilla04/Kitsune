<?php
require_once(__DIR__ . "/../Models/Autoload.php");
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

<body>
    <?php
    require("../Models/Header.php");
    ?>
    <main class="h-[100%] w-[100%] grid grid-cols-[auto_1fr] grid-rows-[1fr]">
    <?php
        require("../Models/Nav.php");
    ?>
    <div class="m-5">
        <h1 class="ml-2">Pagina de grupos</h1>
        <p class="ml-2">Esto es la informacion sobre la pagina principal de kitsune</p>
        <hr><br>
        <h2 class="ml-2">Secciones de la pagina</h2>
        <br><hr>
        <!-- Div principal -->
        <?php
            if(isset($_SESSION["usere"])){
                print "<p>".$_SESSION['usere']."</p>";
                unset($_SESSION['usere']);
            }
        ?>
    </div>
    </main>
    <?php
    require("../Models/Footer.php");
    ?>
</body>

</html>