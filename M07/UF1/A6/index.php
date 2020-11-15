<?php
session_start();

//Funció per validar les dades que entren pel formulari
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


include 'llib-compdades.php';
//Vaig a mirar a la llibreria per veure si l'usuari ja està registrat, si ho està l'envio a la pàgina privada.
if (isset($_SESSION["login"]) && $_SESSION["login"]){
    header("location:privada.php");
}else if (isset($_COOKIE["email"])){
    dadesexistents($_COOKIE["email"],$_COOKIE["pass"],false);
}


//Entra si rep dades per post (després d'enviar els resultats del formulari)
if ($_SERVER['REQUEST_METHOD']=='POST'){
    if (isset($_REQUEST["myuser"])){
    //Guardo les dades que l'usuari ha introduït a la seva respectiva variable
        $email = test_input($_REQUEST["myuser"]);
        $pass = test_input($_REQUEST["mypass"]);
        if (isset($_REQUEST["mycheckbox"])){
            $check = true;
        }else{
            $check = false;
        }

        if(isset($_COOKIE['politica'])) {
            //Utilitzo la funció de la llibreria per comprovar si les dades introduïdes són valides
            
            $errorintro = controlemail($email,$pass);

            //Provo si el compte existeix
            if ( $errorintro == ""){
                $dadaexisteix = dadesexistents($email,$pass,$check);
            }

        }else{
            echo "No has acceptat la politaica de cookies";
        }
    }
}


//Comprova si s-accepta o no la política de cookies
if(isset($_REQUEST['politica-cookies'])) {
    setcookie('politica', '1', time() + 365 * 24 * 60 * 60);
}
if(isset($_REQUEST['denpolitica-cookies'])) {
    header("location:https://www.google.com/");
}

?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
        <link href="css.css" rel="stylesheet" type="text/css">
        <title>Inicia sessio</title>
    </head>
    <body>
        <div>
            <?php if (!isset($_REQUEST['politica-cookies']) && !isset($_COOKIE['politica'])): ?>
                <!-- Si la política de galetes no ha sigut acceptada, entra al if-->
                <div class="cookies">
                    <h2>Cookies</h2>
                    <p>¿Aceptas nuestras cookies?</p>
                    <a href="?politica-cookies=1">Aceptar</a> /
                    <a href="?denpolitica-cookies=1">No aceptar</a>
                </div>
            <?php endif; ?>
        </div>
        <div class="content-form">
            <form method="post" id="myform" name="myform" >
                <h1 class="tituloclase">Inicia sessió</h1>
                <div class="error">
                <?php
                    if (isset($errorintro)){
                        echo $errorintro; 
                    }
                    if (isset($dadaexisteix) && $errorintro == ""){
                        echo $dadaexisteix;
                    }    
                    ?>
                </div><br>


                <label>Email</label><br><input class="input" type="text" name="myuser" value="<?php if (isset($_REQUEST["myuser"])) echo $_REQUEST["myuser"] ?>" id=""/><br><br>
                <label>Contrasenya</label><br><input class="input" type="password" name="mypass" id=""/><br/><br/>
                <button class="button1" id="mysubmit" type="submit">INICIA SESIO</button><br/><br/>
                <div class="sessionoptions">
                    <input type="checkbox" name="mycheckbox[]" value="1" /><label>Record em</label>
                    <a href="./emailrecpass.php" class="olvidapass" >He oblidat la contrasenya</a>
                </div>
                
            </form>
            <hr>
            <form id="myform" name="myform" action="./crea_usuari.php" align="center">
                <br><input class="inputsubmit1" type="submit" value="Crea un compte"/> <br><br>
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