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


    //sacar todos los datos del usuario
    $olduser = TreureDades($_SESSION["userid"]);


    if ($_SERVER['REQUEST_METHOD']=='POST'){
        $nom = ($_REQUEST["mynom"]);
        $email = ($_REQUEST["myemail"]);


        if (isset($_REQUEST["myoldpass"]) && MD5($_REQUEST["myoldpass"]) == $olduser["Pass"]){
            $pass = ($_REQUEST["mypass"]);
            $pass2 = ($_REQUEST["mypass2"]);
            $error = controlediruser($nom,$email,$pass,$pass2);
        }else{
            $error = "La contrasenya antigua no es correcta";
        }
        
        
    
        if ($error == ""){
            $eduser = edituser($olduser,$_SESSION["userid"],$nom,$email,$pass);
            header("location:privada.php");
        }
    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css.css" rel="stylesheet" type="text/css">
    <title>Edita usuari</title>
</head>
<body>
    <div class="content-form">

        <h1 class="tituloclase">Edita usuari</h1>

        <div class="error">
            <?php
                if (isset($error)){
                    echo $error; 
                }
                if (isset($creausuariav) && $error == ""){
                    //echo $creausuariav;
                }    
            ?>
        </div><br>

        <form method="post" id="myform" name="myform">
            <label>Nom</label><br><input class="input" type="text" name="mynom" value="<?php echo $olduser["Nom"]; ?>"/><br/><br/>
            <label>Email</label><br><input class="input" type="text" name="myemail" value="<?php echo $olduser["Email"]; ?>"/><br/><br/>
            <label>Password</label><br><input class="input" type="password" name="mypass" placeholder="Res per no cambiar"/><br/><br/>
            <label>Repite Password</label><br><input class="input" type="password" name="mypass2"/><br/><br/>
            <label>Old Password</label><br><input class="input" type="password" name="myoldpass"/><br/><br/>

            <button class="button1" id="mysubmit" type="submit">Acceptar</button><br/><br/>
        </form>
        <hr>
        <form id="myform" name="myform" action="./privada.php" align="center">
            <br><input class="inputsubmit1" type="submit" value="Cancela"/><br><br>
        </form> 
    </div>
</body>
</html>