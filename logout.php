<?php
session_start();
session_unset();
session_destroy();
$user=1;
setcookie("username",$user,time() - 60,"/");
header("location:index.html");
?>