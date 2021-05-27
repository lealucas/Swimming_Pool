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
                    <a href="" class="lienh" STYLE="padding:0 0 0 980px">Admin</a> |
                    <a href="inscription.html" class="lienh">S'inscrire</a> | 
                    <a href="votrecompte.html" class="lienh">Mon compte</a> | 
                    <a href="connexion.php" class="lienh">Se connecter</a>
                </div>
        </div>



        <!-- Menu de navigation -->
        <div id="nav">
            <h1>ECE MarketPlace</h1>
            
            <ul id="menuNav">
                Recherche : <input type="text" name="" id="" placeholder="Tapez un nom d'article...">
                <a href="#" class="lienn">Accueil</a>
                <a href="toutParcourir.html" class="lienn">Tout Parcourir</a>
                <a href="Notifications.html" class="lienn">Notifications</a>
                <a href="Panier.html" class="lienn">Panier</a>
                <a href="votreCompte.html" class="lienn">Votre Compte</a>
            </ul>
        </div>



        <div id="section">
            <div id="position">
                <p class="position_texte">Bienvenue sur notre site ECE Market Place. Nous vous souhaitons un agréable moment sur notre site en éspérant que vous trouverez votre bonheur à travers notre large gamme de produit.</p> <br>
                <p class="position_texte">Et n'oubliez pas de créer votre compte pour bénéficiez d'une offre irrésistible le jour de votre anniversaire</p>
            </div>

            <!-- Selection Journalière -->
            <div id="daySelection">
                <div class="title">
                    <h3>Notre Sélection De Produits Hebdomadaire</h3>
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
                    <h3>Les Best Sellers</h3>
                </div>
                <div class="slider">
                    <div class="slides">
                        <div class="slide"></div>

                    </div>

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