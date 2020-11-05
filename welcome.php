<?php
require_once 'session_s.php';

if(!isset($_SESSION["username"])){
    header("Location: session_d.php");
}
$flag = 0;
if(isset($_POST['edit-save'])){
    $flag = 1;
    $_SESSION['for-userbio'] = 'none';
    $_SESSION['for-chats'] = 'none';
    $_SESSION['for-mybio'] = 'block';
    if($_POST['edit-save'] == 'Save Changes'){
        $_SESSION["fname"] = $_POST["upd-fname"];
        $_SESSION["lname"] = $_POST["upd-lname"];
        $_SESSION["color"] = $_POST["upd-color"];
        $_SESSION['initials'] = $_SESSION["fname"][0].$_SESSION["lname"][0];
        $_SESSION['temp-username'] = $_SESSION['username'];
        $_SESSION["username"] = $_POST['upd-username'];
    }
}
if(isset($_POST['user-go'])){
    unset($_SESSION['currentbio']);
    $_SESSION['for-userbio'] = 'none';
    $_SESSION['for-chats'] = 'none';
    $_SESSION['for-mybio'] = 'block';
    if(isset($_SESSION['adv-go'])){
        unset($_SESSION['adv-go']);
    }
    $_SESSION['issetview'] = 1 ;
    // echo 'specificuser'.$_SESSION['issetview'];
    $_SESSION['user-go'] = $_POST['user-go'];
    $_SESSION['searchresult'] = $_POST['searchresult'];
    $_SESSION['for-default'] = 'none';
    $_SESSION['for-user'] = 'block';
    $_SESSION['for-advanced'] = 'none';
}
elseif(isset($_POST['adv-go'])){
    unset($_SESSION['currentbio']);
    $_SESSION['for-userbio'] = 'none';
    $_SESSION['for-chats'] = 'none';
    $_SESSION['for-mybio'] = 'block';
    if(isset($_SESSION['user-go'])){
        unset($_SESSION['user-go']);
    }
    $_SESSION['issetview'] = 2 ;
    // echo 'specificadv'.$_SESSION['issetview'];

    $_SESSION['adv-go'] = $_POST['adv-go'];
    $_SESSION['for-default'] = 'none';
    $_SESSION['for-user'] = 'none';
    $_SESSION['for-advanced'] = 'block';
    $_SESSION['s-age'] =  $_POST['s-age'];
    if(isset($_POST['s-gender'])){
    $_SESSION['s-gender'] = $_POST['s-gender'];
    }
    $_SESSION['s-location'] = $_POST['s-location'];
}

