<?php

    $Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";
    $Description = isset($_POST["Description"])? $_POST["Description"] : "";
    $annee = isset($_POST["annee"])? $_POST["annee"] : "";
    $editeur = isset($_POST["editeur"])? $_POST["editeur"] : "";

    $database = "livre";

    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if (isset($_POST["button1"])) {
        if ($db_found) {
            $sql = "SELECT * FROM book";
                if ($titre != "") {
                    $sql .= " WHERE Titre LIKE '%$titre%'";
                    if ($auteur != "") {
                        $sql .= " AND Auteur LIKE '%$auteur%'";
                    }
                }
            $result = mysqli_query($db_handle, $sql);

            if (mysqli_num_rows($result) == 0) {
                echo "Book not found. <br>";
            } else {
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>" . "ID" . "</th>";
                echo "<th>" . "Titre" . "</th>";
                echo "<th>" . "Auteur" . "</th>";
                echo "<th>" . "Année" . "</th>";
                echo "<th>" . "Editeur" . "</th>";
                echo "<th>" . "Couverture" . "</th>";
                echo "</tr>";
                
                while ($data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $data['ID'] . "</td>";
                    echo "<td>" . $data['Titre'] . "</td>";
                    echo "<td>" . $data['Auteur'] . "</td>";
                    echo "<td>" . $data['Annee'] . "</td>";
                    echo "<td>" . $data['Editeur'] . "</td>";
                    $image = $data['Couverture'];
                    echo "<td>" . "<img src='$image' height='120' width='100'>" .
                    "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        } else {
            echo "Database not found. <br>";
        }
    }
    mysqli_close($db_handle);
?>
