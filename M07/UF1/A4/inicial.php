<?php
session_start();

//Funció per validar les dades que entren pel formulari
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Vaig a mirar a la llibreria per veure si l'usuari ja està registrat, si ho està l'envio a la pàgina privada.
include 'llib-compinices.php';
comlogincookieinicial();


//Entra si rep dades per post (després d'enviar els resultats del formulari)
if ($_SERVER['REQUEST_METHOD']=='POST'){
    //Guardo les dades que l'usuari ha introduït a la seva respectiva variable
    $email = test_input($_REQUEST["myuser"]);
    $pass = test_input($_REQUEST["mypass"]);

    if(isset($_COOKIE['politica'])) {
        //Utilitzo la funció de la llibreria per comprovar si les dades introduïdes són valides o incorrectes
        include 'llib-compdades.php';
        $erroremail = controlemail($email);
        $errorpass = controlpass($pass);

        //Comprovo si l'usuari ha marcat el checkbox per mantenir iniciada la sessió i entro a la funció que l'usuari ha triat.
        if (isset($_REQUEST["mycheckbox"])){
            contrloginper($erroremail,$errorpass,$email,$pass);
        }else{
            contrlogin($erroremail,$errorpass);
        }
    }else{
        echo "No has acceptat la politaica de cookies";
    }
}


//Comprova si s-accepta o no la política de cookies
if(isset($_REQUEST['politica-cookies'])) {
    setcookie('politica', '1', time() + 365 * 24 * 60 * 60);
}
if(isset($_REQUEST['denpolitica-cookies'])) {
    header("location:https://www.google.com/");
}

?>

<html>
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
        <title>Inicia sessio</title>
        
    </head>
    <body>
    <div>
        <?php if (!isset($_REQUEST['politica-cookies']) && !isset($_COOKIE['politica'])): ?>
            <!-- Si la política de galetes no ha sigut acceptada, entra al if-->
            <div class="cookies">
                <h2>Cookies</h2>
                <p>¿Aceptas nuestras cookies?</p>
                <a href="?politica-cookies=1">Aceptar</a> /
                <a href="?denpolitica-cookies=1">No aceptar</a>
            </div>
        <?php endif; ?>
    </div>

        <form method="post" id="myform" name="myform" align="center">

            <label>Email</label> <input type="text" size="30" name="myuser" value="<?php if ($_SERVER['REQUEST_METHOD']=='POST') echo $_REQUEST["myuser"] ?>" id=""/><sapn class="error"><? if (isset($erroremail)) echo $erroremail;?></span><br/><br/>
            <label>Contrasenya</label> <input type="password" size="30" name="mypass" id=""/><sapn class="error"><? if (isset($errorpass))echo$errorpass;?></span><br/><br/>
            <input type="checkbox" name="mycheckbox[]" value="1" /> Mantenir sessio oberta<br/><br/>
            <button id="mysubmit" type="submit">Submit</button><br/><br/>

        </form>
    </body>
</html>