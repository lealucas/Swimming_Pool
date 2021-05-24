<?php

    $database = "Swimming_Pool";

    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found = mysqli_select_db($db_handle, $database);


        if ($db_found) {
            $sql = "SELECT * FROM Article WHERE Categorie LIKE 'VIP'";
            $result = mysqli_query($db_handle, $sql);

            if (mysqli_num_rows($result) == 0) {
                echo "Pas d'article dans cette catégorie <br>";
            } else {
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>" . "Nom" . "</th>";
                echo "<th>" . "Description" . "</th>";
                echo "<th>" . "Photo" . "</th>";
                echo "<th>" . "Année" . "</th>";
                echo "<th>" . "Editeur" . "</th>";
                echo "<th>" . "Couverture" . "</th>";
                echo "</tr>";
                
                while ($data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $data['Nom'] . "</td>";
                    echo "<td>" . $data['Description'] . "</td>";
                    echo "<td>" . $data['Phot'] . "</td>";
                    echo "<td>" . $data['Annee'] . "</td>";
                    echo "<td>" . $data['Editeur'] . "</td>";
                    $image = $data['Photo'];
                    echo "<td>" . "<img src='img/macbook.jpg' height='120' width='200' >" ."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        } else {
            echo "Database not found. <br>";
        }
    mysqli_close($db_handle);
?>
