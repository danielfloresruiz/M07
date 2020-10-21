<?php

$errornom="";
$errorpass="";


function controlemail($email){
    if (empty($email)){
        $errornom = "el nom es obligatori";
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errornom = "Format incorrecte";
    }else if ($email == "inici@inici.cat"){
        $errornom="";
    }else {
        $errornom="incorrecte";
    }
    return $errornom;
}

function controlpass($pass){
    if (empty($pass)){
        $errorpass = "La contrasenya es obligatoria";
    }else if (!preg_match("/^[a-zA-Z0-9-' ]*$/",$pass)) {
        $errorpass = "Nomes lletres o numeros";
    }else if (sha1(md5($pass)) == "776ae5001a472595b28fae912628cddad33f8116"){
        //pass: tarda123
        $errorpass="";
    }else {
        $errorpass="incorrecte";
    }
    return $errorpass;
}

?>