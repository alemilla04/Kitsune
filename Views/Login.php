<?php
require_once(__DIR__ . "/../Models/Autoload.php");

if(isset($_SESSION["errorLoginUsuario"])) {
    $errorUsuario = $_SESSION["errorLoginUsuario"];
}

if(isset($_SESSION["errorLoginPass"])) {
    $errorPass = $_SESSION["errorLoginPass"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Content/style-login.css">
    <link rel="stylesheet" href="../Content/output.css">
    <style>
        :root {
            font-family: Arial, sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        td p{
            color: red;
        }
    </style>
</head>

<body class="h-screen w-[100%] grid grid-rows-[auto_1fr_auto] place-items-center overflow-x-hidden">
    <div class="flex-1 mt-4">
        <a href="../Views/Home.php"><img class="w-[25%] h-[20%] lg:ml-80 sm:m-auto md:mt-[100px]" src="../Content/kit-removebg.png" alt="foto de perfil"><a>
        <a class="enlace btn btn-ghost text-center lg:ml-[370px] md:ml-[210px] sm:ml-[150px] mt-4 text-2xl" href="../Views/Home.php">Kitsune</a>
    </div>
    <div class="h-[100%] w-[100%] mt-[40px] flex flex-col items-center gap-[2.5rem]">
        <form class='w-[300px] p-[30px] border-[1px] border-[#ccc] rounded-[5px] shadow-[0px_0px_7px_0px_rgb(128,128,128)]' action="../Controllers/LoginController.php" method="POST">
            <table class='m-[0_auto]'>
                <tr>
                    <td>
                        <input class='text-[20px] w-[100%] p-[8px] mt-[5px] mb-[10px] rounded-[5px] border-[1px] border-[#ccc] box-border text-center' type="text" name="user" placeholder="Usuario" value="<?php echo !empty($_SESSION['usuarioLogin']) ? $_SESSION["usuarioLogin"]["usuario"] : '';?>">
                    </td>
                </tr>
                    <?php
                        if(isset($errorUsuario)){
                            print "<tr>";
                            print "<td>";
                            print "<p>$errorUsuario</p>";
                            print "</td>";
                            print "<tr>";
                        }

                        unset($_SESSION["errorLoginUsuario"]);
                    ?>
                <tr>
                    <td>
                        <input class='text-[20px] w-[100%] p-[8px] mt-[5px] mb-[10px] rounded-[5px] border-[1px] border-[#ccc] box-border text-center' type="password" name="pass" placeholder="Clave">
                    </td>
                </tr>
                    <?php
                        if(isset($errorPass)){
                            print "<tr>";
                            print "<td>";
                            print "<p>$errorPass</p>";
                            print "</td>";
                            print "</tr>";
                        }

                        unset($_SESSION["errorLoginPass"]);
                    ?>
            </table>
            <p class='text-red-600'><?php
                if (isset($_SESSION["errorLogin"])) {
                    print $_SESSION["errorLogin"];
                    unset($_SESSION["errorLogin"]);
                }
                ?></p>
            <button class='ml-[60px] p-[8px] rounded-[5px] border-[1px] border-[#ccc] bg-[#007bff] mt-[10px] text-[#fff] cursor-pointer hover:duration-[1s] hover:bg-[#0000ff]' type="submit">Iniciar Sesion</button>
        </form>
    </div>
    <?php
    require_once(__DIR__ . "/../Models/Footer.php");
    ?>
</body>

</html>