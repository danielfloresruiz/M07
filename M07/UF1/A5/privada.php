<?php 
    session_start();
    include 'llib-logout.php';
    include 'llib-compinices.php';

    //Vaig a mirar a la llibreria per veure si l'usuari ja està registrat, si ho està l'envio a la pàgina d'inici.
    comlogincookie();


    //Si l'usuari prem el botó de log out envia a la funció de la llibreria llib-logout.php on és borra les dades de la sessió i la cookie
    if (isset($_REQUEST["logout"])){
        logout();
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
    <h1>Has iniciat sesio</h1>
    <form method="post" id="myform" name="myform">
        <button name="logout" type="submit">Log Out</button><br/><br/>
    </form>
</body>
</html>