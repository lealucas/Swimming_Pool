<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesCompteVendeur.css">
    <title>Document</title>
</head>
<body>

    <div id="wrapper">
        <!-- Header -->
        <div id="header">
                <div id="barreheader">
                    Bienvenue : <?php echo $_SESSION['Prenom']; ?>
                    <a href="deconnexion.php" class="lienh" STYLE="margin-left:1080px">Se déconnecter</a>
                </div>
        </div>


        <!-- Menu de navigation -->
        <div id="nav">
            <h1>ECE MarketPlace</h1>
            
            <ul id="menuNav">
                Recherche : <input type="text" name="" id="" placeholder="Tapez un nom d'article...">
                <a href="index_session.php" class="lienn">Accueil</a>
                <a href="toutParcourir.php" class="lienn">Tout Parcourir</a>
                <a href="Notifications.php" class="lienn">Notifications</a>
                <a href="Panier.php" class="lienn">Panier</a>
                <a href="compte_vendeur.php" class="lienn"STYLE="text-decoration: underline">Votre Compte</a>
            </ul>
        </div>


        <div id="section">
        <div id="position">
                <a href="produits_vente.php" class="lienC">Vos Produits en vente</a>
                <a href="mettre_vente.php" class="lienC" STYLE="text-decoration: underline">Mettre en vente un produit</a>
                <a href="produits_attentes.php" class="lienC">Vos produits en attente</a>
                <a href="cagnotte.php" class="lienC">Votre cagnotte</a>
                <a href="vider_cagnotte.php" class="lienC">Vider votre cagnotte <img src="img/caddy.png" width="22px"></a>
                
            </div>

            <div id="formulaire">
                <div class="title"><p>Que voulez-vous mettre en vente ?  </p></div>


                <?php
    echo "<meta charset=\"utf-8\">";
    echo "<link rel=\"stylesheet\" type=\"text/css\" >";

    $Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";
    $Photo = isset($_POST["Photo"])? $_POST["Photo"] : "";
    $Discrib = isset($_POST["Discrib"])? $_POST["Discrib"] : "";
    $Video = isset($_POST["Video"])? $_POST["Video"] : "";
    $Categorie = isset($_POST["Categorie"])? $_POST["Categorie"] : "";
    $Prix = isset($_POST["Prix"])? $_POST["Prix"] : "";
    $Vente = isset($_POST["Vente"])? $_POST["Vente"] : "";

    
    $database = "Swimming_Pool";

    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found = mysqli_select_db($db_handle, $database);
    $bug = false;
    if (isset($_POST["gogo"])){
        if ($db_found) {
                    $IDVendeur=$_SESSION['IDVendeur'];
                    $sql = "INSERT INTO Article (Nom,Photo,Discrib,Video,Categorie,Vente,Prix,IDVendeur,Valider,IDPanier) VALUES ('$Nom','$Photo','$Discrib','$Video','$Categorie','$Vente','$Prix','$IDVendeur','0','0')";
                    $result = mysqli_query($db_handle, $sql);
                    echo "<div STYLE='text-align:center; margin-top: 30px; margin-bottom: 30px;' >Votre Article vient d'être soumit à la validation par l'administrateur.<br><br>";
                    echo "Vous le verrez apparaitre dans votre onglet Vos Produits En Vente lorsqu'il aura été validé.</div>";
                    
                }
        else{echo"Database not found";}
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
