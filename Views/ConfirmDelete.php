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
        main {
            flex:1;
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 20px;
        }

    </style>
</head>

<body>
    <?php
    require("../Models/Header.php");
    ?>
    <main>
        <?php
        require("../Models/Nav.php");
        ?>
    <div>
        <h1>Estas seguro que desea eliminar su cuenta?</h1>
        <br>
        <form method="post" action="../Controllers/DeleteuserController.php">
            <button type="submit" name="Si" class="bg-blue-500 p-4 rounded-md text-white">Si</button>
            <button type="submit" name="No" class="ml-4 bg-blue-500 p-4 rounded-md text-white">No</button>
            </form>
        </div>         
    </main>
    <?php
    require("../Models/Footer.php");
    ?>
</body>

</html>