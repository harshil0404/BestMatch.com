<?php
// echo print_r($_POST);
// echo 'in chatssss';
require_once 'model.php';
require_once 'session_s.php';

if(isset($_POST['msg'])){
    // echo 'infunction';
    $sql_addmsg = "INSERT INTO chats (sender,receiver,msg) VALUES ( '".$_SESSION["username"]."',
                  '".$_SESSION["currentbio"]."', '".$_POST['msg']."' )";
    $res = $conn->query($sql_addmsg);
    // echo $sql_addmsg;
    if($res){
        echo 'saved';
    }
}
if(isset($_POST['load'])){
    // echo "load open";
    $sql_loadchat = "SELECT * FROM chats";
    $res = $conn->query($sql_loadchat);
    $displayChats = '';
    if($res){
        while($row = $res->fetch_assoc()){
            if(strtolower($row['sender']) == strtolower($_SESSION['currentbio']) || strtolower($row['sender']) == strtolower($_SESSION['username'])){
                if(strtolower($row['receiver']) == strtolower($_SESSION['currentbio']) || strtolower($row['receiver']) == strtolower($_SESSION['username'])){
                    if(strtolower($row['sender']) == strtolower($_SESSION['currentbio'])){
                        $displayChats .= "<div class='dm leftshift'><span class='dm-name'>".$row['sender']."</span><span class='dm-msg'>".$row['msg']."</span><span class='dm-time'>".$row['time']."</span></div>";
                        // $displayChats .= $row['msg'];
                    }
                    else{
                        $displayChats .= "<div class='dm rightshift'><span class='dm-name'>".$row['sender']."</span><span class='dm-msg'>".$row['msg']."</span><span class='dm-time'>".$row['time']."</span></div>";

                        // $displayChats .= $row['msg'];
                    }
                }
            }

        }
        echo $displayChats ;
    }
}

?>