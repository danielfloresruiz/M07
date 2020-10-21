<?php

function contrloginper($email,$pass){
    if ($email == "" && $pass == "") {
        header("location:privada.php");
        setcookie("login", sha1(md5(true)), time() + 365 * 24 * 60 * 60);
    }
}

function contrlogin($email,$pass){
    if ($email == "" && $pass == "") {
        header("location:privada.php");
        $_SESSION["login"]=true;
    }
}

?>