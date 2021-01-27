<?php
session_start();
include 'funciones.php';

if ($_SERVER['REQUEST_METHOD']=='POST'){
    if (isset($_REQUEST["user"]) && isset($_REQUEST["pass"])){
        $user = test_input($_REQUEST["user"]);
        $pass = test_input($_REQUEST["pass"]);
        $inici = iniciSessio($user,$pass);
    }
}

?>

<!DOCTYPE html>
<html lang="cat">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <div>
        <form method="post" id="myform" name="myform">
            <? if (isset($inici)){echo $inici,"<br><br>";}; ?>
            <label>Username: </label><input class="input" type="text" name="user" value="<?php if (isset($_REQUEST["user"])) echo $_REQUEST["user"] ?>" id=""/><br><br>
            <label>Password: </label><input class="input" type="password" name="pass" id=""/><br><br>
            <button id="mysubmit" type="submit">INICIA SESIO</button><br><br>
        </form>
        <a href="https://dawjavi.insjoaquimmir.cat/dflores/M07/UF1/prova_uf1/B/recuperarContrasenya.php">Recuperar contrasenya</a>
    </div>
</body>
</html>