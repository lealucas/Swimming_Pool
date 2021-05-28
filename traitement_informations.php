<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesInscription.css">
    <title>Document</title>
</head>
<body>

    <div id="wrapper">
        <!-- Header -->
        <div id="header">
                <div id="barreheader">
                    <a href="admin.php" class="lienh" STYLE="padding:0 0 0 1080px">Admin</a> |
                    <a href="inscription.html" class="lienh">S'inscrire</a> | 
                    <a href="connexion.php" class="lienh">Se connecter</a>
                </div>
        </div>


        <!-- Menu de navigation -->
        <div id="nav">
            <h1>ECE MarketPlace</h1>
            
            <ul id="menuNav">
                Recherche : <input type="text" name="" id="" placeholder="Tapez un nom d'article...">
                <a href="index.php" class="lienn">Accueil</a>
                <a href="toutParcourir.html" class="lienn">Tout Parcourir</a>
                <a href="Notifications.html" class="lienn">Notifications</a>
                <a href="Panier.html" class="lienn">Panier</a>
                <?php if ($_SESSION['Prenom'] == "Admin") {
                    echo"<a href=\"gestion.php\" class=\"lienn\">Gestion</a>";
                }
                else{echo "<a href=\"compte_vendeur.php\" class=\"lienn\">Votre Compte</a>";} 
                ?>
            </ul>
        </div>


        <div id="section">
            <div id="formulaire">

                <?php
    echo "<meta charset=\"utf-8\">";
    echo "<link rel=\"stylesheet\" type=\"text/css\" >";

    $Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";
    $Prenom = isset($_POST["Prenom"])? $_POST["Prenom"] : "";
    $Adresse = isset($_POST["Adresse"])? $_POST["Adresse"] : "";
    $Ville = isset($_POST["Ville"])? $_POST["Ville"] : "";
    $CodePostal = isset($_POST["CodePostal"])? $_POST["CodePostal"] : "";
    $Pays = isset($_POST["Pays"])? $_POST["Pays"] : "";
    $Tel = isset($_POST["Tel"])? $_POST["Tel"] : "";
    $Carte = isset($_POST["Carte"])? $_POST["Carte"] : "";
    $NumCarte = isset($_POST["NumCarte"])? $_POST["NumCarte"] : "";
    $DateExp = isset($_POST["DateExp"])? $_POST["DateExp"] : "";
    $Picto = isset($_POST["Picto"])? $_POST["Picto"] : "";

    $database = "Swimming_Pool";

    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found = mysqli_select_db($db_handle, $database);
    $bug = false;
    if (isset($_POST["modif"])){
        if ($db_found) {
            $IDClient = $_SESSION['IDClient'];
                $sql = "SELECT * FROM Client WHERE IDClient LIKE '$IDClient'";
                $result = mysqli_query($db_handle,$sql);
                $number=mysqli_num_rows($result);
                if($number!=0){
                    if($Nom){
                        $sql ="UPDATE Client SET Nom='$Nom' WHERE IDClient LIKE '$IDClient'";
                        $result = mysqli_query($db_handle,$sql);
                    }
                    if($Prenom != null){
                        $sql ="UPDATE Client SET Prenom='$Prenom'";
                        $result = mysqli_query($db_handle,$sql);
                    }
                    if($Adresse != null){
                        $sql ="UPDATE Client SET Adresse='$Adresse'";
                        $result = mysqli_query($db_handle,$sql);
                    }
                    if($Ville != null){
                        $sql ="UPDATE Client SET Ville='$Ville'";
                        $result = mysqli_query($db_handle,$sql);
                    }
                    if($CodePostal != null){
                        $sql ="UPDATE CodePostal SET CodePostal='$CodePostal'";
                        $result = mysqli_query($db_handle,$sql);
                    }
                    if($Pays != null){
                        $sql ="UPDATE Client SET Pays='$Pays'";
                        $result = mysqli_query($db_handle,$sql);
                    }
                    if($Tel != null){
                        $sql ="UPDATE Client SET Tel='$Tel'";
                        $result = mysqli_query($db_handle,$sql);
                    }
                    if($Carte != null){
                        $sql ="UPDATE Client SET Carte='$Carte'";
                        $result = mysqli_query($db_handle,$sql);
                    }
                    if($NumCarte != null){
                        $sql ="UPDATE Client SET NumCarte='$NumCarte'";
                        $result = mysqli_query($db_handle,$sql);
                    }
                    if($DateExp != null){
                        $sql ="UPDATE Client SET DateExp='$DateExp'";
                        $result = mysqli_query($db_handle,$sql);
                    }
                    if($Picto != null){
                        $sql ="UPDATE Client SET Picto='$Picto'";
                        $result = mysqli_query($db_handle,$sql);
                    }
                    if($Mdp != null){
                        $sql ="UPDATE Client SET Mdp='$Mdp'";
                        $result = mysqli_query($db_handle,$sql);
                    }
                    $sql = "SELECT * FROM Client WHERE IDClient LIKE '$IDClient'";
                    $result = mysqli_query($db_handle,$sql);
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
                    echo"</table>";
                }
            }
        }
        mysqli_close($db_handle);
        ?>



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
