<?php
session_start();
include 'funciones.php';

$errorGet="";
if (isset($_COOKIE["recMail"]) && isset($_COOKIE["recToken"]) && isset($_COOKIE["recID"])){
    if (isset($_GET["email"]) && isset($_GET["token"])){
        if (!($_COOKIE["recMail"]==$_GET["email"] && $_COOKIE["recToken"]==$_GET["token"])){
            $errorGet = "Les dades no son correctes";
        }
    } else{
        $errorGet = "No has entrat des del correu que t'hem enviat";
    }
}else {
    $errorGet = "Ha expirat el temps de recuperacio de la contrasenya";
}

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $pass = test_input($_REQUEST["newPass"]);
    $pass2 = test_input($_REQUEST["newPassConf"]);
    
    $errorPass = controlPassRec($pass,$pass2);

    if ($error == ""){
        $dbReg = confRegPass($_COOKIE["recID"],$pass,$_COOKIE["recMail"]);
        header("location:index.php");
        setcookie("recMail", "", time() + 365 * 24 * 60 * 60);
        setcookie("recToken", "", time() + 365 * 24 * 60 * 60);
        setcookie("recID", "", time() + 365 * 24 * 60 * 60);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css.css" rel="stylesheet" type="text/css">
    <title>Recuperar Contrasenya</title>
</head>
<body>
    <div class="content-form">

    <h1 class="tituloclase">Canvi de Contrasenya</h1>

    <? 
    if ($errorGet==""){
    ?>
    
        <div class="error">
            <?php
                if (isset($errorPass)){
                    echo $errorPass; 
                }  
            ?>
        </div><br>

        <form method="post" id="myform" name="myform">
            <label>Nova contrasenya</label><br><input class="input" type="password" name="newPass"/><br/><br/>
            <label>Confirma nova contrasenya</label><br><input class="input" type="password" name="newPassConf"/><br/><br/>
            
            <button class="button1" id="mysubmit" type="submit">Submit</button><br/><br/>
        </form>
    <?
    }else {
    ?>
        <div class="error">
            <?php
                if (isset($errorGet)){
                    echo $errorGet; 
                }  
            ?>
        </div><br>
    <?
    }
    ?>
</body>
</html>