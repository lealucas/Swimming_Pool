<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesCompteVendeur.css" >
    <title>Document</title>
</head>
<body>

    <div id="wrapper">
        <!-- Header -->
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



        <!-- Menu de navigation -->
        <div id="nav">
            <h1>ECE MarketPlace</h1>
            
            <ul id="menuNav">
            <form action="traitement_recherche.php" method="post">
                Recherche : <input type="text" name="recherche" id="" placeholder="Tapez un nom d'article...">
                <?php if ($_SESSION['Prenom'] == "Admin") {
                    echo"<a href=\"\" class=\"lienn\">Gestion</a>";
                } ?>
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
                <a href="#" class="lienn"STYLE="text-decoration: underline">Votre Compte</a>
                </form>
            </ul>
        </div>


        <div id="section">
            <div id="position">
                <a href="produits_vente.php" class="lienC" STYLE="text-decoration: underline">Vos Produits en vente</a>
                <a href="mettre_vente.php" class="lienC">Mettre en vente un produit</a>
                <a href="produits_attentes.php" class="lienC">Vos produits en attente</a>
                <a href="cagnotte.php" class="lienC">Votre cagnotte</a>
                <a href="vider_cagnotte.php" class="lienC">Vider votre cagnotte <img src="img/caddy.png" width="22px"></a>
            </div>

            <div id="formulaire">
                <div class="title"><p>Vos produits en Vente </p></div><br>
                <?php
                    echo"<link rel=\"stylesheet\" href=\"stylesCompteVendeur.css\" >";
                    $database = "Swimming_Pool";

                    $db_handle = mysqli_connect('localhost', 'root', 'root');
                    $db_found = mysqli_select_db($db_handle, $database);
                    
                    if ($db_found){
                        $IDVendeur = $_SESSION['IDVendeur'];
                        $sql = "SELECT * FROM Article WHERE IDVendeur='$IDVendeur' AND Valider ='1'";
                        $result = mysqli_query($db_handle,$sql);

                        if (mysqli_num_rows($result) == 0) {
                            echo "Pas d'article dans cette catégorie <br>";
                        } else {
                            while ($data = mysqli_fetch_assoc($result)) {
                                $image = $data['Photo'];
                                echo "<div class=\"cadre\"><img class=\"objet\" src='$image' width='200px'>";
                                echo"<p class=\"describ\">".$data['Nom']."<br>".$data['Discrib']."<br>Prix : ".$data['Prix']."€<br>Vente par : ".$data['Vente']."<br><a STYLE='text-align:center' href=\"produits_vente.php?IDArticle=".$data['IDArticle']."\">Supprimer l'article</a></p></div>";
                            }
                            $IDArticle = $_GET['IDArticle'];
                            $sql = "UPDATE Article SET Valider ='0' WHERE Valider ='1' AND IDArticle = '$IDArticle'" ;
                            $result = mysqli_query($db_handle,$sql);
                            $data =mysqli_num_rows($result);
                        }
                    } else {
                        echo "Database not found. <br>";
                    }
                    mysqli_close($db_handle);
                ?>
            </div>
        </div>


        



        <!-- Footer -->
        <footer>
            <small>
                Copyright &copy; 2021, Sezille_Lucas_-_Industry<br>
                <a href="mailto:sezille_lucas@gmail.com">sezille_lucas@gmail.com</a>
            </small>
        </footer>
    </div>
</body>
</html>