<?php
    session_start();
    include 'libreria.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $errorMail = errorControl($_REQUEST["mail"],"mail");
        if($errorMail == ""){
            $errorPassword = errorControl($_REQUEST["password"],"password");
            if($errorPassword == ""){
                $_SESSION["mail"]=$_REQUEST["mail"];
                $_SESSION[loged]= true;
                header('Location:session.php');
            }
        } 
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div style="text-align: center; margin-top:220px;">
        <form  method="post" id="mylogin" name="mylogin">
            <label for="mail">Mail:<input type="text" name="mail" id=""><span class="error"><?if(isset($errorMail))echo $errorMail;?></span></br></br>
            <label for="password">Password:</label><input type="password" name="password" id=""><span class="error"><?if(isset($errorPassword))echo $errorPassword;?></span></br></br>
            <input type="submit" value="Iniciar sesion">
        </form>
    </div>
</body>
</html>