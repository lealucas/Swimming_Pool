<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pre_index.css">
    <title>Document</title>
</head>
<body>
<div id="back_box">
    <div id="title_box">
        <h2>Bienvenue sur ECE MarketPlace</h2>
        <p>Connection sans compte ?</p>
        <a href="index.php">C'est ici que ça se passe</a>
        <form action="pre_index.php" method="post">
                    <table border="3">
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
                $_SESSION['Prenom'] = $data['Prenom'];
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
            }
            else{echo "Email ou mot de passe incorrect. Veuillez réessayer";}
        }
        else {echo "Database not found";}
    }
        mysqli_close($db_handle);
?>
        <footer>
            <small>
                Copyright &copy; 2021, Sezille_Lucas_-_Industry<br>
                <a href="mailto:sezille_lucas@gmail.com">sezille_lucas@gmail.com</a>
            </small>
        </footer>
    </div>
</div>

    <div id="sliderHaut">

        <div id="slidesHaut">

            <div class="slides"><img src="img/villa.png" alt="" width = 300px></div>
            <div class="slides"><img src="img/cahier.png" alt="" width = 386px></div>
            <div class="slides"><img src="img/fauteuil_oeuf.png" alt="" width = 300px></div>
            <div class="slides"><img src="img/macbook.png" alt="" width = 356px></div>
            <div class="slides"><img src="img/vases.jpg" alt="" width = 403px></div>
            <div class="slides"><img src="img/villa.png" alt="" width = 300px></div>

        </div>

    </div>



    <div id="sliderMid">

        <div id="slidesMid">

            <div class="slides"><img src="img/tableau_voiture.jpg" alt="" width = 417px></div>
            <div class="slides"><img src="img/tableaugrand.png" alt="" width = 300px></div>
            <div class="slides"><img src="img/tele.png" alt="" width = 313px></div>
            <div class="slides"><img src="img/appareil_photo.jpg" alt="" width = 318px></div>
            <div class="slides"><img src="img/lampe2.jpg" alt="" width = 300px></div>
            <div class="slides"><img src="img/tableau_voiture.jpg" alt="" width = 417px></div>

        </div>

    </div>



    <div id="sliderBas">

        <div id="slidesBas">

            <div class="slides"><img src="img/Buffer.jpg" alt="" width = 452px></div>
            <div class="slides"><img src="img/canape.jpg" alt="" width = 440px></div>
            <div class="slides"><img src="img/coquillage.jpg" alt="" width = 300px></div>
            <div class="slides"><img src="img/lampe.jpg" alt="" width = 300px></div>
            <div class="slides"><img src="img/eastpak.jpg" alt="" width = 218px></div>
            <div class="slides"><img src="img/Buffer.jpg" alt="" width = 452px></div>

        </div>

    </div>


    


</body>
</html>