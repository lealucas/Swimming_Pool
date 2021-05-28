<?php
    $database = "Swimming_Pool";

    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found = mysqli_select_db($db_handle, $database);
    if ($db_found) {
        $sql = "SELECT * FROM Article ORDER BY IDArticle DESC LIMIT 5";
        $result = mysqli_query($db_handle, $sql);
        while ($data = mysqli_fetch_assoc($result)) { 
            $image = $data['Photo'];
            echo"<img src='$image' height='120' width='200'>";
        }
    }else {echo "Database not found";}
    mysqli_close($db_handle);
?>
<html>
    <input type="button" value="">
</html>