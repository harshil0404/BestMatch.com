<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/f5e31d8174.js" crossorigin="Harshil Soni"></script>
    <script type="text/javascript" language="JavaScript" src="main.js?v=<?php echo time(); ?>"></script>
    <title>Welcome @ BestMatch.com</title>
</head>
<body>
    <div class="wrapper">
        <nav>
            <input type="search" onclick="clicked_search()" name="s-name" placeholder="enter name or username.">
            <i class="fas fa-search" title="Search" style="font-size:30px;border:2px solid grey;padding:2px 6.5px 11.5px 6.5px;cursor:pointer;"></i>
            <span onclick="advanced_search()"><i class="fab fa-searchengin" title="Advanced search" style="font-size:30px;border:2px solid grey;padding:2px 6.5px 11.5px 6.5px;cursor:pointer;"></i></span>
            <span class="profile" title="Personal Profile"
            style="background-color:blue;">
            HS</span>
            <span class="namehead">Harshil Soni</span>
        </nav>
        <div class="adv-search">
            <h4 style="margin:0px 0px 10px 0px">Advanced Search</h4>
            <form action="" method="POST">
                <input style="font-size:15px;padding:5px 0px 5px 10px;border-radius:5px;" type="number" min="18" name="s-age" placeholder="Age">
                <div class="radio" style="margin:10px 0 10px 0 ;">
                    <input style="transform:scale(1);" type="radio" name="gender" value="male" style="font-size:20px;">
                    <label for="male" style="font-size:15px;color:black;" >Male</label>&nbsp;
                    <input style="transform:scale(1);" type="radio" name="gender" value="female">
                    <label for="female" style="font-size:15px;color:black;">Female</label>&nbsp;
                    <input style="transform:scale(1);" type="radio" name="gender" value="others">
                    <label for="others" style="font-size:15px;color:black;">Others</label>&nbsp;
                </div>
                <input style="font-size:15px;padding:5px 0px 5px 10px;border-radius:5px;margin:0;" type="text" name="s-location" placeholder="location"><br>
                <input style="font-size:15px;padding:10px 20px 10px 20px;margin-top:10px;background-color:black;" type="submit" value="Go">
            </form>
        </div>
    </div>
</body>
</html>