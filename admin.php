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
                    <a href="" class="lienh" STYLE="padding:0 0 0 990px">Admin</a> |
                    <a href="inscription.html" class="lienh">S'inscrire</a> | 
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
                <a href="connexion.php" class="lienn">Votre Compte</a>
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
