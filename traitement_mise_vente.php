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
                    Bienvenue : <?php echo $_SESSION['Prenom']; ?>
                    <a href="compte_vendeur.php" class="lienh" STYLE="padding:0 0 0 900px">Mon compte</a> | 
                    <a href="deconnexion.php" class="lienh">Se déconnecter</a>
                </div>
        </div>


        <!-- Menu de navigation -->
        <div id="nav">
            <h1>ECE MarketPlace</h1>
            
            <ul id="menuNav">
                Recherche : <input type="text" name="" id="" placeholder="Tapez un nom d'article...">
                <a href="index_session.php" class="lienn">Accueil</a>
                <a href="toutParcourir.php" class="lienn">Tout Parcourir</a>
                <a href="Notifications.php" class="lienn">Notifications</a>
                <a href="Panier.php" class="lienn">Panier</a>
                <a href="compte_vendeur.php" class="lienn">Votre Compte</a>
            </ul>
        </div>


        <div id="section">
            <div id="position">
                <p id="position_texte">Affichage de la position dans les pages</p>
            </div>

            <div id="formulaire">
                <div class="title"><p>Formulaire d'inscription : </p></div>


                <?php
    echo "<meta charset=\"utf-8\">";
    echo "<link rel=\"stylesheet\" type=\"text/css\" >";

    $Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";
    $Photo = isset($_POST["Photo"])? $_POST["Photo"] : "";
    $Discrib = isset($_POST["Discrib"])? $_POST["Discrib"] : "";
    $Video = isset($_POST["Video"])? $_POST["Video"] : "";
    $Categorie = isset($_POST["Categorie"])? $_POST["Categorie"] : "";
    $Prix = isset($_POST["Prix"])? $_POST["Prix"] : "";

    
    $database = "Swimming_Pool";

    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found = mysqli_select_db($db_handle, $database);
    $bug = false;
    if (isset($_POST["gogo"])){
        if ($db_found) {
                    $IDVendeur=$_SESSION['IDVendeur'];
                    $sql = "INSERT INTO Article (Nom,Photo,Discrib,Video,Categorie,Prix,IDVendeur,Valider) VALUES ('$Nom','$Photo','$Discrib','$Video','$Categorie','$Prix','$IDVendeur','0')";
                    $result = mysqli_query($db_handle, $sql);
                    echo "Votre Article vient d'être soumit à la validation par l'administrateur. Vous le verrez apparaitre dans votre onglet Vos Produits En Vente lorsqu'il aura été validé.";
                    
                }
        else{echo"Database not found";}
        
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
