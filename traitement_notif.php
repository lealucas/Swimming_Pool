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
                    <a href="admin.php" class="lienh" STYLE="margin-left:1080px">Admin</a> |
                    <a href="inscription.html" class="lienh">S'inscrire</a> | 
                    <a href="connexion.php" class="lienh">Se connecter</a>
                </div>
        </div>


        <!-- Menu de navigation -->
        <div id="nav">
            <h1>ECE MarketPlace</h1>
            
            <ul id="menuNav">
            <form action="traitement_recherche.php" method="post">
                    Recherche : <input type="text" name="recherche" id="" placeholder="Tapez un nom d'article...">
                <a href="index.php" class="lienn">Accueil</a>
                <a href="toutParcourir.html" class="lienn">Tout Parcourir</a>
                <a href="#" class="lienn" STYLE="text-decoration: underline">Notifications</a>
                <a href="Panier.php" class="lienn">Panier</a>
                <?php if ($_SESSION['Prenom'] == "Admin") {
                    echo"<a href=\"gestion.php\" class=\"lienn\">Gestion</a>";
                }
                else{echo "<a href=\"votreCompte.html\" class=\"lienn\">Votre Compte</a>";} 
                ?>
            </form>
            </ul>
        </div>

        <div id="section">
            <div id="categorie">
                <div class="title">
                    <p>Nos Catégories de produits</p>
                </div>
                <form action="traitement_notif.php" method="post">
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
                    echo"<link rel=\"stylesheet\" href=\"stylesNotif.css\">";
                    echo"<meta charset='UTF-8'>";
                    $database = "Swimming_Pool";

                    $db_handle = mysqli_connect('localhost', 'root', 'root');
                    $db_found = mysqli_select_db($db_handle, $database);
                    $prixMin = isset($_POST["prixMin"])? $_POST["prixMin"] : "";
                    $prixMax = isset($_POST["prixMax"])? $_POST["prixMax"] : "";
                    $typeProduit = isset($_POST["typeProduit"])? $_POST["typeProduit"] : "";
                    $video = isset($_POST["video"])? $_POST["video"] : "";

                    if ($db_found) {
                        if($_POST['oui']){
                            $sql = "SELECT * FROM Article WHERE Prix <= '$prixMax' AND Prix >= '$prixMin'";
                            if($typeProduit !=""){
                                $sql .= "AND Categorie LIKE '$typeProduit'";
                            }

                            $result = mysqli_query($db_handle, $sql);

                            if (mysqli_num_rows($result) == 0) {
                                echo "Pas d'article dans cette catégorie <br>";
                                echo "Vous serez notifiés lorsqu'un produit correspondant à vos attente sera mis en vente :)";
                            } else {
                                while ($data = mysqli_fetch_assoc($result)) {
                                    $image = $data['Photo'];
                                    echo "<div class=\"cadre\"><img class=\"objet\" src='$image' width='200px'>";
                                    echo"<p class=\"describ\"> ".$data['Nom']."<br>".$data['Discrib']."<br>Prix : ".$data['Prix']."€<br>Vente par : ".$data['Vente'];
                                    echo "<br>";
                                    echo"<a href=\"Panier.html\">Ajouter au panier</a>";
                                    echo"</div>";
                                }
                            }
                        } 
                    }
                    else {
                        echo "Database not found. <br>";
                    }
                    mysqli_close($db_handle);
                    ?>
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
