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

        <!-- Menu de navigation -->
        <div id="nav">
            <h1>ECE MarketPlace</h1>
            
            <ul id="menuNav">
            <form action="traitement_recherche.php" method="post">
                    Recherche : <input type="text" name="recherche" id="" placeholder="Tapez un nom d'article...">
                <a href="index_session.php" class="lienn">Accueil</a>
                <a href="toutParcourir.php" class="lienn">Tout Parcourir</a>
                <a href="Notifications.php" class="lienn">Notifications</a>
                <?php
                    if($_SESSION['IDClient']==0){
                        echo"<a href=\"nego_enchere.php\" class=\"lienn\">Négociations/Enchères</a>";
                    }
                    else{
                        echo"<a href=\"Panier.php\" class=\"lienn\">Panier</a>";
                    }
                    
                ?>
                <?php if ($_SESSION['Prenom'] == "Admin") {
                    echo"<a href=\"gestion.php\" class=\"lienn\">Gestion</a>";
                }
                else{echo "<a href=\"compte_vendeur.php\" class=\"lienn\">Votre Compte</a>";} 
                ?>
            </form>
            </ul>
        </div>


        <div id="section">
            <div id="position">
                <a href="traitement_gestion_vendeur.php" class="lienC">Gestion des vendeurs</a>
                <a href="traitement_gestion_article.php" class="lienC">Gestion des articles</a>
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

                        $Valider=isset($_POST["Reponse"])? $_POST["Reponse"] : "";
                        
                        if($_POST['goo']){
                            if ($db_found) {
                                $sql = "UPDATE Vendeur SET Valider ='1' WHERE Valider ='0' LIMIT 1 ";
                                $result = mysqli_query($db_handle, $sql);
                                    echo"<div STYLE='text-align:center; margin-top: 30px; margin-bottom: 30px;' >Le vendeur a bien été ajouté.";
                                    echo"</div>";
                            }
                            else{echo "Databse not found";}
                        }
                        elseif($_POST['noo']){
                            if ($db_found) {
                                $sql = "DELETE FROM Vendeur WHERE Valider ='0'LIMIT 1";
                                $result = mysqli_query($db_handle, $sql);

                                    echo"<div STYLE='text-align:center; margin-top: 30px; margin-bottom: 30px;' >Le vendeur a bien été supprimé.</div>";
                            }
                            else{echo "Databse not found";}
                        }
                    
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