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
        <div class="p-4">
            <div class="flex rounded-md border-2 w-[50%] p-4">
                <h3 class="ml-4 mt-2">Discover Groups</h3>
                <a href="../Views/Groups.php" class="bg-orange-500 p-2 ml-4 rounded-md">Next</a>
            </div>
            <div class="flex rounded-md border-2 w-[50%] p-4 mt-4">
                <h3 class="ml-4 mt-2">Discover reviews</h3>
                <a href="../Views/ShowMessagesGroups.php" class="bg-orange-500 p-2 ml-4 rounded-md">Next</a>
            </div>
        </div>
    </div>
    </main>
    <?php
    require("../Models/Footer.php");
    ?>
</body>

</html>