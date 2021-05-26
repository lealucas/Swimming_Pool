<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesInscription.css" >
    <title>Document</title>
</head>
<body>
    <div id="wrapper">
        <!-- Header -->
        <div id="header">
                <div id="barreheader">
                    Bienvenue : (Identifiant)
                    <a href="" class="lienh" STYLE="padding:0 0 0 790px">Admin</a> |
                    <a href="inscription.html" class="lienh">S'inscrire</a> | 
                    <a href="votreCompte.html" class="lienh">Mon compte</a> | 
                    <a href="connexion.php" class="lienh">Se connecter</a>
                </div>
        </div>

        <!-- Menu de navigation -->
        <div id="nav">
            <h1>ECE MarketPlace</h1>
            
            <ul id="menuNav">
                Recherche : <input type="text" name="" id="" placeholder="Tapez un nom d'article...">
                <a href="index.php" class="lienn">Accueil</a>
                <a href="toutParcourir.html" class="lienn">Tout Parcourir</a>
                <a href="Notifications.html" class="lienn">Notifications</a>
                <a href="Panier.html" class="lienn">Panier</a>
                <a href="connexion.php" class="lienn">Votre Compte</a>
            </ul>
        </div>


        <div id="section">
            <div id="position">
                <p id="position_texte">Affichage de la position dans les pages</p>
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