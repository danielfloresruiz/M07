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
            <label>ID</label> <input type="text" size="10" name="ID" value="<?php echo $olduser["ID"]; ?>" readonly/><br/><br/>
            <label>Nom</label> <input type="text" size="30" name="mynom" value="<?php echo $olduser["Nom"]; ?>"/><br/><br/>
            <label>Email</label> <input type="text" size="30" name="myemail" value="<?php echo $olduser["Email"]; ?>"/><br/><br/>
            <label>Password</label> <input type="password" size="30" name="mypass" placeholder="Res per no cambiar"/><br><br>
            <label>Repite Password</label> <input type="password" size="30" name="mypass2"/><br/><br/>
            <?php
                if ($olduser["Rol"] == "admin"){
                    echo '<select name="rol"><option value="admin">Admin<option value="user">User</option>';
                }else{
                    echo '<select name="rol"><option value="user">User<option value="admin">Admin</option>';
                }
            ?>
            <br><br>

            <input id="mysubmit" type="submit" value="Submit"><br/><br/>
        </form>
        <hr>
        <form id="myform" name="myform" action="./adminedituser.php" align="center">
            <input type="submit" value="Cancela"/> 
        </form> 
    </div>
</body>
</html>