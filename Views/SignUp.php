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
<body class='h-screen w-[100%]'>
    <header>
    <?php
    require_once(__DIR__."/../Models/Header.php");
    ?>
    </header>
    <main class="signup-main min-h-screen w-[100%] grid grid-cols-[auto_1fr] grid-rows-[1fr]">
        <?php
        require_once(__DIR__."/../Models/Nav.php");
        ?>
        <div class="m-[20px_auto]">
            <h3 class='font-normal'>Crea tu cuenta de Kitsune.<br> Es gratis y solo te toma un minuto.</h3>
            <form action="../Controllers/SignUpController.php" method="POST" enctype="multipart/form-data">
                <div class="form-sign-up flex flex-col mt-[2rem] shadow-[0px_0px_7px_0px_rgb(128,128,128)] rounded-[3%] p-[1.5rem]">
                    <label class='font-bold'>Nombre </label>
                    <input class='mt-[5px] mb-[20px] rounded-[7px] p-[7px] border-[1px] border-[#BABFC5]' type="text" name="name" value="<?php echo !empty($_SESSION['user']) ? $_SESSION["user"]["nombre"] : ''; ?>">
                    <?php
                        if(isset($errorNombre)){
                            print "<p>$errorNombre</p>";
                        }
                    ?>
                    <label class='font-bold'>Email </label>
                    <input class='border-[1px] border-[#BABFC5] mt-[5px] mb-[20px] rounded-[7px] p-[7px]' type="text" name="email" value="<?php echo !empty($_SESSION['user']) ? $_SESSION["user"]["email"] : ''; ?>">
                    <?php
                        if(isset($errorEmail)){
                            print "<p>$errorEmail</p>";
                        }
                    ?>
                    <label class='font-bold'>Contraseña </label>
                    <input class='border-[1px] border-[#BABFC5] mt-[5px] mb-[20px] rounded-[7px] p-[7px]' type="password" name="password">
                    <span class="text-[#3b3b3b] mb-[30px]">Must contain 8+ characters, including <br>at least 1 letter and 1 number.</span>
                    <?php
                        if(isset($errorPassword)){
                            print "<p>$errorPassword</p>";
                        }
                    ?>
                    <label class='font-bold'>Repite contraseña </label>
                    <input class='border-[1px] border-[#BABFC5] mt-[5px] mb-[20px] rounded-[7px] p-[7px]' type="password" name="password2">
                    <?php
                        if(isset($errorRepitePassword)){
                            print "<p>$errorRepitePassword</p>";
                        }
                    ?>
                    <label class='font-bold'>Foto de perfil </label>
                    <input class='mt-[5px] mb-[20px] rounded-[7px] p-[7px]' type="file" name="picture">
                    <input class='bg-[#1B75D0] border-[1px] border-[#1B75D0] text-white mt-[5px] mb-[20px] rounded-[7px] p-[7px]' type="submit" value="Registrarse">
                    <?php
                        if(isset($errorInsertar)){
                            print "<p class='red mb-[30px]'>$errorInsertar</p>";
                        }

                        if(isset($insertarOK) && $insertarOK == true){
                            print "<p style='color:green;'>Usuario creado correctamente</p>";
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
    <footer>
    <?php
    require_once(__DIR__."/../Models/Footer.php");
    ?>
    </footer>
</body>
</html>