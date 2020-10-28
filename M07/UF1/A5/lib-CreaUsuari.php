<?php

$error = " ";

function control($email,$pass,$pass2){
    if (empty($email)){
        $error = "El email es obligatori";
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Format del email incorrecte";
    }
    else if (empty($pass)){
        $error = "La contrasenya es oblagariria";
    }else if (!preg_match("/^[a-zA-Z0-9-' ]*$/",$pass)){
        $error = "La passwors nomes lletres i numeros";
    }else if($pass != $pass2){
        $error = "Les contrasenyes son diferents";
    }
    return $error;
}

?>