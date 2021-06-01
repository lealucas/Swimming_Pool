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
                <?php if ($_SESSION['Prenom'] == "Admin") {
                    echo"<a href=\"gestion.php\" class=\"lienn\" STYLE=\"text-decoration: underline\">Gestion</a>";
                }
                else{echo "<a href=\"compte_vendeur.php\" class=\"lienn\">Votre Compte</a>";} 
                ?>
            </form>
            </ul>
        </div>


        <div id="section">
            <div id="position">
                <a href="gestion_vendeur.php" class="lienC">Gestion des vendeurs</a>
                <a href="gestion_articles.php" class="lienC" STYLE="text-decoration: underline">Gestion des articles</a>
            </div>

            <div id="formulaire">
                <div class="title"><p>Voici les articles en attente d'ajout : </p></div>
                <form action="traitement_gestion_article.php" method="post">
                    <?php
                        $database = "Swimming_Pool";
                        echo"<link rel=\"stylesheet\" href=\"stylesCompteVendeur.css\" >";

                        $db_handle = mysqli_connect('localhost', 'root', 'root');
                        $db_found = mysqli_select_db($db_handle, $database);
                      
                        if ($db_found) {
                            $sql = "SELECT * FROM Article WHERE Valider ='0' LIMIT 1";
                            $result = mysqli_query($db_handle, $sql);

                            while ($data = mysqli_fetch_assoc($result)) { 
                                echo"<div class='liste'>";
                                echo"<ul>";
                                    echo"<li class='vert'>ID : </li>";
                                    echo"<li>".$data['IDArticle']."</li>";
                                echo"</ul>";
                                echo"<ul>";
                                    echo"<li class='vert'>Nom : </li>";
                                    echo"<li>".$data['Nom']."</li>";
                                echo"</ul>";
                                echo"<ul>";
                                    echo"<div class='vert'><li>Photo : </li>";
                                    echo"<li><img src=".$data['Photo']." width='30px'></li></div>";
                                echo"</ul>";
                                echo"<ul>";
                                    echo"<li class='vert'>Description : </li>";
                                    echo"<li>".$data['Discrib'] ."</li>";
                                echo"</ul>";
                                echo"<ul>";
                                    echo"<li class='vert'>Catégorie : </li>";
                                    echo"<li>".$data['Categorie']."</li>";
                                echo"</ul>";
                                echo"<ul>";
                                    echo"<li class='vert'>Mode de vente : </li>";
                                    echo"<li>".$data['Vente']."</li>";
                                echo"</ul>";
                                echo"<ul>";
                                    echo"<li class='vert'>Prix : </li>";
                                    echo"<li>".$data['Prix']."</li>";
                                echo"</ul>";
                                echo"<ul>";
                                    echo"<li><td colspan=\"2\" align=\"center\"><input type=\"submit\" name=\"goo\" value=\"Valider\"></td></li>";
                                    echo"<li><td colspan=\"2\" align=\"center\"><input type=\"submit\" name=\"noo\" value=\"Supprimer\"></td></li>";
                                echo"</ul>";
                                echo"</div>";
                               
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
                Copyright &copy; 2021, Sezille_Lucas_-_Industry <br>
                <a href="mailto:sezille_lucas@gmail.com">sezille_lucas@gmail.com</a><br>
                37 quai de Grenelle, 75015 Paris <br>
            </small>
        </footer>
    </div>
</body>
</html>