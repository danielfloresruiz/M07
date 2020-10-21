<?php
session_start();

$errornom="";
$errorpass="";
$error=false;

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if ($_SERVER['REQUEST_METHOD']=='POST'){
    $email = test_input($_REQUEST["myuser"]);
    $pass = test_input($_REQUEST["mypass"]);
    
    if (empty($email)){
        $errornom = "el nom es obligatori";
        $error=true;
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errornom = "Format incorrecte";
        $error=true;
    }

    if (empty($pass)){
        $errorpass = "la contrasenya es obligatoria";
        $error=true;
    }else if (!preg_match("/^[a-zA-Z0-9-' ]*$/",$pass)) {
        $errorpass = "Nomes lletres o numeros";
        $error=true;
    }
    
    if (!$error) {
        header("location:comp.php");
    }
}

$_REQUEST["username"]="dfloresr@fp.insjaquimmir.cat";
$_REQUEST["password"]="tarda123";





?>

<html>
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
        <title>Inicia sessio</title>
        
    </head>
    <body>
        <form method="post" id="myform" name="myform" align="center">

            <label>Email</label> <input type="text" size="30" name="myuser" value="<?php if ($_SERVER['REQUEST_METHOD']=='POST') echo $_REQUEST["myuser"] ?>" id=""/><sapn class="error"><?=$errornom;?></span><br/><br/>
            <label>Contrasenya</label> <input type="password" size="30" name="mypass" id=""/><sapn class="error"><?=$errorpass;?></span><br/><br/>
            <input type="checkbox" name="mycheckbox[]" value="1" /> Mantenir sessio oberta<br/><br/>
            <button id="mysubmit" type="submit">Submit</button><br/><br/>

        </form>
    </body>
</html>