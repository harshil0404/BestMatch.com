<?php
require_once 'model.php';
require_once 'session_s.php';

if(isset($_POST["signup"])){
    // $uniqueName = $_POST['username'].$_POST['phone'][3];
    $sql = "INSERT INTO biodata (firstname, lastname,email,phone,dob,gender,color,username,password)
    VALUES ('".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["dob"]."','".$_POST["gender"]."','".$_POST["color"]."','".$_POST["username"]."','".$_POST["pass"]."')";
    $createTable = "CREATE TABLE ".$_POST['username'].$_POST['phone'][4]." ( likers varchar (50)) ";
    if ($conn->query($sql) === TRUE && $conn->query($createTable) === TRUE) {
        header("Location: http://localhost/php/BestMatch.com/view.php");

        require_once 'session_d.php';
    } 
    else {
        echo '<script>alert("Error Creating Profile... Try again);</script>"';
        header("Location: http://localhost/php/BestMatch.com/view.php");
    }
}
if(isset($_POST["signin"])){
    $user = $_POST["username"];
    $pass = strval($_POST["password"]);
    $sql_signin = "SELECT * FROM biodata WHERE username = '$user' ";
    $result = $conn->query($sql_signin);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $orig_pass = $row["password"];
            if($orig_pass == $pass){

                $_SESSION["username"] = $user;
                $_SESSION["fname"] = $row["firstname"];
                $_SESSION["lname"] = $row["lastname"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["phone"] = $row["phone"];
                $_SESSION["dob"] = $row["dob"];
                $_SESSION["gender"] = $row["gender"];
                $_SESSION["color"] = $row["color"];
                $_SESSION["password"] = $row["password"];
                $_SESSION["bio"] = $row["bio"];
                $_SESSION["city"] = $row["city"];
                $_SESSION["state"] = $row["state"];
                $_SESSION["country"] = $row["country"];
                $_SESSION["profession"] = $row["profession"];
                if($row['bio'] == NULL || $row['city'] == NULL || $row['state'] == NULL || $row['country'] == NULL || $row['profession'] == NULL){
                    $_SESSION['biostatus'] = 0;
                }
                else{
                    $_SESSION['biostatus'] = 1;
                }
                if($row['profession'] == NULL){
                    $_SESSION['profession'] = 'Not Provided';
                }
                if($row['bio'] == NULL){
                    $_SESSION['bio'] = 'Not Provided';
                }

                $_SESSION["initials"] = $row['firstname'][0] . $row['lastname'][0];
                header("Location: http://localhost/php/BestMatch.com/welcome.php");
            }
            else{
                echo '<script>alert("*Incorrect Password. Please retry...")</script>';
                // session_destroy();
            }
        }
    }
    else{
        echo '<script>alert("*User not found. Please retry...")</script>';
        // session_destroy();
    }
    
}


?>