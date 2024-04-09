<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Content/output.css">
    <link rel="stylesheet" href="../Content/style-alta.css">
</head>
<body>
    <?php
    require_once(__DIR__."/../Models/Header.php");
    ?>

    <main class="h-screen w-[100%] grid grid-cols-[auto_1fr] grid-rows-[1fr]">
        <?php
            require_once(__DIR__."/../Models/Nav.php");
        ?>
        <div>
            <h1 class="text-center">Formular una pregunta</h1>
            <form action="">
                <div>

                </div>
            </form>
        </div>

    </main>

    <?php
    require_once(__DIR__."/../Models/Footer.php");
    ?>
</body>
</html>