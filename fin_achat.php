<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesPanier.css">
    <title>Document</title>
</head>
<body>
    <div id="wrapper">

        <div id="header">
                <div id="barreheader">
                    Bienvenue : <?php echo $_SESSION['Prenom']; ?>
                    <a href="deconnexion.php" class="lienh" STYLE="padding:0 0 0 1080px">Se déconnecter</a>
                </div>
        </div>




        <div id="nav">
            <h1>ECE MarketPlace</h1>
            
            <ul id="menuNav">
                Recherche : <input type="text" name="" id="" placeholder="Tapez un nom d'article...">

                <a href="index_session.php" class="lienn">Accueil</a>
                <a href="toutParcourir.php" class="lienn">Tout Parcourir</a>
                <a href="Notifications.php" class="lienn">Notifications</a>
                <a href="#" class="lienn" STYLE="text-decoration: underline">Panier</a>
                <?php 
                if ($_SESSION['Prenom'] == "Admin") {
                    echo"<a href=\"gestion.php\" class=\"lienn\">Gestion</a>";
                }
                else{echo "<a href=\"compte_vendeur.php\" class=\"lienn\">Votre Compte</a>";} 
                ?>
            </ul>
        </div>
        
        <div id="formulaire">
                <div class="title"><p> Votre panier : </p></div>

            <?php
                $database = "Swimming_Pool";

                $db_handle = mysqli_connect('localhost', 'root', 'root');
                $db_found = mysqli_select_db($db_handle, $database);
                $PrixGlob=0;
                $Achat =isset($_POST["Achat"])? $_POST["Achat"] : "";

                if ($db_found){
                    if (isset($_POST["Acheter"])){
                        if($Achat == "oui"){
                            $sql = "UPDATE Article SET Valider='0' WHERE IDPanier='$IDClient'";
                            $result = mysqli_query($db_handle,$sql);
                            $data = mysqli_fetch_assoc($result);
                            echo "Félicitations pour vos achats." ;
                            echo "<br>";
                            echo"A très bientôt sur ECE MarketPlace ! :)";
                        }
                        else{echo "Tous vos articles sont encore dans votre panier.";
                            echo"<br>";
                            echo"Vous n'avez pas procédé à un achat.";}
                    }
                }
            ?>

        </div>
            


        <footer>
            <small>
                Copyright &copy; 2021, Sezille_Lucas_-_Industry <br>
                <a href="mailto:sezille_lucas@gmail.com">sezille_lucas@gmail.com</a>
            </small>
        </footer>
    </div>
</body>
</html>


