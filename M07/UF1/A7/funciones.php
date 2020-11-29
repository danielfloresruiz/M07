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

function confRegPass($id,$pass,$email){
    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_a5');

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $sql = "UPDATE `recPassUser` SET `confirmada` = 'true' WHERE `recPassUser`.`id` = '$id';";
    $mysqli -> query($sql);

    $cifpass = MD5($pass);
    $sql = "UPDATE `usuaris` SET `Pass` = '$cifpass' WHERE `usuaris`.`Email` = '$email';";
    $mysqli -> query($sql);
}

function control($nom,$email,$pass,$pass2){
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
    else if (empty($pass)){
        $error = "La contrasenya es oblagariria";
    }else if (!preg_match("/^[a-zA-Z0-9-' ]*$/",$pass)){
        $error = "La passwors nomes lletres i numeros";
    }else if($pass != $pass2){
        $error = "Les contrasenyes son diferents";
    }
    return $error;
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

function controlPassRec($pass,$pass2){
    $error="";
    if (empty($pass)){
        $error = "Omple tots els camps";
    }else if (empty($pass2)){
        $error = "Omple tots els camps";
    }else if (!preg_match("/^[a-zA-Z0-9-' ]*$/",$pass)){
        $error = "La passwors nomes lletres i numeros";
    }else if ($pass!=$pass2){
        $error = "Les contrasenyes no son iguals";
    }
    return $error;
}

function controlprod($nom,$desc,$preu,$img,$categoria){
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
    else if ($categoria == null){
        $error = "Marca una categoria";
    }
    return $error;
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

function creaproducte($nom,$desc,$preu,$img,$categoria){

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

    try {
        foreach ($categoria as &$valor){
            $mysqli -> query("INSERT INTO producte_categoria (id_producte, id_categoria) VALUES ('$prod_id', '$valor')");
        }
    }   catch (mysqli_sql_exception $e){
        echo "error +  $e";
    }

    $mysqli->close();
}

function creausuari($nom,$email,$pass){
    $creausuariav="";

    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_a5');

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }


    try {
        $mysqli -> query("INSERT INTO usuaris (Nom, Email, Pass) VALUES ('$nom', '$email', MD5('$pass'))");
        if ($mysqli -> insert_id>0){
            $creausuariav = "L'usuari s'ha creat satisfactòriament";
        }else {
            $creausuariav = "Aquest correu ja existeix";
        }
    } catch (mysqli_sql_exception $e){
        echo "error +  $e";
    }

    $mysqli->close();
    return $creausuariav;
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

function deluser($usID){
    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_a5');
    $sql = "DELETE FROM `usuaris` WHERE `usuaris`.`ID` = '$usID'";
    $mysqli -> query($sql);
    $mysqli->close();
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

function guardarRecuperacion($mail,$token){
    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_a5');

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    try {
        $mysqli -> query("INSERT INTO recPassUser (email_User, token) VALUES ('$mail', '$token')");
        $rec_id = $mysqli->insert_id;
    } catch (mysqli_sql_exception $e){
        echo "error +  $e";
    }
    $mysqli->close();
    return $rec_id;
}

function logout(){
    setcookie("email", "", time() + 365 * 24 * 60 * 60);
    setcookie("pass", "", time() + 365 * 24 * 60 * 60);
    session_destroy();
    session_unset();
    header("location:index.php");
}

function mailExist($mail){
    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_a5');
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $consulta="SELECT * FROM usuaris WHERE Email='$mail'";
    if (!$datos = $mysqli->query($consulta)){
    }
    if ($datos->num_rows == 1){
        return true;
    }else{
        return false;
    }
        
    $mysqli->close();
}

function randomToken(){
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $token=("");
    for ($i=0;$i<50;$i++){
        $n = rand(0, strlen($alphabet)-1);
        $token.= $alphabet[$n];
    }
    return $token;
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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

?>