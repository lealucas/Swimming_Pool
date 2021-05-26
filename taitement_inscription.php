<?php
    echo "<meta charset=\"utf-8\">";
    echo "<link rel=\"stylesheet\" type=\"text/css\" >";

    $type = isset($_POST["typePers"])? $_POST["typePers"] : "";
    $Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";
    $Prenom = isset($_POST["Prenom"])? $_POST["Prenom"] : "";
    $Adresse = isset($_POST["Adresse"])? $_POST["Adresse"] : "";
    $Ville = isset($_POST["Ville"])? $_POST["Ville"] : "";
    $CodePostal = isset($_POST["CodePostal"])? $_POST["CodePostal"] : "";
    $Pays = isset($_POST["Pays"])? $_POST["Pays"] : "";
    $Tel = isset($_POST["Tel"])? $_POST["Tel"] : "";
    $Birthday = isset($_POST["Birthday"])? $_POST["Birthday"] : "";
    $Carte = isset($_POST["Carte"])? $_POST["Carte"] : "";
    $NumCarte = isset($_POST["NumCarte"])? $_POST["NumCarte"] : "";
    $DateExp = isset($_POST["DateExp"])? $_POST["DateExp"] : "";
    $Picto = isset($_POST["Picto"])? $_POST["Picto"] : "";
    $email = isset($_POST["email"])? $_POST["email"] : "";
    $Mdp = isset($_POST["Mdp"])? $_POST["Mdp"] : "";

    echo $type;
    echo $Nom;
    echo $Prenom;
    echo $Adresse;
    echo $Ville;
    echo $CodePostal;
    echo $Pays;
    echo $Tel;
    echo $Birthday;
    echo $Carte;
    echo $NumCarte;
    echo $DateExp;
    echo $Picto;
    echo $email;
    echo $Mdp;
    
    
    $database = "Swimming_Pool";

    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found = mysqli_select_db($db_handle, $database);
    $bug = false;
    if (isset($_POST["bouffon"])){
    if ($db_found) {
        if ($type == "C") {
            echo "<br>Test du connard <br>";
            $sql = "INSERT INTO Client (Nom,Prenom,Adresse,Ville,CodePostal,Pays,Tel,Birthday,Carte,NumCarte,DateExp,Picto,email,Mdp) VALUES ('$Nom','$Prenom','$Adresse','$Ville','$CodePostal','$Pays','$Tel','$Birthday','$Carte','$NumCarte','$DateExp','$Picto','$email','$Mdp')";
            $result = mysqli_query($db_handle, $sql);
            echo"encore la";
            $sql ="SELECT * FROM Client";
            $result = mysqli_query($db_handle,$sql);
            while($data = mysqli_fetch_assoc($result)){
                echo "Nom :".$data['Nom']. '<br>';
            }
            
        }

        elseif ($type == "V") {
            $sql = "INSERT INTO Client (ID, Nom, Prenom, Adresse, Ville, CodePostal, Pays, Tel, Birthday, Carte, NumCarte, DateExp, Picto, email, Mdp) 
            VALUES ('', '$Nom', '$Prenom', '$Adresse', '$Ville', '$CodePostal', '$Pays', '$Tel', '$Birthday', '$Carte', '$NumCarte', '$DateExp', '$Picto', '$email', '$Mdp')";
            $result = mysqli_query($db_handle, $sql);
        }
    }
}
    mysqli_close($db_handle);
?>