<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesPanier.css">
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
                            echo"<img src='$pdp' width='40px' style = 'border-radius: 40%'>";
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
                <a href="Notifications.php" class="lienn">Notifications</a>
                <?php 
                if ($_SESSION['Prenom'] == "Admin") {
                }
                else{echo "<a href=\"\" class=\"lienn\" STYLE=\"text-decoration: underliner\">Panier</a>";} 
                ?>
                <?php 
                if ($_SESSION['Prenom'] == "Admin") {
                    echo"<a href=\"gestion.php\" class=\"lienn\">Gestion</a>";
                }
                else{echo "<a href=\"compte_vendeur.php\" class=\"lienn\">Votre Compte</a>";} 
                ?>
            </ul>
        </div>




        <div id="section">
            <div id="result">
                    <div class="title">
                        <p>Votre panier</p>
                        <form action="fin_achat.php" method="post">
                <tr>
                    <td rowspan="3">Souhaitez-vous acheter tout ces articles ? </td>
                </tr>
                <tr><td><input type="radio" name="Achat" value="oui" id="">Oui</td></tr>
                <tr><td><input type="radio" name="Achat" value="non" id="">Non</td></tr>
                <td colspan="2" align="center"><input type="submit" name="Acheter" value="Valider"></td>
            </form>
                    </div>
            <?php
                $database = "Swimming_Pool";

                $db_handle = mysqli_connect('localhost', 'root', 'root');
                $db_found = mysqli_select_db($db_handle, $database);
                $PrixGlob=0;

                if ($db_found){

                    $IDArticle=$_GET['IDArticle'];
                    
                        $IDClient = $_SESSION['IDClient'];
                        $sql= "INSERT INTO Panier(IDPanier,IDClient) VALUES ('$IDClient','$IDClient') ";
                        $result = mysqli_query($db_handle,$sql);
                        $data = mysqli_fetch_assoc($result);
                        $sql = "UPDATE Article SET IDPanier='$IDClient' WHERE IDArticle='$IDArticle'";
                        $result = mysqli_query($db_handle,$sql);
                        $data = mysqli_fetch_assoc($result);
                        
                        $sql = "SELECT * FROM Article WHERE IDPanier='$IDClient' AND Valider='1' AND Vente='Direct'";
                        $result = mysqli_query($db_handle,$sql);
                        while ($data = mysqli_fetch_assoc($result)) {
                            $image = $data['Photo'];
                            echo "<div class=\"cadre\"><img class=\"objet\" src='$image' width='200px'>";
                            echo"<p class=\"describ\">".$data['Nom']."<br>".$data['Discrib']."<br>Prix : ".$nombre_format_francais = number_format($data['Prix'], 2, ',', ' ')."€<br>Vente par : ".$data['Vente']."</div>";
                            $PrixGlob+=$data['Prix'];
                        }
                    echo"<br><br>";
                    echo "<div STYLE='text-align:center; margin-bottom: 10px; font-weight:bold'>Voici le prix global de votre panier : ";
                    echo $nombre_format_francais = number_format($PrixGlob, 2, ',', ' ');
                
                    echo "€</div>";
                }
                else{echo "Database not found";}
            ?>
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