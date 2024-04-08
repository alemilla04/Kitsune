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
</head>
<body class="h-screen flex">
    <?php
    require_once(__DIR__."/../Models/Header.php");
    ?>
    <main class="flex-grow">
    <?php
    require_once(__DIR__."/../Models/Nav.php");
    ?>
    <form action="">
        <input type="text">
        <label for="">Hola</label>
    </form>
    </main>
    <?php
    require_once(__DIR__."/../Models/Footer.php");
    ?>
</body>
</html>