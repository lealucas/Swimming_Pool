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
                    Bienvenue : (Identifiant)
                    <a href="" class="lienh" STYLE="padding:0 0 0 790px">Admin</a> |
                    <a href="inscription.html" class="lienh">S'inscrire</a> | 
                    <a href="" class="lienh">Mon compte</a> | 
                    <a href="connexion.php" class="lienh">Se connecter</a>
                </div>
        </div>



        <!-- Menu de navigation -->
        <div id="nav">
            <h1>ECE MarketPlace</h1>
            
            <ul id="menuNav">
                Recherche : <input type="text" name="" id="" placeholder="Tapez un nom d'article...">
                <a href="#" class="lienn">Accueil</a>
                <a href="toutParcourir.html" class="lienn">Tout Parcourir</a>
                <a href="Notifications.html" class="lienn">Notifications</a>
                <a href="Panier.html" class="lienn">Panier</a>
                <a href="votreCompte.html" class="lienn">Votre Compte</a>
            </ul>
        </div>



        <div id="section">
            <div id="position">
                <p id="position_texte">Affichage de la position dans les pages</p>
            </div>
            <div id="formulaire">
                <div class="title"><h2>Connectez-vous</h2></div>
            
                <form action="connexion.php" method="post">
                    <table>
                        <tr>
                            <td>Email:</td>
                            <td><input type="text" name="email"></td>
                        </tr>
                        <tr>
                            <td>Mot de passe:</td>
                            <td><input type="password" name="Mdp"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                            <input type="submit" name="bouton" value="Connexion"></td>
                        </tr>
                    </table>
                </form>
                <?php
    echo "<meta charset=\"utf-8\">";
    echo "<link rel=\"stylesheet\" type=\"text/css\" >";

    $email = isset($_POST["email"])? $_POST["email"] : "";
    $Mdp = isset($_POST["Mdp"])? $_POST["Mdp"] : "";
    
    $database = "Swimming_Pool";

    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found = mysqli_select_db($db_handle, $database);
    $bug = false;

    if (isset($_POST['bouton'])) {
        if ($db_found) {
            if ($email != "") {
            $sql = "SELECT * FROM Client WHERE email LIKE '%$email%'";
            $sql2 = "SELECT * FROM Vendeur WHERE email LIKE '%$email%'";
                if ($Mdp != "") {
                    $sql .= " AND Mdp LIKE '%$Mdp%'";
                    $sql2 .= " AND Mdp LIKE '%$Mdp%'";
                }
                else{
                    $bug = true;
                }
            }
            else{
                $bug = true;
            }
            $result = mysqli_query($db_handle, $sql);
            $result2 = mysqli_query($db_handle, $sql2);
            $number=mysqli_num_rows($result);
            $number2=mysqli_num_rows($result2);
            if(mysqli_num_rows($result) != 0){
                $data = mysqli_fetch_assoc($result);
                echo"<h3 align='center'>";
                echo"Bonjour ";
                echo"<a href='index.php' align='center'>".$data['Prenom']."</a></h3>";
                session_start();
                $_SESSION['Prenom'] = $data['Prenom'];
            }
            elseif (mysqli_num_rows($result2) != 0) {
                $data = mysqli_fetch_assoc($result2);
                echo"<h3 align='center'>";
                echo"Bonjour ";
                echo"<a href='index.php' align='center'>".$data['Prenom']."</a></h3>";
                session_start();
                $_SESSION['Prenom'] = $data['Prenom'];
            }
            else{echo "Email ou mot de passe incorrect. Veuillez réessayer";}
        }
        else {echo "Database not found";}
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
