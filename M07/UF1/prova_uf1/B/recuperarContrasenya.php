<?php
session_start();
include 'funciones.php';

$numSeg1=numrandom();
$numSeg2=numrandom();

require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';
require './phpmailer/src/Exception.php';
require './phpmailer/src/OAuth.php';
ini_set('date.timezone','Europe/Madrid');

if ($_SERVER['REQUEST_METHOD']=='POST'){
    if (ComprobacioSeguretat($_REQUEST["num1"],$_REQUEST["num2"],$_REQUEST["num3"])){
        if (userExist($_REQUEST["myUser"])){
            $user = $_REQUEST["myUser"];
            $pass = randomPass();
            
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
            $mail->Body = '<html><body>Hola,'.$_REQUEST['myMail'].'<br> La teva nova contrasenya es: '.$pass.'.</body></html>';
            $mail->CharSet = 'UTF-8'; // Con esto ya funcionan los acentos
            $mail->IsHTML(true);
            if ($mail->send()){
                caviarPass_db($user,$pass);
                header("location: index.php");
            }
            
        }else{
            echo "El usuari no existeix";
        }
    }else{
        echo "no has encertat la suma";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css.css" rel="stylesheet" type="text/css">
    <title>Recuperació contrasenya</title>
</head>
<body>
    <div>
        <h1 class="tituloclase">Recuperació de compte</h1>

        <form method="post" id="myform" name="myform">
        <label>Introdueix el seu Username: </label><input type="text" name="myUser"/><br/><br/>
            <label>Introdueix el seu correu: </label><input type="text" name="myMail"/><br/><br/>
            <label><?= $numSeg1," + ",$numSeg2," = "?><label><input type="hidden" name="num1" value="<?=$numSeg1?>"><input type="hidden" name="num2" value="<?=$numSeg2?>"><input type="text" size="3" name="num3"/><button id="mysubmit" type="submit">Enviar</button><br/><br/>
        </form>
        <form action="index.php">
            <br><input class="inputsubmit1" id="mysubmit" type="submit" value="Cancelar"><br/><br/>
        </form>
    </div>
</body>
</html>