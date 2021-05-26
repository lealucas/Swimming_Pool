<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesToutParcourir.css">
    <title>Document</title>
</head>
<body>

    <div id="wrapper">
        <div id="header">
                <div id="barreheader">
                    Bienvenue : <?php echo $_SESSION['Prenom']; ?>
                    <a href="votreCompte.html" class="lienh" STYLE="padding:0 0 0 890px">Mon compte</a> | 
                    <a href="connexion.php" class="lienh">Se déconnecter</a>
                </div>
        </div>




        <div id="nav">
            <h1>ECE MarketPlace</h1>
            
            <ul id="menuNav">
                Recherche : <input type="text" name="" id="" placeholder="Tapez un nom d'article...">
                <a href="index.php" class="lienn">Accueil</a>
                <a href="#" class="lienn">Tout Parcourir</a>
                <a href="Notifications.php" class="lienn">Notifications</a>
                <a href="Panier.php" class="lienn">Panier</a>
                <a href="votreCompte.php" class="lienn">Votre Compte</a>
            </ul>
        </div>




        <div id="section">


            <div id="position">
                <p id="position_texte">Affichage de la position dans les pages</p>
            </div>


            <div id="categorie">
                <div class="title">
                    <p>Nos Catégories de produits</p>
                </div>


                <div id="content">
                    <ul id="choixliste">
                        <a href="Art.php" class="lienc">Meubles et Objets D'art</a><br><br><br>
                        <a href="Accessoires_VIP.php" class="lienc">Accessoires VIP</a><br><br><br>
                        <a href="scolaire.php" class="lienc">Matériels Scolaires</a>
                    </ul>
                </div>
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