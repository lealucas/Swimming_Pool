<?php
    define('DB_SERVER', 'localhost');
	define('DB_USER', 'root');
    define('DB_PASS', '');
    
    $database = "Swimming_Pool";
    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found = mysqli_select_db($db_handle, $database);

    $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
    $db_found = mysqli_select_db($db_handle,$database);
    
    $email = isset($_POST["email"])?$_POST["email"]:"";
    $Password = isset($_POST["Password"])?$_POST["Password"]:"";
    $Btn = isset($_POST["Btn"])?$_POST["Btn"]:""; 

	if (isset($_POST["Btn"])){
		if($db_found){
			$sql = "SELECT email FROM Client WHERE email=$email";
			$result = mysqli_query($db_handle, $sql);	

		while($data = mysqli_fetch_assoc($result)){

		echo "ID: " .$data['ID']. '<br>';
		echo "Nom: " .$data['Nom']. '<br>';
		echo "Prenom: " .$data['Prenom']. '<br>';
		echo "<br>";
		}
		}
	}
	else{
		echo "Database not found";
	}

	mysqli_close($db_handle);
?>