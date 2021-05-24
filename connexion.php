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
            
            if (mysqli_num_rows($result) == 0 || $bug == true ) {
            echo "Email ou mot de passe incorrect";
            } else {
                while ($data = mysqli_fetch_assoc($result)) {
                    echo "Bonjour " .$data['Prenom']. "<br>";
                }
            }
        }
        else {
            echo "Database not found";
        }
    }
        mysqli_close($db_handle);
?>