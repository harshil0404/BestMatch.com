
<?php
    require_once 'model.php';
    
    $search = $_SESSION["searchresult"];

    $sql_userview = "SELECT firstname, lastname, bio, email, color, profession, username, tablename FROM biodata WHERE firstname LIKE '%$search%'
                     OR lastname LIKE '%$search%' OR username LIKE '%$search%'";

    $res = $conn->query($sql_userview);

    $temp = 0;
    if($res->num_rows > 0){
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
                if($row_like['likers'] == $_SESSION['username'] && $flag == 0){
                    $like = 'blue';
                    $flag = 1;
                }
            }
                    if($flag == 0){
                        $like = 'grey';
                    }
            if($row['profession'] == NULL){
                $row['profession'] = 'Not Provided';
            }
            if($row['bio'] == NULL){
                $row['bio'] = 'Not Provided';
            }
            if(strtolower($row['username']) == strtolower( $_SESSION['username'])){
                $temp = 1;
                continue;
            } 
            
            $initials = $row['firstname'][0] . $row['lastname'][0] ;
            $name = $row['firstname'] .' '. $row['lastname'] ;
            echo "<div class='card' style='box-shadow:5px 5px 5px ".$online."'>";
            echo "<div class='card-row1'>";
            echo "<div class='card-p1'>";
            echo "<a href='welcome.php?aboutuser=".$row['username']."'><span class='search-initials' style="."'color:black;background-color : ".$row['color']."'>$initials</span></a>";
            echo "</div>";
            echo "<div class='card-p2'>";
            echo "<span class='card-name'> $name </span>";
            echo "<span class='card-email'>".$row['email']." </span>";
            echo "</div>";
            echo "</div>";
            echo "<hr>";
            echo "<div class='card-row2'>";
            echo "<span class='profession'> Profession : ".$row['profession']." </span>";
            echo "<span class='like'><i id = '".$row['tablename']."' class='fas fa-thumbs-up' onclick='click_like(this)' style='color:".$like."'></i><span style='color:grey;margin-left:5px;' class='numlikes'>".$numlikes."</span></span>";
            echo "</div>";
            echo"</div>";
        }
    }
    else{
        echo '<script>alert("No search result found...")</script>';
        $_SESSION['issetview'] = 0;
        unset($_SESSION['user-go']);
        echo '<script>location.replace("http://localhost/php/BestMatch.com/welcome.php");</script>';

    }
    if($temp == 1 && $res->num_rows == 1){
        echo '<script>alert("No search result found...")</script>';
        $_SESSION['issetview'] = 0;
        unset($_SESSION['user-go']);
        echo '<script>location.replace("http://localhost/php/BestMatch.com/welcome.php");</script>';

    }


?>