<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesAdmin.css" >
    <title>Document</title>
</head>
<body>

    <div id="wrapper">
        <!-- Header -->
        <div id="header">
                <div id="barreheader">
                    Bienvenue : 
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
                <?php if ($_SESSION['Prenom'] == "Admin") {
                    echo"<a href=\"\" class=\"lienn\">Gestion</a>";
                } ?>
                <a href="#" class="lienn">Accueil</a>
                <a href="toutParcourir.html" class="lienn">Tout Parcourir</a>
                <a href="Notifications.html" class="lienn">Notifications</a>
                <a href="Panier.html" class="lienn">Panier</a>
                <a href="connexion.php" class="lienn">Votre Compte</a>
            </ul>
        </div>


        <div id="section">
            <div id="formulaire">
                <div class="title"><h2>Connectez-vous</h2></div>            
                    <form action="admin.php" method="post">
                        <table>
                            <tr>
                                <td>Email:</td>
                                <td><input type="text" required name="email"></td>
                            </tr>
                            <tr>
                                <td>Mot de passe:</td>
                                <td><input type="password" required name="Mdp"></td>
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
                                    $sql = "SELECT * FROM Admine WHERE email LIKE '%$email%'";
                                    $len =strlen($Mdp);
                                    if ($Mdp != "") {
                                        $sql .= " AND Mdp LIKE '%$Mdp%' AND LENGTH(Mdp) LIKE $len";
                                    }
                                    else{
                                        $bug = true;
                                    }
                                }
                else{
                    $bug = true;
                }
                $result = mysqli_query($db_handle, $sql);
                $number=mysqli_num_rows($result);
                if(mysqli_num_rows($result) != 0){
                    $data = mysqli_fetch_assoc($result);
                    echo"<h3 align='center'>";
                    echo"Bonjour ";
                    echo"<a href='index_session.php' align='center'>".$data['Prenom']."</a></h3>";
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
