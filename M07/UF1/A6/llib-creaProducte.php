<?php


function controlprod($nom,$desc,$preu,$img){
    $error = "";
    if (empty($nom)){
        $error = "El nom es obligatori";
    }else if (!preg_match("/^[a-zA-Z0-9-' ]*$/",$nom)){
        $error = "El nom ha de ser lletres i numeros";
    }
    else if (empty($desc)){
        $error = "La descripcio es obligatoria";
    }
    else if (empty($preu)){
        $error = "El preu es oblagariri";
    }else if (!preg_match("/^[0-9-' ]*$/",$preu)){
        $error = "El preu ha de ser numeros";
    }
    else if ($img == 'images/'){
        $error = "La imatge es obligatoria";
    }
    return $error;
}




function creaproducte($nom,$desc,$preu,$img){

    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_a5');

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }


    $user_id = $_SESSION["userid"];

    try {
        $mysqli -> query("INSERT INTO productes (nom, descripcio , preu, id_usuari) VALUES ('$nom', '$desc', '$preu', '$user_id')");
        $prod_id = $mysqli->insert_id;
    } catch (mysqli_sql_exception $e){
        echo "error +  $e";
    }

    try {
        $mysqli -> query("INSERT INTO imatges (nom, ruta , id_producte) VALUES ('$img', '$img', '$prod_id')");
    } catch (mysqli_sql_exception $e){
        echo "error +  $e";
    }

    $mysqli->close();
}

?>