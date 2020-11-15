<?php

function controlemail($email,$pass){
    $errorintro="";
    if (empty($email)){
        $errorintro = "El email es obligatori";
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorintro = "Format del correu incorrecte";
    } else if (empty($pass)){
        $errorintro = "La contrasenya es obligatoria";
    }else if (!preg_match("/^[a-zA-Z0-9-' ]*$/",$pass)) {
        $errorintro = "Nomes lletres o numeros";
    }
    return $errorintro;
}


function dadesexistents($emailint,$passint,$check){

    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_a5');

    if ($mysqli->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $consulta = "SELECT * FROM usuaris WHERE Email = '$emailint'";

    $result = $mysqli->prepare($consulta);
    if (!$result = $mysqli ->query($consulta)){
        die ($mysqli->error);
    }
    if ($result -> num_rows >= 0){
        $usuari = $result -> fetch_assoc(); 
        $pap = $usuari["Pass"];
        if ($pap == MD5($passint) || $pap == $passint){
            $_SESSION["login"]=true;
            $_SESSION["userid"]=$usuari["ID"];
            if ($check == true){
                setcookie("email", "$emailint", time() + 365 * 24 * 60 * 60);
                setcookie("pass", md5("$passint"), time() + 365 * 24 * 60 * 60);
            }
            header("location:privada.php");
        }
        return "El correu o la contrasenya són incorrectes";
    }
}

?>