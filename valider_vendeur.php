<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesCompteVendeur.css" >
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
                <a href="index_session.php" class="lienn">Accueil</a>
                <a href="toutParcourir.php" class="lienn">Tout Parcourir</a>
                <a href="Notifications.php" class="lienn">Notifications</a>
                <a href="Panier.php" class="lienn">Panier</a>
                <a href="compte_vendeur.php" class="lienn">Votre Compte</a>
            </ul>
        </div>


        <div id="section">
            <div id="position">
                <a href="#" class="lienC">Gestion des vendeurs</a>
                <a href="produits_attentes.php" class="lienC">Valider des articles</a>
                <a href="cagnotte.php" class="lienC">????????</a>
                <a href="vider_cagnotte.php" class="lienC">???????<img src="img/caddy.png" width="22px"></a>
            </div>

            <div id="formulaire">
                <div class="title"><p>Voulez-vous ajouter ces vendeurs? </p></div>
                <form action="traitement_valider_vendeur.php" method="post">
                    <?php
                        $database = "Swimming_Pool";

                        $db_handle = mysqli_connect('localhost', 'root', 'root');
                        $db_found = mysqli_select_db($db_handle, $database);
                      
                        if ($db_found) {
                            $sql = "SELECT * FROM Vendeur WHERE Valider ='0' LIMIT 1";
                            $result = mysqli_query($db_handle, $sql);

                            
                            while ($data = mysqli_fetch_assoc($result)) { 
                                echo"<table>";
                                echo "<td>" . "ID : " . "</td>";
                                echo "<td>" . $data['ID'] . "</td>";
                                echo "<td>" . "Nom : " . "</td>";
                                echo "<td>" . $data['Nom'] . "</td>";
                                echo "<td>" . "Prenom : " . "</td>";
                                echo "<td>" . $data['Prenom'] . "</td>";
                                echo "<td>" . "Adresse : " . "</td>";
                                echo "<td>" . $data['Adresse'] . "</td>";
                                echo "<td>" . "Code Postal : " . "</td>";
                                echo "<td>" . $data['CodePostal'] . "</td>";
                                echo "<td>" . "Tel : " . "</td>";
                                echo "<td>" . $data['Tel'] . "</td>";
                                echo "<td>" . "email : " . "</td>";
                                echo "<td>" . $data['email'] . "</td>";
                                echo"<td colspan=\"2\" align=\"center\"><input type=\"submit\" name=\"goo\" value=\"Valider\"></td>";
                                echo"<td colspan=\"2\" align=\"center\"><input type=\"submit\" name=\"noo\" value=\"Supprimer\"></td>";
                            }
                            echo"</table>";
                        }
                        else{echo "Databse not found";}

                    ?>
                </form>
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