<?php

session_start();
    include 'llib-compdades.php';
    include 'llib-edit-user.php';



    if ((isset($_SESSION["login"]) && $_SESSION["login"])){
        //pos res
    }else if (isset($_COOKIE["email"])){
        dadesexistents($_COOKIE["email"],$_COOKIE["pass"],false);
    }else {
        header("location:inicial.php");
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
    <title>Edita usuari</title>
</head>
<body>
    <div style="text-align: center; margin-top:200px;">

        <sapn class="error">
            <?php
                if (isset($error)){
                    echo $error; 
                }
                if (isset($creausuariav) && $error == ""){
                    //echo $creausuariav;
                }    
            ?>
        </span><br><br>

        <form method="post" id="myform" name="myform" align="center">
            <label>Nom</label> <input type="text" size="30" name="mynom" value="<?php echo $olduser["Nom"]; ?>"/><br/><br/>
            <label>Email</label> <input type="text" size="30" name="myemail" value="<?php echo $olduser["Email"]; ?>"/><br/><br/>
            <label>Password</label> <input type="password" size="30" name="mypass" placeholder="Res per no cambiar"/><br/><br/>
            <label>Repite Password</label> <input type="password" size="30" name="mypass2"/><br/><br/>
            <label>Old Password</label> <input type="password" size="30" name="myoldpass"/><br/><br/>

            <button id="mysubmit" type="submit">Submit</button><br/><br/>
        </form>
        <hr>
        <form id="myform" name="myform" action="./privada.php" align="center">
            <input type="submit" value="Cancela"/> 
        </form> 
    </div>
</body>
</html>