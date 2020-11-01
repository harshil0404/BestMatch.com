<?php
require_once 'session_s.php';

if(!isset($_SESSION["username"])){
    header("Location: session_d.php");
}
if(isset($_POST['edit-save'])){
    if($_POST['edit-save'] == 'Save Changes'){
        $_SESSION["fname"] = $_POST["upd-fname"];
        $_SESSION["lname"] = $_POST["upd-lname"];
        $_SESSION["color"] = $_POST["upd-color"];
        $_SESSION['initials'] = $_SESSION["fname"][0].$_SESSION["lname"][0];
        $_SESSION['temp-username'] = $_SESSION['username'];
        $_SESSION["username"] = $_POST['upd-username'];
    }
}

?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./mobile.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/f5e31d8174.js" crossorigin="Harshil Soni"></script>
    <script type="text/javascript" language="JavaScript" src="main.js?v=<?php echo time(); ?>"></script>
    <title>Welcome @ BestMatch.com</title>
</head>
<?php

?>
<body>
    <div class="wrapper" style="max-height:700px;overflow:auto;padding:50px 75px 50px 75px;"> 
        <nav>
            
            <form action='welcome.php' method="POST" style="display:inline;" contenteditable="false">
                <input class="search-bar" type="search" onclick="clicked_search()" name="searchresult" placeholder="enter name or username." required>
                <input type="submit" 
                style="font-size:28px;padding:3px 4px 8px 4px;color:black;
                background-color:white;margin:0px;font-weight:700;border:2px solid grey;" value="Go" />
            </form>

            <span class="adv-search-btn" onclick="advanced_search()"><i class="fab fa-searchengin" title="Advanced search" ></i></span>
            <a href="session_d.php" class="logout-btn" title="Logout"><i class="fas fa-power-off"></i></a>
            <?php
            echo "<span class='profile' onclick='profile_click()' title='Personal Profile'";
            echo "style="."background-color:".$_SESSION['color'].";text-transform:uppercase".">".$_SESSION['initials']."</span>";
            echo "<a href='welcome.php'><span class='namehead'>".$_SESSION['fname'].' '.$_SESSION['lname']."</span></a>";
            ?>
        </nav>
        <hr style="color:black;">
        <div class="adv-search" style="display:none;">
            <h4 style="margin:0px 0px 10px 0px">Advanced Search</h4>
            <form action="welcome.php" method="POST">
                <input style="font-size:15px;padding:5px 0px 5px 10px;border-radius:5px;" type="number" min="18" name="s-age" placeholder="Age">
                <div class="radio" style="margin:10px 0 10px 0 ;">
                    <input style="transform:scale(1);" type="radio" name="s-gender" value="male" style="font-size:20px;">
                    <label for="male" style="font-size:15px;color:black;" >Male</label>&nbsp;
                    <input style="transform:scale(1);" type="radio" name="s-gender" value="female">
                    <label for="female" style="font-size:15px;color:black;">Female</label>&nbsp;
                    <input style="transform:scale(1);" type="radio" name="s-gender" value="others">
                    <label for="others" style="font-size:15px;color:black;">Others</label>&nbsp;
                </div>
                <input style="font-size:15px;padding:5px 0px 5px 10px;border-radius:5px;margin:0;" type="text" name="s-location" placeholder="location"><br>
                <input style="font-size:15px;padding:10px 20px 10px 20px;margin-top:10px;background-color:black;" name="adv-go" type="submit" value="Go">
            </form>
        </div>
        <div class='display-flex'>
            <!-- -------------------------------------DEFAULT VIEW------------------------------------ -->
            <div class="default-search row1">
                <?php require_once 'defaultview.php' ;?>
            </div>
            <!-- --------------------------------------User Search VIEW------------------------------------ -->
            <div class="user-search row1 close" style="display:none;">
                <?php
                    if(isset($_POST["searchresult"])){
                        echo "<script>userview_display(1);</script>";
                        require_once 'userview.php';

                    }
                    else{
                        echo "<script>userview_display(0);</script>";
                    }
                ?>
            </div>
            <!-- -----------------------------------ADVANCED SEARCH VIEW -------------------------------- -->
            <div class="advanced-search row1 close" style="display:none;">
                <?php
                    if(isset($_POST['adv-go'])){
                        if(trim($_POST['s-age']) || isset($_POST['s-gender']) || trim($_POST['s-location'])){
                            echo "<script>advanced_display(1);</script>";
                            require_once 'advancedview.php';
                        }
                        else{
                            echo '<script>;alert("Please fill atleast one field...");</script>';
                            echo "<script>advanced_display(0);</script>";
                        }
                    } 
                ?>
            </div>
            <div class="user-bio row2 open" style="display:block;">
                <?php
                    if(isset($_GET['aboutuser'])){
                        require_once 'user_profile.php';
                    }
                ?>
            </div>
            <div class="my-bio row2" style="display:none;">
                <?php require_once 'personal_profile.php' ;
                    if(isset($_POST['edit-save'])){
                        if($_POST['edit-save'] == 'Edit Profile'){
                            echo '<script>edit_save(1);</script>';
                        }
                        else {
                            echo '<script>edit_save(0);</script>';
                        }
                    }
                ?>
            </div>
        </div>

    </div>
        <span class="king">Created By - HARSHIL SONI</span>
</body>
</html>