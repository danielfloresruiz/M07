<?php 
function mailEx($mail){
    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_a5');
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $consulta="SELECT * FROM usuaris WHERE Email='$mail'";
    if (!$datos = $baseDatos->query($control)){
    }
    if ($datos->num_rows == 1){
        return true;
    }else{
        return false;
    }
        
    $mysqli->close();
}

?>