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

    //Funció per validar les dades que entren pel formulari
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER['REQUEST_METHOD']=='POST'){
        $nom = test_input($_REQUEST["prodnom"]);
        $desc = test_input($_REQUEST["proddesc"]);
        $preu = test_input($_REQUEST["prodpreu"]);
        
        $dir_subida = "images/";
        $img = $dir_subida.basename($_FILES["prodimg"]["name"]);
        if (move_uploaded_file($_FILES['prodimg']['tmp_name'], $img)) {}


        include "llib-creaProducte.php";
        $error = controlprod($nom,$desc,$preu,$img);
    
        if ($error == ""){
            creaproducte($nom,$desc,$preu,$img);
            header("location:adminProd.php");
        }
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

    <div class="content-form">

        <h1 class="tituloclase">Afegir Producte</h1>

        <div class="error">
            <?php
                if (isset($error)){
                    echo $error; 
                } 
            ?>
        </div><br>

        <form enctype="multipart/form-data" method="post" id="myform" name="myform">
        
            <label>Nom</label><br><input class="input" type="text" name="prodnom" value="<?php if ($_SERVER['REQUEST_METHOD']=='POST') echo $_REQUEST["prodnom"] ?>"/><br/><br/>
            <label>Descripcio</label><br><textarea class="text-area" name="proddesc" style="resize: none;" rows="6" cols="48"><?php if ($_SERVER['REQUEST_METHOD']=='POST') echo $_REQUEST["proddesc"] ?></textarea><br/><br/>
            <label>Preu</label><br><input class="input" type="text" name="prodpreu" value="<?php if ($_SERVER['REQUEST_METHOD']=='POST') echo $_REQUEST["prodpreu"] ?>"/><br/><br/>
            <label>Imatge</label><br><input type="file" name="prodimg" id=""><br/><br/>

            <button class="button1" id="mysubmit" type="submit">Submit</button><br/><br/>
        </form>
        <hr>
        <form id="myform" name="myform" action="./adminProd.php" align="center">
            <br><input class="inputsubmit1" type="submit" value="Cancelar"/><br><br>
        </form>
    </div>
</body>
</html>