<?php
session_start();
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';
require './phpmailer/src/Exception.php';
require './phpmailer/src/OAuth.php';
ini_set('date.timezone','Europe/Madrid');

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "dfloresr@fp.insjoaquimmir.cat";
    $mail->Password = "dfloresr2020";
    $mail->setFrom('no-replay@dani.com', 'Servei automatic de recuperacio.');
    $mail->addAddress($_REQUEST["myMail"],"");
    $mail->Subject = 'Recuperacio de contrasenya.';
    $mail->Body = '<html><body>Hola,'.$_REQUEST['myMail'].'<br> per recuperar la contrasenya fes click <a href="https://http://dawjavi.insjoaquimmir.cat/dflores/M07/UF1/A7/recuperarPass.php">aquí</a>, <br>Si no has estat tu, informa ns i cabia la contrasenya.</body></html>';
    $mail->CharSet = 'UTF-8'; // Con esto ya funcionan los acentos
    $mail->IsHTML(true);
    if ($mail->send()){
        if(guardarRecuperacion($_REQUEST['myMail'],$token)==false){
            echo 'Algo fallo por favor vuela a solicitar la recuperacion de su contraseña haciendo click <a href="?recuperar.php">aqui</a>';
        }else{
        header("location: index.php");
        }
    }
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
            <label>Introduzca su correo: </label><br><input class="input" type="text" name="myMail"/><br/><br/>
            <button class="button1" id="mysubmit" type="submit">Enviar</button><br/><br/>
        </form>
        <hr>
        <form action="index.php" align="center">
            <br><input class="inputsubmit1" id="mysubmit" type="submit" value="Cancelar"><br/><br/>
        </form>
    </div>
</body>
</html>