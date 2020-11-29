<?php
session_start();
include 'funciones.php';


require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';
require './phpmailer/src/Exception.php';
require './phpmailer/src/OAuth.php';
ini_set('date.timezone','Europe/Madrid');

if ($_SERVER['REQUEST_METHOD']=='POST'){
    if (mailExist($_REQUEST["myMail"])){
        $token = randomToken();
        setcookie("recMail",$_REQUEST["myMail"],time()+7200);
        setcookie("recToken",$token,time()+7200);
        
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
        $mail->Body = '<html><body>Hola,'.$_REQUEST['myMail'].'<br> per recuperar la contrasenya fes click <a href="http://dawjavi.insjoaquimmir.cat/dflores/M07/UF1/A7/recuperarPass.php?email='.$_REQUEST["myMail"].'&token='.$token.'">aquí</a>, <br>Si no has estat tu, informa ns i cabia la contrasenya.</body></html>';
        $mail->CharSet = 'UTF-8'; // Con esto ya funcionan los acentos
        $mail->IsHTML(true);
        if ($mail->send()){
            $rec_id = guardarRecuperacion($_REQUEST['myMail'],$token);
            setcookie("recID",$rec_id,time()+7200);
            //header("location: index.php");
        }
        
    }else{
        $error = "El correu no existeix";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css.css" rel="stylesheet" type="text/css">
    <title>Recuperació de compte</title>
</head>
<body>
    <div class="content-form">
        <h1 class="tituloclase">Recuperació de compte</h1>

        <div class="error">
            <?php
                if (isset($error)){
                    echo $error; 
                }  
            ?>
        </div><br>

        <form method="post">
            <label>Introdueix el seu correu</label><br><input class="input" type="text" name="myMail"/><br/><br/>
            <button class="button1" id="mysubmit" type="submit">Enviar</button><br/><br/>
        </form>
        <hr>
        <form action="index.php" align="center">
            <br><input class="inputsubmit1" id="mysubmit" type="submit" value="Cancelar"><br/><br/>
        </form>
    </div>
</body>
</html>