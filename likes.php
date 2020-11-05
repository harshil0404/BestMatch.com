<?php
    require_once 'model.php';
    require_once 'session_s.php';
    if(isset($_POST['likeduser'])){
        $sql_verifylike = "SELECT * FROM ".$_POST['likeduser'];
        $res = $conn->query($sql_verifylike);
        $flag = 0;
        if($res){
            while($row = $res->fetch_assoc()){
                if(strtolower($row['likers']) == strtolower($_SESSION['username']) && $flag == 0){
                    $flag = 1;
                    $sql_removelike = "DELETE FROM ".$_POST['likeduser']." WHERE likers = '".$_SESSION['username']."'";
                    $execute = $conn->query($sql_removelike);
                }
            }
            if($flag == 0){
                $sql_like = "INSERT INTO ".$_POST['likeduser']." values ('".$_SESSION['username']."')";
                $execute = $conn->query($sql_like);
            }
        }
        else{
            $sql_firstlike = "INSERT INTO ".$_POST['likeduser']." values ('".$_SESSION['username']."')";
            $execute = $conn->query($sql_firstlike);
        }
    }
    if(isset($_POST['viewlikes'])){
        $sql_viewlikes = "SELECT tablename FROM biodata WHERE username = '".$_SESSION['currentbio']."'";
        $exe = $conn->query($sql_viewlikes);
        $onerow = $exe->fetch_assoc();
        $sql_liketable = "SELECT likers FROM ".$onerow['tablename']."";
        $exec = $conn->query($sql_liketable);
        $t = '';
        while($row = $exec->fetch_assoc()){
            $t .= "<a class='likersoptions' href='welcome.php?aboutuser=".$row['likers']."'>".$row['likers']."</a> , ";
        }
        echo $t;
    }
?>