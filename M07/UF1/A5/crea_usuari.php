<?php
session_start();

//Funció per validar les dades que entren pel formulari
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

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
    }
}


?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea Usuari</title>
</head>
<body align="center">
    <div style="text-align: center; margin-top:200px;">

    <h1>Crea usuari</h1>

    <sapn class="error">
        <?php
            if (isset($error)){
                echo $error; 
            }
            if (isset($creausuariav) && $error == ""){
                echo $creausuariav;
            }    
        ?>
    </span><br><br>




    <form method="post" id="myform" name="myform" align="center">
        <label>Nom</label> <input type="text" size="30" name="mynom" value="<?php if ($_SERVER['REQUEST_METHOD']=='POST') echo $_REQUEST["mynom"] ?>"/><br/><br/>
        
        <label>Email</label> <input type="text" size="30" name="myemail" value="<?php if ($_SERVER['REQUEST_METHOD']=='POST') echo $_REQUEST["myemail"] ?>"/><br/><br/>

        <label>Password</label> <input type="password" size="30" name="mypass"/><br/><br/>
        <label>Confirma Password</label> <input type="password" size="30" name="mypass2"/><br/><br/>

        <button id="mysubmit" type="submit">Submit</button><br/><br/>
    </form>
    <hr>
    <form id="myform" name="myform" action="./inicial.php" align="center">
        <input type="submit" value="Inicia sesio"/> 
    </form>
    </div>
</body>
</html>

