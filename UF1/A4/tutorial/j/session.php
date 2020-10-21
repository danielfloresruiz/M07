<?php
    session_start();
    if(!($_SESSION[loged])){
        header('Location:another.php');
    }else{
        $mail = $_SESSION["mail"];
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        session_destroy();
        header('Location:session.php');
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
        <h1>Hello <?=$mail?>!</h1>
        <form  method="post" id="mylogin" name="mylogin">
            <input type="submit" value="Cerrar sesion">
        </form>
    </div>
</body>
</html>