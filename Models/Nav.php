<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=ç, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="../Content/style-alta.css"> -->
</head>
<body>
    <!-- <div class="nav">
        <ul>
            <li><a href=""><img class="img-casa" src="../Content/casa.svg" alt="icono-casa">Inicio</a></li>
            <li><a href="../Views/Questions.php"><img class="img-preguntas" src="../Content/preguntas.svg" alt="icono-preguntas">Preguntas</a></li>
            <li><a href=""><img class="img-etiquetas" src="../Content/etiquetas.svg" alt="icono-etiquetas">Etiquetas</a></li>
            <li class="nav-usuarios"><a href=""><img class="img-etiquetas" src="../Content/usuarios.svg" alt="icono-usuarios">Usuarios</a></li>
            <li><a href=""><img class="img-respuestas" src="../Content/respuestas.svg" alt="icono-respuestas">Sin responder</a></li>
        </ul>
    </div> -->

    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col items-center justify-center">
            <!-- Page content here -->
            <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden">≡</label>
        </div> 
        <div class="drawer-side">
            <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label> 
            <ul class="menu p-4 w-80 min-h-full bg-base-200 text-base-content border border-r border-base-300">
                <!-- Sidebar content here -->
                <li><a class="hover:p-[10px] hover:font-bold" href=""><img class="w-[20px]" src="../Content/casa.svg" alt="icono-casa">Inicio</a></li>
                <li><a class="hover:p-[10px] hover:font-bold" href="../Views/Questions.php"><img class="w-[20px]" src="../Content/preguntas.svg" alt="icono-preguntas">Preguntas</a></li>
                <li><a class="hover:p-[10px] hover:font-bold" href=""><img class="w-[20px]" src="../Content/etiquetas.svg" alt="icono-etiquetas">Etiquetas</a></li>
                <li class="mt-[40px]"><a class="hover:p-[10px] hover:font-bold" href=""><img class="w-[20px]" src="../Content/usuarios.svg" alt="icono-usuarios">Usuarios</a></li>
                <li><a class="hover:p-[10px] hover:font-bold" href=""><img class="w-[20px]" src="../Content/respuestas.svg" alt="icono-respuestas">Sin responder</a></li>
            </ul>
        </div>
    </div>
</body>
</html>