<?php

function edituser($olduser,$usID,$nom,$email,$pass){
    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_a5');

    if ($olduser["Nom"] != $nom){
        $sql = "UPDATE `usuaris` SET `Nom` = '$nom' WHERE `usuaris`.`ID` = '$usID';";
        $mysqli -> query($sql);
    }
    if ($olduser["Email"] != $email){
        $sql = "UPDATE `usuaris` SET `Email` = '$email' WHERE `usuaris`.`ID` = '$usID';";
        $mysqli -> query($sql);
        setcookie("email", "$email", time() + 365 * 24 * 60 * 60);
    }
    if ($olduser["Pass"] != MD5($pass) && $pass != null){
        $cifpass = MD5($pass);
        $sql = "UPDATE `usuaris` SET `Pass` = '$cifpass' WHERE `usuaris`.`ID` = '$usID';";
        $mysqli -> query($sql);
        setcookie("pass", md5("$pass"), time() + 365 * 24 * 60 * 60);
    }

    $mysqli->close();
}



function TreureDades($usID){
    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_a5');

    if ($mysqli->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $consulta = "SELECT * FROM usuaris WHERE ID = '$usID'";

    $result = $mysqli->prepare($consulta);
    if (!$result = $mysqli ->query($consulta)){
        die ($mysqli->error);
    }
    if ($result -> num_rows >= 0){
        $usuari = $result -> fetch_assoc(); 
        return $usuari;
    }

    $mysqli->close();
}


function controlediruser($nom,$email,$pass,$pass2){
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
    else if ($pass != "" && $error == ""){
        if (empty($pass)){
            $error = "La contrasenya es oblagariria";
        }else if (!preg_match("/^[a-zA-Z0-9-' ]*$/",$pass)){
            $error = "La passwors nomes lletres i numeros";
        }else if($pass != $pass2){
            $error = "Les contrasenyes son diferents";
        }
    }
    return $error;
}

function edituseradmin($olduser,$usID,$nom,$email,$pass,$rol){
    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_a5');

    if ($olduser["Nom"] != $nom){
        $sql = "UPDATE `usuaris` SET `Nom` = '$nom' WHERE `usuaris`.`ID` = '$usID';";
        $mysqli -> query($sql);
    }
    if ($olduser["Email"] != $email){
        $sql = "UPDATE `usuaris` SET `Email` = '$email' WHERE `usuaris`.`ID` = '$usID';";
        $mysqli -> query($sql);
    }
    if ($olduser["Pass"] != MD5($pass) && $pass != null){
        $cifpass = MD5($pass);
        $sql = "UPDATE `usuaris` SET `Pass` = '$cifpass' WHERE `usuaris`.`ID` = '$usID';";
        $mysqli -> query($sql);
    }
    if ($olduser["Rol"] != $rol){
        $sql = "UPDATE `usuaris` SET `Rol` = '$rol' WHERE `usuaris`.`ID` = '$usID';";
        $mysqli -> query($sql);
    }

    $mysqli->close();
}

function deluser($usID){
    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_a5');
    $sql = "DELETE FROM `usuaris` WHERE `usuaris`.`ID` = '$usID'";
    $mysqli -> query($sql);
    $mysqli->close();
}


?>