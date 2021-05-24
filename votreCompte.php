<?php
    $email = isset($_POST["email"])?$_POST["email"]:"";
    $Password = isset($_POST["Password"])?$_POST["Password"]:"";
    $Btn = isset($_POST["Btn"])?$_POST["Btn"]:""; 

    $error = false;
    echo "<table border=\"1\">";
    echo "<tr>";
    echo "<h2>Connectez-vous </h2>";
    echo "<td>Email:</td>";
    echo "<td><input type=\"text\" name=\"email\"></td>";
    echo "</tr>";
    echo "<td>Mot de passe:</td>";
    echo "<td><input type=\"text\" name=\"Password\"></td>";
    echo "</tr>";
    echo "<td colspan=\"2\" align=\"center\">";
    echo "<input type=\"submit\" name=\"Btn\" value=\"Soumettre\">";
    echo "</td>";
    echo "</tr>";
    $database = "Swimming_Pool";
    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found = mysqli_select_db($db_handle, $database);
    if($email=='' || $Password==''){
        $error = true;
    }
    if($error=false){
        $sql1= "SELECT "   ;
        if($client[$email] == $email && $client[$Password] == $Password){
            $connection = true;
        }
        elseif ($vendeur[$email]==$email && $vendeur[$Password] == $Password) {
            $connection = true;
        }
        else{}
    }

    

?>