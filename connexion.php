<?php
    echo "<meta charset=\"utf-8\">";
    echo "<link rel=\"stylesheet\" type=\"text/css\" >";
   
    $database = "Swimming_Pool";
    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found = mysqli_select_db($db_handle, $database);

    $email = isset($_POST["email"])?$_POST["email"]:"";
    $Password = isset($_POST["Password"])?$_POST["Password"]:"";


    if (isset($_POST["bouton"])) {
        if ($db_found) {
        $sql = "SELECT * FROM Client";
        if ($email != "") {

        $sql .= " WHERE email LIKE '%$email%'";
        if ($Password != "") {
        $sql .= " AND password LIKE '%$Password%'";
        }
        }
        $result = mysqli_query($db_handle, $sql);

        if (mysqli_num_rows($result) == 0) {

        echo "email ou mdp incorrect";
        } else {

        while ($data = mysqli_fetch_assoc($result)) {
        
        echo "ID: " . $data['ID'] . "<br>";
        echo "Nom: " . $data['Nom'] . "<br>";
        echo "Prenom: " . $data['Prenom'] . "<br>";
        echo "<br>";
        }
        }
        } else {
        echo "Database not found";
        }
        }
        //fermer la connexion
        mysqli_close($db_handle);
    
?>