<?php

$mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_a5');

if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$nom = "dani";
$email = "dani@dani.cat";
$pass = "123456";

$mysqli -> query("INSERT INTO usuaris (Nom, Email, Pass) VALUES ('$nom', '$email', MD5($pass))");

// Print auto-generated id
echo "New record has id: " . $mysqli -> insert_id;


//https://phpdelusions.net/mysqli/check_value

?>