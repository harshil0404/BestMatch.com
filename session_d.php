<?php
require_once 'session_s.php';

session_destroy();
header("Location: http://localhost/php/BestMatch.com/view.php");

?>