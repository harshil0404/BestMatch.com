<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Started @ BestMatch.com</title>
    <link rel="stylesheet" href="./styles.css?v=<?php echo time(); ?>">
    <script type="text/javascript" language="JavaScript" src="main.js?v=<?php echo time(); ?>"></script>
    <script src="https://kit.fontawesome.com/f5e31d8174.js" crossorigin="Harshil Soni"></script>
</head>
<body>
    <div class="wrapper">
        <div class="logo"><i class="fab fa-gratipay"></i></div>
        <div class="company">BestMatch.com</div>

        <div class="tag">Find perfect match for yourself from our big trusted community.</div>
        <hr class="hr1" style="width:60%;">
        <div class="started"><i class="fas fa-play"> Get Started To Find Your Loved Once...</i></div>

        <div class="options">
            <div class="signup" onclick="signup_display()">SIGN UP</div>
            <div class="signin" onclick="signin_display()">SIGN IN</div>
        </div>
        <hr class="hr2" style="width:90%;"> 
    <div class="signin-form" style="display:none;">    
        <form action="./index.php" method = "POST">
            <input class type="text" name="username" placeholder="username"><br>
            <input type="password" placeholder="password"><br>
            <input type="submit" value="Login">
        </form>
    </div>
    <div class="signup-form" style="display:none">
        <form action="./index.php" method = "POST">
            <input class type="text" name="fname" placeholder="First name" require><br>
            <input class type="text" name="lname" placeholder="Last name" require><br>
                <input class type="email" name="email" placeholder="E-mail" require><br>
                <input class type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" require><br>
                <input class type="date" name="dob" require><br>

                <div class="radio" style="margin:10px 0 10px 0 ;">
                    <input type="radio" name="gender" value="male" style="font-size:20px;">
                    <label for="male" style="font-size:30px;color:grey;" require>Male</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="gender" value="female">
                    <label for="female" style="font-size:30px;color:grey;" require>Female</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="gender" value="others">
                    <label for="others" style="font-size:30px;color:grey;" require>Others</label>&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
            <label for="color" style="font-size:30px;color:grey;" >Choose color for profile :</label> <input type="color" name="color" value="#ff0000" require><br>
            <input class type="text" name="username" placeholder="Create username" require><br>
            <input type="password" name="pass" placeholder="Create account password" require><br>
            <input type="submit" value="Create Profile">
        </form>
    </div>
</div>
    <span class="king">Created By - HARSHIL SONI</span>
</body>
</html>