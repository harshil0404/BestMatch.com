<?php
require_once 'model.php';
require_once 'session_s.php';

$sql_offline = "DELETE FROM online WHERE users = '".$_SESSION['username']."'";
$offline_execution = $conn->query($sql_offline);

session_destroy();
header("Location: http://localhost/php/BestMatch.com/view.php");

?>