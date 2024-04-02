<?php
session_start();
if(isset($_SESSION["errorNombre"])){
    $errorNombre = $_SESSION["errorNombre"];
}

if(isset($_SESSION["errorEmail"])){
    $errorEmail = $_SESSION["errorEmail"];
}

if(isset($_SESSION["errorPassword"])){
    $errorPassword = $_SESSION["errorPassword"];
}

if(isset($_SESSION["errorRepitePassword"])){
    $errorRepitePassword = $_SESSION["errorRepitePassword"];
}

if(isset($_SESSION["errorInsertar"])){
    $errorInsertar = $_SESSION["errorInsertar"];
}

if(isset($_SESSION["insertarOK"])){
    $insertarOK = $_SESSION["insertarOK"];
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Content/style-alta.css">
</head>
<body>
    <?php
    require_once(__DIR__."/../Models/Header.php");
    ?>
    <main class="signup-main">
        <?php
        require_once(__DIR__."/../Models/Nav.php");
        ?>
        <div class="caja-sign-up">
            <h3>Crea tu cuenta de Kitsune.<br> Es gratis y solo te toma un minuto.</h3>
            <form action="../Controllers/SignUpController.php" method="POST" enctype="multipart/form-data">
                <div class="form-sign-up">
                    <label>Nombre </label>
                    <input type="text" name="name" value="<?php echo !empty($_SESSION['user']) ? $_SESSION["user"]["name"] : ''; ?>">
                    <?php
                        if(isset($errorNombre)){
                            print "<p>$errorNombre</p>";
                        }
                    ?>
                    <label>Email </label>
                    <input type="text" name="email">
                    <?php
                        if(isset($errorEmail)){
                            print "<p>$errorEmail</p>";
                        }
                    ?>
                    <label>Contraseña </label>
                    <input type="password" name="password">
                    <span>Must contain 8+ characters, including <br>at least 1 letter and 1 number.</span>
                    <?php
                        if(isset($errorPassword)){
                            print "<p>$errorPassword</p>";
                        }
                    ?>
                    <label>Repite contraseña </label>
                    <input type="password" name="password2">
                    <?php
                        if(isset($errorRepitePassword)){
                            print "<p>$errorRepitePassword</p>";
                        }
                    ?>
                    <label>Foto de perfil </label>
                    <input type="file" name="picture">
                    <input type="submit" value="Registrarse">
                    <?php
                        if(isset($errorInsertar)){
                            print "<p>$errorInsertar</p>";
                        }

                        if(isset($insertarOK) && $insertarOK == true){
                            print "<p>Usuario creado correctamente</p>";
                        }

                        unset($_SESSION["errorNombre"]);
                        unset($_SESSION["errorEmail"]);
                        unset($_SESSION["errorPassword"]);
                        unset($_SESSION["errorRepitePassword"]);
                        unset($_SESSION["errorInsertar"]);
                        unset($_SESSION["insertarOK"]);
                    ?>
                </div>
            </form>
        </div>
    </main>
    <?php
    require_once(__DIR__."/../Models/Footer.php");
    ?>
</body>
</html>