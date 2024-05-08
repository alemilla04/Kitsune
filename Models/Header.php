<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Content/output.css">
    <style>
        .parte-derecha a:hover {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body class="h-screen w-[100%]">
    <div class='navbar bg-base-200 flex-1'>
        <?php
        if (isset($_SESSION['usuarioObjeto'])) {
            $foto_perfil = $_SESSION["usuarioObjeto"]["Foto"];
            echo "<div class='flex-1'>";
            echo "  <img class='w-[100px]' src='../Content/kit-removebg.png' alt='foto de perfil'>";
            echo "  <a class='btn btn-ghost text-xl' href='../Views/Home.php'>Kitsune</a>";
            echo "</div>";
            echo "<div class='flex-none gap-2'>";
            echo "<div class='dropdown dropdown-end'>";
            echo "  <div tabindex='0' role='button' class='btn btn-ghost btn-circle avatar'>";
            echo "      <div class='w-10 rounded-full'>";
            echo "      <img alt='Tailwind CSS Navbar component' src='../Content/profile_pics/{$foto_perfil}' />";
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
            echo "<div class='flex-1'>";
            echo "  <img class='w-[100px]' src='../Content/kit-removebg.png' alt='foto de Kitsune'>";
            echo "  <a class='btn btn-ghost text-xl' href='../Views/Home.php'>Kitsune</a>";
            echo "</div>";
            echo "<div class='flex-none'>";
            echo "  <ul class='menu menu-horizontal px-1'>";
            echo "   <li><a href='../Views/SignUp.php'>Registrarse</a></li>";
            echo "   <li><a href='../Views/Login.php'>Iniciar Sesión</a></li>";
            echo "  </ul>";
            echo "</div>";
            // echo "<div class='flex-1 w-[100%]'>";
            // echo "          <a href='../Views/SignUp.php' class=''>Registrarse</a>";
            // echo "          <a href='../Views/Login.php' class=''>Iniciar Sesión</a>";
            // echo "</div>";
        }
        ?>
    </div>
    </div>

</body>

</html>