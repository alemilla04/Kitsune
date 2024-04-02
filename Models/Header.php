<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Content/output.css">
</head>
<body>
    <!-- <header>
        <img src="../Content/kit-removebg.png" alt="foto de perfil">
        <span>Kitsune Web</span>
    </header> -->
    <div class="navbar bg-base-200">
        <div class="flex-1">
            <img class="w-[100px]" src="../Content/kit-removebg.png" alt="foto de perfil">
            <a class="btn btn-ghost text-xl" href="../Views/Home.php">Kitsune</a>
        </div>
        <div class="flex-none gap-2">
            <div class="form-control">
                <input type="text" placeholder="Search" class="input input-bordered w-24 md:w-auto" />
            </div>
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img alt="Tailwind CSS Navbar component" src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                    </div>
                </div>
                <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                    <li>
                        <a class="justify-between">
                        Profile
                        <span class="badge">New</span>
                        </a>
                    </li>
                    <li><a>Settings</a></li>
                    <li><a>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
<?php
// print("<header>");
// print("<img src='../Content/kit-removebg.png' alt='foto de perfil'>");
// print("<span>Kitsune Web</span>");
// print("</header>");