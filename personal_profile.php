<?php
    require_once 'model.php' ;

    if($_SESSION['biostatus'] == 1){
        $msg = "-Profile uo to date-";
    }
    else{
        $msg = "-Please Complete your profile-";
    }

    $user = $_SESSION["username"];
    $sql_profile = "SELECT * FROM biodata WHERE username = '$user' ";
    $result = $conn->query($sql_profile);

    while($row = $result->fetch_assoc()){
        if($row['bio'] == NULL){
            $bio_msg = 'Write Bio. Example : Hobbies, interests, likes, dis-likes etc...';
        }
        else{
            $bio_msg = $row['bio'];
        }
        if($row['profession'] == NULL){
            $pro_msg = 'Write your profession.';
        }
        else{
            $pro_msg = $row['profession'];
        }
        if($row['city'] == NULL){
            $city_msg = 'Write City of your residency.';
        }
        else{
            $city_msg = $row['city'];
        }
        if($row['state'] == NULL){
            $state_msg = 'Write state of your residency.';
        }
        else{
            $state_msg = $row['state'];
        }
        if($row['country'] == NULL){
            $country_msg = 'Write Country of your residency.';
        }
        else{
            $country_msg = $row['country'];
        }
        echo "<div class='prof-card' style='box-shadow:10px 10px 5px".$row['color']."'>";
        echo "<div class='msg'>".$msg."</div>";
        echo "<div class='prof-header'>";
        echo "<div class='prof-name'>".$row['firstname']." ".$row['lastname']."</div>";
        echo "<div class='prof-email'>".$row['email']."</div>";
        echo "</div>";
        echo "<form action='welcome.php' method='POST'>";
        echo "<input type='submit' class='ip-submit' value='Edit Profile' name='edit-save' /><br>";
        echo "Firstname : <input class='inp-readonly ip' type='text' value='".$row['firstname']."' readonly='readonly' required/><br>";
        echo "Lastname : <input class='inp-readonly ip' type='text' value='".$row['lastname']."' readonly='readonly' required/><br>";
        echo "E-mail : <input class='inp-readonly ip' type='text' value='".$row['email']."' readonly='readonly' required/><br>";
        echo "Phone : <input class='inp-readonly ip' type='text' value='".$row['phone']."' readonly='readonly' required/><br>";
        echo "Profession : <input class='inp-readonly ip' type='text' value='".$pro_msg."' readonly='readonly' required/><br>";
        echo "Bio : <textarea class='area inp-readonly' rows='3' cols='35' readonly='readonly' >".$bio_msg."</textarea><br>";
        echo "DOB : <input class='inp-readonly ip' type='date' value='".$row['dob']."' readonly='readonly' required/><br>";
        echo "City : <input class='inp-readonly ip' type='text' value='".$city_msg."' readonly='readonly' /><br>";
        echo "State : <input class='inp-readonly ip' type='text' value='".$state_msg."' readonly='readonly' /><br>";
        echo "Country : <input class='inp-readonly ip' type='text' value='".$country_msg."' readonly='readonly' /><br>";
        echo "Username : <input class='inp-readonly ip' type='text' value='".$row['username']."' readonly='readonly' required/><br>";
        echo "Password : <input class='inp-readonly pass ip' type='password' value='".$row['password']."' readonly='readonly' required/><i onclick='flip_eye()' class='fas fa-eye-slash eye'></i>";
        echo "</form>";
        echo "</div>";
    }
?>