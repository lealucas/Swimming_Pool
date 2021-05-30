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
                            echo"<img src='$pdp' width='40px' style = 'border-radius: 40%'>";
                        }else {echo "Database not found";}
                        ?>
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
                <?php if ($_SESSION['Prenom'] == "Admin") {
                    echo"<a href=\"gestion.php\" class=\"lienn\">Gestion</a>";
                }
                else{echo "<a href=\"compte_vendeur.php\" class=\"lienn\" STYLE=\"text-decoration: underline\">Votre Compte</a>";} 
                ?>
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
                <div class="title"><p>Que voulez-vous mettre en vente ? </p></div>
                <form action="traitement_mise_vente.php" method="post">
                    <table border="2">

                        <tr>
                            <td>Titre du produit : </td>
                            <td><input type="text" name="Nom" required  id=""></td>
                        </tr>
                        <tr>
                            <td>Lien de la photo : </td>
                            <td><input type="text" name="Photo" required  id=""></td>
                        </tr>
                        <tr>
                            <td>Description : </td>
                            <td><input type="text" name="Discrib" required  id=""></td>
                        </tr>
                        <tr>
                            <td>Vidéo : </td>
                            <td><input type="text" name="Video" required  id=""></td>
                        </tr>
                        <tr>
                            <td rowspan="4">Catégorie :</td>
                        </tr>
                        <tr><td><input type="radio" name="Categorie" value="Art" required id=""> Meubles et Objets d'Art</td></tr>
                        <tr><td><input type="radio" name="Categorie" value="VIP" required id="">Accessoires VIP</td></tr>
                        <tr><td><input type="radio" name="Categorie" value="Scolaire" required id="">Matériels Scolaires</td></tr>
                        <tr>
                            <td rowspan="4">Type de vente :</td>
                        </tr>
                        <tr><td><input type="radio" name="Vente" value="Enchere" required id="">Enchères</td></tr>
                        <tr><td><input type="radio" name="Vente" value="Direct" required id="">Vente Direct</td></tr>
                        <tr><td><input type="radio" name="Vente" value="Nego" required id="">Négociation</td></tr>
                        <tr>
                            <td>Prix : </td>
                            <td><input type="text" name="Prix" required  id=""></td>
                        </tr>
                        <td colspan="2" align="center"><input type="submit" name="gogo" value="Soumettre à vérification"></td>
                    </table>
                </form>
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