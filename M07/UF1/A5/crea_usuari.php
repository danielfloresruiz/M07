<?php
session_start();



//Vaig a mirar a la llibreria per veure si l'usuari ja està registrat, si ho està l'envio a la pàgina privada.
include 'llib-compdades.php';
if (isset($_SESSION["login"]) && $_SESSION["login"]){
    header("location:privada.php");
}else if (isset($_COOKIE["email"])){
    dadesexistents($_COOKIE["email"],$_COOKIE["pass"],false);
}

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $nom = test_input($_REQUEST["mynom"]);
    $email = test_input($_REQUEST["myemail"]);
    $pass = test_input($_REQUEST["mypass"]);
    $pass2 = test_input($_REQUEST["mypass2"]);
    
    include "lib-CreaUsuari.php";
    $error = control($nom,$email,$pass,$pass2);

    if ($error == ""){
        $creausuariav = creausuari($nom,$email,$pass);
        header("location:index.php");
    }
}


?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css.css" rel="stylesheet" type="text/css">
    <title>Crea Usuari</title>
</head>
<body>
    <div class="content-form">

    <h1 class="tituloclase">Crea usuari</h1>

    <div class="error">
        <?php
            if (isset($error)){
                echo $error; 
            }
            if (isset($creausuariav) && $error == ""){
                echo $creausuariav;
            }    
        ?>
    </div><br>




    <form method="post" id="myform" name="myform">
        <label>Nom</label><br><input class="input" type="text" name="mynom" value="<?php if ($_SERVER['REQUEST_METHOD']=='POST') echo $_REQUEST["mynom"] ?>"/><br/><br/>
        
        <label>Email</label><br><input class="input" type="text" name="myemail" value="<?php if ($_SERVER['REQUEST_METHOD']=='POST') echo $_REQUEST["myemail"] ?>"/><br/><br/>

        <label>Password</label><br><input class="input" type="password" name="mypass"/><br/><br/>
        <label>Confirma Password</label><br><input class="input" type="password" name="mypass2"/><br/><br/>

        <button class="button1" id="mysubmit" type="submit">Submit</button><br/><br/>
    </form>
    <hr>
    <form id="myform" name="myform" action="./index.php" align="center">
        <br><input class="inputsubmit1" type="submit" value="Inicia sesio"/><br><br>
    </form>
    </div>
</body>
</html>

