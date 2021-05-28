<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesAccueil.css" >
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
                <a href="#" class="lienn">Accueil</a>
                <a href="toutParcourir.php" class="lienn">Tout Parcourir</a>
                <a href="Notifications.php" class="lienn">Notifications</a>
                <a href="Panier.php" class="lienn">Panier</a>
                <a href="compte_vendeur.php" class="lienn">Votre Compte</a>
                <!-- mettre un if pour accéder a compte_client.php
                     et else emmene sur compte_vendeur.php
                     tester avec variable $_SESSION['de quelque chose'] -->
            </ul>
        </div>



        <div id="section">
            <div id="position">
                <p class="position_texte">Bienvenue sur notre site ECE Market Place. Nous vous souhaitons un agréable moment sur notre site en éspérant que vous trouverez votre bonheur à travers notre large gamme de produit.</p> <br>
                <p class="position_texte">Et n'oubliez pas de créer votre compte pour bénéficiez d'une offre irrésistible le jour de votre anniversaire</p>
            </div>

            <!-- Selection Journalière -->
            <form action="daySelection.php" method="post"></form>
            <div id="daySelection">
                <div class="title">
                    <p>Notre Sélection De Produits Quotidienne</p>
                </div>
                <div class="zoomcolonne">
                    <?php
                        echo"<link rel=\"stylesheet\" href=\"stylesAccueil.css\" >";
                        $database = "Swimming_Pool";

                        $db_handle = mysqli_connect('localhost', 'root', 'root');
                        $db_found = mysqli_select_db($db_handle, $database);
                        if ($db_found) {
                            $sql = "SELECT * FROM Article WHERE Valider='1' ORDER BY IDArticle DESC LIMIT 5 ";
                            $result = mysqli_query($db_handle, $sql);
                            while ($data = mysqli_fetch_assoc($result)) { 
                                $image = $data['Photo'];
                                echo"<img src='$image' width='180px'>";
                            }
                        }else {echo "Database not found";}
                        mysqli_close($db_handle);
                    ?>
                </div>
            </div>

            <!-- Les bests Sellers -->
            <div id="bestSellers">
                <div class="title">
                    <p>Les Best Sellers de cette Semaine</p>
                </div>
                <div class="content">

                </div>
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