<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesCompteVendeur.css">
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
                <a href="index.php" class="lienn">Accueil</a>
                <a href="toutParcourir.html" class="lienn">Tout Parcourir</a>
                <a href="Notifications.html" class="lienn">Notifications</a>
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
                else{echo "<a href=\"compte_vendeur.php\" class=\"lienn\"STYLE=\"text-decoration: underline\">Votre Compte</a>";} 
                ?>
            </form>
            </ul>
        </div>


        <div id="section">
        <div id="position">
                <a href="informations.php" class="lienC"STYLE="text-decoration: underline">Informations</a>
                <a href="echange_vendeur.php" class="lienC">Vos échanges vendeur</a>
            </div>
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
                        $sql ="UPDATE Client SET Prenom='$Prenom' WHERE IDClient LIKE '$IDClient'";
                        $result = mysqli_query($db_handle,$sql);
                    }
                    if($Adresse != null){
                        $sql ="UPDATE Client SET Adresse='$Adresse' WHERE IDClient LIKE '$IDClient'";
                        $result = mysqli_query($db_handle,$sql);
                    }
                    if($Ville != null){
                        $sql ="UPDATE Client SET Ville='$Ville' WHERE IDClient LIKE '$IDClient'";
                        $result = mysqli_query($db_handle,$sql);
                    }
                    if($CodePostal != null){
                        $sql ="UPDATE CodePostal SET CodePostal='$CodePostal' WHERE IDClient LIKE '$IDClient'";
                        $result = mysqli_query($db_handle,$sql);
                    }
                    if($Pays != null){
                        $sql ="UPDATE Client SET Pays='$Pays' WHERE IDClient LIKE '$IDClient'";
                        $result = mysqli_query($db_handle,$sql);
                    }
                    if($Tel != null){
                        $sql ="UPDATE Client SET Tel='$Tel' WHERE IDClient LIKE '$IDClient'";
                        $result = mysqli_query($db_handle,$sql);
                    }
                    if($Carte != null){
                        $sql ="UPDATE Client SET Carte='$Carte' WHERE IDClient LIKE '$IDClient'";
                        $result = mysqli_query($db_handle,$sql);
                    }
                    if($NumCarte != null){
                        $sql ="UPDATE Client SET NumCarte='$NumCarte' WHERE IDClient LIKE '$IDClient'";
                        $result = mysqli_query($db_handle,$sql);
                    }
                    if($DateExp != null){
                        $sql ="UPDATE Client SET DateExp='$DateExp' WHERE IDClient LIKE '$IDClient'";
                        $result = mysqli_query($db_handle,$sql);
                    }
                    if($Picto != null){
                        $sql ="UPDATE Client SET Picto='$Picto' WHERE IDClient LIKE '$IDClient'";
                        $result = mysqli_query($db_handle,$sql);
                    }
                    if($Mdp != null){
                        $sql ="UPDATE Client SET Mdp='$Mdp' WHERE IDClient LIKE '$IDClient'";
                        $result = mysqli_query($db_handle,$sql);
                    }
                    $sql = "SELECT * FROM Client WHERE IDClient LIKE '$IDClient'";
                    $result = mysqli_query($db_handle,$sql);
                    $data = mysqli_fetch_assoc($result);
                    echo"<div class=\"title\"><p>Ces données ont bien été prises en compte : </p></div>";
                    echo "<table border='3'>";
                        echo"<td colspan='2' align='center'>";
                            echo"| Informations Personnelles |";
                        echo"</td>";

                        echo "<tr>";
                            echo "<td>" . "Nom : " . "</td>";
                            echo "<td>" . $data['Nom'] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>" . "Prénom : " . "</td>";
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
                            echo"| Informations bancaires |";
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
                            echo "<td>" . "Date d'expiration" . "</td>";
                            echo "<td>" . $data['DateExp'] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>" . "Pictogramme : " . "</td>";
                            echo "<td>" . "************" . "</td>";
                        echo "</tr>";
                        echo"<td colspan=\"2\" align=\"center\">";
                            echo"| Informations Personnelles |";
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
                Copyright &copy; 2021, Sezille_Lucas_-_Industry <br>
                <a href="mailto:sezille_lucas@gmail.com">sezille_lucas@gmail.com</a><br>
                37 quai de Grenelle, 75015 Paris <br>
            </small>
        </footer>
    </div>
</body>
</html>
