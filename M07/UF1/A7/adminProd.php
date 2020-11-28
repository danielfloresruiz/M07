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

    if (isset($_REQUEST["back"])){
        header("location:privada.php");
    }
    if (isset($_REQUEST["afprod"])){
        header("location:afegirProd.php");
    }

?>

<!DOCTYPE html>
<html lang="cat">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css.css" rel="stylesheet" type="text/css">
    <title>Aministraco de preductes</title>
</head>
<body>

    <div class="content-form-prod">
        <h1 class="tituloclase">Els meus productes</h1>
        <form id="myform" name="myform">
            <div class="flex-container-prod">
                <div class="flex-item">
                    <button class="button2" name="afprod" type="submit">Afegir Productes</button><br><br>
                </div>
                <div class="flex-item">
                    <button class="button2" name="back" type="submit">Cancelar</button><br><br>
                </div>
            </div>
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
                $id_user = $_SESSION["userid"];
                
                if (isset($_REQUEST["mySearch"])){
                    $search = $_REQUEST["mySearch"];
                    $consulta = "SELECT * FROM productes WHERE `productes`.`nom` like '%$search%' AND id_usuari = '$id_user'";
                } else {
                    $consulta = "SELECT * FROM productes WHERE id_usuari = '$id_user'";
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
                                <div class="flex-container-prod-button">
                                    <div class="flex-item">
                                        <form method="post" action="editProd.php" id="myform" name="myform">
                                            <input name="idProd" type="hidden" value="<?= $prod['id'] ?>">
                                            <button class="button2" name="editProd" type="submit">Editar</button><br><br>
                                        </form>
                                    </div>
                                    <div class="flex-item">
                                        <form method="post" action="delProd.php" id="myform" name="myform">
                                            <input name="idProd" type="hidden" value="<?= $prod['id'] ?>">
                                            <button class="button2" name="delProd" type="submit">Eliminar</button><br><br>
                                        </form>
                                    </div>
                                </div>
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