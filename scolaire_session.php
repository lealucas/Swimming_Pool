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
                            echo"<img src='$pdp' width='20px' style = 'border-radius: 40%'>";
                        }else {echo "Database not found";}
                        ?>
                    <a href="deconnexion.php" class="lienh" STYLE="margin-left:1080px">Se déconnecter</a>
                </div>
        </div>




        <div id="nav">
            <h1>ECE MarketPlace</h1>
            
            <ul id="menuNav">
                Recherche : <input type="text" name="" id="" placeholder="Tapez un nom d'article...">
                <?php if ($_SESSION['Prenom'] == "Admin") {
                    echo"<a href=\"\" class=\"lienn\">Gestion</a>";
                } ?>
                <a href="index_session.php" class="lienn">Accueil</a>
                <a href="#" class="lienn"STYLE="text-decoration: underline">Tout Parcourir</a>
                <a href="Notifications.php" class="lienn">Notifications</a>
                <?php
                    if($_SESSION['IDClient']==0){
                        echo"<a href=\"nego_enchere.php\" class=\"lienn\">Négociations/Enchères</a>";
                    }
                    else{
                        echo"<a href=\"Panier.php\" class=\"lienn\">Panier</a>";
                    }
                    
                ?>
                <a href="compte_vendeur.php" class="lienn">Votre Compte</a>
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
                        <a href="Scolaire_session.php" class="lienc" STYLE="text-decoration: underline">Matériels Scolaires</a>
                    </ul>
                </div>
            </div>


            <div id="result">
                <div class="title">
                    <p>Résultat du filtre : </p> 
                </div>
                <div>
                <?php

                    echo"<link rel=\"stylesheet\" href=\"stylesToutParcourir.css\">";
                    echo"<meta charset='UTF-8'>";

                    $database = "Swimming_Pool";

                    $db_handle = mysqli_connect('localhost', 'root', 'root');
                    $db_found = mysqli_select_db($db_handle, $database);


                    if ($db_found) {
                        $sql = "SELECT * FROM Article WHERE Categorie LIKE 'Scolaire' AND Valider = '1'";
                        $result = mysqli_query($db_handle, $sql);

                        if (mysqli_num_rows($result) == 0) {
                            echo "Pas d'article dans cette catégorie <br>";
                        } else {
                            while ($data = mysqli_fetch_assoc($result)) {
                                $image = $data['Photo'];
                                if($data['Vente']=='Direct'){
                                    echo "<div class=\"cadre\"><img class=\"objet\" src='$image' width='200px'>";
                                    echo"<p class=\"describ\"> ".$data['Nom']."<br>".$data['Discrib']."<br>Prix : ".$data['Prix']."€<br>Vente par : ".$data['Vente'];
                                    echo "<br>";
                                    echo"<a href=\"Panier.php?IDArticle=".$data['IDArticle']."\">Ajouter au panier</a>";
                                    echo"</div>";
                                }
                                elseif($data['Vente']=='Enchere'){
                                    echo "<div class=\"cadre\"><img class=\"objet\" src='$image' width='200px'>";
                                    echo"<p class=\"describ\"> ".$data['Nom']."<br>".$data['Discrib']."<br>Prix : ".$data['Prix']."€<br>Vente par : ".$data['Vente'];
                                    echo "<br>";
                                    echo"<a href=\"enchere_client.php?IDArticle=".$data['IDArticle']."\">Ajouter au panier</a>";
                                    echo"</div>";
                                }
                                elseif($data['Vente']=='Nego'){
                                    echo "<div class=\"cadre\"><img class=\"objet\" src='$image' width='200px'>";
                                    echo"<p class=\"describ\"> ".$data['Nom']."<br>".$data['Discrib']."<br>Prix : ".$data['Prix']."€<br>Vente par : ".$data['Vente'];
                                    echo "<br>";
                                    echo"<a href=\"nego_client.php?IDArticle=".$data['IDArticle']."\">Ajouter au panier</a>";
                                    echo"</div>";
                                }
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





        <footer>
            <small>
                Copyright &copy; 2021, Sezille_Lucas_-_Industry <br>
                <a href="mailto:sezille_lucas@gmail.com">sezille_lucas@gmail.com</a>
            </small>
        </footer>
    </div>
</body>
</html>