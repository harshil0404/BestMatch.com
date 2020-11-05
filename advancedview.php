
<?php
    require 'model.php'; 
    if(trim($_SESSION['s-age'])){
        $age_plus = intval($_POST['s-age']) + 2 ;
        $age_minus = intval($_POST['s-age']) - 2 ;
        if(isset($_SESSION['s-gender'])){
            $gender_adv = $_SESSION['s-gender'];
            
            if(!trim($_SESSION['s-location'])){
                $sql_adv = "SELECT firstname, lastname, bio, email, color, profession, username, tablename FROM biodata 
                WHERE YEAR(CURRENT_TIMESTAMP)-YEAR(dob) >= '$age_minus' AND 2020-YEAR(dob) <= '$age_plus' 
                AND gender = '$gender_adv'"; 
            }
            else{
                $location_adv = $_SESSION['s-location'];
                $sql_adv = "SELECT firstname, lastname, bio, email, color, profession, username, tablename FROM biodata 
                WHERE YEAR(CURRENT_TIMESTAMP)-YEAR(dob) >= '$age_minus' AND 2020-YEAR(dob) <= '$age_plus' 
                AND gender = '$gender_adv' AND (city LIKE '%$location_adv%' OR state LIKE '%$location_adv%'
                OR country LIKE '%$location_adv%')";
            }
            
        }
        else{
            if(!trim($_SESSION['s-location'])){
                $sql_adv = "SELECT firstname, lastname, bio, email, color, profession, username, tablename FROM biodata 
                WHERE YEAR(CURRENT_TIMESTAMP)-YEAR(dob) >= '$age_minus' AND 2020-YEAR(dob) <= '$age_plus'"; 
            }
            else{
                $location_adv = $_SESSION['s-location'];
                $sql_adv = "SELECT firstname, lastname, bio, email, color, profession, username, tablename FROM biodata 
                WHERE YEAR(CURRENT_TIMESTAMP)-YEAR(dob) >= '$age_minus' AND 2020-YEAR(dob) <= '$age_plus' 
                AND (city LIKE '%$location_adv%' OR state LIKE '%$location_adv%'
                OR country LIKE '%$location_adv%')";
            }
        }
    }
    elseif(!trim($_SESSION['s-age'])){
        if(isset($_SESSION['s-gender'])){
            $gender_adv = $_SESSION['s-gender'];

            // echo 'yssss',$location_adv;
            if(!trim($_SESSION['s-location'])){
                $sql_adv = "SELECT firstname, lastname, bio, email, color, profession, username, tablename FROM biodata 
            WHERE gender = '$gender_adv'"; 
            }
            else{
                $location_adv = $_SESSION['s-location'];
                $sql_adv = "SELECT firstname, lastname, bio, email, color, username ,profession, tablename FROM biodata 
                WHERE gender = '$gender_adv' AND (city LIKE '%$location_adv%' OR state LIKE '%$location_adv%'
                OR country LIKE '%$location_adv%')";
            }
        }
        else{
            if(!trim($_SESSION['s-location'])){
                echo '<script>alert("Enter Atleast one Field...");</script>';
            }
            else{
                $location_adv = $_SESSION['s-location'];
                $sql_adv = "SELECT firstname, lastname, bio, email, color, profession, username, tablename FROM biodata 
                WHERE (city LIKE '%$location_adv%' OR state LIKE '%$location_adv%'
                OR country LIKE '%$location_adv%')";
            }
        }
    }
    $temp = 0;
    $res = $conn->query($sql_adv);

    if($res->num_rows > 0){
        while($row = $res->fetch_assoc()){
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
                elseif($flag == 0){
                    $like = 'grey';
                }
            }
            if(strtolower($row['username']) == strtolower( $_SESSION['username'])){
                $temp = 1;
                continue;
            }
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
            echo "<span class='like'><i id = '".$row['tablename']."' class='fas fa-thumbs-up' onclick='click_like(this)' style='color:".$like."'></i><span style='color:grey;margin-left:5px;' class='numlikes'>".$numlikes."</span></span>";
            echo "</div>";
            echo"</div>";
        }
    }
    else{
        echo '<script>alert("No search result found. Please Modify your search..")</script>';
        $_SESSION['issetview'] = 0;
        unset($_SESSION['adv-go']);
        echo '<script>location.replace("http://localhost/php/BestMatch.com/welcome.php");</script>';
    }
    if($temp == 1 && $res->num_rows == 1){
        echo '<script>alert("No search result found. Please Modify your search..")</script>';
        $_SESSION['issetview'] = 0;
        unset($_SESSION['adv-go']);
        echo '<script>location.replace("http://localhost/php/BestMatch.com/welcome.php");</script>';
        
    }



?>