
<?php
    require 'model.php';
    
    if($_SESSION["gender"] == 'male'){
        $disp_gen = 'female';
    }
    elseif($_SESSION["gender"] == 'female'){
        $disp_gen = 'male';
    }
    else{
        $disp_gen = 'others';
    }

    $sql_default = "SELECT firstname, lastname, bio, email, color, profession FROM biodata WHERE gender = '$disp_gen'";
    $res = $conn->query($sql_default);
    // print_r($res);
    // echo "yssssssssssssss";
    if($res){
        while($row = $res->fetch_assoc()){
            $like = 'grey';
            if($row['profession'] == NULL){
                $row['profession'] = 'Not Provided';
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
            echo "<span class='like'><i class='fas fa-thumbs-up' onclick='click_like(this)' style='color:".$like."'></i></span>";
            echo "</div>";
            echo"</div>";
        }
    }
    else{
        echo '<script>alert("No search result found...")</script>';

    }


?>