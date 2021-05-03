<?php
header("Access-Control-Allow-Origin: *");
include_once("instance.php");
$ml = new ml();
$ml->run();
exit();
?>