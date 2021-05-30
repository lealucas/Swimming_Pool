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
                    <?php
            $database = "Swimming_Pool";

                        $db_handle = mysqli_connect('localhost', 'root', 'root');
                        $db_found = mysqli_select_db($db_handle, $database);
                        if ($db_found) {
                            $Prenom = $_SESSION['Prenom'];
                            $sql = "SELECT * FROM Vendeur WHERE Prenom = '$Prenom'";
                            $result = mysqli_query($db_handle, $sql);
                            $data = mysqli_fetch_assoc($result);
                            $pdp = $data['PdP'];
                            echo"<img src='$pdp' width='20px' style = 'border-radius: 40%'>";
                        }else {echo "Database not found";}
                        ?>
                    <a href="deconnexion.php" class="lienh" STYLE="margin-left:1080px">Se déconnecter</a>
                </div>
        </div>




        <div id="nav">
            <h1>ECE MarketPlace</h1>
            
            <ul id="menuNav">
                Recherche : <input type="text" name="" id="" placeholder="Tapez un nom d'article...">

                <a href="index_session.php" class="lienn">Accueil</a>
                <a href="toutParcourir.php" class="lienn">Tout Parcourir</a>
                <a href="Notifications.php" class="lienn">Notifications</a>
                <?php
                    if($_SESSION['IDClient']==0){
                        echo"<a href=\"nego_enchere.php\" class=\"lienn\">Négociations/Enchères</a>";
                    }
                    else{
                        echo"<a href=\"Panier.php\" class=\"lienn\">Panier</a>";
                    }
                    
                ?>
                <?php 
                if ($_SESSION['Prenom'] == "Admin") {
                    echo"<a href=\"gestion.php\" class=\"lienn\">Gestion</a>";
                }
                else{echo "<a href=\"compte_vendeur.php\" class=\"lienn\">Votre Compte</a>";} 
                ?>
            </ul>
        </div>
        
        <div id="section">
            
            <div id="result">
                <div class="title">
                    <p> Votre panier : </p>
                </div>

            <?php
                $database = "Swimming_Pool";

                $db_handle = mysqli_connect('localhost', 'root', 'root');
                $db_found = mysqli_select_db($db_handle, $database);
                $PrixGlob=0;
                $Achat =isset($_POST["Achat"])? $_POST["Achat"] : "";

                if ($db_found){
                    if (isset($_POST["Acheter"])){
                        if($Achat == "oui"){

                            $IDClient=$_SESSION['IDClient'];

                            $sql = "SELECT * FROM Article WHERE Valider = '1' AND IDPanier = '$IDClient'";
                            $result = mysqli_query($db_handle,$sql);
                            $data = mysqli_fetch_assoc($result);

                            $prix = $data['Prix'];
                            $IDVendeur = $data['IDVendeur'];
                            $sql = "UPDATE Vendeur SET Cagnotte='$prix' WHERE IDVendeur='$IDVendeur'";

                            $result = mysqli_query($db_handle,$sql);
                            $data = mysqli_fetch_assoc($result);
                            $sql = "UPDATE Article SET Valider='0' WHERE IDPanier='$IDClient'";

                            $result = mysqli_query($db_handle,$sql);
                            $data = mysqli_fetch_assoc($result);

                            $sql = "UPDATE Article SET IDPanier='0' WHERE IDPanier='$IDClient'";
                            $result = mysqli_query($db_handle,$sql);
                            $data = mysqli_fetch_assoc($result);


                            $sql = "UPDATE Vendeur SET Cagnotte='$prix' WHERE IDVendeur='$IDVendeur'";
                            $result = mysqli_query($db_handle,$sql);
                            $data = mysqli_fetch_assoc($result);

                            echo "<div STYLE='text-align:center; margin-top: 10px; margin-bottom: 10px'>Félicitations pour vos achats." ;
                            echo "<br>";
                            echo"A très bientôt sur ECE MarketPlace ! :)</div>";
                        }
                        else{echo "<div STYLE='text-align:center'>Tous vos articles sont encore dans votre panier.";
                            echo"<br>";
                            echo"Vous n'avez pas procédé à un achat.</div>";}
                    }
                }
            ?>

        </div>
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


