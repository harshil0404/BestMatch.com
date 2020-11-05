
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

    $sql_default = "SELECT firstname, lastname, bio, email, color, profession, username, tablename FROM biodata WHERE gender = '$disp_gen'";
    $res = $conn->query($sql_default);
    if($res){
        while($row = $res->fetch_assoc()){
            $online = 'black';
            $flag = 0;
            $sql_onlinecheck = "SELECT * FROM online";
            $online_query = $conn->query($sql_onlinecheck);
            while($row_online = $online_query->fetch_assoc()){
                if(strtolower($row_online['users']) == strtolower($row['username']) && $flag == 0){
                    $flag = 1 ;
                    $online = 'green';
                }
            }
            $like = 'grey';
            $sql_tablename = "SELECT * FROM ".$row['tablename'];
            $likes = $conn->query($sql_tablename);
            $numlikes = $likes->num_rows ;
            $flag = 0;
            while($row_like = $likes->fetch_assoc()){
                if(strtolower($row_like['likers']) == strtolower($_SESSION['username']) && $flag == 0){
                    $like = 'blue';
                    $flag = 1;
                }
            }
            if($row['profession'] == NULL){
                $row['profession'] = 'Not Provided';
            }
            if(strtolower($row['username']) == strtolower( $_SESSION['username'])){
                continue;
            }
            $initials = $row['firstname'][0] . $row['lastname'][0] ;
            $name = $row['firstname'] .' '. $row['lastname'] ;
            echo "<div class='card' style='box-shadow:5px 5px 5px ".$online."'>";
            echo "<div class='card-row1'>";
            echo "<div class='card-p1'>";
            echo "<a href='welcome.php?aboutuser=".$row['username']."'><span class='search-initials' style="."'color:black;background-color : ".$row['color'].";'>$initials</span></a>";
            echo "</div>"; 
            echo "<div class='card-p2'>";
            echo "<span class='card-name'> $name </i></span>";
            echo "<span class='card-email'>".$row['email']." </span>";
            echo "</div>";
            echo "</div>";
            echo "<hr>";
            echo "<div class='card-row2'>";
            echo "<span class='profession'> Profession : ".$row['profession']." </span>";
            echo "<span class='like' ><i id = '".$row['tablename']."' class='fas fa-thumbs-up onelike' onclick='click_like(this)' style='color:".$like."'></i><span class='numlikes' style='color:grey;margin-left:5px;'>".$numlikes."</span></span>";
            echo "</div>";
            echo"</div>";
        }
    }
    else{
        echo '<script>alert("No search result found...")</script>';
    }


?>