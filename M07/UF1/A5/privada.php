<?php 
    session_start();
    include 'llib-logout.php';
    include 'llib-compdades.php';

    
    if ((isset($_SESSION["login"]) && $_SESSION["login"])){
        
    }else if (isset($_COOKIE["email"])){
        dadesexistents($_COOKIE["email"],$_COOKIE["pass"],false);
    }else {
        header("location:inicial.php");
    }


    //Si l'usuari prem el botó de log out envia a la funció de la llibreria llib-logout.php on és borra les dades de la sessió i la cookie
    if (isset($_REQUEST["logout"])){
        logout();
    }


    //sacar todos los datos del usuario
    include 'llib-edit-user.php';
    $adminuser = TreureDades($_SESSION["userid"]);
    if (isset($_REQUEST["adinedit"])){
        header("location:adminedituser.php");
    }


    if (isset($_REQUEST["edituser"])){
        header("location:edituser.php");
    }


    
    //Comprova si s-accepta o no la política de cookies
    if(isset($_REQUEST['politica-cookies'])) {
        setcookie('politica', '1', time() + 365 * 24 * 60 * 60);
    }
    if(isset($_REQUEST['denpolitica-cookies'])) {
        header("location:https://www.google.com/");
    }

?>





<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pagina</title>
    </head>
    <body>
        <div>
            <?php if (!isset($_REQUEST['politica-cookies']) && !isset($_COOKIE['politica'])): ?>
                <!-- Missatge de cookies -->
                <div class="cookies">
                    <h2>Cookies</h2>
                    <p>¿Aceptas nuestras cookies?</p>
                    <a href="?politica-cookies=1">Aceptar</a> /
                    <a href="?denpolitica-cookies=1">No aceptar</a>
                </div>
            <?php endif; ?>
        </div>
        <div style="text-align: center; margin-top:200px;">
        <h1>Has iniciat sesio</h1>
        <form id="myform" name="myform">
            <button name="logout" type="submit">Log Out</button>
            <button name="edituser" type="submit">Editar Usuari</button>
            <?php
                if ($adminuser["Rol"]=="admin"){
            ?>
                    <button name="adinedit" type="submit">Editar Usuaris Admin</button>
            <?php
                }
            ?>
        </form>
        <div>
    </body>
</html>