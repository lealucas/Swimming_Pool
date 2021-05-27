<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesNotif.css">
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
                <a href="index_session.php" class="lienn">Accueil</a>
                <a href="toutParcourir.php" class="lienn">Tout Parcourir</a>
                <a href="#" class="lienn">Notifications</a>
                <a href="Panier.php" class="lienn">Panier</a>
                <a href="compte_vendeur.php" class="lienn">Votre Compte</a>
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
                <form action="traitement_notif_session.php" method="post">
                <div id="content">
                    <table>
                        <tr>
                            <td rowspan="3">Tranche de prix : </td>
                        </tr>
                        <tr><td> <input type="number" name="prixMin" id="" required placeholder="Prix Minimum...">€</td></tr>
                        <tr><td> <input type="number" name="prixMax" id="" required placeholder="Prix Maximum...">€</td></tr>
                        <tr>
                            <td rowspan="4">Catégorie : </td>
                        </tr>
                        <tr><td><input type="radio" name="typeProduit" value="Art" id="">Meubles et Objets d'Art</td></tr>
                        <tr><td><input type="radio" name="typeProduit" value="VIP" id="">Accessoires VIP</td></tr>
                        <tr><td><input type="radio" name="typeProduit" value="Scolaire" id="">Fournitures Scolaires</td></tr>
                        <tr>
                            <td rowspan="3">Vidéo : </td>
                        </tr>
                        <tr><td><input type="radio" name="video" value="oui" id="">Oui</td></tr>
                        <tr><td><input type="radio" name="video" value="non" id="">Non</td></tr>
                        <td colspan="2" align="center"><input type="submit" name="oui" value="Envoyer" ></td>
                    </table>
                    </form>
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
                    $prixMin = isset($_POST["prixMin"])? $_POST["prixMin"] : "";
                    $prixMax = isset($_POST["prixMax"])? $_POST["prixMax"] : "";
                    $typeProduit = isset($_POST["typeProduit"])? $_POST["typeProduit"] : "";
                    $video = isset($_POST["video"])? $_POST["video"] : "";

                    if ($db_found) {
                        if($_POST['oui']){
                            $sql = "SELECT * FROM Article WHERE Prix < '$prixMax' AND Prix > '$prixMin'";
                            if($typeProduit !=""){
                                $sql .= "AND Categorie LIKE '$typeProduit'";
                            }

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
                        }
                    } else {
                        echo "Database not found. <br>";
                    }       
                    mysqli_close($db_handle);
                ?>
                </div>
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
