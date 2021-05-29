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
                    <a href="deconnexion.php" class="lienh" STYLE="padding:0 0 0 1080px">Se déconnecter</a>
                </div>
        </div>



        <!-- Menu de navigation -->
        <div id="nav">
            <h1>ECE MarketPlace</h1>
            
            <ul id="menuNav">
                Recherche : <input type="text" name="" id="" placeholder="Tapez un nom d'article...">
                <?php if ($_SESSION['Prenom'] == "Admin") {
                    echo"<a href=\"\" class=\"lienn\">Gestion</a>";
                } ?>
                <a href="index_session.php" class="lienn">Accueil</a>
                <a href="toutParcourir.php" class="lienn">Tout Parcourir</a>
                <a href="Notifications.php" class="lienn">Notifications</a>
                <a href="Panier.php" class="lienn">Panier</a>
                <a href="#" class="lienn" STYLE="text-decoration: underline">Votre Compte</a>
            </ul>
        </div>


        <div id="section">
            <div id="position">
                <a href="produits_vente.php" class="lienC">Vos Produits en vente</a>
                <a href="mettre_vente.php" class="lienC">Mettre en vente un produit</a>
                <a href="produits_attentes.php" class="lienC">Vos produits en attente</a>
                <a href="cagnotte.php" class="lienC" STYLE="text-decoration: underline">Votre cagnotte</a>
                <a href="vider_cagnotte.php" class="lienC">Vider votre cagnotte <img src="img/caddy.png" width="22px"></a>
            </div>

            <div id="formulaire">
                <div class="title"><p>Votre cagnotte </p></div><br>
                <?php
                    echo"<link rel=\"stylesheet\" href=\"stylesCompteVendeur.css\" >";
                    $database = "Swimming_Pool";

                    $db_handle = mysqli_connect('localhost', 'root', 'root');
                    $db_found = mysqli_select_db($db_handle, $database);
                    if ($db_found){
                        $IDVendeur = $_SESSION['IDVendeur'];
                        $sql = "SELECT Cagnotte FROM Vendeur WHERE IDVendeur='$IDVendeur'";
                        $result = mysqli_query($db_handle,$sql);
                        $data = mysqli_fetch_assoc($result);
                        echo "<p id=\"p_vide_cagnotte\">Votre cagnotte s'élève à un montant de ";
                        echo $data['Cagnotte'];
                        echo " €.</p>";
                    }
                    else{echo"Database not found";}
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