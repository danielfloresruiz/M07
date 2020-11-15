<?php 
    session_start();
    include 'llib-logout.php';
    include 'llib-compdades.php';
    include 'llib-editProd.php';

    
    if ((isset($_SESSION["login"]) && $_SESSION["login"])){
        
    }else if (isset($_COOKIE["email"])){
        dadesexistents($_COOKIE["email"],$_COOKIE["pass"],false);
    }else {
        header("location:index.php");
    }

    $oldProd = TreureDadesProd($_REQUEST["idProd"]);
    $oldProdImg = TreureDadesImgProd($_REQUEST["idProd"]);

    if ($_SERVER['REQUEST_METHOD']=='POST'){
        if (isset($_REQUEST["prodNom"])){
            $nom = ($_REQUEST["prodNom"]);
            $desc = ($_REQUEST["prodDesc"]);
            $preu = ($_REQUEST["prodPreu"]);

            $dir_subida = "images/";
            $img = $dir_subida.basename($_FILES["prodImg"]["name"]);
            if (move_uploaded_file($_FILES['prodImg']['tmp_name'], $img)) {}
            
            $id = ($_REQUEST["idProd"]);

            $error = controlProdEdit($nom,$desc,$preu);
            
            
        
            if ($error == ""){
                editprodadmin($oldProd,$oldProdImg,$id,$nom,$desc,$preu,$img);
                header("location:adminProd.php");
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="cat">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css.css" rel="stylesheet" type="text/css">
    <title>Editar producte</title>
</head>
<body>
    <div class="content-form">

    <h1 class="tituloclase">Edita producte</h1>

    <div class="error">
        <?php
            if (isset($error)){
                echo $error; 
            }
        ?>
    </div><br>

    <form enctype="multipart/form-data" method="post" id="myform" name="myform">
        <input name="idProd" type="hidden" value="<?= $_REQUEST["idProd"] ?>">
        <label>Nom</label><br><input class="input" type="text" name="prodNom" value="<?= $oldProd["nom"]; ?>"/><br/><br/>
        <label>Descripcio</label><br><textarea class="text-area" name="prodDesc" style="resize: none;" rows="6" cols="48"><?= $oldProd["descripcio"]; ?></textarea><br/><br/>
        <label>Preu</label><br><input class="input" type="text" name="prodPreu" value="<?= $oldProd["preu"]; ?>"/><br/><br/>
        <label>Imatge</label><br><input type="file" name="prodImg"><br/><br/>

        <button class="button1" id="mysubmit" type="submit">Acceptar</button><br/><br/>
    </form>
    <hr>
    <form id="myform" name="myform" action="./adminProd.php" align="center">
        <br><input class="inputsubmit1" type="submit" value="Cancela"/><br><br>
    </form> 
    </div>
</body>
</html>