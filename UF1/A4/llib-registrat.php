<?php

function inicialreg(){
    if (isset($_COOKIE["login"]) && $_COOKIE["login"]=="0937afa17f4dc08f3c0e5dc908158370ce64df86"){
        header("location:privada.php");
    }else if (isset($_SESSION["login"]) && $_SESSION["login"]==true){
        header("location:privada.php");
    }
}


function privatreg(){
    if (isset($_COOKIE["login"]) && $_COOKIE["login"]=="0937afa17f4dc08f3c0e5dc908158370ce64df86"){

    }else if (isset($_SESSION["login"]) && $_SESSION["login"]==true){

    }else{
        header("location:inicial.php");
    }
}

?>