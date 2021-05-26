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
                    <a href="votreCompte.html" class="lienh" STYLE="padding:0 0 0 900px">Mon compte</a> | 
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
                        <a href="Art_session.php" class="lienc">Meubles et Objets D'art</a><br><br><br>
                        <a href="Accessoires_VIP_session.php" class="lienc">Accessoires VIP</a><br><br><br>
                        <a href="Scolaire_session.php" class="lienc">Matériels Scolaires</a>
                    </ul>
                </div>
            </div>


            <div id="result">
                <div class="title">
                    <p>Résultat du filtre : </p> 
                </div>
                <div>
                <?php

                    $database = "Swimming_Pool";

                    $db_handle = mysqli_connect('localhost', 'root', 'root');
                    $db_found = mysqli_select_db($db_handle, $database);


                    if ($db_found) {
                        $sql = "SELECT * FROM Article WHERE Categorie LIKE 'Art'";
                        $result = mysqli_query($db_handle, $sql);

                        if (mysqli_num_rows($result) == 0) {
                            echo "Pas d'article dans cette catégorie <br>";
                        } else {
                            echo "<table border='1'><tr><th>Nom</th><th>Description</th><th>Photo</th><th>Prix en €</th>";
                            echo "</tr>";
            
                            while ($data = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $data['Nom'] . "</td>";
                                echo "<td>" . $data['Description'] . "</td>";
                                $image = $data['Photo'];
                                echo "<td>" . "<img src='/img/$image' height='120' width='200' >" ."</td>";
                                echo "<td>". $data['Prix']. "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        }
                    } else {
                        echo "Database not found. <br>";
                    }
                mysqli_close($db_handle);
                ?>
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