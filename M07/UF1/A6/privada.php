<?php 
    session_start();
    include 'llib-logout.php';
    include 'llib-compdades.php';

    
    if ((isset($_SESSION["login"]) && $_SESSION["login"])){
        
    }else if (isset($_COOKIE["email"])){
        dadesexistents($_COOKIE["email"],$_COOKIE["pass"],false);
    }else {
        header("location:index.php");
    }


    //Si l'usuari prem el botó de log out envia a la funció de la llibreria llib-logout.php on és borra les dades de la sessió i la cookie
    if (isset($_REQUEST["logout"])){
        logout();
    }


    //sacar todos los datos del usuario
    include 'llib-edit-user.php';
    $adminuser = TreureDades($_SESSION["userid"]);
    if (isset($_REQUEST["adinedit"])){
        header("location:adminedituser.php");
    }


    if (isset($_REQUEST["edituser"])){
        header("location:edituser.php");
    }


    if (isset($_REQUEST["adminprod"])){
        header("location:adminProd.php");
    }

    
    //Comprova si s-accepta o no la política de cookies
    if(isset($_REQUEST['politica-cookies'])) {
        setcookie('politica', '1', time() + 365 * 24 * 60 * 60);
    }
    if(isset($_REQUEST['denpolitica-cookies'])) {
        header("location:https://www.google.com/");
    }

?>





<!DOCTYPE html>
<html lang="cat">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css.css" rel="stylesheet" type="text/css">
        <title>Pagina</title>
    </head>
    <body>
        <div>
            <?php if (!isset($_REQUEST['politica-cookies']) && !isset($_COOKIE['politica'])): ?>
                <!-- Missatge de cookies -->
                <div class="cookies">
                    <h2>Cookies</h2>
                    <p>¿Aceptas nuestras cookies?</p>
                    <a href="?politica-cookies=1">Aceptar</a> /
                    <a href="?denpolitica-cookies=1">No aceptar</a>
                </div>
            <?php endif; ?>
        </div>


        <div class="content-form">
        <h1 class="tituloclase">Has iniciat sesio</h1>
        <form id="myform" name="myform">
            <div class="flex-container">
                <div class="flex-item">
                    <button class="button2" name="logout" type="submit">Log Out</button>
                </div>
                <div class="flex-item">
                    <button class="button2" name="adminprod" type="submit">El meus Productes</button><br><br>
                </div>
                <div class="flex-item">
                    <button class="button2" name="edituser" type="submit">Editar Usuari</button><br><br>
                </div>
            </div>
            <?php
                if ($adminuser["Rol"]=="admin"){
            ?>
                    <button class="button1" name="adinedit" type="submit">Editar Usuaris Admin</button><br><br>
            <?php
                }
            ?>
        </form>
        </div>

        <div class="content-form-prod2">
            <h1 class="tituloclase">Productes</h1>

            <form method="post" id="mySearch" name="myform" class="mySearch" align="center">
                <input class="input" type="text" name="mySearch" value="<?php if (isset($_REQUEST["mySearch"])) echo $_REQUEST["mySearch"]; ?>"/>
                <button class="button2" name="mySearchButton" type="submit">Busca</button><br><br>
            </form>
            
            <div class="flex-container-prod2">
            <?php
                $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_a5');
                if ($mysqli->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                if (isset($_REQUEST["mySearch"])){
                    $search = $_REQUEST["mySearch"];
                    $consulta = "SELECT * FROM productes WHERE `productes`.`nom` like '%$search%'";
                } else {
                    $consulta = "SELECT * FROM productes";
                }

                $result = $mysqli->prepare($consulta);
                if (!$result = $mysqli ->query($consulta)){
                    die ($mysqli->error);
                }
                
                if ($result->num_rows > 0){
                    while($prod = $result->fetch_assoc()){

                        $id_prod = $prod["id"];
                        $consultaimg = "SELECT * FROM imatges WHERE id_producte = '$id_prod'";
                        if (!$result2 = $mysqli ->query($consultaimg)){
                            die ($mysqli->error);
                        }
                        $image = $result2->fetch_assoc();
                        ?>
                            <div class="flex-item-prod2">
                                <img src="<?=$image["ruta"] ?>" width="250" height="200">
                                <p class="nom-prod"> <?=$prod["nom"] ?></p>
                                <p> <?=$prod["descripcio"] ?></p>
                                <p> <?=$prod["preu"] ?>€</p>
                            </div>
                        <?php
                    }
                }else{
                    echo "<p class='searchError'>no s'ha trobat cap producte amb aquest nom</p>";
                }
                $mysqli->close();
            ?>
        </div>
    </body>
</html>