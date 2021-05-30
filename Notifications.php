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
                            echo"<img src='$pdp' width='30px' style = 'border-radius: 40%'>";
                        }else {echo "Database not found";}
                        ?>
                    <a href="deconnexion.php" class="lienh" STYLE="margin-left:1080px">Se déconnecter</a>
                </div>

        </div>
        <div id="nav">
            <h1>ECE MarketPlace</h1>
            
            <ul id="menuNav">
                Recherche : <input type="text" name="" id="" placeholder="Tapez un nom d'article...">

                <a href="index_session.php" class="lienn">Accueil</a>
                <a href="toutParcourir.php" class="lienn">Tout Parcourir</a>
                <a href="#" class="lienn" STYLE="text-decoration: underline">Notifications</a>
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
                    <form action="traitement_notif_session.php" method="post">
                    <table>
                        <tr>
                            <td rowspan="3">Tranche de prix : </td>
                        </tr>
                        <tr><td> <input type="number" name="prixMin" value ="0" id="" placeholder="Prix Minimum...">€</td></tr>
                        <tr><td> <input type="number" name="prixMax" value="999999999" id="" placeholder="Prix Maximum...">€</td></tr>
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