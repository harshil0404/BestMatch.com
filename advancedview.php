
<?php
    require 'model.php';

    if(!trim($_POST['s-location'])){
        $location_adv = '';
    }
    else{
        $location_adv = $_POST['s-location'];
    }
    if(trim($_POST['s-age'])){
        $age_plus = intval($_POST['s-age']) + 2 ;
        $age_minus = intval($_POST['s-age']) - 2 ;
        if(isset($_POST['s-gender'])){
            $gender_adv = $_POST['s-gender'];
            $sql_adv = "SELECT firstname, lastname, bio, email, color, profession FROM biodata 
            WHERE YEAR(CURRENT_TIMESTAMP)-YEAR(dob) >= '$age_minus' AND 2020-YEAR(dob) <= '$age_plus' 
            AND gender = '$gender_adv' AND (city LIKE '%$location_adv%' OR state LIKE '%$location_adv%'
            OR country LIKE '%$location_adv%')";
        }
        else{
            $sql_adv = "SELECT firstname, lastname, bio, email, color, profession FROM biodata 
            WHERE YEAR(CURRENT_TIMESTAMP)-YEAR(dob) >= '$age_minus' AND 2020-YEAR(dob) <= '$age_plus' 
            AND (city LIKE '%$location_adv%' OR state LIKE '%$location_adv%'
            OR country LIKE '%$location_adv%')";
        }
    }
    else if(!trim($_POST['s-age'])){
        if(isset($_POST['s-gender'])){
            $gender_adv = $_POST['s-gender'];
            $sql_adv = "SELECT firstname, lastname, bio, email, color, profession FROM biodata 
            WHERE gender = '$gender_adv' AND (city LIKE '%$location_adv%' OR state LIKE '%$location_adv%'
            OR country LIKE '%$location_adv%')";
        }
        else{
            $sql_adv = "SELECT firstname, lastname, bio, email, color, profession FROM biodata 
            WHERE (city LIKE '%$location_adv%' OR state LIKE '%$location_adv%'
            OR country LIKE '%$location_adv%')";
        }
    }

    $res = $conn->query($sql_adv);

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
        echo '<script>alert("No search result found. Please Modify your search..")</script>';
    }


?>