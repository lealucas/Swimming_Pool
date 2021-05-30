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
                Recherche : <input type="text" name="" id="" placeholder="Tapez un nom d'article...">
                <?php if ($_SESSION['Prenom'] == "Admin") {
                    echo"<a href=\"\" class=\"lienn\">Gestion</a>";
                } ?>
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
                <a href="#" class="lienn" STYLE="text-decoration: underline">Votre Compte</a>
            </ul>
        </div>


        <div id="section">
                <div id="position">
                <a href="nego_vendeur.php" class="lienC">Négociations</a>
                <a href="enchere_vendeur.php" class="lienC">Enchères</a>
            </div>


        
        <div id="formulaire">
            <div class="title"><p>Vos échanges avec les différents vendeurs pour des négociations : </p></div>
            <?php
                $database = "Swimming_Pool";

                $db_handle = mysqli_connect('localhost', 'root', 'root');
                $db_found = mysqli_select_db($db_handle, $database);

                if ($db_found){

                    $IDVendeur=$_SESSION['IDVendeur'];
                    $sql ="SELECT * FROM Article WHERE Nego='1' AND IDVendeur='$IDVendeur'";
                    $result = mysqli_query($db_handle,$sql);
                    $data = mysqli_fetch_assoc($result);
                    $image = $data['Photo'];
                    echo "<div class=\"cadre\"><img class=\"objet\" src='$image' width='200px'>";
                    echo"<p class=\"describ\">".$data['Nom']."<br>".$data['Discrib']."<br>Prix : ".$nombre_format_francais = number_format($data['Prix'], 2, ',', ' ')."€<br>Vente par : ".$data['Vente']."</div>";
                    echo"<tr>";
                            echo"<td rowspan=\"3\">Acceptez-vous ce Prix ?</td>";
                        echo"</tr>";
                        echo"<tr><td><input type=\"radio\" name=\"typePers\" value=\"Oui\" required id=\"\">Oui</td></tr>";
                        echo"<tr><td><input type=\"radio\" name=\"typePers\" value=\"Non\" required  id=\"\">Non</td></tr>";
                        echo"<tr>";
                            echo"<td colspan=\"2\" align=\"center\"><input type=\"submit\" name=\"Nego\" value=\"Envoyer\"></td>";
                            echo"</form>";
                }
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