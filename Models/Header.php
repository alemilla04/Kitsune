<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Content/output.css">
    <style>
        .contenedor li a:hover {
            font-size: 16px; 
            background-color: #C8CACD;
            border-radius: 4px;
            padding: 10px;
            transition-duration: 1s;
        }

        li{
            list-style: none;
        }

        @media (min-width: 375px){
            .contenedor {
                gap: 10px;
                display: flex;
                flex-direction: column;
            }
        }

        @media (min-width: 760px){
            .contenedor {
                gap: 60px;
                display: flex;
                flex-direction: row;
            }
        }

        @media (min-width: 1000px){
            .contenedor {
                gap: 180px;
                flex: 1;
                justify-content: center;
            }
        }
    </style>
</head>

<body class="h-screen w-[100%]">
    <div class='navbar bg-base-200 flex-1'>
        <?php
        if (isset($_SESSION['usuarioObjeto'])) {
            $foto_perfil = $_SESSION["usuarioObjeto"]["foto"];
            echo "<div class='flex-1'>";
            echo "  <img class='w-[100px]' src='../Content/kit-removebg.png' alt='foto de perfil'>";
            echo "  <a class='btn btn-ghost text-xl' href='../Views/Home.php'>Kitsune</a>";
            echo "</div>";
            echo "<div class='flex-none gap-2'>";
            echo "<div class='dropdown dropdown-end'>";
            echo "  <div tabindex='0' role='button' class='btn btn-ghost btn-circle avatar'>";
            echo "      <div class='w-10 rounded-full'>";
            echo "      <img alt='Foto de perfil' src='../Content/profile_pics/{$foto_perfil}' />";
            echo "      </div>";
            echo "  </div>";
            echo "  <ul tabindex='0' class='mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52'>";
            echo "      <li>";
            echo "          <a href='../Views/Profile.php' class='justify-between'>";
            echo "              Profile";
            echo "          </a>";
            echo "      </li>";
            echo "      <li><a>Settings</a></li>";
            echo "      <li><a href='Logout.php'>Logout</a></li>";
            echo "  </ul>";
            echo " </div>";
        } else {
            echo "<div class='flex-grow'>";
            echo "  <img class='w-[100px]' src='../Content/kit-removebg.png' alt='foto de Kitsune'>";
            echo "  <a class='btn btn-ghost text-xl' href='../Views/Home.php'>Kitsune</a>";
            echo "</div>";
            echo "<div class='contenedor'>";
            echo "   <li><a href='../Views/SignUp.php'>Registrarse</a></li>";
            echo "   <li><a href='../Views/Login.php'>Iniciar Sesión</a></li>";
            echo "</div>";
        }
        ?>
    </div>
    </div>

</body>

</html>