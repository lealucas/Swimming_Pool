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
                <a href="#" class="lienn">Votre Compte</a>
            </ul>
        </div>


        <div id="section">
            <div id="position">
            <a href="informations.php" class="lienC">Informations</a>
            <a href="echange_vendeur.php" class="lienC">Vos échanges vendeur</a>
            </div>
            
            <div id="formulaire">
            <form action="formulaire_info.php" method="post">
            <?php
                echo "<meta charset=\"utf-8\">";
                echo "<link rel=\"stylesheet\" type=\"text/css\" >";

                $database = "Swimming_Pool";

                $db_handle = mysqli_connect('localhost', 'root', 'root');
                $db_found = mysqli_select_db($db_handle, $database);
                $bug = false;
                if ($db_found) {
                    $IDClient =$_SESSION['IDClient'];
                    $sql = "SELECT * FROM Client WHERE IDClient LIKE '%$IDClient%'";
                    $result = mysqli_query($db_handle,$sql);
                    $number=mysqli_num_rows($result);
                    $data = mysqli_fetch_assoc($result);
                    echo"Les informations suivantes ont bien été enregistrées : <br>";
                        echo "<table border='3'>";
                            echo"<td colspan='2' align='center'>";
                                echo"| Information Personnelles |";
                            echo"</td>";
                            echo "<tr>";
                                echo "<td>" . "Nom : " . "</td>";
                                echo "<td>" . $data['Nom'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td>" . "Prenom : " . "</td>";
                                echo "<td>" . $data['Prenom'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td>" . "Adresse : " . "</td>";
                                echo "<td>" . $data['Adresse'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td>" . "Ville : " . "</td>";
                                echo "<td>" . $data['Ville'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td>" . "Code Postal : " . "</td>";
                                echo "<td>" . $data['CodePostal'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td>" . "Pays : " . "</td>";
                                echo "<td>" . $data['Pays'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td>" . "Téléphone" . "</td>";
                                echo "<td>" . $data['Tel'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td>" . "Date de naissance : " . "</td>";
                                echo "<td>" . $data['Birthday'] . "</td>";
                            echo "</tr>";
                            echo"<td colspan=\"2\" align=\"center\">";
                                echo"| Information bancaires|";
                            echo"</td>";
                            echo "<tr>";
                                echo "<td>" . "Carte : " . "</td>";
                                echo "<td>" . $data['Carte'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td>" . "Numéros de carte : " . "</td>";
                                echo "<td>" . "*****************" . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td>" . "Date d'éxpiration" . "</td>";
                                echo "<td>" . $data['DateExp'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td>" . "Pictogramme : " . "</td>";
                                echo "<td>" . "************" . "</td>";
                            echo "</tr>";
                            echo"<td colspan=\"2\" align=\"center\">";
                                echo"| Information Personnelles |";
                            echo"</td>";
                            echo "<tr>";
                                echo "<td>" . "E-mail : " . "</td>";
                                echo "<td>" . $data['email'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td>" . "Mot de passe : " . "</td>";
                                echo "<td>" . "*************" . "</td>";
                            echo "</tr>";
                            echo"<td colspan=\"2\" align=\"center\"><input type=\"submit\" name=\"goo\" value=\"Modifier vos données\"></td>";
                        echo"</table>";

                }
                else{echo "Database not found";}

                mysqli_close($db_handle);

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