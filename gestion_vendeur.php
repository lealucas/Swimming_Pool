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
                <a href="Panier.php" class="lienn">Panier</a>
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
                <a href="#" class="lienC" STYLE="text-decoration: underline">Gestion des vendeurs</a>
                <a href="gestion_article.php" class="lienC">Gestion des articles</a>
            </div>

            <div id="formulaire">
                <div class="title"><p>Voici les vendeurs en attente : </p></div>
                <form action="traitement_gestion_vendeur.php" method="post">
                    <?php
                        $database = "Swimming_Pool";

                        $db_handle = mysqli_connect('localhost', 'root', 'root');
                        $db_found = mysqli_select_db($db_handle, $database);
                      
                        if ($db_found) {
                            $sql = "SELECT * FROM Vendeur WHERE Valider ='0' LIMIT 1";
                            $result = mysqli_query($db_handle, $sql);

                            
                            while ($data = mysqli_fetch_assoc($result)) { 
                                echo"<div class='liste'>";
                                echo"<ul>";
                                    echo"<li class='vert'>ID : </li>";
                                    echo"<li>".$data['IDVendeur']."</li>";
                                echo"</ul>";
                                echo"<ul>";
                                    echo"<li class='vert'>Nom : </li>";
                                    echo"<li>".$data['Nom']."</li>";
                                echo"</ul>";
                                echo"<ul>";
                                    echo"<li class='vert'>Prenom : </li>";
                                    echo"<li>".$data['Prenom']."</li>";
                                echo"</ul>";
                                echo"<ul>";
                                    echo"<li class='vert'>Adresse : </li>";
                                    echo"<li>".$data['Adresse'] ."</li>";
                                echo"</ul>";
                                echo"<ul>";
                                    echo"<li class='vert'>Code Postal : </li>";
                                    echo"<li>".$data['CodePostal']."</li>";
                                echo"</ul>";
                                echo"<ul>";
                                    echo"<li class='vert'>Tel : </li>";
                                    echo"<li>".$data['Tel']."</li>";
                                echo"</ul>";
                                echo"<ul>";
                                    echo"<li class='vert'>email : </li>";
                                    echo"<li>".$data['email']."</li>";
                                echo"</ul>";
                                echo"<ul>";
                                    echo"<li><td colspan=\"2\" align=\"center\"><input type=\"submit\" name=\"goo\" value=\"Valider\"></td></li>";
                                    echo"<li><td colspan=\"2\" align=\"center\"><input type=\"submit\" name=\"noo\" value=\"Supprimer\"></td></li>";
                                echo"</ul>";
                                echo"</div>";
                                /*echo"<table>";
                                echo "<td>" . "ID : " . "</td>";
                                echo "<td>" . $data['IDClient'] . "</td>";
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
                                echo"<td colspan=\"2\" align=\"center\"><input type=\"submit\" name=\"noo\" value=\"Supprimer\"></td>";*/
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