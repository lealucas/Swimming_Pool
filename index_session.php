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
                    <a href="compte_vendeur.php" class="lienh" STYLE="padding:0 0 0 900px">Mon compte</a> | 
                    <a href="deconnexion.php" class="lienh">Se déconnecter</a>
                </div>
        </div>



        <!-- Menu de navigation -->
        <div id="nav">
            <h1>ECE MarketPlace</h1>
            
            <ul id="menuNav">
                Recherche : <input type="text" name="" id="" placeholder="Tapez un nom d'article...">
                <a href="#" class="lienn">Accueil</a>
                <a href="toutParcourir.php" class="lienn">Tout Parcourir</a>
                <a href="Notifications.php" class="lienn">Notifications</a>
                <a href="Panier.php" class="lienn">Panier</a>
                <a href="compte_vendeur.php" class="lienn">Votre Compte</a>
            </ul>
        </div>



        <div id="section">
            <div id="position">
                <p id="position_texte">Affichage de la position dans les pages</p>
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
                                echo"<img src='/img/$image' width='180px'>";
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