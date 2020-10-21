<?php 
function logout(){
    setcookie("login", false, time() + 365 * 24 * 60 * 60);
    session_destroy();
    session_unset();
    header("location:inicial.php");
}

?>