<?php


function control($nom,$email,$pass,$pass2){
    $error = "";
    if (empty($nom)){
        $error = "El nom es obligatori";
    }else if (!preg_match("/^[a-zA-Z' ]*$/",$nom)){
        $error = "El nom han de ser lletres";
    }
    else if (empty($email)){
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




function creausuari($nom,$email,$pass){
    $creausuariav="";

    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_a5');

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }


    try {
        $mysqli -> query("INSERT INTO usuaris (Nom, Email, Pass) VALUES ('$nom', '$email', MD5('$pass'))");
        if ($mysqli -> insert_id>0){
            $creausuariav = "L'usuari s'ha creat satisfactòriament";
        }else {
            $creausuariav = "Aquest correu ja existeix";
        }
    } catch (mysqli_sql_exception $e){
        echo "error +  $e";
    }

    $mysqli->close();
    return $creausuariav;
}

?>