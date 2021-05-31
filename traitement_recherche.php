<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesAccueil.css" >
    <title>Document</title>
</head>
<body>

    <div id="wrapper">
        <!-- Header -->
        <div id="header">
                <div id="barreheader">
                    <a href="admin.php" class="lienh" STYLE="margin-left:1080px">Admin</a> |
                    <a href="inscription.html" class="lienh">S'inscrire</a> | 
                    <a href="connexion.php" class="lienh">Se connecter</a>
                </div>
        </div>



        <!-- Menu de navigation -->
        <div id="nav">
            <h1>ECE MarketPlace</h1>
            
            <ul id="menuNav">
            <form action="traitement_recherche.php" method="post">
                    Recherche : <input type="text" name="recherche" id="" placeholder="Tapez un nom d'article...">
                <a href="index.php" class="lienn" STYLE="text-decoration: underline">Accueil</a>
                <a href="toutParcourir.html" class="lienn">Tout Parcourir</a>
                <a href="Notifications.html" class="lienn">Notifications</a>
                <a href="Panier.html" class="lienn">Panier</a>
                <a href="votreCompte.html" class="lienn">Votre Compte</a>
            </form>    
            </ul>
        </div>



        <div id="section">
        <div id="result">
                <div class="title">
                    <p>Résultat de la recherche : </p> </div>
                        <?php
                            $database = "Swimming_Pool";

                            $db_handle = mysqli_connect('localhost', 'root', 'root');
                            $db_found = mysqli_select_db($db_handle, $database);
                            $recherche = isset($_POST["recherche"])? $_POST["recherche"] : "";

                            if ($db_found) {
                                $len =strlen($recherche);
                                $sql ="SELECT * FROM Article WHERE Nom LIKE '$recherche' AND LENGTH(Nom) LIKE $len ";
                                $result = mysqli_query($db_handle,$sql);
                                $data = mysqli_fetch_assoc($result);
                                if($result !=0){
                                        $image = $data['Photo'];
                                        if($data['Prix']==0){
                                            echo"Nous ne possédons aucun article ayant ce nom";
                                        }
                                        else{
                                        echo "<div class=\"cadre\"><img class=\"objet\" src='$image' width='200px'>";
                                        echo"<p class=\"describ\">".$data['Nom']."<br>".$data['Discrib']."<br>Prix : ".$nombre_format_francais = number_format($data['Prix'], 2, ',', ' ')."€<br>Vente par : ".$data['Vente']."</div>";
                                        echo "Cet article est disponible. Retrouvez le dans Tout Parcourir pour l'ajouter à votre Panier";
                                        echo $result;
                                        }
                                    
                                }
                            }
                            else{echo"Database not found";}
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