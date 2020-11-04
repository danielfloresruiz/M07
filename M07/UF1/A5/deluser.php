<?php

session_start();
    include 'llib-compdades.php';
    include 'llib-edit-user.php';



    if ((isset($_SESSION["login"]) && $_SESSION["login"])){
        //pos res
    }else if (isset($_COOKIE["email"])){
        dadesexistents($_COOKIE["email"],$_COOKIE["pass"],false);
    }else {
        header("location:index.php");
    }
    $adminuser = TreureDades($_SESSION["userid"]);
    if ($adminuser["Rol"] != "admin"){
        header("location:index.php");
    }


    //sacar todos los datos del usuario
    $olduser = TreureDades($_REQUEST["ID"]);
    
    if (isset($_REQUEST["cancel"])){
        header("location:adminedituser.php");
    }

    if (isset($_REQUEST["accept"])){
        deluser($olduser["ID"]);
        header("location:adminedituser.php");
    }

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css.css" rel="stylesheet" type="text/css">
    <title>Borrar Usuario</title>
</head>
<body>
    <div class="content-form">
        <h1 class="tituloclase">Delete user</h1>
        <h4 class="deluserh4">Seguro que desea borrar el usuario <span class="delusernom"><?= $olduser["Nom"] ?></span>?</h4>
        <form>
            <?
            echo '<input name="ID" type="hidden" value='.$olduser["ID"].'>';
            ?>
            <div class="flex-container">
                <div class="flex-item">
                    <button class="button2" name="cancel" type="submit">Cancelar</button>
                </div>
                <div class="flex-item">
                    <button class="button2" name="accept" type="submit">Borrar</button>
                </div>
            </div><br>
        </form>
    </div>
</body>
</html>