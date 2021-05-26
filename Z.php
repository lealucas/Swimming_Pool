<?php
            $database = "Swimming_Pool";

            $db_handle = mysqli_connect('localhost', 'root', 'root');
            $db_found = mysqli_select_db($db_handle, $database);
            if ($db_found) {
                $sql = "SELECT * FROM Article ORDER BY IDArticle DESC";
                if($typeProduit !=""){
                    $sql .= "AND Categorie LIKE '$typeProduit'";
                }

                    $result = mysqli_query($db_handle, $sql);

                    if (mysqli_num_rows($result) == 0) {
                        echo "Pas d'article dans cette catégorie <br>";
                    } else {
                        echo "<table border='1'><tr><th>Nom</th><th>Description</th><th>Photo</th><th>Prix en €</th>";
                        echo "</tr>";

                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $data['Nom'] . "</td>";
                        echo "<td>" . $data['Description'] . "</td>";
                        $image = $data['Photo'];
                        echo "<td>" . "<img src='/img/$image' height='120' width='200' >" ."</td>";
                        echo "<td>". $data['Prix']. "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }else {echo "Database not found";}
        mysqli_close($db_handle);