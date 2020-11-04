<?php
session_start();

if ($_SERVER['REQUEST_METHOD']=='POST'){
    echo "el correo ha sido enviado";
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css.css" rel="stylesheet" type="text/css">
    <title>Recuperacion de Password</title>
</head>
<body>
    <div class="content-form">
        <h1 class="tituloclase">Recuperacion de cuenta</h1>
        <form method="post">
            <label>Introduzca su correo: </label><br><input class="input" type="text" name="mynom"/><br/><br/>
            <button class="button1" id="mysubmit" type="submit">Enviar</button><br/><br/>
        </form>
    </div>
</body>
</html>