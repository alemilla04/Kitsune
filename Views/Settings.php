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
            <div class="users-list">
                <?php
                    print "<div>";
                    print "<p>Desea actualizar sus datos?</p>";
                    print "<br>";
                    print "<a href='../Views/UpdateData.php' class='bg-blue-500 p-2 text-white rounded-md'>Actualizar datos</a>";
                    print "<br>";
                    print "<br>";
                    print "<p>Desea eliminar su cuenta?</p>";
                    print "<br>";
                    print "<a href='../Views/ConfirmDelete.php' class='bg-blue-500 p-2 text-white rounded-md'>Eliminar cuenta</a>";
                    print "<br>";
                    print "<br>";
                    print "</div>";
                ?>
            </div>
        </div>
    </main>
    <?php
    require("../Models/Footer.php");
    ?>
</body>

</html>