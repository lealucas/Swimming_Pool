<?php
    define('DB_SERVER', 'localhost');
	define('DB_USER', 'root');
    define('DB_PASS', '');
    
    $database = "Swimming_Pool";
    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found = mysqli_select_db($db_handle, $database);

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

    if($email=='' || $Password==''){
        $error = true;
    }
    else{
        if($error=false){
            $sql1= "SELECT email,password FROM client WHERE email=$email AND password=$Password ";
            $result = mysqli_query($db_handle, $sql);
            echo'Bonjour client';
        }
        else{echo'Mdp ou mail inconnu';}
    }
    

    

?>