elseif(isset($_GET['aboutuser'])){
    $_SESSION['currentbio'] = $_GET['aboutuser'];
    $_SESSION['for-userbio'] = 'block';
    $_SESSION['for-mybio'] = 'none';
    $_SESSION['for-chats'] = 'none';
    if(isset($_SESSION['issetview'])){
        // echo 'yssssssssss'.$_SESSION['issetview'];
        if($_SESSION['issetview'] == 0){
            $_SESSION['for-default'] = 'block';
            $_SESSION['for-user'] = 'none';
            $_SESSION['for-advanced'] = 'none';
        }
        elseif($_SESSION['issetview'] == 1){
            $_SESSION['for-default'] = 'none';
            $_SESSION['for-user'] = 'block';
            $_SESSION['for-advanced'] = 'none';
        }
        elseif($_SESSION['issetview'] == 2){
            $_SESSION['for-default'] = 'none';
            $_SESSION['for-user'] = 'none';
            $_SESSION['for-advanced'] = 'block';
        }
    }
}
else{
    if($flag == 0){
        if(isset($_SESSION['user-go'])){
            unset($_SESSION['user-go']);
        }
        if(isset($_SESSION['adv-go'])){
            unset($_SESSION['adv-go']);
        }
        $_SESSION['issetview'] = 0;
        $_SESSION['for-default'] = 'block';
        $_SESSION['for-user'] = 'none';
        $_SESSION['for-advanced'] = 'none';
        $_SESSION['for-userbio'] = 'none';
        $_SESSION['for-chats'] = 'none';
        $_SESSION['for-mybio'] = 'block';
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Welcome @ BestMatch.com</title>
</head>
<script>
// echo "<span class='like' id=""><i class='fas fa-thumbs-up' onclick='click_like(this)' style='color:".$like."'></i><span style='color:grey;margin-left:5px;' class='numlikes'>".$numlikes."</span></span>";
    $(document).ready(function(){
        $('.like').click(function(e){
            $.ajax({
                type: 'POST',
                url: 'likes.php',
                data: {likeduser : e.target.id},
                success: function(data){
                }
            });
        });
    });
    $(document).ready(function(){
        $('#chatform').submit(function(e){
        e.preventDefault();
        if(e.target.children[0].value.trim()){
            // console.log('ysssssssssssss');
            $.ajax({
                type: 'POST',
                url : "chats.php",
                data: $('#chatform').serialize(),
                success: function(data){
                    // console.log(data);
                }
            })
            loadchat();
            e.target.children[0].value = '';
        }
        else{
            alert('Empty messages not allowed!!!');
        }
    });
    });
    
    function loadchat(){
        $.ajax({
            type: 'POST',
            url : 'chats.php',
            data: {load: 'loadchat'},
            success: function(data){
                console.log(data);
                $('.chat-display').html(data);
            }
        });
    }
    // $(document).ready(function(){
        loadchat();
    // })
</script>
<body>
    <div class="wrapper" style="max-height:700px;overflow:auto;padding:50px 75px 50px 75px;"> 
        <nav>
            
            <form action='welcome.php' method="POST" style="display:inline;" contenteditable="false">
                <input class="search-bar" type="search" onclick="clicked_search()" name="searchresult" placeholder="enter name or username." required>
                <input type="submit" name='user-go'
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
            <div class="default-search row1" <?php echo "style='display:".$_SESSION['for-default']."'"; ?>>
                <?php require_once 'defaultview.php' ;?>
            </div>
            <!-- --------------------------------------User Search VIEW------------------------------------ -->
            <div class="user-search row1 close" <?php echo "style='display:".$_SESSION['for-user']."'"; ?>>
                <?php
                    if(isset($_SESSION["user-go"])){
                        if(!trim($_SESSION['searchresult'])){
                            echo '<script>alert("Enter a valid input...")</script>';
                            $_SESSION['issetview'] = 0;
                            unset($_SESSION['user-go']);
                            echo '<script>location.replace("http://localhost/php/BestMatch.com/welcome.php");</script>';
                        }
                        else {
                            $_SESSION['issetview'] = 1 ;
                            require_once 'userview.php';   
                        }
                    }
                    // echo $_SESSION['default-result'];

                ?>
            </div>
            <!-- -----------------------------------ADVANCED SEARCH VIEW -------------------------------- -->
            <div class="advanced-search row1 close" <?php echo "style='display:".$_SESSION['for-advanced']."'"; ?>>
                <?php
                    if(isset($_SESSION['adv-go'])){
                        if(trim($_SESSION['s-age']) || isset($_SESSION['s-gender']) || trim($_SESSION['s-location'])){
                            $_SESSION['issetview'] = 2 ;
                            require 'advancedview.php';
                        }
                        else{
                            echo '<script>;alert("Please fill atleast one field...");</script>';
                        }
                    }
                ?>
            </div>
            <div class="user-bio row2" <?php echo "style='display:".$_SESSION['for-userbio']."'"; ?>>
                <?php
                    if(isset($_GET['aboutuser'])){
                        require_once 'user_profile.php';
                    }
                ?>
            </div>
            <div class="my-bio row2 " <?php echo "style='display:".$_SESSION['for-mybio']."'"; ?>>
                <?php 
                    require_once 'personal_profile.php' ;
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
            <div class="chats row2" <?php echo "style='display:".$_SESSION['for-chats']."'"; ?>>
                <div class="chat-area">
                    <div class='chats'>
                        <span class="chat-title">C H A T S</span>
                        <span class="close-chat" ><i onclick='openchats(0)' class="fas fa-times"></i></span>
                    </div>
                    <div class="chat-box">
                        <div class="chat-header">
                        <?php echo $_GET['aboutuser'] ; ?>
                        </div>
                        <hr style="width:92%" />
                        <div class="chat-display" style='overflow:auto;'></div>
                    </div>
                            <div class="chat-form">
                                <form id='chatform'>
                                    <textarea class='chat-msg' onkeyup='send_opacity()' rows='1' cols='20' name='msg' required autofocus='true'></textarea>
                                    <input name='submitmsg' type="submit" style='opacity:0.5' class='chat-send' value="Send" />
                                </form>
                            </div>

                </div>
            </div>
        </div>

    </div>
        <span class="king">Created By - HARSHIL SONI</span>
</body>
</html>