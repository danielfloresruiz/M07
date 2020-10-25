<?php
session_start();
$_SESSION["username"]="dani";
setcookie('nom', "dani", time() + 365 * 24 * 60 * 60); 


echo $_SESSION["username"];

?>