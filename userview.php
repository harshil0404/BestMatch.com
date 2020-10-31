
<?php
    require_once 'model.php';
    $search = $_POST["searchresult"];
    $sql_userview = "SELECT firstname, lastname, bio, email, color, profession FROM biodata WHERE firstname LIKE '%$search%'
    OR lastname LIKE '%$search%' OR username LIKE '%$search%'";
    $res = $conn->query($sql_userview);
    if($res->num_rows > 0){
        while($row = $res->fetch_assoc()){
            if($row['profession'] == NULL){
                $row['profession'] = 'Not Provided';
            }
            if($row['bio'] == NULL){
                $row['bio'] = 'Not Provided';
            }
            $initials = $row['firstname'][0] . $row['lastname'][0] ;
            $name = $row['firstname'] .' '. $row['lastname'] ;
            echo "<div class='card'>";
            echo "<div class='card-row1'>";
            echo "<div class='card-p1'>";
            echo "<span class='search-initials' style="."'background-color : ".$row['color'].";'>$initials</span>";
            echo "</div>";
            echo "<div class='card-p2'>";
            echo "<span class='card-name'> $name </span>";
            echo "<span class='card-email'>".$row['email']." </span>";
            echo "</div>";
            echo "</div>";
            echo "<hr>";
            echo "<div class='card-row2'>";
            echo "<span class='profession'> Profession : ".$row['profession']." </span>";
            echo "<span class='like'><i class='fas fa-thumbs-up' onclick='click_like()' style='color:".$like."'></i></span>";
            echo "</div>";
            echo"</div>";
        }
    }
    else{
        echo '<script>alert("No search result found...")</script>';
        echo '<script>;userview_display(0);</script>';
    }


?>