<?

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function iniciSessio($user,$pass){
    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_db_prova');

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $consulta = "SELECT * FROM usuaris_examen WHERE username = '$user'";

    $result = $mysqli->prepare($consulta);
    if (!$result = $mysqli ->query($consulta)){
        die ($mysqli->error);
    }
    if ($result -> num_rows >= 0){
        $usuari = $result -> fetch_assoc(); 
        $pass_db = $usuari["password"];
        if ($pass_db == MD5($pass)){
            $_SESSION["login"]=true;
            $_SESSION["user_id"]=$usuari["id"];
            header("location:home.php");
        }
        return "El username o la contrasenya són incorrectes";
    }
}

function logout(){
    session_destroy();
    session_unset();
    header("location:index.php");
}

function nameUser($id){
    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_db_prova');

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $consulta = "SELECT * FROM usuaris_examen WHERE id = '$id'";

    $result = $mysqli->prepare($consulta);
    if (!$result = $mysqli ->query($consulta)){
        die ($mysqli->error);
    }
    if ($result -> num_rows >= 0){
        $usuari = $result -> fetch_assoc();
        return $usuari["nom"];
    }
}

function randomPass(){
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $token=("");
    for ($i=0;$i<8;$i++){
        $n = rand(0, strlen($alphabet)-1);
        $token.= $alphabet[$n];
    }
    return $token;
}

function userExist($user){
    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_db_prova');

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $consulta = "SELECT * FROM usuaris_examen WHERE username = '$user'";

    if (!$datos = $mysqli->query($consulta)){
    }
    if ($datos->num_rows >= 1){
        return true;
    }else{
        return false;
    }
        
    $mysqli->close();
}

function caviarPass_db($user,$pass){
    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_db_prova');

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    $cifPass = MD5($pass);
    $sql = "UPDATE `usuaris_examen` SET `password` = '$cifPass' WHERE `usuaris_examen`.`username` = '$user';";
    $mysqli -> query($sql);
}

function numrandom(){
    $num = "0123456789";
    $token=("");
    for ($i=0;$i<1;$i++){
        $n = rand(0, strlen($num)-1);
        $token.= $num[$n];
    }
    return $token;
}

function ComprobacioSeguretat($num1,$num2,$num3){
    $entra = false;
    if ($num1+$num2==$num3){
        $entra=true;
    }
    return $entra;
}

function recPass($id){
    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_db_prova');

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $consulta = "SELECT * FROM usuaris_examen WHERE id = '$id'";

    $result = $mysqli->prepare($consulta);
    if (!$result = $mysqli ->query($consulta)){
        die ($mysqli->error);
    }
    if ($result -> num_rows >= 0){
        $usuari = $result -> fetch_assoc();
        return $usuari["recPass"];
    }

}

function canviarPass($id,$pass){
    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_db_prova');

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    $cifPass = MD5($pass);
    $sql = "UPDATE `usuaris_examen` SET `password` = '$cifPass' WHERE `usuaris_examen`.`id` = '$id';";
    $mysqli -> query($sql);
}

function recPassAl($id,$pass){
    $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_db_prova');

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    $cifPass = MD5($pass);
    $sql = "UPDATE `usuaris_examen` SET `password` = '$cifPass' WHERE `usuaris_examen`.`id` = '$id';";
    $mysqli -> query($sql);

    $sql = "UPDATE `usuaris_examen` SET `recPass` = '0' WHERE `usuaris_examen`.`id` = '$id';";
    $mysqli -> query($sql);
}

?>