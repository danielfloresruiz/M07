<?php
    session_start();
    include 'llib-logout.php';
    include 'llib-compdades.php';
    include 'llib-editProd.php';

    if ((isset($_SESSION["login"]) && $_SESSION["login"])){
        
    }else if (isset($_COOKIE["email"])){
        dadesexistents($_COOKIE["email"],$_COOKIE["pass"],false);
    }else {
        header("location:index.php");
    }


    if (isset($_REQUEST["compAll"])){
        header("location:create-session.php");
    }

    if (isset($_REQUEST["back"])){
        header("location:privada.php");
    }

    if (isset($_REQUEST["delProdCart"])){
        delProdCarr($_SESSION["userid"],$_REQUEST["idProdCart"]);
    }

    $_SESSION["total-price"]=0;
?>


<!DOCTYPE html>
<html lang="cat">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css.css" rel="stylesheet" type="text/css">
        <title>Carret</title>
        <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
        <script src="https://js.stripe.com/v3/"></script>
    </head>
    <body>
        <div class="content-form">
        <h1 class="tituloclase">El meu carret</h1>
        <form id="myform" name="myform" method="post">
            <div class="flex-container">
                <div class="flex-item">
                    
                </div>
                <div class="flex-item">
                    <button class="button2" name="back" type="submit">Cancelar</button><br><br>
                </div>
            </div>
        </form>
        </div>




        <div class="content-form-prod2">
            <h1 class="tituloclase">Productes al carret</h1>
            
            <div class="flex-container-prod2">
            <?php
                $mysqli = new mysqli('localhost', 'dflores', 'dflores', 'dflores_a5');
                if ($mysqli->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $id_user = $_SESSION["userid"];
                
                
                $consulta = "SELECT * FROM carret WHERE id_usuari = '$id_user'";
                
                $result = $mysqli->prepare($consulta);
                if (!$result = $mysqli ->query($consulta)){
                    die ($mysqli->error);
                }

                if ($result->num_rows > 0){
                    while($prodcart = $result->fetch_assoc()){

                        $prod_id_card = $prodcart["id_producte"];

                        //echo $prodcart["id_producte"];

                        $consultaprod = "SELECT * FROM productes WHERE id = '$prod_id_card'";
                
                        $resultprod = $mysqli->prepare($consultaprod);
                        if (!$resultprod = $mysqli ->query($consultaprod)){
                            die ($mysqli->error);
                        }

                        if ($resultprod->num_rows > 0){
                            while($prod = $resultprod->fetch_assoc()){

                                $id_prod = $prod["id"];
                                $consultaimg = "SELECT * FROM imatges WHERE id_producte = '$id_prod'";
                                if (!$result2 = $mysqli ->query($consultaimg)){
                                    die ($mysqli->error);
                                }
                                $image = $result2->fetch_assoc();
                                ?>
                                    <div class="flex-item-prod2">
                                        <img src="<?=$image["ruta"] ?>" width="250" height="200">
                                        <p class="nom-prod"> <?=$prod["nom"] ?></p>
                                        <p> <?=$prod["descripcio"] ?></p>
                                        <p> <?=$prod["preu"] ?>€</p>
                                        <? $_SESSION["total-price"]+= $prod["preu"]; ?>
                                        <div class="flex-container-prod-button">
                                            <div class="flex-item">
                                                <form method="post" id="myform" name="myform">
                                                    <input name="idProdCart" type="hidden" value="<?= $prod['id'] ?>">
                                                    <button class="button2" name="delProdCart" type="submit">Eliminar del carret</button><br><br>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                    }}}
                }else{
                    echo "<p class='searchError'>no hi ha cap producte al carret</p>";
                }
                $mysqli->close();
            ?>
        </div>
        <button class="button2" id="checkout-button">Checkout</button>
    </body>
    <script type="text/javascript">
    // Create an instance of the Stripe object with your publishable API key
    var stripe = Stripe("pk_test_51HotTBFXhO5sy2LGqcBe2BebhZqs5Zq6wHlEmatY1N6naM6den7Oh1psP81Lh6ssgyxISgewhVrkVjVbsdMmV0xX00PC1Gxpoi");
    var checkoutButton = document.getElementById("checkout-button");
    checkoutButton.addEventListener("click", function () {
      fetch("create-session.php", {
        method: "POST",
      })
        .then(function (response) {
          return response.json();
        })
        .then(function (session) {
          return stripe.redirectToCheckout({ sessionId: session.id });
        })
        .then(function (result) {
          // If redirectToCheckout fails due to a browser or network
          // error, you should display the localized error message to your
          // customer using error.message.
          if (result.error) {
            alert(result.error.message);
          }
        })
        .catch(function (error) {
          console.error("Error:", error);
        });
    });
    </script>
    

</html>