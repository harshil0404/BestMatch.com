<?php
    require_once 'model.php' ;
    if(isset($_POST['edit-save'])){
        if($_POST['edit-save'] == 'Save Changes'){
            if($_POST['upd-bio'] == 'Bio'){
                $_POST['upd-bio'] = NULL;
            }
            if($_POST['upd-prof'] == 'Profession'){
                $_POST['upd-prof']= NULL;
            }
            if($_POST['upd-city'] == 'City'){
                $_POST['upd-city']= NULL;
            }
            if($_POST['upd-state'] == 'State'){
                $_POST['upd-state']= NULL;
            }
            if($_POST['upd-country'] == 'Country'){
                $_POST['upd-country']= NULL;
            }
            if($_POST['upd-bio'] == NULL || $_POST['upd-city'] == NULL || $_POST['upd-state'] == NULL || $_POST['upd-country'] == NULL || $_POST['upd-prof'] == NULL){
                $_SESSION['biostatus'] = 0;
            }
            else{
                $_SESSION['biostatus'] = 1;
            }
            $sql_upd = "UPDATE biodata SET firstname='".$_POST["upd-fname"]."', lastname='".$_POST["upd-lname"]."' ,
                        email='".$_POST["upd-email"]."', phone='".$_POST["upd-phone"]."', dob='".$_POST["upd-dob"]."',
                        color ='".$_POST["upd-color"]."', username='".$_POST["upd-username"]."', password='".$_POST["upd-pass"]."'
                        ,bio = '".$_POST["upd-bio"]."' ,city = '".$_POST["upd-city"]."', state = '".$_POST["upd-state"]."',
                         country = '".$_POST["upd-country"]."', profession = '".$_POST["upd-prof"]."' 
                        WHERE username ='".$_SESSION["temp-username"]."'";
            $updated = $conn->query($sql_upd);
            if($updated){
                echo '<script>alert("Profile Updated...");</script>';
            }
            else{
                echo '<script>alert("Error Updating profile...");</script>';
            }
        }
    }
    if($_SESSION['biostatus'] == 1){
        $msg = "- Profile up to date -";
    }
    else{
        $msg = "- Please Complete your profile -";
    }

    $user = $_SESSION["username"];
    $sql_profile = "SELECT * FROM biodata WHERE username = '$user' ";
    $result = $conn->query($sql_profile);
    while($row = $result->fetch_assoc()){
        if($row['bio'] == NULL){
            $bio_msg = 'Bio';
        }
        else{
            $bio_msg = $row['bio'];
        }
        if($row['profession'] == NULL){
            $pro_msg = 'Profession';
        }
        else{
            $pro_msg = $row['profession'];
        }
        if($row['city'] == NULL){
            $city_msg = 'City';
        }
        else{
            $city_msg = $row['city'];
        }
        if($row['state'] == NULL){
            $state_msg = 'State';
        }
        else{
            $state_msg = $row['state'];
        }
        if($row['country'] == NULL){
            $country_msg = 'Country';
        }
        else{
            $country_msg = $row['country'];
        }
        echo "<div class='prof-card' style='border:2px solid black;box-shadow:10px 10px 5px".$row['color']."'>";
        echo "<div class='msg'>".$msg."</div><hr width='85%'>";
        echo "<div class='prof-header'>";
        echo "<div class='prof-name' style='text-shadow:2px 2px 2px".$row['color']."'>".$row['firstname']." ".$row['lastname']."</div>";
        echo "<div class='prof-email'>".$row['email']."</div>";
        echo "</div>";
        echo "<form class='personal-form' action='welcome.php' method='POST'>";
        echo "<input type='submit' class='ip-submit' value='Edit Profile' name='edit-save' /><br>";
        echo "<label class='ip'>Firstname : </label><input name='upd-fname' class='inp-readonly ip' type='text' value='".$row['firstname']."' readonly='readonly' required/><br>";
        echo "<label class='ip'>Lastname  : </label><input name='upd-lname' class='inp-readonly ip' type='text' value='".$row['lastname']."' readonly='readonly' required/><br>";
        echo "<label class='ip'>E-mail : </label><input name='upd-email' class='inp-readonly ip' type='email' value='".$row['email']."' readonly='readonly' required/><br>";
        echo "<label class='ip'>Phone  : </label><input name='upd-phone' class='inp-readonly ip'  pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}' type='tel' value='".$row['phone']."' readonly='readonly' required/><br>";
        echo "<label class='ip'>Profession : </label><input name='upd-prof' class='inp-readonly ip' type='text' value='".$pro_msg."' readonly='readonly' /><br>";
        echo "<label class='ip'>Profile Colour : </label><input name='upd-color' class='inp-readonly ip' type='color' value='".$row['color']."' disabled='disabled' /><br>";
        echo "<label class='ip'>Bio : </label><textarea name='upd-bio' class='area inp-readonly' rows='3' cols='35' readonly='readonly' >".$bio_msg."</textarea><br>";
        echo "<label class='ip'>DOB : </label><input name='upd-dob' class='inp-readonly ip' type='date' value='".$row['dob']."' readonly='readonly' required/><br>";
        echo "<label class='ip'>City : </label><input name='upd-city' class='inp-readonly ip' type='text' value='".$city_msg."' readonly='readonly' /><br>";
        echo "<label class='ip'>State : </label><input name='upd-state' class='inp-readonly ip' type='text' value='".$state_msg."' readonly='readonly' /><br>";
        echo "<label class='ip'>Country : </label><input name='upd-country' class='inp-readonly ip' type='text' value='".$country_msg."' readonly='readonly' /><br>";
        echo "<label class='ip'>Username : </label><input name='upd-username' class='inp-readonly ip' type='text' value='".$row['username']."' readonly='readonly' required/><br>";
        echo "<label class='ip'>Password : </label><input name='upd-pass' class='inp-readonly pass ip' type='password' value='".$row['password']."' readonly='readonly' required/><i onclick='flip_eye()' class='fas fa-eye-slash eye'></i>";
        echo "</form>";
        echo "</div>";
        }
?>