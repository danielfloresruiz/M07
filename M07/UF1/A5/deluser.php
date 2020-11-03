<?php

session_start();
    include 'llib-compdades.php';
    include 'llib-edit-user.php';



    if ((isset($_SESSION["login"]) && $_SESSION["login"])){
        //pos res
    }else if (isset($_COOKIE["email"])){
        dadesexistents($_COOKIE["email"],$_COOKIE["pass"],false);
    }else {
        header("location:inicial.php");
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
    <title>Borrar Usuario</title>
</head>
<body>
    <div style="text-align: center; margin-top:200px;">
        <h1>Delete user</h1>
        <h4>Seguro que desea borrar el usuario <?= $olduser["Nom"] ?>?</h4>
        <form>
            <?
            echo '<input name="ID" type="hidden" value='.$olduser["ID"].'>';
            ?>
            <button name="cancel" type="submit">Cancelar</button>
            <button name="accept" type="submit">Borrar</button>
        </form>
    </div>
</body>
</html>