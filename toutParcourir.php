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
                    <a href="deconnexion.php" class="lienh" STYLE="margin-left:1080px">Se déconnecter</a>
                </div>
        </div>




        <div id="nav">
            <h1>ECE MarketPlace</h1>
            
            <ul id="menuNav">
                Recherche : <input type="text" name="" id="" placeholder="Tapez un nom d'article...">

                <a href="index_session.php" class="lienn">Accueil</a>
                <a href="#" class="lienn" STYLE="text-decoration: underline">Tout Parcourir</a>
                <a href="Notifications.php" class="lienn">Notifications</a>
                <a href="Panier.php" class="lienn">Panier</a>
                <?php if ($_SESSION['Prenom'] == "Admin") {
                    echo"<a href=\"gestion.php\" class=\"lienn\">Gestion</a>";
                }
                else{echo "<a href=\"compte_vendeur.php\" class=\"lienn\">Votre Compte</a>";} 
                ?>
            </ul>
        </div>




        <div id="section">

            <div id="categorie">
                <div class="title">
                    <p>Nos Catégories de produits</p>
                </div>


                <div id="content">
                    <ul id="choixliste">
                        <a href="Art_session.php" class="lienc">Meubles et Objets D'art</a><br><br><br>
                        <a href="Accessoires_VIP_session.php" class="lienc">Accessoires VIP</a><br><br><br>
                        <a href="scolaire_session.php" class="lienc">Matériels Scolaires</a>
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