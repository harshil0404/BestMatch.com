<?php 
    require_once 'model.php';

    $sql_userbio = "SELECT * FROM biodata WHERE username = '".$_GET["aboutuser"]."'";
    $userbio = $conn->query($sql_userbio);

    while($row = $userbio->fetch_assoc()){
        if($row['bio'] == NULL){
            $bio_msg = 'Not Available';
        }
        else{
            $bio_msg = $row['bio'];
        }
        if($row['profession'] == NULL){
            $pro_msg = 'Not Available';
        }
        else{
            $pro_msg = $row['profession'];
        }
        if($row['city'] == NULL){
            $city_msg = 'Not Available';
        }
        else{
            $city_msg = $row['city'];
        }
        if($row['state'] == NULL){
            $state_msg = 'Not Available';
        }
        else{
            $state_msg = $row['state'];
        }
        if($row['country'] == NULL){
            $country_msg = 'Not Available';
        }
        else{
            $country_msg = $row['country'];
        }
        echo "<div style=' box-shadow: 5px 5px 5px ".$row["color"]."' class='user-bio-card'>";
        echo "<div style = 'color: ".$row["color"]."' class='ub-username'>".$row['username']."<i onclick='openchats(1)' style='float:right;color:#303030;cursor:pointer;font-size:40px;margin-right:20px;' class='fas fa-comment-dots'></i></div>";
        echo "<div style='text-shadow:4px 4px 4px ".$row["color"]."' class='ub-name prof-name'>".$row['firstname']." ".$row['lastname']."</div>";
        echo "<div class='ub-email prof-email'>".$row['email']."</div><hr>";
        echo "<p class='ub-line'><label class='ub-fields'>About Me :</label><textarea rows='3' cols='35' class='ub-bio' disabled >".$bio_msg."</textarea></p>";
        echo "<p class='ub-line'><label class='ub-fields'>Gender : </label>"."<span class = 'ub-value'>".$row['gender'].'</span></p>';
        echo "<p class='ub-line'><label class='ub-fields'>Profession : </label>"."<span class = 'ub-value'>".$pro_msg.'</span></p>';
        echo "<p class='ub-line'><label class='ub-fields'>Location: </label>"."<span class = 'ub-value'>".$city_msg.', '.$state_msg.', '.$country_msg.'.</span></p>';
        echo "<p class='ub-line'><label class='ub-fields'>Date of Birth: </label>"."<span class = 'ub-value'>".$row['dob']."</span></p>";
        echo "</div>";
    }

?>