<?php
function errorControl($data,$type){
    $error = "";
    switch($type){
        case "mail":
            if(empty("$data")){
                $error = "Este campo es obligatorio*";
            }else{
                if($data == "javi@mail.com"){
                    $error = "";
                } else {
                    $error = "Este campo es erroneo!";
                }
            }
            break;
        case "password":
            $tmpData = preg_replace('([^A-Za-z0-9 ])', ' ', "$data");
            if($tmpData == $data){
                if(empty("$data")){
                    $error = "Este campo es obligatorio*";
                }else{
                    if($data == "pass"){
                        $hash = password_hash("pass", PASSWORD_DEFAULT);
                        if(password_verify($data,$hash)){
                            $error = "";
                        } else {
                            $error = "La contraseña no es correcta!";
                        }
                    }else {
                        $error = "Este campo es erroneo!";
                    }
                }
            } else {
                $error = "Solo se permiten numeros o letras";
            }

            break;
    }
    return $error;
}
?>