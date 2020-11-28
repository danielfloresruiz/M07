<?php

function TreureDadesProd($idProd){
    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_a5');

    if ($mysqli->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $consulta = "SELECT * FROM productes WHERE id = '$idProd'";

    $result = $mysqli->prepare($consulta);
    if (!$result = $mysqli ->query($consulta)){
        die ($mysqli->error);
    }
    if ($result -> num_rows >= 0){
        $prod = $result -> fetch_assoc(); 
        return $prod;
    }

    $mysqli->close();
}

function TreureDadesImgProd($idProd){
    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_a5');

    if ($mysqli->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $consulta = "SELECT * FROM imatges WHERE id_producte = '$idProd'";

    $result = $mysqli->prepare($consulta);
    if (!$result = $mysqli ->query($consulta)){
        die ($mysqli->error);
    }
    if ($result -> num_rows >= 0){
        $prod = $result -> fetch_assoc(); 
        return $prod;
    }

    $mysqli->close();
}

function controlProdEdit($nom,$desc,$preu){
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
    return $error;
}

function editprodadmin($oldProd,$oldProdImg,$id,$nom,$desc,$preu,$img){
    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_a5');

    if ($oldProd["nom"] != $nom){
        $sql = "UPDATE `productes` SET `nom` = '$nom' WHERE `productes`.`id` = '$id';";
        $mysqli -> query($sql);
    }
    if ($oldProd["descripcio"] != $desc){
        $sql = "UPDATE `productes` SET `descripcio` = '$desc' WHERE `productes`.`id` = '$id';";
        $mysqli -> query($sql);
    }
    if ($oldProd["preu"] != $preu){
        $sql = "UPDATE `productes` SET `preu` = '$preu' WHERE `productes`.`id` = '$id';";
        $mysqli -> query($sql);
    }


    if ($oldProdImg["nom"] != $img && $img != "images/"){
        $sql = "UPDATE `imatges` SET `nom` = '$img', `ruta` = '$img' WHERE `imatges`.`id_producte` = '$id';";
        $mysqli -> query($sql);
    }

    $mysqli->close();
}

function delProd($id){
    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_a5');
    $sql = "DELETE FROM `productes` WHERE `productes`.`id` = '$id'";
    $mysqli -> query($sql);
    $sql = "DELETE FROM `imatges` WHERE `imatges`.`id_producte` = '$id'";
    $mysqli -> query($sql);
    $mysqli->close();
}

function delProdCarr($user_id,$prod_id){
    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_a5');
    $sql = "DELETE FROM `carret` WHERE `carret`.`id_producte` = '$prod_id' and `carret`.`id_usuari` = '$user_id'";
    $mysqli -> query($sql);
}
?>