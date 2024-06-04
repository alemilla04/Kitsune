<?php
require_once(__DIR__ . "/../Models/Autoload.php");

if (isset($_GET['id'])) {
    $_SESSION["responseId"] = $_GET['id'];
    $question = selectQuestion($_GET['id']);
} else {
    $_SESSION["responseId"] = 0;
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
            <div>
                <?php
                print "<p>Responda a la pregunta ".$question['titulo']."</p>";
                ?>
                <br>
                <form method="POST" action="../Controllers/ResponseController.php" enctype="multipart/form-data">
                    <label class="text-white">Indique la respuesta que quiere hacer</label>
                    <input type='text' name='cuerpo' class=ml-4></input>
                    <br>                    
                    <br>
                <br>
                <p>
                    <input type='submit' value='Responder' class="bg-blue-500 p-2 rounded-md text-white">
                    <input type='reset' value='Reiniciar' class="bg-blue-500 p-2 rounded-md text-white">
                </p>
                <br>
                <?php
                    if(isset($_SESSION["usera"])){
                        print "<p>".$_SESSION['usera']."</p>";
                        unset($_SESSION['usera']);
                    }
                ?>
    </form>
        </div>
                
    </main>
    <?php
    require("../Models/Footer.php");
    ?>
</body>

</html>