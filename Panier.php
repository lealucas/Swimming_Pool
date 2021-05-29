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
                    <a href="deconnexion.php" class="lienh" STYLE="padding:0 0 0 1080px">Se déconnecter</a>
                </div>
        </div>




        <div id="nav">
            <h1>ECE MarketPlace</h1>
            
            <ul id="menuNav">
                Recherche : <input type="text" name="" id="" placeholder="Tapez un nom d'article...">

                <a href="index_session.php" class="lienn">Accueil</a>
                <a href="toutParcourir.php" class="lienn">Tout Parcourir</a>
                <a href="Notifications.php" class="lienn">Notifications</a>
                <a href="#" class="lienn" STYLE="text-decoration: underline">Panier</a>
                <?php 
                if ($_SESSION['Prenom'] == "Admin") {
                    echo"<a href=\"gestion.php\" class=\"lienn\">Gestion</a>";
                }
                else{echo "<a href=\"compte_vendeur.php\" class=\"lienn\">Votre Compte</a>";} 
                ?>
            </ul>
        </div>




        <div id="section">
            <div id="position">
            <p class="position_texte">Votre panier</p>
            </div>
            <div>
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
                        
                        $sql = "SELECT * FROM Article WHERE IDPanier='$IDClient'";
                        $result = mysqli_query($db_handle,$sql);
                        $data = mysqli_fetch_assoc($result);
                        while ($data = mysqli_fetch_assoc($result)) {
                            $image = $data['Photo'];
                            echo "<div class=\"cadre\"><img class=\"objet\" src='$image' width='200px'>";
                            echo"<p class=\"describ\">".$data['Nom']."<br>".$data['Discrib']."<br>Prix : ".$data['Prix']."€<br>Vente par : ".$data['Vente'];
                            $PrixGlob+=$data['Prix'];
                        }
                    echo"<br><br>";
                    echo "Voici le prix global de votre panier :";
                    echo $PrixGlob;
                    echo "€";
                }
            ?>
            </div>
            <form action="fin_achat.php" method="post">
                <tr>
                    <td rowspan="3">Souhaitez-vous acheter tout ces articles ? </td>
                </tr>
                <tr><td><input type="radio" name="Achat" value="oui" id="">Oui</td></tr>
                <tr><td><input type="radio" name="Achat" value="non" id="">Non</td></tr>
                <td colspan="2" align="center"><input type="submit" name="Acheter" value="Valider"></td>
            </form>

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