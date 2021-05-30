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
                            echo"<img src='$pdp' width='20px' style = 'border-radius: 50%'>";
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
                <a href="#" class="lienn" STYLE="text-decoration: underline">Accueil</a>
                <a href="toutParcourir.php" class="lienn">Tout Parcourir</a>
                <a href="Notifications.php" class="lienn">Notifications</a>
                <a href="Panier.php" class="lienn">Panier</a>
                <?php if ($_SESSION['Prenom'] == "Admin") {
                    echo"<a href=\"gestion.php\" class=\"lienn\">Gestion</a>";
                }
                else{echo "<a href=\"compte_vendeur.php\" class=\"lienn\">Votre Compte</a>";} 
                $database = "Swimming_Pool";

                        $db_handle = mysqli_connect('localhost', 'root', 'root');
                        $db_found = mysqli_select_db($db_handle, $database);
                        if ($db_found) {
                            $Prenom = $_SESSION['Prenom'];
                            $sql = "SELECT * FROM Vendeur WHERE Prenom = '$Prenom'";
                            $result = mysqli_query($db_handle, $sql);
                            $data = mysqli_fetch_assoc($result);
                            $pdp = $data['PdP'];
                            echo"<img src='$pdp' width='40px' style = 'border-radius: 50%'>";
                        }else {echo "Database not found";}
                ?>
            </ul>
        </div>



        <div id="section">
            <div id="position">
                <p class="position_texte">Bienvenue sur notre site ECE Market Place. Nous vous souhaitons un agréable moment sur notre site en espérant que vous trouverez votre bonheur à travers notre large gamme de produit.</p> <br>
                <p class="position_texte">Et n'oubliez pas de créer votre compte pour bénéficier d'une offre irrésistible le jour de votre anniversaire !</p>
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
                                echo"<img src='$image' width='180px' height='180px'>";
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
                <div class="zoomcolonne">
                <img src='http://cdn.shopify.com/s/files/1/0271/8977/2359/products/product-image-1356634821_1200x1200.jpg?v=1606166948' width='180px' height='180px'>
                <img src='https://www.sportbuzzbusiness.fr/wp-content/uploads/2017/11/ballon-officiel-coupe-du-monde-russie-2018-adidas-telsar-e1510757114687.jpg' width='180px' height='180px'>
                <img src='https://www.jet-prive.fr/wp-content/uploads/2015/09/prix-location-avion-prive.jpg' width='180px' height='180px'>
                <img src='https://france3-regions.francetvinfo.fr/image/LkelTBwWWBZL124arYg9GuC-iUA/1200x1200/regions/2020/08/17/5f3a5526eb0fb_menton_photographe_chasseur_de_yacht-00_00_16_14-4964868.jpg' width='180px' height='180px'>
                <img src='https://www.rapid-cadeau.com/10377-thickbox_default/balancier-de-newton-deluxe.jpg' width='180px' height='180px'>
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