<?php

function addCart($id_prod){
    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_a5');

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $user_id = $_SESSION["userid"];

    try {
        $mysqli -> query("INSERT INTO carret (id_producte, id_usuari) VALUES ('$id_prod', '$user_id')");
        $prod_id = $mysqli->insert_id;
    } catch (mysqli_sql_exception $e){
        echo "error +  $e";
    }
}

?>