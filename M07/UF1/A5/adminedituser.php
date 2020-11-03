<?php
    session_start();
    include 'llib-compdades.php';
    include 'llib-edit-user.php';



    if ((isset($_SESSION["login"]) && $_SESSION["login"])){
        //pos res
    }else if (isset($_COOKIE["email"])){
        dadesexistents($_COOKIE["email"],$_COOKIE["pass"],false);
    }else {
        header("location:inicial.php");
    }
    $adminuser = TreureDades($_SESSION["userid"]);
    if ($adminuser["Rol"] != "admin"){
        header("location:inicial.php");
    }

    if (isset($_REQUEST["back"])){
        header("location:inicial.php");
    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Users Admin</title>
</head>
<body>
    <div style="text-align: center; margin-top:200px;">
        <h1>Users</h1>
        <?php
            $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_a5');
            if ($mysqli->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $consulta = "SELECT * FROM usuaris";
            $result = $mysqli->prepare($consulta);
            if (!$result = $mysqli ->query($consulta)){
                die ($mysqli->error);
            }
            if ($result->num_rows >= 0){
                echo "<table border=1 align='center'>";
                    echo "<tr>";
                            echo "<th>";
                                echo "ID";
                            echo "</th>";
                            echo "<th style='width:150px;'>";
                                echo "Nom";
                            echo "</th>";
                            echo "<th style='width:200px;'>";
                                echo "Email";
                            echo "</th>";
                            echo "<th style='width:70px;'>";
                                echo "Rol";
                            echo "</th>";
                            echo "<th style='width:70px;'>";
                                echo "Editar";
                            echo "</th>";
                            echo "<th>";
                                echo "Borrar";
                            echo "</th>";
                        echo "</tr>";
                    while($users = $result->fetch_assoc()){
                        echo "<tr>";
                            echo '<form method="post" action="edituseradmin.php" id="myform" name="myform" align="center">';
                                echo "<th>";
                                    echo '<input name="ID" size="1" style="text-align:center;" value='.$users["ID"].' readonly>';
                                echo "</th>";
                                echo "<th>";
                                    echo $users["Nom"];
                                echo "</th>";
                                echo "<th>";
                                    echo $users["Email"];
                                echo "</th>";
                                echo "<th>";
                                    echo $users["Rol"];
                                echo "</th>";
                                echo "<th>";
                                    echo '<button name="edituser" type="submit">Editar</button>';
                                echo "</th>";
                            echo '</form>';
                            echo '<form method="post" action="deluser.php" name="myform" align="center">';
                                echo "<th>";
                                    echo '<input name="ID" type="hidden" value='.$users["ID"].'>';
                                    if ($users["ID"] != $_SESSION["userid"]){
                                        echo '<button name="deluser" type="submit">Borrar</button>';
                                    }else{
                                        echo "-----";
                                    }
                                    
                                echo "</th>";
                            echo '</form>';
                        echo "</tr>";
                    }
                echo "<table>";
            }
        
            $mysqli->close();
        ?>
        <form>
            <br><br><button name="back" type="submit">Atras</button>
        </form>
    </div>
</body>
</html>