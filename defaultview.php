
<?php 
    require 'model.php';
    $_SESSION['issetview'] = 0 ;
    
    if($_SESSION["gender"] == 'male'){
        $disp_gen = 'female';
    }
    elseif($_SESSION["gender"] == 'female'){
        $disp_gen = 'male';
    }
    else{
        $disp_gen = 'others';
    }

    $sql_default = "SELECT firstname, lastname, bio, email, color, profession, username FROM biodata WHERE gender = '$disp_gen'";
    $res = $conn->query($sql_default);
    if($res){
        while($row = $res->fetch_assoc()){
            $like = 'grey';
            if($row['profession'] == NULL){
                $row['profession'] = 'Not Provided';
            }
            if(strtolower($row['username']) == strtolower( $_SESSION['username'])){
                continue;
            }
            $initials = $row['firstname'][0] . $row['lastname'][0] ;
            $name = $row['firstname'] .' '. $row['lastname'] ;
            echo "<div class='card'>";
            echo "<div class='card-row1'>";
            echo "<div class='card-p1'>";
            echo "<a href='welcome.php?aboutuser=".$row['username']."'><span class='search-initials' style="."'color:black;background-color : ".$row['color'].";'>$initials</span></a>";
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