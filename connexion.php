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
            $sql = "SELECT * FROM Client";
            if ($email != "") {
                $sql .= " WHERE email LIKE '%$email%'";
                if ($Mdp != "") {
                $sql .= " AND Mdp LIKE '%$Mdp%'";
                }
                else{
                    echo"pas de mdp";
                    $bug = true;
                }
            }
            else{
                echo"pas de mail";
                $bug = true;
            }
            $result = mysqli_query($db_handle, $sql);
            if ($bug !=true) {
                while ($data = mysqli_fetch_assoc($result)) {
                    echo "Bonjour " .$data['Prenom']. "<br>";
                }
            } 
            
        } else {
            echo "Database not found";
        }
    }
        mysqli_close($db_handle);
?>