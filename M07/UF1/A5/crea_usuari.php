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
include 'llib-compinices.php';
comlogincookieinicial();

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $email = test_input($_REQUEST["myemail"]);
    $pass = test_input($_REQUEST["mypass"]);
    $pass2 = test_input($_REQUEST["mypass2"]);
   
    include "lib-CreaUsuari.php";
    $error = control($email,$pass,$pass2);
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
    <h1>
    Crea usuari
    </h1>
    <sapn class="error"><? if (isset($error)) echo $error;?></span><br/><br/>
    <form method="post" id="myform" name="myform" align="center">
        <label>Nom</label> <input type="text" size="30" name="mynom"/><br/><br/>
        <label>Email</label> <input type="text" size="30" name="myemail"/><br/><br/>
        <label>Password</label> <input type="password" size="30" name="mypass"/><br/><br/>
        <label>Confirma Password</label> <input type="password" size="30" name="mypass2"/><br/><br/>
        <button id="mysubmit" type="submit">Submit</button><br/><br/>
    </form>
</body>
</html>

