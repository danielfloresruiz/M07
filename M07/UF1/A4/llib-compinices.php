<?php

function contrloginper($email,$pass,$emailbe,$passbe){
    if ($email == "" && $pass == "") {
        header("location:privada.php");
        setcookie("email", sha1(md5("$emailbe")) , time() + 365 * 24 * 60 * 60);
        setcookie("pass", sha1(md5("$passbe")), time() + 365 * 24 * 60 * 60);
    }
}


function contrlogin($email,$pass){
    if ($email == "" && $pass == "") {
        header("location:privada.php");
        $_SESSION["login"]=true;
    }
}


function comlogincookie(){
    if (isset($_COOKIE["email"]) && isset($_COOKIE["pass"])){
        if ($_COOKIE["email"]=="201db4c0187b205b3f51d33fe7d0c1a3fec2e615" && $_COOKIE["pass"]=="776ae5001a472595b28fae912628cddad33f8116"){

        }else{
            setcookie("email", "" , time() + 365 * 24 * 60 * 60);
            setcookie("pass", "", time() + 365 * 24 * 60 * 60);
            header("location:inicial.php");
        }
    }else if (isset($_SESSION["login"])){
        if ($_SESSION["login"]==true){

        }else {
            header("location:inicial.php");
        }
    }else {
        header("location:inicial.php");
    }
}

function comlogincookieinicial(){
    if (isset($_COOKIE["email"]) && isset($_COOKIE["pass"])){
        if ($_COOKIE["email"]=="201db4c0187b205b3f51d33fe7d0c1a3fec2e615" && $_COOKIE["pass"]=="776ae5001a472595b28fae912628cddad33f8116"){
            header("location:privada.php");

        }else{
            setcookie("email", "" , time() + 365 * 24 * 60 * 60);
            setcookie("pass", "", time() + 365 * 24 * 60 * 60);
            
        }
    }else if (isset($_SESSION["login"])){
        if ($_SESSION["login"]==true){
            header("location:privada.php");
        }
    }
}


?>