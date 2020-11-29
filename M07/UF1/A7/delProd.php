<?php
    session_start();
    include 'funciones.php';



    if ((isset($_SESSION["login"]) && $_SESSION["login"])){
        //pos res
    }else if (isset($_COOKIE["email"])){
        dadesexistents($_COOKIE["email"],$_COOKIE["pass"],false);
    }else {
        header("location:index.php");
    }
    $adminuser = TreureDades($_SESSION["userid"]);
    if ($adminuser["Rol"] != "admin"){
        header("location:index.php");
    }


    //sacar todos los datos del usuario
    $oldProd = TreureDadesProd($_REQUEST["idProd"]);

    if (isset($_REQUEST["cancel"])){
        header("location:adminProd.php");
    }

    if (isset($_REQUEST["accept"])){
        delProd($oldProd["id"]);
        header("location:adminProd.php");
    }

    ?>



<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css.css" rel="stylesheet" type="text/css">
        <title>Borrar Producto</title>
    </head>
    <body>
    <div class="content-form">
        <h1 class="tituloclase">Delete Product</h1>
        <h4 class="deluserh4">Seguro que desea borrar el producto <span class="delusernom"><?= $oldProd["nom"] ?></span>?</h4>
        <form>
            <?
            echo '<input name="ID" type="hidden" value='.$oldProd["id"].'>';
            ?>
            <div class="flex-container">
                <div class="flex-item">
                    <button class="button2" name="cancel" type="submit">Cancelar</button>
                </div>
                <div class="flex-item">
                    <input name="idProd" type="hidden" value="<?= $oldProd['id'] ?>">
                    <button class="button2" name="accept" type="submit">Borrar</button>
                </div>
            </div><br>
        </form>
    </div>
    </body>
</html>