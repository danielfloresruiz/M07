<?php 
function logout(){
    setcookie("email", "", time() + 365 * 24 * 60 * 60);
    setcookie("pass", "", time() + 365 * 24 * 60 * 60);
    session_destroy();
    session_unset();
    header("location:inicial.php");
}

?>