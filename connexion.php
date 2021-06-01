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
                    <a href="admin.php" class="lienh" STYLE="margin-left:1080px">Admin</a> |
                    <a href="inscription.html" class="lienh">S'inscrire</a> | 
                    <a href="connexion.php" class="lienh"STYLE="text-decoration: underline">Se connecter</a>
                </div>
        </div>



        <!-- Menu de navigation -->
        <div id="nav">
            <h1>ECE MarketPlace</h1>
            
            <ul id="menuNav">
            <form action="traitement_recherche.php" method="post">
                Recherche : <input type="text" name="recherche" id="" placeholder="Tapez un nom d'article...">
                <?php if ($_SESSION['Prenom'] == "Admin") {
                    echo"<a href=\"\" class=\"lienn\">Gestion</a>";
                } ?>
                <a href="index.php" class="lienn">Accueil</a>
                <a href="toutParcourir.html" class="lienn">Tout Parcourir</a>
                <a href="Notifications.html" class="lienn">Notifications</a>
                <a href="Panier.html" class="lienn">Panier</a>
                <a href="votreCompte.html" class="lienn">Votre Compte</a>
                </form>
            </ul>
        </div>



        <div id="section">
           
            <div id="formulaire">
                <div class="title"><h2>Connectez-vous</h2></div>
            
                <form action="connexion.php" method="post">
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
                                $sql = "SELECT * FROM Client WHERE email LIKE '%$email%'";
                                $sql2 = "SELECT * FROM Vendeur WHERE email LIKE '%$email%'";
                                $len =strlen($Mdp);
                                if ($Mdp != "") {
                                    $sql .= " AND Mdp LIKE '%$Mdp%' AND LENGTH(Mdp) LIKE $len";
                                    $sql2 .= " AND Mdp LIKE '%$Mdp%' AND LENGTH(Mdp) LIKE $len";
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
                echo"<a href='index_session.php' align='center'>".$data['Prenom']."</a></h3>";
                session_start();
                $_SESSION['IDClient'] = $data['IDClient'];
                $_SESSION['Prenom'] = $data['Prenom'];
                $_SESSION['IDVendeur'] = 0;
                
            }
            elseif (mysqli_num_rows($result2) != 0) {
                $data = mysqli_fetch_assoc($result2);
                echo"<h3 align='center'>";
                echo"Bonjour ";
                echo"<a href='index_session.php' align='center'>".$data['Prenom']."</a></h3>";
                session_start();
                $_SESSION['IDVendeur'] = $data['IDVendeur'];
                $_SESSION['Prenom'] = $data['Prenom'];
                $_SESSION['Cagnotte'] = $data['Cagnotte'];
                $_SESSION['IDClient'] = 0;
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
                Copyright &copy; 2021, Sezille_Lucas_-_Industry <br>
                <a href="mailto:sezille_lucas@gmail.com">sezille_lucas@gmail.com</a><br>
                37 quai de Grenelle, 75015 Paris <br>
            </small>
        </footer>
    </div>
</body>
</html>
