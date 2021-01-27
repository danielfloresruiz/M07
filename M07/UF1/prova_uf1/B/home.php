<?php
session_start();
include 'funciones.php';

$nomUser = nameUser($_SESSION["user_id"]);

if (!$_SESSION){
    header("location:index.php");
}

if (recPass($_SESSION["user_id"])==1){
    $a = randomPass();
    recPassAl($_SESSION["user_id"],$a);
    $recuperar=true;
}

if (isset($_REQUEST["logoutButton"])){
    logout();
}

if (isset($_REQUEST["pass"])){
    canviarPass($_SESSION["user_id"],$_REQUEST["pass"]);
}

?>

<!DOCTYPE html>
<html lang="cat">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?
        if (isset($recuperar)){
            ?>
                <form method="post" id="myform" name="myform">
                    <label>Nova contrasenya: </label><input class="input" type="password" name="pass" id=""/><br><br>
                    <button id="Button" name="confirm" type="submit">Confirm</button><br><br>
                </form>
            <?
        }else {
            ?>
            <p>Hola <?= $nomUser?></p>
            <form method="post" id="myform" name="myform">
                <button id="Button" name="logoutButton" type="submit">Logout</button><br><br>
            </form>
            <?
        }
    ?>
    
</body>
</html>