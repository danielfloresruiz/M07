<?php
session_start();
echo $_SESSION["username"];
echo $_COOKIE["nom"];


session_destroy();
session_unset();
$_SESSION=[];

echo $_REQUEST["username"];


?>