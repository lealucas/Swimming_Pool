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
                <a href="index.php" class="lienn">Accueil</a>
                <a href="toutParcourir.php" class="lienn">Tout Parcourir</a>
                <a href="Notifications.php" class="lienn">Notifications</a>
                <a href="Panier.php" class="lienn">Panier</a>
                <a href="compte_vendeur.php" class="lienn">Votre Compte</a>
            </ul>
        </div>


        <div id="section">
            <div id="position">
                <a href="informations.php" class="lienC">Informations</a>
                <a href="echange_vendeur.php" class="lienC">Vos échanges vendeur</a>
            </div>
            <div id="formulaire">
                <div class="title"><p>Formulaire d'inscription : </p></div>
                <form action="traitement_informations.php" method="post">
                    <table border="2">
                        <td colspan="2" align="center">| Informations Personnelles |</td>
                        
                        <tr>
                            <td>Nom : </td>
                            <td><input type="text" name="Nom" id=""></td>
                        </tr>
                        <tr>
                            <td>Prénom : </td>
                            <td><input type="text" name="Prenom" id=""></td>
                        </tr>
                        <tr>
                            <td>Adresse : </td>
                            <td><input type="text" name="Adresse" id=""></td>
                        </tr>
                        <tr>
                            <td>Ville : </td>
                            <td><input type="text" name="Ville" id=""></td>
                        </tr>
                        <tr>
                            <td>Code Postal : </td>
                            <td><input type="number" name="CodePostal" id=""></td>
                        </tr>
                        <tr>
                            <td>Pays : </td>
                            <td><input type="text" name="Pays" id=""></td>
                        </tr>
                        <tr>
                            <td>Téléphone : </td>
                            <td><input type="tel" name="Tel" id=""></td>
                        </tr>
                        <td colspan="2" align="center">| Informations Bancaires |</td>
                        <tr>
                            <td rowspan="5">Type de carte</td>
                        </tr>
                        <tr><td><input type="radio" name="Carte" value="Visa" id="">Visa <img src="img/Symbole-Visa.png" width="25px" alt=""></td></tr>
                        <tr><td><input type="radio" name="Carte" value="MasterCard" id="">MasterCard<img src="img/MasterCard_Logo.png" width="22px" alt=""></td></tr>
                        <tr><td><input type="radio" name="Carte" value="AmericanExpress" id="">American Express<img src="img/logo-amercian_express.png" width="18px" alt=""></td></tr>
                        <tr><td><input type="radio" name="Carte" value="Paypal" id="">Paypal<img src="img/Paypal-logo.jpg" width="24px" alt=""></td></tr>
                        <tr>
                            <td>Numéro de carte : </td>
                            <td><input type="number" name="NumCarte" id=""></td>
                        </tr>
                        <tr>
                            <td>Date d'expiration : </td>
                            <td><input type="date" name="DateExp" id=""></td>
                        </tr>
                        <tr>
                            <td>Pictogramme : </td>
                            <td><input type="number" name="Picto" id=""></td>
                        </tr>
                        <td colspan="2" align="center">| Informations du compte |</td>
                        
                        <tr>
                            <td>Mot de passe : </td>
                            <td><input type="password" name="Mdp" id=""></td>
                        </tr>
                        <td colspan="2" align="center"><input type="submit" name="modif" value="Modifier"></td>
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