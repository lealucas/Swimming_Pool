<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesInscription.css" >
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
                <a href="index_session.php" class="lienn">Accueil</a>
                <a href="toutParcourir.php" class="lienn">Tout Parcourir</a>
                <a href="Notifications.php" class="lienn">Notifications</a>
                <a href="Panier.php" class="lienn">Panier</a>
                <?php if ($_SESSION['Prenom'] == "Admin") {
                    echo"<a href=\"gestion.php\" class=\"lienn\">Gestion</a>";
                }
                else{echo "<a href=\"compte_vendeur.php\" class=\"lienn\">Votre Compte</a>";} 
                ?>
            </ul>
        </div>


        <div id="section">

            <div id="formulaire">
                <div class="title"><p>Formulaire d'inscription : </p></div>
                <form action="traitement_inscription.php" method="post">
                    <table border="2">
                        <td colspan="2" align="center">| Informations Personnelles |</td>
                        <tr>
                            <td rowspan="3">Vendeur / Client ?</td>
                        </tr>
                        <tr><td><input type="radio" name="typePers" value="C" required id="">Client</td></tr>
                        <tr><td><input type="radio" name="typePers" value="V" required  id="">Vendeur</td></tr>
                        <tr>
                            <td>Nom : </td>
                            <td><input type="text" name="Nom" required  id=""></td>
                        </tr>
                        <tr>
                            <td>Prénom : </td>
                            <td><input type="text" name="Prenom" required  id=""></td>
                        </tr>
                        <tr>
                            <td>Adresse : </td>
                            <td><input type="text" name="Adresse" required  id=""></td>
                        </tr>
                        <tr>
                            <td>Ville : </td>
                            <td><input type="text" name="Ville" required  id=""></td>
                        </tr>
                        <tr>
                            <td>Code Postal : </td>
                            <td><input type="number" name="CodePostal" required  id=""></td>
                        </tr>
                        <tr>
                            <td>Pays : </td>
                            <td><input type="text" name="Pays" required  id=""></td>
                        </tr>
                        <tr>
                            <td>Téléphone : </td>
                            <td><input type="tel" name="Tel" required  id=""></td>
                        </tr>
                        <tr>
                            <td>Date de naissance : </td>
                            <td><input type="date" name="Birthday" required  id=""></td>
                        </tr>
                        <td colspan="2" align="center">| Informations Bancaires |</td>
                        <tr>
                            <td rowspan="5">Type de carte</td>
                        </tr>
                        <tr><td><input type="radio" name="Carte" value="Visa" required id="">Visa <img src="img/Symbole-Visa.png" width="25px" alt=""></td></tr>
                        <tr><td><input type="radio" name="Carte" value="MasterCard" required id="">MasterCard<img src="img/MasterCard_Logo.png" width="22px" alt=""></td></tr>
                        <tr><td><input type="radio" name="Carte" value="AmericanExpress" required id="">American Express<img src="img/logo-amercian_express.png" width="18px" alt=""></td></tr>
                        <tr><td><input type="radio" name="Carte" value="Paypal" required id="">Paypal<img src="img/Paypal-logo.jpg" width="24px" alt=""></td></tr>
                        <tr>
                            <td>Numéro de carte : </td>
                            <td><input type="number" name="NumCarte" required  id=""></td>
                        </tr>
                        <tr>
                            <td>Date d'expiration : </td>
                            <td><input type="date" name="DateExp" required id=""></td>
                        </tr>
                        <tr>
                            <td>Pictogramme : </td>
                            <td><input type="number" name="Picto" required id=""></td>
                        </tr>
                        <td colspan="2" align="center">| Informations du compte |</td>
                        <tr>
                            <td>Email : </td>
                            <td><input type="email" name="email" required id=""></td>
                        </tr>
                        <tr>
                            <td>Mot de passe : </td>
                            <td><input type="password" name="Mdp" required id=""></td>
                        </tr>
                        <td colspan="2" align="center"><input type="submit" name="bouffon" value="Envoyer"></td>
                    </table>
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