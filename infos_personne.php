<?php
    echo "<meta charset=\"utf-8\">";
    echo "<link rel=\"stylesheet\" type=\"text/css\" >";

    $type = isset($_POST["typePers"])? $_POST["typePers"] : "";
    $nom = isset($_POST["name"])? $_POST["name"] : "";
    $prenom = isset($_POST["firstname"])? $_POST["firstname"] : "";
    $adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
    $ville = isset($_POST["ville"])? $_POST["ville"] : "";
    $CP = isset($_POST["CP"])? $_POST["CP"] : "";
    $pays = isset($_POST["pays"])? $_POST["pays"] : "";
    $tel = isset($_POST["tel"])? $_POST["tel"] : "";
    $birth = isset($_POST["birthday"])? $_POST["birthday"] : "";
    $card = isset($_POST["cb"])? $_POST["cb"] : "";
    $numCarte = isset($_POST["numeCarte"])? $_POST["numCarte"] : "";
    $dateExp = isset($_POST["dateExp"])? $_POST["dateExp"] : "";
    $picto = isset($_POST["picto"])? $_POST["picto"] : "";
    $mail = isset($_POST["mail"])? $_POST["mail"] : "";
    $pswd = isset($_POST["pwd"])? $_POST["pwd"] : "";

    echo $type;
    echo $nom;
    echo $prenom;
    echo $adresse;
    echo $ville;
    echo $CP;
    echo $pays;
    echo $tel;
    echo $birth;
    echo $card;
    echo $numCarte;
    echo $dateExp;
    echo $picto;
    echo $mail;
    echo $pswd;
    
    
    $database = "Swimming_Pool";

    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found = mysqli_select_db($db_handle, $database);
    $bug = false;
    if (isset($_POST['bouffon'])){
    if ($db_found) {
        if ($type == "C") {
            echo "<br>Test du connard <br>";
            $sql = "INSERT INTO Client (ID, Nom, Prenom, Adresse, Ville, CodePostal, Pays, Tel, Birthday, Carte, NumCarte, DateExp, Picto, email, Mdp) 
            VALUES ('', '$nom', '$prenom', '$adresse', '$ville', '$CP', '$pays', '$tel', '$birth', '$card', '$numCarte', '$dateExp', '$picto', '$email', '$pswd')";
            $result = mysqli_query($db_handle, $sql);
            echo"encore la";
            
        }

        elseif ($type == "V") {
            $sql = "INSERT INTO Client('ID', 'Nom', 'Prenom', 'Adresse', 'Ville', 'Code Postal', 'Pays', 'Numero de telephone', 'Date de naissance', 'Type de carte', 'Numero de carte', 'Date d'expiration', 'Code de securite', 'email', 'Mdp') 
            VALUES ('', $nom, $prenom, $adresse, $ville, $CP, $pays, $tel, $birth, $card, $numCarte, $dateExp, $picto, $email, $m)";
            $result = mysqli_query($db_handle, $sql);
        }
    }
}
    mysqli_close($db_handle);
?>