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
    $olduser = TreureDades($_REQUEST["ID"]);


    if ($_SERVER['REQUEST_METHOD']=='POST'){
        if (isset($_REQUEST["mynom"])){
            $nom = ($_REQUEST["mynom"]);
            $email = ($_REQUEST["myemail"]);
            $pass = ($_REQUEST["mypass"]);
            $pass2 = ($_REQUEST["mypass2"]);
            $namerol = ($_REQUEST["rol"]);
            $error = controlediruser($nom,$email,$pass,$pass2);
            
            
        
            if ($error == ""){
                $eduser = edituseradmin($olduser,$_REQUEST["ID"],$nom,$email,$pass,$namerol);
                header("location:adminedituser.php");
            }
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
            <label>ID</label><br><input class="input" type="text" name="ID" value="<?php echo $olduser["ID"]; ?>" readonly/><br/><br/>
            <label>Nom</label><br><input class="input" type="text" name="mynom" value="<?php echo $olduser["Nom"]; ?>"/><br/><br/>
            <label>Email</label><br><input class="input" type="text" name="myemail" value="<?php echo $olduser["Email"]; ?>"/><br/><br/>
            <label>Password</label><br><input class="input" type="password" name="mypass" placeholder="Res per no cambiar"/><br><br>
            <label>Repite Password</label><br><input class="input" type="password" name="mypass2"/><br/><br/>
            <?php
                if ($olduser["Rol"] == "admin"){
            
                    echo '<select class="select" name="rol"><option value="admin">Admin<option value="user">User</option></select>';
                }else{
                    echo '<select class="select" name="rol"><option value="user">User<option value="admin">Admin</option></select>';
                }
            ?>
            <br><br>

            <button class="button1" id="mysubmit" type="submit">Submit</button><br/><br/>
        </form>
        <hr>
        <form id="myform" name="myform" action="./adminedituser.php" align="center">
            <br><input class="inputsubmit1" type="submit" value="Cancela"/><br><br>
        </form> 
    </div>
</body>
</html>