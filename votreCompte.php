<?php
    $email = isset($_POST["email"])?$_POST["email"]:"";
    $Password = isset($_POST["Password"])?$_POST["Password"]:"";

    $found = false;
    echo "<table border=\"1\">";
    echo "<tr>";
    echo "<h2>Connectez-vous </h2>";
    echo "<td>email:</td>";
    echo "<td><input type=\"text\" name=\"email\"></td>";
    echo "</tr>";
    
    for($i = 0; $i < count($logs); $i++){
        if($client[$email] == $email){
            $connection = true;
        }
        elseif ($client[$Password]==$Password) {
            $connection = true;
        }
        else{
            echo"Connexion refusée. Adresse mail ou mot de passe incorrect.";
        }
    }
        

    if (!$found) {
        echo"Connexion refusée. utilisateur inconnu.";
    }
    else{
        if ($connection) {
            echo"Connexion okay";
        }
        else{
            echo"Connexion refusée. Mot de passe invalide";
        }
    }
?>