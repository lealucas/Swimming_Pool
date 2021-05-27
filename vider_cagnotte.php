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
                <a href="compte_vendeur.php" class="lienn">Votre Compte</a>
            </ul>
        </div>


        <div id="section">
            <div id="position">
                <a href="produits_vente.php" class="lienC">Vos Produits en vente</a>
                <a href="mettre_vente.php" class="lienC">Mettre en vente un produit</a>
                <a href="produits_attentes.php" class="lienC">Vos produits en attente</a>
                <a href="cagnotte.php" class="lienC">Votre cagnotte</a>
                <a href="vidercagnotte.php" class="lienC">Vider votre cagnotte <img src="img/caddy.png" width="22px"></a>
            </div>

            <div id="formulaire">
                <div class="title"><p>Etes-vous sur de vouloir vider votre cagnotte sur votre compte personnel ? </p></div>
                <form action="traitement_vider_cagnotte.php" method="post">
                    <table>
                            <td rowspan="3">Réponse :</td>
                        </tr>
                        <tr><td><input type="radio" name="Reponse" value="0" required id="">Oui</td></tr>
                        <tr><td><input type="radio" name="Reponse" value="1" required id="">Non</td></tr>
                        
                        <td colspan="2" align="center"><input type="submit" name="goo" value="Valider"></td>
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